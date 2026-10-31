# Spécification du Discord Kalendrath (bilingue FR/EN)

*Version 1 du 2026-10-30. Découle de [plan-marketing.md](plan-marketing.md) (sections 3, 4 et 6) : langue choisie à l'arrivée, news et notes de version séparées, cinq profils d'arrivée, publication automatique vers les serveurs abonnés. Les points marqués **[À valider]** sont des propositions, pas des décisions.*

---

## 1. Principes

1. **On double ce qui est écrit, on partage ce qui est visuel.** Annonces, discussion et retours existent en français et en anglais ; la direction artistique et les captures vivent dans un seul salon commun.
2. **Chacun ne voit que sa langue.** Les catégories FR et EN sont réservées aux rôles `Français` et `English`. Qui choisit « les deux » reçoit les deux rôles.
3. **Zéro salon vide au lancement.** La catégorie anglaise s'ouvre avec le premier post Reddit ; les salons « plus tard » (alpha, bêta, classement) ne sont créés qu'à leur jalon.
4. **Deux flux d'annonces, jamais mélangés** : `#news` (événement, ton épique) et `#notes-de-version` / `#release-notes` (liste de modifications, ton neutre). Ce sont des salons d'annonces **suivables** ; le bot les publie automatiquement vers les serveurs abonnés.
5. **Peu de rôles, peu de salons.** Chaque salon doit avoir un usage que l'on peut résumer en une phrase.

---

## 2. Arborescence

Légende : **A** = salon d'annonces (suivable), **F** = forum, **T** = texte, **V** = vocal. « Écriture » : qui peut poster. `@Membre` = quiconque a accepté les règles.

### 2.1 Catégorie `COMMUN · COMMON`

| Salon | Type | Lecture | Écriture | Rôle |
|---|---|---|---|---|
| `#bienvenue-welcome` | T | Tous (même sans rôle) | Équipe | Pitch et règles dans les deux langues, boutons de liens (site, Reddit, Patreon) |
| `#règles-rules` | T | Tous | Équipe | Règles complètes FR puis EN (section 6) |
| `#choix-de-langue-language` | T | Tous | Équipe | Plan B si l'Onboarding est désactivé : réactions de langue (section 5) |
| `#direction-artistique-art` | T | Membres | Équipe ; réponses en fil uniquement | Planches de style, bâtiments, unités. Visuel : un seul salon pour les deux langues |
| `#outils-et-extensions-tools` | F | Membres | Membres | Outils de la communauté (simulateurs, calculateurs). Titre de fil bilingue |
| `#vocal-lounge` | V | Membres | Membres | Un vocal commun |

### 2.2 Catégorie `FRANÇAIS`

Visible par `Français`.

| Salon | Type | Écriture | Rôle |
|---|---|---|---|
| `#news` | A | Équipe, bot | Événements : jalons, chapitres, préinscriptions, sondages. Trois à cinq lignes, un visuel, un lien |
| `#notes-de-version` | A | Équipe, bot | Numéro de version, sections fixes, une ligne par modification |
| `#devlog` | A | Équipe, bot | Devlog toutes les deux semaines (ton plus intimiste) |
| `#sondages` | T | Équipe ; réactions pour tous | Sondages participatifs (rythme, format, noms) |
| `#discussion` | T | Français | Discussion libre |
| `#idées-et-retours` | F | Français | Un fil par idée ou retour. Étiquettes : `Idée`, `Retour`, `Interface`, `Équilibrage`, `Lore`, `Traité` |
| `#aide-et-questions` | T | Français | Questions de jeu. Pas de support de compte (voir contact@kalendrath.com) |
| `#alliances-recrutement` | T | Français | Ouvert à l'alpha **[À valider]** |

### 2.3 Catégorie `ENGLISH`

Visible par `English`. Miroir de la catégorie française.

| Salon | Type | Écriture | Rôle |
|---|---|---|---|
| `#news` | A | Team, bot | Events: milestones, chapters, pre-registration, polls |
| `#release-notes` | A | Team, bot | Version number, fixed sections, one line per change |
| `#devlog` | A | Team, bot | Fortnightly devlog |
| `#polls` | T | Team; reactions for all | Participatory polls |
| `#general` | T | English | Open chat |
| `#feedback` | F | English | One thread per idea or feedback. Tags: `Idea`, `Feedback`, `UI`, `Balance`, `Lore`, `Done` |
| `#help-and-questions` | T | English | Gameplay questions |
| `#alliances-recruitment` | T | English | Opens during alpha **[À valider]** |

Les noms `#news` et `#devlog` sont identiques dans les deux catégories : c'est voulu (le plan marketing l'impose), et sans ambiguïté puisque chaque joueur ne voit qu'une catégorie. Les **sujets de salon (topic)** précisent la langue (« News en français » / « News in English »), ce qui se lit aussi chez les abonnés du suivi d'annonces.

### 2.4 Catégorie `PLUS TARD · LATER` (créée au jalon, pas avant)

| Salon | Jalon | Visibilité |
|---|---|---|
| `#alpha-fr`, `#alpha-en` | Alpha fermée | `Testeur alpha` + langue |
| `#bêta-fr`, `#beta-en` | Bêta | `Testeur bêta` + langue |
| `#classement-bêta`, `#beta-leaderboard` | Bêta | Tous les membres de la langue (lecture seule, mis à jour par le bot) |
| `#soutiens-patreon` / `#supporters` | Ouverture du Patreon | Rôle `Mécène` **[À valider]** |

Le script (section 9) contient ces salons dans un bloc `later`, désactivé par défaut (`--with-later`).

### 2.5 Catégorie `ÉQUIPE · STAFF` (invisible aux membres)

| Salon | Type | Usage |
|---|---|---|
| `#équipe-général` | T | Discussion interne |
| `#modération` | T | File de décisions, coordination des sanctions |
| `#signalements` | T | Reçoit les signalements des membres (bot ou formulaire) |
| `#automod-alertes` | T | Alertes d'AutoMod (section 7) |
| `#journal-modération` | T | Journal des sanctions : qui, quoi, pourquoi, durée, date. Écriture réservée au bot et aux modérateurs |
| `#journal-serveur` | T | Journal d'audit (arrivées, départs, changements de rôles) via un bot de journal ou le journal natif |
| `#tickets-appel` | F | Une voie d'appel par fil, comme le prévoit le plan marketing (sanctions graduées avec voie d'appel) |
| `#publication` | T | Brouillons des news et notes de version avant envoi, relues par Gregory |

