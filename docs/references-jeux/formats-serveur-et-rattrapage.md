# Formats de serveur et mécaniques de rattrapage — étude transverse

*Fiche thématique du comparatif élargi, ouverte le 2026-10-23. Elle répond aux deux questions ouvertes du cahier des charges : quel format de serveur (unique sans fin, durée limitée, hybride à saisons) et comment rattraper les retardataires (dont l'idée de Gregory d'une ligne temporelle accélérée où l'on rejoue les events passés). Les décisions qui en sortent vont dans le [GDD](../game-design-document.md), pas ici.*

**Limite de la recherche.** Le budget de recherche web de la session a été épuisé en cours de travail (limite partagée entre agents). Plusieurs pistes n'ont donc pas pu être vérifiées : fusions d'univers OGame, d'Ikariam, d'Elvenar, de Lords Mobile, détail des saisons de Diablo IV et d'Albion. Elles sont signalées « non vérifié » ou « non trouvé ». Les faits sourcés sont marqués *vérifié*, *probable* ou *incertain*.

## 1. Résumé en 5 lignes

1. Le genre a trois formats : **monde persistant** (OGame, Tibia), **monde à fin programmée** (Travian ≈ 200 jours), et **socle persistant avec couche saisonnière** (Last War, Whiteout Survival, Rise of Kingdoms, Path of Exile, OSRS). Le troisième domine chez les jeux récents.
2. Les jeux mobiles 4X ne rattrapent pas le retardataire : ils **ouvrent un serveur neuf** et verrouillent le contenu par l'**âge du serveur** (Whiteout Survival : génération de héros 2 à J40, 3 à J120… 14 vers J1000). Ce modèle suppose des dizaines de milliers d'arrivées par mois. Kalendrath ne les aura pas.
3. Les **fusions** existent pour une seule raison : la densité de joueurs s'effondre (New World, Tibia). Elles font des perdants, et les promesses « jamais de fusion » finissent par tomber (New World).
4. L'idée de Gregory a des précédents partiels mais réels : un **monde « frais » temporaire qui se reverse dans le principal** (OSRS Fresh Start Worlds, 6 mois ; ligues de Path of Exile vers Standard), le **rejeu des épisodes passés** (Guild Wars 2, Living World), un **retard de calendrier qui se résorbe** (Arknights Global : 9 mois de retard sur la Chine, puis 6, puis des events simultanés en 2025) et les **bonus d'XP de rattrapage** (WoW Season of Discovery, jusqu'à +150 %).
5. **Recommandation** pour quelques centaines à quelques milliers de joueurs : **un seul monde persistant**, des saisons PvE de 8 à 12 semaines, et un rattrapage **individuel**, sans serveur séparé. Le retardataire rejoue les chapitres passés en version accélérée, instanciée, avec des récompenses réduites, et des multiplicateurs qui baissent à mesure qu'il approche de la médiane du monde. Pas de second serveur tant qu'un seul n'est pas plein.

## 2. Panorama des formats

| Jeu | Format | Durée ou cycle | Arrivée d'un retardataire | Fiabilité |
|---|---|---|---|---|
| **Travian Legends** | Monde à fin programmée (Merveille niveau 100) | Fin de partie « après environ 200 jours », puis nouveau monde | Il attend le monde suivant | *probable* (Wikipédia) |
| **Travian Kingdoms** | Monde à fin programmée | Durée non trouvée (« plusieurs mois » selon le support). Depuis juillet 2026 : **un monde local ×1 par communauté linguistique environ toutes les 20 semaines**, plus des mondes internationaux à vitesses variées | Il attend le monde suivant (au plus 20 semaines) | *vérifié* pour la cadence (blog officiel, 18 juin 2026) |
| **OGame** | Univers persistants, sans fin, plus des « univers spéciaux » à règles modifiées | Sans fin | Ouverture de nouveaux univers ; fusions possibles mais non documentées ici | *incertain* (Wikipédia, article signalé comme peu sourcé) |
| **Whiteout Survival** | « State » persistant, contenu verrouillé par l'âge du state | Calendrier de J0 à J1000 et au-delà | Conseil des guides : rejoindre un state jeune | *probable* (guides concordants, pas de source officielle) |
| **Last War** | Serveur persistant, pré-saison puis saisons | Saisons actives de 8 à 10 semaines selon les guides ; la durée de la pré-saison varie selon les sources (2 semaines, ou environ 120 jours) | Serveur neuf ; transfert une fois par saison dans un groupe de serveurs | *incertain* pour les durées (sources contradictoires), *probable* pour le transfert |
| **Rise of Kingdoms** | Royaume persistant, KvK saisonniers | Premier KvK vers 100 jours d'âge du royaume, le suivant 2 mois plus tard | Migration vers un royaume d'au moins 120 jours, Hôtel de ville 16 ou plus, 30 jours entre deux migrations | *probable* (guides) |
| **Path of Exile** | Ligue permanente (Standard) plus ligues de défi d'environ 3 mois | 3 mois | Tout le monde repart de zéro à chaque ligue ; à la fin, personnages et objets sont versés dans Standard | *probable* (wiki, forums) |
| **OSRS — Fresh Start Worlds** | 25 mondes séparés, comptes neufs uniquement | 19 octobre 2022 au 18 avril 2023 (6 mois) | Départ égal pour tous ; à la fin, comptes transférés dans le jeu principal avec leur progression | *vérifié* (wiki officiel OSRS, blog Jagex) |
| **WoW Classic, Season of Discovery** | Royaumes saisonniers par phases, plafond de niveau relevé à chaque phase | Phases successives (25, 40, 50, 60) | Bonus d'XP « Discoverer's Delight » pour les niveaux inférieurs à la phase en cours | *vérifié* (annonces Blizzard) |
| **New World** | Mondes persistants, plus des mondes « Fresh Start » | — | Fresh Start ; puis transferts payants vers les mondes historiques, et fusions | *probable* (Massively OP, FAQ officielle) |
| **Diablo IV, Albion Online** | Saisons sur socle persistant | Non vérifié (budget de recherche épuisé) | Non vérifié | — |

**Ce qui ressort.** Personne ne fait vivre un monde unique et sans fin **et** accueillant pour les retardataires sans couche saisonnière. OGame y parvient mal (cf. le comparatif principal). Travian a choisi l'inverse, des parties courtes. Et en juin 2026, Travian Kingdoms **réduit** le nombre de mondes locaux (un toutes les 20 semaines par langue) parce que les meilleures parties sont des « mondes actifs avec une forte compétition ». C'est un aveu : trop de mondes diluent la population.

## 3. Cadence d'ouverture et fusions

### Ouvrir des serveurs neufs

- **Mobile 4X.** Le modèle repose sur l'ouverture continue de serveurs : chaque nouveau joueur va sur un serveur jeune, à égalité. La cadence précise d'ouverture de Last War ou de Whiteout Survival est **non trouvée**. Les guides montrent seulement que les serveurs vont par « lots » décalés : la saison 6 de Last War commence le 13 avril 2026 sur le premier lot (*probable*).
- **Travian Kingdoms.** Un monde ×1 local toutes les 20 semaines par communauté linguistique, plus des mondes internationaux (*vérifié*). Le délai d'attente d'un nouveau venu tombe donc à 20 semaines au plus.
- **Ce que cela suppose.** Un serveur neuf n'a de sens que si assez de joueurs arrivent pour le remplir. Sur un serveur de Rise of Kingdoms, l'appariement des KvK se calcule sur la puissance des **1 000 premiers joueurs** du royaume (*probable*). C'est un ordre de grandeur de ce qu'un serveur « vivant » contient dans ce genre.

### Fusionner

- **Pourquoi.** New World a fusionné 17 serveurs en 8, puis 7 en 4, sur la base de la « concurrence moyenne, des personnages actifs, de la population par faction » (*probable*, Massively OP). Tibia fusionne pour réduire les mondes peu peuplés, parce que les mondes denses attirent encore plus de monde et que les autres se vident (*incertain*, résumé de recherche, page source inaccessible).
- **Effets.** Une fusion crée des perdants : homonymes, maisons ou territoires en double, classements écrasés, un ancien premier qui devient dixième. Ces effets sont souvent cités, mais **non sourcés ici**.
- **Les promesses ne tiennent pas.** La FAQ de lancement des mondes Fresh Start de New World affirmait : « nous ne fusionnerons jamais de monde Fresh Start dans un monde historique ». Amazon a ensuite ouvert les transferts sortants, payants par jeton de la boutique (*probable*). Leçon : ne jamais promettre ce qu'une baisse de population obligera à défaire.

### Migrer et transférer

- **Last War.** Le transfert (« Transfer Surge ») a lieu **une fois par saison**, sur 14 jours, à partir de la saison 2, et seulement à l'intérieur d'un groupe de 64 serveurs (128 après la saison 4). Il coûte 50 tickets, dont 3 gratuits par semaine ; le reste s'achète (25 tickets pour 500 « bricks »). Le président du serveur d'arrivée doit accepter, et le nombre de places dépend de la puissance du joueur. But affiché : contenir les écarts de puissance entre serveurs (*probable*, guide cpt-hedge).
- **Rise of Kingdoms.** Migration vers un royaume d'au moins 120 jours, interdite pendant un KvK, avec un plafond de puissance à l'entrée : 35 M ou 25 M selon les sources, qui se contredisent (*incertain*). Les guides signalent que des joueurs se servaient de la migration pour **revenir dans des royaumes neufs** et y écraser les débutants, d'où de nouvelles restrictions (*incertain*).
- **Ce que cela montre.** Dès qu'il existe plusieurs serveurs d'âges différents, il faut une police des migrations : âge minimal, plafond de puissance, quotas, coût. C'est autant de règles à écrire et à modérer.

## 4. Contenu verrouillé par l'âge du serveur

**Whiteout Survival** est le cas le plus poussé (*probable*, guides concordants mone.gg et grindnstrat, sans source officielle) :

| Jour du state | Déblocage |
|---|---|
| J0 | Héros de génération 1 |
| J40 | Héros de génération 2, échange de ressources d'alliance |
| J54 à J60 | Animaux de compagnie (Fourneau 18 requis), âge du Cristal de feu (niveaux 1 à 3) |
| J80 | SvS (state contre state) |
| J120 | Génération 3 |
| J150 | Cristal de feu 4-5, laboratoire |
| J195-200 | Génération 4 |
| J220 | Académie de guerre, troupes T11 |
| J270-280 | Génération 5 |
| J360-370 | Génération 6 |
| J440 / J520 / ≈J600 | Générations 7, 8, 9 |
| ≈J1000-1060 | Génération 14 (non confirmé) |

Les dates **varient d'un state à l'autre**, car certaines dépendent de la vitesse à laquelle le state remplit des missions collectives (« Monument »). Un state trop jeune pour le SvS à J80 reçoit à la place un cycle d'event supplémentaire (*probable*). L'âge appartient au state, pas au compte : un joueur qui passe d'un state à J600 à un state à J200 retombe sur des héros plus anciens (*probable*).

**Last War** suit le même principe : héros, events et systèmes sortent à date fixe selon l'âge du serveur (Murphy à J1, Desert Storm à J12, Capitol Conquest à J25…), puis selon le jour de saison. Le guide le dit en toutes lettres : c'est l'âge du serveur, et non celui du compte, qui pilote les déblocages (*probable*). Un héros raté à sa sortie revient plus tard (« Hero's Return », « Legend Returns ») : c'est un **rejeu des sorties passées**.

**Rise of Kingdoms** apparie les royaumes par âge : un royaume neuf n'affronte jamais un royaume ancien (*probable*).

**Ce que cela apporte à Kalendrath.** Verrouiller le contenu par l'âge du monde, c'est **étaler la production de contenu** : on publie un an de contenu au rythme du monde, pas d'un coup. Gregory prévoit justement environ un an de stock avant l'ouverture. Mais dans ces jeux, le verrou n'est juste que parce que chaque nouveau venu démarre sur un serveur neuf. Sur un monde unique, il pénalise le retardataire, qui trouve tout débloqué et les autres très loin devant. Le verrou doit donc porter sur **le monde pour les vétérans, et sur le compte pour le retardataire** (voir la section 6).

## 5. Bonus de rattrapage

- **WoW Classic, Season of Discovery — « Discoverer's Delight ».** C'est un bonus d'XP pour les niveaux inférieurs au plafond de la phase, qui monte à chaque phase. Phase 2 : +50 % sous le niveau 25, porté à +100 % pour les niveaux 1 à 39 le 5 mars 2024, plus tôt que prévu, parce que la montée devenait « décourageante ». Phase 3 (annonce du 6 mai 2024) : +150 % jusqu'au niveau 39, +100 % de 40 à 49. Phase 4 : +150 % de 1 à 49, +50 % de 50 à 59 (*vérifié*, annonces Blizzard). *Contradiction :* un résumé de presse donne +75 % pour 40-49 en phase 3, l'annonce officielle +100 %. Les valeurs ont sans doute été retouchées en cours de phase. Le bonus s'accompagnait d'autres aides : plus d'or de quête, monture de niveau 40 moins chère. Les forums sont partagés : pour certains, le bonus arrive trop tard pour donner envie de revenir ; pour d'autres, il sauve les personnages secondaires.
- **OSRS Fresh Start Worlds.** C'est le contre-exemple assumé : **aucun bonus**, aucune récompense matérielle, seulement des points de prestige non échangeables (*vérifié*). Le rattrapage vient de l'égalité de départ, pas d'une aide.
- **Last War.** Les héros passés reviennent (« Hero's Return »), et les pools de choix de héros s'élargissent (*probable*). Pas d'accélérateur de rattrapage documenté.
- **Whiteout Survival.** Aucun rattrapage décrit par les guides. Leur seule réponse : « choisis un state jeune » (*probable*).
- **Accélération propre au compte (« burning », boosts de niveau).** Les exemples connus (MapleStory, boosts de WoW ou de FFXIV) n'ont **pas pu être vérifiés** dans cette recherche.

## 6. Précédents à l'idée de Gregory : une ligne temporelle accélérée

L'idée : le retardataire ne débarque pas au jour 400 du monde. Il parcourt une **ligne parallèle accélérée** où il rejoue les events passés, puis il rejoint la ligne principale. Aucun jeu trouvé ne fait exactement cela, mais quatre mécanismes en couvrent chacun une partie.

| Précédent | Ce qu'il reprend de l'idée | Ce qu'il ne reprend pas | Fiabilité |
|---|---|---|---|
| **OSRS Fresh Start Worlds** (2022-2023) | Ligne séparée et temporaire, **reversée dans la ligne principale** à date fixe, progression conservée | Pas accélérée (aucun bonus) ; tous les participants sont nouveaux, il n'y a pas de rejeu | *vérifié* |
| **Path of Exile, ligues → Standard** | Tous les 3 mois, une ligne neuve qui se reverse dans la ligne permanente | La ligne permanente est le « cimetière » : on y perd l'accès aux nouvelles mécaniques ; c'est l'inverse de « rejoindre le principal » | *probable* |
| **Guild Wars 2, Living World** | **Rejouer les épisodes narratifs passés** : chaque épisode est gratuit pour qui s'est connecté pendant sa sortie, sinon 200 gemmes, ou inclus avec l'extension depuis End of Dragons. Des événements « Living World Return » ont rouvert les anciens épisodes gratuitement, pour un temps | Pas de rejonction d'un monde partagé ; c'est du contenu, pas une course | *probable* (centre d'aide officiel et wiki, cités par la recherche ; pages inaccessibles au moment de la lecture) |
| **Arknights Global** | **Un calendrier en retard qui rejoue les events d'une autre ligne** (le serveur chinois) et **réduit son retard** : environ 9 mois, puis 6, puis des events simultanés sur tous les serveurs fin 2025 | L'accélération est décidée pour tout le serveur, pas pour un joueur | *probable* (wiki et Gamepress) ; *incertain* pour la cause, que l'éditeur n'a pas expliquée |
| **Last War, « Hero's Return »** | Le contenu raté revient plus tard | Pas de ligne parallèle | *probable* |
| **Whiteout Survival, state trop jeune** | Un state qui n'a pas l'âge d'un event reçoit un cycle d'event de remplacement | Pas de rejonction | *probable* |

**Conclusion.** L'idée est **neuve dans sa forme complète**, mais chacune de ses briques a été éprouvée. Point clé : Kalendrath est PvE-first, et un event PvE contre des bots se rejoue **sans adversaire humain**. C'est ce qui rend l'idée faisable ici alors qu'elle ne l'est pas dans un 4X centré sur le PvP. Les jeux cités ont besoin d'un serveur neuf parce que leur contenu, c'est **les autres joueurs**.

## 7. Quel format tient pour quelques centaines à quelques milliers de joueurs ?

**Ordre de grandeur.** Un serveur de 4X mobile vise plus de 1 000 joueurs actifs, puisque l'appariement des KvK de Rise of Kingdoms porte sur le top 1 000 (*probable*). Travian concentre ses mondes pour garder une forte compétition (*vérifié*). New World et Tibia fusionnent dès que la densité baisse (*probable*). Avec quelques centaines à quelques milliers de joueurs, Kalendrath a la population **d'un seul serveur de ces jeux**. Ouvrir un deuxième monde reviendrait à couper une population déjà mince.

### Option A — Monde unique persistant sans saisons (OGame)
- **Pour :** le plus simple à coder et à héberger ; aucune fusion ; la cité de 2 ans garde tout son sens.
- **Contre :** pas de rendez-vous qui relance l'intérêt ; le retardataire est à des mois des premiers ; c'est le modèle le moins accueillant du comparatif principal.

### Option B — Mondes à durée limitée (Travian)
- **Pour :** égalité régulière ; le retardataire attend au plus un cycle ; les fins de partie font des temps forts.
- **Contre :** **incompatible avec la cité sur 2 ans**, décision déjà prise ; il faut assez de joueurs pour remplir chaque monde à chaque cycle ; la remise à zéro fait fuir les joueurs PvE qui construisent sur la durée.

### Option C — Serveurs neufs en continu et contenu verrouillé par l'âge (Whiteout Survival, Last War)
- **Pour :** égalité au départ ; production de contenu étalée.
- **Contre :** demande un flux d'arrivées que Kalendrath n'aura pas ; mène à des fusions, puis à une police des migrations ; un serveur neuf de 50 joueurs n'est pas un monde vivant.

### Option D — Monde unique, saisons, et rattrapage individuel accéléré (recommandée)
Un seul monde persistant (la cité sur 2 ans), des **saisons PvE de 8 à 12 semaines** avec leur classement, et pour le retardataire une **ligne accélérée personnelle** :
1. **Chapitres passés rejouables en instance.** Les events PvE des saisons écoulées deviennent des « Chroniques » jouables seul ou en alliance, enchaînées plus vite (par exemple une saison de 10 semaines en 2 à 3 semaines). C'est la brique Guild Wars 2, sans le paiement.
2. **Multiplicateur de rattrapage dégressif** sur les chantiers et les recherches, calé sur l'écart avec la **médiane du monde**, pas avec le premier. Il s'éteint en approchant de la médiane. C'est la brique Season of Discovery, étendue aux temps de construction.
3. **Récompenses réduites mais pas nulles** en rejeu. Les cosmétiques et titres « en direct » restent réservés à la saison d'origine, pour ne pas léser les vétérans.
4. **Rejonction automatique** quand le joueur atteint la médiane, ou au terme d'une durée fixe. C'est la brique OSRS Fresh Start, sans serveur séparé.
5. **Verrou de contenu au niveau du monde pour les vétérans** (âge du monde), **au niveau du compte pour le retardataire** (il débloque à son rythme accéléré). C'est la brique Whiteout Survival, retournée.

- **Pour :** une seule population, aucune fusion ; réutilise le stock d'un an de contenu au lieu de le jeter ; cohérent avec le PvE-first ; le retardataire n'est jamais à 18 mois du peloton ; pas besoin d'ouvrir de second serveur avant qu'il y en ait l'usage.
- **Contre :**
  - Coût de développement réel : les events doivent être conçus **dès le départ** comme rejouables en instance (scénario, bots, récompenses paramétrables). Rattraper ce choix après coup coûtera cher, et il touche le domaine.
  - Risque de **sentiment d'injustice des vétérans** (« j'ai mis 10 semaines, lui 3 »), à traiter par les exclusivités en direct.
  - Risque d'**abus** : des comptes secondaires qui exploitent le multiplicateur (le cas des migrations vers les royaumes neufs de Rise of Kingdoms). Il faut un plafond, un lien au compte principal et aucune ressource transférable.
  - Un multiplicateur sur les chantiers **ressemble à ce que vend la boutique** (accélérateurs, ouvriers). Il faut un arbitrage explicite pour ne pas cannibaliser les ventes ni casser le plafond de +30 % d'écart payeur.
  - Aucun précédent complet : c'est une prise de risque de conception, à prototyper dans le simulateur de theorycrafting avant le GDD.

### Option E — Monde principal et monde « frais » accéléré temporaire, reversé à date fixe (OSRS Fresh Start)
- **Pour :** fidèle à l'image d'une « ligne temporelle » séparée ; départ égal pour tous les nouveaux d'une vague ; précédent vérifié.
- **Contre :** exige **deux populations viables à la fois**, alors qu'on manque déjà de densité pour une ; la reverse pose les problèmes d'une fusion (classements, territoires, économie) ; New World montre qu'on finit par devoir défaire ses promesses. À garder pour plus tard, quand une vague de lancement (sortie mobile, campagne) amènera d'un coup des centaines de joueurs.

## 8. Leçons pour Kalendrath

1. **Un seul monde tant qu'il n'est pas plein.** *(Question ouverte : format de serveur.)* Tous les précédents montrent que les mondes peu peuplés meurent et finissent fusionnés. Travian Kingdoms a réduit son nombre de mondes en 2026. Pour quelques centaines à quelques milliers de joueurs, le format hybride, monde persistant plus saisons de 8 à 12 semaines, est le seul qui concilie la cité sur 2 ans et des rendez-vous réguliers. **La durée limitée (option B) contredit la décision des 2 ans** : il faut trancher, pas mélanger.
2. **L'idée de Gregory est faisable parce que le jeu est PvE-first, et à condition de la concevoir tôt.** *(Question ouverte : rattrapage.)* Les briques existent (rejeu des épisodes de Guild Wars 2, reverse des Fresh Start d'OSRS, rattrapage du calendrier d'Arknights, bonus d'XP de Season of Discovery), mais personne ne les a assemblées. Chaque event du stock d'un an doit naître avec son mode « Chronique » rejouable. Le faire après coup sera très coûteux.
3. **Rattraper la médiane, pas le premier.** *(Rattrapage, plafond payeur.)* Un multiplicateur dégressif calé sur la médiane du monde évite qu'un retardataire dépasse les vétérans, et qu'un payeur s'en serve pour accélérer. Il doit être modélisé dans le simulateur avant d'entrer dans le GDD, comme le veut la règle du 2026-10-21.
4. **Le verrou d'âge du monde est un outil de production autant que de rythme.** *(Stock d'un an de contenu.)* Whiteout Survival et Last War sortent héros et systèmes à date fixe selon l'âge du serveur. Kalendrath peut faire de même sur son monde unique, ce qui étale le stock d'un an, à condition que le retardataire débloque ces contenus **à l'échelle de son compte** pendant sa ligne accélérée.
5. **Ne rien promettre d'irréversible sur les serveurs.** *(Communication du Discord et du site vitrine.)* New World avait promis de ne jamais fusionner ses mondes Fresh Start, puis a ouvert des transferts payants. Si un second monde ouvre un jour, annoncer d'emblée ses règles de fin : reverse, fusion ou fermeture.
6. **L'alpha ×3 à ×5 est un banc d'essai idéal pour la ligne accélérée.** *(Alpha.)* Les testeurs arrivés en retard dans l'alpha peuvent servir de cobayes au mode Chronique et au multiplicateur dégressif, avant que le monde réel n'en ait besoin.

