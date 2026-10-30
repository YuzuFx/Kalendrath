<?php

namespace Tests\Feature\Hero;

use OGame\Enums\HeroArchetype;
use OGame\Exceptions\HeroRuleException;
use OGame\Models\HeroTalent;
use OGame\Services\Hero\HeroRosterService;
use OGame\Services\Hero\HeroTalentService;

class HeroTalentServiceTest extends HeroTestCase
{
    private function service(): HeroTalentService
    {
        return resolve(HeroTalentService::class);
    }

    public function testLevelOneHeroHasNoPoint(): void
    {
        $this->assertSame(0, $this->service()->availablePoints($this->hero));

        $this->expectException(HeroRuleException::class);
        $this->service()->allocate($this->hero, $this->node());
    }

    public function testAllocatingSpendsPoints(): void
    {
        $this->levelUp($this->hero, 5);

        $this->service()->allocate($this->hero, $this->node());

        $this->assertSame(3, $this->service()->availablePoints($this->hero));
        $this->assertSame(1, $this->hero->refresh()->talent_points_spent);
    }

    public function testRankCannotExceedMaxRank(): void
    {
        $this->levelUp($this->hero, 10);
        $node = $this->node(['max_rank' => 2]);

        $this->service()->allocate($this->hero, $node);
        $talent = $this->service()->allocate($this->hero, $node);
        $this->assertSame(2, $talent->rank);

        $this->expectException(HeroRuleException::class);
        $this->service()->allocate($this->hero, $node);
    }

    public function testPointCostIsChargedPerRank(): void
    {
        $this->levelUp($this->hero, 4);
        $node = $this->node(['point_cost' => 3]);

        $this->service()->allocate($this->hero, $node);

        $this->assertSame(0, $this->service()->availablePoints($this->hero));
    }

    public function testNodeOfAnotherArchetypeIsRefused(): void
    {
        $this->levelUp($this->hero, 5);

        $this->expectException(HeroRuleException::class);
        $this->service()->allocate($this->hero, $this->node(['archetype' => 'sorcerer']));
    }

    public function testPrerequisiteIsAnyOfNotAllOf(): void
    {
        $this->levelUp($this->hero, 10);
        $parentA = $this->node(['name' => 'A']);
        $parentB = $this->node(['name' => 'B', 'position' => 1]);
        $child = $this->node(['name' => 'Child', 'tier' => 2]);
        $child->prerequisites()->attach([$parentA->id, $parentB->id]);

        try {
            $this->service()->allocate($this->hero, $child);
            $this->fail('A node with prerequisites must not be allocatable before any parent.');
        } catch (HeroRuleException) {
            // expected
        }

        $this->service()->allocate($this->hero, $parentB);
        $this->service()->allocate($this->hero, $child);

        $this->assertSame(2, HeroTalent::where('hero_id', $this->hero->id)->count());
    }

    public function testExclusiveChoiceBlocksTheOtherNode(): void
    {
        $this->levelUp($this->hero, 10);
        $left = $this->node(['name' => 'Left', 'choice_group' => 'tier4']);
        $right = $this->node(['name' => 'Right', 'position' => 1, 'choice_group' => 'tier4']);

        $this->service()->allocate($this->hero, $left);

        $this->expectException(HeroRuleException::class);
        $this->service()->allocate($this->hero, $right);
    }

    public function testAdvisorIsLimitedToOneBranch(): void
    {
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::WARRIOR, 'Squire');
        $this->levelUp($advisor, 10);
        $blade = $this->node(['branch' => 'blade']);
        $bastion = $this->node(['branch' => 'bastion']);

        $this->service()->allocate($advisor, $blade);

        $this->expectException(HeroRuleException::class);
        $this->service()->allocate($advisor, $bastion);
    }

    public function testMainHeroMayMixBranches(): void
    {
        $this->levelUp($this->hero, 10);

        $this->service()->allocate($this->hero, $this->node(['branch' => 'blade']));
        $this->service()->allocate($this->hero, $this->node(['branch' => 'bastion']));

        $this->assertSame(2, $this->hero->refresh()->talent_points_spent);
    }

    public function testRespecRefundsEverything(): void
    {
        $this->levelUp($this->hero, 10);
        $this->service()->allocate($this->hero, $this->node());
        $this->service()->allocate($this->hero, $this->node(['name' => 'Other', 'position' => 1]));

        $this->service()->respec($this->hero);

        $this->assertSame(9, $this->service()->availablePoints($this->hero->refresh()));
        $this->assertSame(0, HeroTalent::where('hero_id', $this->hero->id)->count());
    }
}
