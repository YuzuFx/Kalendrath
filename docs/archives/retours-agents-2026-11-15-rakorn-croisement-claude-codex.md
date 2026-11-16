# Rakorn — croisement des audits Claude Code et Codex

15 novembre 2026. Relecture et synthèse critique demandées par Gregory après les audits indépendants. Ce document enrichit la [synthèse Codex](retours-agents-2026-11-15-rakorn-synthese.md), sans modifier les rapports sources, le GDD ou la roadmap.

## Sources et niveaux de preuve

- **CF** : [Claude, fonctionnalités et progression](retours-agents-2026-11-15-audit-rakorn-fonctionnalites.md).
- **CV** : [Claude, style graphique et technique](retours-agents-2026-11-15-audit-rakorn-style-graphique.md).
- **DF** : [Codex, gameplay et économie](retours-agents-2026-11-15-rakorn-gameplay.md).
- **DV** : [Codex, interface et animations](retours-agents-2026-11-15-rakorn-visuel.md).
- Captures Claude dans [audit-rakorn-2026-11-15](audit-rakorn-2026-11-15/) ; captures Codex dans [rakorn-2026-11-15](rakorn-2026-11-15/).
- Réflexion complémentaire déléguée : [arbitrages pour Kalendrath](retours-agents-2026-11-15-rakorn-reflexion-croisee.md).
- Références du projet : GDD §3, §4.2, §5.4 à §5.9 ; architecture cible ; roadmap ; étude des serveurs ; lexique et planche de style. Le code de `app/Services/MerchantService.php` a été relu pour vérifier la comparaison technique.

Cette passe ne comporte aucune nouvelle navigation dans le compte. Les captures citées ont été examinées comme pièces d'étude ; une capture confirme un état d'interface, pas le calcul du serveur ni l'évolution future de l'économie.

Les observations restent attribuées : Codex a travaillé en lecture seule. CF rapporte un combat victorieux et l'abandon du butin faute de place ; les captures 19 à 21 documentent ce parcours. Il ne faut pas étendre la mention « aucune action de jeu » de l'audit Codex à l'ensemble des travaux de Claude. Un combat d'un tour ne suffit pas à juger la profondeur du système.

## 1. Ce que le croisement consolide

Les deux audits convergent sur l'interdépendance des métiers, le lien entre recette et marché, la coexistence de contrats système et de commandes entre joueurs, et l'identité artisanale de long terme. Ils convergent aussi sur les principes visuels : objets détourés, illustration d'ambiance, couches graphiques simples, mouvements lents et cohérence des états.

L'apport principal de Rakorn est une circulation compréhensible : une activité produit quelque chose, un besoin lui donne une destination, et le joueur voit à quoi sert sa progression. Cette circulation est plus utile à Kalendrath qu'une reprise de son nombre de métiers ou de recettes.

| Sujet | Résultat croisé | Niveau de confiance |
|---|---|---|
| Métiers | Deux offerts ; charte de logisticien pour le troisième ; métier et personnage ont des niveaux distincts | Concordance d'écrans et d'aide ; changement de métier non testé |
| Marché | Frais de 5 % à l'acheteur, annonces gratuites, plafond de 100 offres ; repères de prix et ventes dans la recette | Règles affichées et observées par les deux équipes ; transactions non exécutées |
| Entretien | Pièce à zéro inactive mais conservée ; cinq points d'usure annoncés par défaite | Aide concordante ; victoire sans usure visible sur capture Claude 21 ; défaite non testée |
| Animation d'objet | Deux anneaux à 120 s et 90 s en sens inverse ; lévitation ±5 px en 6 s | Mesures navigateur indépendantes et captures temporelles concordantes |
| Mobile | Adaptation du marché en cartes, navigation inférieure libellée, liste des recettes adaptée | Captures Claude 52–55 enrichissent le constat mobile partiel de Codex ; parcours intégral et tactile non testés |
| Lisibilité | Texte secondaire trop petit sur certains tableaux ; rappels persistants envahissants | Concordance visuelle ; tailles calculées détaillées par CV, pas audit complet d'accessibilité |

## 2. Apports de Claude qui enrichissent notre lecture

### Aide à la vente et bornes de prix

