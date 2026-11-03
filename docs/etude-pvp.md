# Étude du PvP de Kalendrath

*Étude ouverte le 2026-10-30, à la suite de la remise en question du Mode de Guerre par Gregory le 2026-10-28 ([GDD 5.4](game-design-document.md)). **Révisée le même jour après les arbitrages de Gregory** (section 1.1) : la guerre d'alliances s'ouvre dès le chapitre 1, tous les membres d'une alliance en guerre sont attaquables, les boucliers sont gratuits en jeu et payants pour une couverture complète, les garde-fous chiffrés sont validés, et la règle « aucune perte définitive » est précisée. **Révisée une seconde fois le même jour** (section 1.1, arbitrages complémentaires) : stock illimité de boucliers gratuits, strictement personnels ; mode vacances permis en guerre mais encadré ; lecture « taxe à la sécurité » retirée ; poids des débris pesé (section 4.6). Ce document propose ; les décisions iront dans le GDD, pas ici. Il s'appuie sur le GDD, l'[étude des serveurs en continu](etude-serveurs-en-continu.md), le [comparatif du genre](references-jeux-du-genre.md) et ses fiches, le [lore](lore.md), le [plan marketing](plan-marketing.md), sur le code d'OGameX tel qu'il est au 2026-10-30 et sur quelques recherches web ciblées (sources en fin de document).*

Cinq angles, traités séparément : (1) Mode de Guerre individuel ou guerre d'alliances ; (2) diplomatie et casus belli ; (3) garde-fous contre les grosses alliances, boucliers compris ; (4) ligues d'events et saisons PvP ; (5) cohérence avec le PvE-first, le format serveur par chapitre, les formules de combat héritées et le lore. Chaque angle suit le même plan : constat, options, recommandation, risques, ce que le simulateur doit valider.

---

## 0. En une page

**Le schéma : un PvP à trois étages, consenti par l'alliance.**

| Étage | Qui est exposé | Ce qu'on risque | Quand |
|---|---|---|---|
| **0. Paix par défaut** | Personne. Joueur seul, alliance sans bannière : invulnérable aux autres joueurs, toujours | Rien face aux joueurs ; le PvE garde sa menace (bots qui attaquent, pertes à l'Hôpital) | Toujours |
| **1. Events PvP en ligues** | Les volontaires, inscrits à un event, répartis par tranche de puissance | Du classement, pas des troupes : les combats se jouent sur des copies d'armées, sans pertes réelles | Dès la bêta (c'est son classement), puis à partir de J14 d'un serveur |
| **2. Guerre d'alliances déclarée** | **Tous les membres** de deux alliances à bannière levée, sans exception | De vraies batailles : ressources pillées (25 % des stocks au plus), troupes et défenses perdues. **Jamais une cité prise ni un bâtiment détruit** | Dès le chapitre 1, à partir de **J21** d'un serveur (proposition, section 5) |

- **Le Mode de Guerre individuel on/off disparaît.** L'interrupteur passe au niveau de l'alliance : c'est la **bannière levée**, sur le modèle de l'éligibilité à la guerre d'EVE Online. Le joueur solitaire qui veut se mesurer passe par l'étage 1.
- **La guerre suppose un consentement, celui de l'alliance.** Le membre consent en rejoignant une alliance à bannière, ou en y restant : la bannière est affichée partout et l'adhésion demande une confirmation explicite. **Il n'y a pas de ban de guerre partiel** : dans une alliance en guerre, tout le monde est attaquable. C'est la parade au *boosting* observé par Gregory dans Last War, où des joueurs « ressources » à l'abri alimentent les joueurs offensifs.
- **Le bouclier est la défense des alliances pacifiques ou en retrait.** Gagné gratuitement en jeu, **stockable sans limite** et strictement personnel (ni échange, ni transfert) ; payant pour une **couverture continue**. Il protège celui qui ne veut pas combattre ; il ne sert jamais à attaquer à l'abri : **toute action hostile sortante le rompt**, après un avertissement à confirmer (section 4.3).
- **Le mode vacances reste permis en guerre**, pour ne pas prendre le joueur en otage, mais encadré : 48 h au moins, non enchaînable, 72 h d'attente après la levée (section 4.3).
- **Le champ de ruines pèse plus lourd que le butin** : avec les règles héritées, il rend rentable une attaque que le butin plafonné ne rendrait pas. Il faut le régler pour la guerre (section 4.6).
- **Pas de guerre sans casus belli**, et le casus belli ne se fabrique pas : une provocation donne un grief **à la victime**, jamais à l'agresseur. S'y ajoute la guerre par **défi accepté** des deux côtés.
- **Pas de guerre hors de sa tranche** : la puissance de toute l'alliance visée doit valoir au moins 70 % de celle de l'agresseur, alliés compris.
- **Le PvP ne nourrit jamais la progression principale** : récompenses en titres, cosmétiques, calques de capitale, Prestige et Kaelite gagnée (liée au serveur) en petite quantité. Le butin pillé existe, mais plafonné.
- **Ordre de construction** : étage 1 pour la bêta ; étage 2 prêt pour l'ouverture du premier serveur public, puisqu'il s'ouvre au chapitre 1. C'est le principal changement de calendrier (section 7).

---

## 1. Les contraintes posées par le projet

### 1.1 Ce qui est déjà décidé et que l'étude ne rouvre pas

**Arbitrages de Gregory du 2026-10-30** (sur la première version de cette étude) :

