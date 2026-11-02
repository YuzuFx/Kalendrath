# Retours des agents — mockups de site et logos, puis analyses croisées (01/11/2026)

Archive des comptes rendus de 3 agents de création (site « Cité en coupe », site « frise des paliers », logos) et de 4 agents d'analyse (marketing, game design, DA/UX/responsive, technique et personas). Ils font suite à la première série de brainstorms ([../brainstorm-design/](../brainstorm-design/)).

Ces textes sont des comptes rendus de modèles, relayés tels quels : ils n'ont pas été relus par Claude ni par Gregory. La liste des contrôles à faire est dans [../taches-a-valider.md](../taches-a-valider.md).

Exigence de Gregory donnée aux agents : rendu **pleine page, responsive, sans aucune largeur fixe en pixels**.

Les analyses complètes sont dans le dépôt :
- [../brainstorm-design/phase2-marketing.md](../brainstorm-design/phase2-marketing.md)
- [../brainstorm-design/phase2-game-design.md](../brainstorm-design/phase2-game-design.md)
- [../brainstorm-design/phase2-da-ux.md](../brainstorm-design/phase2-da-ux.md)
- [../brainstorm-design/phase2-technique-joueurs.md](../brainstorm-design/phase2-technique-joueurs.md)

Les artefacts sont privés ; Gregory doit les partager depuis le menu Partager pour que d'autres puissent les ouvrir.

**Attention aux fichiers sources** : ils sont dans le répertoire temporaire de la session (`/tmp/claude-1000/-home-gregory-projets-OGameX/c15ddbcf-2d6f-4e70-8f6f-6edc271c2e7f/scratchpad/`), pas dans le dépôt, et disparaîtront. Les artefacts publiés en gardent le rendu.

---

## Partie 1 — Créations

### 1.1 Site « Cité en coupe » (Opus, effort moyen)

Direction hybride : ouverture sur la Cité vivante (accueil A), puis corps de page en coupe de cité. 3 variantes.

**V1, l'Axe** — https://claude.ai/artifact/DG6gV9oGVfu6GFQxB8UXNS
- Ouverture : Cité vivante en plein cadre, texte et formulaire à droite. Dessous, frise de 10 vignettes numérotées de I à X, sans noms. « Voir la cité grandir » ne se lance qu'au clic.
- L'obélisque est à 30 % de la largeur ; un trait vertical continue exactement à cette position sur toute la coupe : l'obélisque devient la colonne vertébrale de la page, jusqu'aux Straumar.
- À gauche du trait, l'altitude en grands chiffres collants (+60, +20, 0, −40, −120 toises). À droite, la promesse et les bâtiments de chaque strate. La page finit sur le socle : chapitres, jalons, Discord, mot de l'auteur, formulaire.

**V2, la Maquette** — https://claude.ai/artifact/RVM2XUMZfL6aABQbWV8mgM
- Titre monumental posé sur une ligne de fracture tracée en mana. Sous l'image, bande en trois colonnes : ligne de genre et accroche, paliers en sceaux ronds, formulaire.
- Paliers I à V ouverts ; VI à X scellés (« à découvrir en jeu »), images non chargées.
- Corps de page : maquette de la cité en coupe dessinée en canvas (aucune image à générer), fixe à gauche, qui s'éclaire étage par étage pendant que le récit défile à droite. Obélisque à 30 % de la fenêtre, règle en toises cliquable. Jalons présentés comme une file de construction.

