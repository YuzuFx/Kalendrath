# Plan de déploiement automatique de Kalendrath

*Rédigé le 2026-10-30. Statut : proposition, rien n'est en place. Aucun workflow n'a été créé.*
*Documents liés : [décision d'architecture](decision-architecture-cible.md), [serveurs en continu](etude-serveurs-en-continu.md), [brief du site vitrine](brief-site-vitrine.md) (sections 3 et 4), [plan marketing](plan-marketing.md) (section 5).*

**Réponse courte à la question de Gregory : oui.** Un seul dépôt peut publier automatiquement la vitrine sur Cloudflare, et le jeu (back Laravel, front React, migrations de base) sur le ou les VPS, chaque partie ne se republiant que lorsque ses fichiers changent. Une partie se met en place tout de suite, sans compte ni dépense ; le reste attend trois choses de Gregory : un compte Cloudflare, un VPS et quelques décisions listées en section 9.

**Convention de ce document.** **[vérifié]** : constaté dans le dépôt ou lu le 2026-10-30 dans la documentation officielle citée. **[supposé]** : raisonnement ou source secondaire, à confirmer au moment de la mise en œuvre.

---

## 1. État des lieux du dépôt (constaté le 2026-10-30)

| Constat | Conséquence |
|---|---|
| Le dépôt `YuzuFx/Kalendrath` est un **fork public** de `lanedirt/OGameX`. **[vérifié]** (API GitHub) | Minutes GitHub Actions gratuites sur les dépôts publics, et environnements avec approbation disponibles en offre gratuite **uniquement pour un dépôt public** **[vérifié]**. Mais tout le code du jeu est lisible par tous : décision à prendre (section 9). |
| **Aucune exécution GitHub Actions** n'a jamais eu lieu sur le fork (`total_count: 0`). **[vérifié]** | Les workflows hérités sont probablement désactivés, comme c'est l'usage sur un fork **[supposé]**. Rien ne tourne aujourd'hui, ni tests ni déploiement. |
| 11 workflows hérités de l'amont dans `.github/workflows/`. Trois déploient (`deploy-main.yml`, `deploy-release.yml`, `pr-preview.yml`) sur des **runners auto-hébergés de l'amont** (`[self-hosted, ctogx]`) et vers `*.ogamex.dev`. **[vérifié]** | À supprimer ou neutraliser **avant** d'activer Actions : sans runner, ces jobs restent en attente indéfiniment. `pr-preview.yml` utilise `pull_request_target` et construit le code de la PR sur la machine : schéma dangereux sur un dépôt public. |
| Les workflows utiles existent déjà : tests Pest en 3 shards dans Docker Compose (`run-tests-docker-compose.yml`), tests de concurrence, PHPStan, Pint, Rector. **[vérifié]** | Base réutilisable telle quelle pour la CI du back. |
| `Dockerfile` : `php:8.5-fpm` + nginx séparé, **pas encore FrankenPHP ni Octane** (aucune dépendance `laravel/octane`, `laravel/horizon`, ni Sanctum dans `composer.json`). **[vérifié]** | L'image FrankenPHP/Octane est à écrire (lot 0 de la décision d'architecture). |
| `docker/entrypoint.sh` lance au **démarrage du conteneur** : `composer install`, compilation Rust (`cargo build`), `php artisan migrate --force`, mise en cache. **[vérifié]** | Incompatible avec un déploiement par image : le démarrage est lent, une migration se joue à chaque redémarrage et sur chaque conteneur. Ces étapes passent **dans la construction de l'image** (composer, Rust, cache) et dans **une étape de déploiement dédiée** (migrations). |
| `.dockerignore` n'exclut **pas** `.env`. **[vérifié]** | Avec `COPY . /var/www/`, un `.env` local finirait dans l'image. À corriger avant de publier une image dans un registre. |
| Base : **MariaDB 11.3** dans les deux `docker-compose` (la décision d'architecture écrit « MySQL 8 »). **[vérifié]** | Rien à changer, mais à corriger dans le document d'architecture. La question MariaDB ou PostgreSQL reste une décision ouverte de la feuille de route. |
| `.env.example-prod` : `CACHE_DRIVER=file`, `SESSION_DRIVER=database`, `QUEUE_DRIVER=sync`, mot de passe base `toor`. **[vérifié]** | Gabarit de développement, pas de production. La production passe à Redis (décision d'architecture) et à des secrets réels (section 6). |
| `public/build/` (assets Blade) est **versionné**, le dossier `site/` n'existe pas, aucun front React n'existe encore. **[vérifié]** | Tout le front React et la vitrine sont à créer ; le plan ci-dessous prépare leur place. |

---

## 2. Architecture cible du monorepo

**Principe directeur : Laravel reste à la racine.** Déplacer `app/`, `database/`, `tests/` dans un sous-dossier `backend/` rendrait chaque correctif de l'amont `lanedirt/OGameX` impossible à récupérer proprement (tous les chemins changent). C'est contraire à la règle « le domaine reste proche de l'amont ». Les nouveaux composants s'ajoutent donc **à côté**, dans des dossiers à eux.

```
/                         ← application de jeu Laravel (inchangée : app/, config/, database/, routes/, tests/…)
├── app/ … tests/         ← domaine + API /api/v1 (conservés)
├── resources/views/      ← Blade legacy, jeté écran par écran ; reste pour l'administration
├── rust/                 ← moteur de combat Rust (FFI), compilé dans l'image
├── frontend/             ← NOUVEAU : SPA React + TypeScript + Vite (son propre package.json)
├── lobby/                ← NOUVEAU (à s1) : petite application Laravel du lobby (comptes, liste des serveurs)
├── site/                 ← NOUVEAU : vitrine Astro, publiée sur Cloudflare
├── deploy/               ← NOUVEAU : Dockerfile de production, Caddyfile, compose de production
│   ├── docker/             (image FrankenPHP/Octane, entrypoint par rôle)
│   ├── compose/            (pile partagée + gabarit « un serveur de jeu »)
│   └── scripts/            (deploy.sh, backup.sh, new-server.sh, rollback.sh)
├── tools/theorycrafting/ ← simulateur (déjà présent)
└── .github/workflows/    ← un workflow par composant, déclenché par chemin
```

Points de conception :

- **`frontend/` a son propre `package.json`**, séparé de celui de la racine (qui sert aux assets Blade legacy et à `laravel-vite-plugin`). Les deux cohabitent pendant la bascule ; à la fin, le `package.json` racine disparaît avec le Blade.
- **`lobby/`** : l'étude des serveurs en continu en fait une « petite application distincte ». Un second projet Laravel dans le même dépôt est le plus simple (même outillage, même image de base). **[supposé]** Alternative à trancher plus tard : un mode « lobby » de la même application. Le dossier n'est à créer qu'à l'approche de s1.
- **`deploy/`** regroupe tout ce qui ne sert qu'à la production, pour ne pas toucher les fichiers Docker de l'amont (`Dockerfile`, `docker-compose*.yml`), qui restent l'environnement de développement local.

---

## 3. Pipelines GitHub Actions, composant par composant

### 3.1 Vue d'ensemble

| Workflow | Déclenché quand ces chemins changent | Sur PR | Sur `main` | Destination |
|---|---|---|---|---|
| `site.yml` | `site/**` | build + prévisualisation par branche | publication en production | Cloudflare |
| `backend-ci.yml` | `app/**`, `config/**`, `database/**`, `routes/**`, `tests/**`, `rust/**`, `composer.*`, `deploy/docker/**` | Pint, PHPStan, Pest (3 shards), tests de concurrence | idem | — |
| `frontend-ci.yml` | `frontend/**` | typecheck, lint, tests unitaires, build | idem | — |
| `e2e.yml` | `frontend/**`, `routes/**`, `app/Http/**` | Playwright contre la pile Docker | idem | — |
| `game-image.yml` | union back + front + `deploy/docker/**` | — | construit l'image, la pousse dans le registre | GHCR |
| `deploy-game.yml` | fin réussie de `game-image.yml` sur `main`, ou déclenchement manuel | — | staging automatique, puis production **après approbation** | VPS |
| `lobby.yml` (plus tard) | `lobby/**` | tests | image + déploiement | VPS |

**Déclenchement par chemin [vérifié, doc GitHub].** `on.push.paths` et `on.pull_request.paths` ne lancent le workflow que si un fichier modifié correspond. **Piège documenté :** si un contrôle rendu *obligatoire* pour fusionner appartient à un workflow sauté par filtre de chemin, il reste « en attente » et **bloque la fusion**. Parade : un job final toujours exécuté (`ci-ok`) qui agrège les résultats, et c'est lui seul qu'on rend obligatoire. Autre point documenté : les filtres de chemin ne s'appliquent pas aux poussées de tags.

**Les modifications de `docs/`** ne déclenchent rien, sauf la régénération éventuelle de pages publiées (feuille de route) : pas d'automatisation prévue ici.

### 3.2 Vitrine `site/` → Cloudflare

**Ce qui est vérifié dans la documentation Cloudflare (2026-10-30) :**
- Pages gère les monorepos : un **répertoire racine** par projet et des **chemins surveillés** (inclusion/exclusion) pour ne reconstruire que si `site/**` change ; jusqu'à **5 projets Pages par dépôt**. **[vérifié]**
- **Prévisualisation par branche** : chaque déploiement de prévisualisation a une URL `<hash>.<projet>.pages.dev`, et chaque branche un alias stable `<branche>.<projet>.pages.dev` (ex. `fix/api` → `fix-api.<projet>.pages.dev`). Les prévisualisations sont **publiques par défaut**, protégeables par Cloudflare Access dans les réglages du projet. **Pas de prévisualisation pour les PR venant d'un fork.** **[vérifié]**
- Offre gratuite : **500 constructions par mois**, **1 construction à la fois** par compte, 20 minutes maximum par construction, 20 000 fichiers par site, 25 Mio par fichier, prévisualisations illimitées. **[vérifié]**
- Deux modes de publication : **intégration Git** (Cloudflare construit lui-même à chaque poussée) ou **téléversement direct** depuis GitHub Actions (`cloudflare/wrangler-action`, commande `pages deploy <dossier> --project-name=<nom>`, secrets `CLOUDFLARE_API_TOKEN` avec la permission *Account › Cloudflare Pages › Edit* et `CLOUDFLARE_ACCOUNT_ID`, branche courante déployée par défaut). **« Si vous choisissez le téléversement direct, vous ne pourrez pas passer à l'intégration Git plus tard. »** **[vérifié]**
- **Workers avec ressources statiques** propose aussi des URL de prévisualisation par branche, et Cloudflare publie un guide de migration de Pages vers Workers. **[vérifié]** Que Cloudflare **oriente désormais les nouveaux projets vers Workers** n'est affirmé que par des blogs tiers, pas par la page officielle consultée, qui ne parle d'aucune dépréciation de Pages. **[supposé]**

**Recommandation : téléversement direct depuis GitHub Actions** plutôt que l'intégration Git, pour trois raisons : la CI du site (build Astro, test Playwright du formulaire, vérification des liens et des hreflang) tourne au même endroit que le reste et bloque la publication si elle échoue ; les déclenchements par chemin sont décrits dans le dépôt, versionnés ; et l'intégration Git de Cloudflare demande d'installer son application GitHub sur le dépôt. Contrepartie : le choix est irréversible pour ce projet Pages (on en recréerait un).

Déroulé du workflow `site.yml` :
1. `npm ci` et `npm run build` dans `site/`.
2. Contrôles : liens cassés, hreflang réciproques, poids de la page d'accueil (cible du brief : 150 Ko hors images), test Playwright du formulaire de préinscription.
3. Sur PR ou branche : `pages deploy site/dist --branch=<branche>` → URL de prévisualisation postée en commentaire de PR.
4. Sur `main` : même commande, branche de production → `kalendrath.com`.

**Pages ou Workers ?** Pour un site statique Astro, Pages suffit et colle au brief et au plan marketing. Si les Pages Functions deviennent nécessaires (relais Brevo du formulaire), elles existent dans Pages. À revoir seulement si Cloudflare annonce officiellement un arrêt de Pages.

**Prérequis bloquant :** le domaine nu `kalendrath.com` sur Cloudflare exige la migration DNS décrite dans la section 4 du brief de la vitrine. **D'ici là, le site peut déjà être publié et prévisualisé sur `kalendrath.pages.dev`**, sans toucher au DNS ni à la messagerie OVH.

### 3.3 Back Laravel → image FrankenPHP/Octane → VPS

**Ce qui est vérifié dans la documentation officielle (Laravel 13, FrankenPHP) :**
- Image officielle `dunglas/frankenphp`, avec des variantes **PHP 8.2 à 8.5**, étiquetées `dunglas/frankenphp:<version-frankenphp>-php<version-php>-<os>` (`trixie`, `bookworm` ou `alpine`, Debian recommandé), reconstruite à chaque version et chaque jour quand une nouvelle image PHP officielle sort. Extensions via `install-php-extensions` inclus. **[vérifié]**
- La doc Laravel 13 donne ce point de départ : `FROM dunglas/frankenphp`, `install-php-extensions pcntl`, `ENTRYPOINT ["php", "artisan", "octane:frankenphp"]`, et juge les images officielles « adaptées au développement comme à la production ». **[vérifié]**
- Octane redémarre proprement chaque worker après 500 requêtes (`--max-requests`) pour limiter les fuites mémoire ; `php artisan octane:reload` recharge les workers après un déploiement ; `--watch` est réservé au développement. **[vérifié]**
- Pièges Octane documentés : ne pas injecter le conteneur, la requête ou la configuration dans le constructeur d'un singleton, ne pas accumuler de données dans des tableaux statiques. **[vérifié]** Le domaine OGameX n'a **jamais tourné sous Octane** : un audit de ces motifs dans `app/Services` est à faire avant la bascule. **[supposé, non audité]**
- Reverb : processus long, se relance par `php artisan reverb:restart` à chaque déploiement ; **plusieurs applications dans un seul Reverb** via le tableau `apps` de `config/reverb.php` (ce qui valide la piste « un seul Reverb » de l'étude des serveurs) ; au-delà d'environ 1 000 connexions simultanées, la boucle par défaut (`stream_select`) plafonne et il faut l'extension `ext-uv`. **[vérifié]**

**L'image.** Un seul `deploy/docker/Dockerfile` multi-étapes :
1. étape Node : `npm ci && npm run build` dans `frontend/` (et les assets Blade legacy tant qu'ils existent) ;
2. étape Rust : `cargo build --release` du moteur de combat → `libbattle_engine_ffi.so` ;
3. étape Composer : `composer install --no-dev --optimize-autoloader` ;
4. étape finale `dunglas/frankenphp:<version>-php8.5-bookworm` : extensions `pdo_mysql`, `redis`, `pcntl`, `ffi`, `gd`, `zip`, `exif`, `opcache`, `intl` ; copie du code, du `vendor/`, des builds front et de la bibliothèque Rust ; utilisateur non root.

**Une image, plusieurs rôles**, choisis par variable d'environnement comme le fait déjà `entrypoint.sh` : `web` (Octane), `horizon` (files Redis), `scheduler`, `reverb`. Les migrations ne font **pas** partie d'un rôle : elles se lancent par une commande dédiée du déploiement (section 4).

**Registre : GitHub Container Registry (`ghcr.io`).** Gratuit, authentifié par le jeton du workflow avec la permission `packages: write`. **[supposé ; le fonctionnement de `GITHUB_TOKEN` avec GHCR est la pratique courante, mais la page consultée ne le documente pas]**. Chaque image est étiquetée par le **SHA du commit** (immuable, sert au retour arrière) et par `staging` / `production`.

**Le déploiement (`deploy-game.yml`).** Le workflow se connecte en SSH au VPS avec une clé dédiée et lance `deploy/scripts/deploy.sh <sha>`, qui :
1. tire l'image `ghcr.io/…:<sha>` ;
2. sauvegarde la base de chaque serveur de jeu concerné (section 5) ;
3. joue les migrations dans un conteneur éphémère : `php artisan migrate --force --isolated` (l'option `--isolated` pose un verrou pour qu'une seule exécution ait lieu **[supposé, à vérifier dans la doc Laravel 13]**) ;
4. redémarre les rôles avec la nouvelle image (`docker compose up -d`), puis `reverb:restart` et `horizon:terminate` pour que les processus longs reprennent le nouveau code ;
5. vérifie un point de santé (`/up`, natif dans Laravel 11+ **[supposé]**) ; en cas d'échec, relance l'image précédente (section 7).

**Pas de runner auto-hébergé sur le VPS** tant que le dépôt est public : un runner auto-hébergé exécute le code des PR, et GitHub le déconseille pour les dépôts publics **[supposé, recommandation de la doc GitHub non relue aujourd'hui]**. Le schéma SSH depuis un runner hébergé par GitHub n'expose qu'une clé limitée à la commande de déploiement.

**Coupure pendant le déploiement.** Avec `docker compose up -d`, le conteneur web redémarre : quelques secondes d'indisponibilité. **[supposé]** C'est acceptable pour l'alpha. Pour un déploiement sans coupure plus tard, deux pistes : Kamal 2 (son proxy `kamal-proxy` démarre le nouveau conteneur, attend qu'il réponde à son contrôle de santé, puis bascule le trafic **[supposé, sources secondaires]**), ou deux conteneurs web derrière Caddy avec bascule. **Pas avant s1.**

### 3.4 Front React : qui le sert ?

Trois options :

| | **A. Dans l'image du jeu, servi par FrankenPHP** (recommandé) | B. Sur Cloudflare (Pages/Workers), API sur le VPS | C. Conteneur statique séparé |
|---|---|---|---|
| Origine | même domaine que l'API (`s1.kalendrath.com`) | `app.kalendrath.com` ≠ `s1.kalendrath.com` | même domaine via le proxy |
| Authentification Sanctum | cookie de session, simple | CORS + domaines « stateful » + cookies inter-sous-domaines, pour **chaque** serveur | simple |
| Serveur par chapitre | chaque `sN` sert son SPA, version cohérente avec son API | un seul SPA doit parler à N API, éventuellement de versions différentes | idem A |
| Déploiement | une seule image, front et back toujours synchrones | deux publications à synchroniser | deux images |
| Cache | Caddy/FrankenPHP sert les fichiers statiques ; Cloudflare en proxy les met en cache | CDN natif | idem A |

**Recommandation : A.** Le front est construit dans l'image (étape Node du Dockerfile) et servi par FrankenPHP depuis `public/app/`. Le front et l'API d'un même serveur ne peuvent jamais être désynchronisés, ce qui compte avec des serveurs ouverts à des dates différentes. Les fichiers versionnés par empreinte (`app-3f2a.js`) sont mis en cache par Cloudflare si le sous-domaine est proxifié. Le front a quand même sa CI séparée (`frontend-ci.yml`) pour un retour rapide sur les PR.

**Prévisualisation du front par branche :** possible sur Cloudflare Pages en pointant vers l'API de staging (option B limitée aux prévisualisations), à n'envisager que si le besoin se fait sentir : ça impose la configuration CORS de B.

**L'application mobile native** (objectif de Gregory) embarquera son propre build du SPA : elle ne dépend pas de ce choix.

### 3.5 Tests Pest en CI

- **Réutiliser** `run-tests-docker-compose.yml` (3 shards, `pest --parallel`) et les tests de concurrence, PHPStan, Pint, Rector : ils couvrent les 1 109 tests du domaine. **[vérifié, présents dans le dépôt]**
- Remplacer les `paths-ignore` actuels par des `paths` explicites (section 3.1) et ajouter le job agrégateur `ci-ok`.
- **Règle de fusion** (protection de la branche `main`) : `ci-ok` obligatoire. C'est la traduction de « aucune bascule d'écran n'est fusionnée si la suite échoue » (décision d'architecture, section 7).
- Ajouter, au lot 0, un **test de fumée sous Octane** : démarrer l'image de production en CI, enchaîner quelques centaines de requêtes sur les mêmes routes, vérifier l'absence de fuite d'état entre deux joueurs. C'est le filet contre les pièges Octane de la section 3.3.
- **Playwright** (`e2e.yml`) contre la pile Docker complète, sur les parcours critiques (connexion, file de construction, envoi de flotte).

---

## 4. Migrations de base sûres

Le risque spécifique de Kalendrath : **une migration se joue sur N bases** (une par serveur de jeu), et pendant le déploiement l'ancien code tourne encore quelques secondes face au nouveau schéma.

Règles :
1. **Migrations compatibles avec la version précédente (« élargir puis contracter »)** : on ajoute une colonne nullable ou avec valeur par défaut, on déploie le code qui l'utilise, et on ne supprime l'ancienne colonne que dans un déploiement **ultérieur**. Jamais de renommage ni de suppression dans le même déploiement que le code qui en dépend.
2. **Sauvegarde automatique juste avant** chaque `migrate` (section 5).
3. **Migrations hors du démarrage du conteneur** : retirer `migrate --force` de `entrypoint.sh` pour la production.
4. **Toutes les bases, en séquence, arrêt au premier échec** : `deploy.sh` boucle sur `s1`, `s2`… et le lobby ; si une migration échoue, le déploiement s'arrête, les autres serveurs restent sur l'ancienne image.
5. **CI** : la suite Pest joue déjà toutes les migrations sur une base vierge. Ajouter un job qui joue les **nouvelles** migrations sur une copie anonymisée d'une base de staging, pour attraper les migrations lentes ou bloquantes sur des données réelles. **[supposé, à concevoir]**
6. **Pas de `migrate:rollback` en production** comme stratégie de retour arrière : les `down()` sont rarement testées. Le retour arrière est « image précédente » ; si le schéma est réellement cassé, restauration de la sauvegarde.
7. Avec l'amont : une migration récupérée de `lanedirt/OGameX` suit le même circuit (staging d'abord).

---

## 5. Sauvegardes

| Quoi | Comment | Où | Fréquence |
|---|---|---|---|
| Bases MariaDB (une par serveur + lobby) | `mariadb-dump --single-transaction`, compressé, chiffré | **hors du VPS** : Cloudflare R2 (10 Go-mois gratuits, sortie gratuite, 0,015 $/Go-mois au-delà **[vérifié]**) ou un stockage objet OVH | quotidienne + avant chaque déploiement |
| Volume Redis | non sauvegardé : Redis porte le cache, les sessions et les jobs différés, qui se reconstruisent. **À réexaminer** quand la résolution planifiée (Phase 3c) sera en place : un job perdu doit être rattrapé par le filet de rattrapage. | — | — |
| Fichiers téléversés (`storage/app`) | s'il y en a, synchronisés vers le même stockage objet | hors VPS | quotidienne |
| Instantané du VPS | sauvegarde de l'hébergeur (OVH VPS : sauvegarde quotidienne des dernières 24 h incluse **[vérifié]**) | chez l'hébergeur | quotidienne |

- Rétention proposée : 7 quotidiennes, 4 hebdomadaires, 6 mensuelles. **[À DÉCIDER]**
- **Une sauvegarde non restaurée n'existe pas** : un workflow mensuel restaure la dernière sauvegarde dans une base jetable et compte les joueurs, planètes et flottes.
- La sauvegarde de l'hébergeur ne suffit pas seule : elle vit chez le même fournisseur, et 24 h de rétention ne protègent pas d'une corruption découverte tard.

---

## 6. Secrets et environnements

**Environnements GitHub** : `staging` (déploiement automatique à chaque fusion sur `main`) et `production` (même image, **approbation manuelle de Gregory** par un bouton dans GitHub). Disponible en offre gratuite **parce que le dépôt est public** ; un dépôt privé exige GitHub Pro (4 $/mois **[supposé, tarif non relu]**) pour cette fonction. **[vérifié pour la règle d'accès]**

| Secret | Où il vit | Usage |
|---|---|---|
| `CLOUDFLARE_API_TOKEN` (Pages : Edit), `CLOUDFLARE_ACCOUNT_ID` | secrets du dépôt | publication de la vitrine |
| `DEPLOY_SSH_KEY`, `DEPLOY_HOST`, `DEPLOY_KNOWN_HOSTS` | secrets d'environnement `staging` / `production` | connexion au VPS ; clé dédiée, restreinte à `deploy.sh` |
| `APP_KEY`, mots de passe MariaDB et Redis, clés Reverb, clé privée du jeton lobby, clé API Brevo, clés R2 | **sur le VPS uniquement**, dans un fichier `.env` par serveur (`/srv/kalendrath/s1/.env`, droits 600) | lus par les conteneurs au démarrage |
| Clé de chiffrement des sauvegardes | VPS + **copie hors ligne chez Gregory** | sans elle, les sauvegardes sont illisibles |

- **Aucun secret dans l'image** : corriger `.dockerignore` (ajouter `.env`, `.env.*` sauf les exemples). Sur un dépôt public, une image GHCR liée au dépôt peut être publique elle aussi **[supposé]** : raison de plus pour qu'elle ne contienne rien de sensible.
- Gabarit `.env.production.example` versionné, sans valeurs.
- Le `.env.example-prod` hérité (mot de passe `toor`, root) n'est pas utilisé en production.

**Environnement de staging** : sur le même VPS au départ, sous `staging.kalendrath.com`, base et préfixe Redis séparés, données de test (`ogamex:dev:seed-users` existe déjà). Accès restreint (Cloudflare Access ou authentification basique). Il sert aussi d'environnement de test pour les amis en Phase 5, si le NAS est abandonné.

---

## 7. Retour arrière

| Situation | Action | Durée |
|---|---|---|
| Vitrine cassée | Cloudflare garde l'historique des déploiements ; republier un déploiement précédent depuis le tableau de bord, ou annuler le commit | minutes |
| Nouveau code du jeu défectueux, schéma compatible | `deploy/scripts/rollback.sh <sha-précédent>` : relance l'image précédente, sans toucher à la base (d'où la règle « élargir puis contracter ») | ~1 minute |
| Migration destructrice ou données corrompues | mode maintenance, restauration de la sauvegarde d'avant déploiement, image précédente. **Perte des actions jouées depuis le déploiement** : à annoncer aux joueurs | dizaines de minutes |
| VPS perdu | nouveau VPS, `new-server.sh`, restauration des sauvegardes hors site, bascule DNS | heures |

`deploy.sh` garde la liste des dernières images déployées pour que le retour arrière soit une commande, pas une recherche.

---

## 8. Hébergement envisageable

### 8.1 Ce qui est déjà acté

- Vitrine : **Cloudflare Pages** (décision de Gregory du 2026-10-28).
- Jeu : **une pile par serveur sur une machine partagée** (étude des serveurs en continu, architecture A) : un MariaDB avec une base par serveur, un Redis avec préfixe, un Reverb multi-applications (confirmé possible par la doc **[vérifié]**), une image lancée une fois par serveur, un proxy par sous-domaine.
- Budget : environ 40 €/mois pour 1 000 joueurs, dont **trois VPS pour environ 15 €** (plan marketing). La feuille de route cite un OVH VPS-2 à 8,65 €/mois pour commencer.
- Phase 5 : NAS + Cloudflare Tunnel pour l'alpha entre amis.

### 8.2 Comparaison sobre (prix relevés le 2026-10-30)

| Option | Prix | Pour | Contre |
|---|---|---|---|
| **OVH VPS-1** (2 vCPU, 4 Go, 40 Go NVMe) | 3,81 € HT / 4,57 € TTC par mois **[vérifié]** | Français, même fournisseur que le domaine et la messagerie, sauvegarde quotidienne 24 h incluse, trafic illimité | 4 Go justes pour Octane + Horizon + Reverb + MariaDB + Redis, plus le staging **[supposé]** |
| **OVH VPS-2** (4 vCPU, 8 Go, 75 Go NVMe) | 7,21 € HT / 8,65 € TTC **[vérifié]** | Le candidat de la feuille de route ; marge pour s1 + lobby + staging | — |
| **OVH VPS-3** (6 vCPU, 12 Go, 100 Go) | 10,40 € HT / 12,48 € TTC **[vérifié]** | Pour plusieurs serveurs de jeu sur une machine | — |
| Hetzner Cloud (CX23, CAX11 Arm) | environ 5,49 € et 5,99 €/mois après les hausses de 2026 **[supposé, sources secondaires]** | Bon rapport prix/performance historiquement | **Deux hausses en 2026** ; plusieurs sources signalent que les offres économiques étaient par moments **non commandables** ; à vérifier sur le site au moment du choix |
| NAS de Gregory + Cloudflare Tunnel | 0 € | Prévu en Phase 5 pour l'alpha entre amis | Disponibilité domestique ; pas pour le public |
| PaaS gérés (Laravel Cloud, etc.) | nettement plus cher à notre échelle **[supposé]** | Zéro administration | Coût qui croît par serveur de jeu, contraire à la contrainte de coût |

**Lecture.** Les « trois VPS » du budget se répartissent naturellement ainsi **[supposé, à confirmer par le test de charge]** : **un VPS de production** (lobby + s1, puis s2…), **un VPS de staging** (ou staging sur la production au début, pour économiser), et **un VPS de secours ou de base de données** quand la charge le justifiera. Au départ, **un seul OVH VPS-2** peut tout porter (lobby, s1, staging) ; on le grossit avant d'en ajouter un, comme le prévoit l'étude.

**Le test de charge reste le préalable** au dimensionnement : la consommation réelle d'un serveur de jeu sous Octane est inconnue.

### 8.3 Serveur par chapitre et lobby : ce que le pipeline doit savoir faire

- **Une seule image pour tous les serveurs** : un déploiement met à jour `s1`, `s2`… et le lobby dans la même passe (même code, bases différentes). Option pour plus tard : déployer d'abord le serveur le plus récent (le moins peuplé), puis les autres.
- **`new-server.sh sN`** (provisionnement en une commande, exigé par l'étude) : crée la base, le préfixe Redis, l'application Reverb, le fichier `.env` de `sN`, l'entrée du proxy, l'enregistrement DNS `sN.kalendrath.com` (API Cloudflare), puis enregistre le serveur dans le lobby. Lancé à la main ou par un workflow `workflow_dispatch` avec approbation.
- **Reverb** : un seul processus pour tous les serveurs ; prévoir `ext-uv` dans l'image dès que l'ensemble des serveurs approche 1 000 connexions simultanées **[vérifié pour le seuil]**.
- **Proxy** : Caddy (déjà embarqué par FrankenPHP) ou Traefik, avec routage par sous-domaine ; Cloudflare en proxy devant, SSL en mode strict (brief de la vitrine, étape 7).

---

## 9. Automatisable tout de suite / exige Gregory

### 9.1 Faisable maintenant, sans compte ni dépense

1. Nettoyer `.github/workflows/` : supprimer les trois workflows de déploiement de l'amont et `pr-preview*.yml` ; garder tests, PHPStan, Pint, Rector, Dependabot.
2. Passer les workflows de CI aux filtres `paths` et ajouter le job agrégateur `ci-ok`.
3. Corriger `.dockerignore` (`.env`).
4. Écrire `deploy/docker/Dockerfile` (FrankenPHP + Octane, multi-étapes, Rust compilé au build) et le tester **en local** ; installer `laravel/octane`, `laravel/horizon`, Sanctum (lot 0 de la décision d'architecture).
5. Écrire `deploy.sh`, `rollback.sh`, `backup.sh` et le compose de production, testables localement.
6. Ajouter le test de fumée Octane et l'audit des singletons du domaine.
7. Créer `site/` (Astro) et son workflow, prêt à brancher.

Ces points ne demandent rien d'autre que du code dans le dépôt, mais **l'activation d'Actions sur le fork** (onglet Actions du dépôt) est un clic de Gregory.

### 9.2 Exige des comptes ou des décisions de Gregory

| Besoin | Qui | Bloque |
|---|---|---|
| **Activer GitHub Actions** sur le fork | Gregory (un clic) | toute la CI |
| **Dépôt public ou privé ?** Public : CI et environnements gratuits, mais tout le code du jeu (anti-triche, formules, futurs contenus) est lisible. Privé : 2 000 minutes Actions par mois en gratuit **[supposé, quota non relu]** (la suite Pest en 3 shards en consommera une bonne part), et environnements avec approbation via GitHub Pro | Gregory | stratégie de secrets, coût |
| **Compte Cloudflare** + jeton API Pages | Gregory (déjà prévu, plan marketing) | publication de la vitrine |
| **Migration DNS** vers Cloudflare (brief, section 4) | Gregory, avec la procédure du brief | `kalendrath.com` sur la vitrine ; `lobby.` et `s1.` vers le VPS |
| **Choix et souscription du VPS** (OVH VPS-2 proposé) | Gregory | tout déploiement du jeu |
| **Stockage des sauvegardes hors site** (R2 ou OVH Object Storage) | Gregory | sauvegardes |
| Lieu du staging (même VPS ou séparé) ; rétention des sauvegardes | Gregory | — |
| MariaDB ou PostgreSQL (décision ouverte de la feuille de route, « avant le premier déploiement ») | Gregory | image, sauvegardes |
| Approuver chaque mise en production (bouton GitHub) | Gregory, à chaque fois | production |

---

## 10. Ordre de mise en œuvre

| Étape | Contenu | Dépend de | Quand |
|---|---|---|---|
| **1. CI saine** | Nettoyage des workflows de l'amont, filtres par chemin, `ci-ok`, protection de `main`, activation d'Actions | clic de Gregory | **maintenant** |
| **2. Vitrine** | `site/` Astro + `site.yml` ; publication sur `kalendrath.pages.dev` avec prévisualisation par branche | compte Cloudflare | dès que le contenu du site démarre |
| **3. Image de production** | Dockerfile FrankenPHP/Octane, Redis, Horizon, test de fumée Octane, `.dockerignore` | — | lot 0 (Phase 3b) |
| **4. Front dans l'image** | `frontend/` + `frontend-ci.yml`, étape Node du Dockerfile, Playwright | étape 3 | lot 0 / pilote héros |
| **5. Domaine** | Migration DNS vers Cloudflare, `kalendrath.com` sur la vitrine | étape 2, fenêtre calme | avant l'annonce publique de la vitrine |
| **6. Staging** | VPS, `deploy.sh`, GHCR, déploiement automatique sur `staging.kalendrath.com`, sauvegardes hors site et test de restauration | VPS, étape 3 | Phase 5 (ou à la place du NAS) |
| **7. Production s1 + lobby** | Environnement `production` avec approbation, `lobby/`, sous-domaines, test de charge, dimensionnement | étapes 5 et 6 | Phase 7 |
| **8. Multi-serveur** | `new-server.sh`, déploiement sur N serveurs, déploiement sans coupure si nécessaire | s1 en production | à l'approche de s2 |

---

## Sources consultées le 2026-10-30

- Cloudflare Pages : [monorepos](https://developers.cloudflare.com/pages/configuration/monorepos/), [limites](https://developers.cloudflare.com/pages/platform/limits/), [prévisualisations](https://developers.cloudflare.com/pages/configuration/preview-deployments/), [téléversement direct depuis la CI](https://developers.cloudflare.com/pages/how-to/use-direct-upload-with-continuous-integration/), [téléversement direct](https://developers.cloudflare.com/pages/get-started/direct-upload/), [migration de Pages vers Workers](https://developers.cloudflare.com/workers/static-assets/migration-guides/migrate-from-pages/), [tarifs R2](https://developers.cloudflare.com/r2/pricing/).
- Sources secondaires sur Pages et Workers : [flaviocopes.com](https://flaviocopes.com/cloudflare-pages-vs-workers/), [mecanik.dev](https://mecanik.dev/fr/posts/cloudflare-pages-vs-workers-which-to-use-in-2026/).
- Laravel 13 : [Octane](https://laravel.com/docs/13.x/octane), [Reverb](https://laravel.com/docs/13.x/reverb). FrankenPHP : [Laravel](https://frankenphp.dev/docs/laravel/), [Docker](https://frankenphp.dev/docs/docker/).
- GitHub : [déclenchement des workflows et filtres de chemin](https://docs.github.com/en/actions/how-tos/write-workflows/choose-when-workflows-run/trigger-a-workflow), [environnements](https://docs.github.com/en/actions/how-tos/deploy/configure-and-manage-deployments/manage-environments).
- Hébergement : [OVHcloud VPS](https://www.ovhcloud.com/fr/vps/) ; hausses Hetzner 2026 : [Hetzner Docs](https://docs.hetzner.com/de/general/infrastructure-and-availability/price-adjustment/), [capitalandcompute.net](https://capitalandcompute.net/blog/hetzner-price-increase-2026/).
- Kamal 2 : [kamal-deploy.org](https://kamal-deploy.org/docs/upgrading/proxy-changes/), [Tony Messias, Laravel et Kamal 2](https://world.hey.com/tonysm/deploying-laravel-apps-with-kamal-2-0-6143d288).

*Document vivant. À mettre à jour à chaque étape franchie et à chaque décision de la section 9.*
