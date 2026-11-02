# Brainstorm design : regard game design et monde du jeu

*Rédigé le 2026-11-01. Vision : game designer et directeur créatif de jeux de stratégie et de fantasy. Périmètre : départager 6 accueils PC (lots 1 et 2), 7 pistes de logo, et relire les mockups initiaux (accueil A préféré par Gregory, accueil B, 404, contact).*

*Méthode et limites. Lecture complète du GDD (boucles, lexique, héros), du lore, du brief du site, des références du genre, de la planche de style et de la mémoire du canvas (Mix v5 : verre dépoli, Outfit, violet #9A8CFF et or #E9BE74). Les quatre artefacts ont été lus dans leur source. Les dossiers de travail `site/` et `lot2/` du scratchpad n'existaient pas et les images relatives des accueils n'étaient pas disponibles : je n'ai donc pas pu faire de captures à 1440 et 1920 px, et je juge les accueils sur leur structure, leurs textes et leurs interactions, pas sur leur rendu final. Les 7 logos, eux, ont été rendus à 16, 32, 64 et 128 px sur fond sombre et clair à partir des SVG de `site-prototype/logos/`.*

---

## 1. Verdict en dix lignes

- **Accueils.** 1. La Cité en coupe, 2. La cité vivante, 3. La table du royaume, 4. L'Atlas des Éclats, 5. La chronique, 6. Le Guet de nuit. Recommandation : un hybride **cité vivante (ouverture) + cité en coupe (corps)**, avec en plus un moment de jeu interactif (idée S1 ci-dessous).
- **Logos.** 1. K-obélisque, 2. Gonfanon, 3. Rupture, 4. La Taille, 5. Sceau brisé, 6. Monolithe, 7. L-obélisque. Recommandation : **K-obélisque comme marque et icône, Gonfanon comme système héraldique (bannières d'alliance et de serveur), Sceau brisé comme cachet de chapitre**, et tester un K « fendu » issu de la Rupture.
- **Erreurs de promesse à corriger avant toute publication** : « raser dans votre sommeil », « un héros gouverne votre cité », noms des paliers affichés, Portail des Sphères présenté comme image des « chapitres », carte du monde cliquable alors que l'interface sera en listes, Guet de nuit qui vend la mauvaise boucle (section 5).
- Aucun des six accueils n'a d'emplacement pour une **bande-annonce ou un cinématique court**, code numéro un du genre. À prévoir même en version « Ken Burns » sur les images validées.

---

## 2. Grille d'évaluation

Neuf critères notés de 0 à 3 (24 au maximum après pondération : fidélité au lore et boucle de jeu comptent double).

| Critère | Ce que je cherche |
|---|---|
| Lore (x2) | Obélisque, Rupture, Straumar, Régions/Contrées/Éclats traités sans contresens ni révélation du twist de Phase 2 |
| Boucle (x2) | Le joueur comprend : cité, bâtiments, héros, PvE, alliance, chapitres. Rien n'est promis qui n'existe pas |
| Codes du genre | Rassure un joueur de stratégie (base qui grandit, carte, ressources, héros) sans sentir le mobile bas de gamme ou le NFT |
| Avant-goût | Une interaction qui fait sentir le jeu, pas seulement le lire |
| Cohérence UI | Proche de Mix v5 et des artefacts du canvas, pour que le site ne mente pas sur l'interface |
| Évolution | Tient pour le chapitre 2, 3... sans refonte |

---

## 3. Les six accueils

### Classement

| Rang | Accueil | Lore (x2) | Boucle (x2) | Codes | Avant-goût | UI | Évolution | Total /24 |
|---|---|---|---|---|---|---|---|---|
| 1 | **III. La Cité en coupe** (lot 2) | 3 | 3 | 2 | 2 | 2 | 3 | **21** |
| 2 | **1. La cité vivante** (lot 1) | 2 | 2 | 3 | 3 | 3 | 2 | **19** |
| 3 | **3. La table du royaume** (lot 1) | 1 | 3 | 3 | 2 | 3 | 2 | **18** |
| 4 | **I. L'Atlas des Éclats** (lot 2) | 3 | 1 | 3 | 3 | 1 | 2 | **17** |
| 5 | **2. La chronique** (lot 1) | 3 | 1 | 1 | 2 | 2 | 2 | **15** |
| 6 | **II. Le Guet de nuit** (lot 2) | 1 | 1 | 1 | 3 | 1 | 1 | **10** |

*L'écart entre les rangs 3 et 4 tient au risque de promesse (voir fiches).*

Pour mémoire, **l'accueil A initial** (préféré par Gregory) est un cousin simplifié de « La cité vivante » : même scène de cité, sélecteur de paliers de l'Hôtel de ville (niveaux 1-3, 4-6, 7-9), trois promesses, monde brisé, jalons. Il est solide mais générique ; **l'accueil B** (chronique de la Rupture, veine centrale, ancêtre de la chronique du lot 1) est plus épique mais ses deux premières images sont des emplacements Midjourney non produits.

### Fiche 1. La Cité en coupe (lot 2, III)

*Le site se lit comme une coupe verticale de la cité : le ciel des Sphères, les tours (Institut arcanique, Tour de guet, Portail des Sphères), les remparts (Donjon, Atelier, Académie, unités), la place (Hôtel de ville, Forge, Hôpital, Ambassade, Atelier des automates), les champs, la mine, puis les Straumar à −120 « toises ». Une jauge d'altitude latérale suit le défilement.*

- **Ce qui marche.** C'est le seul accueil qui montre **le contenu réel du GDD** : bâtiments par nom, unités par nom, quatre ressources, et la hiérarchie logique de la cité (la magie en haut, la roche et le mana en bas). Mettre les Straumar sous la cité est exact : ce sont des lignes telluriques mises à nu par la Rupture. La métaphore de profondeur est un vrai fil de lecture (on descend vers le secret) et reprend la structure du lore, de la surface vers le Gouffre.
- **Boucle honnête.** Chaque strate porte un argument du jeu (héros sur la place, défi sur les remparts, chapitres dans les tours), la Place hébergeant l'Hôtel de ville, qui est bien le centre de la progression dans le GDD.
- **Évolution.** Chaque chapitre peut ajouter ou renommer une strate (un étage « Gouffre » en bas pour le chapitre où le peuple englouti apparaît). C'est le plus extensible.
- **Faiblesses.** Très long ; dépend de beaucoup d'images (les placeholders MJ-A1... doivent exister) ; la « toise » est un faux repère (inventé, sans équivalent dans le jeu) ; la hiérarchie « tours = chapitres » via le Portail des Sphères est une erreur de lore (section 5).
- **Hybride proposé.** À garder tel quel pour le corps de la page.

### Fiche 2. La cité vivante (lot 1, 1)

*Scène plein cadre de la cité, une rangée de 10 vignettes de paliers (Hameau à Cité des Sphères) et un bouton « Voir la cité grandir » qui anime la montée. Puis trois piliers, un sélecteur de bâtiments à trois paliers, un monde brisé, une bannière d'inscription, les jalons.*

- **Ce qui marche.** La progression des paliers est **l'argument visuel le plus fort du projet** (la direction de design le dit déjà : l'obélisque ne bouge pas, la ville grandit autour). Un joueur de stratégie reconnaît tout de suite le code (Travian, Rise of Kingdoms : voir sa base évoluer). Le bouton « grandir » est la meilleure petite interaction des six accueils : un seul geste, aucune explication.
- **Cohérence UI.** C'est ce qui ressemble le plus à Mix v5 (scène plein cadre, panneaux de verre, violet et or).
- **Faiblesses.** Les trois piliers du milieu restent génériques ; le Portail des Sphères illustre « un monde neuf à chaque chapitre » (contresens de lore) ; **les noms des paliers s'affichent alors que le brief demande de ne pas les annoncer** ; l'ouverture reste un pur panneau de verre sur une image, assez proche d'un site SaaS fantasy.
- **Hybride.** À garder pour l'ouverture, avec le sélecteur de bâtiments.

### Fiche 3. La table du royaume (lot 1, 3)

*Le site mime l'interface : barre de ressources avec pastilles, anneau de prestige, bandeau d'alerte, trois panneaux autour du titre (héros gouverneur, titre, « mouvements du royaume » avec files de construction), puis un bento « conseil de la cité » (bâtiments, héros, chapitres, défi, ressources, univers, jalons).*

- **Ce qui marche.** Il dit la **boucle courte** (ressources, files, héros, alerte) plus honnêtement que tous les autres, et il est cohérent avec le canvas de mockups.
- **Le danger.** C'est exactement le piège que le dossier de références nomme : la publicité qui montre autre chose que le jeu (Evony, sanctionné par l'ASA en 2024). Un faux HUD sur un site de présentation est exactement ça tant que l'interface réelle n'existe pas. Il tient seulement si chaque panneau est étiqueté « maquette de l'interface » et si aucune valeur chiffrée n'est présentée comme réelle. L'anneau de prestige et le bandeau d'alerte sont des éléments que le brief demande de ne pas présenter publiquement (prestige non annoncé).
- **Faiblesses.** Prestige exposé ; bento qui répète les arguments sans les incarner ; aucune émotion de monde.
- **Hybride.** Reprendre uniquement le bento « Mouvements du royaume » comme version courte de la file de construction, dans la partie jalons.

