# Tâches à contrôler et à valider

Sujets **mis de côté** le 2026-11-01 : les documents existent mais ne sont ni relus par Gregory, ni intégrés au GDD, aux CGV ou au code. Détail des retours d'agents : [archives/retours-agents-2026-10-31.md](archives/retours-agents-2026-10-31.md), [archives/retours-agents-2026-10-30-heros-kaelite.md](archives/retours-agents-2026-10-30-heros-kaelite.md), [archives/retours-agents-2026-10-30-comparatif-genre.md](archives/retours-agents-2026-10-30-comparatif-genre.md), [archives/retours-agents-2026-10-30.md](archives/retours-agents-2026-10-30.md) et [archives/retours-agents-2026-11-01-site-logos.md](archives/retours-agents-2026-11-01-site-logos.md).

Statut : ☐ à faire.

**Lecture** : sous chaque tâche, la ligne « **Docs** » renvoie aux documents à ouvrir pour la traiter (§ = section du document). Une tâche sans « Docs » propre reprend les documents du titre de sa section.

Documents transverses utiles pour toute tâche : [game-design-document.md](game-design-document.md) (GDD), [decision-architecture-cible.md](decision-architecture-cible.md), [feuille-de-route-projet-jeu.md](feuille-de-route-projet-jeu.md), [revue-generale-2026-10-30.md](revue-generale-2026-10-30.md) (45 décisions, § 7), [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md) (simulateur), dernière synthèse de session dans [sessions/](sessions/).

## PvP — [etude-pvp.md](etude-pvp.md)
Retours d'agents : [archives/retours-agents-2026-10-31.md](archives/retours-agents-2026-10-31.md) § 1. Décisions déjà prises : [etude-pvp.md](etude-pvp.md) § 9.1 et mémoire du 30-31/10.
- ☐ Relire l'étude réécrite (568 lignes) et le bloc 5.4 du GDD modifié par un agent (non relu).
  **Docs :** [etude-pvp.md](etude-pvp.md) (§ 0 « en une page », § 1 à 8) ; [game-design-document.md](game-design-document.md) § 5.4 ; proposition de marquage du GDD : [etude-pvp.md](etude-pvp.md) § 10.
- ☐ Corriger la règle R9, qui contredit la décision sur le mode vacances.
  **Docs :** [etude-pvp.md](etude-pvp.md) § 9.2 (R9) ; décision de Gregory dans la mémoire « décisions PvP/Discord/site » (mode vacances : 48 h, pas d'enchaînement, 72 h d'attente).
- ☐ Trancher R4 : élargir « action hostile » (transport, déploiement, défense groupée, récolte de débris) pour casser le boosting.
  **Docs :** [etude-pvp.md](etude-pvp.md) § 4.3 (définition de « hostile »), § 4.7 (risques), § 9.2 (R4) ; code concerné cité au § 7 (`AttackMission`, `TransportMission`, `DeploymentMission`, `AcsDefendMission`, `RecycleMission`).
- ☐ Trancher le rythme des boucliers gratuits (proposition : 1 par semaine avec plafond de gain, stock illimité conservé), le bouclier activé juste avant l'impact, le défi accepté puis couvert.
  **Docs :** [etude-pvp.md](etude-pvp.md) § 4.3 (« bouclier de dernière seconde »), § 4.7, § 9.2 (R4) ; simulateur : § 4.8 et § 8 (S13, S14).
