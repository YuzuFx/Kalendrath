# Partition — la cité en devenir

Proposition A, 17 novembre 2026. Étude de vitrine et d’accueil connecté pour Kalendrath. Elle approfondit la piste « Partition » décrite dans les rapports du 1er novembre ; les artefacts Claude n’ont pas été vus, leurs URL étant inaccessibles et leurs sources temporaires absentes. Le présent rendu est une nouvelle réalisation, pas une copie de ces fichiers.

## Livrables

- `index.html` : vitrine immersive, formulaire visible dès le premier écran desktop, dix étapes visuelles, héros, roadmap.
- `jeu.html` : accueil connecté dense, ressources, capitale, prestige, navigation illustrée et libellée, tutoriel repliable, menace PvE, files, héros/conseil, mouvements et garnison.
- `logo.svg` : copie exacte du sceau des Obélisques de la série du 16 novembre. Le symbole n’a pas été réinventé.
- `silhouette-6.svg` à `silhouette-10.svg` : dessins originaux d’attente. Ce ne sont pas les architectures des paliers secrets.
- `style.css`, `script.js` : styles et interactions autonomes.
- `package.json`, `build.mjs` : assemblage sans dépendance via `npm run build`.

Les liens `../index.html` et `../identite.html` mènent aux pages communes de revue préparées par l’agent principal. Les polices locales Cinzel et Manrope viennent de `../fonts/`. Les illustrations restent liées à `../../../direction-artistique/references/` ; servir le dépôt ou conserver sa structure. Aucun composant du jeu réel n’est modifié.

## Direction artistique

**Faire sentir le jeu avant d’en expliquer les systèmes.** Le site s’ouvre sur une véritable cité, vue à travers une nuit légèrement violette. Une grande accroche à gauche et un formulaire encadré à droite posent simultanément l’univers et la prochaine action. La frise suivante rend la progression concrète sans obliger le visiteur à lire un long texte.

Par rapport à la première série, les changements sont substantiels : titres romains auto-hébergés, matériau des panneaux en plusieurs couches, davantage de vraie illustration, frise interactive centrale, rythme de sections plus narratif, interface de jeu en surimpression d’une grande cité plutôt qu’une grille de dashboard isolée.

Palette : fond `#10101D`, panneau `#1A2033`, mana `#AC99FF`, or `#D0AD6D`. Le rouge est réservé à l’alerte PvE. Les autres états s’appuient aussi sur un texte : aucune information n’existe seulement par sa couleur.

La richesse visuelle vient des images validées, filets, ombres intérieures, reflets et transparences contrôlées. Un anneau très lent accompagne l’illustration de la section héros ; pas de pluie de particules ni de multiplication des animations. Les principes de matière et de halo de Rakorn sont étudiés, mais aucun code, asset, portrait, texture, icône ou illustration de Rakorn n’est repris.

## Partition et protection des découvertes

Les dix tranches sont des boutons accessibles au clic, au clavier avec Entrée/Espace, flèches, Home et End. L’étape choisie affiche une grande scène et un texte. L’état sélectionné est indiqué par une bordure et `aria-pressed`, la zone de texte est annoncée par `aria-live`.

**I à V uniquement :** vraies images validées d’Hôtel de ville. Aucun nom public de palier, seulement les chiffres romains.

**VI à X :** silhouettes SVG originales. Ni image cachée, ni flou d’image réelle, ni preload des paliers finaux. Le script ne compose un chemin vers une illustration réelle que dans la branche `stage <= 5`. La branche suivante utilise exclusivement `silhouette-N.svg`.

Les textes décrivent des intentions et l’évolution de la cité. Aucun système n’est attribué à un seuil précis : les images ne forment pas un tableau de déblocages. La vitrine montre l’évolution des cités ; l’accueil du jeu montre spécifiquement le Donjon de la capitale, sans ajouter d’Hôtel de ville dans celle-ci.

## Accueil connecté

La barre supérieure regroupe marque/capitale, quatre ressources avec taux de production horaires fictifs et jauge de Prestige d’Empire. Une navigation horizontale associe **illustration et libellé permanent** : Cité, Bâtiments, Recherches, Héros, Armée, Mouvements, Rapports. Chaque entrée pointe vers le panneau réel correspondant ; pas de lien factice ouvrant un écran vide.

