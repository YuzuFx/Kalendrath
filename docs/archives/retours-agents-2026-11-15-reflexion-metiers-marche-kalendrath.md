# Métiers et marché inspirés de Rakorn : réflexion de conception pour Kalendrath (2026-11-15)

*Rapport d'agent (Claude). Je propose, je ne décide pas. Aucun fichier du GDD, de la roadmap ou du code n'a été modifié. Pas de commit, pas de push.*

**Sources lues** : le croisement des audits Rakorn (lu en premier) et les audits de détail (fonctionnalités, synthèse Codex, gameplay Codex) ; `CLAUDE.md` ; le GDD (§2, 3, 4.1, 4.2 avec les points à trancher 8, 13 et 15, §4.5, 5.4 avec les décisions du 30/10, 5.5, 5.6, 5.7, 5.8, 5.9, 5.10, 9) ; `decision-architecture-cible.md` ; `etude-serveurs-en-continu.md` ; `references-jeux-du-genre.md` (leçons, question 12 sur le transport) ; `etude-pvp.md` (R4, R9, pactes commerciaux) ; `references-jeux/triche-multicomptes-bots.md` ; `plan-marketing.md` et `specification-discord.md` (commerce en argent réel) ; la roadmap (Phase 4) ; `tools/theorycrafting/README.md` et la structure de `model.js` ; la dernière synthèse de session (2026-11-02).

**Code lu** : `app/Services/MerchantService.php`, `app/GameMissions/ExpeditionMission.php`, `app/Models/{Hero,EquipmentItem,HeroEquipment}.php`, `app/Enums/EquipmentRarity.php`, les migrations du héros et de l'équipement, `SettingsService` (poids des expéditions) et `TransportMission`.

---

## 0. Ce qui existe vraiment dans le code (et deux corrections au croisement)

Ces constats conditionnent tout le reste.

1. **L'équipement n'a encore aucun effet.** La table `equipment_items` ne contient que `name`, `slot`, `rarity` et `description` : aucune statistique, aucun effet. Les statistiques du héros (`attack_power`, `armor`, `life`) sont des colonnes saisies à plat, sans formule de calcul. Une pièce fabriquée n'aurait donc **aucun débouché mécanique** tant qu'on ne lui donne pas un effet. Or les talents ont déjà un schéma d'effet (`effect_type`, `effect_value`, `effect_scope`) : c'est le bon modèle à réutiliser pour l'équipement, avec un seul calcul d'effets pour les talents et l'équipement.
2. **Le héros ne part encore en aucune mission.** Les Phases 4.1 (camps PvE), 4.3 (missions de héros) et 4.4 (Prestige) ne sont pas construites. Aucun fichier de `app/GameMissions` ne mentionne le héros. Les « camps hostiles » du GDD 5.8A n'existent pas encore comme source de butin.
3. **La seule source PvE qui fonctionne aujourd'hui, ce sont les expéditions**, et elles ont déjà un point d'accroche prêt à l'emploi. `ExpeditionOutcomeType::GainItems` existe, avec un message au joueur, mais son traitement est un `TODO` (« Implement actual item giving logic when items themselves are implemented ») et son poids vaut **0** par défaut (`expedition_weight_items`, réglable dans l'administration). C'est l'endroit naturel pour faire tomber les premiers composants, sans attendre les camps. Un risque à surveiller : l'upstream pourrait un jour remplir ce `TODO` avec les objets d'OGame (boosters, etc.), d'où un conflit de fusion. Il faut donc garder notre code dans un service séparé et ne laisser dans `ExpeditionMission` qu'un appel d'une ligne.
4. **Correction au croisement (§4.3) : `MerchantService` n'est pas un « Comptoir » d'objets.** C'est un marchand de **ressources contre ressources** (métal, cristal, deutérium), appelé contre 3 500 de matière noire ou obtenu en expédition, avec des taux tirés au hasard autour d'une base 3:2:1. Il ne vend ni n'achète d'objets et ne fixe aucun prix plancher. Ce qu'on peut en réutiliser : le modèle de transaction atomique, la lecture des taux côté serveur (anti-falsification) et le ratio de référence 3:2:1. Un Comptoir PNJ qui vend et rachète des composants serait un **service neuf**, pas une extension de celui-ci.
5. **Correction de cadrage : Kalendrath n'a pas de monnaie d'or.** Le marché de Rakorn repose sur l'or, et toute la mécanique (frais de 5 %, prix moyen, fourchette) s'exprime dans cette monnaie unique. Kalendrath a quatre ressources stockées et pillables, plus la Kaelite. Le choix de la monnaie d'un marché est donc une décision de conception à part entière (§3, D2 bis).

Ce qui est déjà décidé et qui sert l'artisanat : la **Forge** est un bâtiment du palier 2 (Village, vers J2,5 dans le simulateur) ; l'**Atelier des Automates Arcaniques** accélère l'artisanat de la Forge (décidé le 2026-10-11) ; la voie « Chercheur de Reliques » de l'Explorateur porte « butin, composants de craft » ; il y a 8 emplacements d'équipement et 5 raretés ; le héros est plafonné à environ 30 % d'impact au niveau 30.

