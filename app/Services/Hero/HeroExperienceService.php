<?php

namespace OGame\Services\Hero;

use OGame\Enums\HeroRole;
use OGame\Models\Hero;
use OGame\Services\HeroLevelingService;

/**
 * Grants experience to a hero and resolves the resulting level-ups. The
 * thresholds come from HeroLevelingService; an advisor stops at the
 * (lower) advisor level cap.
 */
class HeroExperienceService
{
    public function __construct(private readonly HeroLevelingService $leveling)
    {
    }

    /**
     * The level cap that applies to this hero.
     *
     * @param Hero $hero
     * @return int
     */
    public function levelCapFor(Hero $hero): int
    {
        if ($hero->role === HeroRole::ADVISOR) {
            return min($this->leveling->levelCap(), (int) config('heroes.advisors.max_level'));
        }

        return $this->leveling->levelCap();
    }

    /**
     * Adds XP, levels the hero up as many times as the XP allows and
     * discards the surplus at the level cap.
     *
     * @param Hero $hero
     * @param int $xp
     * @return Hero
     */
    public function grant(Hero $hero, int $xp): Hero
    {
        $cap = $this->levelCapFor($hero);
        $level = $hero->level;
        $current = $hero->xp + max(0, $xp);

        while ($level < $cap) {
            $required = $this->leveling->xpRequiredForLevel($level);
            if ($current < $required) {
                break;
            }
            $current -= $required;
            $level++;
        }

        if ($level >= $cap) {
            $current = 0;
        }

        $hero->level = $level;
        $hero->xp = $current;
        $hero->save();

        return $hero;
    }
}
