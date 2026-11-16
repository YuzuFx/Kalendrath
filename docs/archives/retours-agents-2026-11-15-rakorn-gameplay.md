# Rakorn — audit connecté des mécaniques et de la progression

Date : 15 novembre 2026. Agent : Codex, sous-agent `rakorn_gameplay`.

## État réel de l’examen

Ce document comprend désormais un **audit connecté en lecture seule**, depuis un personnage de niveau 7 disposant des métiers mineur 11 et forgeron 10. La vitrine publique a également été lue dans le navigateur dédié via CDP. Aucune recette, transaction, récolte, récompense ou combat n’a été exécuté ; aucun équipement ni métier n’a été modifié. Les fonctions verrouillées au niveau actuel ou derrière l’adhésion à une guilde restent partiellement documentées.

Contexte du projet lu : `CLAUDE.md` et `docs/sessions/2026-11-02-synthese.md`. Aucune modification de conception ou de code de Kalendrath n’est proposée ici.

Méthode : consultation de la vitrine publique et des écrans authentifiés dans un navigateur Chromium dédié, via CDP, le 15 novembre 2026. Les premières tentatives par outil web avaient échoué ; la visite directe a permis de poursuivre. Les aides intégrées ont été distinguées des comportements effectivement observés.

## Ce que la vitrine publique annonce

Source de cette section : <https://www.rakorn.fr/>, page rendue dans Chromium le 15 novembre 2026. Ces éléments sont des **déclarations de la vitrine**, pas des mécaniques expérimentées sur le compte.

| Domaine | Contenu annoncé |
| --- | --- |
| Métiers | Huit métiers de soixante niveaux : mineur, bûcheron, forgeron, couturier, joaillier, alchimiste, ingénieur, logisticien. La page annonce 111 filons et 313 recettes. |
| Interdépendance | Transformation de matière récoltée, puis fabrication par le métier approprié ; achat auprès d’un autre joueur possible. Les métiers sont présentés comme dépendant des productions des autres. |
| Marché | Comparaison des offres du comptoir et des joueurs ; onglets exposés pour achat, vente, ventes personnelles et commandes. Le comptoir est distinct des joueurs dans le texte, mais son fonctionnement exact reste à vérifier. |
| Commandes | Possibilité annoncée de faire fabriquer ce que l’on ne sait pas produire et de fabriquer pour autrui. La vitrine expose aussi des fonctions « confier » et « traitements ». |
| Équipement | Conditions de niveau, statistiques, durabilité, raretés, ensembles avec bonus par nombre de pièces ; provenance artisanale nominative montrée sur un exemple. |
| Amélioration | Traitements sur équipement, châsses, gemmes de rangs I à V et bonus d’harmonie. La page montre également une augmentation de durabilité comme traitement. |
| Combat | Tour par tour, une action par tour, sélection de cinq compétences parmi vingt-deux, recharges et effets persistants. Quatre approches illustrées : agressive, défensive, usure et distance. |
| Campagne | Huit chapitres de quinze combats ; progression présentée comme ouvrant de nouvelles terres, matières et recettes. La page annonce 120 créatures. |
| Conquête | Carte de 25 territoires avec huit situations locales ; contributions en objets, or et monstres vaincus ; territoires verrouillés par campagne et classement hebdomadaire. Les règles entre joueurs ne sont pas décrites assez précisément pour conclure à la nature de la concurrence. |
| Guilde | Cité financée collectivement, six bâtiments annoncés, trésorerie commune et rôles/droits. Services cités : entrepôt, commerce, trajet et commandes. Des expéditions sont présentées. |
| Compléments | Codex de 461 fiches avec provenance et usages, recyclage en matières, hauts faits et titres, sac initial de quinze places extensible par fabrication, Maison de Maître annoncée pour le niveau 60. |

### Chaîne économique illustrée publiquement

