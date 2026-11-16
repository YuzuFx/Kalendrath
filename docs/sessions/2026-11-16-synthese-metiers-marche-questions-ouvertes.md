# Synthèse de reprise — 2026-11-16 : métiers, craft et marché (inspirés de Rakorn)

**À lire en début de session.** Cette synthèse consigne (1) le contexte, (2) les décisions de Gregory du 2026-11-16, (3) **la réponse de Claude du 2026-11-16, reproduite telle quelle** : la liste des questions restant à statuer. Gregory reprend sur son Mac et répond à ces questions, numérotées de 1 à 14.

## Contexte

Gregory a découvert Rakorn (https://www.rakorn.fr, jeu navigateur PvE : campagne au tour par tour, 8 métiers, craft, marché entre joueurs, pas de PvP démontré). Trois audits, tous dans `docs/archives/` :

- Claude, agent A (fonctionnalités et progression) : [retours-agents-2026-11-15-audit-rakorn-fonctionnalites.md](../archives/retours-agents-2026-11-15-audit-rakorn-fonctionnalites.md)
- Claude, agent B (style graphique, animations, mobile, technique) : [retours-agents-2026-11-15-audit-rakorn-style-graphique.md](../archives/retours-agents-2026-11-15-audit-rakorn-style-graphique.md)
- Codex (synthèse, gameplay, visuel, réflexion croisée) : [retours-agents-2026-11-15-rakorn-synthese.md](../archives/retours-agents-2026-11-15-rakorn-synthese.md), `...-rakorn-gameplay.md`, `...-rakorn-visuel.md`, `...-rakorn-reflexion-croisee.md`
- Croisement Claude / Codex : [retours-agents-2026-11-15-rakorn-croisement-claude-codex.md](../archives/retours-agents-2026-11-15-rakorn-croisement-claude-codex.md) (**erreur connue** : il assimile le Comptoir PNJ de Rakorn à `MerchantService` ; c'est faux, `MerchantService` n'échange que des ressources contre des ressources, un Comptoir d'objets serait un service neuf)
- Réflexion de conception (Opus, scénarios A/B/C, plan de test simulateur, 10 questions) : [retours-agents-2026-11-15-reflexion-metiers-marche-kalendrath.md](../archives/retours-agents-2026-11-15-reflexion-metiers-marche-kalendrath.md)

**Captures non versionnées** : les dossiers `docs/archives/audit-rakorn-2026-11-15/` (50 Mo, captures 00 à 55 de l'audit Claude) et `docs/archives/rakorn-2026-11-15/` (captures Codex) restent **uniquement sur la machine Linux (WSL)**. Le dépôt est public : ces captures montrent le compte de Gregory (adresse e-mail visible dans le bandeau de validation) et des illustrations de Rakorn (propriété d'un tiers). Si Gregory veut les récupérer sur le Mac : copie directe, ou décision de les publier après floutage.

Constats de code de la réflexion : l'équipement n'a aucun effet (`equipment_items` = nom, emplacement, rareté) ; la seule source PvE qui fonctionne est l'expédition, dont l'issue `GainItems` est prévue dans `ExpeditionMission` mais non codée (TODO, poids 0) ; Kalendrath n'a pas de monnaie d'or.

## Décisions de Gregory (2026-11-16)

- Système de **métiers complet avec commerce entre joueurs** : pilier d'identité PvE de Kalendrath.
- Le **héros est le chef du royaume** et personnifie le joueur ; le **royaume choisit 2 métiers** (ni le héros, ni une cité).
- **Production (bâtiments) et métiers/commerce sont distincts** ; l'artisanat complète les bâtiments, il ne les remplace pas.
- Les métiers alimentent l'**équipement des héros et conseillers** et des **objets pour quêtes ou événements**.
- Une **monnaie de commerce** sera ajoutée.
- Des **mécaniques payantes** seront liées à ce gameplay.
- **Marché limité aux joueurs du serveur**. À la fusion de serveurs : reset des marchés annoncé en amont, offres en cours annulées, marchandises rendues aux joueurs.

Ces décisions écartent la recommandation de l'agent de réflexion (scénario A, pas de marché en V1). Rien n'est encore écrit dans le GDD ni dans le code.

## Réponse de Claude du 2026-11-16 (reproduite telle quelle)

Vos décisions règlent une partie des questions et écartent la recommandation de l'agent, qui était de ne pas faire de marché en V1. Il reste surtout des questions d'ordre de livraison, de monnaie et de garde-fous.

### Ce que vous avez tranché
- **Cap :** métiers complets avec commerce entre joueurs, comme identité PvE de Kalendrath.
- **Qui exerce le métier :** le royaume, dont le héros est le chef, choisit 2 métiers.
- **Production :** elle reste séparée des métiers et du commerce. L'artisanat complète les bâtiments et ne les remplace pas.
- **Débouchés des métiers :** équipement des héros et conseillers, et objets pour quêtes ou événements.
- **Monnaie :** une monnaie de commerce dédiée.
- **Marché :** un par serveur. À la fusion, les marchés sont remis à zéro avec préavis et les offres en cours sont annulées, marchandises rendues.
- **Monétisation :** des mécaniques payantes sont liées à ce gameplay.

### Questions restantes, par priorité

**Bloquantes (elles conditionnent le reste)**

1. **Ordre de livraison.**
   - **Question :** quelle est la première version jouable ? L'agent propose de tester d'abord la boucle expédition → composants → Forge → équipement, puis d'ouvrir le marché après le test entre amis. Vous voulez le système complet, mais le marché dépend de chantiers absents : Redis et Horizon, le service de guerre et les comptes liés.
   - **Ma recommandation :** livrer en deux temps, boucle de fabrication d'abord, marché ensuite, en gardant le marché dans le périmètre annoncé.
2. **Quelle monnaie ?**
   - **Question :** une monnaie dédiée est actée, mais d'où vient-elle ? Ce serait une cinquième ressource, que le GDD avait évitée. Il faut dire comment on la gagne (ventes au Comptoir PNJ, contrats, expéditions), si elle est pillable pendant les guerres, et si elle s'achète avec de la Kaelite.
   - **Ma recommandation :** non pillable, jamais achetable directement, gagnée par l'activité.
3. **Guerres d'alliances et marché.**
   - **Question :** un marché est un canal de transfert (boosting, alimenter un allié en guerre). Faut-il le fermer aux alliances en guerre, comme le transport entrant ? Les achats entre comptes liés sont-ils interdits ?
   - **Ma recommandation :** fermeture pendant une guerre, plus un plafond hebdomadaire d'achat par compte.
4. **Que peut-on vendre ?** Tout est-il échangeable, ou seulement composants et consommables ? L'agent déconseille la vente d'équipement fini : un payeur deviendrait fournisseur des autres et contournerait la progression. Les plans et recettes sont-ils échangeables ?

**Structurantes (elles changent la conception des métiers)**

5. **La demande d'équipement est trop faible.** Avec un héros et quatre conseillers, l'agent estime 1 à 2 pièces par semaine, ce qui ne fait pas vivre un métier ni un marché. Votre idée d'objets pour quêtes et événements aide. Reste à décider quelle consommation récurrente soutient la demande : consommables, améliorations qui consomment la pièce précédente, objets d'événement, ou contrats PNJ.
6. **Combien de métiers, et lesquels ?** L'agent a suggéré 4 à 6 (forgeron, armurier, joaillier, alchimiste, noms à définir). Leurs noms doivent passer par le lexique. Pour chaque métier, une chaîne matière → composant → pièce, au rythme heures et jours d'OGameX.
7. **Interdépendance.** Rakorn verrouille le 3ᵉ métier derrière un objet fabriqué par un autre métier. Chez vous, le royaume choisit 2 métiers : ce choix est-il définitif, ou modifiable, et à quel coût ? Sur un serveur peu peuplé, il faut une porte de sortie PNJ pour ne pas bloquer un joueur.
8. **Source des composants.** Viennent-ils uniquement du PvE (expéditions, camps, missions de héros) ? La production passive ne sert-elle qu'à payer les coûts de fabrication ? C'est le point qui relie le gameplay PvE aux métiers.
9. **Délai de la première pièce.** Le joueur doit-il fabriquer sa première pièce le premier jour, ou dans la première semaine ?
10. **Usure de l'équipement.** Faut-il une durabilité (une pièce usée ne compte plus mais ne disparaît pas) ? Elle crée de la demande de réparation et une corvée de plus.

**Monétisation**

11. **Accélération en Kaelite.** Elle accélère la file de la Forge, dans le même plafond que les chantiers.
    - **Le risque :** avec un marché, l'accélération multiplie l'offre vendable. L'argent réel devient alors de la richesse de jeu cédée à d'autres, ce qui touche au pay-to-win.
    - **La parade proposée :** composants issus d'une fabrication accélérée non vendables, ou marché limité aux composants de source PvE.
12. **Ce qui reste interdit à la vente :** composants, plans, taux de drop. Un « butin garanti » serait du pay-to-win déguisé.

**Marché et serveurs (surtout réglé)**

13. **Liquidité d'un serveur jeune ou dépeuplé.** Le Comptoir PNJ sert de garantie : il achète et vend aux bornes d'une fourchette de prix. Ce service est à créer, car `MerchantService` n'échange que des ressources contre des ressources. Confirmez-vous ce principe ?
14. **Fusion :** votre règle convient. Il faut seulement fixer la durée du préavis et du gel (l'agent propose 7 jours) et que l'historique des prix soit remis à zéro.

**Garde-fous du marché (à calibrer au simulateur, pas à décider tout de suite)**
- Frais de vente détruits, fourchette de prix, plafond d'offres, prix indexés sur le rang de l'objet pour contrer l'inflation exponentielle d'OGameX.
- Recettes versées directement, pour éviter un coffre-fort à l'abri du pillage.

### Prochaines étapes possibles
- **Fixer vos réponses.** Dès que vous répondez aux questions 1 à 4, je peux écrire une décision d'architecture et de gameplay dans `docs/`, sans toucher au GDD tant que vous ne l'avez pas validée. Je l'orienterais vers la roadmap : placement du chantier, dépendances, et rattachement au simulateur de theorycrafting.
- **Une demande de mise à jour du GDD** viendra ensuite, avec les sections concernées (§5.7 Forge, §4.2 monétisation, §5.10 marché).
- **Prérequis du simulateur :** corriger d'abord son défaut connu (chantiers de mines de 68 à 123 jours) et passer à 10 paliers.

Rien n'est écrit dans le GDD ni dans le code.

## Autres notes de session

- Les audits Rakorn ont été faits par Playwright connecté au compte de Gregory (personnage « Kalendrath », niveau 7). Seul changement d'état du compte : un combat de campagne (−5 énergie, +47 XP, +35 or, butin perdu car sac plein).
- Points de divergence Claude / Codex notés dans le croisement : prise en compte **partielle** de `prefers-reduced-motion` (anneaux qui continuent) ; **PvP non démontré mais pas exclu** (Conquête de territoires entre guildes).
- Direction visuelle à retenir de l'audit de style : sanctuaire d'objet (anneaux contre-rotatifs 120 s et 90 s, halo, flottement), rail de navigation avec raccourcis, panneaux translucides sur illustration, marché mobile en cartes, plancher de texte à 12 px, accent violet-bleu conservé. Aucun asset de Rakorn n'est réutilisable.
- Mémoire de projet mise à jour : `kalendrath-decisions-metiers-marche`.
