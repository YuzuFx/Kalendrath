# Vérification du comparatif des 4 jeux (OGame, Travian Kingdoms, Last War, Call of Dragons)

*Rédigé le 2026-10-23. Ce document vérifie les chiffres de [references-jeux-du-genre.md](../references-jeux-du-genre.md), qui viennent d'une synthèse Gemini non vérifiée. Il ne modifie pas ce document : les corrections à reporter sont listées en fin de fichier.*

**Limite de la vérification.** Le quota de recherches web de la session (200 recherches, partagé entre tous les agents) a été épuisé pendant le travail. La suite s'est faite par lecture directe de pages connues. Plusieurs sources clés étaient inaccessibles : les wikis Fandom (OGame, Last War) renvoyaient une erreur 402, cod.guide une erreur 500 sur la moitié des pages, le wiki Binary-Tools (Travian Kingdoms) une erreur de certificat. **OGame est donc le jeu le moins bien vérifié.** Aucun fil Reddit n'a pu être lu.

**Légende.** ✅ confirmé · ✏️ à corriger · ❓ introuvable. Fiabilité des sources : *vérifié* (source officielle ou plusieurs sources concordantes), *probable* (une source sérieuse), *incertain* (commentaire, forum isolé, estimation).

## 1. Résumé en 5 lignes

