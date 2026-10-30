<?php

namespace OGame\Services\Kaelite;

/**
 * What the player sees: one total, with the detail on hover.
 */
readonly class KaeliteBalance
{
    /**
     * @param int $earned Earned Kaelite on the current server.
     * @param int $purchased Purchased Kaelite on the account.
     * @param bool $frozen Whether the wallet is frozen (spending blocked).
     */
    public function __construct(
        public int $earned,
        public int $purchased,
        public bool $frozen,
    ) {
    }

    /**
     * The single sum shown to the player.
     *
     * @return int
     */
    public function total(): int
    {
        return $this->earned + $this->purchased;
    }

    /**
     * @return array{total: int, earned: int, purchased: int, frozen: bool}
     */
    public function toArray(): array
    {
        return [
            'total' => $this->total(),
            'earned' => $this->earned,
            'purchased' => $this->purchased,
            'frozen' => $this->frozen,
        ];
    }
}