- ☐ Trancher les débris (pertes définitives seulement, récolte réservée aux belligérants, taux de guerre ≥ 15 %).
  **Docs :** [etude-pvp.md](etude-pvp.md) § 4.6 (chiffres d'après le code), § 4.8, § 9.2 ; barème des débris hérité : [game-design-document.md](game-design-document.md) § 5.4.
- ☐ Mode vacances : délai de 12 h après attaque menée, refus si attaque ennemie en vol (le code ne vérifie qu'au départ) + test.
  **Docs :** [etude-pvp.md](etude-pvp.md) § 4.3 et § 9.2 (R9) ; § 7 « plan de mise en œuvre » ; suites de tests : `tests/` (missions de flotte, voir [decision-architecture-cible.md](decision-architecture-cible.md) § 4 sur la règle « toute règle manquante s'ajoute dans `app/Services` ou `app/GameMissions` avec son test Pest »).
- ☐ Passer S13 (débris) et S14 (vacances/boucliers) au simulateur avant tout code.
  **Docs :** [etude-pvp.md](etude-pvp.md) § 8 « ce que le simulateur doit apprendre » ; [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md) ; principe « cornerstone » dans [../CLAUDE.md](../CLAUDE.md).
- ☐ Reformuler la promesse marketing « le joueur pacifique ne se fait pas écraser » (R13) dans le plan marketing, le brief et le site.
  **Docs :** [etude-pvp.md](etude-pvp.md) § 6.5 et § 9.2 (R13) ; [plan-marketing.md](plan-marketing.md) § 2 (« pitch », « ce qu'on ne promet pas ») ; [brief-site-vitrine.md](brief-site-vitrine.md) § 2.1 ; mockups : section « Site vitrine » ci-dessous.
- ☐ Confirmer le délai d'ouverture des guerres au chapitre 1 (proposition : J21).
  **Docs :** [etude-pvp.md](etude-pvp.md) § 5 « le délai minimal de la guerre : J21 » ; [etude-serveurs-en-continu.md](etude-serveurs-en-continu.md) (rythme par chapitre) ; [game-design-document.md](game-design-document.md) § 5.4 et § 5.9.

## Parrainage — [etude-parrainage.md](etude-parrainage.md)
Retours d'agents : [archives/retours-agents-2026-10-31.md](archives/retours-agents-2026-10-31.md) § 2.
- ☐ Relire l'étude, trancher D1–D14.
  **Docs :** [etude-parrainage.md](etude-parrainage.md) § 2 (mécanique), § 4 (anti-abus), § 9 (décisions D1–D14), § 10 (suites) ; fraude au parrainage : [comportements-bannissables.md](comportements-bannissables.md) B15.
- ☐ Caler les montants (unités K) au simulateur : Q1–Q10 ; le simulateur n'a ni Kaelite ni profil occasionnel.
  **Docs :** [etude-parrainage.md](etude-parrainage.md) § 8 (Q1–Q10) et § 6 (économie, pay-to-win) ; [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md) ; Kaelite : [plan-marketing.md](plan-marketing.md) § 8.
- ☐ Vérifier les références de droit citées de mémoire (L34-5 CPCE, CNIL) et l'exemple Dropbox.
  **Docs :** [etude-parrainage.md](etude-parrainage.md) § 5 (RGPD) et § 7 (exemples de jeux) ; [legal/revue-juridique.md](legal/revue-juridique.md) § 7 (« exactitude des articles cités »).
- ☐ Ajouter une fiche parrainage au registre des traitements (MI-17).
  **Docs :** [etude-parrainage.md](etude-parrainage.md) § 5 ; [legal/07-registre-des-traitements.md](legal/07-registre-des-traitements.md) (+ [version EN](legal/07-registre-des-traitements-en.md)) ; [legal/02-politique-de-confidentialite.md](legal/02-politique-de-confidentialite.md).

## Stripe — [etude-stripe.md](etude-stripe.md)
Retours d'agents : [archives/retours-agents-2026-10-31.md](archives/retours-agents-2026-10-31.md) § 3.
- ☐ Valider le constat « Managed Payments interdit la Kaelite » auprès de Stripe (confirmation écrite) et demander le tarif de Stripe Tax avec Checkout.
  **Docs :** [etude-stripe.md](etude-stripe.md) § 1.2 et § 3.1 (conditions du 28/09/2026, art. 7(f)), § 6 (incertitudes), § 7 (sources) ; [legal/revue-comptable.md](legal/revue-comptable.md) § 3 et B2 (recommandation initiale infirmée).
- ☐ Décider du pack minimum : 0,99 € permanent ou offre de bienvenue unique (recommandation de l'agent), au vu du net (0,34–0,50 €) et du coût d'un litige.
  **Docs :** [etude-stripe.md](etude-stripe.md) § 2 (économie, tableaux, seuils, mini-paquets), § 4.2 (litiges), § 5 (recommandation et décisions) ; [plan-marketing.md](plan-marketing.md) § 8.
- ☐ Traiter le Royaume-Uni (bloquer ou déclarer) et la déclaration OSS.
  **Docs :** [etude-stripe.md](etude-stripe.md) § 1.3 ; [legal/revue-juridique.md](legal/revue-juridique.md) IM-15 ; [legal/revue-comptable.md](legal/revue-comptable.md) § 7 (obligations déclaratives) et I5.
- ☐ Ne pas activer le compte avant SIREN, compte bancaire dédié et médiateur.
  **Docs :** [etude-stripe.md](etude-stripe.md) § 4.1 et § 5 (« à faire, dans l'ordre ») ; [legal/revue-comptable.md](legal/revue-comptable.md) B4 ; [legal/README.md](legal/README.md) § 2 (champs à compléter).
- ☐ Faire valider TVA et traitement comptable de la Kaelite par un comptable humain.
  **Docs :** [legal/revue-comptable.md](legal/revue-comptable.md) § 6 (traitement comptable) et § 8 (questions à poser à un expert-comptable) ; [etude-stripe.md](etude-stripe.md) § 1.3 ; [legal/05-cgv-kaelite.md](legal/05-cgv-kaelite.md).

## Grok Bots — [etude-grok-bots.md](etude-grok-bots.md)
Retours d'agents : [archives/retours-agents-2026-10-31.md](archives/retours-agents-2026-10-31.md) § 4.
- ☐ Lire les pages non lues (x.ai/bot, CGU, politique de confidentialité, DPA, tarifs officiels) ; l'agent a reçu des 403.
  **Docs :** [etude-grok-bots.md](etude-grok-bots.md) § 1 (résumé), § 6 (vrai / faux / à vérifier), « Sources ».
- ☐ Confirmer le prix réel et ce que l'abonnement inclut.
  **Docs :** [etude-grok-bots.md](etude-grok-bots.md) § 5 (coût réel).
- ☐ Décider de l'essai : un seul Bot, compte dédié avec 2FA, règles « Ask first », rôles limités à brouillons/préparation.
  **Docs :** [etude-grok-bots.md](etude-grok-bots.md) § 4 (rôle par rôle), § 7 (architecture en paliers), § 8 (décisions) ; sécurité : § 3 ; [specification-discord.md](specification-discord.md) § 11.
- ☐ Ne jamais déléguer comptabilité, droit, bannissements, engagements ; modération Discord reportée.
  **Docs :** [etude-grok-bots.md](etude-grok-bots.md) § 4 ; [comportements-bannissables.md](comportements-bannissables.md) § 2.4 (circuit de décision humain) ; [specification-discord.md](specification-discord.md) § 8.

## Héros — branche `feat/heros-suite` (commit f3a6a17c, non fusionnée)
Détail : [archives/retours-agents-2026-10-30-heros-kaelite.md](archives/retours-agents-2026-10-30-heros-kaelite.md) (Tâche A : « Livré », « Règles supposées », « Reste à faire »). Spécification : [game-design-document.md](game-design-document.md) § 5.5 (système Héros/Gouverneur).
- ☐ Relire et fusionner la branche (1192 tests verts, pint et phpstan propres) ; elle ajoute deux migrations (rôle du héros, effets et emplacements des objets) et convertit l'archétype « Guerrier » en `warrior`.
  **Docs :** archive, Tâche A « Livré » ; [game-design-document.md](game-design-document.md) § 5.5 et § 5.10 (correspondance GDD ↔ OGameX) ; hook de qualité : [../CLAUDE.md](../CLAUDE.md) « Outils du projet ».
- ☐ Conseillers : ligne de `heroes` avec un rôle (choix actuel) ou table séparée comme l'annonce le GDD ?
  **Docs :** archive, Tâche A « Règles supposées » ; [game-design-document.md](game-design-document.md) § 5.5 ; [game-design-document.md](game-design-document.md) § 5.10.
- ☐ Valeurs du GDD encore ouvertes : niveau maximal des conseillers (10 retenu, GDD : 10 à 15), ratio du plafond des conseillers (50 % retenu, GDD : un tiers à la moitié), emplacements de l'inventaire allégé (les 8 pour l'instant).
  **Docs :** [game-design-document.md](game-design-document.md) § 5.5 (cherchez les **[TBD]**) ; archive, Tâche A « Règles supposées ».
- ☐ Confirmer que les plafonds par axe s'appliquent au total talents + objets, et que la somme des conseillers s'ajoute à celui du héros (total jusqu'à 150 %).
  **Docs :** archive, Tâche A « Règles supposées » ; [game-design-document.md](game-design-document.md) § 5.5.
- ☐ Coût ou délai éventuel de la réinitialisation des talents (gratuite aujourd'hui) ; palier minimal d'accès aux talents (aucun aujourd'hui).
  **Docs :** [game-design-document.md](game-design-document.md) § 5.5 et § 4.2 (paliers de cité) ; [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md) (prérequis).
- ☐ Confirmer les noms d'effets de la table du GDD (ex. `troop_combat_bonus_percent`) face à ceux du démo (ex. `garrison_defense_bonus_percent`).
  **Docs :** [game-design-document.md](game-design-document.md) § 5.5 (table des effets) ; archive, Tâche A « Livré » ; skill `lexique-kalendrath` (`.claude/skills/lexique-kalendrath/`).
- ☐ Suite à planifier : API et écran React, changement de héros principal en boutique, arbres réels des 6 archétypes, retrait de `planet_id`, indisponibilité après échec, XP automatique, sièges débloqués par le prestige.
  **Docs :** archive, Tâche A « Reste à faire » ; [decision-architecture-cible.md](decision-architecture-cible.md) § 6 (ordre de bascule des écrans) ; [game-design-document.md](game-design-document.md) § 5.5 et § 5.6 (prestige) ; [feuille-de-route-projet-jeu.md](feuille-de-route-projet-jeu.md) Phase 4.
- ☐ Les 4 échecs ponctuels de `FleetDispatchAttackTest` (suite lancée en parallèle, verte au second passage) : à surveiller, tests de flotte probablement fragiles.
  **Docs :** archive, Tâche A ; [run-tests-in-loop-until-failure.md](run-tests-in-loop-until-failure.md) (méthode pour reproduire un test instable).

## Kaelite à deux soldes — branche `feat/kaelite-deux-soldes` (3 commits, non fusionnée)
Détail : [archives/retours-agents-2026-10-30-heros-kaelite.md](archives/retours-agents-2026-10-30-heros-kaelite.md) (Tâche B : compte rendu de l'agent et « Vérifications de Claude »). Cadre : [plan-marketing.md](plan-marketing.md) § 8 (« Kaelite liée au compte », règles du 27-28/10), [etude-serveurs-en-continu.md](etude-serveurs-en-continu.md) (lobby, soldes).
- ☐ Relire et fusionner la branche (1170 tests verts) ; relire les 14 règles supposées, dont le gel qui ne bloque que les dépenses.
  **Docs :** archive, Tâche B ; [legal/05-cgv-kaelite.md](legal/05-cgv-kaelite.md) (gel conservatoire) ; [legal/revue-juridique.md](legal/revue-juridique.md) IM-3 ; [legal/revue-comptable.md](legal/revue-comptable.md) I3 et I6.
- ☐ Bonus bêta de 30 % actif par défaut dans la config : le laisser, ou mettre 0 par défaut et l'activer pour la bêta (recommandation de Claude : 0).
  **Docs :** archive, Tâche B « Vérifications de Claude » ; [plan-marketing.md](plan-marketing.md) § 8 (« Bêta ») ; [legal/05-cgv-kaelite.md](legal/05-cgv-kaelite.md).
- ☐ Un portefeuille gelé peut-il recevoir de la Kaelite gagnée ? (oui aujourd'hui)
  **Docs :** archive, Tâche B ; [comportements-bannissables.md](comportements-bannissables.md) § 4 (Kaelite et sanctions) ; [legal/revue-juridique.md](legal/revue-juridique.md) IM-3.
- ☐ Plafond du report de Kaelite achetée non dépensée après la bêta (non implémenté).
  **Docs :** archive, Tâche B ; [plan-marketing.md](plan-marketing.md) § 8 (« Bêta » et « Kaelite liée au compte ») ; [legal/05-cgv-kaelite.md](legal/05-cgv-kaelite.md).
- ☐ Protocole de compensation (réserver puis confirmer) quand le solde acheté vivra dans le lobby distant.
  **Docs :** archive, Tâche B ; [etude-serveurs-en-continu.md](etude-serveurs-en-continu.md) (« le lobby ») ; [plan-deploiement.md](plan-deploiement.md) § 8.3.
- ☐ Non implémenté : durée maximale de 7 jours du gel conservatoire, D4 (sort de la Kaelite achetée en cas de N5), perte de la Kaelite pour fraude de paiement.
  **Docs :** [comportements-bannissables.md](comportements-bannissables.md) § 4 et B11 ; [legal/revue-juridique.md](legal/revue-juridique.md) IM-3 ; [legal/revue-comptable.md](legal/revue-comptable.md) I3.
- ☐ Valider le ton des libellés FR/EN de `t_kaelite.php` (« Annulation de paiement », « Payment reversal »…).
  **Docs :** skill `voix-kalendrath` (`.claude/skills/voix-kalendrath/`) ; skill `lexique-kalendrath` ; fichier `resources/lang/` correspondant.

## Comparatif du genre, compléments du 30/10 — [references-jeux/complements/](references-jeux/complements/)
Détail des retours d'agents : [archives/retours-agents-2026-10-30-comparatif-genre.md](archives/retours-agents-2026-10-30-comparatif-genre.md). Rien n'est intégré au GDD, au plan marketing ni au simulateur. Documents de base : [references-jeux-du-genre.md](references-jeux-du-genre.md) (§ 7 « Kalendrath face au genre »), [references-jeux/README.md](references-jeux/README.md), [références HTML](references-jeux/synthese-comparatif.html).
- ☐ Relire les 7 documents de compléments, la section 6 de la synthèse et l'artefact « Kalendrath face au genre » (version 2, republiée le 30/10).
  **Docs :** les 7 fichiers de [references-jeux/complements/](references-jeux/complements/) : [temps-reel-gratuit-actif](references-jeux/complements/temps-reel-gratuit-actif.md), [prix-et-avis-joueurs](references-jeux/complements/prix-et-avis-joueurs.md), [retention-longue-et-payeurs](references-jeux/complements/retention-longue-et-payeurs.md), [ia-echecs-push-couts-jeux](references-jeux/complements/ia-echecs-push-couts-jeux.md), [temps-reel-whiteout-reddit](references-jeux/complements/temps-reel-whiteout-reddit.md), [reddit-vague-2](references-jeux/complements/reddit-vague-2.md), [reddit-vague-3](references-jeux/complements/reddit-vague-3.md) ; [synthese-comparatif.html](references-jeux/synthese-comparatif.html) ; archive § 1 à 8.
- ☐ Rythme : passer au simulateur les temps réels Reddit (Whiteout 100–180 j, Last War 120–150 j, Rise of Kingdoms 100–132 j pour un gratuit actif) avant de rouvrir la question 4 de l'artefact (fin de cité à 2 ans ou vers 12–14 mois). Ce sont des témoignages déclaratifs, à ne pas citer comme des mesures.
  **Docs :** [references-jeux/complements/temps-reel-gratuit-actif.md](references-jeux/complements/temps-reel-gratuit-actif.md) et [temps-reel-whiteout-reddit.md](references-jeux/complements/temps-reel-whiteout-reddit.md) ; [references-jeux-du-genre.md](references-jeux-du-genre.md) § 4 et § 7.4 ; [references-jeux/retention-et-design-du-temps.md](references-jeux/retention-et-design-du-temps.md) ; [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md) ; voir aussi B2 dans la section « Sondage » ci-dessous.
- ☐ Plan marketing : r/indiegames interdit l'IA générative (règle 12) ; r/4Xgaming interdit l'autopromotion hors mégafils. Relire les règles du jour avant tout post Reddit avec un visuel Midjourney, et ajuster la section Reddit du plan.
  **Docs :** [references-jeux/complements/reddit-vague-2.md](references-jeux/complements/reddit-vague-2.md) et [reddit-vague-3.md](references-jeux/complements/reddit-vague-3.md) ; [plan-marketing.md](plan-marketing.md) § 5 (« canaux retenus », « règles des communautés ») ; [references-jeux/lancement-indie-et-communaute.md](references-jeux/lancement-indie-et-communaute.md) ; skill `checklist-publication`.
- ☐ Midjourney : lire les conditions officielles (403 pour l'agent) et faire confirmer le statut des images purement générées en France / UE (probablement non protégeables) ; à inclure dans les questions pour l'avocat.
  **Docs :** [references-jeux/complements/ia-echecs-push-couts-jeux.md](references-jeux/complements/ia-echecs-push-couts-jeux.md) ; [brief-site-vitrine.md](brief-site-vitrine.md) § 1.4 (mention de transparence sur l'IA générative) ; [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md) ; [legal/README.md](legal/README.md) § 4 (points à valider par un avocat) ; [references-jeux/cadre-legal-ue.md](references-jeux/cadre-legal-ue.md).
- ☐ Ouvrir à la main le PDF d'InnoGames sur le site de MTG (2021) : ~9 % de payeurs pour Forge of Empires et 15,4 % de la valeur vie au premier mois (non confirmé).
  **Docs :** [references-jeux/complements/retention-longue-et-payeurs.md](references-jeux/complements/retention-longue-et-payeurs.md) ; [references-jeux/forge-of-empires.md](references-jeux/forge-of-empires.md) ; [references-jeux/monetisation-et-boutiques.md](references-jeux/monetisation-et-boutiques.md).
- ☐ Relire la page de support Travian sur la durée d'un round ×1 (~20 semaines, vue en extrait seulement) et la feuille de route des mondes.
  **Docs :** [references-jeux/complements/temps-reel-gratuit-actif.md](references-jeux/complements/temps-reel-gratuit-actif.md) ; [references-jeux/formats-serveur-et-rattrapage.md](references-jeux/formats-serveur-et-rattrapage.md) ; [etude-serveurs-en-continu.md](etude-serveurs-en-continu.md).
- ☐ Tester le statut des web apps iOS dans l'UE (sources contradictoires : Apple 01/03/2024 contre MagicBell 03/2026) avant de miser sur la PWA et le push.
  **Docs :** [references-jeux/complements/ia-echecs-push-couts-jeux.md](references-jeux/complements/ia-echecs-push-couts-jeux.md) ; [references-jeux/navigateur-vs-mobile.md](references-jeux/navigateur-vs-mobile.md) ; mémoire « Appli mobile native » (objectif Android/iOS).
- ☐ Cohérence des coûts : micro-entreprise 2026 (catégorie du jeu, BNC ou BIC, 12,3 / 21,2 / 25,6 %), médiateur, relecture des CGV, frais de paiement (Stripe 1,5 % + 0,25 €, Paddle et Lemon Squeezy 5 % + 0,50 $), à rapprocher de l'étude Stripe ci-dessus. Pas un avis juridique.
  **Docs :** [references-jeux/complements/ia-echecs-push-couts-jeux.md](references-jeux/complements/ia-echecs-push-couts-jeux.md) ; [etude-stripe.md](etude-stripe.md) § 2 ; [legal/revue-comptable.md](legal/revue-comptable.md) § 2 (repères chiffrés 2026) ; [plan-marketing.md](plan-marketing.md) § 10 (budget).
- ☐ Trous encore ouverts, à chercher à la main (Reddit privé, Discords, rapports payants) : temps réel de Call of Dragons au Hall 25, records T5 (380 / 567 j, introuvables), rétention J90+, taux de payeurs et revenu par payeur de Travian / Tribal Wars / Torn / Elvenar, fusions d'univers, tout OGame (r/OGame inaccessible), prix des lingots de Last War, des officiers d'OGame et des Conseillers de Grepolis, fiches Total Battle / Lords Mobile / Kingdom Guard / PvE de Last War / Kingshot.
  **Docs :** [references-jeux-du-genre.md](references-jeux-du-genre.md) § 6 (« trous à combler ») et § 7.5 (points faibles du sourcing) ; [references-jeux/complements/reddit-vague-3.md](references-jeux/complements/reddit-vague-3.md) ; [references-jeux/verification-des-4-jeux.md](references-jeux/verification-des-4-jeux.md) ; [references-jeux/jeux-fermes-ou-echoues.md](references-jeux/jeux-fermes-ou-echoues.md).
- ☐ Navigateur Playwright : ajouter `.playwright-mcp/` au `.gitignore` (le dossier est réapparu à la racine). Chrome intégré à Claude Code non pris en charge sous WSL : un retour via `/feedback` est possible mais optionnel.
  **Docs :** archive § 5 « Navigateur : documentation Claude in Chrome sous WSL » ; voir aussi « Nettoyage » dans la section Site vitrine ci-dessous.
- ☐ Commiter la présente archive et la mise à jour de ce fichier.
  **Docs :** [archives/retours-agents-2026-10-30-comparatif-genre.md](archives/retours-agents-2026-10-30-comparatif-genre.md) § « Suites faites dans la session » ; fichiers non suivis listés par `git status`.

## Site vitrine et logos — mockups du 01/11 ([archive détaillée](archives/retours-agents-2026-11-01-site-logos.md))

Artefacts privés : coupe [V1 l'Axe](https://claude.ai/artifact/DG6gV9oGVfu6GFQxB8UXNS), [V2 la Maquette](https://claude.ai/artifact/RVM2XUMZfL6aABQbWV8mgM), [V3 les Salles](https://claude.ai/artifact/KFNWvys7iWAzvTNVE29qtE) ; frise [V1 la Montée](https://claude.ai/artifact/9JENvJvSfVrw84PFtG14mD), [V2 la Colonne](https://claude.ai/artifact/8hjw5ayJ6u3Wm8njZcV4zo), [V3 la Partition](https://claude.ai/artifact/Ee7125NoTD5nu5SKQuFW9T) ; [logos](https://claude.ai/artifact/JMADbd1mBb63myUhqTAqRF). Analyses : [marketing](brainstorm-design/phase2-marketing.md), [game design](brainstorm-design/phase2-game-design.md), [DA/UX](brainstorm-design/phase2-da-ux.md), [technique et joueurs](brainstorm-design/phase2-technique-joueurs.md). Première série de brainstorms : [marketing](brainstorm-design/marketing.md), [game design](brainstorm-design/game-design.md), [DA/UX](brainstorm-design/direction-artistique-ux.md), [pistes de logos](brainstorm-design/logos-ideas/). Cadre : [brief-site-vitrine.md](brief-site-vitrine.md), [direction-design-site.md](direction-design-site.md) (concept non retenu), [plan-marketing.md](plan-marketing.md). Gregory n'a encore rien relu de cette série.

**Décisions à prendre**
- ☐ Base de l'accueil : hybride centré sur l'Axe (DA/UX, 2e pour les joueurs) ou Partition (1re pour marketing, game design, joueurs, 4e pour la DA/UX) ; coupe en corps de page ou frise ; la coupe (ou le sélecteur de paliers) sur une page « Le jeu ».
  **Docs :** [archive](archives/retours-agents-2026-11-01-site-logos.md) § 3 (classements croisés) et § 2.1 à 2.4 ; les quatre analyses `phase2-*.md` (section « hybride » / « assemblage ») ; [brief-site-vitrine.md](brief-site-vitrine.md) § 1.2 (plan du site) et § 2.1 / § 2.3 (accueil, le jeu).
- ☐ Logo : confirmer K1 « Taillé » (marque) et K5 « Négatif » (favicon) ; garder ou non C1 comme pictogramme de capitale ; sort de N1 et K3 (avatar).
  **Docs :** [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.3 et § 2 ; [logos](https://claude.ai/artifact/JMADbd1mBb63myUhqTAqRF) ; [brainstorm-design/logos-ideas/](brainstorm-design/logos-ideas/) ; [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md) (règles de couleur, veine de mana).
- ☐ Lancer ou non une itération qui assemble l'hybride avec les corrections ci-dessous.
  **Docs :** [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.1 et § 1.2 (défauts connus) ; mémoire « Mockups PC + mobile » (PC et mobile 390 × 844).
- ☐ Trancher les six questions finales du [fichier game design](brainstorm-design/phase2-game-design.md).
  **Docs :** [phase2-game-design.md](brainstorm-design/phase2-game-design.md) (dernière section) ; [game-design-document.md](game-design-document.md) § 4.2 et § 5.9.

**Corrections à faire avant toute publication**
- ☐ Spoil des paliers VII à X : ne pas charger les images (pas de simple flou CSS), retirer les légendes type « Le portail s'éveille », retirer l'image du Portail des Sphères des pages ; harmoniser le nombre de paliers montrés (10, 5 ou 4 selon la page).
  **Docs :** [phase2-game-design.md](brainstorm-design/phase2-game-design.md) (spoil) ; [phase2-da-ux.md](brainstorm-design/phase2-da-ux.md) (secret des paliers incohérent) ; [brief-site-vitrine.md](brief-site-vitrine.md) § 2.3 (noms de paliers interdits au public) ; [game-design-document.md](game-design-document.md) § 4.2.
- ☐ Retirer « jusqu'à quatre conseillers » (dépend du Prestige, non annoncé).
  **Docs :** [phase2-game-design.md](brainstorm-design/phase2-game-design.md) ; [game-design-document.md](game-design-document.md) § 5.5 et § 5.6 (prestige).
- ☐ Ne pas placer le PvP, les hordes et les ligues sur des paliers précis : le GDD donne le Bourg (palier 3) et 14 jours de compte.
  **Docs :** [phase2-game-design.md](brainstorm-design/phase2-game-design.md) ; [game-design-document.md](game-design-document.md) § 5.4 et § 4.2 ; [etude-pvp.md](etude-pvp.md) § 4.4 (protection des petits joueurs).
- ☐ Adoucir « vos boucliers vous couvrent » (stock gratuit personnel, couverture continue payante) et corriger « rejoignez une alliance pour bâtir en paix » (le joueur sans alliance est déjà protégé).
  **Docs :** [etude-pvp.md](etude-pvp.md) § 4.3 et § 6.5 ; [phase2-game-design.md](brainstorm-design/phase2-game-design.md) ; [plan-marketing.md](plan-marketing.md) § 2 (« ce qu'on ne promet pas »).
- ☐ Valider l'accroche « …et faites grandir un empire qui travaille pendant que vous dormez » (ou insister sur PvE, solo, téléphone) et la carte PvP réécrite.
  **Docs :** [plan-marketing.md](plan-marketing.md) § 2 (pitch, arguments) et § 3 (ton) ; [phase2-marketing.md](brainstorm-design/phase2-marketing.md) ; [phase2-technique-joueurs.md](brainstorm-design/phase2-technique-joueurs.md) (personas) ; skill `voix-kalendrath`.
- ☐ Ne pas mettre le Donjon dans la même cité que l'Hôtel de ville (il n'existe que dans la capitale) ; ne pas nommer « Chapitre I, II, III » des fonctionnalités ; retirer « Toujours ouvert aux amis ».
  **Docs :** [phase2-game-design.md](brainstorm-design/phase2-game-design.md) ; [game-design-document.md](game-design-document.md) § 4.2 (Donjon, Hôtel de ville) ; [etude-serveurs-en-continu.md](etude-serveurs-en-continu.md) (chapitres, lobby).
- ☐ Images : zoom out Midjourney du palier VIII ; générer ou retirer MJ-H1 à MJ-H6 et MJ-C1 (visibles « à générer ») ; images d'unités en basse résolution ; images agrandies ×1,6 à ×2,1 à 2560 px (floues) ; poids des images.
  **Docs :** skill `brief-midjourney-batiment` ; [direction-artistique-batiments.md](direction-artistique-batiments.md) ; [direction-artistique-unites.md](direction-artistique-unites.md) ; [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md) ; [phase2-da-ux.md](brainstorm-design/phase2-da-ux.md) (images floues).
- ☐ Responsive : formulaire sous la ligne de flottaison à 720 px de haut (Axe, Maquette, Partition) ; chevauchement dans la Montée ; lignes de 92 à 100 caractères à 2560 px ; retirer `min-width: 520px` du schéma du lobby et le héros de 46vw ; garder la contrainte « aucune largeur fixe en pixels » ; mobile non traité (390 × 844 attendu).
  **Docs :** [phase2-da-ux.md](brainstorm-design/phase2-da-ux.md) ; [phase2-technique-joueurs.md](brainstorm-design/phase2-technique-joueurs.md) ; [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.1 et § 1.2 ; mémoires « Mockups PC + mobile » et « Appli mobile native ».
- ☐ Logos : lockups verticaux tronqués (viewBox 138 pour un mot à 146, « KAI FNDRATH ») ; wordmark trop maigre ; losange de mana sur l'or (N1) contre la règle de la planche ; pointe de K5 plus aiguë ; gonfanon d'alliance confondu avec la bannière de guerre (rouge « sang ») ; sceau à un obélisque par chapitre illisible au-delà de quatre chapitres ; lettrage à faire retoucher par un typographe et traits à convertir en contours.
  **Docs :** [phase2-da-ux.md](brainstorm-design/phase2-da-ux.md) (logos) ; [phase2-game-design.md](brainstorm-design/phase2-game-design.md) (point 7) ; [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.3 (limites) ; [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md).
- ☐ Test des 5 secondes sur les lectures « K » et « i< » ; vérifier section Tests et thème sombre de la page des logos (non contrôlés).
  **Docs :** [phase2-marketing.md](brainstorm-design/phase2-marketing.md) (logo) ; [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.3 ; [logos](https://claude.ai/artifact/JMADbd1mBb63myUhqTAqRF).
- ☐ Lien d'invitation Discord permanent (le texte « Le Discord est ouvert » le suppose) ; bouton « Notes de maquette » et pastille « logo provisoire » à retirer.
  **Docs :** [specification-discord.md](specification-discord.md) § 4 (arrivée d'un membre), § 9 (script) et § 11 (décisions) ; [phase2-marketing.md](brainstorm-design/phase2-marketing.md) (défauts bloquants).

**Site réel (Astro, site/)**
Docs communs : [brief-site-vitrine.md](brief-site-vitrine.md) § 3 (recommandations techniques) ; [plan-deploiement.md](plan-deploiement.md) § 3.2 (vitrine → Cloudflare) ; [phase2-technique-joueurs.md](brainstorm-design/phase2-technique-joueurs.md).
- ☐ HTML statique par langue (les textes sont injectés par JS dans les mockups), hreflang, canonical, Open Graph.
  **Docs :** [brief-site-vitrine.md](brief-site-vitrine.md) § 3.1 et § 3.4 (SEO bilingue, hreflang) ; [phase2-technique-joueurs.md](brainstorm-design/phase2-technique-joueurs.md).
- ☐ Polices auto-hébergées en woff2 (Google Fonts interdit par le brief, RGPD).
  **Docs :** [brief-site-vitrine.md](brief-site-vitrine.md) § 3.5 ; [legal/03-politique-cookies.md](legal/03-politique-cookies.md) ; [legal/02-politique-de-confidentialite.md](legal/02-politique-de-confidentialite.md).
- ☐ Ajouter des captures du jeu (plus grosse faiblesse côté joueurs) ; décider de la mention « gratuit ».
  **Docs :** [phase2-technique-joueurs.md](brainstorm-design/phase2-technique-joueurs.md) (personas) ; [brief-site-vitrine.md](brief-site-vitrine.md) § 2.5 (galerie) ; [plan-marketing.md](plan-marketing.md) § 2 et § 8 (ce qu'on promet ou non ; « gratuit »).
- ☐ CI avec Lighthouse et Playwright aux trois largeurs.
  **Docs :** [plan-deploiement.md](plan-deploiement.md) § 3.1 à 3.2 et § 10 (ordre de mise en œuvre) ; [phase2-technique-joueurs.md](brainstorm-design/phase2-technique-joueurs.md) (recommandation d'assemblage).
- ☐ Fichiers sources des mockups et SVG des logos : ils sont dans le répertoire temporaire de la session ; décider s'il faut les copier dans le dépôt avant qu'ils disparaissent.
  **Docs :** [archive](archives/retours-agents-2026-11-01-site-logos.md) (en-tête : emplacement des fichiers ; § 1.1 à 1.3 : listes de fichiers) ; [plan-deploiement.md](plan-deploiement.md) § 2 (architecture du monorepo : `site/`).

**Nettoyage**
- ☐ Supprimer `.playwright-mcp/` (captures de l'agent DA dans `.playwright-mcp/da/`).
  **Docs :** [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.2 (effets de bord) et § 2.3 ; voir aussi la tâche `.gitignore` dans la section Comparatif du genre.
- ☐ Lien symbolique créé hors du dépôt : `~/.cache/ms-playwright/chromium-1252` → `chromium-1248`, à garder ou à retirer.
  **Docs :** [archive](archives/retours-agents-2026-11-01-site-logos.md) § 1.2 (effets de bord).

## Sondage de rythme et arbitrages boutique — [archives/retours-agents-2026-10-30.md](archives/retours-agents-2026-10-30.md)
Sondage « Rythme du jeu » (9 réponses, tendance seulement), étude du genre ([references-jeux-du-genre.md](references-jeux-du-genre.md), section 7) et arbitrage croisé B1 à B10. Docs de base : archive § 4 (sondage), § 5 (étude du genre), § 6 (arbitrage B1 à B10) ; [sondages/2026-10-rythme-et-format-de-serveur.md](sondages/2026-10-rythme-et-format-de-serveur.md) ; [sondage-rythme-et-format.md](sondage-rythme-et-format.md) (sans objet, sondage déjà publié).
- ☐ Regénérer le rapport détaillé du sondage et celui des 10 décisions B1 à B10 : seuls des résumés ont survécu (répertoire temporaire vidé).
  **Docs :** archive § 4 et § 6 (résumés) ; [sondages/2026-10-rythme-et-format-de-serveur.md](sondages/2026-10-rythme-et-format-de-serveur.md) (réponses brutes) ; [references-jeux-du-genre.md](references-jeux-du-genre.md) § 7.
- ☐ Trancher B1 (capitale à plusieurs files, colonies à une file), B3 (files supplémentaires : exclure 3 files toutes gratuites) et B4 (plafond payeur interne de 30 %, jamais publié).
  **Docs :** archive § 6 ; [references-jeux-du-genre.md](references-jeux-du-genre.md) § 7.2 (files de construction), § 7.3 (pay-to-win), § 7.4 (préconisations) ; [references-jeux/monetisation-et-boutiques.md](references-jeux/monetisation-et-boutiques.md) ; [plan-marketing.md](plan-marketing.md) § 8.
- ☐ B2 : choisir comment rendre vivables les 540-730 jours (étape visible à chaque chapitre) ; la cible contredit 7 joueurs sur 9 et le genre (12-14 mois).
  **Docs :** archive § 4 et § 6 ; [references-jeux-du-genre.md](references-jeux-du-genre.md) § 4 (« ce qui contredit les décisions de Gregory ») et § 7.4 ; [etude-courbe-hotel-de-ville.md](etude-courbe-hotel-de-ville.md) ; [references-jeux/retention-et-design-du-temps.md](references-jeux/retention-et-design-du-temps.md).
- ☐ B5 : écrire le seuil de fusion des serveurs et la charte de fin de service avant s1.
  **Docs :** archive § 6 ; [etude-serveurs-en-continu.md](etude-serveurs-en-continu.md) (« la fusion », « score de puissance ») ; [references-jeux/formats-serveur-et-rattrapage.md](references-jeux/formats-serveur-et-rattrapage.md) ; [legal/revue-juridique.md](legal/revue-juridique.md) BL-1 (arrêt du jeu, préavis de 90 jours).
- ☐ Sondage de suivi avant de verrouiller B3 et B5 (échantillon : payeurs surreprésentés, format par chapitre non testé).
  **Docs :** archive § 4 ; [sondages/2026-10-rythme-et-format-de-serveur.md](sondages/2026-10-rythme-et-format-de-serveur.md) ; mémoire « Sondage octobre différé » ; skill `checklist-publication`.
- ☐ Relire la section 7 de l'étude du genre : préconisations 4 à 13 = inférences, prix de files issus de guides de joueurs.
  **Docs :** [references-jeux-du-genre.md](references-jeux-du-genre.md) § 7.4 (préconisations) et § 7.5 (points faibles du sourcing) ; archive § 5.

## Courbe de l'Hôtel de ville et simulateur — [etude-courbe-hotel-de-ville.md](etude-courbe-hotel-de-ville.md)
Retours d'agents : [archives/retours-agents-2026-10-30.md](archives/retours-agents-2026-10-30.md) § 1 (simulateur à 10 paliers) et § 7 (étude de la courbe). Outil : [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md).
- ☐ Choisir la courbe : C (recommandée), A ou B ; confirmer la cible J635 au palier 10 dans la fenêtre 540-730.
  **Docs :** [etude-courbe-hotel-de-ville.md](etude-courbe-hotel-de-ville.md) (« les trois options », « comparaison », « recommandation ») ; [game-design-document.md](game-design-document.md) § 4.2 et § 7 (progression).
- ☐ Valider les hypothèses des paliers 7 à 10 (HdV 18, 21, 24, 27 ; Maîtres 12-18 ; Rite 10-16).
  **Docs :** [etude-courbe-hotel-de-ville.md](etude-courbe-hotel-de-ville.md) (« méthode et hypothèses », « risques communs ») ; [game-design-document.md](game-design-document.md) § 4.2.
- ☐ Vérifier le « blocage sur les mines » signalé par l'arbitrage, puis fusionner le simulateur à 10 paliers et régénérer l'artefact « Arbre des prérequis ».
  **Docs :** archive 30/10 § 1 et § 6 ; [etude-courbe-hotel-de-ville.md](etude-courbe-hotel-de-ville.md) (« reproduire ») ; [../tools/theorycrafting/README.md](../tools/theorycrafting/README.md) ; artefact [Arbre des prérequis](https://claude.ai/artifact/2GSoLWt91J28Rve5n12EMK) ; mémoire « Prérequis de bâtiments ».

## API, socle React et fusion des worktrees (code non commité, branches `worktree-agent-aae3713d4f9d47fac`, `-adc2991a55fce0a8c`, `-a2e4dcde695548b4c`)
Retours d'agents : [archives/retours-agents-2026-10-30.md](archives/retours-agents-2026-10-30.md) § 1 (simulateur), § 2 (API JSON + Sanctum), § 3 (socle React). Cadre : [decision-architecture-cible.md](decision-architecture-cible.md) § 3 (stack), § 4 (découpage domaine/API), § 6 (ordre de bascule).
- ☐ Fusionner : ordre proposé simulateur, API, socle React ; basés sur `3e19282c`, `main` a avancé.
  **Docs :** archive 30/10 § 1 à 3 ; [decision-architecture-cible.md](decision-architecture-cible.md) § 6 ; [feuille-de-route-projet-jeu.md](feuille-de-route-projet-jeu.md) Phase 3b.
- ☐ Lancer la suite complète des 1109 tests sur l'API ; après fusion, `composer install` et `migrate` (la base de dev a déjà `personal_access_tokens`).
  **Docs :** archive 30/10 § 2 ; [plan-deploiement.md](plan-deploiement.md) § 3.5 (tests Pest en CI) et § 4 (migrations sûres) ; [run-tests-in-loop-until-failure.md](run-tests-in-loop-until-failure.md).
- ☐ Décider du jeton d'authentification du client web : cookie Sanctum HttpOnly (conseillé) ou `localStorage` ; sessions désactivées côté API aujourd'hui.
  **Docs :** archive 30/10 § 2 et § 3 ; [decision-architecture-cible.md](decision-architecture-cible.md) § 3 (API JSON + Sanctum).
- ☐ `public/build/` : le sortir du suivi git ou non.
  **Docs :** archive 30/10 § 3 ; [plan-deploiement.md](plan-deploiement.md) § 1 (état des lieux) et § 3.4 (qui sert le front React).
- ☐ Nourriture : `food: null` en attendant le domaine ; planifier son implémentation (Phase 3c ou 4).
  **Docs :** archive 30/10 § 2 ; [game-design-document.md](game-design-document.md) § 4.1 (ressources) et § 5.1 ; [feuille-de-route-projet-jeu.md](feuille-de-route-projet-jeu.md) Phases 3c et 4 ; [decision-architecture-cible.md](decision-architecture-cible.md) § 5 (résolution temporelle).
- ☐ Ville courante : choisie par le client (conseillé) ou conservée côté serveur ; ne pas exposer le « socle de 100 à 150 emplacements » avant d'avoir acté la règle.
  **Docs :** archive 30/10 § 2 (« Réorientation vers Kalendrath ») ; [game-design-document.md](game-design-document.md) § 4.5 (concepts de structure) et § 5.10.
- ☐ GDD 5.10 : retirer les lunes de l'exemple de téléportation ; clarifier la « Salle » du Portail (pas de bâtiment « Salle » au lexique).
  **Docs :** [game-design-document.md](game-design-document.md) § 5.10 et § 4.2 ; skill `lexique-kalendrath`.
- ☐ Textes d'interface : où vivent les traductions (front typé ou `resources/lang/` via l'API) ; messages d'erreur de l'API à traduire avant l'alpha publique.
  **Docs :** archive 30/10 § 3 ; [../CLAUDE.md](../CLAUDE.md) (« contenu de jeu conçu en français en premier », anglais avant l'alpha publique) ; [game-design-document.md](game-design-document.md) § 4.6 (noms anglais validés) ; skill `lexique-kalendrath`.
- ☐ Tester la connexion React ↔ API de bout en bout.
  **Docs :** archive 30/10 § 2 et § 3 ; [decision-architecture-cible.md](decision-architecture-cible.md) § 6.

## Autres points ouverts du 31/10
Synthèse des décisions : [revue-generale-2026-10-30.md](revue-generale-2026-10-30.md) § 7 (A à I) ; recap des codes : artefact [sanctions B/N/P/C/D](https://claude.ai/artifact/6c2up9ckXHuKJ4AbMdcaNr).
- ☐ Conflits C1 à C5 des sanctions (Gregory a vu le tableau récapitulatif et doit trancher).
  **Docs :** [comportements-bannissables.md](comportements-bannissables.md) § 8 (C1 à C5) et § 9 (décisions ouvertes) ; [revue-gamemaster-bannissements.md](revue-gamemaster-bannissements.md) ; [revue-juridique-bannissements.md](revue-juridique-bannissements.md) ; [revue-generale-2026-10-30.md](revue-generale-2026-10-30.md) § 7.E.
- ☐ Rôles Discord « Joueur » / « Player ».
  **Docs :** [specification-discord.md](specification-discord.md) § 3 (rôles) et § 11 (« décisions restantes ») ; [plan-marketing.md](plan-marketing.md) § 6 (langues, flux).
- ☐ Avocat humain : CGU, CGV, clause de non-remboursement de la Kaelite au bannissement, rapports d'enquête publics.
  **Docs :** [legal/README.md](legal/README.md) § 4 (points à valider par un avocat) ; [legal/revue-juridique.md](legal/revue-juridique.md) § 2 (bloquants BL-1 à BL-4), § 3 (IM-1 à IM-18) et § 8 (ordre de traitement) ; [comportements-bannissables.md](comportements-bannissables.md) § 2.6 et § 10 ; [legal/04-cgu.md](legal/04-cgu.md), [legal/05-cgv-kaelite.md](legal/05-cgv-kaelite.md).
