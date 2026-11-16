# Rakorn — audit connecté et enseignements pour Kalendrath

Date : 15 novembre 2026. Demande de Gregory : examiner son compte Rakorn, la progression, les métiers, le commerce et le style graphique avec deux agents.

**Complément du même jour :** les rapports de Claude Code et leurs captures ont ensuite été croisés avec cet audit. Voir [le croisement détaillé Claude–Codex](retours-agents-2026-11-15-rakorn-croisement-claude-codex.md) et [les cinq arbitrages de conception](retours-agents-2026-11-15-rakorn-reflexion-croisee.md). Les observations directes de Codex et les observations rapportées par Claude restent distinguées.

## Périmètre et méthode

Exploration authentifiée de `https://play.rakorn.fr/` dans un Chromium dédié, après connexion effectuée par Gregory. Deux agents : gameplay/économie et interface/animation ; complément par l'agent principal sur les quêtes, l'Héritage, les compétences, la banque, les hauts faits et la boutique. Navigation et consultation des aides seulement : aucun combat, fabrication, récolte, achat, vente, récompense réclamée, changement d'équipement ou message. Pas d'accès aux identifiants ou aux cookies exportés.

Les données décrivent les écrans accessibles depuis un compte de début de progression. Les règles indiquées par les aides restent des règles déclarées par le jeu : nous n'avons pas exécuté les opérations pour vérifier leur résolution. L'efficacité économique à long terme, le rythme réel du début à la fin et la liquidité future du marché ne peuvent pas être déduits d'une visite.

Rapports complémentaires :

- [Gameplay et économie](retours-agents-2026-11-15-rakorn-gameplay.md).
- [Interface et animation](retours-agents-2026-11-15-rakorn-visuel.md).
- [Captures et relevés](rakorn-2026-11-15/).
- [Relevés complémentaires de six écrans](rakorn-2026-11-15/complement-progression-boutique.json).

## Conclusion de conception

Rakorn est une référence pertinente pour enrichir le PvE de Kalendrath. Son apport principal est l'articulation des systèmes : activité de métier, progression du personnage, équipement, débouchés commerciaux et reconnaissance d'artisan. Le métier donne une raison de revenir pendant les attentes et une identité sociale autre que la puissance de combat.

Le GDD de Kalendrath prévoit déjà une Forge mêlant ressources, recettes et composants rares de PvE (§5.7), ainsi que des équipements pour le héros principal et les conseillers. Le modèle actuel est un héros principal et jusqu'à quatre conseillers, depuis la révision du 11 octobre (§5.5), qui remplace les anciens héros-gouverneurs par ville. Rakorn fournit des exemples concrets pour rendre cette intention jouable. Ajouter un système complet de métiers, de collecte et de marché reste cependant une extension de conception à valider ; cet audit ne modifie ni GDD ni roadmap.

## 1. Fonctionnalités et liens observés

| Ensemble | Observation ou règle affichée | Intérêt |
|---|---|---|
| Campagne et quêtes | Huit chapitres visibles dans le tableau des quêtes ; progression d'arc, étapes et objectifs explicites ; histoires secondaires distinctes | Donner un prochain objectif et contextualiser les activités |
| Métiers | Récolte et artisanat ; recettes avec prérequis, quantités, durée et gains affichés ; XP de métier et de personnage ; huit métiers annoncés : mineur, bûcheron, forgeron, couturier, joaillier, alchimiste, ingénieur et logisticien | Une progression utile hors combat |
| Spécialisation | L'aide indique deux métiers offerts, puis une Charte de spécialisation fabriquée par un logisticien pour le troisième | Créer un intérêt à l'échange plutôt que tout produire immédiatement |
| Marché | Comptoir et offres de joueurs distingués ; prix et volumes ; aide annonçant 5 % de frais à l'acheteur, mise en vente gratuite et 100 offres simultanées | Débouché commercial lisible ; les volumes renseignent davantage que le seul prix |
| Commandes | Demande de fabrication distincte de la vente d'un stock ; aide indiquant cinq commandes simultanées et 5 % à la livraison | Un besoin peut précéder la production |
| Contrats de la Couronne | Demandes système de matériaux contre or, réputation et Faveur ; six lettres affichées, renouvellement journalier et coffre de progression | Débouché complémentaire aux besoins des autres joueurs |
| Forge | Entretien de l'équipement, réparation et améliorations ; aide indiquant usure de cinq points par combat perdu, équipement inactif à zéro mais non détruit | Une consommation récurrente de matières sans disparition définitive de l'objet |
| Compétences | Techniques débloquées par niveau et parfois quête, catégories tactiques, rotation de cinq techniques et analyse du build | Un objectif d'équipement et de préparation au-delà d'un score brut |
| Héritage | Renom et récompenses de métier, coffrets, recettes signatures, titres et apparences | Une carrière d'artisan de long terme |
| Hauts faits | Catégories comprenant récolte, artisanat, marché, contrats, équipement et guilde ; progressions graduées | Reconnaître plusieurs formes de participation |
| Banque | Ouverture à 5 000 or ; dix emplacements de sacs achetables ; seuls les objets du sac sont utilisables par établi, Forge, Marché et commandes | Dépense d'or et gestion du stockage, au prix de manipulations supplémentaires |
| Boutique | Sceaux permettant d'achever récolte, fabrication ou réparation ; cadres, bannières et fonds cosmétiques | Le modèle combine apparence et accélération effective de production |

