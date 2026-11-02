# Retours des agents — Héros et Kaelite à deux soldes (30/10/2026)

Archive du compte rendu de l'agent Sonnet chargé de la tâche B (Kaelite), et du bilan de la tâche A (héros) menée par Claude dans la même session. Ces sujets attendent la relecture de Gregory. Les points à trancher sont repris dans [../taches-a-valider.md](../taches-a-valider.md).

Le compte rendu de l'agent est relayé ci-dessous presque tel quel. Claude a vérifié depuis : la suite complète de la branche (1170 tests verts), pint et phpstan, la liste des commits, l'absence de fichier upstream modifié.

## Cadre commun

- **Worktrees** : `.claude/worktrees/heros-suite` (branche `feat/heros-suite`) et `.claude/worktrees/kaelite-deux-soldes` (branche `feat/kaelite-deux-soldes`), créés depuis `main` au commit `ff944303`. Rien n'est fusionné ni poussé.
- **Bases de test dédiées** : `laravel_heros`, `laravel_kaelite` et `laravel_base`, des clones de `laravel`, pour que les migrations des deux branches ne se mélangent pas dans la base de dev. Les tests tournent dans le conteneur `ogamex-app` avec `-e DB_DATABASE=…` et `-w` vers le worktree.
- **Incidents d'environnement** :
  - le conteneur `ogamex-app` était arrêté depuis 4 semaines (erreur de montage de `php/local.ini`) ; un `docker compose up -d --no-deps --force-recreate ogamex-app` l'a relancé ;
  - les bibliothèques `storage/rust-libs` (ignorées par git) manquaient dans les worktrees : 87 tests échouaient (FFI Rust) tant qu'elles n'ont pas été recopiées.
- **Référence sur `main`** : 1151 tests passants, 20 595 assertions (le chiffre « 1109 » des documents est périmé).

## Tâche A — Système de héros (branche `feat/heros-suite`, commit `f3a6a17c`)

**Résultat des tests** : 1192 verts (1151 + 41 nouveaux), pint et phpstan propres. Une première passe complète avait donné 4 échecs dans `FleetDispatchAttackTest` (rapport de combat sans débris, 100 % de lune non atteint, « Failed to find an empty coordinate »), lancée en même temps que deux autres suites. Le fichier seul donne 30/30 et la suite relancée 1192/1192. Hypothèse non prouvée : fragilité des tests de flotte (coordonnées et combats aléatoires), pas un effet de la branche.

### État des lieux avant le travail
- **Existait** : tables `heroes`, `talent_nodes` (+ pivot de prérequis « n'importe lequel », effets, choix exclusifs, `branch`), `hero_talents`, `equipment_items`, `hero_equipment` ; `HeroLevelingService` (courbe d'XP) ; contrôleur et Blade de fiche héros ; héros de démo « John Doe » ; textes FR seulement.
- **Absent** : aucun test, aucun service d'allocation, pas de notion de héros principal ou de conseiller, pas de portée « empire », pas d'effets sur les objets, pas de contrainte d'emplacement, pas de textes EN.

### Livré
- **Migrations** (`2026_10_30_000001`, `…000002`) :
  - `heroes.role` et `heroes.main_marker`, avec un index unique `(user_id, main_marker)` qui interdit un second héros principal ;
  - `equipment_items` : `effect_type`, `effect_value`, `effect_scope`, `required_level` ;
  - `hero_equipment.slot` avec index unique `(hero_id, slot)` : un objet par emplacement ;
  - conversion des archétypes « Guerrier » → `warrior` (héros et nœuds).
  Aller-retour testé (rollback puis migrate).
- **Énumérations** : `HeroArchetype` (6), `HeroRole`, `EquipmentSlot` (8) ; `TalentEffectScope::EMPIRE` ajouté.
- **Services** (`app/Services/Hero/`) : `HeroRosterService`, `HeroExperienceService`, `HeroTalentService`, `HeroEquipmentService`, `HeroEffectsService` ; exception `HeroRuleException` (clé de traduction) ; réglages dans `config/heroes.php`.
- **Textes** : `resources/lang/fr/t_heroes.php` complété, `resources/lang/en/t_heroes.php` créé (archétypes, rôles, portées, erreurs). Noms issus du skill `lexique-kalendrath`.
- **Modèles** : docblocks génériques sur les relations ; propriétés ajoutées. Seuls des modèles propres au fork sont touchés (`Hero`, `HeroEquipment`, `HeroTalent`, `EquipmentItem`).
- **Seeder de démo** : héros principal, archétype `warrior`, emplacements renseignés.
- **Tests** (`tests/Feature/Hero/`) : recrutement (7), XP (5), talents (10), équipement (8), effets (11), plus le socle `HeroTestCase`.

