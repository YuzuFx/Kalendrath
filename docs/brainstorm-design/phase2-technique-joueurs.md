# Phase 2 : faisabilité technique et lecture par les joueurs

*2026-11-01. Six maquettes de page d'accueil PC et dix logos, analysés sous deux angles. Sources locales : `site/v1..v3` (Cité en coupe : l'Axe, la Maquette, les Salles) et `v1-montee`, `v2-colonne`, `v3-partition` (Frise des paliers), `logos/` (c1, c2, k1 à k6, n1, n2).*

**Ce qui a été vraiment mesuré** : les six pages ouvertes dans Chromium à 1280, 1920 et 2560 px (aucun défilement horizontal à aucune largeur, aucune largeur fixe sauf une : `width:520px` dans la Partition, et le seul `max-width:900px` est un point de rupture de media query), nombre d'images, de boutons, de scripts, de requêtes externes, polices chargées, hauteur de page. **Non mesuré** : Lighthouse / Core Web Vitals réels (non lancés), rendu mobile (hors périmètre PC), lecture réelle par des humains. Les avis « joueurs » sont des jeux de rôle de ma part, pas des tests : à valider sur 5 vrais visiteurs.

---

## 1. Constats communs aux six pages (à corriger quelle que soit la page retenue)

| Constat | Mesure | Conséquence pour le vrai site |
|---|---|---|
| **Le texte est injecté par JavaScript** (`strings.js` pour la Cité en coupe, tableau inline pour la Frise) | h1 présent, mais le pitch, les h2, le formulaire sont absents du HTML source | Inacceptable en l'état pour le SEO et l'Open Graph. Astro rend le HTML par langue au build : on sort les textes de `strings.js` vers `src/i18n/fr.json` / `en.json`, et le JS de bascule disparaît. C'est le gros du coût de passage. |
| **Google Fonts** (4 requêtes externes sur chaque page) | `fonts.googleapis.com` + `fonts.gstatic.com` | Contraire à la règle RGPD du brief. Auto-héberger en woff2 sous-ensemble latin : Cinzel 600, Outfit (variable), Alegreya italique 400. Environ 60 à 90 Ko au total. La Frise charge en plus Alegreya 500 et Outfit 500 : à supprimer. |
| **Pas de `<meta charset>`** | Texte en mojibake sur le serveur de test | Artefact des maquettes (Astro l'ajoute). À vérifier tout de même en CI. |
| **Aucune capture du jeu lui-même** | Le visuel est la cité Midjourney ; pas un écran d'interface | C'est la plus grosse faiblesse côté joueurs (voir section 3). Prévoir une zone « aperçu de l'interface » dès qu'un écran React existe. |
| **Images** | 12 à 25 webp par page, ~130 Ko pièce, lazy-load sur 85 à 95 %, `alt` présent partout | Bon. Ajouter `srcset` / `sizes` et AVIF facultatif ; le héros en 2400 px doit rester en `fetchpriority=high`, sans lazy. L'image est le LCP. |
| **Pas de balises SEO / hreflang / OG / JSON-LD** | Absentes des maquettes | À ajouter dans le layout Astro (`<link rel="alternate" hreflang>`, `og:image` 1200x630 par langue, `canonical`, sitemap par langue). Coût identique pour les six. |
| **Responsive fluide** | `clamp()` partout, `vw`, aucun débordement à 2560 | Exigence de Gregory respectée. À 2560 le contenu reste centré avec une mesure limitée : correct. Seule la Partition garde un `520px` à convertir en `min(520px, 40vw)` ou en `rem`. |
| **Formulaire e-mail** | Présent partout, case de consentement, libellé associé | Reste un `<form>` natif + Pages Function relayant Brevo (brief). Prévoir le retour d'erreur sans JS lourd (un `fetch` de 20 lignes). |

---

## 2. Angle technique : classement et coût de passage

Hypothèse de coût : un développeur (Claude Code) avec l'Astro de base, le layout, l'i18n, le formulaire et les pages secondaires **déjà comptés dans le brief de la vitrine** ; le coût ci-dessous est celui de **la page d'accueil seule**, en jours de travail effectif, hors images à produire. Estimations, pas mesures.

| Rang | Page | Poids de page (hauteur) | JS propre | Complexité | Coût accueil | Remarques techniques |
|---|---|---|---|---|---|---|
| 1 | **Cité en coupe V3, les Salles** | 7,2 écrans, 13 images | 4 boutons, 2 `IntersectionObserver`, `sticky`, pas de `requestAnimationFrame` | Faible | **~2 j** | Sections empilées avec fond propre : se traduit presque en composants Astro purs. Le JS (révélation au défilement) est facultatif et se coupe sans casser la page. Meilleure dégradation sans JS. |
| 2 | **Frise V3, la Partition** | **4,9 écrans** (la plus courte), 12 images | Écouteur de défilement + 17 boutons (sélecteur de paliers) | Faible à moyenne | **~2,5 j** | Page la plus légère à rendre et à maintenir. Le sélecteur de dix paliers devient une île Astro (~2 Ko) ou, mieux, des `<input type=radio>` + CSS. Convertir le `520px`. |
| 3 | **Frise V2, la Colonne** | 8,3 écrans, 12 images | Écouteur de défilement, 6 boutons, ancres `data-ay` | Moyenne | **~3 j** | Positionnement de l'image par points d'ancrage en JS : à refaire proprement en `object-position` + CSS. |
| 4 | **Cité en coupe V1, l'Axe** | 7,4 écrans, **25 images** (barre de 10 vignettes + coupe) | 15 boutons, `rAF`, observer, `sticky` | Moyenne | **~3 j** | Le plus d'images chargées ; la bande de vignettes en bas du héros demande des images dédiées ou un `<picture>`. Accessibilité du sélecteur à vérifier au clavier. |
| 5 | **Cité en coupe V2, la Maquette** | 9,0 écrans, 13 images | 14 boutons, `rAF`, observer, `sticky` | Moyenne à haute | **~3,5 j** | Héros plein écran sans formulaire visible : le formulaire passe sous la ligne de flottaison, donc en plus un risque de conversion. Maquette interactive à ordre de lecture complexe. |
| 6 | **Frise V1, la Montée** | **13,5 écrans** (2,7 fois la Partition), 16 images | Écouteur de défilement + `sticky`, 15 boutons, chapitres animés | Haute | **~4,5 j** | Le plus lourd à maintenir : défilement scénarisé (chapitres, jalons), tests Playwright de non-régression nécessaires, comportement `prefers-reduced-motion` à vérifier section par section. La longueur multiplie aussi le contenu à traduire et à garder juste. |

**Core Web Vitals (prévision, non mesurée).** LCP : l'image de héros décide de tout, donc les six sont équivalentes si l'image est préchargée en AVIF/webp ~130 Ko et les polices en `font-display: swap` avec `preload`. CLS : risque sur les pages à sélecteur d'image (V1/V2 Cité, Frise V2/V3) si les images n'ont pas `width`/`height` ou `aspect-ratio` : à fixer. INP : correct, JS minime. Les pages à `rAF` (Cité V1, V2) sont les seules à risquer de la gigue sur mobile.

**Accessibilité.** Points communs positifs : lien d'évitement (`skip`), `aria-live` sur le message du formulaire, `alt` renseigné, `lang`/`hreflang` sur le sélecteur FR/EN. À vérifier avant mise en ligne : contraste du texte sur image (texte doré sur ciel clair du héros, en particulier Cité V1 et V3), focus visible des boutons de palier, `prefers-reduced-motion` (présent dans `common.js` et la Frise), nom accessible des 10 boutons de palier (« Palier I »). Les Salles et la Partition sont les plus faciles à rendre conformes (moins de widgets).

**Maintenance.** Chaque nouveau palier d'image, chaque jalon de la feuille de route et chaque chapitre ajoute du contenu à la page. Une accueil courte (Partition, Salles) en demande le moins ; la Montée est un coût récurrent à chaque annonce.

---

## 3. Angle joueurs : quatre visiteurs, dix secondes puis deux minutes

Message commun lu dans le héros des six pages : *« Stratégie et gestion d'empire au long cours, par navigateur. Pensée d'abord pour le PvE et la coopération. »* + pitch « Trois mille ans après la Rupture… » + formulaire e-mail. Dans les dix premières secondes, tout le monde comprend : **jeu de navigateur, fantasy, cité qui grandit, on s'inscrit par e-mail**. Personne ne voit comment on y joue.

### 3.1 Les quatre personas, sur toutes les pages

**Ancien joueur d'OGame** (veut : un vrai successeur, des files de construction, de la flotte/armée, de la profondeur, pas de pay-to-win).
- *10 s* : « Un OGame fantasy, bien. » Le mot « empire » et « au long cours » le rassurent. L'obélisque et la cité en coupe parlent moins que des chiffres.
- *2 min* : cherche les mécaniques ; trouve « La guerre se déclare, elle ne se subit pas » (très bon : répond à sa peur du pillage) et « Un monde neuf à chaque chapitre » (résonne avec les univers d'OGame). Lui manque : des chiffres, une capture d'écran de gestion, la monétisation.
- *S'inscrit ?* Oui, s'il voit une preuve que le moteur est sérieux. Rebuté par : tout ce qui est « au-delà des murs, héros » sans détail de gestion ; les pages très scénarisées (Montée) où il doit défiler 13 écrans pour trouver la ligne « pas de pay-to-win ».

**Joueur casual mobile (Last War)** (veut : sentir vite la progression, du visuel qui claque, ne pas lire).
- *10 s* : belle image, mais **aucune capture de jeu**, et « stratégie et gestion d'empire au long cours » sonne « long et complexe ». Il ne comprend pas qu'on peut jouer par sessions de 5 minutes.
- *2 min* : le sélecteur de dix paliers (la cité qui change) est son meilleur accroche : c'est sa boucle de récompense visible. Il décroche au bloc de texte dense.
- *S'inscrit ?* Peut-être, si le formulaire est dans l'écran. Rebuté par : formulaire sous la ligne de flottaison (Cité V2), pas d'appli mobile annoncée (le site dit « navigateur » ; une mention « fonctionne sur téléphone » aiderait), page longue.

**Fan de fantasy curieux** (veut : un univers, de l'ambiance, du lore).
- *10 s* : conquis par l'image et la typographie Cinzel ; « Neuf Sphères », « la Rupture » donnent envie. Le logo (K + obélisque) est mémorable.
- *2 min* : lit tout, y compris la section « Un monde brisé » / Straumar ; veut des noms de factions et des illustrations. Aime les paliers qui montrent la cité à dix états.
- *S'inscrit ?* Oui, c'est le plus facile à convaincre, mais il attend du lore et des images supplémentaires. Rebuté par : le côté « stratégie et gestion » trop sec dans la phrase d'accroche, qui masque l'ambiance.

**Joueur solo PvE** (veut : ne pas être attaqué, un progrès à son rythme, du contenu contre l'IA).
- *10 s* : « Pensée d'abord pour le PvE » est exactement ce qu'il cherche. Mais la phrase est en petit, doré, au-dessus du titre.
- *2 min* : cherche « puis-je jouer seul ? ». La réponse est dans « La guerre se déclare, elle ne se subit pas » et « Du défi pour chacun » (Frise V1, V2) ; il manque une formulation directe (« jouable en solo »).
- *S'inscrit ?* Oui, si la promesse « pas de PvP forcé » est lisible vite. Rebuté par : ambiguïté du mot « guerre », jamais clarifiée en dix secondes.

### 3.2 Page par page

| Rang | Page | 10 secondes | 2 minutes | Risque |
|---|---|---|---|---|
| 1 | **Frise V3, la Partition** | Héros avec une **vraie ville** (palier avancé) + formulaire visible à gauche : on comprend « ça grandit » et on peut s'inscrire sans défiler | Section « Dix paliers, un seul obélisque » puis héros, guerre, chapitre, état d'avancement, appel final : parcours court et complet (4,9 écrans) | La ville en héros peut faire croire que le jeu est déjà là. Même absence de capture d'interface. |
| 2 | **Cité V1, l'Axe** | Héros en deux colonnes : obélisque à gauche, pitch et formulaire à droite, barre de paliers en bas : tout est visible à 1080 px | Coupe verticale de la cité « de la flèche aux racines » : très parlant pour l'ancien d'OGame (des bâtiments, de la profondeur) | 25 images, page dense ; la barre de vignettes est petite à 1280. |
| 3 | **Cité V3, les Salles** | Héros plein écran, titre, curseur de paliers, formulaire en barre fixe en bas : accès permanent à l'inscription | Sections nommées (tours, remparts, place, champs, Straumar) : chaque idée a sa salle, lecture facile pour le fan de fantasy | La barre d'inscription cache un peu l'image de fin d'écran ; le titre « Les tours » en tête n'a pas de sens pour un nouveau venu. |
| 4 | **Frise V2, la Colonne** | Héros plein écran, formulaire en bas à droite, texte centré en italique sur l'image | Colonne de pierre avec quatre paliers « scellés » : intrigant, mais « scellés » signifie « pas encore jouables » et peut faire douter | Texte du titre éclaté en plusieurs blocs ; moins immédiat. |
| 5 | **Cité V2, la Maquette** | Immense titre KALENDRATH sur l'image, mais le **pitch et le formulaire sont sous la ligne de flottaison** à 1080 | Le héros est le plus beau (feu de camp, ville), puis colonnes pitch / paliers / formulaire | Un visiteur pressé quitte avant de voir le formulaire. À 2560 : plus de contexte, mais le défaut reste à 1280. |
| 6 | **Frise V1, la Montée** | Héros correct (formulaire, titre) | 13,5 écrans de défilement scénarisé : héros, Forge, Ambassade, au-delà des murs, guerre, défi, chapitre, jalons : le plus riche narrativement | Trop long pour le casual et pour l'ancien d'OGame pressé ; promesses (Forge, Ambassade) plus précises que le jeu actuel : risque de promettre trop. |

**Constat transversal côté joueurs** : le formulaire visible dès le premier écran est le facteur décisif (Partition, Axe, Salles : oui ; Maquette : non). Une page courte vaut mieux qu'une page scénarisée tant que le jeu n'a pas de capture à montrer.

---

## 4. Classements croisés

| Page | Rang technique | Rang joueurs | Coût accueil | Verdict |
|---|---|---|---|---|
| Frise V3, la Partition | 2 | **1** | ~2,5 j | **À retenir comme squelette** |
| Cité V3, les Salles | **1** | 3 | ~2 j | Bon second choix, très sûr |
| Cité V1, l'Axe | 4 | 2 | ~3 j | Héros à emprunter, coupe de cité à garder |
| Frise V2, la Colonne | 3 | 4 | ~3 j | Intermédiaire, rien d'unique |
| Cité V2, la Maquette | 5 | 5 | ~3,5 j | Formulaire sous la flottaison : à écarter |
| Frise V1, la Montée | 6 | 6 | ~4,5 j | À écarter pour l'accueil ; matière pour la page « Le jeu » |

---

## 5. Logos : dix propositions, lecture technique et lisibilité

Tous les fichiers sont en **SVG de 0,5 à 2 Ko, sans balise `<text>`** (le mot KALENDRATH est tracé en chemins : aucune dépendance de police). 13 déclinaisons par logo (signe, horizontal, vertical, favicon 32, en variantes clair / sombre / blanc / noir). Les noms `clair` et `sombre` désignent le fond d'usage (le fichier « clair » est brun, pour fond clair) : à renommer en `on-light` / `on-dark` dans le dépôt pour éviter les inversions.

| Logo | Lecture | À 16 et 32 px (favicon) | Cohérence avec l'univers | Avis |
|---|---|---|---|---|
| **k1** | K massif + obélisque violet | **Très net** | Obélisque, couleur or de la charte | **Favori** |
| **n1** | K + obélisque + losange | Net (le losange fait grumeau à 16 px) | Idem, plus raffiné | Très bon, variante de k1 |
| k5 | K dans un hexagone-maison | Net, le plus « application » | Générique, perd l'obélisque | Bon favicon, moins d'identité |
| k4 | K à traits fendus | Correct | Rupture suggérée | Intéressant, plus fragile |
| k6 | K à pierres empilées | Correct | Palier / construction | Bonne idée, détail fin |
| k3 | K dans un cercle | Anneau mince : flou à 16 px | Sceau, un peu convenu | Moyen |
| k2, n2 | Contours fins | **Illisibles à 16 px** | Élégants en grand | À éviter en favicon |
| c1, c2 | Skyline / couronne | Blob à 16 px | Cité / royauté, mais **sans K ni obélisque** : casse l'identité du site | À écarter |

Côté vrai site : un seul SVG de signe inlinable dans l'en-tête, le favicon `favicon.svg` + `apple-touch-icon.png` (180) + `og-image` générée ; le logo provisoire actuel du site est déjà proche de k1.

---

## 6. Recommandation finale d'assemblage

1. **Squelette : la Partition** (Frise V3). Page courte, formulaire visible dès le héros, cinq sections, le moins coûteux à maintenir.
2. **Héros : mélange Axe et Partition.** Deux colonnes, texte et formulaire à droite sur la zone sombre (lecture et contraste), image de cité à gauche. Ne jamais faire passer le formulaire sous la ligne de flottaison (défaut de la Maquette).
3. **Section paliers : sélecteur de l'Axe/Partition, en HTML sémantique** (radios ou onglets), dix vignettes, avec `aria-label` « Palier I… X ». C'est la meilleure accroche pour le casual et le fan de fantasy.
4. **Coupe de la cité (« de la flèche aux racines » de l'Axe)** sur la page « Le jeu » plutôt que sur l'accueil : parle à l'ancien d'OGame sans allonger l'accueil.
5. **Phrase d'accroche** à reformuler (à valider avec la skill voix) : mettre « PvE et coopération » au même niveau que le titre, et ajouter une ligne sur le jeu **jouable seul et sur téléphone**, pour le solo et le casual. Ajouter dès qu'il existe un écran réel du jeu.
6. **Reporter** de la Montée la seule idée « La Forge s'allume / l'Ambassade ouvre ses portes » sur la page « Le jeu », sans promettre ce qui n'est pas confirmé par le GDD.
7. **Logo : k1** (n1 en second), favicon k5 en repli si le test à 16 px déçoit.
8. **Technique** : textes dans des fichiers i18n JSON, HTML statique par langue (`/fr/`, `/en/`), `hreflang` + `canonical` + OG par langue, polices woff2 auto-hébergées (3 fichiers), images `srcset` webp/AVIF, héros en `fetchpriority=high`, JS limité au sélecteur de paliers (< 3 Ko), CI avec Lighthouse (LCP < 2,5 s, CLS < 0,1) et test Playwright aux trois largeurs 1280, 1920, 2560 pour garantir l'absence de défilement horizontal.

**Coût estimé de l'assemblage recommandé : ~3 jours** pour l'accueil (squelette Partition 2,5 j + héros mixte et sélecteur sémantique 0,5 j), en plus du socle Astro/i18n/formulaire du brief.
