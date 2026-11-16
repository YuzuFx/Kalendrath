# Kalendrath — trois propositions visuelles indépendantes

Date : 16 novembre 2026. Demande de Gregory : mandater plusieurs agents pour proposer chacun un ensemble cohérent comprenant vitrine, présentation du projet, roadmap, préinscription/newsletter, accueil du jeu et logo.

## Livrables

[Ouvrir le comparateur local](design-kalendrath-2026-11-16/index.html). Chaque piste possède une vitrine `index.html`, un accueil connecté `jeu.html`, une planche `logo.html`, un symbole vectoriel `logo.svg` et son rapport complet `README.md`.

| Agent | Direction | Rapport complet |
|---|---|---|
| obelisque | Le sceau des Obélisques | [Intentions, sources, compromis et textes EN](design-kalendrath-2026-11-16/obelisque/README.md) |
| atlas | L’Atlas des Éclats | [Intentions, sources, compromis et textes EN](design-kalendrath-2026-11-16/atlas/README.md) |
| fondations | L’Âge des Fondations | [Intentions, sources, compromis et textes EN](design-kalendrath-2026-11-16/fondations/README.md) |

Les trois agents ont travaillé séparément à partir des documents du projet, sans consulter les propositions graphiques ni les verdicts de Claude Code. Les intitulés des directions sont des noms de concepts, pas de nouveaux éléments du lore.

## Avis de design de l’agent principal

Avis fondé sur l’inspection des maquettes dans Chromium.

**Obélisques est ma base recommandée pour poursuivre la direction principale.** La grande image architecturale, le contraste basalte/bronze et le symbole élancé inscrivent immédiatement Kalendrath dans sa direction artistique existante. L’accueil du jeu organise clairement ressources, chantier, héros et rapports. Limite : le registre sombre et doré reste fréquent dans la fantasy ; une typographie de marque propre et quelques détails empruntés aux artefacts de Kaelhelm renforceraient sa singularité. Le mobile demande encore une étude de densité si l’on veut que les actions quotidiennes arrivent plus tôt.

**Atlas est la proposition la plus distincte.** Le papier clair, les filets et les schémas donnent une identité de chronique et d’exploration. Elle offre une vraie alternative à un tableau de bord sombre. Limite : les dessins vectoriels de la carte et de la cité sont des études stylisées, moins immersives que les illustrations validées ; le jeu peut sembler plus abstrait. La carte ne représente pas une géographie canonique ni une mécanique de navigation à développer.

**Fondations exprime le mieux l’attachement à la cité.** La transition entre forêt sombre et pierre claire, les accents cuivre et la présentation des paliers donnent envie de bâtir. Le symbole d’enceinte ouverte est pertinent pour un jeu de gestion. Limite : l’atmosphère plus accueillante doit garder assez de menace et de mana pour rester dark heroic fantasy ; le violet du signe disparaît à très petite taille. C’est une bonne alternative si Gregory veut mettre la construction et la coopération au premier plan.

Je recommande de choisir d’abord un ensemble cohérent. Un assemblage immédiat des trois palettes et styles diluerait leur identité. Le parcours de progression des Fondations pourra ensuite inspirer une section de la direction retenue.

## Cadrage commun

- Sources : `CLAUDE.md`, dernière synthèse de session, lore, GDD, décision d’architecture, feuille de route détaillée et plan marketing ; skills Sites (prototypes locaux), voix et lexique de Kalendrath.
- Français, vouvoiement ; principaux textes anglais archivés dans les rapports. Les interfaces ne proposent pas encore de bascule FR/EN complète.
- Roadmaps par jalons sans date inventée. Phase actuelle : direction artistique et nouvelle interface ; écran Héros, boucle courte, alpha, puis bêta et lancement.
- Distinction entre liste d’intérêt/newsletter actuelle et futures préinscriptions bêta. Pas d’accès aux tests garanti.
- Promesse limitée à « PvE d’abord », sans reprendre les formulations obsolètes d’immunité PvP. Aucun dévoilement du twist du peuple englouti ou des Vahrun.
- Illustrations existantes de la DA, issues de Midjourney ; nouveaux signes et schémas en SVG natif. Aucune génération d’image supplémentaire nécessaire.

## Vérification et limites

Vérification navigateur aux dimensions 1440 × 1000 et 390 × 844 sur les trois pages de chaque proposition. Captures dans [captures/](design-kalendrath-2026-11-16/captures/), résultats dans `verification.json`. Un débordement de palette sur le logo Fondations a été corrigé. Une légende Obélisques pouvant confondre ville humaine et Kaelhelm a été clarifiée ; la navigation de l’accueil Atlas a été adaptée au contexte du jeu.

Les formulaires vérifient le format de l’adresse et le consentement, puis affichent un retour de démonstration. Interactions vérifiées : fin de construction, préparation de mission, ouverture et fermeture d’un panneau, changement d’illustration de palier, ajout simulé à une file. Zéro requête HTTP externe pendant ces parcours ; aucun stockage d’adresse. Résultats dans `captures/interactions.json`.

`npm run build` exécuté pour chaque proposition et pour le portail. Ce sont des prototypes HTML/CSS/JS statiques sans dépendances, sans connexion au moteur. Aucun code PHP, migration, contrôleur, Blade ou composant de production modifié ; chaîne Composer hors périmètre de ces explorations documentaires.

Les logos livrés sont des propositions de symboles, accompagnées de mots-symboles typographiques dans les planches. La typographie propriétaire, les variantes finales monochromes/favicon et la vérification de disponibilité de marque restent du travail de finalisation après choix. Il ne s’agit pas de marques validées.

Les maquettes s’ouvrent directement depuis le dépôt, sans serveur. Elles utilisent parfois des illustrations par chemins relatifs vers `docs/direction-artistique/references` : conserver cette arborescence. Aucun déploiement, commit ou push réalisé. L’intégration durable sera faite en React selon l’architecture du projet après validation de la direction.
