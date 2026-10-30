<?php

namespace OGame\Services\Hero;

use OGame\Enums\HeroRole;
use OGame\Enums\TalentEffectScope;
use OGame\Models\Hero;
use OGame\Models\User;

/**
 * Aggregates the mechanical effects of a hero (invested talents + worn
 * equipment) and applies the per-axis ceilings of the GDD balance table.
 *
 * A hero's bonus stays active while on mission or unavailable (GDD 5.5), so
 * the hero's status is deliberately ignored here.
 */
class HeroEffectsService
{
    /**
     * Effects of one hero, per scope then per effect type, each capped by
     * the axis ceiling (talent value = rank x effect_value).
     *
     * @param Hero $hero
     * @return array<string, array<string, float>> scope value => effect_type => total
     */
    public function forHero(Hero $hero): array
    {
        $totals = [];

        $hero->load(['talents.talentNode', 'equipment.equipmentItem']);

        foreach ($hero->talents as $talent) {
            $node = $talent->talentNode;
            if ($node !== null && $node->effect_type !== null && $node->effect_scope !== null && $node->effect_value !== null) {
                $totals[$node->effect_scope->value][$node->effect_type]
                    = ($totals[$node->effect_scope->value][$node->effect_type] ?? 0.0) + $node->effect_value * $talent->rank;
            }
        }

        foreach ($hero->equipment->where('equipped', true) as $owned) {
            $item = $owned->equipmentItem;
            if ($item !== null && $item->effect_type !== null && $item->effect_scope !== null && $item->effect_value !== null) {
                $totals[$item->effect_scope->value][$item->effect_type]
                    = ($totals[$item->effect_scope->value][$item->effect_type] ?? 0.0) + $item->effect_value;
            }
        }

        foreach ($totals as $scope => $byType) {
            foreach ($byType as $type => $value) {
                $totals[$scope][$type] = $this->capped($type, $value, 1.0);
            }
        }

        return $totals;
    }

    /**
     * Empire-wide effects of a player: the main hero's empire-scoped effects
     * plus the advisors' empire-scoped effects, the advisors' sum being
     * limited to a fraction of the hero's own ceiling on each axis.
     *
     * @param User $user
     * @return array<string, float> effect_type => total
     */
    public function forEmpire(User $user): array
    {
        $empire = TalentEffectScope::EMPIRE->value;
        $main = [];
        $advisors = [];

        foreach (Hero::where('user_id', $user->id)->get() as $hero) {
            $effects = $this->forHero($hero)[$empire] ?? [];

            if ($hero->role === HeroRole::MAIN) {
                $main = $effects;
                continue;
            }

            foreach ($effects as $type => $value) {
                $advisors[$type] = ($advisors[$type] ?? 0.0) + $value;
            }
        }

        $ratio = (float) config('heroes.advisors.axis_cap_ratio');
        $total = $main;
        foreach ($advisors as $type => $value) {
            $total[$type] = ($total[$type] ?? 0.0) + $this->capped($type, $value, $ratio);
        }

        return $total;
    }

    /**
     * Applies the axis ceiling (times a ratio) to a value; an axis with no
     * configured ceiling is left uncapped.
     *
     * @param string $effectType
     * @param float $value
     * @param float $ratio
     * @return float
     */
    private function capped(string $effectType, float $value, float $ratio): float
    {
        $cap = config('heroes.axis_caps.' . $effectType);

        return is_numeric($cap) ? min($value, (float) $cap * $ratio) : $value;
    }
}
