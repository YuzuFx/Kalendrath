# Revue générale des livrables du 2026-10-30

*Coordination qualité, rédigée par Claude Code le 2026-10-30. Périmètre : spécification Discord, étude PvP, comportements bannissables et leurs deux revues, brief et direction de design du site, prototype, plan de déploiement, étude des bots Grok, documents de `docs/legal/` et leurs deux revues, skills `voix-kalendrath`, `devlog` et `checklist-publication`. Le sondage sur le rythme et le format, déjà publié, est hors périmètre. Référentiel : CLAUDE.md, GDD, lore, plan marketing, skill `lexique-kalendrath`, décisions de Gregory du 2026-10-30 (mémoire du projet). Toutes les corrections faites sont marquées « [Revue] » dans les fichiers. Rien n'est commité.*

## 1. En bref

Les livrables sont d'un bon niveau et se tiennent entre eux sur l'essentiel : les décisions de Gregory du 30 octobre (PvP, Discord, site) sont respectées partout où elles ont été prises en compte. Les écarts viennent de trois sources :

1. **Le PvP a été tranché pendant que les autres documents s'écrivaient.** Le GDD, le plan marketing, le brief du site, le prototype, les comportements bannissables et les CGU parlaient encore de « Mode Paix / Mode de Guerre » et promettaient qu'« un joueur pacifique ou sans alliance ne se fait pas écraser », promesse qui n'est plus exacte pour un membre d'une alliance à bannière.
2. **Les corrections des revues n'avaient pas été reportées.** La revue juridique des bannissements avait corrigé les comportements bannissables, mais les CGU, rédigées en parallèle, réintroduisaient des erreurs (rétroactivité « sauf fraude manifeste », médiateur limité aux achats, gel sans revue humaine). Les deux revues de `docs/legal/` proposaient leurs corrections sans les appliquer. **C'est fait pour tout ce qui ne demande pas d'arbitrage** (section 4).
3. **L'âge minimum et le prestataire de paiement ne sont pas choisis**, et plusieurs textes en dépendent (CGU, CGV, formulaire de la vitrine, règles du Discord, brief).

Aucun livrable n'est à refaire. Les documents légaux restent impubliables avant les décisions de la section 7 et la relecture d'un avocat.

## 2. Verdict par livrable

