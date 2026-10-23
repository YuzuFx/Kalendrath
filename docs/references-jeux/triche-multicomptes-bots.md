# Triche, multicomptes, bots et modération

*Fiche thématique du comparatif élargi (2026-10-23). Angle : un projet tenu par une seule personne, avec une API JSON publique (React, Laravel Sanctum). Ce qui se décide part dans le [GDD](../game-design-document.md) et dans la [décision d'architecture](../decision-architecture-cible.md), pas ici.*

**Limite de la recherche.** Le quota de recherches web de la session s'est épuisé pendant le travail. Les règles d'OGame, de Tribal Wars, de Tribal Wars 2 et de Travian Kingdoms ont été lues à la source (pages officielles). Pour Grepolis, je n'ai trouvé qu'une page d'aide, et pour Travian Legends rien. Je n'ai trouvé non plus aucun chiffre sur les effectifs ou le coût de la modération. Ces points sont marqués « non trouvé » et sont à reprendre lors d'une prochaine session.

## 1. Résumé en 5 lignes

1. Toutes les grandes formes de triche du genre (multicompte, pushing, sitting abusif, achat de compte) passent par **un transfert de valeur entre deux comptes**. Les bots, eux, exploitent le **temps** : présence 24 h sur 24 et réactions à la seconde.
2. OGame, Tribal Wars et Travian répondent par un empilement de règles chiffrées (OGame : 1 compte par univers, sitting de 48 h au plus, échanges entre 3/2/1 et 2/1/1, réciprocité sous 72 h, dons limités à 500 M par semaine). Faire respecter ces règles demande des humains : les GameOperators, bénévoles chez Gameforge.
3. La tendance récente est de **légaliser l'outillage pour mieux interdire le reste** : liste d'addons tolérés chez OGame, bibliothèque de scripts officielle et revue dans Tribal Wars (mondes ouverts depuis avril 2026), automatisation vendue (Commandant d'OGame), duals et sitters intégrés au jeu chez Travian Kingdoms.
4. Une équipe d'une personne ne peut pas modérer à la main. Avec une API publique, un bot n'a même pas besoin de scraper. Le seul levier qui passe à l'échelle est la **conception** : pas de transfert entre joueurs, PvE-first, plafonds, limites de débit par compte et rien qui récompense la présence 24 h sur 24.
5. Bonne nouvelle : OGameX contient déjà un panneau admin de détection (IP partagées, missions entre comptes liés, activité 24 h sur 24, réactions instantanées) et une table `bans`. On le réutilise, on ne le réécrit pas.

## 2. Les formes de triche du genre

| Forme | Mécanisme | Ce qu'elle rapporte | Exposition de Kalendrath |
|---|---|---|---|
| **Multicompte** | Une personne joue plusieurs comptes sur le même serveur | Des comptes « fermes » qui alimentent le compte principal, du renseignement, des cibles à piller | Forte si les transferts entre joueurs restent ouverts ; faible sinon |
| **Pushing** | Un compte (plus faible) envoie de la valeur à un autre sans contrepartie : don, faux échange, combat arrangé | Avance accélérée du compte poussé | Forte : `TransportMission` hérité d'OGame permet d'envoyer des ressources à **n'importe quel** joueur |
| **Pulling** | Variante inverse : le fort donne au faible (rattrapage de compte, création d'un compte satellite) | Contournement de la protection des débutants | Idem |
| **Combats arrangés** | Flotte sacrifiée volontairement, débris récupérés par le complice | Ressources et points de combat | Limitée au Mode de Guerre (opt-in) |
| **Bots et scripts** | Programme qui joue à la place du joueur : files, expéditions, farm, fuite de flotte | Présence 24 h sur 24, rendement optimal, réactions en quelques secondes | **Très forte** avec une API publique (voir §6) |
| **Sitting abusif** | Un tiers garde le compte en continu ; deux personnes se relaient pour jouer 24 h sur 24 | L'avantage du bot, sans le bot | Moyenne |
| **Partage, achat et vente de compte** | Le compte change de main hors du jeu | Saute la progression ; fraude au paiement, vol de compte | Moyenne, et croissante avec la valeur des comptes |
| **Exploitation de failles de timing** | Courses entre deux requêtes (double dépense), annulation au moment exact d'une résolution, files traitées en double | Duplication de ressources, chantiers gratuits | **À surveiller de près** : la résolution temporelle est réécrite en Phase 3c |
| **Abus des règles d'event** | Comptes jetables pour collecter les récompenses d'arrivée, de parrainage ou d'event | Monnaie premium gratuite, cadeaux d'alliance | Forte si la monnaie premium gagnée en jeu est transférable ou rentable à « farmer » |

## 3. Ce qu'ont fait les quatre jeux

| | OGame (Gameforge) | Tribal Wars / TW2 (InnoGames) | Travian Kingdoms | Grepolis (InnoGames) |
|---|---|---|---|---|
| **Multicompte** | 1 compte par univers. Plusieurs joueurs sur une même IP : déclaration à un GameOperator ; ils peuvent échanger mais pas s'attaquer *(vérifié, règles US et EN)* | 1 compte actif par monde, sitter compris ; changer de compte impose un délai sans accès, « souvent 24 h » selon les règles locales *(vérifié)* | 1 avatar par monde et par compte lobby *(vérifié)* | Non trouvé (règles probablement proches de Tribal Wars, même éditeur : *supposition*) |
| **Connexion partagée** | Déclaration par ticket | Liste « connexion partagée » dans les réglages ; elle **restreint** attaques, soutiens et adhésion à la même tribu ; les IP communes sont repérées automatiquement *(vérifié)* | Non trouvé | Déclaration dans les réglages, impossible depuis l'appli mobile *(vérifié)* |
| **Pushing** | Défini comme un envoi d'un compte moins bien classé vers un mieux classé sans contrepartie. Échanges bornés entre 3/2/1 et 2/1/1, réciprocité sous 72 h, ressources reçues à rendre et à signaler. *Pulling* plafonné à 500 M de ressources par semaine ; aucun envoi pendant les 3 semaines et 3 jours d'un nouvel univers *(vérifié, règles US)* | Interdit : « utiliser un ou plusieurs comptes seulement pour faire progresser un autre » ; dons de villages répétés ou à sens unique ; bannissement possible de **tous** les comptes impliqués *(vérifié)* | Non trouvé dans les pages consultées | Non trouvé |
| **Sitting** | 48 h au plus, par code du lobby ; aucun combat contre des joueurs pendant le sitting ; le sitter peut mettre en vacances et rappeler des flottes, rien de plus *(vérifié)* | Activé par le propriétaire ; après un délai fixé par monde, le sitter perd les attaques, soutiens et échanges *(vérifié, délai non chiffré)*. TW2 : co-jeu limité aux membres de la tribu, compte verrouillé si le propriétaire ne se connecte pas pendant 30 jours *(vérifié)* | **Intégré au jeu** : 2 duals (plein contrôle) et 2 sitters (droits réglables ; pillage oui, attaque non) ; partager son mot de passe est interdit *(vérifié)* | Non trouvé |
| **Vente de compte** | Transfert seulement par la fonction « Account Gifting » du lobby ; partage des identifiants passible d'un bannissement définitif du lobby *(vérifié)* | TW2 : vente, achat et échange de comptes, de villages ou de monnaie premium interdits sans accord préalable *(vérifié)* | Non trouvé | Non trouvé |
| **Bots et scripts** | Bots, macros et scripts automatisés interdits, sauf la **liste des addons tolérés** ; tout programme servant d'interface entre le joueur et le jeu est interdit *(vérifié)* | **Bibliothèque de scripts officielle**, revue, gratuite, dans le jeu, sur les nouveaux mondes depuis avril 2026 ; après une période de transition, tout script chargé hors de la bibliothèque devient illégal, même à fonction identique *(vérifié)*. TW2 : navigateur standard ou appli officielle seulement ; « tout ce qui imite le jeu d'un joueur » est un bot *(vérifié)* | Non trouvé en source officielle | Non trouvé |
| **Automatisation officielle** | L'officier **Commandant** (payant) offre une file de construction et une aide à la gestion des flottes *(probable, Wikipédia)* | La bibliothèque de scripts | Duals et sitters, qui couvrent l'absence | Non trouvé |
| **Failles** | Exploiter un bug est interdit, même sans le vouloir ; ne pas le signaler aussi *(vérifié)* | Abus de bug interdit, bannissement définitif possible *(vérifié)* | Non trouvé | Non trouvé |
| **Sanctions** | De l'avertissement au bannissement définitif, décidées par les GameOperators *(vérifié)* | Avertissement, bannissement temporaire ou définitif ; décisions « finales » *(vérifié)* | Non trouvé | Non trouvé |
| **Données publiques** | API XML publique en lecture (paramètres du serveur, classements, joueurs) ; `serverData.xml` expose par exemple `bashlimit` et la protection des débutants *(vérifié)* | Non vérifié | Non trouvé | Non trouvé |

**Contradiction à signaler.** Une page « OGame Rules » de Gameforge (guide marketing) affirme que les deux comptes d'un multicompte sont « définitivement bannis » et qu'un attaquant est limité à 6 attaques par cible en 24 h. Les règles officielles du forum disent seulement « de l'avertissement au bannissement définitif », et le texte US ne chiffre pas la limite de bashing (il dit comment on compte les attaques). La limite est un paramètre de serveur (`bashlimit` dans `serverData.xml`). Les règles officielles font foi.

**Un parallèle hors du genre, EVE Online.** CCP publie une API officielle (ESI) avec une licence développeur. Celle-ci interdit de s'en servir pour tricher, réserve à CCP le droit de limiter la fréquence des appels et de couper un accès « immédiatement et sans préavis », et ne publie aucune limite chiffrée *(vérifié, licence)*. L'ESI sert surtout à lire des données ; l'idée qu'elle n'expose presque aucune action de jeu vient de mes connaissances, je ne l'ai pas revérifiée *(probable)*. C'est le modèle le plus proche de celui de Kalendrath : une API ouverte, mais pensée pour des outils, pas pour jouer à la place du joueur.

## 4. Le coût humain de la modération

- **Gameforge s'appuie sur des bénévoles** : les signalements d'OGame sont traités par des GameOperators bénévoles, qui décident des sanctions *(vérifié pour le rôle, Gameforge ; effectifs non trouvés)*.
- **La détection reste en partie manuelle.** L'auteur d'un bot OGame open source raconte avoir été banni après plus d'un an d'usage, pour des attaques automatiques sur des inactifs 6 à 8 fois par jour. Il pense que l'équipe n'a pas d'outil fiable et lit les logs à la main, et ajoute que les signalements des autres joueurs comptent *(incertain : témoignage d'un tricheur sur sa propre affaire)*.
- **Les règles d'OGame produisent de la paperasse** : déclarer les IP partagées, signaler les exceptions (primes, partages de butin), rendre les ressources poussées à un GameOperator. Chaque règle chiffrée devient un ticket à traiter.
- **Les opacités se paient en réputation.** Les avis publics contre Gameforge (autres jeux que OGame) reprochent des bannissements pour « botting » sans preuve communiquée *(incertain : avis isolés)*. Un joueur honnête banni à tort part, et il le dit.
- **Chiffres sur le coût (heures de modération par millier de joueurs, effectifs d'équipe) : non trouvé.**

**Pour Kalendrath** : il n'y aura ni bénévoles ni équipe de support au lancement. Toute règle qui demande un humain pour trancher est une règle que personne ne fera respecter. La règle utile est celle que le moteur applique tout seul.

## 5. L'impact sur les joueurs honnêtes

- **La triche se propage.** Sur 12 millions de comptes Steam, dont plus de 700 000 marqués tricheurs, avoir des amis tricheurs est corrélé à la probabilité de devenir tricheur à son tour. Les tricheurs démasqués perdent aussi plus d'amis que les autres *(vérifié : Blackburn et al., 2011, étude évaluée par les pairs ; jeux de tir, pas de stratégie)*.
- **Le schéma propre au genre** : dans un jeu persistant, le tricheur ne gâche pas une partie, il gâche le classement et les mois de jeu des autres. Un compte poussé par 5 fermes domine une zone pendant des semaines. Je n'ai pas trouvé de chiffre de rétention qui le mesure *(non trouvé)*.
- **Sondages sur l'effet de la triche** (par exemple le sondage Irdeto de 2018, souvent cité) : non retrouvés à la source pendant cette session *(non trouvé)*.

**Ce qui touche Kalendrath** : le PvE-first protège la majorité. Un joueur en Mode Paix ne subit pas le pilleur à bots. Il reste deux zones exposées : les **classements** (prestige, events de saison) et l'**économie d'alliance** (cadeaux, entraide). C'est là qu'il faut concentrer la protection.

## 6. Le cas de l'API publique

Avec une API JSON documentée, un bot devient un script de 50 lignes qui appelle `POST /api/v1/queue/building`. La barrière que donnait le HTML d'OGame (scraper, suivre les changements d'interface) disparaît. Il faut le voir comme un fait, pas comme un problème à cacher :

- **On ne peut pas distinguer un client React d'un script** qui envoie les mêmes requêtes avec le même jeton. Les empreintes de navigateur, les CAPTCHA et les en-têtes se contournent en quelques heures. Ne pas bâtir de défense là-dessus.
- **L'appli mobile future sera un client de plus** (décision d'architecture §3). Toute défense liée au navigateur la casserait.
- **Ce qui marche, c'est de rendre l'automatisation inutile ou visible** :
  1. *Inutile* : rien ne doit rapporter beaucoup plus à qui clique toutes les 10 minutes, 24 h sur 24. C'est un choix de conception (§7).
  2. *Visible* : chaque action d'API passe par un service du domaine. On peut donc la journaliser au même endroit, avec le compte, le jeton, l'IP et l'horodatage. Les signaux d'OGameX (activité 24 h sur 24, réactions en moins de 10 s) deviennent beaucoup plus fiables quand on a un journal propre plutôt que des déductions à partir des missions.
  3. *Bornée* : limites de débit **par compte** (pas seulement par IP), et quotas d'actions par heure de jeu, appliqués côté serveur.
- **Option à assumer : ouvrir l'automatisation légère.** Tribal Wars et OGame ont fini par officialiser les outils plutôt que de les traquer. Pour Kalendrath, l'équivalent serait d'intégrer au jeu les automatismes qu'un bot apporterait (files programmées, missions de héros récurrentes, retour automatique) et de les rendre gratuits et plafonnés. On retire ainsi la raison d'écrire un bot. Attention au plafond d'avance payante : si ces automatismes sont vendus, comme le Commandant d'OGame, ils entrent dans les +30 %.

## 7. Les choix de conception qui coupent la triche à la source

| Choix | Ce qu'il supprime | Coût pour le jeu | État dans Kalendrath |
|---|---|---|---|
| **Aucun transfert direct de ressources entre joueurs** (transport limité à ses propres cités) | Multicompte « ferme », pushing, pulling, vente de ressources contre de l'argent réel | Moins de commerce émergent ; l'entraide d'alliance doit passer par des mécaniques dédiées | **À décider.** Le GDD bloque seulement Paix → Guerre ; le moteur hérité permet tout. |
| **Entraide d'alliance plafonnée et sans valeur marchande** (accélérations de chantier façon Last War, cadeaux générés par le jeu et non par un joueur) | Le transfert de richesse déguisé en entraide | Aucun : c'est le modèle des jeux mobiles qui marchent | Ambassade déjà prévue (GDD) |
| **Marché contre le PNJ seulement** (`MerchantService`), ou marché entre joueurs avec taxe forte, ratio borné et plafond hebdomadaire | Faux échanges à ratio truqué | Le marché inter-modes du GDD perd en liberté | Marché inter-modes **[TBD]** |
| **PvE-first, Mode Paix par défaut** | Pillage de comptes fermes, combats arrangés hors du Mode de Guerre | — | Décidé |
| **Pas de butin PvP qui alimente la progression principale** | Le combat arrangé comme pompe à ressources | Le Mode de Guerre doit récompenser autrement (bonus, prestige de saison) | Bonus du Mode de Guerre **[TBD]** |
| **Rendements décroissants sur la présence** (expéditions et missions de héros en nombre limité par jour, stockage plafonné) | L'avantage du bot 24 h sur 24 | Le joueur très actif progresse un peu moins vite qu'il ne le voudrait | En partie hérité (créneaux de flotte) |
| **Monnaie premium gagnée en jeu, non transférable et liée au compte** | Les comptes jetables qui « farment » des cadeaux | — | À préciser avec la 2e file « facile à obtenir en gratuit » |
| **Classements par saison, avec contrôle avant récompense** | La triche qui paye au sommet | Un délai de quelques jours avant la remise des récompenses | Saisons proposées (comparatif, leçon 1) |
| **Sitting intégré, sans partage de mot de passe** (droits limités, durée bornée, aucune action PvP) | Le partage d'identifiants, le relais 24 h sur 24 | Un peu de travail de domaine | Non prévu |

## 8. Les techniques de détection à la portée d'une seule personne

Par ordre de rapport efficacité / effort :

1. **Le panneau admin d'OGameX, déjà en place** (`app/Http/Controllers/Admin/ServerAdministrationController.php`, données de test : `ogamex:dev:seed-bot-detection`). Il croise :
   - les IP partagées par 2 à 10 comptes (`last_ip`, `register_ip`) ; au-delà de 10, il les écarte comme des réseaux communs (VPN, université) ;
   - les missions entre comptes d'un même groupe d'IP ;
   - l'activité « 24 h sur 24 » : heures distinctes actives et missions par créneau et par jour, sur 7 jours (seuils réglables : 18 h actives, 18 missions par créneau, 50 au minimum) ;
   - les expéditions relancées en moins de 10 s et les fuites de flotte en moins de 10 s après une attaque.
   Il gère aussi les bannissements (`bans`, durée, annulation) et la mise à l'écart des faux positifs. **Limite** : `last_ip` est écrasée à chaque mise à jour du joueur (`PlayerService`) ; il n'y a pas d'historique des connexions.
2. **Un journal des connexions et des actions d'API** : compte, jeton Sanctum, IP, agent, horodatage. C'est la matière première de tout le reste. À conserver quelques semaines, en respectant le RGPD (finalité anti-fraude, durée bornée, mention dans la politique de confidentialité).
3. **Le graphe des transferts.** Si des transferts entre joueurs subsistent, une requête hebdomadaire suffit : flux nets à sens unique entre deux comptes, ou d'un groupe vers un seul compte. C'est la définition du pushing d'OGame et de Tribal Wars, traduite en SQL.
4. **Les limites de débit Laravel** (`RateLimiter::for`, middleware `throttle`) par utilisateur et par famille d'actions. Le projet en a déjà pour la connexion (`FortifyServiceProvider` : 20 essais par minute par identifiant et IP). Une limite de débit n'empêche pas un bot lent, mais elle empêche le spam et les courses entre requêtes.
5. **Les signaux de création de compte** : comptes créés à la chaîne depuis une même IP, e-mails jetables, comptes qui ne font que recevoir. Une vérification d'e-mail obligatoire, et plus tard un numéro de téléphone pour accéder aux classements de saison si l'abus devient réel.
6. **Les signalements des joueurs**, avec un bouton dans le jeu qui joint automatiquement le contexte (coordonnées, rapport). Ce sont eux qui ont attrapé le bot OGame cité plus haut.

Ce qu'il ne faut pas faire au départ : un anti-triche côté client, de l'empreinte de navigateur avancée, ou de l'apprentissage automatique. Ces outils coûtent cher, se contournent facilement et ne servent à rien sans un volume de joueurs.

## 9. Leçons et recommandations pour Kalendrath

1. **Fermer les transferts directs de ressources entre joueurs dès la V1.** C'est la décision qui supprime le plus de triche pour le moins d'effort : pas de fermes, pas de pushing, pas de règles de ratio à faire respecter. Le GDD actuel ne bloque que le sens Mode Paix → Mode de Guerre, alors que `TransportMission` hérité permet d'envoyer à n'importe qui. Le blocage partiel du GDD laisse passer le cas le plus courant : un compte en Paix qui pousse un autre compte en Paix vers le sommet du classement de prestige. **Ceci contredit en partie la piste d'un marché entre joueurs (GDD 5.4)** : s'il reste, il lui faut une taxe, un ratio borné et un plafond hebdomadaire dès le départ, sur le modèle d'OGame (bornes 3/2/1 et 2/1/1, 500 M par semaine). Techniquement, c'est une vérification dans `TransportMission::isMissionPossible()` (propriétaire de la cible = expéditeur), avec un test Pest. Elle entre dans l'exception « mécaniques différenciantes » de CLAUDE.md, et elle peut être rendue configurable pour rester proche de l'upstream.
   → *Lié à : ville unique ou colonies (le transport entre ses propres cités n'a de sens qu'avec des colonies), et au plafond de +30 % (une ferme de comptes dépasserait ce plafond sans payer).*

2. **Penser l'API comme si chaque client était un bot.** Dès le socle de la Phase 0 : (a) limites de débit par compte et par famille d'actions, (b) journal d'actions écrit par le service et non par le contrôleur, (c) jetons Sanctum à capacités limitées (`abilities`) pour qu'un futur jeton « outil tiers » ne puisse que lire, (d) idempotence des actions et verrous (`lockForUpdate`, déjà utilisé par `PlayerService`) contre les doubles dépenses. Le point (d) est le plus important pour la Phase 3c : chaque réécriture de la résolution temporelle crée des failles de timing que les joueurs trouveront avant nous.
   → *Lié à : décision d'architecture §4 (actions idempotentes) et §5 (résolution temporelle).*

3. **Retirer la raison d'écrire un bot plutôt que traquer les bots.** Tribal Wars a fini par intégrer une bibliothèque de scripts officielle, OGame tolère une liste d'addons et vend le Commandant, Travian intègre duals et sitters. Pour Kalendrath : files programmées, missions de héros récurrentes et sitting intégré, tout cela gratuit et plafonné. Un plafond quotidien sur les expéditions et les missions PvE retire l'avantage du joueur présent 24 h sur 24, qu'il soit humain ou script.
   → *Lié à : les files de construction. Si les 2e et 3e « ouvriers » sont la seule façon d'éviter de revenir souvent, ce sont eux qu'un bot remplacera. Leur effet doit rester dans les +30 %.*

4. **Protéger les deux zones où la triche paye vraiment : les classements de saison et les cadeaux d'alliance.** Une récompense de saison remise après un délai de contrôle (quelques jours), la monnaie premium gagnée en jeu liée au compte et non transférable, et des cadeaux d'alliance déclenchés par le jeu, avec un plafond par membre. Sinon, une alliance de 20 comptes jetables « farmera » les cadeaux qui financent la 2e file, que Gregory veut facile à obtenir en gratuit.
   → *Lié à : la 2e file en monnaie virtuelle, et les saisons (question ouverte du format de serveur).*

5. **Des règles écrites courtes, que le moteur applique lui-même.** Une personne seule ne traite pas de tickets de ratios ou de réciprocité sous 72 h. Les règles publiques tiennent en une page : un compte par personne et par serveur, pas de partage d'identifiants (sitting intégré à la place), pas d'automatisation hors des fonctions du jeu et de l'API en lecture, interdiction d'exploiter les bugs et obligation de les signaler. Pour les sanctions : mise en quarantaine des classements d'abord, bannissement ensuite, et toujours une raison communiquée au joueur. Le reste, ce sont les plafonds et l'absence de transfert qui le font.
   → *Lié à : l'alpha à ratios ×3 à ×5 (le bon moment pour voir quels abus apparaissent, avec le panneau d'OGameX ouvert chaque semaine).*