La vitrine donne un exemple explicite : minerai de fer récolté → lingot produit par un mineur → alliage préparé par un forgeron → plastron → traitement et sertissage → équipement. Le marché et les commandes permettent, selon le discours public, de franchir les étapes réalisées par d’autres métiers. Cette chaîne reste une **démonstration de la vitrine**, pas une preuve de son accessibilité réelle, de son rythme ou de sa rentabilité.

## Résultats de l’audit connecté

Visite du 15 novembre 2026 sur <https://play.rakorn.fr/>, navigateur dédié connecté par Gregory. Les règles rapportées ci-dessous sont **affichées par l’interface ou son aide intégrée** ; les opérations correspondantes n’ont pas été expérimentées.

### Progression et campagne

Sources : <https://play.rakorn.fr/home>, <https://play.rakorn.fr/map>, <https://play.rakorn.fr/skills>.

- La carte montre huit zones, un objectif courant et le prochain ennemi avec niveau, vie, attaque, armure, trait et récompenses. La première zone est avancée de 7/15. Le bouton d’expédition n’a pas été utilisé.
- Les zones ultérieures affichent des niveaux de héros : Sylve de Rouvre 14, Mine d’Argent 21, Gorges de Fendeval 29, Cimes de Kaerloch 37, Profondeurs de Sombrefer 45, Trône sous la Montagne 53. La deuxième zone est simplement indiquée bloquée à cet état de progression.
- Le niveau du héros et celui du métier sont distincts. Récolter/fabriquer donne de l’XP de métier et une part d’XP de héros, avec détail visible de la progression vers le niveau suivant.
- Le tooltip de rendement explique que l’XP du héros vaut 5 % de ce que la même énergie produirait en combat au niveau de l’ouvrage, puis applique un coefficient selon son écart au niveau du héros : 100 %, 70 %, 45 %, 25 % ou 10 %. Cela décourage de progresser indéfiniment via des recettes très anciennes ; c’est une règle déclarée, non recalculée depuis le serveur.
- L’écran de compétences présente cinq techniques en rotation, des techniques verrouillées par niveau et certaines par quête au niveau 10. Il compte 27 techniques dans ses filtres, contre 22 sur la vitrine : le chiffre public ne décrit donc pas tout le catalogue connecté actuel. Aucun talent ni ordre de rotation modifié.
- Un premier chargement trop court de `/quests` a affiché des valeurs initiales vides. L’agent principal a vérifié ensuite le chargement complet : neuf quêtes rendues sur 185, chapitre I à 9/20. Ne pas traiter le chargement initial comme une incohérence persistante du jeu.

### Métiers : une spécialisation réelle

Source : <https://play.rakorn.fr/crafting>, modes récolte et artisanat, aide « Les Métiers », panneau « Vos métiers ».

**Deux métiers sont offerts ; le troisième demande une Charte de spécialisation fabriquée par le logisticien.** Il ne s’agit donc pas seulement de huit barres d’expérience accessibles sans choix. Le compte connaît mineur et forgeron ; les six autres figurent dans le panneau d’apprentissage. Des boutons de remplacement sont présents pour les métiers actuels, mais leurs conséquences ne sont pas établies : conservation de l’expérience, coût, délai et retour au métier restent inconnus.

L’aide annonce que la récolte continue pendant d’autres activités, que les réserves sont partagées par le royaume et qu’elles se remplissent à chaque rotation. Le panneau montre effectivement une réserve partagée, son abondance et sa quantité. La cadence de rotation et la persistance après déconnexion n’ont pas été testées.

Chaque filon ou recette indique niveau requis, durée et quantité actuellement réalisable. La fiche centrale détaille énergie, XP, composants, quantité par lot et quantité maximale. Les recettes futures restent visibles : elles servent de projection vers les prochains paliers. Certaines recettes avancées sont signalées « Aux Archives », ce qui ajoute une condition de connaissance à celle du niveau.

L’aide distingue quatre qualités d’ouvrage : grossière, honnête, royale et chef-d’œuvre selon la maîtrise. Le marché affiche concrètement des variantes d’un même équipement. Le taux de réussite ou la distribution de ces qualités n’a pas été étudié.

### Une chaîne vérifiée dans les écrans, sans exécution

