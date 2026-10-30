<?php

return [
    'ui' => [
        'page_title' => 'Heroes',
        'no_heroes' => 'No hero recruited yet.',
        'level' => 'Level',
        'xp' => 'Experience',
        'talent_points_available' => 'talent point(s) available',
        'talent_points_detail' => ':spent spent / :earned earned',
        'back_to_list' => 'Back to heroes',
    ],

    'status' => [
        'available' => 'Available',
        'on_mission' => 'On a mission',
        'unavailable' => 'Unavailable',
    ],

    'stat' => [
        'strength' => 'Strength',
        'intelligence' => 'Intelligence',
        'willpower' => 'Willpower',
        'dexterity' => 'Dexterity',
        'attack_power' => 'Attack power',
        'armor' => 'Armor',
        'life' => 'Life',
    ],

    'sheet' => [
        'stats_title' => 'Statistics',
        'talents_title' => 'Talent tree',
        'talents_empty' => 'No talent allocated yet.',
        'capstone_title' => 'Ultimate talent',
        'talent_rank' => 'Rank :rank / :max_rank',
        'talent_cost' => 'Cost: :cost point(s)',
        'equipment_title' => 'Equipment',
        'equipped_title' => 'Equipped',
        'inventory_title' => 'Inventory',
        'inventory_empty' => 'Inventory is empty.',
        'slot_empty' => 'Empty slot',
    ],

    'slot' => [
        'head' => 'Head',
        'chest' => 'Chest',
        'hands' => 'Hands',
        'belt' => 'Belt',
        'legs' => 'Legs',
        'boots' => 'Boots',
        'weapon_main_hand' => 'Weapon (right hand)',
        'weapon_off_hand' => 'Weapon (left hand)',
    ],

    'archetype' => [
        'warrior' => 'Warrior',
        'sorcerer' => 'Sorcerer',
        'ranger' => 'Ranger',
        'faithwarden' => 'Faithwarden',
        'explorer' => 'Explorer',
        'steward' => 'Steward',
    ],

    'role' => [
        'main' => 'Main hero',
        'advisor' => 'Advisor',
        'council' => 'The hero\'s Council',
    ],

    'scope' => [
        'hero' => 'Hero',
        'city' => 'City',
        'group' => 'Group',
        'empire' => 'Empire',
    ],

    'error' => [
        'main_hero_exists' => 'You already have a main hero.',
        'no_main_hero' => 'You need a main hero before appointing an advisor.',
        'council_full' => 'Every seat of the Council is taken.',
        'wrong_archetype' => 'This talent belongs to another archetype.',
        'max_rank_reached' => 'This talent is already at its maximum rank.',
        'not_enough_points' => 'Not enough talent points.',
        'prerequisite_missing' => 'This talent requires a neighbouring talent to be invested first.',
        'exclusive_choice' => 'This talent is incompatible with a choice you already made.',
        'advisor_single_branch' => 'An advisor follows a single path.',
        'item_not_owned' => 'This item does not belong to this hero.',
        'slot_not_allowed' => 'This slot is not available to this hero.',
        'level_too_low' => 'The hero\'s level is too low for this item.',
    ],
];
