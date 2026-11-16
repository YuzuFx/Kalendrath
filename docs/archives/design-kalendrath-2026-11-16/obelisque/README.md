# Proposition A — Le sceau des Obélisques

Rapport de conception indépendant, 16 novembre 2026. Aucun avis ni aucune proposition de Claude consultés. Cette étude est une proposition de direction artistique, pas une interface de production.

## Livrables

- `index.html` : vitrine, présentation du projet et du lore, roadmap, préinscription/newsletter en démonstration.
- `jeu.html` : accueil connecté, ressources, capitale, gouverneur, constructions, recherches et rapports.
- `logo.html` : présentation du symbole, palette, intentions et tailles d’usage.
- `logo.svg` : symbole vectoriel original, sans dépendance ni police.
- `style.css`, `script.js` : styles responsive et interactions locales.

Ouvrir `index.html` directement dans un navigateur ou servir la racine du dépôt. Les illustrations sont référencées depuis `docs/direction-artistique/references/` : conserver la structure des dossiers. Le retour `../index.html` vise le portail comparatif créé par l’agent principal.

## Intention

Faire ressentir un héritage ancien à reconstruire. Le premier écran juxtapose un titre monumental, une cité illustrée et un appel à rejoindre le projet. La composition asymétrique laisse de l’air au texte. La vitrine avance dans l’ordre découverte → compréhension → état du développement → inscription.

Le bronze guide les actions ; le violet-bleu reste un signal arcanique rare. Le fond basalte relie les illustrations existantes sans leur imposer une recolorisation. Les grands titres en Georgia évoquent la gravure sans sacrifier la lecture ; Arial porte les informations pratiques. Ce choix évite tout téléchargement de police et rend le prototype entièrement local.

Dans le jeu, la même identité devient plus compacte : les ressources restent en haut, la navigation sur le côté, le héros à droite de la cité et les files immédiatement sous elle. La grande illustration installe le lieu, mais l’action suivante reste visible. Sur mobile, la navigation passe en bandeau horizontal, les ressources en grille 2 × 2 et les panneaux en une colonne.

## Logo

Un Obélisque vertical au centre d’un sceau ouvert. Les interruptions de l’enceinte évoquent la Rupture ; le fût intact suggère la transmission d’un savoir ancien. Le contraste entre géométrie taillée et fil arcanique rappelle la double fondation de Kaelhelm. Ce sont des interprétations graphiques, sans ajout canonique au lore.

Le SVG est un symbole autonome. Le mot-symbole de la planche est une composition typographique provisoire, pas un lettrage final vectorisé. Après sélection : dessiner quelques lettres distinctives, tester une variante monochrome, supprimer les traits secondaires pour le favicon et vérifier la distinctivité auprès des marques existantes. Aucun audit de marque n’est prétendu ici.

## Parcours interactifs

- Vitrine : ancres univers, roadmap et inscription ; accès au jeu et au logo.
- Formulaire : validation native e-mail et consentement requis. La soumission affiche explicitement une confirmation de test et efface les champs. Aucun fetch, stockage, cookie, envoi ou collecte.
- Jeu : simulation de fin de construction, mise à jour du niveau et de la barre ; préparation/annulation locale d’une mission ; rapport d’exemple dépliable.
- Les états du jeu sont fictifs et annoncés comme tels. Les chiffres ne sont pas des valeurs d’équilibrage proposées. Aucun temps de mission ni coût n’est inventé.

La liste d’intérêt du projet reste distincte de la future préinscription bêta datée. Aucun accès alpha garanti ; aucune date ou disponibilité jouable inventée. Le message PvE évite la promesse d’immunité totale, devenue ambiguë après la décision de guerre d’alliance.

## Palette

| Rôle | Couleur |
|---|---|
| Basalte | `#111215` |
| Panneaux | `#1B1C20` |
| Bronze / actions | `#C9A977` |
| Mana / état particulier | `#B5A8F4` |
| Ivoire / texte | `#EEE8DD` |
| Texte secondaire | `#B8B6AF` |

## Points forts et compromis

**Points forts :** cohérence immédiate avec les images existantes, hiérarchie nette, logo simple sans couronne générique, différenciation claire entre atmosphère de vitrine et densité de jeu. Formulaire accessible par labels et validation native, focus visible et messages de statut annoncés ; animations absentes, défilement animé désactivé si réduction des mouvements.

