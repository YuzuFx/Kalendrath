# Audit Codex de Kalendrath et avis sur les logos

**Date de référence : 4 novembre 2026, Europe/Paris.** État du dépôt observé : `main`, `10a02729`. Audit conduit par Codex, sans sous-agent. Aucun fichier du domaine PHP modifié, aucune migration exécutée, aucun commit, aucun push.

**Conclusion :** la stratégie de conservation du moteur et de refonte React reste cohérente. Le principal chantier immédiat est l'intégration de cinq branches déjà produites, avec validation de leurs contrats et des hypothèses de conception. L'équivalence des outils Claude/Codex était partielle : les skills sont synchronisés, mais le hook après édition ne comprenait pas le protocole Codex. Il est adapté ; l'archivage automatique Codex est désactivé pour respecter l'absence d'autorisation de commit/push et éviter de copier des sessions voisines. Pour la marque, je retiens **K1**, avec corrections ; **K5** reste le meilleur favicon actuel à 16 px, mais son enveloppe « maison » mérite une alternative ; pour l'avatar, je préfère explorer **K1 avec marges circulaires** avant d'adopter K3.

## 1. Ce que j'ai lu et ce que je n'ai pas pu lire

### Sources et limites de lecture

| Ensemble | Consultation effectuée |
|---|---|
| `AGENTS.md`, `CLAUDE.md` | Lus intégralement. `CLAUDE.md` prévaut sur les règles upstream ; la demande présente interdit toute modification du domaine, tout commit et tout push. |
| Architecture, roadmap historique, GDD, lore, plan marketing, serveurs en continu, références du genre | Documents consultés, avec lectures ciblées complémentaires sur les contradictions, les héros, les ressources, les décisions PvP, la boutique et les serveurs. Les très longues sorties ont parfois été tronquées par l'outil : je ne prétends pas avoir mémorisé chaque ligne de chaque étude. |
| Quatre `direction-artistique-*.md` | Lecture de cadrage et parcours ciblé des règles communes, des leçons, des états validés, des paliers, des ressources, de l'Obélisque et des dernières défenses. **Limite : pas de relecture mot à mot de tous les prompts historiques répétés** ; ces quatre fichiers représentent environ 692 ko. Il ne s'agit pas d'une validation exhaustive de leurs prompts ou de toutes leurs images. |
| `taches-a-valider.md`, `sessions/2026-11-02-synthese.md` | Consultés. Le premier contient déjà le chantier de quantité des défenses ajouté le 4 novembre ; la synthèse du 2 novembre n'est donc pas à elle seule l'état actuel. |
| `docs/archives/retours-agents-*.md` | Les cinq archives antérieures consultées : 30/10 général, 30/10 héros/Kaelite, 30/10 comparatif, 31/10, 01/11 site/logos. L'archive site/logos a été différée jusqu'après mon premier classement visuel. |
| Transcriptions | Survol de l'arborescence, de l'historique Git, des mémoires archivées et des résultats d'outils utiles. Racines `GREG` et `air-de-gregory.home`, onze transcriptions JSONL à la racine de `GREG`, sept dossiers de résultats d'outils repérés. Pas de lecture intégrale des conversations. |
| Mémoire locale Claude | `~/.claude/projects/-home-gregory-projets-OGameX/memory/MEMORY.md` accessible et lu, ainsi que ses dix fichiers référencés. Aucun problème d'accès. |
| Skills | Les cinq sources `.claude/skills/*/SKILL.md` lues pour l'audit, et copies `.agents/skills/` vérifiées. |

Cette prise de connaissance est suffisante pour les constats ci-dessous ; elle **ne constitue pas une lecture exhaustive ligne par ligne de toute la documentation et de tous les historiques de prompts**. Aucun fichier demandé n'était inaccessible. Je rends cette limite explicite plutôt que d'affirmer une connaissance exhaustive du projet.

### Préférences comprises et arbitrages de sources

- Gregory ne code pas ; les agents livrent des résultats concrets dans le dépôt. Réponses en français, contenu joueur conçu en français, anglais avant l'alpha publique.
- V1 jouable et conservation du domaine ; aucune nouvelle interface durable en Blade. Les prototypes Blade déjà présents ne sont pas une permission d'en ajouter.
- Chaque écran se pense PC et mobile ; référence mobile **390 × 844**, navigation pensée pour le téléphone. Une application native reste une possibilité, pas un choix technique arrêté.
- Direction UI : adulte, moderne, attirante ; B/D et les mélanges Crépuscule, avec **Mix v5** comme base selon la mémoire. Outfit, verre dépoli, cité, violet et or ; le cartoon héraldique a été rejeté.
- Pas de publication, commit ou push implicite. Une préférence ancienne ou une suggestion d'agent ne devient pas une décision de Gregory.

La mémoire comporte des historiques périmés : financement participatif de 5 000 € remplacé par Patreon ; sondage « différé » ensuite signalé comme déjà publié ; ancienne piste de serveur unique et préférence PostgreSQL à comparer au cadre plus récent. Je n'en tire aucune autorisation de relancer ces débats ni de changer MariaDB. Les modèles Claude Opus/Sonnet de la mémoire ne se transposent pas littéralement aux modèles disponibles dans Codex. Aucun sous-agent n'a été lancé pendant cet audit.

## 2. Audit du projet et du code

### 2.1 État réel du dépôt

`main` est à `10a02729`, même position que la **référence locale** `origin/main` (`0/0` de divergence). Aucun `fetch` n'a été effectué : cela ne certifie pas l'état actuel du serveur GitHub. Derniers changements visibles : partage des règles Codex, Tour de mages et question des défenses, archivage, puis annulation du prototype de vitrine non validé.

