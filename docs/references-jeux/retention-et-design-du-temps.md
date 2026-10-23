# Rétention et conception du temps dans les jeux à minuteurs

*Fiche thématique du comparatif élargi (2026-10-23). Elle rassemble ce que la donnée publique dit de la rétention des jeux 4X mobiles et navigateur et de la conception du temps (durées de chantier, sessions, notifications, alliance, fatigue). Elle confronte ensuite cette donnée à la cible de Kalendrath : une fin de cité vers 2 ans pour un joueur gratuit actif. Cette fiche ne décide rien : les décisions vont dans le [GDD](../game-design-document.md).*

**Limite de la recherche.** Le budget de recherche web partagé de la session a été épuisé en cours de travail. Les rubriques « fatigue des joueurs », « notifications » (taux d'acceptation) et « rétention au-delà de J60 » sont donc incomplètes. Elles sont signalées « non trouvé » et sont à reprendre dans une session dédiée.

## 1. Résumé en 5 lignes

1. Les seuls chiffres publics et sérieux du genre s'arrêtent à J30. Pour Last War et Whiteout Survival (iOS, États-Unis, Sensor Tower), J1 est à 34 et 42 %, J7 à 11 et 17 %, J30 à 4 et 8 %. **Aucune donnée publique à J90, J365 ou J730 n'a été trouvée pour un 4X.**
2. La perte se joue avant J7. Au-delà de J30, les signaux indirects (part des joueurs mensuels actifs chaque jour, 16 à 24 % ; chiffre d'affaires qui baisse bien moins vite que les installations) montrent un noyau qui reste des mois. Mais ce noyau représente quelques pourcents des installations.
3. Whiteout Survival, la référence la plus proche de notre cible, conduit son bâtiment central au niveau 30 en **215 jours de chantier brut**. Son plus long chantier dure 40 jours, et la fin de course garde **un niveau toutes les 3 à 6 semaines**. Notre courbe actuelle franchit 3 niveaux en 20 mois, un tous les 6 à 7 mois : elle sort de tout ce que le genre pratique.
4. L'alliance est le mécanisme de rétention que toutes les sources citent en premier. Les chiffres disponibles (60 % des joueurs dans une alliance avant J3, 3 à 4 fois plus de temps de jeu) sont de seconde main et peu fiables, mais aucune source ne les contredit.
5. Tenir 2 ans est possible pour le noyau de joueurs déjà accroché à J30, à condition que chaque mois apporte un jalon visible. Ce n'est pas une promesse tenable pour un joueur moyen : la donnée suggère que la quasi-totalité des installations sera partie bien avant.

## 2. Chiffres de rétention du genre

### 2.1 Tableau des sources

| Source (date des données) | Périmètre | J1 | J7 | J30 | Au-delà | Fiabilité |
|---|---|---|---|---|---|---|
| Sensor Tower via Naavik (article de janvier 2025) | Last War, iOS, États-Unis | 34 % | 11 % | 4 % | « rétention après J30 à peu près la moitié de son plus proche concurrent » | probable |
| Sensor Tower via Naavik (article de janvier 2025) | Whiteout Survival, iOS, États-Unis | 42 % | 17 % | 8 % | — | probable |
| AppsFlyer (avril 2017) | Jeux de stratégie, États-Unis | 34,9 % iOS / 33,9 % Android | 12,6 % / 9 % | 4,3 % / 3 % | — | probable (ancien) |
| Sensor Tower, *State of App Engagement 2021* (2e trimestre 2021) | Top 500 des jeux, tous genres | 46 % | 17 % | 6 % | J60 : 4 % | probable |
| Sensor Tower via AppAgent (sans date) | Mid-core et RPG | 44 à 45 % | 20 à 21 % | 11 à 12 % | non | incertain (seconde main) |
| GameAnalytics, *Mobile Gaming Benchmarks 2025* (données 2024) | Tous genres, 11 600 jeux | 26,5 à 27,7 % (quart supérieur) | 3,4 à 3,9 % (médiane) ; 7 à 8 % (quart supérieur) | J28 : 75 % des jeux sous 3 % | — | vérifié (source primaire, résumé lu) |
| ThinkingData (blog, cité par un moteur de recherche, page devenue inaccessible) | « Quart supérieur » des 4X | 45 à 55 % | 20 à 25 % | 10 à 15 % | — | incertain (blog d'éditeur d'outil) |
| Playio, citant un livre blanc Business of Apps (juillet 2026) | SLG et 4X | 30 à 35 % (35 à 40 % iOS) | 15 à 18 % | — | — | incertain |

**Contradiction à garder en tête.** Pour J30, les sources vont de 3 % (stratégie, 2017) à 15 % (objectif annoncé par un vendeur d'outils). Les deux seuls chiffres attachés à des jeux nommés, Last War et Whiteout Survival, se situent à **4 et 8 %**. Ce sont ceux qu'il faut retenir : le chiffre bas vient d'un jeu à plus d'un milliard de dollars de revenus annuels. Une faible rétention n'empêche donc pas le succès commercial, quand l'acquisition de joueurs est massive. Kalendrath n'aura pas ces moyens d'acquisition.

### 2.2 Au-delà de J30 : ce qu'on sait, ce qu'on ne sait pas

- **J90, J365, J730 : non trouvé.** Aucun rapport public consulté ne donne de rétention à ces échéances pour un 4X. Sensor Tower et AppMagic la mesurent, mais derrière un abonnement payant.
- **Forme de la courbe.** Selon Solsten (2023, mis à jour en 2025, sans source chiffrée), la courbe « s'aplatit vers le milieu de la vingtaine de jours », si bien que J30 ressemble souvent à J365. Apptopia, cité par GamesBeat, dit que la chute la plus forte a lieu entre J1 et J7, puis seulement quelques points jusqu'à J30. *Probable pour la forme, incertain pour l'idée que J365 ≈ J30.*
- **Signaux indirects de tenue longue** (AppMagic via Udonis, 2026, *probable*, avec des incohérences internes signalées par la source elle-même) :
  - Whiteout Survival (sortie en décembre 2022) : environ 24 % des joueurs mensuels actifs jouent chaque jour. Le nombre de joueurs mensuels n'a baissé que de 19 % depuis le pic de début 2025, les revenus de 24 %. La source parle d'un « plateau très haut » trois ans et demi après la sortie.
  - Last War (sortie en août 2023) : environ 16 % des joueurs mensuels jouent chaque jour. Les installations ont baissé de 83 % depuis le pic, les revenus de 49 % et les joueurs mensuels de 41 %. La base installée reste et paie, mais elle s'érode.
- **Cohortes anciennes.** GameRefinery (2021) relève que sur les 15 jeux 4X du top 100 des revenus aux États-Unis, seuls 3 avaient moins de deux ans. Les autres étaient des jeux anciens portés par des fidèles. *Probable.* C'est le meilleur indice public qu'un noyau de joueurs reste plusieurs années dans ces jeux.
- **Concentration des revenus.** Swrve (cité en 2015) : plus de 50 % des revenus viennent de 0,15 % des joueurs ; Trademob : les « baleines » forment 2 à 5 % des joueurs. *Incertain, définitions différentes.* Les jeux du genre peuvent vivre d'un noyau très petit. Notre plafond d'avance payante (+30 %) nous l'interdit en partie.

## 3. Courbes de durée des chantiers

### 3.1 Un exemple complet : le Fourneau de Whiteout Survival

Durées de base, sans bonus (Whiteout Survival Wiki, *probable*, une seule source mais un tableau détaillé) :

| Niveaux | Chantier par niveau | Cumul en fin de tranche | Rapport d'un niveau au suivant |
|---|---|---|---|
| 2 à 10 | 6 s à 6 h | 15 h | très irrégulier (×2 à ×10) |
| 11 à 15 | 7 h 30 à 18 h | 3 jours | ×1,2 à ×1,3 |
| 16 à 20 | 1,3 à 3,4 jours | 14 jours | ×1,2 à ×1,7 |
| 21 à 25 | 4,5 à 18,3 jours | 66 jours | ×1,4 à ×1,5 |
| 26 à 30 | 21 à 40 jours | **215 jours** | **×1,15 à ×1,2** |

Constats :
- **C'est une table écrite à la main, pas une formule.** Le multiplicateur grimpe vers ×1,4 au milieu de la courbe (niveaux 21 à 25), puis **retombe à ×1,15 en fin de course**. Le plus long chantier est plafonné à 40 jours. C'est précisément ce que Gregory a décidé le 2026-10-22 pour l'Hôtel de ville (table niveau par niveau). Le Fourneau en donne un modèle concret.
- **Une marche toutes les 3 à 6 semaines même en fin de course.** Entre les niveaux 25 et 30, chaque chantier dure 21 à 40 jours de base, moins avec les bonus et les accélérateurs. Le joueur ne reste jamais six mois sans franchir un niveau.
- Au-delà du niveau 30, Whiteout prolonge la course avec des niveaux « Fire Crystal » (non vérifié ici, à recouper avec [whiteout-survival.md](whiteout-survival.md)).
- Le chantier brut ne dit pas le temps réel : les prérequis des autres bâtiments s'ajoutent, mais ils avancent en parallèle (2e ouvrier). **Temps réel pour un joueur gratuit jusqu'au Fourneau 30 : non trouvé.**

### 3.2 Les autres jeux

- Le comparatif existant ([references-jeux-du-genre.md](../references-jeux-du-genre.md)) donne 30 à 40 jours pour les derniers niveaux du Hall de Call of Dragons, et des chantiers de plusieurs jours en milieu de partie pour Last War (QG 16 à 25). Tables détaillées de Rise of Kingdoms, Last War et Call of Dragons : **non trouvées** (wikis inaccessibles ou payants pendant la recherche).
- GameRefinery (2021, *probable*) résume la forme commune : progression rapide au début, lente ensuite, et une fin qui « peut prendre très longtemps ». Les files de construction supplémentaires sont vendues dans le système VIP.

### 3.3 Effets d'une courbe exponentielle sans plafond

Notre formule actuelle (×1,15 par niveau au-delà du niveau 10 pour l'Hôtel de ville) produit l'inverse de la table de Whiteout. Le multiplicateur reste constant, donc les derniers chantiers explosent. En fin de course, les jalons sont espacés de 6 mois et plus (J148, J333, J683). Aucun jeu étudié ne fait cela. Leurs tables réduisent le multiplicateur en fin de course, ou plafonnent la durée d'un chantier vers 30 à 40 jours.

## 4. Murs de progression et moment où les joueurs partent

- **Le premier mur est l'apprentissage, pas les minuteurs.** Le livre blanc 4X de Google Play (données de 2020, résumé par PocketGamer.biz, *probable*) classe le 4X parmi les genres qui rapportent le plus et parmi ceux qui perdent le plus de joueurs. Les causes citées : une courbe d'apprentissage raide qui suppose de connaître le genre, et des systèmes à somme nulle « punitifs » (pertes de ressources ou de progression entre deux sessions). La rétention s'effondre avant J7 (cf. 2.1).
- **80 % des joueurs de stratégie assidus ne jouent qu'à un seul jeu de stratégie par mois** (Google Play, 2020, *probable*). Une fois engagé, un joueur de stratégie est fidèle. C'est l'argument d'un pari sur la longue durée, mais il faut d'abord l'arracher à son jeu actuel.
- **Le mur du milieu de partie** (Hall 22 à 24 de Call of Dragons, QG 16 à 25 de Last War) est documenté qualitativement dans le comparatif existant. Le Fourneau de Whiteout le montre en chiffres : les niveaux 21 à 25 passent de 4 à 18 jours, soit le plus fort multiplicateur de la courbe. **Chiffre de départ des joueurs à ce mur : non trouvé.**
- **Pas de mur d'une seule cause.** GameRefinery (2021) note que les events récurrents servent à donner aux joueurs anciens le sentiment de progresser encore, quand les bâtiments ralentissent. Tous les jeux 4X du top 200 des revenus aux États-Unis en ont. *Probable.*

## 5. Conception des sessions

| Donnée | Valeur | Source | Fiabilité |
|---|---|---|---|
| Sessions par jour, jeux « mid-core » | 6 à 7 | GameAnalytics 2025 (données 2024) | vérifié (source primaire, résumé lu) |
| Sessions par jour, tous genres | environ 4 | GameAnalytics 2025 | vérifié |
| Durée médiane d'une session, tous genres | 5 à 6 min (quart supérieur : 8 à 9 min) | GameAnalytics 2025 | vérifié |
| Sessions par jour, SLG et 4X | 8 à 12 | Playio (2026), sans source | incertain |
| Temps passé par utilisateur, stratégie | 62 min (RPG 57 min, tous jeux 23 min) | Sensor Tower 2021 via GameDev Reports | probable (unité de temps à vérifier dans le rapport original) |
| Temps par jour à J7, joueurs en alliance / seuls | 45 min et plus / moins de 20 min | Playio citant Business of Apps (2026) | incertain |

**Lecture.** Un 4X mobile se joue en nombreuses sessions courtes : on vient lancer un chantier, récolter, aider l'alliance, puis on repart. Pour Kalendrath (navigateur puis mobile, joueurs adultes), cela donne une cible de conception de **3 à 6 visites par jour de quelques minutes**, avec une ou deux sessions plus longues par semaine (events, combats). Les chantiers doivent pouvoir se caler sur une nuit et une journée de travail (environ 8 h), pour qu'un joueur qui vient deux fois par jour ne perde rien.

## 6. Notifications

- **Android 13 et plus** : les notifications demandent une permission explicite (`POST_NOTIFICATIONS`). Google recommande de ne pas la demander au premier lancement, mais après une action qui en montre l'intérêt, ou au 3e ou 4e lancement. Les utilisateurs voient le nombre de notifications par jour et peuvent les couper. *Vérifié (documentation officielle).*
- **iOS, règle 4.5.4 de l'App Store** : l'application ne doit pas dépendre des notifications pour fonctionner. Les notifications promotionnelles demandent un accord explicite dans l'interface et un moyen de se désabonner. *Vérifié (texte officiel).*
- **Taux d'acceptation et effet sur la rétention dans les 4X : non trouvé.**
- **Conséquence pour Kalendrath** : deux familles de notifications à séparer dès la conception. Les notifications de jeu (chantier fini, attaque, appel de l'alliance) sont utiles et réglables une par une. Les notifications commerciales (pack limité) restent à accord séparé. Un jeu respectueux n'a pas besoin des secondes pour tenir. L'appli mobile native devra respecter les deux règles ci-dessus.

## 7. Boucles quotidiennes et hebdomadaires

- **Events récurrents** : présents dans 100 % des 4X du top 200 des revenus aux États-Unis (GameRefinery 2021, *probable*). Plusieurs events tournent en même temps.
- **Boucle hebdomadaire d'alliance** : le « Alliance Duel VS » de Last War oppose deux alliances chaque semaine. Naavik (2025, *probable*) le décrit comme de la « co-opétition » qui crée aussi une **pression sociale à dépenser**.
- **Saisons** : celles de Last War (mai et septembre 2024) ont relancé les revenus (Naavik, *probable*).
- **Pass de combat** : jugé « indispensable » dans le segment 4X par GameRefinery (2021). Rise of Kingdoms proposait des passes à 5 € et 21 €, et un mini-pass de 7 jours (*probable*).
- **Récompenses de recharge à plafond** : dans Rise of Kingdoms, un event de 5 jours récompense un montant d'achat quotidien, et dépasser ce montant ne rapporte rien de plus (GameRefinery 2021). C'est un exemple réel de plafond de dépense par période, compatible avec les packs limités de Gregory.

## 8. Rôle de l'alliance dans la rétention

| Affirmation | Source | Fiabilité |
|---|---|---|
| La structure sociale est « le mécanisme de rétention le plus efficace » des 4X ; le taux d'entrée en alliance à J1 et J7 est un indicateur clé | ThinkingData (blog, cité par un moteur de recherche) | incertain |
| Plus de 60 % des joueurs doivent rejoindre une alliance avant J3 pour soutenir la rétention à J7 | Playio citant Business of Apps (2026) | incertain |
| Les joueurs en alliance jouent 3 à 4 fois plus que les joueurs seuls | idem | incertain |
| Plus de 92 % des 4X du top 200 ont des cadeaux d'alliance, surtout déclenchés par les achats, parfois par les monstres PvE | GameRefinery 2021 | probable |
| Les tâches d'alliance consistent à aider les membres sur leurs minuteurs (construction, troupes, recherche) contre une monnaie d'alliance | GameRefinery 2021 | probable |
| Effet causal de l'alliance sur la rétention à J30 et au-delà | — | **non trouvé** (seulement des corrélations) |

Les chiffres sont fragiles, mais toutes les sources vont dans le même sens et aucune ne les contredit. C'est aussi la leçon 5 du comparatif existant.

## 9. Fatigue des joueurs

- **Témoignages chiffrés de lassitude (Reddit, forums) : non trouvés.** Reddit n'était pas accessible à l'outil, et le budget de recherche était épuisé. À reprendre.
- **Signal côté éditeur** : début 2026, les développeurs de Last War ont retiré plusieurs packs surgissants (20 $, 50 $, 100 $) pour passer à un modèle fondé sur le pass. Leur motif déclaré : réduire la « pression à la dépense » (Udonis, 2026, *probable*). Dans les mois qui suivent, le nombre de joueurs mensuels recule de 41 % depuis son pic.
- **Cause de départ de long terme** : Daniel Cook (Lost Garden, 2012, *vérifié* pour le contenu de l'article) distingue les **boucles**, qui se rejouent et s'usent peu, des **arcs**, du contenu consommé une fois et vite usé. Un jeu qui empile des arcs (chapitres, events uniques) entre dans un « tapis roulant de contenu » : si la production s'arrête, le jeu meurt. C'est un risque direct pour une équipe d'une personne qui prévoit un stock d'un an de contenu.
- **Repère clinique** : l'OMS (CIM-11) définit le trouble du jeu vidéo par une perte de contrôle, une priorité croissante donnée au jeu et une poursuite malgré des conséquences négatives, normalement sur au moins 12 mois. Il ne touche qu'une petite part des joueurs (*vérifié*). Un jeu pensé pour 2 ans doit éviter les mécaniques qui poussent à jouer toujours plus (connexions forcées, punition de l'absence).

## 10. Design « respectueux » du temps

Les principes ci-dessous sont des propositions de conception tirées des constats précédents, pas des faits sourcés :
- **Aucune perte en cas d'absence normale.** Une nuit, une journée de travail, un week-end sans jouer ne doivent rien coûter d'irréversible. En PvE-first, cela veut dire une protection par défaut, et un mode vacances comme dans OGame (existence connue, modalités non vérifiées ici).
- **Des récompenses quotidiennes qui s'accumulent** sur quelques jours au lieu de se perdre à minuit : le joueur qui vient un jour sur deux n'est pas puni.
- **Des chantiers calés sur les rythmes de vie** (environ 8 h la nuit, autour de 24 h ensuite), avec une file qu'on peut remplir avant de dormir.
- **Plafonds affichés** : comme l'event de recharge plafonné de Rise of Kingdoms, et comme les packs limités de Gregory, la limite d'achat et de récompense par période doit être visible. À vérifier à l'audit de la Phase 8 : les règles européennes sur la fausse urgence et les mineurs (l'action du réseau européen des autorités de consommation sur les monnaies virtuelles n'a pas pu être consultée).
- **Le collectif comme moteur, pas comme contrainte** : l'entraide d'Ambassade et les cadeaux d'alliance sont des facteurs de rétention. Mais Naavik montre que les duels hebdomadaires d'alliance créent aussi une pression à dépenser. Kalendrath peut garder l'entraide en limitant le classement d'alliance qui récompense la dépense.

## 11. Confrontation avec la cible de 2 ans et la courbe actuelle

**Ce que dit la donnée.**
1. **Personne ne publie de chiffre de rétention à 2 ans.** La donnée ne permet ni de valider ni de rejeter la cible. Elle permet un ordre de grandeur. Sur 100 installations d'un 4X à succès, il en reste 4 à 8 à J30. Des signaux indirects (part des joueurs mensuels qui jouent chaque jour, plateau de Whiteout trois ans après sa sortie, vieux jeux du top 100) montrent qu'une partie de ce noyau reste des années. La part exacte n'est pas connue.
2. **Les jeux de référence ne demandent pas 2 ans pour atteindre leur dernier niveau de bâtiment central.** Le Fourneau 30 de Whiteout demande 215 jours de chantier brut. Le Hall 25 de Call of Dragons arrive vers 9 à 12 mois. Les deux ans de ces jeux, ce sont les unités de plus haut tier et des niveaux ajoutés au-delà, pas le dernier niveau du bâtiment central. Notre cible place une seule fin, la cité, à une distance que le genre réserve aux objectifs secondaires. **Cela confirme la leçon 3 du comparatif existant** : un premier grand jalon vers 10 à 14 mois, puis un objectif militaire ou de prestige jusqu'à 2 ans.
3. **Le creux de 20 mois est incompatible avec tout ce qui a été observé.** La courbe actuelle franchit 13 niveaux en 73 jours, puis 3 niveaux en 20 mois : un niveau tous les 6 à 7 mois. Whiteout garde un niveau toutes les 3 à 6 semaines jusqu'au bout et plafonne un chantier à 40 jours. Aucun jeu étudié ne laisse un joueur six mois sans jalon. La décision du 2026-10-22 (25 à 30 niveaux en table écrite à la main) va dans le bon sens, à une condition : **la table doit faire baisser le multiplicateur en fin de course, comme Whiteout, et non le garder constant.**
4. **Ordre de grandeur pour la table de l'Hôtel de ville** (proposition à passer au simulateur, pas un résultat) : la règle la plus simple tirée de Whiteout est **un jalon visible au moins tous les 30 à 40 jours** jusqu'à la fin. Un jalon peut être un niveau d'Hôtel de ville, un palier de cité ou un sous-niveau intermédiaire. Sur 24 mois, il faut donc environ 20 à 25 jalons après la fin du début de partie (J73). Avec 25 à 30 niveaux, cela tient seulement si les niveaux 15 à 30 sont répartis régulièrement sur 22 mois (un toutes les 5 à 6 semaines). Sinon, il faut ajouter des sous-niveaux.
5. **Le risque se joue avant J30, pas à 2 ans.** La perte majeure a lieu entre J1 et J7. Les paliers rapides du début (Village en 1 à 3 jours, Bourg en 5 à 10 jours) sont alignés sur le genre, avec un Fourneau 15 en 3 jours de base. L'entrée en alliance doit être poussée dès les premiers jours. Pour un jeu sans budget d'acquisition, la rétention à J30 compte plus que la longueur totale de la course.

**Verdict.** La donnée n'interdit pas 2 ans pour la fin de la cité, mais elle dit trois choses franches. (a) Seul le noyau déjà accroché à J30, probablement en alliance, ira jusque-là. (b) Aucun jeu de référence ne fait attendre son dernier niveau central aussi longtemps : 2 ans est plutôt la durée de leurs objectifs secondaires. (c) Avec la courbe actuelle, même ce noyau risque de partir pendant le creux. Garder 2 ans suppose donc de placer un grand jalon de cité vers 10 à 14 mois et un rythme d'au moins un jalon par mois jusqu'au bout.

## 12. Leçons pour Kalendrath

1. **Écrire la table de l'Hôtel de ville sur le modèle du Fourneau de Whiteout** : multiplicateur fort au milieu, retombé vers ×1,15 en fin de course, plafond de chantier vers 30 à 40 jours. → *Décision du 2026-10-22 (25 à 30 niveaux en table). Elle contredit la formule actuelle (×1,15 constant), qui doit disparaître.*
2. **Règle de rythme à ajouter au simulateur** : jamais plus de 30 à 40 jours sans jalon visible pour un joueur gratuit actif. C'est mesurable dans `tools/theorycrafting/` et ça remplace un objectif de date unique. → *Cible des 2 ans et 10 paliers de cité.*
3. **Séparer deux fins** : cité vers 10 à 14 mois, objectif militaire ou de prestige vers 2 ans. La donnée ne montre aucun jeu qui fait attendre 2 ans son dernier niveau central. → *Contredit la cible actuelle « fin de cité vers 2 ans » ; confirme la leçon 3 du comparatif.*
4. **Pousser l'alliance avant J3** : suggestion d'alliance PvE dès le tutoriel, aide d'Ambassade sur les minuteurs dès le Bourg, cadeaux d'alliance déclenchés aussi par le PvE (comme certains 4X le font déjà). → *Ville unique ou colonies, Ambassade, PvE-first.*
5. **Penser la rétention sans acquisition massive** : Last War vit avec 4 % à J30 parce qu'il achète des dizaines de millions d'installations. Kalendrath ne le pourra pas. Il faut viser la rétention de Whiteout (8 % et plus) avec un début de partie très soigné, et des events qui se rejouent (boucles) plutôt que du contenu unique (arcs). Un an de contenu en arcs ne suffira pas, faute de pouvoir le renouveler. → *Stock d'environ 1 an de contenu ; ligne de rattrapage, qui recycle justement les events passés.*
6. **Absence non punie, notifications sobres** : protection par défaut, récompenses quotidiennes cumulables, chantiers calés sur 8 h, notifications de jeu séparées des notifications commerciales (règles Android 13 et App Store 4.5.4). C'est aussi un argument de positionnement face à la pression à dépenser des leaders. → *Appli mobile native, plafond payeur +30 %, packs limités.*

## Sources

| URL | Contenu | Fiabilité |
|---|---|---|
| https://naavik.co/digest/how-last-war-is-winning-the-4x-game/ | Rétention J1, J7, J30 de Last War et Whiteout (Sensor Tower), Alliance Duel, saisons (janvier 2025) | probable |
| https://www.pocketgamer.biz/appsflyer-stategy-game-benchmark-report/ | Rétention des jeux de stratégie, AppsFlyer (avril 2017) | probable (ancien) |
| https://gamedevreports.substack.com/p/gameanalytics-mobile-gaming-benchmarks | Résumé de GameAnalytics 2025 : rétention, sessions, durée de session | vérifié |
| https://investgame.net/wp-content/uploads/2025/02/2025-GameAnalytics-Mobile-Gaming-Benchmarks.pdf | Rapport original GameAnalytics 2025 (non lu, tableaux par genre à extraire) | non lu |
| https://gamedevreports.substack.com/p/sensor-tower-apps-user-engagement | Sensor Tower 2021 : rétention J1 à J60, temps passé par genre | probable |
| https://appagent.com/?p=61637 | Rétention mid-core et RPG (Sensor Tower, seconde main), paliers AppAgent 2026 | incertain |
| https://blog.playio.co/slg-4x-mobile-games-ua-strategy | 4X : J1, J7, entrée en alliance, temps de jeu, sessions (juillet 2026, cite Business of Apps) | incertain |
| https://thinkingdata.io/?p=4187 | Objectifs de rétention 4X, rôle de l'alliance (lu seulement via un moteur de recherche ; redirige aujourd'hui vers une page commerciale) | incertain |
| https://www.gamerefinery.com/what-drives-success-in-4x-strategy-slg-games-part-1 | Forme de la progression, VIP et files, part des vieux jeux dans le top 100 (août 2021) | probable |
| https://www.gamerefinery.com/what-drives-success-in-4x-strategy-slg-games-part-2 | Events, aide et cadeaux d'alliance, pass, recharge plafonnée (août 2021) | probable |
| https://www.pocketgamer.biz/finding-success-in-4x-strategy-games/ | Livre blanc Google Play 4X : départs, fidélité des joueurs de stratégie (données 2020) | probable |
| https://www.blog.udonis.co/statistics/last-war-survival | Trajectoire de Last War (AppMagic) : revenus, installations, joueurs actifs, retrait de packs en 2026 | probable (incohérences internes) |
| https://www.blog.udonis.co/statistics/whiteout-survival | Trajectoire de Whiteout Survival (AppMagic), part des joueurs mensuels actifs chaque jour | probable (incohérences internes) |
| https://www.whiteoutsurvival.wiki/buildings/furnace/ | Durées de chantier du Fourneau, niveaux 1 à 30 | probable |
| https://gamedevreports.substack.com/p/appmagic-and-mygames-4x-strategies | Marché 4X 2023 (5,8 Md$, revenu par installation 9,2 $), difficulté de rétention | probable |
| https://solsten.io/blog/d1-d7-d30-retention-in-gaming | Forme de la courbe après J30, « J180 est le nouveau J30 » | incertain (sans source chiffrée) |
| https://gamesbeat.com/?p=140220 | Apptopia : chute surtout entre J1 et J7 (lu seulement via un moteur de recherche) | incertain |
| https://www.gamedeveloper.com/business/5-strategies-for-retaining-your-vip-users | Swrve : 50 % des revenus par 0,15 % des joueurs (2015) | incertain |
| https://www.gameanalytics.com/blog/exploring-motivation-people-play-games-years | Motivation et rétention sur des années (qualitatif, 2025) | probable (qualitatif) |
| https://lostgarden.com/2012/04/30/loops-and-arcs/ | Boucles et arcs, tapis roulant de contenu (Daniel Cook) | vérifié |
| https://www.who.int/standards/classifications/frequently-asked-questions/gaming-disorder | Définition du trouble du jeu vidéo (CIM-11) | vérifié |
| https://developer.android.com/develop/ui/views/notifications/notification-permission | Permission de notification sous Android 13 et bonnes pratiques | vérifié |
| https://developer.apple.com/app-store/review/guidelines/ | Règle 4.5.4 sur les notifications push | vérifié |

**Non trouvé ou à reprendre** : rétention à J90, J365 et J730 d'un 4X ; tables de chantier détaillées de Rise of Kingdoms, Last War et Call of Dragons ; taux d'acceptation des notifications dans les 4X ; témoignages chiffrés de lassitude (Reddit, forums) ; principes européens sur les monnaies virtuelles et la fausse urgence ; données de rétention d'OGame et de Travian.
