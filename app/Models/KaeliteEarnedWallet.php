<?php

namespace OGame\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Earned Kaelite balance of a player on one server. Not transferable.
 *
 * @property int $id
 * @property int $user_id
 * @property string $server_key
 * @property int $balance
 */
class KaeliteEarnedWallet extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'server_key',
        'balance',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'balance' => 'integer',
        ];
    }

    /**
     * The player owning this wallet.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