6. **Réutiliser le panneau de détection d'OGameX et le compléter, pas le refaire.** Il reste en Blade, comme le reste de l'administration serveur (CLAUDE.md). Les deux ajouts utiles : un historique des connexions (aujourd'hui, seule la dernière IP est conservée) et le graphe des transferts, s'ils restent ouverts.

## 10. Sources

| Source | Contenu | Fiabilité |
|---|---|---|
| https://board.us.ogame.gameforge.com/index.php?thread%2F51369-ogame-us-game-rules%2F= | Règles OGame US : multicompte, sitting 48 h, ratios 3/2/1 et 2/1/1, 72 h, 500 M par semaine, addons tolérés, sanctions | Vérifié (officiel) |
| https://board.en.ogame.gameforge.com/index.php?thread%2F852578-game-rules%2F= | Règles OGame EN : définition du pushing, scripts, bugs, sanctions | Vérifié (officiel) |
| https://gameforge.com/en-GB/games/ogame-rules.html | Guide : bash limit 6 attaques par 24 h, bannissement définitif des deux comptes, GameOperators bénévoles | Probable (domaine officiel, page marketing ; contredit en partie les règles) |
| https://s1-en.ogame.gameforge.com/api/serverData.xml | API publique XML d'OGame en lecture (`bashlimit`, protection des débutants…) | Vérifié |
| https://en.wikipedia.org/wiki/OGame | L'officier Commandant offre des automatismes de construction et de flotte | Probable |
| https://github.com/winiciuscota/OG-Bot | Bot OGame ; témoignage de bannissement et de détection manuelle | Incertain (témoignage) |
| https://support.innogames.com/kb/TribalWars/en_DK/5966 | Tribal Wars : multicompte, délai de changement de compte, pushing, connexion partagée, repérage automatique des IP | Vérifié (officiel) |
| https://support.innogames.com/kb/TribalWars/en_DK/6023 | Tribal Wars : bibliothèque de scripts officielle (avril 2026) | Vérifié (officiel) |
| https://support.innogames.com/kb/TribalWars/en_DK/1291 | Tribal Wars : sitting et restrictions après un délai | Vérifié (officiel) |
| https://support.innogames.com/kb/TribalWars2/en_DK/1542 | Tribal Wars 2 : règles complètes (multicompte, pushing, co-jeu, vente de compte, bots, sanctions) | Vérifié (officiel) |
| https://support.kingdoms.com/en/articles/177-dual-and-sitter | Travian Kingdoms : 2 duals, 2 sitters, droits | Vérifié (officiel) |
| https://support.kingdoms.com/en/articles/180-account-and-avatar | Travian Kingdoms : 1 avatar par monde | Vérifié (officiel) |
| https://support.innogames.com/kb/Grepolis/en_DK/437/Can-I-share-my-internet-connection-with-other-parties-in-my-household-so-that-they-can-also-play-Grepolis | Grepolis : déclaration de connexion partagée | Vérifié (officiel) |
| https://developers.eveonline.com/license-agreement | EVE Online : licence de l'API ESI, interdiction de tricher, limitation des appels | Vérifié (officiel) |
| https://arxiv.org/abs/1112.4915 | Blackburn et al., *Cheaters in the Steam Community Gaming Social Network* (2011) : contagion de la triche | Vérifié (article scientifique) |
| Code du repo : `ServerAdministrationController.php`, `SeedBotDetectionData.php`, `create_bans_table`, `PlayerService.php` (l. 652-655), `TransportMission.php`, `FortifyServiceProvider.php` | Outils de détection existants, limites de débit, transport vers des tiers | Vérifié (lu dans le code) |

**Non trouvé (à reprendre avec un nouveau quota de recherche)** : règles officielles de Grepolis et de Travian Legends (multicompte, pushing, scripts) ; politique de Travian Kingdoms sur les bots ; règles de scripts de Torn (jeu à API publique, cas d'école) ; effectifs et coût des équipes de modération ; chiffres de rétention liés à la triche dans le genre ; sondage Irdeto 2018 à la source.