**État initial à préserver :** `.claude/hooks/archive-transcripts.mjs` était déjà modifié et `.claude/worktrees/` déjà non suivi. Je n'ai pas écrit dans ces éléments. Le script Claude contient notamment une modification en cours pour découper les gros fichiers d'archives.

| Branche / worktree | HEAD observé | Livrable vérifié dans les fichiers |
|---|---|---|
| `main` | `10a02729` | Moteur OGameX, pilote héros en Blade, documentation et assets. |
| `worktree-agent-aae3713d4f9d47fac` | `d74ce3c0` | Simulateur à dix paliers, courbes et étude. |
| `worktree-agent-adc2991a55fce0a8c` | `5c98d051` | API `/api/v1`, Sanctum, villes/ressources et tests. |
| `worktree-agent-a2e4dcde695548b4c` | `0f8ad295` | Shell React/TypeScript/TanStack/Tailwind/Zustand/i18next, page de connexion et composants initiaux. |
| `feat/heros-suite` | `f3a6a17c` | Rôles principal/conseiller, services, équipement, effets, migrations, tests, FR/EN. |
| `feat/kaelite-deux-soldes` | `e5df04d2` | Soldes acheté/gagné, grand livre, services, migrations et tests. |

Les cinq worktrees sont propres lors du contrôle et possèdent chacun une référence distante locale correspondante. Les archives qui les disent encore « non commités » ou « non poussés » sont historiques : les trois sauvegardes WIP existent désormais dans Git. **Ils ne sont toujours pas fusionnés dans `main`.** Ne pas confondre « branche sauvegardée » et « fonctionnalité intégrée et validée ».

Le dépôt séparé `docs/archives/transcriptions/` était propre, avec un historique récent d'archivages (`6217b99` en tête au contrôle). Je n'y ai rien écrit ni poussé.

### 2.2 Cartographie : conservé, pilote, cible

**Vérifié sur `main` :**

- Le domaine demeure dans `app/Services`, `app/GameMissions`, `app/GameObjects`, `app/Models`, avec moteurs de combat PHP et Rust. Les nouveaux modèles héros et le service de progression existent déjà ; le domaine n'est donc pas un miroir strictement identique à l'upstream.
- `composer.json` demande PHP 8.5, Laravel 13, Reverb ; `package.json` demande Vite 8. Cela vérifie les dépendances déclarées, pas les versions effectivement exécutées par des conteneurs arrêtés.
- L'interface active reste largement legacy. `main` ne déclare ni React, ni Sanctum, ni Octane/Horizon. `routes/api.php` contient un ancien squelette `/user`, mais `bootstrap/app.php` ne le charge pas par `withRouting(api: ...)` : la présence du fichier ne prouve pas une API opérationnelle.
- `HeroController` produit encore les vues `ingame.hero.*` et le graphe de talents ; le schéma de talents, les prérequis any-of et les objets d'équipement sont un pilote, pas le système final héros/conseil.
- `GlobalGame` actualise joueur, planète et flottes pendant les requêtes. Les tâches de `routes/console.php` font classements/nettoyage/régénération, pas la nouvelle résolution de missions par jobs différés. `app/Jobs/` ne contient que `CreateLegorMoon.php`.
- Docker utilise MariaDB `11.3.2-jammy` et PHP-FPM. Pas de bascule FrankenPHP/Octane/Redis/Horizon observée. Reverb déclaré n'implique pas encore la diffusion des événements de résolution prévue.

**Dans les branches non intégrées :** l'API expose les noms fantasy sans renommer le domaine ; `food: null` représente honnêtement la Nourriture non construite. Les contrôleurs restent essentiellement fins, avec vérification d'appartenance des villes et refus des comptes bannis. La branche héros possède de vrais services et tests ; celle de Kaelite possède des verrous et de l'idempotence. Ce sont des actifs réels, mais ni le lobby distant, ni les effets de héros appliqués aux règles du moteur, ni l'interface complète ne sont livrés par leur simple existence.

### 2.3 Constats prioritaires et tests à prévoir

**P1 = à traiter avant exposition du périmètre concerné ; P2 = intégration/fiabilisation.** Ce classement ne signifie pas que le site actuellement publié possède ces fonctionnalités : plusieurs constats concernent exclusivement des branches en attente.

