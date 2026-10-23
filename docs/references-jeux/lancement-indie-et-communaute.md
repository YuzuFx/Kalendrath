# Lancement en solo : communauté, vitrine, panel

*Étude thématique ouverte le 2026-10-23, dans le cadre du comparatif élargi. Question : comment une personne seule, ou une très petite équipe, construit une communauté et lance un jeu de stratégie en ligne persistant ? Contexte : Gregory veut monter un Discord et un site vitrine avant d'ouvrir le sondage d'octobre ([docs/sondages/2026-10-rythme-et-format-de-serveur.md](../sondages/2026-10-rythme-et-format-de-serveur.md)) à un panel plus large. Il a du mal à trouver où le diffuser. Les décisions qui en sortent vont dans la [feuille de route](../feuille-de-route-projet-jeu.md), pas ici.*

**Fiabilité.** Chaque fait porte une mention : *vérifié* (source officielle ou plusieurs sources concordantes), *probable* (une source sérieuse) ou *incertain* (source isolée, miroir, estimation). Les passages marqués **Recommandation** sont des conseils de pratique, pas des faits sourcés.

**Limites de la recherche.** Reddit refuse la lecture directe de ses pages, depuis ce poste comme depuis l'outil de lecture web. Les règles des subreddits viennent donc de guides tiers datés de 2026, de miroirs et d'agrégateurs : à relire dans la barre latérale de chaque subreddit le jour où l'on poste. Le budget de recherche web de la session s'est épuisé en cours de route. Plusieurs pistes restent donc non vérifiées : r/ogame, r/4Xgaming, r/MMORPG, communautés francophones hors OGame, chiffres Kickstarter du jeu vidéo. Elles sont signalées comme telles et peuvent faire l'objet d'une seconde passe. « Elgea », cité dans la commande : **non trouvé**, aucun jeu de ce nom dans les résultats (peut-être une autre orthographe).

---

## 1. Résumé en 5 lignes

