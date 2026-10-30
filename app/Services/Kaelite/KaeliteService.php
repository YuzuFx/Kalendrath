<?php

namespace OGame\Services\Kaelite;

use Illuminate\Support\Facades\DB;
use OGame\Enums\KaeliteTransactionType;
use OGame\Exceptions\Kaelite\InsufficientKaeliteException;
use OGame\Exceptions\Kaelite\KaeliteIdempotencyConflictException;
use OGame\Exceptions\Kaelite\KaeliteInvalidAmountException;
use OGame\Exceptions\Kaelite\KaeliteNotTransferableException;
use OGame\Exceptions\Kaelite\KaeliteWalletFrozenException;

/**
 * Entry point of the Kaelite economy: combines the purchased wallet (account) and the
 * earned wallet (server) behind one balance and one spend rule.
 *
 * Rules (decisions of 2026-10-28):
 * - the player sees a single sum, detail on hover;
 * - earned Kaelite is spent first, then purchased Kaelite;
 * - earned Kaelite is not transferable;
 * - purchases made during the beta get a bonus (config kaelite.beta_bonus_percent).
 */
class KaeliteService
{
    public function __construct(
        private readonly PurchasedKaeliteWallet $purchased,
        private readonly EarnedKaeliteService $earned,
    ) {
    }

    /**
     * Balance as shown to the player: total, with the detail of both wallets.
     *
     * @param int $userId
     * @param string|null $serverKey Defaults to the current server.
     * @return KaeliteBalance
     */
    public function balance(int $userId, string|null $serverKey = null): KaeliteBalance
    {
        return new KaeliteBalance(
            $this->earned->balance($userId, $serverKey),
            $this->purchased->balance($userId),
            $this->purchased->isFrozen($userId),
        );
    }

    /**
     * Credit a real-money purchase, plus the bonus when active. Both entries are written
     * in one transaction; replaying the same key credits nothing more.
     *
     * @param int $userId
     * @param int $amount Kaelite bought, strictly positive.
     * @param string $idempotencyKey Payment-level key (e.g. payment provider event id).
     * @param string|null $reference Payment reference.
     * @param int|null $bonusPercent Bonus in percent; null reads config kaelite.beta_bonus_percent, 0 means none.
     * @return KaeliteWalletOperation Operation of the purchase entry itself (bonus is a second entry).
     */
    public function creditPurchase(
        int $userId,
        int $amount,
        string $idempotencyKey,
        string|null $reference = null,
        int|null $bonusPercent = null,
    ): KaeliteWalletOperation {
        if ($amount <= 0) {
            throw new KaeliteInvalidAmountException('A Kaelite amount must be a strictly positive integer.');
        }
        $bonusPercent ??= (int) config('kaelite.beta_bonus_percent');
        $bonus = intdiv($amount * max(0, $bonusPercent), 100);

        return DB::transaction(function () use ($userId, $amount, $idempotencyKey, $reference, $bonus, $bonusPercent): KaeliteWalletOperation {
            $operation = $this->purchased->credit($userId, $amount, KaeliteTransactionType::PURCHASE, $idempotencyKey, $reference);
            if ($bonus > 0) {
                $this->purchased->credit(
                    $userId,
                    $bonus,
                    KaeliteTransactionType::PURCHASE_BONUS,
                    $idempotencyKey . ':bonus',
                    $reference,
                    ['bonus_percent' => $bonusPercent],
                );
            }

            return $operation;
        });
    }

    /**
     * Credit earned Kaelite (event, reward) on the given or current server.
     *
     * @param int $userId
     * @param int $amount
     * @param string $idempotencyKey
     * @param string|null $reference
     * @param string|null $serverKey
     * @return KaeliteWalletOperation
     */
    public function grantReward(
        int $userId,
        int $amount,
        string $idempotencyKey,
        string|null $reference = null,
        string|null $serverKey = null,
    ): KaeliteWalletOperation {
        return $this->earned->credit($userId, $amount, $idempotencyKey, $reference, [], $serverKey);
    }