| Priorité | Constat et preuve | Conséquence / contrôle attendu |
|---|---|---|
| P1 | **Recrutement concurrent des conseillers** : `heros-suite/app/Services/Hero/HeroRosterService.php:64` fait `count()` puis `create()`, sans transaction/verrou sérialisant la limite. | Interleaving possible : deux requêtes voient trois conseillers et créent chacune le quatrième. Risque déduit du code, pas reproduit en base. Verrouiller une ligne parent et tester deux connexions simultanées avant une route de recrutement. |
| P1 | **Contrat d'authentification du web à acter** : le store React utilise `localStorage` (`.../resources/js/app/stores/auth.ts:8,28`), l'API désactive explicitement les sessions Sanctum. | Le jeton web est accessible au JavaScript. Choisir et intégrer le parcours prévu pour le navigateur avant d'étendre l'application ; tester connexion, expiration/révocation, rechargement, refus et CSRF si cookies. Ne pas activer les cookies sans revoir `AuthTokenController::destroy()` : il suppose un vrai token courant supprimable. |
| P1 | **Heure serveur absente** de `CityResource` et des réponses de lecture examinées dans la branche API. | Le contrat temporel imposé par l'architecture n'est pas encore satisfait. Ajouter heure serveur et horodatages absolus lors du socle de résolution ; tests de décalage d'horloge et réconciliation. |
| P1 | **Gel Kaelite et dépense 100 % gagnée** : `KaeliteService::spend()` lit `isFrozen()` sans verrou du portefeuille acheté ; si tout est payé en gagné, il ne passe pas ensuite par le débit acheté verrouillé. | Course possible avec un gel concurrent du compte. Hypothèse d'interleaving à tester, pas bug reproduit. Sérialiser l'état de gel même lorsque la part achetée vaut zéro. |
| P2 | **Idempotence Kaelite partielle** : même utilisateur/type/montant, mais `reference` différente, n'est pas vérifiée par les chemins de replay examinés. | Deux commandes de même prix pourraient être confondues si une clé est réutilisée. Le service seul ne prouve pas un double crédit de produit ; la livraison commerciale n'existe pas encore. Tester un identifiant de commande et ses paramètres complets. |
| P2 | `HeroTalentService::allocate()` verrouille d'abord le héros ; `respec()` commence par supprimer les talents puis met à jour le héros. | Ordre de verrous différent : scénario de deadlock/concurrence à couvrir. Je n'affirme pas une corruption reproduite. L'équipement mérite également un test de deux changements concurrents, au-delà de son index unique. |
| P2 | `recruitMain()` transforme **toute** `QueryException` en « héros principal existe ». | Une erreur SQL autre que l'unicité serait masquée. Filtrer la violation attendue ; tester une autre erreur. |
| P2 | Migration héros : affectation de `main_marker = 1` à tous les héros existants après création de l'unicité `(user_id, main_marker)`. | Suppose un seul héros par utilisateur. Faire un précontrôle des doublons avant fusion/migration ; ne pas supposer que tous les environnements ne contiennent que la démo. Aucun contrôle SQL n'a été exécuté ici. |
| P2 | `config/kaelite.php:19` active **30 % de bonus par défaut**, sans condition de phase. | Une installation hors bêta accorderait ce bonus sans configuration spécifique. Je recommande 0 par défaut et activation explicite durant la bêta ; décision à confirmer avant modification du domaine. |
| P2 | Les types d'effets héros inconnus ne sont pas plafonnés ; ce comportement est même testé. Le seeder et les caps n'utilisent pas tous les mêmes noms d'axes. | Un contenu valide en apparence peut sortir des plafonds. Prévoir une validation de catalogue et l'alignement des noms avant d'écrire les six arbres. |
| P2 | `LoadApiPlayer` ne reprend pas toute la mise à jour de `GlobalGame`, notamment celle des flottes ; liste de villes et détail n'ont pas la même actualisation explicite. | Définir le niveau de fraîcheur garanti ; tester l'API à l'arrivée d'une mission et la cohérence liste/détail. Le remplacement futur par jobs doit avoir son rattrapage/idempotence. |

Autres limites vérifiées : erreurs API littérales en anglais, jetons sans expiration par défaut, pas de périmètre d'extensions séparé avec scopes observé ; traductions de démonstration côté TypeScript alors que l'architecture vise la réutilisation de `resources/lang/` ; assets compilés suivis par Git (cinq fichiers sur `main`, la branche React les modifie). **Ne pas supprimer les builds suivis sans vérifier le déploiement.**

Les tests manquants les plus utiles ne sont pas des doublons des getters : concurrence conseillers/talents/équipement/gel, idempotence de commande complète, isolation inter-joueur/inter-serveur, parcours React ↔ API, middleware sous Octane, et double résolution job/rattrapage. Aucun test de concurrence n'a été exécuté contre les données existantes.

### 2.4 Documentation : écarts vérifiés

1. Le document d'architecture se dit encore « proposé — à valider » alors que `CLAUDE.md` le dit arrêté. Ne pas rouvrir la décision à cause de cet en-tête.
2. « 1109 tests verts » est un repère ancien, pas une mesure présente. L'archive héros/Kaelite annonce **1151 sur main, 1192 héros, 1170 Kaelite** au 30/10 ; je n'ai pas reproduit ces chiffres en PHP aujourd'hui.
3. Roadmap historique : cases des phases 0/1 encore vides, alors que le récapitulatif les dit terminées ; ancienne liste de plusieurs héros/gouverneurs dans la Phase 4, remplacée dans le GDD par un principal et quatre conseillers.
4. Le GDD juxtapose dix paliers validés et anciens tableaux de six paliers, niveaux 16/18 et plafonds 15 ; la section 5.6 conserve une présentation de la capitale par Prestige qui doit être reconciliée avec les paliers + calques de 4.2. Les coûts et dates ne sont pas des règles prêtes à coder.
5. Sur `main`, le simulateur est toujours à **six paliers**, et l'arbre publié également. La branche à dix paliers et les courbes existent, mais leur validation/fusion et la régénération sont encore à faire.
6. Le GDD marque l'ancien Mode Paix/Guerre comme caduc lorsqu'il contredit les décisions du 30/10 ; d'autres passages, le pitch marketing et certaines mémoires gardent des formulations plus anciennes. Ne pas promettre l'immunité individuelle d'un membre d'alliance en guerre.
7. `CLAUDE.md` présente seulement deux skills dans « Outils », mais il y en a cinq. Le skill bâtiment cite encore cinq tranches d'Hôtel de ville, alors que dix sont validées ailleurs. Les sources Claude n'ont pas été corrigées ici, conformément à la demande.
8. `site/` n'existe pas sur `main` après le revert du prototype non validé. `site-prototype/` existe ; son répertoire `logos/` contient l'ancienne série de sept pistes, pas les dix variantes récentes. Ne pas l'utiliser comme source courante par défaut.
9. Les archives WIP non commités et les préférences anciennes de la mémoire doivent être datées, pas silencieusement présentées comme l'état actuel.

### 2.5 Vérifications exécutées et non exécutées

