# Direction de design du site vitrine

> **Statut (2026-10-31) : concept non retenu, en cours de remplacement par les mockups.** Le concept « L'heure des lanternes » et son prototype (`site-prototype/`) n'ont pas convaincu Gregory. Il est remplacé par des mockups alignés sur la direction visuelle déjà validée pour l'interface du jeu (Mix v5) : [canvas « Kalendrath — Mockups site vitrine »](https://claude.ai/artifact/L69UxYW8iM2U2fs8j1DT98). Le reste de ce document est conservé pour mémoire.

*Version 1 du 2026-10-30. Brouillon de travail, à valider par Gregory. S'appuie sur le [brief du site vitrine](brief-site-vitrine.md) (structure, textes, RGPD, technique), le [lore](lore.md), la [planche de style](direction-artistique-planche-de-style.md), les [briefs des bâtiments](direction-artistique-batiments.md) et le retour de Gregory sur la direction visuelle (public adulte ; « ludique » veut dire accessible et attirant, jamais enfantin ; les pistes B « Nuit arcanique » et D « Épopée cinématique » plaisent).*

**Prototype à ouvrir :** [site-prototype/index.html](../site-prototype/index.html), page d'accueil en français, autonome (double-clic suffit ; Google Fonts demande une connexion). Il montre tout ce que décrit la section 6.1 : ouverture, les trois promesses, le sélecteur de paliers, l'univers, la bannière d'inscription, les jalons, la note de l'auteur, le pied de page. Les images de `site-prototype/img/` sont des réductions JPEG des références validées ; en production, elles passent en AVIF et WebP (section 8).

**Décisions déjà prises, reprises ici :** Shard est le nom anglais d'Éclat (validé). Le ton de la 404 et du contact garde une touche de légèreté, posée sur une base épique.

---

## 1. Concept créatif : « L'heure des lanternes »

Toutes les illustrations validées de Kalendrath partagent la même heure : le crépuscule, ciel ardoise, pierre et bronze, quelques fenêtres orange, et le violet-bleu du mana comme seule lumière surnaturelle. Le site vit à cette heure-là. Il ne s'agit pas d'un « mode sombre » : c'est le bleu du soir des images, pas un noir teinté.

Trois idées en découlent, et rien d'autre ne décore la page.

1. **La lumière a un sens.** Dans les images, la lumière orange appartient aux hommes (feux, fenêtres) et la lumière violet-bleu à la magie. Sur le site, le violet-bleu du mana est **réservé à ce qui est vivant** : l'élément qui a le focus clavier, ce qui est « en cours », la veine de la fracture. On ne s'en sert jamais en aplat ni en dégradé décoratif. Le bronze porte l'action (bouton principal, titres d'appoint) ; le sang séché porte une seule surface par page, la bannière.
2. **La Rupture.** Le continent s'est brisé en Éclats et les Straumar se sont retrouvés à nu. L'image d'ouverture se termine par une **ligne de fracture**, et dans la fissure court un filet de mana : une veine de Straumr mise à nu. C'est le seul ornement « dessiné » du site, utilisé deux fois : l'ouverture de l'accueil et la 404.
3. **L'obélisque ne bouge pas.** Les images de l'Hôtel de ville gardent le même cadrage d'un palier à l'autre : l'obélisque, hérité de Kaelhelm, reste à sa place et la ville grandit autour. C'est l'argument visuel le plus fort dont dispose le projet, et c'est **le moment marquant de l'accueil** : un sélecteur de trois paliers où l'image change et où l'obélisque reste fixe. C'est aussi le logo : un obélisque de bronze traversé d'une veine de mana.

**Principe de retenue.** Le site ne dépense son audace qu'à deux endroits : le grand titre gravé sur la cité et le sélecteur de paliers. Tout le reste est calme, aligné à gauche, sur une grille régulière, sans effets.

---

## 2. Références, et ce qu'on leur prend

On écarte d'emblée le trio « fantasy sombre, dégradés violets, cartes en verre dépoli » (le style des sites de jeux mobiles et des maquettes générées). Les références ci-dessous servent chacune à une décision précise, pas à une ambiance générale.

