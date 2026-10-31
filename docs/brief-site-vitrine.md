# Brief du site vitrine de Kalendrath

*Version 1 du 2026-10-30, mise à jour le même jour avec les décisions de Gregory (voir section 5). Le reste est un brouillon de travail. Sources : [plan marketing](plan-marketing.md), [lore](lore.md), [feuille de route Kalendrath](feuille-de-route-kalendrath.html), [GDD](game-design-document.md), [cadre légal UE](references-jeux/cadre-legal-ue.md), lexique du projet (noms anglais : the Sundering, the Nine Spheres, the Abyss).*

**Avertissement sur la section 4 (DNS).** Ce brief a été rédigé à partir des documents du dépôt. **Les réglages réels du domaine `kalendrath.com` chez OVH n'ont pas été consultés** : aucun enregistrement DNS, aucune boîte mail n'a été vérifié. Tout ce qui concerne l'état actuel du domaine est une procédure à exécuter et à constater, pas un constat.

**Règle de contenu.** Les textes ci-dessous ne s'appuient que sur ce que le GDD, le lore et le plan marketing confirment. Aucune date, aucun prix, aucun plafond d'économie de boutique, aucune forme de PvP arrêtée, aucune fonctionnalité marquée « plus tard ». Les points à décider sont signalés **[À DÉCIDER]**. Les noms anglais non listés dans le lexique sont signalés **[nom EN à valider]**.

---

## 1. Structure et parcours

### 1.1 Principe

Un site statique, deux langues, quelques pages. Son rôle : faire comprendre l'univers en trente secondes, recueillir une adresse e-mail, puis renvoyer vers le Discord et, le moment venu, vers le lobby. Le site ne gère aucun compte (décision du plan marketing, section 5).

### 1.2 Plan du site

| Page | URL FR | URL EN | Ouverture | Rôle |
|---|---|---|---|---|
| Accueil | `/fr/` | `/en/` | C0 | Pitch, visuel, formulaire d'e-mail, jalons en trois lignes |
| Univers | `/fr/univers/` | `/en/world/` | C0 | Lore condensé : Straumar, Rupture, Vahrun, peuple jouable |
| Le jeu | `/fr/le-jeu/` | `/en/the-game/` | C0 | Les cinq arguments, sans promesse non confirmée |
| Feuille de route | `/fr/feuille-de-route/` | `/en/roadmap/` | C0 | Trois colonnes : fait, en cours, plus tard. Jalons sans date |
| Galerie | `/fr/galerie/` | `/en/gallery/` | C0 | Planche de style, bâtiments en paliers, mention Midjourney |
| News et devlog | `/fr/news/` | `/en/news/` | C0 | Archive, un fichier Markdown par article, flux RSS par langue |
| Rejoindre la communauté | `/fr/communaute/` | `/en/community/` | C0 | Discord, Reddit, X, liens |
| Préinscription bêta | `/fr/preinscription/` | `/en/pre-register/` | **Masquée jusqu'à l'annonce de la date de la bêta** | Même formulaire que l'accueil, avec bonus annoncés |
| Soutenir le projet | `/fr/soutenir/` | `/en/support/` | Alpha (ouverture du Patreon) | Patreon, transparence sur le financement |
| Contact | `/fr/contact/` | `/en/contact/` | C0 | `contact@kalendrath.com`, presse |
| Mentions légales | `/fr/mentions-legales/` | `/en/legal-notice/` | C0 | Obligation légale (voir 3.4) |
| Confidentialité | `/fr/confidentialite/` | `/en/privacy/` | C0 | RGPD, formulaire, mesure d'audience |
| Conditions d'utilisation | `/fr/cgu/` | `/en/terms/` | Avant l'alpha | Règles de conduite, sanctions graduées |
| Page 404 | `/404.html` | idem | C0 | Bilingue, une ligne de légèreté |

Racine `/` : redirection vers la langue du navigateur (`Accept-Language`), avec repli sur `/en/`, **et** un sélecteur de langue visible dans l'en-tête. Le choix de l'utilisateur prime et se mémorise (stockage local, aucune donnée personnelle).

`kalendrath.fr` redirige en 301 vers `kalendrath.com/fr/`.

### 1.3 Parcours

1. **Arrivée** (Reddit, X, Discord, recherche) sur l'accueil, dans la bonne langue.
2. **Accroche** : pitch et visuel. Un seul appel à l'action principal : laisser son e-mail.
3. **Approfondir** : Univers, Le jeu, Galerie, Feuille de route, pour qui veut savoir avant de s'engager.
4. **S'engager** : formulaire d'e-mail (liste Brevo) ou Discord.
5. **Plus tard** : la préinscription remplace l'appel à l'action principal ; le Patreon apparaît dans le pied de page et la page Soutenir ; « Connexion » et « Inscription » deviennent de simples liens vers `lobby.kalendrath.com`.

En-tête : Univers, Le jeu, Feuille de route, Galerie, News, Communauté, sélecteur FR/EN. Pied de page : Contact, Mentions légales, Confidentialité, CGU, flux RSS, liens sociaux, mention de transparence sur l'IA générative.

### 1.4 Mention de transparence sur l'IA générative (pied de page et Galerie)

- **FR :** « Les illustrations de ce site sont réalisées avec l'aide d'une IA générative (Midjourney), puis choisies et retravaillées par l'équipe. Le projet est développé en public, avec l'aide d'une IA, sur une base open source. »
- **EN:** "The artwork on this site is created with the help of generative AI (Midjourney), then selected and refined by the team. The project is built in the open, with the help of an AI, on an open-source foundation."

**[À DÉCIDER]** Licence commerciale des images Midjourney : à vérifier avant d'ouvrir le Patreon (feuille de route, 3a). À ne pas affirmer sur le site tant que ce n'est pas fait.

---

## 2. Contenus rédigés

Ton : épique, phrases courtes, présent. Une pointe de légèreté par page au plus, discrète. Vouvoiement en français. La version anglaise s'adapte, elle ne se traduit pas mot à mot. Pas d'emoji. Aucune comparaison avec un autre jeu.

