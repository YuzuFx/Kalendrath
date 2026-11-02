# Retours des agents — code (API, React, simulateur), sondage de rythme, genre, courbe (30/10/2026)

Archive des comptes rendus finaux de huit agents lancés le 30/10. Ces textes sont des comptes rendus de modèles, relayés tels quels : ils n'ont pas été relus par Gregory. La liste des contrôles à faire est dans [../taches-a-valider.md](../taches-a-valider.md).

**Limite de cette archive.** Les deux rapports détaillés du sondage (`analyse-sondage.md`) et de l'arbitrage (`decisions-arbitrage.md`, 10 décisions B1 à B10) étaient dans le répertoire temporaire de la session, vidé avant leur sauvegarde. Il ne reste d'eux que les résumés ci-dessous. Leur contenu détaillé (comptes question par question, options et niveaux de confiance de chaque décision) est perdu et à regénérer si besoin, à partir de l'export CSV du sondage.

**Le code reste hors de `main`.** Les trois missions de code sont dans des worktrees, non commitées, sur des branches basées sur `3e19282c` (l'historique de `main` a avancé depuis). Rien n'est fusionné.

| Mission | Worktree (dans `.claude/worktrees/`) | Branche |
|---|---|---|
| Simulateur à 10 paliers + étude de courbe | `agent-aae3713d4f9d47fac` | `worktree-agent-aae3713d4f9d47fac` |
| API JSON + Sanctum (villes) | `agent-adc2991a55fce0a8c` | `worktree-agent-adc2991a55fce0a8c` |
| Socle React + TypeScript | `agent-a2e4dcde695548b4c` | `worktree-agent-a2e4dcde695548b4c` |

Livrables documentaires copiés dans `docs/` : [../etude-courbe-hotel-de-ville.md](../etude-courbe-hotel-de-ville.md) et la section 7 de [../references-jeux-du-genre.md](../references-jeux-du-genre.md).

---

## 1. Simulateur à 10 paliers (Haiku)

Le simulateur passe à 10 paliers, mais les paliers 7 à 10 sont hors de portée avec la courbe de coût actuelle. La courbe n'a pas été modifiée, faute de donnée validée.

Fichiers modifiés (non commités) : `tools/theorycrafting/model.js`, `model.test.js`, `simulate.js`. `build-artifact.js` n'a pas été lancé : `arbre-prerequis.html` garde l'ancien modèle à 6 paliers.

- Paliers 1 à 6 : seuils d'Hôtel de ville inchangés (1, 4, 7, 10, 13, 16). Noms mis à jour : Ville franche (4), Place forte (5), Citadelle (6).
- Paliers 7 à 10 ajoutés : Cité-Obélisque (HdV 19), Cité palatine (22), Métropole (25), Cité des Sphères (28).
- Portail des Sphères déplacé du palier 6 au palier 10, comme dans le tableau du GDD.
- `--profils` et la comparaison de payeur pointent sur la Citadelle (palier 6).

Hypothèses prises pour les paliers 7 à 10 (à valider) :
- Hôtel de ville requis : niveau du palier précédent moins 1 (18, 21, 24, 27).
- Atelier des Maîtres d'œuvre : 12, 14, 16, 18. Rite d'Ancrage Tellurique : 10, 12, 14, 16.
- Coûts et durées : aucun ajout, la formule existante s'applique (Hôtel de ville à 1,9 par niveau, Maîtres à 2, Rite à 2). Fenêtres cibles des paliers 7 à 10 et du Portail vides (`cible: null`).

Résultat : avec la courbe inchangée, le palier 7 arrive vers J5 885 pour le joueur gratuit (environ 16 ans) ; les paliers 8 à 10 et le Portail sont au-delà de 16 ans, hors de l'horizon de 1 500 jours. C'est la dérive de la formule à facteur constant que la décision du 2026-10-22 (GDD 4.2) prévoit de remplacer par une table niveau par niveau.

Point à trancher : la fenêtre 540 à 730 jours, calée sur le niveau 16, était celle de l'ancienne Métropole ; elle restait sur le palier 6 (Citadelle, J683). **Décision de Gregory (30/10) : elle s'applique au palier 10.**

Tests : `node --test tools/theorycrafting/model.test.js` : 13 réussis, 0 échec.

## 2. API JSON + Sanctum (Sonnet)

### Première livraison (planètes)
14 tests Pest (54 assertions) ; pint et phpstan propres sur `app/Http` et les tests. Suite complète des 1109 tests non lancée.

Ordre de bascule (§6 de la décision d'architecture) : lot 0 (socle, « squelette API + Sanctum »), lot 1 (pilote Héros), lot 2 (Aperçu, Ressources…). L'agent a posé l'authentification par token et la lecture des planètes et ressources ; pas d'API Héros.

### Réorientation vers Kalendrath (demandée par Gregory : pas de planètes, des villes)
16 tests Pest (58 assertions), pint et phpstan propres. Suite complète non relancée depuis la réorientation.

Contrat d'authentification inchangé : `POST /api/v1/auth/token` (email, mot de passe, nom d'appareil, 10 essais par minute ; 422 identifiants faux, 403 compte banni) renvoie `{token}` ; `DELETE /api/v1/auth/token` ; `GET /api/v1/me` (`id`, `username`, `current_city_id`, mode vacances).

Adapté :
- Routes : `GET /api/v1/cities` et `GET /api/v1/cities/{cityId}` (noms `api.v1.cities.*`), 401 sans token, 403 pour la ville d'un autre joueur. `PlanetController`/`PlanetResource` deviennent `CityController`/`CityResource`.
- Coordonnées sous `location` (`region`, `reach`, `shard`, `label`) d'après le lexique Région / Contrée / Éclat ; le champ `type` (planète ou lune) est supprimé.
- Ressources : mapping dans un seul fichier, `app/Http/Resources/KalendrathResourceMap.php`. `wood` ← `metal`, `iron` ← `crystal`, `mana` ← `deuterium`, `food` vaut `null` (le domaine n'a pas de stock de Nourriture). Chaque ressource expose `amount`, `storage`, `production_per_hour`. L'énergie d'OGameX n'est plus exposée.
- Lunes : absentes de la liste ; `GET cities/{id}` renvoie 404 pour une lune du joueur.
- Domaine : seulement le trait `HasApiTokens` sur `app/Models/User.php`.
- Autres fichiers : `AuthTokenController`, `MeController`, `CreateTokenRequest`, `PlayerResource`, middleware `LoadApiPlayer` (alias `api.player`), `config/sanctum.php` (`guard` et `stateful` vides : une session web ne donne pas accès à l'API), migration `personal_access_tokens`, `bootstrap/app.php` (route `api`, JSON pour `api/*`), `composer.json`/`composer.lock` (`laravel/sanctum` 4.3.3), `routes/api.php` remplacé, tests `tests/Feature/Api/V1/ApiV1Test.php`.

Méthode de test : image `ogamex-ogamex-app` avec le worktree monté, `vendor` et `.env` copiés depuis le dépôt principal, conteneur `ogamex-ogamex-db-1` démarré. `php artisan migrate` a été exécuté sur la base de dev partagée, qui contient donc déjà `personal_access_tokens`. Sanctum n'est pas installé dans le dépôt principal : `composer install` et `migrate` à lancer après fusion.

À changer plus tard, non touché :
- La Nourriture n'existe pas dans le domaine (colonnes de stock, production, maximum, coûts des unités, carburant à deux ressources — GDD 4.1 et 5.1) ; il suffira de remplir `food` dans `KalendrathResourceMap`.
- Le domaine est en machine names OGameX (`metal_mine`, `Planet`, `PlanetService`, `field_max`).
- Pas d'Hôtel de ville ni de Donjon dans `app/GameObjects` : l'API ne peut exposer ni palier de cité, ni emplacements, ni capitale/colonie. `current_city_id` vient de `getCurrentPlanetId()` et pourrait désigner une lune.
- Erreurs de l'API en anglais, pas de fichiers `resources/lang/` pour l'API. Tokens sans expiration par défaut (`SANCTUM_TOKEN_EXPIRATION_MINUTES`). Ressources en entiers (décimales et accumulation côté client à décider avec la résolution temporelle, §5).

Écarts GDD/code à arbitrer :
1. Exposer `food: null` en attendant (fait), ou omettre la clé ; implémenter la Nourriture (effort moyen, Phase 3c ou 4).
2. Le « socle de 100 à 150 emplacements » (GDD 4.2, `field_max`) n'est pas exposé tant que la règle n'est pas actée.
3. Le GDD 5.10 contient encore des lunes dans l'exemple de téléportation ; la suppression n'est pas faite dans le domaine (`createMoonForPlanet`, `lunar_base`), seulement masquée côté API.
4. Même ligne : « chaque ville possède une Salle » pour le Portail, alors que le lexique n'a pas de bâtiment « Salle ».
5. La « ville courante » vient d'OGameX : la garder, ou une ville choisie par le client (recommandation de Claude : le client choisit, identifiant dans l'URL).

## 3. Socle React + TypeScript (Sonnet)

`npm run typecheck` (TypeScript strict : `noUncheckedIndexedAccess`, `exactOptionalPropertyTypes`, `verbatimModuleSyntax`) et `npm run build` passent ; Node 26.13. Non vérifié : le rendu navigateur (`vite dev`, `/app`), la connexion de bout en bout, Pest/PHPStan.

Arborescence : `resources/js/app/` (`main.tsx`, `router.tsx` TanStack Router en routes par code avec `basepath: '/app'` et route de layout protégée, `api/client.ts` et `api/auth.ts`, `stores/auth.ts` Zustand, `i18n/` i18next avec `locales/fr.ts` source, `en.ts` typé, clés `t()` typées ; `layouts/AppLayout.tsx`, `routes/LoginPage.tsx`, `routes/HomePage.tsx`, `components/LanguageSwitcher.tsx`, `components/ui/` button/input/label/card écrits à la main), `resources/css/app/app.css` (Tailwind 4, thème sombre provisoire), `resources/views/app.blade.php` (unique vue d'entrée), `tsconfig.json`, `components.json`, `vite.config.js`, `routes/web.php` (`/app/{any?}`), script `typecheck`.

Dépendances : react, react-dom, @tanstack/react-query, @tanstack/react-router, zustand, i18next, react-i18next, i18next-browser-languagedetector, class-variance-authority, clsx, tailwind-merge, @radix-ui/react-slot, @radix-ui/react-label ; dev : typescript, @types/*, tailwindcss, @tailwindcss/vite, @vitejs/plugin-react. Commandes : `npm run dev`, `npm run build`, `npm run typecheck` ; interface sur `/app`.

Corrigé ensuite par Claude : le client appelait `/auth/login`, `/auth/me`, `/auth/logout`, qui n'existent pas. `api/auth.ts` utilise maintenant `POST /auth/token` puis `GET /me` avec le jeton passé explicitement (option `token` ajoutée à `api/client.ts`), et `DELETE /auth/token`. Le type `User` devient `{id, username}`. Typage vérifié sans erreur ; connexion non testée de bout en bout.

Points ouverts :
- **Jeton en `localStorage`** : exposé à un script injecté ou à une extension. Conseil de Claude : cookie Sanctum HttpOnly pour le client web, jetons réservés aux extensions (avec scopes) et à l'appli mobile ; l'agent de l'API a désactivé les sessions, point à rouvrir avant de construire d'autres écrans.
- **`public/build/` est suivi par git** et modifié par le build : conseil de le sortir du suivi (vérifier d'abord qu'il ne sert pas au déploiement).
- i18n : libellés de démonstration en TypeScript, alors que le document d'architecture prévoit de réutiliser `resources/lang/` via l'API (conseil : textes d'interface dans le front, noms et descriptions du jeu depuis l'API).
- Thème sombre provisoire (en attente de la direction artistique) ; seuls button, input, label et card existent ; Reverb/Echo, Motion et Playwright non traités.

## 4. Analyse du sondage « Rythme du jeu » (Sonnet) — résumé seul

Neuf réponses : tendance seulement, aucune significativité. Rapport détaillé perdu (voir plus haut).

- Échantillon : tous expérimentés, 5/9 jouent plus de 2 h par jour, 5/9 payent (4 gratuits). Biais : recrutement communautaire, payeurs surreprésentés, aucun occasionnel ; 2 ou 3 seulement connaissent Call of Dragons, Last War ou Rise of Kingdoms.
- Q5 (palier max sans payer) : 7/9 attendent un an ou moins, 2/9 acceptent 2 ans ou plus. Le GDD vise environ 2 ans pour la Métropole : écart le plus net ; la piste « Métropole à 10-14 mois » est plus proche des réponses.
- Q4 (format) : 5 serveurs limités contre 4 serveur unique, sans pattern payeur/gratuit. Le format en continu avec fusion n'était pas testé.
- Q6 (chantiers de 45 à 60 jours) : 2 « ça me va », 4 « acceptable si autre chose d'intéressant », 2 « trop long ». En Q19, 4/9 citent des temps trop longs ou un vide en fin de cycle.
- Q14 : 6/9 préfèrent une capitale à plusieurs chantiers avec des colonies à un chantier.
- Q15 : 6/9 veulent « tout gagnable » (les 4 gratuits et 2 payeurs) — le modèle que Gregory exclut. Achat définitif 2/9, « 2e gratuit, 3e payant » 1/9. L'ouvrier est la case la moins acceptée en boutique (3/9, tous payeurs). Quatre modèles comparés : mixte GDD, 2e par progression avec 3e en location temporaire, achat définitif par serveur, tout payant. Zone grise : une 3e file achetable en Kaelite gagnée et plafonnée.
- Q16 (écart payant) : 10 % pour 3, 30 % pour 4, 50 % pour 2 ; médiane 30 %, ce qui conforte un plafond interne de 30 %, non publié, incluant files, accélérateurs et packs.
- Incohérences : R4 veut un serveur de 4-8 mois mais un palier max en 1-2 ans ; R7 et R9 choisissent l'achat définitif (Q15) sans cocher l'ouvrier (Q17) ; R5 et R6 répondent « tout gagnable » (Q15) mais cochent l'ouvrier (Q17). Un 3e ouvrier dépasse probablement 30 % à lui seul, à simuler.
- Q17 (boutique) : apparences 8, accélérateurs 6, pass 6, bouclier PVP 5, packs limités 5, ressources 4, équipement de héros 4, ouvrier 3.
- Q19 (abandon) : fin de serveur vide ou répétitivité 4/9, pay-to-win 3/9 (dont 2 payeurs), gestion du projet (bugs, communication) 2/9. Rattrapage, alliance et ligue pour nouveaux sont les moteurs de rétention (6, 5 et 4 sur 9).
- 11 décisions à arbitrer (D1 à D11), confiance de faible (D1 format, D6 files) à moyenne-haute (D5 colonies).

## 5. Étude du genre — « Kalendrath face au genre » (Sonnet)

Section 7 ajoutée à [../references-jeux-du-genre.md](../references-jeux-du-genre.md) : tableau de confrontation (7.1), files de construction par jeu (7.2), réactions au pay-to-win (7.3), 13 préconisations marquées « recommandation, pas décision » (7.4), points faibles de sourcing (7.5), 11 sources [S1] à [S11].

Préconisations principales :
1. Serveur neuf à chaque chapitre, mais seuil de population et de fusion fixé dès maintenant (cité à 2 ans et serveur tous les 4 mois : 6 serveurs coexistent ; Travian vient de réduire ses mondes).
2. Pas de ligne de rattrapage accélérée en V1 (le serveur neuf rattrape par séparation) ; coffre de départ modeste pour qui rejoint un serveur âgé ; pas de transfert entre serveurs en V1.
3. 3 jours de 2e file en fin de tutoriel (calque de Call of Dragons) ; permanente le temps du serveur contre de la Kaelite gagnée en 3 à 4 semaines, sans location de 2 jours, valable pour tous les villages du compte.
4. Pas de 3e file à vie (seul Travian en vend une : 50, 75 et 100 or, pour un round ; aucune trouvée à Last War, Rise of Kingdoms ni Call of Dragons).
5. Palier max de la capitale à 12-14 mois pour le gratuit actif, le long terme dans une couche suivante.
6. Écart payeur mesuré en interne (héros, équipement et troupes à 0 %), non communiqué (décision du 27/10).
7. Trois cadences d'events : boss PvE tous les 2 à 3 jours, score d'alliance hebdomadaire, grand boss mensuel, plus un event de chapitre ; tout event reste de la configuration relative à `t0`.
8. AvA repoussé : Mode Paix au chapitre 1, puis guerres d'alliance par fenêtres bornées à partir de J90 ; diplomatie limitée à 3 pactes. (Remplacé depuis par les décisions PvP du 30/10 : guerres dès le chapitre 1.)
9. Grades d'unités par recherche, 3 au plus, liés au chapitre, jamais vendus ; vérifier qu'un grade ne rend pas le précédent inutile (« génération » comme à Whiteout).

Points faibles du sourcing : prix de files de Rise of Kingdoms, Call of Dragons et Last War issus de guides de joueurs et de revendeurs (seul Travian est officiel, avec des pages d'aide contradictoires) ; aucun chiffre officiel de file pour Tribal Wars ni Forge of Empires (rythme d'events estimé d'après des wikis) ; rien de fiable sur le ressenti en fin de serveur, les ligues de nouveaux, le temps réel d'un joueur gratuit ; Reddit illisible ; avis pay-to-win limités à Trustpilot et une pétition ; un seul passage de recherche en mode standard. Les préconisations 4 à 13 sont des inférences.

## 6. Arbitrage croisé sondage × genre (Opus) — résumé seul

Dix décisions classées par priorité. Préalable sans arbitrage : corriger le simulateur (blocage sur les mines, à vérifier) et le passer à 10 paliers ; sans cela, B2, B3 et B4 ne sont pas chiffrables.

| # | Sujet | Recommandation de l'agent |
|---|---|---|
| B1 | Ville unique ou colonies | Capitale à plusieurs files, colonies à une file (6/9). Écarter la préconisation du genre de valider les files dans toutes les villes : avec 8 colonies, l'avantage payant serait multiplié par 8. |
| B2 | Rendre vivables les 540 à 730 jours | Une étape visible à chaque chapitre (paliers 7 à 9 vers 4-6 mois, 9-12 mois, 14-18 mois) ; très longs chantiers réservés à l'Hôtel de ville des paliers 8 à 10. La cible contredit les joueurs (7/9 : un an ou moins) et le genre (12 à 14 mois). |
| B3 | Files supplémentaires | 2e gratuite : 3 jours d'essai en fin de tutoriel, puis acquise au palier 3, ou plus tôt avec de la Kaelite gagnée. 3e : louée pour un chapitre ou incluse dans le pass premium, en Kaelite achetée uniquement, capitale seulement (variante : 3e file qui ne sert pas à l'Hôtel de ville). Exclure une 3e file débloquée gratuitement ou payable en Kaelite gagnée. Point technique : la règle « la Kaelite gagnée se dépense en premier » doit prévoir une exception pour les articles réservés au solde acheté. |
| B4 | Écart payeur et boutique | Plafond interne de 30 %, jamais publié, couvrant files, accélérateurs, packs, pass et report de Kaelite de la bêta ; équipement de héros et grades non vendus. |
| B5 | Densité des serveurs | Sans fusion, environ 6 serveurs coexistent : écrire avant s1 le seuil de fusion et une charte de fin de service ; pas de transfert en V1. |
| B6 | Cadence des events | Trois rythmes (72 h, hebdomadaire, chapitre) ; le 72 h est une hypothèse non testée. |
| B9 | Grades d'unités | Débloqués par la recherche, expérience de combat au niveau de l'armée plutôt que de chaque unité ; ils rempliraient les paliers 7 à 9. |
| B7, B8, B10 | Rattrapage, confort de gestion des villes, PvP d'alliance | Ne bloquent rien : coffre de départ en V1 ; confort = critère de l'interface React, gratuit ; PvP d'alliance par fenêtres après le chapitre 1 (supplanté par les décisions du 30/10). |

Fragilités : sondage (payeurs 5/9, aucun occasionnel, format par chapitre non proposé) ; contradiction sur les files (« tout gagnable », exclu par Gregory, arrive en tête avec 6/9, mais l'opposition nette se réduit aux 4 gratuits) ; préconisations 4 à 13 du genre = déductions. Sondage de suivi conseillé avant de verrouiller B3 et B5.

## 7. Étude de la courbe de l'Hôtel de ville (Sonnet)

Document : [../etude-courbe-hotel-de-ville.md](../etude-courbe-hotel-de-ville.md). 16 tests du simulateur passent (13 existants + 3 nouveaux). Rien de commité.

Méthode : paliers 2 à 5 inchangés (J2, J7, J18, J84) ; les options ne changent que la suite pour l'Hôtel de ville, le Rite et les Maîtres d'œuvre, calées par script sur J635 au palier 10 pour le gratuit actif (décision de Gregory : fenêtre 540-730 jours sur le palier 10). Seule modification de `model.js` : un crochet facultatif `P.courbe` dans `makeCost` et `dureeMult`, sans effet quand il est absent.

| Option (gratuit actif, jours) | P6 | P7 | P8 | P9 | P10 | Gratuit/payeur P10 | Intervalles P5→P10 |
|---|---|---|---|---|---|---|---|
| A, facteur décroissant par palier | 187 | 283 | 432 | 507 | 625 | 25 % | 103 · 96 · 148 · 75 · 118 |
| B, table plate puis rampe | 123 | 155 | 234 | 414 | 661 | 25 % | 39 · 32 · 80 · 179 · 248 |
| C, table calée sur des jalons | 156 | 274 | 408 | 553 | 635 | 25 % | 72 · 118 · 134 · 145 · 82 |

- Écart payeur : 25 % partout (11 % pour le pass payant), dû aux accélérateurs et non à la forme de la courbe.
- B : mur final (179 puis 248 jours), niveau 30 à J1 108. A : intervalles irréguliers (148 puis 75). C : intervalles réguliers (72 à 145 jours), en phase avec la décision du 22/10 d'une table niveau par niveau.
- Recommandation de l'agent : C comme base, A si une formule à quelques paramètres est préférée, B déconseillée.
- Risques : date du simulateur en escalier du coût (défaut connu du README), à lire à ± 20 jours ; ± 5 % de coût déplace le palier 10 de 70 à 90 jours ; le plus long chantier est une Scierie niveau 31 de 71 jours dans les trois options ; joueur léger non modélisé (« capitale seule » : borne de J719 à J760) ; le palier 5 reste à J84, s'il change tout se décale.
- Fichiers (dans le worktree du simulateur) : `tools/theorycrafting/courbes-hdv.js`, `etude-courbe-hdv.js`, `courbes-hdv.test.js`, `model.js`. Pour rejouer : `node tools/theorycrafting/etude-courbe-hdv.js --tables` (option `--cible N`).
