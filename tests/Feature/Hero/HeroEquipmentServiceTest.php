<?php

namespace Tests\Feature\Hero;

use OGame\Enums\EquipmentRarity;
use OGame\Enums\HeroArchetype;
use OGame\Exceptions\HeroRuleException;
use OGame\Models\EquipmentItem;
use OGame\Models\HeroEquipment;
use OGame\Services\Hero\HeroEquipmentService;
use OGame\Services\Hero\HeroRosterService;

class HeroEquipmentServiceTest extends HeroTestCase
{
    private function own(string $slot, int $requiredLevel = 1, \OGame\Models\Hero|null $hero = null): HeroEquipment
    {
        $item = EquipmentItem::create([
            'name' => 'Item ' . $slot,
            'slot' => $slot,
            'rarity' => EquipmentRarity::COMMON->value,
            'required_level' => $requiredLevel,
        ]);

        return HeroEquipment::create(['hero_id' => ($hero ?? $this->hero)->id, 'equipment_item_id' => $item->id]);
    }

    public function testEquipOccupiesTheSlot(): void
    {
        $helm = $this->own('head');

        resolve(HeroEquipmentService::class)->equip($this->hero, $helm);

        $this->assertTrue($helm->refresh()->equipped);
        $this->assertSame('head', $helm->refresh()->slot);
    }

    public function testEquippingOverAnOccupiedSlotSwapsTheItems(): void
    {
        $service = resolve(HeroEquipmentService::class);
        $old = $this->own('head');
        $new = $this->own('head');

        $service->equip($this->hero, $old);
        $service->equip($this->hero, $new);

        $this->assertFalse($old->refresh()->equipped);
        $this->assertNull($old->refresh()->slot);
        $this->assertTrue($new->refresh()->equipped);
    }

    public function testUnequipSendsTheItemBackToInventory(): void
    {
        $service = resolve(HeroEquipmentService::class);
        $helm = $this->own('head');
        $service->equip($this->hero, $helm);

        $service->unequip($this->hero, $helm);

        $this->assertFalse($helm->refresh()->equipped);
        $this->assertNull($helm->refresh()->slot);
    }

    public function testAllEightSlotsCanBeWornAtOnce(): void
    {
        $service = resolve(HeroEquipmentService::class);
        foreach (['head', 'chest', 'hands', 'belt', 'legs', 'boots', 'weapon_main_hand', 'weapon_off_hand'] as $slot) {
            $service->equip($this->hero, $this->own($slot));
        }

        $this->assertSame(8, HeroEquipment::where('hero_id', $this->hero->id)->where('equipped', true)->count());
    }

    public function testRequiredLevelIsEnforced(): void
    {
        $this->expectException(HeroRuleException::class);

        resolve(HeroEquipmentService::class)->equip($this->hero, $this->own('chest', 5));
    }

    public function testItemOfAnotherHeroIsRefused(): void
    {
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::WARRIOR, 'Squire');

        $this->expectException(HeroRuleException::class);
        resolve(HeroEquipmentService::class)->equip($this->hero, $this->own('head', 1, $advisor));
    }

    public function testUnknownSlotIsRefused(): void
    {
        $this->expectException(HeroRuleException::class);

        resolve(HeroEquipmentService::class)->equip($this->hero, $this->own('tail'));
    }

    public function testAdvisorSlotsFollowConfiguration(): void
    {
        config(['heroes.advisors.slots' => ['head']]);
        $advisor = resolve(HeroRosterService::class)->recruitAdvisor($this->user, HeroArchetype::WARRIOR, 'Squire');
        $service = resolve(HeroEquipmentService::class);

        $service->equip($advisor, $this->own('head', 1, $advisor));

        $this->expectException(HeroRuleException::class);
        $service->equip($advisor, $this->own('legs', 1, $advisor));
    }
}
