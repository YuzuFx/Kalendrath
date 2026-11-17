# Ensemble B — La cité vivante

Rapport complet de l’agent Fondations, 17 novembre 2026. Nouvelle série de propositions : vitrine immersive et accueil connecté, réunis par le symbole des Obélisques préféré par Gregory.

## Livrables

- [Vitrine](index.html) : ouverture avec genre et préinscription visibles, progression interactive I–V, étapes VI–X réellement secrètes, scènes d’exploration et de Forge, roadmap, formulaire de démonstration.
- [Accueil connecté](jeu.html) : stocks et production, navigation horizontale avec libellés, cité panoramique, menace PvE, tutoriel proposé, chantiers, héros/conseil, recherches, mouvements et garnison.
- [Logo commun](logo.svg), copie exacte de la proposition Obélisques du 16 novembre. Aucun nouveau symbole concurrent.
- `style.css`, `main.js`, `build.mjs`, `package.json` : réalisation autonome sans dépendance npm.

Les sources s’ouvrent depuis leur arborescence actuelle. Les illustrations sont référencées dans le dépôt ; les polices communes sont en `../fonts/`. Le parent prépare le comparateur, l’identité commune et la publication privée. Aucun dépôt du domaine n’est modifié par cet ensemble.

## Intention

**Habiter la cité avant d’ouvrir ses menus.** La ville est le paysage principal, pas une vignette dans un tableau de bord. Les informations essentielles s’installent au-dessus et devant ce décor, avec des surfaces profondes mais peu nombreuses. Les décisions sont visibles dès la première vue de jeu à 1280 × 720 ; la ville n’impose pas un écran vide avant les actions.

La palette quitte entièrement la forêt/cuivre de notre première série : bleu nuit `#0B1020`, encre `#11182B`, ivoire `#F2EDE5`, bronze du logo `#C9A977`, mana violet-bleu `#B4A6EC`. Cinzel donne le caractère monumental ; Manrope assure la lecture des menus et informations. Polices auto-hébergées, aucune requête Google Fonts.

L’axe vertical très discret de la vitrine rappelle l’Obélisque sans découper le paysage. Les scènes alternent texte et peinture : cité, exploration, Forge. Le rythme reste court, sans scroll épinglé, sans détournement de la molette et sans transition qui retarde la lecture.

## Références et niveau de preuve

Le brief `docs/brief-site-vitrine.md`, les descriptions de Salles, Colonne et Partition et les audits archivés du 1er novembre ont été lus. **Les anciens artefacts en ligne et leur code scratch n’ont pas été vus par cet agent.** Cette proposition transpose leurs descriptions documentées ; elle ne prétend pas reproduire des pixels observés.

Le screenshot utilisateur est traduit par les contraintes transmises par le parent : bleu nuit/violet, paysage de cité vaste, topbar et navigation lisibles. L’agent ne prétend pas avoir fait une comparaison visuelle directe du fichier source non transmis.

Les principes des audits Rakorn du 15 novembre sont repris comme étude : couches fixes, objet sélectionné, anneaux très lents, un appel à l’action majeur, image qui respire. Aucun code, capture ou asset Rakorn n’est copié. L’unique paire d’anneaux est autour du sceau sélectionné de la cité (120 s et 90 s, sens inverses). Toutes les animations et transitions s’arrêtent complètement avec `prefers-reduced-motion: reduce`.

## Vitrine : parcours et contenu

L’ouverture dit immédiatement « Stratégie fantasy par navigateur · PvE d’abord ». « Me préinscrire au projet » mène à la liste d’intérêt/newsletter : le sous-texte le précise dès la hero. Le formulaire distingue cette intention actuelle des futures préinscriptions à la bêta, qui seront datées, sans promettre un accès. Le parcours est démonstratif : validation native de l’e-mail, case de consentement non cochée, confirmation explicite d’absence de collecte. Aucune requête, aucun stockage local d’adresse.

Le sélecteur comporte dix onglets clavier : clic, flèches gauche/droite, Home et End. Seules les images des paliers I–V apparaissent dans le code et dans le build. VI–X utilisent des blocs de silhouette en CSS ; aucune image réelle tardive n’est chargée, floutée, préchargée ou cachée. Les noms canoniques des paliers ne sont pas affichés au public, conformément au brief ; les fichiers sources validés conservent leurs noms techniques d’archive.

