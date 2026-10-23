# Le PvE dans les jeux de stratégie persistants

*Mission thématique du comparatif élargi (2026-10-23). Question : quelles formes prend le PvE dans le genre, ce qu'il rapporte, s'il peut porter seul un jeu, et comment une seule personne peut l'alimenter pendant 2 ans. Confronté au GDD (2, 3, 5.4, 5.6, 5.8, 5.9). Les décisions qui en sortent vont dans le [GDD](../game-design-document.md), pas ici.*

**Limite de cette passe.** La recherche web a été coupée en cours de route : le quota de recherches de la session, partagé entre tous les agents, a été épuisé. Les fiches Lords Mobile, Total Battle, Kingdom Guard, Rise of Empires, Last War et Travian (brigands) n'ont donc pas pu être recoupées. Ce qui est dit d'elles vient de sources secondaires, ou n'a pas été trouvé, et c'est indiqué. Les wikis Fandom (Forge of Empires, Lords Mobile, Total Battle, Elvenar) ont refusé l'accès (erreur 402 ou SSL).

## 1. Résumé en 5 lignes

1. Partout dans le genre, le PvE est le **moteur quotidien** (barbares, camps, expéditions, boss d'alliance), mais chez les gros succès mobiles (Rise of Kingdoms, Call of Dragons, Whiteout Survival) il **alimente** le PvP : il fournit accélérateurs, expérience de héros et buffs utilisés ensuite en guerre.
2. Il existe des jeux persistants rentables sans PvP subi : **Elvenar** (aucune compétition directe, plus de 200 M€ en 10 ans, 40 % des joueurs mensuels présents depuis plus de 5 ans) et **Forge of Empires** (PvP léger, défense automatique, plus d'1 Md$).
3. Mais ils gagnent environ **un ordre de grandeur de moins** que les 4X compétitifs : Whiteout Survival a fait environ 1,5 Md$ sur la seule année 2025. Le PvP et les classements entre alliances sont cités comme moteur des grosses dépenses (sources de qualité moyenne).
4. Tenir dans la durée avec peu de monde passe par des **gabarits paramétrés** plutôt que du contenu écrit à la main : table de tirage des expéditions d'OGame, 55 « épreuves » de Forge of Empires posées sur les 5 mêmes cartes, barbares de niveaux 1 à N et events qui n'en changent que les récompenses, boss d'alliance qui revient toutes les 47,5 h.
5. Le GDD a la bonne architecture (cibles fixes, expéditions, boss à seuils, score cumulé), mais il lui manque **trois choses** : une montée en difficulté contre la puissance qui grimpe, un substitut de compétition pour les gros payeurs, et un calendrier d'events bâti sur des gabarits.

## 2. Typologie des formes de PvE

| Forme | Exemples | Place dans la boucle | Ce qui le rend rejouable | Ce qu'il rapporte | Remplace ou complète le PvP |
|---|---|---|---|---|---|
| **Monstres de carte en libre accès** (barbares, monstres, camps) | Rise of Kingdoms (barbares 1-12 près de la ville, plus forts ailleurs), Lords Mobile (monstres), Total Battle | Courte : dépense des points d'action plusieurs fois par jour | Réapparition, niveaux croissants, events qui changent les récompenses | Accélérateurs, gemmes, ressources, expérience de héros | Complète : prépare l'armée et les héros au PvP |
| **Forts ou nids à rallier** | Forts barbares (RoK), Dark Nests (Lords Mobile), forts Darkling (Call of Dragons) | Moyenne : demande des alliés en ligne | Paliers de difficulté (forts 1-3 pour un débutant, 4-6 plus tard) | Matériaux rares (livres de covenant pour le château, RoK), cadeaux d'alliance | Complète, et crée du lien d'alliance |
| **Boss d'alliance périodique** | Bear Hunt (Whiteout, toutes les 47,5 h, fenêtre de 30 min), Béhémoths (Call of Dragons, raid toutes les 48 h) | Moyenne : rendez-vous fixe | Même boss, récompense indexée sur les dégâts infligés | Récompenses par palier de dégâts ; buffs d'alliance (Béhémoths) | Bear Hunt : PvE pur. Béhémoths : **PvE disputé**, les alliances se battent pour l'antre |
| **Expéditions à tirage** | OGame / OGameX | Courte à moyenne : on envoie, on revient des heures plus tard | Hasard pur sur une table pondérée | Ressources, vaisseaux, matière noire (monnaie premium) | Complète, mais c'est le **moteur du joueur gratuit** sur OGame |
| **Expédition de guilde à étapes** | Guild Expeditions de Forge of Empires (hebdomadaire, 6 jours) | Moyenne : tentatives qui se rechargent à l'heure | 5 cartes de difficulté, et depuis 2025 une « épreuve » choisie parmi 55 | Récompenses individuelles, puissance de guilde, championnat (première guilde à tout finir) | Remplace en partie : c'est la compétition de guilde **sans attaque** |
| **Boss coopératif en petit groupe** | Ceroli Crisis (RoK, 3 joueurs, 5 boss, Facile à Enfer), Labyrinthe (Lords Mobile) | Ponctuelle (event) | Paliers de difficulté | Récompenses d'event | Complète |
| **Campagne ou étapes de héros** | Hero Stages (Lords Mobile), campagne de Warcraft Rumble, provinces d'Elvenar | Longue : progression linéaire | Peu : contenu écrit à la main, qui s'épuise | Héros, expérience, équipement | Remplace dans Elvenar ; complète ailleurs |
| **Overlay d'event sur un PvE existant** | Lohar's Trial (RoK) : les mêmes barbares donnent des colliers d'os (gemmes, accélérateurs) | Ponctuelle | Le calendrier lui-même | Récompenses doublées ou spéciales | Complète. Les joueurs **gardent** leurs points d'action pour l'event |
| **Mini-jeux et plateaux** | Kingdom Tycoon (Lords Mobile, dé sur un plateau) | Ponctuelle | Hasard | Ressources, objets | Ni l'un ni l'autre : divertissement |

### Fiches courtes

**OGame (expéditions).** Le seul PvE notable d'OGame, et la principale source de matière noire gratuite (cf. [comparatif existant](../references-jeux-du-genre.md)). Les poids du tirage sont dans notre propre code : `SettingsService` et la migration `2026_03_29_000000_fix_expedition_weight_redistribution.php`, qui dit reprendre les « pourcentages officiels d'OGame ». Ressources 35 %, rien 25 %, vaisseaux 17 %, retard 7,5 %, matière noire 7,5 %, retour accéléré 2,75 %, pirates 3 %, aliens 1,5 %, marchand 0,4 %, trou noir (perte de la flotte) 0,2 %. Chaque trouvaille est normale, rare ou exceptionnelle (89 / 10 / 1). La classe Discoverer divise par deux le risque de combat. *Vérifié dans le code ; conformité aux chiffres officiels d'OGame : probable (affirmé par le commentaire de la migration, pas recoupé).* Point clé : `ExpeditionMission::getOutcomeWeights()` lit ces poids en base « pour permettre la configuration d'events ». **Un event « expéditions fructueuses » est donc déjà paramétrable sans code.**

**Rise of Kingdoms.** Les barbares n'attaquent jamais le joueur. Ils rapportent accélérateurs, gemmes et expérience, et deviennent plus rentables après le château 25. Les forts barbares rapportent les livres nécessaires aux améliorations du château : le PvE est **sur le chemin critique** de la progression. Lohar's Trial ne crée aucun contenu nouveau : il pose une récompense spéciale sur les barbares existants. Ceroli Crisis : boss à 3 joueurs, 5 niveaux de difficulté. Le moteur de fond reste le KvK (royaume contre royaume) ; la source consultée conseille même de farmer les barbares de haut niveau « pendant le KvK », où ils rapportent plus. *Probable (un seul site de guides).*

**Call of Dragons.** Forts Darkling et armées d'Eliana : leur destruction déclenche des **cadeaux d'alliance**, au même titre que les achats en boutique d'un membre. Le PvE d'un joueur gratuit et l'argent d'un payeur alimentent le même coffre. Béhémoths : raid toutes les 48 h. La première purification donne de grosses récompenses à toute l'alliance (Ours géant : 400 gemmes, une téléportation, environ 4 h d'accélérateurs, 500 k d'or et de bois). Mais l'alliance qui purifie et tient l'antre 4 h prend le contrôle : **le PvE sert de prétexte à un affrontement d'alliances**. *Probable (cod.guide, site de fans).*

**Whiteout Survival.** Bear Hunt : un boss d'alliance invocable toutes les 47,5 h, 30 minutes pour le battre, récompenses selon les dégâts, et chaque joueur peut y revenir un jour sur deux. Le contenu est strictement identique d'une fois à l'autre ; seule la puissance des joueurs change. *Probable (wiki de fans).* Le jeu est cité comme l'exemple de la « casualisation » des 4X. Mais ses gros payeurs dépensent dans la compétition entre alliances et entre États (VIP, équipement) *(incertain : Udonis, page de statistiques qui cite AppMagic, sans détail)*.

**Forge of Empires.** Les combats se jouent surtout contre l'ordinateur ; la défense est automatique, on n'a pas besoin d'être connecté quand on est attaqué ; le PvP prend la forme de tournois « en plus ». Guild Expeditions : hebdomadaire, du mardi au dimanche, 1 tentative par heure, 8 au maximum. En janvier 2025, InnoGames l'a jugée « statique, sans marge pour augmenter la difficulté », parce que les bonus d'attaque et de défense des joueurs ne cessent de grimper. Réponse : les **épreuves** (55, choisies chaque semaine, chacune débloquant les suivantes). Elles font monter les bonus ennemis, les coûts de négociation et les récompenses **sur les mêmes 5 cartes**. *Vérifié (page officielle InnoGames + wiki).* Un joueur met en moyenne **1 548 jours (4,2 ans)** à traverser les ères (InnoGames, 2019). *Vérifié, source officielle.*

**Elvenar.** Pas de compétition directe : on bâtit sa ville et on combat ou négocie contre l'IA dans des provinces. Le PDG d'InnoGames le présente comme un jeu pour ceux qui veulent « réaliser leur ville idéale à leur rythme, sans être dérangés par les autres » ; la communauté dit qu'il « ne met pas l'accent sur la compétition ». *Vérifié (communiqué relayé par GamesMarket).* Chiffres détaillés en section 3.

**Lords Mobile.** Hero Stages (campagne de héros), Dark Nests, Labyrinthe, monstres de carte (qui font gagner des récompenses aux membres de la guilde), Kingdom Tycoon. Le PvP reste central (KvK, Colisée, Merveilles). Une critique (GameZebo) juge le grind éprouvant et voit dans le mode héros PvE « l'élément qui rachète le jeu ». *Probable (Wikipédia).*

**Age of Empires Mobile.** Lancé en octobre 2024 ; environ 56,4 M$ d'achats en 2025 (AppMagic, via Wikipédia). Forme de son PvE : **non trouvé** dans cette passe.

**Total Battle, Kingdom Guard, Rise of Empires, Last War, brigands de Travian** : **non vérifiés dans cette passe** (accès refusé ou quota de recherche épuisé). À reprendre.

## 3. Les jeux vendus comme PvE ou « PvP optionnel », et ce que ça a donné

| Jeu | Positionnement | Résultat | Fiabilité |
|---|---|---|---|
| **Elvenar** (InnoGames, 2015) | Aucune compétition directe, ville et provinces contre l'IA | 200 M€ cumulés en 10 ans ; 240 000 joueurs mensuels en 2025 ; **40 % d'entre eux jouent depuis plus de 5 ans** ; 26,2 M de joueurs au total ; équipe de 23 personnes en 2025 (environ 40 en 2020). Nouveau chapitre et events en continu, mises à jour toutes les deux semaines | Vérifié (InnoGames via PocketGamer.biz et GamesMarket) |
| **Forge of Empires** (InnoGames, 2012) | PvE dominant, PvP de voisinage et de guilde léger, défense automatique | 500 M€ en 2019, dont la moitié sur les 2 années précédentes ; plus d'1 Md$ en 2023 ; plus de 130 M d'inscrits | Vérifié |
| **Warcraft Rumble** (Blizzard, 2023) | Campagne solo mise en avant, coop et PvP à côté (stratégie mobile, pas un 4X) | Fin du développement de nouveau contenu le 2 juillet 2025, équipe en grande partie licenciée. Revenus : non trouvé ; motifs officiels : non trouvés | Vérifié (fait) ; motif non trouvé |
| **Tendance « casual » des 4X** (AppMagic × MY.GAMES, 2024) | Un des 7 signes relevés : « moins d'accent sur le PvP et punition minimisée des attaques par d'autres joueurs » | Signal de marché, pas une mesure de rentabilité | Probable |

**Ce que ça dit.** Le PvE-first n'est pas un positionnement perdant : Elvenar en est la preuve la plus proche de Kalendrath (fantasy, ville, pas de PvP subi, navigateur puis mobile). Il produit une **fidélité exceptionnelle** (40 % de vétérans de plus de 5 ans), ce qui colle à un jeu pensé sur 2 ans et plus. Mais il ne produit pas de croissance explosive. Et même Elvenar tourne avec plus de 20 personnes et un nouveau contenu toutes les deux semaines.

**Contradiction à signaler.** Le comparatif existant met Forge of Empires dans les candidats à « progression longue sans PvP imposé ». C'est juste pour le joueur (il ne perd rien de grave à une attaque), mais Forge of Empires a bien du PvP : pillage du voisinage, tournois, et des combats de guildes (Guild Battlegrounds, GvG) que cette passe n'a pas pu documenter. Son modèle est « PvP sans conséquence », pas « sans PvP ». Elvenar est le seul vrai « sans PvP » trouvé.

## 4. Le PvE vend-il moins bien que le PvP ?

**Réponse courte : oui, d'environ un ordre de grandeur au sommet du marché. Mais la comparaison pertinente pour Kalendrath n'est pas celle-là.**

- **Écart de revenus.** Whiteout Survival : environ 1,49 Md$ en 2025 seulement, 3,4 Md$ cumulés en 3 ans *(probable : AppMagic via Udonis ; Sensor Tower donne d'autres chiffres, mais du même ordre)*. Elvenar : 200 M€ en 10 ans, soit environ 20 M€ par an en moyenne *(calcul à partir d'une source vérifiée)*. Forge of Empires, le plus gros revenu d'InnoGames, faisait environ 125 M€ par an vers 2017-2019 *(calcul à partir d'une source vérifiée)*.
- **Ce qui pousse les gros payeurs.** Les sources disponibles (glossaires, pages de statistiques, critiques) disent toutes que les « baleines », 2 à 5 % des payeurs pour 50 à 80 % du revenu selon les sources, dépensent pour **se classer** en PvP et entre alliances. *Incertain : aucune étude rigoureuse trouvée, sources de fournisseurs et de blogs ; les fourchettes se contredisent (50-70 % contre environ 80 %).*
- **Mais le PvE est déjà le moteur du PvP chez les leaders.** Dans Call of Dragons, les forts Darkling remplissent le même coffre d'alliance que les achats. Dans Rise of Kingdoms, les forts barbares sont sur le chemin critique du château. Le PvE fait **consommer** (points d'action, accélérateurs, soins) ; le PvP fait **dépenser gros**.
- **Ce qui manque pour conclure.** Aucune donnée publique de revenu par joueur actif d'Elvenar n'a été trouvée. Avec 240 000 joueurs mensuels et environ 20 M€ par an, on obtiendrait environ 80 € par joueur mensuel et par an, mais ce calcul mélange une moyenne sur 10 ans et un instantané de 2025 : **à ne pas reprendre comme un chiffre**. Whiteout Survival donne environ 365 $ de revenu par joueur mensuel sur sa durée de vie *(incertain, Udonis)*.

