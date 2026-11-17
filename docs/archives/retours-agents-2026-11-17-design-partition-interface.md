# Kalendrath — nouvelle série, Partition et interface immersive

17 novembre 2026. Demande de Gregory : nouvelles propositions à partir de sa capture d’interface, des artefacts Claude, de sa préférence pour Partition, du sceau des Obélisques de Codex et de l’audit graphique Rakorn.

## Résultat

[Comparateur local](design-kalendrath-2026-11-17/index.html), [planche d’identité](design-kalendrath-2026-11-17/identite.html).

Trois ensembles comprenant chacun une vitrine et un accueil connecté :

1. [Partition](design-kalendrath-2026-11-17/partition/index.html) : inscription dans le premier écran sur ordinateur, cité en fond et dix bandes de progression. Rapport : [README](design-kalendrath-2026-11-17/partition/README.md).
2. [La cité vivante](design-kalendrath-2026-11-17/cite-vivante/index.html) : scènes panoramiques, sélecteur des paliers et interface laissant une place au décor. Rapport : [README](design-kalendrath-2026-11-17/cite-vivante/README.md).
3. [Le conseil de guerre](design-kalendrath-2026-11-17/conseil/index.html) : miniature interactive du jeu dès la vitrine, accueil plus dense et mouvements filtrables. Rapport : [README](design-kalendrath-2026-11-17/conseil/README.md).

Les trois agents de la première série ont repris leur travail. L’agent principal a terminé la troisième piste et les corrections de la deuxième après interruption des sous-agents par leur limite d’usage ; il a assuré comparateur, identité, revue, tests et publication privée.

## Références effectivement disponibles

- Capture d’interface transmise par Gregory : examinée directement. Cité en fond, bleu nuit, violet, ressources, menace, tutoriel, chantiers, héros/conseil, mouvements et garnison.
- Neuf liens d’artefacts Claude : échec de l’outil web. Vérification Chromium supplémentaire de Partition, du premier comparateur et de la planche logos : page de vérification ou erreur réseau, sans rendu consultable. Aucun contournement entrepris.
- Descriptions des variantes et des signes retrouvées dans `docs/archives/retours-agents-2026-11-01-site-logos.md`. Le scratchpad temporaire référencé n’existe plus. L’exploitation de ces variantes repose donc sur leur documentation, pas sur une prétendue inspection des neuf artefacts.
- Audits Rakorn visuel et style du 15 novembre, synthèse du 16 novembre sur métiers/commerce, GDD, lore, brief vitrine, roadmap, guides voix et lexique.

## Avis de l’agent principal

**Partition est le meilleur point de départ pour la vitrine.** Son formulaire et le genre sont immédiatement visibles sur ordinateur, l’Obélisque donne un point focal et la progression montre une raison concrète de s’attacher au royaume. La version mobile conserve un CTA mais place le formulaire après le texte : ce n’est pas une inscription entièrement visible sans défilement à 390 px.

**Le conseil de guerre est la base la plus efficace pour l’accueil du jeu.** Construction et mouvements sont proches, les filtres réduisent le bruit, les destinations sont nommées. Le rail coûte de la largeur mais facilite le repérage. Le décor reste présent sans retarder autant les décisions que dans la capture d’origine. La miniature interactive sur la vitrine est aussi une bonne preuve visuelle, à conserver comme démonstration tant que le jeu n’est pas relié.

**La cité vivante préserve le mieux la contemplation.** Son paysage et ses panneaux moins encadrés donnent une transition agréable entre vitrine et jeu. Le formulaire est en bas de page, accessible par CTA ; ce choix donne davantage de place au récit mais ajoute du défilement avant inscription.

Recommandation : vitrine Partition + organisation de jeu Conseil + sceau commun. Cette combinaison conserve la même palette et les mêmes polices ; il faudra ensuite harmoniser la densité et les composants dans un véritable design system React.

