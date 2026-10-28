---
name: lexique-kalendrath
description: Lexique de Kalendrath entre les noms OGameX du code (machine names) et les noms affichés au joueur, en français et en anglais. À utiliser dès qu'on écrit un texte destiné au joueur (libellé d'interface, traduction, description, talent, objet), qu'on nomme un nouvel élément de jeu, qu'on lit ou écrit du code qui manipule des bâtiments, recherches, unités ou ressources, ou qu'on rédige de la documentation de jeu ou de la communication.
---

# Lexique de Kalendrath

## Règles

- **Le contenu vu par le joueur est conçu en français d'abord** (décidé le 2026-09-15), **et doit exister en anglais dès la première version publique** (décidé le 2026-10-27). Les autres langues viendront par `resources/lang/`.
- **Le code reste en anglais** : colonnes, classes, machine names. On ne renomme pas `metal_mine` en `sawmill` dans le code : le domaine reste proche de l'upstream OGameX. Seul le texte affiché change.
- **Ne jamais inventer un nom** pour un élément qui n'en a pas. Un nom absent du GDD s'écrit **[TBD]**, ou se propose explicitement comme « nom provisoire » à faire valider par Gregory, dans les deux langues.
- **La source de vérité est le GDD**, section 4 ([docs/game-design-document.md](../../../docs/game-design-document.md)), dont la 4.6 pour l'anglais, et [docs/lore.md](../../../docs/lore.md) pour l'univers. Les tableaux ci-dessous sont un aide-mémoire. Si un nom change dans le GDD, mettre ce skill à jour dans le même commit.
- **Majuscules.** En français, au premier mot et aux noms propres : « Atelier des Maîtres d'œuvre ». En anglais, à chaque mot important, comme un titre : « Master Builders' Workshop ».
- **Pièges de traduction** : Donjon = **Keep**, jamais *Dungeon* ; Rôdeur (archétype) = **Ranger**, Rôdeur des ombres (unité) = **Shadowstalker** ; Forge (bâtiment) = **Forge**, Forge des Armures (recherche) = **Armorsmithing**.

## Ressources

