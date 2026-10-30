<?php

namespace OGame\Enums;

/**
 * The six hero archetypes (GDD section 5.5). Machine names are English; the
 * displayed names live in resources/lang/{fr,en}/t_heroes.php (lexique-kalendrath).
 */
enum HeroArchetype: string
{
    case WARRIOR = 'warrior';
    case SORCERER = 'sorcerer';
    case RANGER = 'ranger';
    case FAITHWARDEN = 'faithwarden';
    case EXPLORER = 'explorer';
    case STEWARD = 'steward';

    /**
     * Translated display name of the archetype.
     *
     * @return string
     */
    public function getName(): string
    {
        return __('t_heroes.archetype.' . $this->value);
    }

    /**
     * Archetypes without any combat path (GDD 5.5): they bring nothing to an
     * army accompanied in War Mode.
     *
     * @return bool
     */
    public function isNonCombatant(): bool
    {
        return in_array($this, [self::EXPLORER, self::STEWARD], true);
    }
}
