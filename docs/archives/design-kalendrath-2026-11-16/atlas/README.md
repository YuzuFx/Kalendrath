# Proposition B — L’Atlas des Éclats

Direction indépendante conçue le 16 novembre 2026 pour Kalendrath. Les propositions graphiques et les avis de Claude n’ont pas été consultés. Ce document constitue le rapport complet de l’agent Atlas, conservé dans `docs/archives/`.

## Intention

Présenter Kalendrath comme un monde qu’on découvre et qu’on reconstruit. L’objet de référence est un atlas de voyage : papier clair, encre, repères, gravure architecturale et quelques lignes de Mana. La direction évite que la fantasy se résume à des panneaux noirs, des dorures et des effets lumineux omniprésents.

Le lien au lore est structurel : terres fracturées après la Rupture, Straumar visibles comme lignes traversant les Éclats, centralité de l’Obélisque. Le Gouffre apparaît sur la carte illustrative mais les révélations sur Kaelhelm, les Vahrun et le peuple englouti ne sont pas exposées au visiteur. Les humains demeurent le peuple joueur ; aucune race recrutée n’est inventée.

**Les deux cartes sont des dessins de direction artistique, pas une géographie officielle ni une proposition de carte parcourable.** La carte conceptuelle ne sert pas à sélectionner des destinations. Le futur écran de navigation devra conserver la structure Région / Contrée / Éclat et les listes prévues au GDD/lore.

## Livrables

- `index.html` : vitrine complète, univers, piliers, feuille de route et préinscription/newsletter de démonstration.
- `jeu.html` : accueil connecté, quatre ressources, plan de capitale illustratif, héros disponible, chantier et raccourcis. Les actions ouvrent un dialogue descriptif. La fin du chantier est simulable puis réinitialisable.
- `logo.html` : présentation du signe, du mot-symbole, palette, tailles et limites.
- `logo.svg` : emblème original vectoriel utilisable immédiatement dans les maquettes.
- `logo-complet.svg` : composition emblème + mot-symbole, avec texte Georgia non vectorisé à ce stade.
- `carte.svg` : carte illustrative originale des terres fracturées.
- `cite.svg` : étude architecturale originale de la capitale, également intégrée dans la page de jeu.
- `style.css`, `app.js` : styles responsive et interactions de démonstration, sans dépendance ni appel réseau.
- `package.json`, `build.mjs` : assemblage statique local via `npm run build`.

Ouvrir directement `index.html`. Aucun serveur, compte, téléchargement de police ou service tiers n’est requis. `../index.html` revient au comparateur commun préparé par l’agent principal. Les fichiers sources sont l’entrée de revue ; `dist/` est une sortie locale d’assemblage ignorée par Git, pas un paquet de publication indépendant.

## Vitrine : une progression plutôt qu’une accumulation

1. **Accroche et carte** : une phrase mémorable (« Le monde est brisé. Votre histoire commence. »), un pitch explicite de jeu navigateur et un CTA principal.
2. **Piliers** : cité, héros, PvE et coopération. On décrit le projet en développement sans prétendre que les fonctionnalités sont déjà publiques.
3. **Lore** : une respiration sombre, texte court, aucun spoiler de seconde phase.
4. **Feuille de route** : chantier actuel puis boucle jouable, alpha et bêta/lancement. La Phase 3a est en cours ; le pilote Héros suit. Pas de date inventée ni de pourcentage de progression.
5. **Inscription** : adresse e-mail, consentement explicite, aucun accès garanti. La liste d’intérêt actuelle est distincte des futures préinscriptions à la bêta avec date.

Le bouton du formulaire valide le format et le consentement puis affiche un message de simulation. L’adresse n’est ni transmise, ni stockée, ni inscrite dans une URL. Il n’y a ni endpoint, ni `localStorage`, ni outil d’analytics. Le parcours réel (double confirmation, gestion de liste, désinscription et mentions) reste à intégrer après choix de direction.

## Accueil du jeu : décider rapidement

La navigation latérale reste visible sur bureau et devient une rangée défilante sur mobile. Les compteurs s’alignent sur quatre colonnes puis deux sur mobile. L’accueil répond à trois questions : quelles ressources possédez-vous, que construit la cité, votre héros est-il disponible ?

Le plan de ville est une illustration de fond sans hotspots. Le prochain écran doit offrir une liste de bâtiments exploitable, avec les états et prérequis réels. Le personnage est représenté ici par un sceau, explicitement substitut temporaire au portrait ; aucune apparence de héros non validée n’est inventée.

La Scierie passe de « En cours » à « Terminée » via une simulation locale, annoncée aux technologies d’assistance. Les montants, niveaux et durées sont des données de démonstration et ne sont pas des propositions d’équilibrage. Aucune règle de coût ou production n’est implémentée.

## Identité et logo

L’emblème associe une rose des vents, un Obélisque et deux points reliés. Le cercle évoque un instrument cartographique ; il **ne représente pas** le nombre ou l’organisation des Neuf Sphères. Le mot-symbole en capitales espacées rappelle les titres d’atlas.

| Usage | Couleur | Rôle |
|---|---|---|
| Fond | `#F1EADB` | Papier clair, sans texture raster |
| Texte | `#302E28` | Encre chaude, fort contraste |
| Détail / repère | `#866138` | Bronze, éditorial |
| Mana / état actif | `#65508E` | Violet bleu désaturé |