La composition comporte trois plans :

1. **Contexte persistant** : ressources, lieu et navigation.
2. **Lieu vivant** : vaste image du Donjon, dégagée au centre ; plaque de capitale, guide repliable et alerte PvE.
3. **Décisions** : héros/conseil et garnison à gauche, chantiers sous le décor, mouvements et rapports à droite.

Les informations secondaires sur le Prestige disparaissent au format intermédiaire pour éviter d’écraser les stocks. Sur mobile, les ressources restent toutes accessibles, la navigation défile dans son propre bandeau et les panneaux deviennent une colonne. Le centre de la cité précède alors le héros et les mouvements.

Le héros est **le chef du royaume**, conformément à la décision du 16 novembre. Aucun gouverneur individuel par ville, aucun siège de conseil inventé, aucun seuil de Prestige présenté comme règle finale. La rubrique métiers/commerce indique explicitement une conception en cours, sans noms de métiers, monnaie ou calendrier de livraison inventés.

## Interactions

- Formulaire : validation HTML native de l’e-mail et du consentement, message de test, puis remise à zéro. Aucun envoi, stockage ou collecte.
- Partition : sélection des dix étapes, touches fléchées, Home et End, variante scellée lisible.
- Tutoriel : `<details>` natif, repliable au clavier.
- Menace PvE : bouton afficher/masquer avec état `aria-pressed` ; aucun faux compte à rebours d’attaque.
- Rapports, mouvements, recherche, héros, conseil et métiers : modale native `<dialog>`, fermeture au bouton ou à Échap, gestion du focus native.
- Chantier : simulation d’achèvement, passage de 66 à 100 %, texte et `aria-valuenow` synchronisés, bouton désactivé après action et message de statut.

Tous les stocks, niveaux, unités et progressions sont fictifs et explicitement annoncés. Le rechargement réinitialise la démonstration. Ces interactions servent à vérifier la hiérarchie et la qualité du retour d’action ; elles ne simulent pas les mécaniques ou l’équilibrage de Kalendrath.

## Responsive et accessibilité

Aucune largeur maximale de page arbitraire en pixels. Les espaces reposent sur les proportions, les grilles et des tailles typographiques fluides. Breakpoints à 1050 et 700 px. Une adaptation en hauteur cible les écrans desktop de 720 px afin de conserver le formulaire dans la première vue.

À 390 px, la partition passe en deux lignes de cinq tranches, les sections et panneaux en une colonne. À grande largeur, la typographie et les marges augmentent ; la cité continue d’occuper le centre du jeu, sans couloir de largeur fixe.

Focus visible, libellé e-mail, consentement décoché, texte d’état, titres hiérarchisés, états renseignés, modale native. `prefers-reduced-motion: reduce` neutralise **toutes** les animations, transitions et le défilement doux, y compris les pseudo-éléments. Les petites métadonnées mobiles restent une limite à surveiller : la taille principale est de 15 px, certains compteurs secondaires descendent à 10–11 px dans la barre de ressources et la bande de revue.

## Sources réellement consultées

- `CLAUDE.md`, guides voix et lexique Kalendrath, skill Sites, références présentation et preview local (lus dans le contexte conservé).
- `docs/archives/retours-agents-2026-11-01-site-logos.md` : **descriptions** des artefacts Claude et erreurs à ne pas reprendre.
- `docs/brief-site-vitrine.md` : structure, consentement, progression, statut de la bêta ; anciennes formulations PvP écartées.
- `docs/archives/retours-agents-2026-11-15-rakorn-visuel.md` et `retours-agents-2026-11-15-audit-rakorn-style-graphique.md` : analyse de matière, densité, halos et limites d’accessibilité.
- `docs/sessions/2026-11-16-synthese-metiers-marche-questions-ouvertes.md` : héros chef du royaume, métiers et commerce actés, questions encore ouvertes.
- GDD : révision héros/conseillers, ressources et distinction Donjon/Hôtel de ville. Lore et roadmap étudiés pendant la première série.