CF décrit trois prix assistés, un classement parmi les offres, une référence et une fourchette autorisée. La [capture 06](audit-rakorn-2026-11-15/06-marche-vendre.png) montre pour l'antimoine : vente rapide 3, équilibré 5, meilleur rendement 5, référence 6, plancher 1 et plafond 24. L'écran donne au vendeur des repères avant publication.

**À retenir :** expliquer le prix proposé, le prix récemment payé et la position de l'annonce. Les bornes sont un outil supplémentaire à étudier ; leur formule, leur fraîcheur et leur résistance aux manipulations ne sont pas établies. Un encadrement peut aussi rendre une annonce impossible à vendre si sa référence devient obsolète. La taxe et les limites d'offres ne suffisent pas à prouver une protection contre le transfert de valeur entre comptes.

### Rapport de retour et reconnaissance sociale

Le Rapport de l'intendant, les acheteurs nommés et la Chronique du jour donnent une forme narrative à l'activité asynchrone. Pour Kalendrath, c'est une piste forte pour la boucle courte : expliquer ce qui s'est construit, ce qui est revenu de mission, ce qui s'est vendu et quelle décision attend le joueur.

L'intérêt est la compréhension du changement pendant l'absence. Il n'est pas nécessaire de rendre l'encaissement manuel ou d'ajouter des récompenses à cliquer pour obtenir ce bénéfice. Une récompense à réclamer constitue une interaction de plus ; elle ne prouve pas une meilleure rétention.

### Demande système et limites des tâches quotidiennes

CF détaille le Journal des serments, qui pousse vers chaque activité économique. Les contrats PNJ retirent des matières en échange de récompenses ; les commandes relient un besoin individuel à un fabricant. Ces fonctions n'ont pas le même effet.

Un objectif « acheter dix unités » incite à faire une transaction, mais ne garantit pas une demande saine pour chaque production : il peut se remplir en achetant les unités les moins chères. Il faut distinguer le volume de transactions, l'utilité de l'objet et la satisfaction du joueur.

Pour Kalendrath, une commande système consommant un produit utile au récit ou à un objectif collectif paraît plus prometteuse qu'une obligation d'acheter, de vendre ou de réparer chaque jour. L'entretien uniquement après défaite rend d'ailleurs un objectif quotidien de réparation potentiellement mal aligné avec la réussite au combat ; les conditions exactes et alternatives de cet objectif restent à vérifier.

### Maîtrise, qualité et prévisualisation

La [capture 03](audit-rakorn-2026-11-15/03-metiers-forgeron-recette.png) confirme une maîtrise chiffrée et une qualité honnête assurée, avec une probabilité de qualité royale. Elle montre aussi une comparaison avec l'équipement actuel et un gain estimé négatif.

Ce sont deux leçons différentes : **la prévisualisation aide immédiatement à décider** ; la qualité variable ajoute une couche de progression et d'équilibrage. On peut retenir la première sans ajouter tout de suite la seconde. La maîtrise peut donner un objectif à l'artisan, mais la distribution réelle des résultats n'a été testée par aucune équipe.

### Mobile et navigation : révision de notre réserve initiale

CV montre une conception mobile spécifique, notamment le [marché en cartes](audit-rakorn-2026-11-15/52-mobile-market.png) et la [liste des recettes](audit-rakorn-2026-11-15/53-mobile-crafting.png). Cela réduit l'inconnue de notre première capture vide : il existe bien des vues de liste utiles sur mobile. La sélection d'une recette jusqu'à son panneau d'action, les interactions tactiles et le parcours de bout en bout restent à contrôler.

CV observe aussi que le rail de navigation se déploie au survol avec noms et raccourcis. Notre réserve « icônes seules » concernait l'état replié ; les libellés existent. Ils doivent également être accessibles au clavier et au tactile avant de retenir cette solution.

## 3. Conclusions à corriger ou à garder sous réserve