1. **Guerres d'alliances dès le chapitre 1** (3 à 4 mois). Le seuil de J60 est abandonné ; un délai minimal reste possible s'il est justifié, sans bloquer le PvP au chapitre 1.
2. **Bannière levée à la EVE conservée**, mais **tous les membres d'une alliance en guerre sont attaquables**. Pas de ban de guerre partiel, pour empêcher le boosting entre joueurs ressources et joueurs offensifs vu dans Last War.
3. **Boucliers** : obtenables gratuitement en jeu, payants pour une couverture complète. Ils sont le moyen de défense des alliances pacifiques ou en retrait.
4. **Tous les garde-fous chiffrés de la première version sont validés** (plafond de 30 membres, 2 à 3 PNA et 1 pacte défensif, tranche de 70 %, ratio d'effectifs de 1,5, une seule guerre subie, moral jusqu'à −40 %, 3 attaques par cible et par 24 h, butin de 25 %, trêve quotidienne de 8 h, trêve de 14 jours entre deux guerres, protection des nouveaux de 14 jours et palier Bourg, 7 jours de présence, rendement décroissant du score). Certains changent d'assiette avec la suppression du ban : la section 4.2 le signale ligne par ligne.
5. **« Aucune perte définitive » est précisé** : en guerre, les **pertes de ressources, de défenses et de troupes sont acceptées** ; la **destruction de cité ou de bâtiments est exclue** (le modèle Travian, où l'on perd ses villages, est jugé décourageant).

**Arbitrages complémentaires de Gregory du 2026-10-30** (sur la version révisée) :

6. **Boucliers gratuits : stock illimité.** Le joueur gagne ses boucliers et choisit de les stocker ou de les utiliser. **Usage strictement personnel** : impossibles à échanger ou à transférer. Les **boucliers payants** servent à une **couverture continue**. **Toute action hostile sortante rompt le bouclier**, et un **avertissement est affiché avant l'action**, qui demande une confirmation. Le plafond de 3 boucliers en réserve proposé par la première version est abandonné.
7. **Mode vacances autorisé en guerre**, pour ne pas prendre le joueur en otage, mais encadré : **48 h au minimum**, **non enchaînable**, **72 h d'attente après la levée** avant de pouvoir le relancer. L'interdiction proposée par la première version est abandonnée.
8. **Le bouclier n'est pas une « taxe à la sécurité »** : un joueur qui veut la tranquillité rejoint une alliance qui ne déclare pas de guerre (sans bannière, donc protégée par la Paix par défaut). Cette lecture sort des risques.
9. **Le poids des débris est à peser** : section 4.6.

**Décisions antérieures** :

- **Pilier** : « PvE-first, PvP strictement consenti, jamais subi » (GDD 2). « Pas de perte permanente et irréversible » (GDD 2), désormais lu au sens de l'arbitrage 5.
- **Promesse publique** : « Le PvP n'est jamais injuste. […] un joueur pacifique ou sans alliance ne se fait pas écraser par plus fort que lui » (plan marketing 2) ; « des ligues de niveaux pour que chacun affronte des joueurs de sa force » (argument 4) ; la communication ne parle jamais de plafond payeur. « Pacifique » se lit désormais « dans une alliance sans bannière » (section 6.5).
- **Héros** : il peut accompagner une armée en PvP comme chef de guerre ; s'il est vaincu, il est indisponible pour une durée qui dépend de son niveau, jamais perdu (GDD 5.4, 5.5).
- **Bouclier temporaire** : interdit juste après une attaque menée par le joueur ; vendable en boutique dans des limites à fixer (GDD 5.4, 9). L'arbitrage 3 en fixe le principe.
- **Ambassade** : berceau des pactes de non-agression et des pactes commerciaux (GDD 4.2).
- **Lunes supprimées** (GDD, 2026-10-11).
- **Format de serveur** : un serveur par chapitre (~4 mois), calendrier relatif à l'ouverture (`t0`), fusion par puissance plus tard, lobby qui connaît les comptes liés (étude des serveurs).
- **Formules de combat d'OGameX héritées en V1** (CLAUDE.md, GDD 5.4) ; on ne touche le domaine qu'avec raison, la Phase 4 étant une exception assumée.

### 1.2 Ce que le code d'OGameX fait déjà (vérifié le 2026-10-30)

| Mécanique | État dans le code | Utilité pour l'étude |
|---|---|---|
| Vérification avant une attaque | `AttackMission::isMissionPossible()` : propriétaire, mode vacances, protection admin, blocage global des attaques | Point d'accroche unique pour toutes les règles « qui peut attaquer qui » (bannière, guerre, bouclier, limite par cible, trêve) |
| **Blocage global des attaques** | `SettingsService::attackBlockActive()` / `attackBlockUntil()`, appliqué aux missions marquées `blockedByServerAttackBlock` | Un interrupteur serveur déjà prêt : fermer toute attaque entre joueurs avant J21, ou avant une fusion |
| Mode vacances | `GameMission::checkTargetVacationMode()` (vérifié au lancement de l'attaque, de l'espionnage, du transport et de la défense groupée) ; `PlayerService::activateVacationMode()` : **48 h minimum déjà codées**, aucune durée maximale, production des mines mise à 0 (à relever à la main après la levée), files de construction, de recherche et d'unités gelées, aucune mission ne part ; activation refusée si une flotte du joueur est en vol. **Aucun délai après la levée** | Modèle technique du bouclier (une cible temporairement inattaquable). **Permis en guerre** (arbitrage 7) : il reste à coder les 72 h d'attente après la levée et à vérifier le sort d'une attaque déjà en vol quand la cible passe en vacances (section 4.3) |
| Statut « faible » / « fort » | `PlayerService::isNewbie()` (moins de 20 % des points de l'autre) et `isStrong()` (plus de 500 %) | **Affichage seulement** dans la galaxie : aucune règle ne l'applique à l'attaque. À ne pas transformer en immunité (section 4.4) |
| Butin | 50 % des stocks du défenseur, plafonné par la capacité de fret (`BattleEngine::$lootPercentage`, modifiable par classe) | Le pourcentage est déjà un paramètre : le ramener à 25 % en guerre ne touche pas la formule de combat |
| Débris (champ de ruines) | 30 % du coût en Bois et Fer des unités détruites des **deux** camps (`debris_field_from_ships`), 0 % des défenses, Mana exclu ; récoltable par **n'importe qui** ; aucune décroissance | Pèse plus que le butin ; pompe à surveiller. Chiffrage en section 4.6 |
| Réparation des défenses | ~70 % des défenses détruites réparées après combat (`DefenseRepairService`) | Avantage naturel au défenseur ; adoucit la perte de défenses acceptée par l'arbitrage 5 |
| Missiles | `MissileMission` : attaque à sens unique qui détruit des défenses | Compatible avec l'arbitrage 5 (défenses seulement). À soumettre aux mêmes règles d'accès que l'attaque |
| **Destruction de lune** | `MoonDestructionMission` | **Contraire à l'arbitrage 5** et sans objet (lunes supprimées) : à désactiver, comme toute mission qui détruirait un bâtiment ou une cité |
| **Attaque groupée (ACS Attaque)** | `FleetUnion`, `FleetUnionService`, `FleetMission::union()` : plusieurs flottes attaquent ensemble | **Correction du GDD 5.9**, qui ne recense que l'ACS Défense : l'attaque groupée existe dans l'upstream. Outil de guerre d'alliance tout prêt, mais aussi outil de « zerg » |
| Défense groupée (ACS Défense) | `AcsDefendMission`, Dépôt d'alliance (devenu Ambassade) | La défense collective existe |
| Alliance | `Alliance`, `AllianceMember`, `AllianceRank`, `AllianceHighscore` ; aucun plafond de membres trouvé, aucune diplomatie | Diplomatie, bannière et plafond sont à construire |
| Mode de Guerre, casus belli, ligues | Rien | À construire (effort élevé, GDD 5.10) |
| Simulation de bataille | `BattleEngine::simulateBattle()`, utilisé aussi par la commande de performance `ogamex:test:battle-engine-performance` | Base possible pour des combats sur copies d'armées (étage 1). À vérifier : effets de bord (retraite, prélèvement de carburant) |

### 1.3 Ce qu'enseignent les jeux de référence

| Jeu | Mécanique | Leçon pour Kalendrath | Source |
|---|---|---|---|
| **Elvenar** | Aucun PvP | Un jeu sans PvP subi tient dix ans avec un public fidèle, mais gagne environ dix fois moins qu'un 4X compétitif | *pve-dans-le-genre* |
| **Forge of Empires** | Défense automatique, pillage limité, tournois opt-in ; GvG fermé en 2024 ; **Champs de bataille de guilde** : des guildes se disputent des provinces, en ligues, mais chaque combat se livre contre l'IA | Le meilleur modèle pour l'étage 1 : de la compétition entre alliances sans que personne ne perde sa cité | *forge-of-empires* |
| **Tribal Wars** | Moral (jusqu'à −45 % pour un gros contre un petit), bonus de nuit (+100 % de défense sur 8 h), ratio d'attaque plafonné à 20:1 pendant 60 jours, protection débutant de 5 jours, tribus de 18 à 25 membres | Les protections chiffrées sont ce qui fait tenir un public adulte (joueur moyen : 35 ans) | *tribal-wars* |
| **Grepolis** | Moral actif sur tous les mondes, protection débutant de 7 jours, plafond d'alliance réglable par monde | Même famille de garde-fous, réglables par serveur | *grepolis* |
| **Travian** | Conquête et destruction de villages | **Contre-modèle retenu par Gregory** (arbitrage 5) : perdre sa cité décourage | Arbitrage du 2026-10-30 |
| **Ikariam** | Une cité ne peut jamais être prise ni détruite ; part des stocks à l'abri | « Une cité ne se perd jamais » ; la sécurité ne se vend pas sans limite (Ikariam vend le doublement de la protection : c'est la limite à ne pas franchir, section 4.3) | *ikariam* |
| **Last War** | Boucliers vendus et gagnés ; alliances où des comptes « ressources » protégés alimentent les comptes offensifs | **Le boosting naît de l'exposition partielle** : si une partie de l'alliance est à l'abri, elle devient l'économie de l'autre. D'où l'arbitrage 2 | Observation de Gregory, arbitrage du 2026-10-30 |
| **OGame** | Limite d'attaques par cible (« bash limit », 6 par 24 h selon une page Gameforge), statut faible/fort | Le plafond d'attaques répétées sur une même cible est un standard du genre | *triche-multicomptes-bots* |
| **Rise of Kingdoms** | 1re KvK vers J100 ; appariement sur la puissance des 1 000 meilleurs joueurs du royaume ; Ark of Osiris (PvP d'alliance) toutes les deux semaines | Appariement par âge et par puissance ; cadence de deux semaines. **Le J100 concerne une guerre de masse entre serveurs non consentie**, pas une guerre consentie entre alliances : il ne se transpose pas tel quel | *rise-of-kingdoms*, *formats-serveur-et-rattrapage* |
| **Whiteout Survival** | Guerre entre serveurs (SvS) à partir de J80 environ, avec 5 jours de préparation thématique ; les serveurs trop jeunes reçoivent un autre event à la place | Le calendrier par âge de serveur décide quand le PvP s'ouvre ; même réserve que pour Rise of Kingdoms | *whiteout-survival* |
| **Travian Kingdoms** | Diplomatie gérée par le roi ; **une seule confédération à la fois**, qui vaut pacte de non-agression ; après la fin d'un pacte, impossibilité de conquérir l'ancien allié pendant 48 h à 3 jours | Plafonner le nombre d'alliés formels ; un délai après rupture empêche les retournements opportunistes | [support Travian Kingdoms](https://support.kingdoms.com/en/articles/43-diplomacy-confederacy-nap-and-war) |
| **EVE Online** | En 2018, CCP a réservé les déclarations de guerre aux groupes « éligibles » (qui possèdent une structure dans l'espace), puis exigé un QG de guerre (2019), pour mettre fin au harcèlement des petites corporations. **Dans une corporation éligible en guerre, tous les membres sont des cibles légitimes** | Précédent direct pour la bannière, et pour l'exposition de tous les membres : l'éligibilité se choisit au niveau du groupe, pas du membre | [EVE, décembre 2018](https://www.eveonline.com/news/view/war-declaration-changes-the-war-adjacent-to-christmas), [EVE, 2019](https://www.eveonline.com/news/view/war-declarations-transition-period-update) |
| **New World** | Une guerre de territoire ne se déclare qu'après une course d'influence gagnée par des missions dans le territoire ; batailles à 50 contre 50 | **Le casus belli se gagne par des actions sur le terrain**, et l'effectif est encadré des deux côtés | [Icy Veins](https://icy-veins.com/new-world/war-system-in-new-world), [newworld.com](https://www.newworld.com/en-us/news/articles/march-to-battle-factions) |
| **Guild Wars 2** | Refonte du McM : équipes recomposées à chaque saison, alliances plafonnées à 500 joueurs (plan annoncé) | Recomposer les camps à chaque saison casse les hégémonies ; plafond de taille explicite | [ArenaNet](https://www.guildwars2.com/news/studio-update-world-restructuring-and-the-future-of-world-vs-world) |
| **Kingshot, Whiteout** (fusions) | Annonce ~6 jours avant, pacte de non-agression, bouclier de 24 h, transferts gratuits | Une fusion est un moment de guerre potentielle à neutraliser | *reddit-vague-3* |
| **Motifs de départ** (Reddit) | Toxicité d'alliance, pression des minuteurs de bouclier, temps de jeu envahissant | Le bouclier ne doit pas devenir une corvée à renouveler (d'où le stock sans plafond, arbitrage 6) | *reddit-vague-2* |

---

## 2. Angle 1 — Mode de Guerre individuel ou guerre d'alliances

### Constat

Le Mode de Guerre actuel (GDD 5.4) est un interrupteur individuel : opt-in réciproque, 72 h entre deux bascules, bonus en contrepartie, bouclier temporaire. Il ne dit rien de la force relative : un joueur faible qui l'active pour le bonus devient la cible de tous les forts qui l'ont activé, le vivier se vide de ses faibles et le bonus finit chez les forts. Il ne donne pas non plus de vie collective aux alliances, premier levier de rétention du genre (leçon 9 du comparatif).

Gregory a retenu la guerre d'alliances, ouverte dès le chapitre 1, avec une bannière qui rend l'alliance déclarable et l'exposition de tous ses membres.

### Le schéma retenu

1. **Plus d'interrupteur individuel.** Son rôle passe à la **bannière** de l'alliance : sans bannière, elle ne peut ni déclarer ni subir de guerre. Lever ou baisser la bannière prend **72 h** (le délai du GDD, reporté de l'individu à l'alliance).
2. **Tous les membres sont exposés** pendant une guerre. Le consentement du membre se donne en rejoignant une alliance à bannière ou en y restant :
   - la bannière est visible sur la fiche de l'alliance, dans la recherche d'alliances et sur la fiche de chaque membre ;
   - **l'adhésion à une alliance à bannière demande une confirmation explicite** (« Cette alliance a levé sa bannière : en guerre, votre cité pourra être attaquée ») ;
   - **la levée de la bannière prévient tous les membres** au début des 72 h, ce qui laisse à chacun le temps de partir s'il ne veut pas en être.
3. **L'effectif se fige à la déclaration** : pendant la préparation de 24 h et la guerre, personne n'entre dans les deux alliances ; un membre qui part reste attaquable jusqu'à la fin de la guerre (le garde-fou validé « arrivées et départs », section 4.2).
4. **Le bouclier remplace le ban de guerre** comme issue individuelle : le membre qui ne veut pas combattre se protège par ses boucliers gagnés, et, si son alliance subit la guerre, par une couverture payante (section 4.3). Il renonce alors à agir pendant la durée du bouclier.
5. **Le héros** garde son rôle de chef de guerre (GDD 5.4) aux deux étages ; à l'étage 1, sa défaite sur une copie d'armée ne le rend pas indisponible.

**Pourquoi l'exposition de tous**, dans les termes de l'arbitrage de Gregory : avec un ban partiel, une alliance place ses meilleurs producteurs hors du ban et ses combattants dedans ; les premiers financent les seconds par transport, sans jamais rien risquer. Le combat oppose alors deux vitrines, et l'économie réelle de la guerre est intouchable. C'est le boosting de Last War. En exposant tout le monde, l'économie de l'alliance entre dans la guerre, ce qui donne aussi un sens à la défense groupée (ACS Défense).

**Ce que cela coûte**, et que la suite de l'étude doit compenser : le joueur pacifique qui a rejoint une alliance à bannière pour le PvE est exposé. Trois réponses : il est prévenu (confirmation, préavis de 72 h), il peut partir avant la déclaration, et il a des boucliers. Le reste (moral, limite par cible, butin plafonné, rendement décroissant du score) rend son pillage peu rentable (section 4.4).

### Risques

- **Moins d'alliances à bannière** qu'avec un ban partiel : beaucoup de chefs n'exposeront pas leurs membres pacifiques. Parade : récompenses de saison réservées aux alliances qui ont fait au moins une guerre ; contenu PvP sans risque à l'étage 1 pour les autres. À mesurer (S2).
- **Alliances qui se scindent** en une alliance de combat à bannière et une alliance de production sans bannière, reliées par un pacte commercial : c'est le boosting de Last War par un autre chemin. Parade : pendant une guerre, aucun transport ni échange de marché ne peut **entrer** dans une alliance en guerre depuis l'extérieur, pacte commercial compris ; et le lobby interdit à deux personnages d'un même propriétaire d'être dans deux alliances liées par un pacte (section 6.2). Le transport vers les tiers est par ailleurs fermé (question 12 du comparatif).
- **Pression sociale** sur le membre pacifique (« si tu ne veux pas te battre, pars ») : c'est la toxicité d'alliance, premier motif de départ (*reddit-vague-2*). Parade : le bouclier rend la non-participation possible sans quitter son alliance, et le score de guerre ne pénalise pas l'alliance pour ses membres sous bouclier (section 4.3).
- **Complexité perçue** : un seul écran « Guerre » dans l'Ambassade, et un état lisible sur chaque fiche de joueur (« Paix », « En guerre contre X jusqu'au … », « Sous bouclier jusqu'au … »).
- **Faible population** : avec 1 000 à 2 500 joueurs par serveur, il y aura peut-être trois ou quatre alliances à bannière. L'étage 1 ne dépend pas d'elles ; l'étage 2 pourra s'ouvrir entre serveurs plus tard, par le lobby.
- **Le joueur qui aimait le PvP sauvage** d'OGame ne trouve pas son compte. C'est assumé : ce n'est pas le public visé (persona « vétéran qui ne veut plus se faire raser la nuit »).

### À valider au simulateur

- **Taille des viviers** : sur un serveur de N joueurs actifs, combien d'adversaires dans la tranche de chaque joueur (étage 1) et combien d'alliances à bannière appariables (étage 2), selon un taux d'alliances à bannière de 10, 20, 30 %. Un module « population » est à créer : le simulateur actuel ne modélise qu'un joueur.
- **Coût d'une défaite** en jours de production, ressources, troupes et défenses comprises (angle 3, S3).

---

## 3. Angle 2 — Diplomatie et casus belli

### Constat

OGameX n'a aucune diplomatie : des alliances, des rangs, un classement. Le GDD place à l'Ambassade les pactes de non-agression et les pactes commerciaux. Gregory pose deux exigences : la diplomatie doit donner du sens à la vie des alliances, et une alliance du haut du classement ne doit pas pouvoir déclarer arbitrairement la guerre à une plus faible ; la guerre suppose un casus belli né de frictions en PvE ou dans des events.

Deux échecs connus encadrent le sujet : la déclaration de guerre libre et payante d'EVE Online (avant 2018), utilisée pour harceler les petits groupes, et les toiles de pactes de non-agression d'OGame ou d'EVE, qui fabriquent des blocs impossibles à contester.

### Les pactes (plafonds validés)

| Pacte | Effet | Plafond | Remarque |
|---|---|---|---|
| **Neutralité** | État par défaut | — | — |
| **Pacte commercial** | Ouvre le marché encadré entre deux alliances (GDD 4.2, levier anti-boosting) | Libre | Ne crée aucun lien militaire. **Suspendu pendant une guerre** pour l'alliance en guerre (section 2, risque de scission) |
| **Pacte de non-agression (PNA)** | Interdit la guerre entre les deux alliances | **2 à 3 au plus** | Sans plafond, les PNA forment des blocs |
| **Pacte défensif** | L'allié peut rejoindre une guerre **comme défenseur seulement**, et sa puissance compte dans le contrôle de tranche | **1 seul**, comme la confédération de Travian Kingdoms | Jamais d'entrée automatique (recommandé). L'allié qui entre en guerre lève de fait sa bannière pour cette guerre : **tous ses membres** deviennent attaquables, ce qui découle de l'arbitrage 2 et doit lui être dit avant qu'il accepte |
| **Rupture** | Fin d'un pacte | — | **Délai de 7 jours** avant toute guerre entre ex-partenaires |

### Options pour le casus belli

| | Principe | Précédent | Pour | Contre |
|---|---|---|---|---|
| **1. Déclaration libre, payante** | On paie pour déclarer, coût croissant | EVE avant 2018 | Simple | Harcèlement des petits ; un riche déclare à volonté |
| **2. Griefs accumulés** | Des frictions entre deux alliances créent des « griefs » ; au-delà d'un seuil, la guerre devient déclarable | New World (influence) | Le casus belli naît du jeu, comme le veut Gregory | Se « farme » si on ne fait pas attention |
| **3. Casus belli d'event** | Un event crée un conflit : un site de vestiges qui ressurgit entre deux alliances, la faction d'inspiration templière (lore 7) | Lore de Kalendrath | Narratif, borné dans le temps | Demande du contenu à chaque fois |
| **4. Défi accepté** | Une alliance lance un défi, l'autre l'accepte : guerre consentie des deux côtés | Duels, tournois | Le plus simple et le plus juste ; aucun grief à calculer | Ne crée pas de conflit entre alliances qui ne se parlent pas |

### Recommandation

- **Chapitre 1 du premier serveur : le défi accepté (option 4).** C'est le seul casus belli qui peut être prêt pour J21 sans risque d'injustice. Dans ce cadre, la guerre est voulue par les deux chefs ; les boucliers servent aux **membres** qui ne veulent pas combattre.
- **Dès que possible ensuite, les griefs (option 2)**, qui rendent une guerre imposable à une alliance à bannière qui ne l'a pas acceptée. C'est là que le bouclier devient pleinement « la défense des alliances pacifiques ou en retrait » (arbitrage 3). Règle qui empêche de les fabriquer : **une provocation donne un grief à celui qui la subit, jamais à celui qui la commet.** Si A espionne B à répétition, pille un camp que B attaquait, ou rompt un pacte avec B, c'est **B** qui gagne des griefs contre A. Sources proposées :
  - **ressources disputées en PvE** : deux alliances qui frappent le même camp ou le même vestige dans une fenêtre courte (le dernier coup porté par A sur une cible engagée par B donne un grief à B) ;
  - **espionnage** reçu d'une alliance avec qui on n'a pas de pacte ;
  - **events** : alliances voisines au classement d'une même ligue, qui se disputent un seuil ;
  - **rupture d'un pacte** par l'autre partie.
  Les griefs **s'effacent avec le temps** (la moitié tous les 14 jours) et sont **remis à zéro** par une guerre entre les deux alliances, une paix signée, une fusion de serveur ou un changement de chapitre.
- **Le casus belli d'event (option 3)** reste du contenu : la bonne place pour la faction d'inspiration templière du lore.
- **Déclencher n'est jamais suffisant** : un casus belli ouvre le droit de déclarer, mais la déclaration passe aussi les contrôles de l'angle 3 (bannière levée des deux côtés, tranche de puissance, ratio d'effectifs, une seule guerre subie, trêves).

**Déroulé d'une guerre** :
1. **Déclaration**, puis **préparation de 24 h** : le défenseur voit venir, ses membres activent leurs boucliers, il peut appeler son allié défensif. Les effectifs se figent.
2. **Guerre de 5 à 7 jours**, avec une **trêve quotidienne de 8 h** choisie par le défenseur. Pendant la trêve, aucune attaque ne part ni n'arrive.
3. **Score de guerre** : batailles gagnées pondérées par la force relative (angle 3). Un membre sous bouclier ne rapporte ni ne coûte de points.
4. **Fin** : à l'échéance, par reddition (le perdant accepte un tribut plafonné) ou par paix blanche signée des deux côtés. **Une guerre dont presque tous les membres du défenseur sont sous bouclier se termine en paix blanche** : l'agresseur n'y gagne rien, ce qui est le but.
5. **Trêve de 14 jours** entre les deux mêmes alliances, et griefs remis à zéro.

### Risques

- **Griefs « collatéraux »** : une alliance qui chasse beaucoup en PvE accumule des griefs de partout et devient déclarable par beaucoup. C'est voulu ; le plafond d'une seule guerre subie à la fois la protège de la curée.
- **Diplomatie hors jeu** : les pactes de fait, sur Discord, échappent au plafond de PNA. Le contrôle de tranche compte les alliés formels, pas les amis ; le vrai garde-fou est le plafond de membres.
- **Délai de développement** : la guerre devant exister au chapitre 1, la diplomatie minimale (PNA, pacte défensif, défi, bannière) doit être prête pour l'ouverture du premier serveur public. Les griefs peuvent arriver pendant le chapitre 1 ou au chapitre 2.

### À valider au simulateur

- **Rythme des griefs** : avec les sources proposées et un oubli de moitié tous les 14 jours, combien de jours faut-il à une alliance active pour atteindre le seuil contre une voisine ? Cible : 2 à 4 semaines d'activité concurrente réelle, jamais moins d'une semaine.
- **Pression sur les petites alliances** : une petite alliance à bannière très active en PvE devient-elle déclarable par trop d'alliances à la fois ?

---

## 4. Angle 3 — Garde-fous, boucliers, pertes

### 4.1 Constat

Dans OGame, le combat récompense la masse sans rendement décroissant : la plus grosse flotte gagne, prend 50 % des stocks, et les débris la renforcent. Avec l'attaque groupée (`FleetUnion`), une alliance nombreuse peut concentrer toute sa puissance sur une cible. L'exposition de tous les membres élargit la surface d'attaque : dans une alliance de 30, les écarts de puissance entre le premier et le dernier membre peuvent être de un à dix. Les garde-fous validés doivent donc protéger **les individus**, plus seulement les alliances.

### 4.2 Les garde-fous validés, et leur recalibrage

Les chiffres sont validés (arbitrage 4). La colonne « Recalibrage » signale ce qui change d'assiette avec la suppression du ban de guerre ou l'ouverture au chapitre 1 ; ces ajustements sont à confirmer (décision R5).

| Levier | Problème traité | Règle validée | Recalibrage proposé | Touche le moteur ? |
|---|---|---|---|---|
| **Plafond de membres** | Zerg, alliance-monde | **30 membres** par alliance au lancement, réglable par serveur ; jamais lié au niveau de l'Ambassade | Aucun. Il devient plus important : 30 membres, c'est 30 cibles et 30 attaquants | Non |
| **Plafond de pactes** | Blocs de PNA | 2 à 3 PNA, 1 pacte défensif | Aucun | Non |
| **Tranche de puissance à la déclaration** | La grosse alliance qui choisit sa victime | Puissance du camp visé ≥ **70 %** de celle de l'agresseur, alliés formels compris | **Assiette : toute l'alliance**, et non plus le ban. Les membres sous bouclier comptent quand même dans la puissance de leur alliance (sinon l'agresseur pourrait les désactiver pour passer sous le seuil) | Non |
| **Effectifs** | 30 contre 5 | L'agresseur ne peut pas dépasser **1,5 fois** l'effectif adverse | **Assiette : tous les membres.** Une alliance de 30 ne peut déclarer qu'à une alliance d'au moins 20. **Effectif minimal de 5 membres pour lever la bannière** (remplace le « ban minimal de 5 inscrits ») | Non |
| **Une seule guerre subie à la fois** | Curée | Une alliance en guerre ne peut pas recevoir une seconde déclaration | Aucun | Non |
| **Moral** | Le fort qui frappe le faible | Attaque réduite selon l'écart de puissance individuelle, **jusqu'à −40 %** à 3 contre 1 | **À avancer en V1 de l'étage 2** (la première version le repoussait) : la tranche d'alliance ne filtre plus les écarts individuels, qui deviennent la norme quand tout le monde est exposé | **Oui, à la marge** : un bonus négatif dans `ObjectPropertyService::calculateProperty()`, sans toucher aux rounds |
| **Limite d'attaques par cible** | Le « bash » répété | **3 attaques par cible et par 24 h**, toutes alliances confondues | Aucun. Une attaque groupée (ACS) compte pour une attaque par participant, pour qu'un groupe de 10 ne vide pas une cible en une fois | Non (vérification avant mission) |
| **Butin plafonné** | Le pillage comme pompe | **25 %** des stocks au lieu de 50 %, avec une part des stocks à l'abri (Silo, entrepôts) | Aucun sur le taux. La part à l'abri devient le premier rempart du petit joueur : la fixer de sorte qu'un stock de 24 h de production d'un joueur au palier Bourg soit entièrement protégé (à simuler) | Paramètre existant (`lootPercentage`) |
| **Rendement décroissant du score** | Écraser pour gonfler le score | Victoire multipliée par le rapport des forces ; points d'une même cible divisés par deux à chaque nouvelle victoire | **Battre une cible de moins d'un tiers de sa puissance ne rapporte aucun point de guerre.** Le pillage reste possible (pas d'immunité, section 4.4), mais il ne fait pas gagner la guerre | Non |
| **Avantages du défenseur** | Le choix de l'heure par l'attaquant | Trêve quotidienne de **8 h** choisie par le défenseur ; Remparts ; défenses réparées (~70 %) ; Hôpital plus généreux en défense | Aucun | Hôpital : oui (déjà prévu) |
| **Pertes** | Spirale de la défaite | *Ancienne formulation : « aucune perte définitive ».* | **Remplacé par l'arbitrage 5** : ressources, troupes et défenses se perdent ; cités et bâtiments jamais (section 4.5) | `MoonDestructionMission` à désactiver |
| **Protection des nouveaux** | Le débutant dans une alliance à bannière | Palier **Bourg et 14 jours de compte** | Elle ne peut plus porter sur l'inscription au ban, qui disparaît : **un compte protégé ne peut pas rejoindre une alliance à bannière** (et une alliance ne peut pas lever sa bannière tant qu'un de ses membres est protégé ; il doit attendre ou partir). Le « jamais avant J60 » disparaît, remplacé par J21 (section 5) | Non |
| **Arrivées et départs** | Le renfort de dernière minute, la fuite | 7 jours de présence avant de participer ; qui quitte l'alliance en guerre reste exposé jusqu'à la fin | Les 7 jours portent désormais sur **le droit d'attaquer** (un membre arrivé depuis moins de 7 jours est attaquable mais ne peut pas attaquer dans la guerre en cours) ; effectifs gelés de la déclaration à la fin de la guerre | Non |
| **Alliances satellites** | Une « académie » qui sert de réserve | Les alliances liées par pacte comptent ensemble ; le lobby empêche un même propriétaire d'être dans deux alliances liées | S'y ajoute la suspension des pactes commerciaux et de tout transport entrant pendant une guerre (section 2) | Non |
| **Fatigue de guerre** | La guerre permanente | 14 jours de trêve entre les deux mêmes alliances ; au-delà de 2 guerres déclarées par mois, la déclaration suivante coûte un délai | **Gel de la bannière** : 14 jours après une guerre **pour l'agresseur** ; le défenseur peut baisser sa bannière dès la fin de la guerre (72 h), pour qu'une alliance qui a subi une guerre puisse se mettre en retrait | Non |
| **Bouclier** | L'acharnement, et la défense des alliances qui ne veulent pas combattre | Gagné en jeu, interdit juste après avoir attaqué | **Refondu par l'arbitrage 3** : section 4.3 | Non |
| **Récompense de l'outsider** | Pourquoi défendre ? | Le perdant qui a tenu reçoit du Prestige proportionnel aux dégâts infligés ; une victoire de l'outsider vaut le double | Aucun | Non |

Tous ces réglages vivent dans `SettingsService`, pour rester ajustables par serveur sans migration. Les deux leviers qui comptent le plus restent ceux qui agissent **avant** la bataille : le plafond de membres et la tranche à la déclaration. Le troisième, avec l'exposition de tous, est le **moral**, seul à protéger le petit membre face au gros attaquant pendant la bataille.

### 4.3 Les boucliers dans le nouveau schéma

**Principe** (arbitrages 3, 6 et 8) : gratuits en jeu, stockables sans limite, strictement personnels ; payants pour une couverture continue ; ils sont la défense des alliances pacifiques ou en retrait. Le bouclier n'est pas le prix de la tranquillité : **qui veut la tranquillité rejoint une alliance qui ne déclare pas de guerre**, et la Paix par défaut le protège sans bouclier.

**Où ils servent.** Un joueur seul ou une alliance sans bannière n'en a pas besoin : la Paix par défaut le protège toujours (décision R2). Le bouclier sert dans trois cas :
1. le **membre pacifique** d'une alliance à bannière en guerre, qui ne veut pas combattre sans quitter son alliance ;
2. l'**alliance en retrait** : elle a levé sa bannière, puis veut s'arrêter ; la bannière ne se baisse qu'en 72 h et pas pendant une guerre, et le bouclier couvre l'intervalle ;
3. l'**alliance pacifique déclarée** par griefs (quand ils existeront) : elle avait levé sa bannière sans chercher la guerre, et la subit.

**Ce que fait un bouclier** :
- le joueur ne peut plus être attaqué, espionné ni visé par des missiles ;
- **toute action hostile sortante le rompt** (arbitrage 6). Avant l'action, un **avertissement demande une confirmation** (« Cette action rompra votre bouclier, qui courait encore 14 h. Continuer ? ») ; un bouclier gratuit rompu est consommé ;
- **définition de « hostile » à confirmer (point ouvert, R4)** : attaque, espionnage et missile le sont sans discussion. **Recommandé : compter aussi comme hostile, pendant une guerre, tout soutien à un membre d'une alliance belligérante** (transport, déploiement, défense groupée, échange de marché), même au sein de sa propre alliance. Sans cela, un producteur sous bouclier ravitaille les combattants en toute sécurité : c'est le boosting de Last War, que l'arbitrage 2 voulait empêcher, rétabli par le bouclier. Récolter un champ de ruines hors de sa propre cité est traité de même (section 4.6) ;
- il ne s'active pas dans les **12 h** qui suivent une attaque menée par le joueur (règle du GDD, durée à confirmer) ;
- il s'active pendant la préparation de 24 h ou pendant la guerre ; il ne sert **qu'en guerre** (hors guerre, la Paix par défaut suffit) ;
- **usage strictement personnel** : un bouclier ne se donne, ne s'échange, ne se vend entre joueurs ni ne s'applique à un autre ; il n'existe pas de bouclier d'alliance. Le stock est attaché au personnage, donc au serveur (un serveur par chapitre) : il ne passe pas d'un chapitre à l'autre, il suit le personnage lors d'une fusion.

**Gratuit et payant** :

| | Gratuit (gagné en jeu) | Payant (couverture continue) |
|---|---|---|
| **Comment on l'obtient** | Quêtes, events PvE, récompenses de ligue, Kaelite gagnée | Boutique (Kaelite achetée), ou pass |
| **Couverture** | Par unités (proposition : 24 h), **stock illimité** : le joueur choisit de les garder ou de les utiliser. Une guerre de 7 jours avec 8 h de trêve quotidienne expose 112 h, soit 5 boucliers de 24 h | **Continue** sur toute la guerre en cours, pour le joueur qui l'achète. **Recommandé : non stockable**, acheté pour une guerre déclarée, pour qu'on ne constitue pas en paix une réserve achetée |
| **Qui y a droit** | Tout membre d'une alliance en guerre, des deux côtés | *Proposition maintenue, à confirmer (R4)* : seulement l'alliance qui subit la guerre, si elle n'a déclaré aucune guerre dans les 30 derniers jours. On ne déclare pas une guerre pour ensuite acheter son immunité |
| **Ce qu'il ne fait jamais** | Être transféré | Rendre invulnérable un joueur qui attaque ; être vendu hors guerre ; couvrir toute une alliance d'un seul achat |

**Le vrai réglage n'est plus le stock, c'est le rythme de gain.** Sans plafond, ce qui borne la couverture gratuite est le nombre de boucliers gagnés par semaine. Repère : une guerre tous les 21 jours au plus contre une même alliance (7 jours de guerre, 14 de trêve) consomme 5 boucliers si l'on veut tout couvrir. Si le jeu en donne 5 ou plus par période de 21 jours, un joueur patient n'est jamais exposé et le payant ne sert à rien ; s'il en donne environ 3 (un tous les 7 jours), on retrouve la couverture des deux tiers visée par la première version, et le stock grossit seulement chez qui saute des guerres. Proposition de départ : **un bouclier de 24 h par semaine d'activité**, avec un plafond de **gain** hebdomadaire (pas de stock) pour que le farm du PvE ne l'emporte pas. À simuler (S10).

**Mode vacances en guerre** (arbitrage 7). Permis, pour qu'un joueur qui part en congé ne soit pas pris en otage par une guerre décidée sans lui. Encadré :
- **48 h au minimum** (déjà dans le code) ; **non enchaînable** : **72 h d'attente après la levée** avant de pouvoir le relancer (à coder) ;
- pas de durée maximale : un joueur peut rester en vacances toute la guerre ;
- le code le rend déjà coûteux : production des mines à 0, files gelées, aucune mission ne part, activation refusée si une de ses flottes est en vol ;
- **recommandé, à confirmer** : même délai de 12 h après une attaque menée que pour le bouclier, et activation refusée si une attaque ennemie est déjà en vol vers lui (le code ne vérifie la cible qu'au lancement ; le sort d'une flotte déjà en route est à fixer par un test Pest) ;
- un membre en vacances compte dans l'effectif et dans la puissance de son alliance, et ne rapporte ni ne coûte de points de guerre, comme un membre sous bouclier.

**Risques réexaminés** :

- **Stock illimité, exploitation.** Le farm de boucliers par le PvE répétitif est borné par le plafond de gain hebdomadaire, pas par le stock. Le multicompte ne sert à rien, puisque rien ne se transfère. Reste la conversion de la Kaelite **gagnée** en boucliers : à compter dans le même plafond de gain.
- **Accumulation avant une guerre.** Un membre qui saute les premières guerres de son alliance arrive à la suivante avec de quoi la couvrir entière : c'est voulu (il a choisi de stocker). Une alliance entière qui stocke rend une guerre vide, qui finit en paix blanche (section 3) ; acceptable pour une guerre **subie**. Pour une guerre par **défi accepté**, accepter puis tout couvrir revient à vider la guerre sans en payer le prix : **proposition**, une alliance dont plus de la moitié des heures d'exposition de ses membres est couverte par boucliers ou vacances est comptée comme ayant **rendu les armes** dans un défi (sans tribut). À confirmer.
- **Exposition sélective chez l'agresseur.** Avec des boucliers abondants, une alliance agressive met ses membres faibles à l'abri et n'expose que ses combattants : c'est le ban partiel que l'arbitrage 2 a supprimé. Il n'est inoffensif que si le membre sous bouclier ne peut **rien** faire pour la guerre, d'où la définition large de « hostile » ci-dessus. C'est le risque principal du stock illimité.
- **Bouclier de dernière seconde.** Un joueur en ligne voit l'attaque venir et active un bouclier juste avant l'impact ; avec un stock illimité, chaque attaque devient esquivable. **Proposition** : une attaque déjà lancée frappe quand même, ou, à défaut, la flotte repart sans perte ni consommation. À trancher (R4).
- **Mode vacances comme bouclier infini.** Possible (pas de durée maximale), mais cher : une semaine de vacances coûte une semaine de production et de construction, bien plus que les pertes visées pour un membre pacifique exposé (moins de 2 jours de production, S3). Le contournement ne paie pas, sauf pour un joueur déjà inactif, qui de toute façon ne produit rien à piller au-delà de la part à l'abri.
- **Alternance vacances / bouclier.** Cycle possible : vacances 48 h, puis boucliers pendant les 72 h d'attente, puis vacances. Il couvre une guerre entière à moindre coût en boucliers, au prix de 2 jours de production sur 5. Acceptable ; à mesurer (S14).
- **Abus du délai d'attente.** Les 72 h peuvent piéger un joueur de bonne foi rentré de congé juste avant une déclaration ; ses boucliers stockés couvrent ce cas. L'abus inverse (lever les vacances pour frapper, puis compter sur l'attente de l'adversaire) n'existe pas : l'attente ne protège personne, elle empêche seulement de repartir.
- **Pression sociale** : des chefs pourraient exiger que les membres « gardent leurs boucliers pour la vraie guerre » ou n'en utilisent pas. Le stock personnel et non transférable laisse le choix au joueur ; la règle de score (aucun point perdu pour un membre sous bouclier) retire l'argument.

### 4.4 La protection des petits joueurs

Dans une alliance en guerre, le plus petit membre est attaquable. Deux familles de protection existent ; l'étude n'en retient qu'une.

- **Écartée : l'immunité par la puissance** (un joueur trop faible ne peut pas être attaqué, comme le suggère le statut « faible » d'OGameX). Elle **recrée le boosting** : il suffirait de garder ses producteurs faibles militairement pour qu'ils deviennent intouchables. C'est exactement le schéma de Last War.
- **Retenue : la protection qu'on ne peut pas simuler.**
  - **l'âge du compte** (14 jours et palier Bourg avant de rejoindre une alliance à bannière) : on ne peut pas rester jeune ;
  - **le moral** (−40 % à 3 contre 1) : attaquer plus petit coûte plus de troupes ;
  - **la part des stocks à l'abri** et le butin à 25 % : le petit a peu à prendre ;
  - **le rendement nul du score** sous un tiers de sa puissance : l'attaquer ne fait pas gagner la guerre ;
  - **3 attaques par cible et par 24 h** : on ne le vide pas en une soirée ;
  - **les boucliers gratuits**, et la défense groupée de ses alliés.

L'effet cherché : le petit membre peut être pillé, mais **le piller ne rapporte presque rien et coûte cher**. Le simulateur le vérifie (S4, S11).

### 4.5 Butin et pertes

**Ce qui se perd en guerre** (arbitrage 5) :

| Élément | Perte | Mécanique | Adoucissement |
|---|---|---|---|
| Ressources | Oui | 25 % des stocks au-delà de la part à l'abri, plafonné par le fret | Silo, entrepôts, limite de 3 attaques par 24 h |
| Troupes | Oui | Pertes de la bataille (formules d'OGameX) | Hôpital : une part des pertes devient des blessés (GDD), plus généreux en défense |
| Défenses | Oui | Pertes de la bataille, missiles | ~70 % réparées après combat (déjà dans le moteur) |
| Héros | Non | Indisponible pour une durée qui dépend de son niveau | — |
| **Bâtiments** | **Jamais** | — | Aucune mission ne détruit un bâtiment ; `MoonDestructionMission` désactivée |
| **Cité** | **Jamais** | OGameX n'a pas de conquête | À garder ainsi : pas de conquête de cité, même plus tard |

**Ce qui change par rapport à la première version** : la promesse n'est plus « on ne perd presque rien », mais « **on ne perd jamais ce qu'on a bâti** ». Les troupes et les défenses sont l'enjeu de la guerre ; les bâtiments et la cité sont hors d'atteinte.

**Risques propres aux pertes** :
- **Spirale de la défaite** : une alliance qui perd ses troupes perd la guerre suivante. Parades : trêve de 14 jours entre deux mêmes alliances, une seule guerre subie, baisse de la bannière autorisée au défenseur dès la fin de la guerre, Hôpital.
- **Débris** : le champ de ruines pèse plus que le butin et rétablit la rentabilité de la destruction d'armée ; chiffrage, effet de pompe et leviers en section 4.6.
- **Tribut de reddition** : plafonné (proposition : au plus une journée de production du perdant), sinon il devient une rançon.

### 4.6 Débris : le poids du champ de ruines

*Arbitrage 9. Chiffres du code d'OGameX au 2026-10-30 ; les batailles ci-dessous sont des ordres de grandeur, pas des simulations. Vocabulaire : débris = **champ de ruines**, recycleur = **Récupérateur** (GDD 4.4, 4.5) ; métal = Bois, cristal = Fer, deutérium = Mana.*

**Ce que fait le moteur hérité** (`BattleEngine::calculateDebris()`, `AttackMission`, `RecycleMission`, `SettingsService`) :

| Règle | Valeur | Réglage |
|---|---|---|
| Unités détruites → ruines | **30 %** du coût en Bois et Fer, pertes **des deux camps** additionnées | `debris_field_from_ships` |
| Défenses détruites → ruines | **0 %** (et les défenses réparées ne comptent pas) | `debris_field_from_defense` |
| Mana dans les ruines | Non | `debris_field_deuterium_on` = 0 |
| Où | Sur l'Éclat du défenseur | — |
| Qui récolte | **N'importe quel joueur** qui envoie des Récupérateurs (aucune vérification de propriétaire, d'alliance ni de guerre) ; premier arrivé, premier servi | — |
| Durée de vie | **Aucune décroissance** ; seuls les champs vides sont effacés, chaque lundi à 1 h | `ResetDebrisFields` |
| Capacité d'un Récupérateur | 20 000 | — |
| Collecte automatique | Le `reaper` (classe General) prélève 30 % des ruines pour l'attaquant, sans Récupérateur | `CharacterClassService` (statut du `reaper` [TBD] au GDD) |
| Épaves (`WreckField`) | Le défenseur récupère en plus 31,5 % à 39 % de ses unités perdues selon le niveau du `space_dock` (au-delà de 150 000 de pertes et 5 % de sa flotte) | Le `space_dock` devient l'**Hôpital** (GDD 4.2) : ce mécanisme sera remplacé par les blessés |
| Chance de lune | 1 % par 100 000 de ruines | **Sans objet** (lunes supprimées) : à désactiver avec `MoonDestructionMission` |

**Ordres de grandeur.** Ruines par unité perdue : `light_fighter` 1 200, `heavy_fighter` 3 000, `cruiser` 8 100, `battle_ship` 18 000, `destroyer` 33 000. Une bataille où l'attaquant (200 `cruiser`) écrase le défenseur (100 `cruiser`) en perdant 30 des siens :

| | Valeur (Bois + Fer) |
|---|---|
| Pertes de l'attaquant | 810 000 |
| Pertes du défenseur | 2 700 000 |
| **Champ de ruines** (30 % du total) | **1 053 000**, soit 53 Récupérateurs |
| Butin à 25 %, sur 600 000 de stock hors part à l'abri | 150 000 |
| Bilan de l'attaquant **sans** ruines | **− 660 000** |
| Bilan de l'attaquant s'il récolte tout | **+ 393 000** |

**Le poids** : dans cette bataille, le champ de ruines vaut **7 fois le butin**. Le butin à 25 %, la part à l'abri et la limite de 3 attaques visent à rendre le pillage peu rentable ; **les ruines rétablissent la rentabilité dès qu'on détruit l'armée adverse**. C'est la culture d'OGame (« faire de la ruine », raser une flotte pour son champ), et c'est elle, pas le butin, qui décide si la guerre paie. Corollaire : un membre pacifique sans armée ne produit presque pas de ruines (défenses à 0 %) ; c'est le membre **combattant** battu qui nourrit son vainqueur, et la spirale de la défaite passe par là.

**Effet de pompe.**
- **Entre deux camps**, le champ ne crée rien : il rend 30 % de ce qui a été détruit. Un combat arrangé coûte donc toujours 70 % des pertes à la paire de complices (S9 négatif). Mais il **transfère** : A sacrifie 1 000 000, B récolte 300 000. Avec le transport vers les tiers fermé, les ruines deviennent un **canal de transfert à 30 %** entre joueurs non liés, et un moyen de réduire de 30 % le coût d'une **guerre factice** par défi accepté montée pour les récompenses (Prestige, titres, Kaelite gagnée).
- **Avec l'Hôpital, la pompe devient réelle** : si une unité « blessée » qui revient au combattant compte aussi dans les pertes qui font les ruines, le rendement total vaut taux de l'Hôpital + 30 %. À 70 % de blessés, une bataille ne détruit plus rien et crée des ressources. Le moteur sait déjà éviter ce piège pour les défenses (seules les défenses non réparées comptent) ; il faut la même règle pour les blessés.
- **Les vautours** : une alliance neutre, sans bannière, peut récolter les champs d'une guerre qui ne la concerne pas. Elle s'enrichit de la guerre des autres sans risque, et sert de **réserve** à une alliance belligérante (le boosting par la scission production / combat, section 2, par un autre chemin).
- **Hors guerre**, une attaque de bot contre un joueur laisse un champ sur sa cité, que n'importe quel voisin peut récolter : une nuisance contraire à la Paix par défaut.

**Leviers de réglage** :

| Levier | Effet | Coût |
|---|---|---|
| **Pertes définitives seulement** (blessés et défenses réparées exclus) | Supprime la pompe de l'Hôpital | Faible, dans `calculateDebris()`, au moment de coder l'Hôpital |
| **Taux de guerre distinct** (30 % hors guerre, par exemple 15 % ou 0 % en guerre) | Divise d'autant la rentabilité de la destruction d'armée | Faible : un réglage de plus, lu selon l'état de guerre |
| **Récolte réservée** : en guerre aux deux belligérants ; hors guerre au propriétaire de l'Éclat | Plus de vautours, plus de nuisance PvE | Faible : une vérification dans `RecycleMission::isMissionPossible()` |
| **Récolte sous bouclier** : récolter un champ hors de sa propre cité rompt le bouclier | Un membre à l'abri ne ramasse pas les gains des combattants | Faible |
| **Décroissance** (par exemple − 25 % toutes les 12 h) | Favorise le défenseur, qui récolte chez lui ; tarit les champs oubliés | Moyen : tâche planifiée |
| **Plafond commun butin + ruines** par attaquant et par jour | Borne le gain total d'une guerre | Moyen : compteur par joueur |
| **Collecte automatique du `reaper`** désactivée en guerre | Évite qu'une classe récolte sans Récupérateur | Faible |
| **Comptes liés** : jamais de récolte d'un champ créé par un compte du même propriétaire | Ferme le transfert à soi-même | Faible, par le lobby |
| Chance de lune désactivée | Supprime un effet sans objet | Faible |

**Recommandation** (à confirmer, R10) : en V1 de l'étage 2, **pertes définitives seulement**, **récolte réservée** (belligérants en guerre, propriétaire hors guerre), **rupture du bouclier à la récolte hors de chez soi**, **reaper sans collecte automatique en guerre**, chance de lune désactivée. Le **taux de guerre** se fixe au simulateur, en partant de 15 %. Le taux hors guerre (PvE) reste à 30 %, hérité. Aucune formule de combat ne change : tout se joue sur des paramètres et des vérifications avant mission.

**À simuler** (S9, S13) : avec le module de combat, sur des batailles types de J21, J45 et J90, le bilan de l'attaquant (pertes, butin, ruines) pour des taux de 0, 15 et 30 %, et le bilan d'un combat arrangé avec un Hôpital à 30, 50 et 70 %. Cibles : une victoire nette reste rentable ou neutre (sinon personne ne se bat) ; une victoire contre un adversaire de moins d'un tiers de sa puissance ne l'est pas (S11) ; un combat arrangé est toujours perdant ; le champ de ruines ne dépasse pas, sur une guerre, deux fois le butin total.

### 4.7 Risques de l'ensemble

- **Trop de garde-fous tuent la guerre** : si personne ne trouve d'adversaire déclarable, l'étage 2 reste vide. Mesurer le nombre de paires déclarables (S2) ; le défi accepté ne demande que l'accord des deux.
- **Contournement par la tranche** : une alliance forte gonfle artificiellement son adversaire pour pouvoir le déclarer. Seul l'allié défensif choisi par le défenseur compte de son côté.
- **Puissance mal mesurée** : le score OGameX (ressources dépensées / 1 000) confond économie et armée. Une tranche fondée sur lui serait injuste (angle 5).
- **Pay-to-win, côté puissance** : un payeur arrive plus fort ; la tranche et le moral neutralisent son avance face à plus faible, pas face à son égal. Il ne domine que dans sa tranche.
- **Pay-to-win, côté bouclier** : une alliance défenseure qui paie tout se rend intouchable. C'est accepté (elle ne voulait pas cette guerre, et la guerre finit en paix blanche) ; ce qui ne l'est pas, c'est qu'un agresseur s'en serve, d'où la réservation au défenseur et la rupture du bouclier à toute action sortante.

### 4.8 À valider au simulateur

- **Effet du moral** : courbe de victoire d'un joueur de puissance P contre un de puissance P/k, avec et sans moral. Nécessite un **module de combat** (appeler le moteur Rust ou PHP en lot depuis une commande artisan ; le JavaScript agrège).
- **Pertes par guerre** : ressources, troupes et défenses, en jours de production, pour un membre actif, un membre pacifique sous boucliers gratuits, un membre au palier Bourg.
- **Paires déclarables** selon le plafond de membres et le seuil de tranche, maintenant calculés sur toute l'alliance.
- **Rythme de gain des boucliers gratuits** : avec un stock illimité, quelle part d'une guerre un gratuit actif couvre-t-il, à J21, J45 et J90 ?
- **Poids des ruines** : bilan d'une bataille selon le taux de ruines et le taux de l'Hôpital (section 4.6).

---

## 5. Angle 4 — Ligues, saisons et calendrier

### Constat

Le plan marketing promet des **ligues de niveaux** pour les events PvP et un **classement de bêta**. Le genre montre trois cadences : un event PvP d'alliance toutes les deux semaines (Ark of Osiris), une grande guerre par âge de serveur (KvK vers J100, SvS vers J80), et des ligues à montée et descente (Forge of Empires). Gregory a fixé l'ouverture des guerres au chapitre 1 ; il reste à fixer un délai minimal.

### Le délai minimal de la guerre : J21 (proposition)

**Proposition : aucune déclaration avant J21 d'un serveur ; première guerre active à J22 au plus tôt** (24 h de préparation). Réglable par serveur. Avant J21, l'attaque entre joueurs est fermée par le blocage global déjà présent dans le code.

**Justification** :

1. **La mécanique validée impose déjà J14 au moins.** Un compte a besoin de 14 jours (et du palier Bourg) pour rejoindre une alliance à bannière ; une alliance a besoin de membres présents depuis 7 jours pour attaquer, puis de 72 h pour lever sa bannière. Pour la vague d'ouverture, cela fait J14 au plus tôt, avec des alliances à peine formées.
2. **Une semaine de plus pour que tout le monde soit exposable en connaissance de cause.** Puisque tous les membres sont attaquables, l'alliance doit avoir eu le temps de se trier : chacun voit la bannière, les pacifiques partent ou se préparent. J21 donne une semaine entière entre la fin de la protection de la vague d'ouverture et la première guerre.
3. **Des défenses et des stocks à l'abri.** À J21, un joueur actif a un Silo et des Remparts (à vérifier au simulateur : S12) ; le butin à 25 % et la part à l'abri ont alors un sens. Avant, une attaque viderait une cité qui n'a rien pour se défendre.
4. **Un score de puissance militaire qui veut dire quelque chose.** La tranche et le moral s'appuient sur l'indice militaire ; dans les deux premières semaines, il est faible et bruité, et la tranche de 70 % y laisse passer des appariements absurdes.
5. **Le chapitre reste un chapitre de guerre.** Sur 90 à 120 jours, J21 laisse 70 à 100 jours de guerre possible, soit **3 à 5 cycles** de guerre et de trêve entre deux mêmes alliances (7 jours de guerre, 14 jours de trêve), et davantage avec plusieurs adversaires. J60 n'en laissait que 1 à 3.
6. **Les références J80 ou J100 ne s'appliquent pas** : elles portent sur des guerres de masse entre serveurs que personne n'a choisies. Ici, la guerre est consentie par l'alliance, et les protections des jeux d'alliance (Tribal Wars 5 jours, Grepolis 7 jours) sont plus proches de notre cas. J21 reste prudent face à elles, parce que l'exposition est collective.

**Variante possible** : autoriser le **défi accepté** dès J14, puisqu'il est voulu des deux côtés, et réserver J21 aux guerres par griefs. Elle gagne une semaine au prix d'une règle de plus ; à ne retenir que si les premières alliances la réclament.

**Fin de chapitre et fusion** : aucune déclaration dans les **10 jours** qui précèdent une fusion annoncée ; toutes les guerres prennent fin avant la fusion (section 6.2).

**Retardataires** : la protection porte sur l'âge du compte, pas sur l'âge du serveur. Un joueur qui arrive à J50 a ses 14 jours avant de pouvoir rejoindre une alliance à bannière, quel que soit le calendrier du serveur.

### Ligues

- **Tranches calculées, pas des seuils fixes** : chaque ligue regroupe un pourcentage des inscrits selon un **score de puissance militaire** (angle 5), recalculé à chaque saison. Sur un serveur de 1 000 joueurs dont 20 % s'inscrivent, 4 ligues de 50 ; au-delà, on en ajoute.
- **Montée et descente** à chaque saison.
- **Ligues d'alliances** séparées des ligues individuelles, calculées sur la puissance moyenne des membres de l'alliance (pas sur la somme, qui avantagerait les plus nombreuses).
- **Noms** : à proposer avec le skill `lexique-kalendrath`, en français et en anglais.

### Saisons

- **Une saison PvP = un chapitre** (~4 mois), découpée en **manches de deux semaines**.
- **Calendrier relatif à `t0`** : tournoi individuel (étage 1) à partir de **J14** ; champ de bataille d'alliances à partir de J21 ; guerre déclarée (étage 2) à partir de **J21**. L'étage 1, sans pertes, peut s'ouvrir plus tôt que la guerre ; J14 laisse aux joueurs deux semaines de construction sans distraction.
- **Récompenses** : titres, effets cosmétiques, **calques de capitale**, Prestige, petite quantité de Kaelite **gagnée** (liée au serveur), boucliers gratuits. Jamais d'unité, de ressource ou d'objet de puissance exclusif. Les récompenses de saison reviennent après 12 mois sous forme cosmétique.
- **Pas de pertes réelles dans les events** : les combats de l'étage 1 se jouent sur des copies ; le héros vaincu n'y est pas indisponible.

### Recommandation

1. **Bêta : le tournoi asynchrone sur copies d'armées**, avec 3 ou 4 ligues. Il donne au classement de bêta un contenu PvP sans risque, et il teste le score de puissance.
2. **Chapitre 1 du premier serveur public : la guerre par défi accepté** (étage 2), dès J21.
3. **Chapitre 1 ou 2 : le champ de bataille d'alliances** (modèle Forge of Empires) et les **griefs**.
4. **Jamais de siège à heure fixe imposée** tant que le public visé est l'adulte qui joue 3 à 6 visites courtes par jour.
5. **Ligues entre serveurs** quand plusieurs serveurs existent, par le lobby. Hors périmètre V1.

### Risques

- **Copies d'armées** : la simulation doit être sans effet de bord (`simulateBattle()` évalue la retraite et peut prélever du carburant, à vérifier). Un test Pest vérifie qu'un combat de tournoi ne modifie aucune donnée.
- **Classement acheté** : un payeur monte vite en ligue, où il affronte plus fort. Le classement de chaque ligue récompense les meilleurs de leur tranche.
- **Sandbagging** : la tranche se calcule sur le maximum de puissance atteint pendant les 30 derniers jours.
- **Ligues trop vides** au lancement : nombre de ligues calculé sur le nombre d'inscrits, minimum de 30 joueurs par ligue.
- **Une guerre au chapitre 1 avant que l'étage 1 ait fait ses preuves** : la bêta est le seul banc d'essai du score de puissance avant les vraies guerres. Si la bêta ne teste pas aussi l'étage 2, la première guerre réelle se jouera sur un serveur public.

### À valider au simulateur

- **Distribution du score de puissance** par profil et par ancienneté : les ligues séparent-elles un payeur de J90 d'un gratuit de J30 ?
- **Vitesse de montée de ligue** d'un payeur et d'un gratuit.
- **Poids des récompenses** de saison : la Kaelite gagnée en PvP reste sous 10 % du total gagné.
- **État d'un joueur actif à J14 et J21** (défenses, Silo, indice militaire), pour confirmer le délai.

---

## 6. Angle 5 — Cohérence avec le reste du projet

### 6.1 PvE-first

- **Le PvP n'est jamais nécessaire à la progression** : aucune ressource, aucune unité, aucun matériau de prérequis ne vient seulement du PvP.
- **Le butin PvP ne doit pas être une pompe** : butin à 25 %, limite par cible, fermeture du transport vers des tiers (question 12 du comparatif), et, pendant une guerre, aucun transport entrant depuis l'extérieur.
- **Le PvE garde la tension** (leçon d'Everdale) : les bots attaquent, les pertes existent.
- **Le PvE nourrit le PvP** : les griefs naissent des cibles PvE disputées, et les boucliers gratuits se gagnent en PvE. Un joueur pacifique se protège donc en jouant au cœur du jeu.

### 6.2 Format serveur par chapitre

- **Tout se calcule depuis `t0`** : tournoi à J14, guerre à J21, saisons calées sur les chapitres.
- **Un serveur neuf protège les nouveaux par construction** : personne n'y a d'avance, et la guerre n'y ouvre qu'à J21. Sur un ancien serveur, le nouveau venu est protégé par la Paix par défaut et par les 14 jours de compte avant de rejoindre une alliance à bannière.
- **Fusion** : aucune déclaration dans les 10 jours qui précèdent ; toutes les guerres prennent fin, pactes et griefs remis à zéro, ligues recalculées, bouclier général gratuit pendant les premiers jours (modèle Kingshot et Whiteout). **Les bannières sont baissées d'office** à la fusion, et chaque alliance qui veut la relever repasse par les 72 h et le préavis à ses nouveaux membres.
- **Comptes liés** : deux personnages d'un même propriétaire ne peuvent jamais être dans des alliances opposées dans une même guerre (combat arrangé), ni dans deux alliances liées par un pacte, ni l'un dans une alliance à bannière et l'autre dans une alliance qui commerce avec elle (scission production / combat).
- **Kaelite** : les récompenses PvP se versent en Kaelite **gagnée**, liée au serveur ; les boucliers payants se paient en Kaelite **achetée** (GDD 9).

### 6.3 Formules de combat héritées

- **Ce qu'on garde** : rounds, rapidfire, technologies additives, réparation des défenses, débris, attaque et défense groupées. Aucune formule ne change.
- **Ce qu'on ajoute aux bords du moteur**, dans la marge de la Phase 4 :
  - les règles d'accès dans `AttackMission::isMissionPossible()` (bannière, état de guerre, bouclier, limite par cible, trêve, comptes liés), étendues à `MissileMission` et à `EspionageMission` ;
  - la rupture du bouclier dans les missions hostiles sortantes (`AttackMission`, `EspionageMission`, `MissileMission`, et selon R4 `TransportMission`, `DeploymentMission`, `AcsDefendMission`, `RecycleMission`), avec l'avertissement de confirmation côté interface ;
  - l'encadrement du mode vacances en guerre (72 h d'attente après la levée, à ajouter à `PlayerService`) ;
  - les ruines : pertes définitives seulement, récolte réservée dans `RecycleMission::isMissionPossible()`, taux de guerre, chance de lune désactivée (section 4.6) ;
  - la désactivation de `MoonDestructionMission` ;
  - le butin de guerre par le paramètre `lootPercentage` ;
  - le moral comme bonus négatif dans `ObjectPropertyService`, dès la V1 de l'étage 2 ;
  - l'Hôpital, déjà prévu au GDD.
- **Score de puissance** : un **indice militaire** (troupes, défenses, héros et équipement, technologies de combat), distinct du score général, qui compte les mines.
- **Les nouveautés de combat** (soigneur, grades, tiers d'unités) passent par le module de combat du simulateur avant d'entrer au GDD.

### 6.4 Lore

- **La Paix par défaut a une explication dans l'univers** : l'Obélisque de chaque cité « sécurise la zone » (GDD 4.2, lore 1). Extension proposée : il protège la cité de toute incursion d'un autre royaume humain, tant que son alliance n'a pas levé sa bannière. Lever la bannière, c'est renoncer à cette protection pour soi et pour tous les siens, ce qui rend lisible l'exposition de tous les membres. **Extension à valider** : le lore ne dit aujourd'hui que « contre les incursions de plans ».
- **Le bouclier** peut se lire comme un appel ponctuel à l'Obélisque (un rite, une offrande de mana). Le nom est à trouver avec `lexique-kalendrath`.
- **Les guerres entre royaumes humains** sont cohérentes avec l'Âge des Fondations : les royaumes se disputent les Éclats stables et les vestiges qui ressurgissent près du Gouffre.
- **Piste pour plus tard** : l'Aspect du Seuil des Vahrun pourrait attiser les discordes entre royaumes, à distiller très progressivement (lore 7).
- **La faction d'inspiration templière** (lore 7) est le casus belli d'event idéal.
- **Vocabulaire** à valider avec `lexique-kalendrath` : bannière levée (*War Banner*), grief (*Grievance*), défi (*Challenge*), trêve (*Truce*), bouclier (*Shield*, ou un nom propre à l'univers), pacte de non-agression (*Non-Aggression Pact*), pacte défensif (*Defensive Pact*). **« Ban de guerre » (*War Muster*) disparaît.** « Mode de Guerre » (*War Mode*) disparaît, ou désigne l'état d'une alliance à bannière levée.

### 6.5 Marketing

- **« Un joueur pacifique ou sans alliance ne se fait pas écraser par plus fort que lui »** (plan marketing 2) tient à condition de lire « pacifique » comme « dans une alliance qui n'a pas levé sa bannière ». Dans une alliance à bannière, un membre peut être attaqué par plus fort que lui ; il est prévenu, il a des boucliers, et le moral et la tranche limitent l'écart. **La formulation est à revoir** dans le plan marketing (décision R13). **Proposition de reformulation (R13), non validée par Gregory** : *« Le PvP n'est jamais injuste : une guerre se déclare, vous êtes prévenu, et l'écart de force est borné entre adversaires. »* / *"PvP is never unfair: war is declared, you are warned, and the gap between opponents is capped."* Elle suit l'argument arrêté « le PvP n'est jamais injuste », ne promet plus l'immunité du joueur pacifique, et ne dit rien de la boutique ni des boucliers (décision du 2026-10-27, pas de communication sur le pay-to-win). Ce qu'elle affirme (déclaration, avertissement, tranche et ratio) doit rester vrai à la sortie ; à passer par `voix-kalendrath` avant tout usage.
- **« Un empire qu'aucun autre joueur ne viendra raser dans votre sommeil »** tient mieux qu'avant : une cité ne se rase jamais, aucun bâtiment ne se détruit, et la trêve quotidienne couvre la nuit.
- Formulation possible pour la vitrine, à passer par `voix-kalendrath` : *« La guerre se déclare, elle ne se subit pas. Les alliances qui le veulent lèvent leur bannière ; les autres bâtissent en paix. Et quoi qu'il arrive, ce que vous avez bâti reste debout. »*
- **Le bouclier payant ne se met jamais en avant** dans la communication, pour ne pas laisser croire que la sécurité s'achète.

---

## 7. Plan de mise en œuvre proposé

| Étape | Contenu | Quand | Domaine touché | Effort |
|---|---|---|---|---|
| 0 | Fermer le transport vers les tiers ; désactiver `MoonDestructionMission` ; garder l'attaque entre joueurs fermée par le blocage global | Avant l'alpha | `TransportMission`, réglage serveur | Faible |
| 1 | Score de puissance militaire ; tournoi asynchrone en ligues sur copies d'armées | Bêta | Service de score, service de tournoi, simulation sans effet de bord | Moyen |
| 2 | Bannière, pactes (PNA, pacte défensif, commercial), défi accepté, état de guerre, effectifs gelés | **Avant l'ouverture du premier serveur public** | Nouvelles tables, service de diplomatie et de guerre | Élevé |
| 3 | Règles d'accès en guerre : tranche, ratio, limite par cible, trêve, butin à 25 %, moral, boucliers gratuits et payants, encadrement du mode vacances, règles des ruines en guerre, score de guerre | **Avant J21 du premier serveur public** | `isMissionPossible()`, missions sortantes, `lootPercentage`, `ObjectPropertyService`, boutique | Élevé |
| 4 | Griefs ; champ de bataille d'alliances en ligues | Chapitre 1 ou 2 | Service de griefs, carte de provinces | Moyen à élevé |
| 5 | Casus belli d'event (faction templière) | Selon le contenu | Service d'event | Moyen |
| 6 | Ligues entre serveurs par le lobby | Quand plusieurs serveurs existent | Lobby | Élevé |

**Conséquence sur la roadmap** : les étapes 2 et 3 entrent dans le périmètre de la première version publique, alors que la première version de l'étude les plaçait après. C'est un poids nouveau sur la V1 minimum jouable, et un écart à signaler dans la feuille de route (Phase 4). Une parade, si le calendrier serre : ouvrir le premier serveur avec le blocage global des attaques actif et livrer les étapes 2 et 3 dans les trois premières semaines, puisque rien ne s'ouvre avant J21.

Toute règle s'écrit dans `app/Services` ou `app/GameMissions` avec ses tests Pest, jamais dans un contrôleur d'API (CLAUDE.md). Les réglages chiffrés vivent dans `SettingsService`.

---

## 8. Ce que le simulateur doit apprendre

Le simulateur actuel (`tools/theorycrafting/`) ne modélise qu'un joueur, sans combat ni héros. Valider le PvP lui demande trois modules nouveaux, à faire après la correction de son défaut connu (audit du 2026-10-22) :

1. **Module de puissance** : un score militaire par profil et par jour de serveur.
2. **Module de population** : une distribution de joueurs et d'alliances (taille, plafond, taux de bannière), pour compter les adversaires par ligue et les paires d'alliances déclarables.
3. **Module de combat** : des batailles types jouées par le vrai moteur, en lot, pour mesurer le moral, le rapport de forces, l'Hôpital et les pertes.

**Questions à lui poser :**

| # | Question | Cible proposée |
|---|---|---|
| S1 | Combien d'adversaires par ligue, selon la population et le taux d'inscription | Au moins 30 inscrits par ligue |
| S2 | Combien de paires d'alliances déclarables, tranche et ratio calculés sur toute l'alliance | Au moins 3 paires par serveur à J45 |
| S3 | Pertes d'un membre sur une guerre de 7 jours (ressources, troupes, défenses), en jours de production | Membre pacifique sous boucliers gratuits : moins de 2 jours ; membre combattant battu : moins de 7 jours |
| S4 | Probabilité de victoire selon le rapport de forces, avec et sans moral | Un joueur 3 fois plus fort gagne encore, mais sans rentabilité |
| S5 | Séparation des profils par le score militaire (payeur de J90 contre gratuit de J30) | Jamais dans la même ligue sans le vouloir |
| S6 | Vitesse de montée de ligue d'un payeur et d'un gratuit actif | Le gratuit actif monte aussi, en une ou deux saisons de plus |
| S7 | Part de la Kaelite gagnée qui vient du PvP | Moins de 10 % |
| S8 | Rythme d'accumulation des griefs entre deux alliances concurrentes | 2 à 4 semaines, jamais moins d'une |
| S9 | Rentabilité d'un combat arrangé entre complices (butin + ruines contre pertes, Hôpital compris) | Toujours négative |
| S10 | Rythme de gain des boucliers gratuits (stock illimité) et part d'une guerre couverte par un gratuit actif | Environ les deux tiers d'une guerre sur trois semaines de jeu ; jamais une couverture totale permanente sans rien sauter ; retrait complet possible sans payer, avec trêve et baisse de bannière |
| S11 | Rentabilité du pillage d'un membre de moins d'un tiers de sa puissance (butin contre pertes dues au moral) | Négative ou nulle |
| S12 | État d'un joueur actif à J14 et J21 (Silo, Remparts, indice militaire) | Assez de défenses et de stocks à l'abri à J21 pour qu'une attaque ne vide pas la cité |
| S13 | Poids des ruines : bilan de l'attaquant (pertes, butin, ruines) selon le taux de guerre (0, 15, 30 %) | Victoire nette rentable ou neutre ; ruines d'une guerre au plus deux fois le butin total |
| S14 | Coût d'une guerre couverte par alternance vacances / boucliers, en jours de production | Plus cher que les pertes d'un membre pacifique exposé (S3) |

---

## 9. Décisions

### 9.1 Prises le 2026-10-30

- Guerre d'alliances ouverte dès le chapitre 1, avec un délai minimal à fixer (proposé : J21).
- Bannière levée à la EVE ; **tous les membres d'une alliance en guerre sont attaquables**, pas de ban de guerre.
- Boucliers gratuits en jeu, payants pour une couverture complète ; défense des alliances pacifiques ou en retrait.
- Garde-fous chiffrés validés (liste en 1.1).
- Pertes de ressources, défenses et troupes acceptées en guerre ; destruction de cité ou de bâtiments exclue.
- *Arbitrages complémentaires* : boucliers gratuits en stock illimité, strictement personnels, ni échangeables ni transférables ; boucliers payants pour une couverture continue ; toute action hostile sortante rompt le bouclier, après un avertissement à confirmer.
- Mode vacances permis en guerre : 48 h minimum, non enchaînable, 72 h d'attente après la levée.
- Le bouclier n'est pas lu comme une taxe à la sécurité : qui veut la tranquillité rejoint une alliance qui ne déclare pas de guerre.
- Le poids des débris est à peser (section 4.6).

### 9.2 Restant à trancher

1. **R1. Interrupteur individuel** : sa suppression découle des arbitrages (la bannière le remplace). *À confirmer.*
2. **R2. Paix par défaut** : un joueur seul ou une alliance sans bannière reste-t-il invulnérable aux joueurs, sans bouclier ? *Recommandé : oui.* L'autre lecture (une alliance pacifique déclarable, qui se défend par ses boucliers) supprimerait le sens de la bannière.
3. **R3. Délai minimal** : guerre à partir de J21, tournoi à J14, aucune déclaration dans les 10 jours qui précèdent une fusion ? Variante : défi accepté dès J14. *Recommandé : J21 pour tout.*
4. **R4. Boucliers** :
   - ~~quota gratuit~~ : **tranché, stock illimité**. Reste le **rythme de gain** (proposé : un bouclier de 24 h par semaine d'activité, plafond de gain hebdomadaire, Kaelite gagnée comprise) ;
   - couverture payante **réservée au défenseur** n'ayant déclaré aucune guerre depuis 30 jours ? *Recommandé : oui* ; couverture payante **non stockable** ? *Recommandé : oui* ;
   - **définition d'« action hostile »** (rupture tranchée) : y compter, pendant une guerre, le transport, le déploiement, la défense groupée et l'échange de marché vers un membre d'une alliance belligérante, et la récolte de ruines hors de chez soi ? *Recommandé : oui*, sinon le bouclier rétablit le boosting ;
   - attaque déjà lancée contre un joueur qui active son bouclier : elle frappe, ou la flotte repart sans perte ? *Recommandé : elle frappe* ;
   - défi accepté vidé par les boucliers : au-delà de la moitié des heures d'exposition couvertes, l'alliance est comptée comme ayant rendu les armes ? *À trancher* ;
   - délai après une attaque menée (12 h proposé) ;
   - prix et achat en pass ;
   - jamais de bouclier d'alliance en boutique ? *Recommandé : jamais.*
5. **R5. Recalibrages des garde-fous validés** (section 4.2) : tranche et ratio sur toute l'alliance ; 5 membres minimum pour lever la bannière ; moral dès la V1 ; un compte protégé ne rejoint pas une alliance à bannière ; 7 jours de présence avant d'attaquer ; gel de la bannière pour l'agresseur seulement ; ACS comptée par participant dans la limite par cible ; aucun point de guerre sous un tiers de sa puissance.
6. **R6. Casus belli de la première version** : défi accepté seul au chapitre 1, griefs ensuite ? *Recommandé : oui.*
7. **R7. Règle « la provocation donne le grief à la victime »** ? *Recommandé : oui.*
8. **R8. Pacte défensif** : jamais d'entrée automatique ; l'allié qui entre expose tous ses membres ? *Recommandé : oui aux deux.*
9. **R9. Pendant une guerre** : pactes commerciaux suspendus et aucun transport entrant depuis l'extérieur ; *Recommandé : oui.* Mode vacances : **tranché par Gregory (§ 9.1), rien à rouvrir** : permis en guerre, 48 h au minimum, non enchaînable, 72 h d'attente après la levée. Restent seulement deux **compléments à confirmer**, recommandés mais non décidés : un délai de 12 h après une attaque menée, et le refus d'activation quand une attaque ennemie est déjà en vol vers le joueur. *Recommandé : oui aux deux.*
10. **R10. Pertes** : part à l'abri des stocks (couvrir 24 h de production au palier Bourg ?), taux de l'Hôpital en guerre, ruines de guerre (section 4.6 : pertes définitives seulement, récolte réservée, taux de guerre à simuler en partant de 15 %), plafond du tribut de reddition (une journée de production ?).
11. **R11. Format du premier event PvP** (classement de bêta) : tournoi asynchrone sur copies d'armées ? *Recommandé : oui.* La bêta doit-elle aussi tester l'étage 2 ?
12. **R12. Score de puissance** : indice militaire distinct du score général ?
13. **R13. Promesse marketing** : reformuler « un joueur pacifique ou sans alliance » en « un joueur dont l'alliance n'a pas levé sa bannière » ?
14. **R14. Récompenses PvP** limitées aux titres, cosmétiques, calques de capitale, Prestige, Kaelite gagnée en petite quantité et boucliers gratuits ?
15. **R15. Lore** : étendre la protection de l'Obélisque aux royaumes qui n'ont pas levé leur bannière, et lire le bouclier comme un appel à l'Obélisque ?
16. **R16. Vocabulaire** : bannière levée, grief, défi, trêve, nom du bouclier ; « Mode de Guerre » et « ban de guerre » disparaissent-ils du lexique ?
17. **R17. Roadmap** : accepter que la bannière, la guerre par défi et les boucliers entrent dans la première version publique (section 7) ?

---

## 10. Proposition de marquage pour le GDD

*À reporter dans le GDD par une tâche séparée. Rien n'est modifié par cette étude. Les arbitrages du 2026-10-30 s'y écrivent comme actés ; le reste reste **[TBD]**.*

**Section 2, Piliers** — compléter :
> PvP strictement consenti, **par l'alliance** : une alliance qui lève sa bannière expose tous ses membres en guerre ; sans bannière, personne n'est attaquable par un joueur (**acté le 2026-10-30**). Paix par défaut pour les alliances sans bannière **[TBD : R2]**.
> Pas de perte permanente et irréversible, **précisé le 2026-10-30** : en guerre, ressources, défenses et troupes peuvent se perdre ; une cité ne se prend ni ne se détruit, aucun bâtiment ne se détruit.

**Section 4.5, Concepts de structure** — ajouter :
> Bannière levée, grief, défi, trêve, bouclier **[TBD : noms français et anglais, R16]**.

**Section 4.6, Noms anglais** — marquer :
> Mode de Guerre → War Mode **[TBD : supprimé ou réservé à l'état d'une alliance à bannière, R16]**.

**Section 5.4, Mode de Guerre** — remplacer le paragraphe « Remis en question… » et les puces par :
> **Guerre d'alliances (étude du 2026-10-30, [etude-pvp.md](etude-pvp.md)).** Actés le 2026-10-30 : guerre d'alliances dès le chapitre 1 ; bannière levée (éligibilité à la EVE) ; tous les membres d'une alliance en guerre attaquables ; boucliers gratuits en jeu et payants pour une couverture complète ; garde-fous chiffrés de l'étude ; pertes de ressources, défenses et troupes acceptées, destruction de cité ou de bâtiments exclue.
> - Interrupteur individuel **[TBD : supprimé, remplacé par la bannière, R1]**.
> - Délai de 72 h : porté par la bannière de l'alliance (acté).
> - Ouverture de la guerre **[TBD : J21 proposé, R3]**.
> - Boucliers : gratuits en stock illimité, strictement personnels ; payants pour une couverture continue ; rupture à toute action hostile sortante, après avertissement (acté). Rythme de gain, réservation du payant au défenseur, définition d'« action hostile » **[TBD : R4]**.
> - Mode vacances permis en guerre : 48 h minimum, non enchaînable, 72 h d'attente après la levée (acté).
> - Champ de ruines en guerre **[TBD : R10, étude 4.6]**.
> - Recalibrages des garde-fous **[TBD : R5]** ; casus belli **[TBD : défi accepté d'abord, griefs ensuite, R6, R7]**.
> - Anti-abus multicompte : fermeture du transport vers les tiers, règle des comptes liés du lobby, transports entrants suspendus en guerre **[TBD : R9]**.

**Section 4.2, Ambassade** — compléter :
> Pactes : commercial, non-agression (2 à 3 au plus), défensif (1 seul) (**plafonds actés le 2026-10-30**). Écran de guerre (bannière, déclaration, défi, griefs, boucliers) **[TBD]**.

**Section 4.2, Silo** — compléter :
> Part des stocks à l'abri du pillage en guerre **[TBD : R10]**.

**Section 5.6, Prestige** — compléter les débouchés :
> **[TBD]** Prestige gagné en PvP (défense honorable, victoire d'outsider) et calques de capitale de saison PvP (R14).

**Section 5.9, Alliance / Social** — corriger et compléter :
> **Correction 2026-10-30** : l'attaque groupée (ACS Attaque, `FleetUnion`) existe dans l'upstream.
> Plafond de 30 membres par alliance, réglable par serveur (**acté le 2026-10-30**). Champ de bataille d'alliances en ligues **[TBD : étude PvP 5]**.

**Section 5.10, Tableau de correspondance** — remplacer la ligne « Mode de Guerre — bascule PvP » par :
> Guerre d'alliances et ligues PvP | Non (attaque groupée, mode vacances, blocage global des attaques, statut faible/fort affiché : oui) | **Élevé** | `AttackMission::isMissionPossible()`, missions sortantes (bouclier), `BattleEngine` (`lootPercentage`), `ObjectPropertyService` (moral), `MoonDestructionMission` (à désactiver), `FleetUnionService`

**Section 7, Progression** — ajouter :
> Calendrier PvP relatif à `t0` : tournoi à J14, guerre à J21 **[TBD : R3]**.

**Section 9, Monétisation** — compléter la nuance du 2026-10-08 :
> Bouclier payant pour une couverture continue d'une guerre (**acté le 2026-10-30**) ; réservé au défenseur, jamais de bouclier d'alliance **[TBD : R4]**. Jamais mis en avant dans la communication.

**Plan marketing, section 2** — reformuler la promesse « joueur pacifique ou sans alliance » **[TBD : R13]**.

**Lore, section 7 ou 10** — ajouter :
> [ ] Protection de l'Obélisque étendue aux royaumes qui n'ont pas levé leur bannière ; bouclier comme appel à l'Obélisque (R15) ; Vahrun comme source cachée des discordes, à distiller.

**Feuille de route (Phase 4)** — remplacer la ligne PvP par :
> PvP (étude du 2026-10-30) : tournoi en ligues pour la bêta ; bannière, guerre par défi accepté et boucliers prêts pour le premier serveur public (guerre à J21) ; griefs et champ de bataille d'alliances au chapitre 1 ou 2 **[TBD : R17]**.

---

## Sources

**Documents du projet** : [GDD](game-design-document.md) (2, 4.2, 4.5, 4.6, 5.4 à 5.10, 9), [étude des serveurs en continu](etude-serveurs-en-continu.md), [comparatif du genre](references-jeux-du-genre.md) et fiches [pve-dans-le-genre](references-jeux/pve-dans-le-genre.md), [tribal-wars](references-jeux/tribal-wars.md), [grepolis](references-jeux/grepolis.md), [ikariam](references-jeux/ikariam.md), [forge-of-empires](references-jeux/forge-of-empires.md), [rise-of-kingdoms](references-jeux/rise-of-kingdoms.md), [whiteout-survival](references-jeux/whiteout-survival.md), [formats-serveur-et-rattrapage](references-jeux/formats-serveur-et-rattrapage.md), [triche-multicomptes-bots](references-jeux/triche-multicomptes-bots.md), [critique joueur gratuit](references-jeux/critiques/angle-joueur-gratuit.md), [reddit-vague-2](references-jeux/complements/reddit-vague-2.md), [reddit-vague-3](references-jeux/complements/reddit-vague-3.md) ; [lore](lore.md) ; [plan marketing](plan-marketing.md) ; [synthèse du 28 octobre](sessions/2026-10-28-synthese.md). Arbitrages de Gregory du 2026-10-30 (dont l'observation du boosting dans Last War, non sourcée par ailleurs).

**Code vérifié le 2026-10-30** : `app/GameMissions/AttackMission.php`, `app/GameMissions/MissileMission.php`, `app/GameMissions/MoonDestructionMission.php`, `app/GameMissions/Abstracts/GameMission.php`, `app/GameMissions/BattleEngine/BattleEngine.php`, `app/Services/PlayerService.php` (`isNewbie`, `isStrong`), `app/Services/SettingsService.php`, `app/Models/FleetMission.php`, `app/Models/FleetUnion.php`, `app/Services/FleetUnionService.php`, `app/Models/Alliance.php`.

**Recherches web du 2026-10-30** (fiabilité moyenne : pages officielles pour EVE, Travian Kingdoms et Guild Wars 2, guides de joueurs pour New World) :
- EVE Online, éligibilité à la guerre (2018) : https://www.eveonline.com/news/view/war-declaration-changes-the-war-adjacent-to-christmas
- EVE Online, QG de guerre (2019) : https://www.eveonline.com/news/view/war-declarations-transition-period-update
- New World, guerres et influence : https://icy-veins.com/new-world/war-system-in-new-world et https://www.newworld.com/en-us/news/articles/march-to-battle-factions (les deux sources divergent sur le choix de la compagnie qui déclare)
- Travian Kingdoms, confédération et PNA : https://support.kingdoms.com/en/articles/43-diplomacy-confederacy-nap-and-war (aucun plafond de membres trouvé)
- Guild Wars 2, refonte du McM et plafond d'alliance prévu : https://www.guildwars2.com/news/studio-update-world-restructuring-and-the-future-of-world-vs-world (plafond de 500 annoncé en 2021, statut actuel non confirmé)
- Rise of Kingdoms, appariement des KvK : https://riseofkingdomsguides.com/kvk-kingdom-vs-kingdom-guide-tips-for-all-seasons-in-rise-of-kingdoms/

**Non trouvé** : plafonds de membres de Call of Dragons et de Last War ; mécanique exacte du boosting dans Last War (observation de Gregory, non vérifiée par une source écrite) ; mesures de participation au PvP opt-in dans un 4X ; retours chiffrés sur l'effet du moral de Tribal Wars sur la rétention.