La capture d’interface fournie par Gregory a été transmise à cet agent sous forme de brief structurel par l’agent principal ; cet agent ne prétend pas en avoir effectué une inspection visuelle directe.

## Principaux textes en anglais

L’étude visible est en français. L’anglais ci-dessous est une proposition éditoriale pour l’intégration ultérieure, à valider avant publication.

| Français | English |
|---|---|
| Un monde brisé. Votre empreinte dans la pierre. | A shattered world. Your mark upon the stone. |
| Trois mille ans après la Rupture, les cités humaines se relèvent. Bâtissez la vôtre, menez votre héros et repoussez ce qui rôde au-delà des murs. | Three thousand years after the Sundering, human cities are rising again. Build yours, lead your hero and face what lurks beyond the walls. |
| Suivez la naissance de Kalendrath. | Follow the making of Kalendrath. |
| Recevez les nouvelles du projet et les annonces des prochaines phases de test. | Get development news and announcements about upcoming playtests. |
| Rejoindre la liste d’intérêt | Join the interest list |
| Je souhaite recevoir la newsletter de Kalendrath et les annonces liées aux tests. | I would like to receive the Kalendrath newsletter and playtest announcements. |
| Cette liste ne garantit pas une place en alpha. | Joining the list does not guarantee a place in the alpha. |
| De quelques pierres à un nouvel horizon. | From the first stones to a new horizon. |
| Votre cité change de visage au fil de sa croissance. Explorez ses premières étapes ; le reste se découvre en jeu. | Your city changes as it grows. Explore its early stages; discover the rest in the game. |
| Certaines merveilles se méritent. | Some wonders await your journey. |
| Une volonté. Tout un royaume. | One vision. An entire realm. |
| Un héros mène votre empire. | One hero leads your empire. |
| Choisissez votre archétype, développez vos talents et façonnez votre équipement à la Forge. | Choose your archetype, develop your talents and craft your gear at the Forge. |
| Le chemin jusqu’aux premiers royaumes. | The road to the first realms. |
| Métiers et commerce : conception en cours | Professions and player trading: design in progress |
| Votre capitale / Donjon | Your capital / Keep |
| Héros & conseil / Chef du royaume | Hero & Council / Ruler of the realm |
| Bois / Fer / Mana / Nourriture | Wood / Iron / Mana / Food |
| Prestige d’Empire / Votre garnison | Imperial Prestige / Your garrison |
| Présence hostile · Hordes PvE | Hostile activity · PvE hordes |
| Simuler l’achèvement | Simulate completion |
| Maquette interactive · Données fictives | Interactive mockup · Sample data |

## Validation et limites

`npm run build` réussi : syntaxe JS compilée en mémoire, existence des images/polices locales vérifiée, assemblage de deux pages, styles/scripts et six SVG dans `dist/` ignoré par Git. Le dossier assemblé conserve des liens vers les images du dépôt et les polices communes ; la publication autonome relève du packaging de l’agent principal.

Première QA navigateur par l’agent principal : huit vues sans erreur JavaScript, image cassée ou débordement ; formulaire desktop entièrement visible à 1280 × 720. Après revue visuelle, le centre du jeu a été désolidarisé de la hauteur des colonnes latérales, son décor limité à 16 vh sur les écrans de 800 px de haut ou moins, et la menace déplacée avant le tutoriel. Les taux de production fictifs ont été ajoutés aux stocks et le corps des panneaux porté à 14 px. Une nouvelle capture est confiée à l’agent principal après ces ajustements. Ne pas assimiler la réussite du build à une validation visuelle.

Les PNG validés sont volumineux : prévoir un pipeline AVIF/WebP et variantes responsive dans l’intégration, sans altérer les images sources. Les portraits définitifs du héros et du conseil ne sont pas inventés : un emblème occupe leur emplacement, et le Soldat de la vitrine est explicitement identifié comme illustration d’armée. Les noms des paliers restent absents du texte public ; les chemins internes reprennent ceux du dépôt. Aucun spoiler Vahrun/peuple englouti, aucune promesse PvP ancienne, aucune date ni garantie d’accès alpha.

Aucun domaine PHP, compte réel, publication, commit ou push modifié par cet agent.
