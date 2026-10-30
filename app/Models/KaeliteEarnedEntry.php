<?php

namespace OGame\Models;

/**
 * Ledger entry of the earned Kaelite balance (server-level).
 *
 * @property string $server_key
 */
class KaeliteEarnedEntry extends KaeliteEntry
{
    protected $table = 'kaelite_earned_entries';
}