**V3, les Salles** — https://claude.ai/artifact/KFNWvys7iWAzvTNVE29qtE
- Curseur de I à X pour faire grandir la cité ; l'obélisque ne bouge pas.
- Chaque strate est une salle peinte en plein cadre, avec plaque de texte opaque. Failles de roche en SVG entre les salles, jauge de profondeur collée en haut.
- Fond de la nuit à l'aube jusqu'au formulaire final. Formulaire aussi dans une barre basse collante dès le premier écran (un seul appel à l'action), qui disparaît quand le formulaire final apparaît.

**Contraintes traitées (déclaré par l'agent)**
- Largeur fluide : aucune largeur de page en pixels (%, vw, clamp(), grilles). Vérifié avec Playwright à 1280, 1440, 1600, 1920 et 2560 px : aucun défilement horizontal, aucune erreur JavaScript.
- Aucun nom de palier, seulement des chiffres romains ; fichiers d'image renommés cite-01 à cite-10.
- Obélisque stable : chaque image de palier recadrée pour que l'obélisque tombe à 30 % de la largeur.
- Accroche proposée (à valider) : « …et faites grandir un empire qui travaille pendant que vous dormez ».
- Carte PvP réécrite pour R13 : guerres entre alliances qui ont levé leur bannière, tous leurs membres attaquables, boucliers, pertes de ressources et de troupes, jamais de cité ; pour bâtir en paix, rejoindre une alliance qui ne lève pas sa bannière. Bouclier payant non mentionné.
- « Un héros gouverne votre cité » corrigé en « Un héros mène votre empire » (GDD).
- Contraste : texte principal ≈ 17:1, secondaire ≈ 9:1, bouton or ≈ 10:1, bouton Discord violet foncé/blanc 7,7:1, aucune veine de mana sur l'or.
- Logo provisoire : K-obélisque sans étincelle.
- Images WebP : ≈ 150 à 290 Ko pour l'ouverture en 2400 px, version 1280 px pour les petits écrans, vignettes 6 à 10 Ko, bâtiments 50 à 110 Ko chargés à la demande, palier pleine taille chargé au clic.
- Espaces réservés étiquetés : MJ-H1 (le héros sur la place), MJ-C1 (la coupe souterraine, V3).
- Bascule FR/EN complète (« Éclat » → « Shard »), noms des bâtiments tirés du lexique.
- Aucune promesse non validée (ni « gratuit », ni Kaelite, ni prestige, ni date).
- Bouton « Notes de maquette » sur chaque page qui liste ces choix.

**Défauts connus restants (agent)**
1. Palier VIII : cadrage d'origine trop serré à gauche, complété par un prolongement en miroir d'environ 7 % ; il faut un « zoom out » Midjourney. La taille de l'obélisque change d'un palier à l'autre (point de vue différent).
2. Polices via Google Fonts (à auto-héberger, RGPD) ; « Kalendrath » tapé en Cinzel, pas encore dessiné comme lettrage.
3. À valider par Gregory : accroche, carte PvP, « Le Discord est ouvert » (suppose une invitation permanente non créée).
4. Textes injectés par JavaScript depuis un dictionnaire FR/EN : page vide si le script ne charge pas. Le vrai site Astro devra produire le HTML statique par langue, avec hreflang.
5. MJ-H1 et MJ-C1 visibles : non publiable en l'état.
6. À 1280 × 720, la frise de V1 et le bas du formulaire de V2 tombent sous la ligne de flottaison.
7. Pas de version mobile (PC uniquement) : repliements basiques sous 900 px, la maquette de V2 y disparaît, rien testé à 390 px.
8. Sélecteur de langue : boutons sur la même page, pas de vrais liens vers la page jumelle ; pas de balises de partage (og:image).
9. Le bouton jaune « Notes de maquette » est un outil de revue, à retirer avant publication.

Fichiers (scratchpad) : `site/` (v1.src.html, v2.src.html, v3.src.html, base.css, strings.js, common.js, build.js, pages générées v1/ v2/ v3/), `img/`, `look/` (captures), `tools/crop.js`.

### 1.2 Site « frise des paliers » (Opus, effort moyen)

Direction hybride : ouverture accueil A, puis corps de page construit sur la frise des 10 paliers. 3 variantes. Testé à 1280, 1600, 1920 et 2560 px : aucun débordement horizontal, aucune erreur de script ; pleine largeur et fluide (vw, clamp, grilles en fr).

**V1, la Montée** — https://claude.ai/artifact/9JENvJvSfVrw84PFtG14mD
- L'ouverture est la première image d'une scène épinglée plein écran, texte à droite, obélisque fixé à 30 %.
- Le défilement vertical fait passer la cité en fondu du palier I au X ; les panneaux de paliers glissent à l'horizontale, chacun avec un système (héros, Forge, Ambassade, hordes, guerre d'alliances, défi). Paliers VII à X : une phrase et un cadenas.
- Règle en bas d'écran (dix barres comme un horizon), cliquable. Puis bannières de chapitres (serveur par chapitre, lobby), jalons, formulaire final avec Discord en second appel.

**V2, la Colonne** — https://claude.ai/artifact/8hjw5ayJ6u3Wm8njZcV4zo
- L'obélisque devient une ligne verticale au centre exact de la page, de l'ouverture au formulaire « Posez la première pierre ». Lecture calme, éditoriale, sans scène épinglée.
- Paliers I à VI : bandes d'image pleine largeur de plus en plus hautes, obélisque recadré sur la ligne ; les systèmes s'accrochent par des branches alternant gauche/droite.
- Paliers VII à X « scellés » : quatre silhouettes dessinées en canvas, sans image ni nom. Barre d'inscription collante après l'ouverture.

**V3, la Partition** — https://claude.ai/artifact/Ee7125NoTD5nu5SKQuFW9T
- Ouverture accueil A classique, puis « partition » pleine largeur : dix tranches verticales de la cité, chacune centrée sur son obélisque (dix obélisques alignés). VII à X floutés et cadenassés.
- Sous les tranches, chaque système est une ligne qui commence au palier où il apparaît. Clic ou flèches du clavier ouvrent le détail du palier, obélisque à position fixe.
- Puis rangée des six archétypes (MJ-H1 à MJ-H6 étiquetés), bande « La guerre se déclare » (seule surface rouge), schéma lobby et chapitres, jalons, formulaire.

**Corrections communes aux trois**
- Accroche « faites grandir un empire qui travaille pendant que vous dormez » à la place de « raser dans votre sommeil ».
- Ligne de genre remontée au-dessus du titre, en or.
- « Un héros mène votre empire ».
- Promesse PvP reformulée (R13 et décisions du 30/10) : alliances à bannière levée attaquables, avertissement et boucliers ; pour bâtir tranquille, alliance qui ne lève pas sa bannière ; ressources et troupes perdables, jamais une pierre de bâtiment. Bouclier payant jamais mentionné.
- Aucun nom de palier, chiffres romains.
- Bouton Discord à filet sur fond sombre ; veine de mana jamais sur l'or.
- Formulaire : libellé visible, case de consentement non cochée.
- Logo provisoire : K-obélisque redessiné sans étincelle, avec un nœud de mana détouré.
- Images WebP : 85 à 135 Ko en pleine taille, 11 à 15 Ko en miniature (≈ 300 Ko en JPEG avant).

**Défauts connus restants (agent)**
- Palier VIII : obélisque trop au bord gauche (13,5 % de la largeur) ; pour le garder fixe, image agrandie ≈ 2,2× en V1, floue en plein écran. Il faut étendre l'image à gauche dans Midjourney. Positions de l'obélisque estimées à l'œil, recadrage manuel à faire.
- Répartition des systèmes par palier : indicative, issue du premier jet du GDD 4.2, non validée par le simulateur. Textes PvP et accroche à valider.
- « Jusqu'à quatre conseillers » (V3) : décidé dans le GDD, pas validé pour la communication.
- Images d'unités (mage, garde) : quarts de grilles en basse résolution, acceptables seulement en petite vignette.
- Polices Google Fonts (maquette seulement) ; pas de balises Open Graph ; pas de mention « gratuit » (à décider).
- V1 : pendant les transitions, le texte des panneaux passe un instant devant l'obélisque ; la scène fait 11,5 écrans de haut.
- V2 : silhouettes des paliers scellés génériques, pas encore une vraie DA.
- Mobile non traité (PC uniquement).

**Effets de bord de l'agent hors scratchpad**
- Dépôt non modifié. Des WebP téléchargés par erreur dans `.playwright-mcp/` (non suivi par git) ont été supprimés.
- Lien symbolique créé : `~/.cache/ms-playwright/chromium-1252` → `chromium-1248` (Playwright attendait une version de Chromium non installée).
- Navigateur partagé avec un autre agent : vérifications finales faites dans un contexte de navigation séparé.

Fichiers (scratchpad) : `v1-montee/index.html`, `v2-colonne/index.html`, `v3-partition/index.html`, `shared/img/`, `shots/`.

### 1.3 Logos (Sonnet, effort moyen)

Artefact : https://claude.ai/artifact/JMADbd1mBb63myUhqTAqRF (pleine largeur, sans largeur fixe en pixels ; captures vérifiées à 1440 et 400 px).

**Contenu** : 10 signes avec wordmark, visuels fonds sombre et clair, légende et limite ; gonfanon en 3 couleurs de champ ; sceaux de chapitre (I, II, III en cire, nuit, encre) avec le signe K1 ; tests par variante (favicon 16 et 32 px rendus en canevas puis agrandis sans lissage, monochrome noir et blanc, fonds clair et sombre, lockup vertical) ; deux modèles d'en-tête à 1280 et 2560 px en unités proportionnelles ; bannière 3:1 ; en-tête collant réel (`height: clamp(32px, 2.6vw, 84px)`) ; tableau de contrastes (18 paires).

**Variantes** (dans les six K, les branches touchent la haste pour supprimer la lecture « i< » ; étincelle supprimée)
- **K1 Taillé** : signe principal retenu par l'agent. Veine de mana dans la fente, pas sur l'or.
- **K2 Fil** : contour d'obélisque et branches d'un trait.
- **K3 Médaillon** : K1 dans un double anneau, pour l'avatar.
- **K4 Rune** : lame prismatique, branches en éclats.
- **K5 Négatif** : stèle pleine, K évidé ; meilleur à 16 px (icône, favicon).
- **K6 Paliers** : haste en pierres appareillées.
- **N1 Nœud losange** : losange de mana qui soude la haste aux branches.
- **N2 Nœud cordon** : anneau de mana d'où partent deux cordons.
- **C1 Couronne cité** : rempart, quatre tours, obélisque central ; pictogramme de capitale et de paliers.
- **C2 Couronne pointes** : cinq pointes d'obélisque sur un bandeau.

Wordmark KALENDRATH : lettrage construit lettre par lettre en six écritures (Taillé, Fil, Géométrique, Rune, Lourd, Paliers), aucune police ; empattements et interlettrage réglés contre « KAIENDRATH » et le collage N-D.

**Contrastes** : toutes les paires retenues passent 4,5:1 (or sur nuit 11,3 ; bronze sur nuit 6,3 ; mana sur nuit 9,9 ; bronze `#8A5E17` sur aube 5,4 ; or sur champs de gonfanon 5,8 à 9,1 ; cire 5,9 à 7,8). Rappels écartés : or seul sur fond clair 1,65 ; mana sur or 1,14.

**Limites (agent)**
- Lettrage généré en code, pas dessiné par un typographe : raccords de bols, attaches de R et K, équilibre optique à retoucher ; traits (stroke) à convertir en contours avant impression grand format.
- À 16 px, K1 se réduit à sa silhouette de K ; K2, K3, K6, N2, C2 deviennent illisibles ou confus (K3 et K6 dès 24 à 32 px). Risque de lecture « maison » pour K5. K4 peut se lire « I< » de loin.
- C1 et C2 ne sont pas des K : pas des logos de marque.
- La veine de mana n'existe qu'en couleur, absente en monochrome et sous 48 px : le logo ne doit pas en dépendre.
- Texte en arc des sceaux illisible sous ≈ 64 px.
- Aucun test utilisateur sur les lectures « K » et « i< » ; favicon vérifié seulement dans Chromium.
- Section Tests et thème sombre de la page non contrôlés visuellement.

Fichiers (scratchpad) : `logos/{k1..k6,n1,n2,c1,c2}-{signe,horizontal,vertical}-{sombre,clair,noir,blanc}.svg`, `{id}-favicon-32.svg`, `gonfanon-{nuit,sang,mousse}.svg`, `sceau-{1,2,3}-cire.svg`, `sceau-1-nuit.svg`, `sceau-1-encre.svg` ; générateurs dans `gen/` (glyphs.mjs, signs.mjs, build.mjs, extras.mjs).

---

## Partie 2 — Analyses

Limites communes : les artefacts n'ont pas tous pu être rouverts en ligne ; les avis « personas » sont des jeux de rôle, pas de vrais testeurs ; ni Lighthouse, ni mobile, ni test d'interactions complets.

### 2.1 Marketing (Sonnet, effort moyen)

Jugé sur captures (1280 à 2560), code et notes de maquette ; interactions non testées.
- **Classement** : 1 Partition, 2 Colonne, 3 Axe, 4 Salles, 5 Montée, 6 Maquette.
- **Commun aux six** : accroche tenable ; carte PvP honnête (alliances à bannière levée, ressources et troupes perdables, jamais un bâtiment) ; ligne de genre corrigée. Absents partout : « gratuit », Discord visible en première vue, balises de partage.
- **Logo** : K1 principal, K5 favicon, K3 avatar, C1 pictogramme de cité ; écartés K2, K4, K6, N2, C2 ; N1 gardé pour plus tard. Test des 5 secondes à faire (risque « i< »), lettrage à faire retoucher.
- **À combiner** : base Partition, ligne verticale et encadré PvP de l'Axe, barre d'inscription collante des Salles, scène « Au-delà des murs » de la Montée en 3-4 écrans, canevas de la Maquette en simple illustration.
- **Défauts bloquants** : MJ-H1 « à générer » visible dans les trois coupes, MJ-C1 dans les Salles, deux mentions « à générer » dans la Partition à vérifier ; Montée : texte superposé à 1600 px et K séparé du mot à 1920 px ; pastille « logo provisoire » dans les trois frises ; Maquette : formulaire sous la ligne de flottaison ; « Boucliers vous couvrent » à adoucir ; lien Discord en attente de l'invitation permanente.
- **Largeurs fixes en pixels** : aucune dans les six ; seuls pixels : points de rupture à 900 px et case à cocher. Exceptions : hauteur plancher 620 px (scène de la Montée), schéma du lobby de la Partition à 520 px minimum (défilement interne), canevas de la Maquette masqué sous 900 px.

### 2.2 Game design (Sonnet, effort moyen)

Jugé sur le code des 7 artefacts et les captures existantes (pas de nouveau rendu). Fichier de 196 lignes, six sections, qui se termine sur six questions pour Gregory.
- **Classement** : coupes 1 Maquette, 2 Salles, 3 Axe (seule la Maquette scelle vraiment VI à X) ; frises 1 Partition, 2 Colonne, 3 Montée (la Partition place bien les systèmes et seule explique le lobby ; la Colonne est la plus sûre sur les spoilers ; la Montée la moins fidèle). Logos : 1 K1 (marque), 2 K5 (icône), 3 C1 (pictogramme), 4 N1 ; K3 avatar, K6, K2, K4, N2, C2 utilitaires ou à écarter.
- **À corriger en priorité**
  1. Spoil des paliers VII à X : V1 et V3 des coupes et la Montée montrent images et légendes (« Le portail s'éveille ») ; l'image du Portail des Sphères (palier 10) figure dans les trois coupes, Maquette comprise ; dans la Partition le flou masque l'écran mais les vraies images sont chargées.
  2. « Jusqu'à quatre conseillers » (Partition) à retirer : les sièges dépendent du Prestige, non annoncé publiquement.
  3. Montée et Colonne placent PvP, hordes et ligues sur des paliers précis (guerre au palier V) : le GDD n'a aucune règle de ce genre, le vrai seuil est le Bourg (palier 3) et 14 jours de compte.
  4. « Vos boucliers vous couvrent » promet trop (bouclier gratuit = stock personnel, couverture continue payante) ; « Pour bâtir en paix, rejoignez une alliance » oublie que le joueur sans alliance est déjà protégé.
  5. Donjon et Hôtel de ville dans la même cité, alors que le Donjon n'existe que dans la capitale.
  6. Montée et Colonne : gonfanons « Chapitre I, II, III » qui nomment des fonctionnalités, pas des chapitres ; « Toujours ouvert aux amis » est un engagement que l'étude serveurs ne prend pas.
  7. Logos : le gonfanon se confond avec la « bannière levée » de la guerre et le rouge « sang » est la couleur de la guerre ; les « rangs » de pastilles de mana n'existent pas au GDD ; le sceau à un obélisque par chapitre devient illisible passé quatre chapitres.
- **Exact** : Forge et Académie au palier 2, Ambassade au palier 3, Remparts au palier 5 ; six archétypes de héros et « un échec coûte du temps, jamais le héros » ; décision R13 respectée ; lobby, serveur par chapitre, absence de promesse sur la fusion.
- **Accueil combiné proposé** : coupe V2 en corps, frise de la Colonne avec les portées de la Partition, bloc guerre et schéma lobby de la Partition.

### 2.3 DA, UX, responsive (Opus, effort moyen)

Pages rendues dans Chromium depuis une copie locale des fichiers publiés, à 1280, 1600, 1920 et 2560 px, toutes à 720 de haut ; redimensionnement en direct simulé en rechargeant chaque largeur.
- **Exigence de Gregory tenue** : aucun débordement horizontal, aucun conteneur plafonné en px, typographie en clamp() jusqu'à 2560. Restent des planchers de hauteur et deux exceptions à corriger dans la Partition : `min-width: 520px` sur le schéma du lobby, héros de 46vw de haut.
- **Images floues sur grand écran (défaut principal)** : Salles ×2,1 à 2560 (bâtiments de 1200 px en plein cadre), Montée ×1,76, Partition ×1,62.
- **Hauteur 720** : à 2560 × 720, le formulaire passe sous la ligne de flottaison dans l'Axe, la Maquette (dès 1920) et la Partition ; dans la Montée, formulaire, invite et règle des paliers se chevauchent à 1920 × 720.
- **Lignes trop longues** : 92 à 100 caractères à 2560 dans les Salles, la Montée et la Partition.
- **Classement (note /10)** : 1 Axe (7,5), 2 Colonne (7), 3 Salles (6,5), 4 Partition (6), 5 Montée (5,5 ; 11,5 écrans épinglés), 6 Maquette (4,5 ; maquette dessinée au code à côté des peintures).
- **Autres défauts bloquants** : secret des paliers incohérent (10, 5 ou 4 paliers montrés selon la page ; la Partition ne fait que flouter en CSS des images en pleine résolution) ; Google Fonts partout (interdit par le brief, RGPD) ; la Partition ajoute trois couleurs hors palette, la Colonne des étiquettes en capitales.
- **Logos** : défaut bloquant : lockups verticaux tronqués sur les dix variantes (viewBox à 138 unités, mot jusqu'à 146 → « KAI FNDRATH ») ; wordmark trop maigre ; N1 pose le losange de mana sur l'or contre la règle de la planche ; K1 signe principal, K5 favicon avec une pointe plus aiguë (on y lit « maison »), puis N1, K6, C1 (pictogramme de cité), K3 (avatar).
- **Hybride proposé** : ouverture de l'Axe, curseur natif des Salles, colonne de la Colonne avec l'axe à 30 %, barre d'inscription collante (Salles et Colonne), passage nuit → aube ; panneau « palier → ce qui s'éveille » de la Partition sur la page « Le jeu ».
- Captures dans `.playwright-mcp/da/` (dans le dépôt, hors suivi git).

### 2.4 Technique et personas (Sonnet, effort moyen)

Mesuré : 6 pages ouvertes dans Chromium à 1280, 1920 et 2560 px ; aucune largeur fixe sauf `width:520px` dans la Partition. Non mesuré : Lighthouse, mobile, vrais testeurs.
- **Défauts communs** : textes injectés par JS (à passer en HTML statique par langue avec fichiers i18n : l'essentiel du coût) ; Google Fonts (4 requêtes externes, RGPD) à auto-héberger en woff2 ; pas de hreflang, OG, canonical ; aucune capture du jeu (plus grosse faiblesse côté joueurs).
- **Classement technique** (coût de l'accueil seul, en jours estimés, non mesurés) : 1 Salles (~2 j), 2 Partition (~2,5 j), 3 Colonne (~3 j), 4 Axe (~3 j), 5 Maquette (~3,5 j), 6 Montée (~4,5 j, 13,5 écrans).
- **Classement joueurs** : 1 Partition (formulaire visible dès le héros, page courte, vraie ville), 2 Axe, 3 Salles, 4 Colonne, 5 Maquette (formulaire sous la ligne de flottaison), 6 Montée (trop longue, promet plus que le jeu actuel). Personas jouées : ancien joueur d'OGame, joueur casual mobile de Last War, fan de fantasy curieux, joueur solo PvE.
- **Logos** : K1 favori (N1 second), lisible à 16 px ; K2 et N2 illisibles en favicon ; C1 et C2 à écarter (ni K ni obélisque).
- **Assemblage recommandé (~3 j pour l'accueil)** : squelette de la Partition ; héros en deux colonnes avec formulaire visible (emprunté à l'Axe) ; sélecteur des dix paliers en HTML sémantique ; coupe de l'Axe déplacée sur la page « Le jeu » ; accroche reformulée pour insister sur PvE, solo, téléphone ; logo K1 ; polices auto-hébergées, images en srcset, JS limité au sélecteur ; CI avec Lighthouse et Playwright aux 3 largeurs.

---

## Partie 3 — Classements croisés (synthèse de Claude, à contrôler)

| Page | Marketing | Game design | Technique | Joueurs | DA/UX |
|---|---|---|---|---|---|
| Frise V3 Partition | 1 | 1 (frises) | 2 | 1 | 4 |
| Frise V2 Colonne | 2 | 2 (frises) | 3 | 4 | 2 |
| Coupe V1 Axe | 3 | 3 (coupes) | 4 | 2 | 1 |
| Coupe V3 Salles | 4 | 2 (coupes) | 1 | 3 | 3 |
| Frise V1 Montée | 5 | 3 (frises) | 6 | 6 | 5 |
| Coupe V2 Maquette | 6 | 1 (coupes) | 5 | 5 | 6 |

Le game design classe coupes et frises séparément.

**Accords** : K1 en tête pour le logo partout, K5 en favicon ; Montée et Maquette en bas de classement ; défauts communs (Google Fonts, JS, pas de capture du jeu, pas d'OG/hreflang).
**Désaccords** : base de l'accueil (Partition pour trois analyses, Axe puis Colonne pour la DA/UX) ; sort de C1 (gardé en pictogramme de cité par marketing, game design et DA/UX, rejeté par la technique) ; spoil des paliers.