1. **Last War** : saisons de 8 semaines ✅, mais le cycle complet dure 14 à 15 semaines (2 semaines de pré-saison, 8 de saison, environ 5 d'intersaison). Le QG ne s'arrête plus à 30 : il monte à **35** depuis l'« Âge du pétrole » ✏️. Les niveaux 21 à 30 du QG demandent à eux seuls ~187 jours de chantier cumulés.
2. **Call of Dragons** : les records T5 (380 et 567 jours) et le Hall 25 en 9 à 12 mois ne sont **pas trouvés** dans les sources. Seule source : « près d'un an pour maxer les dernières technologies ». Les saisons ont varié de ~5 mois (saison 1) à 40-50 jours. Ce qui se remet à zéro a **beaucoup changé** : les niveaux de héros et d'artefacts ne sont plus remis à zéro ✏️.
3. **Travian** : un monde Kingdoms finit quand la première Merveille atteint le niveau 100 (officiel), et les Merveilles ouvrent vers le jour 111 en ×1. Les « 5 à 6 mois » restent *probables*, pas démontrés. Travian Legends est plus long : Merveilles verrouillées jusqu'au jour 130, plans au jour 180, soit environ 8 à 9 mois au total.
4. **Files de construction** : on paie partout pour la 2e file. Travian Kingdoms vend jusqu'à 3 emplacements de file (50, 75 et 100 or) ; Last War vend le 2e ouvrier 200 lingots d'or ; Call of Dragons le vend 5 000 gemmes. OGame n'a qu'un chantier à la fois par planète, avec une file d'attente de 5 ordres. Cela conforte la décision « 2e ouvrier en monnaie virtuelle ».
5. **OGame** : « 3 à 5 ans pour un gratuit » est ❓ introuvable. Aucune source chiffrée sur le temps de fin d'un joueur gratuit en ×1.

## 2. Vérification cellule par cellule du tableau

### OGame (×1)

| Cellule | Valeur du comparatif | Verdict | Détail et source |
|---|---|---|---|
| Format | Univers persistant, sans fin | ✅ *probable* | Wikipédia ne mentionne aucune fin d'univers ; les univers sont composés de galaxies, systèmes et emplacements. Pas de source officielle sur une fermeture programmée. [W-OG] |
| Bâtiment central | Aucun (planètes et mines) | ✅ *probable* | Wikipédia décrit une économie de planètes, sans bâtiment pivot. Cohérent avec le code d'OGameX, qui reproduit OGame. [W-OG] |
| Début 0-6 mois / milieu 6 mois-2 ans | — | ❓ | Aucune source chiffrée trouvée. |
| Fin pour un gratuit | 3 à 5 ans et plus | ❓ | Introuvable. Une estimation de forum serait au mieux *incertaine*. À retirer, ou à marquer « estimation de Gregory ». |
| Moteur du gratuit | Expéditions (ressources et monnaie premium) | ✅ *probable* | Wikipédia : la matière noire s'obtient en petite quantité par les expéditions, ou s'achète. [W-OG] |
| Place du gratuit | Top 50-100, pas le top 10 | ❓ | Introuvable. |
| Poids du paiement | Fort au sommet (ressources, chantiers instantanés) | ✅ *probable* | Matière noire utilisée pour les officiers et le marchand [W-OG]. OGameX reproduit la réduction de chantier : 750 MN par tranche de 30 minutes restantes, 50 % du temps au plus, avec un plafond de 48 h (bâtiments) ou 72 h (recherches) par usage [OGX]. |
| **File de construction** | (absente du tableau) | Ajout | Un seul chantier à la fois par planète ; une file d'attente de 5 ordres au plus (1 en cours + 4 en attente) dans OGameX [OGX]. Le Commandant ajoute des outils de gestion et d'automatisation [W-OG]. Prix des officiers : ❓ (wiki Fandom inaccessible). Les colonies multiplient les chantiers parallèles : c'est le vrai « 2e ouvrier » d'OGame. |

### Travian Kingdoms (×1)

| Cellule | Valeur du comparatif | Verdict | Détail et source |
|---|---|---|---|
| Format | Serveur à fin programmée (5 à 6 mois) | ✏️ à nuancer, *probable* | La fin n'est **pas datée** : un monde se termine quand la première Merveille atteint le niveau 100, et le vainqueur est le royaume qui a le plus de points de victoire [TK-END][TK-VP]. Selon le support, un monde reste actif « plusieurs mois » [TK-TRUCE]. Le marketing de Travian parle de mondes « de quelques semaines à six mois » (*probable*, vu en extrait de recherche). Les villages Merveille ouvrent vers le jour 111 en ×1 (wiki Binary-Tools, ancien, *incertain*). Recoupements datés : le monde « Dynasty » en ×2 a ouvert le 20/02/2024 et activé ses Merveilles le 26/04/2024, soit vers le jour 66 ([TK-DYN], *vérifié*). « Halloween Hunt 2026 » en ×5 les ouvre au jour 25 ([TK-HH], *vérifié*). **5 à 6 mois en ×1 est plausible, mais aucune source ne donne une date de fin moyenne.** |
| Bâtiment central | Aucun pivot unique | ✅ *probable* | Non contredit. Le pivot du jeu est le royaume et la Merveille, pas un bâtiment. |
| Début S1-4 / milieu M2-4, 10 à 20 villages | — | ❓ | Le nombre de villages n'est pas trouvé. |
| Fin pour un gratuit | Mois 5 et 6, Merveille niveau 100 en royaume | ✅ partiel | Fin par Merveille 100 : confirmé [TK-END]. Sept villages Merveille par monde, cachés jusqu'à l'endgame [TK-END]. Les Natars attaquent une Merveille tous les 5 niveaux, puis à chaque niveau de 95 à 100 (Binary-Tools, *incertain*). |
| Moteur du gratuit | Brigands, enchères converties en or, rôle de défenseur | ✏️ partiel | Sources officielles d'or gratuit : jeu de cartes (récompenses aléatoires, dont or et argent), offres gratuites et vidéos de la boutique VIP, **bureau de change argent → or** [TK-GOLD]. Le lien entre enchères et or passe par l'argent : cohérent, mais le taux de change n'est pas trouvé. Brigands : non vérifié. |
| Place du gratuit | Indispensable au collectif, faible en solo | ❓ | Pas de source. Le support affirme que l'or « ne donne aucun avantage exclusif » [TK-GOLD] : c'est une affirmation de l'éditeur, pas une mesure. |
| Poids du paiement | Fort en solo, faible face au collectif | ❓ | Qualitatif, non vérifiable. Voir la boutique ci-dessous. |
| **File de construction** | (absente) | Ajout, *vérifié* | Les emplacements de file se débloquent contre de l'or : **50, 75 et 100 or** pour les 1er, 2e et 3e emplacements supplémentaires, actifs pour tout le reste du round et pour tous les villages [TK-INST][TK-QUEUE]. La file est ordonnée : le 3e emplacement ne démarre pas tant que le 2e attend des ressources. Les **Romains** ont un emplacement de bâtiment et un emplacement de champ séparés [TK-QUEUE]. Les chantiers de moins de 5 minutes se terminent gratuitement [TK-QUEUE]. |

### Last War: Survival

| Cellule | Valeur du comparatif | Verdict | Détail et source |
|---|---|---|---|
| Format | Serveur persistant, saisons d'environ 8 semaines | ✅ et à compléter, *vérifié* (sources de fans concordantes) | Saison de 8 semaines (saisons 5 et 6 [CH-S5][CH-S6]), précédée d'une pré-saison de 2 semaines (saison 1 [LWT-PRE]), suivie d'une intersaison (« Celebration ») d'environ 5 semaines (saison 5 [LWT-S5C]). **Le cycle complet dure donc environ 14 à 15 semaines, soit 3,5 mois.** La saison 1 commencerait après le jour 120 du serveur (commentaire, *incertain* [LWT-S1]). Transferts entre serveurs une fois par saison, en semaine 8 [CH-TR]. |
| Ce que la saison remet à zéro | (sous-entendu) | Ajout, *vérifié* | Sont supprimés : les bâtiments de saison (et leur bonus de puissance), les compétences de profession saisonnières (points remboursés), les missions et events de saison. Les ressources saisonnières restantes sont converties en XP de Profession [CH-CONV][LWT-S1E]. **Le QG, les bâtiments permanents, les héros et les troupes ne sont pas remis à zéro** : aucune source ne mentionne leur remise à zéro, et les armes exclusives de héros, les médailles et les compétences non saisonnières sont conservées [LWT-S1E]. |
| Bâtiment central | QG 1 à 30, tout en dépend | ✏️ **QG 1 à 35** | Les niveaux 31 à 35 s'ouvrent avec l'arbre « Âge du pétrole » (intersaison de la saison 2) et la recherche « HQ Expansion Lv1 » ; leur rythme dépend du pétrole [LWT-BLD]. |
| Début S1-3 (QG 1-15), chantiers de quelques heures | — | ❓ | Pas de table pour les niveaux 1 à 20. |
| Milieu M1-4 (QG 16-25), chantiers de plusieurs jours | — | ✅ partiel, *probable* | Temps moyens de chantier du QG, selon la recherche [LWT-BLD] : 21 → ~3,8 j ; 22 → ~5,5 j ; 23 → ~6,4 j ; 24 → ~8 j ; 25 → ~11,5 j ; 26 → ~15 j ; 27 → ~22 j ; 28 → ~30 j ; 29 → ~39 j ; 30 → ~46 j. Les niveaux 16 à 20 ne sont pas couverts. |
| Fin pour un gratuit | 6 à 9 mois (QG 30, troupes T10) | ❓ et *douteux* | Pas de source. Les seuls niveaux 21 à 30 cumulent ~187 jours de chantier sans accélérateur. Un QG 30 en 6 à 9 mois suppose donc un usage massif d'accélérateurs. Et le QG 30 n'est plus la fin (QG 35). T10 : ❓. |
| Moteur du gratuit | Cadeaux d'alliance des gros payeurs, calendrier d'events | ❓ | Non vérifié. Les diamants sont « faciles à obtenir gratuitement » selon un guide [CH-GB]. |
| Place / poids | Second rôle / très fort | ❓ | Qualitatif. |
| **File de construction** | (absente) | Ajout, *probable* | **2e ouvrier : 200 lingots d'or**, « l'un des meilleurs achats du jeu », à prendre tôt [CH-GB]. Un commentaire affirme qu'il n'y a pas de 2e ouvrier gratuit jusqu'à la saison 4 [LWT-BLD] (*incertain*). Le 2e centre technologique (deuxième file de recherche) coûte 1 000 lingots ; l'Âge du pétrole en offre un 3e gratuit [CH-GB]. Prix des lingots en euros : ❓. |

### Call of Dragons

| Cellule | Valeur du comparatif | Verdict | Détail et source |
|---|---|---|---|
| Format | Serveur persistant, saisons de 2 à 3 mois | ✏️ à nuancer | Lancement mondial le 28/03/2023 [PG-LAUNCH] ; la saison 2 commence le 1er/09/2023 [PG-S2]. La saison 1 des premiers serveurs a donc duré **environ 5 mois** (*probable*, calcul). Un patch plus récent fait passer la saison « Season of Strife » **de 50 à 40 jours** (patch 1.0.34.21, vu en extrait de recherche, *probable*). Les durées varient selon la saison : « 2 à 3 mois » n'est vrai que pour certaines. |
| Ce que la saison remet à zéro | Niveaux de héros, ressources, artefacts, politiques | ✏️ **dépassé** | **Au début** (saison 2, 2023) : remise à zéro complète du compte, alliances dissoutes, anciens équipiers retrouvables pendant 7 jours [UBER-S2][PG-S2]. **Aujourd'hui** (guide d'octobre 2026) : les niveaux, compétences et étoiles des héros sont **conservés**, ainsi que les niveaux d'artefacts, la poussière arcanique, les manuels tactiques, la ville, les bâtiments et les technologies permanentes. Restent saisonniers : les politiques, le territoire et les bâtiments d'alliance du serveur de saison, les objectifs et classements, les talents de saison ; les mérites suivent leur propre calendrier [HG-RESET]. Une note de patch évoquée en recherche indique que les héros sous le niveau 30 ne perdent rien (*incertain*). |
| Bâtiment central | Hall des Ordres 1 à 25 | ✅ partiel | Le Hall est la priorité de construction [CoD-UP][CoD-F2P] ; le Hall 25 est cité comme seuil des accélérateurs [CoD-F2P]. Le niveau maximal de 25 n'a pas été lu explicitement dans une source. |
| Début saison 1 (Hall 1-21) | Fluide | ❓ | Le Hall 21 débloque le camp de cavalerie [CoD-UP] ; on conseille de garder ses accélérateurs universels à partir du Hall 21 [CoD-T5]. |
| Milieu Hall 22-24 : « phase de stagnation » | — | ❓ | Durées des chantiers du Hall 20 à 25 introuvables (pages cod.guide en erreur). |
| Fin : Hall 25 vers 9 à 12 mois | — | ❓ | Introuvable. |
| **T5 : record à ~380 jours, 567 jours pour tous les types** | — | ❓ | **Aucune source trouvée** pour ces records. La seule donnée : il faut maxer presque toutes les technologies économiques et militaires et presque tous les bâtiments, et « maxer les dernières technologies prend près d'un an » ; ceux qui vont plus vite ont « probablement payé » [CoD-T5]. Cela ne contredit pas l'ordre de grandeur (un an et plus), mais 380 et 567 jours restent des données de Gregory, à sourcer (capture d'écran, classement de serveur). |
| Moteur du gratuit | Coffres d'alliance, Béhémoths, bonus d'alliance | ❓ | Non vérifié. Le guide gratuit conseille d'attendre 30 à 40 jours après le début de saison avant de récolter des gemmes [CoD-F2P]. |
| Place / poids | Rouage tactique / fort | ❓ | Qualitatif. |
| **File de construction** | (absente) | Ajout, *probable* | **2e ouvrier : 5 000 gemmes** [CoD-F2P]. La 2e file de **recherche** se débloque pour toujours au niveau 8 d'« Honorary Membership » (le VIP du jeu) [CoD-F2P][CoD-UP][CoD-T5]. |

## 3. Vérification des chiffres des 9 leçons

| Leçon | Chiffre ou affirmation | Verdict |
|---|---|---|
| 1 | Last War et Call of Dragons relancent toutes les 8 à 12 semaines | ✏️ Last War : saison de 8 semaines, mais cycle de **14 à 15 semaines** avec pré-saison et intersaison. Call of Dragons : de ~5 mois (S1) à 40 jours (Season of Strife). La fourchette « 8 à 12 semaines » est à remplacer par « de 6 à 20 semaines selon le jeu et la saison ». |
| 1 | Les saisons remettent à zéro une couche secondaire | ✅ Vrai aujourd'hui pour les deux jeux. ✏️ Call of Dragons a commencé par une remise à zéro bien plus large (héros, alliances), puis a reculé : c'est une leçon en soi (voir § 5). |
| 1 | Travian : serveur court qui recommence | ✅ (fin par Merveille 100). |
| 2 | QG de Last War à 30 niveaux | ✏️ **35 niveaux** aujourd'hui. |
| 2 | Hall de Call of Dragons à 25 niveaux | ✅ *probable* (non lu explicitement). |
| 3 | Hall 25 vers 9 à 12 mois ; T5 entre 1 et 2 ans | ❓ Hall 25 non trouvé. T5 : « près d'un an » pour les dernières technologies [CoD-T5], compatible avec 1 an et plus. |
| 4 | Mur au Hall 22-24 et au QG 16-25, chantiers de plusieurs jours | ✅ pour Last War à partir du QG 21 (3,8 à 11,5 jours entre les niveaux 21 et 25). ✏️ Le vrai mur de Last War est plutôt **QG 26-30** (15 à 46 jours par niveau). Call of Dragons : ❓. |
| 5 | Cadeaux d'alliance déclenchés par les achats | ❓ Non vérifié dans cette session. |
| 6 | Accélérateurs gardés pour les jours d'event | ✅ partiel : les guides de Call of Dragons conseillent de garder ses accélérateurs universels à partir du Hall 21 et de les réserver à la recherche et aux bâtiments de troupes [CoD-F2P][CoD-T5]. Le lien avec le calendrier d'events n'est pas sourcé. |
| 7 | Soins des troupes T5 très chers | ❓ |
| 8 | Flottes lentes sur OGame ×1 | ❓ Non vérifié (pas de source lue). Cohérent avec les formules de vol d'OGameX. |
| 9 | « Les quatre jeux laissent un gros payeur des mois ou des années devant » | ❓ Aucune mesure trouvée. Les prix de file suggèrent un écart moins brutal à Travian Kingdoms (250 or pour 3 emplacements sur tout le round) que dans les jeux mobiles. |

## 4. Compléments à la grille du cahier des charges

### Boutique et prix

| Jeu | Ce qui est vendu | Prix connus | Plafonds, durées |
|---|---|---|---|
| OGame | Matière noire → officiers, Commandant, marchand, réduction de chantier [W-OG] | Réduction : 750 MN par 30 min restantes, 50 % du temps au plus, plafond de 48 h (bâtiments) ou 72 h (recherches) [OGX] | Prix des officiers et de la MN en euros : ❓ |
| Travian Kingdoms | Travian Plus, bonus de production +25 % (bois, argile, fer ; céréales), « Great Deals » (paquet de démarrage, paquet d'endgame), fin immédiate, marchand PNJ, livraisons instantanées, emplacements de file [TK-GOLD][TK-INST] | Travian Plus 10 or pour 5 jours (vu en extrait) ; fin immédiate 1 or (< 120 min) ou 2 or (> 120 min) ; marchand PNJ 5 or ; file 50, 75 et 100 or ; répétition de livraison 50 puis 25 or [TK-INST] | Bonus de 3 ou 5 jours, renouvelables ; Great Deals valables tout le round, au prix ajusté sur la durée restante [TK-GOLD][TK-PLUS]. Fin immédiate interdite sur la Résidence, le Palais et la Merveille [TK-INST]. Prix de l'or en euros : ❓ |
| Last War | 2e ouvrier (200 lingots), paquet Kim (100), 2e centre technologique (1 000), héros Taylor via VIP (500 à 14 500 lingots), passe de combat de saison (2 000), passe hebdomadaire (500), packs du centre commercial (500) [CH-GB] | Prix en lingots seulement | Argent : 30 achats par mois au magasin de cristaux [CH-HOME]. Euros : ❓ |
| Call of Dragons | 2e ouvrier (5 000 gemmes), Honorary Membership, roue chanceuse, marchand gobelin, tirages d'artefacts de fin de saison [CoD-F2P] | Prix en gemmes seulement | La 1re recharge de chaque saison donne des gemmes doublées, remises à zéro à chaque saison [CoD-NEW]. Euros : ❓ |

### Rattrapage des retardataires

- **Last War** : *Transfer Surge* une fois par saison, en semaine 8, pendant 14 jours. Le transfert coûte 50 tickets ; on en gagne 3 gratuits par semaine au magasin d'alliance, ou on les achète (25 tickets pour 500 lingots, 50 pour 1 000). Les groupes de serveurs passent de 64 à 128 après la saison 4 ; la place obtenue dépend de la plus haute puissance atteinte [CH-TR][LWT-S5C]. Pour un retardataire, c'est plutôt un ascenseur vers un serveur adapté qu'un vrai rattrapage.
- **Travian Kingdoms** : le rattrapage passe par le nouveau monde. La protection du débutant dure 7 jours en ×1, 4 jours en ×3, 3 jours en ×5 (vu en extrait du support). L'or se transfère d'un monde à l'autre (page support « gold transfer between game worlds », non lue en détail).
- **Call of Dragons, OGame** : ❓ dans cette session.

### Motifs de départ et critiques

- **Call of Dragons** : le recul sur la remise à zéro des héros et des artefacts (2023 → 2026) [HG-RESET] montre que la remise à zéro saisonnière d'un acquis **coûteux** (héros, artefacts payés) a été mal reçue : l'éditeur l'a supprimée. *Probable* (on déduit le motif du changement, il n'est pas cité).
- Autres jeux : ❓. Aucun fil Reddit ni aucune revue n'a pu être lu après l'épuisement du quota.

### Trajectoire

- OGame : sorti le 3 octobre 2002 [W-OG]. Travian : 2004 ; « plus de 5 millions de joueurs sur plus de 300 serveurs » à son apogée [W-TR]. Call of Dragons : lancement mondial le 28 mars 2023, par Farlight Games [PG-LAUNCH]. Last War : ❓. Revenus : ❓ pour les quatre.

### Travian Legends, pour comparaison

- Merveilles verrouillées les **130 premiers jours** en ×1 ; plans de construction au **jour 180** ; ~45 jours de construction pour l'ensemble du dispositif de la Merveille en ×1. Équivalents : ×2 jours 65/90, ×3 jours 43/60, ×5 jours 26/36 [UT-WW] (*probable*).
- Wikipédia : l'endgame commence « après environ 200 jours » [W-TR]. Une critique de presse parle d'un serveur « d'une année entière », avec des artefacts au 5e mois [DS] : *incertain*, contredit les deux autres. **Synthèse : environ 8 à 9 mois en ×1, contre un format plus court pour Kingdoms.**

## 5. Leçons pour Kalendrath

1. **Le format saisonnier coûte plus de temps qu'on ne le croit** (question ouverte : format de serveur). Last War annonce 8 semaines, mais tourne en réalité sur des cycles de 14 à 15 semaines. Pour un projet tenu par une seule personne, cela fait 3 à 4 saisons par an à produire. Si l'option hybride est retenue, il faut chiffrer le stock d'events sur des cycles de 3,5 mois, pas de 2 mois.
2. **Ne pas remettre à zéro ce que le joueur a payé ou longuement construit.** Call of Dragons remettait à zéro les héros et les artefacts, puis il a reculé. Dans Kalendrath, la saison ne doit toucher ni au héros-gouverneur, ni à son équipement, ni à la cité. Seule une couche annexe (politiques, classement, ressources de saison converties à la fin, comme dans Last War) doit être saisonnière.
3. **Le 2e ouvrier payant est la norme du genre, et il est cher dans les jeux mobiles** (décision : 2e et 3e ouvrier en monnaie virtuelle). Les trois jeux à file achetable la vendent (Travian Kingdoms 50/75/100 or, Last War 200 lingots, Call of Dragons 5 000 gemmes), et les guides de fans la jugent « le meilleur achat du jeu ». Rendre la 2e file facile à obtenir en gratuit est donc **un vrai différenciateur**, pas un détail. Le modèle de Travian Kingdoms (un prix par emplacement, valable tout le round) est le plus proche de l'esprit « boutique plafonnée ».
4. **La courbe du bâtiment central de Last War valide la cible des 25 à 30 niveaux, mais avertit sur la fin** (décision : Hôtel de ville de 25 à 30 niveaux). Le passage du QG 25 au QG 30 prend 11,5 puis 46 jours de chantier par niveau : le mur est là. Last War a ensuite ajouté les niveaux 31 à 35 avec une nouvelle ressource. Ce genre de jeu prolonge son bâtiment central par extensions ; mieux vaut prévoir dès maintenant comment l'Hôtel de ville pourra s'étendre au-delà de son dernier niveau.
5. **Les « 2 ans pour un gratuit » ne sont étayés par aucune source fiable** (décision : fin de cité vers 2 ans). Le seul chiffre trouvé est « près d'un an » pour finir la recherche T5 de Call of Dragons. Les 3 à 5 ans d'OGame et les 9 à 12 mois du Hall 25 sont introuvables. La cible des 2 ans reste un choix de design, pas un standard du marché : il faut la justifier par le simulateur, pas par le comparatif.
6. **Le rattrapage du genre est une migration, pas une ligne temporelle accélérée** (question ouverte : rattrapage). Last War offre un transfert de serveur par saison, en partie payant ; Travian ouvre de nouveaux mondes. Aucune source trouvée ne décrit une « ligne temporelle accélérée où l'on rejoue les events passés » : si Kalendrath la fait, ce sera une nouveauté, à tester en alpha.

## 6. Corrections à reporter dans references-jeux-du-genre.md

- Last War, Format : « saisons de 8 semaines, cycle de 14 à 15 semaines avec pré-saison et intersaison ».
- Last War, Bâtiment central : « QG 1 à 35 (31-35 depuis l'Âge du pétrole) ».
- Call of Dragons, Format : retirer « niveaux de héros » et « artefacts » de la remise à zéro ; préciser que la durée des saisons varie (~5 mois pour la S1, 40 jours pour Season of Strife).
- Call of Dragons, Fin : marquer « 380 j / 567 j » comme données de Gregory, non sourcées ; « Hall 25 vers 9 à 12 mois » comme non vérifié.
- OGame, Fin : marquer « 3 à 5 ans » comme non vérifié.
- Travian Kingdoms, Format : « fin à la Merveille 100, Merveilles ouvertes vers le jour 111 en ×1 ; durée totale non publiée, 5 à 6 mois probable ».
- Ajouter une ligne « Files de construction » au tableau.
- Leçon 1 : remplacer « 8 à 12 semaines ».

## 7. Sources

| Réf. | URL | Fiabilité |
|---|---|---|
| W-OG | https://en.wikipedia.org/wiki/OGame | probable |
| OGX | Code d'OGameX : `app/Services/HalvingService.php`, `app/ViewModels/Queue/Abstracts/QueueListViewModel.php` (reproduction d'OGame, pas OGame lui-même) | probable |
| W-TR | https://en.wikipedia.org/wiki/Travian | probable |
| TK-END | https://support.kingdoms.com/en/articles/191-endgame-overview | vérifié (officiel) |
| TK-VP | https://support.kingdoms.com/en/articles/58-victory-points | vérifié (officiel) |
| TK-TRUCE | https://support.kingdoms.com/en/support/solutions/articles/7000082477-truce-peace- | vérifié (officiel, vu en extrait) |
| TK-QUEUE | https://support.kingdoms.com/en/articles/60-building-queue | vérifié (officiel) |
| TK-INST | https://support.kingdoms.com/en/articles/166-instant-gold-features | vérifié (officiel) |
| TK-GOLD | https://support.kingdoms.com/en/articles/162-gold-in-travian-kingdoms | vérifié (officiel) |
| TK-PLUS | https://support.kingdoms.com/en/articles/164-travian-plus | vérifié (officiel) |
| TK-DYN | https://blog.kingdoms.com/kingdoms-dynasty-game-world-details/ | vérifié (officiel) |
| TK-HH | https://blog.kingdoms.com/halloween-hunt-2026-is-coming/ | vérifié (officiel) |
| — | https://wiki.binary-tools.de/wiki/Wonder_of_the_World_(Kingdoms)/en (jour 111 en ×1, vu en extrait, page inaccessible) | incertain |
| UT-WW | https://unofficialtravian.com/2025/01/game-secrets-building-a-world-wonder-text-version/ | probable |
| DS | https://www.thedailystar.net/shout/game-review/news/slow-steady-and-fun-1829737 | incertain |
| CH-S5 | https://cpt-hedge.com/guides/season-5-ultimate-guide | probable |
| CH-S6 | https://cpt-hedge.com/guides/season-6-ultimate-guide | probable |
| CH-CONV | https://cpt-hedge.com/guides/season-end-resource-conversion | probable |
| CH-TR | https://cpt-hedge.com/guides/transfer-surge | probable |
| CH-GB | https://cpt-hedge.com/guides/gold-bricks-best-buys | probable |
| CH-HOME | https://cpt-hedge.com/ | probable |
| LWT-PRE | https://www.lastwartutorial.com/season-1-pre-season/ | probable |
| LWT-S1 | https://www.lastwartutorial.com/season-1-the-crimson-plague/ | probable (commentaires : incertain) |
| LWT-S1E | https://www.lastwartutorial.com/?p=3089 | probable |
| LWT-S5C | https://www.lastwartutorial.com/season-5-celebration/ | probable |
| LWT-BLD | https://www.lastwartutorial.com/buildings/ | probable (temps moyens d'un joueur) |
| CoD-T5 | https://cod.guide/tier-5/ | probable |
| CoD-F2P | https://cod.guide/free-to-play/ | probable |
| CoD-UP | https://cod.guide/upgrade-priority/ | probable |
| CoD-NEW | https://cod.guide/new-season-checklist/ | probable |
| HG-RESET | https://heaven-guardian.com/call-of-dragons-season-reset/ (07/10/2026) | probable |
| PG-LAUNCH | https://www.pocketgamer.com/call-of-dragons/launch-date-announcement/ | vérifié (presse) |
| PG-S2 | https://www.pocketgamer.com/call-of-dragons/season-2-live | vérifié (presse) |
| UBER-S2 | https://www.uberstrategist.com/press-releases/call-of-dragons-ushers-in-season-2-introducing-two-new-characters-updated-in-game-content-and-a-host-of-new-challenges | vérifié (communiqué) |
| — | Patch 1.0.34.21 de Call of Dragons, saison de 50 → 40 jours (vu en extrait sur apkmirror.com, page en erreur 403) | probable |

**À refaire avec un nouveau quota de recherche** : records T5 et temps du Hall 20-25 de Call of Dragons (Reddit, Discord), temps de fin d'un gratuit sur OGame ×1 et prix des officiers, durée moyenne d'un monde Travian Kingdoms ×1, prix en euros des monnaies, revenus (Sensor Tower, AppMagic) de Last War et Call of Dragons, critiques récurrentes et motifs de départ.
