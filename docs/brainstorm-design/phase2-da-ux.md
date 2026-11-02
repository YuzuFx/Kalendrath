# Phase 2 : direction artistique, UX et responsive des six accueils et des dix logos

*Brainstorm du 2026-11-01, suite de [direction-artistique-ux.md](direction-artistique-ux.md). Document de travail, rien n'est décidé.*

**Ce qui a été examiné.** Les sept artefacts ont été relus en source (HTML, `base.css`, `common.js`, `strings.js`), puis rendus dans Chromium (Playwright) depuis une copie locale des fichiers publiés, à **1280, 1600, 1920 et 2560 px de large, tous à 720 px de haut** (le cas le plus dur pour une ouverture plein écran). Pour chaque page et chaque largeur : débordement horizontal, agrandissement réel des images (taille affichée ÷ taille du fichier), longueur de ligne maximale, présence du champ e-mail au-dessus de la ligne de flottaison, hauteur de page en écrans, poids transféré. Captures en haut de page et à 30 % de la hauteur.

**Limites.** Les artefacts privés ne s'ouvrent pas dans un navigateur sans session : ils ont été rendus à partir de leurs fichiers publiés, identiques au contenu en ligne. Le redimensionnement « en direct » a été simulé en rechargeant chaque page à quatre largeurs ; aucune page ne dépend d'un calcul figé au chargement, sauf le placement des images épinglées, recalculé à chaque `resize` (vérifié dans le code). Poids mesurés sans cache et sans compression HTTP, à ± 15 %. Pas de lecteur d'écran, pas de vrai téléphone (hors périmètre : PC uniquement).

---

## 1. Verdict

- **L'exigence de Gregory est tenue partout dans les grandes lignes** : aucune page ne déborde horizontalement, aucune grille n'est plafonnée en pixels (plus de `max-width: 1280px`), la typographie est en `clamp()` jusqu'à 2560 px, les gouttières en `vw`. Le défaut du lot précédent (île centrale de 1280 px à 2560) a disparu.
- **Le vrai problème du grand écran n'est plus la largeur, c'est l'image** : les fichiers servis sont trop petits pour ce qu'on leur demande. Jusqu'à **×2,1** d'agrandissement à 2560 (Coupe V3), **×1,76** (Frise V1), **×1,62** (Frise V3). À 2560 px, c'est flou à l'œil nu.
- **Le second problème est la hauteur 720** : trois pages repoussent le formulaire sous la ligne de flottaison à 2560 × 720 (Coupe V1, Coupe V2 dès 1920, Frise V3), et la Frise V1 fait se chevaucher formulaire, invite et règle des paliers.
- **Classement** : Coupe V1 « l'Axe » en tête, Frise V2 « la Colonne » juste derrière. Les deux se combinent bien.
- **Logos** : K1 Taillé reste le bon signe principal. Mais **les lockups verticaux sont cassés** : la dernière ligne du mot est coupée par le cadre et on lit « KAI FNDRATH » sur les dix variantes. À corriger avant tout choix.

---

## 2. Classement des six accueils

| Rang | Page | Note /10 | En une phrase |
|---|---|---|---|
| 1 | **Coupe V1, « l'Axe »** | 7,5 | L'héritier direct de l'accueil A : ouverture lisible, frise des dix paliers sous le héros, l'axe de l'obélisque qui descend toute la page. Sobre, solide, peu de risques |
| 2 | **Frise V2, « la Colonne »** | 7 | La meilleure mise en scène de la croissance sans défilement épinglé : l'obélisque tombe sur une colonne centrale à chaque bande. Long, et texte aligné à droite à gauche |
| 3 | **Coupe V3, « les Salles »** | 6,5 | La meilleure ouverture interactive (curseur de paliers natif) et le seul appel à l'action toujours visible ; les salles plein cadre sont floues dès 1600 px |
| 4 | **Frise V3, « la Partition »** | 6 | La plus informative (palier → systèmes) et la plus courte ; mais elle ressemble à un tableau de bord, sort de la palette et ouvre trop haut à 720 |
| 5 | **Frise V1, « la Montée »** | 5,5 | Le moment le plus spectaculaire (la cité monte au défilement, obélisque fixe), mais 11,5 écrans épinglés, images floues, collisions à 720 |
| 6 | **Coupe V2, « la Maquette »** | 4,5 | Une maquette dessinée au code à côté de peintures Midjourney : deux mondes. Titre de 215 px, formulaire sous la ligne de flottaison |

