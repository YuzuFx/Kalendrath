# Jeux de référence — rythme, longévité, modèle économique

*Document de travail ouvert le 2026-10-22 pour le theorycrafting (Phase 6) et l'audit des boutiques (Phase 8). Il compare quatre jeux qui durent : OGame, Travian Kingdoms, Last War et Call of Dragons. Il en tire des leçons pour Kalendrath. Les décisions qui en sortent vont dans le [GDD](game-design-document.md), pas ici.*

**Fiabilité.** Les chiffres viennent d'une recherche faite par Gregory avec Gemini (guides, forums, Reddit, YouTube), complétée par l'expérience de Gregory sur Call of Dragons. Ce sont des ordres de grandeur à recouper, pas des données vérifiées. Exemple d'écart : la synthèse Gemini donne « 9 à 12 mois » pour l'endgame de Call of Dragons, alors que le record gratuit pour les premières unités T5 est d'environ 380 jours, et 567 jours pour tous les types T5 ; « 9 à 12 mois » vise sans doute le Hall 25, pas les T5.

## Comparatif

| | OGame (×1) | Travian Kingdoms (×1) | Last War | Call of Dragons |
|---|---|---|---|---|
| **Format** | Univers persistant, sans fin | Serveur à fin programmée (5 à 6 mois) | Serveur persistant, saisons d'environ 8 semaines | Serveur persistant, saisons de 2 à 3 mois avec remise à zéro partielle (niveaux de héros, ressources, artefacts, politiques) |
| **Bâtiment central** | Aucun (planètes et mines) | Aucun pivot unique | QG 1 à 30 : tout en dépend | Hall des Ordres 1 à 25 : tout en dépend |
| **Début de partie** | 0 à 6 mois | Semaines 1 à 4 | Semaines 1 à 3 (QG 1-15), chantiers de quelques heures | Saison 1 (Hall 1-21), fluide et gratifiante |
| **Milieu de partie** | 6 mois à 2 ans, chantiers de plusieurs jours | Mois 2 à 4, 10 à 20 villages | Mois 1 à 4 (QG 16-25), chantiers de plusieurs jours, ressources rares | Hall 22-24 : « phase de stagnation », dizaines de jours de recherche |
| **Fin de partie, joueur gratuit** | 3 à 5 ans et plus | Mois 5 et 6 : Merveille niveau 100, en royaume | 6 à 9 mois (QG 30, troupes T10) | Hall 25 vers 9 à 12 mois ; T5 vers 380 jours au mieux, 1,5 à 2 ans en parcours standard |
| **Moteur du joueur gratuit** | Expéditions (ressources et monnaie premium gratuites) | Brigands, ventes aux enchères converties en or, rôle de défenseur | Cadeaux d'alliance générés par les gros payeurs, calendrier d'events | Coffres d'alliance, Béhémoths, bonus d'alliance |
| **Place du joueur gratuit** | Viable dans le top 50-100, pas dans le top 10 | Indispensable au collectif, faible en solo | Second rôle, pilier d'alliance | Rouage tactique, faible en duel |
| **Poids du paiement** | Fort au sommet (ressources et chantiers instantanés) | Fort en solo, faible face au collectif | Très fort | Fort |

## Leçons pour Kalendrath

1. **Les jeux qui durent combinent un socle persistant et des saisons.** Last War et Call of Dragons gardent les bâtiments et les héros, et relancent l'intérêt toutes les 8 à 12 semaines avec des saisons qui remettent à zéro une couche secondaire. Travian choisit l'inverse : un serveur court qui recommence. OGame vit sur un marathon sans fin, mais c'est le plus ancien et le moins accueillant pour un nouveau joueur.
   → *Proposition : une cité persistante sur 2 ans, et des saisons de 8 à 12 semaines pour les events PvE et PvP, avec leur propre classement et leurs récompenses. Cette option hybride doit figurer dans le sondage sur le format de serveur.*

