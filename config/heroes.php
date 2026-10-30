<?php

/*
|--------------------------------------------------------------------------
| Hero system tuning (GDD section 5.5)
|--------------------------------------------------------------------------
|
| Every value here is a tuning knob, not final balance (Phase 6). Values
| marked TBD are still open in the GDD.
*/
return [
    'advisors' => [
        // Seats of the hero's Council. Seats will later be unlocked by
        // Imperial Prestige tiers (GDD 5.6, not built yet): until then all open.
        'max_count' => 4,

        // Advisor level cap. GDD: 10 to 15, final value TBD.
        'max_level' => 10,

        // Ceiling of the SUM of the advisors' bonus on one axis, as a ratio of
        // the hero's own ceiling on that axis. GDD: one third to one half, TBD.
        'axis_cap_ratio' => 0.5,

        // Equipment slots available to an advisor ("lighter inventory",
        // detail TBD in the GDD): all eight until decided.
        'slots' => [
            'head', 'chest', 'hands', 'belt', 'legs', 'boots', 'weapon_main_hand', 'weapon_off_hand',
        ],
    ],

    /*
     * Ceiling of a hero's total bonus per effect axis (talents + equipment),
     * from the "Cadre d'équilibrage des talents" table of the GDD (cap at 29
     * points). An effect_type absent from this list is not capped.
     */
    'axis_caps' => [
        'loot_bonus_percent' => 29,
        'hero_stat_bonus_percent' => 29,
        'unavailability_duration_reduction_percent' => 29,
        'wounded_recovery_bonus_percent' => 25,
        'fuel_consumption_reduction_percent' => 20,
        'troop_combat_bonus_percent' => 15,
        'mission_travel_time_reduction_percent' => 15,
        'build_research_time_reduction_percent' => 15,
        'production_bonus_percent' => 10,
        'construction_cost_reduction_percent' => 8,
    ],
];
