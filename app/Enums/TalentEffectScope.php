<?php

namespace OGame\Enums;

/**
 * Who/what a talent node's effect applies to (GDD section 5.5).
 * A "royaume" talent targets the hero's governed city rather than the
 * hero itself, and a support talent may target the hero's party/group.
 */
enum TalentEffectScope: string
{
    case HERO = 'hero';
    case CITY = 'city';
    case GROUP = 'group';

    /**
     * Display name (French — see project convention: game content is
     * authored in French for now, international locales come later).
     */
    public function getName(): string
    {
        return match ($this) {
            self::HERO => 'Héros',
            self::CITY => 'Ville',
            self::GROUP => 'Groupe',
        };
    }
}