---

## 3. Rôles

Ordre hiérarchique du haut vers le bas (un bot ne peut gérer que les rôles situés **sous** le sien : le rôle `Kalendrath Bot` se place sous `Modérateur`, au-dessus de tous les rôles qu'il attribue, comme dans le tableau ci-dessous). *[Revue : le texte disait « juste sous `Équipe` », ce qui le plaçait au-dessus de `Modérateur`, contrairement au tableau]*

| Rôle | Couleur (hex) | Affiché à part | Attribution | Permissions notables |
|---|---|---|---|---|
| `Fondateur` | `#C9A227` (or) | Oui | Gregory, à la main | Administrateur |
| `Équipe` | `#8E2B2B` (rouge sombre) | Oui | À la main | Gérer messages, fils, expulser, bannir, exclure, voir le journal d'audit, mentionner `@everyone` (décision du 2026-10-30) |
| `Modérateur` | `#3F6E8C` | Oui | À la main | Gérer messages et fils, exclure (timeout), **bannir**, voir le journal d'audit, mentionner `@everyone` (décisions du 2026-10-30 : `@everyone` réservé aux modérateurs et à Gregory, un modérateur peut bannir) |
| `Kalendrath Bot` | `#5D5D6B` | Oui | À l'invitation du bot | Gérer les rôles, gérer les salons, gérer les messages, publier sur les salons d'annonces, créer des fils |
| `Mécène` | `#B5651D` | Non | Lien Patreon (intégration) ou à la main | Aucune permission de plus ; accès à `#soutiens-patreon` |
| `Testeur bêta` | `#6B8E23` | Non | Par vague, à la main ou par le bot | Accès aux salons bêta |
| `Testeur alpha` | `#7A5C99` | Non | Par vague | Accès aux salons alpha |
| `Français` | `#2F4F8F` | Non | Onboarding | Voit la catégorie FRANÇAIS |
| `English` | `#2F7F6F` | Non | Onboarding | Voit la catégorie ENGLISH |
| Profil : `Vétéran de la stratégie` / `Strategy Veteran` | gris `#8A8A8A` | Non | Onboarding, facultatif | Aucune, ciblage de sondages |
| Profil : `Joueur d'alliance` / `Alliance Player` | idem | Non | idem | idem |
| Profil : `Joueur de 4X mobile` / `Mobile 4X Player` | idem | Non | idem | idem |
| Profil : `Joueur PvE et RPG` / `PvE & RPG Player` | idem | Non | idem | idem |
| Profil : `Curieux du développement` / `Dev Curious` | idem | Non | idem | idem |
| `Membre` | `#B0B0B0` | Non | Automatique après acceptation des règles (écran de sélection / « Rules screening ») *[Revue : à vérifier à la mise en place ; l'écran de sélection natif ne semble pas attribuer de rôle à lui seul, il faudra peut-être passer par l'Onboarding ou par le bot]* | Voir `COMMUN`, écrire dans les fils et salons de sa langue |

Les profils sont les **cinq personas du plan marketing** (section 4). Leur seul usage est de **cibler** : « les vétérans d'abord » pour une vague d'alpha, ou un sondage adressé aux joueurs d'alliance. Décision du 2026-10-30 : **un nom par langue** (« Joueur » / « Player »), donc un rôle par langue ; **en attente de confirmation de Gregory**. Gregory est seul administrateur et modérateur au début ; les rôles `Équipe` et `Modérateur` ne servent qu'à l'arrivée des premiers modérateurs.

### Permissions de base de `@everyone`

- **Accordé :** voir les salons, lire l'historique, utiliser les commandes d'application (seulement dans `COMMUN`), ajouter des réactions.
- **Refusé :** mentionner `@everyone`/`@here`/tous les rôles, joindre des liens intégrés et fichiers hors des salons de discussion (voir Membre), créer des invitations, utiliser des sons externes ou émojis externes sur les salons d'annonces.
- **`@everyone` ne voit pas** les catégories FRANÇAIS, ENGLISH, PLUS TARD, ÉQUIPE. Seuls `COMMUN › #bienvenue-welcome`, `#règles-rules` et `#choix-de-langue-language` sont publics, ce qui respecte le minimum que l'Onboarding exige (des salons par défaut lisibles par tous).

### Permissions par catégorie (résumé)

| Catégorie | `@everyone` | `Membre` | `Français` | `English` | `Équipe` / `Modérateur` |
|---|---|---|---|---|---|
| COMMUN | Voir `#bienvenue-welcome`, `#règles-rules`, `#choix-de-langue-language` seulement | Voir et participer aux autres | — | — | Tout |
| FRANÇAIS | Rien | Rien | Voir, écrire (hors annonces) | Rien | Tout |
| ENGLISH | Rien | Rien | Rien | Voir, écrire (hors annonces) | Tout |
| ÉQUIPE | Rien | Rien | Rien | Rien | Voir ; `Équipe` seule écrit dans `#publication` |

Dans les salons d'annonces (`#news`, `#notes-de-version`, `#devlog`, etc.), **personne sauf `Équipe` et le bot ne peut écrire** ; les membres lisent et réagissent. Dans les forums, les membres créent des fils mais ne peuvent pas **épingler** ni **gérer** ; un **délai de 60 secondes entre fils** limite le bruit.

---

## 4. Arrivée d'un nouveau membre

1. **Écran de sélection (Rules screening)** : le visiteur lit les règles en deux langues et clique « J'accepte / I agree ». Il reçoit `Membre`.
2. **Onboarding Discord** (voir section 5) : deux questions, la langue puis le profil.
3. **Message de bienvenue** (système Discord) dans `#bienvenue-welcome`, désactivé si l'équipe préfère un message du bot. Le bot n'envoie **aucun message privé** non sollicité.

Un membre qui ignore l'Onboarding reste `Membre` sans langue : il ne voit que `COMMUN`. `#choix-de-langue-language` lui rappelle de choisir.

---

## 5. Choix de la langue : Onboarding ou réactions

### Recommandation : Onboarding Discord

Le plan marketing parle déjà de l'écran d'accueil (« Onboarding »). C'est la voie principale.

| Critère | Onboarding Discord | Rôle par réaction |
|---|---|---|
| Intégré, vu par tous les nouveaux | Oui (écran d'arrivée) | Non (il faut lire un salon) |
| Modifiable après coup | Oui (« Salons et rôles » / « Channels & Roles ») | Oui |
| Prérequis | Serveur « Communauté » activé, 7 salons par défaut dont 5 lisibles par `@everyone` en écriture non exigée | Un bot ou un bot de réactions |
| Mobile | Très bon | Correct |
| Ancien membre déjà présent | Peu visible | Visible dans le salon |

**Questions de l'Onboarding** (l'API accepte quelques champs en version actuelle ; le script les crée si possible, sinon la section 5.2 indique la saisie manuelle) :

**Question 1 — langue (obligatoire, choix multiple autorisé)**

- *Dans quelle langue souhaitez-vous suivre l'aventure ? / Which language would you like to follow the adventure in?*
  - 🇫🇷 Français → rôle `Français`, salons de la catégorie FRANÇAIS
  - 🇬🇧 English → rôle `English`, salons de la catégorie ENGLISH
  - 🌍 Les deux / Both → les deux rôles

**Question 2 — profil (facultative, choix multiple, non obligatoire)**

- *Quel genre de seigneur êtes-vous ? / What kind of lord are you?* (la pointe de légèreté vit ici, discrète)
  - Vétéran de la stratégie par navigateur / Browser strategy veteran
  - Joueur d'alliance / Alliance player
  - Joueur de 4X mobile / Mobile 4X player
  - Joueur PvE et RPG / PvE and RPG player
  - Curieux du développement / Dev curious
  - « Je regarde d'abord » / Just looking → aucun rôle

**Salons par défaut** (ceux que tout nouveau membre voit, requis par Discord) : `#bienvenue-welcome`, `#règles-rules`, `#direction-artistique-art`, `#choix-de-langue-language`, `#outils-et-extensions-tools`, `#vocal-lounge`, plus la **première** annonce : le salon `#news` correspondant à la langue (gérée par la question 1).

### 5.1 Plan B : rôle par réaction

Si l'Onboarding pose problème (serveur non Communauté, par exemple), dans `#choix-de-langue-language` le bot publie un message avec deux boutons (composants Discord, pas des réactions, plus fiables) : `Français` et `English`, plus `Les deux / Both`. Le script de la section 9 ne l'installe qu'avec `--reaction-fallback`.

### 5.2 Ce que l'on règle à la main

Certaines options de l'Onboarding et de l'écran de sélection ne sont pas toujours exposées par l'API. Le script le signale en fin d'exécution. À faire dans **Paramètres du serveur › Onboarding** et **› Écran de sélection** : coller les questions ci-dessus si le script n'a pas pu les créer, et activer « Exiger l'acceptation des règles ».

---

## 6. Règles du serveur

Texte destiné aux joueurs : vouvoiement, ton épique avec une pointe de légèreté. Sa version française puis sa version anglaise se publient dans `#règles-rules` et se résument dans l'écran de sélection.

### 6.1 Version française

> **Les Règles de la Table**
>
> Vous entrez dans la salle des cartes de Kalendrath. Ici, on discute stratégie, héros et histoire, et on le fait en bonne compagnie. Voici ce que nous vous demandons.
>
> **1. Respect.** Pas d'insultes, de harcèlement, de propos haineux, racistes, sexistes, homophobes ou discriminatoires. On critique une idée, jamais une personne.
>
> **2. Courtoisie envers l'équipe.** Nous vous répondons avec précision ; nous vous demandons la même politesse.
>
> **3. La bonne langue au bon endroit.** Chaque langue a ses salons. Dans `#discussion`, on écrit en français ; dans `#general`, en anglais. Une phrase dans l'autre langue ne fait de mal à personne, mais restez-en là.
>
> **4. Pas de spoil par surprise.** Les secrets du lore et des mécaniques non annoncées se cachent en balises de spoiler.
>
> **5. Pas de publicité ni de démarchage.** Aucune promotion d'un autre jeu, serveur ou service sans accord de l'équipe. Les messages privés non sollicités sont interdits.
>
> **6. Aucun commerce réel.** Ni vente, ni achat, ni échange de comptes, de ressources, d'objets ou de Kaelite contre de l'argent réel en dehors de la boutique officielle.
>
> **7. Pas de tricherie.** Scripts ou bots qui jouent à votre place, multicomptes au-delà de ce que permettent les règles du jeu, *pushing*, contournement d'une protection, exploitation volontaire d'un bug : ni dans le jeu, ni expliqué ici. Un bug se signale dans `#idées-et-retours`.
>
> **8. Pas d'usurpation.** Personne ne se fait passer pour l'équipe, un modérateur ou un autre joueur. L'équipe ne demandera **jamais** votre mot de passe.
>
> **9. Contenu adapté.** Pas de contenu choquant, sexuel ou illégal. Les textes et images doivent rester lisibles par un public adulte tranquille.
>
> **10. Vie privée.** Ne publiez pas d'informations personnelles, les vôtres ou celles d'autrui.
>
> **Sanctions graduées :** avertissement, exclusion temporaire, bannissement. Selon la gravité, nous pouvons sauter des étapes. Une sanction se conteste par courriel à contact@kalendrath.com ; l'équipe l'examine.
>
> *Les Vahrun n'ont pas besoin de règles. Vous, si. Bonne partie.*

### 6.2 Version anglaise

> **The Rules of the Table**
>
> You are entering the map room of Kalendrath. Here we talk strategy, heroes and history, and we do it in good company. Here is what we ask of you.
>
> **1. Respect.** No insults, harassment, hateful, racist, sexist, homophobic or discriminatory speech. Challenge an idea, never a person.
>
> **2. Be courteous to the team.** We answer precisely; we ask for the same courtesy in return.
>
> **3. The right language in the right place.** Each language has its own channels. In `#general` write in English; in `#discussion` in French. A sentence in the other language harms nobody, but keep it brief.
>
> **4. No surprise spoilers.** Lore secrets and unannounced mechanics go behind spoiler tags.
>
> **5. No advertising or solicitation.** No promotion of another game, server or service without the team's approval. Unsolicited private messages are forbidden.
>
> **6. No real-money trading.** No selling, buying or swapping accounts, resources, items or Kaelite for real money outside the official shop.
>
> **7. No cheating.** Scripts or bots playing for you, multi-accounting beyond what the game rules allow, pushing, bypassing a protection, deliberately exploiting a bug: not in game, and not explained here. Report bugs in `#feedback`.
>
> **8. No impersonation.** Nobody pretends to be the team, a moderator or another player. The team will **never** ask for your password.
>
> **9. Suitable content.** No shocking, sexual or illegal content. Texts and images must remain fit for a calm adult audience.
>
> **10. Privacy.** Do not post personal information, yours or anyone else's.
>
> **Graduated sanctions:** warning, timeout, ban. Depending on severity, steps may be skipped. To contest a sanction, email contact@kalendrath.com; the team will review it.
>
> *The Vahrun do not need rules. You do. Good game.*

*[Revue] Trois corrections le 2026-10-30 : la règle 2 française, défensive, est alignée sur la version anglaise ; l'appel ne renvoie plus à `#tickets-appel`, salon de la catégorie ÉQUIPE invisible des membres (il reste l'outil interne de suivi, un fil par appel) ; « temporary timeout » devient « timeout ». La mention « public adulte tranquille » de la règle 9 est à revoir avec l'âge minimum (13 ans dans les CGU).*

