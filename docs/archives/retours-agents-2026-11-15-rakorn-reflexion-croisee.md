# Rakorn — réflexion croisée sur les métiers et l'économie de Kalendrath

15 novembre 2026. Complément critique délégué après les audits Claude Code et Codex. Aucun accès navigateur, changement de compte, code, GDD ou roadmap dans cette tâche. Les propositions restent à discuter avec Gregory. Aucun coût, taux ou rythme de Kalendrath n'est fixé ici.

## Sources et niveau de preuve

- [Audit fonctionnel Claude Code](retours-agents-2026-11-15-audit-rakorn-fonctionnalites.md), dont un combat effectivement joué et un butin abandonné.
- [Audit graphique Claude Code](retours-agents-2026-11-15-audit-rakorn-style-graphique.md), avec relevés DOM/CSS et captures.
- [Audit gameplay Codex](retours-agents-2026-11-15-rakorn-gameplay.md) et [audit visuel Codex](retours-agents-2026-11-15-rakorn-visuel.md), réalisés en lecture seule.
- [Synthèse Codex initiale](retours-agents-2026-11-15-rakorn-synthese.md).
- [GDD](../game-design-document.md), notamment §3, §4.1, §5.4 à §5.9 ; [roadmap](../feuille-de-route-projet-jeu.md), phases 3 et 4 ; [serveurs en continu](../etude-serveurs-en-continu.md) ; [architecture cible](../decision-architecture-cible.md) ; [planche de style](../direction-artistique-planche-de-style.md). CLAUDE.md, lexique et dernière synthèse de session relus.

« Concordant » signifie rapporté par les deux audits ou visible dans les captures examinées. Cela ne remplace pas une vérification du serveur. « Rapporté » désigne une observation d'un agent ou une règle affichée par le jeu. « Hypothèse » désigne notre interprétation ou une proposition pour Kalendrath.

Le croisement renforce l'intérêt de l'artisanat, mais ne prouve ni la stabilité de l'économie de Rakorn ni la bonne durée d'une session. Le même compte de début de progression a servi aux deux audits ; les observations ne représentent pas plusieurs profils indépendants.

## 1. Apports nouveaux qui méritent d'être conservés

**Le retour de session est une fonctionnalité de jeu.** Le Rapport de l'intendant, détaillé par Claude, transforme les ventes, productions et commandes terminées pendant l'absence en bilan lisible. Pour Kalendrath, ce principe correspond directement aux missions asynchrones et aux files déjà prévues. Son intérêt est d'expliquer ce qui a changé et ce qui mérite une décision ; il n'exige pas que le joueur réclame manuellement chaque gain.

**Le marché accompagne la production.** Les deux audits relèvent prix et ventes dans la recette. Claude ajoute des prix assistés à la vente, une place relative parmi les offres et une fourchette de prix affichée. La capture `06-marche-vendre.png`, examinée dans ce complément, montre bien ces éléments. Cela enrichit la décision vendre brut/transformer/attendre, sans garantir une vente.

**L'identité d'artisan peut dépasser le score.** Commanditaire et artisan nommés, vente mise à l'honneur, titres, recettes signatures et Renom peuvent rendre l'échange socialement gratifiant. C'est une autre motivation que la seule optimisation de l'or. L'effet sur la rétention reste une hypothèse, pas un résultat mesuré.

**Le mobile bénéficie de représentations propres.** Le rapport graphique Claude montre un marché en cartes et un inventaire réorganisé ; il enrichit notre première vérification mobile limitée. L'absence de débordement horizontal ne suffit néanmoins pas à valider tout le parcours d'achat, de comparaison et de fabrication.

## 2. Rectifications et limites à ne pas propager