Source : <https://play.rakorn.fr/crafting?mode=craft>, sélection « Lingot de fer » ; <https://play.rakorn.fr/market>.

1. Le filon de fer est accessible au mineur dès le niveau 3 ; sa liste indique 53 secondes dans l’état du compte.
2. La recette du lingot, mineur niveau 3, demande cinq unités de fer et affiche une minute, deux points d’énergie, deux XP métier et une XP héros arrondie dans cet état.
3. La fiche donne directement un repère de marché : 55 pièces d’or et 274 unités vendues en sept jours au moment de la consultation, ainsi qu’un gain estimé de 20. Le calcul exact de cette estimation n’a pas été validé.
4. Le marché dispose d’offres réelles de fer et de lingots, avec minimum d’offre, prix moyen, vendeurs et stock disponible. Cela permet une décision « vendre brut ou transformer » à partir de l’atelier lui-même.

Ce qui est vérifié est **la chaîne d’information et les possibilités affichées**. Aucun bénéfice réel, temps encaissé ou vente exécutée n’est revendiqué.

### Marché : lisibilité et signaux économiques

Source : <https://play.rakorn.fr/market> et aide « Le Marché ».

- Mise en vente gratuite ; jusqu’à 100 offres simultanées selon l’aide.
- Frais de 5 % supportés par l’acheteur ; or de ventes à encaisser manuellement. Rien n’a été encaissé.
- Comparaison du prix moyen de la semaine, prix minimum et quantités disponibles. Filtre « Mon niveau », catégories, niveaux, qualités et ensembles.
- Le comptoir apparaît comme vendeur distinct et parfois seul vendeur de matières. Il fournit une alternative au marché des joueurs ; ses règles de stock, renouvellement et prix n’ont pas été établies.
- Des matières et équipements d’entrée de gamme possèdent plusieurs vendeurs et des stocks visibles ; d’autres références n’ont qu’un vendeur. Le marché existe au-delà d’une simple maquette. Une observation ponctuelle ne prouve toutefois ni sa stabilité ni l’accessibilité d’un métier sur la durée.
- Les variations en pourcentage peuvent être très élevées tandis que le prix minimum actuel s’écarte fortement du prix moyen. L’indicateur est utile comme alerte ; il ne faut pas supposer que toutes ces références ont une bonne liquidité.

### Contrats et commandes : deux demandes différentes

Sources : <https://play.rakorn.fr/orders> et <https://play.rakorn.fr/commissions>, aide « Les Commandes ».

**Contrats de la Couronne** : demandes de matériaux contre or, réputation d’artisan et Faveur de la Couronne. Six lettres affichées, difficultés et renouvellement journalier, progression vers un coffre. Les objets déposés ne sont pas rendus si la lettre expire. Une lettre peut être rejetée par jour selon le bouton. Aucun dépôt ni rejet effectué. Ces contrats constituent un débouché système et peuvent soutenir la valeur de composants qui ne servent pas immédiatement à l’équipement.

**Commandes entre joueurs** : cinq simultanées selon l’aide ; rémunération à la livraison avec prélèvement de 5 %. Le fabricant reçoit de l’or et du Renom. Les offres montrent métier, niveau, quantité, qualité/ressources filtrables et commission. Certaines sont d’abord réservées aux artisans de leur niveau, puis s’ouvrent à tous en moins d’une heure : une protection visible contre la captation immédiate par des artisans plus avancés.

L’aide annonce la Maison de Maître au niveau 60 avec 1 000 de Renom. L’écran Héritage présente en parallèle des rangs, récompenses identitaires et recettes signatures ; l’agent principal couvre ce volet dans sa synthèse.

### Forge et demande d’entretien

Source : <https://play.rakorn.fr/forge>, aide « La Forge ».

Les onglets exposent réparation, recyclage, assemblage, sertissage et outils. Le sertissage est indiqué au niveau 40. L’aide précise : **chaque combat perdu use l’équipement de cinq points** ; une pièce à zéro cesse de contribuer aux statistiques mais n’est jamais détruite. Réparation par or et matières ou trousses ; outils améliorables pour accélérer la récolte ; recyclage pour récupérer de la matière.

