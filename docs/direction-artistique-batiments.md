# Direction artistique — Prompts visuels pour les bâtiments et les villes

*Document de travail pour la Phase 3a. Briefs prêts à coller dans Midjourney : un par bâtiment (19), plus les 6 paliers de cité et la capitale. Prompts en anglais, noms et rôles en français (cf. [direction-artistique-unites.md](direction-artistique-unites.md) pour la même logique). La liste des bâtiments et les paliers sont dans le [GDD, section 4.2](game-design-document.md).*

Liste figée le 2026-10-12. Le lexique reste vivant : si un nom change, seul l'intitulé de la section change, pas le prompt.

---

## Réglage commun

**Ancre de style : la cité validée** (celle de la bannière de la Vue d'ensemble), pas le portrait des unités. Elle a le bon rendu d'architecture, d'éclairage et d'ambiance. Le `--sref` du portrait reste réservé aux personnages.

```
--sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 200
```

Point de départ du poids de style : `--sw 200` (moins que pour les unités, car un bâtiment n'a pas de visage à protéger). Si la ressemblance avec la cité est trop faible, monter vers 300 ; si tous les bâtiments finissent par se ressembler, redescendre.

**Formats :**
- carte de bâtiment (liste des bâtiments) : `--ar 3:2`, bâtiment centré, à recadrer en carte sur les écrans ;
- paliers de cité (bannière de la Vue d'ensemble) : `--ar 7:3` (la cité validée fait 3360 × 1440) ;
- icônes de menu : pas ici, elles seront dessinées en SVG avec le design system.

**Paramètres à ajouter à chaque prompt :**

```
--ar 3:2 --stylize 250 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 200 --no text, letters, watermark, modern, people crowd, photography
```

### Préambule de style commun

À coller en tête de chaque prompt de bâtiment :

```
Dark heroic fantasy architecture concept art, a medieval human kingdom, weathered stone, aged timber and hand-forged iron with visible repairs, muted earthy palette (iron grey, aged bronze, oxblood red) accented by a clearly visible violet-blue arcane mana glow on runes and crystals, painterly digital illustration, dramatic dusk lighting from a single source, three-quarter view slightly from above, the building is the clear focal point with a sharp readable silhouette, small ambient details showing it is in use, highly detailed
```

*Traduction :* Art conceptuel d'architecture heroic fantasy sombre, royaume humain médiéval, pierre usée, bois vieilli et fer forgé à la main avec des réparations visibles, palette terreuse sourde (gris fer, bronze vieilli, rouge sang séché) rehaussée d'une lueur arcanique violet-bleu nettement visible sur les runes et les cristaux, illustration numérique façon peinture, éclairage dramatique de crépuscule à source unique, vue en trois quarts légèrement en hauteur, le bâtiment est le point focal avec une silhouette nette et lisible, petits détails d'ambiance montrant qu'il est utilisé, très détaillé.

**Lisibilité.** Chaque bâtiment doit rester reconnaissable une fois réduit à la taille d'une carte de liste : un seul sujet, une silhouette distincte, pas de foule.

**Taille du bâtiment.** Les bâtiments ne changent pas d'aspect selon leur niveau (les niveaux montent à 30 et plus). C'est l'image de la **ville** qui évolue avec les paliers. Une seule illustration par bâtiment suffit, sauf le Hôtel de ville / Donjon (voir plus bas).

---

## ⛏️ Production

### Scierie *(bois)*
Palier : Hameau.
```
[PRÉAMBULE] A rustic sawmill beside a fast river, a large water wheel driving a long saw frame, stacked pale logs and cut planks, a lumberjack's lean-to, a forest edge of dark pines behind, sawdust in the air, a few small violet-blue lanterns hanging from the beams
```

### Mine de fer *(fer)*
Palier : Hameau.
```
[PRÉAMBULE] An iron mine entrance cut into a rocky hillside, heavy timber supports around the dark tunnel mouth, ore carts on a short rail track, piles of raw rust-red iron ore and grey slag, a hand-cranked hoist, a few torches, thin violet-blue crystal veins glowing in the rock
```

### Puits de mana *(mana)*
Palier : Hameau. Distinct de l'Obélisque, qui est désormais dans l'Hôtel de ville.
```
[PRÉAMBULE] An ancient stone well ringed by carved runes, a column of luminous violet-blue mana rising from its depths, a hoist with copper chains lifting glowing crystal-laden buckets, raw mana crystals clustered around the rim, faint wisps of energy in the air, the ground cracked with glowing veins
```

### Champ de blé *(nourriture)*
Palier : Hameau.
```
[PRÉAMBULE] A wide golden wheat field at dusk with a stone and timber farmhouse and a round barn, a scarecrow, harvest sheaves tied and stacked, a windmill on the hill behind, warm amber light on the grain contrasting with the cool violet sky
```

---

## 📦 Stockage

### Entrepôt de bois
Palier : Hameau.
```
[PRÉAMBULE] A large open-fronted timber warehouse, tall stacks of seasoned logs and planks, rope and wooden crane at the gable, cart loaded with lumber at the door, iron-banded beams, a faint violet lantern glow
```

### Entrepôt de fer
Palier : Hameau.
```
[PRÉAMBULE] A heavy stone warehouse with iron-banded doors and a barred loading bay, ingots stacked on pallets beside the entrance, ore sacks, a small crane, thick walls with arrow-slit windows suggesting it guards valuable metal
```

### Réservoir de mana
Palier : Hameau. Doit rappeler le cristal de mana de l'icône de ressource, mais plus grand.
```
[PRÉAMBULE] A tall stone tower reservoir holding a huge glowing violet-blue mana crystal inside a cage of bronze rings and runic pylons, thick conduits of light running into the base, a small gantry around it, the glow lighting the surrounding cobbles
```

### Silo de nourriture
Palier : Hameau.
```
[PRÉAMBULE] A tall round stone granary silo with a conical thatched roof, a wooden ladder and loading hatch, grain sacks stacked at the base, a cart of wheat sheaves unloading, a few lanterns, pigeons on the roof
```

---

## 🏛️ Cité

### Hôtel de ville *(colonies)*
Palier : tous. Bâtiment central de chaque colonie. **Relais du Donjon.** Il héberge l'Obélisque (lore), qui doit rester visible. Une version par palier est utile dès que la Vue d'ensemble affiche le bâtiment ; en première passe, une seule suffit.
```
[PRÉAMBULE] A stately stone town hall with a timber-framed upper floor and a bell tower, wide steps and a banner pole, a tall ancient obelisk of dark stone with glowing violet-blue runes standing in the courtyard in front, townsfolk and a notice board, a sense of civic authority without being a castle
```

### Donjon *(capitale uniquement)*
Palier : tous, avec une version par palier. Siège du héros et des conseillers.
```
[PRÉAMBULE] A commanding fortified keep at the heart of the capital, thick stone walls and corner towers, a high central tower crowned with a radiant violet-blue obelisk spire, large heraldic banners, a war room balcony, torchlit gates guarded by sentries, imposing and noble
```
*Note :* les images de la capitale doivent garder exactement le même cadrage pour recevoir les calques de Prestige (bannières, monuments, ambiance). Voir « Capitale et calques » plus bas.

### Institut Arcanique *(recherche)*
Palier : Hameau.
```
[PRÉAMBULE] A scholarly institute of pale stone with a domed observatory and tall arched windows, floating rune-inscribed books drifting around a central cupola, a courtyard with an armillary sphere, robed scholars on the steps, glowing violet-blue glyphs along the cornice
```

### Académie Militaire *(recrutement)*
Palier : Village.
```
[PRÉAMBULE] A fortified military academy with a wide drill yard, a stone hall flying royal banners, wooden practice dummies and an archery range, weapon racks, a mounted squad leaving the gate, and in a side court a robed instructor teaching battle-mages with glowing violet-blue sigils
```
*Idée à garder pour plus tard :* quatre vignettes (infanterie, cavalerie, magie, siège) pour illustrer les onglets de l'écran de recrutement.

### Forge *(craft des équipements)*
Palier : Village.
```
[PRÉAMBULE] A large stone forge with an open furnace glowing orange-red and violet-blue enchantment light, a blacksmith hammering a sword on an anvil, racks of finished armor and weapons, a quench barrel, sparks flying in the dusk, a rune table in a corner for enchanting
```

### Atelier des Maîtres d'œuvre *(accélère les bâtiments)*
Palier : Village.
```
[PRÉAMBULE] A master builders' workshop beside scaffolding, wooden cranes and pulleys, a big drafting table with unrolled blueprints, stacks of dressed stone blocks, builders in leather aprons, a half-built tower behind, practical and industrious
```

### Atelier des Automates Arcaniques *(accélère artisanat et défenses)*
Palier : Citadelle.
```
[PRÉAMBULE] An arcane automata workshop, bronze and stone clockwork constructs with glowing violet-blue cores assembling parts on a long workbench, gears and rune-etched plates, a half-finished golem frame suspended on chains, mana conduits along the ceiling, a mix of craft and magic
```

### Atelier des Remparts *(défenses)*
Palier : Cité fortifiée.
```
[PRÉAMBULE] A fortification yard where engineers assemble defensive war machines, a large ballista being tested, stone-cut battlement sections ready to be hoisted, a trebuchet frame under construction, stacks of bolts and iron-capped stones, a stretch of rampart in the background
```

### Hôpital *(troupes blessées)*
Palier : Bourg.
```
[PRÉAMBULE] A hospital of whitewashed stone with a covered cloister, wounded soldiers carried in on stretchers, healers in pale robes tending patients with soft golden-white light, herb gardens, bandages drying on lines, a quiet and humane atmosphere against the dark palette
```

### Tour de guet arcanique *(détection)*
Palier : Bourg.
```
[PRÉAMBULE] A tall slender watchtower of dark stone crowned with a glowing violet-blue scrying crystal in a bronze ring, a sentry on the balcony looking out, signal braziers, a long staircase winding around the tower, mist and a distant horizon behind
```

### Portail des Sphères *(téléportation)*
Palier : Métropole. Pour Midjourney, on illustre le **cercle de passage**. Le nom « Portail des Sphères » est un clin d'œil aux Neuf Sphères du lore.
```
[PRÉAMBULE] A circle of tall ancient standing stones carved with glowing runes arranged around a raised platform, a luminous violet-blue portal of swirling light at the center, nine small floating orbs orbiting above, mist at the base, robed attendants at the edge, majestic and sacred
```

### Ambassade *(diplomatie, pactes, guilde)*
Palier : Bourg.
```
[PRÉAMBULE] An embassy with a grand hall and a courtyard of banners from many different realms, envoys in ceremonial robes exchanging scrolls at a long table, heraldic shields on the walls, a diplomatic atmosphere, banners in violet, gold and iron grey
```

---

## 🏙️ Paliers de cité

Une image par palier, même lieu, **même cadrage et même heure** pour qu'on lise la progression. Format `--ar 7:3`. L'Obélisque (violet-blue runes) est toujours visible au centre : c'est le fil rouge de la série.

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

1. **Les 6 paliers de cité** (ils donnent le ton de toute la série et le fil rouge de l'Obélisque).
2. **Les 8 bâtiments de production et de stockage** (les plus simples, ils valident le `--sw` et le format de carte).
3. **L'Hôtel de ville, le Donjon, l'Institut Arcanique, l'Académie Militaire, la Forge** (bâtiments du premier jet de jeu).
4. **Les autres bâtiments de cité**, selon l'avancement.

## Points ouverts

- [ ] Valider le `--sw` de départ (200 pour les bâtiments, 250 pour les villes) après un essai sur la Scierie et le Hameau.
- [ ] Vérifier que le choix de la cité validée comme `--sref` fait bien ressortir la palette sans tout teinter de violet.
- [ ] Tester la piste « Vary (Region) » pour les calques de capitale.
- [ ] Prévoir une icône SVG par bâtiment pour le menu et les files, à dessiner dans le design system (pas via Midjourney).