### Fiche 4. L'Atlas des Éclats (lot 2, I)

*Carte du monde en roue : huit Régions autour du Gouffre, Éclats cliquables, point doré pulsant à la périphérie (« votre » départ), légende, puis un transect « du bord du monde au Gouffre » en cinq panneaux (terres anciennes, marches, terres disputées, Contrées instables, Gouffre).*

- **Ce qui marche.** C'est **le plus fidèle au lore cartographique** : huit secteurs sœurs, gradient de danger à l'intérieur de chaque Région, départ en bordure, Gouffre au centre. Une carte du monde est aussi un code puissant du genre (Rise of Kingdoms, Call of Dragons, Total War). Le transect est une très belle idée : un joueur comprend en vingt secondes pourquoi on avance vers le danger pour du meilleur butin.
- **Le danger.** Le lore précise que *l'interface demeure en listes (façon Ogame), pas une carte visuelle parcourable.* Montrer une carte interactive comme première chose promet une fonction qui n'existe pas. Elle appelle aussi une **identité par Région** (survol, couleur) alors que le lore décide qu'elles sont sans identité culturelle propre. Enfin le point doré « vous » ment : la position de départ est tirée au sort à l'inscription.
- **Verdict.** À remonter au rang 3 si la carte devient clairement un « atlas du monde » (illustration) et non une fonctionnalité de jeu ; sinon, sa place est dans la page Univers, pas sur l'accueil.

