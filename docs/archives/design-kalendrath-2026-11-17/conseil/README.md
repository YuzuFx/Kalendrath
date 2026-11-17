# Le conseil de guerre — proposition C

17 novembre 2026. Création par l’agent Atlas, finalisation et vérification par l’agent principal.

## Intention

Mettre la décision au centre sans perdre le monde peint. La vitrine présente dès l’ouverture une miniature interactive de l’accueil : fin d’un chantier simulée, ressources et cité. Le formulaire est à proximité immédiate. Le jeu utilise un rail nommé, une menace visible et une colonne de mouvements filtrables ; construction, héros et garnison restent proches.

Bleu nuit, panneaux ardoise translucides, violet pour la sélection, bronze pour la marque. Le sceau des Obélisques est conservé. Cinzel et Manrope sont auto-hébergées avec licences OFL. Les vignettes issues de grilles sont cadrées par CSS, sans modifier les fichiers source.

## Origine des choix

- Capture d’interface fournie par Gregory : continuité couleur, ressources, héros/conseil, chantiers, mouvements et garnison.
- Description archivée de Partition : `docs/archives/retours-agents-2026-11-01-site-logos.md`. Les artefacts Claude n’ont pas été consultables directement. Les cités I–V sont montrées, VI–X sont de simples cases inconnues.
- Audits Rakorn du 15 novembre : fond illustré, panneaux retenus, retours d’action et animations ciblées ; aucun asset ou code de Rakorn repris.
- `CLAUDE.md`, GDD, lore, feuille de route, brief vitrine, voix et lexique.
- Synthèse du 16 novembre : héros chef du royaume, métiers et commerce actés, détails de livraison et économie encore ouverts. Destinations Métiers et Marché explicitement « en conception ».

## Parcours de démonstration

- Formulaire à adresse et consentement requis, retour explicite sans collecte.
- Miniature : simuler puis réinitialiser la fin du chantier.
- Progression : ouvrir un palier I–V dans une boîte de dialogue, fermer par bouton ou Échap.
- Jeu : masquer tutoriel, achever/réinitialiser chantier, filtrer les mouvements, lire les panneaux de destination, réduire les effets.
- Chaque action reste en mémoire ; aucune transaction ni communication réseau.

## Compromis

La navigation latérale permet davantage de destinations explicites que la barre d’icônes de la capture, mais réduit la largeur du décor. À petit écran, le repli doit garder des cibles tactiles lisibles. Les libellés de démonstration rendent les limites transparentes ; ils seront retirés lorsque les actions seront reliées au jeu. Aucun niveau, coût ou effectif fictif ne vaut équilibrage. Le sceau remplace le portrait du héros en attendant un visuel dédié.

## Textes anglais principaux

- A shattered world. A realm in your hands.
- Build your city. Lead your hero. Face what stirs beyond the walls.
- Follow the making of the realm.
- Your capital / Construction / Hero & Council / Troop movements / Garrison.
- This is an interactive design study. No email address is stored or sent, and no game action is performed.
- Professions and player trading are in design. Names, currency and delivery sequence remain to be defined.

Les pages de revue sont en français ; ces textes constituent une base éditoriale, pas une interface bilingue achevée.

## Vérification

`npm run build` assemble les sources statiques. Le parent effectue les contrôles Chromium à 390, 1280, 1440 et 2560 pixels, dont deux vues de 720 pixels de haut, et les tests d’interactions. Les captures et résultats JSON sont dans `../captures/`. La publication privée est gérée par le parent dans le Site existant.
