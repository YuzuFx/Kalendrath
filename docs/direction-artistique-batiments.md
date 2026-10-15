# Direction artistique — Prompts visuels pour les bâtiments et les villes

*Document de travail pour la Phase 3a. Briefs prêts à coller dans Midjourney : **un par bâtiment et par palier de niveau**, plus les 6 paliers de cité et la capitale. Prompts en anglais, noms et rôles en français (cf. [direction-artistique-unites.md](direction-artistique-unites.md) pour la même logique). La liste des bâtiments et les paliers de cité sont dans le [GDD, section 4.2](game-design-document.md).*

Liste figée le 2026-10-12. Le lexique reste vivant : si un nom change, seul l'intitulé de la section change, pas le prompt.

**Mis à jour le 2026-10-13** après le premier essai sur la Scierie (voir « Retour d'essai » plus bas) : structure de prompt inversée (sujet d'abord), influence du style réduite, et **l'image d'un bâtiment évolue avec son niveau**.

---

## Principe : l'image évolue avec le niveau du bâtiment

Les niveaux montent à 30 et plus. Une scierie de niveau 25 ne peut pas ressembler à la cabane du niveau 1. Chaque bâtiment a donc **3 illustrations**, choisies par l'interface selon le niveau :

| Palier visuel | Niveaux | Allure générale |
|---|---|---|
| **1 — Modeste** | 1 à 14 | Petit, simple, utilitaire : un toit, une fonction lisible, très peu de magie visible |
| **2 — Développé** | 15 à 29 | Plus grand, plus solide (pierre, plusieurs corps de bâtiment), activité plus intense, un peu de mana visible |
| **3 — Majeur** | 30 et plus | Imposant, mécanismes ou architecture arcaniques, lueur de mana nettement visible |