2. **Un bâtiment central qui commande tout, avec beaucoup de marches.** Le QG de Last War (30 niveaux) et le Hall de Call of Dragons (25 niveaux) confirment le choix de l'Hôtel de ville comme pivot. Mais ils étalent la progression sur 25 à 30 niveaux. Notre courbe actuelle n'a que 16 niveaux : un joueur gratuit actif en passe 13 en 73 jours, puis plus que 3 en 20 mois (J148, J333, J683).
   → *À corriger : plus de niveaux d'Hôtel de ville (25 à 30) avec des paliers de cité plus espacés, ou des jalons intermédiaires visibles entre deux niveaux. Un joueur ne doit jamais attendre six mois sans rien franchir.*

3. **Distinguer la fin de la cité et la fin militaire.** Dans Call of Dragons, le Hall 25 arrive vers 9 à 12 mois, et les unités T5 entre 1 et 2 ans. Deux objectifs successifs, au lieu d'un seul très lointain.
   → *Piste : Métropole vers 10 à 14 mois pour un joueur gratuit actif, et un objectif militaire (tiers d'unités T5, si la piste est retenue, cf. GDD 4.4) vers 18 à 24 mois. Cela garderait la cible des 2 ans tout en rapprochant le premier grand jalon.*

4. **La phase de stagnation est le moment critique.** Call of Dragons (Hall 22-24) et Last War (QG 16-25) ont tous deux un mur où les chantiers passent à plusieurs jours. C'est là que les joueurs partent, ou qu'ils paient. Ce mur doit être rempli par autre chose que l'attente : events, PvE, héros, alliance.

5. **Le collectif fait vivre le joueur gratuit.** Partout, le joueur gratuit tient grâce à son alliance : cadeaux d'alliance déclenchés par les achats des autres (Last War, Call of Dragons), royaume et Merveille (Travian). L'argent d'un gros payeur profite alors à tout son groupe.
   → *Pistes : des cadeaux d'alliance déclenchés par les achats et par les exploits PvE ; l'entraide de l'Ambassade (déjà prévue, façon Last War) ; des objectifs collectifs de fin de saison, à la manière d'une Merveille.*

6. **Le calendrier d'events dicte l'usage des accélérateurs.** Un joueur optimisé de Last War garde ses accélérateurs pour le jour d'event qui les rapporte double. Le calendrier est le premier levier d'engagement quotidien.
   → *Le simulateur suppose encore des accélérateurs utilisés aussitôt. À modéliser : réserve d'accélérateurs vidée pendant les events.*

7. **Les sources de dépense de fin de partie.** Soigner des troupes T5 coûte très cher dans Call of Dragons. Une guerre se paie en ressources, ce qui garde l'économie utile après les bâtiments.
   → *L'Hôpital (troupes blessées) et le coût des troupes doivent jouer ce rôle.*

8. **La lenteur des déplacements protège le joueur gratuit.** Sur OGame ×1, les flottes mettent des heures à voyager : un joueur payant ne peut pas surprendre un joueur gratuit. Cohérent avec le refus de l'« attaque éclair » par le Portail des Sphères (GDD 4.2).

9. **Notre plafond d'avance payante est bien plus doux que la norme.** Les quatre jeux laissent un gros payeur des mois ou des années devant. Notre tendance (20 à 30 % d'avance au maximum) est un choix fort de positionnement, et un argument face aux critiques de pay-to-win de ces jeux. Elle limite aussi les revenus par joueur, à compenser par la rétention et la taille de la communauté.

## À faire

- [ ] Recouper les chiffres clés (records T5 de Call of Dragons, durée des saisons de Last War, durée réelle d'un serveur Travian Kingdoms).
- [ ] Ajouter ce que vendent ces jeux, à quel prix, avec quels plafonds : c'est l'audit des boutiques de la Phase 8.
- [ ] **Élargir le panel** (demandé par Gregory le 2026-10-22) : quatre jeux, tous des succès, c'est un biais du survivant. Candidats : Rise of Kingdoms, Evony, Whiteout Survival, State of Survival (même famille que Call of Dragons) ; Tribal Wars, Grepolis, Ikariam (navigateur, colonies) ; Forge of Empires (progression longue sans PvP imposé) ; et au moins un jeu du genre qui a échoué ou fermé, pour voir ce qui l'a tué.