Conséquence analytique : la réparation entretient une demande de consommables/matières, mais ne prouve pas le renouvellement permanent de la demande d’équipement neuf. Le recyclage est une sortie d’objets, pas nécessairement une destruction nette de valeur puisque de la matière revient. Il faut distinguer ces flux si l’on étudie l’économie.

### Guilde et conquête : concurrence certaine, combat PvP non démontré

Sources : <https://play.rakorn.fr/guild> et <https://play.rakorn.fr/conquete>.

Le compte n’appartient à aucune guilde. Le recrutement est visible : une seule maison simultanée, accès ouvert ou candidature, capacité, niveau minimal éventuel, jusqu’à trois candidatures. Fondation annoncée au niveau 10 ; la cité et les expéditions n’ont pas été inspectées depuis un compte membre.

La conquête montre 25 territoires, classement hebdomadaire, influence et journal de prises/pertes. Une fiche de Rakorn indique explicitement « territoire de guilde » et dispute entre guildes, puis demande de rejoindre une guilde. Les situations territoriales observées comprennent pénurie d’équipement et hiver rigoureux ; certaines terres sont verrouillées par découverte de campagne.

**Conclusion limitée : il existe de la concurrence territoriale entre guildes. Aucune bataille directe joueur contre joueur n’a été constatée.** Les règles de renversement et de contribution n’étant pas accessibles complètement dans cet état du compte, il serait excessif de qualifier le jeu de PvP de combat ou de certifier qu’il n’existe aucune interaction compétitive. La description de Gregory « sans PvP » reste compatible avec une compétition par objectifs PvE, mais cette interprétation n’est pas prouvée.

### Trois forces et trois points de vigilance

| Forces observées | Pourquoi elles comptent |
| --- | --- |
| Informations commerciales dans la recette | Le joueur voit prix et ventes sur sept jours au moment de décider quoi produire : l’économie devient une activité de décision. |
| Spécialisation et commande d’artisanat | Les deux métiers initiaux, le troisième débloqué via un produit de logisticien et les commissions créent une raison explicite de dépendre des autres. |
| Plusieurs débouchés et plusieurs progressions | Contrats système, marché, commandes, équipement, Renom et recettes futures donnent différentes motivations à la fabrication. |

| Points de vigilance | Limite ou risque à examiner |
| --- | --- |
| Densité de progression | Niveaux héros/métiers, qualité, outils, réputation, Renom, Faveur et héritage peuvent enrichir la durée tout en compliquant la compréhension des priorités. Ce coût cognitif est une appréciation, pas une mesure d’abandon. |
| Demande d’équipement durable | Puisque l’objet n’est pas détruit à zéro, la réparation seule ne garantit pas un débouché aux nouveaux équipements une fois les joueurs équipés. La demande tardive reste inconnue. |
| Prix de marché et réalité des ventes | Des fortes variations et des vendeurs uniques existent. Produire pour un prix affiché peut être trompeur ; volumes réellement vendus et délai de vente doivent accompagner le repère. |

## Limites opérationnelles et suite possible

Le contrôle automatique d’approbation a rejeté la consultation par clic du bouton « Remplacer » : il peut modifier immédiatement un métier, ce qui dépasserait l’audit en lecture seule. Aucun contournement n’a été tenté et aucune modification n’a été validée. Pour lever cette seule inconnue, consulter une aide officielle décrivant le remplacement ou obtenir une autorisation explicite de Gregory pour cette exploration ; l’audit des autres systèmes reste exploitable sans cela.

Les hauts niveaux, le métier logisticien, les expéditions de guilde, la Maison de Maître et les opérations effectives de production/vente nécessiteraient une autre phase. Aucun comportement de combat, délai de production, calcul de taxe ou effet de réparation n’a été testé par mutation. Les deux agents ont partagé une session, avec onglets distincts et navigation coordonnée. Le navigateur et son contexte sont laissés ouverts.
