<?php

namespace OGame\Services\Kaelite;

use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\DB;
use OGame\Enums\KaeliteTransactionType;
use OGame\Exceptions\Kaelite\InsufficientKaeliteException;
use OGame\Exceptions\Kaelite\KaeliteIdempotencyConflictException;
use OGame\Exceptions\Kaelite\KaeliteInvalidAmountException;
use OGame\Exceptions\Kaelite\KaeliteWalletFrozenException;
use OGame\Models\KaelitePurchasedEntry;
use OGame\Models\KaelitePurchasedWallet;

/**
 * Local (database) implementation of the purchased Kaelite wallet.
 * Every mutation runs in a transaction under a row lock on the wallet, so concurrent
 * spends cannot double-spend; the append-only ledger holds one entry per operation.
 */
class LocalPurchasedKaeliteWallet implements PurchasedKaeliteWallet
{
    /**
     * @inheritDoc
     */
    public function balance(int $userId): int
    {
        return (int) KaelitePurchasedWallet::query()->where('user_id', $userId)->value('balance');
    }

    /**
     * @inheritDoc
     */
    public function credit(
        int $userId,
        int $amount,
        KaeliteTransactionType $type,
        string $idempotencyKey,
        string|null $reference = null,
        array $meta = [],
    ): KaeliteWalletOperation {
        return $this->apply($userId, $amount, $type, $idempotencyKey, $reference, $meta);
    }

    /**
     * @inheritDoc
     */
    public function debit(
        int $userId,
        int $amount,
        KaeliteTransactionType $type,
        string $idempotencyKey,
        string|null $reference = null,
        array $meta = [],
    ): KaeliteWalletOperation {
        return $this->apply($userId, -$amount, $type, $idempotencyKey, $reference, $meta);
    }

    /**
     * @inheritDoc
     */
    public function isFrozen(int $userId): bool
    {
        return KaelitePurchasedWallet::query()->where('user_id', $userId)->whereNotNull('frozen_at')->exists();
    }

    /**
     * @inheritDoc
     */
    public function freeze(int $userId, string $reason): void
    {
        DB::transaction(function () use ($userId, $reason): void {
            $wallet = $this->lockWallet($userId);
            // Keep the original date and reason when already frozen.
            if (!$wallet->isFrozen()) {
                $wallet->update(['frozen_at' => now(), 'frozen_reason' => $reason]);
            }
        });
    }

    /**
     * @inheritDoc
     */
    public function unfreeze(int $userId): void
    {
        DB::transaction(function () use ($userId): void {
            $this->lockWallet($userId)->update(['frozen_at' => null, 'frozen_reason' => null]);
        });
    }

    /**
     * Apply a signed amount under lock, idempotently.
     *
     * @param int $userId
     * @param int $signedAmount Positive = credit, negative = debit (zero is refused).
     * @param KaeliteTransactionType $type
     * @param string $idempotencyKey
     * @param string|null $reference
     * @param array<string, mixed> $meta
     * @return KaeliteWalletOperation
     */
    private function apply(
        int $userId,
        int $signedAmount,
        KaeliteTransactionType $type,
        string $idempotencyKey,
        string|null $reference,
        array $meta,
    ): KaeliteWalletOperation {
        if ($signedAmount === 0) {
            throw new KaeliteInvalidAmountException('A Kaelite amount must be a strictly positive integer.');
        }

        return DB::transaction(function () use ($userId, $signedAmount, $type, $idempotencyKey, $reference, $meta): KaeliteWalletOperation {
            $wallet = $this->lockWallet($userId);

            $existing = KaelitePurchasedEntry::query()->where('idempotency_key', $idempotencyKey)->first();
            if ($existing !== null) {
                if ((int) $existing->user_id !== $userId || (int) $existing->amount !== $signedAmount || $existing->type !== $type->value) {
                    throw new KaeliteIdempotencyConflictException("Idempotency key '$idempotencyKey' already used with different parameters.");
                }
                return new KaeliteWalletOperation($existing->amount, $existing->balance_after, true);
            }

            if ($signedAmount < 0) {
                if ($wallet->isFrozen() && !$type->bypassesFreeze()) {
                    throw new KaeliteWalletFrozenException('The Kaelite wallet is frozen.');
                }
                if ($wallet->balance < -$signedAmount) {
                    throw new InsufficientKaeliteException("Insufficient purchased Kaelite: {$wallet->balance} available, " . (-$signedAmount) . ' required.');
                }
            }

            $newBalance = $wallet->balance + $signedAmount;
            KaelitePurchasedEntry::create([
                'user_id' => $userId,
                'type' => $type->value,
                'amount' => $signedAmount,
                'balance_after' => $newBalance,
                'idempotency_key' => $idempotencyKey,
                'reference' => $reference,
                'meta' => $meta === [] ? null : $meta,
            ]);
            $wallet->update(['balance' => $newBalance]);

            return new KaeliteWalletOperation($signedAmount, $newBalance, false);
        });
    }

    /**
     * Fetch the wallet row under a write lock, creating it on first use.
     * Must be called inside a transaction.
     *
     * @param int $userId
     * @return KaelitePurchasedWallet
     */
    private function lockWallet(int $userId): KaelitePurchasedWallet
    {
        $wallet = KaelitePurchasedWallet::query()->where('user_id', $userId)->lockForUpdate()->first();
        if ($wallet !== null) {
            return $wallet;
        }

        try {
            // Savepoint: a unique violation must not poison the outer transaction.
            DB::transaction(fn () => KaelitePurchasedWallet::create(['user_id' => $userId, 'balance' => 0]));
        } catch (UniqueConstraintViolationException) {
            // Created concurrently by another request: lock it below.
        }

        return KaelitePurchasedWallet::query()->where('user_id', $userId)->lockForUpdate()->firstOrFail();
    }
}
