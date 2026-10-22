---
name: lexique-kalendrath
description: Lexique de Kalendrath entre les noms OGameX du code (machine names) et les noms affichés au joueur, en français. À utiliser dès qu'on écrit un texte destiné au joueur (libellé d'interface, traduction, description, talent, objet), qu'on nomme un nouvel élément de jeu, qu'on lit ou écrit du code qui manipule des bâtiments, recherches, unités ou ressources, ou qu'on rédige de la documentation de jeu.
---

# Lexique de Kalendrath

## Règles

- **Le contenu vu par le joueur est en français d'abord** (décidé le 2026-09-15) : noms, libellés, descriptions, talents, objets. L'anglais et les autres langues viendront par `resources/lang/`.
- **Le code reste en anglais** : colonnes, classes, machine names. On ne renomme pas `metal_mine` en `scierie` dans le code : le domaine reste proche de l'upstream OGameX. Seul le texte affiché change.
- **Ne jamais inventer un nom** pour un élément qui n'en a pas. Un nom absent du GDD s'écrit **[TBD]**, ou se propose explicitement comme « nom provisoire » à faire valider par Gregory.
- **La source de vérité est le GDD**, section 4 ([docs/game-design-document.md](../../../docs/game-design-document.md)) pour le jeu, et [docs/lore.md](../../../docs/lore.md) pour l'univers. Les tableaux ci-dessous sont un aide-mémoire. Si un nom change dans le GDD, mettre ce skill à jour dans le même commit.
- Les noms prennent une majuscule au premier mot et aux noms propres : « Atelier des Maîtres d'œuvre », « Puits de mana », « Portail des Sphères ».

## Ressources

| OGameX | Kalendrath |
|---|---|
| Métal (`metal`) | Bois |
| Cristal (`crystal`) | Fer |
| Deutérium (`deuterium`) | Mana |
| Énergie (`energy`) | Nourriture (ressource stockée, pas d'énergie) |

Règle de coût : **la Nourriture suit les êtres vivants, jamais la pierre** (unités, héros, certaines recherches de logistique ; jamais les bâtiments).

## Bâtiments

| Machine name | Kalendrath |
|---|---|
| `metal_mine` | Scierie |
| `crystal_mine` | Mine de fer |
| `deuterium_synthesizer` | Puits de mana |
| `solar_plant` | Champ de blé |
| `metal_store` | Entrepôt de bois |
| `crystal_store` | Entrepôt de fer |
| `deuterium_store` | Réservoir de mana |
| *(nouveau)* | Silo de nourriture |
| `shipyard` | Académie Militaire |
| `research_lab` | Institut Arcanique |
| `robot_factory` | Atelier des Maîtres d'œuvre |
| `nano_factory` | Atelier des Automates Arcaniques |
| `alliance_depot` | Ambassade |
| `space_dock` | Hôpital |
| `sensor_phalanx` | Tour de guet arcanique |
| `jump_gate` | Portail des Sphères |
| *(nouveau)* | Hôtel de ville (colonies) / Donjon (capitale) |
| *(nouveau)* | Forge (craft) — distincte de la recherche « Forge des Armures » |
| *(nouveau)* | Atelier des Remparts (défenses) |

Supprimés : `fusion_plant`, `lunar_base`, `missile_silo`. `terraformer` devient la recherche Rite d'Ancrage Tellurique.

Paliers de cité : Hameau, Village, Bourg, Cité fortifiée, Citadelle, Métropole.

## Recherches

| Machine name | Kalendrath |
|---|---|
| `energy_technology` | Abondance |
| `combustion_drive` | Endurance du Fantassin |
| `impulse_drive` | Art Équestre |
| `hyperspace_drive` | Ingénierie de Siège |
| `espionage_technology` | Espionnage |
| `computer_technology` | Chaîne de Ravitaillement |
| `astrophysics` | Découverte Tellurique |
| `weapon_technology` | Affûtage (palier 1 de la chaîne d'attaque) |
| *(nouveau)* | Alliage de Guerre, Runes de Combat, Bénédiction des Armes (paliers 2 à 4) |
| `armor_technology` | Forge des Armures |
| `shielding_technology` | Infusion Arcanique |
| `terraformer` | Rite d'Ancrage Tellurique |
| `laser_technology` | Lecture des Runes — *nom provisoire* |
| `ion_technology` | Résonance du Mana — *nom provisoire* |
| `plasma_technology` | Arcanes des Obélisques — *nom provisoire* |

Supprimées : `hyperspace_technology`, `intergalactic_research_network`, `graviton_technology`.

## Unités

| Machine name | Kalendrath | Catégorie · branche de l'Académie |
|---|---|---|
| `light_fighter` | Soldat | sol · infanterie |
| `heavy_fighter` | Garde | sol · infanterie |
| *(nouveau)* | Piquier des Marches | sol · infanterie |
| *(nouveau)* | Franc-Archer | sol · infanterie |
| `cruiser` | Cavalier | monté · cavalerie |
| `battlecruiser` | Pourfendeur | monté · cavalerie |
| *(nouveau)* | Chevaucheur des Plaines | monté · cavalerie |
| *(nouveau)* | Mage de Combat | sol · magie |
| `destroyer` | Rôdeur des ombres | sol · magie |
| `battle_ship` | Paladin | monté · magie |
| `bomber` | Brise-Rempart | siège · siège |
| *(nouveau)* | Catapulte de Rupture | siège · siège |
| `recycler` | Récupérateur | civil |
| `small_cargo` | Caravane | civil |
| `large_cargo` | Convoi | civil |
| `espionage_probe` | Éclaireur | civil |
| `colony_ship` | Pionnier | civil |

**[TBD]** : `solar_satellite`, `crawler`, `pathfinder`, `reaper`, unité de soin. Supprimée : `deathstar`.

## Structure, héros, univers

- Position → **Éclat** ; planète colonisée → **Ville** ; galaxie / système / position → **Région / Contrée / Éclat**.
- Alliance → **Alliance** ; officiers OGame → **Conseillers** ; débris → **Champ de ruines**.
- Archétypes de héros : Guerrier, Sorcier, Rôdeur, Gardien de la Foi, Explorateur, Intendant.
- Univers : **Kalendrath** (le monde et le jeu), les **Straumar**, les **Neuf Sphères**, la **Rupture**, les **Vahrun**, **Kaelhelm** (la cité naine-elfique engloutie), le **Serment Rompu**, le **Gouffre**, les **Obélisques**.
