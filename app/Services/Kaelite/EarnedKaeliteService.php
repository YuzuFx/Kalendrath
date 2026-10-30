<?php

namespace OGame\Services\Kaelite;

use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use LogicException;
use OGame\Enums\KaeliteTransactionType;
use OGame\Exceptions\Kaelite\InsufficientKaeliteException;
use OGame\Exceptions\Kaelite\KaeliteIdempotencyConflictException;
use OGame\Exceptions\Kaelite\KaeliteInvalidAmountException;
use OGame\Models\KaeliteEarnedEntry;
use OGame\Models\KaeliteEarnedWallet;

/**
 * Earned Kaelite: balance attached to the SERVER where it was earned (events, rewards).
 * Stored in the game server database, one wallet per (player, server_key), never
 * transferable. Same ledger discipline as the purchased wallet: row lock, append-only
 * entries, idempotency keys.
 */
class EarnedKaeliteService
{
    /**
     * The server key used when none is given (config kaelite.server_key).
     *
     * @return string
     */
    public function defaultServerKey(): string
    {
        return (string) config('kaelite.server_key');
    }

    /**
     * Earned balance of a player on a server.
     *
     * @param int $userId
     * @param string|null $serverKey Defaults to the current server.
     * @return int
     */
    public function balance(int $userId, string|null $serverKey = null): int
    {
        return (int) KaeliteEarnedWallet::query()
            ->where('user_id', $userId)
            ->where('server_key', $serverKey ?? $this->defaultServerKey())
            ->value('balance');
    }

    /**
     * Credit earned Kaelite (event, reward).
     *
     * @param int $userId
     * @param int $amount Strictly positive.
     * @param string $idempotencyKey Same key twice = one effect.
     * @param string|null $reference
     * @param array<string, mixed> $meta
     * @param string|null $serverKey Defaults to the current server.
     * @return KaeliteWalletOperation
     */
    public function credit(
        int $userId,
        int $amount,
        string $idempotencyKey,
        string|null $reference = null,
        array $meta = [],
        string|null $serverKey = null,
    ): KaeliteWalletOperation {
        if ($amount <= 0) {
            throw new KaeliteInvalidAmountException('A Kaelite amount must be a strictly positive integer.');
        }
        $serverKey ??= $this->defaultServerKey();

        return DB::transaction(function () use ($userId, $amount, $idempotencyKey, $reference, $meta, $serverKey): KaeliteWalletOperation {
            $wallet = $this->lockWallet($userId, $serverKey);

            $replay = $this->findReplay($userId, $serverKey, $idempotencyKey, KaeliteTransactionType::REWARD, $amount);
            if ($replay !== null) {
                return new KaeliteWalletOperation($replay->amount, $replay->balance_after, true);
            }

            $entry = $this->append($wallet, KaeliteTransactionType::REWARD, $amount, $idempotencyKey, $reference, $meta);

            return new KaeliteWalletOperation($amount, $entry->balance_after, false);
        });
    }

    /**
     * Wipe every earned balance of a server (beta reset). Purchased Kaelite is untouched:
     * it belongs to the account, not to the server. Ledgers are kept (one reset entry per wallet).
     *
     * @param string $serverKey
     * @param string $idempotencyKey Batch key, suffixed with the user id for each wallet entry.
     * @return int Number of wallets that held a positive balance and were reset.
     */
    public function resetServer(string $serverKey, string $idempotencyKey): int
    {
        $count = 0;
        $userIds = KaeliteEarnedWallet::query()
            ->where('server_key', $serverKey)
            ->where('balance', '>', 0)
            ->pluck('user_id');

        foreach ($userIds as $userId) {
            DB::transaction(function () use ($userId, $serverKey, $idempotencyKey, &$count): void {
                $wallet = $this->lockWallet((int) $userId, $serverKey);
                $key = $idempotencyKey . ':' . $userId;
                if ($wallet->balance === 0 || KaeliteEarnedEntry::query()->where('idempotency_key', $key)->exists()) {
                    return;
                }
                $this->append($wallet, KaeliteTransactionType::SERVER_RESET, -$wallet->balance, $key, null, []);
                $count++;
            });
        }

        return $count;
    }

    /**
     * Fetch the wallet under a write lock, creating it on first use. Must be called inside a transaction.
     *
     * @param int $userId
     * @param string $serverKey
     * @return KaeliteEarnedWallet
     */
    public function lockWallet(int $userId, string $serverKey): KaeliteEarnedWallet
    {
        $find = fn (): KaeliteEarnedWallet|null => KaeliteEarnedWallet::query()
            ->where('user_id', $userId)
            ->where('server_key', $serverKey)
            ->lockForUpdate()
            ->first();

        $wallet = $find();
        if ($wallet !== null) {
            return $wallet;
        }

        try {
            // Savepoint: a unique violation must not poison the outer transaction.
            DB::transaction(fn () => KaeliteEarnedWallet::create(['user_id' => $userId, 'server_key' => $serverKey, 'balance' => 0]));
        } catch (UniqueConstraintViolationException) {
            // Created concurrently: lock it below.
        }

        return $find() ?? throw new LogicException('Earned Kaelite wallet could not be created.');
    }

    /**
     * Look up an entry by idempotency key; fails if the key was used for something else.
     *
     * @param int $userId
     * @param string $serverKey
     * @param string $idempotencyKey
     * @param KaeliteTransactionType $type
     * @param int|null $signedAmount Expected amount, null to skip the check (spends compare themselves).
     * @return KaeliteEarnedEntry|null
     */
    public function findReplay(
        int $userId,
        string $serverKey,
        string $idempotencyKey,
        KaeliteTransactionType $type,
        int|null $signedAmount,
    ): KaeliteEarnedEntry|null {
        $existing = KaeliteEarnedEntry::query()->where('idempotency_key', $idempotencyKey)->first();
        if ($existing === null) {
            return null;
        }
        if (
            (int) $existing->user_id !== $userId
            || $existing->server_key !== $serverKey
            || $existing->type !== $type->value
            || ($signedAmount !== null && (int) $existing->amount !== $signedAmount)
        ) {
            throw new KaeliteIdempotencyConflictException("Idempotency key '$idempotencyKey' already used with different parameters.");
        }

        return $existing;
    }

    /**
     * Append a ledger entry and update the (already locked) wallet. A zero amount is
     * accepted: a spend paid entirely with purchased Kaelite still leaves its trace here.
     *
     * @param KaeliteEarnedWallet $wallet Locked wallet.
     * @param KaeliteTransactionType $type
     * @param int $signedAmount
     * @param string $idempotencyKey
     * @param string|null $reference
     * @param array<string, mixed> $meta
     * @return KaeliteEarnedEntry
     */
    public function append(
        KaeliteEarnedWallet $wallet,
        KaeliteTransactionType $type,
        int $signedAmount,
        string $idempotencyKey,
        string|null $reference,
        array $meta,
    ): KaeliteEarnedEntry {
        if ($wallet->balance + $signedAmount < 0) {
            throw new InsufficientKaeliteException('Insufficient earned Kaelite.');
        }

        $newBalance = $wallet->balance + $signedAmount;
        $entry = KaeliteEarnedEntry::create([
            'user_id' => $wallet->user_id,
            'server_key' => $wallet->server_key,
            'type' => $type->value,
            'amount' => $signedAmount,
            'balance_after' => $newBalance,
            'idempotency_key' => $idempotencyKey,
            'reference' => $reference,
            'meta' => $meta === [] ? null : $meta,
        ]);
        $wallet->update(['balance' => $newBalance]);

        return $entry;
    }
}