| Livrable | Verdict | Motif |
|---|---|---|
| [specification-discord.md](specification-discord.md) | **À retoucher (léger)** | Fidèle aux décisions (@everyone, bannissement par un modérateur, Gregory seul au début). Corrigé : voie d'appel renvoyant à un salon invisible des membres, place du rôle du bot, durée du journal, règle 2 française défensive. Reste : tableau AutoMod et script divergents, attribution automatique du rôle `Membre` et exigences de l'Onboarding à vérifier à la mise en place. |
| [etude-pvp.md](etude-pvp.md) | **Prêt** (pour décision) | Conforme aux cinq arbitrages du 30/10, chiffres cohérents (112 h exposées, 72 h gratuites, 3 à 5 cycles de guerre), sources et incertitudes signalées, poids sur la V1 annoncé (section 7). Restent R1 à R17. |
| [comportements-bannissables.md](comportements-bannissables.md) | **À retoucher** | Solide, mais le corps date d'avant le 30/10 : les annotations [GM] et [Juridique] sont empilées sur le texte initial, et B2, B3, B7, N2 parlent encore du Mode de Guerre. Corrigé : règle joueurs 7 (FR et EN), D14, prévention de B2, préavis de modification aligné sur les CGU (30 jours). Une version 2 qui intègre les annotations acceptées est à faire après les arbitrages C1 à C5. |
| [revue-juridique-bannissements.md](revue-juridique-bannissements.md) | **Prêt** | Corrections bien intégrées au document revu ; niveaux de certitude clairs. |
| [revue-gamemaster-bannissements.md](revue-gamemaster-bannissements.md) | **Prêt** | N'a rien retiré aux ajouts juridiques ; conflits C1 à C5 bien isolés. Seul défaut : la règle 3 corrigée n'était pas reportée dans les CGU (corrigé). |
| [brief-site-vitrine.md](brief-site-vitrine.md) | **À retoucher** | Corrigé : 404 anglaise (« Reach », pas « Region »), « release notes » au lieu de « patch notes », paliers validés le 28/10, renvois PvP. Reste à trancher : promesse PvP (R13), « public adulte » contre 13 ans, contreparties Patreon « hors du jeu » contre titre cosmétique, « plus de cinq mille ans ». Pages légales manquantes au plan du site (CGV, cookies, règles du jeu, règles du Patreon). |
| [direction-design-site.md](direction-design-site.md) | **Prêt** (à valider par Gregory) | Répond à la demande « ne pas ressembler à un site généré par IA » ; contrastes calculés ; cohérent avec le lexique (Reach, Keep, Sundering). |
| [site-prototype/index.html](../site-prototype/index.html) | **Prêt comme prototype** ; à retoucher avant production | Corrigé : « aligner les Straumar de plusieurs Sphères » (le lore ne parle pas d'aligner les Sphères). Signalé en commentaire : la carte « Le PvP n'est jamais subi ». Avant production : polices auto-hébergées, lien CGU dans le pied de page, case d'âge si MIN-3 est retenue. |
| [plan-deploiement.md](plan-deploiement.md) | **Prêt** | Bien étiqueté [vérifié] / [supposé]. Son constat MariaDB a permis de corriger la décision d'architecture. |
| [etude-grok-bots.md](etude-grok-bots.md) | **Prêt** (pour décision) | Biais de l'auteur déclaré, preuves étiquetées. Ajouté : une suppression automatique (palier B) exige un exposé des motifs et une mise à jour de la politique de confidentialité, qui exclut aujourd'hui tout envoi à une IA. |
| [docs/legal/](legal/README.md) (9 documents FR et EN) | **À retoucher** | Corrections non controversées des deux revues appliquées (section 4). Bloqués par des décisions : prestataire de paiement (CGV), âge et mineurs, BL-1, BL-4, IM-1, IM-10. Relecture d'avocat indispensable. |
| [legal/revue-juridique.md](legal/revue-juridique.md) | **Prêt** | Précise, classée, sourcée. |
| [legal/revue-comptable.md](legal/revue-comptable.md) | **Prêt** | Met le doigt sur la décision qui commande tout le reste (prestataire). Une seule tension avec la revue juridique (IM-10 contre I10, section 7). |
| Skill `voix-kalendrath` | **Prêt** après correction | « the Rupture » corrigé en « the Sundering » dans l'exemple anglais (GDD 4.6). |
| Skill `devlog` | **Prêt** après correction | Chemins `content/…` signalés comme à aligner sur `site/src/content/…` (brief 3.1). |
| Skill `checklist-publication` | **Prêt** après correction | Même remarque de chemins. |

## 3. Incohérences trouvées et corrigées

### PvP : décisions du 30/10 non reportées
- **GDD 5.4** : ajout d'un bloc « Décidé par Gregory le 2026-10-30 » qui rend caduques les puces contraires (interrupteur individuel, Mode Paix, marché inter-modes). Report minimal : le marquage complet de la section 10 de l'étude reste à faire.
- **GDD 5.9** : l'attaque groupée existe dans le code (`FleetUnion`, `FleetUnionService`, vérifié) ; le GDD ne recensait que l'ACS Défense.
- **CGU 7.7 et 9.1, comportements bannissables (règle joueurs 7, D14, B2)** : « Mode Paix, Mode de Guerre » remplacés par « paix par défaut, bannière d'alliance, boucliers, trêves », vocabulaire provisoire en attente de R16.
- **Plan marketing (argument 1), brief (carte 3, argument 1), prototype** : la promesse « un joueur pacifique ou sans alliance ne se fait pas écraser » est signalée comme à reformuler (R13), sans la réécrire.

### Régressions et reports manqués
- **CGU 16.3** : l'exception de rétroactivité « sauf fraude manifeste », supprimée par la revue juridique des bannissements, était revenue dans les CGU (BL-2). Supprimée en FR et EN.
- **CGU 7.3** : la correction [GM] « perdre un combat à dessein **au profit d'un autre de vos comptes ou d'un complice** » n'avait pas été reportée ; la retraite, la reddition et le sacrifice tactique redeviennent permis.
- **CGU 8.4, 9.3, 10 ; confidentialité 2.4 ; registre T4** : revue humaine du gel, du refus de compte et du blocage d'achat, réclamation de 6 mois, médiateur sans restriction, appel par le parent (IM-4, IM-6, MIN-6).
- **Gel conservatoire** : CGV 13.3 (« jusqu'à l'issue » de la rétrofacturation, tout le portefeuille) contredisait CGU 9.3 (7 jours) et la fiche B11. Gel limité à la Kaelite du paiement contesté (IM-3, I3).
- **Liste anti-contournement** : 5 ans dans la confidentialité, le registre et la procédure 08, 3 ans au plus dans la fiche B14. Harmonisé à 3 ans renouvelables une fois (IM-18).

### Chiffres, durées, noms
- **Journal de modération Discord** : « au moins 12 mois » dans la spécification, 12 mois dans la confidentialité et le registre. Aligné sur 12 mois.
- **Préavis de modification des règles** : 15 jours dans les comportements bannissables, 30 jours dans les CGU et les CGV. Aligné sur 30 jours.
- **Base de données** : « MySQL 8 » dans la décision d'architecture, MariaDB 11.3 dans les deux `docker-compose`. Corrigé.
- **Rôle du bot Discord** : « juste sous `Équipe` » dans le texte, sous `Modérateur` dans le tableau. Aligné sur le tableau.
- **404 anglaise** : « This Region » pour « Cette Contrée » ; le lexique donne **Reach**. Corrigé dans le brief.
- **« the Rupture »** dans l'exemple anglais du skill `voix-kalendrath` ; le GDD 4.6 donne **the Sundering**. Corrigé.
- **« patch notes »** dans le brief, « release notes » partout ailleurs (Discord, plan marketing). Aligné.
- **Brief 2.3** : « noms des paliers en cours de validation », alors qu'ils sont validés depuis le 28/10 (mais pas annoncés). Corrigé.
- **Plan marketing, budget** : « frais de paiement : un pourcentage, pas un coût fixe ». Faux : chaque prestataire prend un frais fixe (revue comptable I7). Corrigé.

### Voix
- **Règles du Discord, règle 2** : « Pas de familiarité excessive envers l'équipe » sonnait défensif, contraire à « proche et professionnel » ; aligné sur la version anglaise (« Courtoisie envers l'équipe »). « temporary timeout » (pléonasme) devient « timeout ».
- **Voie d'appel du Discord** : les règles envoyaient les membres vers `#tickets-appel`, salon de la catégorie ÉQUIPE qu'ils ne voient pas. Remplacé par le courriel.

