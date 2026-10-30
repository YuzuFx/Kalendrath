<?php

namespace OGame\Enums;

/**
 * The eight equipment slots of the hero paper doll (GDD section 5.5).
 */
enum EquipmentSlot: string
{
    case HEAD = 'head';
    case CHEST = 'chest';
    case HANDS = 'hands';
    case BELT = 'belt';
    case LEGS = 'legs';
    case BOOTS = 'boots';
    case WEAPON_MAIN_HAND = 'weapon_main_hand';
    case WEAPON_OFF_HAND = 'weapon_off_hand';

    /**
     * Translated display name of the slot.
     *
     * @return string
     */
    public function getName(): string
    {
        return __('t_heroes.slot.' . $this->value);
    }
}