La présence de prix et de ventes ne prouve pas qu'une recette soit rentable durablement. Le gain estimé affiché par une interface est une aide à la décision, pas une garantie de vente.

Exemple consulté : un lingot de fer demande cinq unités de fer, une minute et deux points d'énergie ; la fiche indique alors un repère de 55 or et 274 unités vendues sur sept jours. Ces données relient la recette à un débouché observé dans l'interface, sans vente exécutée. Les contrats de la Couronne et les commandes de joueurs sont deux systèmes distincts ; ils ne doivent pas être confondus sous un même marché.

### Parcours concret consulté

L'accueil du compte montre un personnage de niveau 7, des métiers Mineur 11 et Forgeron 10, et une campagne à 7/15 dans le premier chapitre. Le tableau des quêtes affiche 9 quêtes rendues sur 185 et un arc principal à 9/12, avec un objectif contre un gardien de rang 10. Les valeurs de chapitre, rang de combat, étape de quête et niveau du personnage ne mesurent donc pas la même chose.

L'écran de compétences propose 27 techniques, avec des déblocages jusqu'au niveau 60. La rotation équipée possède cinq emplacements. L'analyse affichée distingue dégâts, absorption, cycle, forces et risques. Nous avons consulté la préparation, sans jouer un combat : aucun avis sur la profondeur tactique réelle ou le plaisir des combats ne découle de cet audit.

L'Héritage du forgeron expose dix rangs, avec cinq recettes signatures de niveaux 40 à 60. Les seuils visibles vont d'un premier coffret à 150 de Renom à un marteau à 20 000 de Renom. Cela établit un horizon de progression ; cela ne mesure pas combien de semaines sont nécessaires pour le parcourir.

### Ce qui entretient la boucle

La progression de métier et l'XP de personnage se cumulent ; les besoins d'équipement donnent une destination aux matières ; les offres et les commandes donnent une valeur sociale à la fabrication ; l'Héritage reconnaît l'activité artisanale sur la durée. Les quêtes et hauts faits orientent le joueur vers ces activités.

La réparation consomme des matières mais ne renouvelle pas mécaniquement la demande d'équipement neuf. Il faut distinguer marché des composants, marché des consommables et marché des objets durables. Ce point sera déterminant pour un éventuel marché dans Kalendrath.

## 2. Direction artistique : avis indépendant de l'agent principal

Avis formé après examen des captures Métiers et Inventaire, avant lecture du verdict visuel de l'autre agent.

Les réussites viennent surtout de la présentation : silhouettes d'objets lisibles, images détourées sur fonds sombres, écrin cohérent, couleurs de rareté et valorisation du sujet central. La page de recette réunit illustration, composants, disponibilité, durée, gains et repère de marché. Une image statique devient un objet que l'on souhaite fabriquer et posséder.