## 4. Reprise des deux revues dans `docs/legal/`

**Appliqué (FR et EN, marqué « [Revue] »)** : BL-2 (rétroactivité), BL-3 (empreinte d'appareil remplacée par les données reçues côté serveur), IM-2 (boutons « Renoncer au contrat ici » / « Confirmer la rétractation »), IM-3 (fraude au paiement : seule la Kaelite frauduleuse est retirée), IM-4, IM-5 (N4 « fermé puis supprimé », point de départ des dossiers), IM-6, IM-7 (AIPD requise avant l'alpha fermée), IM-8 (responsabilité, CGU et API), IM-9 (évolutions du jeu, L224-25-26), IM-11 (lacunes de la confidentialité et du registre), IM-12 (« [Prénom Nom] EI » partout), IM-13 (Patreon), IM-14 et IM-15 (README), IM-16 (annexe des CGU), IM-18 ; MIN-1, MIN-2, MIN-6 (fondement de l'accord parental, sans toucher à l'âge) ; MI-1 à MI-9, MI-11 à MI-13, MI-15, MI-17, MI-18 ; revue comptable I2 (remboursement par virement à défaut du moyen d'origine, IBAN), I3, I6 (seule la Kaelite d'un lot payé est « achetée »), M1, M5, M9 ; B4 (compte bancaire dédié obligatoire dès l'immatriculation, README). MI-4 applique « 90 jours calendaires » par défaut, à confirmer.

**Non appliqué, parce que c'est un choix** : BL-1, BL-4, IM-1, IM-10, IM-17, MIN-3 à MIN-5, MIN-7, revue comptable B1 à B3, I1, I7 (grille), I8, I10, M3. Tous figurent en section 7.

**Non appliqué, sans objet pour l'instant** : MI-10 (application mobile), MI-14 (champs à traduire au remplissage), MI-16 (dépend du prestataire), MI-19 (affichage en boutique, au moment du code).

## 5. Restant à corriger

| # | Quoi | Où | Qui |
|---|---|---|---|
| 1 | Marquage complet du GDD selon la section 10 de l'étude PvP (piliers, 4.2 Ambassade et Silo, 4.5, 4.6, 5.6, 5.10, 7, 9), puis lexique après R16 | GDD, skill `lexique-kalendrath` | Agent GDD, après R1 à R17 |
| 2 | Version 2 des comportements bannissables : intégrer au corps les annotations acceptées, réécrire B2, B3, B7, N2 et D7 pour la bannière, puis régénérer la page « Règles du jeu » et l'annexe des CGU | `comportements-bannissables.md`, CGU | Agent juridique, après C1 à C5 |
| 3 | Réécriture partielle des CGV selon le prestataire (articles 2, 7.1, 9, 11, 13 à 15, 18 ; mention de TVA) | `legal/05-*` | Agent juridique, après le choix du prestataire |
| 4 | Politique cookies : ajouter les pixels de courriel ; confidentialité 2.1 selon BL-4 | `legal/02-*`, `legal/03-*` | Agent juridique, après BL-4 |
| 5 | Feuille de route (Phase 4) : la bannière, la guerre par défi et les boucliers entrent dans la première version publique (R17) ; republier l'artefact | `feuille-de-route-*` | Agent roadmap, après R17 |
| 6 | Script Discord : aligner les listes AutoMod sur le tableau ; vérifier dans Discord que l'écran de sélection n'attribue pas de rôle seul et les exigences réelles de l'Onboarding sur les salons par défaut (la spécification dit « écriture non exigée », ce qui reste à confirmer) | `specification-discord.md` | Agent Discord, à la mise en place |
| 7 | Nom du salon des outils : `#outils-et-extensions` / `#tools-and-addons` (plan marketing 9) contre `#outils-et-extensions-tools` (spécification) | plan marketing | Mineur, à la prochaine révision |
| 8 | Plan du site : ajouter CGV, politique cookies, « Règles du jeu », règles du Patreon ; nommer le Gouffre dans le texte français de « Univers » comme l'anglais nomme l'Abyss | brief | Agent site |
| 9 | Prototype et futur `site/` : polices auto-hébergées, lien CGU au pied de page, texte PvP et case d'âge selon décisions | `site-prototype/`, `site/` | Agent site |
| 10 | Simulateur : modules de puissance, de population et de combat (étude PvP, section 8) avant de figer les garde-fous | `tools/theorycrafting/` | Agent simulateur |
| 11 | Lore : protection de l'Obélisque étendue aux royaumes sans bannière (R15) | `lore.md` | Après R15 |
| 12 | Discord, délais d'appel : 7 jours proposés pour le Discord, 10 jours ouvrés en jeu. Deux procédures distinctes, à dire explicitement ou à aligner | spécification, CGU | Mineur |
| 13 | Distinguer dans la spécification Discord le bannissement du Discord (permis à un modérateur) des N3 à N5 en jeu (réservés à Gregory, D12) | spécification | Mineur |

## 6. Ce qui alourdit la V1 sans toujours le dire

- **PvP** : la bannière, les pactes, la guerre par défi, les boucliers gratuits et payants, le moral et les règles d'accès doivent être prêts avant J21 du premier serveur public (étude PvP, section 7). L'étude le dit ; la feuille de route ne le dit pas encore. La bêta ajoute un tournoi sur copies d'armées et un score de puissance militaire.
- **Avant l'alpha fermée** (CGU publiées) : bouton « Signaler » sur chaque message, profil et nom ; notification motivée conforme au DSA ; formulaire d'appel ; dossier de preuves figé avec empreinte numérique ; AIPD ; procédure d'alerte des autorités. Le README légal le range en « actions techniques », pas dans le périmètre de l'alpha.
- **Avant la première vente** (bêta) : portefeuille à deux soldes tenu par le lobby, registre des lots, boutons de rétractation avec accusé horodaté, accord parental par courriel et plafond fixé par le parent (si MIN-4 est retenu), contrôle du plafond avant paiement, remboursements par virement. C'est un vrai chantier de lobby.
- **Discord** : `/signaler`, les boutons de langue du plan B et le bot de publication supposent un bot qui reste en ligne, que le script ne fournit pas (« chantier à part »).
- **Bot IA** (étude Grok) : facultatif, et il exige d'abord une modification de la politique de confidentialité et du registre.

## 7. Décisions pour Gregory

Liste unique, de la plus urgente à la moins urgente, regroupée par thème. Chaque ligne donne ma recommandation.

### A. Urgent : la liste d'e-mails est déjà en service
1. **Suivi d'ouverture et de clic des courriels (BL-4)** : la CNIL exige un consentement distinct depuis mars 2026. *Recommandation : désactiver dans Brevo le suivi individuel, garder la seule mesure de délivrabilité (option a). Dix minutes de réglage.*
2. **Condition d'âge sur le formulaire (MIN-3)**. *Recommandation : case non cochée « J'ai 16 ans ou plus », qui couvre tous les pays de l'Union sans calcul.*

### B. Argent : prestataire, vendeur, remboursements
3. **Prestataire de paiement et vendeur légal** (revue comptable B1, B2). Débloque la réécriture des CGV et la relecture de l'avocat. *Recommandation : Stripe Managed Payments (marchand de référence), après une validation écrite de la Kaelite par Stripe ; Paddle seulement après confirmation écrite que la Kaelite n'est pas de la « valeur stockée ».*
4. **Arrêt du jeu : remboursement limité aux lots des 12 derniers mois (BL-1)**, jugé abusif. *Recommandation : supprimer la limite, comme le demande la revue juridique, et tenir la réserve de trésorerie proposée par la revue comptable.*
5. **Plafond de durée des remboursements après bannissement ou refus d'une modification (I1)**. *Recommandation : proposer 24 mois à l'avocat, sans l'écrire avant son avis.*
6. **Rétractation sur la Kaelite non dépensée (IM-1)** : transformer le geste commercial en droit au prorata pendant 14 jours. *Recommandation : oui, le coût est faible et c'est la lecture des autorités européennes.*
7. **Kaelite d'un compte supprimé volontairement ou pour inactivité** : la revue juridique (IM-10) propose le remboursement sur demande, la revue comptable (I10) la perte annoncée. *Recommandation : remboursement sur demande, sinon un joueur aurait intérêt à se faire bannir ; à confirmer par l'avocat.*
8. **Kaelite offerte (bonus de préinscription, compensations) (I6)** : troisième solde lié au compte, ou Kaelite gagnée sur un serveur choisi. *Recommandation : Kaelite gagnée sur le serveur choisi par le joueur, comme pour les récompenses de signalement (MI-7) : pas de troisième solde à coder.*
9. **Aligner CGU 16.2 sur CGV 20** (remboursement seulement si la modification touche la Kaelite). *Recommandation : oui.*
10. **Grille des paquets** : rien sous 4,99 € TTC, prix calculés comme s'ils incluaient déjà la TVA (I7, I8). *Recommandation : oui.*

### C. Mineurs
11. **Âge minimum** : 13 ans (CGU, revue juridique) ou 16 ans (D10). *Recommandation : 13 ans avec accord parental avant 15 ans, fondé sur le contrat, réexaminé à l'adoption de l'EU KIDS Act ; corriger alors « public adulte » dans le brief (3.3) et « public adulte tranquille » dans les règles du Discord.*
12. **Plafond de dépense des mineurs et preuve de l'autorisation parentale (MIN-4, MIN-5, M3)**. *Recommandation : plafond fixé par le parent, 50 € par mois au plus, toutes offres en euros comprises ; autorisation recueillie par courriel au parent avant le premier achat.*

### D. Entreprise et fiscalité
13. **Moment de l'immatriculation, compte bancaire dédié, versement libératoire, périodicité URSSAF** (revue comptable, section 9). *Recommandation : immatriculer avant l'ouverture du Patreon, compte dédié le même jour, déclarations mensuelles tant que des remboursements sont possibles ; versement libératoire à simuler avec le comptable.*
14. **Royaume-Uni** (IM-15, B3) : viser ce marché suppose l'Online Safety Act et, en vente directe, la TVA britannique dès la première vente. *Recommandation : ne pas bloquer, et laisser le marchand de référence porter la TVA ; question à l'avocat avant l'alpha publique.*

### E. Modération (revue game master, C1 à C5, et décisions ouvertes)
15. **C1, vendeur d'un compte** : N4 ou N5 d'emblée. *Recommandation : N4 pour un premier cas sans activité commerciale, N5 pour le revendeur, l'intermédiaire et la récidive.*
16. **C2, formalisme des sanctions** : *recommandation : garder toutes les exigences juridiques, réduire leur coût par des modèles et le tri P1 à P3.*
17. **C3, remboursement de la Kaelite achetée aux bannis pour bot ou RMT** : *recommandation : l'accepter, avec compensation d'un préjudice prouvé pour le RMT organisé, à confirmer par l'avocat.*
18. **C4, harcèlement sans menace** : *recommandation : N3 puis N4, saut direct réservé aux menaces, au doxxing, aux mineurs et aux contenus illicites.*
19. **C5, rétroactivité** : rien à trancher, à garder en tête.
20. **D7, suspension pendant une guerre** : *recommandation : compte protégé comme sous bouclier, sans points de guerre, production continue.*
21. **D13, vol permis par les droits d'alliance** : *recommandation : oui, si la fonction existe et s'affiche à la création de l'alliance.*
22. **D5, second relecteur des appels** : *recommandation : le désigner avant d'atteindre une quinzaine de sanctions N2+ par semaine, pas à date fixe.*
23. **Barème de l'API (IM-17)** : *recommandation : aligner les conditions de l'API sur la fiche B12 [GM] (collecte de données publiques d'abord en N1-N2).*
24. **« 90 jours » du dossier d'avertissement (MI-4)** : appliqué en « calendaires ». *Recommandation : confirmer.*

### F. PvP (étude, R1 à R17)
25. **R1, R2** : suppression de l'interrupteur individuel, paix par défaut pour qui n'a pas levé de bannière. *Recommandation : oui aux deux.*
26. **R3** : guerre à J21, tournoi à J14. *Recommandation : J21 pour tout.*
27. **R4** : 3 boucliers gratuits de 24 h, payant réservé au défenseur, rupture à toute action sortante, jamais de bouclier d'alliance. *Recommandation : oui ; prix après le simulateur.*
28. **R5 à R9** (recalibrages, défi accepté d'abord, grief à la victime, pacte défensif, transports en guerre). *Recommandation : suivre l'étude.*
29. **R10, R12** (pertes, score de puissance) : *recommandation : indice militaire distinct, chiffres de pertes après le module de combat du simulateur.*
30. **R11** : tournoi sur copies d'armées comme premier event de bêta. *Recommandation : oui, et tester aussi une guerre par défi en bêta, sinon la première vraie guerre se jouera sur s1.*
31. **R13** : promesse marketing. *Recommandation : « Un joueur dont l'alliance n'a pas levé sa bannière ne se fait jamais attaquer par un autre joueur » ; puis mettre à jour plan marketing, brief et prototype.*
32. **R14 à R16** (récompenses PvP, Obélisque, vocabulaire). *Recommandation : oui ; vocabulaire avec le skill lexique, en retirant « Mode de Guerre » et « ban de guerre ».*
33. **R17** : la guerre entre dans la première version publique. *Recommandation : l'accepter avec la parade de l'étude (premier serveur ouvert avec le blocage global des attaques, étapes 2 et 3 livrées avant J21), et l'écrire dans la feuille de route.*

### G. Site vitrine
34. **Direction de design** : concept « L'heure des lanternes », trio Grenze Gotisch / Grenze / Alegreya Sans, bannière rouge, images des trois promesses, gloses de la 404 et du contact. *Recommandation : valider ; reprendre Alegreya Sans dans l'interface du jeu pour unifier.*
35. **Contreparties Patreon** : purement hors jeu (brief) ou avec un titre cosmétique en jeu (règles du Patreon). *Recommandation : hors jeu au lancement ; un cosmétique seulement une fois la fonction en place (IM-13).*
36. **Générateur, formulaire, racine** : *recommandation : Astro, Pages Function qui relaie vers Brevo, `x-default` vers l'anglais.*
37. **« Plus de cinq mille ans »** dans « Univers ». *Recommandation : « des millénaires », pour ne pas figer la chronologie.*
38. **Lien Discord permanent, gestion du `.fr`, fenêtre de migration DNS** : à faire par Gregory, procédure prête dans le brief.

### H. Discord et bots
39. **Rôles de profil, un par langue** (en attente de confirmation). *Recommandation : oui.*
40. **Salons d'alliance** : *recommandation : à la bêta, pour ne pas ouvrir de salons vides en alpha.*
41. **Emplacement du script** : *recommandation : `tools/discord/`, à côté des autres outils.*
42. **Question d'Onboarding « Quel genre de seigneur êtes-vous ? »** : proche du « seigneurs » que la voix déconseille. *Recommandation : « Quel joueur êtes-vous ? » / "What kind of player are you?".*
43. **Bots IA** (étude Grok) : *recommandation : l'IA propose et ne sanctionne jamais ; essai comparatif Grok contre un concurrent ; brouillons seulement pour X et Reddit ; messages signalés seulement ; pas avant la mise à jour de la politique de confidentialité.*

### I. Déploiement
44. **Dépôt public ou privé, activation d'Actions, compte Cloudflare, VPS, sauvegardes hors site.** *Recommandation : rester public tant que rien de sensible n'y est (CI et environnements gratuits), activer Actions après le nettoyage des workflows de l'amont, OVH VPS-2, sauvegardes sur R2.*
45. **MariaDB ou PostgreSQL** : la feuille de route laisse la question ouverte, la décision d'architecture conserve MariaDB pour rester proche de l'amont. *Recommandation : garder MariaDB et clore la question.*

## 8. Affirmations à vérifier avant d'agir

- **Discord** : le rôle `Membre` donné « automatiquement après acceptation des règles » et la condition d'Onboarding sur les salons par défaut ne sont pas sourcés ; à constater dans l'interface au moment de la mise en place (annoté dans la spécification).
- **Revue juridique** : plusieurs textes très récents (délibération CNIL 2026-042, décret D221-5, loi du 24 août 2026, EU KIDS Act) sont cités par des sources secondaires ; la revue le dit, l'avocat doit les relire.
- **Étude Grok** : les tarifs de Claude (« Haiku 5.5 », « Sonnet 5.5 ») sont marqués [Vérifié] mais n'ont pas été recontrôlés ici ; à relire avant tout engagement, comme l'étude le recommande.
- **Étude PvP** : le boosting de Last War repose sur l'observation de Gregory, non sourcée ; l'étude le signale correctement.
- **Brief** : adresse de Cloudflare et licence commerciale Midjourney à vérifier avant publication (déjà signalé).
