<?php

return [
    'ui' => [
        'page_title' => 'Héros',
        'no_heroes' => 'Aucun héros recruté pour le moment.',
        'level' => 'Niveau',
        'xp' => 'Expérience',
        'talent_points_available' => 'point(s) de talent disponible(s)',
        'talent_points_detail' => ':spent dépensé(s) / :earned gagné(s)',
        'back_to_list' => 'Retour aux héros',
    ],

    'status' => [
        'available' => 'Disponible',
        'on_mission' => 'En mission',
        'unavailable' => 'Indisponible',
    ],

    'stat' => [
        'strength' => 'Force',
        'intelligence' => 'Intelligence',
        'willpower' => 'Volonté',
        'dexterity' => 'Dextérité',
        'attack_power' => 'Puissance d\'attaque',
        'armor' => 'Armure',
        'life' => 'Vie',
    ],

    'sheet' => [
        'stats_title' => 'Statistiques',
        'talents_title' => 'Arbre de talents',
        'talents_empty' => 'Aucun talent alloué pour le moment.',
        'capstone_title' => 'Talent ultime',
        'talent_rank' => 'Rang :rank / :max_rank',
        'talent_cost' => 'Coût : :cost point(s)',
        'equipment_title' => 'Équipement',
        'equipped_title' => 'Équipé',
        'inventory_title' => 'Inventaire',
        'inventory_empty' => 'Inventaire vide.',
        'slot_empty' => 'Emplacement vide',
    ],

    'slot' => [
        'head' => 'Tête',
        'chest' => 'Torse',
        'hands' => 'Mains',
        'belt' => 'Ceinture',
        'legs' => 'Jambes',
        'boots' => 'Bottes',
        'weapon_main_hand' => 'Arme (main droite)',
        'weapon_off_hand' => 'Arme (main gauche)',
    ],

    'archetype' => [
        'warrior' => 'Guerrier',
        'sorcerer' => 'Sorcier',
        'ranger' => 'Rôdeur',
        'faithwarden' => 'Gardien de la Foi',
        'explorer' => 'Explorateur',
        'steward' => 'Intendant',
    ],

    'role' => [
        'main' => 'Héros principal',
        'advisor' => 'Conseiller',
        'council' => 'Conseil du héros',
    ],

    'scope' => [
        'hero' => 'Héros',
        'city' => 'Ville',
        'group' => 'Groupe',
        'empire' => 'Empire',
    ],

    'error' => [
        'main_hero_exists' => 'Vous avez déjà un héros principal.',
        'no_main_hero' => 'Il faut un héros principal avant de nommer un conseiller.',
        'council_full' => 'Tous les sièges du conseil sont occupés.',
        'wrong_archetype' => 'Ce talent appartient à un autre archétype.',
        'max_rank_reached' => 'Ce talent est déjà au rang maximal.',
        'not_enough_points' => 'Points de talent insuffisants.',
        'prerequisite_missing' => 'Ce talent exige d\'avoir investi dans un talent voisin.',
        'exclusive_choice' => 'Ce talent est incompatible avec un choix déjà fait.',
        'advisor_single_branch' => 'Un conseiller ne suit qu\'une seule voie.',
        'item_not_owned' => 'Cet objet n\'appartient pas à ce héros.',
        'slot_not_allowed' => 'Cet emplacement n\'est pas disponible pour ce héros.',
        'level_too_low' => 'Le niveau du héros est trop bas pour cet objet.',
    ],
];