| Sujet | Lecture critique à retenir |
|---|---|
| XP des métiers « 25 % » | Claude décrit un indicateur local de 25 %. Codex a lu un tooltip qui rapporte un rendement de base à l'énergie de combat, puis un coefficient selon l'écart de niveau. Ce n'est pas une part universelle de toute l'XP du personnage. |
| Trois ou quatre qualités | La capture de recette montre Honnête/Royale/Chef-d'œuvre ; le marché et l'aide comprennent aussi Grossière. La recette expose des résultats possibles dans un contexte de maîtrise, pas nécessairement toute l'échelle globale. La distribution et les effets ne sont pas testés. |
| Réussite de fabrication | Les qualités et chances affichées ne démontrent ni un taux de réussite total ni l'absence de perte de composants. Aucun audit n'a fabriqué de lot. Ne pas transformer « Honnête assurée » pour une recette en règle universelle. |
| Comptoir « plancher de prix » | Un vendeur PNJ offre une source d'approvisionnement ; il ne garantit pas un prix minimum auquel le joueur peut revendre. Un prix de rachat garanti serait une autre règle, non démontrée ici. Même un plafond pratique dépendrait du stock et de l'accès. |
| MerchantService équivalent au Comptoir | Le GDD décrit un échange payant de ressources à taux aléatoires bornés, pas une boutique de composants et équipements. Réutiliser certaines primitives n'implique pas que le service fournisse déjà le marché voulu. |
| Achat quotidien « demande garantie » | Un objectif d'achat peut stimuler les transactions. Il peut aussi produire des achats de convenance et une circulation subventionnée. Cela ne prouve pas une demande utile durable pour chaque artisan. |
| Sac plein et perte de butin | Le rapport Claude décrit une décision « Tout laisser » après saturation du sac. C'est une friction réelle dans cette situation ; cela ne prouve pas une destruction automatique du butin ni l'impossibilité de toute autre issue. |
| Pas de hasard caché | Chances de victoire et butin affichés rendent le risque plus lisible. Un combat gagné en un tour ne démontre pas que toute la résolution est transparente ou que l'estimation soit calibrée. |
| Rythme | Cinq points d'énergie par combat ne veulent pas dire cinq minutes de combat. Les durées de lot et leur multiplication par quantité restent partiellement inconnues. Un objectif hebdomadaire et une régénération ne suffisent pas à établir qu'un joueur régulier n'est jamais contraint. |
| Conquête et PvP | Compétition territoriale entre guildes établie ; combat direct entre joueurs non démontré. La formule « aucun PvP » ne doit pas devenir une conclusion indépendante d'audit. |
| Rareté de Kalendrath | Le GDD retient cinq raretés. Ajouter un « mythique animé » en plus, comme le suggère une liste de composants graphiques, serait une décision de contenu supplémentaire. |
| Typographie | Cinzel existe déjà dans le GDD pour les titres du pilote. La présence de cette police chez Rakorn ne justifie pas à elle seule son abandon. La différenciation vient de l'ensemble de la composition. |

Les relevés techniques doivent également conserver leur portée : absence de canvas ou de bibliothèque reconnaissable sur les écrans visités ne démontre pas l'absence de toute bibliothèque dans l'application. Des entrées réseau cumulées après navigation ne sont pas un budget de chargement à froid. Le nombre de keyframes et de variables vues dans `:root` ne suffit pas à juger toute l'organisation du code. La présence de règles `prefers-reduced-motion` ne vaut pas conformité complète : Codex a observé les anneaux continuant à tourner avec cette préférence.

## 3. Cinq arbitrages pour Kalendrath

### A. Qui porte la spécialisation ?

**Alternatives :** métier attaché au héros ; métier indépendant dans chaque cité ; expertise du royaume, mise en œuvre dans ses ateliers.

**Avis proposé : expertise du royaume avec production située dans les cités.** Cela évite de détourner le héros de ses missions et de multiplier les barres d'expérience. Cela préserve un choix d'identité quand le joueur possède plusieurs cités. Des métiers libres et cumulables par cité peuvent en effet rendre le royaume autosuffisant simplement en colonisant, annulant l'interdépendance recherchée.

Ce choix ne fixe pas le nombre de spécialisations ou un plafond. Il faut d'abord décider si l'on veut une vraie complémentarité entre joueurs ou seulement une commodité à acheter ailleurs. Une réorientation devra avoir des conséquences lisibles et préserver l'investissement du joueur ; le bouton de remplacement de Rakorn n'a pas été testé.

**Critère à éprouver :** un royaume avancé conserve-t-il une raison utile d'acheter à un autre, sans qu'un débutant soit bloqué faute de fournisseur ?

### B. Que vend-on, et pourquoi le besoin revient-il ?

**Alternatives :** équipements durables seulement ; composants et équipements ; ajout de consommables ou de commandes collectives ; entretien obligatoire.

**Avis proposé : commencer par une chaîne utile d'équipement, puis vérifier des débouchés récurrents distincts.** Les composants servent au renouvellement de l'équipement, mais ce renouvellement peut finir par ralentir. La réparation après défaite n'est pas une solution suffisante : un joueur victorieux ne fournit pas ce débouché et l'objet reste conservé. Avec le modèle actuel, Kalendrath possède un héros principal et jusqu'à quatre conseillers, non six ou sept héros complets ; la demande d'équipement ne doit pas être surestimée à partir de l'ancien cadrage.

Les commandes collectives liées aux objectifs PvE déjà prévus constituent une piste cohérente à étudier. Les consommables seraient une autre extension à définir. L'entretien ne devrait pas être ajouté uniquement pour forcer le marché à absorber des surplus : cela créerait une obligation avant de créer une décision intéressante.

**Critère à éprouver :** après avoir équipé le héros et ses conseillers, un artisan a-t-il encore un produit utile à livrer ? Identifier la destination précise des produits et les sorties de stock avant d'élargir le catalogue.