---

## 3. Contrôle « pleine page, aucune largeur fixe », page par page

Mesures à 720 px de haut. « Agrandissement » : rapport entre la taille affichée et la taille du fichier ; au-delà de ×1,2, la perte de netteté se voit.

| Page | Débordement | Largeurs ou hauteurs figées en px trouvées dans le code | Agrandissement max (1920 / 2560) | Ligne la plus longue à 2560 | E-mail visible à 2560 × 720 | Hauteur à 1920 / 2560 |
|---|---|---|---|---|---|---|
| Coupe V1 | aucun | `min-height: max(620px, 88svh)` (héros) ; losange 18 px | ×0,99 / ×0,99 | 72 car. | **non** | 10,8 / 12,9 écrans |
| Coupe V2 | aucun | `height: clamp(440px, 66svh, 72vw)` ; tours, fenêtres et créneaux du canvas en px fixes (ne grandissent pas) | ×0,99 / ×0,99 | 72 car. | **non** (dès 1920) | 11,6 / 13,6 |
| Coupe V3 | aucun | `min-height: max(560px, 86svh)` (salles) ; champ e-mail de la barre basse sans limite (≈ 1 000 px à 2560) | **×1,59 / ×2,12** | **92 car.** | oui (barre basse) | 8,4 / 10 |
| Frise V1 | aucun | `min-height: 620px` (scène) ; barres de la règle 14 à 66 px ; scène épinglée `100svh × 11,5` | ×1,32 / **×1,76** | **94 car.** | oui | 14,4 / 15,1 |
| Frise V2 | aucun | bandes `clamp(260+40i px, …, 560+110i px)` : plafond en px par palier | ×0,94 / ×1,26 | 76 car. | oui | 11,9 / 15 |
| Frise V3 | aucun | `min-width: 520px` (schéma du lobby) ; héros `min-height: clamp(620px, 46vw, 1300px)` ; colonnes `clamp(240px, 24vw, 640px)` | ×1,22 / ×1,62 | **100 car.** | **non** | 7,3 / 9,3 |

**Lecture du tableau :**

1. **Aucune page n'a de conteneur plafonné** : les plafonds en px restants sont des **planchers de hauteur** (`min-height`) et des détails décoratifs. Ils sont légitimes, sauf deux : le `min-width: 520px` du schéma de la Frise V3 (il crée un défilement interne sous 560 px de colonne) et le héros de la Frise V3, qui fait 46vw de haut, soit **1 178 px à 2560** : sur un écran 2560 × 1440 c'est très bien, sur un portable 2560 × 1600 en zoom 200 % ou une fenêtre 2560 × 720, le formulaire disparaît.
2. **Images trop petites pour le grand écran**, c'est le défaut commun le plus visible :
   - Coupe V3 pose les bâtiments (fichiers de **1 200 × 800**) en plein cadre : ×1,6 à 1920, ×2,1 à 2560.
   - Les trois Frises utilisent les paliers en **2 048 × 878** (21:9), puis les agrandissent encore pour épingler l'obélisque (jusqu'à ×2,2 pour le palier VIII, dont l'obélisque est à 13 % du cadre). À 2560, la Montée affiche une image de 3 600 px de large tirée d'un fichier de 2 048.
   - Les Coupes V1 et V2 servent 2 400 × 1 440 en `srcset` (1280w, 2400w) : nettes jusqu'à 2560 en densité 1. Pour un écran 2560 en densité 2, il faudrait une variante 3 200 px (déjà dit en phase 1).
3. **Longueur de ligne** : les pages qui posent le texte en `em` (`--measure: 36em`) gardent 72 caractères à toute largeur (Coupe V1 et V2 : parfait). Les autres laissent des paragraphes s'étirer avec la colonne de grille : **92 à 100 caractères à 2560** (Coupe V3, Frise V1, Frise V3). Règle simple : `max-width: 34em` sur tout `p`.
4. **Taille du titre** : 128 px (Coupe V1) à 215 px (Coupe V2) à 2560. Au-delà de 160 px, le mot « Kalendrath » cesse d'être un titre et devient un motif ; la Coupe V2 le fait de plus chevaucher la ligne de fracture.
5. **Scènes trop longues** : la Frise V1 épingle la scène sur 11,5 hauteurs d'écran, soit environ 8 000 px de molette à 720 px de haut avant d'atteindre la suite. C'est le contraire de « trente secondes pour comprendre ». La Frise V2 n'épingle rien mais fait 15 écrans à 2560 × 720.