### 2.1 Accueil

**Direction (décidée le 2026-10-30)** : la page d'accueil doit transpirer l'épique et le fantastique (visuels, accroche, rythme). Les pointes de légèreté restent discrètes.

**Titre (H1)**
- FR : Kalendrath
- EN : Kalendrath

**Accroche**
- FR : *Trois mille ans après la Rupture, les Neuf Sphères se relèvent à peine. Bâtissez votre cité, envoyez vos héros contre ce qui rôde au-delà des murs, et faites grandir un empire qu'aucun autre joueur ne viendra raser dans votre sommeil.*
- EN : *Three thousand years after the Sundering, the Nine Spheres are barely rising from the ashes. Raise your city, send your heroes against what stalks beyond the walls, and grow an empire that no other player will burn down while you sleep.*

**Ligne de genre**
- FR : Stratégie et gestion d'empire au long cours, par navigateur, pensée d'abord pour le PvE et la coopération.
- EN : Long-form strategy and empire management in your browser, designed first for PvE and cooperation.

**Bloc « Ce qui vous attend »** (trois cartes)
1. **Un héros gouverne votre cité. / A hero governs your city.**
   - FR : Un archétype, des talents, un équipement forgé de vos mains. Un échec coûte du temps, jamais le héros.
   - EN : An archetype, talents, gear forged by your own hand. A failure costs you time, never the hero.
2. **Un monde neuf à chaque chapitre. / A new world every chapter.**
   - FR : Un nouveau serveur s'ouvre à chaque chapitre, sur un calendrier fixe. Vous pourrez toujours rejoindre un ami sur un serveur plus ancien.
   - EN : A new server opens with each chapter, on a fixed schedule. You can always join a friend on an older server.
3. **Le PvP n'est jamais subi. / PvP is never forced on you.**
   - FR : Un joueur pacifique ou sans alliance ne se fait pas écraser par plus fort que lui.
   - EN : A peaceful player, or one without an alliance, is never crushed by someone stronger.
   - *[Revue] Depuis les décisions du 2026-10-30 (guerre d'alliances dès le chapitre 1, tous les membres d'une alliance à bannière attaquables), cette promesse n'est exacte que si « pacifique » se lit « dont l'alliance n'a pas levé sa bannière ». Reformulation en attente de Gregory (étude PvP, R13) ; ne pas publier en l'état.*

**Appel à l'action (formulaire)**
- FR : **Suivez la naissance du royaume.** Laissez votre adresse : vous recevrez les grandes nouvelles du projet, en français, et rien d'autre. [Je m'inscris]
- EN : **Follow the making of the realm.** Leave your address: you will receive the project's major news, in English, and nothing else. [Sign me up]

Sous le formulaire, texte de consentement (voir 3.3).

**Jalons (bande)**
- FR : « Pas de dates pour l'instant, des jalons. Chacun est un moment où nous aurons quelque chose de vrai à montrer. » Lien : Voir la feuille de route.
- EN : "No dates for now, only milestones. Each one is a moment when we will have something real to show." Link: See the roadmap.

**Mot de l'auteur (touche de légèreté)**
- FR : Le projet est mené par une personne qui ne code pas, et par une IA qui, elle, ne dort pas. Les deux ont des opinions sur les obélisques.
- EN : The project is led by one person who does not write code and one AI that never sleeps. Both have opinions about obelisks.

*(Une seule touche de légèreté sur la page ; à retirer si Gregory la juge hors ton.)*

**Méta SEO**
- FR : title « Kalendrath, jeu de stratégie fantasy par navigateur » ; description « Bâtissez votre cité, menez vos héros, faites grandir un empire. Jeu de stratégie heroic fantasy par navigateur, pensé d'abord pour le PvE. »
- EN : title "Kalendrath, a browser fantasy strategy game"; description "Raise your city, lead your heroes, grow an empire. A heroic fantasy browser strategy game designed first for PvE."

### 2.2 Univers

**Titre :** FR « Un monde brisé » / EN "A broken world"

**FR**

Le monde repose sur les **Straumar**, des lignes de mana qui parcourent la réalité comme un réseau vivant. Là où plusieurs d'entre elles se rejoignent, le voile entre les plans s'amincit. Au-delà de ce monde s'étendent les **Neuf Sphères**, d'autres plans d'existence que seuls les points de convergence les plus puissants relient.

**Kaelhelm.** Il y a plus de cinq mille ans, nains et elfes unirent leurs forces pour fonder une cité-nation bâtie autour des obélisques de mana. Les elfes y apportèrent la magie, les nains leur génie de bâtisseurs. Orcs et gobelins en furent la main-d'œuvre, sans jamais siéger parmi les puissants.

**La Rupture.** Les érudits elfes tentèrent la Grande Conjonction, un rite censé aligner les Straumar de plusieurs Sphères et défier la mort elle-même. Un groupe de nains, le Serment Rompu, tenta de l'empêcher. Il arriva trop tard. Kaelhelm et son peuple disparurent, le continent éclata en **Éclats** isolés, et un gouffre béant resta à leur place.

**Trois mille ans plus tard.** Le chaos a reculé. Les humains ont fondé des royaumes sur les Éclats les plus stables. Puis une perturbation traverse les Straumar : les hordes d'orcs et de gobelins se réveillent et déferlent sur les terres humaines. Aux abords du Gouffre, des fragments de l'ancienne cité réapparaissent, comme recrachés par intermittence. Des expéditions partent les chercher.

**Vous.** Vous dirigez une cité humaine, sous la protection d'un obélisque hérité de Kaelhelm. Vos érudits l'étudient. Ce qu'ils y découvriront ne se dit pas ici.

**Ce qui vit entre les mondes.** Les **Vahrun** n'appartiennent à aucune Sphère. Ils se croient les médecins d'un monde blessé. Nous n'en dirons pas plus.

**EN**