## 9. Sources

| Source | Contenu utilisé | Fiabilité |
|---|---|---|
| https://blog.kingdoms.com/new-game-world-schedule/ | Travian Kingdoms : un monde ×1 local toutes les ~20 semaines, motif (« mondes actifs à forte compétition »), billet du 18 juin 2026 | *vérifié* (officiel) |
| https://en.wikipedia.org/wiki/Travian | Travian Legends : fin de partie après ~200 jours, Merveille niveau 100, plus de 300 serveurs | *probable* |
| https://en.wikipedia.org/wiki/OGame | Univers, univers spéciaux ; pas de données sur les fusions | *incertain* (article signalé comme peu sourcé) |
| https://www.mone.gg/blog/whiteout-survival/server-timeline-guide.html | Calendrier des déblocages de Whiteout Survival, de J0 à J1000 ; âge lié au state | *probable* |
| https://grindnstrat.com/whiteout-survival-server-timeline | Calendrier des générations de Whiteout Survival (concordant) | *probable* |
| https://heaven-guardian.com/whiteout-survival-state-age-guide/ | Définition de l'âge du state | *incertain* |
| https://heaven-guardian.com/last-war-server-timeline/ | Calendrier de Last War par jour de serveur et de saison, « Hero's Return », âge du serveur plutôt que du compte | *probable* |
| https://cpt-hedge.com/guides/transfer-surge | Transfert de Last War : une fois par saison, 14 jours, groupes de 64 puis 128 serveurs, 50 tickets | *probable* |
| https://www.lastwartutorial.com/season-1-pre-season/ | Pré-saison de 2 semaines (contredit les ~120 jours d'un autre guide) | *incertain* |
| https://riseofkingdomsguides.com/kvk-kingdom-vs-kingdom-guide-tips-for-all-seasons-in-rise-of-kingdoms/ | Premier KvK vers 100 jours, appariement par âge et sur le top 1 000 | *probable* |
| https://riseofkingdomsguides.com/?p=1091 et https://www.pocketgamer.com/rise-of-kingdoms/passport-migration | Règles de migration de Rise of Kingdoms (120 jours, 30 jours, plafond 35 M ou 25 M, contradictoire) | *incertain* |
| https://oldschool.runescape.wiki/w/Fresh_Start_Worlds | OSRS Fresh Start Worlds : dates, 25 mondes, aucun bonus, transfert vers le jeu principal le 18 avril 2023 | *vérifié* |
| https://osrs.game/Fresh-Start-Worlds-Blog | Annonce de Jagex (concordante) | *vérifié* |
| https://us.forums.blizzard.com/en/wow/t/1847015 | Discoverer's Delight, phase 3 : +150 % jusqu'au niveau 39, +100 % de 40 à 49 (6 mai 2024) | *vérifié* (officiel) |
| https://blizzardwatch.com/2024/02/27/wow-classic-season-discovery-discoverers-delight-xp-buff/ et https://www.warcrafttavern.com/wow-classic-sod/news/50-xp-buff-now-life-for-na-realms-in-season-of-discovery/ | Phase 2 : +50 % puis +100 %, motif « montée décourageante » ; valeurs de la phase 4 | *probable* |
| https://help.guildwars2.com/hc/en-us/articles/360049722974-Living-World-Episode-Unlocks | Épisodes gratuits pendant la sortie, 200 gemmes ensuite | *probable* (page inaccessible au moment de la lecture, contenu repris de la recherche) |
| https://wiki.guildwars2.com/wiki/Living_World_Return | Événements de rejeu gratuit des épisodes | *incertain* (wiki en maintenance) |
| https://ak.gamepress.gg/node/56821 et https://arknights.wiki.gg/wiki/Events | Arknights Global : retard de 9 puis 6 mois, events simultanés fin 2025 ; cause non officielle | *probable* (faits), *incertain* (cause) |
| https://pathofexile.fandom.com/wiki/Standard | Ligues de Path of Exile reversées dans Standard | *probable* |
| https://massivelyop.com/?p=414668 et https://massivelyop.com/?p=436391 | Fusions de New World (17 en 8, 7 en 4), critères, transferts payants hors Fresh Start | *probable* (contenu repris des résultats de recherche ; pages bloquées à la lecture directe) |
| https://newworld.com/en-gb/news/articles/fresh-start-world-rollout-plan-and-faq | Promesse « jamais de fusion Fresh Start → mondes historiques » | *probable* |
| https://tibia.fandom.com/wiki/Game_World_Merge | Motifs des fusions de Tibia | *incertain* (page inaccessible, contenu repris de la recherche) |

**Non trouvé ou non vérifié :** cadence réelle d'ouverture des serveurs de Last War et de Whiteout Survival ; durée exacte d'un monde Travian Kingdoms ; historique des fusions d'univers OGame ; fusions d'Ikariam, d'Elvenar et de Lords Mobile ; saisons de Diablo IV et d'Albion Online ; données de rétention après une fusion ou une fin de ligue. Une session de recherche supplémentaire peut les couvrir.
