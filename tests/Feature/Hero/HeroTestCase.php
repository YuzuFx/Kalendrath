<?php

namespace Tests\Feature\Hero;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use OGame\Enums\HeroArchetype;
use OGame\Models\Hero;
use OGame\Models\TalentNode;
use OGame\Models\User;
use OGame\Services\Hero\HeroRosterService;
use Tests\TestCase;

/**
 * Shared fixtures for the hero system tests: each test runs in a rolled-back
 * transaction, with a fresh player and a recruited main Warrior.
 */
abstract class HeroTestCase extends TestCase
{
    use DatabaseTransactions;

    protected User $user;
    protected Hero $hero;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->hero = resolve(HeroRosterService::class)->recruitMain($this->user, HeroArchetype::WARRIOR, 'Test Hero');
    }

    /**
     * @param array<string, mixed> $attributes
     */
    protected function node(array $attributes = []): TalentNode
    {
        return TalentNode::create($attributes + [
            'archetype' => 'warrior',
            'branch' => 'blade',
            'name' => 'Test node',
            'tier' => 1,
            'position' => 0,
            'point_cost' => 1,
            'max_rank' => 1,
        ]);
    }

    protected function levelUp(Hero $hero, int $level): Hero
    {
        $hero->level = $level;
        $hero->save();

        return $hero;
    }
}
