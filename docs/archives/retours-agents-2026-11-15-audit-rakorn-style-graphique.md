# Audit de Rakorn (play.rakorn.fr) : style graphique, animations, interface, mobile, technique

Agent B, 2026-11-15. Complète l'audit fonctionnel de l'agent A (`retours-agents-2026-11-15-audit-rakorn-fonctionnalites.md`, captures 00 à 31). Captures dans `docs/archives/audit-rakorn-2026-11-15/`, numérotées de 40 à 55 (index en fin de rapport).

Règle d'usage : les captures et assets de Rakorn sont archivés ici comme **références d'étude internes**. Aucun asset, illustration ni code de Rakorn ne doit être copié dans Kalendrath ; seuls les principes sont réutilisables.

## 0. Actions ayant modifié le compte

Aucune. Lecture et navigation uniquement (touches de raccourci L/I/M/P/F/C, survols, redimensionnements). Rien n'a été cliqué sur « Envoyer le lien ». Le viewport a été remis en 1280 x 900 à la fin.

## 1. Direction artistique

### 1.1 Ambiance et fonds
- **Heroic fantasy sombre et chaude** : fond quasi noir bleuté (`rgb(6,10,14)`) recouvert d'un dégradé noir à 84-92 % d'opacité et d'un halo radial doré très léger (`rgba(199,154,69,.07)`), puis d'une illustration plein écran propre à chaque écran. L'accueil (`40`) montre un paysage de crépuscule avec château sur un pont, la forge (`49`) une forge sombre à braises, l'inventaire un vert profond (teinte du palier de rareté). La variable `--slab-pierre` charge une texture de pierre `background-master-house.avif`.
- Les panneaux sont **sombres, translucides, bordés d'un filet doré fin**, avec de petits losanges ornementaux (étapes, séparateurs, titres entre deux losanges « ◆ PORTES DU ROYAUME ◆ »). L'illustration reste visible entre les panneaux : c'est ce qui donne l'effet « jeu AAA » plutôt que « tableau de bord ».
- Les fonds sont de **vraies illustrations générées (style peinture numérique/IA)**, une par écran ; les ressources, objets, créatures et portraits sont du même rendu semi-réaliste (cf. `41`, `49` : bague en bronze et gemme verte, lingots, charbon incandescent). La cohérence vient du traitement unique (même éclairage, même palette terreuse + une couleur de rareté), pas d'un style d'icône vectoriel.