**Pour Kalendrath.** À une personne, avec un plafond d'avance payante de +30 %, le jeu ne vise de toute façon pas l'économie des baleines. Le vrai concurrent est le modèle Elvenar : une petite communauté fidèle, une dépense régulière et modérée (season pass, packs d'event, confort). Le PvE-first est cohérent avec le plafond de +30 % : les deux tirent dans le même sens et se renforcent comme argument. Il ne faut simplement pas fixer d'objectifs de revenus calqués sur Last War ou Call of Dragons.

## 5. Alimenter 2 ans de PvE avec une seule personne au contenu

Ce que font les jeux qui durent, ramené à un savoir-faire :

1. **Une table de tirage paramétrée** (expéditions d'OGame). Un même gabarit, des poids et des récompenses changés en base pour un event. Déjà en place dans OGameX (`expedition_weight_*`), réglable depuis le panneau d'administration (`ServerSettingsController`).
2. **Des paliers de difficulté empilés sur le même contenu** (épreuves de Forge of Empires). 5 cartes, 55 épreuves : l'ennemi grossit avec le joueur. Forge of Empires a dû l'ajouter après coup, parce que la montée en puissance des joueurs rendait l'ancien contenu trivial.
3. **Un overlay de récompense sur un PvE existant** (Lohar's Trial). Aucun nouveau monstre : une semaine où les camps donnent un objet d'event. Le joueur apprend à garder ses ressources pour ce moment (cf. leçon 6 du comparatif existant).
4. **Un boss à rendez-vous fixe dont seule la récompense évolue** (Bear Hunt). Un seul contenu, joué 180 fois par an.
5. **Des outils de live ops entre les mains du designer** (Elvenar). « L'essentiel du travail sur les events peut être fait par nos game designers », avec des outils existants pour régler quêtes, récompenses et ventes. C'est ce qui permet à 23 personnes de tenir un rythme de deux semaines.

**Traduction pour Kalendrath : contenu = gabarit × paramètres × habillage narratif.**

- **Gabarits** (code, une fois) : camp hostile à niveau (5.8A), expédition à table de tirage (5.8B), boss à seuils (5.9), score cumulé (5.9), overlay de récompense, quête narrée à étapes.
- **Paramètres** (données, sans code) : niveau, composition de garnison, poids de tirage, seuils, table de récompenses, durée, fenêtre de calendrier.
- **Habillage** (texte et image) : nom de l'ennemi, PNJ, chapitre du lore (la Rupture, les gardiens du Gouffre), illustration. C'est la seule partie qui coûte du temps de création à chaque event, et elle se réutilise : une faction peut porter plusieurs events.
- **Génération procédurale** là où elle est naturelle : camps tirés sur les Éclats non colonisés avec un niveau fonction de la Contrée, ce que le GDD prévoit déjà. **Ne pas** la mettre dans la narration : les quêtes PNJ écrites restent rares et de grande valeur, au rythme d'un chapitre.

Sur le « stock d'environ 1 an de contenu avant l'ouverture » : avec cette méthode, il s'agit d'environ **six gabarits et d'un calendrier** de 52 semaines qui les combine, plus une dizaine d'habillages de factions. C'est réaliste. Un an d'events écrits un par un ne l'est pas pour une personne : Elvenar et Forge of Empires sortent un contenu toutes les deux semaines avec 20 à 40 personnes.

## 6. Confrontation au GDD

| Point du GDD | Ce que montre le genre | Verdict |
|---|---|---|
| **Mode Paix par défaut, PvP réciproque et volontaire** (2, 5.4) | Elvenar prouve qu'un jeu sans PvP subi tient 10 ans. La casualisation des 4X va dans ce sens | Conforté |
| **Cibles fixes scoutables, régénérées, danger croissant par Contrée** (5.8A) | Identique aux barbares de RoK et aux camps de Call of Dragons, qui sont le cœur de la boucle quotidienne | Conforté. **Manque** : une échelle de niveaux qui suit la puissance (leçon de Forge of Empires) et une limite par jour (points d'action ou équivalent) |
| **Expéditions héritées d'OGame** (5.8B) | Poids paramétrables déjà présents ; 25 % de résultats « rien » | Conforté. À surveiller : 1 expédition sur 4 qui ne rapporte rien, c'est une frustration acceptée sur OGame mais peut-être pas pour un public plus large. Le butin du héros Explorateur peut la réduire |
| **Boss à seuils, non disputé** (5.9) | Bear Hunt (non disputé) et Béhémoths (disputés) marchent tous les deux. Les Béhémoths donnent aux alliances une **raison de se battre** | Cohérent avec le pilier coopératif, mais il prive le jeu du moteur de dépense des Béhémoths. Piste : rendre une version disputée accessible **uniquement** aux alliances en Mode de Guerre |
| **Score cumulé entre alliances** (5.9) | C'est le championnat des Guild Expeditions de Forge of Empires : de la compétition sans attaque | Conforté, et c'est **le meilleur substitut de PvP** pour les joueurs qui veulent se mesurer |
| **Rythme du boss à seuils « mensuel ? »** (5.9, [TBD]) | Les boss d'alliance du genre reviennent toutes les 48 h (Whiteout, Call of Dragons) | Un rythme mensuel est très en dessous de la norme. Prévoir **deux étages** : un boss récurrent léger (tous les 2 à 3 jours) et un boss narratif rare (mensuel ou par chapitre) |
| **Jauge de Prestige avec malus en cas d'échec** (5.6) | Aucun équivalent trouvé : dans le genre, rater un PvE coûte des troupes, jamais un malus de production | Non conforté, ni contredit. Mécanique originale, donc sans retour d'expérience : à tester tôt en alpha |
| **Quêtes hebdomadaires narrées par un PNJ** (3) | Le contenu écrit à la main est ce qui s'épuise le plus vite (campagnes) | Coûteux pour une personne. Le rythme hebdomadaire est à revoir : quête narrée par chapitre, events hebdomadaires à gabarits |
| **Cadeaux d'alliance déclenchés par les exploits PvE** (comparatif existant, leçon 5) | Exactement le système de Call of Dragons (forts Darkling + achats → même coffre) | Conforté |

## 7. Leçons pour Kalendrath

1. **Le PvE-first est viable, mais à l'échelle d'Elvenar, pas de Last War.** Un jeu sans PvP subi garde ses joueurs (40 % de vétérans de plus de 5 ans), mais il gagne environ dix fois moins que les 4X compétitifs. → *Question ouverte du format de serveur* : un serveur unique et persistant convient mieux à ce profil fidèle que des serveurs courts. *Décision du +30 %* : cohérente avec ce positionnement ; c'est un argument de vente, pas une perte, tant que les objectifs de revenus restent modestes.

2. **Il faut un substitut de compétition pour ceux qui veulent dépenser pour gagner.** Dans le genre, les grosses dépenses viennent du classement. Sans PvP subi, ce rôle revient aux **classements PvE** : score cumulé entre alliances, première alliance à vaincre un boss (championnat de Forge of Empires), classement de saison. → *Format hybride avec saisons* : les saisons de 8 à 12 semaines proposées dans le comparatif existant trouvent ici leur contenu, avec un classement PvE remis à zéro à chaque saison. Le Mode de Guerre seul ne suffira pas à porter la dépense si peu de joueurs l'activent.

3. **Le contenu PvE doit grimper avec la puissance des joueurs, dès la conception.** Forge of Empires a dû ajouter 55 épreuves en 2025 parce que son contenu était devenu trivial. → *Cible des 2 ans et des grades d'unités* : les camps, les boss et les expéditions ont besoin d'une échelle de niveaux qui couvre toute la durée. Sinon la phase de stagnation (Citadelle → Métropole, J84 à J683) n'a plus de PvE qui résiste.

4. **Un an de contenu avant l'ouverture, oui, mais en gabarits.** Six gabarits paramétrés plus un calendrier de 52 semaines, pas 52 events écrits. La table des expéditions d'OGameX est déjà réglable en base : c'est le premier event gratuit à exploiter. → *Décision « stock d'un an de contenu »* : faisable seulement sous cette forme. Une équipe comme Elvenar (23 personnes) sort un contenu toutes les deux semaines ; une personne ne peut pas écrire au même rythme.

5. **Le rythme du boss d'alliance est trop lent dans le GDD.** La norme est un boss toutes les 48 h ; le GDD évoque « mensuel ». → *Rattrapage des retardataires* : un boss récurrent dont la récompense dépend des dégâts infligés profite à tous, nouveaux venus compris, sans contenu à part. C'est un outil d'intégration qui ne coûte rien.

6. **Le PvE doit être sur le chemin critique, pas à côté.** Dans RoK, les forts barbares donnent les livres nécessaires au château. Si le PvE de Kalendrath ne rapporte que du bonus, les joueurs le négligeront pendant les murs. → *Paliers de cité et Hôtel de ville de 25 à 30 niveaux* : réserver aux camps et aux expéditions un matériau de prérequis (par exemple pour les niveaux élevés de l'Hôtel de ville ou pour la forge), à passer par le simulateur.

## 8. À reprendre lors d'une prochaine passe

- [ ] Fiches non vérifiées : Total Battle (cryptes, citadelles, coffres de clan), Kingdom Guard, Rise of Empires, Last War (zombies, events d'alliance), brigands et Natars de Travian, Age of Empires Mobile (forme du PvE).
- [ ] PvP de Forge of Empires (Guild Battlegrounds, GvG) : quelle part des joueurs y participe.
- [ ] Revenu par joueur actif d'Elvenar ou de Forge of Empires : aucune donnée publique trouvée.
- [ ] Un 4X qui a tenté le PvE-first et échoué : seul Warcraft Rumble a été trouvé, et ce n'est pas un 4X.

## 9. Sources

| Source | Contenu | Fiabilité |
|---|---|---|
| Code OGameX : `app/GameMissions/ExpeditionMission.php`, `app/Services/SettingsService.php`, `database/migrations/2026_03_29_000000_fix_expedition_weight_redistribution.php` | Poids des expéditions, variantes 89/10/1, configuration en base pour les events | Vérifié (code) ; conformité à OGame officiel : probable |
| https://newsroom.innogames.com/forge-of-empires-reaches-eur-500m-lifetime-revenue-milestone | FoE : 500 M€ (juin 2019), plus de 250 M€ sur 2 ans, 1 548 jours en moyenne pour traverser les ères, mises à jour toutes les deux semaines | Vérifié (officiel) |
| https://newsroom.innogames.com/strong-evergreen-ips-enable-innogames-to-reach-eur-2-billion-in-lifetime-revenues | FoE plus d'1 Md€, InnoGames 2 Md€ | Vérifié (officiel) |
| https://www.pocketgamer.biz/the-mobile-games-that-have-made-more-than-1-billion-in-lifetime-sales-update/ | FoE au-delà d'1 Md$ en 2023 | Vérifié (concorde avec Wikipédia) |
| https://en.wikipedia.org/wiki/Forge_of_Empires | Combat contre l'IA et formats PvP, plus de 130 M d'inscrits | Probable |
| https://support.innogames.com/kb/ForgeOfEmpires/en_DK/4497 | Épreuves des Guild Expeditions : motif (contenu « statique »), fonctionnement | Vérifié (officiel) |
| https://support-admin.innogames.de/kb/ForgeOfEmpires/en_DK/4602?ls=1 et https://forgeofempires.fandom.com/wiki/Guild_Expeditions (via résumé de recherche, accès direct refusé) | Calendrier hebdomadaire, tentatives 1 par heure et 8 au maximum, 55 épreuves. Contradiction : 3 ou 8 épreuves débloquées au départ selon la date | Probable |
| https://www.gamestar.de/artikel/forge-of-empires-kostenlos-durch-die-epochen,3006035,seite2.html | FoE : défense automatique, attaques pour piller ou marquer des points de tournoi | Probable |
| https://www.gamesmarket.global/games-and-products/euro200-million-lifetime-revenue-innogames-celebrates-long-term-success-of-elvenar-b44f326b3d94f62a6c5832a0677cce4f | Elvenar : 200 M€, 240 000 joueurs mensuels, 40 % de plus de 5 ans, citations sur l'absence de compétition | Vérifié (communiqué) |
| https://www.pocketgamer.biz/a-decade-of-elvenar-200-million-in-revenue-and-still-growing/ | Elvenar : équipe de 23 personnes, events construits par les game designers avec des outils existants, refus du pay-to-win | Vérifié |
| https://www.pocketgamer.biz/interview/73911/live-and-kicking-elvenar-five-years/ | Elvenar (2020) : 100 M€, environ 40 personnes, contenu toutes les deux semaines | Vérifié |
| https://en.wikipedia.org/wiki/Warcraft_Rumble | Fin du développement de contenu le 2 juillet 2025 | Vérifié (fait) |
| https://en.wikipedia.org/wiki/Lords_Mobile | Formes de PvE et de PvP, critique GameZebo | Probable |
| https://en.wikipedia.org/wiki/Age_of_Empires_Mobile | Lancement oct. 2024, environ 56,4 M$ en 2025 (AppMagic) | Probable |
| https://cod.guide/behemoths/ | Béhémoths : raid toutes les 48 h, contrôle de l'antre, récompenses | Probable (site de fans) |
| https://cod.guide/giant-bear/ et https://cod.guide/hydra/ (via résumé de recherche) | Récompenses de première purification | Probable |
| https://cod.guide/alliance/ | Cadeaux d'alliance déclenchés par achats, forts Darkling, armées d'Eliana | Probable (site de fans) |
| https://www.whiteoutsurvival.wiki/events/bear-hunt/ | Bear Hunt : 47,5 h, fenêtre de 30 min, récompenses selon les dégâts | Probable (wiki de fans) |
| https://riseofkingdomsguides.com/rise-of-kingdoms-barbarians-and-barbarian-forts/ | Barbares, forts, livres de covenant, rallies | Probable (site de guides) |
| https://riseofkingdomsguides.com/lohars-trial-event/ et https://riseofkingdomsguides.com/rise-of-kingdoms-ceroli-crisis-guide/ (via résumé de recherche) | Lohar's Trial, Ceroli Crisis | Probable |
| https://gamedevreports.substack.com/p/appmagic-and-mygames-4x-strategies | 7 signes de casualisation dont la baisse du PvP ; 4X : 5,8 Md$ en 2023 | Probable |
| https://mobidictum.com/mobile-games-report-4x-strategy-monetization/ | 4X : 6,8 Md$ en 2024, 3,9 Md$ au S1 2025, concentration du top 5 | Probable |
| https://www.blog.udonis.co/statistics/whiteout-survival | Whiteout : environ 3,4 Md$ cumulés, 1,49 Md$ en 2025, moteurs de dépense ; chiffres de joueurs quotidiens contradictoires dans la page | Incertain (agrégateur citant AppMagic) |
| https://gamedevreports.substack.com/p/sensor-tower-whiteout-survival-is et https://technode.com/2024/03/14/whiteout-survival-achieves-500-million-revenue-within-one-year-of-release/ | Whiteout : 500 M$ en un an, approche « casual » | Probable |
| https://mwm.ai/glossary/whale et https://orcz.com/kingshot-review-a-crown-polished-for-whales/ | Concentration des dépenses sur les baleines, lien avec le PvP | Incertain |