### C. Comment éviter un marché vide sans rendre les artisans superflus ?

**Alternatives :** prix entièrement libres ; corridor borné ; fournisseur PNJ ; commandes PNJ ; combinaison limitée de ces outils.

**Avis proposé : définir le rôle de chaque outil avant de choisir ses paramètres.** Un fournisseur PNJ assure l'accès à des composants ; une commande PNJ crée une demande ; un acheteur PNJ garanti retire des objets et injecte une monnaie ; un corridor borne les annonces. Ces effets ne sont pas interchangeables. La monnaie ou l'unité de compte du marché de Kalendrath reste elle-même à définir : l'or de Rakorn ne se transpose pas implicitement aux quatre ressources stockées du GDD.

Les serveurs par chapitre rendent important le scénario de faible population. Une chaîne indispensable au démarrage ne doit pas dépendre exclusivement d'un métier absent du serveur. À l'inverse, un PNJ vendant toutes les pièces à un tarif très avantageux peut effacer le rôle de l'artisan. Un corridor fondé sur une référence peu liquide peut immobiliser le marché ou figer un prix ancien ; la présence de bornes n'en démontre pas la robustesse.

**Critère à éprouver :** simuler un serveur jeune avec spécialité manquante, puis un serveur mûr où les stocks s'accumulent. Vérifier accessibilité, débouchés et possibilité réelle de vendre dans les deux cas. Le simulateur du projet reste obligatoire avant tout coût ou rythme.

### D. Faut-il qualité et rareté dès le premier artisanat ?

**Alternatives :** rareté seule ; qualité supplémentaire déterministe ; qualité probabiliste dépendant d'une maîtrise.

**Avis proposé : garder la rareté existante pour la première boucle et réserver la qualité à une extension éprouvée.** La qualité peut créer une réputation d'artisan et un perfectionnement intéressant. Elle ajoute aussi des variantes aux objets, filtres, comparaisons, stocks et prix, ainsi qu'un résultat potentiellement décevant après une attente. La combinaison niveau d'objet × rareté × qualité n'est pas gratuite en contenu ni en compréhension.

Si elle est retenue ensuite, sa fonction devra être distincte : qu'apporte la maîtrise que la progression du métier et les recettes ne fournissent pas déjà ? Une production prévisible peut être préférable aux tirages répétés pour une commande précise. Il n'existe pas de preuve que le modèle de qualité de Rakorn soit nécessaire à l'intérêt d'un métier dans Kalendrath.

**Critère à éprouver :** comparer la lisibilité et les décisions d'une même petite chaîne avec et sans qualité. Une qualité nouvelle doit changer une décision utile, pas seulement allonger la chasse à la meilleure version.

### E. Quelle routine veut-on encourager ?

**Alternatives :** journal quotidien exhaustif avec prime au complet ; objectifs au choix ; bilan de retour et objectifs progressifs liés au jeu naturel.

**Avis proposé : privilégier le bilan de retour et des objectifs compatibles avec plusieurs rôles.** Le Rapport de l'intendant est une référence forte pour un jeu asynchrone. En revanche, imposer combat, réparation, vente, achat et commandes chaque jour peut réduire la liberté de spécialisation et transformer l'économie en corvée de validation.

Faire acheter uniquement pour remplir une jauge ne garantit pas l'utilité de l'objet. De même, réparer pour un serment peut entrer en tension avec une usure limitée aux défaites : il faut vérifier que l'objectif reste faisable sans comportement artificiel. Les commandes accessibles aux petits artisans et la reconnaissance des contributions sont plus directement liées à la coopération.

**Critère à éprouver :** une session courte permet-elle de comprendre ce qui s'est passé, de choisir une prochaine action et de partir sans sentiment de liste inachevée ? Vérifier aussi qu'une absence de plusieurs jours ne transforme pas le retour en corvée de réclamations.

## 4. Ce que ce complément recommande de décider en premier

Avant de compter les métiers ou de dessiner un marché complet, décrire un seul produit : origine du composant, producteur, prérequis de recette, usage par le héros, possibilité d'échange et destination après obsolescence. Puis vérifier ce parcours avec la spécialisation d'un autre joueur absente du serveur.

La présentation peut progresser en parallèle au stade des mockups : objet sélectionné mis en valeur, coût et gain lisibles, provenance des ingrédients et état de production. L'animation ne nécessite ni qualité supplémentaire ni nouveau système économique. Les effets de lévitation conviennent particulièrement aux objets détourés ; les scènes de cité et les unités déjà composées ne doivent pas être transformées automatiquement en objets flottants.

Les cinq arbitrages sont des recommandations. Aucun ne remplace la décision de Gregory, le cadrage V1 ou les essais du simulateur. Aucun nouveau nom de métier de Kalendrath, chiffre d'équilibrage ou calendrier n'est proposé.
