<?php

namespace OGame\Services\Hero;

use Illuminate\Database\QueryException;
use OGame\Enums\HeroArchetype;
use OGame\Enums\HeroRole;
use OGame\Exceptions\HeroRuleException;
use OGame\Models\Hero;
use OGame\Models\User;

/**
 * Recruits a player's main hero and the advisors of the hero's Council
 * (GDD section 5.5, revision of 2026-10-11).
 */
class HeroRosterService
{
    /**
     * Number of Council seats open to the player.
     *
     * @param User $user
     * @return int
     */
    public function advisorSeats(User $user): int
    {
        // Seats will depend on Imperial Prestige tiers (GDD 5.6); all open for now.
        return (int) config('heroes.advisors.max_count');
    }

    /**
     * Creates the player's main hero. A player has exactly one.
     *
     * @param User $user
     * @param HeroArchetype $archetype
     * @param string $name
     * @return Hero
     */
    public function recruitMain(User $user, HeroArchetype $archetype, string $name): Hero
    {
        try {
            // refresh() loads the column defaults (level 1, xp 0...) set by the database.
            return Hero::create([
                'user_id' => $user->id,
                'name' => $name,
                'archetype' => $archetype->value,
                'role' => HeroRole::MAIN,
                'main_marker' => 1,
            ])->refresh();
        } catch (QueryException) {
            // The unique (user_id, main_marker) index rejected a second main hero.
            throw HeroRuleException::because('main_hero_exists');
        }
    }

    /**
     * Creates an advisor in the player's Council. Any archetype is allowed,
     * independent of the main hero's.
     *
     * @param User $user
     * @param HeroArchetype $archetype
     * @param string $name
     * @return Hero
     */
    public function recruitAdvisor(User $user, HeroArchetype $archetype, string $name): Hero
    {
        if (!Hero::where('user_id', $user->id)->where('role', HeroRole::MAIN->value)->exists()) {
            throw HeroRuleException::because('no_main_hero');
        }

        $count = Hero::where('user_id', $user->id)->where('role', HeroRole::ADVISOR->value)->count();
        if ($count >= $this->advisorSeats($user)) {
            throw HeroRuleException::because('council_full');
        }

        return Hero::create([
            'user_id' => $user->id,
            'name' => $name,
            'archetype' => $archetype->value,
            'role' => HeroRole::ADVISOR,
        ])->refresh();
    }
}