| Vérification | Résultat observé pendant cet audit |
|---|---|
| `node tools/sync-agents-skills.mjs --check` | Réussite, avant et après les corrections. Aucun skill modifié. |
| `node tools/theorycrafting/model.test.js` sur main | **10 tests réussis.** Le lancement standard avec `node --test` était aussi vert ; l'exécution directe a permis de voir le détail des dix cas. |
| `node --test --test-isolation=none tools/theorycrafting/model.test.js tools/theorycrafting/courbes-hdv.test.js` dans le worktree simulateur | **16 tests réussis.** Cela vérifie la cohérence du simulateur, pas le réalisme de la courbe de progression. |
| Adaptateur de hook | Cinq cas isolés réussis hors sandbox ; détails en section 3. |
| `node --check .codex/post-edit.mjs` | Réussite. |
| `npm run build -- --outDir /tmp/kalendrath-codex-assets` | **Impossible : `vite: not found`** ; `node_modules/` absent sur main. Aucun lockfile ni build suivi modifié. Pas d'installation de dépendances pour cet audit d'outillage. |
| Tests PHP complets, Rector, Pint, PHPStan | Non lancés : aucun code PHP modifié ; Rector/Pint seraient des mutations. `phpunit.xml` ne force pas une base de test distincte. |
| Docker | Lecture avec escalade après refus du socket dans le sandbox. App et DB arrêtées (`Exited 127`, quatre jours) ; workers/scheduler/Reverb arrêtés ; Nginx et phpMyAdmin seuls actifs. Aucun service démarré/recréé, aucune base modifiée. |

Pour relancer les tests PHP ultérieurement : utiliser Docker, une base dédiée et les bibliothèques Rust attendues ; vérifier l'isolation avant `composer run tests`. L'archive décrit des bases `laravel_base`, `laravel_heros`, `laravel_kaelite`, mais leur existence actuelle n'a pas été contrôlée puisque MariaDB est arrêtée. Je ne transforme pas les anciens résultats verts en certification actuelle.

## 3. Écarts de configuration Codex/Claude et corrections faites ou proposées

### 3.1 Ce qui est disponible

| Fonction | Claude / source | Codex vérifié et contournement |
|---|---|---|
| Cadre projet | `CLAUDE.md` | `AGENTS.md` est présent dans le contexte actif et renvoie à la même source. Pas besoin d'en recopier le contenu. |
| Skills | `.claude/skills/` | Cinq skills annoncés dans le catalogue actif, cinq copies identiques. Lecture à la demande selon la tâche ; pas de seconde source éditoriale. |
| Mémoire | Répertoire Claude local | Lisible manuellement ; pas d'importation automatique ni de garantie de synchronisation entre machines. Les décisions durables doivent vivre dans les docs du dépôt. |
| PostToolUse | `.claude/hooks/post-edit.mjs` | Hook découvert et hashes de confiance présents dans la config utilisateur ; protocole à adapter, voir ci-dessous. |
| Fin de session | Archiver Claude commun | Inadapté directement aux sessions Codex et aux sessions sans autorisation Git ; désactivé côté Codex. |
| MCP navigateur | Serveur Playwright dans `~/.claude.json` | `codex mcp list --json` retourne `[]`. Il n'est pas hérité automatiquement. Pilotage Playwright direct de Chrome Windows vérifié. |
| Artefacts | Outillage Artifact de Claude dans ses anciennes sessions | Pas d'outil Artifact Claude natif dans cette session. Lecture par navigateur + copies HTML/SVG ; aucune publication/édition réalisée. |
| Sous-agents | Agents et modèles Claude | Outils de collaboration présents dans cette session Codex ; pas de correspondance automatique des modèles/efforts, et délégation soumise aux instructions applicables. Aucun agent délégué ici. |
| Plugins Claude | superpowers, code-review, security activés dans les settings | Pas de traduction par copie de leurs noms. Revue de code possible directement ; leurs workflows propriétaires ne sont pas installés chez Codex. |
| Autres services | Certains anciens rapports évoquent Drive/Notion | Leur mention historique ne prouve pas une connexion actuelle. Aucun accès ou envoi à ces services testé pendant cet audit. |

J'ai lu les cinq skills : `brief-midjourney-batiment`, `checklist-publication`, `devlog`, `lexique-kalendrath`, `voix-kalendrath`. Le rapport utilise le lexique et respecte la séparation décision/proposition ; il n'est ni un devlog public ni un brief Midjourney. Leurs circuits de publication ne sont donc pas déclenchés artificiellement. Le skill **OpenAI Docs** a été utilisé pour vérifier les particularités Codex.

### 3.2 Hooks : défaut prouvé, correction et limite de vérification

**Test avant correction :** le hook commun reçoit un événement Codex `apply_patch` avec le texte du patch dans `tool_input.command` : sortie vide, code 0. Avec un événement Claude donnant `tool_input.file_path` vers la même vue Blade : rappel « rien de durable en Blade » correctement produit. Le filtre `Write|Edit` n'était pas la cause : Codex accepte ces alias pour `apply_patch` ; le script ne décodait pas le chemin.

**Correction :** `.codex/post-edit.mjs` traduit les événements Codex en entrées acceptées par le script commun ; les règles Pint/PHPStan/Blade/domaine/API/simulateur restent exclusivement dans `.claude/hooks/post-edit.mjs`. Extraction de tous les chemins du patch, refus hors projet, signalement des suppressions, aggregation des contextes. Les éditions par shell ne deviennent pas magiquement des patches : contrôles manuels toujours nécessaires.

**Tests après correction :** multi-fichiers Codex, chemin Claude explicite, suppression, chemin hors projet et lecture sans effet réussis. Syntaxe valide. Les sous-processus synchrones Node ont expiré dans le sandbox de cette session ; le même test hors sandbox réussit. Ce n'est donc pas une preuve de fonctionnement du formateur dans toutes les restrictions possibles. Aucun fichier PHP n'a servi de cobaye.

