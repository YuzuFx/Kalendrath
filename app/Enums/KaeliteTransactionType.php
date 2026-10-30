<?php

namespace OGame\Enums;

/**
 * Types of entries written to the Kaelite ledgers (purchased and earned).
 */
enum KaeliteTransactionType: string
{
    /** Kaelite bought with real money (purchased balance, credit). */
    case PURCHASE = 'purchase';
    /** Extra Kaelite offered on a purchase, e.g. the +30 % beta bonus (purchased balance, credit). */
    case PURCHASE_BONUS = 'purchase_bonus';
    /** Kaelite earned in game: events, rewards (earned balance, credit). */
    case REWARD = 'reward';
    /** Kaelite spent in game (debit on either balance). */
    case SPEND = 'spend';
    /** Manual correction by an administrator (credit or debit). */
    case ADMIN_ADJUSTMENT = 'admin_adjustment';
    /** Reversal of a payment (fraud, chargeback). Debit on the purchased balance. */
    case CHARGEBACK = 'chargeback';
    /** Earned balance wiped by a server reset (beta reset). */
    case SERVER_RESET = 'server_reset';

    /**
     * Whether this entry type may be written while the wallet is frozen.
     * A freeze blocks spending only; corrections and reversals stay possible
     * so that an investigation can be settled.
     *
     * @return bool
     */
    public function bypassesFreeze(): bool
    {
        return in_array($this, [self::ADMIN_ADJUSTMENT, self::CHARGEBACK, self::SERVER_RESET], true);
    }
}
