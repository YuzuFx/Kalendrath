# Proposition C — L’Âge des Fondations

Rapport de direction artistique, agent Fondations, 16 novembre 2026. Proposition indépendante, réalisée sans consultation des maquettes ou verdicts de Claude Code. Aucune publication ni collecte d’adresses.

## Voir la proposition

- [Vitrine](index.html) : promesse du jeu, illustrations, paliers interactifs, roadmap, inscription d’intérêt/newsletter en démonstration.
- [Accueil du jeu](jeu.html) : écran connecté, colonie, quatre ressources, construction, héros, recherche et journal.
- [Identité](logo.html) et [symbole vectoriel original](logo.svg).
- [Comparaison des directions](../index.html).

Ouvrir les HTML directement dans le navigateur. Les images sont référencées dans le dépôt et nécessitent de conserver son arborescence ; aucune ressource externe, police distante, dépendance ni connexion nécessaire. Le build produit également trois pages avec CSS embarqué dans `dist/`, utilisables depuis la même arborescence.

## Parti pris

**Donner envie d’habiter Kalendrath avant de vouloir le conquérir.** Le sujet principal est la reconstruction : une cité rendue tangible, un accueil du jeu quotidien, des matières de terre et de cuivre. Le lore est grave mais les humains réapprennent à bâtir. La violence et le mystère ne sont pas supprimés ; ils restent au-delà des murs.

La direction porte le nom d’une période réelle du lore, l’Âge des Fondations (2500–3000 PR). C’est le nom de notre piste visuelle, pas une proposition de nom pour le chapitre 1. Le présent narratif est bien l’an 3000 PR. Aucun twist futur, Vahrun ou peuple englouti n’est révélé.

## Système visuel

- Fond forêt `#29392E`, pierre claire `#ECE7DB`, papier `#F6F2E9` pour séparer le récit immersif des informations pratiques.
- Cuivre sombre `#9C492E` pour les actions, cuivre clair `#C49067` pour le signe. Mana violet-bleu `#8173C8`, réservé à l’identité arcanique.
- Titres Georgia, texte Arial : toutes deux de repli local, zéro téléchargement. La grande typographie et l’image panoramique portent l’ampleur, les filets et chiffres romains donnent un rythme d’atelier.
- Angles droits, cadres fins, surfaces opaques. Pas de parchemin artificiellement vieilli, de néon, de panneaux vitrés ni de surcharge de runes.
- Les visuels picturaux validés sont communs à la vitrine et au jeu : le visiteur reconnaît immédiatement le monde après connexion.

## Vitrine

L’ouverture associe « Le monde est brisé. Bâtissez la suite. » à une vraie image de cité. La phrase de genre rend le produit immédiatement compréhensible : stratégie par navigateur, PvE d’abord. Trois piliers correspondent à la boucle documentée : cité, héros, exploration/PvE.

Le comparateur de paliers montre la progression, avec Hameau, Village et Ville franche. Il change réellement l’image et son libellé et annonce la sélection aux technologies d’assistance.

La roadmap synthétise les jalons publics, sans inventer de dates : interface et DA en cours ; boucle de jeu et bots PvE ; alpha fermée ; préinscriptions datées à la bêta ; bêta ; sortie 1.0 et s1. Elle ne prétend pas que le pilote Héros est déjà terminé. Le Patreon n’est pas central dans cette synthèse destinée à expliquer l’accès au jeu ; il n’est pas confondu avec l’inscription.

Le formulaire distingue clairement la liste d’intérêt/newsletter actuelle des futures préinscriptions datées à la bêta. E-mail valide et consentement explicite non coché requis. Il n’enregistre rien, n’émet aucune requête, ne prétend jamais qu’une inscription réelle a réussi et ne promet pas d’accès garanti.

## Accueil du jeu

L’écran représente une **colonie Ville franche**, donc un Hôtel de ville (pas un Donjon de capitale). La cité occupe l’espace majeur. La barre de ressources conserve les quatre stocks — Bois, Fer, Mana, Nourriture — avec leur iconographie validée. La Nourriture n’est jamais affichée comme une énergie ni comme un coût de bâtiment.

Le joueur retrouve ensuite trois décisions : gérer la construction, examiner le gouverneur Intendant et consulter une recherche. Tous les chiffres, délais, niveaux et états sont fictifs et annoncés comme tels. Le bouton d’amélioration modifie une file locale, sans prétendre calculer un coût. Les fiches héros et recherche produisent un message de simulation dans le journal ; ce sont des entrées de parcours, pas des écrans complets livrés.

Sur mobile, la navigation devient un rail horizontal, les ressources occupent deux colonnes, puis les décisions s’empilent. Le décor reste visible mais ne bloque pas l’action.

## Logo

Le SVG dessine une enceinte ouverte, un Obélisque central et un Éclat fracturé. L’enceinte ne représente aucune faction canonique : c’est un signe de marque proposé. L’Obélisque met la spécificité de Kalendrath au centre, le terrain rappelle la Rupture, l’ouverture exprime la reconstruction plutôt qu’un blason purement militaire.

Le signe est entièrement vectoriel et indépendant des illustrations générées. Le mot-symbole est une étude typographique Georgia, pas un dessin exclusif finalisé. Le symbole se lit à 24 px ; à 16 px le trait de mana et l’enceinte demanderaient simplification. Une page présente les réductions réelles afin de juger ce compromis.

## Forces et limites

