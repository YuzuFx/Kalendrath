# Direction artistique — vignettes de recherche (études arcaniques)

**Décidé le 2026-11-01 par Gregory :** les recherches sont illustrées par des **vignettes de mise en situation** (une petite scène qui montre la recherche en train de se faire), pas par des icônes : plus immersif. Même outil et même méthode que les bâtiments (Midjourney V8, `--sref` de la cité), voir [direction-artistique-batiments.md](direction-artistique-batiments.md) et le skill `brief-midjourney-batiment`.

## Principes

- **Format `--ar 3:2`**, comme les bâtiments (l'écran de recherche affichera des cartes de même ratio). Paramètres de départ : `--stylize 150 --sref https://cdn.midjourney.com/2b763d55-1e2c-4be5-b47e-161de8bf16f6/0_0.png --sw 80`. Pas d'image de référence (chaque recherche est un sujet à part).
- **Une scène, un geste, un élément signature de grande taille** lisible à 300 px (une roue, un cristal, un cheval cabré, un chariot), comme pour les bâtiments. Pas de foule, des nombres explicites (« exactly three scholars »), jamais « several ».
- **Personnages :** petits à moyens, vus de dos, de profil ou de trois quarts, **aucun gros plan** (`portrait, close-up, close-up face` en exclusion), robes sombres pour les érudits de l'Institut, tabliers de cuir pour les artisans. Pas de visages détaillés (dérive vers le portrait).
- **Style, comme les bâtiments :** `dark heroic fantasy concept art`, palette terre (gris fer, bronze vieilli, rouge sang), éclairage de crépuscule ou de lampes chaudes, **accent violet-bleu écrit explicitement** (`deep violet-blue flame, not orange` ne tient pas toujours : essayer `pale violet-blue flame`), jamais de cyan, de néon, de blanc brillant ni d'or (`gold, golden, cyan, neon, electric blue, white glow` en exclusion).
- **Pas de runes ni de glyphes** dans le texte du prompt (elles sortent en caractères lisibles) : écrire « glowing bands » ou « glowing lines ».
- **Exclusions communes :** `text, letters, watermark, logo, signature, modern, photography, black borders, animals, black background, people crowd, crowd, portrait, close-up, close-up face, cropped, cut off, cross, church, chapel, monastery, religious, asian architecture, pagoda, hobbit, fairytale, whimsical, ivy, moss`.
- **Vérifier à chaque grille :** les nombres, les coins (filigrane), l'absence de portrait, la lecture à petite taille.
- **Une validation = une image archivée** `docs/direction-artistique/references/recherche-<nom>.png` + une ligne dans le README des références + un commit.

## Les 14 recherches et leur scène

Catalogue de GDD 4.3 (les anciennes technologies laser, ion et plasma, réaffectées en prérequis, n'ont pas de vignette pour l'instant).

| # | Recherche | Scène | Élément signature |
|---|---|---|---|
| 1 | **Abondance** | Trois agronomes en robe étudient des épis de blé géants dans un champ en terrasses, avec un instrument de laiton | Les épis démesurés à contre-jour |
| 2 | **Endurance du Fantassin** | Une colonne de douze fantassins en marche sur une route de montagne au lever du jour, sac au dos, un sergent à côté | La longue colonne qui s'éloigne |
| 3 | **Art Équestre** | Un maître d'écurie dresse un cheval cuirassé qui saute une barrière dans un manège de sable | Le cheval en plein saut |
| 4 | **Ingénierie de Siège** | Des ingénieurs autour d'une table à dessin avec la maquette d'un trébuchet, une tour de siège à moitié montée derrière | La tour de siège en construction |
| 5 | **Espionnage** | Des éclaireurs encapuchonnés sur un toit de nuit, longue-vue et carte, avec une cage de pigeons voyageurs | La silhouette à la longue-vue sur le faîte du toit |
| 6 | **Chaîne de Ravitaillement** | Un intendant avec un registre devant une file de chariots chargés dans un entrepôt de cour | La file de chariots |
| 7 | **Découverte Tellurique** | Des arpenteurs avec un instrument de bronze à aiguille de cristal violet-bleu au-dessus d'une faille de lumière | Le trépied de bronze et l'aiguille lumineuse |
| 8 | **Rite d'Ancrage Tellurique** | Six érudits en cercle dans la crypte de l'Obélisque, autour de lignes de mana lumineuses dans le sol | Le cercle de lignes lumineuses et la base de l'Obélisque |
| 9 | **Affûtage** | Un artisan affûte une épée sur une grande meule à pédale, gerbe d'étincelles | La meule et les étincelles |
| 10 | **Alliage de Guerre** | Des fondeurs versent un alliage de bronze et d'argent en fusion d'un creuset dans un moule d'épée | Le creuset de métal en fusion |
| 11 | **Runes de Combat** | Un mage-forgeron trace des bandes lumineuses violet-bleu sur la lame d'une épée posée sur un établi | La lame aux bandes lumineuses |
| 12 | **Bénédiction des Armes** | Trois mages tiennent des armes au-dessus d'un autel de pierre nue sous une pluie de lumière douce (sans église ni religion) | Les armes qui flottent dans la lumière |
| 13 | **Forge des Armures** | Un armurier martèle un plastron sur une enclume, rangée de cuirasses sur des mannequins | Le marteau et la pièce rougeoyante |
| 14 | **Infusion Arcanique** | Deux mages infusent un bouclier rond posé sur une table, une barrière violet-bleu translucide l'entoure | Le bouclier et son dôme de lumière |

**Risques identifiés d'avance :** l'Affûtage (9), l'Alliage de Guerre (10), la Forge des Armures (13) et les Runes de Combat (11) sont **quatre scènes d'atelier de forgeron** : les varier fortement (meule en extérieur, creuset en fonderie, enclume en armurerie, établi de mage) pour qu'elles se distinguent à 300 px, et les distinguer de la **Forge** (le bâtiment). La Bénédiction (12) peut tourner à la scène d'église ; l'Infusion (14) et le Rite (8) à la magie lumineuse blanche. Les scènes à personnages (2, 3, 5) peuvent produire des foules.

## Ordre de production

Commencer par **l'Affûtage (9)**, le plus lisible, pour valider le gabarit, puis les autres dans l'ordre du tableau en traitant ensemble les quatre scènes de forge.

## Briefs

*À écrire un par un, après validation du précédent.*
