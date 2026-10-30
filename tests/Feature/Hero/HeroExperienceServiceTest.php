<?php

namespace Tests\Feature\Hero;

use OGame\Enums\HeroArchetype;
use OGame\Services\Hero\HeroExperienceService;
use OGame\Services\Hero\HeroRosterService;
use OGame\Services\HeroLevelingService;

class HeroExperienceServiceTest extends HeroTestCase
{
    public function testXpBelowThresholdKeepsLevel(): void
    {
        resolve(HeroExperienceService::class)->grant($this->hero, 99);

        $this->assertSame(1, $this->hero->level);
        $this->assertSame(99, $this->hero->xp);
    }

    public function testXpAtThresholdLevelsUpWithCarryOver(): void
    {
        resolve(HeroExperienceService::class)->grant($this->hero, 130);

        $this->assertSame(2, $this->hero->level);
        $this->assertSame(30, $this->hero->xp);
    }

    public function testLargeGrantCrossesSeveralLevels(): void
    {
        $leveling = resolve(HeroLevelingService::class);
        $needed = $leveling->xpRequiredForLevel(1) + $leveling->xpRequiredForLevel(2) + 5;

        resolve(HeroExperienceService::class)->grant($this->hero, $needed);

        $this->assertSame(3, $this->hero->level);
        $this->assertSame(5, $this->hero->xp);
    }

    public function testMainHeroStopsAtLevelThirty(): void
    {
        resolve(HeroExperienceService::class)->grant($this->hero, 10_000_000);

        $this->assertSame(30, $this->hero->level);
        $this->assertSame(0, $this->hero->xp);
    }

    public function testAdvisorStopsAtAdvisorCap(): void
    {
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::RANGER, 'Scout');

        resolve(HeroExperienceService::class)->grant($advisor, 10_000_000);

        $this->assertSame(10, $advisor->level);
        $this->assertSame(0, $advisor->xp);
    }
}
