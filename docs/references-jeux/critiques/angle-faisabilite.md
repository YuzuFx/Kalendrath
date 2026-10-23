# Critique, angle faisabilité et charge de travail

*Vague 2, 2026-10-23. Fiches lues : pve-dans-le-genre, triche-multicomptes-bots, formats-serveur-et-rattrapage, navigateur-vs-mobile, lancement-indie-et-communaute, cadre-legal-ue, retention-et-design-du-temps. Plus : CLAUDE.md, décision d'architecture, feuille de route, synthèse du 22/10, et un coup d'œil au code en lecture seule.*

**Convention des estimations.** Aucune fiche ne mesure la vitesse de production du projet. Mes tailles (S, M, L, XL) sont **mon jugement**, pas une donnée. S = une séance de travail avec Claude Code ; M = 2 à 5 séances ; L = 6 à 15 ; XL = plus de 15 ou un chantier sur plusieurs mois. Le seul repère mesuré dans le repo : le système héros complet (table, arbre de 16 nœuds, 8 emplacements d'équipement, écran) a été fait du 15 au 18 septembre, soit environ 4 jours.

---

## 1. Verdict en cinq lignes

1. Les fiches additionnent environ **huit chantiers de plus** (saisons, Chroniques, boss récurrent, classements, gabarits d'events, anti-triche, PWA/Capacitor, boutique web, conformité, vitrine/Discord) sur un projet dont le **chantier déjà décidé** (refonte React, résolution temporelle, 25-30 niveaux, 10 paliers, files multiples, héros, bots, craft, prestige) suffit à remplir 12 à 18 mois pour une personne.
2. Le goulot n'est pas le code que Claude Code écrit. C'est **ce que Gregory doit produire ou valider lui-même** : mockups PC et mobile, images Midjourney (10 paliers de cité), tests de jeu, sondages, devlog toutes les deux semaines, relecture juridique. Ces tâches ne se parallélisent pas.
3. Le goulot technique est un seul chantier : **la résolution temporelle (§5 de la décision d'architecture)**. Push mobile, boss à rendez-vous, saisons, anti-triche anti-timing, Chroniques en instance en dépendent tous. Tout ce qui en dépend doit passer après lui.
4. **Rien ne doit toucher les durées de chantier (queues) plus que ce qui est déjà prévu.** Le « multiplicateur de rattrapage » de la fiche formats est la pire proposition vue d'ici : il traverse les trois services de queue, entre en collision avec les accélérateurs vendus et avec le +30 %.
5. Une V1 tient si on la définit comme **« le domaine OGameX + héros + bots + 1 gabarit de boss, derrière une interface React qui couvre la boucle courte et la flotte, avec un classement qui se remet à zéro »**. Le reste (Chroniques, Capacitor, boutique web, saisons à récompenses, boss disputé) vient après la preuve de rétention à J30.

---

## 2. Constat préalable : où en est vraiment la production

- Git récent : les quatre derniers commits sont des documents, un simulateur et des outils. Depuis le 26/09 (décision d'architecture), **aucune ligne de socle (Octane, Redis, API, shell React) n'est dans le repo**. `routes/api.php` ne contient que la route par défaut de Laravel, `app/Jobs/` un seul job, et il n'y a aucun fichier `.tsx`. Cette phase de recherche est utile (les audits ont même changé des décisions), mais elle a un coût : quatre semaines sans avancée sur le critère « jeu jouable par un tiers ».
- Les fiches elles-mêmes avouent leurs limites : quota de recherche épuisé, plusieurs jeux « non vérifiés », aucune donnée de rétention au-delà de J30. **Empiler d'autres recherches avant de produire ne réduit plus le risque.** Le risque qui reste est de faisabilité et de demande, et il ne se lève qu'en mettant quelque chose entre les mains de joueurs.
- Le filet de sécurité est réel : 1109 tests, PHPStan niveau 8, hook post-édition. Chaque chantier ci-dessous est donc noté « touche le domaine : oui/non », parce que oui = test Pest obligatoire + coût de divergence avec l'upstream (CLAUDE.md).

### Ce qui est déjà au carnet avant les fiches (donc incompressible)

| Chantier déjà décidé | Source | Taille | Domaine |
|---|---|---|---|
| Phase 3a : planche de style, mockups PC + mobile (390 × 844), design system | feuille de route | L, **à la main de Gregory** | non |
| Phase 3b : Octane, Redis + Horizon, API + Sanctum, shell React, Playwright, pilote Héros | décision d'architecture | L | non |
| Phase 3c lots 2 à 6 : ~25 écrans, dont Flotte (1464 l.) et Galaxie (939 l.) | idem | XL | non |
| Résolution temporelle (jobs planifiés, verrous, idempotence, Reverb) | idem §5 | L à XL | **oui** (assumé) |
| Table de 30 niveaux d'Hôtel de ville + 10 paliers + prérequis par palier + formule de durée | synthèse 22/10 | M (simulateur) + M (domaine) | **oui** |
| Files de construction multiples (`BuildingQueueService::start()`, 587 lignes) | synthèse 22/10 | M à L | **oui** |
| Grades d'unités par recherche | synthèse 22/10 | M | oui |
| Phase 4 : bots PvE en galaxie, héros (fait), missions de héros, prestige, craft/forge, Hôpital | feuille de route | XL | **oui** |
| Mode de Guerre (champ `users`, middleware, `AttackMission::isMissionPossible()`) | feuille de route | M | oui |
| Correction du simulateur (fourchettes, files, profils) | synthèse 22/10 | M | non |
| 10 paliers d'images de cité + paliers 1-3 de chaque bâtiment | synthèse 22/10 | L, **à la main de Gregory** | non |

Ce tableau est la base. Les fiches ajoutent par-dessus.

---

## 3. Ce que les fiches ajoutent, chiffré et classé

| # | Recommandation (fiche) | Taille | Domaine | Dépend de | Verdict |
|---|---|---|---|---|---|
| 1 | **Journal d'actions + rate limit par compte + jetons à capacités** (triche) | S à M | non (couche API) | squelette API | **V1, dès le socle** |
| 2 | **Fermer le transport vers un tiers** (triche, `TransportMission::isMissionPossible()`, 148 lignes) | S | oui, minime et configurable | rien | **V1**, avant l'alpha |
| 3 | Règles publiques d'une page + sanctions « quarantaine du classement » (triche) | S | non | rien | V1 |
| 4 | Panneau admin d'OGameX réutilisé, + historique des connexions (`last_ip` écrasée) | S | oui (une table) | rien | V1, la table de connexions seulement |
| 5 | **Gabarits d'events par paramètres** : poids d'expéditions déjà en base (pve) | S | non | rien | **V1**, le moins cher du lot |
| 6 | Boss récurrent léger (« Bear Hunt »), seuils de dégâts, récompense par palier (pve) | M à L | oui (nouveau type de mission ou d'instance, agrégation de dégâts d'alliance) | résolution temporelle, alliances | **V1 en un seul gabarit**, sinon V1.5 |
| 7 | Boss narratif mensuel + second boss disputé (pve) | L | oui | #6 | Après |
| 8 | Classement PvE / score cumulé entre alliances (pve) | M | peu : `HighscoreService` (495 l.) existe | #6 | V1 en version minimale (voir §6) |
| 9 | **Saisons de 8-12 semaines avec récompenses** (formats, pve) | M (reset + archive) à L (récompenses, contrôle) | oui | #8, jobs planifiés | V1.5 ; en V1 : un reset de classement, rien d'autre |
| 10 | **Chroniques : events passés rejouables en instance, accélérés** (formats) | **XL** | **oui, profond** (instances NPC, récompenses réduites, état de progression par compte) | #5, #6, #9 | **Après la V1**. Seule la discipline « tout event est paramétré en base » est à prendre maintenant |
| 11 | **Multiplicateur de rattrapage dégressif sur chantiers et recherches** (formats) | L | **oui, très profond** (3 queues, `HalvingService`, accélérateurs vendus) | table de durée stabilisée | **À rejeter pour la V1**, à repenser (voir §5) |
| 12 | Verrou de contenu par âge du monde pour les vétérans, par compte pour le retardataire (formats) | M | oui | #10 | Après |
| 13 | Sitting intégré / automatisation légère gratuite et plafonnée (triche) | M à L | oui | résolution temporelle | Après ; entre en conflit avec la vente des 2e/3e ouvriers (voir §5) |
| 14 | PWA installable (manifeste + service worker) (navigateur) | S | non | shell React | **V1**, quasi gratuit |
| 15 | Push web (Android) + table d'abonnements + réglage par type (navigateur, rétention) | M | oui léger (jobs de notification) | **résolution temporelle** | V1 **après** le lot 3, pas au lot 2 (voir §5) |
| 16 | Capacitor Android puis iOS, push natif, règle 4.2 d'Apple | L (iOS : L + risque de refus) | non | V1 jouable, test fermé Google (12 testeurs, 14 jours) | **V1.5** ; l'appli ne sert pas l'acquisition (navigateur, leçon 4) |
| 17 | Boutique web + monnaie unique + prix en euros + renonciation à la rétractation + reçu (légal, navigateur) | L | oui (`ShopController`, `PaymentController`, `DarkMatterService` existent, à vérifier) | micro-entreprise, prestataire de paiement | **Après la preuve de rétention** ; pas en V1 |
| 18 | Packs limités vrais (compte à rebours qui ne se relance pas, calendrier public) (légal) | M | oui | #17 | Avec #17 |
| 19 | Mineurs : âge à l'inscription, plafond mensuel, pas de push commercial (légal) | M | oui léger | #17 | Avec #17 |
| 20 | Suppression de compte depuis l'interface, identifiant propre au jeu (navigateur, légal) | S | oui léger | API | **V1** (obligation RGPD + règle 5.1.1 plus tard) |
| 21 | CGU, confidentialité, mentions légales, mesure d'audience exemptée (légal) | S (rédaction) | non | rien | **V1, avant l'alpha ouverte** |
| 22 | Micro-entreprise, médiateur, TVA/OSS, relecture juridique (légal) | S à M, **humain** | non | #17 | Avant le premier euro, pas avant |
| 23 | Vitrine une page + liste e-mails RGPD + Discord 6-7 salons + domaine (lancement) | M, **à la main de Gregory** | non | rien | **Maintenant**, en parallèle ; c'est peu de code et beaucoup de présence |
| 24 | Devlog toutes les deux semaines (lancement) | S par billet, **indéfiniment** | non | rien | Oui, mais voir §4 sur la charge |
| 25 | Alpha par vagues de 10-30 (lancement) | M | non | un jeu jouable | **Oui, tôt** (voir §7) |
| 26 | Calendrier de 52 semaines + 6 gabarits + 10 habillages (pve) | L (habillages narratifs et images) | non | #5, #6 | Réduire à 12 semaines au lancement |

---

## 4. Les attaques, par ordre de gravité

### 4.1 Le « stock d'un an de contenu avant l'ouverture » n'est pas tenable, et la fiche lancement le dit déjà

- La fiche pve reconnaît que le contenu écrit à la main est ce qui s'épuise le plus vite et que Elvenar (23 personnes) sort du contenu toutes les deux semaines. Elle sauve l'idée en la rebaptisant « six gabarits et un calendrier de 52 semaines ». Mais **les habillages (nom d'ennemi, PNJ, chapitre du lore, illustration) restent du texte et de l'image**, donc du travail de Gregory (Midjourney, validation) et pas de Claude Code. Le goulot déplacé, pas supprimé.
- La fiche rétention ajoute le coup de grâce : un an d'arcs (contenu consommé une fois) ne s'entretient pas à une personne ; il faut des **boucles**. Les Chroniques rejouables sont des arcs recyclés, le boss à 48 h est une boucle. Il faut investir dans la boucle.
- La fiche lancement contredit la décision : les quatre précédents ont ouvert un jeu rudimentaire en semaines. **Proposition** : stock à l'ouverture de l'alpha = ce qui est jouable ; stock à l'ouverture publique = environ **3 mois** de calendrier (gabarits + boucles), reconstitué au fil de l'eau. Le « 1 an » devient un objectif de roulement, pas un prérequis.

### 4.2 Les Chroniques (ligne accélérée rejouable) sont le plus gros risque de charge caché

- La fiche formats le dit elle-même : « aucun précédent complet », « coût de développement réel », « touche le domaine », « à prototyper dans le simulateur avant le GDD ». Pourtant elle la **recommande** (option D) et exige que chaque event naisse déjà « rejouable en instance ». C'est un engagement d'architecture pris avant d'avoir un seul event.
- Ce que cela impose concrètement : une notion d'**instance** (état de bots et de récompenses propre à un compte et à un chapitre), un état de progression par compte sur une ligne temporelle personnelle, des tables de récompenses réduites, des exclusivités « en direct », un plafond anti-abus lié au compte principal. Rien de tout cela n'existe dans OGameX (`NPCPlayerService` fait 76 lignes, `NPCFleetGeneratorService` sert aux expéditions).
- Pour la population visée (« quelques centaines à quelques milliers » dans la fiche formats, 12 à 15 testeurs aujourd'hui), le retardataire est un cas rare pendant les 6 premiers mois. **Le besoin n'existe pas encore ; le coût, lui, est immédiat.** Recommandation : prendre la seule discipline gratuite (tout event = ligne de configuration avec identifiant, paramètres et récompenses en base, pas en code), construire les Chroniques seulement quand un retardataire réel se plaint.

### 4.3 Le multiplicateur de rattrapage est incompatible avec le reste du plan

- Il agit sur les durées de chantier et de recherche, donc sur `BuildingQueueService` (587 l.), `ResearchQueueService` (548 l.), `UnitQueueService` (299 l.), exactement les trois fichiers déjà promis à la réécriture pour les files multiples et la nouvelle formule de durée. Deux chantiers sur les mêmes lignes, dans le domaine proche de l'upstream.
- Il **ressemble au produit vendu** (accélérateurs, ouvriers) : la fiche formats l'avoue (« cannibaliser les ventes… casser le +30 % »). Il faudrait en plus le modéliser dans un simulateur qui n'est pas encore fiable (synthèse du 22/10 : « les chiffres actuels ne sont pas fiables »).
- Alternative moins chère (§5, option 1) : un retardataire rejoint un **monde plus jeune** ou rattrape par des **récompenses de bots plus généreuses en bas de puissance**, sans toucher aux durées.

### 4.4 Plusieurs recommandations sont des dettes de maintenance perpétuelles

Chacune demande un humain ou une veille continue, ce que le projet n'a pas :
- Règles de boutique (stores, DMA d'Apple, frais de Google : « elles bougent tous les six mois », fiche navigateur ; DFA attendu le 11 novembre ; KIDS Act en négociation).
- Rythme de packs « vrai » avec calendrier public : chaque erreur est une pratique commerciale trompeuse (fiche légale).
- Panneau anti-triche à ouvrir chaque semaine (fiche triche) : « Toute règle qui demande un humain pour trancher est une règle que personne ne fera respecter », écrit la fiche elle-même, puis elle recommande de regarder le panneau chaque semaine.
- Devlog toutes les deux semaines « pendant des années » (fiche lancement). C'est un engagement à vie d'une personne qui fait aussi le design, les images et le test. **Dire « un devlog par jalon, avec un message de pause annoncé »** est plus tenable.

### 4.5 La fiche navigateur place le push trop tôt

Elle propose « PWA installable avec push web (Android) au moment du lot 2 ». Le lot 2 (boucle courte) précède le chantier §5 (lot 3). Or la notification « chantier fini » exige un job exécuté à `completed_at`, que le middleware paresseux `GlobalGame` ne sait pas faire (fiche rétention, fiche navigateur §7, décision d'architecture §5). Au lot 2, on peut avoir une PWA installable et des notifications **seulement si le joueur a l'onglet ouvert**. Le push réel vient avec §5.

### 4.6 Chiffres incertains utilisés comme certains

- Rétention : les « 4 et 8 % à J30 » (Last War, Whiteout) sont des iOS États-Unis, 2025, via Sensor Tower, avec une acquisition massive. Les prendre comme cible de Kalendrath mélange deux publics. La fiche rétention le signale ; la synthèse pourrait l'oublier. Aucun chiffre à J90 ou au-delà n'existe.
- « Alliance avant J3, 60 %, 3 à 4 fois plus de temps de jeu » : fiche rétention elle-même « incertain, seconde main ». À ne pas bâtir en exigence de conception.
- Frais des stores (Google, Apple UE) : trois niveaux de fiabilité (« probable », « incertain », « à relire »). Aucune décision d'architecture ne doit en dépendre aujourd'hui.
- Revenus d'Elvenar par joueur : calcul explicitement déconseillé par la fiche pve. La fiche pve pose ensuite « environ dix fois moins » comme conclusion : c'est un ordre de grandeur issu de deux sources de qualité moyenne. Suffisant pour dire « ne pas viser Last War », pas pour un budget.
- Contradiction notable entre fiches : la fiche triche recommande d'**offrir gratuitement** files programmées et sitting pour retirer la raison d'écrire un bot, tandis que Gregory vend 2e et 3e ouvriers. Si l'automatisation est gratuite, la valeur du 3e ouvrier chute ; si elle est payante, elle entre dans le +30 % et tue l'argument « retirer le bot ». Conflit non tranché.

---

## 5. Où il faudrait toucher au domaine, et comment l'éviter

CLAUDE.md : `app/Services`, `app/GameMissions`, `app/GameObjects`, `app/Models` doivent rester proches de l'upstream. Deux exceptions déjà admises : résolution temporelle et mécaniques différenciantes (Phase 4). Toute recommandation de fiche qui sort de ces deux cadres est suspecte.

| Zone du domaine | Déjà prévu ? | Demandé en plus par les fiches |
|---|---|---|
| `BuildingQueueService`, `ResearchQueueService`, `UnitQueueService` | Oui : files multiples, nouvelle formule de durée | Multiplicateur de rattrapage (#11), automatisation (#13) |
| `GlobalGame` (résolution paresseuse), jobs | Oui (§5) | Push, boss à rendez-vous, saisons, Chroniques : tous consommateurs |
| `TransportMission` | Non | Fermeture du transport aux tiers (#2) : **une vérification de propriétaire, configurable**, c'est la modification la plus rentable du lot |
| `AttackMission`, `ExpeditionMission` | Mode de Guerre : oui | Boss : nouveau type de mission, **à écrire à côté**, sans modifier l'existant |
| `HighscoreService`, `Models/Highscore` | Prestige : oui | Saisons, classement PvE : tables d'archive **nouvelles**, pas de modification des colonnes existantes |
| `DarkMatterService`, `ShopController`, `PaymentController`, `PremiumController` | À vérifier | Monnaie unique et reçus : à regarder avant d'inventer une deuxième monnaie |
| `PlayerService` (`last_ip`) | Non | Historique de connexions : **table neuve**, pas de modification du champ |

**Règle de prudence proposée** : tout nouveau besoin se fait par *ajout* (nouvelle classe, nouvelle table, nouveau type de mission, drapeau de configuration), jamais par *modification* d'un fichier de queue, de mission ou de service existant, sauf pour les deux exceptions. Cela garde la possibilité de cherry-picker l'upstream.

Deux options à la place du multiplicateur de rattrapage (#11) :
1. **Rattrapage par les récompenses, pas par les durées** : les bots et expéditions donnent plus quand la puissance du joueur est sous la médiane (une ligne dans la table de tirage ou dans le générateur de flotte). Touche un fichier d'ajout, aucune queue.
2. **Rattrapage par les montants de départ** : le compte qui arrive tard démarre avec un petit stock de ressources et de monnaie gagnée proportionnel à l'écart (un seul appel à l'inscription). Aucune règle de durée.

---

## 6. Ce que je garderais tel quel

- **Les gabarits d'events par paramètres** (pve). C'est le meilleur rapport valeur/coût de tout le dossier : `getOutcomeWeights()` lit déjà ses poids en base « pour permettre la configuration d'events ». Un premier event « expéditions fructueuses » coûte une séance et zéro code de domaine.
- **Fermer le transport à des tiers** (triche). Une vérification, un test Pest, et elle supprime pushing, pulling et fermes. Faite avant l'alpha, elle évite un nettoyage après coup.
- **Penser l'API comme si chaque client était un bot** (triche) : journal écrit par le service, limites par compte, idempotence. C'est du code de squelette, à coût nul si fait au lot 0, très cher à greffer au lot 5.
- **Une personne seule ne modère pas** : la conception comme anti-triche, pas d'anti-triche côté client. Cohérent avec l'architecture.
- **PWA puis Capacitor, jamais React Native** (navigateur). Évite le doublement des écrans.
- **L'appli n'est pas l'acquisition** (navigateur, leçon 4) : permet de ne pas inscrire les stores en jalon de V1.
- **Pas de boutique avant la communauté** (lancement, navigateur). Et surtout : « aucun tirage payant », une monnaie payante, packs vrais (légal) sont des décisions de conception à prendre maintenant, qui ne coûtent aucun code.
- **Discord et vitrine avant le sondage** (lancement) : peu de code, bonne idée, mais voir le point suivant.
- **Alpha par vagues sur ratios ×3-×5** (lancement, formats) : banc d'essai, le bon moment pour voir les abus.
- **Un jalon visible tous les 30-40 jours** comme règle du simulateur (rétention). Mesurable, et ça remplace une cible de date.

---

## 7. V1 minimale proposée et ordre

### Principe

Deux jalons, séparés par une preuve : **V0 « alpha entre potes »** (jouable, moche, sans boutique) puis **V1 « ouverture limitée »**, puis V1.5.

### V0 : alpha fermée par vagues (objectif : prouver que la boucle plaît)

Sur l'interface **existante** (Blade/OGameX) et l'écran héros, ce qui est cohérent avec la cohabitation assumée de la décision d'architecture. Contenu :
1. Table de 30 niveaux + 10 paliers dans le domaine (déjà décidée), files multiples si le simulateur corrigé le justifie.
2. Transport fermé aux tiers (#2), panneau admin existant + table de connexions (#4).
3. Bots PvE en galaxie (4.1), héros (fait), Mode de Guerre minimal.
4. Un event « expéditions fructueuses » par configuration (#5).
5. Ratios ×3 à ×5, vagues de 10 à 30, formulaire de retour à chaque fin de vague.
6. CGU et confidentialité d'une page (#21), Discord et vitrine (#23).

Réserve : sur le public froid, l'écran Blade restera spatial (vocabulaire d'OGame) tant que les écrans ne sont pas refaits. Parfait pour des amis, pas pour une vague issue de la vitrine (lancement : la première impression se joue là). Donc **V0 réservé au panel connu**, la vitrine ne capte que des e-mails.

### V1 : ouverture limitée (objectif : un monde unique, jouable sur navigateur et téléphone)

Ordre imposé par les dépendances :
1. **Lot 0 de l'architecture** avec trois ajouts gratuits : journal d'actions, rate limit par compte, capacités des jetons (#1) ; identifiant propre au jeu et suppression de compte (#20) ; PWA installable (#14).
2. Lots 1 et 2 (héros, boucle courte), mobile 390 × 844 dès le premier écran.
3. **Résolution temporelle (§5)** : tout en dépend ensuite. Y ajouter *tout de suite* la notification de fin de chantier (push web Android, réglage par type, #15) puisque c'est le même job.
4. Lot 3 (galaxie, flotte en sous-étapes).
5. **Un gabarit de boss d'alliance à rendez-vous** (#6) et un classement qui se remet à zéro (#8, version minimale : copie du `HighscoreService`, archive d'une table par période).
6. Lots 4 et 5 (rapports, social).
7. Calendrier de **12 semaines** (6 gabarits paramétrés, quelques habillages), pas 52.
8. **Pas de boutique.** Si besoin de financement, un don sans avantage (modèle Kingdom of Loathing, lancement §9) arrive avant tout pack.

Monde unique, ville unique de préférence (colonies multiplient écrans, tests et cas dans le simulateur ; les fiches ne le tranchent pas).

### V1.5 : après une preuve de rétention

Ordre indicatif : saisons avec récompenses et contrôle différé ; Capacitor Android (test fermé de 12 testeurs, déjà couvert par le Discord) puis iOS ; boutique web (micro-entreprise, prestataire marchand officiel, monnaie unique, rétractation, packs vrais, relecture juridique) ; sitting ; boss narratif ; rattrapage « par les récompenses ».

### Après

Chroniques, verrou par âge du monde, boss disputé, second monde, automatisation vendue.

### Seuils de passage (à écrire avant, pour ne pas les négocier après)

- V0 vers V1 : rétention J7 et J30 du panel mesurée sur au moins deux vagues, sans plancher chiffré dans les fiches (aucune donnée de ce type dans le genre pour un jeu à 15 testeurs) ; à fixer par Gregory.
- V1 vers V1.5 : un noyau actif et stable de quelques dizaines de joueurs. Rien dans les fiches ne chiffre le seuil à partir duquel une boutique devient défendable ; ne pas le présenter comme une donnée.

---

## 8. Résumé de la charge, honnêtement

- **Ce que Claude Code fait en dehors de Gregory** : socle, API, React, gabarits d'events, anti-triche d'API, PWA, jobs, notifications, boss, classements. Gros, réaliste en 12 à 18 mois à ce rythme.
- **Ce qui dépend de Gregory et de personne d'autre** : validation des mockups, 10 paliers d'images, habillages narratifs, devlog, Discord, tests de jeu, sondages, décisions juridiques (micro-entreprise, médiateur). Aucune de ces tâches n'est réductible par l'IA ; chacune se mesure en soirées.
- **Le risque de planning n'est pas technique mais d'ordonnancement** : en ajoutant les fiches, tout devient « à faire avant l'ouverture ». Si on garde ce cadrage, la V1 recule vers 2028 et le projet joue contre la lassitude du créateur, le risque principal d'un projet solo persistant (fiche lancement : « un marathon »).

---

## 9. Les 5 questions que Gregory doit trancher

1. **Acceptes-tu une alpha fermée sur l'interface OGameX actuelle (Blade, vocabulaire spatial) réservée à ton panel connu, avant la fin du lot 3 React ?** Oui = tu testes le rythme (table de 30 niveaux, 10 paliers) dans les 2 à 3 mois qui viennent. Non = le premier test de rythme n'arrive qu'après la refonte des écrans, donc plusieurs mois plus tard.
2. **Renonces-tu au « stock d'un an avant l'ouverture » au profit d'un stock de 3 mois en gabarits, reconstitué au fil de l'eau ?** Les habillages (texte, images) sont ton temps, pas celui de Claude Code ; combien de soirées par mois peux-tu y consacrer, concrètement ?
3. **Les Chroniques et le rattrapage par multiplicateur sont-ils exclus de la V1, en gardant seulement la règle « tout event est une ligne de configuration en base » ?** Si tu veux quand même un rattrapage, préfères-tu l'option par les récompenses ou par le stock de départ plutôt que par les durées de chantier ?
4. **La V1 ouvre-t-elle sans aucune boutique, avec une monnaie gagnée en jeu seulement (et la 2e file gratuite), le web shop et les packs limités arrivant en V1.5 après une preuve de rétention ?** Cela repousse les revenus ; peux-tu financer 12 mois de plus sans eux ?
5. **Quel est ton plafond de soirées par semaine, et quelle est la tâche que tu acceptes de ne pas faire ?** Parmi devlog bimensuel, Discord actif, images Midjourney, tests de jeu et sondages, tu ne peux pas tenir les cinq pendant 18 mois. Laquelle abandonnes-tu ou réduis-tu en premier (par exemple, devlog par jalon plutôt que bimensuel) ?