| OGameX | Français | Anglais |
|---|---|---|
| Métal (`metal`) | Bois | Wood |
| Cristal (`crystal`) | Fer | Iron |
| Deutérium (`deuterium`) | Mana | Mana |
| Énergie (`energy`) | Nourriture (ressource stockée, pas d'énergie) | Food |
| Matière noire (`dark_matter`) | **Kaelite** (monnaie premium, liée au compte) | Kaelite |

Règle de coût : **la Nourriture suit les êtres vivants, jamais la pierre** (unités, héros, certaines recherches de logistique ; jamais les bâtiments).

## Bâtiments

| Machine name | Français | Anglais |
|---|---|---|
| `metal_mine` | Scierie | Sawmill |
| `crystal_mine` | Mine de fer | Iron Mine |
| `deuterium_synthesizer` | Puits de mana | Mana Well |
| `solar_plant` | Champ de blé | Wheat Field |
| `metal_store` | Entrepôt de bois | Wood Storehouse |
| `crystal_store` | Entrepôt de fer | Iron Storehouse |
| `deuterium_store` | Réservoir de mana | Mana Reservoir |
| *(nouveau)* | Silo de nourriture | Granary |
| `shipyard` | Académie Militaire | Military Academy |
| `research_lab` | Institut Arcanique | Arcane Institute |
| `robot_factory` | Atelier des Maîtres d'œuvre | Master Builders' Workshop |
| `nano_factory` | Atelier des Automates Arcaniques | Arcane Automaton Workshop |
| `alliance_depot` | Ambassade | Embassy |
| `space_dock` | Hôpital | Infirmary |
| `sensor_phalanx` | Tour de guet arcanique | Arcane Watchtower |
| `jump_gate` | Portail des Sphères | Gate of the Spheres (court : Sphere Gate) |
| *(nouveau)* | Hôtel de ville (colonies) / Donjon (capitale) | Town Hall / Keep |
| *(nouveau)* | Forge (craft) | Forge |
| *(nouveau)* | Atelier des Remparts (défenses) | Rampart Workshop |

Supprimés : `fusion_plant`, `lunar_base`, `missile_silo`. `terraformer` devient la recherche Rite d'Ancrage Tellurique.

## Paliers de cité (10, validés le 2026-10-28, GDD 4.2)

| Palier | Niveaux d'Hôtel de ville | Français | Anglais |
|---|---|---|---|
| 1 | 1-3 | Hameau | Hamlet |
| 2 | 4-6 | Village | Village |
| 3 | 7-9 | Bourg | Market Town |
| 4 | 10-12 | Ville franche | Chartered Town |
| 5 | 13-15 | Place forte | Stronghold |
| 6 | 16-18 | Citadelle | Citadel |
| 7 | 19-21 | Cité-Obélisque | Obelisk City |
| 8 | 22-24 | Cité palatine | Palatine City |
| 9 | 25-27 | Métropole | Metropolis |
| 10 | 28-30 | Cité des Sphères | City of the Spheres |

Noms abandonnés, à ne plus employer : Cité fortifiée, Cité arcanique, *Free Town*.

## Recherches

| Machine name | Français | Anglais |
|---|---|---|
| `energy_technology` | Abondance | Abundance |
| `combustion_drive` | Endurance du Fantassin | Infantry Endurance |
| `impulse_drive` | Art Équestre | Horsemanship |
| `hyperspace_drive` | Ingénierie de Siège | Siege Engineering |
| `espionage_technology` | Espionnage | Espionage |
| `computer_technology` | Chaîne de Ravitaillement | Supply Lines |
| `astrophysics` | Découverte Tellurique | Telluric Survey |
| `weapon_technology` | Affûtage (palier 1 de la chaîne d'attaque) | Whetstone |
| *(nouveau)* | Alliage de Guerre, Runes de Combat, Bénédiction des Armes (paliers 2 à 4) | War Alloy, Battle Runes, Blessing of Arms |
| `armor_technology` | Forge des Armures | Armorsmithing |
| `shielding_technology` | Infusion Arcanique | Arcane Infusion |
| `terraformer` | Rite d'Ancrage Tellurique | Rite of Earthbinding |
| `laser_technology` | Lecture des Runes — *nom provisoire* | Runereading — *provisoire* |
| `ion_technology` | Résonance du Mana — *nom provisoire* | Mana Resonance — *provisoire* |
| `plasma_technology` | Arcanes des Obélisques — *nom provisoire* | Obelisk Arcana — *provisoire* |

Supprimées : `hyperspace_technology`, `intergalactic_research_network`, `graviton_technology`.

## Unités

| Machine name | Français | Anglais | Catégorie · branche de l'Académie |
|---|---|---|---|
| `light_fighter` | Soldat | Soldier | sol · infanterie |
| `heavy_fighter` | Garde | Guard | sol · infanterie |
| *(nouveau)* | Piquier des Marches | Marchland Pikeman | sol · infanterie |
| *(nouveau)* | Franc-Archer | Free Archer | sol · infanterie |
| `cruiser` | Cavalier | Horseman | monté · cavalerie |
| `battlecruiser` | Pourfendeur | Cleaver | monté · cavalerie |
| *(nouveau)* | Chevaucheur des Plaines | Plainsrider | monté · cavalerie |
| *(nouveau)* | Mage de Combat | Battlemage | sol · magie |
| `destroyer` | Rôdeur des ombres | Shadowstalker | sol · magie |
| `battle_ship` | Paladin | Paladin | monté · magie |
| `bomber` | Brise-Rempart | Wallbreaker | siège · siège |
| *(nouveau)* | Catapulte de Rupture | Sundering Catapult | siège · siège |
| `recycler` | Récupérateur | Salvager | civil |
| `small_cargo` | Caravane | Caravan | civil |
| `large_cargo` | Convoi | Convoy | civil |
| `espionage_probe` | Éclaireur | Scout | civil |
| `colony_ship` | Pionnier | Pioneer | civil |

**[TBD]** : `solar_satellite`, `crawler`, `pathfinder`, `reaper`, unité de soin. Supprimée : `deathstar`.

## Structure, héros, univers

| Français | Anglais |
|---|---|
| Éclat (position) ; Ville (planète colonisée) | Shard ; City |
| Région / Contrée / Éclat (galaxie / système / position) | Region / Reach / Shard |
| Alliance | Alliance |
| Conseillers (officiers OGame), le conseil du héros | Advisors, the hero's Council |
| Champ de ruines (débris) | Ruin Field |
| Mode de Guerre | War Mode |
| Prestige d'Empire | Imperial Prestige |
| Guerrier, Sorcier, Rôdeur, Gardien de la Foi, Explorateur, Intendant | Warrior, Sorcerer, Ranger, Faithwarden, Explorer, Steward |
| Les Neuf Sphères, la Rupture, le Serment Rompu, le Gouffre, les Obélisques | The Nine Spheres, the Sundering, the Broken Oath, the Abyss, the Obelisks |
| Kalendrath, Straumar (*Straumr*), Vahrun, Kaelhelm, Kaelite | inchangés |