### 1.2 Palette (relevée dans le CSS)
- Texte courant : crème chaud `rgb(243,226,179)` (#F3E2B3), titres `rgb(236,220,184)`, texte secondaire gris chaud `rgb(153,149,140)` et `rgba(236,222,196,.6)`.
- Or : dégradé de bouton `rgb(246,217,137)` vers `rgb(217,164,…)` avec texture de métal (`bg-btn-texture-yellow.webp`) et reflet ; texte du bouton brun très sombre `rgb(42,26,16)` (contraste fort).
- Accent froid : `--mx-azur #8cc4ff`, signature turquoise `--rarete-signature #4fd2b8`.
- **Raretés par couleur de texte/cadre** (classes `rpg-rarity-*`) : commun `rgb(233,205,133)` (ivoire/or), peu commun `rgb(99,209,125)` (vert), rare `rgb(126,189,255)` (bleu), épique `rgb(199,156,255)` (violet), mythique **animé** (`mythic-sweep` : reflet qui balaie le texte, 5,5 s). Dans les tableaux de marché les pastilles sont plus sombres (peu commun `#60ba76`, rare `#6fa8dc`).
- Peu de variables CSS globales (5 seulement dans `:root`) : le thème est surtout porté par des classes `rpg-*` et des valeurs en dur, ce qui explique un CSS de 461 ko.
- Les fiches se teintent selon la rareté ou le métier (`--sct-teinte: #63d17d` pour le sanctuaire d'un objet peu commun) : **une seule variable CSS pilote halo, anneau et lueur**.

### 1.3 Typographies
- **Cinzel** (serif romain gravé, graisses 400-900) pour tout ce qui est « emblème » : titres, boutons, navigation, étiquettes en capitales espacées (letter-spacing 2 à 2,4 px, tailles 9 à 17 px, titres de page ~25-30 px).
- **Inter** (400-700) pour le corps de texte, les descriptions, le bandeau d'e-mail ; **Geist Mono** pour quelques chiffres techniques. Polices servies via `next/font` (woff2, 3 fichiers, ~95 ko), avec fallback ajusté.
- Chiffres du jeu (or, énergie 399/400) en Cinzel dorée ; unités et libellés d'étiquette en petites capitales grisées.

### 1.4 Icônes et cadres
- **Navigation** : 14 icônes illustrées (40x40 px AVIF, style peinture sombre, pas de pictogrammes plats) dans une barre verticale étroite ; au survol la barre s'étend et affiche le nom et la **touche de raccourci dans un petit encadré** (`42`).
- **Cadre losange doré** : les onglets d'inventaire, les paliers de niveau de métier (1, 7, 14, 21...), les paliers de classement et les étapes du tutoriel sont des **losanges** (carré tourné de 45°, filet doré, état actif = rempli et plus grand, « bat » avec `rpg-etapes-bat`, 2,2 s). C'est le motif d'interface récurrent, bien plus que les cadres.
- **Cases d'objet** (sac) : carré à fond sombre teinté de la rareté (fichiers `bg-slots-green/…avif`), bord fin, quantité en bas à droite, petite étincelle ou croix pour « œuvre royale ». Pas de grand cadre doré par objet : sobre à l'échelle d'une grille, raffiné en grand (fiche).
- **Jauges circulaires de métier** : cercle doré partiel autour de l'icône avec niveau en pastille dessous (`40`, `44`). Transition `stroke-dashoffset` de 900 ms (SVG `circle`).

### 1.5 Ce qui fait « premium »
1. Des illustrations de grande qualité et uniformes, une par écran.
2. Typographie gravée Cinzel + capitales espacées + peu de couleurs.
3. Beaucoup de micro-animations lentes et discrètes (respiration, reflets, braises) plutôt que quelques effets voyants.
4. Chaque texte important a un **traitement matière** (or métallique, texture, reflet) ; les boutons principaux ont une vraie texture.
5. Hiérarchie claire : un seul bouton doré par vue (« Prendre l'or », « Ouvrir le journal », « Fabriquer »).
6. Sons : musique d'ambiance (mp3 937 ko), sons m4a ; non évalués auditivement.

## 2. Animations et micro-interactions

### 2.1 Ampleur
**Environ 330 `@keyframes` écrits à la main**, préfixés par écran (`rpg-sct-*` sanctuaire, `rpg-fgx-*` forge, `rpg-dsl-*` poussière du sac, `rpg-jauge-*` jauges, `rpg-cel-*` célébrations, `rpg-vda-*` victoire, `rpg-rel-*` reliques, `rpg-her-*` héritage...). **Aucune bibliothèque d'animation** (pas de GSAP, Framer Motion, Lottie, ni canvas : `canvas` = 0 ; 33 SVG, 86 `img`). Tout est CSS + SVG inline + `Web Animations` natives. Le respect de `prefers-reduced-motion` est présent dans les feuilles de style.

### 2.2 L'anneau qui tourne (« sanctuaire » d'objet) : `45`, `46`, `49`, `44`
Composant `<span class="rpg-sct rpg-met-sanctuaire" style="--sct-teinte:#63d17d">` contenant 4 couches :
1. `rpg-sct-halo` : `radial-gradient` teinté (34 % puis 10 % d'opacité), animation `rpg-sct-respire` (opacité .75 vers 1, 5 s, infinie).
2. **SVG extérieur** `viewBox 0 0 100 100` : deux cercles filets (r 48,6 et 46,4) et **12 petits losanges** (`<rect>` de 2,6 unités, `transform="rotate(n*30 50 50) rotate(45 50 1.5)"`), animation `rpg-sct-tourne` = `rotate(360deg)` en **120 s, linéaire, infinie**.
3. **SVG intérieur** : cercle de « crans » (r 41) + traits de marque, longs ou courts en alternance (tous les 15°), même animation en **sens inverse, 90 s**.
4. `rpg-sct-socle` : lueur sous l'objet, `rpg-sct-flamme` (opacité qui vacille de façon irrégulière 0,62 à 0,95 sur 3,4 s : fausse flamme).

L'image de l'objet au centre flotte : `rpg-mtx-flotte` / `rpg-fgx-flotte`, `translateY(+/-5px)` en 6 s. L'effet global est donc : **objet qui flotte + deux anneaux gravés contre-rotatifs très lents + halo qui respire**. À 15 s d'écart (`45` vs `46`), la rotation est de ~45 degrés (matrice de transformation relevée), ce qui est volontairement presque imperceptible mais donne la sensation de vie. Teinte pilotée par la rareté.

Une variante 3D existe (`rpg-rel-anneau-a/b/c` : `rotateX(74deg) rotate(360deg)`, anneaux inclinés en perspective, avec `rpg-rel-levite` = lévitation de 10 px) pour les reliques ; je ne l'ai pas vue en action (écran non ouvert).

### 2.3 Autres effets relevés (liste vérifiée via `document.getAnimations()`)
| Élément | Technique | Remarque |
|---|---|---|
| **Poussière / particules du sac et des métiers** (`rpg-dsl-poussiere`) | 12 `<span>` absolus qui montent de ~78 vh (`translate(var(--dx), -78vh)`), 11 à 18 s chacun, opacité 0 vers .9 vers 0 | Chaque particule a sa durée et sa dérive horizontale via variable CSS. Pas de canvas. |
| **Braises de la forge** (`rpg-fgx-braise`) | idem, 8 à 14 s ; foyer `rpg-fgx-flamme` 3,4 s | Même principe, couleur orange. |
| **Jauges d'XP/durabilité** (`rpg-met-jauge-plein`) | trois animations empilées : « souffle » (filtre `saturate/brightness` calculé avec `--puissance`), « reflet » (un reflet qui traverse, `translate` de 350 %), 6 « étincelles » (`rpg-jauge-etincelle`, 1 à 1,5 s, montent de 26 px) | La jauge devient plus lumineuse quand la valeur est plus haute. |
| **Mythique** | `mythic-sweep` : `background-position` d'un dégradé clippé sur le texte, 5,5 s | Texte qui scintille. |
| **Bouton scellé** (`sceau-luciole`) | pseudo-élément dont l'opacité pulse (0 puis .85 à 82 %), 6,5 s | Lueur de luciole sur le bouton « Fabriquer ». |
| **Pastilles de notification** | `rpg-pastille-frappe` : 520 ms, `scale 0.3 vers 1.18 vers 1` | Effet de « tampon » à l'apparition des badges. |
| **Bouton de file** (`rpg-heraut-halo`) | opacité .35 vers 1, 2,2 s | Attire l'œil sans bouger. |
| **Étapes (losanges)** | `rpg-etapes-bat` rotation 45° + scale 1.12 | |
| **Marché** | entrée `rpg-mkt-fondu` 200 ms, `rpg-mkt-entree` 220 ms | Transitions courtes. |
| **Changement d'écran** | fondus de 420 ms (`rpg-fgx-fondu`, `rpg-ivx-fondu`) en cascade sur les blocs | |
| **Cérémonies** (victoire, niveau, titre, héritage) | familles `rpg-vda-*`, `rpg-cel-*`, `rpg-titre-*` (plaque, rayons, poussière, couronne) | Non déclenchées pendant l'audit. |
| Tooltips | `rpg-infobulle-anime` avec délai de 180 ms (`animation-delay`) | Fiche d'objet riche (cf. 3). |

### 2.4 Faisabilité en React + Tailwind pour Kalendrath
- **Très faisable, coût faible.** Rakorn n'utilise ni moteur ni lib : tout est CSS pur + SVG inline. Un composant React `<Sanctuaire teinte={rareté} icône=…>` de ~60 lignes reproduit l'anneau (principe) : 2 SVG générés par boucle (`Array.from({length:12})`), `@keyframes spin` dans `tailwind.config` (`animation: { 'spin-120': 'spin 120s linear infinite' }`), `animate-[spin_90s_linear_infinite_reverse]`, un `radial-gradient` pour le halo, une variable CSS `--teinte` définie par rareté.
- Particules : un composant `<Poussiere n={12}>` qui tire des durées/dérives aléatoires et pose des variables CSS ; coût GPU faible (transform + opacity). Prévoir `motion-reduce:hidden` et limiter le nombre d'éléments animés sur mobile.
- Jauges : `stroke-dashoffset` avec `transition`, filtre `brightness` proportionnel via `calc()` ; étincelles = quelques `<i>` avec variables.
- Raretés animées (mythique) : `bg-clip-text` + `background-position` animé.
- **Points d'attention** : (a) tester les performances sur mobile d'entrée de gamme (beaucoup de couches animées simultanément) ; (b) mettre les keyframes dans un fichier partagé et nommé plutôt que 330 déclarations isolées (Rakorn en paie le prix : 461 ko de CSS) ; (c) `prefers-reduced-motion` et option « effets réduits » dans les réglages ; (d) shadcn/ui n'apporte pas ces effets : ils seront des composants maison au-dessus de Radix.

## 3. Interface et ergonomie

### 3.1 Navigation
- **Rail latéral gauche** de 14 icônes illustrées, étroit (~80 px) ; au survol il s'élargit avec libellés et **touche de raccourci affichée dans un petit cadre** (L Royaume, C Campagne, I Inventaire, Q Banque, F Forge, A Compétences, P Métiers, J Contrats, G Guilde, H Hauts faits, X Codex, N ..., M Marché). Pastilles numériques de notifications (1, 29) sur les icônes. L'écran actif est marqué par un petit losange doré à gauche.
- **En-tête** persistant : portrait + niveau, barre de vie rouge, barre d'XP dorée, puis « ressources » (or, deux jetons, énergie 399/400 avec fiole), aide, coffre, réglages, messagerie, journal, proclamations. Tout est visible sur chaque écran sans scroll.
- **Retours visuels** : pastilles qui « frappent » à l'apparition, bandeau de notification de vente (« Vous avez vendu +161 or Charbon », visible en mobile), cérémonies à la victoire, jauge « après » (aperçu du gain avant fabrication : `rpg-jauge-apres`, « Gain estimé -9 »). Les actions risquées affichent leur coût avant clic (énergie, estimation de chance de victoire, cf. agent A).

### 3.2 Densité et hiérarchie
- Accueil (`40`) : trois colonnes (fiche et classement / illustration libre au centre / cartes d'action à droite) ; l'illustration respire au milieu, les informations sont groupées en cartes sombres. Lisible, mais le bas du panneau gauche est masqué par le rappel d'e-mail.
- Métiers (`44`) : le plus abouti. Liste de recettes à gauche (miniature, nom coloré par rareté, durée, « 0 possible » en rouge), **grand objet central** avec statistiques de part et d'autre de l'anneau, composition requise en bas (cases à bord rouge quand il manque, « 0/3 »), colonne de droite pour la maîtrise (paliers Honnête / Royale / Chef-d'œuvre), le gain d'XP, la quantité (Min/+10/+20/Max), et **un seul bouton doré « Fabriquer »** avec un bouton secondaire « Accélérer ». Excellent exemple de hiérarchie « liste, aperçu, action ».
- Fiche d'objet (survol, `48`) : tooltip à bandeau teinté de la rareté, miniature, nom en gras avec quantité, « Peu commun · Ressource », pré-requis de métier, indice « Clic droit : actions ». Version « comparaison » avec l'objet équipé (`is-comparaison`).
- Marché (`42`, `43`) : tableau dense en lignes de ~46 px : nom coloré par rareté, pastille de rareté, variation de prix (flèche rouge/verte et %), vendeur principal « et N autres », prix moyen, « à partir de », disponibles. Barre d'outils : recherche, catégories, filtres de niveau, œuvres, ensembles, tri ; bandeau « à encaisser 161 or ». Fonctionnel, mais voir 3.4.

### 3.3 Modales
Fenêtres avec voile (`modal-veil`) et entrée par glissement (`modal-rise`/`modal-sink`), toasts (`toast-in`), rappels dans un `status` en bas à gauche (le bandeau de validation d'e-mail), cartes « chronique » avec cire et sceau (`rpg-adresse-cire`).

### 3.4 Accessibilité et lisibilité (points faibles)
- **Texte minuscule sur le marché** : relevé de 221 lignes avec les libellés « prix moyen », « à partir de », « disponibles » à **6,7 px** (gris `#99958C` à 70 % d'opacité sur noir, contraste ~5:1 mais illisible par la taille) ; les pastilles de rareté (« Peu commun », « Commun », « Rare ») sont à **7 px**, « Ressource » / « Objet fabriqué » à **8 px**. Très en dessous du seuil raisonnable (12 px minimum, 14 px de préférence). 884 éléments à 6,7 px au total dans le DOM courant.
- Capitales Cinzel de 9 à 11 px avec lettrage large : jolies mais fatigantes ; nom du titre tronqué (« ARTISAN ... »).
- Les couleurs de rareté comme seul signal (vert/bleu) ; elles sont doublées d'une pastille texte, bon point.
- Navigation clavier : touches de raccourci, `role=tooltip`, `role=status`, `aria-hidden` sur les décors, `alert`, `navigation` nommée : base correcte.
- Le rappel de validation d'e-mail est bloquant visuellement (cache le bas de l'écran sur PC et sur mobile) : à ne pas reproduire.

## 4. Mobile (390 x 844) : `51` à `55`

- **Le jeu est responsive**, pas de défilement horizontal (largeur de document 384 px). Le rail latéral est remplacé par une **barre d'onglets inférieure à 5 entrées : Sac, Marché, Métiers, Chat, Accueil, + « Plus »** (6 en comptant Plus), icônes illustrées, onglet actif doré avec petit losange, pastilles de notification. Les autres écrans sont dans « Plus ».
- **En-tête mobile compact** : portrait avec niveau, bandeau de dernier événement (« Vous avez vendu +161 or Charbon »), réglages, journal. Les ressources (or, énergie) ne sont plus dans l'en-tête ; elles sont reportées dans les écrans concernés (énergie dans la campagne).
- **Marché mobile** (`52`) : le tableau devient une **liste de cartes** (miniature, nom coloré, « Rare · 114 en vente », prix « Dès 41 + pièce ») ; filtres en une ligne défilante et bouton « Filtres · 1 ». C'est nettement plus lisible que la version PC (textes de 12 à 17 px). Le marché a donc une vraie conception mobile et pas un simple rétrécissement.
- **Métiers mobile** (`53`) : onglets Récolte/Artisanat, liste de recettes en cartes, paliers de niveau en losanges défilants. Le panneau « fabriquer » n'est pas dans la première vue (à faire défiler/ouvrir).
- **Inventaire mobile** (`54`) : mannequin d'équipement en une seule colonne, stats en deux lignes de trois, onglets de métier en losanges. Très propre.
- **Campagne mobile** (`55`) : cartes empilées (zones, niveau, énergie, suivi des quêtes, objectif, prochain combat avec créature et stats).
- Défauts : le rappel de validation d'e-mail et le bandeau de vente couvrent le haut de l'écran en permanence (~100 px sur 844) ; en-tête et barre du bas mangent ~170 px de hauteur utile ; certains en-têtes de page sont coupés sous l'en-tête fixe (`55`, titre « Du voyageur »).
- Remarque : les animations de fond et les particules restent actives sur mobile (non mesuré en performance).

## 5. Technique

- **Framework** : Next.js (App Router : `window.__next_f` présent, classes de modules `next/font`, composant `next/image` avec `srcset` généré `/variantes/64|128|256|640|1024/…`), donc **React** côté rendu. Tailwind visible (`min-h-full flex flex-col` sur `body`, `select-none object-contain`) mélangé à un très gros CSS maison à préfixes `rpg-*` / `org-*`. Pas de service worker, pas de manifeste PWA relevé. `<html lang="fr">`, viewport standard.
- **Poids** (page de marché, après navigation interne) : **250 requêtes, ~3 Mo transférés** : JS 45 fichiers / 927 ko (le plus gros 192 ko), **CSS 54 fichiers / 461 ko** (un fichier de 344 ko), polices 95 ko, images AVIF 43 fichiers / 293 ko (la plus grosse : `home-v1.avif`, 172 ko), une texture WebP, **musique de fond mp3 937 ko** (le principal poids), sons m4a 25 ko, données JSON de jeu (`/api/...` ~83 ko pour 38 appels).
- **Formats d'images** : **AVIF** presque partout (logo, navigation, fonds, slots, objets), WebP pour la texture des boutons ; icônes d'objets en AVIF aussi ; **variantes redimensionnées côté serveur** (`/variantes/<largeur>/…`). Pas de sprites, pas de Lottie, pas de WebGL.
- **Polices** : Inter, Cinzel, Geist Mono via `next/font` (auto-hébergées, woff2, subsets).
- **Animations** : voir 2.1 : CSS + SVG inline uniquement.
- Console : 0 erreur, ~200 avertissements cumulés (non analysés).

## 6. Pour Kalendrath

### 6.1 Ce qui est réutilisable comme principes (sans copier d'asset)
1. **Un rail de navigation vertical avec raccourcis clavier affichés** et pastilles de notification : cohérent avec un jeu à nombreux écrans ; à doubler d'une barre d'onglets inférieure en mobile (5 entrées + « Plus »).
2. **Une illustration plein écran par écran, des panneaux sombres translucides au filet fin**, laissant respirer l'image. Compatible avec la planche de style existante (palette gris fer / rouge sang séché / bronze vieilli + lueur violet-bleu) : à la place de l'or chaud, **la signature de Kalendrath peut rester le violet-bleu arcanique** comme couleur d'accent.
3. **Le motif « losange »** comme brique graphique unique (paliers, étapes, onglets, séparateurs). Facile à produire en SVG/CSS, identitaire, à décliner dans notre style (pierre, fer, rune).
4. **Le « sanctuaire d'objet »** : objet central grand, qui flotte lentement, entouré d'un anneau gravé qui tourne (deux couches contre-rotatives, 90 à 120 s), avec halo qui respire et teinte selon la rareté. À adapter pour nos héros, unités, bâtiments et recherches (anneau runique au lieu de losanges dorés).
5. **Teinte pilotée par une variable CSS de rareté** (`--teinte`) : halo, anneau, bordure et texte suivent la rareté sans code spécifique.
6. **Hiérarchie « liste, aperçu, action »** et **un seul bouton principal** par vue, avec aperçu du résultat avant clic (gain estimé, coût d'énergie, chance de victoire).
7. **Particules ambiantes très lentes** (poussière, braises) par ambiance d'écran, quelques éléments seulement.
8. **Jauges vivantes** (reflet qui balaie, étincelles, luminosité proportionnelle au remplissage).
9. **Marché mobile en cartes** plutôt qu'en tableau réduit.
10. **Une typographie gravée pour les emblèmes + une sans-serif pour le texte** : Rakorn l'applique avec Cinzel/Inter ; Kalendrath doit choisir ses propres polices (libres de droits, à valider avec la planche de style) pour ne pas ressembler à un clone.

### 6.2 À éviter ou adapter
- **Textes de 6,7 à 8 px** sur le marché : fixer un plancher (12 px, 14 px recommandé) dans le design system.
- **Rappels bloquants** (bandeau d'e-mail) qui masquent l'interface sur mobile.
- **Gros CSS sur-mesure sans système** (330 keyframes, 461 ko) : préférer un fichier de tokens et d'animations partagé (Tailwind config + composants).
- **Musique en mp3 de 937 ko chargée d'office** : charger à la demande.
- Public adulte, « ludique » = accessible et attirant : Rakorn tient cet équilibre par la sobriété (pas de couleurs saturées, peu d'emojis, texte gravé) ; garder cette retenue, éviter l'esthétique de gacha (rayons, confettis) hors moments de gloire.
- Le fond « paysage de crépuscule doré » est chaud ; Kalendrath a choisi des gris fer + violet-bleu : transposer la **structure** (illustration + panneaux + lueurs), pas la couleur.

### 6.3 Recommandations priorisées

**Quick wins (jours, dans le design system React/Tailwind/shadcn)**
1. Définir les **tokens** : palette (planche de style), raretés (5 couleurs + mythique animé), échelle typographique avec plancher 12 px, rayons, ombres, filets.
2. Composant `Losange` (SVG/CSS) et `Pastille` (badge à animation « tampon » `scale .3 → 1.18 → 1`, 520 ms).
3. Composant `Jauge` (reflet qui balaie + luminosité selon `--puissance`).
4. Composant `Infobulle` d'objet teintée par rareté, avec délai de 180 ms et comparaison à l'équipé.
5. Raccourcis clavier affichés au survol du rail + `prefers-reduced-motion` dès le départ.

**Moyen chantier (semaines)**
6. `Sanctuaire` (anneaux SVG contre-rotatifs + halo + flottement + socle vacillant) et `Poussiere` (particules CSS), réutilisés pour fiche d'unité, héros, bâtiments, recherches.
7. Gabarit d'écran « illustration de fond + panneaux translucides » avec fondus en cascade de 420 ms.
8. Disposition mobile (barre d'onglets à 5 entrées + « Plus », cartes au lieu de tableaux) : dès la maquette, avec test à 390 x 844 (cohérent avec la règle PC + mobile de Gregory).
9. Mesure des performances d'animation sur mobile d'entrée de gamme et option « effets réduits ».

**Gros chantiers (en lien avec la Phase 3a)**
10. **Production des illustrations de fond et d'objets cohérents** (Midjourney `--sref` figé) : c'est le vrai facteur « premium » de Rakorn et le plus coûteux ; prévoir un jeu d'icônes de ressources en rendu semi-réaliste uniforme avant d'animer quoi que ce soit.
11. Pipeline d'images optimisé (AVIF + variantes par largeur, comme Rakorn : `/variantes/<largeur>/`), à brancher dans Vite/Laravel.
12. Cérémonies (victoire, montée de niveau, titre) : à traiter après le MVP, ce sont les effets les plus lourds en conception.

## 7. Limites de l'audit
- Je n'ai pas déclenché de cérémonies, de combats ni de transactions, donc les animations `rpg-vda-*`, `rpg-cel-*`, `rpg-titre-*`, `rpg-rel-*` ne sont connues que par leurs noms (et un extrait pour `rpg-rel-anneau-a`).
- Les animations ont été relevées sur les écrans Accueil, Inventaire, Marché, Métiers, Forge ; pas sur Campagne, Conquête, Guilde.
- Les tailles de police sont des valeurs calculées sur un viewport de 1280 px ; certains textes sont peut-être mis à l'échelle ailleurs.
- Poids de page relevé via `performance.getEntriesByType('resource')` après plusieurs navigations internes (cache et préchargement mélangés, donc un chargement à froid peut différer).
- Les raccourcis clavier ont parfois mené à un écran inattendu (la touche « L » m'a conduit au Classement) ; comportement non investigué.
- Le son et la musique n'ont pas été écoutés.

## 8. Index des captures (`docs/archives/audit-rakorn-2026-11-15/`)
- `40-style-accueil-pc.png` : accueil, ambiance générale, panneaux, jauges de métier, boutons dorés.
- `41-style-inventaire-pc.png` : inventaire, cases de rareté, mannequin.
- `42-style-marche-pc.png` : marché avec rail latéral ouvert (raccourcis visibles).
- `43-style-marche-liste-pc.png` : marché, liste dense (texte de 6,7 à 8 px).
- `44-style-metiers-pc.png` : métiers, fiche d'objet avec anneau (sanctuaire), maîtrise, fabrication.
- `45-anneau-sanctuaire-t0.png` et `46-anneau-sanctuaire-t15s.png` : anneau à t=0 et t=15 s (rotation d'environ 45 degrés).
- `47-survol-ingredient-metiers.png` : survol des paliers de niveau (info-bulle des recettes débloquées).
- `48-survol-objet-inventaire.png` : fiche d'objet au survol (Étain).
- `49-forge-pc.png` : forge, sanctuaire d'une bague, fond de forge, braises.
- `50-campagne-pc.png` : campagne PC.
- `51-mobile-home.png` (arrivé sur le Classement), `52-mobile-market.png`, `53-mobile-crafting.png`, `54-mobile-inventory.png`, `55-mobile-campaign.png` : mobile 390 x 844.