Ces règles s'alignent sur les « comportements bannissables » du plan marketing (section 9) ; elles devront être **reprises à l'identique dans les conditions d'utilisation** (Phase 7). La phrase finale est la « pointe de légèreté discrète » ; elle se supprime sans rien perdre.

---

## 7. Configuration d'AutoMod

AutoMod natif de Discord (jusqu'à 6 règles de mots-clés par serveur, plus les règles « spam », « mentions » et « contenu suspect »). Toutes envoient une **alerte dans `#automod-alertes`**. Le rôle `Équipe` et `Modérateur` sont **exemptés** de chaque règle.

| # | Nom de la règle | Type | Détail | Action |
|---|---|---|---|---|
| 1 | `Kalendrath · Insultes` | Mots-clés prédéfinis (insultes, grossièretés, contenu sexuel) | Listes prédéfinies de Discord, activées toutes les trois | Bloquer le message, alerter, exclure 10 min à la récidive (gérée par la modération) |
| 2 | `Kalendrath · Commerce réel` | Mots-clés personnalisés | `*vend compte*`, `*achète compte*`, `*sell account*`, `*buy account*`, `*cheap kaelite*`, `*kaelite pas cher*`, `*boost service*`, `*paypal*` (liste à affiner avec l'usage) **[À valider]** | Bloquer, alerter |
| 3 | `Kalendrath · Tricherie` | Mots-clés personnalisés | `*multi-compte script*`, `*bot farm*`, `*botting*`, `*macro farm*`, `*exploit*` (en annonce seulement) | Alerter seulement (jamais bloquer : un joueur peut signaler un bug) |

*[Revue] Le script de la section 9.4 n'a pas `*paypal*` (règle 2) ni `*multi-compte script*` et `*exploit*` (règle 3). Écart volontaire ou oubli : aligner tableau et script avant le premier lancement. Bloquer `*paypal*` gênerait aussi les questions légitimes sur le paiement du Patreon ou de la boutique.*
| 4 | `Kalendrath · Hameçonnage` | Mots-clés personnalisés, expressions régulières | `discord\.gift`, `free[- ]?nitro`, `steam.*gift`, `dlscord`, `discorcl` | Bloquer, alerter, exclure 1 jour |
| 5 | `Kalendrath · Spam` | Contenu suspect de spam (règle native) | Active | Bloquer, alerter |
| 6 | `Kalendrath · Mentions` | Spam de mentions | Plafond de **5 mentions** par message | Bloquer, alerter, exclure 1 heure |
| 7 | `Kalendrath · Invitations` | Mots-clés personnalisés | `discord.gg/*`, `discord.com/invite/*`, **sauf** dans les salons où l'équipe publie des invitations | Bloquer, alerter |

Notes :

- La règle 1 utilise les listes prédéfinies, dans une langue ou l'autre ; AutoMod comprend plusieurs langues.
- Les règles 2, 3 et 7 sont volontairement larges ; elles produisent des alertes, pas des sanctions automatiques. Une personne décide.
- **Salons exemptés** de la règle 7 : `#outils-et-extensions-tools`, `#alliances-recrutement`, `#alliances-recruitment` **[À valider]**, car le recrutement d'alliance passe par des invitations vers d'autres espaces.
- Le script crée ces règles **par nom** : une règle existante avec le même nom est mise à jour, jamais dupliquée.

---

## 8. Salons de modération et procédure

### 8.1 Usage des salons

| Salon | Qui écrit | Qui lit | Usage |
|---|---|---|---|
| `#signalements` | Bot (commande `/signaler`, acceptée le 2026-10-30) ou Équipe | Équipe, Modérateur | Signalement d'un message ou d'un membre |
| `#automod-alertes` | AutoMod (natif) | Équipe, Modérateur | Alertes ; une alerte non traitée sous 24 h est relancée |
| `#modération` | Équipe, Modérateur | idem | Décider avant de sanctionner |
| `#journal-modération` | Bot, Équipe, Modérateur | idem | Une ligne par sanction : date, membre, règle, sanction, durée, modérateur |
| `#tickets-appel` | Équipe, Modérateur | idem | Voie d'appel : un fil par appel, réponse sous 7 jours **[À valider]** |

### 8.2 Échelle de sanctions

1. **Rappel** (message court en fil ou en privé, ton courtois).
2. **Avertissement** inscrit au journal.
3. **Exclusion temporaire** (timeout) de 10 minutes, 1 heure, 1 jour ou 7 jours.
4. **Bannissement**.

Cas immédiats (aucune étape préalable) : hameçonnage, contenu illégal, harcèlement grave, usurpation de l'équipe, commerce réel.

### 8.3 Règles de modération

- Deux personnes de la modération pour un **bannissement** quand cela reste possible ; Gregory tranche en cas de désaccord.
- Un message d'explication est envoyé à la personne sanctionnée (modèle FR/EN dans `#modération`), sans s'excuser ni polémiquer.
- Le journal est conservé 12 mois, durée inscrite dans la politique de confidentialité (2.8) et le registre (T8). *[Revue : « au moins 12 mois » contredisait ces documents ; une durée de conservation se fixe, elle n'a pas de minimum]*
- La modération ne sanctionne **jamais** une critique du jeu, du projet ou de Gregory tant qu'elle reste courtoise : c'est ce qu'on attend du salon `#idées-et-retours` / `#feedback`.

---

## 9. Script de mise en place

### 9.1 Principes

- **Idempotent** : on peut le relancer sans rien casser. Chaque rôle, catégorie, salon et règle AutoMod est recherché **par nom** (et par catégorie pour les salons) ; s'il existe, il est mis à jour (permissions, sujet), sinon il est créé. Rien n'est **jamais supprimé**.
- **Token en variable d'environnement** : `DISCORD_TOKEN`, jamais en dur, jamais dans le dépôt. Les identifiants `DISCORD_GUILD_ID` et (facultatif) `DISCORD_CLIENT_ID` viennent aussi de l'environnement.
- **Mode simulation** : `--dry-run` affiche ce qui serait fait sans appeler l'API en écriture.
- **Aucune exécution automatique** : le script est livré, relu, puis lancé par Gregory.
- **Bibliothèque** : `discord.js` v14 (Node 20 ou plus). Aucun autre paquet.

### 9.2 Préparation (une fois, à la main)

1. Créer l'application et le bot sur https://discord.com/developers/applications, copier le **token** (il ne s'affiche qu'une fois) dans un fichier `.env` **hors dépôt** ou dans le gestionnaire de secrets.
2. Inviter le bot avec la portée `bot` et les permissions : Gérer les rôles, Gérer les salons, Gérer le serveur, Gérer les messages, Voir les salons, Envoyer des messages, Gérer les fils, Utiliser les commandes d'application. (Plus simple pour le premier lancement : permission **Administrateur**, puis la retirer ensuite.)
3. Activer le mode **Communauté** (Paramètres du serveur › Activer la communauté) : indispensable pour les salons d'annonces, les forums, l'Onboarding.
4. Déplacer le rôle du bot au-dessus de tous les rôles qu'il doit gérer, ou le créer en premier.

### 9.3 Utilisation

```bash
mkdir discord-setup && cd discord-setup
npm init -y
npm install discord.js@14
# placer setup-discord.mjs ci-dessous dans ce dossier

export DISCORD_TOKEN="…"        # jamais dans un fichier du dépôt
export DISCORD_GUILD_ID="…"

node setup-discord.mjs --dry-run          # voir le plan
node setup-discord.mjs                     # appliquer
node setup-discord.mjs --with-later        # + salons alpha/bêta/classement
node setup-discord.mjs --reaction-fallback # + boutons de langue (plan B)
```

### 9.4 Le script `setup-discord.mjs`

```js
// setup-discord.mjs — Mise en place idempotente du Discord Kalendrath.
// Lecture seule du token dans process.env.DISCORD_TOKEN. Rien n'est supprimé.
import {
  Client, GatewayIntentBits, ChannelType, PermissionFlagsBits as P,
  AutoModerationRuleEventType, AutoModerationRuleTriggerType,
  AutoModerationActionType, AutoModerationRuleKeywordPresetType,
  ActionRowBuilder, ButtonBuilder, ButtonStyle, Events,
} from 'discord.js';

const TOKEN = process.env.DISCORD_TOKEN;
const GUILD_ID = process.env.DISCORD_GUILD_ID;
const DRY = process.argv.includes('--dry-run');
const WITH_LATER = process.argv.includes('--with-later');
const FALLBACK = process.argv.includes('--reaction-fallback');

if (!TOKEN || !GUILD_ID) {
  console.error('DISCORD_TOKEN et DISCORD_GUILD_ID doivent être définis dans l’environnement.');
  process.exit(1);
}

const log = (...a) => console.log(DRY ? '[simulation]' : '[ok]', ...a);
const warnings = [];

// ---------------------------------------------------------------- Rôles
// Du plus haut au plus bas. Le rôle du bot est géré à la main (voir 9.2).
const ROLES = [
  { name: 'Fondateur',  color: 0xC9A227, hoist: true,  perms: [P.Administrator] },
  { name: 'Équipe',     color: 0x8E2B2B, hoist: true,
    perms: [P.ManageMessages, P.ManageThreads, P.KickMembers, P.BanMembers,
            P.ModerateMembers, P.ViewAuditLog, P.MentionEveryone] },
  { name: 'Modérateur', color: 0x3F6E8C, hoist: true,
    perms: [P.ManageMessages, P.ManageThreads, P.ModerateMembers, P.BanMembers,
            P.ViewAuditLog, P.MentionEveryone] },
  { name: 'Mécène',          color: 0xB5651D },
  { name: 'Testeur bêta',    color: 0x6B8E23 },
  { name: 'Testeur alpha',   color: 0x7A5C99 },
  { name: 'Français',        color: 0x2F4F8F },
  { name: 'English',         color: 0x2F7F6F },
  { name: 'Vétéran de la stratégie', color: 0x8A8A8A },
  { name: 'Joueur d’alliance',       color: 0x8A8A8A },
  { name: 'Joueur de 4X mobile',     color: 0x8A8A8A },
  { name: 'Joueur PvE et RPG',       color: 0x8A8A8A },
  { name: 'Curieux du développement',color: 0x8A8A8A },
  // Équivalents anglais (un rôle par langue, décision du 2026-10-30, à confirmer)
  { name: 'Strategy Veteran', color: 0x8A8A8A },
  { name: 'Alliance Player',  color: 0x8A8A8A },
  { name: 'Mobile 4X Player', color: 0x8A8A8A },
  { name: 'PvE & RPG Player', color: 0x8A8A8A },
  { name: 'Dev Curious',      color: 0x8A8A8A },
  { name: 'Membre',          color: 0xB0B0B0 },
];

// ---------------------------------------------------------- Arborescence
// vis : qui VOIT la catégorie (noms de rôles). '*' = tout le monde.
// Pour les salons : ro = lecture seule pour les membres (annonces).
const A = ChannelType.GuildAnnouncement, T = ChannelType.GuildText,
      F = ChannelType.GuildForum,        V = ChannelType.GuildVoice;

const TREE = [
  { name: 'COMMUN · COMMON', vis: ['Membre'], channels: [
    { name: 'bienvenue-welcome', type: T, ro: true, public: true,
      topic: 'Bienvenue à Kalendrath · Welcome to Kalendrath' },
    { name: 'règles-rules', type: T, ro: true, public: true,
      topic: 'Les Règles de la Table · The Rules of the Table' },
    { name: 'choix-de-langue-language', type: T, ro: true, public: true,
      topic: 'Choisissez votre langue · Choose your language' },
    { name: 'direction-artistique-art', type: T, ro: true,
      topic: 'Planches de style, bâtiments, unités · Style boards, buildings, units' },
    { name: 'outils-et-extensions-tools', type: F,
      topic: 'Outils de la communauté · Community tools' },
    { name: 'vocal-lounge', type: V },
  ]},
  { name: 'FRANÇAIS', vis: ['Français'], channels: [
    { name: 'news', type: A, ro: true, topic: 'News en français : jalons, chapitres, sondages' },
    { name: 'notes-de-version', type: A, ro: true, topic: 'Notes de version en français' },
    { name: 'devlog', type: A, ro: true, topic: 'Devlog en français, toutes les deux semaines' },
    { name: 'sondages', type: T, ro: true, topic: 'Sondages participatifs' },
    { name: 'discussion', type: T, topic: 'Discussion libre, en français' },
    { name: 'idées-et-retours', type: F, topic: 'Un fil par idée ou retour',
      tags: ['Idée', 'Retour', 'Interface', 'Équilibrage', 'Lore', 'Traité'] },
    { name: 'aide-et-questions', type: T, topic: 'Questions de jeu' },
    { name: 'alliances-recrutement', type: T, topic: 'Recrutement d’alliance' },
  ]},
  { name: 'ENGLISH', vis: ['English'], channels: [
    { name: 'news', type: A, ro: true, topic: 'News in English: milestones, chapters, polls' },
    { name: 'release-notes', type: A, ro: true, topic: 'Release notes in English' },
    { name: 'devlog', type: A, ro: true, topic: 'Devlog in English, every two weeks' },
    { name: 'polls', type: T, ro: true, topic: 'Participatory polls' },
    { name: 'general', type: T, topic: 'Open chat, in English' },
    { name: 'feedback', type: F, topic: 'One thread per idea or feedback',
      tags: ['Idea', 'Feedback', 'UI', 'Balance', 'Lore', 'Done'] },
    { name: 'help-and-questions', type: T, topic: 'Gameplay questions' },
    { name: 'alliances-recruitment', type: T, topic: 'Alliance recruitment' },
  ]},
  { name: 'ÉQUIPE · STAFF', vis: ['Équipe', 'Modérateur'], channels: [
    { name: 'équipe-général', type: T },
    { name: 'modération', type: T },
    { name: 'signalements', type: T },
    { name: 'automod-alertes', type: T },
    { name: 'journal-modération', type: T },
    { name: 'journal-serveur', type: T },
    { name: 'tickets-appel', type: F },
    { name: 'publication', type: T },
  ]},
];

const LATER = { name: 'PLUS TARD · LATER', vis: ['Testeur alpha', 'Testeur bêta'], channels: [
  { name: 'alpha-fr', type: T, only: ['Testeur alpha', 'Français'] },
  { name: 'alpha-en', type: T, only: ['Testeur alpha', 'English'] },
  { name: 'bêta-fr', type: T, only: ['Testeur bêta', 'Français'] },
  { name: 'beta-en', type: T, only: ['Testeur bêta', 'English'] },
]};

// ----------------------------------------------------------------- AutoMod
const KEYWORD_RULES = [
  { name: 'Kalendrath · Commerce réel', actions: 'block',
    keywords: ['*vend compte*', '*achète compte*', '*sell account*', '*buy account*',
               '*cheap kaelite*', '*kaelite pas cher*', '*boost service*'] },
  { name: 'Kalendrath · Tricherie', actions: 'alert',
    keywords: ['*bot farm*', '*botting*', '*macro farm*'] },
  { name: 'Kalendrath · Hameçonnage', actions: 'block', timeout: 86400,
    regex: ['discord\\.gift', 'free[- ]?nitro', 'steam.*gift', 'dlscord', 'discorcl'] },
  { name: 'Kalendrath · Invitations', actions: 'block',
    keywords: ['*discord.gg/*', '*discord.com/invite/*'], exemptChannels: [
      'outils-et-extensions-tools', 'alliances-recrutement', 'alliances-recruitment'] },
];

// -------------------------------------------------------------- Utilitaires
const client = new Client({ intents: [GatewayIntentBits.Guilds] });

async function ensureRole(guild, spec) {
  const found = guild.roles.cache.find((r) => r.name === spec.name);
  const data = {
    name: spec.name, color: spec.color, hoist: !!spec.hoist, mentionable: false,
    permissions: spec.perms ?? [],
  };
  if (!found) {
    log('rôle créé :', spec.name);
    return DRY ? { id: `dry-${spec.name}`, name: spec.name } : guild.roles.create({ ...data, reason: 'Mise en place Kalendrath' });
  }
  // Ne touche pas aux permissions d'un rôle existant sauf Administrateur/équipe définis ici.
  log('rôle présent, mis à jour :', spec.name);
  if (!DRY) await found.edit({ color: spec.color, hoist: !!spec.hoist });
  return found;
}

function overwritesFor(guild, roles, { vis, ro, public: isPublic, only }) {
  const everyone = guild.roles.everyone.id;
  const staff = ['Équipe', 'Modérateur'].map((n) => roles[n]?.id).filter(Boolean);
  const out = [];
  if (isPublic) {
    out.push({ id: everyone, allow: [P.ViewChannel, P.ReadMessageHistory], deny: [P.SendMessages, P.AddReactions] });
  } else {
    out.push({ id: everyone, deny: [P.ViewChannel] });
  }
  for (const n of (only ?? vis ?? [])) {
    if (!roles[n]) continue;
    out.push({
      id: roles[n].id,
      allow: [P.ViewChannel, P.ReadMessageHistory, P.AddReactions],
      ...(ro ? { deny: [P.SendMessages, P.CreatePublicThreads] } : { allow: [P.ViewChannel, P.ReadMessageHistory, P.AddReactions, P.SendMessages, P.CreatePublicThreads] }),
    });
  }
  for (const id of staff) {
    out.push({ id, allow: [P.ViewChannel, P.SendMessages, P.ManageMessages, P.ManageThreads, P.CreatePublicThreads] });
  }
  return out;
}

async function ensureCategory(guild, cat, roles) {
  const found = guild.channels.cache.find((c) => c.type === ChannelType.GuildCategory && c.name === cat.name);
  const permissionOverwrites = overwritesFor(guild, roles, { vis: cat.vis });
  if (found) { log('catégorie présente :', cat.name); if (!DRY) await found.permissionOverwrites.set(permissionOverwrites); return found; }
  log('catégorie créée :', cat.name);
  return DRY ? { id: `dry-${cat.name}` } : guild.channels.create({ name: cat.name, type: ChannelType.GuildCategory, permissionOverwrites });
}

async function ensureChannel(guild, parent, cat, spec, roles) {
  const found = guild.channels.cache.find((c) => c.name === spec.name && c.parentId === parent.id);
  const permissionOverwrites = overwritesFor(guild, roles, {
    vis: cat.vis, ro: spec.ro, public: spec.public, only: spec.only,
  });
  const base = { name: spec.name, type: spec.type, parent: parent.id, topic: spec.topic, permissionOverwrites };
  if (spec.type === F && spec.tags) base.availableTags = spec.tags.map((name) => ({ name }));
  if (spec.type === F) base.rateLimitPerUser = 0;
  if (spec.type === V) delete base.topic;
  if (found) {
    log('salon présent :', `${cat.name} › ${spec.name}`);
    if (!DRY) {
      await found.permissionOverwrites.set(permissionOverwrites);
      if (spec.topic && found.topic !== spec.topic && 'setTopic' in found) await found.setTopic(spec.topic);
    }
    return found;
  }
  log('salon créé :', `${cat.name} › ${spec.name}`);
  return DRY ? { id: `dry-${spec.name}` } : guild.channels.create(base);
}

async function ensureAutoMod(guild, roles, logChannelName) {
  const rules = await guild.autoModerationRules.fetch().catch(() => null);
  const alertChannel = guild.channels.cache.find((c) => c.name === logChannelName);
  const exemptRoles = ['Équipe', 'Modérateur'].map((n) => roles[n]?.id).filter(Boolean);

  const actions = (kind, timeout) => {
    const a = [];
    if (kind === 'block') a.push({ type: AutoModerationActionType.BlockMessage });
    if (alertChannel) a.push({ type: AutoModerationActionType.SendAlertMessage, metadata: { channel: alertChannel.id } });
    if (timeout) a.push({ type: AutoModerationActionType.Timeout, metadata: { durationSeconds: timeout } });
    return a;
  };
  const ensure = async (data) => {
    const existing = rules?.find((r) => r.name === data.name);
    if (existing) { log('AutoMod présente :', data.name); if (!DRY) await existing.edit(data); return; }
    log('AutoMod créée :', data.name);
    if (!DRY) await guild.autoModerationRules.create({ ...data, enabled: true });
  };

  await ensure({
    name: 'Kalendrath · Insultes', eventType: AutoModerationRuleEventType.MessageSend,
    triggerType: AutoModerationRuleTriggerType.KeywordPreset,
    triggerMetadata: { presets: [
      AutoModerationRuleKeywordPresetType.Profanity,
      AutoModerationRuleKeywordPresetType.SexualContent,
      AutoModerationRuleKeywordPresetType.Slurs] },
    actions: actions('block'), exemptRoles,
  });
  await ensure({
    name: 'Kalendrath · Spam', eventType: AutoModerationRuleEventType.MessageSend,
    triggerType: AutoModerationRuleTriggerType.Spam,
    actions: actions('block'), exemptRoles,
  });
  await ensure({
    name: 'Kalendrath · Mentions', eventType: AutoModerationRuleEventType.MessageSend,
    triggerType: AutoModerationRuleTriggerType.MentionSpam,
    triggerMetadata: { mentionTotalLimit: 5 },
    actions: actions('block', 3600), exemptRoles,
  });
  for (const r of KEYWORD_RULES) {
    const exemptChannels = (r.exemptChannels ?? [])
      .map((n) => guild.channels.cache.filter((c) => c.name === n).map((c) => c.id)).flat();
    await ensure({
      name: r.name, eventType: AutoModerationRuleEventType.MessageSend,
      triggerType: AutoModerationRuleTriggerType.Keyword,
      triggerMetadata: { keywordFilter: r.keywords ?? [], regexPatterns: r.regex ?? [] },
      actions: actions(r.actions, r.timeout), exemptRoles, exemptChannels,
    });
  }
}

async function ensureRulesAndLanguageMessage(guild) {
  const rules = guild.channels.cache.find((c) => c.name === 'règles-rules');
  if (!rules || DRY) return;
  const msgs = await rules.messages.fetch({ limit: 10 });
  if (msgs.some((m) => m.author.id === client.user.id)) {
    log('règles déjà publiées (non modifiées) : copiez-les depuis la spécification si elles ont changé');
    return;
  }
  warnings.push('Les règles (section 6 de la spécification) sont à publier dans #règles-rules : le script ne les inclut pas pour éviter de diverger du texte validé.');
}

async function ensureLanguageButtons(guild) {
  if (!FALLBACK) return;
  const ch = guild.channels.cache.find((c) => c.name === 'choix-de-langue-language');
  if (!ch) return;
  if (DRY) return log('boutons de langue publiés dans', ch.name);
  const msgs = await ch.messages.fetch({ limit: 10 });
  if (msgs.some((m) => m.author.id === client.user.id && m.components.length)) {
    return log('boutons de langue déjà présents');
  }
  const row = new ActionRowBuilder().addComponents(
    new ButtonBuilder().setCustomId('lang_fr').setLabel('Français').setStyle(ButtonStyle.Primary),
    new ButtonBuilder().setCustomId('lang_en').setLabel('English').setStyle(ButtonStyle.Primary),
    new ButtonBuilder().setCustomId('lang_both').setLabel('Les deux · Both').setStyle(ButtonStyle.Secondary),
  );
  await ch.send({ content: 'Dans quelle langue suivez-vous l’aventure ? · Which language will you follow the adventure in?', components: [row] });
  warnings.push('Les boutons sont publiés, mais leur gestion exige un bot qui reste en ligne (interactionCreate → attribuer les rôles Français/English). Le script ne le fait pas.');
}

// ------------------------------------------------------------------- Main
client.once(Events.ClientReady, async () => {
  try {
    const guild = await client.guilds.fetch(GUILD_ID);
    await guild.roles.fetch();
    await guild.channels.fetch();

    if (!guild.features.includes('COMMUNITY')) {
      warnings.push('Mode Communauté inactif : salons d’annonces, forums et Onboarding indisponibles. Activez-le, puis relancez.');
    }

    const roles = {};
    for (const spec of ROLES) roles[spec.name] = await ensureRole(guild, spec);

    const tree = WITH_LATER ? [...TREE, LATER] : TREE;
    for (const cat of tree) {
      const parent = await ensureCategory(guild, cat, roles);
      for (const ch of cat.channels) await ensureChannel(guild, parent, cat, ch, roles);
    }

    await guild.channels.fetch();
    await ensureAutoMod(guild, roles, 'automod-alertes');
    await ensureRulesAndLanguageMessage(guild);
    await ensureLanguageButtons(guild);

    warnings.push(
      'À régler à la main : Onboarding (questions langue et profil, section 5), écran de sélection (règles), canal des règles et des mises à jour de la communauté dans Paramètres › Communauté, ordre des rôles (rôle du bot sous Équipe).',
    );
    console.log('\nTerminé.');
    for (const w of warnings) console.log('  ⚠', w);
  } catch (e) {
    console.error('Échec :', e);
    process.exitCode = 1;
  } finally {
    await client.destroy();
  }
});

client.login(TOKEN);
```

### 9.5 Limites connues du script

- **Onboarding et écran de sélection** : laissés à la main (section 5.2). Les points d'accès existent côté discord.js (`guild.editOnboarding`), mais leur forme évolue ; mieux vaut les régler dans l'interface une fois, avec les textes de la section 5.
- **Boutons de langue (plan B)** : le script publie le message, mais un bot doit écouter les clics pour attribuer les rôles. Non inclus : l'Onboarding rend ce plan B inutile tant qu'il fonctionne.
- **Règles** : texte à coller depuis la section 6 pour éviter deux versions divergentes.
- **Rôles de profil** : un rôle par langue (noms français et anglais) est créé, sous réserve de confirmation de Gregory.
- **Rôle du bot** et ordre hiérarchique : à vérifier à la main après le premier lancement.
- **Suppression** : jamais. Retirer un salon ou un rôle du script ne le retire pas du serveur.
- **Mise à jour des permissions** : relancer le script **remet** les permissions des salons et catégories qu'il gère à l'état décrit ici. Toute personnalisation manuelle de ces salons sera écrasée ; pour ajouter un salon, le déclarer dans `TREE`.

---

## 10. Ordre de mise en œuvre

1. Activer le mode Communauté, créer le bot (9.2).
2. Lancer `node setup-discord.mjs --dry-run`, relire, puis le lancer pour de bon.
3. Configurer l'Onboarding et l'écran de sélection à la main (section 5).
4. Publier les règles FR/EN dans `#règles-rules` et le pitch dans `#bienvenue-welcome`.
5. Vérifier les permissions avec un compte de test sans rôle, puis avec `Français`, puis `English`.
6. Activer le suivi d'annonces : à partir d'un second serveur de test, suivre `#news` et `#notes-de-version`, vérifier la publication automatique.
7. Brancher le bot de publication (dépôt GitHub → Discord, plan marketing sections 6 et 7) **[chantier à part]**.
8. Au jalon de l'alpha : relancer avec `--with-later`.

---

## 11. Décisions ouvertes

### Décisions closes (Gregory, 2026-10-30)

1. **`@everyone`** : réservé aux modérateurs et à Gregory.
2. **Pouvoirs de la modération** : un modérateur peut bannir.
3. **Équipe de départ** : Gregory est seul administrateur et modérateur au début.
4. **Outils** : la commande `/signaler` et le bot de publication GitHub vers Discord sont acceptés. Gregory donnera ensuite l'accès Discord pour la mise en place.
5. **Piste à l'étude** : bots Grok pour la communication et la modération, voir [etude-grok-bots.md](etude-grok-bots.md). Principe : l'IA propose, l'humain décide.

### Décisions restantes

1. **Rôles de profil** : un nom par langue (« Joueur » / « Player »), retenu mais **en attente de confirmation de Gregory**.
2. **Durées** : conservation du journal de modération (12 mois proposés) et délai de réponse à un appel (7 jours proposés).
3. **Salons d'alliance** dès l'alpha, ou seulement à la bêta ?
4. **Hébergement du script** : le dépôt (dossier `tools/discord/`), ou en dehors ? Cette spécification ne l'y place pas, par consigne.