### Règles supposées
1. Un conseiller est une ligne de `heroes` avec `role = advisor`, pas une table séparée. Le GDD annonçait une « table de conseillers à créer ».
2. Aucune limite de palier à l'allocation, seulement les prérequis (le GDD dit « non appliqué »).
3. Le plafond par axe (table du GDD) s'applique au total talents + objets d'un héros ; un axe sans plafond configuré n'est pas plafonné.
4. La somme des conseillers sur un axe est plafonnée à 50 % du plafond du héros (le GDD dit un tiers à la moitié), et elle s'ajoute au héros : le total peut atteindre 150 % du plafond.
5. 4 sièges de conseil, niveau maximal 10 (GDD : 10 à 15), sièges tous ouverts (ils dépendront du prestige, non construit).
6. Les conseillers ont les 8 emplacements, faute de détail sur l'« inventaire allégé » ; réglable dans `config/heroes.php`.
7. Seule la portée « empire » d'un conseiller compte pour l'empire ; ses effets de portée héros, ville ou groupe n'y vont pas.
8. Un héros en mission ou indisponible garde ses bonus (GDD).
9. Un conseiller ne peut investir que dans une seule voie ; le héros principal peut mélanger.
10. La réinitialisation des talents est gratuite et sans délai.
11. Un objet exige un niveau minimal du héros.
12. Les types d'effets plafonnés sont ceux de la table du GDD (`loot_bonus_percent`, `production_bonus_percent`, etc.), nommés par moi ; les types du démo non listés ne sont pas plafonnés.