| Référence | Ce qu'on retient | Où dans le site |
|---|---|---|
| Manuscrits gothiques et rubrication | La lettre gothique comme **sceau** (rare, solennelle) et le rouge réservé à ce qui doit être remarqué | Le grand titre, la bannière, la 404 |
| Gonfanons et bannières de ville médiévales (bannière suspendue à une hampe, bas en queue d'aronde) | Un objet qui se suspend, dans la lignée des bannières rouges des images de l'Hôtel de ville et du Donjon | La bannière d'inscription |
| Lancettes et verrières des églises gothiques, façade de l'Hôtel de ville au palier 3 | Des images découpées en arc brisé, une grande verrière et deux lancettes plutôt que trois cartes identiques | Le bloc « Ce qui vous attend » |
| Cartels de musée et panneaux de sites archéologiques | Légendes courtes, factuelles, en italique, sous l'image et jamais par-dessus | Galerie, légendes |
| Cartes anciennes inachevées (bords vierges, mentions de terres inconnues) | Le vide au bord de la carte comme sujet | La 404 |
| Darkest Dungeon (site et titrage) | Un titrage gothique massif qui tient face à une illustration sombre, sans cadre ni effet | Le grand titre |
| Pentiment | La typographie médiévale traitée comme une matière contemporaine, pas comme un déguisement | Règles typographiques |
| Frostpunk | Une seule lumière chaude dans un monde froid suffit à donner le ton ; la retenue fait l'épique | La règle « la lumière a un sens » |
| The Banner Saga | Une palette restreinte, des illustrations peintes laissées respirer, la bannière comme symbole | Mise en page des images, bannière |

**Références à ne pas suivre :** les sites de jeux mobiles (boutons brillants, particules, compte à rebours), les vitrines de MMO avec héros en armure sur fond de flammes et dégradé violet, les pages de produit SaaS déguisées en fantasy (cartes arrondies, icônes en ligne, verre dépoli).

---

## 3. Typographie

### 3.1 Les trois rôles

| Rôle | Police | Graisses | Licence | Usage |
|---|---|---|---|---|
| **Sceau** | **Grenze Gotisch** (Omnibus-Type) | 600, 700 | SIL Open Font License 1.1 | Le nom « Kalendrath » (grand titre, en-tête, pied de page), le titre de la bannière, le titre de la 404. Rien d'autre. |
| **Titres** | **Grenze** (Omnibus-Type, même famille) | 500, 600 | SIL Open Font License 1.1 | Titres de section (h2) et sous-titres (h3) |
| **Texte** | **Alegreya Sans** (Juan Pablo del Peral, Huerta Tipográfica) | 400, 400 italique, 500, 700 | SIL Open Font License 1.1 | Tout le reste : texte courant, navigation, boutons, formulaires, légendes |

**Pourquoi ce trio.** Grenze est un hybride entre romain et gothique, dessiné à partir de la plume large ; sa version Gotisch pousse le gothique plus loin. Les deux ont l'angularité du nom choisi pour le monde (« registre sombre et anguleux », lore, 9.3) sans tomber dans la Fraktur illisible. Alegreya Sans est une linéale humaniste qui vient elle aussi de la calligraphie : le texte reste moderne et très lisible, mais il a la même origine que les titres, ce qui donne une page cohérente plutôt qu'un collage. Les trois couvrent le français et l'anglais (accents, ligatures œ et æ, guillemets), avec des chiffres elzéviriens dans Alegreya Sans.

**Polices écartées et pourquoi :** Cinzel, Trajan et leurs dérivés (le cliché de la fantasy épique sur le web) ; Cormorant et Fraunces (les choix réflexes des pages générées) ; Almendra, MedievalSharp, Uncial (déguisement) ; Outfit (police des maquettes de l'interface du jeu, trop neutre pour porter une vitrine ; le jeu et le site peuvent garder chacun leur voix, le lien se fait par la palette et le logo). **[À DÉCIDER]** reprendre Alegreya Sans dans l'interface du jeu pour unifier, ou garder Outfit.

### 3.2 Règles

- **Le gothique est un sceau, pas une voix.** Grenze Gotisch seulement à 40 px et plus, jamais pour une phrase de plus de six mots, jamais en capitales (les capitales gothiques enchaînées sont illisibles : « PvP » devient une suite de jambages). Leçon tirée du prototype : en h3, Gotisch faisait lire « Ull monde » pour « Un monde » ; les titres sont donc passés en Grenze.
- **Pas de capitales pour les étiquettes**, pas de surtitre au-dessus des titres, pas de mot isolé mis en couleur ou en italique dans un titre.
- **Échelle** (gamme classique de Bringhurst) : 14, 16, 18, 21, 24, 36, 48, 72 px, et le grand titre en `clamp(3.9rem, 17vw, 10.5rem)`. Texte courant à 18 px, interligne 1,6 ; chapô à 24 px (28 px sur PC), interligne 1,45. Les tailles de titre sont fluides entre 390 px et 1440 px.
- **Longueur de ligne** : 60 à 70 caractères pour le texte courant (`max-width: 34em`), 30 em pour le chapô.
- **Typographie française** : apostrophe typographique (’), guillemets « » avec espaces insécables, espace fine insécable (U+202F) avant `: ; ? !`. En anglais : guillemets “ ”, pas d'espace avant la ponctuation. À faire appliquer par le générateur (filtre de rendu), pas à la main.
- **Titres** en casse de phrase, `text-wrap: balance` ; texte courant en `text-wrap: pretty`.

### 3.3 Chargement

- **Auto-hébergées en production** (brief, 3.3 point 10 : aucune requête vers Google Fonts). Le prototype charge Google Fonts pour rester autonome ; c'est la seule entorse.
- Fichiers WOFF2 **sous-ensemblés** latin et latin étendu : environ 25 Ko par graisse d'Alegreya Sans, environ 30 Ko pour chaque Grenze. Budget total : **6 fichiers, 160 Ko au plus**.
- `font-display: swap` pour le texte ; **préchargement** de la seule Alegreya Sans 400 et de Grenze Gotisch 700 (le grand titre est l'élément le plus large au-dessus de la ligne de flottaison sur mobile).
- Polices de repli réglées avec `size-adjust` et `ascent-override` pour éviter le saut de mise en page au remplacement (CLS).

---

## 4. Palette

### 4.1 Les couleurs

| Nom | Hex | Rôle |
|---|---|---|
| **Ardoise** | `#1D2631` | Fond principal : le bleu du crépuscule des illustrations |
| **Nuit** | `#141B24` | Fond des bandes alternées (sélecteur de paliers, pied de page), champs de formulaire, texte sur bronze |
| **Pierre** | `#28333F` | Surfaces surélevées, fond des images en attente, filets discrets |
| **Brume** | `#E6E2D8` | Texte principal, titres |
| **Cendre** | `#A8B0B9` | Texte secondaire |
| **Bronze** | `#C59B5E` | Bouton principal, sous-titres, filets, numéros de jalons |
| **Sang séché** | `#7A2A25` | La bannière, une seule surface par page |
| **Lin** | `#F2EDE3` | Texte sur la bannière |
| **Mana** | `#A3A1FF` | Focus clavier, état « en cours », veine de fracture, sélection de texte. Jamais en aplat décoratif |

L'orange des fenêtres et des braseros n'est **pas** une couleur d'interface : il reste dans les images, ce qui les laisse être la seule source de chaleur de la page.

### 4.2 Contrastes vérifiés (WCAG 2.2)

Calculés avec la formule de luminance relative du WCAG (script dans le dossier temporaire de la session, à reprendre dans les tests du site).

| Texte | Fond | Rapport | Usage autorisé |
|---|---|---|---|
| Brume | Ardoise | 11,82 | Tout texte |
| Brume | Nuit | 13,40 | Tout texte |
| Brume | Pierre | 9,93 | Tout texte |
| Cendre | Ardoise | 6,97 | Tout texte (AA, et AAA à partir de 18,66 px gras / 24 px) |
| Cendre | Pierre | 5,85 | Tout texte (AA) |
| Cendre | Nuit | 7,90 | Tout texte (AAA) |
| Bronze | Ardoise | 5,99 | Texte (AA) |
| Bronze | Pierre | 5,03 | Texte (AA) |
| Bronze | Nuit | 6,79 | Texte (AA) |
| Nuit | Bronze | 6,79 | Libellé du bouton principal |
| Mana | Ardoise | 6,62 | Texte « en cours », anneau de focus |
| Mana | Pierre | 5,56 | Idem |
| Lin | Sang séché | 8,24 | Texte de la bannière |
| Mana | Sang séché | 4,16 | **Interdit pour du texte** ; sur la bannière, le focus passe en Lin |
| Bronze | Sang séché | 3,76 | **Décor seulement** (filets, cases) ; jamais pour du texte courant |

Sur les images, le texte n'est jamais posé directement sur une zone claire : le grand titre se place dans le ciel, avec une ombre portée diffuse, et il est en grande taille (critère 3:1).

### 4.3 Thème clair

Pas de thème clair pour la vitrine : toutes les illustrations sont crépusculaires et perdraient leur effet sur un fond clair. On déclare `color-scheme: dark` pour que les barres de défilement et les champs natifs suivent.

---

## 5. Système de composants

Les jetons (couleurs, polices, échelle, espacements) sont déclarés une fois en variables CSS dans `:root` ; le prototype en donne la liste exacte. Espacements sur une échelle de 4 px : 4, 8, 12, 16, 24, 32, 48, 64, 96, 128. Marges latérales `clamp(16px, …, 48px)` (16 px à 390 px). Largeur de contenu 76 rem. Rythme vertical des sections `clamp(64px, …, 128px)`.

**Rayons.** Presque rien n'est arrondi : 2 px sur les boutons et champs, 0 ailleurs. La forme vient des découpes (arc brisé, fracture, queue d'aronde), pas du rayon.

**Ombres.** Aucune ombre grise standard sous les blocs. Les seules ombres sont des ombres de matière : le pli d'ombre en haut de la bannière, la lueur du focus.

| Composant | Description | États et règles |
|---|---|---|
| **Sceau (logo)** | Obélisque de bronze traversé d'une veine de mana, 14 × 30 px, en SVG ; décliné en favicon | Toujours accompagné du nom, sauf sur l'accueil mobile où le grand titre porte déjà le nom |
| **En-tête** | Sceau et nom à gauche, navigation, sélecteur FR/EN. Sur l'accueil, posé sur l'image avec un voile dégradé très court en haut ; sur les autres pages, fond Nuit | Mobile : bouton « Menu » (élément `details`, sans JavaScript), panneau Nuit avec filet bronze |
| **Sélecteur de langue** | « FR » et « EN », la langue courante en bronze et soulignée, l'autre en lien avec `hreflang` et `lang` | Pas de drapeaux. Le lien mène à la page jumelle, pas à l'accueil |
| **Bouton principal** | Aplat Bronze, texte Nuit gras, liseré d'ombre de 3 px en bas (une plaque de bronze coulée) | Survol : bronze éclairci. Focus : anneau Mana (Lin sur la bannière). Un seul par écran |
| **Bouton secondaire** | Filet Brume à 40 %, texte Brume | Survol : filet plein |
| **Lien d'action** | Texte Bronze gras, souligné fin | Pas de flèche ajoutée au libellé |
| **Fracture** | Bas de l'image d'ouverture découpé en ligne brisée ; une couche Mana placée 3 px plus bas laisse paraître une veine | Accueil et 404 uniquement |
| **Fenêtre en arc brisé** | Image masquée en arc brisé (masque SVG) | Une grande verrière et deux lancettes, jamais trois fenêtres identiques. Mobile : les lancettes passent à 120 px de large à côté du texte |
| **Sélecteur de paliers** | Trois boutons radio stylés en losanges sur une tige de bronze ; l'image correspondante apparaît en fondu | Le losange actif passe en Mana. Navigation aux flèches (comportement natif des boutons radio). Aucun défilement automatique |
| **Bannière** | Hampe de bronze à deux pommeaux, toile Sang séché à bas en queue d'aronde, titre en Grenze Gotisch | Une seule par page. Contient le formulaire d'inscription ; plus tard, la préinscription |
| **Champ de formulaire** | Fond Nuit, filet Lin à 40 %, libellé visible au-dessus (jamais le seul texte indicatif) | Erreur : message en clair sous le champ, `aria-invalid`, focus renvoyé sur le champ fautif |
| **Case de consentement** | Case native (couleur d'accent Bronze), non cochée par défaut, libellé complet à droite | Obligatoire avant l'envoi |
| **Jalons** | Liste ordonnée en chiffres romains (c'est une vraie séquence). PC : neuf colonnes sur un filet bronze ; mobile : liste verticale | Les jalons en cours ont leur chiffre en Mana et la mention « En cours » |
| **Glose** | Note en italique avec un filet bronze à gauche, sans étiquette au-dessus | Porte la touche de légèreté de la page, une seule |
| **Cartel** | Légende d'image : une phrase, italique, Cendre, sous l'image | Jamais de texte posé sur l'image hors grand titre |
| **Fiche d'article** (News) | Titre en Grenze, date, type (news ou devlog) en texte simple, chapô de deux lignes ; une image seulement si l'article en a une | Pas de grille de cartes identiques : une liste, l'article le plus récent plus grand |
| **Pied de page** | Nom en sceau, mention de transparence sur l'IA, liens communauté et informations, lien vers l'autre langue | Fond Nuit |

---

## 6. Mise en page, page par page

Chaque écran est pensé en deux formats : PC (1440 px) et mobile (390 × 844). Le texte est aligné à gauche partout, sauf la bannière, objet suspendu centré sur sa hampe.

### 6.1 Accueil

```
PC 1440                                                   Mobile 390
┌──────────────────────────────────────────────┐         ┌──────────────────┐
│ ▮Kalendrath     Univers Le jeu … Communauté FR EN│     │ ▮        FR EN Menu│
│                                              │         │ Kalendrath       │
│ KALENDRATH  (sceau, dans le ciel)            │         │ (citadelle,      │
│        [la citadelle, pleine largeur]        │         │  cadrée sur la   │
│ ╲╱╲╱╲╱╲╱╲╱  fracture + veine de mana ╲╱╲╱╲╱  │         │  tour)           │
├──────────────────────────────────────────────┤         │ ╲╱╲╱╲╱╲╱╲╱╲╱╲╱╲╱ │
│ Accroche (28 px, 7 col.)  │ Ligne de genre   │         │ Accroche 24 px   │
│                           │ [Je m'inscris] [Univers]    │ Genre            │
├──────────────────────────────────────────────┤         │ [Je m'inscris]   │
│ Ce qui vous attend                           │         │ [Univers]        │
│ ┌─arc───────────┐   ┌arc┐ Un monde neuf…     │         ├──────────────────┤
│ │  Donjon p2    │   └───┘ texte              │         │ ┌arc──────────┐  │
│ │               │   ┌arc┐ Le PvP n'est…      │         │ │ Donjon      │  │
│ └───────────────┘   └───┘ texte              │         │ └─────────────┘  │
│ Un héros gouverne…                           │         │ ┌arc┐ titre    │
├──────── fond Nuit ───────────────────────────┤         │ └───┘ texte    │
│ Une cité qui   │ [Hôtel de ville, 3:2]       │         ├──────────────────┤
│ grandit        │ ◇────────◇────────◇          │         │ Une cité…        │
│ (collant)      │ Palier 1  Palier 2  Palier 3 │         │ [image 3:2]      │
│                │ « L'obélisque ne bouge pas… »│         │ ◇────◇────◇      │
├──────────────────────────────────────────────┤         ├──────────────────┤
│ [Puits de mana p3, 4:5] │ Un monde brisé      │         │ [image] Univers  │
├──────────────────────────────────────────────┤         ├──────────────────┤
│          ═══●════════════════════●═══        │         │ ●══════════════● │
│          │ Suivez la naissance…  │           │         │ │ bannière     │ │
│          │ [e-mail] [ ] accord   │           │         │ │ formulaire   │ │
│          │ [Je m'inscris]        │           │         │ ╲      ╱       │
│          ╲         ╱             │           │         ├──────────────────┤
├──────────────────────────────────────────────┤         │ I  Communication │
│ Des jalons, pas des dates                    │         │ II Design system │
│ ◆──────◆──────┬──────┬──── … ─────┬          │         │ III …            │
│ I     II     III    IV            IX          │         ├──────────────────┤
│ │ glose de l'auteur                          │         │ │ glose          │
├──────── pied de page Nuit ───────────────────┤         │ pied de page     │
└──────────────────────────────────────────────┘         └──────────────────┘
```

Ordre de lecture : comprendre (titre, accroche) → se projeter (promesses, cité qui grandit) → s'engager (bannière) → être rassuré (jalons, transparence). Un seul appel à l'action principal, répété deux fois (ouverture et bannière) avec le même libellé « Je m'inscris ».

### 6.2 Univers (`/fr/univers/`, `/en/world/`)

Page de lecture. Ouverture courte : une image de 50 vh (la Mine de fer p3 ou le Portail des Sphères, où les veines de mana sont visibles) avec la fracture **non** reprise (elle reste propre à l'accueil et à la 404). Puis le texte du brief (2.2) en une colonne de 34 em, chaque partie (Kaelhelm, la Rupture, Trois mille ans plus tard, Vous, Ce qui vit entre les mondes) en h2 Grenze. Une **frise** discrète en marge sur PC (−2200 AR, an 0, 3000 PR), en ligne au-dessus des sections sur mobile ; c'est une vraie séquence, elle peut être numérotée. Une image en pleine largeur entre la Rupture et Trois mille ans plus tard, cadrée sur une ruine. Les Vahrun ne sont pas illustrés (le lore les garde dans l'ombre). Bas de page : renvoi vers « Le jeu » et la bannière.

### 6.3 Le jeu (`/fr/le-jeu/`, `/en/the-game/`)

Les cinq arguments du brief (2.3), dans l'ordre, **en liste éditoriale** : chaque argument est un titre Grenze de 36 px suivi de deux lignes, avec une image de bâtiment en arc brisé qui alterne de côté **seulement tous les deux arguments** (pour casser le zigzag mécanique). Puis le bloc « Une cité qui grandit » avec le même sélecteur de paliers que l'accueil (composant partagé). Rien sur ce qui est marqué « À ne pas écrire » dans le brief (noms de paliers publics, durées, boutique).

### 6.4 Feuille de route (`/fr/feuille-de-route/`, `/en/roadmap/`)

Chapô du brief. Trois colonnes Fait / En cours / Plus tard sur PC, trois blocs empilés sur mobile, chaque élément en liste simple. La colonne « En cours » a son filet de tête en Mana, les autres en Bronze. Sous les colonnes, les neuf jalons en piste verticale avec les deux en cours éclairés. Mention « Mise à jour à chaque devlog » avec la date de dernière mise à jour (la date de mise à jour n'est pas une promesse de date).

### 6.5 Galerie (`/fr/galerie/`, `/en/gallery/`)

Mention de transparence sur l'IA **en tête**, dans une glose. Puis une série par bâtiment : le nom en h2 et ses paliers côte à côte (trois colonnes sur PC, défilement horizontal à accroche sur mobile, avec indication « 1 sur 3 »). Les images s'ouvrent en grand dans un élément `dialog` natif (fermeture par Échap et par un bouton visible). Cartel sous chaque image : nom du bâtiment, palier, une phrase. Pas de mosaïque en maçonnerie ni de survol qui zoome. **[À DÉCIDER]** la liste des images publiées et la licence Midjourney avant ouverture (brief 1.4).

### 6.6 News et devlog (`/fr/news/`, `/en/news/`)

Liste chronologique : le dernier article en grand (titre en Grenze 48 px, chapô, image si l'article en a une), les suivants en lignes simples (date, type, titre, une ligne). Filtre « Tout / News / Devlog » en liens, pas en onglets JavaScript. Page d'article : colonne de 34 em, image d'en-tête facultative, titre, date, temps de lecture, corps en Alegreya Sans 18 px, citations en glose, lien vers la version dans l'autre langue s'il existe. Flux RSS signalé dans le pied de page et en bas de liste.

### 6.7 Communauté (`/fr/communaute/`, `/en/community/`)

Trois blocs de poids différents : le Discord en grand (texte du brief, bouton principal « Rejoindre le Discord »), Reddit et X en lignes simples avec leurs comptes par langue. Pas de logos de réseaux en couleur, des mots ; une icône monochrome de 20 px au plus à côté du nom.

### 6.8 Préinscription (masquée jusqu'à l'annonce)

Reprend la bannière de l'accueil en plus grand, avec la date et la durée en Grenze 36 px. Le formulaire gagne le champ facultatif du brief. Aucun compte à rebours animé : la date suffit.

### 6.9 Soutenir (à l'ouverture du Patreon)

Page sobre, une colonne. Texte du brief, liste des contreparties, phrase « Le Patreon n'est pas un accès à la bêta » mise en valeur dans une glose, un bouton secondaire vers Patreon (pas le bouton bronze : la page ne pousse pas à payer).

### 6.10 Contact (`/fr/contact/`, `/en/contact/`)

Épique, avec une touche de légèreté.

```
PC                                             Mobile
┌──────────────────────────────────────────┐   ┌────────────────┐
│ Écrivez au Donjon.        (Grenze 72 px) │   │ Écrivez au     │
│                                          │   │ Donjon.        │
│ Une question, une demande de presse, un  │   │ texte          │
│ partenariat : nous lisons tout et        │   │ ┌────────────┐ │
│ répondons en français ou en anglais.     │   │ │ adresse    │ │
│ ┌───────────────────────────┐ ┌────────┐ │   │ │ [Copier]   │ │
│ │ contact@kalendrath.com    │ │ Copier │ │   │ └────────────┘ │
│ └───────────────────────────┘ └────────┘ │   │ glose          │
│ │ Aucun corbeau n'est nécessaire :       │   └────────────────┘
│ │ un e-mail arrive plus vite.            │
│ [image : Donjon p1, bande de 30 vh]      │
└──────────────────────────────────────────┘
```

- FR : titre « **Écrivez au Donjon.** » ; texte du brief (2.10) ; glose : « Aucun corbeau n'est nécessaire : un e-mail arrive plus vite. »
- EN : “**Write to the Keep.**” ; texte du brief ; glose : “No raven required. Email is faster.”
- L'adresse est assemblée côté client (anti-spam, brief 2.10) et accompagnée d'un bouton « Copier l'adresse » qui confirme « Adresse copiée ». Sans JavaScript, l'adresse s'affiche en clair avec « [at] ».

### 6.11 Page 404

La seule autre page qui reprend la fracture. Plein écran : une image de brume (le ciel de la cité recadré, ou une carte vierge) qui se termine par la fracture et sa veine ; en dessous, sur fond Ardoise :

- FR : titre en **Grenze Gotisch** « **Cette Contrée n'est sur aucune carte.** » ; texte : « Revenez à l'accueil, ou prévenez-nous si un lien est brisé. » ; glose : « Les cartographes font ce qu'ils peuvent. » ; bouton principal « Revenir à l'accueil », lien « Signaler le lien brisé » (vers le contact).
- EN : “**This Reach is on no map.**” ; “Head back to the home page, or tell us if a link is broken.” ; glose : “The cartographers are doing their best.” ; “Back to the home page”, “Report the broken link”.
- **Correction du brief :** la version anglaise du brief (2.11) disait « This Region is on no map ». D'après le lexique, Contrée se dit **Reach** (Région = Region). *[Revue] Corrigé dans le brief le 2026-10-30.*
- La 404 est bilingue sur une même page (brief) : les deux blocs se suivent, chacun avec son attribut `lang`, la langue du navigateur en premier.

### 6.12 Mentions légales, confidentialité, CGU

Gabarit « document » : colonne de 34 em, sommaire ancré en tête, titres numérotés (vraie structure juridique), date de dernière mise à jour. Aucune image, aucune touche de légèreté.

---

## 7. Mouvement et défilement

**Règle :** un seul moment orchestré, au chargement de l'accueil ; ensuite, seul ce que fait le visiteur bouge.

| Mouvement | Détail | Durée |
|---|---|---|
| Le nom se grave | Le grand titre se découvre de gauche à droite (`clip-path`) | 1,1 s, départ à 0,15 s |
| La veine s'allume | La veine de la fracture passe de l'Ardoise au Mana | 1,4 s, départ à 0,9 s |
| La cité se pose | L'image d'ouverture passe de 104,5 % à 100 % | 2,6 s |
| Dérive au défilement | L'image d'ouverture descend de 6 % pendant que l'on fait défiler le premier écran (animations liées au défilement CSS, amélioration progressive : rien ne se passe dans les navigateurs qui ne les gèrent pas) | Liée au défilement |
| Changement de palier | Fondu enchaîné entre les images de l'Hôtel de ville | 0,6 s |
| Survol | Changement de couleur seulement, jamais de déplacement ni d'agrandissement | 0,15 s |

**Ce qu'on ne fait pas :** apparition en fondu et glissement de chaque section au défilement, parallaxe sur plusieurs couches, particules de mana, curseur personnalisé, carrousel automatique, vidéo en fond.

**Performance :** on n'anime que `transform`, `opacity`, `clip-path` et une couleur de fond ; aucun JavaScript d'animation, aucune bibliothèque.

**`prefers-reduced-motion: reduce`** : toutes les animations ci-dessus sont désactivées (elles ne sont déclarées que sous `prefers-reduced-motion: no-preference`), le fondu des paliers devient instantané, le défilement doux est coupé. La page est complète et lisible sans aucune animation.

---

## 8. Traitement des illustrations Midjourney

**Sélection.**
- Le site n'utilise que les images **validées** et archivées dans `docs/direction-artistique/references/`.
- Ouverture de l'accueil : `cite.png` (3360 × 1440), l'image ancre des bâtiments.
- Sélecteur de paliers : les trois Hôtels de ville (même cadrage, obélisque fixe).
- Illustrations d'appoint : Donjon p2 (le héros gouverne), Portail des Sphères p2 (un monde neuf), Tour de guet arcanique p2 (protection), Puits de mana p3 (univers).
- **Les unités ne sont pas utilisables en l'état** : les fichiers archivés sont des captures de grilles de quatre variations à environ 560 px par case. Il faut d'abord les upscaler dans Midjourney (planche de style, section « Toutes les unités… »). Le site attend ces upscales pour montrer des personnages.
- L'Atelier des Remparts a été écarté pour l'argument PvP : une machine de siège dit « attaque », pas « protection ».

**Pas de retouche de style.** Pas de filtre bichrome violet, pas de grain ajouté, pas de vignettage ajouté : les images ont déjà leur heure et leur palette, la page s'accorde à elles et non l'inverse. Seules retouches permises : supprimer les signatures parasites (Kaelite, Puits de mana p1), recadrer les lignes de texte illisible générées en bas de certaines images.

**Cadrage.** Chaque image déclare son point focal (`object-position`) : citadelle à 57 % en mobile, 60 % en PC ; obélisque du Donjon à 47 %. Le grand titre se place dans la zone de ciel. Sur mobile, l'ouverture fait 70 % de la hauteur d'écran, cadrée sur la tour principale.

**Formats et poids.**
- Production : **AVIF** (qualité 50 à 60) avec repli **WebP**, puis JPEG, via `<picture>` ; largeurs 640, 960, 1280, 1920 et 2560 px ; `sizes` exact pour chaque usage.
- Image d'ouverture : `fetchpriority="high"`, préchargée, jamais en chargement différé ; toutes les autres en `loading="lazy"` et `decoding="async"`, avec `width` et `height` pour réserver la place.
- Budgets : ouverture ≤ 120 Ko en mobile et ≤ 260 Ko en PC ; image d'appoint ≤ 80 Ko en mobile.
- Le prototype utilise des JPEG produits par GD dans le conteneur (pas d'encodeur WebP ni AVIF disponible) : 35 Ko pour l'ouverture à 720 px, 90 Ko à 1200 px.
- Les images Open Graph (1200 × 630, une par langue) partent de `cite.png` recadrée, avec le sceau en bas à gauche ; c'est la seule image où du texte est incrusté.

**Texte alternatif** dans chaque langue, qui décrit ce qu'on voit et non ce que l'image « symbolise » ; légendes séparées des textes alternatifs.

**Transparence.** La mention du brief (1.4) dans le pied de page de chaque page et en tête de la Galerie. Ne rien affirmer sur la licence commerciale tant qu'elle n'est pas vérifiée.

---

## 9. Accessibilité (objectif WCAG 2.2 AA)

- Contrastes : section 4.2. Aucun texte en dessous de 4,5:1, aucun composant d'interface en dessous de 3:1.
- Lien d'évitement « Aller au contenu » en premier élément focusable.
- Focus clavier toujours visible : anneau Mana de 2 px, décalé de 3 px (Lin sur la bannière). Jamais de `outline: none` sans remplacement.
- Repères : `header`, `nav` étiquetées (principale, communauté, informations), `main`, `footer` ; un seul `h1` par page ; titres dans l'ordre.
- Menu mobile en `details` / `summary` : clavier et lecteurs d'écran gérés nativement.
- Sélecteur de paliers : vrais boutons radio dans un `fieldset` avec `legend` ; flèches du clavier ; l'image active est la seule visible, chaque image a son texte alternatif.
- Formulaire : libellés visibles, `autocomplete="email"`, erreurs écrites en clair (ce qui manque et comment le corriger), annoncées (`role="alert"`) et focus renvoyé sur le champ ; message de réussite en `role="status"`.
- Cibles tactiles d'au moins 44 × 44 px (boutons de 48 px de haut).
- `lang` sur `<html>` et sur tout passage dans l'autre langue (liens EN, 404 bilingue).
- Le site fonctionne avec le texte agrandi à 200 % et en zoom à 400 % (une colonne à 320 px CSS) sans défilement horizontal.
- Mouvement : section 7.
- Tests : axe (via Playwright, déjà dans la pile du projet) à chaque déploiement ; passage manuel au clavier et avec NVDA ou VoiceOver avant l'ouverture.

---

## 10. Performance (budget Lighthouse)

**Scores visés sur mobile (profil Lighthouse par défaut, réseau lent simulé) :** Performance ≥ 95, Accessibilité 100, Bonnes pratiques 100, SEO 100.

| Indicateur | Cible mobile | Cible PC |
|---|---|---|
| LCP (l'image d'ouverture ou le grand titre) | ≤ 2,0 s | ≤ 1,2 s |
| CLS | ≤ 0,02 | ≤ 0,02 |
| INP | ≤ 100 ms | ≤ 100 ms |
| TBT (Lighthouse) | ≤ 50 ms | ≤ 50 ms |

| Ressource (accueil, premier chargement) | Budget |
|---|---|
| HTML + CSS en ligne, compressés | ≤ 20 Ko (prototype : 10,5 Ko compressé) |
| JavaScript | ≤ 5 Ko compressé (formulaire, copie d'adresse) ; aucun framework côté client |
| Polices | ≤ 160 Ko, 6 fichiers au plus, 2 préchargés |
| Image d'ouverture | ≤ 120 Ko mobile, ≤ 260 Ko PC |
| Total avant défilement | ≤ 350 Ko mobile, ≤ 550 Ko PC |
| Page entière défilée | ≤ 900 Ko mobile |

Le brief fixe « page d'accueil sous 150 Ko hors images » : ce budget le respecte avec de la marge. Le CSS critique est en ligne (une page de cette taille n'a pas besoin de feuille externe). Contrôle automatique : Lighthouse CI dans la GitHub Action de publication, qui fait échouer le déploiement si un budget est dépassé.

---

## 11. Bilinguisme

- **Une URL par langue** (`/fr/…`, `/en/…`), hreflang réciproques (brief 3.4). Le sélecteur mène à la **page jumelle**, pas à l'accueil.
- **Concevoir en français d'abord** : le français est en général 15 à 25 % plus long que l'anglais. Chaque composant est testé avec le texte français le plus long ; aucune largeur fixe sur un bouton ou un titre.
- **Aucun texte incrusté dans les images**, sauf les images Open Graph, produites en deux versions.
- La typographie suit les règles de chaque langue (section 3.2), gérées par le générateur selon la langue de la page.
- Noms propres du lexique, exacts dans les deux langues : Straumar, the Sundering (la Rupture), the Nine Spheres, Shards (Éclats), the Abyss (le Gouffre), Reach (Contrée), Town Hall, Keep.
- L'anglais s'adapte, il ne se calque pas (voix de Kalendrath). Exemples dans les sections 6.10 et 6.11.
- Le grand titre « Kalendrath » ne change pas d'une langue à l'autre ; le sceau non plus.
- Dates : « 30 octobre 2026 » en français, “October 30, 2026” en anglais ; jamais de format numérique ambigu.

---

## 12. Ce qui trahit un site « IA de base », et comment on l'évite

| Signe | Pourquoi ça se voit | Ce que fait Kalendrath |
|---|---|---|
| Fond quasi noir teinté (`#0B0B0B`, `#111`) avec dégradés violets | C'est le décor par défaut de la « fantasy sombre » générée | Fond Ardoise tiré des images ; le violet est un sens (le mana), pas un décor ; aucun dégradé décoratif |
| Cartes en verre dépoli (`backdrop-filter: blur`) | Le style des maquettes générées depuis 2023 | Aucun flou d'arrière-plan. Les surfaces sont des matières : toile, bronze, pierre |
| Contenu découpé en cartes identiques arrondies avec la même ombre grise | Trahit le kit SaaS | Une verrière et deux lancettes de tailles différentes ; rayons presque nuls ; pas d'ombre grise |
| Héros centré : grand titre, sous-titre, deux boutons, dégradé sur l'image | Mise en page réflexe | Titre gravé dans le ciel de l'illustration, accroche hors de l'image, sous la fracture, alignée à gauche |
| Police « fantasy » réflexe (Cinzel, Trajan) ou police réflexe des pages générées (Cormorant, Fraunces, Inter partout) | Se reconnaît en une seconde | Grenze Gotisch en sceau, Grenze en titres, Alegreya Sans en texte, avec des règles d'emploi |
| Étiquette en capitales espacées au-dessus de chaque titre | Habillage sans information | Aucune étiquette au-dessus des titres ; les titres disent ce qu'il faut |
| Un mot du titre en couleur ou en italique | Effet d'accent automatique | Titres d'une seule couleur, d'un seul style |
| Numérotation 01 / 02 / 03 sur des blocs qui ne sont pas une suite | Décor qui imite une structure | Chiffres romains uniquement sur les jalons, qui sont une vraie séquence |
| Flèche « → » ajoutée aux liens et boutons | Tic de rédaction | Libellés qui disent l'action : « Je m'inscris », « Voir la feuille de route » |
| Chaînes de métadonnées séparées par des points médians | Gabarit | Phrases ou listes simples |
| Chaque section apparaît en fondu au défilement | Animation par défaut | Un seul moment orchestré au chargement, puis rien qui ne réponde pas au visiteur |
| Survol qui soulève chaque carte | Idem | Le survol change une couleur, rien ne bouge |
| Grands chiffres clés avec petite étiquette (« 24 000 Éclats ») | Remplissage de page produit | Aucun chiffre décoratif ; les jalons disent où on en est |
| Textes génériques (« Plongez dans une aventure épique », « Rejoignez des milliers de joueurs ») | Copie générée | Textes du brief, écrits pour ce monde ; aucune promesse non tenue |
| Icônes de ligne génériques pour illustrer chaque argument | Illustration par défaut | Les images du jeu illustrent les arguments ; aucune icône décorative |
| Particules lumineuses, curseurs lumineux, « glow » partout | Surenchère fantasy | Une seule veine de mana, fine, sur la fracture |
| Illustration générée utilisée telle quelle avec ses défauts (signatures, textes illisibles, grilles) | Le visiteur reconnaît le brouillon | Seules les images validées et nettoyées ; unités en attente de leur upscale ; mention de transparence assumée |
| Mêmes sections que tous les sites de jeux (fonctionnalités, témoignages, FAQ, tarifs) | Plan par défaut | Le plan suit le parcours du brief : comprendre, se projeter, s'engager, être rassuré |

**Test à faire sur chaque nouvelle page :** masquer le nom et les images ; si la page pourrait appartenir à n'importe quel autre jeu, la reprendre.

---

## 13. Points à valider par Gregory

1. Le concept « L'heure des lanternes » et ses trois idées (lumière qui a un sens, fracture, obélisque immobile).
2. Le trio typographique Grenze Gotisch, Grenze, Alegreya Sans ; et la question de reprendre Alegreya Sans dans l'interface du jeu (section 3.1).
3. La bannière rouge comme support de l'inscription.
4. Les images retenues pour les trois promesses (Donjon p2, Portail des Sphères p2, Tour de guet arcanique p2).
5. Les gloses de la 404 et du contact (« Les cartographes font ce qu'ils peuvent », « Aucun corbeau n'est nécessaire : un e-mail arrive plus vite ») et leurs versions anglaises.
6. La correction « Reach » dans la 404 anglaise du brief, et le retrait de la mention « Shard à valider » du brief (2.2 et décision 8), puisque Shard est validé.
7. Dans le sélecteur de paliers, les libellés neutres « Premier palier / Deuxième palier / Troisième palier » plutôt que Hameau, Village, Bourg : le brief (2.3) demande de ne pas encore publier les noms de paliers.
