<?php

namespace OGame\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OGame\Enums\TalentEffectScope;

/**
 * A single node in an archetype's talent tree (GDD section 5.5).
 * Skeleton: structure only, tree content to be designed later.
 *
 * @property int $id
 * @property string $archetype
 * @property string|null $branch
 * @property string $name
 * @property string|null $description
 * @property string|null $effect_type
 * @property float|null $effect_value
 * @property TalentEffectScope|null $effect_scope
 * @property int $tier
 * @property int $position
 * @property int $point_cost
 * @property int $max_rank
 * @property string|null $choice_group
 */
class TalentNode extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'archetype',
        'branch',
        'name',
        'description',
        'effect_type',
        'effect_value',
        'effect_scope',
        'tier',
        'position',
        'point_cost',
        'max_rank',
        'choice_group',
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
     * The talent nodes that unlock this one — this node becomes allocatable
     * as soon as ANY one of them has rank > 0 (WoW-style "any connected
     * parent" branching, not "all of"). Empty for a tree root.
     *
     * @return BelongsToMany<TalentNode, $this>
     */
    public function prerequisites(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'talent_node_prerequisites',
            'talent_node_id',
            'prerequisite_talent_node_id',
        );
    }

    /**
     * The talent nodes that this one unlocks (inverse of prerequisites()).
     *
     * @return BelongsToMany<TalentNode, $this>
     */
    public function unlocks(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'talent_node_prerequisites',
            'prerequisite_talent_node_id',
            'talent_node_id',
        );
    }

    /**
     * Whether allocating this node forbids allocating the given other node,
     * i.e. both belong to the same archetype and share the same non-null
     * choice_group (WoW-style split talent: pick one of two).
     *
     * @param TalentNode $other
     * @return bool
     */
    public function isExclusiveWith(TalentNode $other): bool
    {
        return $this->choice_group !== null
            && $this->id !== $other->id
            && $this->archetype === $other->archetype
            && $this->choice_group === $other->choice_group;
    }
}