    /**
     * Spend Kaelite on the current (or given) server: earned first, then purchased.
     * All or nothing: when the total is insufficient or the wallet is frozen, nothing is debited.
     * Idempotent: replaying the same key returns the original split without debiting again.
     *
     * @param int $userId
     * @param int $amount Strictly positive.
     * @param string $idempotencyKey One key per purchase attempt (a double click must reuse it).
     * @param string|null $reference What was bought.
     * @param string|null $serverKey Defaults to the current server.
     * @return KaeliteSpendResult
     *
     * @throws InsufficientKaeliteException
     * @throws KaeliteWalletFrozenException
     */
    public function spend(
        int $userId,
        int $amount,
        string $idempotencyKey,
        string|null $reference = null,
        string|null $serverKey = null,
    ): KaeliteSpendResult {
        if ($amount <= 0) {
            throw new KaeliteInvalidAmountException('A Kaelite amount must be a strictly positive integer.');
        }
        $serverKey ??= $this->earned->defaultServerKey();

        return DB::transaction(function () use ($userId, $amount, $idempotencyKey, $reference, $serverKey): KaeliteSpendResult {
            // The earned wallet row is the lock that serialises spends of this player on this server.
            $earnedWallet = $this->earned->lockWallet($userId, $serverKey);

            // Replay: the earned ledger always holds the spend entry, even when it paid 0 earned.
            $replay = $this->earned->findReplay($userId, $serverKey, $idempotencyKey, KaeliteTransactionType::SPEND, null);
            if ($replay !== null) {
                $earnedSpent = -$replay->amount;
                $meta = $replay->meta ?? [];
                $purchasedSpent = (int) ($meta['purchased_spent'] ?? 0);
                if ($earnedSpent + $purchasedSpent !== $amount) {
                    throw new KaeliteIdempotencyConflictException("Idempotency key '$idempotencyKey' already used with different parameters.");
                }

                return new KaeliteSpendResult($earnedSpent, $purchasedSpent, true);
            }

            if ($this->purchased->isFrozen($userId)) {
                throw new KaeliteWalletFrozenException('The Kaelite wallet is frozen.');
            }

            $earnedSpent = min($earnedWallet->balance, $amount);
            $purchasedSpent = $amount - $earnedSpent;
            $purchasedBalance = $this->purchased->balance($userId);
            if ($purchasedBalance < $purchasedSpent) {
                throw new InsufficientKaeliteException(
                    'Insufficient Kaelite: ' . ($earnedWallet->balance + $purchasedBalance) . " available, $amount required."
                );
            }

            // Purchased first in code order so that a failure leaves the earned ledger untouched
            // (the whole transaction rolls back anyway).
            if ($purchasedSpent > 0) {
                $this->purchased->debit($userId, $purchasedSpent, KaeliteTransactionType::SPEND, $idempotencyKey . ':purchased', $reference);
            }
            $this->earned->append(
                $earnedWallet,
                KaeliteTransactionType::SPEND,
                -$earnedSpent,
                $idempotencyKey,
                $reference,
                ['purchased_spent' => $purchasedSpent],
            );

            return new KaeliteSpendResult($earnedSpent, $purchasedSpent, false);
        });
    }

    /**
     * Earned Kaelite is not transferable between players nor between servers: always refused.
     * (Exists so that any future caller hits an explicit rule rather than inventing a path.)
     *
     * @param int $fromUserId
     * @param int $toUserId
     * @param int $amount
     * @return never
     */
    public function transferEarned(int $fromUserId, int $toUserId, int $amount): never
    {
        throw new KaeliteNotTransferableException('Earned Kaelite is not transferable.');
    }

    /**
     * Beta reset of a server: earned Kaelite is wiped, purchased Kaelite (account) is kept.
     *
     * @param string|null $serverKey Defaults to the current server.
     * @param string $idempotencyKey Batch key (e.g. "beta-reset-2026-12").
     * @return int Number of earned wallets reset.
     */
    public function resetServerForBeta(string $idempotencyKey, string|null $serverKey = null): int
    {
        return $this->earned->resetServer($serverKey ?? $this->earned->defaultServerKey(), $idempotencyKey);
    }
}
