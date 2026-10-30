<?php

namespace OGame\Enums;

/**
 * A player has exactly one main hero and up to four advisors, the hero's
 * Council (GDD section 5.5, revision of 2026-10-11).
 */
enum HeroRole: string
{
    case MAIN = 'main';
    case ADVISOR = 'advisor';
}