## Identité et images

Sceau principal conservé sans modification. Deux déclinaisons originales ajoutées : monochrome ivoire avec espaces transparents, et forme compacte adaptée aux petits formats. Cinzel pour titres/marque, Manrope pour l’interface, téléchargées depuis le dépôt officiel Google Fonts et servies localement avec leurs licences OFL. Aucun appel Google Fonts au chargement.

Les scènes proviennent de la direction artistique de Kalendrath. Les références de certaines unités sont des grilles : cadrage CSS illustratif d’une case plutôt qu’affichage de la planche entière. Les téléchargements des upscales validés depuis le CDN ont retourné 403 ; aucun fichier existant n’a été remplacé. Certaines vignettes secondaires restent des références de travail ; les portraits propres au héros et aux conseillers sont encore à produire.

Rakorn inspire des principes (panneaux sur décor, anneaux lents, retours d’action), sans copie de code, d’images ou de personnages. Réduction des mouvements : arrêt complet des animations de ces maquettes.

## Contenu et limites

- Héros chef du royaume, conformément à la dernière synthèse ; pas de retour au modèle ancien d’un héros par ville.
- Métiers et commerce mentionnés en conception ; aucun catalogue, monnaie ou ordre de livraison inventé.
- Pas d’immunité PvP ni de date de lancement promise.
- Vitrines I–V seulement ; VI–X représentés par silhouettes ou cases inconnues. Le test réseau des nouvelles vitrines ne charge aucune image des paliers tardifs. La première série historique, accessible séparément en privé, n’est pas réécrite.
- Données et actions de jeu fictives, formulaires sans collecte, aucune connexion au moteur.
- Pages de revue françaises, principaux textes anglais dans les rapports ; pas de bascule bilingue complète.

## Contrôles

24 rendus : six pages × quatre formats (390×844, 1280×720, 1440×1000, 2560×720). Aucun débordement horizontal global, image manquante ou erreur JS après corrections. Polices locales chargées. Aucune animation infinie active avec `prefers-reduced-motion: reduce`. Comparateur et identité contrôlés en plus à 390 et 1440 px.

Parcours testés : email/consentement et retour sans collecte, progression par clic/clavier, fermeture des dialogues par Échap, fin et réinitialisation d’un chantier, mise en file, scénario PvE calme, tutoriel repliable, filtres de mouvements, désactivation des effets. Aucun appel HTTP externe dans ces parcours locaux.

Preuves : `design-kalendrath-2026-11-17/captures/verification-partition-cite-vivante-conseil.json`, `interactions.json`, captures PNG. Builds statiques exécutés pour les ensembles et le comparateur. Aucun changement PHP, Blade, domaine, dépendance ou lockfile ; chaîne Composer hors périmètre.

## Aperçu privé

Même Site : `appgprj_6afb54ba57dc8191a5eb7ebdf6c3b073`. Première série conservée sous `/premiere-serie.html`, nouvelle sous `/v2/index.html`, racine redirigée vers la nouvelle.

Dépôt de publication distinct du jeu. Un transfert de 116,2 Mio a dépassé la limite de 64 Mio ; sources conservées puis illustrations réparties en petits commits/transferts. Aucun commit/push dans le dépôt du jeu. Statut final de publication consigné ci-dessous après confirmation.

Publication confirmée `succeeded` :

- URL : https://kalendrath-design-explorations-20261116.candiddrum67.chatgpt.site/v2/index.html
- Version : `appgprj_6afb54ba57dc8191a5eb7ebdf6c3b073~appgver_9576df92a920819199f8f02283fcb6c9`
- Déploiement : `appgdep_6afcd3ec74dc8191816fbca9a0e492de`
- Commit du dépôt Sites : `1d53da3249fa75fae8c01f3f2889a8fc127af35f`
- Accès propriétaire privé conservé. Aucun déploiement sur le domaine public de Kalendrath.
