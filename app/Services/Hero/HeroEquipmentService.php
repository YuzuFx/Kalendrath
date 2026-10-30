<?php

namespace OGame\Services\Hero;

use Illuminate\Support\Facades\DB;
use OGame\Enums\EquipmentSlot;
use OGame\Enums\HeroRole;
use OGame\Exceptions\HeroRuleException;
use OGame\Models\Hero;
use OGame\Models\HeroEquipment;

/**
 * Equips and unequips a hero's items on the eight paper-doll slots
 * (GDD section 5.5). One item per slot; equipping over an occupied slot
 * sends the previous item back to the inventory.
 */
class HeroEquipmentService
{
    /**
     * Wears an owned item.
     *
     * @param Hero $hero
     * @param HeroEquipment $owned
     * @return HeroEquipment
     */
    public function equip(Hero $hero, HeroEquipment $owned): HeroEquipment
    {
        if ($owned->hero_id !== $hero->id) {
            throw HeroRuleException::because('item_not_owned');
        }

        $item = $owned->equipmentItem;
        $slot = EquipmentSlot::tryFrom($item->slot ?? '');
        if ($slot === null || !in_array($slot->value, $this->allowedSlots($hero), true)) {
            throw HeroRuleException::because('slot_not_allowed');
        }

        if ($hero->level < ($item->required_level ?? 1)) {
            throw HeroRuleException::because('level_too_low');
        }

        return DB::transaction(function () use ($hero, $owned, $slot): HeroEquipment {
            // Free the slot first: the unique (hero_id, slot) index allows a single occupant.
            HeroEquipment::where('hero_id', $hero->id)
                ->where('slot', $slot->value)
                ->where('id', '!=', $owned->id)
                ->update(['equipped' => false, 'slot' => null]);

            $owned->equipped = true;
            $owned->slot = $slot->value;
            $owned->save();

            return $owned;
        });
    }

    /**
     * Sends a worn item back to the inventory.
     *
     * @param Hero $hero
     * @param HeroEquipment $owned
     * @return HeroEquipment
     */
    public function unequip(Hero $hero, HeroEquipment $owned): HeroEquipment
    {
        if ($owned->hero_id !== $hero->id) {
            throw HeroRuleException::because('item_not_owned');
        }

        $owned->equipped = false;
        $owned->slot = null;
        $owned->save();

        return $owned;
    }

    /**
     * Slots the hero can use: all of them for the main hero, a configurable
     * subset for advisors ("lighter inventory").
     *
     * @param Hero $hero
     * @return list<string>
     */
    public function allowedSlots(Hero $hero): array
    {
        if ($hero->role === HeroRole::ADVISOR) {
            /** @var list<string> $slots */
            $slots = config('heroes.advisors.slots');

            return $slots;
        }

        return array_map(fn (EquipmentSlot $slot) => $slot->value, EquipmentSlot::cases());
    }
}
