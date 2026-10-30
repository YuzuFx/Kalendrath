<?php

namespace OGame\Services\Kaelite;

/**
 * Outcome of a spend: how it was split between the two balances.
 */
readonly class KaeliteSpendResult
{
    /**
     * @param int $earnedSpent Part paid with earned Kaelite (always consumed first).
     * @param int $purchasedSpent Part paid with purchased Kaelite.
     * @param bool $replayed True when the idempotency key had already been used: nothing was debited this time.
     */
    public function __construct(
        public int $earnedSpent,
        public int $purchasedSpent,
        public bool $replayed,
    ) {
    }

    /**
     * @return int
     */
    public function total(): int
    {
        return $this->earnedSpent + $this->purchasedSpent;
    }
}