### Fiche 5. La chronique (lot 1, 2)

*Un « KALENDRATH » géant en dégradé or-violet, une table des matières en six chapitres numérotés (Les Straumar, Kaelhelm, La Rupture, Le réveil des hordes, Votre cité, Le prochain chapitre), un rail sticky à gauche, un réseau de Straumar sur canvas.*

- **Ce qui marche.** Le meilleur traitement du lore : la frise (−5000 AR, −2200 AR, an 0, an 3000 PR) est exacte, la table des matières donne un côté « livre de campagne » à la Warcraft. Le chapitre VI « à écrire » est une jolie façon d'annoncer les chapitres-serveurs.
- **Faiblesses.** Ce n'est pas un accueil, c'est la page Univers. Un joueur qui cherche « est-ce un jeu pour moi ? » doit descendre cinq chapitres de lore avant de voir sa cité. Seul l'avant-dernier chapitre parle du jeu.
- **Hybride.** À déplacer tel quel sur la page Univers ; en reprendre la table des matières comme navigation du lore.

### Fiche 6. Le Guet de nuit (lot 2, II)

*Panorama de la cité de nuit, une lanterne qui suit la souris et révèle l'image, quatre runes à survoler (obélisque, feu sur la crête, porte, fleuve), puis une jauge horaire de 22 h à l'aube sur laquelle défilent les arguments.*