Les textes des étapes parlent d’aspect visuel. Aucun déblocage de système, seuil PvP, durée ou avantage chiffré n’est assigné à un palier par la maquette. Les silhouettes sont explicitement fictives. La scène Forge évoque métiers et commerce comme un axe en conception, sans calendrier ni noms de métier inventés.

La roadmap condense les états documentés : univers et audit ; interface et pilote Héros en cours ; métiers/commerce en conception ; boucle jouable, bots, alpha, préinscriptions bêta, bêta et sortie. Le pilote n’est pas annoncé terminé. Pas d’ancienne promesse d’immunité PvP, pas de twist Vahrun ou peuple englouti.

## Jeu : un accueil qui aide à décider

Les stocks Bois/Fer/Mana/Nourriture sont accompagnés de productions horaires, toutes fictives. La Nourriture reste un stock ; aucun coût de construction en Nourriture n’est ajouté. Le panorama représente une colonie dotée d’un Hôtel de ville, pas une capitale avec un Donjon.

Le héros est **chef du royaume**, décision du 16 novembre. Il n’est pas présenté comme un gouverneur propre à une ville. Aucun nombre de conseillers ni métier attribué à un héros n’est inventé. L’illustration d’ambiance du Garde sert provisoirement de vignette ; la fiche et le texte alternatif le signalent, sans prétendre être un portrait final de héros.

La menace est nommée « PvE · Des orcs repérés ». Il n’y a pas de faux compte à rebours d’attaque, de promesse de raid ni de difficulté inventée. Le tutoriel est une proposition de parcours, annoncé comme tel. Une seule commande est remplie en bronze sur la première vue : examiner la Scierie. Les autres liens et boutons restent secondaires.

Interactions réalisées :

1. Examiner la Scierie ouvre un `dialog` natif, utilisable au clavier, fermable par Escape, avec retour du focus au déclencheur.
2. La simulation de mise en file modifie réellement le chantier et le tutoriel, sans consommation de ressources ni calcul de coût.
3. Fiches héros/recherche et rapport de reconnaissance sont consultables dans le même composant ; les limites sont explicites.
4. Marquer le rapport comme lu met à jour le statut.
5. Trois scénarios modifient la menace et les mouvements : cité active, retour des Éclaireurs, Contrée calme. Les scénarios sont des états de revue, pas des mécaniques promises.

## Responsive et accessibilité

Pas de plafond de largeur en pixels pour la composition. Marges en vw, colonnes proportionnelles, typographie en `clamp()`. À grande largeur, la cité s’étend et les blocs restent répartis. Les paragraphes de récit ont une longueur de lecture limitée en `em`.

À 390 px : deux colonnes de ressources, navigation horizontale étiquetée défilante, tutoriel puis panneaux en une colonne, sélecteur I–X en deux rangées de cinq. Aucun panneau fixe ne recouvre le contenu. Le corps conserve une taille de lecture raisonnable ; les seuls petits textes sont les métadonnées.

Focus visible violet, boutons sémantiques, onglets avec sélection annoncée et tabindex itinérant, images décoratives muettes, états de retour avec `role=status`. L’arrêt complet du mouvement est une correction assumée de la limite relevée dans l’audit Rakorn.

## Compromis et suite

- La peinture de cité provient d’un cadrage existant, pas d’une nouvelle illustration panoramique. Pour une version définitive à 2560 px, produire un paysage large pensé pour ces zones de texte et fournir AVIF/WebP et variantes responsives.
- Le logo validé comme préférence est conservé, son mot-symbole est typographique à ce stade.
- La héros en plein décor rapproche vitrine et jeu ; le risque est la lisibilité d’un paysage différent. Les gradients de contraste font partie du composant, pas de la peinture.
- Les onglets VI–X entretiennent la découverte sans exposer de fichiers secrets ; ce mécanisme devra rester vrai dans le build de production.
- Les textes anglais principaux suivent ci-dessous ; la revue interactive est française. Une publication publique bilingue demanderait les pages EN complètes et les politiques finales, pas seulement cette table.
- Le parent réalise la QA navigateur, les captures et le packaging privé. Aucune collecte publique ni intégration PHP/Laravel.