Georgia pour les titres et Arial pour les informations : choix volontaire de fontes système pour une revue immédiate hors ligne. Les fontes ne sont pas un engagement de design final. Un mot-symbole dessiné sur mesure, les versions monochromes, inversées et le favicon simplifié à 16 px restent à produire si cette piste est retenue. Le symbole est déjà lisible à 32 px ; ses traits les plus fins nécessitent simplification en dessous.

## Atouts, compromis et recommandation

**Atouts :** identité différenciante, forte lisibilité de longue durée, faible coût technique, langage visuel réutilisable dans les écrans de gestion et une feuille de route éditoriale. Carte et gravure sont des SVG légers, sans assets externes ni nouvelles images génératives.

**Compromis :** la vitrine évoque davantage l’exploration et la stratégie que la violence des hordes. La gravure de capitale est moins spectaculaire que les peintures de bâtiments déjà validées. Les scènes picturales du jeu nécessiteront un traitement de mise en page soigné pour cohabiter avec le papier clair ; ne pas les désaturer automatiquement ou modifier leur direction artistique.

**Avis :** très bonne piste pour une interface de gestion et une marque reconnaissable. Si l’objectif marketing prioritaire est l’impact fantasy immédiat, enrichir le hero par une illustration peinte des Éclats ou une scène de cité, tout en conservant la structure d’atlas. Ne pas convertir toute l’interface en parchemin texturé : la texture et les ornements doivent rester discrets.

## Accessibilité et adaptation

- HTML sémantique, titres hiérarchisés, label explicite, formulaire utilisable au clavier.
- Focus visible, lien d’évitement, dialogues natifs fermables par Échap, messages `role="status"`.
- Responsive à 700 et 1000 px, ressources sur deux colonnes et formulaire empilé sur mobile.
- Pas d’animation perpétuelle ; défilement doux neutralisé avec `prefers-reduced-motion`.
- Les choix d’état ne reposent pas exclusivement sur la couleur : libellés visibles « En cours » / « Terminée ».
- Audit complet de contraste et tests avec lecteur d’écran à prévoir lors de la réalisation produit.

## Texte anglais de travail

La revue visuelle est en français. La page n’a pas de sélecteur de langue ; ces versions anglaises servent de base éditoriale pour la future intégration traduisible, avant toute alpha publique.

| Français | English |
|---|---|
| Le monde est brisé. Votre histoire commence. | The world lies broken. Your story begins. |
| Trois mille ans après la Rupture. | Three thousand years after the Sundering. |
| Fondez votre cité sur un Éclat, développez votre royaume et menez vos héros face aux forces qui s’éveillent. | Build your city on a Shard, grow your realm and lead your heroes against the forces awakening across the world. |
| Un Éclat de terre. Tout un avenir. | One Shard of land. A future to build. |
| Bâtir dans la durée. | Build for the years ahead. |
| Donner un cap. | Lead with purpose. |
| Faire front ensemble. | Stand together. |
| La terre a gardé la mémoire de la Rupture. | The land remembers the Sundering. |
| La route devant nous. | The road ahead. |
| Donner forme au monde | Shaping the world |
| Rendre la cité jouable | Bringing the city to life |
| Ouvrir l’alpha fermée | Opening the closed alpha |
| Bêta, puis lancement | Beta, then launch |
| Le prochain chapitre dans votre boîte mail. | The next chapter, in your inbox. |
| Préinscrivez-vous au projet pour recevoir les nouvelles du développement et les annonces des prochaines phases de test. | Join the project mailing list for development news and announcements about upcoming test phases. |
| Je souhaite recevoir la newsletter et les annonces de test de Kalendrath. | I would like to receive Kalendrath’s newsletter and testing announcements. |
| Aucune adresse n’est enregistrée ni transmise. | No email address is stored or transmitted in this demo. |
| Votre capitale | Your capital |
| Bois / Fer / Mana / Nourriture | Wood / Iron / Mana / Food |
| Votre héros · Disponible | Your hero · Available |
| Explorateur | Explorer |
| Scierie | Sawmill |
| Donjon | Keep |
| Institut Arcanique | Arcane Institute |
| Simuler la fin / Réinitialiser | Simulate completion / Reset |
| Données fictives | Illustrative data |

## Sources consultées

- `CLAUDE.md` : contexte, Phase 3, règles de séparation domaine/interface et archivage.
- `docs/sessions/2026-11-02-synthese.md` : dernier état de la production visuelle.
- `docs/lore.md` : Rupture, Straumar, Éclats, Obélisques, humains et antagonistes.
- `docs/game-design-document.md` : piliers, ressources, héros, terminologie, bâtiments.
- `docs/feuille-de-route-kalendrath.html` : jalons et statuts.
- `docs/decision-architecture-cible.md` : interface React à réaliser ensuite ; ces fichiers restent des maquettes isolées.
- `docs/plan-marketing.md` : ton, jalons, liste e-mail et distinction avec la bêta.
- Skills `voix-kalendrath`, `lexique-kalendrath`, `sites` et référence Sites de conception de vitrine.

## Vérification

- `node --check app.js` : réussi.
- `npm run build` : réussi, fichiers statiques assemblés dans `dist/`.
- XML des SVG et références locales : contrôlés par script, réussis (hors comparateur parent créé séparément).
- Captures et vérification navigateur : confiées à l’agent principal pour les trois propositions afin d’utiliser le même cadre de comparaison.
- Aucun fichier PHP, aucune logique métier, aucune dépendance, aucun fichier de verrouillage modifié. La chaîne Composer n’est pas pertinente pour ces maquettes autonomes sans intégration au domaine.
- Aucune publication, aucun commit et aucun push.