| Formulation des sources | Lecture retenue pour la synthèse |
|---|---|
| « Le Comptoir fixe un plancher » | Un PNJ vendeur seul offre une source d'approvisionnement. Un prix minimum de revente exige un acheteur prêt à reprendre les objets. Un prix plafond effectif exige aussi un approvisionnement suffisant. Aucun de ces engagements n'est démontré ici. |
| « C'est exactement MerchantService » / « taux fixes » | Le code existant convertit trois ressources, avec appel payant et taux aléatoires bornés. Il ne gère ni catalogue d'objets, ni offres de joueurs, ni commandes. Sa présence ne transforme pas ce marché en fonctionnalité prête. |
| « L'XP des métiers est à 25 % » | DF a lu une règle d'équivalent énergie puis de coefficient selon l'écart de niveaux. Les 25 % visibles sur une recette sont un cas, pas un taux universel entre XP métier et héros. |
| « Un combat : cinq minutes » | Cinq points d'énergie ne sont pas cinq minutes de combat. Même si la recharge annoncée vaut un point par minute, elle mesure une récupération de capacité, pas une durée d'action. |
| « Une soirée » / « environ 120 XP par niveau » | Un état à 508 ou 555 sur 630 ne permet pas de reconstruire la courbe d'XP. La durée d'une progression complète n'a pas été mesurée. |
| « Aucun hasard caché » | Des probabilités de butin et estimations de victoire sont affichées. Cela ne démontre pas l'exposition de toutes les règles aléatoires du moteur. |
| « Le jeu dit si fabriquer est rentable » | Il affiche une estimation. Prix futur, vente effective, qualité obtenue, taxe et coût d'opportunité restent à considérer. |
| « Trois qualités » | Trois repères apparaissent sur cette recette ; l'aide mentionne aussi la qualité grossière. Le catalogue et le libellé « normale/honnête » demandent une définition homogène. |
| « Rareté = niveau » | Niveau requis, rareté et qualité sont trois dimensions distinctes ; leur relation exacte n'est pas démontrée. Kalendrath possède déjà cinq raretés validées. |
| « 918 hauts faits, 1 177 points » | Les écrans contiennent plusieurs compteurs et filtres ; notre relevé montre notamment 49/1 177 et un sous-registre à 918/918. Ne pas figer une taille totale de catalogue depuis ces nombres seuls. |
| « Aucun PvP direct » / « PvE+PvP de guilde » | Les formules sont trop affirmatives et parfois contradictoires. Concurrence territoriale certaine ; modalités des combats entre joueurs non établies. |
| « +30 % de plafond payeur du GDD » | La révision du 27 octobre en GDD §4.2, point 8, laisse le plafond chiffré ouvert. Le rapport ne doit pas réactiver une ancienne valeur comme décision actuelle. |
| « Plusieurs héros-gouverneurs » dans notre première synthèse | Le GDD §5.5 a remplacé ce modèle le 11 octobre par un héros principal et jusqu'à quatre conseillers à inventaire allégé. Notre synthèse est corrigée ; la demande d'équipement ne doit pas être projetée depuis l'ancien modèle. |
| « Temps courts incompatibles avec Kalendrath » | Les constructions peuvent rester longues tandis qu'une autre activité occupe une courte session. La durée de craft doit être simulée ; elle n'est pas imposée automatiquement par celle des bâtiments. |

## 4. Lecture critique des recommandations graphiques et techniques

Le détail de CV renforce le constat : beaucoup de présence visuelle vient de textures, illustrations et mouvements appliqués à quelques couches. Pour le premier mockup, un objet sélectionné, ses composants, son bénéfice et une animation discrète sont une cible concrète.

Quatre nuances empêchent de transformer l'inventaire technique de Rakorn en plan de développement automatique :

1. **Mouvements réduits :** CV repère des règles dans les feuilles de style ; DV émule réellement la préférence et observe que les anneaux continuent. Les deux constats sont compatibles : présence d'une règle ne signifie pas couverture complète. Notre composant devra être vérifié dans cet état.
2. **Performances :** absence de canvas sur les écrans examinés ne prouve ni absence globale de bibliothèque ni coût GPU faible sur tout appareil. Les quelque 330 keyframes et 461 ko de CSS sont des relevés de CV ; le nombre de déclarations ne mesure pas le nombre d'animations actives. Les poids réseau cumulés après navigation ne sont pas un chargement à froid comparable.
3. **Effort :** un démonstrateur d'anneaux est circonscrit ; un composant utilisable sur ordinateur et mobile, accessible et intégré au design system demande davantage. Les durées « jours/semaines » du rapport sont des estimations, pas des engagements de Kalendrath. Aucun changement de framework ou ajout de bibliothèque n'est justifié par ce croisement.
4. **Langage visuel :** l'anneau convient aux objets et à la magie. Faire flotter uniformément bâtiments et scènes de cité affaiblirait leur matérialité. Préférer, selon le sujet, lumière, fumée, poussière ou retour d'action. Les cinq raretés de Kalendrath restent celles du GDD ; « mythique animé » n'est pas un sixième palier décidé.

