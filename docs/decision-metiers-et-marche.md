# Décision — Métiers, craft et marché entre joueurs

**Statut : décisions de Gregory du 2026-11-17, en réponse aux 14 questions de la synthèse [2026-11-16](sessions/2026-11-16-synthese-metiers-marche-questions-ouvertes.md).** Ce document ne modifie ni le GDD ni le code. Il fixe ce qui est tranché, ce qui reste à brainstormer et les points de tension relevés. Les noms de métiers sont **provisoires** : ils passeront par le lexique avant d'entrer dans le GDD.

## Décisions arrêtées

### Cap et calendrier
- Les métiers et le commerce entre joueurs sont un pilier d'identité PvE de Kalendrath.
- **Alpha (fin 2026 / début 2027) : sans marché.** Le marché se développe pendant l'alpha et arrive en **bêta**. La recommandation de l'agent (pas de marché en V1) est donc retenue pour l'alpha, mais le marché reste dans le périmètre annoncé.
- Le **Comptoir PNJ** est un service neuf (`MerchantService` n'échange que des ressources contre des ressources).

### Qui exerce un métier : la spécialisation artisanale
- Le joueur choisit les métiers **à la création du héros** ; c'est le **royaume** qui les exerce.
- **2 spécialisations artisanales par royaume.** La limite force la collaboration entre joueurs (volonté MMO). Le vocabulaire retenu est « spécialisation artisanale », par cohérence de lore.
- **Piste de lore et de mécanique (à creuser)** : la spécialisation oriente les **denrées primaires des terres** du royaume. Un royaume couture + herboristerie a des terres à plantes, à coton et à lin, mais **sans minerai** pour la forge. À croiser avec les ressources de base et leurs usages (troupes, constructions, recherches).
- Le **3ᵉ métier** n'est pas tranché : bloquer à 2, ou le proposer en objet de boutique (à brainstormer).

### Métiers (liste de travail, modèle WoW, à brainstormer)
- **Fabrication** : forgeron, joaillier, alchimiste, couturier, travailleur du cuir. Ils couvrent l'équipement des différents archétypes (un sorcier ne porte pas de plaque, un guerrier n'utilise pas de bâton magique produit par le joaillier).
- **Récolte et transformation** : mineur (minerais spéciaux), bûcheron (essences, hampes, arcs, bases de bâtons), herboriste (plantes, pigments, poudres).
- Un joueur doit pouvoir **fabriquer une première pièce dès le premier jour** avec un combo récolte + fabrication (ex. mineur + forgeron).

### Équipement
- Au moins **10 emplacements** pour le héros, autant pour chacun des 3 à 4 conseillers.
- **Raretés** : blanc, vert, bleu, violet, orange, avec statistiques croissantes. **Niveau requis** pour porter une pièce. Un héros de niveau 2 porte une épée blanche médiocre, puis monte en gamme.
- **Usure** : durabilité, pièce brisée à 0, entretien coûteux. Au joueur de choisir entre entretenir ou traiter la pièce comme consommable (réflexion ouverte).
- La demande d'équipement est donc **plus large** que l'estimation de l'agent (1 à 2 pièces par semaine), qui ne tenait compte ni du nombre d'emplacements, ni des paliers de rareté, ni de l'usure. À re-simuler.

### Sources des composants et pillage
- La **production passive** ne produit que des ressources de construction, de recherche et de troupes.
- **Composants de métiers et objets : issus du contenu PvE.** Ils ne sont **pas pillables** en PvP, même en guerre d'alliances (seules quelques ressources le restent), pour préserver le principe du « PvP jamais subi ».
- Pendant les événements, des **patrons rares** (ou mieux) peuvent tomber, et ils sont vendables.

### Monnaie de commerce
- Sources : **commerce**, **commandes de PNJ**, **récompenses d'événements et de quêtes**, **pillage PvE**.
- Dès qu'une transaction est validée, le flux monétaire suit le transport. Non pillable, donc sans risque de détournement.

### Marché (bêta)
- **Un marché par serveur.** Tout est vendable **sauf la Kaelite**, équipement fini compris (désaccord explicite avec l'agent : sans cela, un alchimiste ne peut pas se procurer de pièces de forge).
- **Chaque transaction crée un convoi** entre les deux royaumes : il faut assez de caravanes, et le transport prend du temps.
- **Frais de transaction : 5 %** (détruits).
- **Variation de prix plafonnée à ±30 %** autour de la référence : limite le boosting et la volatilité.
- **Surveillance** du registre des transactions (volume d'échanges entre deux mêmes joueurs).
- **PNJ sur le marché** : vendeurs de composants et lisseurs de cours, en volume dégressif à mesure que la population grandit. Une économie 100 % joueurs n'est envisagée qu'avec de très nombreux préinscrits.
- **Fusion de serveurs** : annonce **15 jours** avant, gel des mises en vente **7 jours** avant, offres restantes **rendues 3 jours** avant.

## Questions encore ouvertes

| Sujet | Où on en est |
|---|---|
| **3ᵉ métier** | Bloquer à 2, ou objet de boutique. À brainstormer. |
| **Choix des métiers** | Définitif ou modifiable, et à quel coût ? Non traité. |
| **Monétisation (Q11-12)** | Pas d'accélérateur de production. Pistes : meilleur taux de loot de rareté, bonus de rendement (10 lancés, 12 obtenus), ou rien de payant sur cette mécanique. Q12 liée. |
| **Usure** | Casse à 0 avec entretien, ou consommable : réflexion ouverte. |
| **Monnaie et Kaelite** | Non pillable (acté), mais « jamais achetable avec de la Kaelite » n'est pas confirmé. |

## Points de tension à trancher

1. **Récolte contre « composants issus du PvE seulement ».** Le mineur, le bûcheron et l'herboriste « récoltent » : où, et comment ? Via les terres du royaume (production passive liée à la spécialisation), via des expéditions, ou via les deux ? Cela contredit « la production passive ne produit que des ressources de construction », sauf si les denrées de terroir sont une catégorie à part. **À régler avant de croiser avec les ressources de base.**
2. **Deux spécialisations sur huit métiers.** Un forgeron a besoin de cuir ou de bois selon la pièce. Chaque royaume dépend donc des autres pour une grande part de sa chaîne, ce qui est voulu. En alpha, **sans marché**, le joueur seul doit pouvoir fabriquer sa première pièce, avec ses deux métiers et des composants PNJ ou de quête.
3. **Plafond de ±30 % et boosting.** Il borne l'écart de valeur par transaction, mais pas le volume : un joueur peut multiplier les transactions à −30 %. La surveillance du registre est le vrai garde-fou. Un plafond d'achat hebdomadaire par compte reste une option (non retenue pour l'instant). **Guerres d'alliances et comptes liés** (Q3) : fermer ou non le marché pendant une guerre n'a pas été tranché.
4. **Troisième métier en boutique.** Il achète de la largeur, pas de la puissance, mais il contourne la collaboration qui justifie la limite à 2. À peser dans le brainstorm.

## Suites
- **Brainstorm à mener** (plusieurs agents aux angles distincts, comme pour les décisions lourdes) : spécialisation et terres, liste des métiers et chaînes matière → composant → pièce, monétisation.
- **Simulateur de theorycrafting** : modéliser la demande d'équipement (emplacements × raretés × usure), après correction de son défaut connu (chantiers de mines de 68 à 123 jours) et passage à 10 paliers.
- **GDD** : demande de mise à jour à venir sur §5.7 (Forge), §4.2 (monétisation) et §5.10 (marché), uniquement après validation de ce document.