### Reste à faire
API et écran React ; changement de héros principal en boutique (ce qu'on conserve) ; stats dérivées ; arbres de talents réels des 6 archétypes ; retrait de `planet_id` (gouverneur par ville) ; indisponibilité après échec de mission ; attribution automatique de l'XP ; sièges débloqués par le prestige ; nom du plafond « troupes » : `troop_combat_bonus_percent`, à rapprocher du seeder qui emploie `garrison_defense_bonus_percent`.

## Tâche B — Deux soldes de Kaelite (branche `feat/kaelite-deux-soldes`)

Agent : Sonnet, sans interface. **Commits** : `842dfb48` (migrations, modèles, énum, exceptions, config), `c7355e32` (services), `e5df04d2` (tests et textes FR/EN).

### Compte rendu de l'agent (relayé)

Les deux soldes de Kaelite sont livrés, sans interface (ni Blade, ni contrôleur, ni route, ni React). 19 tests passent ; la suite complète n'a pas été lancée par l'agent (Claude l'a lancée : 1170 verts).

**Fichiers créés**
- Config et énum : `config/kaelite.php` (`server_key` via `KAELITE_SERVER_KEY`, défaut `local` ; `beta_bonus_percent` via `KAELITE_BETA_BONUS_PERCENT`, défaut 30) ; `app/Enums/KaeliteTransactionType.php` : `purchase`, `purchase_bonus`, `reward`, `spend`, `admin_adjustment`, `chargeback`, `server_reset`.
- Exceptions (`app/Exceptions/Kaelite/`) : `InsufficientKaeliteException`, `KaeliteWalletFrozenException`, `KaeliteNotTransferableException`, `KaeliteIdempotencyConflictException`, `KaeliteInvalidAmountException`.
- Migrations : `2026_10_30_000001_create_kaelite_purchased_tables.php` (portefeuille acheté et son grand livre) ; `2026_10_30_000002_create_kaelite_earned_tables.php` (portefeuille gagné et son grand livre).
- Modèles (`app/Models/`) : `KaeliteEntry` (abstraite, grand livre en ajout seul : toute mise à jour ou suppression lève `LogicException`), `KaelitePurchasedEntry`, `KaeliteEarnedEntry`, `KaelitePurchasedWallet`, `KaeliteEarnedWallet`.
- Services (`app/Services/Kaelite/`) : contrat `PurchasedKaeliteWallet` (relié par l'attribut `#[Bind]`), `LocalPurchasedKaeliteWallet`, `EarnedKaeliteService`, `KaeliteService` (solde, achat, récompense, dépense, transfert refusé, remise à zéro de bêta) ; objets de retour `KaeliteBalance`, `KaeliteSpendResult`, `KaeliteWalletOperation`.
- Textes : `resources/lang/{fr,en}/t_kaelite.php` (Kaelite reste « Kaelite » en anglais, d'après le skill lexique).
- Tests : `tests/Feature/Kaelite/KaeliteWalletsTest.php` (19).

**Résultats annoncés** : Pest 19 passés, 0 échoué, 60 assertions ; pint : 1 correction de style ; PHPStan niveau 8 sans erreur sur ses fichiers (3 messages « Ignored error pattern… not matched » dus à la config globale quand on n'analyse qu'une partie du code).

**Écarts à l'upstream** : aucun fichier existant modifié (ni `app/Services`, `app/GameMissions`, `app/GameObjects`, `app/Models`, ni `bootstrap/providers.php`), aucune relation ajoutée sur `User`, aucune migration ni fichier de lang existant touché. Le contrat est relié par `#[Bind]` sur l'interface ; pour le lobby, il faudra une implémentation distante et un `bind` explicite dans un provider. L'agent n'a pas pu lire `docs/comportements-bannissables.md` (non suivi par git, absent du worktree) : le gel est déduit du plan marketing.

**Règles supposées par l'agent**
1. **Gel** : bloque seulement les dépenses (gagnée comme achetée). Les crédits restent enregistrés. `admin_adjustment`, `chargeback` et `server_reset` passent malgré le gel. Le gel est porté par le portefeuille acheté (le compte).
2. **Dépense tout ou rien** : gagnée d'abord (`min(gagné, montant)`), puis acheté pour le reste ; solde insuffisant ou portefeuille gelé : rien n'est débité.
3. **Verrou** : `lockForUpdate` sur la ligne du portefeuille gagné (joueur, serveur), puis sur celle du portefeuille acheté.
4. **Dépense à cheval sur deux bases** : atomique en local ; avec un lobby distant, il faudra une compensation ou un « réserver puis confirmer » (non construit).
5. **Idempotence d'une dépense** : la clé est celle de la dépense côté gagné et `clé:purchased` côté acheté. Une dépense payée entièrement en acheté laisse une ligne à 0 dans le grand livre gagné (`purchased_spent` en méta) ; les montants à 0 ne sont acceptés que dans ce cas.
6. **Clé réutilisée avec d'autres paramètres** : `KaeliteIdempotencyConflictException`.
7. **Bonus bêta** : `floor(montant × pourcentage / 100)` à l'achat, ligne séparée `purchase_bonus` (clé `clé:bonus`), pourcentage paramétrable (0 le désactive), calculé sur le montant acheté (le plafond « bonus sur la Kaelite dépensée » du plan marketing n'est pas implémenté).
8. **Gagné par serveur** : table `(user_id, server_key)` unique ; `server_key` par défaut dans la config ; tous les services acceptent une clé explicite.
9. **Non transférable** : pas d'API de transfert ; `transferEarned()` lève toujours une exception.
10. **Remise à zéro de bêta** : écrit une ligne `server_reset` à `-solde` par portefeuille gagné du serveur ayant un solde positif ; ne supprime rien, ne touche pas à l'acheté, rejouable avec la même clé de lot.
11. **Compte** : `users.id` tient lieu de compte (clé étrangère remplaçable par l'identifiant de compte du lobby).
12. **Montants** : entiers strictement positifs (`bigint`).
13. **Portefeuille acheté** créé à la première utilisation, sans ligne tant que rien n'est crédité.
14. **Grand livre** : pas de suppression, corrections par nouvelles lignes.

**Décisions renvoyées à Gregory par l'agent** : bonus bêta de 30 % actif par défaut dans la config (le laisser ou mettre 0) ; gel et crédit de Kaelite gagnée ; plafond du report de Kaelite achetée après la bêta ; compensation pour un lobby distant ; relecture contre `comportements-bannissables.md` ; libellés FR/EN de `t_kaelite.php` écrits par l'agent (« Annulation de paiement », « Payment reversal »…).

### Vérifications de Claude après le retour
- Suite complète de la branche : 1170 verts (1151 + 19), pint `--test` PASS sur 69 fichiers, phpstan sans erreur sur les fichiers de la branche.
- `docs/comportements-bannissables.md` relu : le gel sur les dépenses est cohérent (gel du portefeuille dès notification de fraude de paiement ; Kaelite non dépensée conservée après la remise à zéro). **Non implémenté** : la durée maximale de 7 jours du gel conservatoire (pas d'expiration), la règle D4 (sort de la Kaelite achetée en cas de bannissement N5) et la perte de la Kaelite pour fraude de paiement.
