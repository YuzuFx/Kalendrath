<?php

namespace OGame\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use OGame\Enums\EquipmentRarity;
use OGame\Enums\TalentEffectScope;

/**
 * Catalog entry for an equipment item (GDD section 5.7 — craft/forge).
 * Skeleton: a handful of demo items only, full recipe/rarity table to be
 * designed later.
 *
 * @property int $id
 * @property string $name
 * @property string $slot
 * @property int $rarity
 * @property int $required_level
 * @property string|null $description
 * @property string|null $effect_type
 * @property float|null $effect_value
 * @property TalentEffectScope|null $effect_scope
 */
class EquipmentItem extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slot',
        'rarity',
        'description',
        'effect_type',
        'effect_value',
        'effect_scope',
        'required_level',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'effect_value' => 'float',
            'effect_scope' => TalentEffectScope::class,
        ];
    }

    /**
     * @return Attribute<EquipmentRarity, int>
     */
    protected function rarityEnum(): Attribute
    {
        return Attribute::make(
            get: fn () => EquipmentRarity::from($this->rarity),
        );
    }
}
