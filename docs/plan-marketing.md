# Plan marketing de Kalendrath

*Version 3 du 2026-10-27, après deux séries d'arbitrages de Gregory. Sources : [feuille de route](feuille-de-route-kalendrath.html), [lancement en solo](references-jeux/lancement-indie-et-communaute.md), [économie d'un projet solo](references-jeux/critiques/angle-economie-solo.md), [cadre légal](references-jeux/cadre-legal-ue.md), [GDD](game-design-document.md), [lore](lore.md), [étude des serveurs](etude-serveurs-en-continu.md). Les chiffres marqués **hypothèse** ne viennent d'aucune source.*

---

## 0. Décisions de Gregory, 2026-10-27

**L'objectif premier : des joueurs sur le jeu.** Le Discord, les réseaux et le site ne sont que des outils de communication. Tout ce qui facilite la vie du joueur est bon, même s'il ne passe jamais par le Discord du jeu (suivre les news depuis le Discord de son alliance, par exemple).

1. **Ton : épique**, univers de dark fantasy, **avec une pointe de légèreté discrète**.
2. **Domaine : `kalendrath.com`**, `kalendrath.fr` redirige vers lui.
3. **Pitch : version B**, celle qui installe le lore. Pas de comparaison avec OGame ou Travian dans l'accroche.
4. **Bilingue d'emblée.** Devlogs et annonces en français et en anglais ; anglais dans le jeu dès la première version publique ; Reddit en anglais ; comptes `Kalendrath` (anglais) et `Kalendrath_FR` (français) sur les réseaux ; langue choisie à l'arrivée sur Discord. Claude propose les noms anglais du lexique, Gregory les valide.
5. **Proche et professionnel.** Vouvoiement dans les textes officiels ; devlog plus intimiste, tutoiement possible en français ; pas de familiarité. Les joueurs sont au centre, et ce sont aussi des clients.
6. **Versions :** alpha `0.1` à `0.4`, bêta `0.5` à `0.9`, sortie `1.0`, puis **une version majeure par chapitre, calée sur le premier serveur** (chapitre 2 de s1 = `2.0`). Les chapitres portent un **nom**. Dans le lobby, chaque serveur affiche **son âge en jours et le nom de son chapitre en cours**.
7. **Discord : news et notes de version séparées**, dans chaque langue. Le bot **publie automatiquement** vers les serveurs abonnés.
8. **Réseaux :** tous les comptes réservés par Gregory ; **Reddit et X en priorité**, pour le suivi du développement.
9. **Patreon pendant l'alpha.** Il tient lieu de boutique tant qu'il n'y en a pas, donne de la visibilité et une image crédible. Pas de seuil d'ouverture : on l'ouvre pour que ceux que l'alpha motive puissent soutenir le projet. **Patreon et bêta n'ont rien à voir.**
10. **Préinscriptions à la bêta, avec une date annoncée** : elles servent à attirer des joueurs, pas à gagner de l'argent.
11. **Bêta à durée limitée**, avec la boutique, des bonus pour les préinscrits et les participants, et un **classement** qui crée de la compétition et met la boutique en avant de façon indirecte.
12. **Remise à zéro entre la bêta et s1.** Les participants à la bêta reçoivent un **bonus de démarrage sur s1**, et des bonus supplémentaires **selon leur classement en bêta**.
13. **Sortie officielle environ 7 jours après la fin de la bêta** (10 au plus ; 15 jours paraît trop long pour un nouveau projet). Si la bêta dure 4 mois, la sortie a lieu à 4 mois et 7 jours.
14. **Argent :** le projet doit aussi rapporter. **Aucun plafond chiffré n'est écrit** pour l'instant (30 ou 50 %, à décider). Panier visé : **15 € par mois et par joueur payant** (entre le pack de confort et le pass de saison).
16. **La communication ne parle jamais de pay-to-win, ni de plafond, ni d'écart payeur** (décision du 2026-10-27). Un chiffre serait jugé trop élevé par les uns, et dissuaderait les joueurs qui aiment dépenser, qui y liraient un jeu sans enjeu. On le joue plus finement : **une boutique attrayante**, qui accélère réellement le joueur payant, et **un contenu intéressant et exigeant pour le joueur gratuit**. Pour les events PvP, les **ligues de niveaux** répartissent les joueurs par tranche.
17. **Achats faits pendant la bêta : +30 % de Kaelite offerte sur tout achat** (proposition de Gregory du 2026-10-28, qui remplace la restitution d'un tiers en fin de bêta). La Kaelite est liée au compte : ce qui n'est pas dépensé reste après la remise à zéro (voir 8).
18. **Récompenses du classement de bêta : titres et effets cosmétiques**, mis en avant par le classement, plus de **petits bonus** ou **un pass de saison premium offert** pour les meilleurs.
19. **Les dates sont des engagements.** Les joueurs n'aiment pas les dates floues ni repoussées : on annonce une date seulement quand on peut la tenir, et on la tient.

**Ajouts du 2026-10-28 :**

20. **Un projet ouvert à sa communauté**, y compris aux extensions et outils que les joueurs écriront (avec l'IA, il y en aura) : les bonnes idées ont vocation à entrer dans le jeu. En face, des sécurités sur les fonctions automatiques, pour garder leur valeur aux options payantes, et une liste des comportements bannissables (voir 9).
21. **Publicité payante : pas avant que le jeu génère du chiffre d'affaires.** Aucun budget n'y est alloué aujourd'hui.
22. **Monnaie premium : la Kaelite**, liée au compte et non au serveur.
23. **Réseaux créés :** Discord, communauté Reddit `r/Kalendrath` (en anglais seulement, Reddit étant surtout anglophone : pas de version FR), adresse `contact@kalendrath.com`.
24. **Mode de Guerre remis en question** : PvP individuel on/off, ou PvP d'alliance contre alliance avec diplomatie et casus belli. Étude à mener ([GDD 5.4](game-design-document.md)). Le message public attend son résultat (voir 2).
15. **Coûts de fonctionnement retenus : environ 40 € par mois** pour 1 000 joueurs (Claude Code 20 €, trois VPS pour environ 15 €, domaine 2 €). Capacité visée : environ 2 500 joueurs.

---

## 1. Principes

1. **Le joueur d'abord, les canaux ensuite.** Chaque outil se juge à ce qu'il amène sur le jeu.
2. **Posséder sa liste.** La liste d'e-mails (et les préinscriptions qui s'y rattachent) est le seul canal que le projet possède vraiment.
3. **Des jalons, pas des dates, jusqu'aux préinscriptions ; ensuite, des dates tenues.** À partir des préinscriptions, chaque date annoncée est un engagement : date de la bêta, puis date de sortie, que la durée fixe de la bêta permet d'annoncer à l'avance. Une date se planifie avec sa marge avant d'être annoncée, jamais l'inverse.
4. **Le jouable débloque les communautés de joueurs.** Avant l'alpha, on parle aux communautés de développeurs et au panel connu.
5. **Pas de publicité payante tant que le jeu ne génère pas de chiffre d'affaires.** Elle se financera sur les revenus, une fois connu ce que rapporte un joueur.
6. **Transparence sur l'IA**, d'emblée et partout.
7. **Une cadence tenable des années.** Claude rédige les deux langues, Gregory valide. Chaque action récurrente doit tenir en moins d'une heure par semaine pour Gregory.

---

## 2. Positionnement et message

### Pitch retenu

> *Trois mille ans après la Rupture, les Neuf Sphères se relèvent à peine. Bâtissez votre cité, envoyez vos héros contre ce qui rôde au-delà des murs, et faites grandir un empire qu'aucun autre joueur ne viendra raser dans votre sommeil.*

La version anglaise s'adapte, elle ne se traduit pas mot à mot (skill `voix-kalendrath`, étape 4). Sous l'accroche, une ligne de genre sans nommer d'autre jeu : *« Stratégie et gestion d'empire au long cours, par navigateur, pensée d'abord pour le PvE et la coopération. »*

### Les arguments, dans l'ordre

1. **Le PvP n'est jamais injuste.** Formulation d'attente : la forme exacte (Mode de Guerre individuel, ou guerre d'alliances avec casus belli) dépend de l'étude en cours. Ce qui ne changera pas : un joueur pacifique ou sans alliance ne se fait pas écraser par plus fort que lui.
2. **Un monde neuf à chaque chapitre.** Un nouveau serveur à chaque chapitre, sur un calendrier fixe ; on peut toujours rejoindre un ami sur un serveur plus ancien.
3. **Un héros qui gouverne votre cité.** Archétypes, talents, équipement de la Forge. Un échec coûte du temps, jamais le héros.
4. **Du défi pour chacun.** Un contenu PvE exigeant, des events, et des ligues de niveaux pour que chacun affronte des joueurs de sa force.
5. **Un projet fait en public**, avec une IA, sur une base open source.

### Ce dont on ne parle pas

L'économie de la boutique : ni « pay-to-win », ni « pas de pay-to-win », ni plafond, ni écart entre payeur et joueur gratuit. La boutique se présente par ce qu'elle offre, pas par ce qu'elle s'interdit. Si la question vient d'un joueur, la réponse porte sur le jeu (« le PvP n'est jamais subi, les ligues regroupent les joueurs par niveau »), jamais sur un pourcentage.

### Ce qu'on ne promet pas

Aucune date avant les préinscriptions, et ensuite aucune date qu'on ne soit sûr de tenir ; aucune modalité de fusion irréversible ; aucune fonctionnalité marquée « plus tard ».

---

## 3. Ton et voix

**Règle générale : la gravité vient du monde, la légèreté vient des gens.** Le lore se raconte toujours sérieusement. La touche de légèreté se loge dans les coulisses, les bugs, les petits clins d'œil : une par texte au plus, jamais un emoji en guise de blague.

**Proche et professionnel.** On écoute, on répond, on dit ce qu'on a changé grâce aux retours. On ne flatte pas, on ne fait pas copain. Un joueur mécontent reçoit une réponse factuelle et courtoise.

| Situation | Registre | Adresse en français |
|---|---|---|
| Vitrine, teaser, annonce de chapitre | Épique, phrases courtes, présent | Vous |
| News et e-mails | Épique en accroche, clair ensuite | Vous |
| Notes de version | Neutre, factuel, exhaustif | Impersonnel |
| Devlog | Première personne de Gregory, sincère, chiffré, plus intimiste | Tu possible, sans familiarité |
| Réponses sur Discord et réseaux | Courtois, précis, chaleureux | Vous, sauf si la personne tutoie dans un salon de discussion |
| Modération, règles | Simple et ferme | Vous |

**Exemple de news, trois réglages :**

- *Trop sérieux :* « Le serveur Discord officiel de Kalendrath est désormais accessible. Nous vous invitons à le rejoindre. »
- **Juste :** « **Les portes s'ouvrent.** Trois mille ans après la Rupture, les premières pierres de Kalendrath se lèvent. Le Discord est ouvert : venez voir les plans de la cité, discuter des héros, et nous dire ce que vous attendez d'un jeu de stratégie qui ne vous attaque pas pendant votre sommeil. »
- *Trop léger :* « Yo les seigneurs 👑 le Discord est OUVERT, venez avant que les Vahrun piquent toutes les places 😂 »

---

## 4. Cibles et personas

| Persona | Ce qui l'attire | Ce qui le fait fuir | Message | Quand lui parler |
|---|---|---|---|---|
| **Le vétéran des jeux de stratégie par navigateur** (30 à 45 ans) | Une boucle de gestion profonde, un serveur neuf | Se faire raser la nuit, un jeu sans âme | « Bâtir sur la durée, sans la nuit blanche pour sauver son armée » | Dès la vitrine, puis à l'alpha |
| **Le joueur d'alliance** (Travian, Grepolis, Tribal Wars) | Coordination, monde neuf à intervalle régulier, classement | PvE perçu comme « solo » | « Des objectifs d'alliance, un monde neuf à chaque chapitre » | Alpha fermée, puis bêta (le classement le concerne en premier) |
| **Le joueur de 4X mobile** (Rise of Kingdoms, Call of Dragons) | Héros, événements, progression lisible | Écran austère | « Les héros et les événements que vous aimez, dans un monde qui ne vous attaque pas » | Après la bascule de l'interface |
| **Le joueur PvE et RPG** | Lore, héros, craft | PvP obligatoire, lore de façade | « Un monde qui a une histoire, et un héros qui la vit avec vous » | Dès la vitrine, via la direction artistique |
| *Secondaire :* **le curieux du développement** | L'histoire du projet, les chiffres | Marketing creux | « Un non-développeur, une IA, une base open source : ce qui marche et ce qui casse » | Dès maintenant, sur Reddit et X |

Ces cinq profils sont les rôles d'arrivée du Discord, en plus du rôle de langue.

---

## 5. Canaux

### Ce que font les jeux du genre (recherche du 2026-10-27)

| Jeu | Canaux affichés sur le site officiel |
|---|---|
| Forge of Empires, Tribal Wars (InnoGames) | Facebook, Instagram, YouTube, Discord, forum ; ni X, ni TikTok, ni Reddit |
| Travian Kingdoms | Discord officiel (environ 12 300 membres), forum |
| Xterium (jeu spatial par navigateur) | Discord, Telegram, YouTube, Facebook, Instagram |
| Old Light (jeu spatial indépendant, solo) | Bluesky, Threads, itch.io, IndieDB |
| Rise of Kingdoms | YouTube en tête, X pour son lancement au Japon, partenariats avec des créateurs |

Les jeux installés vivent sur Facebook, Instagram, YouTube et Discord, avec de la publicité. Les indépendants partent des communautés de développeurs. Sources : [Forge of Empires](https://us0.forgeofempires.com/page/), [Tribal Wars](https://www.tribalwars.net/), [Xterium](https://xterium.com/en/play/best-free-mmo-2026), [Old Light](https://oldlight.io/blog/games-like-ogame-and-travian/), [Discord de Travian Kingdoms](https://discord.com/servers/travian-kingdoms-840247756597886996), [CreatorDB](https://creatordb.app/creatorstats/riseofkingdoms/), [étude de cas X](https://marketing.twitter.com/en_apac/success-stories/rise-of-kingdoms-conquered-japanese-games-market-with-content-sponsorships), [indieviral](https://www.indieviral.com/blog/best-social-media-platforms-indie-game-developers/), [Blog du Modérateur](https://www.blogdumoderateur.com/internet-reseaux-sociaux-france-chiffres-2026/). Les sites d'OGame, de Travian et de Grepolis n'ont pas pu être lus.

### Canaux retenus

| Canal | Rôle | Langue | Ouverture |
|---|---|---|---|
| **Vitrine `kalendrath.com`** (Cloudflare Pages) | Référence, devlogs, notes de version, formulaire d'e-mail, puis préinscriptions | FR et EN (`/fr`, `/en`) | C0 |
| **Liste d'e-mails** (Brevo) | Le seul canal possédé | Selon la langue choisie | C0 |
| **Discord Kalendrath** | Communauté, panel, retours, alpha et bêta | FR et EN | C0 (créé) |
| **Reddit** (priorité) | `r/Kalendrath` (créée) pour la communauté ; posts sur les communautés de développeurs avant l'alpha, de joueurs après | EN uniquement | Premier post ailleurs dans un à deux mois, le temps que le compte soit crédible |
| **E-mail `contact@kalendrath.com`** (créée, chez OVH) | Contact public, presse, partenaires | FR et EN | C0 |
| **X `@Kalendrath`** (priorité) | Coulisses, captures, #ScreenshotSaturday, communauté #gamedev | EN | C1 |
| **X `@Kalendrath_FR`** (priorité) | Mêmes contenus adaptés, actualité francophone | FR | C1 |
| **YouTube** | Teaser, vidéos d'avancement ; une seule chaîne, titres et sous-titres traduits | FR et EN | Au teaser |
| **Patreon** | Soutien au projet, crédibilité | FR et EN | Alpha |
| **Instagram, Facebook, TikTok, Bluesky** | Comptes réservés, inactifs ; Instagram et Facebook à reconsidérer à la bêta (public des jeux installés) | — | Plus tard |

### Hébergement de la vitrine : Cloudflare Pages plutôt que l'hébergement gratuit d'OVH

L'hébergement gratuit d'OVH (offert avec le domaine : 1 site, 100 Mo, SSL, d'après les [pages d'OVHcloud](https://www.ovhcloud.com/fr/web-hosting/)) suffirait en taille, à condition de compresser les images (en WebP, une illustration pèse 100 à 300 Ko). Deux raisons de rester sur Cloudflare Pages :

1. **La publication automatique.** Le devlog, les news et les notes de version partent du dépôt GitHub (section 6) : Cloudflare Pages republie le site à chaque fusion sur `main`, sans rien faire. Chez OVH, il faudrait envoyer les fichiers par FTP depuis la GitHub Action, avec des identifiants à gérer et rien de prévu pour.
2. **L'archive grossit.** Deux langues, un devlog toutes les deux semaines avec ses images : les 100 Mo seront atteints en un à deux ans. Cloudflare Pages n'a pas de plafond de stockage qui nous concerne.

**Décision de Gregory du 2026-10-28 : la solution la plus stable.** C'est Cloudflare Pages, pour une troisième raison qui compte plus que les deux autres :

3. **La vitrine ne dépend pas des serveurs de jeu.** Elle est servie depuis le réseau mondial de Cloudflare, pas depuis nos VPS. Si un VPS tombe, si une mise à jour tourne mal ou si le jeu est attaqué, la vitrine reste en ligne et peut annoncer l'incident. C'est précisément le moment où les joueurs viennent la consulter.

**Le parcours du joueur.** Les boutons « Connexion » et « Inscription » de la vitrine sont de simples liens vers le **lobby** (`lobby.kalendrath.com`), qui tourne sur le VPS avec les serveurs de jeu ([étude des serveurs](etude-serveurs-en-continu.md)). La vitrine ne gère aucun compte : le formulaire d'inscription, la connexion et le portefeuille de Kaelite sont dans le lobby. Le chemin est donc `kalendrath.com` (Cloudflare) → `lobby.kalendrath.com` (VPS) → `s1.kalendrath.com` (VPS).

**Le DNS passe chez Cloudflare** (correction du 2026-10-28) : pour servir le domaine nu `kalendrath.com` depuis Cloudflare Pages, Cloudflare doit gérer le DNS du domaine. On change donc les serveurs de noms chez OVH pour ceux de Cloudflare (gratuit). Le domaine reste **enregistré** chez OVH, et la boîte `contact@` reste chez OVH : on recopie ses entrées de messagerie (MX, SPF, DKIM) dans Cloudflare avant la bascule, sans quoi le courrier s'arrête. Bénéfices au passage : un DNS rapide et protégé contre les attaques, et la possibilité, plus tard, de placer le lobby et les serveurs derrière la protection de Cloudflare. L'hébergement gratuit d'OVH peut servir plus tard à autre chose (une page de statut, par exemple).

### Steam

**Pas maintenant ; à reconsidérer après l'ouverture de s1.**

- **Ce que Steam apporte :** de la découverte (recherche, recommandations, liste de souhaits), des avis, des événements comme le Steam Next Fest.
- **Ce qu'il impose :** un client à installer (le jeu doit embarquer l'API Steamworks, donc une enveloppe de bureau autour du jeu navigateur) ; et **tout achat en jeu fait depuis la version Steam passe par le portefeuille Steam** ([documentation Steamworks](https://partner.steamgames.com/doc/features/microtransactions)), avec la commission de Valve (30 % au départ, de mémoire, à vérifier). La Kaelite étant liée au compte, le lobby devrait créditer les achats Steam comme les autres : faisable, mais c'est un chantier.
- **Le risque :** sur Steam, un jeu est jugé sur ses avis dès le premier jour. Un jeu de gestion par navigateur dans une enveloppe, sans version finie, s'expose à des avis négatifs difficiles à rattraper.
- **Quand y revenir :** une fois s1 stable et les revenus connus. On peut alors ouvrir une page Steam (liste de souhaits) quelques mois avant un chapitre, avec un client de bureau léger. Cela rejoint la décision sur l'application mobile (PWA ou enveloppe native) : la même enveloppe peut servir aux deux.

### Règles des communautés

Détail dans le [tableau de l'étude de lancement](references-jeux/lancement-indie-et-communaute.md#6-où-trouver-des-joueurs-du-genre). Partout : un compte vivant avant de poster, la promotion très en dessous d'un quart de l'activité, au plus un post par subreddit et par mois, aucune discussion d'un retrait, règle sur l'IA générative lue avant le premier post.

---

## 6. Discord : langues, news et notes de version

### La langue à l'arrivée

L'écran d'accueil (Onboarding) pose deux questions : la **langue** (Français, English, ou les deux), qui ouvre une catégorie de salons, puis le **profil**.

| Catégorie | Salons |
|---|---|
| **Commun** | `#bienvenue-welcome` (pitch et règles dans les deux langues), `#direction-artistique` |
| **Français** | `#news`, `#notes-de-version`, `#devlog`, `#discussion`, `#idées-et-retours` (forum), `#sondages` |
| **English** | `#news`, `#release-notes`, `#devlog`, `#general`, `#feedback` (forum), `#polls` |
| **Plus tard** | `#alpha`, `#beta` et `#classement-bêta` / `#beta-leaderboard`, par langue |

On double ce qui est écrit, on partage ce qui est visuel. La catégorie anglaise s'ouvre avec le premier post Reddit, pour qu'aucune des deux communautés n'ait l'air vide.

### Deux flux, deux publics

| | `#news` | `#notes-de-version` / `#release-notes` |
|---|---|---|
| **Pour qui** | Tout le monde | Le joueur engagé, le testeur, celui qui optimise |
| **Contenu** | Un événement : jalon, chapitre, devlog, préinscriptions, sondage | Une mise à jour : toutes les modifications |
| **Forme** | Titre, un visuel, trois à cinq lignes, un lien | Numéro de version, sections fixes, une ligne par modification |
| **Ton** | Épique, soigné | Neutre, factuel, exhaustif |
| **Repris sur** | Vitrine, e-mail, X | Vitrine ; résumé dans la news correspondante |

Les deux sont des **salons d'annonces** : un autre serveur Discord peut les suivre et recevoir chaque message chez lui. Le bot les **publie automatiquement** vers ces abonnés.

### Format des notes de version

```
Alpha 0.3.0

Nouveautés
- Écran Héros : attribution des points de talent depuis l'arbre.

Équilibrage
- Puits de mana, coût du niveau 1 : 60 → 75 Bois.   ← toujours ancienne → nouvelle valeur

Interface
- …

Corrections
- Les Caravanes ne repartent plus à vide après un pillage réussi.

Problèmes connus
- …
```

### Versions et chapitres

| Version | Période |
|---|---|
| `0.1` à `0.4` | Alpha |
| `0.5` à `0.9` | Bêta |
| `1.0` | Sortie officielle, ouverture de s1, chapitre 1 |
| `2.0`, `3.0`… | Chapitre suivant **sur s1** |
| `1.1`, `1.1.1`… | Mises à jour et correctifs dans un chapitre |

Le lobby affiche pour chaque serveur : `s2 · 47 jours · [nom du chapitre]`. Les noms de chapitres sont à créer ; ils servent aussi de titres aux annonces. Quand un serveur plus jeune atteint un chapitre déjà sorti sur s1, c'est une news, pas une note de version.

### Publication

1. Sources dans le dépôt : `content/news/{fr,en}/AAAA-MM-JJ-titre.md` et `content/notes-de-version/{fr,en}/X.Y.Z.md`.
2. Claude rédige les deux langues, Gregory valide en fusionnant sur `main`.
3. Une GitHub Action publie la page sur la vitrine, poste dans le bon salon de chaque langue par webhook, et le bot publie le message vers les serveurs abonnés.
4. Un texte trop long pour Discord devient un résumé avec un lien vers la page complète.

---

## 7. Feuille de route marketing

L'ordre décidé par Gregory, avec ce que fait la communication à chaque étape.

| # | Étape | Version | Communication | Ce qu'on annonce |
|---|---|---|---|---|
| 1 | **Communication sur le projet** | — | Vitrine, Discord, devlog toutes les deux semaines, feuille de route publique, avancement, **sondages participatifs** (rythme, format, noms…), premiers posts Reddit et X | Des jalons, jamais de dates |
| 2 | **Lancement de l'alpha fermée** | `0.1` à `0.4` | Vagues de testeurs depuis la liste, en priorité les profils et la langue qui manquent. Ouverture des salons de notes de version. Formulaire de fin de vague | « L'alpha est ouverte », sans date de fin |
| 3 | **Ouverture du Patreon** | pendant l'alpha | News et e-mail : « Si ce que vous voyez vous donne envie de soutenir le développement ». Afficher ce que l'argent finance | Ce que les soutiens reçoivent |
| 4 | **Ouverture des préinscriptions à la bêta, avec date** | fin d'alpha | Campagne sur toutes les communautés qui acceptent du jouable (r/playmygame, r/IndieGaming, Discord « Serveur Privé »), e-mail à toute la liste, kit de presse, teaser. Bonus des préinscrits annoncés | **La date de la bêta et sa durée** |
| 5 | **Lancement de la bêta** | `0.5` à `0.9` | Classement public, boutique, notes de version régulières, témoignages, temps forts du classement relayés sur X | **La date de la sortie officielle** (fin de bêta + 7 jours), dès le premier jour de la bêta |
| 6 | **Fin de bêta et pause** | — | Résultats du classement, remise des bonus, compte à rebours de 7 jours | Bonus de démarrage, liste des récompenses par rang |
| 7 | **Sortie officielle, ouverture de s1** | `1.0` | Campagne sur les communautés du genre, invitation d'un ami, calendrier public des chapitres | Le calendrier des chapitres et des serveurs |
| 8 | **Chaque chapitre** | `2.0`, `3.0`… | Annonce du chapitre (par son nom) sur s1 et du nouveau serveur, devlog du contenu | La date d'ouverture du serveur suivant |

**La pause de 7 jours.** Elle n'est tenable que si les gros changements sont faits avant la fin de la bêta. **Recommandation :** geler le contenu de la `1.0` deux à trois semaines avant la fin de la bêta, pour que la pause ne serve qu'à la remise à zéro, au versement des bonus et aux derniers correctifs. Annoncer 7 jours et prévoir en interne une marge jusqu'à 10 : mieux vaut ne pas avoir à repousser une date annoncée.

### Cadence récurrente

| Rythme | Action | Canaux |
|---|---|---|
| Toutes les deux semaines | Devlog FR et EN, et la news qui l'annonce | Vitrine, `#devlog`, `#news`, X |
| Chaque samedi, si une capture le mérite | #ScreenshotSaturday | X |
| Une fois par mois | Un post adapté pour un seul subreddit, en alternant | Reddit |
| Une fois par mois au plus | Lettre récapitulative | E-mail, Patreon |
| À chaque mise à jour, dès l'alpha | Notes de version | Discord, vitrine |
| Dès qu'une pause dépasse trois semaines | Message de pause, avec le prochain jalon | `#news`, e-mail, X |

---

## 8. Patreon, bêta et classement

### Patreon (pendant l'alpha)

- **Rôle :** soutien au développement, visibilité, crédibilité. Il tient lieu de boutique tant qu'il n'y en a pas.
- **Frais :** 10 % pour les créateurs inscrits depuis août 2025, plus environ 3 % et 0,30 $ par paiement ([Unilink](https://www.unilink.us/blog/patreon-fees-explained-2026), [Gemlist](https://www.gemlist.io/blog/how-much-does-patreon-take)). La TVA des soutiens européens est collectée par Patreon ; le régime exact est à confirmer avec un comptable.
- **Contreparties à définir.** Recommandation : avantages hors jeu (rôle Discord, nom dans les crédits, devlog en avant-première, vote sur un élément de lore ou un nom de chapitre) et, si l'on en donne en jeu, des cosmétiques non échangeables. Les règles de Patreon sur les récompenses en jeu sont à lire avant l'ouverture.
- **Préalables :** auto-entreprise immatriculée, compte bancaire dédié.

### Bêta (durée limitée, avec la boutique)

- **Bonus des préinscrits** et **bonus des participants**, annoncés à l'ouverture des préinscriptions.
- **Classement** public, qui crée la compétition.
- **Remise à zéro avant s1** ; bonus de démarrage sur s1 pour les participants, et bonus supplémentaires selon le classement.

### Kaelite liée au compte

Décision de Gregory du 2026-10-28 : la Kaelite appartient au **compte**, pas au serveur.

- **Pour le joueur :** un seul solde, valable sur tous les serveurs où il joue. Les packs de gros volume deviennent intéressants pour qui joue sur plusieurs serveurs, et rien n'est perdu quand un serveur ferme ou fusionne.
- **Techniquement :** le portefeuille vit dans le **lobby**, qui tient déjà les comptes ([étude des serveurs](etude-serveurs-en-continu.md)). Chaque serveur demande au lobby de débiter le solde par un appel signé, et chaque débit porte un identifiant unique pour qu'un double clic ou une coupure réseau ne débite jamais deux fois. C'est un peu plus de travail qu'un solde par serveur, mais une seule fois, et c'est la base dont la bêta a besoin.
- **Deux soldes (décision de Gregory du 2026-10-28) :** la Kaelite **achetée** appartient au compte (tous serveurs) ; la Kaelite **gagnée** en jeu (events, récompenses) reste sur le **serveur** où elle a été gagnée. Sinon, un joueur pourrait la farmer sur un vieux serveur facile, ou avec des comptes secondaires, pour alimenter un seul serveur. Le joueur voit une seule somme, avec le détail au survol, et la Kaelite gagnée se dépense en premier. Techniquement, le solde acheté vit dans le lobby et le solde gagné dans la base du serveur.

### Règles décidées le 2026-10-27 et le 2026-10-28

1. **Achats faits pendant la bêta : +30 % de Kaelite offerte sur tout achat** (proposition de Gregory du 2026-10-28, recommandée ; elle remplace la restitution d'un tiers en fin de bêta). Comparaison :

   | | +30 % à l'achat | Un tiers restitué en fin de bêta |
   |---|---|---|
   | **Technique** | Un multiplicateur au moment de créditer l'achat. Rien à calculer à la fin | Tenir le compte de ce que chacun a dépensé, calculer et créditer à la remise à zéro, gérer les réclamations |
   | **Ressenti du joueur** | Gain immédiat et visible (« +30 % pendant la bêta ») : c'est un argument de vente, et une raison d'acheter **pendant** la bêta | Récompense différée, et vécue comme une perte (« on me reprend les deux tiers ») |
   | **Communication** | Une bannière sur la boutique | Une règle à expliquer, puis un message de fin de bêta |

   Ce qui le rend possible : **la Kaelite est liée au compte**. La remise à zéro efface la progression sur le serveur de bêta, pas le solde du compte : la Kaelite non dépensée passe sur s1. La règle s'écrit sur la boutique et dans les conditions de vente avant la première vente : « Votre progression de bêta sera remise à zéro à la sortie ; votre Kaelite non dépensée est conservée sur votre compte. »

   **Effet à surveiller :** un joueur peut acheter beaucoup pendant la bêta, bonus compris, et ne rien dépenser, pour arriver sur s1 avec un gros stock. C'est du chiffre d'affaires encaissé d'avance, mais aussi une avance au démarrage de s1. Si le simulateur montre que c'est trop, on plafonne le report (par exemple, le bonus de 30 % seulement sur la Kaelite dépensée en bêta).
2. **Récompenses du classement : titres et effets cosmétiques**, que le classement met en avant, plus de petits bonus ou un pass de saison premium offert aux meilleurs. Le bonus de démarrage des participants reste modeste, à passer au simulateur avant d'annoncer.
3. **Les comptes multiples.** Un bonus par participant pousse à créer plusieurs comptes de bêta. Les bonus sont liés à un compte vérifié (e-mail, activité minimale), cf. [triche, multicomptes et bots](references-jeux/triche-multicomptes-bots.md).

---

## 9. Communauté, extensions et règles du jeu

**Principe (Gregory, 2026-10-28) :** avec l'IA, des joueurs écriront des extensions et des outils pour améliorer le jeu ou se simplifier la vie. Le projet y est ouvert, et intègre au jeu les fonctions pertinentes. En face, des sécurités sur les fonctions automatiques, pour que les options payantes gardent leur valeur, et des règles claires sur ce qui est bannissable.

### S'ouvrir aux outils des joueurs

- **Une seule porte d'entrée : l'API du jeu.** La nouvelle interface React passe déjà par une API JSON (`/api/v1`). Un outil de joueur peut s'appuyer sur la même API, avec une **clé d'extension** que le joueur crée lui-même, distincte de sa session, et limitée à la lecture au départ.
- **Un lieu pour ces outils :** un salon Discord (`#outils-et-extensions` / `#tools-and-addons`) et une page de la vitrine qui recense les outils autorisés.
- **Intégrer les bonnes idées :** quand un outil devient indispensable (simulateur de combat, calculateur de production, rappel de fin de chantier), on l'intègre au jeu, en créditant son auteur (titre ou cosmétique, mention dans les notes de version). C'est le meilleur moyen de dire à la communauté qu'on l'écoute.

### Ce qui est autorisé, encadré, interdit (premier jet)

| | Exemples | Règle |
|---|---|---|
| **Autorisé** | Affichage, calculs, simulateurs, statistiques, cartes, rappels, outils d'alliance hors jeu | Libre, tant que l'outil lit sans agir |
| **Encadré** | Outils qui lisent l'API en continu (tableaux de bord d'alliance) | Clé d'extension, limite de débit par compte |
| **Interdit** | Toute action de jeu déclenchée sans clic humain : relancer une file, envoyer une armée, farmer des cibles, répondre à une attaque | Bannissable ; et surtout **empêché côté serveur** quand c'est possible |

### Protéger les options payantes

- **Les règles payantes vivent sur le serveur, pas dans l'interface.** Une deuxième file de construction, une automatisation vendue en boutique : c'est le serveur qui les accorde. Un outil de joueur peut afficher, il ne peut pas créer une file que le serveur refuse.
- **Les actions passent par la session du joueur, jamais par la clé d'extension.** Une clé d'extension ne peut pas construire, recruter ni envoyer d'armée.
- **Détection du rythme non humain :** des actions trop régulières ou trop rapides sur une session déclenchent un contrôle (vérification, puis enquête). À cadrer avec la fiche [triche, multicomptes et bots](references-jeux/triche-multicomptes-bots.md).
- Ce chantier touche l'API (clés et droits de Sanctum) : à prévoir dès le squelette d'API de la Phase 3b, sans rouvrir les choix d'architecture.

### Verrouiller l'API ouverte (Gregory, 2026-10-28)

Gregory valide l'ouverture aux extensions, sur le modèle des add-ons de certains MMORPG : elle crée de l'attachement et donne du contrôle sur ce que font les outils. La condition : **ce qui n'est pas ouvert est verrouillé dans le code**, pas seulement interdit par les règles.

- **Fermé par défaut.** Une clé d'extension n'accède qu'aux routes inscrites sur une liste blanche, avec des droits (*scopes*) explicites. Toute nouvelle route de l'API est fermée aux extensions tant qu'on ne l'a pas ouverte volontairement.
- **Séparation physique.** Les routes ouvertes aux extensions forment un groupe à part, testé à part : des tests Pest vérifient qu'une clé d'extension reçoit un refus sur chaque route d'action (construire, recruter, envoyer, acheter).
- **Limites de débit** par clé et par compte, journal des appels, révocation d'une clé en un clic par le joueur ou par l'équipe.
- **Audit de sécurité avant l'ouverture**, par des personnes compétentes (Gregory : « un soin particulier avec des gens qui vont verrouiller et sécuriser tout ça »). L'API d'extension ne s'ouvre qu'après cet audit, pas avant l'alpha.

### Le pack d'extensions de l'abonnement de confort (Gregory, 2026-10-28)

Une partie des petites extensions de confort fera partie d'un **pack inclus dans l'abonnement de confort, à 5 ou 10 € par mois** (prix à trancher). Deux points à garder en tête :

- **Du confort, jamais de la puissance** : affichage, rappels, raccourcis, tableaux de bord. Ce que le pack fait doit rester faisable à la main par le joueur gratuit.
- **La concurrence des extensions gratuites.** Un joueur pourra écrire, pour la communauté, une extension qui fait la même chose qu'une extension du pack, tant qu'elle se contente de lire. On ne peut pas l'empêcher sans fermer la lecture, ce qui contredirait l'ouverture. Donc la valeur du pack doit tenir à ce qu'une extension tierce ne peut pas faire : l'intégration dans l'interface, les fonctions que seul le serveur accorde, la fiabilité. À cadrer quand on définira le contenu du pack.

### Comportements bannissables (premier jet, à valider)

1. Scripts ou bots qui agissent à la place du joueur.
2. Multicomptes au-delà de ce que permettent les règles (un compte par serveur), et transferts entre comptes d'un même joueur (*pushing*).
3. Partage, vente ou achat de compte.
4. Commerce en argent réel de ressources, d'objets ou de Kaelite en dehors de la boutique.
5. Exploitation volontaire d'un bug sans le signaler.
6. Contournement d'une protection (bouclier, ligue, règle de guerre).
7. Harcèlement, propos haineux, usurpation de l'équipe de Kalendrath.

**Sanctions graduées :** avertissement, suspension temporaire, bannissement, avec une voie d'appel. Les règles se publient dans les conditions d'utilisation (Phase 7) et sur la vitrine, en français et en anglais, **avant** l'alpha fermée.

## 10. Budget et rentabilité

### Coûts de fonctionnement (décision de Gregory)

| Poste | Coût mensuel |
|---|---|
| Claude Code | 20 € |
| Trois VPS | environ 15 € |
| Nom de domaine | 2 € |
| **Total** | **environ 40 €** pour 1 000 joueurs, capacité visée 2 500 |

**Postes à ajouter le moment venu**, tous petits : sauvegarde hors site, e-mails transactionnels au-delà de l'offre gratuite de Brevo, frais de paiement de la boutique (un pourcentage, pas un coût fixe). Midjourney tant que la production d'images continue. Aucun ne change l'ordre de grandeur.

### Ce que rapporte une base de 1 000 joueurs (**hypothèse**)

Avec 2 à 3 % de joueurs payants dans le mois (taux du genre selon l'[étude économique](references-jeux/critiques/angle-economie-solo.md)) et un panier de 15 € : **300 à 450 € par mois** pour 1 000 joueurs, avant frais de paiement et cotisations. Les frais sont couverts largement dès quelques centaines de joueurs actifs. Le vrai sujet n'est donc pas le seuil de rentabilité, c'est la **taille de la base de joueurs**, d'où l'objectif premier.

Le Patreon de l'alpha n'est pas chiffré : impossible à prévoir, et ce n'est pas son rôle.

### Dépenses marketing

- **Avant la bêta : moins de 200 €** au total (test d'IA vidéo pour le teaser ; tout le reste est gratuit).
- **À partir de la bêta :** la bêta donne le revenu réel par joueur. Avec lui, on saura ce que peut coûter un joueur acquis (publicité, partenariat avec un créateur du genre) sans perte. On décide alors.

---

## 11. Indicateurs

Pas de seuils de déclenchement : les étapes suivent l'ordre de la section 7. On suit en revanche ces chiffres, pour savoir ce qui marche :

| Indicateur | Outil |
|---|---|
| Inscrits par e-mail, par langue, et taux d'ouverture | Brevo |
| Taux de conversion de la vitrine | Cloudflare Web Analytics (sans cookie) et Brevo |
| Membres du Discord par langue et par profil, actifs par semaine | Statistiques du serveur |
| Origine des inscrits | Paramètre `?src=` sur chaque lien publié |
| Cadence de devlog tenue | Devlogs publiés et prévus |
| Rétention de l'alpha et de la bêta (J1, J7, J14) | Base de jeu |
| Préinscrits, participants à la bêta, puis joueurs de s1 | Brevo, base de jeu |
| Soutiens Patreon, puis revenu par joueur en bêta | Patreon, boutique |

---

## 12. Risques

| Risque | Parade |
|---|---|
| Rejet de l'IA générative | Transparence d'emblée ; règles lues avant chaque post |
| Épuisement, aggravé par le bilinguisme | Claude rédige les deux langues ; actions récurrentes de moins d'une heure par semaine |
| Communauté anglaise trop petite | Catégorie anglaise ouverte avec le premier post Reddit ; salons visuels communs |
| Colère après la remise à zéro des achats de bêta | Bonus de +30 % et conservation de la Kaelite non dépensée, écrits avant la première vente (voir 8) |
| Date annoncée puis repoussée | Une date ne s'annonce qu'avec sa marge ; gel du contenu avant la fin de bêta, marge interne de 3 jours sur la sortie |
| Dépendance au Discord | La liste d'e-mails reste le canal principal |

---

## 13. Ce que les décisions du jour changent ailleurs

- **CLAUDE.md :** l'anglais doit être disponible dans le jeu dès la première version publique (mis à jour).
- **GDD, question 8 :** plus de plafond chiffré écrit pour l'instant, et rien de tel dans la communication (mis à jour).
- **Monnaie virtuelle :** son nom est à fixer, et à intégrer aux mockups.
- **Noms anglais** du lexique, des chapitres et des lieux : proposition de Claude à venir, validation de Gregory.
- **Feuille de route :** la phase « financement participatif » disparaît, remplacée par Patreon pendant l'alpha ; une bêta à durée limitée et une pause de 7 jours s'insèrent avant s1.

## 14. À faire par Gregory

- Créer les comptes : X `@Kalendrath` et `@Kalendrath_FR`, Reddit, YouTube, Patreon, et par précaution Instagram, Facebook, TikTok, Bluesky.
- Commencer à commenter sur Reddit, en anglais, dans r/StrategyGames, r/IndieDev et r/gamedev, sans parler de Kalendrath.
- Choisir une seconde personne de confiance pour la modération du Discord, à l'aise en anglais si possible.
- Pour l'étape 2 : application et bot dans le Developer Portal, intent « Server Members », invitation avec les droits Administrateur, jeton gardé hors du dépôt.
- Créer les comptes Cloudflare et Brevo, configurer la redirection de `kalendrath.fr`.
- Lancer la démarche d'auto-entreprise (préalable au Patreon).

## 15. Suite

1. Mettre à jour la feuille de route (artefact et source) avec l'ordre de la section 7.
2. Proposer les noms anglais du lexique.
3. Étape 2 : spécification du Discord bilingue.