---

## 1. Lecture critique : ce qui ne se transpose pas d'un jeu d'artisan à énergie vers un jeu d'empire en temps long

Rakorn plaît parce que **tout y est à l'échelle de la session** : lots de 25 s à 2 h, énergie qui se remplit en 6 h 40, sac plein dès le deuxième combat, neuf serments par jour. Le personnage *est* l'artisan, et fabriquer *est* le jeu. Kalendrath est l'inverse : le joueur dirige un royaume, ses chantiers durent des heures puis des jours, et le héros n'est qu'un fil conducteur. Voici ce que l'enthousiasme pour Rakorn risque de masquer.

| Ce qui fait vivre Rakorn | Pourquoi ça ne tient pas tel quel dans Kalendrath |
|---|---|
| **Demande d'équipement massive** : le compte de Gregory a forgé 34 pièces cette semaine et fait 60 achats | Kalendrath équipe **un héros (8 emplacements) et au plus 4 conseillers** à inventaire allégé. Avec, disons, 6 générations de pièces sur une carrière de héros (niveaux 1 à 30), cela fait de l'ordre de **100 à 150 pièces par joueur en deux ans, soit 1 à 2 par semaine**. C'est trop peu pour faire vivre un métier ou un marché d'objets finis. Le point de vigilance de Codex se confirme : il faut une **demande renouvelée ailleurs** (consommables, amélioration qui consomme la pièce précédente, puits PNJ et d'alliance). |
| **Récolte manuelle** en lots courts | Les Scieries, Mines de fer, Puits de mana et Champs de blé produisent déjà **passivement**. Une récolte de composants par le joueur ferait doublon et réintroduirait des minuteurs à la minute, contraires au rythme hérité. |
| **Énergie 400 à +1/min** comme frein central | Kalendrath règle son rythme par la file de construction et la durée des missions. Une cinquième jauge de type mobile entrerait en conflit avec ce rythme (déjà écarté par les audits). |
| **Marché liquide** : 348 articles, plusieurs vendeurs, alors que le classement ne montre que 78 artisans | Cette liquidité est **fabriquée** : serment « acheter 10 unités » (achat obligatoire), Comptoir PNJ vendeur et interdépendance forcée (3ᵉ métier verrouillé par la Charte d'un autre métier). Sans ces béquilles, un serveur de chapitre jeune, éclaté entre plusieurs paliers de progression, n'a pas d'acheteurs pour un objet donné à un moment donné. |
| **Commerce sans enjeu militaire** | Kalendrath a des **guerres d'alliances dès le chapitre 1**, avec pillage de ressources (décision du 30/10). Tout canal d'échange entre joueurs est un **canal de transfert** (boosting, pushing, alimentation d'une alliance en guerre), que l'étude PvP s'efforce justement de fermer (transport entrant suspendu pendant une guerre, R9 ; échange de marché compté comme action hostile, R4). |
| **Or à encaisser au comptoir** (hameçon de retour) | Dans un jeu à pillage, une recette en attente au comptoir devient un **coffre-fort à l'abri du pillage**. Il faudrait la plafonner, la rendre pillable ou la verser directement. |
| **Spécialisation 2 métiers + Charte** | L'interdépendance suppose un marché dense. Sur un serveur jeune ou vieillissant, elle **bloque** le joueur au lieu de le relier aux autres (pilier d'accessibilité). |
| **918 hauts faits, 313 recettes, 111 filons** | Chaque texte doit exister en français et en anglais avant l'alpha, chaque objet demande une illustration. Pour une personne seule, c'est hors de portée. |
| **Sceau Céleste qui termine une fabrication** | Avec un marché entre joueurs, l'accélération payante **augmente l'offre vendable**. L'argent réel se convertit alors en richesse de jeu cédée à d'autres, ce qui touche à la frontière du pay-to-win et au commerce en argent réel. |

**Ce qui se transpose bien** : l'**articulation** des systèmes (PvE → composant → recette → pièce → usage), l'information de décision affichée au moment de fabriquer (ce qu'il manque, ce que ça rapporte), la **durabilité douce** sans perte, le **Rapport de l'intendant** (très adapté à un joueur absent des heures), les **contrats PNJ** comme puits de ressources, la présentation en « sanctuaire » de l'objet, et les garde-fous du marché (fourchette bornée, plafond d'offres, frais à l'acheteur, filtre « Mon niveau »).

---

## 2. Trois scénarios d'intégration

### Scénario A : « Forge vivante » (artisanat PvE, sans marché entre joueurs)

**Ce que ça ajoute**
- **Composants** fongibles, stockés au niveau du royaume, sans emplacements de sac. Ils tombent des **expéditions** (le `GainItems` déjà présent) puis, plus tard, des **camps PvE** (4.1) et des missions de héros (4.3). Deux familles : des composants **communs** et des composants **rares**.
- **Recettes** débloquées par le **niveau de Forge** et, pour certaines, par un **plan** tombé en PvE (l'équivalent de « Aux Archives » chez Rakorn).
- **File de la Forge** en **heures** (2 à 12 h par pièce selon la rareté), une par cité ayant une Forge, accélérée par l'Atelier des Automates (règle déjà décidée) et accélérable en Kaelite comme les bâtiments.
- **Effets d'équipement** branchés sur le même schéma que les talents (`effect_type`, `effect_value`, `effect_scope`), avec des statistiques de héros pour plus tard. Les effets de départ portent sur des axes qui ont **déjà un point d'accroche** dans OGameX : butin et issues d'expédition, durée de mission, puis production et durée des chantiers. Plafond commun héros + talents + équipement (l'ordre de grandeur de 30 % du GDD 5.5 est à confirmer).
- **Demande renouvelée** : **amélioration** (la pièce de rang N entre dans la recette de rang N+1), **recyclage** (une pièce remplacée rend une partie de ses composants), **consommables** de mission (onguents ou potions : moins d'indisponibilité, meilleure chance de réussite ; noms [TBD]).
- **Débouchés PNJ** : un **Comptoir de la Couronne** (service neuf) qui rachète les surplus de composants contre des ressources et vend les composants communs avec une marge, et des **Contrats de la Couronne** (lettres quotidiennes ou hebdomadaires qui consomment des composants contre ressources, Kaelite *gagnée* et Prestige). Plus tard, le dépôt de composants dans les **boss à seuils d'alliance** (GDD 5.9).
- Une **maîtrise de la Forge** au niveau du royaume (XP d'artisan), qui ouvre des recettes et une petite chance de qualité supérieure. Optionnelle, à ajouter après la boucle minimale.

**Ce que ça coûte**

| Poste | Estimation |
|---|---|
| Domaine PHP | **Fichiers neufs surtout** : tables `components`, `user_components`, `recipes` (et ingrédients), `forge_queue`, colonnes d'effet sur `equipment_items` ; services `ForgeService`, `ForgeQueueService` (sur le modèle de `UnitQueueService`), `ComponentDropService`, `HeroEffectService` (calcul commun talents + équipement), `CrownCounterService`. **Modifications de fichiers upstream minimes** : un appel dans `ExpeditionMission::processExpeditionGainItemOutcome()`, l'injection d'un bonus « héros » dans les points d'accroche existants (butin d'expédition, `ProductionIndex`). Tests Pest pour chaque service. |
| API | 8 à 10 points d'entrée : catalogue des recettes, inventaire des composants, lancer, annuler ou accélérer une fabrication, équiper, recycler, Comptoir (acheter, vendre), contrats (lister, livrer). |
| Écrans React | Forge (liste, aperçu, bouton principal), Inventaire et fiche du héros (le pilote du lot 1, déjà prévu), Comptoir, Contrats. Le tout en PC + mobile 390 × 844. Composant « sanctuaire » de l'objet en CSS/SVG. |
| Contenu FR + EN | Boucle minimale : 2 composants, 3 recettes. Premier palier complet : environ 10 à 15 composants, 30 à 40 recettes (8 emplacements × 3 ou 4 rangs), 3 ou 4 consommables, 10 contrats. |
| Illustrations | **Le vrai coût.** Une icône par composant et par pièce, soit 50 à 60 images pour le premier palier, dans la méthode Midjourney validée. Déjà dans l'ordre fixé le 2026-11-02 (« équipement de la Forge »). |

**Risques** : la demande se stabilise si l'amélioration et les consommables sont trop faibles ; une boucle auto-renforçante (l'équipement améliore les expéditions, qui donnent plus de composants) qu'il faut plafonner ; les composants mangent une part de production qui freine les bâtiments (à mesurer) ; le conflit avec l'upstream sur `GainItems`.

**Principe « le domaine ne se touche qu'avec raison »** : respecté. Presque tout est **ajouté dans des fichiers neufs**. Les seules retouches upstream sont des points d'injection d'une ligne, ce qui reste dans l'exception assumée « mécaniques différenciantes (Phase 4) ».

**Phase 4** : c'est **exactement la 4.5** (« recettes hybrides, composants rares de PvE, équipement de héros »), avec un ordre aménagé : la boucle minimale peut tourner **sur les expéditions, avant les camps de la 4.1**, puis s'enrichir quand 4.1 et 4.3 existent.

### Scénario B : A + marché encadré entre joueurs (biens fongibles seulement)

**Ce que ça ajoute à A**
- Un **marché par serveur** limité aux **composants et consommables** (biens fongibles). Les **pièces d'équipement, plans et recettes ne s'échangent pas** : les pièces sont liées au royaume qui les fabrique ou les trouve.
- Une présentation **par article regroupé** (« à partir de », prix moyen, stock, ventes sur 7 jours), un filtre « Mon niveau », un **prix assisté** (vente rapide, équilibré, meilleur rendement).
- Des garde-fous **dès le premier jour** : **frais de 5 à 10 % payés par l'acheteur et détruits** (un puits) ; **fourchette de prix bornée** autour d'une référence (prix du Comptoir et médiane sur 7 jours) ; **plafond d'offres** (20 à 30 plutôt que 100) ; **plafond hebdomadaire de valeur achetée** par compte ; aucune annonce ciblée vers un joueur nommé (pas de « vente privée », le vecteur du pushing).
- Le **Comptoir PNJ comme teneur de marché** : il achète au plancher et vend au plafond de la fourchette, si bien qu'un article a toujours preneur et vendeur, même sur un serveur désert.
- Une **cohérence avec le PvP du 30/10** : pendant une guerre, aucun achat ni aucune vente au marché pour les membres d'une alliance en guerre, ou au minimum aucun achat **à** un vendeur extérieur (R9). L'échange de marché compte comme action hostile au sens de R4 ; les comptes liés par le lobby ne se voient pas mutuellement.
- Un **outillage de modération** (resté en Blade) : graphe des flux nets entre comptes, sur le modèle de la requête hebdomadaire recommandée par la fiche triche.

**Ce que ça coûte en plus de A**

| Poste | Estimation |
|---|---|
| Domaine PHP | Tables `market_offers`, `market_trades`, `market_price_history` ; `MarketService` (transaction atomique avec verrou de ligne, séquestre) ; job planifié pour la référence de prix (dépend de Redis et Horizon, lot 0) ; règles de guerre (dépendent du service de diplomatie et de guerre, encore à construire). Tout dans des fichiers neufs. |
| API | 6 à 8 points d'entrée supplémentaires ; limites de débit par compte (l'API publique rend un bot de marché trivial). |
| Écrans React | Marché (acheter, vendre, mes ventes) en PC et en cartes mobiles, alerte de prix. C'est l'écran le plus dense du lot. |
| Contenu | Peu de contenu neuf ; textes d'aide et règles publiques (CGU) en FR + EN. |
| Juridique et communauté | Le commerce en argent réel est déjà bannissable (plan marketing, filtre AutoMod « Commerce réel » prévu sur Discord), mais un marché crée **l'incitation**. Charge de modération en hausse, pour une personne seule. |

**Risques** : la **liquidité** d'un serveur jeune ou vieillissant (le Comptoir la masque mais ne la crée pas) ; le **boosting et le pushing** par faux échanges (bornés par la fourchette et le plafond hebdomadaire) ; les **bots** de marché via l'API ; l'**inflation** (la production d'OGameX est exponentielle : un prix fixe en ressources devient dérisoire pour un joueur avancé, il faut donc des prix indexés sur le rang de l'objet) ; le **séquestre anti-pillage** ; le **nettoyage à la fusion** des serveurs.

**Principe du domaine** : respecté (fichiers neufs). Mais le marché **dépend** de chantiers lourds encore absents : Redis et Horizon, service de guerre, lobby et comptes liés.

**Phase 4** : le marché n'est pas listé dans la Phase 4 de la roadmap. C'est une **extension** (« 4.5 bis »), à placer après la Phase 5 (test avec les amis) et avant l'ouverture publique, si les mesures le justifient.

### Scénario C : métiers complets de cité, commandes et contrats

**Ce que ça ajoute à B** : 4 à 6 métiers (forgeron, armurier, joaillier, alchimiste, etc. ; noms [TBD]), **deux au choix par royaume**, le troisième derrière une Charte fabriquée par un autre métier ; des **ateliers bâtiments** par métier ; maîtrise et qualité à trois paliers ; Renom, Héritage et pièces Signature ; **commandes d'artisanat** entre joueurs (avec réservation par niveau) ; ensembles d'objets ; durabilité.

**Ce que ça coûte** : **très élevé**. De nouveaux bâtiments touchent `BuildingObjects` (un fichier upstream), le theorycrafting des emplacements de cité et la DA (trois paliers d'image par bâtiment, selon la règle du 2026-10-13, soit 12 à 18 images rien que pour les ateliers). Il faudrait des centaines de recettes bilingues, cinq ou six écrans de plus et un équilibrage croisé métiers × marché × production.

**Risques** : la dispersion d'un développeur seul, contraire à « V1 minimum jouable d'abord » ; un **doublon avec les bâtiments de production** ; l'interdépendance qui bloque sur un serveur peu peuplé ; la **densité cognitive** (Codex) ; une **dilution du héros**, qui cesse d'être le fil conducteur au profit d'une carrière d'artisan concurrente.

**Principe du domaine** : entamé (nouveaux bâtiments dans les objets upstream). **Phase 4** : hors périmètre V1. C'est un jeu dans le jeu.

### Tableau de synthèse

| | A | B | C |
|---|---|---|---|
| Effort (développeur seul) | moyen | moyen à élevé | très élevé |
| Fichiers upstream modifiés | 2 ou 3 points d'injection | idem A | `BuildingObjects`, emplacements, etc. |
| Dépendances préalables | Lot 0 (API, React), pilote héros | A + Redis/Horizon + guerre + lobby | B + nouveaux bâtiments + DA |
| Coût DA | 50 à 60 icônes | idem | + 12 à 18 images d'ateliers, + centaines d'icônes |
| Risque anti-triche | nul (aucun transfert) | réel, borné | élevé (commandes = transferts ciblés) |
| Compatible serveurs par chapitre | oui | sous conditions (Comptoir, nettoyage à la fusion) | fragile |
| Ce qu'on garde de Rakorn | articulation, sanctuaire, contrats, intendant | + marché lisible | presque tout |

---

## 3. Recommandation

**Je conseille le scénario A, conçu « prêt pour B ».** Le marché entre joueurs (B) se décide **après** l'alpha entre amis (Phase 5) et sur mesures, pas maintenant. Je déconseille C pour la V1.

**Pourquoi A**
1. C'est **déjà la Phase 4.5** et le **GDD 5.7** : on remplit un **[TBD]** existant (« source précise des composants rares »), on n'ouvre pas un nouveau chantier.
2. Il **ne crée aucun canal de transfert entre joueurs**. Il ne heurte donc ni les décisions PvP du 30/10 (R4, R9), ni la recommandation de fermer les transferts (fiche triche, question 12 du comparatif), ni la charge de modération d'une personne seule.
3. Il **marche avec un seul joueur** : il ne dépend ni de la population ni de la date du chapitre. Il marche aussi bien sur le serveur jeune que sur le vieux.
4. Il **respecte le domaine** : fichiers neufs plus deux ou trois points d'injection.
5. Il **réutilise ce qui existe** : expéditions et `GainItems`, schéma d'effet des talents, file d'unités comme modèle, Automates qui accélèrent la Forge, fiche héros du pilote React.
6. Il **teste la vraie inconnue** avant d'investir dans un marché : *est-ce que fabriquer l'équipement du héros est amusant et utile au rythme de Kalendrath ?* Si la réponse est non, un marché n'y changera rien.

**« Prêt pour B »** signifie trois choix peu coûteux dès A : (a) des composants **fongibles** identifiés par un **machine name stable** et non un identifiant auto-incrémenté, indispensable aussi pour la migration de personnages à la fusion ; (b) un indicateur **lié / échangeable** sur chaque type d'objet ; (c) des **prix de référence** tenus par le Comptoir, qui serviront de fourchette au futur marché.

**Ce que je garderais de Rakorn dans A** : le panneau de recette (ingrédients possédés / requis, durée, effet, et, s'il existe un jour, prix du Comptoir), le sanctuaire de l'objet, la durabilité douce (plus tard, et seulement si elle sert de puits), les Contrats de la Couronne, et le **Rapport de l'intendant** (« pendant votre absence : 2 expéditions revenues, 3 composants, 1 pièce forgée »), qui vaut pour tout le jeu, pas seulement pour la Forge.

### La plus petite boucle jouable à éprouver d'abord

**Chaîne** : **expédition (existante) → 2 composants → 3 recettes à la Forge niv. 1 → bottes du héros avec un effet d'expédition → amélioration ou recyclage, et rachat du surplus par le Comptoir.**

1. **Source PvE** : `ExpeditionMission`, issue `GainItems` dont le poids passe de 0 à environ 5-8 (à régler au simulateur). Le service neuf `ComponentDropService` donne **1 à 3 « composant commun »** (nom [TBD]) et, avec une faible probabilité, **1 « composant rare »** (nom [TBD]). La quantité dépend de la taille de l'expédition, comme les ressources d'expédition.
2. **Recette 1** (Forge niv. 1, palier Village, vers J2-3) : « bottes de rang 1 » (emplacement Bottes, rareté Vert, nom [TBD]) = 3 composants communs + des ressources (ordre de grandeur : un niveau de Forge en fer et en mana, à fixer au simulateur) ; **4 h** de Forge.
3. **Recette 2** (Forge niv. 3) : « bottes de rang 2 » (Bleu) = **les bottes de rang 1** + 4 communs + 1 rare ; 8 h. La pièce précédente est **consommée** : c'est la demande renouvelée par l'amélioration.
4. **Recette 3** : un **consommable** d'expédition (par exemple : la prochaine expédition ne peut pas finir en « rien trouvé » ; à définir, nom [TBD]) = 2 communs ; 2 h. C'est la demande récurrente.
5. **Effet** : bottes de rang 1 = **+3 % de ressources trouvées en expédition** ; rang 2 = +6 %, plus une petite statistique de héros (sans effet tant que 4.3 n'existe pas, mais visible sur la fiche). L'effet s'applique à tout l'empire, via le héros équipé, comme sa voie « royaume ». Il entre dans le plafond commun.
6. **Débouchés** : porter (l'effet), **recycler** (rang 1 remplacé : rend 50 % de ses composants), **vendre au Comptoir** les composants en surplus contre des ressources (prix fixe par rang). Les Contrats viennent dans un deuxième temps.

**Ce qu'on doit observer** (en alpha ×3 puis avec les amis) : délai entre Forge 1 et première pièce (cible : moins de 5 jours) ; nombre d'expéditions nécessaires ; part des joueurs qui équipent, améliorent ou recyclent ; stock de composants qui dort ; ressenti (« je relance des expéditions *pour* les bottes »).

**Garde-fou** : la boucle est **auto-renforçante** (des bottes qui améliorent les expéditions qui donnent des bottes). C'est voulu pour l'accroche, mais l'effet doit rester petit et plafonné, et ne jamais toucher la **probabilité** de `GainItems` elle-même.

---

## 4. Réponses proposées aux 5 décisions ouvertes (croisement, §5)

### D1. Le métier appartient-il au royaume, à une cité ou au héros ?

**Proposé : au royaume.** On l'exerce dans les **Forges des cités** (le lieu et la file) ; le **héros et les conseillers** n'agissent que comme **leviers** (talents d'artisanat existants : « Chercheur de Reliques » pour les composants, Intendant pour les coûts).

- **Pour le royaume** : il colle au jeu de gestion (« la cité produit, le joueur choisit ») et ne dilue pas le héros. Il ne dépend pas du choix encore ouvert « ville unique ou colonies » (point 15 du GDD 4.2). Une seule maîtrise par royaume, c'est simple à lire.
- **Pour la cité** (spécialiser une colonie en ville-atelier) : séduisant avec des colonies, mais ça **multiplie les maîtrises** à suivre. Le choix dépend de la décision ville unique ou colonies, encore ouverte, et il pousse vers les ateliers-bâtiments du scénario C. À garder comme **piste ultérieure**, sous forme de bonus de Forge propre à une cité.
- **Contre le héros** : le héros-artisan de Rakorn a été écarté par les deux audits. Un héros qui fabrique serait indisponible pour ses missions et entrerait en conflit avec son rôle de fil conducteur. Le changement de héros en boutique ferait aussi perdre une carrière d'artisan.
- **Spécialisation** (2 métiers sur N) : **pas en V1**. Sans marché, choisir un métier n'a de sens que comme frustration. Sans compter que l'interdépendance suppose B.

### D2. Marché entre joueurs dans la V1 ? Quelles catégories ?

**Proposé : pas dans la V1 jouable (alpha entre amis) ; décision à la sortie de la Phase 5, sur mesures. S'il vient, uniquement les composants et consommables, jamais les pièces d'équipement, plans ou recettes.**

- **Pour l'avoir tôt** : c'est l'envie de Gregory, ça donne une identité sociale hors combat, de la rétention par les rendez-vous de vente, et Rakorn montre qu'un marché peut vivre avec une centaine de joueurs.
- **Contre** : la liquidité de Rakorn est fabriquée (achats obligatoires, Comptoir, interdépendance forcée). Un marché est un canal de transfert dans un jeu à guerres d'alliances dès le chapitre 1 (boosting, que la décision « tous attaquables » veut empêcher). Il exige Redis et Horizon, le service de guerre et les comptes liés du lobby, encore absents. Il ajoute de la modération et du risque de commerce en argent réel. Et il ne répond pas à la vraie inconnue (la fabrication est-elle amusante ?).
- **Catégories** : *composants* (fongibles, référence de prix facile, utilité prouvée par la Forge) **oui** ; *consommables* **oui** ; *équipement fini* **non** (il contournerait la progression, rendrait le payeur fournisseur des autres et transférerait une valeur concentrée en un clic) ; *plans* **non** (ils sont la progression même).

**D2 bis : la monnaie du marché (décision qui manque au croisement).** Options : (a) **ressources**, avec un prix en lot au ratio 3:2:1 déjà présent dans `MerchantService` : pas de nouvelle monnaie, mais le prix est pillable et sujet à l'inflation exponentielle d'OGameX ; (b) une **monnaie de commerce neuve** gagnée seulement par le Comptoir et les contrats : propre, mais c'est une cinquième ressource, que le GDD a évité de créer ; (c) **troc** composant contre composant : très peu liquide. *Avis* : (a), avec des **prix indexés sur le rang de l'objet** et une **recette versée directement** (pas de séquestre « à encaisser » qui servirait de coffre-fort anti-pillage).

### D3. L'artisanat remplace-t-il ou complète-t-il les bâtiments de production ?

**Proposé : il complète, strictement.** Les quatre ressources restent produites passivement par les bâtiments (formules héritées). L'artisanat les **consomme** (c'est un puits utile en milieu et fin de partie, quand les stocks d'OGameX débordent) et ajoute des **composants que seule l'activité PvE produit**. Aucune récolte manuelle, aucun bâtiment de récolte de composants en V1.

- **Pour** : aucun doublon de système, aucun changement de formule héritée, un lien PvE → économie qui donne du sens aux expéditions et aux camps.
- **Contre** : le joueur qui ne fait pas de PvE n'a pas de composants (c'est voulu : PvE-first). Un risque à mesurer : la Forge ne doit pas ralentir la course aux bâtiments (critère de test : moins de 5 à 10 % de la production engloutie dans la Forge pour un joueur gratuit actif).

### D4. Quelle place pour l'accélération payante (GDD 4.2, Phase 8) ?

**Proposé : la file de la Forge est accélérable en Kaelite exactement comme les chantiers, et compte dans le même plafond d'écart payeur. Ni composant, ni plan, ni pièce vendus contre Kaelite. Kaelite jamais échangeable sur le marché (pas de « PLEX »).**

- **Pour** : c'est cohérent avec la ligne déjà actée (« accélérations acceptables »), avec Rakorn (le Sceau termine une action) et avec les packs limités retenus le 2026-10-22. La Kaelite *gagnée* (liée au serveur) peut récompenser les contrats, comme la prime de serment de Rakorn.
- **Contre ou vigilance** : **avec un marché (B), l'accélération multiplie l'offre vendable**, donc l'argent réel devient richesse de jeu cédée à d'autres. Parade : si B voit le jour, les **composants sortis d'une fabrication accélérée** pourraient être **liés** (non vendables), ou bien le marché se limite aux composants **de source PvE** (qui ne s'accélèrent pas). Sans marché (A), la question disparaît : l'accélération n'aide que le payeur lui-même, dans le plafond.
- Ne pas vendre de « butin d'expédition garanti » ni de taux de drop : ce serait un pay-to-win déguisé sur le seul robinet de composants.

### D5. Marché par serveur de chapitre : que devient-il en fin de chapitre ?

Une précision d'abord : avec la piste retenue le 26/10, **un serveur ne « finit » pas** à la fin de son chapitre. Il continue, un serveur neuf s'ouvre à côté, et la fusion vient plus tard, par migration de personnages. La question réelle est donc double : (1) **la liquidité** d'un serveur jeune, puis vieillissant ; (2) **le nettoyage à la fusion**.

**Proposé :**
1. **Un marché par serveur, jamais entre serveurs** (pas de commerce interserveur implicite, cohérent avec « pas de transfert entre serveurs en V1 »).
2. **Le Comptoir PNJ comme garantie de liquidité**, dont le **rôle grandit quand la population baisse** : il achète au plancher et vend au plafond de la fourchette. Sur un serveur vieux et dépeuplé, le marché devient de fait un échange avec le PNJ, sans blocage du joueur. Sur le serveur jeune, la population est homogène en niveau, ce qui est favorable aux composants de bas rang.
3. **À la fusion** : **gel du marché 7 jours avant** (préavis aligné sur l'annonce de fusion), **annulation de toutes les offres** avec retour des biens aux vendeurs, **historique des prix remis à zéro** sur le serveur d'arrivée (références recalculées depuis le Comptoir). Les composants et pièces **suivent le personnage** dans l'export / import, d'où les machine names stables.
4. **Pas de « fin de vie » commerciale** : il n'y a rien à liquider puisque le serveur persiste. Le jalon de fin visible (leçon 13 du comparatif) passe par le chapitre, pas par le marché.

- **Pour** : pas de contenu à recréer, pas de joueur bloqué, pas de dette de migration.
- **Contre** : sur un serveur dépeuplé, le « marché » n'est plus qu'un Comptoir. C'est acceptable pour un jeu PvE-first : mieux vaut un marché pauvre qu'une progression bloquée.

---

## 5. Plan de test dans le simulateur de theorycrafting (sans le modifier ici)

**Préalables** : corriger d'abord le défaut connu (mines aux chantiers de 68 à 123 jours qui monopolisent la file, README) et passer le modèle à **10 paliers de cité**, sinon toute conclusion sur le rythme de la Forge hérite de ces artefacts. Ensuite, ajouter un **module économie de Forge** séparé, qui lit le rythme de déblocage de `model.js` sans le modifier.

### Grandeurs à modéliser

| # | Grandeur | Formule de principe | Pourquoi |
|---|---|---|---|
| 1 | **Accès à la Forge et aux niveaux de Forge** | Déjà dans le simulateur (Forge au palier 2) ; ajouter les niveaux de Forge comme objectifs | Date de la première recette, de la deuxième, etc. |
| 2 | **Flux de composants** (sources) | expéditions/jour × P(`GainItems`) × quantité moyenne × bonus (talent Explorateur, équipement) ; expéditions/jour = f(emplacements d'expédition = ⌊√Découverte Tellurique⌋, durée d'expédition, sessions/jour) ; plus tard + camps et missions de héros | Savoir si la Forge a de quoi travailler |
| 3 | **Demande d'équipement** | 8 emplacements × rangs exigés par paliers de niveau du héros (courbe d'XP de `HeroLevelingService`) + conseillers × emplacements allégés ; amélioration qui consomme la pièce précédente | Mesurer la demande renouvelée réelle (1 à 2 pièces par semaine ?) |
| 4 | **Puits de composants** | fabrications + consommables par mission + contrats PNJ + rachat du Comptoir + (B) frais de marché + (plus tard) boss d'alliance − recyclage (rendement r) | Stock qui dort ou pénurie ? |
| 5 | **Part de production engloutie par la Forge** | coût en ressources des recettes / production totale, par profil | La Forge ne doit pas retarder les paliers de cité |
| 6 | **Effet cumulé héros + équipement** | somme des effets par axe, plafonnée | Rester sous le plafond commun ; repérer la boucle auto-renforçante (équipement d'expédition) |
| 7 | **Écart payeur** | profil payeur = accélérations de Forge en plus | Rester dans la tendance de 20 à 30 % (non communiquée) |
| 8 | **(B) Liquidité** | population active par tranche de niveau × taux de demande → délai de vente attendu ; population d'un serveur de chapitre sur 4 à 12 mois (arrivées, puis attrition du type Tribal Wars) | Savoir quand le Comptoir porte seul le marché |
| 9 | **(B) Effet des frais et de la fourchette** | prix d'équilibre sous frais f et bande ±b ; coût d'un aller-retour ressources → composants → ressources (anti-coffre-fort et anti-pushing) | Calibrer f, b et le plafond hebdomadaire |

### Paramètres d'entrée à faire varier

- Poids de `GainItems` : 0, 3, 5, 8, 12 (les autres poids d'expédition restent hérités et se renormalisent).
- Quantité par drop (1-3, 2-5) et part de composants rares (2 %, 5 %, 10 %).
- Sessions par jour : 1 (occasionnel), 3 (régulier), 6 (très actif). Cela touche directement le nombre d'expéditions relancées.
- Coût en ressources des recettes (facteur par rang : 1,5 / 2 / 3) et durées de Forge (2 h, 4 h, 8 h, 12 h), avec réduction des Automates (3 % par niveau, plafond 30 %, comme les bâtiments).
- Rendement du recyclage : 30 %, 50 %, 70 %.
- Prix de rachat du Comptoir (en part de la valeur de référence) : 30 %, 50 %.
- Frais de marché (B) : 0, 2, 5, 10 % ; fourchette ±20 %, ±50 % ; plafond d'offres 10, 30, 100 ; plafond hebdomadaire d'achat.
- Population de serveur (B) : 100, 300, 1 000 actifs à l'ouverture ; attrition à 3 et 12 mois.
- Profils existants (sans bonus, gratuit, pass, payeur) ; vitesse ×1 et ×3 (serveur alpha) ; capitale seule ou empire en croissance.

### Critères de verdict proposés

- Première pièce **avant J5** pour le gratuit actif ; un **nouvel objectif d'artisanat au moins tous les 7 à 10 jours** (leçon « jamais plus de 30 à 40 jours sans jalon », resserrée pour une boucle moyenne).
- Stock de composants non utilisés **borné** : le surplus ne croît pas indéfiniment, et les puits absorbent au moins 70 à 80 % des sources après le premier mois.
- Forge **à moins de 5 à 10 %** de la production, et décalage de la date de Métropole **de moins de 2 %**.
- Effets cumulés **sous le plafond** à toute date.
- (B) Délai de vente d'un composant commun **sous 48 h** avec la population visée ; sinon, le Comptoir doit suffire et le marché n'apporte rien.

---

## 6. Questions à poser à Gregory (par priorité)

1. **Dans Rakorn, qu'est-ce qui vous plaît le plus : fabriquer (choisir une recette, voir l'objet apparaître), vendre aux autres joueurs, ou être reconnu comme artisan (titres, renom) ?** La réponse oriente vers A, B ou C.
2. **Êtes-vous d'accord pour tester d'abord une toute petite boucle sans marché** (expédition → deux composants → bottes du héros → amélioration), et ne décider du marché entre joueurs qu'après le test avec vos amis ?
3. **L'artisanat appartient-il au royaume** (la Forge de vos cités), le héros ne faisant que le porter et l'améliorer par ses talents ? Ou tenez-vous à ce que le héros soit lui-même artisan ?
4. **Si un marché entre joueurs arrive, accepteriez-vous qu'on n'y vende que des matières et des potions, jamais d'équipement ?**
5. **Pendant une guerre d'alliance, le marché doit-il être fermé aux membres des alliances en guerre**, comme le transport entrant (R9) ?
6. **Avec quoi paie-t-on au marché : nos ressources (bois, fer, mana), ou faut-il une monnaie de commerce à part ?**
7. **La Forge peut-elle s'accélérer avec de la Kaelite, comme les bâtiments ?** (Proposé : oui, dans le même plafond, sans vendre de matières ni de plans.)
8. **Les composants viennent-ils uniquement du PvE** (expéditions, camps, missions), sans récolte dans la cité ? (Proposé : oui.)
9. **En combien de temps le joueur doit-il obtenir sa première pièce fabriquée : le premier jour, ou dans la première semaine ?**
10. **Faut-il une usure de l'équipement** (une pièce usée ne compte plus, sans jamais disparaître), sachant qu'elle ajoute une corvée de réparation ?

---

## 7. Limites de ce rapport

- Aucun chiffre de Rakorn n'est repris comme équilibrage. Les ordres de grandeur cités (pièces par semaine, poids de `GainItems`, durées de Forge, pourcentages d'effet) sont des **hypothèses de travail à passer au simulateur**, pas des propositions de valeurs.
- Les noms de composants, de pièces et de consommables sont volontairement laissés en **[TBD]** (règle du lexique : ne rien inventer sans validation, et chaque nom devra exister en français et en anglais).
- La demande d'équipement « 100 à 150 pièces par joueur » est une estimation d'ordre de grandeur (8 emplacements, quelques rangs, 4 conseillers allégés) ; le nombre de rangs et l'inventaire des conseillers sont encore **[TBD]** au GDD.
- Le point d'accroche `GainItems` et la structure de `MerchantService` sont vérifiés dans le code ; les points d'injection d'un bonus de héros dans le butin d'expédition et le `ProductionIndex` sont repérés par le GDD (5.5) et non relus ligne à ligne ici.