---

## 4. Constat page par page

### Coupe V1, « l'Axe » (1er)
- **Pour** : ouverture de l'accueil A corrigée (titre à droite, image libre à gauche, dégradé large), frise de dix vignettes sous le héros en vrai groupe radio (flèches du clavier, `aria-checked`), lecture au clic seulement. Le trait vertical posé à 30 % prolonge l'obélisque dans toute la page : l'idée de signature de la phase 1 est démontrée. Mesure de texte tenue à toutes les largeurs. Rien de flou.
- **Contre** : à 2560 × 720, le formulaire passe sous la ligne de flottaison (le titre de 128 px et l'accroche prennent la place). Les cartes de bâtiments montrent leur propre obélisque à un autre endroit que l'axe (Donjon : obélisque au centre de l'image) : l'axe et les images se contredisent. Les chiffres « +60 toises » en Cinzel de 170 px collants à gauche sont décoratifs. Le canvas des Straumar réalloue son tampon à chaque image (`c.width = …` dans la boucle) : coûteux pour rien.

### Frise V2, « la Colonne » (2e)
- **Pour** : la meilleure démonstration de « l'obélisque ne bouge pas, la ville grandit » sans épingler le défilement : chaque palier est une bande pleine largeur, de plus en plus haute, dont l'obélisque tombe exactement sur la colonne centrale, avec un losange numéroté. Navigation entièrement native (on défile, c'est tout). Barre d'inscription collante qui n'apparaît qu'entre le héros et le formulaire final, sortie de l'ordre de tabulation quand elle est cachée (bien fait).
- **Contre** : le bloc de gauche est aligné à droite (texte en drapeau à gauche, lecture plus lente sur trois lignes). À 2560, la ligne de genre vient mordre la pointe de l'obélisque. Étiquettes en capitales au-dessus des titres (« L'AMBASSADE ») : le tic signalé en phase 1. Les quatre paliers scellés sont des silhouettes en canvas, d'un autre style que les peintures. 15 écrans à 2560 × 720.

### Coupe V3, « les Salles » (3e)
- **Pour** : ouverture forte (titre en haut à droite, accroche, curseur de paliers natif `input type=range` avec `aria-valuetext` : le meilleur composant clavier des six). La barre basse collante est le seul appel à l'action visible en permanence, et elle s'efface quand le formulaire final arrive. Fond qui passe de la nuit à l'aube (l'hybride H2 de la phase 1).
- **Contre** : chaque salle est une image de bâtiment de 1 200 px en plein cadre : **floue dès 1600 px**, très floue à 2560. La barre basse a un champ e-mail d'environ 1 000 px à 2560 et occupe 80 px de hauteur permanente sur un écran de 720. Plaques opaques à ombre portée lourde, failles SVG à chaque séparation : le décor commence à se répéter. Alegreya italique utilisée deux fois (accroche et lore), contre une seule par page.

### Frise V3, « la Partition » (4e)
- **Pour** : la seule page qui répond à « qu'est-ce que je débloque, et quand ». Dix colonnes alignées sur leurs obélisques : bonne idée visuelle. Panneau de détail avec précédent et suivant, groupe radio complet (flèches, Début, Fin). La plus courte (7 à 9 écrans). Une seule surface sang (la guerre), comme la règle le veut.
- **Contre** : les portées colorées ajoutent trois teintes hors palette (`#8FB3E8`, `#D9A0C8`, `#C98A6A`) et donnent un **diagramme de Gantt** : c'est une page « Le jeu », pas un accueil. Les paliers VII à X sont « scellés » par un flou CSS **sur la vraie image** : le fichier en pleine résolution est téléchargé, et le panneau de détail le charge en entier ; le secret n'en est pas un. Héros de 1 178 px de haut à 2560. Six cartes « portrait à générer » dans la page : six trous.

### Frise V1, « la Montée » (5e)
- **Pour** : le moment le plus fort de la série quand il marche : on défile, la cité monte de I à X, l'obélisque reste à 30 %. Typographie française soignée (apostrophes, espaces fines, filtre automatique).
- **Contre** : 11,5 écrans épinglés ; à 1920 × 720, le formulaire, l'invite « Faites défiler » et la règle des paliers se chevauchent en bas de l'écran ; pendant les transitions, deux panneaux à moitié coupés sont visibles ; images ×1,3 à ×1,8. Elle charge les dix paliers (≈ 1,2 Mo) et montre les paliers VII à X en clair, alors que le texte les dit secrets. En mouvement réduit, l'enchaînement reste lié au défilement (acceptable), mais la scène reste aussi longue.

### Coupe V2, « la Maquette » (6e)
- **Pour** : la règle des toises cliquable et l'étage actif qui s'éclaire : bonne idée de navigation. Paliers VI à X scellés et non chargés (le seul vrai secret de la série).
- **Contre** : la maquette dessinée au code (rectangles, créneaux de 8 px, fenêtres de 3 px) répète l'erreur de l'Atlas : à côté des illustrations, elle paraît d'un autre jeu, et ses éléments en px fixes rapetissent à 2560. Titre de 161 px à 1920 et 215 px à 2560, posé à cheval sur la fracture. Formulaire sous la ligne de flottaison dès 1920 × 720. La maquette disparaît sous 900 px.

---

## 5. Défauts bloquants (à corriger quelle que soit la piste)

1. **Images trop petites pour le grand écran** : générer les paliers et les bâtiments utilisés en plein cadre en 3 200 px (upscale Midjourney), et ne jamais poser un bâtiment de 1 200 px en fond plein écran. Plafonner l'agrandissement d'épinglage (`s ≤ 1,15`) et accepter que l'obélisque glisse de quelques % plutôt que de flouter.
2. **Formulaire sous la ligne de flottaison à 720 px de haut** (Coupe V1, Coupe V2, Frise V3) : titre en `clamp(56px, min(6vw, 13vh), 150px)`, héros en `min-height: min(100svh, …)` et non en `vw`.
3. **Secret des paliers incohérent** : Coupe V1, Coupe V3 et Frise V1 montrent les dix images, Coupe V2 en scelle cinq, Frises V2 et V3 quatre ; Frise V3 « scelle » par un flou qui laisse télécharger l'image. Gregory doit trancher (combien de paliers montrés), puis : un palier scellé ne charge **jamais** son image. Les légendes `tier.c7` à `tier.c10` (« Un palais au bord de l'eau », « Le portail s'éveille ») en disent déjà beaucoup.
4. **Longueur de ligne non bornée** (92 à 100 caractères à 2560) : `max-width: 34em` sur les paragraphes.
5. **Polices chargées depuis Google Fonts** sur les sept artefacts, y compris la planche des logos : interdit par le brief (RGPD). Acceptable en maquette, à ne pas reprendre.
6. **Couleurs hors palette** (Frise V3) et **étiquettes en capitales** (Frise V2) : contraires à la règle de marque.

---

## 6. Accessibilité, animation, poids

| Page | Mouvement réduit | Clavier | ARIA | Poids constaté (premier écran / page entière) |
|---|---|---|---|---|
| Coupe V1 | règle globale (`animation`/`transition: none`), canvas figé | frise en radio + flèches | bon (`aria-live` sur la légende, libellés) | ≈ 0,1–0,3 Mo / ≈ 0,4 Mo |
| Coupe V2 | idem, maquette figée | sceaux en radio ; scellés `aria-disabled` | canvas `role="img"` libellé | ≈ 0,1 Mo / ≈ 0,7 Mo |
| Coupe V3 | idem | curseur natif, `aria-valuetext` | bon | ≈ 0,2 Mo / ≈ 0,5 Mo |
| Frise V1 | invite figée ; enchaînement lié au défilement (pas d'animation autonome) | règle en boutons ; panneaux hors champ `inert` | bon | ≈ 0,15 Mo / **≈ 1,2 Mo** |
| Frise V2 | barre sans transition | barre retirée de la tabulation quand cachée | bon | ≈ 0,2 Mo / ≈ 0,5 Mo |
| Frise V3 | **aucune règle** (transitions courtes seulement) | radio complet (flèches, Début, Fin) | `aria-live` sur le détail | ≈ 0,3 Mo / ≈ 0,3 Mo |

Communs : lien d'évitement présent sur les Coupes, absent des Frises ; sélecteur de langue en liens `hreflang` (Coupes) ou en boutons `aria-pressed` (Frises : à remplacer par des liens vers la page jumelle) ; libellé e-mail visible partout sauf dans les barres collantes (libellé masqué, acceptable car le formulaire complet existe ailleurs). Fluidité : aucune saccade visible, mais la Coupe V2 redessine sa maquette entière environ seize fois par seconde et la Coupe V1 réalloue son canvas à chaque image, ce qui chauffera un portable d'entrée de gamme.

---

## 7. Les dix logos

### Classement

| Rang | Signe | Note /10 | Verdict |
|---|---|---|---|
| 1 | **K1 Taillé** | 7,5 | Lu « K » à 16 px, obélisque évident, branches soudées : la lecture « i< » a disparu. Signe principal |
| 2 | **K5 Négatif** | 7 | Le meilleur à 16 px (K évidé dans une stèle pleine). Mais la stèle à pente douce se lit « maison ». Garder comme favicon et icône d'application, avec un pyramidion plus aigu |
| 3 | **N1 Nœud losange** | 6,5 | Bonne idée (convergence), mais le losange mana est posé **sur l'or** (1,14:1), contre la règle de la planche elle-même ; à 16 px c'est un point gris. À reprendre en losange évidé |
| 4 | **K6 Paliers** | 6 | Raconte la progression, joli en grand ; devient une masse sous 24 px |
| 5 | **C1 Couronne cité** | 6 | Bon pictogramme de capitale et de palier, pas une marque |
| 6 | **K4 Rune** | 5,5 | Le « i< » revient de loin, comme le dit la planche |
| 7 | **K3 Médaillon** | 5 | Bon avatar Discord et X ; anneaux fusionnés à 16 px |
| 8 | **K2 Fil** | 4,5 | Trait trop fin : gris à 16 px |
| 9 | **C2 Couronne pointes** | 4 | « Herse » ou dents de scie en petit |
| 10 | **N2 Nœud cordon** | 3,5 | Le plus doux, hors du ton épique |

### Défauts bloquants
1. **Lockups verticaux tronqués** : le cadre SVG s'arrête à 138 unités alors que le mot descend à 146. Les barres basses de L et de E sont coupées : on lit **« KAI FNDRATH »** sur les dix planches (visible dans « Planche de tests »). Agrandir le `viewBox` vertical de 8 unités.
2. **Wordmark trop maigre pour son nom** : les six « écritures » sont des traits de 6 à 12 unités réduits à 0,48 ; au format d'en-tête, Taillé, Rune et Paliers se lisent comme une même linéale fine à petits empattements. La version « petite taille » plus grasse, demandée en phase 1, manque encore.
3. **Veine de mana** : elle n'existe qu'en couleur et disparaît sous 48 px (la planche le reconnaît). Accepté pour K1 tant que le logo ne dépend pas d'elle ; refusé pour N1, où elle est le sujet.
4. **Favicon** : bien redessiné à 16 et 32 px pour K1 et K5 ; les autres sont des réductions.

La planche elle-même est exemplaire en responsive (grilles `auto-fit` en `min(100%, 23rem)`, en-tête collant dont le logo suit `clamp(32px, 2.6vw, 84px)`, thème clair et sombre) et documente honnêtement ses limites.

---

## 8. Éléments à combiner

**Proposition d'accueil hybride**, fondée sur la Coupe V1 :

1. **Ouverture de la Coupe V1** (titre à droite, image à gauche, obélisque à 30 %), avec le titre borné par la hauteur d'écran pour que le formulaire tienne à 720 px.
2. **Le curseur de la Coupe V3** à la place des dix vignettes : composant natif, accessible, une seule ligne de hauteur.
3. **La colonne de la Frise V2** pour la section « Une cité qui grandit » : quatre à six bandes, obélisque posé sur l'axe, aucune scène épinglée. Mettre l'axe à 30 % (comme l'ouverture) plutôt qu'au centre, pour que le trait de la Coupe V1 et la colonne ne fassent qu'un.
4. **La barre basse de la Coupe V3**, dans la version de la Frise V2 (n'apparaît qu'après le héros, disparaît au formulaire final), avec un champ plafonné à 28em.
5. **Le passage nuit vers aube** de la Coupe V3 pour la fin de page.
6. **Le panneau « palier → ce qui s'éveille » de la Frise V3** : pour la page **Le jeu**, pas pour l'accueil, sans les couleurs ajoutées.
7. **Le filtre typographique français** des Frises (apostrophes, espaces fines), à reproduire dans Astro au build.
8. **Logos** : K1 Taillé en signe, K5 corrigé en favicon et icône, K3 en avatar, C1 en pictogramme de capitale et de palier ; Gonfanon et Sceau comme déclinaisons (déjà prévu).

À jeter : la maquette en canvas (Coupe V2), les silhouettes scellées en canvas (Frise V2), la scène épinglée de 11,5 écrans (Frise V1), les flous CSS en guise de secret (Frise V3).