L'animation des ingrédients est confirmée : image flottante sur une boucle de six secondes, entourée de deux anneaux SVG tournant en sens inverse, sur 120 et 90 secondes. C'est une composition de couches graphiques et de mouvements lents ; elle n'exige pas de régénérer toute l'illustration en animation. Voir les deux [captures temporelles](rakorn-2026-11-15/objet-anime-t0.png) et [leur second état](rakorn-2026-11-15/objet-anime-t2200.png), ainsi que le rapport visuel pour la méthode.

Réserves : textes secondaires petits et peu contrastés sur les captures, recours marqué aux capitales espacées, navigation latérale par icônes demandant un apprentissage, place importante occupée par l'objet central. Ce choix convient à la contemplation d'une recette ; un écran de gestion de plusieurs cités doit aussi préserver la vitesse de lecture et la comparaison.

Pour Kalendrath, les illustrations de cités, bâtiments et unités déjà validées restent un actif. On peut enrichir leur présentation avec de la profondeur, des lueurs et des retours d'action. Les objets de Forge et composants rares se prêtent particulièrement aux halos et aux anneaux. Le violet-bleu arcanique, le bronze vieilli et les matières du projet doivent garder leur rôle ; reprendre l'or dominant de Rakorn n'est pas nécessaire.

Le test visuel complémentaire à 390 × 844 ne détecte pas de débordement horizontal global et montre une navigation basse libellée, mais ne valide pas le parcours complet de recette sur mobile. Avec la préférence système de réduction des mouvements, la lévitation disparaît tandis que les anneaux continuent : prise en compte partielle de cette préférence sur ce composant. Ces limites sont documentées, sans audit complet d'accessibilité ou de performance.

## 3. Transposition proposée — aucune décision actée

| Priorité proposée | Application à Kalendrath | Condition |
|---|---|---|
| Première boucle à éprouver | Mission PvE → composant identifié → recette → équipement utile au héros | Petite chaîne complète, sans catalogue massif |
| Métier comme choix de royaume | Développer une spécialité artisanale liée à la Forge, avec progression visible | Décider si la spécialité appartient au compte, à la cité ou à un personnage |
| Marché après utilité personnelle | Échanger composants et surplus dont l'utilité est déjà prouvée | Définir demande renouvelée, monnaie, frais, périmètre serveur et règles de transfert |
| Commandes à étudier | Un joueur exprime le besoin d'un objet et un artisan le réalise | Complément ultérieur au marché ; pas une nécessité pour la première boucle |
| Identité et reconnaissance | Objectifs d'artisan, titres, contributions de guilde | Récompenser des choix utiles plutôt qu'une multiplication de tâches à réclamer |
| Présentation dès les mockups | Objet mis en scène, composants lisibles, état manquant/disponible, progression et mouvements ciblés | Valider lisibilité et sobriété dans le design system avant implémentation |

Cette séquence est une recommandation de cadrage, pas une autorisation de développement. Les formules et prérequis éventuels devront passer par le simulateur de theorycrafting ; aucun chiffre de Rakorn n'est proposé comme équilibrage de Kalendrath.

### Questions structurantes

1. Le joueur dirige un royaume : qui exerce le métier ? Une spécialisation du royaume ou d'une cité semble cohérente ; une activité de récolte personnelle répétitive serait un choix de rythme différent à assumer.
2. Les Scieries, Mines de fer et autres productions existent déjà. La récolte de composants spécifiques doit leur ajouter un rôle, sans créer deux systèmes redondants de production des mêmes ressources.
3. Avec un héros principal et jusqu'à quatre conseillers à inventaire allégé, la demande d'équipement reste bornée et finit par se stabiliser. Quels besoins récurrents auront une utilité réelle ?
4. Le marché concerne-t-il matières, consommables et équipements, ou seulement une partie ? La circulation d'équipement de haut niveau peut contourner la progression si elle n'est pas cadrée.
5. Un marché par serveur dépend de sa population. La stratégie de serveurs par chapitre impose d'examiner la liquidité et la fin de vie des marchés, sans ouvrir de commerce interserveur implicitement.
6. Une accélération de production payante change aussi l'offre commerciale. Son effet doit être examiné avec l'économie, même dans un jeu orienté PvE.

## 4. Limites et suite de l'étude

