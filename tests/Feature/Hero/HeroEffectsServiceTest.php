<?php

namespace Tests\Feature\Hero;

use OGame\Enums\EquipmentRarity;
use OGame\Enums\HeroArchetype;
use OGame\Enums\TalentEffectScope;
use OGame\Models\EquipmentItem;
use OGame\Models\Hero;
use OGame\Models\HeroEquipment;
use OGame\Models\HeroTalent;
use OGame\Services\Hero\HeroEffectsService;
use OGame\Services\Hero\HeroEquipmentService;
use OGame\Services\Hero\HeroRosterService;

class HeroEffectsServiceTest extends HeroTestCase
{
    private function invest(Hero $hero, string $type, float $value, TalentEffectScope $scope, int $rank = 1): void
    {
        $node = $this->node([
            'effect_type' => $type,
            'effect_value' => $value,
            'effect_scope' => $scope,
            'max_rank' => 5,
            'archetype' => $hero->archetype,
        ]);
        HeroTalent::create(['hero_id' => $hero->id, 'talent_node_id' => $node->id, 'rank' => $rank]);
    }

    private function wear(Hero $hero, string $slot, string $type, float $value, TalentEffectScope $scope): void
    {
        $item = EquipmentItem::create([
            'name' => 'Item ' . $slot,
            'slot' => $slot,
            'rarity' => EquipmentRarity::RARE->value,
            'effect_type' => $type,
            'effect_value' => $value,
            'effect_scope' => $scope,
        ]);
        $owned = HeroEquipment::create(['hero_id' => $hero->id, 'equipment_item_id' => $item->id]);
        resolve(HeroEquipmentService::class)->equip($hero, $owned);
    }

    public function testHeroWithoutTalentsOrEquipmentHasNoEffect(): void
    {
        $this->assertSame([], resolve(HeroEffectsService::class)->forHero($this->hero));
    }

    public function testTalentEffectIsMultipliedByRank(): void
    {
        $this->invest($this->hero, 'production_bonus_percent', 2, TalentEffectScope::CITY, 3);

        $effects = resolve(HeroEffectsService::class)->forHero($this->hero);

        $this->assertEqualsWithDelta(6.0, $effects['city']['production_bonus_percent'], 0.001);
    }

    public function testEquippedItemsCountButInventoryItemsDoNot(): void
    {
        $this->wear($this->hero, 'head', 'loot_bonus_percent', 5, TalentEffectScope::HERO);
        $item = EquipmentItem::create([
            'name' => 'Bag', 'slot' => 'chest', 'rarity' => 1,
            'effect_type' => 'loot_bonus_percent', 'effect_value' => 20, 'effect_scope' => TalentEffectScope::HERO,
        ]);
        HeroEquipment::create(['hero_id' => $this->hero->id, 'equipment_item_id' => $item->id]);

        $effects = resolve(HeroEffectsService::class)->forHero($this->hero);

        $this->assertEqualsWithDelta(5.0, $effects['hero']['loot_bonus_percent'], 0.001);
    }

    public function testTalentsAndEquipmentStackAdditively(): void
    {
        $this->invest($this->hero, 'loot_bonus_percent', 4, TalentEffectScope::HERO);
        $this->wear($this->hero, 'head', 'loot_bonus_percent', 3, TalentEffectScope::HERO);

        $effects = resolve(HeroEffectsService::class)->forHero($this->hero);

        $this->assertEqualsWithDelta(7.0, $effects['hero']['loot_bonus_percent'], 0.001);
    }

    public function testAxisCeilingIsApplied(): void
    {
        $this->invest($this->hero, 'production_bonus_percent', 6, TalentEffectScope::CITY);
        $this->wear($this->hero, 'head', 'production_bonus_percent', 9, TalentEffectScope::CITY);

        $effects = resolve(HeroEffectsService::class)->forHero($this->hero);

        $this->assertEqualsWithDelta(10.0, $effects['city']['production_bonus_percent'], 0.001);
    }

    public function testUnknownAxisIsNotCapped(): void
    {
        $this->invest($this->hero, 'reveal_enemy_before_engagement', 1, TalentEffectScope::CITY);

        $effects = resolve(HeroEffectsService::class)->forHero($this->hero);

        $this->assertEqualsWithDelta(1.0, $effects['city']['reveal_enemy_before_engagement'], 0.001);
    }

    public function testBonusStaysActiveWhileHeroIsOnMissionOrUnavailable(): void
    {
        $this->invest($this->hero, 'production_bonus_percent', 4, TalentEffectScope::EMPIRE);
        $this->hero->status = 'on_mission';
        $this->hero->save();
        $this->assertEqualsWithDelta(4.0, resolve(HeroEffectsService::class)->forEmpire($this->user)['production_bonus_percent'], 0.001);

        $this->hero->status = 'unavailable';
        $this->hero->save();
        $this->assertEqualsWithDelta(4.0, resolve(HeroEffectsService::class)->forEmpire($this->user)['production_bonus_percent'], 0.001);
    }

    public function testEmpireIgnoresNonEmpireScopes(): void
    {
        $this->invest($this->hero, 'production_bonus_percent', 4, TalentEffectScope::CITY);

        $this->assertSame([], resolve(HeroEffectsService::class)->forEmpire($this->user));
    }

    public function testAdvisorsSumIsCappedAtAFractionOfTheAxisCeiling(): void
    {
        $roster = resolve(HeroRosterService::class);
        for ($i = 0; $i < 4; $i++) {
            $advisor = $roster->recruitAdvisor($this->user, HeroArchetype::STEWARD, 'Steward ' . $i);
            $this->invest($advisor, 'production_bonus_percent', 3, TalentEffectScope::EMPIRE);
        }

        // 4 x 3 = 12, capped at 10 (axis ceiling) x 0.5 (advisor ratio) = 5.
        $effects = resolve(HeroEffectsService::class)->forEmpire($this->user);

        $this->assertEqualsWithDelta(5.0, $effects['production_bonus_percent'], 0.001);
    }

    public function testAdvisorBonusesStackWithTheMainHeroBonus(): void
    {
        $this->invest($this->hero, 'production_bonus_percent', 8, TalentEffectScope::EMPIRE);
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::STEWARD, 'Steward');
        $this->invest($advisor, 'production_bonus_percent', 2, TalentEffectScope::EMPIRE);

        $effects = resolve(HeroEffectsService::class)->forEmpire($this->user);

        $this->assertEqualsWithDelta(10.0, $effects['production_bonus_percent'], 0.001);
    }

    public function testAdvisorHeroScopedEffectsDoNotReachTheEmpire(): void
    {
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::WARRIOR, 'Squire');
        $this->invest($advisor, 'loot_bonus_percent', 5, TalentEffectScope::HERO);

        $this->assertSame([], resolve(HeroEffectsService::class)->forEmpire($this->user));
    }
}