**Forces :** désir de cité tangible ; continuité immédiate vitrine/jeu ; palette chaude différenciante ; informations de gestion lisibles ; identité utilisable sans effets ni textures lourdes.

**Limites :** une première impression plus accueillante que certaines attentes dark fantasy ; l’identité dépend fortement des images de cité ; la hero utilise un recadrage large d’une image de développement. Les PNG du dépôt sont lourds : production à prévoir en AVIF/WebP multi-tailles et art direction mobile, sans toucher ici aux originaux. Le logo et sa typographie demandent une phase de finition après arbitrage.

**À reprendre en production :** composants React et clés de traduction du projet, vraie gestion serveur des abonnements, confirmation de l’adresse, désinscription, rédaction des informations de confidentialité et intégration des états d’échec. Rien de durable en Blade. Les images et les statistiques n’interagissent pas avec le moteur actuel.

## Textes principaux — version anglaise de travail

L’interface de revue est française. Les textes anglais suivants accompagnent la proposition, à valider avant intégration dans l’infrastructure de traduction.

| Français | English |
| --- | --- |
| Le monde est brisé. Bâtissez la suite. | The world lies broken. Build what comes next. |
| Stratégie par navigateur · PvE d’abord | Browser strategy · PvE first |
| Trois mille ans après la Rupture, la vie reprend sur les Éclats. Élevez votre cité, guidez vos héros et faites grandir votre empire. | Three thousand years after the Sundering, life returns to the Shards. Build your city, guide your heroes, and grow your empire. |
| Rejoindre les premiers bâtisseurs | Join the first builders |
| Un foyer. Puis tout un empire. | A home. Then an empire. |
| Faites vivre votre cité. | Bring your city to life. |
| Guidez vos héros. | Guide your heroes. |
| Au-delà des murs. | Beyond the walls. |
| Tout commence par quelques pierres. | It begins with a few stones. |
| Du Hameau à la Cité des Sphères, votre cité change de visage. Les Obélisques, héritages d’un autre âge, se dressent au cœur de cette reconquête. | From Hamlet to City of the Spheres, your settlement takes on a new shape. The Obelisks, relics of another age, stand at the heart of that renewal. |
| Hameau / Village / Ville franche | Hamlet / Village / Chartered Town |
| Feuille de route | Roadmap |
| En cours / À venir / Ensuite / À l’horizon | In progress / Up next / Then / On the horizon |
| Donner forme au monde | Shaping the world |
| Jouer, tester, affiner | Play, test, refine |
| Ouvrir la bêta | Opening the beta |
| Le premier serveur | The first server |
| Les premières pierres se posent maintenant. | The first stones are being laid. |
| Recevez les nouvelles de Kalendrath et les annonces des prochains tests. Inscrivez votre intérêt pour le projet dès aujourd’hui. | Get Kalendrath news and announcements about upcoming tests. Register your interest in the project today. |
| Votre adresse e-mail / M’inscrire | Your email address / Sign up |
| Je souhaite recevoir les nouvelles du projet et les annonces d’accès aux tests par e-mail. | I would like to receive project news and test access announcements by email. |
| Liste d’intérêt et newsletter, sans accès garanti. Les préinscriptions à la bêta ouvriront ultérieurement avec une date annoncée. | This is an interest list and newsletter; access is not guaranteed. Beta preregistration will open later, alongside an announced date. |
| Maquette : aucune adresse n’est collectée ni envoyée. | Prototype: no email address is collected or sent. |
| Votre cité s’éveille. | Your city stirs. |
| Vue d’ensemble / Bâtiments / Héros / Recherches / Rapports | Overview / Buildings / Heroes / Research / Reports |
| Bois / Fer / Mana / Nourriture | Wood / Iron / Mana / Food |
| Votre Intendant / Hôtel de ville / Institut Arcanique / Abondance / Scierie | Your Steward / Town Hall / Arcane Institute / Abundance / Sawmill |
| Le chantier avance. / Gérer les bâtiments | Construction is underway. / Manage buildings |
| Un foyer dans un monde fracturé. | A home in a fractured world. |

## Sources

- `CLAUDE.md` et dernière session `docs/sessions/2026-11-02-synthese.md`.
- `docs/lore.md`, cosmologie, Rupture, Âge des Fondations et peuple humain.
- `docs/game-design-document.md`, boucle courte et lexique ; pour le PvP, aucune ancienne promesse d’immunité n’a été reprise.
- `docs/plan-marketing.md`, jalons et distinction newsletter/préinscriptions bêta.
- `docs/feuille-de-route-kalendrath.html`, tableau MILES et Phase 3.
- `docs/decision-architecture-cible.md` ; maquettes isolées, aucune intégration Laravel.
- Skills `voix-kalendrath`, `lexique-kalendrath` et Sites (workflow de propositions locales, pas de publication).
- Images validées `docs/direction-artistique/references/cite-palier01-hameau.png`, `cite-palier02-village.png`, `cite-palier04-ville-franche.png` et `icone-{bois,fer,mana,nourriture}.png`.

## Vérifications

`npm run build` vérifie les références locales HTML, embarque le CSS et produit `dist/` sans dépendances. `node --check main.js` et `node --check build.mjs` valident la syntaxe JavaScript. Le parent effectue la revue navigateur commune sur écran large et mobile. Aucune mécanique, classe PHP, ressource du jeu ni fichier de traduction n’a été modifié : la chaîne Composer du domaine ne s’applique pas à ces artefacts de revue.