**Compromis :** la sobriété peut sembler moins chaleureuse que les pistes de reconstruction plus lumineuses. La palette sombre nécessite une vigilance sur les illustrations très sombres. Les images PNG originales sont lourdes : elles sont volontairement réutilisées sans modification pour la revue, mais doivent être exportées en AVIF/WebP, avec tailles responsive, avant intégration. Le symbole perd ses détails à 20 px : une variante optique est nécessaire. L’image du Donjon sert d’évocation de la capitale et ne constitue pas une carte interactive. Le dashboard ne simule pas les autres écrans de gestion.

## Textes principaux en anglais — proposition éditoriale

Ces textes accompagnent l’étude ; la maquette est présentée en français. Une intégration de production devra utiliser les clés de traduction du projet. L’anglais reste soumis à validation de Gregory avant publication.

| Français | English |
|---|---|
| Le monde s’est brisé. Votre cité se relèvera. | The world was shattered. Your city will rise. |
| Stratégie & gestion d’empire · Par navigateur | Browser-based strategy & empire building |
| Trois mille ans après la Rupture, bâtissez votre cité, guidez vos héros et affrontez les forces qui rôdent au-delà des murs. | Three thousand years after the Sundering, build your city, lead your heroes and face the forces beyond its walls. |
| Me préinscrire | Join the interest list |
| Fondez votre cité | Found your city |
| Guidez votre héros | Lead your hero |
| Avancez ensemble | Build your future together |
| La pierre demeure. Le mana s’éveille. | Stone endures. Mana stirs. |
| La Rupture a englouti Kaelhelm et fracturé le continent en Éclats. Les humains ont fondé de nouveaux royaumes. Sous leurs pieds, les Straumar portent encore le mana d’un monde blessé. | The Sundering swallowed Kaelhelm and broke the continent into Shards. Humanity founded new kingdoms. Beneath them, the Straumar still carry the mana of a wounded world. |
| Une ambition. Des étapes concrètes. | One vision. Tangible milestones. |
| L’identité prend forme | Defining the visual identity |
| Le premier écran jouable | The first playable screen |
| La cité s’anime | Bringing the city to life |
| L’alpha fermée | Closed alpha |
| La bêta, puis l’ouverture | Beta, then launch |
| Prenez part à la suite. | Be part of what comes next. |
| Préinscrivez-vous au projet pour recevoir les nouvelles du développement et les annonces des prochaines phases de test. | Join the project’s interest list for development news and announcements about upcoming tests. |
| Je souhaite recevoir la newsletter de Kalendrath et les annonces liées aux tests. | I would like to receive the Kalendrath newsletter and announcements about playtests. |
| Cette liste d’intérêt ne garantit pas une place en alpha. | Joining this list does not guarantee a place in the alpha. |
| Votre capitale / Vue d’ensemble / Votre gouverneur | Your capital / Overview / Your governor |
| Intendant / Scierie / Donjon / Abondance | Steward / Sawmill / Keep / Abundance |
| Préparer une mission / Annuler la préparation | Prepare a mission / Cancel preparation |
| Maquette interactive : aucune adresse n’est enregistrée ni transmise. | Interactive mockup: no email address is stored or transmitted. |

## Sources consultées

`CLAUDE.md`, `docs/sessions/2026-11-02-synthese.md`, `docs/decision-architecture-cible.md`, `docs/lore.md`, `docs/game-design-document.md` (piliers, boucle courte, ressources), `docs/plan-marketing.md`, `docs/feuille-de-route-kalendrath.html`, `.agents/skills/voix-kalendrath/SKILL.md`, `.agents/skills/lexique-kalendrath/SKILL.md`, skill Sites et références présentation/preview local.

Illustrations du dépôt réutilisées : Hôtel de ville palier 7, Donjon palier 2, icônes Bois/Fer/Mana/Nourriture. La vitrine indique leur origine IA. Aucun visuel issu d’une autre proposition de site ou de logo.

## Vérification

`npm run build` dans ce dossier : contrôle syntaxique JavaScript, contrôle d’existence des ressources locales puis assemblage statique dans `dist/` (ignoré par Git). Le dossier assemblé reste lié aux illustrations du dépôt, avec chemins ajustés ; ce n’est pas un paquet de publication autonome.

QA navigateur réalisée par l’agent principal : six vues (trois pages en desktop et mobile), sans erreur JavaScript, image cassée ni débordement horizontal signalé. Captures réalisées par l’agent principal. Aucun fichier PHP ni domaine modifié ; chaîne Composer sans objet pour cette étude statique indépendante. Aucun commit, push, déploiement ou inscription réelle.