The world rests on the **Straumar**, lines of mana running through reality like a living network. Where several meet, the veil between planes grows thin. Beyond this world lie the **Nine Spheres**, other planes of existence, joined only at the most powerful points of convergence.

**Kaelhelm.** Over five thousand years ago, dwarves and elves joined forces to found a city-nation built around mana obelisks. The elves brought magic, the dwarves their genius for building. Orcs and goblins were its labor force, never seated among the powerful.

**The Sundering.** Elven scholars attempted the Great Conjunction, a rite meant to align the Straumar of several Spheres and defy death itself. A group of dwarves, the Broken Oath, tried to stop it. They came too late. Kaelhelm and its people vanished, the continent shattered into isolated **Shards**, and a yawning pit remained: the **Abyss**. 

**Three thousand years later.** The chaos has receded. Humans have founded kingdoms on the most stable Shards. Then a disturbance runs through the Straumar: the orc and goblin hordes awaken and sweep over human lands. Near the Abyss, fragments of the old city reappear, as though spat back out at intervals. Expeditions set out to retrieve them.

**You.** You lead a human city, under the protection of an obelisk inherited from Kaelhelm. Your scholars study it. What they will find is not told here.

**What lives between worlds.** The **Vahrun** belong to no Sphere. They see themselves as physicians to a wounded world. We will say no more.

*Garde-fous :* ne pas révéler le twist de la phase 2 (le peuple englouti), ne pas nommer les Aspects, ne pas parler des nains et elfes comme héros jouables (ils ne le sont pas), ne pas mentionner de faction supplémentaire marquée [TBD]. La formulation « plus de cinq mille ans » découle de -2200 AR + 3000 PR ; à garder ou remplacer par « des millénaires » si Gregory préfère ne pas figer la chronologie **[À DÉCIDER]**.

### 2.3 Le jeu

**Titre :** FR « Ce que vous y ferez » / EN "What you will do"

Les cinq arguments du plan marketing, dans l'ordre. Rien au-delà.

**FR**
1. **Le PvP n'est jamais injuste.** Un joueur pacifique ou sans alliance ne se fait pas écraser par plus fort que lui. *(La forme du PvP est tranchée depuis le 2026-10-30, guerre d'alliances par bannière ; ne pas la détailler avant l'alpha. [Revue] Formulation à revoir avec R13 de l'étude PvP.)*
2. **Un monde neuf à chaque chapitre.** Chaque chapitre ouvre un nouveau serveur, sur un calendrier fixe. On peut toujours rejoindre un ami sur un serveur plus ancien.
3. **Un héros qui gouverne votre cité.** Des archétypes, des talents, de l'équipement issu de la Forge. Un échec coûte du temps, jamais le héros.
4. **Du défi pour chacun.** Un contenu PvE exigeant, des événements, et des ligues de niveaux pour que chacun affronte des joueurs de sa force.
5. **Un projet fait en public.** Un non-développeur, une IA, une base open source, et un devlog toutes les deux semaines.

**EN**
1. **PvP is never unfair.** A peaceful player, or one without an alliance, is never crushed by someone stronger. *(PvP was settled on 2026-10-30, alliance wars with a raised banner; do not detail it before the alpha. [Revue] Wording to revisit with R13 of the PvP study.)*
2. **A fresh world every chapter.** Each chapter opens a new server, on a fixed schedule. You can always join a friend on an older server.
3. **A hero who governs your city.** Archetypes, talents, gear from the Forge. A failure costs you time, never the hero.
4. **A challenge for everyone.** Demanding PvE content, events, and level-based leagues so everyone faces players of their own strength.
5. **A project built in the open.** A non-developer, an AI, an open-source base, and a devlog every two weeks.