- Audit d'interface connecté, pas test de jouabilité prolongé ni simulation économique.
- Rythme de récolte, ventes et entretiens non mesuré par exécution ; contenu avancé parfois limité aux descriptions et prérequis visibles.
- La Conquête affiche un territoire « se disputant entre guildes », mais l'accès détaillé est fermé au compte sans guilde. La concurrence territoriale est établie ; l'existence de combats PvP n'est ni démontrée ni infirmée. Un classement ou une compétition de contributions PvE ne suffit pas à établir du combat entre joueurs.
- Le clic « Remplacer un métier » a été refusé par la vérification automatique, en raison d'un risque de modification immédiate du personnage. Aucun remplacement n'a été tenté autrement ; le coût et les conséquences d'un changement restent inconnus.
- La durabilité de l'économie, l'inflation, l'équilibre gratuit/payeur et la satisfaction des joueurs restent inconnus.
- Aucun code de jeu, GDD ou plan de développement modifié. Aucun commit ou push effectué.

La prochaine décision utile est de cadrer une seule boucle artisanale de Kalendrath, reliée aux missions et à la Forge déjà prévues, puis de choisir ce qui doit être échangeable. Cet audit donne les mécanismes à discuter et les références visuelles à intégrer aux mockups.

## 5. Enrichissement après croisement avec Claude Code

Les [rapports fonctionnel](retours-agents-2026-11-15-audit-rakorn-fonctionnalites.md) et [visuel](retours-agents-2026-11-15-audit-rakorn-style-graphique.md) de Claude apportent trois compléments particulièrement utiles :

- **Aide à la vente :** prix assistés, rang de l'offre, fourchette autorisée et historique. La capture de vente confirme des bornes sur un article ; leur formule et leur efficacité contre les manipulations restent inconnues.
- **Retour après absence :** Rapport de l'intendant et mise en récit des ventes. Cette piste convient à la boucle asynchrone de Kalendrath sans exiger un encaissement manuel ou une succession de récompenses à réclamer.
- **Mobile :** marché en cartes et recettes en liste réellement adaptés. Cela complète notre capture initiale partielle ; le parcours complet de fabrication et les interactions tactiles n'ont toujours pas été validés.

Le rapport de Claude documente aussi un combat victorieux, dont les captures montrent récompenses, énergie et absence d'usure. Ces observations complètent la préparation inspectée par Codex ; elles ne constituent pas un test de progression prolongé. Aucune nouvelle action sur le compte n'a été faite pour ce croisement.

### Corrections et nuances retenues

Un Comptoir qui vend ne garantit pas un prix minimum de revente ; `MerchantService` est une conversion payante de ressources à taux aléatoires bornés, pas un marché d'objets existant. Les 25 % d'XP visibles sur une recette ne sont pas un taux universel. Une tâche « acheter » peut stimuler les transactions sans créer un besoin durable. La prise en compte des mouvements réduits est partielle sur le composant observé malgré la présence de règles CSS. Le plafond payeur de +30 % est une ancienne piste, pas une décision chiffrée actuelle.

Cinzel figure déjà comme repère des titres dans le GDD §5.5 : sa présence chez Rakorn n'oblige pas à l'abandonner. Les cinq raretés de Kalendrath restent inchangées. La qualité de fabrication est une dimension supplémentaire à évaluer après la première boucle, pas une nouvelle échelle automatiquement retenue.

### Recommandation affinée

Étudier une expertise artisanale à l'échelle du royaume, avec ateliers situés dans les cités, pour éviter qu'une spécialisation indépendante de chaque ville rende rapidement chaque joueur autosuffisant. Définir ensuite les besoins récurrents, le périmètre des biens échangeables et le mode de règlement ; l'or de Rakorn n'est pas une monnaie décidée pour Kalendrath.

Pour les mockups, retenir en priorité : fiche de recette avec résultat prévisible et provenance des ingrédients, objet sélectionné animé avec sobriété, bilan de retour et vues mobiles en cartes. Les effets sur les scènes de cité doivent préserver leur matérialité ; les anneaux et la lévitation ne conviennent pas uniformément à tous les sujets.

Ces propositions restent des arbitrages ouverts. Aucun coût, prérequis ou rythme n'est adopté sans passage par le simulateur. Les désaccords et niveaux de preuve sont détaillés dans le rapport de croisement.