Les captures permettent de qualifier un rendu illustré et semi-réaliste. Elles ne suffisent pas à certifier sa méthode de production, son coût ou ses licences. L'étude porte sur les principes ; les assets et le code de Rakorn restent des références internes.

Cinzel est déjà mentionnée pour les titres du pilote héros dans le GDD §5.5. La remplacer seulement parce que Rakorn l'emploie n'est pas nécessaire ; la combinaison des matières, couleurs, illustrations et usages typographiques doit porter l'identité. Ce repère du pilote ne dispense pas de valider la typographie finale dans le design system.

## 5. Recommandations enrichies pour Kalendrath

### Qui exerce le métier ?

Je recommande d'étudier une **expertise du royaume**, avec production organisée dans les ateliers des cités et composants spéciaux issus des missions. C'est une piste, pas un nouveau système acté. Une spécialisation totalement indépendante par cité permettrait à un joueur possédant plusieurs villes de tout produire et pourrait annuler la dépendance recherchée entre artisans.

Il faut donc choisir ensemble le périmètre d'apprentissage, le nombre de spécialités accessibles et le rôle de chaque cité. Le troisième métier par charte est un exemple de Rakorn, pas une règle à reprendre avant ce choix. Une solution d'approvisionnement de secours devra éviter qu'un serveur neuf soit bloqué par l'absence d'un artisan précis.

### Qu'est-ce qui crée la demande ?

La première chaîne doit avoir une utilité personnelle vérifiable. Ensuite, comparer trois débouchés : équipement des héros/conseillers, produits consommables et contrats système. Une réparation supplémentaire peut être étudiée, mais elle ne doit pas être ajoutée seulement pour faire tourner le marché : Kalendrath prévoit déjà une indisponibilité du héros en cas d'échec.

L'équipement durable n'est pas condamné à être invendable ; son renouvellement dépend du nombre de joueurs arrivant, des changements de build et de la progression. Nous n'avons cependant pas de mesure permettant de compter sur ces flux à long terme. Une qualité variable peut déplacer la demande vers les meilleures pièces tout en dévalorisant les autres ; ce n'est pas une solution automatique à la saturation.

### Quel commerce au départ ?

Commencer par définir les biens échangeables et la monnaie ou le mode de règlement. L'or existe dans Rakorn ; il n'est pas une cinquième ressource décidée pour Kalendrath. Les quatre ressources du GDD et la Kaelite ont déjà des rôles distincts. Aucun jeton commercial nouveau n'est créé par cette étude.

La présentation par article, l'historique de ventes et les prix assistés sont de bons principes. Le choix entre annonces et commandes doit dépendre des objets : matières standardisées et équipements aux propriétés individuelles ne s'agrègent pas nécessairement de la même manière. Une interface très complète n'est pas la preuve d'une économie robuste.

### Que mettre dans les premiers mockups ?

Un écran Forge associant liste, objet sélectionné, possédé/requis, provenance du manque, résultat attendu et action principale. Un état de retour montrant ce qui a changé pendant l'absence. Une déclinaison mobile en cartes et un état sans mouvements. Les animations peuvent être testées avec les visuels validés ou des objets de démonstration, indépendamment du développement d'un marché complet.

La séquence de conception proposée devient : **utilité de la recette → périmètre des spécialités → besoins récurrents → règles d'échange → présentation du marché**. Les choix de coût, prérequis et rythme passent ensuite par le simulateur de theorycrafting avant leur inscription dans le GDD.

## 6. Portée de ce rendu

Rapports sources conservés ; aucune modification du compte, du code applicatif, des dépendances, du GDD ou de la roadmap lors du croisement. Aucun commit ni push. Les preuves ont été relues, mais les assertions supplémentaires des rapports qui n'ont pas de mesure ou de capture suffisamment précise restent attribuées à leur auteur.

Les deux audits convergent sur l'intérêt des métiers ; ils ne démontrent pas la viabilité de toute l'économie ni l'intérêt de reprendre tous ses freins. L'étape suivante utile est un cadrage concret d'une petite chaîne artisanale de Kalendrath, avec les arbitrages exposés dans le rapport complémentaire.