**Bloc « Une cité qui grandit »** *(appuyé sur le GDD : 10 paliers de cité validés le 2026-10-28, Hôtel de ville qui définit l'apparence de la ville)*
- FR : Votre cité commence modeste et change de visage à mesure que son Hôtel de ville s'élève : l'habitat grandit, la ville se défend, puis la magie et le pouvoir s'installent. La Galerie en montre les premières images.
- EN : Your city starts humble and changes its face as its Town Hall rises: homes multiply, defenses go up, then magic and power take hold. The Gallery shows the first images.

**À ne pas écrire ici :** noms des paliers (validés le 2026-10-28, mais pas encore annoncés publiquement *[Revue]*), durée de progression (environ 2 ans, à confronter au sondage), économie de la boutique, ratios de serveur, nombre de héros, prestige (non présenté publiquement dans le plan marketing).

### 2.4 Feuille de route

**Titre :** FR « Où en est Kalendrath » / EN "Where Kalendrath stands"

**Chapô**
- FR : Nous annonçons des jalons, pas des dates. Une date n'est annoncée que le jour où nous sommes sûrs de la tenir : ce sera le cas à l'ouverture des préinscriptions à la bêta.
- EN : We announce milestones, not dates. A date is announced only when we are sure to keep it: that will happen when beta pre-registration opens.

**Trois colonnes** (à synchroniser avec la feuille de route, qui reste la source ; mise à jour à chaque devlog)

| Fait / Done | En cours / In progress | Plus tard / Later |
|---|---|---|
| Concept, lore et GDD / Concept, lore and design document | Direction artistique : planche de style, bâtiments / Art direction: style board, buildings | Boucle courte jouable / Playable short loop |
| Base technique choisie, audit du moteur / Technical foundation chosen, engine audit | Design system et nouvelle interface / Design system and new interface | Premiers bots PvE / First PvE bots |
| Pilote du système de héros / Hero system pilot | Communication : site, Discord, devlog / Communication: site, Discord, devlog | Alpha fermée / Closed alpha |
| | | Préinscriptions, puis bêta à durée limitée / Pre-registration, then a limited-time beta |
| | | Sortie officielle, puis un chapitre après l'autre / Official release, then one chapter after another |

**Bloc jalons** (reprise du texte de la feuille de route, version courte)
- FR : Les neuf jalons publics sont, dans l'ordre : communication sur le projet ; design system et écran Héros ; boucle courte jouable ; lancement de l'alpha fermée ; ouverture du Patreon ; préinscriptions à la bêta, avec date ; bêta à durée limitée ; sortie officielle et premier serveur ; un nouveau chapitre et un nouveau serveur à chaque version majeure.
- EN : The nine public milestones are, in order: project communication; design system and Hero screen; playable short loop; closed alpha launch; Patreon opening; beta pre-registration, with a date; limited-time beta; official release and first server; a new chapter and a new server with each major version.

**À ne pas écrire :** fonctionnalités marquées « plus tard » (fusion de serveurs, application mobile, Steam, etc.), nombre de lignes de code, détails d'infrastructure.

### 2.5 Galerie

- FR : Chaque image est une étape de la cité. Les bâtiments évoluent en trois paliers, de l'ébauche à la forteresse. *(Mention de transparence de 1.4 en tête de page.)*
- EN : Each image is a stage in the city's life. Buildings evolve in three tiers, from sketch to stronghold.

Légendes : sobres, une phrase, bilingues. Les images publiées sont celles validées (paliers 2 des bâtiments, images d'Hôtel de ville niveaux 1 à 9, planche de style). **[À DÉCIDER]** quelles images exposer, et décision sur la licence Midjourney (1.4).

### 2.6 News et devlog

- FR : « Les grandes nouvelles et le journal de bord du projet. Un devlog toutes les deux semaines, même court. » 
- EN : "Major news and the project's logbook. A devlog every two weeks, even a short one."

Chaque article : Markdown dans le dépôt, front matter (`title`, `date`, `lang`, `type` = `news` ou `devlog`, `translationKey`), un fichier par langue. Les notes de version restent séparées des news (décision du plan marketing) : section distincte `/fr/notes-de-version/`, `/en/release-notes/` **à ouvrir avec l'alpha**. *[Revue : « release notes », comme le salon Discord `#release-notes` et le plan marketing]*

**Article d'ouverture (modèle, à ajuster)**
- FR : **Les portes s'ouvrent.** Trois mille ans après la Rupture, les premières pierres de Kalendrath se lèvent. Le Discord est ouvert : venez voir les plans de la cité, discuter des héros, et nous dire ce que vous attendez d'un jeu de stratégie qui ne vous attaque pas pendant votre sommeil.
- EN : **The gates open.** Three thousand years after the Sundering, the first stones of Kalendrath are rising. The Discord is open: come and see the city plans, talk about heroes, and tell us what you expect from a strategy game that does not attack you in your sleep.

*(Texte repris du « juste réglage » du plan marketing ; la version EN est une adaptation.)*

### 2.7 Communauté

- FR : **Le Discord.** Choisissez votre langue à l'arrivée : les annonces, les notes de version et les discussions existent en français et en anglais. **Reddit** (en anglais) : r/Kalendrath. **X** : @Kalendrath (anglais), @Kalendrath_FR (français).
- EN : **The Discord.** Choose your language on arrival: announcements, release notes and discussion exist in English and French. **Reddit**: r/Kalendrath. **X**: @Kalendrath (English), @Kalendrath_FR (French).

Boutons : « Rejoindre le Discord » / "Join the Discord". **[À DÉCIDER]** lien d'invitation permanent (sans expiration) à créer par Gregory.

### 2.8 Préinscription à la bêta (page masquée jusqu'à l'annonce)

Cette page n'est publiée qu'avec une date de bêta et une durée tenables. Squelette :

- FR : **Soyez là au premier jour.** La bêta s'ouvre le **[date]** et dure **[durée]**. Les préinscrits reçoivent **[bonus à annoncer]**. Laissez votre adresse : nous vous écrivons le jour de l'ouverture.
- EN : **Be there on day one.** The beta opens on **[date]** and runs for **[duration]**. Pre-registered players receive **[bonuses to be announced]**. Leave your address: we will write to you on opening day.

Formulaire identique à l'accueil, avec un champ supplémentaire optionnel « plateforme/ langue ». Aucune promesse sur la boutique, le classement ou les bonus de démarrage de s1 tant que Gregory ne les a pas fixés dans le texte final **[À DÉCIDER]**. Rappel : les préinscriptions servent à attirer des joueurs, pas à gagner de l'argent ; aucun paiement n'est demandé ici.

### 2.9 Soutenir le projet (à l'ouverture du Patreon)

- FR : Kalendrath est un projet indépendant. Si l'alpha vous donne envie de le voir aboutir, vous pouvez le soutenir sur Patreon. Les contreparties sont hors du jeu : un rôle Discord, votre nom dans les crédits, le devlog en avant-première, un vote sur un nom de chapitre ou un élément de lore. **[contreparties à confirmer]** Le Patreon n'est pas un accès à la bêta. *[Revue] Les règles du Patreon (docs/legal/06) ajoutent un titre cosmétique en jeu : « hors du jeu » devient inexact si Gregory le retient. Trancher, puis aligner les deux textes.*
- EN : Kalendrath is an independent project. If the alpha makes you want to see it through, you can support it on Patreon. Rewards are outside the game: a Discord role, your name in the credits, early access to the devlog, a vote on a chapter name or a piece of lore. **[rewards to be confirmed]** Patreon is not an access ticket to the beta.

Ne pas publier avant : immatriculation de l'auto-entreprise, compte bancaire dédié, lecture des règles de Patreon sur les récompenses en jeu, licence Midjourney vérifiée.

### 2.10 Contact

*Ton : une touche de légèreté avec de l'épique (décision du 2026-10-30).*

- FR : Une question, une demande de presse, un partenariat : `contact@kalendrath.com`. Nous lisons tout et répondons en français ou en anglais.
- EN : A question, a press request, a partnership: `contact@kalendrath.com`. We read everything and reply in English or French.

Pour limiter le spam : adresse affichée sans lien `mailto:` direct (assemblée côté client) ou formulaire simple **[À DÉCIDER]**.

### 2.11 Page 404

*Ton : une touche de légèreté avec de l'épique (décision du 2026-10-30).*

- FR : **Cette Contrée n'est sur aucune carte.** Revenez à l'accueil, ou prévenez-nous si un lien est brisé. Les cartographes font ce qu'ils peuvent.
- EN : **This Reach is on no map.** Head back to the home page, or tell us if a link is broken. The cartographers are doing their best. *[Revue : Contrée = Reach selon le lexique ; texte aligné sur la direction de design, 6.11]*

### 2.12 Mentions légales, confidentialité, CGU

Trames à faire relire par un juriste ou un comptable avant publication. **Rien ne doit être inventé** : les champs entre crochets viennent de l'immatriculation.

**Mentions légales (trame)** — FR / EN
- Éditeur / Publisher : **[nom de l'entrepreneur individuel, adresse, SIREN, e-mail de contact]** (auto-entreprise en cours de démarche : la page ne peut être définitive qu'après immatriculation ; d'ici là, vérifier avec un juriste ce qu'un site non commercial doit afficher **[À DÉCIDER]**).
- Directeur de la publication / Publication director : **[nom]**.
- Hébergeur / Host : Cloudflare, Inc., 101 Townsend St, San Francisco, CA 94107, USA (**à vérifier sur le site de Cloudflare avant publication**).
- Propriété intellectuelle / Intellectual property : les textes, images et noms sont la propriété de l'éditeur, sauf mention contraire. Mention de transparence sur l'IA (1.4).
- Base technique : projet construit sur OGameX (licence à rappeler dans les crédits, voir la licence du dépôt **[à vérifier : conditions de la licence amont]**).

**Politique de confidentialité (trame)** : voir 3.3.

**Rédaction** : les documents légaux se rédigent dans `docs/legal/` (décision du 2026-10-30) ; les trames ci-dessus servent de point de départ.

**CGU** : publiées avant l'alpha. Reprendre les comportements bannissables et les sanctions graduées du plan marketing (section 9), en français et en anglais, avec voie d'appel.

---

## 3. Recommandations techniques

### 3.1 Générateur de site statique

- **Astro** (recommandé) : sortie statique, Markdown natif pour les news et devlogs, routage par dossier de langue, composants simples, peu de JavaScript côté client. Alternative : Eleventy, plus minimal. **[À DÉCIDER]** : le choix tient à l'habitude de Claude Code ; Astro s'y prête bien.
- Structure du dépôt (dossier `site/` du dépôt, décidé le 2026-10-30, pour partager la GitHub Action de publication) : `src/content/news/{fr,en}/*.md`, `src/pages/{fr,en}/…`, un dictionnaire de chaînes d'interface par langue, des images en WebP.
- Pas de framework lourd, pas de base de données, pas de compte.

### 3.2 Hébergement

- **Cloudflare Pages**, retenu par Gregory (plan marketing, section 5 ; confirmé le 2026-10-30, voir [plan-deploiement.md](plan-deploiement.md)) : déploiement automatique à chaque fusion sur `main`, indépendant des VPS du jeu, gratuit à notre échelle.
- Domaine nu `kalendrath.com` servi par Pages : c'est ce qui impose de passer le DNS chez Cloudflare (section 4).
- Redirections : `kalendrath.fr` vers `kalendrath.com/fr/` ; `www.kalendrath.com` vers le domaine nu (règle de redirection ou fichier `_redirects`).
- En-têtes de sécurité (fichier `_headers`) : `Content-Security-Policy` stricte, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`.
- Images : WebP, dimensions responsive, `loading="lazy"`, texte alternatif dans chaque langue.
- Accessibilité : contrastes, navigation clavier, `lang` sur `<html>`, respect de `prefers-reduced-motion`.

### 3.3 Formulaire de préinscription conforme RGPD

**Outil :** Brevo (déjà retenu), liste unique avec attribut `LANGUE` (fr/en) et attribut `SOURCE`. Formulaire soit intégré par Brevo, soit appel à un point d'entrée contrôlé (Cloudflare Pages Function) qui relaie vers l'API Brevo et garde la clé API hors du navigateur. **[À DÉCIDER]** : formulaire Brevo intégré (rapide, mais charge un script tiers) ou Pages Function (plus propre pour la vie privée et la CSP).

**Conformité (à valider avec les textes officiels, le dossier `cadre-legal-ue.md` donne la base) :**
1. **Données minimales :** adresse e-mail, langue. Rien d'autre.
2. **Consentement explicite et séparé :** case **non cochée par défaut**, libellé clair :
   - FR : « J'accepte de recevoir par e-mail les actualités de Kalendrath. Je peux me désinscrire à tout moment. »
   - EN : "I agree to receive Kalendrath news by email. I can unsubscribe at any time."
3. **Double opt-in :** e-mail de confirmation avant toute inscription effective. Il prouve le consentement et limite les fausses adresses.
4. **Information au point de collecte :** responsable du traitement (l'éditeur), finalité (actualités du projet, préinscriptions bêta), base légale (consentement), durée de conservation (jusqu'au retrait du consentement, avec purge des inactifs après une durée à fixer **[À DÉCIDER]**), destinataires (Brevo, sous-traitant), transfert hors UE le cas échéant, droits (accès, rectification, effacement, opposition, retrait) et contact, droit de réclamation auprès de la CNIL.
5. **Désinscription** en un clic dans chaque e-mail, avec suppression effective.
6. **Registre des traitements** d'une page tenu par l'éditeur ; politique de confidentialité publiée, bilingue.
7. **Anti-spam :** champ piège (honeypot) ou Cloudflare Turnstile, sans suivi.
8. **Mineurs :** le service s'adresse à un public adulte ; ne pas collecter de date de naissance sur la vitrine. *[Revue] Contradiction : les CGU ouvrent le jeu dès 13 ans, et la revue juridique (MIN-3) demande une case « J'ai 16 ans ou plus » (ou 15 ans) sur ce formulaire, déjà en service. À trancher avec l'âge minimum.* Pour l'inscription au jeu (lobby), prévoir le contrôle d'âge à ce niveau (cadre légal, section 6).
9. **Mesure d'audience :** Cloudflare Web Analytics (sans cookie), configuré pour rester exempté de consentement ; **aucun traceur publicitaire**, aucune police ni script tiers chargé sans nécessité. Si un traceur non exempté apparaît un jour, bandeau de consentement obligatoire.
10. **Polices :** auto-hébergées, pas de requête vers Google Fonts, pour ne pas transmettre d'adresses IP à un tiers.

### 3.4 SEO bilingue et hreflang

- **Une URL par langue** (`/fr/…`, `/en/…`), jamais de contenu variable selon la langue du navigateur sur une même URL.
- Dans le `<head>` de chaque page, balises **hreflang réciproques et autoréférencées** :
  ```html
  <link rel="alternate" hreflang="fr" href="https://kalendrath.com/fr/univers/">
  <link rel="alternate" hreflang="en" href="https://kalendrath.com/en/world/">
  <link rel="alternate" hreflang="x-default" href="https://kalendrath.com/en/world/">
  <link rel="canonical" href="https://kalendrath.com/fr/univers/">
  ```
  `x-default` pointe vers l'anglais (ou vers une page de choix de langue à la racine **[À DÉCIDER]**).
- Chaque page déclare sa jumelle via un identifiant de traduction (`translationKey`) dans le contenu, pour que le générateur construise les hreflang sans erreur ; un article sans traduction n'émet pas de hreflang vers une page inexistante.
- `sitemap.xml` avec les alternates par langue, `robots.txt`, `<html lang>` correct, `og:locale` et `og:locale:alternate`, image Open Graph par langue (1200 × 630), données structurées `VideoGame` ou `WebSite` en JSON-LD, flux RSS par langue.
- Redirection de la racine : redirection côté serveur ou page de choix ; ne pas bloquer les robots derrière une redirection automatique selon l'IP.
- Mots-clés cibles à valider **[À DÉCIDER]** : « jeu de stratégie navigateur fantasy », « jeu de gestion d'empire PvE », « browser strategy game fantasy », « PvE empire builder ». Aucun nom d'autre jeu dans les balises.
- Suivi : Google Search Console et Bing Webmaster Tools (vérification DNS par enregistrement TXT, à ajouter dans Cloudflare).

### 3.5 Performance et maintenance

Cible : page d'accueil sous 150 Ko hors images, score Lighthouse élevé sur mobile. Test de bout en bout du formulaire à chaque modification (Playwright, déjà dans la pile du projet). Sauvegarde : le dépôt Git est la sauvegarde.

---

## 4. Migration du DNS vers Cloudflare sans casser la messagerie OVH

**Ce qui est établi par les documents du dépôt** : le domaine `kalendrath.com` est enregistré chez OVH ; l'adresse `contact@kalendrath.com` existe chez OVH ; la décision est de garder l'enregistrement du domaine et la boîte chez OVH, et de ne déplacer que le DNS (plan marketing, section 5). **Ce qui n'est pas établi** : le contenu actuel de la zone DNS, le produit de messagerie OVH utilisé (MX Plan, Email Pro, Exchange, redirections), l'état de DNSSEC, la présence de DKIM et DMARC, les noms des enregistrements. **Rien de tout cela n'a été vérifié ici.** L'étape 1 sert à le constater.

**Risque principal :** à l'instant où les serveurs de noms changent, la zone OVH n'est plus consultée. Tout enregistrement absent de la zone Cloudflare cesse de répondre, y compris les MX, ce qui coupe la réception du courrier.

**Prévoir :** une fenêtre calme (hors période d'attente d'un message important), 1 à 2 heures de disponibilité, accès à l'espace client OVH et au compte Cloudflare, et la boîte `contact@` consultable par webmail OVH pour les tests.

### Étape 0 — Préparation (J-2 ou plus)

1. Créer le compte Cloudflare, activer l'authentification à deux facteurs, enregistrer les codes de secours.
2. Vérifier l'accès à l'espace client OVH (identifiant, 2FA) et à la gestion des serveurs de noms du domaine.
3. Noter l'adresse de secours du titulaire du domaine : si OVH envoie une notification de changement, elle doit arriver sur une boîte **qui n'est pas** `contact@kalendrath.com`.
4. Vérifier que le domaine n'est pas verrouillé par une procédure en cours (transfert, renouvellement).

### Étape 1 — Inventaire de la zone OVH (avant toute modification)

Dans l'espace client OVH : Noms de domaine > `kalendrath.com` > Zone DNS. Pour chaque ligne, noter dans un tableau : **type, sous-domaine, valeur exacte, TTL**. Capture d'écran de la zone entière, exportée ou copiée en texte, conservée hors ligne.

Compléter par une interrogation externe, **depuis le terminal** (autre source que l'interface OVH, utile pour repérer un décalage) :

```
dig +noall +answer kalendrath.com NS
dig +noall +answer kalendrath.com MX
dig +noall +answer kalendrath.com TXT
dig +noall +answer kalendrath.com A
dig +noall +answer kalendrath.com AAAA
dig +noall +answer www.kalendrath.com
dig +noall +answer _dmarc.kalendrath.com TXT
dig +noall +answer lobby.kalendrath.com
```

DKIM : le sélecteur n'est pas devinable. Le repérer dans la zone OVH (enregistrements `CNAME` ou `TXT` du type `<sélecteur>._domainkey`), ou dans la documentation du produit de messagerie. Puis `dig +short TXT <sélecteur>._domainkey.kalendrath.com` (ou `CNAME`).

Tableau d'inventaire à remplir :

| Type | Nom | Valeur | TTL | Rôle | Proxy Cloudflare |
|---|---|---|---|---|---|
| NS | `@` | serveurs OVH actuels | | À remplacer | — |
| MX | `@` | *(à relever, plusieurs lignes avec priorités)* | | Réception du courrier | **Non (DNS seul)** |
| TXT | `@` | SPF `v=spf1 …` *(à relever)* | | Autorisation d'envoi | — |
| TXT/CNAME | `<sélecteur>._domainkey` | *(à relever)* | | Signature DKIM | **Non** |
| TXT | `_dmarc` | `v=DMARC1; …` *(à relever, s'il existe)* | | Politique DMARC | — |
| CNAME/A | `autodiscover`, `imap`, `smtp`, `mail`, `ox`, `webmail`… | *(à relever)* | | Configuration des clients de messagerie | **Non** |
| SRV | `_autodiscover._tcp`, `_imaps._tcp`… | *(à relever)* | | Configuration des clients | — |
| A / AAAA | `@`, `www` | *(à relever)* | | Site actuel | À remplacer |
| TXT | divers | *(vérifications de propriété, Search Console, etc.)* | | À conserver | — |
| CAA | `@` | *(si présent)* | | Autorités de certification | À conserver |

À relever aussi :
- **DNSSEC** : activé ou non chez OVH. S'il est activé, voir l'étape 6 (il faut le désactiver avant le changement de serveurs de noms, sans quoi le domaine peut devenir injoignable pour les résolveurs qui valident).
- **Redirections ou alias de messagerie** et le type de produit mail OVH (utile si OVH exige des enregistrements propres au produit).
- Tout enregistrement lié à d'autres services (Brevo, vérification de domaine d'expéditeur, Discord, etc.).

### Étape 2 — Ajouter le domaine à Cloudflare et copier la zone à l'identique

1. Dans Cloudflare : Ajouter un site > `kalendrath.com` > plan Free.
2. Cloudflare tente d'importer les enregistrements qu'il détecte. **Ne pas lui faire confiance : l'import automatique peut omettre des enregistrements** (SRV, certains TXT, sélecteurs DKIM). Comparer ligne à ligne avec le tableau de l'étape 1, ou importer un fichier de zone exporté d'OVH (format BIND) si l'export est disponible.
3. Recopier **chaque** enregistrement mail à l'identique : type, nom, valeur, priorité des MX, contenu exact des TXT (attention aux guillemets et aux TXT longs coupés en plusieurs chaînes, que Cloudflare peut afficher différemment sans les modifier).
4. **Proxy désactivé (nuage gris, « DNS only »)** sur tous les enregistrements liés à la messagerie : MX (toujours en DNS seul, Cloudflare ne les proxifie pas), mais aussi tout `A`, `AAAA` ou `CNAME` vers lequel un MX, `mail`, `imap`, `smtp`, `autodiscover`, `webmail` pointe. Un nuage orange sur un nom de serveur de messagerie casse la réception et l'envoi, parce que Cloudflare ne relaie pas SMTP/IMAP.
5. **Ne pas encore créer** les enregistrements du site (Pages) : le domaine nu reste sur l'ancien site tant que la migration n'est pas finie. Les ajouter après la bascule (étape 7).
6. Conserver les valeurs existantes pour les enregistrements non liés au mail (TXT de vérification, CAA, sous-domaines) : proxy activé uniquement pour ce qui sert du web et le gagne à l'être.
7. Cloudflare affiche les serveurs de noms attribués (deux noms de la forme `xxx.ns.cloudflare.com`). Les noter.

### Étape 3 — Vérifications avant la bascule

Cloudflare permet de tester la zone avant le changement de serveurs de noms :
- `dig @<serveur-de-noms-cloudflare> kalendrath.com MX` (et TXT, `_dmarc`, `<sélecteur>._domainkey`, `autodiscover`, etc.) et comparer **terme à terme** avec les réponses de `dig @<serveur-de-noms-OVH> …` (les serveurs OVH figurent dans la sortie de `dig NS`).
- Vérifier que chaque ligne du tableau de l'étape 1 a son équivalent dans Cloudflare, et que tous les enregistrements mail sont en nuage gris.
- **Baisser le TTL** des NS n'est pas possible côté registre, mais baisser le TTL des enregistrements critiques chez OVH (MX, TXT) à 300 secondes **48 heures avant** réduit la durée d'incohérence en cas de retour arrière.
- Envoyer un message de test **vers** `contact@` depuis une adresse extérieure, et **depuis** `contact@` vers une adresse extérieure ; noter l'heure et l'en-tête reçu (SPF, DKIM, DMARC en `pass`). Ces tests servent de référence « avant ».
- Contrôle externe de la configuration mail (outils en ligne de contrôle MX/SPF/DKIM/DMARC, au choix) pour avoir un état avant migration.

### Étape 4 — Désactiver DNSSEC chez OVH, si activé

Si l'inventaire montre DNSSEC actif chez OVH : le désactiver **avant** le changement de serveurs de noms, attendre que la désactivation soit propagée (jusqu'à 24 à 48 h selon les TTL de l'enregistrement DS), puis changer les serveurs de noms. Le réactiver ensuite chez Cloudflare (étape 7) en recopiant l'enregistrement DS chez OVH (registrar). Ignorer cette étape expose le domaine à une panne totale de résolution.

### Étape 5 — Changer les serveurs de noms (la bascule)

1. Choisir une heure creuse, en semaine plutôt qu'en veille de week-end.
2. Chez OVH : Noms de domaine > `kalendrath.com` > Serveurs DNS > Modifier. Remplacer les serveurs OVH par les deux de Cloudflare. **Noter les anciens serveurs de noms OVH** (indispensables au retour arrière).
3. Valider. OVH met en général de quelques minutes à quelques heures pour appliquer le changement ; la propagation complète peut aller jusqu'à 24 à 48 h. Pendant ce temps, une partie du monde interroge l'ancienne zone, l'autre la nouvelle : **c'est pourquoi la copie doit être strictement identique**.
4. Ne rien modifier dans la zone OVH ni dans Cloudflare pendant la propagation, hors correction d'une erreur.

### Étape 6 — Vérifications après la bascule

Immédiatement, puis à 1 h, 6 h et 24 h :
- `dig NS kalendrath.com` : doit renvoyer les serveurs de Cloudflare (tester aussi depuis un résolveur public, par exemple `dig @1.1.1.1` et `dig @8.8.8.8`).
- `dig MX`, `dig TXT`, `dig TXT _dmarc.kalendrath.com`, DKIM : résultats identiques à l'inventaire.
- Nouveaux tests de messagerie, dans les deux sens, avec lecture des en-têtes (SPF, DKIM et DMARC en `pass`). Test par le webmail OVH et, si utilisé, par un client (IMAP/SMTP).
- Vérifier qu'aucun enregistrement mail n'est en nuage orange.
- Le tableau de bord Cloudflare affiche « Actif » une fois la délégation détectée (peut prendre du temps ; ne pas recommencer la procédure).
- Rapports DMARC éventuels et boîte de spam : surveiller sur 3 à 7 jours.

### Étape 7 — Après la stabilisation : brancher le site et finir

1. Seulement quand le courrier est confirmé fonctionnel : créer dans Cloudflare Pages le domaine personnalisé `kalendrath.com` (Cloudflare crée les enregistrements nécessaires, proxy activé pour le web) et `www`.
2. Ajouter les enregistrements du jeu : `lobby` et `s1` vers le VPS, au moment venu.
3. Activer SSL/TLS en mode complet (strict) quand l'origine a un certificat valide ; HTTPS automatique, redirection HTTP vers HTTPS.
4. Redirection `kalendrath.fr` : un site Cloudflare séparé s'il est géré chez Cloudflare, ou règle de redirection chez OVH, **selon l'endroit où le `.fr` est géré** **[À DÉCIDER]**. Ne pas toucher aux serveurs de noms du `.fr` avant d'avoir inventorié sa zone avec la même méthode.
5. Réactiver DNSSEC chez Cloudflare si désiré (recopier l'enregistrement DS chez OVH).
6. Réajouter les enregistrements de propriété (Search Console, Brevo : authentification SPF/DKIM d'expédition pour les e-mails du site). **Attention :** ajouter l'expéditeur Brevo **modifie le SPF** (un seul enregistrement SPF par domaine, à fusionner, jamais en dupliquer) ; refaire un test de messagerie après.
7. Remonter les TTL à une valeur normale (3600 ou plus).
8. Mettre à jour le document d'inventaire avec l'état final.

### Plan de retour arrière

**Déclencheurs :** courrier non reçu ou non envoyé après 1 h de propagation, erreurs de résolution constatées sur un MX, DKIM ou SPF en échec.

1. **D'abord, corriger plutôt que revenir :** dans 90 % des cas, la cause est un enregistrement manquant ou mal copié dans Cloudflare. Comparer avec l'inventaire, ajouter ou corriger l'enregistrement, tester. C'est plus rapide qu'un retour arrière (effet quasi immédiat, TTL court).
2. **Retour arrière complet :** chez OVH, remettre les **anciens serveurs de noms OVH** relevés à l'étape 5. La zone OVH n'a pas été modifiée ni supprimée, elle reprend la main (délai de propagation comme à l'aller). **Ne jamais supprimer la zone OVH pendant les 7 premiers jours.**
3. Si DNSSEC avait été désactivé : le réactiver chez OVH **après** le retour, pas avant.
4. Le courrier envoyé pendant l'incident est généralement mis en file d'attente par les expéditeurs (plusieurs heures à quelques jours) : il ne se perd pas dans la plupart des cas, mais prévenir si un message attendu est critique.
5. Après un retour arrière : documenter la cause, corriger l'inventaire, recommencer à l'étape 2.

### Points de vigilance rappelés

- **Un seul enregistrement SPF** par domaine ; le modifier lors de l'ajout d'un expéditeur (Brevo) en fusionnant les `include:`, jamais en créant un second TXT SPF.
- **MX et leurs cibles toujours en nuage gris.**
- **Import automatique de Cloudflare : à vérifier ligne par ligne.**
- **DNSSEC** : désactiver avant, réactiver après.
- **Ne pas supprimer la zone OVH** avant plusieurs jours de bon fonctionnement.
- **Réception ET envoi** à tester.
- **Le `.fr` suit sa propre procédure.**

---

## 5. Décisions ouvertes

**Closes le 2026-10-30 (Gregory) :** « Shard » validé comme traduction d'Éclat ; 404 et contact : une touche de légèreté mêlée d'épique ; la page d'accueil doit transpirer l'épique et le fantastique ; le site vit dans `site/` et est publié via Cloudflare Pages (voir [plan-deploiement.md](plan-deploiement.md)) ; les documents légaux sont à rédiger dans `docs/legal/`. Les points 1 (emplacement `site/`), 8 et 9 ci-dessous sont donc réglés.

1. **Générateur** : Astro (recommandé) ou Eleventy ; site dans le dépôt du jeu (`site/`) ou dépôt séparé.
2. **Formulaire** : script Brevo intégré, ou Pages Function qui relaie vers l'API (plus propre pour la vie privée).
3. **Racine du site** : redirection selon la langue du navigateur, ou page de choix de langue ; cible du `x-default`.
4. **Mentions légales** : que publier avant l'immatriculation de l'auto-entreprise ; hébergeur et adresse à confirmer.
5. **Licence commerciale des images Midjourney** : à vérifier avant l'ouverture du Patreon et avant d'exposer la Galerie telle quelle.
6. **Durée de conservation des adresses inactives** et double opt-in (recommandé).
7. **Chronologie dans « Univers »** : afficher « plus de cinq mille ans » ou rester vague.
8. ~~Nom EN d'« Éclat »~~ : **Shard**, validé le 2026-10-30.
9. ~~Touche de légèreté~~ : tranchée le 2026-10-30 (voir ci-dessous).
10. **Lien d'invitation Discord permanent** et mention des canaux sociaux publiés.
11. **Gestion du `.fr`** : où est-il enregistré et son DNS, et comment il redirige.
12. **Calendrier de migration DNS** : choix d'une fenêtre, et décision de baisser les TTL 48 h avant.