- **Ce qui marche.** C'est l'interaction la plus mémorable des six, et la jauge horaire a une vraie idée narrative.
- **Pourquoi je le classe dernier.** (1) Il **vend la mauvaise boucle** : « Cette nuit, c'est vous qui veillez » + « la porte tient » + « un feu sur la crête » évoque un jeu de défense de forteresse ou de survie, alors que Kalendrath est de la gestion d'empire asynchrone. (2) Il **contredit son propre pitch** : « qu'aucun autre joueur ne viendra raser dans votre sommeil » face à un guetteur qui ne dort pas. (3) Le « fleuve » qui mène à d'autres Éclats est un contresens géographique (des Éclats sont des fragments isolés, il n'y a pas de fleuve qui les relie). (4) Tout repose sur le survol : inutilisable sur mobile et au clavier.
- **Ce qu'on récupère.** L'idée d'une heure qui change avec le scroll, et la lanterne comme interaction de découverte (idée S6 plus bas).

---

## 4. Les sept logos

*Test fait sur rendus SVG à 16, 32, 64 et 128 px, fonds sombre et clair. Critères d'identité d'un jeu : écran de chargement, icône d'application (Gregory vise Android et iOS), blason d'alliance, bannière de serveur, évolution par chapitre.*

| Rang | Piste | Écran de chargement | Icône d'app / favicon | Blason d'alliance | Bannière de serveur | Chapitres |
|---|---|---|---|---|---|---|
| 1 | **K-obélisque** | bon | **excellent** | moyen | moyen | moyen |
| 2 | **Gonfanon** | bon | faible | **excellent** | **excellent** | bon |
| 3 | **Rupture** | bon | faible | moyen | moyen | **excellent** |
| 4 | **La Taille** | **excellent** (titre) | moyen (le A) | faible | bon | moyen |
| 5 | **Sceau brisé** | moyen | faible | bon | **excellent** | **excellent** |
| 6 | **Monolithe** | moyen | bon | faible | faible | faible |
| 7 | **L-obélisque** | moyen | faible | faible | moyen | faible |

### K-obélisque (rang 1)
Seul symbole qui se lit à 16 px : le K est reconnaissable dès le premier rendu et la pointe d'obélisque lui donne une signature. C'est une vraie icône d'app et un vrai favicon. **Réserve de game designer** : sur le rendu, la haste claire (obélisque) et les deux lames dorées donnent un monogramme propre mais « marque de luxe ou fintech » ; il manque l'événement fondateur. Poppins en lettrage est neutre : un jeu fantasy n'a pas de police « startup ».

### Gonfanon (rang 2)
Le plus « jeu » des sept : c'est un **objet de l'univers**, pas un pictogramme. Le contre-chargé (obélisque coupé en deux couleurs par la veine) tient le lore de la Rupture dans un blason. Il se décline en bannière d'alliance, en étendard de serveur, en fond de profil. C'est le logo qui ressemble à ce que les joueurs de Total War, Warcraft ou Rise of Kingdoms attendent d'une faction. **Faiblesse** : illisible à 16 px et fragile sur fond sombre.

### La Rupture (rang 3)
Le plus **propriétaire** : un obélisque fendu avec une veine violette, personne d'autre n'a ça, et il est le cœur du lore. Mais à 16 px la faille devient du bruit, et un jeu qui s'ouvre sur un « objet cassé » peut se lire comme une promesse de bug. À garder comme **motif**, pas comme logo principal.

### La Taille (rang 4)
Le rendu surprend en bien : le lettrage anguleux, avec une barre de mana à la place de la traverse des A, ressemble aux titres de Warcraft ou de Total War et passe très bien comme **logotype d'écran de titre**. Mais il n'y a pas de symbole, et le A seul fait une icône générique (le « Λ »). Dessiner les courbes demande un typographe, et c'est plus lourd que l'ambiance « nuit arcanique » du reste.

### Sceau brisé (rang 5)
Excellent **cachet** : e-mails, avatars, jalons de chapitre, écran de chargement. Le favicon doit s'en passer (le texte en arc meurt sous 64 px). Mais attention à l'« AN 3000 PR » : voir section 5.

### Monolithe (rang 6) et L-obélisque (rang 7)
Le Monolithe est le plus attendu et ressemble au Washington Monument : un obélisque doré sur un socle, qui dit « fondation ». Le L-obélisque est une jolie astuce, mais l'écran de chargement et l'icône n'en tirent rien et on lit « KAIENDRATH ». Cinzel est aussi la police du Gladiator-fantasy de tous les sites de jeu : elle ne distingue pas.

### Cohérence avec le canvas
Le canvas est en verre dépoli, violet et or, police Outfit. Un logo en **aplats or sur nuit** (K-obélisque, Monolithe, Gonfanon, Rupture) s'y intègre sans retouche. Le Sceau est le plus « ancien » face à Mix v5, ce que la lecture critique de l'artefact note déjà.

---

## 5. Erreurs de lore et de promesse à corriger

| # | Où | Problème | Correction proposée |
|---|---|---|---|
| E1 | Accroche de tous les accueils : « qu'aucun autre joueur ne viendra raser dans votre sommeil » | Faux dans les deux sens depuis les décisions du 2026-10-30 : guerres d'alliances dès le chapitre 1, tous les membres d'une alliance à bannière attaquables, pertes de ressources et de troupes acceptées, **mais jamais de destruction de cité ni de bâtiments**. « Raser » est faux dans le sens inverse, et « dans votre sommeil » promet une protection que seul le bouclier donne | « ... et faites grandir un empire qui ne tombera pas parce que vous dormez. » ou « Un empire que vous choisissez de défendre, jamais que vous perdez en une nuit. » À valider avec l'étude PvP (R13) |
| E2 | « Un héros gouverne votre cité » | Le GDD (révision du 2026-10-11) a supprimé le gouverneur par ville : **un héros principal pour tout l'empire, plus jusqu'à 4 conseillers** | « Un héros mène votre empire, quatre conseillers l'entourent. » (« Un héros gouverne votre empire. ») |
| E3 | Lot 1 P1 : « Palier 1 · Hameau » et les dix noms de paliers | Le brief demande de ne pas annoncer les noms avant décision | Numéroter les paliers sans nom, ou lever la réserve consciemment |
| E4 | Lot 1 P1 et lot 2 III : le Portail des Sphères illustre « un monde neuf à chaque chapitre » | Contresens : le Portail est un bâtiment d'endgame (déplacement entre cités du joueur), **pas un dispositif de Kaelhelm**, et il naît de l'étude des obélisques. Il n'a rien à voir avec les serveurs | Illustrer les chapitres par une frise ou une bannière de chapitre, et garder le Portail pour « votre cité ouverte sur les Sphères » |
| E5 | Lot 2 I (Atlas) : carte cliquable, « votre » point doré | Le lore dit que l'interface reste en listes, que les Régions sont sans identité culturelle, que le départ est aléatoire | Présenter la carte comme un atlas illustratif (« le monde, vu d'en haut »), sans Éclat sélectionnable ni point « vous » |
| E6 | Lot 2 II (Guet) : « Le fleuve ... d'autres Éclats » | Les Éclats sont des fragments isolés, un fleuve ne les relie pas | « Au loin, d'autres Éclats, d'autres cités. » |
| E7 | Lot 2 II : « L'obélisque ... vous protège depuis toujours » | L'obélisque est un artefact hérité de Kaelhelm, original dans la capitale, imité dans les colonies | « ... l'obélisque hérité de Kaelhelm veille sur votre cité » |
| E8 | Sceau brisé « AN 3000 PR » | Si le chapitre 2 devient « AN 3001 PR », on promet un calendrier narratif qui n'existe pas. Les chapitres sont des serveurs, pas des années | Numérotation par chapitre (« CHAPITRE I ») ; l'année reste dans le lore |
| E9 | Lot 1 P3 : prestige, alerte globale dans le HUD | Le prestige n'est pas présenté publiquement selon le plan marketing | Retirer l'anneau de prestige du HUD de démonstration |
| E10 | « Un projet fait en public » comme pilier de jeu (lot 2) | Ce n'est pas une promesse de jeu mais de projet : mélanger ne dessert pas, mais sur la carte « ce qui vous attend » cela remplace le PvP absent | À garder sur une bande dédiée, pas parmi les piliers |
| E11 | « 20 bâtiments » (lot 1 P3) | CLAUDE.md et les briefs parlent de 19 bâtiments plus l'Hôtel de ville : vérifier l'arithmétique avant d'afficher un chiffre | Écrire « 20 bâtiments » seulement si l'Hôtel de ville est compté, sinon corriger |
| E12 | Lot 1 P3 : « Kaelite » comme « rareté » à côté des quatre ressources | Exact, mais la Kaelite est aussi la monnaie boutique (parrainage, packs). Présentée seule comme « il faut aller la chercher », cela cache la dimension payante | À nuancer avant la page Soutenir |
| E13 | Pas d'erreur de révélation | Aucun des accueils ne dévoile le twist du peuple englouti ni les Aspects Vahrun : bon. Garde-fou à conserver | |