- **Côté technique :** une simple table de seuils dans la configuration de l'interface React (niveau → image). Aucun impact sur le domaine PHP.
- **Au-delà de 30 :** un 4e palier (par ex. à 45) reste possible si les trois premiers fonctionnent bien. Ne pas le produire d'emblée.
- **Cohérence entre paliers :** même lieu, même orientation, même cadrage. Pour les paliers 2 et 3, partir de l'image de palier 1 validée comme référence d'image (`--iw`, à tester) ou utiliser Vary (Region).
- **Hôtel de ville et Donjon :** le Donjon suit ces 3 paliers de niveau ; l'Hôtel de ville a **ses propres paliers** (**5 pour l'instant**, un palier tous les 3 niveaux : 1-3 / 4-6 / 7-9 / 10-12 / 13-15) car il est plafonné au niveau 15 pour le moment. Les images de **cité** (bannière de la Vue d'ensemble) sont une autre série, indexée sur les paliers de cité.
- **Ordre de production :** voir en fin de document. Les bâtiments où l'évolution est la plus parlante passent en premier.

---

## Réglage commun

**Ancre de style : la cité validée** (celle de la bannière de la Vue d'ensemble), pas le portrait des unités. Le `--sref` du portrait reste réservé aux personnages.

**Retour d'essai (Scierie, 2026-10-13).** La première version (préambule long avant le sujet, `--sw 200`, `--stylize 250`) donnait un **manoir** : toits multiples, tourelles, aucune lecture de scierie. Causes : sujet noyé après 80 mots de style, `--sref` qui importe l'architecture dense de la cité, aucune consigne de modestie. La version corrigée (sujet d'abord, `--sw 80`, `--stylize 150`, exclusions explicites) donne une vraie scierie lisible. **Ces réglages sont désormais la base de tous les prompts.**

**Leçons du palier 2 de la Scierie (2026-10-13) :**
- **Ne pas décrire d'eau au sol.** « A log pond with floating logs » et « mill race » ont mis les troncs dans l'eau à chaque génération. Écrire « on dry ground » et exclure `water, pond, floating logs`.
- **Nettoyer l'image de référence avant de s'en servir.** Une zone noire dans l'image de palier 1 se recopiait dans tous les rendus du palier 2. L'image de référence doit avoir un décor complet, sans bandes noires.
- **Une référence au cadrage serré empêche le bâtiment de paraître plus grand.** Demander explicitement « pulled back wide shot showing the whole site ».
- **Pour qu'un palier se distingue, nommer des éléments visibles de grandeur** (étage, murs de pierre, deux toits, cheminée, grue), pas seulement « larger ».
- **`--iw 0.5`** donne une bonne parenté sans copier le cadrage. Vérifier que `--iw` n'est pas ignoré : deux tirets simples (pas un tiret long), valeur avec un point.

**Leçons du palier 3 de la Scierie (2026-10-13) :**
- **L'erreur « Skipped --iw because the required reference is missing »** signifie que l'URL de référence n'est pas au tout début du prompt, ou qu'un placeholder (`[URL_PALIER_2]`) est resté tel quel. Midjourney génère alors sans référence : le résultat ne prouve rien sur la cohérence entre paliers. Toujours coller la vraie URL `https://cdn.midjourney.com/.../0_0.png` en première position.
- **Un palier ne doit pas être un simple agrandissement.** Avec `--iw 0.5` et « plus grand, plus de toits, plus de roues », le palier 3 restait un palier 2 un peu plus lumineux. Ce qui fait la différence : **changer de silhouette** (tour à engrenage, aqueduc surélevé, pylônes à cristaux), **monter le point de vue** (`from higher up`) et **baisser `--iw` à 0.25**.
- **Le mana doit devenir la lumière principale du palier 3** (`as the main light accent`), avec des motifs nommés (cercles runiques sur les murs et au sol, cristaux sur pylônes), sinon il se noie dans les lueurs orange des fenêtres.
- **Garder de la marge en haut du cadre** : l'engrenage ou la tour tendent à toucher le bord supérieur.

**Structure d'un prompt, dans cet ordre :**

```
[SUJET du bâtiment et du palier] + [STYLE du palier] + [PARAMÈTRES]
```

Le sujet vient en premier car Midjourney pèse davantage le début du prompt.

### Style (une variante par palier)

À coller **après** le sujet. Seule la ligne d'accent de mana change d'un palier à l'autre.

**Palier 1 :**
```
Dark heroic fantasy concept art, weathered timber and stone, muted earthy palette (iron grey, aged bronze, oxblood red), a few small violet-blue mana lanterns as the only accent, painterly digital illustration, dusk light, three-quarter view slightly from above, centered wide shot, strong simple silhouette readable at small size
```

**Palier 2 :** remplacer l'accent par
```
a few violet-blue mana glows on runes and lanterns as accent
```

**Palier 3 :** remplacer l'accent par
```
a clearly visible violet-blue arcane glow on runes and crystals
```

### Paramètres

**Palier 1 :**
```
--ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, people crowd, photography, black borders, animals, manor, mansion, castle, towers, turrets, multiple roofs, complex roofline
```

**Paliers 2 et 3 :** même chose, **sans** la fin d'exclusion (`manor … complex roofline`), puisque ces bâtiments ont le droit d'être plus complexes :
```
--ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, people crowd, photography, black borders, animals
```

Réglage du `--sw` : départ à 80. Si l'ambiance de la cité n'est pas assez reprise, monter vers 120. Si tous les bâtiments se ressemblent, redescendre. Les bâtiments naturellement imposants (Donjon, Portail, Académie) supportent mieux un `--sw` plus élevé.

**Formats :**
- carte de bâtiment (liste des bâtiments) : `--ar 3:2`, bâtiment centré, à recadrer en carte sur les écrans ;
- paliers de cité (bannière de la Vue d'ensemble) : `--ar 7:3` (la cité validée fait 3360 × 1440) ;
- icônes de menu : pas ici, elles seront dessinées en SVG avec le design system.

**Lisibilité.** Chaque image doit rester reconnaissable réduite à environ 300 px de large : un seul sujet, une silhouette distincte, pas de foule. Test à faire à chaque validation.

### Exemple composé (Scierie, palier 1, validé en essai)

```
A simple humble sawmill, one single low rectangular open-sided timber shed with one plain gable roof, a long saw frame and big logs clearly visible under it, a water wheel on the side, huge stacks of pale logs in the foreground, small hut-sized and utilitarian, a river beside it. Dark heroic fantasy concept art, weathered timber and stone, muted earthy palette (iron grey, aged bronze, oxblood red), a few small violet-blue mana lanterns as the only accent, painterly digital illustration, dusk light, three-quarter view slightly from above, centered wide shot, strong simple silhouette readable at small size --ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, people crowd, photography, black borders, animals, manor, mansion, castle, towers, turrets, multiple roofs, complex roofline
```

---

## ⛏️ Production

### Scierie *(bois)*

**Palier 1 (niv. 1-14)** — *Validé en essai.*
```
A simple humble sawmill, one single low rectangular open-sided timber shed with one plain gable roof, a long saw frame and big logs clearly visible under it, a water wheel on the side, huge stacks of pale logs in the foreground, small hut-sized and utilitarian, a river beside it
```
**Palier 2 (niv. 15-29)** — *Validé le 2026-10-13* ([image](direction-artistique/references/batiment-scierie-palier2.png)). Se lance avec l'image de palier 1 en référence d'image au début du prompt, et `--iw 0.5` à la place du début des paramètres.
```
[URL_PALIER_1] The same sawmill grown into a larger sawmill complex at the edge of the same dark pine forest, pulled back wide shot showing the whole site on dry ground, a long stone-walled hall with a timber upper floor and two connected gable roofs of weathered shingles, a stone chimney, an open ground-floor work bay with several saw frames cutting logs in a row, one big water wheel on the side, a covered lumber shed, a loading crane over a cart, tidy stacks of pale logs and cut planks in a dry yard, busy and productive, clearly a proper workshop and no longer a hut
```
Paramètres : ceux du palier 2 ci-dessus, avec `--iw 0.5` en tête et `black background, water, pond, floating logs` ajoutés à l'exclusion.

**Palier 3 (niv. 30+)** — *Validé le 2026-10-13* ([image](direction-artistique/references/batiment-scierie-palier3.png), [lien Midjourney](https://cdn.midjourney.com/139de172-4d85-4330-9c76-7afd14695367/0_0.png)). Se lance avec l'image de palier 2 en référence, mais avec `--iw 0.25`. La première version (simple agrandissement du palier 2, `--iw 0.5`) donnait un résultat trop proche du palier 2 : voir les leçons plus haut.
```
[URL_PALIER_2] The same sawmill site transformed into a vast arcane lumber manufactory, pulled back wide shot from higher up showing the whole complex on dry ground, a massive stone factory hall three times larger than before with tall arched windows and a high slate roof, a tall stone tower with a huge rune-etched bronze gear mechanism on top, a long elevated wooden aqueduct feeding a row of four giant water wheels, a mechanical log lift carrying logs up into the hall, glowing violet-blue rune circles carved into the walls and ground, floating violet-blue mana crystals mounted on iron pylons along the roofline, enormous ordered stacks of pale logs and planks in a wide paved yard, several carts, the dark pine forest cleared back around it, monumental and industrial, a clearly major arcane production site
```
Style : celui du palier 3, avec l'accent `strong violet-blue arcane glow as the main light accent` et un point de vue `three-quarter view high above`. Paramètres : `--iw 0.25` en tête, puis ceux du palier 2 avec `black background, water, pond, floating logs, small hut` ajoutés à l'exclusion.

### Mine de fer *(fer)*

**Palier 1** — *Validé le 2026-10-13* ([image](direction-artistique/references/batiment-mine-de-fer-palier1.png), [lien Midjourney](https://cdn.midjourney.com/6618e10e-66c3-4d50-8a84-3b9a3c64a8f3/0_0.png)). Prompt réellement utilisé, avec le style et les paramètres du palier 1 :
```
A simple humble iron mine, one single dark tunnel mouth cut into a rocky hillside with rough timber supports and a plain low timber lean-to beside it, two small ore carts on a short rail track, a pile of rust-red iron ore in the foreground, a hand-cranked hoist over a small shaft, a few hanging torches, small and rough and utilitarian, a bare rocky hillside with a few dark pines
```
*Retours d'essai :* `--sw 80` confirmé sur un deuxième bâtiment (ambiance de la cité reprise, pas de manoir). Le cadrage sort **plus serré** que « centered wide shot » et le tas de minerai domine le premier plan ; aucune lanterne de mana n'apparaît (acceptable au palier 1). **Pour le palier 2 :** exiger `pulled back wide shot showing the whole site`, nommer des éléments de grandeur (bâtiment de pierre, chevalement, forge) et demander un accent de mana visible, sinon la référence serrée bloquera la montée en taille.
**Palier 2**
```
A developed iron mine with a stone-built gatehouse, a long rail track with a line of ore carts, a lift headframe over a vertical shaft, a smelting shed with a smoking chimney, ore sorting tables, piles of grey slag and red ore, workers with barrows
```
**Palier 3**
```
A vast fortified mining complex carved into a cliff, multiple tunnel entrances at different levels linked by rail bridges, a large steam-less mechanical winding tower, an ore crushing hall, a furnace block with orange glow, thin violet-blue crystal veins glowing in the rock walls, imposing and heavy
```

### Puits de mana *(mana)*

**Palier 1** — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-puits-de-mana-palier1.png), [lien Midjourney](https://cdn.midjourney.com/74a58407-9f05-44e3-85a4-a48b20097199/0_0.png)). Le premier brief (puits seul, « no building around it ») donnait un puits de jardin isolé : il faut un **site d'extraction**, cadré large, avec la colonne de mana qui sort bien **du puits**.
```
A simple humble mana extraction site, a rough stone well ring set in a rocky hollow with a crude timber windlass and rope hoisting a wooden bucket, a thin column of violet-blue mana rising from the shaft, a small low timber-and-stone shelter with one plain roof beside it holding crates and crystal-filled barrels, a small cart with raw violet-blue crystals, a few raw crystal clusters among the rocks, rough path worn into the dry ground, pulled back wide shot showing the whole small site against a dark rocky cliff, modest and utilitarian
```
Paramètres : ceux du palier 1, avec `complex roofline, water, black background` à la fin de l'exclusion (sans `multiple roofs`). Vérifier à chaque tirage que la colonne part du puits et non de l'arrière-plan.

**Palier 2**
```
A mana well wellhouse built in carved stone, a wider stone ring with a bronze-framed hoist and copper chains lifting crystal-laden buckets, rune pillars around it, cobbled platform, a clear column of violet-blue mana rising, attendants in dark robes carrying crystals
```
**Palier 3**
```
A grand mana wellspring sanctum, a circular stone platform with tall rune pylons and bronze rings, a powerful pillar of violet-blue mana rising from a deep shaft high into the sky, large crystal clusters, copper conduits and chains lifting enormous crystals, glowing cracked ground, awe-inspiring and arcane
```

### Champ de blé *(nourriture)*

**Palier 1** — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-champ-de-ble-palier1.png), [lien Midjourney](https://cdn.midjourney.com/b1dd8d79-ee47-4882-8bbd-cc110670802e/0_0.png)). Leçons : sans consigne, le blé sortait en herbe sèche ; demander `heavy ears of grain on tall stalks`. **Ne pas demander « from above » ni « parallel rows »** : cela bascule en vue isométrique de jeu de stratégie, hors style. Vue à hauteur d'homme, dusk. Le premier plan est chargé en épis : recadrer sur la chaumière pour la carte de liste.
```
A simple humble wheat farm, a single small low timber-and-stone cottage with one plain thatched gable roof at the edge of a modest field of ripe golden wheat with clearly visible heavy ears of grain on tall stalks in the foreground, a few tied sheaves and a small hay cart, a worn scarecrow in the field, a rough wooden fence, a dirt path leading to the cottage, pulled back wide shot on dry ground against a dark pine forest edge, deep dusk sky with low sun and no bright clouds, small and utilitarian
```
Style : celui du palier 1 **sans** « three-quarter view slightly from above ». Paramètres : ceux du palier 1, avec `water, black background, top-down view, isometric, game asset` à la fin de l'exclusion.

**Palier 2**
```
A wide farm estate with large wheat fields, a stone farmhouse and a round barn, a windmill on a hill, stacked sheaves, a team of harvesters with scythes, warm amber light on the grain contrasting with the cool violet sky
```
**Palier 3**
```
A vast agricultural domain of terraced golden wheat fields, several windmills, a large stone manor-farm with big barns, irrigation channels with faint violet-blue glowing water, many harvest carts and workers, a sense of abundance
```

---

## 📦 Stockage

### Entrepôt de bois

**Palier 1** — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-entrepot-de-bois-palier1.png), [lien Midjourney](https://cdn.midjourney.com/91d7d4c1-e0dc-440d-8d2a-acbf887ccec8/0_0.png)). Prompt réellement utilisé, avec le style et les paramètres du palier 1 :
```
A simple humble lumber store, one single low rectangular timber shed with one plain gable roof and a wide plank door standing open, neat stacks of seasoned logs and planks stored under a plain lean-to beside it, a simple handcart at the door, a single iron-banded beam, one small lantern with a faint violet-blue glow, small and utilitarian, pulled back wide shot showing the whole site on dry packed ground against a dark pine forest edge
```
Paramètres : ceux du palier 1, avec `water, water wheel, saw frame, black background` à la fin de l'exclusion (pour ne pas retomber sur la Scierie).
*Retours d'essai :* case 1 de la grille retenue (hangar ouvert, piles de rondins et de planches bien lisibles). Les lanternes sortent **orangées** et non violettes (acceptable au palier 1). Le cadrage est **plus serré** que demandé et le décor de forêt est dense et sombre : **pour le palier 2**, exiger `pulled back wide shot showing the whole yard`, une clairière dégagée, et nommer des éléments de grandeur (base de pierre, grue) pour ne pas être bloqué par la référence. Test de lisibilité à 300 px à faire.
**Palier 2**
```
A large open-fronted timber warehouse with a stone base, tall stacks of seasoned logs and planks, a rope and wooden crane at the gable, a cart loaded with lumber at the door, iron-banded beams
```
**Palier 3**
```
A huge lumber depot with several long warehouse halls, towering stacks of timber, gantry cranes with chain hoists, a loading yard full of carts, stone foundations and bronze-bound doors with rune marks
```

### Entrepôt de fer

**Palier 1** — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-entrepot-de-fer-palier1.png), [lien Midjourney](https://cdn.midjourney.com/85249949-1edd-4023-8dfd-33f238f48517/0_0.png)). Case 4 de la grille retenue. Leçons : le premier brief (bâtiment de pierre, lingots « dull grey ») donnait un **entrepôt de pierre** où les lingots passaient pour des blocs de roche. Ce qui fait lire « fer » : des **barres biseautées bleu-acier sur un râtelier au premier plan**, une porte **entièrement blindée de plaques rivetées**, une enclume et un peson. Prompt réellement utilisé, avec le style et les paramètres du palier 1 :
```
A simple humble iron store, one single low squat dark timber-and-iron building with one plain low gable roof and a massive door fully sheathed in riveted iron plates, narrow barred windows, neat rows of long beveled dark steel-blue iron bars stacked on a wooden rack in the foreground with a visible metallic sheen, a few stamped iron ingots on a plank table with a hanging weighing scale, a small anvil, a few ore sacks and a small handcart, one small lantern with a faint violet-blue glow, small and solid and utilitarian, pulled back wide shot showing the whole site on dry packed ground against a bare rocky hillside with a few dark pines
```
Paramètres : ceux du palier 1, avec `water, mine, tunnel, rail track, ore carts, stone blocks, stone wall, cottage, black background` à la fin de l'exclusion.
*Retours d'essai :* le bâtiment sort en bois sombre, proche de l'Entrepôt de bois : dans la liste, c'est la porte blindée et les barres bleu-acier qui les distinguent. Le premier plan (barres) est massif : recadrer sur la porte pour la carte de liste. Lanterne violette bien rendue, mais petite. Test de lisibilité à 300 px à faire.
**Palier 2**
```
A heavy stone warehouse with iron-banded doors and a barred loading bay, ingots stacked on pallets beside the entrance, ore sacks, a small crane, thick walls with arrow-slit windows suggesting it guards valuable metal
```
**Palier 3**
```
A fortified metal vault complex of thick stone with massive iron doors and a gatehouse, towers of ingots visible through an open bay, a gantry crane, guards at the gate, rune-sealed locks glowing faintly
```

### Réservoir de mana

Doit rappeler le cristal de mana de l'icône de ressource, mais plus grand.

**Palier 1** — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-reservoir-de-mana-palier1.png), [lien Midjourney](https://cdn.midjourney.com/88ee6dbc-6f60-40cc-b412-b8d4de8da1d8/0_0.png)). Case 1 de la grille retenue. Leçons : `tower` donnait une vraie tour, d'où une **base de pierre basse et ronde** avec le cristal en cage ; le cristal est **stocké**, pas extrait, d'où l'exclusion `well, bucket, windlass, rope, column of light` pour ne pas retomber sur le Puits de mana. Prompt réellement utilisé, avec le style et les paramètres du palier 1 :
```
A simple humble mana reservoir, one single short round stone base with one glowing violet-blue mana crystal as tall as a man held upright inside a simple bronze cage, small and rough, a short wooden ladder leaning on the cage, a few thin conduits of violet-blue light running along the ground into the stone base, a lantern on a post, a few stacked crates and a small handcart nearby, small and solid and utilitarian, pulled back wide shot showing the whole small site on dry packed ground against a dark rocky cliff with a few dark pines
```
Paramètres : ceux du palier 1, avec `towers` **retiré** de l'exclusion et `water, well, bucket, windlass, rope, column of light, black background` ajoutés à la fin.
*Retours d'essai :* ambiance plus **nocturne que crépusculaire**, très sombre (la lueur du cristal porte la silhouette) ; le cristal est plus grand que « la taille d'un homme » et tire vers le **bleu électrique** plus que le violet-bleu de la cité ; une ligne de texte illisible apparaît tout en bas de l'image (à recadrer ou retoucher). **Pour le palier 2 :** la référence est déjà haute, nommer des éléments de grandeur (anneaux de bronze, pylônes runiques, petite passerelle) et demander `dusk light` pour un cadrage moins sombre.
**Palier 2**
```
A tall stone tower reservoir holding a large glowing violet-blue mana crystal inside a cage of bronze rings and runic pylons, thick conduits of light running into the base, a small gantry around it, the glow lighting the surrounding cobbles
```
**Palier 3**
```
A colossal mana reservoir citadel, a huge stone tower holding an enormous glowing violet-blue crystal inside concentric bronze rings, several smaller crystal storage towers connected by luminous conduits, a wide plaza lit by the glow, awe-inspiring
```

### Silo de nourriture

**Palier 1** — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-silo-de-nourriture-palier1.png), [lien Midjourney](https://cdn.midjourney.com/107608a4-45fd-4316-a6cb-fd60823d52ac/0_0.png)). Case 4 de la grille retenue (cylindre de pierre haut, toit conique de chaume, trappe avec échelle, sacs, chariot de gerbes). Prompt réellement utilisé, avec le style du palier 1 **sans** « three-quarter view slightly from above » (comme le Champ de blé) :
```
A simple humble granary silo, one single small round stone granary with one conical thatched roof, a small wooden loading hatch with a short ladder, a few grain sacks stacked at its base, a small hay cart with a few tied sheaves, a rough wooden fence, a dirt path worn into dry ground, one small lantern with a faint violet-blue glow, small and solid and utilitarian, pulled back wide shot showing the whole small site on dry packed ground against a dark pine forest edge, deep dusk sky with low sun and no bright clouds
```
Paramètres : ceux du palier 1, avec `towers` **retiré** de l'exclusion et `water, wheat field, farmhouse, cottage, top-down view, isometric, game asset, black background` ajoutés à la fin.
*Retours d'essai :* le ciel sort **bleu de jour**, plus clair que les autres bâtiments (à homogénéiser ou à traiter à l'intégration) ; aucun accent violet visible (lanternes orangées). Le silo est **déjà haut** et cadré serré : **pour le palier 2**, nommer des éléments de grandeur (toit d'ardoise, second niveau, quai de chargement) plutôt que de compter sur la taille, et exiger `pulled back wide shot`. Test de lisibilité à 300 px à faire.
**Palier 2**
```
A tall round stone granary silo with a conical slate roof, a wooden ladder and loading hatch, grain sacks stacked at the base, a cart of wheat sheaves unloading, a few lanterns
```
**Palier 3**
```
A group of three large stone granary silos linked by covered walkways, a big grain hall at the base, a loading dock with many carts, a bell tower on the central silo, faint violet-blue runes preserving the grain
```

---

## 🏛️ Cité

### Hôtel de ville *(colonies)*

Bâtiment central de chaque colonie. **Relais du Donjon.** Il héberge l'Obélisque (lore). **Décidé le 2026-10-14 :**
- **L'Obélisque ne grandit pas.** C'est un artefact antérieur à la ville, hérité de Kaelhelm (cité naine-elfique antique), posé sur un nœud de mana pour stabiliser la zone contre les incursions de plans. Il garde la même taille et la même place sur la place à tous les paliers : c'est ce qui permet de garder le même cadrage.
- **Ce qui évolue :** les **dispositifs** qui renforcent son pouvoir (cercle de pierres brutes → anneaux de bronze et piliers à runes → conduits de lumière dans le dallage → pylônes et voile de lumière) **et l'architecture** de l'Hôtel de ville, de plus en plus soignée et organisée autour de la place. C'est le bâtiment central de la ville : il peut être nettement plus beau que les bâtiments de production, et **chaque palier doit montrer un vrai saut de qualité de construction**.
- **Matière de l'Obélisque :** pierre noire polie, arêtes nettes, pointe pyramidale, bandes de runes incrustées en bronze et argent qui brillent violet-bleu. Il tranche volontairement avec le village rustique (artefact d'une civilisation bien plus avancée, pas un menhir).
- **5 paliers, un tous les 3 niveaux** (décidé le 2026-10-15 ; l'Hôtel de ville est plafonné au niveau 15 pour le moment) : **1 = niv. 1-3, 2 = niv. 4-6, 3 = niv. 7-9, 4 = niv. 10-12, 5 = niv. 13-15.** Le serveur est prévu pour du très long terme, le plafond bougera probablement : on ajoutera alors des paliers par tranches de 3 (6 = niv. 16-18, etc.). **Le palier 5 n'est donc pas un plafond visuel : il doit encore laisser de la marge** (voir « Marge » ci-dessous).
- **Format :** `--ar 3:2`, comme les autres bâtiments (la bannière de la Vue d'ensemble est une autre série, `--ar 7:3`).

**Palier 1 — Pierre dressée** (niv. 1-3) — *Validé le 2026-10-14* ([image](direction-artistique/references/batiment-hotel-de-ville-palier1.png), [lien Midjourney](https://cdn.midjourney.com/def74ef2-b75c-4412-a161-af26155211b8/0_0.png) ; case 2 de la grille, upscalée). Leçons : le premier concept (obélisque dans le toit, puis monument devant la halle) a été abandonné ; `menhir`/pierre brute doivent être exclus pour que l'obélisque soit « classe » ; sans consigne, les runes sortent électriques ou dorées, d'où `deep violet-blue` et l'exclusion `cyan, neon, electric blue` ; un village animé en arrière-plan fait trop avancé pour le palier 1. Réserve : la halle est reléguée à gauche et petite, à compenser aux paliers suivants. Prompt réellement utilisé :
```
A simple humble town hall facing a small village square built around an ancient obelisk of a far more advanced lost civilization from Kaelhelm, a tall slim obelisk of polished black stone with perfectly cut sharp edges, a square section tapering to a small pyramid tip, unweathered and flawless, with fine inlaid bands of bronze and silver runes glowing clearly in deep violet-blue running continuously up all its sides as the main light accent, a soft violet-blue light spilling onto the standing stones and the ground around its base, the whole obelisk fully visible with clear space above its tip, standing in the middle of the packed-earth square, a ring of rough standing stones braced with crude timber beams makeshift around its base, two small iron braziers and lanterns on posts, a modest low timber-and-fieldstone hall with one plain slate gable roof and a lower side wing closing one side of the square, a few wide worn stone steps up to a plank door, one oxblood red banner on a pole, a small notice board, a sense of civic authority without being a castle, pulled back wide shot showing the whole square with the obelisk at its center and the hall behind it against a dark pine hillside
```
Style : celui du palier 1 avec `deep dusk light with a low sun and no bright clouds`. Paramètres : ceux du palier 1, avec `fortress, bell tower, chimney, complex roofline, water, menhir, cracked, rough monolith, cut off, cyan, neon, electric blue, black background` ajoutés à l'exclusion (`towers` retiré).

**Palier 2 — Cercle de veille** (niv. 4-6) — *Validé le 2026-10-15* ([image](direction-artistique/references/batiment-hotel-de-ville-palier2.png), [lien Midjourney](https://cdn.midjourney.com/31dc5662-a2b9-47eb-be33-5851b3176d6f/0_0.png) ; case 3 de la grille, upscalée). Se lance avec l'image de palier 1 en référence d'image au début du prompt, avec `--iw 0.5`. Même obélisque, même place, même cadrage et même heure. Leçons :
- **Un premier essai (brief seul) donnait un hall presque tout en bois, un ciel quasi noir et des runes d'obélisque éteintes sur le fût.** Trois ajouts ont corrigé cela : `walls of pale dressed stone up to the first floor`, la description des runes du palier 1 reprise avec `as the main light accent`, et le style du palier 1 (`deep dusk light with a low sun and no bright clouds`) avec `pitch black sky` en exclusion.
- **Les « anneaux de bronze » sortent en tuyaux ou en barres horizontales** reliant les piliers, et il y a plus de quatre piliers. Écart accepté, détail secondaire ; un Vary (Region) sur le pied de l'obélisque reste possible.
- **Sur l'interface web de Midjourney, l'URL de référence collée en début de prompt devient une pièce jointe.** Si `--iw` renvoie une erreur, vérifier que l'image est rangée en Image Prompt (et pas en Style ni Omni Reference).
- **Marge pour les paliers suivants :** ce palier a déjà un balcon, un pignon sculpté et un soubassement de pierre de taille. Les paliers 3 et suivants doivent changer de silhouette, faire disparaître le bois, monter le point de vue et faire monter le violet-bleu plutôt que l'orange des fenêtres.

Prompt réellement utilisé (l'URL de palier 1 est collée en tout premier) :
```
A developed town hall on a paved village square around the same ancient obelisk of polished black stone with perfectly cut sharp edges, fine inlaid bands of bronze and silver runes glowing clearly in deep violet-blue running continuously up all its sides as the main light accent, the whole obelisk fully visible with clear space above its tip, a stately two-storey hall with walls of pale dressed stone up to the first floor and a timber-framed upper floor, a slate roof with dormers and a carved gable, tall arched windows glowing warm, two wings embracing the square, a wide stone stairway with oxblood red banners, two bronze rings encircling the base of the obelisk and four low dark-stone rune pillars with bronze caps around it, thin grooves of glowing violet-blue light inlaid in the flagstone paving linking the pillars to the obelisk, a notice board, a few townsfolk, a sense of civic authority and growing order, pulled back wide shot showing the whole square with the obelisk at its center and the hall behind it against a dark pine hillside
```
Style : celui du palier 1 avec l'accent de mana du palier 2 (`a few violet-blue mana glows on runes and lanterns as accent`) et `deep dusk light with a low sun and no bright clouds`. Paramètres : `--iw 0.5 --ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, people crowd, photography, black borders, animals, fortress, menhir, cracked, rough monolith, cut off, cyan, neon, electric blue, black background, water, pitch black sky`.

**Règles communes aux paliers 3, 4 et 5** (tirées des leçons de la Scierie et du palier 2) :
- **URL de référence en tout premier, la vraie** : palier 4 avec l'image de palier 3 (validée), palier 5 avec celle de palier 4 une fois validée. Un `[URL_PALIER_X]` laissé tel quel fait ignorer `--iw` sans erreur visible. **`--iw 0.15`** (et non 0.5 ni même 0.25, qui recopie encore la halle de la référence), avec les éléments à retirer **nommés dans l'exclusion**.
- **Changer de silhouette à chaque palier, pas seulement de taille.** Le bois disparaît : pierre de taille, bronze, verre. Aucun colombage à partir du palier 3.
- **L'obélisque ne change ni de taille ni de place.** Il doit rester entièrement visible avec de la marge au-dessus de sa pointe. Plus le bâtiment grandit, plus l'obélisque paraît petit à côté : c'est voulu (artefact antérieur à la ville).
- **Monter le point de vue palier après palier** (`from higher up`, de plus en plus haut), avec toujours `pulled back wide shot`.
- **Le violet-bleu devient la lumière dominante**, pas l'orange des fenêtres (déjà au maximum au palier 2).
- **Marge :** ne pas utiliser au palier N ce qui est réservé au palier N+1 (voir la répartition ci-dessous).

| Palier | Réservé à ce palier |
|---|---|
| 3 | arcade, grand escalier monumental, pylônes bas à cristaux, conduits lumineux vers des pylônes de bronze |
| 4 | plan en U, salle du conseil à dôme, anneaux concentriques, grands pylônes |
| 5 | voile de lumière au-dessus de la place, terrasses, tour centrale, foule dense |

**Palier 3 — Parvis du Conseil** (niv. 7-9) — *Validé le 2026-10-15* ([image](direction-artistique/references/batiment-hotel-de-ville-palier3.png), [lien Midjourney](https://cdn.midjourney.com/d5ec2391-df8e-463d-9584-f80641bae0f7/0_0.png) ; case 4 de la grille du second essai, upscalée). Style : celui du palier 1 avec `a clearly visible violet-blue arcane glow on runes and crystals`, `deep dusk light with a low sun and no bright clouds`, sans `weathered timber`. Leçons :
- **Premier essai raté (`--iw 0.25`, colonnade demandée) :** trois images sur quatre recopiaient la halle à colombages du palier 2 avec une colonnade posée dessous, la quatrième dérivait vers un bâtiment **néoclassique** (colonnes grecques, cheminées, fenêtres à petits carreaux). Midjourney ne retire pas ce qu'on ne lui demande pas de retirer.
- **Ce qui a marché au second essai :** `--iw 0.15` ; une **arcade d'arcs brisés** avec contreforts de pierre sombre à incrustations de bronze et toit bas derrière un parapet, à la place des colonnes ; **exclusions nommées** : `timber framing, half-timbered, dormers, chimney, greek temple, neoclassical, mullioned windows` ; retrait de `weathered timber` du style.
- **`elevated three-quarter view from a terrace` et `from higher up` ont été ignorés deux fois :** le point de vue reste au niveau de la place. Ne pas compter dessus pour les paliers 4 et 5.
- **Écarts acceptés :** les disques de bronze gravés sont décentrés (posés à côté du socle et non autour) ; les quatre piliers à barres de bronze viennent encore du palier 2 et les cristaux sont sur des pylônes séparés à flamme bleue ; la marge au-dessus de la pointe de l'obélisque est correcte mais juste. La maison de bois à droite de la place est conservée comme repère de village depuis le palier 1.
- **Marge pour la suite :** la flèche conique centrale et les deux tours sombres qui encadrent la façade anticipent un peu la « tour centrale » du palier 5. Pour que le palier 4 se distingue, il doit s'appuyer sur le **plan en U** et la **salle à dôme**, pas sur de nouvelles tours.
- **Test de lisibilité à 300 px, fait le 2026-10-15 :** les trois paliers (halle basse et pierres dressées / grande halle centrale à étage / palais de pierre à tours sombres) restent distincts. Les runes de l'obélisque et les fenêtres disparaissent à cette taille, mais la silhouette, les flammes bleues et les conduits blancs suffisent. Point de vigilance : l'aile gauche du palais se fond dans la colline.

Prompt réellement utilisé (second essai, l'URL de palier 2 est collée en tout premier) :
```
A grand civic hall on a monumental paved parvis around the same ancient obelisk of polished black stone with perfectly cut sharp edges, fine inlaid bands of bronze and silver runes glowing clearly in deep violet-blue running continuously up all its sides as the main light accent, the whole obelisk fully visible with a generous band of empty sky above its tip, a long hall built entirely of pale dressed stone with an arcade of tall pointed arches across its ground floor, carved dark-stone buttresses with bronze inlay, a low slate roof behind a stone parapet, tall pointed-arch windows with bronze frames, large oxblood red banners, a wide monumental stone stairway across the whole front, two flat concentric bronze rings set flush into the paving and centered on the obelisk, around them four dark-stone rune pillars topped with glowing violet-blue crystals, luminous violet-blue conduits running through the paving to bronze pylons with blue crystal flames at the edge of the square, councillors and guards on the steps, order and prosperity, elevated three-quarter view from a terrace above the square, pulled back wide shot with extra headroom showing the whole parvis with the obelisk at its center and the hall behind it against a dark pine hillside
```
Paramètres : `--iw 0.15 --ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, people crowd, photography, black borders, animals, fortress, menhir, cracked, rough monolith, cut off, cyan, neon, electric blue, black background, water, pitch black sky, rustic hut, thatched roof, timber framing, half-timbered, dormers, chimney, greek temple, neoclassical, mullioned windows`.

**Palier 4 — Cour d'honneur** (niv. 10-12) — *brief, à tester*. Style : celui du palier 3. Paramètres : ceux du palier 3 validé (`--iw 0.15` et exclusions nommées ; ajouter `towers, spires` à l'exclusion pour ne pas empiler de tours, la différence doit venir du plan en U et du dôme). L'URL de palier 3 ci-dessous est la vraie.
```
https://cdn.midjourney.com/d5ec2391-df8e-463d-9584-f80641bae0f7/0_0.png A palatial civic complex laid out in a U around a vast paved court with the same ancient obelisk of polished black stone with inlaid violet-blue rune bands at its center, the whole obelisk fully visible with clear space above its tip, a colonnade of dressed pale stone on both wings and a domed council hall of dressed stone with bronze details at the back, tall arched windows with bronze frames, a grand stairway, concentric bronze rings set into the paving around the obelisk, tall rune pylons topped with glowing violet-blue crystals standing around the court, bright violet-blue light conduits crossing the flagstones, large heraldic banners, many officials, guards and citizens, arcane power and order, pulled back wide shot from high above showing the whole court with the obelisk at its center and the palace behind it against a dark pine hillside
```

**Palier 5 — Sanctuaire** (niv. 13-15) — *brief, à tester*. Style : celui du palier 3, avec l'accent `a radiant violet-blue arcane glow as the dominant light`. Paramètres : ceux du palier 3. C'est le palier le plus difficile à distinguer du 4 : le voile de lumière et l'ampleur de la place doivent porter la différence.
```
[URL_PALIER_4] A monumental civic sanctuary-palace on terraces around a vast circular plaza with the same ancient obelisk of polished black stone with inlaid violet-blue rune bands at its center, the whole obelisk fully visible with clear space above its tip, a veil of faint violet-blue light rising from tall crystal pylons and arching in a luminous dome over the whole plaza, a central tower and domed hall of pale dressed stone with bronze and glass, wide stepped terraces and colonnades, concentric glowing rings of bronze and light in the paving, large heraldic banners, a dense crowd of citizens, councillors and guards, awe-inspiring and arcane, pulled back wide shot from very high above showing the whole plaza with the obelisk at its center and the sanctuary behind it against a dark pine hillside
```

**Au-delà du niveau 15 :** si le plafond monte, ajouter un palier 6 (niv. 16-18) puis d'autres par tranches de 3. À ne produire qu'à ce moment, en repartant de l'image du palier 5 comme référence.

### Donjon *(capitale uniquement)*

Siège du héros et des conseillers. Même cadrage pour recevoir les calques de Prestige (voir « Capitale et calques »).

**Décidé le 2026-10-15 :** le Donjon est **l'Hôtel de ville en plus grand**, le bâtiment central de la capitale, et pas un avant-poste. Il reprend la composition validée de l'Hôtel de ville (place, Obélisque au centre, bâtiment derrière) et **l'Obélisque y est toujours présent**. Le premier brief (petit donjon isolé) a été abandonné : les rendus donnaient une tour de guet sur un rocher, sans Obélisque ni lien avec une ville.
- **Dans la capitale, l'Obélisque est l'original, posé sur un socle de Kaelhelm** : estrade circulaire basse de la même pierre noire polie, trois marches concentriques, cercle de runes bronze et argent incrusté à fleur de surface, éclats de dallage noir ancien qui affleurent dans la terre. Le joueur est venu bâtir autour : l'ancien parfait contre le neuf rustique.
- **Piste à confirmer (lore, pas encore dans le GDD) :** les colonies imitent maladroitement l'Obélisque de la capitale (d'où le cercle de pierres brutes de l'Hôtel de ville p1), et le joueur apprendra à reproduire la magie pour fonder de nouvelles colonies, ou en trouvera d'autres.
- **Marge pour les paliers 2 et 3** : le palier 1 doit rester rustique (terre battue, halle de moellons à étage de bois, une tour trapue, une bannière, village discret). Pierre de taille, cour dallée, grand escalier, plusieurs tours et foule sont réservés aux paliers 2 et 3.

**Palier 1 — Obélisque de Kaelhelm** (niv. 1-14) — *Validé le 2026-10-15* ([image](direction-artistique/references/batiment-donjon-palier1.png), [lien Midjourney](https://cdn.midjourney.com/4a086288-caf5-4be6-8767-eb5ae315d113/0_0.png) ; case 3 de la grille, upscalée). Leçons :
- **Un donjon « modeste » demandé seul donne une tour de guet.** Il faut le contexte de l'Hôtel de ville (place, Obélisque, village) pour qu'il se lise comme le bâtiment central.
- **Première version avec place dallée, grand escalier de pierre, façade à arc et bannières multiples : trop ostentatoire** pour un palier 1, elle anticipait le palier 3 de l'Hôtel de ville. Corrigé par terre battue, quelques marches, une seule bannière, et les exclusions `paved, flagstones, grand staircase, arcade, ornate, monumental, dense town, crowd, multiple banners`.
- **Le cercle de pierres dressées avec poutres autour de l'Obélisque a été rejeté** (aspect bricolé, contredit l'artefact avancé) et remplacé par le socle de Kaelhelm ; `standing stones, ring of stones, timber beams, fence, palisade` sont en exclusion pour qu'il ne revienne pas.
- **Cadrage :** trois cases sur quatre avaient la pointe de l'Obélisque au bord ou coupée ; la retenue est la seule avec de la marge au-dessus.
- **Écarts acceptés :** éclairage plus nocturne que les paliers de l'Hôtel de ville (ciel gris, braseros très visibles) ; le keep se mêle un peu aux maisons voisines, à creuser aux paliers suivants par la pierre de taille et la hauteur.

Prompt réellement utilisé :
```
A sturdy stone keep closing a packed-earth court of honor built around an ancient obelisk of a far more advanced lost civilization from Kaelhelm, a tall slim obelisk of polished black stone with perfectly cut sharp edges, a square section tapering to a small pyramid tip, unweathered and flawless, with fine inlaid bands of bronze and silver runes glowing clearly in deep violet-blue running continuously up all its sides as the main light accent, the whole obelisk fully visible with clear space above its tip, standing on a low circular dais of the same polished black stone with three shallow concentric steps and a ring of fine inlaid bronze and silver runes set flush in its surface glowing faintly violet-blue, a few worn fragments of the same ancient black paving emerging from the packed earth around the dais, clearly far older and finer than everything built around it, the village built humbly around this ancient site, four iron braziers on posts, behind it a low fieldstone keep with a timber upper floor, one squat square tower and a plain slate gable roof, two low stone-and-timber wings closing the court, a few wide worn stone steps up to a plank double door, one oxblood red banner on a pole, a few guards, a few humble village rooftops far behind, a sense of seat of power without being a castle, pulled back wide shot showing the whole court with the obelisk at its center and the keep behind it against a dark pine hillside. Dark heroic fantasy concept art, weathered timber and stone, muted earthy palette (iron grey, aged bronze, oxblood red), painterly digital illustration, deep dusk light with a low sun and no bright clouds, a few small violet-blue mana lanterns as accent, three-quarter view slightly from above, centered wide shot, strong simple silhouette readable at small size --ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, photography, black borders, animals, lone tower, watchtower, ruins, mountain peak, cliff, menhir, standing stones, ring of stones, timber beams, fence, palisade, cracked, rough monolith, cut off, cyan, neon, electric blue, black background, pitch black sky, water, palace, huge castle, multiple towers, spires, grand staircase, arcade, ornate, monumental, dense town, crowd, multiple banners, cobblestones, flagstones
```

**Palier 2 — Cour du Commandement** (niv. 15-29) — *brief, à tester*. Se lance avec l'image du palier 1 en tout premier (URL ci-dessous, la vraie), `--iw 0.15`. Même Obélisque, même socle de Kaelhelm au centre, même cadrage et même heure. Le saut : la pierre de taille remplace moellons et bois, deux tours encadrent le keep, la cour se dalle autour du socle, les bannières se multiplient, la ville murée apparaît derrière. Réservé au palier 3 : architecture arcanique, conduits lumineux, grand escalier monumental, foule, ville dense. Style : celui du palier 1 avec l'accent `a few violet-blue mana glows on runes and lanterns as accent` et `a low warm sun still glowing on the horizon, rose and amber sky` (le palier 1 est resté plus nocturne que l'Hôtel de ville).
```
https://cdn.midjourney.com/4a086288-caf5-4be6-8767-eb5ae315d113/0_0.png A commanding keep closing a flagstone-paved court of honor built around the same ancient obelisk of polished black stone with perfectly cut sharp edges, fine inlaid bands of bronze and silver runes glowing clearly in deep violet-blue running continuously up all its sides as the main light accent, the whole obelisk fully visible with a generous band of empty sky above its tip, standing on the same low circular dais of polished black stone with three shallow concentric steps and a ring of runes glowing violet-blue, the ancient black paving now cleaned and restored around the dais and framed by the new pale flagstones, four dark-stone rune pillars with bronze caps around the dais, behind it a massive keep built entirely of pale dressed stone with tall pointed-arch windows with bronze frames and a slate roof, a high square central tower and two corner towers flanking the facade, a broad flight of stone steps up to a heavy iron-bound double door, many large oxblood red heraldic banners and the hero's standard, a war-room balcony, guards in ranks and a few councillors, a walled town with stone houses rising behind the keep, a sense of authority and growing power, pulled back wide shot showing the whole court with the obelisk at its center and the keep behind it
```
Paramètres : `--iw 0.15 --ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, photography, black borders, animals, lone tower, watchtower, ruins, mountain peak, cliff, menhir, standing stones, ring of stones, fence, palisade, cracked, rough monolith, cut off, cyan, neon, electric blue, black background, pitch black sky, water, timber framing, half-timbered, thatched roof, rustic hut, packed earth, palace, spires, domed hall, arcade, greek temple, neoclassical, glowing conduits, dense crowd`.

**Palier 3** — brief d'origine, **à refaire** sur le même modèle (image du palier 2 en tête, `--iw 0.15`). Il prévoit un obélisque sur le toit, ce qui contredit la décision ci-dessus.
```
A monumental fortified keep at the heart of the capital, massive walls and tall corner towers, a high central tower crowned with a radiant violet-blue obelisk spire, large heraldic banners, a war room balcony, grand torchlit gates, imposing and noble
```

### Institut Arcanique *(recherche)*

**Palier 1** *(brief, à tester)* — petit lieu d'étude rustique, **pas un manoir**. Style et paramètres du palier 1, avec l'exclusion adaptée : `manor, mansion, castle, multiple roofs` (on garde `turrets` hors de l'exclusion pour la petite tourelle à dôme). Piste : des parchemins de runes recopiées, pour rappeler que les érudits étudient l'Obélisque.
```
A simple humble scholar's lodge, one single low pale stone building with one small domed turret and a plain slate roof, a few arched windows with warm light, a stone bench outside with open books and scrolls of copied runes, a small bronze armillary sphere on a post, one violet-blue lantern at the door, a single robed scholar, small and modest, set in a village beside a stone path. Dark heroic fantasy concept art, weathered timber and stone, muted earthy palette (iron grey, aged bronze, oxblood red), a few small violet-blue mana lanterns as the only accent, painterly digital illustration, deep dusk light with a low sun and no bright clouds, three-quarter view slightly from above, centered wide shot, strong simple silhouette readable at small size --ar 3:2 --stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80 --no text, letters, watermark, modern, people crowd, photography, black borders, animals, manor, mansion, castle, multiple roofs, complex roofline, water, cyan, neon, electric blue, black background
```
**Palier 2**
```
A scholarly institute of pale stone with a domed observatory and tall arched windows, a courtyard with an armillary sphere, robed scholars on the steps, glowing violet-blue glyphs along the cornice
```
**Palier 3**
```
A great arcane university with a grand central dome and several wings, floating rune-inscribed books drifting around the cupola, an observatory tower, a courtyard with a giant armillary sphere, robed scholars, brightly glowing violet-blue glyphs across the facades
```

### Académie Militaire *(recrutement)*

**Palier 1**
```
A small barracks yard with a plain stone hall, wooden practice dummies and a few weapon racks, a small archery target, a banner on a pole, a few trainees
```
**Palier 2**
```
A fortified military academy with a wide drill yard, a stone hall flying royal banners, wooden practice dummies and an archery range, weapon racks, a mounted squad leaving the gate
```
**Palier 3**
```
A grand military academy with a vast parade ground, a monumental stone hall with banners, separate training wings, an archery range, a cavalry arena, and in a side court a robed instructor teaching battle-mages with glowing violet-blue sigils
```
*Idée à garder pour plus tard :* quatre vignettes (infanterie, cavalerie, magie, siège) pour illustrer les onglets de l'écran de recrutement.

### Forge *(craft des équipements)*

**Palier 1**
```
A small open-front smithy of stone and timber, a single forge glowing orange-red, an anvil with a blacksmith hammering a blade, a quench barrel, a rack of tools, sparks flying
```
**Palier 2**
```
A large stone forge with an open furnace glowing orange-red, a blacksmith hammering a sword on an anvil, racks of finished armor and weapons, a quench barrel, sparks flying, a rune table in a corner for enchanting with violet-blue light
```
**Palier 3**
```
A grand arcane foundry, a big stone hall with several furnaces glowing orange-red and violet-blue enchantment light, master smiths at anvils, racks of enchanted armor and weapons, a rune table with floating glyphs, towering chimneys, impressive
```

### Atelier des Maîtres d'œuvre *(accélère les bâtiments)*

**Palier 1**
```
A small builders' yard with a wooden shed, a wooden crane and pulley, a drafting table with unrolled blueprints, a few dressed stone blocks, a builder in a leather apron
```
**Palier 2**
```
A master builders' workshop beside scaffolding, wooden cranes and pulleys, a big drafting table with unrolled blueprints, stacks of dressed stone blocks, builders in leather aprons, a half-built tower behind
```
**Palier 3**
```
A grand architects' guildhall and building yard, huge cranes with counterweights, a tall scaffolded tower under construction, a hall of scale models and blueprints, many builders, bronze surveying instruments with violet-blue glow, industrious and monumental
```

### Atelier des Automates Arcaniques *(accélère artisanat et défenses)*

Palier de cité d'ouverture : Citadelle. Le palier 1 de ce bâtiment est donc déjà plus évolué que les ateliers de base.

**Palier 1**
```
A small arcane clockwork workshop of stone and bronze, a single clockwork construct with a glowing violet-blue core on a workbench, gears and rune-etched plates, a half-finished frame hanging on chains
```
**Palier 2**
```
An arcane automata workshop, several bronze and stone clockwork constructs with glowing violet-blue cores assembling parts on a long workbench, gears and rune-etched plates, a half-finished golem frame suspended on chains, mana conduits along the ceiling
```
**Palier 3**
```
A grand arcane automata factory, an assembly hall where large bronze golems are built on rails, glowing violet-blue cores, giant gears, mana conduits and rune circuits across the walls, a finished golem standing guard at the gate, awe-inspiring
```

### Atelier des Remparts *(défenses)*

Palier de cité d'ouverture : Cité fortifiée.

**Palier 1**
```
A fortification yard where engineers assemble a single ballista, a few cut stone battlement blocks, a stack of bolts, a wooden crane, a short stretch of rampart
```
**Palier 2**
```
A fortification yard where engineers assemble defensive war machines, a large ballista being tested, stone-cut battlement sections ready to be hoisted, a trebuchet frame under construction, stacks of bolts and iron-capped stones, a stretch of rampart in the background
```
**Palier 3**
```
A grand siegecraft arsenal, a huge yard with several finished ballistae and trebuchets, large gantry cranes lifting battlement sections, an iron foundry for projectile heads, a tall stretch of rampart with runes glowing violet-blue, imposing and military
```

### Hôpital *(troupes blessées)*

**Palier 1**
```
A small whitewashed stone infirmary with a single ward, a healer in a pale robe tending a wounded soldier, herbs drying on lines, a quiet and humane atmosphere
```
**Palier 2**
```
A hospital of whitewashed stone with a covered cloister, wounded soldiers carried in on stretchers, healers in pale robes tending patients with soft golden-white light, herb gardens, bandages drying on lines
```
**Palier 3**
```
A grand healing sanctuary of white stone with a domed central hall and several wings around a garden cloister, many healers tending patients with golden-white and faint violet-blue light, a fountain, a calm sacred atmosphere against the dark palette
```

### Tour de guet arcanique *(détection)*

**Palier 1**
```
A short wooden-and-stone watchtower with a small platform and a lantern, a sentry looking out, a signal brazier, a ladder, mist and a distant horizon behind
```
**Palier 2**
```
A tall slender watchtower of dark stone with a bronze ring holding a small glowing violet-blue scrying crystal, a sentry on the balcony, signal braziers, a staircase winding around the tower, mist behind
```
**Palier 3**
```
A tall slender watchtower of dark stone crowned with a large glowing violet-blue scrying crystal in a bronze ring, observation balconies, several sentries, signal braziers, a long staircase winding around the tower, mist and a distant horizon behind
```

### Portail des Sphères *(téléportation)*

Pour Midjourney, on illustre le **cercle de passage**. Le nom est un clin d'œil aux Neuf Sphères du lore. Palier de cité d'ouverture : Métropole.

**Palier 1**
```
A small circle of ancient standing stones carved with faint runes around a stone platform, a thin swirl of violet-blue light at the center, mist at the base
```
**Palier 2**
```
A circle of tall ancient standing stones carved with glowing runes around a raised platform, a luminous violet-blue portal of swirling light at the center, mist at the base, robed attendants at the edge
```
**Palier 3**
```
A circle of colossal ancient standing stones carved with brightly glowing runes around a raised platform, a vast luminous violet-blue portal of swirling light at the center, nine small floating orbs orbiting above, robed attendants, majestic and sacred
```

### Ambassade *(diplomatie, pactes, guilde)*

**Palier 1**
```
A small stone lodge with a few banners from different realms, a modest meeting hall with a long table, a heraldic shield on the wall, a couple of envoys exchanging a scroll
```
**Palier 2**
```
An embassy with a grand hall and a courtyard of banners from many different realms, envoys in ceremonial robes exchanging scrolls at a long table, heraldic shields on the walls, banners in violet, gold and iron grey
```
**Palier 3**
```
A grand embassy palace with a columned entrance and a vast banner-lined courtyard, many envoys in ceremonial robes, heraldic shields and tall flags from countless realms, a ceremonial table of state, diplomatic and majestic atmosphere
```

---

## 🏙️ Paliers de cité

Une image par palier, même lieu, **même cadrage et même heure** pour qu'on lise la progression. Format `--ar 7:3`. L'Obélisque (runes violet-bleu) est toujours visible au centre : c'est le fil rouge de la série. **Ces prompts n'ont pas encore été testés** avec la nouvelle méthode ; appliquer la même logique que pour les bâtiments (sujet d'abord, `--sw` à ajuster).

Préambule des villes :
```
Dark heroic fantasy wide establishing shot of a human settlement in a river valley, three-quarter view from a hillside above, a tall ancient obelisk with glowing violet-blue runes at the center, muted earthy palette (iron grey, aged bronze, oxblood red) with violet-blue arcane accents, painterly digital illustration, dramatic dusk lighting, atmospheric mist, highly detailed
```

Paramètres : `--ar 7:3 --stylize 250 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 250`

### 1. Hameau
```
[PRÉAMBULE VILLE] a tiny hamlet of a dozen thatched cottages, dirt paths, a single small obelisk stone on a mound, a few fields, a well, no walls, no towers, a lone watch fire
```
### 2. Village
```
[PRÉAMBULE VILLE] a village of timber-framed houses around a market square, a wooden palisade with a gate, a small chapel, a mill by the river, the obelisk standing taller in the square, smoke from chimneys
```
### 3. Bourg
```
[PRÉAMBULE VILLE] a market town with cobbled streets and stone houses, partial stone walls with a watchtower, a bridge over the river, a large town hall near the obelisk, merchants' stalls, more lanterns
```
### 4. Cité fortifiée
```
[PRÉAMBULE VILLE] a fortified city enclosed by complete stone ramparts with towers, a monumental gate with portcullis, dense roofs of slate tiles, banners on the walls, the obelisk rising above a central plaza
```
### 5. Citadelle
```
[PRÉAMBULE VILLE] a citadel city on a hill, a massive keep at the summit, tiered districts for crafts and military, double walls, aqueducts, workshops with glowing windows, the obelisk crowned by a violet-blue beam toward the sky
```
### 6. Métropole
```
[PRÉAMBULE VILLE] a monumental capital metropolis, soaring towers and domes, grand avenues, bridges and aqueducts, a vast citadel at the center, many lights across the city, a majestic obelisk emitting a bright violet-blue column of light, awe-inspiring scale
```

### Capitale et calques
- Pour la capitale, mêmes 6 paliers avec le **Donjon** à la place de l'Hôtel de ville (ajouter « a fortified keep at the center instead of a town hall »).
- Midjourney ne garantit pas un cadrage identique d'une génération à l'autre. Pour obtenir des calques de Prestige qui se superposent, la piste la plus fiable est de partir de l'image de base validée et d'utiliser **Vary (Region)** pour ajouter bannières et monuments, puis de comparer les deux images pour extraire le calque. À tester sur un palier avant de généraliser. Rangs de Prestige et nombre de calques **[TBD]**.

---

## Ordre de production proposé

1. **Palier 1 des 8 bâtiments de production et de stockage** (Scierie déjà validée). Ils valident le `--sw 80` et le format de carte.
2. **Paliers 2 et 3 de ces 8 bâtiments**, en partant de l'image de palier 1 comme référence. C'est là qu'on teste la cohérence entre paliers (même lieu, même cadrage).
3. **Les 6 paliers de cité** (ils donnent le ton de la Vue d'ensemble et le fil rouge de l'Obélisque).
4. **Hôtel de ville, Donjon, Institut Arcanique, Académie Militaire, Forge** (bâtiments du premier jet de jeu), les 3 paliers.
5. **Les autres bâtiments de cité**, selon l'avancement.

Total : 3 images retenues par bâtiment, soit une soixantaine, plus les villes. On peut livrer l'interface avec le seul palier 1 et ajouter les autres ensuite : la table de seuils gère l'absence d'image en retombant sur le palier précédent.

## Points ouverts

- [x] Valider le `--sw` de départ pour les bâtiments : **80**, validé sur la Scierie puis confirmé sur la Mine de fer (2026-10-13). Donjon p1 validé à 80 (2026-10-15) ; reste à confirmer sur le Portail et l'Académie.
- [ ] Vérifier que le choix de la cité validée comme `--sref` ne teinte pas tout en violet (à surveiller sur les paliers 2 et 3 avec plus de mana).
- [x] Tester le maintien du cadrage entre paliers d'un même bâtiment : **validé sur la Scierie palier 2** (image de palier 1 en référence, `--iw 0.5`) **et palier 3** (image de palier 2 en référence, `--iw 0.25`).
- [x] Tester le seuil de lisibilité à ~300 px de large sur les 3 paliers de la Scierie : **validé le 2026-10-13**. Les trois paliers restent lisibles et se distinguent à cette taille (cabane ouverte avec roue et troncs / halle en pierre à deux toits / tour à engrenage et aqueduc à pylônes bleus). Point de vigilance : le palier 3 est le plus sombre, ses détails fins (fenêtres, runes) disparaissent à 300 px, mais la silhouette et les cristaux bleus suffisent.
- [ ] Appliquer la nouvelle méthode (sujet d'abord, `--sw` réduit) aux 6 paliers de cité et ajuster.
- [ ] Tester la piste « Vary (Region) » pour les calques de capitale.
- [ ] Décider d'un éventuel 4e palier (par ex. niveau 45) une fois les 3 premiers validés.
- [ ] Prévoir une icône SVG par bâtiment pour le menu et les files, à dessiner dans le design system (pas via Midjourney).
- [ ] Noter dans le GDD (section 4.2) le principe « l'image du bâtiment évolue avec son niveau : paliers 1-14, 15-29, 30+ ».
