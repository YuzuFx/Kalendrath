<?php

namespace OGame\Services\Kaelite;

/**
 * Outcome of one credit or debit applied to a wallet.
 */
readonly class KaeliteWalletOperation
{
    /**
     * @param int $amount Signed amount applied (positive = credit, negative = debit).
     * @param int $balanceAfter Balance of that wallet after the operation.
     * @param bool $replayed True when the idempotency key had already been used: nothing was applied this time.
     */
    public function __construct(
        public int $amount,
        public int $balanceAfter,
        public bool $replayed,
    ) {
    }
}
