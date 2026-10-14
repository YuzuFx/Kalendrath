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
- **Hôtel de ville et Donjon :** ils suivent aussi ces 3 paliers de niveau. Les images de **cité** (bannière de la Vue d'ensemble) sont une autre série, indexée sur les paliers de cité.
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

**Palier 1**
```
A small open-fronted timber shed, neat stacks of seasoned logs and planks, a simple handcart at the door, a single iron-banded beam, a faint lantern
```
**Palier 2**
```
A large open-fronted timber warehouse with a stone base, tall stacks of seasoned logs and planks, a rope and wooden crane at the gable, a cart loaded with lumber at the door, iron-banded beams
```
**Palier 3**
```
A huge lumber depot with several long warehouse halls, towering stacks of timber, gantry cranes with chain hoists, a loading yard full of carts, stone foundations and bronze-bound doors with rune marks
```

### Entrepôt de fer

**Palier 1**
```
A small stone store with a heavy iron-banded door, a few ingots stacked beside the entrance, ore sacks, a barred window
```
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

**Palier 1**
```
A short round stone tower holding one glowing violet-blue mana crystal in a simple bronze cage, a small ladder, a few conduits of light running into the base, a lantern on a post
```
**Palier 2**
```
A tall stone tower reservoir holding a large glowing violet-blue mana crystal inside a cage of bronze rings and runic pylons, thick conduits of light running into the base, a small gantry around it, the glow lighting the surrounding cobbles
```
**Palier 3**
```
A colossal mana reservoir citadel, a huge stone tower holding an enormous glowing violet-blue crystal inside concentric bronze rings, several smaller crystal storage towers connected by luminous conduits, a wide plaza lit by the glow, awe-inspiring
```

### Silo de nourriture

**Palier 1**
```
A small round stone granary with a conical thatched roof, a wooden loading hatch, a few grain sacks at the base, a small cart
```
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

Bâtiment central de chaque colonie. **Relais du Donjon.** Il héberge l'Obélisque (lore), qui doit rester visible à tous les paliers.

**Palier 1**
```
A modest stone and timber town hall with a small bell tower, a few wide steps and a banner pole, a small dark obelisk with faint violet-blue runes standing in the courtyard in front, a notice board, a sense of civic authority without being a castle
```
**Palier 2**
```
A stately stone town hall with a timber-framed upper floor and a bell tower, wide steps and banners, a tall ancient obelisk of dark stone with glowing violet-blue runes in the courtyard in front, townsfolk and a notice board
```
**Palier 3**
```
A grand civic palace of dressed stone with a clock tower and a columned entrance, large banners, a monumental dark obelisk with brightly glowing violet-blue runes rising in a paved plaza in front, guards and officials, authority and prosperity
```

### Donjon *(capitale uniquement)*

Siège du héros et des conseillers. Même cadrage pour recevoir les calques de Prestige (voir « Capitale et calques »).

**Palier 1**
```
A small stone keep with a single square tower and a timber hoarding, a gatehouse with a wooden gate, a banner, a violet-blue lantern at the door, a small yard with a well, plain and sturdy
```
**Palier 2**
```
A commanding fortified keep with thick stone walls and corner towers, a high central tower, large heraldic banners, a war room balcony, torchlit gates guarded by sentries, a small violet-blue obelisk on the roof
```
**Palier 3**
```
A monumental fortified keep at the heart of the capital, massive walls and tall corner towers, a high central tower crowned with a radiant violet-blue obelisk spire, large heraldic banners, a war room balcony, grand torchlit gates, imposing and noble
```

### Institut Arcanique *(recherche)*

**Palier 1**
```
A small scholar's lodge of pale stone with one low domed turret, a few arched windows, books on a stone bench outside, a small armillary sphere, one violet-blue lantern
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

- [x] Valider le `--sw` de départ pour les bâtiments : **80**, validé sur la Scierie puis confirmé sur la Mine de fer (2026-10-13). Reste à confirmer sur les bâtiments imposants (Donjon, Portail, Académie).
- [ ] Vérifier que le choix de la cité validée comme `--sref` ne teinte pas tout en violet (à surveiller sur les paliers 2 et 3 avec plus de mana).
- [x] Tester le maintien du cadrage entre paliers d'un même bâtiment : **validé sur la Scierie palier 2** (image de palier 1 en référence, `--iw 0.5`) **et palier 3** (image de palier 2 en référence, `--iw 0.25`).
- [x] Tester le seuil de lisibilité à ~300 px de large sur les 3 paliers de la Scierie : **validé le 2026-10-13**. Les trois paliers restent lisibles et se distinguent à cette taille (cabane ouverte avec roue et troncs / halle en pierre à deux toits / tour à engrenage et aqueduc à pylônes bleus). Point de vigilance : le palier 3 est le plus sombre, ses détails fins (fenêtres, runes) disparaissent à 300 px, mais la silhouette et les cristaux bleus suffisent.
- [ ] Appliquer la nouvelle méthode (sujet d'abord, `--sw` réduit) aux 6 paliers de cité et ajuster.
- [ ] Tester la piste « Vary (Region) » pour les calques de capitale.
- [ ] Décider d'un éventuel 4e palier (par ex. niveau 45) une fois les 3 premiers validés.
- [ ] Prévoir une icône SVG par bâtiment pour le menu et les files, à dessiner dans le design system (pas via Midjourney).
- [ ] Noter dans le GDD (section 4.2) le principe « l'image du bâtiment évolue avec son niveau : paliers 1-14, 15-29, 30+ ».