Précision de lore bénéfique à ajouter : la page Univers ne doit jamais dire que nains et elfes sont jouables (aucune des maquettes ne le fait).

---

## 6. Hybrides proposés

### Accueil : « La cité vivante qui descend »
1. **Ouverture** : scène plein cadre de la cité (lot 1 P1), rangée des 10 paliers **sans noms**, bouton « Voir la cité grandir ». Titre, accroche corrigée (E1, E2), un seul formulaire.
2. **Moment de jeu** : une des idées S1 ou S2 ci-dessous, juste sous l'ouverture.
3. **Corps** : la coupe de la cité (lot 2 III), simplifiée à quatre strates (tours/remparts/place/mine) + une strate finale « les Straumar » qui sert de lore (Kaelhelm, Rupture) en trois phrases. La jauge d'altitude est remplacée par la jauge de paliers de l'Hôtel de ville (cohérence avec l'ouverture).
4. **Bande « chapitres »** : frise de la chronique (lot 1 P2) réduite à trois jalons : *Les Straumar, La Rupture, Aujourd'hui*, avec « Chapitre I » comme dernier.
5. **Fin** : jalons + mot de l'auteur + formulaire.

Ce que l'on garde de chaque proposition : la progression (P1), la profondeur (coupe), la frise (chronique), le transect danger (Atlas), la lanterne (Guet).

### Accueil alternatif, plus économe
Cité vivante + un seul panneau Atlas en illustration (le transect du bord du monde jusqu'au Gouffre) comme explication du risque, sans carte interactive.

---

## 7. Idées neuves pour le site (avant-goût du jeu)

Toutes respectent la règle « ce que vous voyez est le jeu » : chacune est étiquetée « aperçu » si elle ne reflète pas encore le moteur, et n'utilise que des chiffres du simulateur de theorycrafting.

**S1. « Envoyer le héros » : un rapport de mission en cinq secondes.**
Le visiteur choisit un archétype parmi six (Guerrier, Sorcier, Rôdeur, Gardien de la Foi, Explorateur, Intendant), clique « Envoyer en mission », attend cinq secondes (une barre de temps comme la vraie), et reçoit un **rapport de retour** rédigé dans la voix du jeu (butin, un incident, une phrase de PNJ). C'est la boucle courte du GDD condensée : envoyer, attendre, lire. Chaque archétype a trois rapports possibles. **Pourquoi ça marche** : la lecture de rapports est le geste quotidien du genre, et c'est un contenu partageable.

**S2. La file de construction comme feuille de route.**
Les neuf jalons publics sont présentés comme une **file de construction** (Hôtel de ville niveau 3 sur 9) avec une barre de progression qui avance vraiment avec le projet. Le visiteur clique un jalon pour voir « ce qu'il débloque » comme on clique un bâtiment dans le jeu. C'est la leçon la plus honnête : le site est une cité en chantier, à l'image du projet. Aucune date, donc compatible avec le brief.

**S3. Le test du premier héros.**
Un test de trois questions (« Une brèche dans le rempart : vous tenez la porte, vous la fermez avec la magie, vous partez chercher du renfort ? ») qui oriente vers un archétype et affiche une carte partageable. Le GDD dit que le choix du premier héros est « la décision la plus structurante du joueur » et qu'il faut « des explications claires au moment du choix » : ce test est le prototype de cette explication. Retombées : partage Reddit et Discord.

**S4. Le dilemme du Serment Rompu.**
Une scène de 60 secondes : vous êtes un nain du Serment Rompu, la veille de la Conjonction. Trois choix (persuader les elfes, saboter, fuir). Quel que soit le choix, la scène se termine sur la Rupture, puis sur « Trois mille ans plus tard ». Elle enseigne le lore par la tragédie (on ne peut pas empêcher la Rupture) et respecte le twist : rien n'est dit du peuple englouti.

**S5. Une cité qui s'allume selon l'heure du visiteur.**
Le crépuscule de la scène change selon l'heure locale (lanternes allumées le soir, brume le matin). Au retour, une petite ligne : « Votre cité a tenu pendant que vous dormiez. » C'est la promesse du pitch transformée en geste, et l'héritage honnête du Guet de nuit sans son contresens (la cité tient pendant le sommeil, le visiteur ne veille pas).

**S6. La lanterne qui révèle l'Éclat.**
Reprise de la lanterne du Guet, appliquée au transect de l'Atlas : on promène une lueur le long de la coupe et elle révèle ce qui vit dans chaque strate (champs, hordes, gardiens du Gouffre). Utile pour les Contrées instables : le danger se découvre au lieu de se lire. À réserver au bureau, avec un équivalent tactile (appui long).

**S7. Registre des préinscrits, blason à l'appui.**
À l'inscription par e-mail, le visiteur reçoit un blason généré (champ divisé, obélisque en pièce principale, couleurs tirées de son adresse) et un numéro de « registre ». C'est cosmétique, sans promesse de bonus en jeu, et prépare le **blason d'alliance** (le Gonfanon). Attention : étiquette « souvenir de préinscription », pas de lien avec la position de départ.

**S8 (bonus, produit). Bande-annonce « Ken Burns ».**
Trente secondes avec les images validées (cités, bâtiments, unités), un titre par plan (« Trois mille ans après... »), musique libre de droits, sans image de gameplay. Un joueur de stratégie veut voir un cinématique avant de s'inscrire.

---

## 8. Idées neuves pour le logo

**L1. Un K « fendu » issu de la Rupture.**
Dessiner le K-obélisque avec la branche haute **décalée vers le haut**, comme dans la piste Rupture, et la veine de mana qui court dans la fente. Le logo garde la lisibilité du K à 16 px (la faille est un décalage large, pas un trait fin) et récupère l'événement fondateur. Variante monochrome : la fente est du vide.

**L2. Le logo qui vit avec les chapitres.**
La marque de base ne bouge pas, mais chaque chapitre ajoute un détail : un nombre en chiffres romains dans la veine, une couleur de veine différente, ou un éclat qui se détache davantage de la pierre. Les bannières de serveur deviennent « collectionnables » (chapitre I, II...), sans changer l'icône d'app. C'est le même principe que les emblèmes de saison des jeux de stratégie, appliqué proprement.

**L3. La roue des huit Régions.**
Un emblème circulaire de **huit secteurs autour d'un vide central** (le Gouffre), avec l'obélisque dans l'un des secteurs ou à l'extérieur. C'est le symbole du monde (les huit Régions sont sœurs, le Gouffre au centre), parfait comme **sceau de serveur** ou fond de bannière, et il ne ressemble à aucun logo de jeu. En version alliance, la roue est découpée en huit pièces coloriables : le joueur compose son blason.

**Bonus L4. Icône d'app.**
Carré arrondi nuit (#2A2250), K-obélisque doré, pointe qui dépasse légèrement du cadre (comme l'étincelle du Monolithe), pour que l'icône ne se confonde pas avec les monogrammes de la boutique d'applications.

---

## 9. Hybrides de logo

1. **K-obélisque + Gonfanon** : le K-obélisque comme pièce du gonfanon (au lieu de l'obélisque seul) donne le **blason par défaut** du jeu, et la même forme, rognée sur le K, sert d'icône d'app. Un seul langage visuel pour la marque, l'alliance et la bannière de serveur.
2. **Taille + K-obélisque** : le titre sur écran de chargement en lettrage taillé (La Taille), dont le **K initial est remplacé par le K-obélisque**. Le logotype de titre est dessiné par un typographe, mais la marque reste lisible partout.
3. **Sceau brisé + roue** : le cachet de chapitre reprend la roue à huit secteurs (L3) à la place du texte en arc, ce qui règle le problème de lisibilité à petite taille du Sceau.

---

## 10. Tableau final des décisions suggérées

| Sujet | Recommandation |
|---|---|
| Accueil à retenir | Hybride cité vivante + cité en coupe, avec S1 ou S2 |
| Accueil à écarter | Guet de nuit (garder S5 et S6) |
| À déplacer ailleurs | La chronique devient la page Univers ; l'Atlas devient une illustration de la page Univers |
| Logo principal | K-obélisque, avec test du K fendu (L1) |
| Système héraldique | Gonfanon pour les alliances et serveurs |
| Cachet de chapitre | Sceau brisé, avec numérotation par chapitre (E8) |
| Corrections de texte avant publication | E1 à E4 obligatoires ; E5 à E8 si les pages concernées sont retenues |
| À créer | Une bande-annonce courte (S8) |

---

## 11. Points ouverts pour Gregory

1. Valider la formule de remplacement de « raser dans votre sommeil » (E1) avec l'étude PvP.
2. Décider si les noms des 10 paliers deviennent publics (E3) : ils sont forts visuellement et aident le joueur à projeter sa progression.
3. Accepter ou non un faux HUD « maquette » (table du royaume) : mon avis est non tant que l'interface n'existe pas.
4. Budget d'un typographe pour le lettrage taillé, ou rester sur K-obélisque + Cinzel ou une police plus distinctive.
5. Source des chiffres des idées S1 et S2 : le simulateur de theorycrafting (`tools/theorycrafting/model.js`), pas des valeurs inventées.