## Principaux textes anglais de travail

| Français | English |
| --- | --- |
| Un monde brisé. Votre royaume à bâtir. | A broken world. A realm for you to build. |
| Stratégie fantasy par navigateur · PvE d’abord | Browser fantasy strategy · PvE first |
| Trois mille ans après la Rupture, la vie reprend sur les Éclats. Élevez votre cité, incarnez votre héros et avancez ensemble face à ce qui rôde au-delà des murs. | Three thousand years after the Sundering, life returns to the Shards. Raise your city, become your hero, and stand together against what lurks beyond the walls. |
| Me préinscrire au projet | Register my interest |
| Liste d’intérêt et newsletter · Jeu en développement | Interest list and newsletter · Game in development |
| Voyez votre cité grandir. | Watch your city grow. |
| Les premières fondations. | The first foundations. |
| La vie prend place. | Life takes root. |
| Une cité se dessine. | A city takes shape. |
| La pierre affirme votre présence. | Stone gives shape to your ambition. |
| L’horizon prend de l’ampleur. | The horizon opens up. |
| L’histoire reste à écrire. | The story is still to be written. |
| Le monde n’a pas livré ses secrets. | The world still holds its secrets. |
| La pierre, l’acier. Et votre volonté. | Stone, steel. And your resolve. |
| À la tête de votre royaume, votre héros incarne votre aventure. | At the head of your realm, your hero embodies your journey. |
| Le projet s’enrichit aussi de métiers et de commerce entre joueurs. Cet axe est en conception : ses détails et son calendrier restent à préciser. | The project is also growing to include professions and player trading. This part is being designed; its details and release schedule are still to be decided. |
| Le chemin jusqu’à vous. | The road to your realm. |
| Les fondations sont posées. / Aujourd’hui, l’interface. / Ensuite, jouer ensemble. | Foundations laid. / Today, the interface. / Next, playing together. |
| Votre adresse e-mail | Your email address |
| Je souhaite recevoir la newsletter et les annonces du projet par e-mail. | I would like to receive the newsletter and project announcements by email. |
| Liste d’intérêt sans accès garanti. Les préinscriptions à la bêta ouvriront séparément, avec une date annoncée. | This interest list does not guarantee access. Beta preregistration will open separately, with an announced date. |
| Démonstration : aucune adresse n’est enregistrée ni transmise. | Demonstration: no email address is saved or sent. |
| Votre cité veille. | Your city stands watch. |
| Ma cité / Bâtiments / Héros & conseil / Recherches / Mouvements / Garnison | My City / Buildings / Hero & Council / Research / Movements / Garrison |
| PvE · Des orcs repérés dans la Contrée | PvE · Orcs sighted in the Reach |
| Premiers pas · Parcours proposé | First steps · Suggested tutorial |
| Examinez la Scierie | Examine the Sawmill |
| Le héros incarne le joueur et dirige le royaume. | The hero represents the player and leads the realm. |
| Scénario de revue : valeurs illustratives, aucune action sur le jeu réel. | Review scenario: illustrative values, no actions in the live game. |

## Sources et vérifications

Consultés : `CLAUDE.md`, skills de voix/lexique/Sites déjà lus, `docs/brief-site-vitrine.md`, `docs/archives/retours-agents-2026-11-01-site-logos.md`, audits Rakorn style et visuel du 15 novembre, `docs/sessions/2026-11-16-synthese-metiers-marche-questions-ouvertes.md`. Lore, GDD, marketing, architecture et roadmap lus lors de la première série ; décisions plus récentes de la session du 16 prioritaires pour le héros et les métiers.

Assets Kalendrath : cités I–V uniquement ; Éclaireur, Forge palier 2, Garde, Hôtel de ville palier 4, Scierie palier 2, Abondance et icônes des quatre ressources. Aucun fichier de Rakorn.

`npm run build` compile deux pages, CSS, JS, logo et copie les images utilisées dans `dist/assets/`. Les polices et liens communs restent attendus au niveau parent. `node --check main.js` vérifie la syntaxe. Le parent complète les mesures de viewport et interactions. Le domaine n’est pas touché ; aucune commande Composer n’est nécessaire pour ces documents de revue autonomes.