**Activation automatique :** traces locales `hook/started` et `hook/completed` observées, feature `hooks` active et anciens hashes de confiance présents. Cela confirme que le runtime possède les hooks, mais ne certifie pas qu'une nouvelle définition modifiée sera exécutée automatiquement. La nouvelle définition doit passer la revue de confiance de Codex ; je n'ai pas forgé les hashes. Référence : [documentation officielle des hooks](https://learn.chatgpt.com/docs/hooks). Après cette revue, faire un vrai test d'édition contrôlée dans une prochaine session ; ne pas annoncer aujourd'hui « hooks automatiques entièrement validés ».

**Archivage SessionEnd :** le script Claude utilise `dirname(transcript_path)` puis copie récursive et `git add -A`, commit, pull/rebase, push. Un test dans un faux projet **sans dépôt Git**, avec deux transcriptions sœurs, a copié les deux alors qu'une seule était indiquée. Chez Codex, ce dossier est daté et peut contenir plusieurs projets. Le schéma du fichier n'est pas le même que celui de Claude. Il faut un mode local sans Git, un périmètre de fichiers explicite et un support Codex dans la source commune avant de réactiver cet automatisme. La suppression du hook Codex évite aussi tout commit/push implicite pendant cet audit. Aucun test de fin de session sur les vraies archives n'a été tenté.

### 3.3 Fichiers modifiés et propositions non appliquées

**Corrections appliquées :**

1. `AGENTS.md` : état précis de l'intégration des hooks et renvoi vers la notice.
2. `.codex/hooks.json` : appel à l'adaptateur ; retrait du hook `SessionEnd`.
3. `.codex/post-edit.mjs` : nouvel adaptateur.
4. `.codex/README.md` : limites, confiance des hooks, archivage et procédure de navigateur testée.
5. Le présent rapport et les six captures listées à la section 4.

**Non modifiés :** `.claude/*`, `.agents/skills/*`, config utilisateur `~/.codex/config.toml`, tout le domaine PHP, migrations, dépendances/lockfiles, contenu des artefacts, branches et index Git. La modification Claude préexistante n'est pas mon travail.

**À proposer pour une mission suivante :** mode d'archivage local/sélectif dans le script commun ; recadrage des références documentaires périmées dans les sources Claude ; installation durable de Playwright MCP pour Codex avec une version et un chemin stables. Je n'ai pas enregistré le chemin éphémère d'un cache npm comme dépendance partagée. Aucune installation système n'a été nécessaire : Chrome, Node Windows, Playwright et Chromium étaient déjà présents.

## 4. Accès aux artefacts

### 4.1 Pages réellement ouvertes

| URL autorisée | Résultat réel |
|---|---|
| [Logos récents](https://claude.ai/artifact/JMADbd1mBb63myUhqTAqRF) | Ouvert dans Chrome Windows ; titre « Logos Kalendrath - Claude », contenu « Système de logos, version 2 », dix variantes et les déclinaisons. Rendu de contenu `8c7be9b4-b889-4d0b-8e44-834885bf7ec6`, version `1793544744-a0a9`. |
| [Logos du 31/10](https://claude.ai/artifact/Rb4XfPCjpoSL3UchdQLseT) | Ouvert ; titre « Logos Kalendrath », sept pistes, tests et présentation sur la cité. Rendu `c71cca66-9e4d-46be-9e29-c610b3b0cdec`, version `1793488203-ddd1`. |
| [Feuille de route](https://claude.ai/artifact/RFdBPx8c1kbQQA5PtBHr9F) | Ouverte et rendue ; en-tête « mise à jour le 27 octobre 2026 », jalons publics, design system/héros, alpha, Patreon, préinscriptions, bêta et s1 visibles. Test d'accès, pas audit exhaustif de la roadmap interactive. |
| [Arbre des prérequis](https://claude.ai/artifact/2GSoLWt91J28Rve5n12EMK) | Ouvert et rendu ; arbre et fiche Portail visibles, version datée du 21 octobre, Portail au palier 6/Métropole. **Le rendu confirme son retard sur le GDD à dix paliers.** Les dates affichées ne sont pas validées par cet audit. |

Aucune autre page de `claude.ai` n'a été ouverte à l'initiative de cet audit ; aucune conversation consultée, aucun clic Share/Publish, aucun contenu modifié. Les frames de rendu des quatre pages sont des composants de ces artefacts, pas des conversations supplémentaires. La barre latérale et les popups de la visionneuse ont parfois gêné les captures ; les noms visibles incidemment dans l'interface n'ont pas été utilisés comme contexte de projet ni conservés dans les images livrées.

**Moyen technique vérifié :** Chrome Windows, profil dédié `%LOCALAPPDATA%\KalendrathCodexChrome`, CDP `127.0.0.1:9224`. L'accès direct depuis Node Linux échouait ; Node Windows a chargé Playwright via le partage WSL et s'y est connecté. Chromium WSL était déjà installé ; le répertoire `chromium-1252` est un lien vers `chromium-1248`, comme l'indiquait une ancienne archive. Je ne l'ai pas changé.

### 4.2 Ce qui a été testé en ligne et localement

- **En ligne :** ouverture réelle des quatre URLs, extraction du document des deux logos, captures PC et mobile, demandes de rendu clair/sombre. Certaines tentatives de capture de sections ont expiré et certaines captures de la visionneuse sont gênées par ses panneaux/popups. Elles ne suffisent pas à certifier seules tous les thèmes.
- **Localement :** les deux HTML originaux identifiés ci-dessous ont été rendus dans Chromium à **1440 × 1000** et **390 × 844**, avec `prefers-color-scheme` clair et sombre. Les huit configurations donnent `scrollWidth == innerWidth` : aucun débordement horizontal de document mesuré. Les couleurs de fond calculées changent bien avec le thème. Cela ne prouve pas l'accessibilité de toutes les interactions ni le comportement Safari/iOS.
- **SVG récents :** comparaison exacte de l'objet `DATA` extrait du rendu en ligne avec celui de la copie archivée : **identiques**. Dix variantes × quatorze entrées, plus huit emblèmes. Le jugement détaillé des petites tailles repose donc sur les mêmes géométries que celles du lien actuel, pas sur un logo approchant.
- **Petites tailles :** rendu des vrais `fav`/`favL` à 16 et 32 pixels CSS, à facteur de pixels 1 ; signes à 32, 48 et 64 avec recadrage circulaire pour examiner les avatars. Monochrome noir et blanc sur fonds adaptés. Ce n'est pas une inspection du favicon installé dans chaque navigateur.

**Copies sources utilisées**, dans le dépôt séparé des transcriptions :

- `GREG/c15ddbcf-2d6f-4e70-8f6f-6edc271c2e7f/tool-results/artifact-8c7be9b4-1793544744-a0a9.html` : version récente.
- Même dossier, `artifact-c71cca66-1793488203-ddd1.html` : version du 31/10.
- `docs/brainstorm-design/logos-ideas/{8-le-seuil,9-le-noeud,10-la-couronne}.svg` : croquis antérieurs complémentaires, **pas** la source des dix variantes finales.

### 4.3 Évolution entre les versions

| 31/10 : sept pistes | Version récente : dix variantes | Mon appréciation |
|---|---|---|
| Monolithe, Rupture, K-obélisque, Gonfanon, Sceau brisé, Taille, L-obélisque : exploration de symboles différents. | Six K, deux nœuds, deux couronnes ; gonfanon et sceau deviennent des déclinaisons de K1. | Amélioration : le système s'organise autour d'une marque au lieu de multiplier des marques concurrentes. |
| K dont haste et branches pouvaient se lire séparément ; étincelle. | Raccord plus franc de K1, étincelle supprimée. | La lecture K progresse ; le risque n'a pas disparu pour toutes les variantes, notamment K4. |
| Lettrages de familles différentes, légers et très espacés selon les pistes. | Six constructions de lettres en traits SVG, réglages par variante. | Plus contrôlable et souvent mieux lisible. **« Généré en code » n'est pas synonyme de lettrage final bien dessiné.** |
| Présentation sur la cité et essais de tailles. | Batteries de monochrome, favicons, contrastes, modèles d'en-tête et limites explicites. | Meilleur dossier de décision ; ne pas confondre les affirmations de la page avec les résultats réellement observés. |
| Or clair et veines à faible séparation selon les supports. | Bronze/brun sur fond clair ; K1 met la veine dans une fente sombre. | Progrès net du contraste. N1 et C1 gardent un contact violet/or problématique. |
| Anciennes verticales et détails irréguliers. | Verticales encore tronquées. | Pas de progrès suffisant pour livrer : défaut toujours bloquant dans les fichiers récents. |

### 4.4 Preuves visuelles conservées

Ces six PNG sont des **rendus locaux d'audit**, issus des sources ci-dessus ; ils n'ont pas été publiés sur Claude :

- [Dix variantes, couleur et monochrome](codex-audit-2026-11-04/logos-10-variantes.png).
- [Favicons réels et essais d'avatars circulaires](codex-audit-2026-11-04/favicons-et-avatars.png).
- [Version récente, mobile clair](codex-audit-2026-11-04/logos-recents-mobile-clair.png).
- [Version récente, mobile sombre](codex-audit-2026-11-04/logos-recents-mobile-sombre.png).
- [Ancienne version, PC](codex-audit-2026-11-04/logos-anciens-pc.png).
- [Gonfanons et sceaux récents](codex-audit-2026-11-04/gonfanons-et-sceaux.png).

## 5. Avis sur les logos

### 5.1 Indépendance de l'avis : limite explicite

Il n'était plus possible de faire un vrai test en aveugle : les préférences K1/K5/K3 figuraient dans la demande de Gregory, et je les avais déjà aperçues dans l'introduction de l'artefact lors de la mise en place du navigateur. Je ne prétends donc pas n'avoir subi aucune amorce.

J'ai toutefois **formé et écrit mon avis après avoir regardé les SVG et leur planche, avant de lire l'archive du 01/11**. Cette première note, datée par l'ordre de travail, retenait déjà K1 principal, N1 second, K5 sous réserve du toit et un avatar K1 à essayer avant K3. J'ai ensuite lu les autres verdicts pour les confronter à ces observations. Les divergences ci-dessous sont maintenues.

### 5.2 Classement pour la marque principale

Ce classement concerne la marque, pas l'utilité d'une variante dans le jeu. C1 peut être un bon pictogramme et un mauvais candidat au logo principal.

| Rang | Variante | Avis argumenté |
|---|---|---|
| **1** | **K1 Taillé** | Le plus immédiat : le K et le pilier se comprennent sans explication ; poids suffisant et économie de détails. Bonne tenue en silhouette et en monochrome ; cohérent avec l'architecture et les artefacts anciens du lore. Le lettrage reste trop mécanique/fin à certaines tailles. **Choix principal, à finaliser.** |
| **2** | **N1 Nœud losange** | Même base lisible, idée de convergence des Straumar pertinente. Mais le losange attire l'œil avant le nom, se distingue surtout par la teinte et n'apporte presque rien à 16 px. Corriger sa séparation de l'or et examiner une version sans dépendance à la couleur. Meilleure alternative narrative, pas mon favori final. |
| **3** | **K3 Médaillon** | Cadre immédiatement compatible avec un badge ; K reconnaissable à 48/64 px. Deux anneaux consomment cependant la surface et rendent la composition plus générique. Je ne le choisirais pas comme signature principale ni automatiquement comme avatar. |
| **4** | **C1 Couronne cité** | L'image d'une cité et de son axe central se lit bien. C'est un château de fantasy assez générique, sans K ; bon vocabulaire de jeu, lien de marque plus faible. Sa veine doit être détachée du remplissage or. |
| **5** | **K5 Négatif** | Très robuste en petit, fort contraste du K évidé. L'enveloppe à toit large évoque nettement une maison ; le mot lourd s'éloigne aussi de la direction épique. Très utile pour le favicon, moins convaincant pour porter tout Kalendrath. |
| **6** | **K2 Fil** | Élégant, aéré, intéressant avec l'UI moderne documentée. La finesse et le petit losange se dégradent vite : pas assez solide pour les usages courts et les superpositions sur illustration. À garder comme étude de sobriété, pas à livrer tel quel. |
| **7** | **N2 Nœud cordon** | Le raccord rond donne une lecture d'articulation ou de clé ; branches fines et arrondies moins cohérentes avec la taille de pierre. L'histoire des Straumar n'est pas suffisamment claire à l'œil pour compenser cela. |
| **8** | **K4 Rune** | Silhouette énergique, mais éclats et jonction pointue réintroduisent une séparation `I<`. L'effet de fissure exige plus d'attention que le K1 ; trop fragile comme signe permanent. |
| **9** | **K6 Paliers** | Le K reste perceptible, contrairement à une condamnation générale « illisible ». Mais les bandes horizontales et la pointe rapportée font pyramide/maçonnerie découpée ; cela raconte un empilement plus qu'un ancien monolithe. Ne pas confondre l'idée de progression avec l'identité de la marque. |
| **10** | **C2 Couronne pointes** | Couronne très générique, petites pointes qui fusionnent, registre plus sévère/antagoniste. Aucun avantage décisif sur C1 pour les cités ni sur K1 pour la marque. |

### 5.3 Choix par usage et désaccords avec les verdicts précédents

**Principal : K1.** Accord avec le classement de Claude et des agents. C'est un accord motivé par la lecture du signe, pas la preuve d'un logo déjà prêt. Je n'emploierais pas les verticales actuelles sur une bannière ou un écran de chargement.

**Favicon : K5 aujourd'hui, décision de gamme encore ouverte.** À 16 px, le K creusé tient mieux que les traits fins et anneaux des autres variantes ; à 32 px, K1 reprend nettement ses qualités. Je ne suis **pas d'accord** avec « K5 est la seule variante lisible à 16 px » : K1 reste identifiable comme un K sur le rendu DPR1. Ce n'est simplement plus une lecture détaillée de l'Obélisque et de sa veine. Je comparerais K5 à un K1 réellement redessiné pour 16 px, avec épaisseurs et alignements optiques adaptés, avant de figer deux silhouettes.

**Avatar Discord : K1 avec marge circulaire, K3 en alternative.** Désaccord avec l'automaticité du choix K3. Sur les essais circulaires, son double anneau réduit le K et se mélange aux contours d'avatar de l'application ; il donne un badge plus institutionnel, moins direct. K1 occupe mieux l'espace, **mais il ne faut pas simplement couper son carré en cercle** : les essais montrent que la pointe de branche peut toucher ou sortir du masque. Prévoir une zone de sécurité, puis comparer à K3 à un seul anneau, à 32, 48 et 64 px. Cette déclinaison K1 n'a pas été créée pendant l'audit ; c'est une recommandation de travail.

**C1 : vocabulaire de cité, pas indicateur de progression déjà décidé.** Accord partiel avec marketing/DA. La lisibilité ne crée aucune règle de jeu : ne pas changer le nombre de tours, points ou obélisques pour signifier un rang/palier sans décision du GDD. Je ne partage pas le rejet absolu au motif « ce n'est pas un K » : un pictogramme de cité n'a pas besoin d'être un monogramme de marque.

### 5.4 Défauts techniques confirmés

1. **Verticales coupées : bloquant.** Le K1 récent a `viewBox="-8 -8 256.9 146"` : le bord bas est à **138**, alors que le groupe du mot commence à `y=116` avec une hauteur de lettres `100 × 0.3 = 30`, donc atteint **146**, avant marge des traits. Huit unités au moins manquent. Ce n'est pas une approximation visuelle ni un défaut propre à Claude : la coupe est dans le SVG. Le même schéma affecte les autres verticales examinées. Recalculer les bounds et ajouter la marge de trait, puis rendre toutes les déclinaisons.
2. **Petit lettrage : à reprendre.** Dans l'en-tête proposé à 32 px de logo, la capitale fait environ `32 × 48 / 116 = 13,2 px`. Les traits horizontaux de K1 deviennent très fins ; les lettres se rigidifient et le pied du L mérite un dessin optique pour éviter les lectures parasites. Agrandir tout le logo n'est pas toujours possible sur mobile : prévoir une taille minimale du mot et un choix de présentation adapté.
3. **Violet sur or : N1, mais aussi C1.** Dans N1, le losange recouvre le raccord doré ; dans C1, le trait violet `x=50, y=26..74` est tracé directement dans le pilier or, sans fente sombre. La paire `#B9AEFF` / `#E9BE74` est à environ **1,14:1** selon le calcul de contraste de l'artefact. K1 place correctement sa veine dans la fente. Corriger C1 également, pas seulement N1.
4. **Monochrome et production.** La disparition du mana est acceptable si la silhouette survit ; c'est le cas de K1. Les lettres SVG en `stroke` sont portables à l'écran, mais le fichier final doit être nettoyé et ses contours/masques vérifiés pour les usages d'impression. Aucun export final n'a été modifié ici.
5. **Dossier de marque incomplet.** Il manque une déclinaison adaptée au recadrage circulaire, des tests d'onglets réels sur plusieurs moteurs et un test de lecture non guidé. Le dossier parle aussi de « neuf lettres » alors que KALENDRATH en compte dix : petite erreur de texte qui illustre le besoin de relire les descriptions générées.

### 5.5 Cohérence avec le lore, les couleurs et l'UI

Le pilier et sa séparation centrale sont un meilleur ancrage que l'ajout d'une épée, d'une couronne autonome ou d'un anneau générique : le lore place bien les Obélisques et les convergences au cœur de Kalendrath. **L'évocation ne demande pas une reproduction littérale de chaque illustration** : leur identité matérielle et les détails des paliers comportent déjà des écarts documentés. Il faut néanmoins éviter de faire du mana une décoration de bijouterie sans rapport avec ces structures.

Or/bronze, nuit et violet conviennent à Mix v5 tel que décrit par la mémoire. Le mot à empattements peut cohabiter avec Outfit dans l'UI ; il doit rester lisible et ne pas répéter les cadres décoratifs sur chaque élément. La légèreté discrète du ton n'exige pas un logo amusant ou arrondi. La qualité d'accueil viendra aussi du texte, de l'espace et de la simplicité des parcours.

**Précision de source sur la règle de couleur :** la faible séparation violet/or et la consigne de fente sont explicites dans l'artefact récent et les retours DA. Dans `direction-artistique-planche-de-style.md`, les passages vérifiés insistent surtout sur le violet-bleu, les matières et la palette encore à figer ; je n'y ai pas retrouvé une interdiction littérale générale « jamais de violet sur or ». La Kaelite y est même décrite comme un cristal or-ambre à veines violettes. Il faut donc distinguer une image de matière de la lisibilité d'un petit signe. Je ne transforme pas la paraphrase d'une archive en règle universelle prétendument citée mot à mot du document.

**Distinctivité : jugement limité.** Le K1 est cohérent et facile à mémoriser parmi ces pistes, mais un K anguleux doré ne constitue pas à lui seul une forte singularité dans la fantasy. N1 ajoute un détail narratif, pas nécessairement une meilleure reconnaissance. Aucun relevé comparatif actuel de logos concurrents, ni recherche de marque, n'a été réalisé : je ne certifie ni originalité mondiale ni disponibilité du signe.

### 5.6 Gonfanons, sceaux et suite recommandée

Les gonfanons de la version récente sont plus cohérents que l'ancienne piste de marque autonome : ils portent K1. Les trois champs se distinguent bien, mais « sang », pastilles et rangs peuvent être lus comme des états de guerre ou de progression. Ce sont des propositions graphiques, pas des fonctionnalités décidées.

Le sceau fragmenté est une bonne illustration de la Rupture et une estampille à taille suffisante. Le nom en arc est peu utile en très petit et le comptage d'obélisques par chapitre ne passe pas à une longue suite de chapitres. Conserver un système de numéro/nom lisible à côté du sceau plutôt que d'ajouter indéfiniment de petits piliers. Ce n'est pas ma solution préférée pour l'avatar courant.

**Ordre de travail proposé :**

1. Corriger les bounds des verticales et retoucher le mot KALENDRATH de K1, en conservant ses dix lettres clairement distinctes.
2. Finaliser une famille courte : K1 principal, petit signe, avatar circulaire ; conserver K5 comme candidat de favicon et tester une simplification optique de K1 à côté.
3. Corriger la séparation mana/or de N1 et C1 si ces pistes sont conservées. Tester le clair, le sombre et les deux monochromes aux tailles finales.
4. Faire un test de cinq secondes sans expliquer le K ni le lore : « quelles lettres / quel nom / quel objet voyez-vous ? ». Dix personnes apporteraient une indication utile ; ce n'est pas une preuve statistique.
5. Explorer **une seule piste complémentaire** : un petit K1 dont la haste et la jonction restent lisibles sans veine, puis un avatar à un seul anneau au maximum. Je ne recommande pas une nouvelle série de dix symboles avant ces corrections.

## 6. Questions ouvertes pour Gregory

Ces questions n'ont bloqué ni l'audit ni les corrections autorisées ; elles préparent une prochaine mission.

1. **Intégration :** quel lot veux-tu faire relire/intégrer en premier parmi simulateur, API/auth, React, héros et Kaelite ? Ma recommandation : clarifier l'authentification/contrat API avant de multiplier les écrans ; les questions de rythme restent dans le simulateur, sans bloquer le socle.
2. **Hypothèses de branches :** confirmer ce qui est provisoire avant fusion : sièges tous ouverts, niveau 10 des conseillers, huit slots, caps cumulés et bonus bêta actif par défaut. Ne pas approuver ces valeurs par simple fusion implicite.
3. **Hooks :** effectuer la revue de confiance de la nouvelle définition côté Codex, puis autoriser une mission séparée sur la source commune d'archivage pour obtenir copie locale, sélection du bon périmètre et Git explicite. La configuration actuelle ne fait plus d'archivage Codex automatique.
4. **Logo :** retenir K1 comme base de finalisation, avec comparaison d'un avatar K1 protégé du recadrage à K3 ? Mon choix reste K1 ; K3 n'est pas éliminé comme badge.
5. **Petite icône :** accepter la maison de K5, ou comparer d'abord une version optique du K1 à 16 px ? Je préfère ce test avant de figer le favicon.
6. **Documentation :** prévoir une passe de réconciliation des tableaux de paliers et des décisions récentes dans les sources Claude/GDD, puis une lecture exhaustive dédiée des historiques de DA si tu souhaites qu'ils soient tous contrôlés ligne par ligne. Ce dernier contrôle n'est pas couvert par le présent audit.

**État final attendu des changements de cette mission :** `AGENTS.md`, `.codex/hooks.json`, `.codex/post-edit.mjs`, `.codex/README.md`, ce rapport et ses six PNG. La modification préexistante `.claude/hooks/archive-transcripts.mjs` et les worktrees non suivis restent distincts. Aucun commit ni push n'a été réalisé.
