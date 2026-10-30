<?php

namespace OGame\Services\Kaelite;

use Illuminate\Container\Attributes\Bind;
use OGame\Enums\KaeliteTransactionType;

/**
 * Contract of the purchased Kaelite wallet (balance attached to the account, all servers).
 *
 * In this single-universe repository `users` plays the role of the account and the
 * implementation is local (database). In the target architecture the wallet lives in the
 * lobby: a remote implementation (signed call) replaces the local one without touching
 * the rest. Every mutation carries an idempotency key.
 */
#[Bind(LocalPurchasedKaeliteWallet::class)]
interface PurchasedKaeliteWallet
{
    /**
     * Current purchased balance of an account.
     *
     * @param int $userId
     * @return int
     */
    public function balance(int $userId): int;

    /**
     * Credit the wallet. Allowed while frozen (a payment must always be recorded).
     *
     * @param int $userId
     * @param int $amount Strictly positive.
     * @param KaeliteTransactionType $type
     * @param string $idempotencyKey Same key twice = one effect.
     * @param string|null $reference External reference (payment id...).
     * @param array<string, mixed> $meta
     * @return KaeliteWalletOperation
     */
    public function credit(
        int $userId,
        int $amount,
        KaeliteTransactionType $type,
        string $idempotencyKey,
        string|null $reference = null,
        array $meta = [],
    ): KaeliteWalletOperation;

    /**
     * Debit the wallet. Nothing is debited when the balance is insufficient or the wallet frozen.
     *
     * @param int $userId
     * @param int $amount Strictly positive.
     * @param KaeliteTransactionType $type
     * @param string $idempotencyKey Same key twice = one effect.
     * @param string|null $reference
     * @param array<string, mixed> $meta
     * @return KaeliteWalletOperation
     */
    public function debit(
        int $userId,
        int $amount,
        KaeliteTransactionType $type,
        string $idempotencyKey,
        string|null $reference = null,
        array $meta = [],
    ): KaeliteWalletOperation;

    /**
     * Whether the wallet is frozen.
     *
     * @param int $userId
     * @return bool
     */
    public function isFrozen(int $userId): bool;

    /**
     * Freeze the wallet (precautionary, e.g. suspected payment fraud). Blocks spending only.
     *
     * @param int $userId
     * @param string $reason
     * @return void
     */
    public function freeze(int $userId, string $reason): void;

    /**
     * Lift the freeze.
     *
     * @param int $userId
     * @return void
     */
    public function unfreeze(int $userId): void;
}
