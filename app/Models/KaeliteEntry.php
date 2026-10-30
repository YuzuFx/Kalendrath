<?php

namespace OGame\Models;

use Illuminate\Database\Eloquent\Model;
use LogicException;

/**
 * Base class of the Kaelite ledgers. A ledger is append-only: an entry is never
 * updated nor deleted, corrections are new entries.
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property int $amount Signed: positive = credit, negative = debit
 * @property int $balance_after
 * @property string $idempotency_key
 * @property string|null $reference
 * @property array<string, mixed>|null $meta
 * @property \Illuminate\Support\Carbon $created_at
 */
abstract class KaeliteEntry extends Model
{
    public const UPDATED_AT = null;

    /**
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'integer',
            'balance_after' => 'integer',
            'meta' => 'array',
        ];
    }

    /**
     * Enforce the append-only rule at model level.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::updating(function (): never {
            throw new LogicException('Kaelite ledger entries are append-only.');
        });
        static::deleting(function (): never {
            throw new LogicException('Kaelite ledger entries are append-only.');
        });
    }
}
