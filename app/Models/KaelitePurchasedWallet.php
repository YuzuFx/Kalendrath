<?php

namespace OGame\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Purchased Kaelite balance of an account (all servers), with its precautionary freeze.
 *
 * @property int $id
 * @property int $user_id
 * @property int $balance
 * @property \Illuminate\Support\Carbon|null $frozen_at
 * @property string|null $frozen_reason
 */
class KaelitePurchasedWallet extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'balance',
        'frozen_at',
        'frozen_reason',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'balance' => 'integer',
            'frozen_at' => 'datetime',
        ];
    }

    /**
     * The account owning this wallet.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Whether the wallet is frozen.
     *
     * @return bool
     */
    public function isFrozen(): bool
    {
        return $this->frozen_at !== null;
    }
}