1. Les jeux persistants indépendants qui ont duré (OGame, Travian, Kingdom of Loathing, Torn) ont tous ouvert **très tôt une version jouable et rudimentaire**, puis ont grandi par le bouche-à-oreille. Aucun n'a constitué sa communauté avant d'avoir un jeu.
2. Les grandes communautés de joueurs n'acceptent l'autopromotion que pour du **jouable** : r/playmygame exige une version gratuite accessible, r/incremental_games du contenu jouable, et r/WebGames refuse même toute inscription. Avant l'alpha, seuls les subreddits de développeurs (r/IndieDev, r/gamedevscreens, fils hebdomadaires de r/gamedev) accueillent un projet en cours.
3. Le public le plus ciblé existe déjà et il est petit : le Discord d'OGameX (151 membres, 36 en ligne), le forum français officiel d'OGame (actif, mais c'est celui de Gameforge) et le Discord francophone « Serveur Privé » (4 776 membres).
4. **Recommandation :** posséder sa liste (e-mails de la vitrine) plutôt que dépendre du Discord, publier un devlog court toutes les deux semaines, annoncer des jalons et jamais des dates, et remplir le Discord avec le panel connu avant d'y inviter des inconnus.
5. Kickstarter est déconseillé avant d'avoir un public : Screeps, pourtant déjà jouable, n'a réuni que 11 493 $ auprès de 310 contributeurs. Le modèle « don contre objet », à la façon de Kingdom of Loathing, est un meilleur repère pour plus tard (Phase 8).

---

## 2. Ce que montrent les précédents

| Jeu | Départ | Première version | Croissance | Financement des débuts | Fiabilité |
|---|---|---|---|---|---|
| **OGame** | Projet personnel d'Alexander Rösner, sorti le 3 octobre 2002 ; société Gameforge fondée en décembre 2003 avec Klaas Kersting | Environ deux mois de développement selon le wiki des fans, « pour s'amuser », sans projet commercial | Base de Gameforge, qui revendique ensuite plus de 100 millions de joueurs, tous jeux confondus | Aucun au départ ; Gameforge devient l'un des premiers éditeurs occidentaux en free-to-play | Dates *vérifiées* (Wikipedia, Gameforge) ; deux mois et contexte *incertains* (wiki des fans, via un résumé de recherche) |
| **Travian** | Projet de loisir en PHP de Gerhard Müller, étudiant en chimie à Munich, sorti en juin 2004 | Version 2 neuf mois plus tard (mars 2005) | « Succès inattendu » : société fondée en juillet 2005 avec son frère ; plus de 5 millions de joueurs sur plus de 300 serveurs à son pic | Compte Plus (files de construction, carte agrandie) et bannières publicitaires, puis l'Or | *Probable* (Wikipedia ; les dates de fondation varient entre sources : début 2005, juillet 2005) |
| **Kingdom of Loathing** | Zack Johnson, première version écrite en environ une semaine, sortie en février 2003 | Contenu écrit « au fil de la plume » | 300 000 comptes la première année ; 100 000 à 150 000 joueurs réguliers en 2008 ; communauté réputée accueillante (wiki, scripts, rencontres, radio) | Ni pub ni abonnement : un don de 10 $ donne un « Mr. Accessory », objet échangeable entre joueurs. Ce modèle, vu au départ comme accessoire, a permis à Johnson de quitter son emploi environ 18 mois après la sortie | *Probable* (Wikipedia) ; la date exacte varie selon la source (31 janvier, 10, 11 ou 23 février 2003) |
| **Torn** | Joe Chedburn, Britannique, 16 ans à la sortie selon DroidGamers | Alpha en août 2004, sortie à la fin de la bêta, le 15 novembre 2004 | Plus d'un million d'utilisateurs en 2008 ; appli Android en 2018, puis iOS ; toujours exploité par Torn Ltd | Packs « donateur » | Dates *probables* (Wikipedia, Backloggd) ; âge *incertain* (une source) ; l'idée d'un développeur « seul » n'est **confirmée par aucune source** |
| **Screeps** | Petite équipe, MMO de stratégie pour programmeurs | Aperçu en accès anticipé en 2015, Steam Greenlight | Sortie de l'accès anticipé le 16 novembre 2016 ; suite *Screeps: Arena* sortie le 1er novembre 2025 | Indiegogo en 2015-2016 : 310 contributeurs, 11 493 $, 144 % de l'objectif ; puis abonnement ou accès à vie (les sources se contredisent sur le modèle de départ) | *Vérifié* (blog officiel) pour la campagne |
| **OGameX** (notre base) | Clone open source d'OGame, projet de fans sans fonction commerciale | Démo publique en ligne (main.ogamex.dev) | 327 étoiles et 129 forks sur GitHub ; Discord de 151 membres, dont 36 en ligne le 2026-10-23 | Aucun | *Vérifié* (GitHub, API Discord) |

**Ce qu'on en tire.**

- **Le jouable précède la communauté.** Les quatre succès des années 2000 ont ouvert une version brute en quelques semaines ou quelques mois, puis l'ont améliorée en public. Leur communauté s'est formée *dans* le jeu : forums, wikis de joueurs, alliances. Aucun n'a commencé par une liste d'attente.
- **Le contexte n'est plus le même.** En 2002-2004, le jeu par navigateur était un marché neuf, sans magasin d'applis ni Discord, et un bon jeu se diffusait seul. Aujourd'hui, l'offre est saturée et la découverte coûte plus cher : on ne peut pas transposer ces succès tels quels (*constat, non chiffré*).
- **Le financement est venu après les joueurs.** Compte Plus de Travian, Mr. Accessory de Kingdom of Loathing, packs donateur de Torn : chaque fois, l'argent a suivi une base de joueurs déjà présente. Le seul financement participatif du lot, Screeps, est resté modeste, alors que le jeu existait et avait l'aval de Steam Greenlight.
- **Les jeux qui durent se mesurent en décennies.** Torn a mis neuf ans à livrer son « Crimes 2.0 », annoncé en 2014 et sorti en 2023. Kingdom of Loathing tourne depuis 2003. Un projet solo persistant est un marathon : le rythme de communication doit tenir des années, pas quelques mois.

---

## 3. Le Discord de devlog

**Recommandation** (pratiques courantes, non chiffrées) :

- **Peu de salons au départ.** Un serveur de 15 personnes et 25 salons a l'air vide. Commencer avec six ou sept salons, en ajouter quand un sujet déborde.
- **Proposition de structure pour Kalendrath :**
  - `#bienvenue-et-règles` : pitch en trois lignes, règles, lien vers la vitrine.
  - `#annonces` : lecture seule, un message par devlog ou par jalon.
  - `#devlog` : billets complets, captures, avant/après.
  - `#discussion` : général.
  - `#idées-et-retours` : salon de type **forum** (un fil par idée, étiquettes « mécanique », « interface », « lore »), plus facile à relire qu'un flux de discussion.
  - `#direction-artistique` : planches Midjourney, votes par réactions.
  - `#sondages` : liens vers les sondages et résultats.
  - Plus tard, `#alpha` réservé au rôle Testeur.
- **Rôles choisis à l'arrivée** (écran d'accueil de Discord) : « Vétéran OGame », « Travian / Grepolis », « 4X mobile (Rise of Kingdoms, Call of Dragons…) », « Joueur PvE / RPG », « Curieux du développement ». Ces rôles **sont** le panel : ils permettent de compter les profils et de cibler un sondage.
- **Modération dès le premier jour :** AutoMod de Discord (liens, mots), niveau de vérification moyen, et une seconde personne de confiance avec les droits de modération pour les absences de Gregory.
- **Pas de bots au départ**, en dehors des outils natifs. Les sondages natifs de Discord suffisent pour les petites questions.
- **Le Discord n'est pas une liste.** On ne choisit pas qui voit une annonce, l'algorithme de notifications décide. La liste d'e-mails de la vitrine reste le seul canal que le projet possède vraiment (voir 4).
- **Ressource :** le Discord « How To Market A Game » de Chris Zukowski (27 103 membres, 9 391 en ligne le 2026-10-23, *vérifié* par l'API Discord) est une bonne adresse pour poser des questions de marketing indépendant.

---

## 4. Site vitrine et liste d'attente

**Recommandation :**

- **Une page unique**, en français d'abord (cohérent avec la décision du 2026-09-15), avec : le pitch en une phrase (heroic fantasy, stratégie persistante, PvE d'abord, « pas de pay-to-win » avec le plafond de +30 % expliqué) ; trois ou quatre visuels de la DA (planche de style, un bâtiment en trois paliers, un cadre d'interface) ; une rubrique « Où en est le projet » (fait / en cours / plus tard), **sans date** ; un formulaire d'e-mail (« Prévenez-moi à l'ouverture de l'alpha ») ; le lien Discord.
- **Transparence sur l'IA générative.** Les visuels viennent de Midjourney. Plusieurs communautés de jeux et de développeurs ont des règles sur l'IA générative, voire des interdictions. Je n'ai pas pu les vérifier une par une dans cette passe : c'est le premier point à lire dans chaque barre latérale. **Recommandation :** l'écrire clairement sur la vitrine (« direction artistique conçue avec Midjourney »). Un public qui le découvre seul le prend en général plus mal.
- **RGPD :** une liste d'e-mails suppose une mention d'information, un consentement explicite et un lien de désinscription. Un service d'envoi européen règle la plupart de ces points. Cela avance une partie de la tâche « CGU/mentions légales » de la Phase 7.
- **Domaine :** la Phase 7 prévoit de réserver le nom de domaine. Il faut l'avancer, avec les identifiants Discord, Bluesky, X, YouTube et Reddit au nom de Kalendrath. Ça ne coûte presque rien et ça évite qu'on les prenne.

---

## 5. Devlogs : où et à quel rythme

| Canal | Ce qui marche | Ce qui échoue | Fiabilité |
|---|---|---|---|
| **Site + liste d'e-mails** | Le billet complet, archivé, qui sert de référence | — | Recommandation |
| **Reddit (subreddits de développeurs)** | Courtes vidéos natives de moins de 60 s, avant/après, devlogs avec de vrais chiffres, questions sincères, coulisses techniques | Texte publicitaire, même post sur plusieurs subreddits le même jour, « ajoutez mon jeu à votre liste de souhaits » | *Probable* (presskit.gg, janvier 2026 ; Steam Page Analyzer, septembre 2026) |
| **YouTube** | Format long et sujet clair (« je refais OGame en heroic fantasy, sans savoir coder ») | Non étudié dans cette passe | — |
| **X / Bluesky** | Le rendez-vous #ScreenshotSaturday, partagé par plusieurs communautés le samedi | Non chiffré | *Incertain* |

**L'angle qui distingue Kalendrath.** Un non-développeur qui reconstruit un clone d'OGame entièrement avec un agent d'IA, sur un socle open source : c'est un vrai sujet de devlog pour r/IndieDev, r/gamedev et YouTube, au-delà du jeu lui-même. Il attire aussi les critiques : c'est à assumer franchement, pas à cacher.

---

## 6. Où trouver des joueurs du genre

Les effectifs varient d'une source à l'autre : elles sont signalées. « Avant l'alpha » indique si la communauté accepte un projet sans version jouable.

| Communauté | Taille, activité | Règle d'autopromotion connue | Avant l'alpha ? | Fiabilité |
|---|---|---|---|---|
| **Discord OGameX** (discord.gg/HJ4QRxxB5N) | 151 membres, 36 en ligne | Non lue. Discord d'un projet open source : se présenter comme fork, contribuer d'abord | **Oui, avec tact** | *Vérifié* (API Discord, README) |
| **Forum français officiel d'OGame** (board.fr.ogame.gameforge.com) | 15 112 membres, messages datés de moins d'une heure | Règles non lues. Forum de l'éditeur : la promotion d'un jeu concurrent y est très probablement interdite | **Non** (lire, ne pas poster) | Activité *vérifiée* ; règle *incertaine* |
| **Discord « Serveur Privé »** (francophone) | 4 776 membres, 573 en ligne | Se présente comme lieu de présentation et de promotion de serveurs privés (Minecraft, GTA, Dofus…) | Oui, pour un serveur ouvert | *Probable* (page Discord) |
| **r/StrategyGames** | Environ 34 000 membres, en hausse de 64 % sur un an | Se décrit comme lieu où « les développeurs peuvent montrer leurs annonces » ; les étiquettes « Self-promotion » et « DevPost » dominent | Oui | *Probable* (GummySearch) |
| **r/IndieDev** | 260 000 à 300 000 et plus | Entre développeurs : progrès, demandes de retours, jalons | **Oui** | *Probable* (deux guides, effectifs divergents) |
| **r/gamedevscreens** | Environ 58 000 | Captures et extraits de travail en cours, tolère la promo | **Oui** (visuels) | *Probable* |
| **r/gamedev** | 1,8 à 1,9 million | Autopromotion seulement dans les fils hebdomadaires (Screenshot Saturday, Feedback Friday…) ou « d'un point de vue de développeur » ; les postmortems chiffrés marchent | Oui, dans les fils | *Incertain* (wiki via miroir ancien, guides 2026) |
| **r/IndieGaming** | 500 000 à 700 000 et plus | Promo courante, avec des limites de fréquence ; public de joueurs : il faut une vidéo | Possible, plutôt pour un jalon | *Probable* (effectifs divergents) |
| **r/indiegames** | Environ 320 000 | Étiquette « Promotion » obligatoire, retrait rapide en cas d'erreur | Possible | *Probable* |
| **r/DestroyMyGame** | Environ 59 000 | Seulement son propre jeu, en vidéo, pour des critiques franches | Oui (tester une bande-annonce) | *Probable* |
| **r/playmygame** | 60 000 à 105 000 | Exige une version jouable, gratuite et accessible ; les bandes-annonces seules sont retirées | **Non** (attendre l'alpha) | *Probable* (effectifs divergents) |
| **r/incremental_games** | Non trouvé | Récemment : 30 jours entre deux posts, contenu jouable obligatoire, fil Feedback Friday entre-temps, interdiction de citer son jeu dans le fil de recommandations | Non | *Incertain* (miroir, date non précisée) |
| **r/WebGames** | Environ 146 000 | « Pas de téléchargement, **pas d'inscription**, pas de plugin » : incompatible avec un jeu à comptes | **Jamais** | *Probable* (GummySearch) |
| **r/Games** | Plus de 3 millions | Promo seulement le dimanche (Indie Sunday), avec un format imposé ; au-delà de 10 % d'autopromotion dans l'activité d'un compte, la suite est retirée | Après l'alpha | *Probable* |
| **Discord « How To Market A Game »** | 27 103 membres | Communauté de conseil, pas de joueurs | Oui (conseils) | *Vérifié* (API Discord) |
| **r/ogame, r/Travian, r/tribalwars, r/Grepolis, r/4Xgaming, r/MMORPG** | Non vérifié dans cette passe | Non vérifié | — | **À vérifier** (seconde passe) |
| **Communautés francophones** (forum Jeux par navigateur de jeuxvideo.com, r/jeuxvideo, Discords FR de développement) | Le forum jeuxvideo.com refuse la lecture automatique (403) ; le reste n'a pas été vérifié | — | — | **À vérifier** |

**Règles communes, valables partout** (*probable*, guides de 2026) :

- **Un compte vivant avant de poster.** Les modérateurs regardent l'âge du compte, le karma gagné dans la communauté et l'historique. Beaucoup filtrent automatiquement les comptes de moins d'une semaine ou sans karma. Il faut commenter sincèrement pendant des semaines avant le premier post sur Kalendrath.
- **Le ratio.** La vieille règle de Reddit, « 1 post de promotion pour 10 contributions », est officiellement retirée, mais r/Games l'applique encore à 10 %. Les guides conseillent de rester nettement sous un quart de son activité.
- **Pas de rafale.** Au plus un post par subreddit et par mois, étalé sur plusieurs jours, avec un titre adapté à chaque communauté.
- **Ne pas discuter un retrait.** Pas de republication, pas de contournement de bannissement.

**Conséquence pour le sondage.** Pour un public froid, le sondage n'a presque aucun lieu légitime tant que rien n'est jouable. La voie qui respecte les règles est de **poser la question comme une discussion**, sans lien d'abord : « Serveur sans fin, serveur de 6 mois ou cité persistante avec des saisons : vous préférez quoi, et pourquoi ? ». À poster sur r/StrategyGames ou r/IndieDev, le lien du sondage ne venant qu'en commentaire si les règles le permettent. Les réponses écrites valent souvent mieux que des cases cochées.

---

## 7. Playtests, alpha fermée, panel

**Recommandation :**

- **Le panel se construit par cercles.** (1) Les amis et le panel connu : ils remplissent le Discord et répondent au sondage tel qu'il est. (2) Les gens arrivés par la vitrine et les devlogs, classés par les rôles du Discord. (3) Le public froid, seulement quand il y a quelque chose à essayer.
- **Garder la trace des profils.** Pour chaque réponse au sondage, noter d'où vient la personne (amis, Discord OGameX, Reddit…). Sans cela, impossible de savoir si « 60 % préfèrent un serveur sans fin » reflète les vétérans d'OGame ou les joueurs mobiles.
- **Alpha par vagues.** Inviter depuis la liste d'e-mails par vagues de 10 à 30 personnes, en priorité les profils qui manquent. Une alpha à ratios ×3 à ×5 (décision prise) se teste en quelques semaines : on peut donc enchaîner des vagues courtes.
- **Un rôle Testeur et un salon fermé.** Pas besoin d'accord de confidentialité pour un projet de ce type : laisser les testeurs montrer le jeu fait de la publicité gratuite.
- **Retours structurés.** Un formulaire court en fin de vague (ce qui t'a fait revenir, ce qui t'a fait partir, à quel moment), plus les chiffres du serveur (où les joueurs arrêtent de se connecter). Cela nourrit directement le simulateur de theorycrafting.

---

## 8. Communiquer sans promettre de date

**Recommandation :**

- **Une cadence fixe, des contenus variables.** Un devlog toutes les deux semaines, même court (une image et trois paragraphes), vaut mieux que de longs billets irréguliers. Une cadence tenue rassure bien plus qu'une date.
- **Des jalons, jamais des dates.** « Prochain jalon : écran Héros jouable en alpha interne », et non « alpha en mars ». La feuille de route publique montre trois colonnes (fait / en cours / plus tard), comme la feuille de route du projet.
- **Dire ce qui ne marche pas.** Un devlog « ce qu'on a jeté » (la décision de ne pas faire de reskin, les 113 609 lignes de CSS abandonnées) intéresse les développeurs plus qu'un énième visuel.
- **Annoncer les pauses.** Un projet solo s'arrête parfois des semaines. Un message « pause jusqu'à tel jalon » évite qu'on croie le projet mort.

---

## 9. Kickstarter, Patreon ou rien ?

- **Kickstarter : non, pas maintenant.** Le financement participatif récompense un public déjà constitué. Screeps, jouable et validé par Steam Greenlight, n'a réuni que 11 493 $ auprès de 310 personnes (*vérifié*). Je n'ai pas trouvé de taux de réussite à jour pour la catégorie jeu vidéo : la page de statistiques de Kickstarter renvoie désormais vers un bilan 2025 sans ce chiffre. Une campagne ratée est aussi un signal négatif public, difficile à effacer.
- **Patreon ou Ko-fi : plus tard, peut-être.** Cela n'a de sens qu'avec un rythme de devlog tenu depuis des mois et quelques centaines d'abonnés. Il faut aussi vérifier que des contreparties (accès anticipé, nom dans le jeu) ne créent pas d'avantage de jeu, à cause du plafond de +30 %.
- **Le repère pour la Phase 8 : Kingdom of Loathing.** Un don de 10 $ contre un objet échangeable entre joueurs a fait vivre un créateur seul à plein temps en 18 mois environ (*probable*). C'est un modèle cohérent avec « pas de pay-to-win » : à verser à l'audit des boutiques.

---

## 10. Plan d'action pour Kalendrath

*Séquencé par déclencheurs, pas par dates.*

**Étape 0 — Fondations (1 à 2 sessions)**
1. Réserver le nom de domaine (avancé depuis la Phase 7) et les identifiants Kalendrath sur Discord, Bluesky, X, YouTube et Reddit.
2. Créer un compte Reddit au nom du projet ou de Gregory et **commencer à commenter dès maintenant** dans r/StrategyGames, r/IndieDev et r/gamedev, sans parler de Kalendrath. Le compte sera crédible dans un à deux mois.
3. Lire les règles de chaque communauté du tableau 6, en priorité celles sur l'IA générative, et compléter le tableau.

**Étape 1 — Vitrine et Discord (2 à 3 sessions)**
4. Page vitrine unique (contenu de la partie 4) avec formulaire d'e-mail conforme au RGPD.
5. Discord à six ou sept salons, rôles d'accueil, AutoMod, un second modérateur.
6. **Remplir avant d'ouvrir :** inviter le panel connu et les amis (objectif indicatif : une vingtaine de personnes) et publier trois ou quatre contenus (planche de style, paliers d'un bâtiment, premier devlog) avant d'inviter un inconnu.

**Étape 2 — Sondage, cercle 1**
7. Envoyer le sondage d'octobre tel quel au panel connu, via le Discord. Les réponses arrivent étiquetées par les rôles.

**Étape 3 — Devlogs réguliers (en continu)**
8. Un devlog toutes les deux semaines, sur la vitrine, la liste d'e-mails et #annonces.
9. Une fois par mois, un extrait adapté à un seul subreddit de développeurs : r/gamedevscreens pour les visuels, r/IndieDev pour l'avancement, Screenshot Saturday de r/gamedev.
10. Se présenter sur le Discord OGameX comme fork et **faire remonter des correctifs en amont**. Cela respecte le principe de rester proche de l'upstream, et c'est la meilleure carte de visite auprès des seuls passionnés de clones d'OGame identifiés.

**Étape 4 — Sondage, cercle 2 (quand le Discord compte quelques dizaines de membres actifs)**
11. Version « public froid » du sondage (introduction et conclusion réécrites, cf. la note du 22/10). Elle est diffusée par la liste d'e-mails et sous forme de **question de discussion** sur r/StrategyGames et r/IndieDev.

**Étape 5 — Alpha fermée (quand une version est jouable de bout en bout, même sous OGameX)**
12. Vagues de 10 à 30 testeurs issus de la liste, ratios ×3 à ×5, formulaire de retour à chaque fin de vague.
13. C'est seulement à ce stade qu'on ouvre les communautés qui exigent du jouable : r/playmygame, r/IndieGaming, r/Games (Indie Sunday), Discord « Serveur Privé ».

**Étape 6 — Ouverture publique (Phase 7)**
14. Communautés du genre (r/ogame, r/Travian, r/tribalwars… après vérification), presse spécialisée du jeu par navigateur, annuaires de jeux. Kickstarter et Patreon restent hors sujet tant que la liste d'e-mails n'a pas des centaines d'inscrits actifs.

---

## 11. Leçons pour Kalendrath

1. **La communauté se forme autour d'un jeu, pas d'une promesse.** Les quatre précédents ont ouvert un jeu rudimentaire au bout de quelques semaines ou quelques mois. → *Cela contredit en partie l'idée d'un stock d'environ un an de contenu **avant l'ouverture**. Le stock est pertinent pour l'ouverture publique, pas pour l'alpha fermée. Proposition : séparer nettement les deux et ouvrir une alpha fermée par vagues dès qu'une boucle est jouable, même sur l'interface OGameX, sans attendre la fin de la Phase 3c.*
2. **Le panel élargi n'existe pas encore : il se construit.** Les grandes communautés de joueurs refusent la promotion sans jouable (r/playmygame, r/incremental_games) ou sans inscription (r/WebGames). → *La décision de structurer Discord et vitrine avant le sondage est juste. Il faut y ajouter les cercles : sondage d'abord au panel connu, puis question de discussion sur Reddit, et le vrai panel froid avec l'alpha. Ne pas attendre du sondage d'octobre des réponses représentatives des joueurs du genre.*
3. **Le public le plus ciblé est en amont.** OGameX (151 membres sur Discord, 327 étoiles sur GitHub) réunit exactement des passionnés de clones d'OGame. → *Contribuer en amont sert à la fois la sécurité (le principe du CLAUDE.md) et la visibilité.*
4. **L'IA générative est un risque de réception à traiter avant la vitrine.** Les visuels et le code passent par l'IA. → *Le dire d'emblée, et vérifier les règles de chaque communauté avant de poster un visuel Midjourney (non vérifié dans cette passe).*
5. **Le plafond de +30 % est un argument de communication.** Les critiques de pay-to-win sont le principal reproche fait au genre (cf. leçon 9 du [comparatif](../references-jeux-du-genre.md)). → *En faire une ligne de la vitrine, et en Phase 8 regarder le modèle « don contre objet échangeable » de Kingdom of Loathing.*
6. **Un projet persistant solo dure des années.** Torn a mis neuf ans à livrer une refonte, Kingdom of Loathing tourne depuis 2003. → *Choisir un rythme de communication tenable pendant des années (un devlog toutes les deux semaines), et rendre visible la feuille de route plutôt que des dates.*

---

## 12. Sources

| Source | Utilisée pour | Fiabilité |
|---|---|---|
| https://en.wikipedia.org/wiki/OGame | Date de sortie d'OGame | Vérifié |
| https://en.wikipedia.org/wiki/Gameforge | Fondation de Gameforge (décembre 2003, Rösner et Kersting) | Vérifié |
| https://ogame.fandom.com/wiki/History_Of_OGame | Deux mois de développement, projet « pour s'amuser » (page non lisible directement, lue via un résumé de recherche) | Incertain |
| https://vandal.elespanol.com/noticia/1350707593/ogame-sigue-vivo-y-ha-superado-los-100-millones-de-jugadores/ | 100 millions de joueurs (titre seul) | Incertain |
| https://en.wikipedia.org/wiki/Travian | Origines, croissance, compte Plus | Probable |
| https://www.deutsche-startups.de/2009/08/17/travian-laesst-beiboote-zu-wasser/ | Projet de loisir de l'été 2004 | Probable |
| https://en.wikipedia.org/wiki/Kingdom_of_Loathing | Création, Mr. Accessory, 300 000 comptes, 18 mois | Probable |
| https://if50.substack.com/p/2003-kingdom-of-loathing | Dates divergentes de sortie | Probable |
| https://giantbomb.com/asymmetric-publications/3010-7569/ | Dates, Kingdom of Loathing revenu principal en 2012 | Probable |
| https://en.wikipedia.org/wiki/Torn_(2004_video_game) | Sortie, million d'utilisateurs, packs donateur, mobile | Probable |
| https://www.droidgamers.com/news/torn/ | Âge du créateur | Incertain |
| https://backloggd.com/company/torn-ltd/ | Société, date de sortie | Probable |
| https://blog.screeps.com/2016/04/Indiegogo-campaign-results/ | Campagne Indiegogo de Screeps | Vérifié |
| https://www.mobygames.com/game/100666 | Modèle d'accès à Screeps (contredit l'annonce de 2015) | Incertain |
| https://github.com/lanedirt/OGameX | Étoiles, forks, Discord d'OGameX | Vérifié |
| https://discord.com/api/v9/invites/HJ4QRxxB5N?with_counts=true | Effectif du Discord OGameX (2026-10-23) | Vérifié |
| https://discord.com/api/v9/invites/upzreVf?with_counts=true | Effectif du Discord « How To Market A Game » | Vérifié |
| https://discord.com/servers/serveur-prive-554720653396410378 | Discord « Serveur Privé » | Probable |
| https://board.fr.ogame.gameforge.com/ | Activité du forum français d'OGame | Vérifié (activité) |
| https://www.steampageanalyzer.com/blog/reddit-indie-game-marketing | Effectifs et règles de subreddits (septembre 2026) | Probable |
| https://presskit.gg/field-guides/reddit-marketing-indie-games | Pratiques Reddit, effectifs (février 2026) ; effectifs différents de la source précédente | Probable |
| https://impress.games/blog/how-to-promote-your-indie-game-on-reddit | Règle des 10 % | Probable |
| https://gummysearch.com/r/WebGames | r/WebGames : description « pas d'inscription », effectif | Probable |
| https://gummysearch.com/r/StrategyGames | r/StrategyGames : effectif, description | Probable |
| https://dinogame.gg/blog/best-browser-game-subreddits/ | Liste de subreddits du jeu par navigateur (juin 2026) | Incertain |
| https://red.127.pp.ua/r/gamedev/wiki/posting_guidelines_faq | Fils hebdomadaires et autopromotion sur r/gamedev (miroir) | Incertain |
| Miroir redlib de r/incremental_games (annonce récente sur la règle 1D, via un résultat de recherche) | 30 jours entre deux posts | Incertain |
| https://updates.kickstarter.com/a-year-in-review-2025-kickstarter-highlights/ | Absence de taux de réussite du jeu vidéo | Vérifié (absence) |
