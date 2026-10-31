# Comportements bannissables de Kalendrath

*Version 2 du 2026-10-31. Document de travail, à valider par Gregory avant publication ; il alimente les conditions d'utilisation (CGU), les conditions de vente de la Kaelite (CGV) et la page « Règles du jeu » de la vitrine, en français et en anglais, avant l'alpha fermée.*

*La version 2 intègre au corps du texte les annotations de la [revue juridique](revue-juridique-bannissements.md) et de la [revue game master](revue-gamemaster-bannissements.md) qui ne demandaient pas d'arbitrage, les corrections de la [revue générale du 2026-10-30](revue-generale-2026-10-30.md), la décision PvP du 2026-10-30 ([étude PvP](etude-pvp.md) : guerre d'alliances par bannière, plus de Mode de Guerre individuel) et quatre décisions de Gregory du 2026-10-31 (rapports d'enquête, Kaelite achetée au bannissement définitif, fraude au parrainage, mode vacances en guerre). La version 1, avec ses annotations [Juridique] et [GM] d'origine, est conservée dans [comportements-bannissables-v1.md](comportements-bannissables-v1.md). Aucun code n'a été renuméroté.*

> **Ceci n'est pas un avis juridique.** Les analyses juridiques de ce document ont été faites par une IA, à partir de recherches web (voir la revue juridique et ses niveaux de certitude : *vérifié*, *probable*, *texte connu, non relu*, *incertain*). Les CGU, les CGV, la procédure de sanction, les rapports d'enquête publics et la conservation des journaux doivent être relus par un avocat en droit du numérique et de la consommation avant publication. La liste complète des points à lui soumettre est en section 10.

**Marqueurs utilisés.**
- **[Décision 2026-10-31]** : décidé par Gregory ; le document l'applique.
- **[Avocat]** : à faire valider par un avocat avant publication.
- **[À arbitrer : C1]** … **[À arbitrer : C5]** : conflit entre la revue juridique et la revue game master, que Gregory arbitrera ; les deux positions sont présentées, rien n'est tranché.
- **[TBD]** : paramètre de conception encore ouvert, renvoyé à une décision Dx.

Sources de cadrage : [plan marketing](plan-marketing.md) section 9, [GDD](game-design-document.md) (5.4, 5.8, 5.9, section 9), [étude PvP](etude-pvp.md), fiche [triche, multicomptes et bots](references-jeux/triche-multicomptes-bots.md), [cadre légal UE](references-jeux/cadre-legal-ue.md), documents de [docs/legal/](legal/README.md) (CGU, CGV, registre, politique de confidentialité).

## Index des codes

**Comportements (B)**

| Code | Comportement | Section |
|---|---|---|
| B1 | Automatisation : bots et scripts qui jouent à la place du joueur | 5 |
| B2 | Multicomptes au-delà de ce que permettent les règles | 5 |
| B3 | Push, pull et transferts abusifs entre comptes (dont guerre de façade) | 5 |
| B4 | Partage, vente, achat et prêt abusif de compte | 5 |
| B5 | Commerce en argent réel hors boutique (RMT) | 5 |
| B6 | Exploitation volontaire d'un bug sans le signaler | 5 |
| B7 | Contournement d'une protection (paix, bannière, bouclier, trêve, mode vacances, ligue) | 5 |
| B8 | Abus des récompenses et des events (hors parrainage, voir B15) | 5 |
| B9 | Harcèlement, propos haineux, contenus illicites | 5 |
| B10 | Usurpation de l'équipe ou d'un autre joueur | 5 |
| B11 | Fraude de paiement | 5 |
| B12 | Abus de l'API et des extensions | 5 |
| B13 | Atteinte à la sécurité et au service | 5 |
| B14 | Contournement d'une sanction | 5 |
| B15 | Fraude au parrainage (inscriptions poubelles, filleuls fictifs) — **nouveau en v2** | 5 |

**Échelle de sanctions (N)** — détail en section 1

| Code | Sanction |
|---|---|
| N0 | Rappel informel |
| N1 | Avertissement |
| N2 | Restriction temporaire |
| N3 | Suspension |
| N4 | Bannissement du serveur |
| N5 | Bannissement du compte (lobby) |

**Priorités de traitement (P)** — détail au principe 10

| Code | Périmètre | Délai |
|---|---|---|
| P1 | Sécurité, fraude de paiement, menaces, contenus illicites, mineur victime | 24 h, week-end compris |
| P2 | RMT, harcèlement, usurpation, vente de compte, fraude au parrainage monétisée | 72 h |
| P3 | Bots, multicompte, push, bug, parrainage, API | Lot hebdomadaire |

**Points à arbitrer par Gregory (C)** — détail en section 8

| Code | Sujet |
|---|---|
| C1 | Vendeur d'un compte (B4) : N4 ou N5 d'emblée |
| C2 | Coût du formalisme des sanctions pour un modérateur unique |
| C3 | Kaelite achetée des bannis pour bot ou RMT (question modifiée par la décision du 2026-10-31) |
| C4 | Harcèlement sans menace (B9) : saut de niveau ou N3 puis N4 |
| C5 | Rétroactivité des ajouts (s'applique aussi aux ajouts de la v2) |

**Décisions ouvertes ou closes (D)** — détail en section 9

| Code | Sujet | Statut v2 |
|---|---|---|
| D1 | Foyer partagé, comptes liés déclarés | Proposée |
| D2 | Seuils chiffrés du push | Ouverte (alpha) |
| D3 | Sitting | Proposée |
| D4 | Kaelite achetée en cas de N5 | **Close** [Décision 2026-10-31] |
| D5 | Délais d'appel, second relecteur | Proposée |
| D6 | Gel conservatoire | Proposée (7 jours, renouvelable une fois) |
| D7 | Suspension (N3) pendant une guerre | Proposée (réécrite pour la bannière) |
| D8 | Programme de signalement des bugs et failles | Proposée |
| D9 | Données collectées par une extension | Proposée |
| D10 | Mineurs | Ouverte (âge minimum) |
| D11 | Conservation des journaux et dossiers | Proposée (alignée sur le registre) |
| D12 | Qui modère | Proposée |
| D13 | Infiltration, espionnage, vol d'alliance | Proposée |
| D14 | Mode de Guerre remis en question | **Close** (étude PvP, 2026-10-30) |
| D15 | Détection du rythme non humain | Ouverte (Phase 3b) |
| D16 | Ce qui est publié des règles | Proposée |
| D17 | Statistiques publiques de modération | Proposée |
| D18 | Modération par bot ou IA | Proposée |
| D19 | Documents RGPD avant l'alpha fermée | À faire |
| D20 | Rapports d'enquête publics : paramètres | **Nouvelle**, ouverte |
| D21 | Mode vacances en guerre : paramètres restants | **Nouvelle**, ouverte |
| D22 | Programme de parrainage : paliers et plafonds | **Nouvelle**, ouverte |
| D23 | Critères du remboursement discrétionnaire de la Kaelite | **Nouvelle**, ouverte |

## 0. Principes

1. **Le code d'abord, la sanction ensuite.** Ce qui peut être empêché côté serveur l'est (plafonds, limites de débit, transferts impossibles, clé d'extension en lecture seule, délais du mode vacances). Une règle écrite ne remplace jamais un verrou ; les sanctions ne couvrent que ce que le verrou ne peut pas empêcher. Si un acte que le serveur autorise pose problème, c'est une décision de conception, pas de sanction.

2. **Un faux positif coûte plus cher qu'un tricheur toléré une semaine.** Aucune mesure qui produit un effet significatif sur le joueur ne repose sur un seul signal automatique : sanction au-delà du N1, gel conservatoire, gel du portefeuille (B11), refus ou fermeture d'un nouveau compte rapproché de la table `bans` (B14), blocage d'achat, retenue d'une récompense de parrainage (B15) au-delà de l'examen. Elle exige une revue humaine (Gregory ou un modérateur désigné) **réelle** (la personne examine les éléments, peut s'écarter du score et le fait de temps en temps) et **tracée** (qui a revu, quoi, quand). Motif : RGPD art. 22 et arrêt SCHUFA (CJUE, 7 décembre 2023, C-634/21, *probable*), selon lequel un score qui « guide de manière déterminante » une décision humaine peut lui-même être une décision automatisée. Restent automatisables les mesures mineures et immédiatement réversibles : défi de vérification, blocage de clé au dépassement de débit, message masqué en attente d'examen.

3. **Proportion, gradation, individualisation.** On n'applique pas l'échelle mécaniquement : gravité, intention, ancienneté du compte, récidives et préjudice aux autres joueurs entrent en compte. La proportionnalité est une obligation (DSA art. 14, § 4, *vérifié*). Un bannissement définitif est une résolution unilatérale du contrat pour inexécution (Code civil, art. 1224 à 1226, *probable*) : il suppose une inexécution suffisamment grave, une mise en demeure préalable **sauf urgence**, une notification motivée, et c'est à Kalendrath de prouver la gravité du manquement. **L'avertissement N1 joue le rôle de mise en demeure** : on ne saute des niveaux que pour les cas réellement urgents ou graves (fraude de paiement, atteinte à la sécurité, menaces, doxxing, contenus illicites, sollicitation d'un mineur). Chaque sanction est **individuelle** : on ne sanctionne pas un compte pour la faute d'un autre.

4. **Sanction motivée et appelable.** Tout joueur sanctionné reçoit, au plus tard au moment où la mesure s'applique, un exposé des motifs conforme à l'art. 17 du DSA (*vérifié*) : la mesure, sa portée et sa durée ; les faits et circonstances, et si la décision fait suite à un signalement ou à une enquête interne ; **si des moyens automatisés ont été utilisés** pour détecter ou décider ; la règle des CGU visée et pourquoi le comportement y contrevient ; les voies de recours internes et externes. Cela vaut aussi pour les mesures conservatoires. L'art. 17 vise d'abord les restrictions de contenus ; son application aux sanctions de comportement (bot, multicompte) est *incertaine*, mais on applique le même format partout, ce qui répond aussi à l'exigence de motivation de l'art. 1226 du Code civil.

5. **Les règles ne sont pas rétroactives.** Une règle ajoutée ou précisée ne s'applique qu'aux faits postérieurs à sa publication. La fraude et l'atteinte à autrui restent sanctionnables parce qu'elles sont déjà interdites par la loi et par la clause générale de loyauté des CGU (art. 7.9, 7.11, 7.12), en vigueur au moment des faits. Toute modification des règles est annoncée **30 jours** à l'avance (CGU 16.2, CGV 20), sauf mise en conformité légale ou sécurité, avec la faculté de résilier et d'obtenir le remboursement de la Kaelite achetée non dépensée. **Conséquence pour la v2 (voir C5)** : la fraude au parrainage (B15), les règles du mode vacances en guerre (B7), la publication de rapports d'enquête (section 2) et la perte de la Kaelite achetée au N5 (section 4) ne s'appliquent qu'aux faits postérieurs à leur publication dans les CGU et CGV.

6. **Journal de modération et dossiers d'enquête.** Chaque décision est consignée (date, joueur, règle, preuves, niveau, décideur, part des outils automatiques, trace de la revue humaine), pour garantir la cohérence entre cas semblables. Les contrôles alimentent des **dossiers d'enquête** (section 2). Le journal s'appuie sur la table `bans` et le panneau d'administration d'OGameX (IP partagées, missions entre comptes liés, activité 24 h sur 24, réactions instantanées). Journaux et dossiers sont des traitements de données personnelles : registre RGPD (fiches T4 et T5), durées fixées (D11), mention dans la politique de confidentialité.

7. **Base légale, information et analyse d'impact.**
   - **Base légale** : la détection de triche et de fraude repose sur l'**intérêt légitime** (RGPD art. 6, § 1, f ; considérants 47 et 49), avec une mise en balance écrite et le droit d'opposition (art. 21), auquel on peut opposer des motifs impérieux. La conservation imposée par la LCEN repose sur l'obligation légale.
   - **Information** : la politique de confidentialité décrit les données de détection, le profilage anti-triche, les durées, les destinataires et, depuis la v2, les rapports d'enquête publics (section 2.5). Les CGU décrivent la modération, l'usage d'outils automatiques et la revue humaine (DSA art. 14, § 1, *vérifié*).
   - **Empreintes d'appareil** : « appareil » s'entend partout des données reçues côté serveur (IP, agent du navigateur, cookie de session). Une empreinte calculée dans le navigateur relève de la règle des traceurs (ePrivacy art. 5, § 3 ; loi Informatique et libertés art. 82) et la CNIL ne considère pas la lutte contre la fraude comme exemptée de consentement en général (*vérifié*). Aucune empreinte calculée en JavaScript n'est codée sans avis d'avocat. **[Avocat]**
   - **Analyse d'impact (AIPD)** : obligatoire (profilage pouvant exclure du bénéfice d'un contrat, liste CNIL, délibération 2018-327, *probable* ; présence de mineurs ; surveillance systématique ; liste anti-contournement ; rapports publics nominatifs). AIPD simple à rédiger avant l'alpha fermée (D19).

8. **Le PvP en guerre d'alliances n'est jamais, en soi, un comportement bannissable.** Attaquer, piller, farmer un inactif ou un plus faible, coordonner une alliance, mentir en diplomatie, trahir un pacte, espionner par un tiers réel, intimider « en personnage », se mettre en mode vacances dans les règles du serveur : tout cela est le jeu, dans les limites que le serveur impose (3 attaques par cible et par 24 h, boucliers, trêves, pas de destruction de bâtiments). Les sanctions ne visent que ce qui sort du jeu : tricherie, fraude, atteinte à la personne réelle, atteinte au service. En cas de doute entre « rude » et « abusif », trancher en faveur du jeu.

9. **Dissuader sans vider le serveur.** (a) **Le N4 est la sanction définitive par défaut** ; le N5 est réservé à la fraude de paiement, à l'atteinte à la sécurité, au RMT organisé, aux réseaux qui monétisent la triche (bots vendus, parrainages vendus), aux menaces ou au doxxing, et à la récidive après un N4 (voir C1 pour la seule exception discutée). (b) **Période de grâce** : pendant l'alpha et la bêta, et pour tout compte de moins de 7 jours, les cas ambigus ne dépassent pas le N1, hors fraude, sécurité, menaces et contenus illicites. (c) **Le retrait des gains vient avant la sanction** : la plupart des abus (push, bug, parrainage) se règlent en reprenant l'avantage et en prévenant. (d) **Le rapport public dissuade sans alourdir la sanction** : il n'est ni une peine supplémentaire ni un moyen de pression, et il suit les règles de la section 2.5.

10. **Faisabilité pour un modérateur unique.** Tri par priorité **P1**, **P2**, **P3** (index). Conséquences : (a) les enquêtes de faible gravité (B3, B6 mineur, B8, B15 isolé) se règlent par retrait des gains et N0-N1 sur un seul indice solide ; le faisceau de trois indices est réservé au N3 et au-delà (niveaux de certitude, section 2.2) ; (b) modèles de notification, de demande d'explication, de réponse d'appel et de rapport public, un par famille ; (c) le détecteur classe la file d'attente, il ne la remplit pas : quelques alertes par jour au plus ; (d) **conflit d'intérêts** : un modérateur, Gregory compris, ne traite pas un dossier où il est partie, allié ou ennemi déclaré ; Gregory ne joue pas sur un serveur où il modère, ou son compte est déclaré et un tiers de confiance traite ce qui le touche. Voir C2.

## 1. Échelle de sanctions (commune)

| Niveau | Sanction | Effet | Durée type | Kaelite (section 4) |
|---|---|---|---|---|
| N0 | **Rappel informel** | Message de l'équipe, aucune trace disciplinaire | - | Aucun effet |
| N1 | **Avertissement** | Notification motivée, inscrite au dossier ; vaut mise en demeure | Dossier : 90 jours calendaires *(à confirmer, MI-4)* | Aucun effet |
| N2 | **Restriction temporaire** | Retrait ciblé d'une fonction : chat, envoi de ressources, accès à l'API ou aux clés d'extension, achats, classement, participation à un classement ou à une récompense de guerre | 24 h à 14 jours | Achats bloqués si la restriction les vise ; soldes utilisables |
| N3 | **Suspension** | Compte inaccessible ; en guerre, protégé comme sous bouclier (D7) | 3 à 30 jours | Soldes gelés, ni perdus ni réduits |
| N4 | **Bannissement du serveur** | Personnage fermé sur ce serveur, puis supprimé à l'expiration des délais d'appel et de réclamation ; les autres serveurs restent accessibles | Définitif sur ce serveur | Kaelite gagnée sur ce serveur perdue ; Kaelite achetée **non affectée** |
| N5 | **Bannissement du compte (lobby)** | Compte du lobby fermé : tous serveurs | Définitif | Kaelite gagnée perdue ; **Kaelite achetée non dépensée perdue, non remboursée** [Décision 2026-10-31], sauf geste discrétionnaire hors fraude |

**Fermé, pas supprimé.** Au N4 et au N5, le compte est fermé à l'accès, mais ses données et le dossier d'enquête sont conservés jusqu'à l'expiration des délais de recours (D11) : cela permet de le rétablir si l'appel aboutit, et de garder les preuves en cas de litige.

**Mesures annexes** (non disciplinaires) : gel conservatoire pendant l'enquête (7 jours au plus, renouvelable une fois sur motif écrit, D6) ; annulation d'une transaction ou d'une mission ; retrait des avantages obtenus indûment (ressources, objets, Kaelite gagnée, récompenses de parrainage) ; exclusion d'un classement ou d'une récompense d'event ; renommage d'office ; retrait d'un contenu. Elles restreignent le service : elles reçoivent le même exposé des motifs (principe 4) et relèvent de la revue humaine dès qu'elles dépassent le simple blocage technique réversible (principe 2).

**Récidive.** Un manquement de même famille dans les 90 jours suivant un avertissement monte d'un niveau, deux au plus sauf fait grave ; deux sanctions N2 ou plus en 12 mois ouvrent la voie au N3. Une récidive sur un fait plus léger que le premier (un chat limite après un script) n'est pas une récidive de même famille.

**Calibrage.**
- **Gravité réelle.** N0-N1 : gêne mineure sans avantage (chat limite, script de confort, bug isolé). N2 : avantage ou nuisance réels mais récupérables. N3 : atteinte répétée à l'équité ou à autrui, joueur encore récupérable ; viser 3 à 7 jours pour un premier N3 sur un serveur jeune, 14 à 30 jours en récidive. N4 : le joueur ne doit plus jouer sur ce serveur. N5 : danger pour les autres joueurs, le service ou le portefeuille. Un préjudice qui ne touche qu'un seul joueur ne monte pas au N5 sans circonstance aggravante.
- **N2 en cours de guerre.** Retirer à un chef d'alliance une fonction centrale (envoi de flotte, Ambassade, diplomatie) change l'issue d'une guerre : seulement pour un motif P1 ou P2, et jamais dans la fenêtre de 24 h d'une bataille déclarée sauf urgence. On ne retire jamais à un joueur la participation à une guerre, seulement la possibilité d'agir ou la participation à un classement ou une récompense de guerre.
- **Signalements de l'adversaire.** Aucun gel ni N2 sur le seul signalement d'un camp adverse.
- **Équité entre camps.** Même fait, même sanction, quels que soient le rang, la taille de l'alliance ou le statut de payeur. Le journal sert aussi à le vérifier.

**Durée du dossier**, à préciser dans les CGU : « 90 jours » s'entend en jours calendaires tant que Gregory n'a pas tranché (MI-4) ; une notion floue s'interprète en faveur du joueur (Code de la consommation, art. L211-1, *texte connu, non relu*).

## 2. Enquêtes et rapports d'enquête **[Décision 2026-10-31]**

Les contrôles (alertes automatiques, revue du panneau, signalements, veille) ne débouchent jamais directement sur une sanction : ils alimentent un **dossier d'enquête**. Le dossier a trois usages : **valider** les faits (la décision ne peut pas aller au-delà de ce que le dossier établit) ; **prouver** les exactions d'un joueur en cas d'appel, de réclamation ou de litige (c'est à Kalendrath de prouver le manquement, Code civil art. 1353 et 1226) ; et, dans les cas prévus en 2.5, servir de base à un **rapport public** qui justifie la sanction auprès des joueurs et dissuade les fraudeurs.

### 2.1 Deux formats selon la gravité

Pour rester tenable par un modérateur unique (principe 10, voir C2) :
- **Fiche courte** pour les cas qui ne dépassent pas le N2 : identifiant, code visé, faits, preuves citées (liens vers les extraits), certitude, décision, décideur, part des outils automatiques. Quelques minutes avec les modèles.
- **Dossier complet** pour tout N3, N4 ou N5, pour tout gel conservatoire et pour tout cas susceptible d'un rapport public : le format de 2.3 en entier, figé au moment de la décision.

### 2.2 Niveaux de certitude

Chaque dossier porte un niveau de certitude, qui plafonne la décision possible. Les niveaux ne sont pas des codes, pour ne pas les confondre avec l'échelle N.

| Certitude | Définition | Décision maximale |
|---|---|---|
| **Insuffisante** | Signal isolé, signalement seul, indice contesté de façon plausible | Aucune mesure ; classement sans suite ou surveillance |
| **Plausible** | Un indice solide, non contredit | Retrait des gains, N0-N1 |
| **Étayée** | Au moins deux familles d'indices indépendantes et concordantes ; explication du joueur demandée | Jusqu'au N2 |
| **Établie** | Au moins trois indices indépendants sur une durée significative, ou une preuve directe (aveu, transaction, message intégral, journal non équivoque) ; explications du joueur examinées et écartées par écrit | N3 à N5 ; seule certitude qui permet un rapport public |

Un indice issu d'un outil automatique compte pour une famille, jamais pour deux ; un signalement d'un joueur ne compte jamais seul.

### 2.3 Format du dossier d'enquête (version interne)

| Rubrique | Contenu |
|---|---|
| **Identifiant** | `ENQ-<serveur>-<année>-<numéro>` (le lobby utilise `lobby` comme serveur) |
| **Personnes visées** | Compte du lobby, personnage(s), serveur ; âge déclaré (majeur ou mineur) ; liens avec d'autres dossiers |
| **Origine** | Signalement (identité du signaleur conservée en interne, jamais communiquée au joueur visé, RGPD art. 15, § 4), alerte automatique, enquête interne, prestataire de paiement, veille externe |
| **Priorité et conflit d'intérêts** | P1, P2 ou P3 ; déclaration du modérateur qu'il n'est ni partie, ni allié, ni ennemi déclaré |
| **Codes visés** | B1 à B15 et règle des CGU correspondante (art. 7.x) |
| **Chronologie** | Faits horodatés, du premier indice à la décision, y compris les échanges avec le joueur |
| **Contrôles utilisés** | Liste des contrôles et outils (score de rythme, panneau des comptes liés, journal des transferts, filtre de mots, outil d'IA le cas échéant, D18) ; pour chacun, automatique ou manuel, et ce qu'il a produit |
| **Preuves** | Extraits de journaux, captures avec identifiant du message ou lien, notifications du prestataire, publications externes ; chaque fichier figé avec son empreinte numérique (hachage) et sa date de collecte |
| **Éléments à décharge** | Explications alternatives examinées (foyer partagé, réseau mobile, accessibilité, décalage horaire) et pourquoi elles sont retenues ou écartées |
| **Contradictoire** | Demande d'explication envoyée (date), réponse du joueur ou absence de réponse |
| **Certitude** | Niveau (2.2) et justification en quelques lignes |
| **Décision** | Niveau N, durée, mesures annexes, conséquences sur la Kaelite (section 4), rapport public envisagé ou non et sous quelle forme |
| **Revue humaine** | Qui a décidé, quand, ce qui a été examiné ; écart éventuel avec le score automatique |
| **Notification** | Date, canal, texte envoyé (modèle art. 17 du DSA) |
| **Appel et suites** | Appel ou réclamation, date, décision, auteur ; opposition à la publication ; réclamation tardive ou action en justice |
| **Conservation** | Date de fin de la sanction, date d'effacement prévue (D11) |

Le dossier est un traitement de données personnelles (registre, fiche T5). Le joueur visé peut y accéder (RGPD art. 15) : on lui communique ce qui le concerne, sans les données des tiers ni l'identité du signaleur ; le secret des méthodes de détection ne peut être opposé qu'après une mise en balance motivée et jamais au point de vider l'explication de son contenu (CJUE, Dun & Bradstreet Austria, C-203/22, 27 février 2025, *probable*). Les dossiers qui contiennent des faits susceptibles d'être des infractions pénales (B11, B13, certaines formes de B9 et B10) relèvent du régime restreint de l'art. 10 du RGPD et de l'art. 46 de la loi Informatique et libertés : dossier du cas seulement, pour la constatation ou la défense de droits, aucune liste générale. **[Avocat]**

### 2.4 Circuit de décision

1. **Déclenchement.** Une alerte, un signalement, une veille ou un prestataire ouvre une fiche, avec sa priorité P1 à P3. Vérification du conflit d'intérêts ; à défaut de modérateur sans lien, le dossier passe à un tiers de confiance.
2. **Mesure conservatoire, si nécessaire.** Gel du compte ou du portefeuille (D6), décidé par un humain, motivé dès son application, 7 jours au plus.
3. **Instruction.** Collecte à charge et à décharge ; les extraits utiles sont figés (hachage) dès qu'ils sont collectés, pour ne pas dépendre de la durée de rotation des journaux.
4. **Contradictoire.** Le joueur reçoit une demande d'explication (modèle par famille) et dispose de **72 h** (P1-P2) ou **7 jours** (P3) pour répondre, sauf urgence (menace, contenu illicite) ou risque de destruction des preuves, auquel cas l'explication est demandée après la mesure. Cette étape sert aussi de mise en demeure au sens de l'art. 1226 du Code civil.
5. **Qualification.** Codes visés, niveau de certitude (2.2), gravité, antécédents, période de grâce (principe 9 b).
6. **Décision.** Prise par un humain : modérateurs pour N0 à N2, Gregory seul pour N3 à N5 (D12). Pour un N4 ou un N5 qui n'est pas urgent, la décision est relue à froid après 24 h au moins. La décision dit si un rapport public est envisagé (2.5).
7. **Notification.** Exposé des motifs (principe 4), conséquence sur la Kaelite (section 4), et, si un rapport public est envisagé : sa forme (anonyme ou sous pseudonyme), son projet de texte, sa durée, et le droit de s'y opposer.
8. **Appel.** 14 jours pour l'appel prioritaire ; réclamation recevable 6 mois (section 3).
9. **Clôture.** Décision définitive : rapport public s'il est permis (2.5), mise à jour des statistiques (D17), dossier figé.
10. **Conservation et effacement.** Selon D11 ; le rapport public suit ses propres durées (2.5).

### 2.5 Version publique du rapport

**But.** Montrer que la sanction repose sur des faits, renforcer la confiance des joueurs honnêtes et dissuader les fraudeurs. Le rapport public n'est **pas** une peine supplémentaire : il ne vise pas à humilier, il décrit des faits établis et une décision définitive.

**Deux formes.**
- **Rapport anonymisé (forme par défaut).** Ni pseudonyme, ni nom d'alliance, ni détail qui permettrait d'identifier le joueur dans une petite communauté (date exacte, coordonnées, volume de ressources unique). Sur un serveur de petite taille, un cas isolé reste souvent reconnaissable : on regroupe alors plusieurs cas ou on attend la fin du chapitre. Une anonymisation réelle fait sortir le rapport du RGPD (considérant 26) ; tant qu'une réidentification reste raisonnablement possible, on le traite comme des données pseudonymisées, donc personnelles (RGPD art. 4, 5).
- **Rapport nominatif (sous le pseudonyme en jeu, jamais le nom réel).** Seulement si **toutes** les conditions suivantes sont réunies :
  1. la sanction est un **N4 ou un N5** ;
  2. la certitude est **établie** ;
  3. le comportement relève de la triche ou de la fraude au jeu : B1, B2, B3, B5, B6, B8, B12, B14, B15, ou B4 pour le revendeur ;
  4. la décision est **définitive** : appel tranché, ou délai d'appel de 14 jours expiré sans appel ;
  5. le joueur **n'est pas mineur** et son âge n'est pas douteux ;
  6. le joueur ne s'est pas opposé à la publication, ou son opposition a été écartée pour un motif impérieux écrit au dossier ;
  7. aucune plainte pénale ni procédure judiciaire liée aux faits n'est en cours ;
  8. les faits sont postérieurs à la publication de la clause dans les CGU (principe 5, C5).

  **Exclus de toute publication nominative** : B9 (harcèlement, propos haineux : la publication exposerait les victimes et appellerait des représailles), B10 et B11 (usurpation, fraude de paiement : faits susceptibles d'être des infractions pénales, art. 10 du RGPD), B13 (atteinte à la sécurité : idem, et risque de publicité pour la faille). Ces cas ne font l'objet que de rapports anonymisés ou de statistiques.

**Où.** Dans le lobby et dans le jeu, sur une page « Registre des sanctions » réservée aux joueurs connectés, non indexée par les moteurs de recherche. Jamais sous pseudonyme sur la vitrine, les réseaux sociaux, Reddit ou Discord ; Discord et les notes de version peuvent reprendre les rapports anonymisés.

**Contenu type d'un rapport public.** Identifiant du dossier ; serveur ; pseudonyme (forme nominative seulement) ; code(s) et règle des CGU visés ; période des faits ; faits en termes neutres et vérifiables (« le compte a déclenché des actions de jeu par un programme automatisé, à intervalles constants, pendant 9 jours ») ; mention « certitude établie, décision définitive » ; sanction et durée ; ce qui a été fait pour les joueurs lésés (gains retirés, ressources rétablies). Jamais : méthode de détection détaillée, adresse IP, données de paiement, nom réel, identité des signaleurs, des victimes ou des comptes tiers non sanctionnés, qualification pénale (« escroc », « voleur », « pirate »), adjectif de jugement.

**Durée de publication (proposition, D20).** Rapport nominatif : jusqu'à la fin du chapitre du serveur, **6 mois au plus** ; il est ensuite anonymisé ou retiré. Rapport anonymisé : conservé dans l'historique du serveur. **[Avocat]**

**Base légale et information.** Intérêt légitime (RGPD art. 6, § 1, f) : loyauté du jeu, confiance des joueurs, dissuasion, information des joueurs lésés. Il faut une mise en balance écrite, qui montre pourquoi le rapport anonymisé et les statistiques (D17) ne suffisent pas dans les cas où l'on publie sous pseudonyme ; c'est le point le plus fragile. La publication est annoncée dans les CGU (article 9) et la politique de confidentialité (section 2.5), inscrite au registre (fiche T5) et couverte par l'AIPD (D19).

**Droit d'opposition (RGPD art. 21).** La notification de la sanction annonce le projet de rapport nominatif, avec son texte, et le droit de s'y opposer pendant le délai d'appel. Recommandation : accepter l'opposition et publier sous forme anonymisée, sauf motif impérieux écrit au dossier (par exemple un revendeur de bots ou de comptes encore actif auprès des joueurs). Le joueur garde ses droits de rectification et d'effacement (art. 16 et 17) ; à la fin de la durée de publication, l'effacement est automatique.

**Diffamation et présomption d'innocence.** Imputer publiquement à une personne identifiable un fait qui porte atteinte à son honneur ou à sa considération est une diffamation (loi du 29 juillet 1881, art. 29 et 32, *texte connu, non relu*) ; un pseudonyme suffit si la communauté reconnaît la personne. Les moyens de défense sont la preuve de la vérité des faits (art. 35) ou la bonne foi, que la jurisprudence apprécie selon la légitimité du but, l'absence d'animosité personnelle, la prudence et la mesure de l'expression et le sérieux de l'enquête (*probable*). D'où les règles ci-dessus : certitude établie, dossier figé, faits neutres, aucune qualification pénale, décision définitive, pas de publication pendant une procédure pénale (Code civil, art. 9-1, présomption d'innocence). Le joueur nommé dispose d'un droit de réponse en ligne (LCEN, art. 6, IV, numérotation à vérifier après la loi SREN, *texte connu, non relu*) : prévoir comment il s'exerce sur la page.

**Mineurs.** Jamais de rapport nominatif, et pas de rapport anonymisé individuel tant qu'il pourrait permettre de reconnaître le joueur ; seules les statistiques agrégées en tiennent compte.

**Publication après l'appel, et après.** Le rapport n'est publié qu'après la décision d'appel ou l'expiration du délai de 14 jours. La réclamation reste recevable 6 mois (section 3) : si une réclamation ou une action en justice est engagée après la publication, le rapport nominatif est retiré pendant l'examen ; si la sanction est annulée ou réduite sous le N4, il est supprimé, et le joueur choisit s'il souhaite un rectificatif public (qui pourrait l'exposer à nouveau). **[Avocat]** : faut-il attendre l'expiration des 6 mois avant toute publication nominative ?

### 2.6 Ce qui reste à faire valider par un avocat (rapports d'enquête)

1. Le principe même du rapport nominatif sous pseudonyme : mise en balance de l'intérêt légitime, nécessité au regard du rapport anonymisé, proportionnalité.
2. Les comportements admis à la publication nominative (liste du 3) et l'exclusion des faits susceptibles d'être des infractions pénales (art. 10 du RGPD).
3. La durée de publication (6 mois au plus) et le moment de la publication (après l'appel de 14 jours, ou après les 6 mois de réclamation).
4. Le traitement du droit d'opposition et la notion de motif impérieux.
5. Le risque de diffamation et les formulations types, ainsi que le droit de réponse en ligne.
6. La clause des CGU qui annonce la publication et son opposabilité.
7. La conservation et l'accès au dossier interne (art. 15 du RGPD, secret des méthodes de détection).

### 2.7 Ce que cela demande, sans avocat, avant l'alpha fermée

Modèles de fiche courte, de dossier complet, de demande d'explication et de rapport public (FR et EN) ; outil de hachage des pièces ; ajout des rapports publics à la fiche T5 du registre, à la politique de confidentialité et à l'AIPD ; clause des CGU (article 9) ; page « Registre des sanctions » non indexée dans le lobby.

## 3. Notification et appel

1. **Notification** : par courriel et message en jeu, avec l'exposé des motifs (principe 4) : mesure, durée et date de fin, faits retenus (dates, nature des actions, comptes liés : assez pour contester, sans révéler les méthodes de détection), origine (signalement ou enquête interne), usage ou non de moyens automatisés, règle des CGU visée, conséquence sur la Kaelite, projet de rapport public le cas échéant, voies de recours internes et externes, lien d'appel.
2. **Appel prioritaire** : dans les **14 jours** suivant la notification, par le formulaire du lobby ou `appel@kalendrath.com`, avec l'identifiant du compte et les arguments du joueur. Un seul appel par sanction. **Passé ce délai, une réclamation reste recevable pendant 6 mois**, examinée sans priorité : un délai interne court qui fermerait la porte aux recours serait présumé abusif (Code de la consommation, art. R212-2, 10°, *probable*). L'appel peut viser aussi le projet de rapport public.
3. **Examen** : accusé de réception immédiat, réponse motivée en général sous **10 jours ouvrés** (objectif, pas garantie, D5). L'appel est **toujours examiné par une personne, jamais par un outil automatique ou une IA seule**. Il est examiné par une personne qui n'a pas pris la décision initiale dès que l'équipe le permet ; tant qu'elle compte une seule personne, la décision est revue à froid après 48 h au moins, sur dossier complet.
4. **Issues** : sanction confirmée, réduite, annulée avec rétablissement des avantages retirés (y compris la Kaelite), ou requalifiée. En cas d'annulation, la mention disparaît du dossier, tout rapport public est retiré et une compensation proportionnée est accordée (temps de suspension rendu, durée d'une offre prolongée).
5. **Effet suspensif** : l'appel ne suspend pas un N3 à N5 ni un gel ; il suspend un N1-N2 contesté pour erreur manifeste de compte ; il suspend toujours la publication d'un rapport.
6. **Fin de la procédure interne** : la décision d'appel clôt la procédure interne, « sans préjudice de votre droit de saisir gratuitement le médiateur de la consommation [coordonnées] ou les tribunaux compétents ». Ne jamais écrire qu'une décision est « sans recours ». La couverture par le médiateur d'un litige sur un service gratuit est **[Avocat]**.
7. **Mineurs** : notification en langage simple ; pour un N4, un N5 ou tout ce qui touche à un paiement, information du représentant légal dont le contact a été recueilli ; le représentant légal peut faire appel au nom du joueur.

**Charge de la preuve.** C'est à Kalendrath de prouver le manquement. Les CGU ne disent pas que les journaux « font foi » de manière absolue : une telle clause est sur la liste noire (art. R212-1, 12°, *probable*) et une convention de preuve ne peut créer de présomption irréfragable (Code civil, art. 1356). Les journaux sont un moyen de preuve parmi d'autres, que le joueur peut contester ; d'où le dossier figé (section 2).

## 4. Kaelite et sanctions **[Décision 2026-10-31]**

**Décision.** L'échelle est graduée : avertissement, restriction, suspension, bannissement du serveur, puis bannissement du compte. **Au niveau final (N5), la Kaelite achetée non dépensée est perdue et n'est pas remboursée.** Gregory accepte ce risque juridique, avec les trois garde-fous ci-dessous.

| Mesure | Kaelite gagnée | Kaelite achetée |
|---|---|---|
| Gel conservatoire, N3 | Gelée | Gelée ; la durée d'une offre à durée est prolongée si la mesure est annulée en appel |
| N2 visant les achats | Utilisable | Utilisable ; nouveaux achats bloqués |
| N4 | Perdue sur ce serveur, avec les offres propres à ce serveur | **Non affectée** (tenue par le lobby) |
| N5, fraude de paiement (B11) | Perdue | Kaelite issue des paiements frauduleux retirée ; Kaelite achetée régulièrement et non dépensée **perdue**, sans geste discrétionnaire ; préjudice réclamable en sus |
| N5, tout autre motif | Perdue | **Perdue, non remboursée**, sauf remboursement discrétionnaire (D23) |
| Fermeture d'un compte surnuméraire (B2, B15) | Perdue sur ce compte | Transférée sur le compte conservé ou remboursée (CGV 15.6 inchangé : ce n'est pas un N5) |
| N5 annulé ou réduit en appel | Rétablie | Rétablie |

**Garde-fous (mitigations) retenus.**
1. **Avertissements préalables documentés.** Sauf manquement grave qui justifie un saut de niveau (principe 3), un N5 n'intervient qu'au terme de l'échelle, après au moins un avertissement N1 conservé au dossier. Chaque notification N1 et au-delà rappelle en une phrase que le niveau final entraîne la perte de la Kaelite achetée non dépensée. C'est ce qui fait de la perte la conséquence d'une résolution pour inexécution grave, après mise en demeure, plutôt qu'une confiscation.
2. **Clause claire dès l'achat.** La règle figure dans les CGV (article 15.4), dans les CGU (article 9.5) et sur l'écran de commande, avant le bouton de paiement. Libellés proposés :
   - CGV, FR : « En cas de bannissement définitif de votre Compte (niveau N5) pour un manquement aux règles du jeu, la Kaelite achetée que vous n'avez pas encore dépensée est perdue et ne vous est pas remboursée. Ce bannissement n'intervient qu'au terme de l'échelle des sanctions, après avertissement, sauf manquement grave défini à l'article 9 des CGU. Hors fraude, l'Éditeur peut, à sa discrétion, rembourser tout ou partie de cette Kaelite. »
   - CGV, EN : "If your Account is permanently banned (level N5) for breaching the game rules, any purchased Kaelite you have not yet spent is forfeited and is not refunded. Such a ban only comes at the end of the sanction scale, after a warning, except for a serious breach as defined in Article 9 of the Terms of Use. Except in cases of fraud, the Publisher may, at its discretion, refund all or part of that Kaelite."
   - Écran de commande, FR : « Bon à savoir : en cas de bannissement définitif pour manquement grave aux règles, la Kaelite non dépensée n'est pas remboursée. » EN : "Please note: if your account is permanently banned for a serious breach of the rules, unspent Kaelite is not refunded."
3. **Remboursement discrétionnaire, hors fraude.** L'éditeur peut rembourser, en tout ou partie, la Kaelite achetée non dépensée d'un banni N5 pour un motif autre que la fraude de paiement. Critères internes proposés (D23), à appliquer de façon égale et à tracer au dossier : N5 prononcé d'emblée, sans avertissement antérieur au dossier ; compte d'un joueur mineur ; achats très récents (moins de 14 jours) ; montant élevé au regard du manquement. Voir C3 pour les bannis pour bot ou RMT.

**Ce que la loi impose quoi qu'il arrive.** L'achat d'un mineur fait sans autorisation peut être annulé à la demande du représentant légal (Code civil, art. 1148 ; CGV 16.3) : remboursement, jamais sanction. Le remboursement en cas de refus d'une modification des CGU ou CGV (CGU 16.2) et en cas d'arrêt du jeu (CGV 14.4) n'est pas touché par cette décision.

**Risque juridique (relevé par la revue juridique, maintenu ici sans remettre la décision en cause).**
- Une clause qui permet au professionnel de garder des sommes versées pour des prestations qu'il ne fournira pas, ou qui impose une indemnité manifestement disproportionnée, est **présumée abusive** (Code de la consommation, art. R212-2, 3°, et principe général de l'art. L212-1, *probable*). Le professionnel peut renverser la présomption, en montrant notamment la gravité du manquement et la proportionnalité de la perte.
- En cas de résolution du contrat, les prestations non exécutées donnent en principe lieu à restitution (Code civil, art. 1229, *texte connu, non relu*). La perte forfaitaire de la Kaelite pourrait aussi être requalifiée en **clause pénale**, que le juge peut réduire si elle est manifestement excessive (Code civil, art. 1231-5, *texte connu, non relu*).
- Précédent : le tribunal de grande instance de Paris a jugé abusives, en 2019, des clauses de Steam, dont, selon la presse, celle qui laissait à Valve les fonds du portefeuille à la clôture du compte (17 septembre 2019, UFC-Que Choisir c/ Valve, *probable* ; issue de l'appel non trouvée).
- Conséquence si la clause est jugée abusive : elle est réputée non écrite, et la Kaelite non dépensée est due au joueur qui conteste ; une action collective d'une association de consommateurs ou un contrôle de la DGCCRF peuvent viser la clause elle-même.
- Ce qui réduit le risque : les trois garde-fous ; une échelle réellement appliquée et tracée ; des montants de paquets modestes (rien n'oblige à stocker beaucoup de Kaelite, CGV 7.3) ; la perte limitée à la Kaelite non dépensée ; la cohérence avec la suppression volontaire du compte (si celle-ci donne droit au remboursement sur demande, IM-10, un joueur n'a aucun intérêt à se faire bannir, et l'inverse ne choque pas).
- **[Avocat]** : validité de la clause de perte au N5 ; formulation ; différence de traitement entre N5 d'emblée et N5 en fin d'échelle ; articulation avec l'art. R212-2, 3° et l'art. 1231-5.

## 5. Les comportements

Légende des preuves : **Journal** = journaux serveur (actions, IP, sessions, agent, horodatages) ; **Panneau** = panneau admin de détection d'OGameX ; **Signalement** = signalement d'un joueur, jamais suffisant seul. Le signalement d'un contenu illicite est un signalement au sens de l'art. 16 du DSA : accusé de réception, décision motivée, information du signaleur, mention des moyens automatisés. Les niveaux de certitude renvoient à la section 2.2.

---

### B1. Automatisation : bots et scripts qui jouent à la place du joueur

**Définition.** Toute action de jeu (construire, rechercher, recruter, envoyer une flotte ou un héros, lancer une expédition, répondre à une attaque, collecter, aider en alliance, cliquer une récompense) déclenchée par un programme sans clic ou commande d'un humain pour **cette** action. Un script lancé « toutes les heures » est de l'automatisation, même si le joueur l'a démarré lui-même.

**Exemples.** Bot qui relance la file de construction dès qu'elle se vide ; script d'expéditions en boucle ; programme qui fuit ou renvoie une flotte à l'approche d'une attaque ; macro d'interface ; appel de l'API de session par un outil tiers ; tentative d'agir avec la clé d'extension (impossible côté serveur).

**Légitime.**
- Extensions en lecture seule (affichage, calculs, rappels, tableaux de bord, simulateurs) ; raccourcis clavier, gestionnaire de mots de passe, outils d'accessibilité ; automatisations accordées par le jeu, y compris en boutique.
- Alerte d'attaque relayée sur un téléphone ou un salon Discord, suivie d'une **réaction humaine** ; fleetsave manuel, même chaque soir à heure fixe.
- Régularité seule, décalage horaire, IP partagée : pas des preuves.
- Lecture de l'API au-delà de la limite de débit : B12, pas B1.

**Preuves.** Au moins deux familles concordantes pour un N1-N2 ; certitude établie pour un N3 et au-delà. (a) Journal : intervalles quasi constants sur plusieurs jours, délais de réaction inférieurs au temps humain (moins de ~2 s), à valeur probante seulement **répétés** (au moins 5 occurrences) et combinés à une autre famille, activité 24 h sur 24 sans pause plausible, appels hors interface ; (b) signature technique (agent, absence d'événements d'interface, jeton non issu de l'interface) ; (c) aveu ou publication de l'outil.

**Détection.** Score de rythme non humain par session : c'est un **profilage** (RGPD art. 4, 4), mentionné dans la politique de confidentialité, qui ne déclenche qu'un **contrôle** (défi de vérification) puis une revue, jamais une sanction. Un CAPTCHA tiers ne doit pas réutiliser les données pour son compte, sinon le consentement devient nécessaire (FAQ cookies de la CNIL, *vérifié*). Manuelle : panneau, signalements, veille Discord et Reddit. Prévention : actions réservées à la session, limites de débit, clé en lecture seule.

**Sanctions.**
- Script de confort isolé, sans avantage décisif : N1 et retrait des gains.
- Premier cas caractérisé, même d'avantage compétitif, joueur jamais prévenu : **N3 (7 jours)** et retrait des gains.
- Usage établi sur plus de 7 jours, avertissement antérieur, ou bot vendu ou partagé : N4.
- Auteur ou revendeur d'un bot d'action : N5.
- Tentative techniquement impossible (clé d'extension) : N1-N2, sauf répétition ou outil diffusé.
- Priorité P3 en lot hebdomadaire ; la diffusion publique d'un outil passe en P2.

---

### B2. Multicomptes au-delà de ce que permettent les règles

**Définition.** Jouer, ou faire jouer en coordination, **plus d'un personnage sur un même serveur**. Un personnage par serveur sur plusieurs serveurs est permis. Le **compte du lobby est unique par personne** : en ouvrir un second est aussi du multicompte (voir B15 pour le parrainage).

**Exemples.** Second personnage « ferme » ou « éclaireur » ; second personnage pour contourner une protection, un bouclier ou une sanction ; comptes multiples pour multiplier les récompenses ; second compte utilisé comme espion dans une alliance ennemie.

**Légitime.**
- Foyer ou réseau partagé (famille, colocation, école, réseau mobile CGNAT, VPN d'entreprise) : déclaration recommandée (D1) ; les comptes déclarés ne peuvent ni s'échanger de ressources ni s'attaquer.
- Changement de compte légitime, compte de remplacement après perte d'accès signalée, garde ponctuelle (B4).
- Un **vrai joueur tiers** qui rejoint une alliance ennemie pour la renseigner : jeu légitime (D13). Un second compte du même joueur pour le même usage : B2, même « seulement diplomatique ».

**Preuves.** Pour la fermeture d'un compte surnuméraire avec N1 au plus : deux indices concordants (dont transferts ou sessions jamais simultanées), après demande d'explication. Pour un N3 et au-delà : certitude établie, soit au moins trois indices indépendants sur une semaine au moins (IP et agent partagés, sessions qui ne se chevauchent jamais, transferts ou missions entre les comptes, comportements miroir, adresses proches, même jeton de moyen de paiement). Une IP commune seule ne prouve rien.

**Détection.** Alertes du panneau (IP partagée, missions entre comptes liés), revue d'enquête, signalements. Prévention : transport vers les tiers fermé et transports entrants fermés dans une alliance en guerre (étude PvP, sections 2 et 6.2) ; Kaelite gagnée liée au serveur.

**Sanctions.**
- Premier cas sans avantage : N1 et fermeture des comptes surnuméraires (le plus ancien est conservé par défaut).
- Avantage tiré : N2 et retrait des avantages ; second multicompte après un N1-N2 : N3.
- Multicompte pour harceler, contourner une sanction ou alimenter un compte principal (« compte ferme », relais de push) : N4.
- Récidive après un N4 : N5.

**Points juridiques.** « Même moyen de paiement » : seulement le jeton ou l'empreinte fournis par le prestataire, jamais le numéro de carte, et pour cette seule finalité. La déclaration de foyer collecte le lien entre comptes, pas l'identité des membres. La Kaelite achetée d'un compte surnuméraire fermé est transférée sur le compte conservé ou remboursée (section 4).

---

### B3. Push, pull et transferts abusifs entre comptes

**Définition.** Transfert de valeur sans contrepartie réelle au bénéfice d'un compte précis : don déguisé, envoi de ressources, combat arrangé **au profit d'un autre de ses comptes ou d'un complice**, faux échange au marché, prêt jamais remboursé organisé. *Pushing* : vers un compte plus avancé ; *pulling* : vers un compte plus faible pour contourner une protection.

**Exemples.** Un compte envoie toutes ses ressources à un autre ; combat perdu volontairement contre un complice pour lui donner des points ; échanges asymétriques répétés au marché.

**Légitime.**
- Aide de débutant sous les plafonds ; entraide d'alliance prévue par le jeu (Ambassade, défense groupée, soutien de flotte) ; marché officiel au ratio imposé.
- En guerre : reddition avec tribut plafonné ; retraite tactique ; flotte laissée sans défense pour attirer l'ennemi ; sacrifice de diversion ; renforts à un allié réel ; erreur de calcul ; dons d'un chef sous les plafonds ; **farm** répété d'un joueur plus faible ou inactif dans la limite de 3 attaques par 24 h ; **bash** d'une alliance entière dans les plafonds.
- Échange très déséquilibré entre amis réels : à apprécier selon l'ampleur et la répétition. Don dans un foyer déclaré : D1.

**Cas à surveiller : la guerre de façade (*wintrading* d'alliances).** Deux alliances ennemies qui s'arrangent pour se faire gagner du score, des débris ou des récompenses de guerre (batailles à sens unique alternées, flottes envoyées pour être détruites, paix blanche pour répartir un butin). La preuve est l'**alternance** et l'**asymétrie sans résistance** sur plusieurs batailles. Une alliance qui perd franchement une guerre n'est jamais suspecte pour cela. Prévention : le serveur rend nuls les points d'une bataille sans perte significative pour l'un des camps.

**Preuves.** Journal des transferts et missions sur au moins trois occurrences ou un volume anormal (seuil lié à la production d'une journée, D2), asymétrie répétée, absence de contrepartie, lien entre les comptes (B2 ou B4) ou aveu. Un seul indice suffit au retrait des gains, pas à la sanction.

**Détection.** Déséquilibre cumulé entre paires de comptes, flux vers un nœud unique, pertes de combat inhabituelles entre alliés ; revue des plus gros flux. Prévention : plafonds de transferts, ratio du marché, règles de transport en guerre, Kaelite gagnée non transférable.

**Sanctions.**
- Occasionnel, faible volume : N1 et annulation si possible.
- Répétition ou volume notable : N2 (envois bloqués) puis N3, retrait des gains chez le bénéficiaire.
- Guerre de façade : retrait des points et récompenses de guerre, puis N2 (exclusion du classement de guerre) pour les chefs ; N4 seulement pour l'organisation prouvée avec transferts ou comptes liés.
- Organisation systématique (réseau de comptes) : N4 pour chaque titulaire dont la **participation consciente** est établie, N5 pour l'organisateur. Un joueur qui a reçu des ressources sans rien organiser perd l'avantage indu, pas son compte.

---

### B4. Partage, vente, achat et prêt abusif de compte

**Définition.** Le compte est utilisé par une autre personne que son titulaire, ou change de titulaire, hors du cadre prévu par le jeu ; ou sitting continu qui permet de jouer à plusieurs 24 h sur 24.

**Exemples.** Vente sur un site de revente ou Discord ; échange de comptes ; mot de passe confié à un « booster » ; relais permanent à deux ; compte tenu par un tiers rémunéré ; sitter qui garde le compte actif pendant un mode vacances de façade (voir B7).

**Légitime.**
- Sitting ponctuel déclaré et limité (D3), sans combat ni transfert sans accord du titulaire.
- Aide à un proche pour jouer (parent et enfant, personne en situation de handicap) : à maintenir expressément dans les CGU, une interdiction générale pourrait être jugée discriminatoire.
- Compte piraté : la victime n'est pas sanctionnée (B13). Compte d'un proche décédé : au cas par cas.

**Preuves.** Changement brutal de comportement (rythme, horaires, agent, langue, style), connexions incompatibles géographiquement, annonce de vente ou témoignage vérifiable, changement d'adresse ou de mot de passe suivi d'un autre profil d'usage.

**Détection.** Surtout manuelle (signalements, veille des sites de revente) ; rupture d'agent ou de localisation et de comportement.

**Sanctions.**
- Partage simple sans avantage : N1. Sitting continu ou prêt à plusieurs : N2 puis N3.
- **Acheteur** : N4 (fermeture du compte acheté) la première fois, N5 en récidive.
- **Revendeur, intermédiaire, récidive** : N5.
- **Vendeur occasionnel, premier cas, sans activité commerciale** : **[À arbitrer : C1]**. Position de la version 1 et de la revue juridique : N5 d'emblée. Position de la revue game master : N4, le N5 étant réservé au revendeur, à l'intermédiaire et à la récidive. Si le N5 est retenu, le principe 9 (a) doit le citer comme exception ; et, avec la décision du 2026-10-31, le vendeur perdrait aussi sa Kaelite achetée non dépensée (section 4).

---

### B5. Commerce en argent réel hors boutique (RMT)

**Définition.** Échanger contre de l'argent réel, des cryptoactifs ou des biens extérieurs au jeu des ressources, objets, comptes, services de jeu (boost, farm), héros ou de la Kaelite, hors de la boutique officielle ; y compris l'incitation indirecte (dons en jeu contre un paiement Patreon à un tiers).

**Exemples.** Ressources contre PayPal ; boost de classement payé ; revente de codes de Kaelite ; « je vends mon héros » ; parrainages vendus (voir B15).

**Légitime.** Cadeau officiel prévu par la boutique ; échanges en jeu sans argent réel (encadrés par B3) ; dons Patreon au projet sans contrepartie cachée ; conversation sur le commerce d'un autre jeu.

**Preuves.** Annonce ou conversation intégrale avec contexte, puis transfert correspondant au journal. L'annonce seule permet N1-N2 ; la transaction avérée est nécessaire au N3 et au-delà.

**Détection.** Signalements, veille externe ; mots-clés de chat sur les offres de vente (alerte, jamais sanction automatique) ; flux anormaux (B3). L'analyse de mots-clés est mentionnée dans la politique de confidentialité et les CGU ; les **messages privés** ne sont analysés que sur signalement ou enquête ciblée, jamais lus systématiquement par un humain (régime du secret des correspondances pour le chat de jeu : *incertain*, **[Avocat]**).

**Sanctions.** Annonce sans transaction : N1 puis N2 (chat). Transaction avérée : N3 au moins et retrait des biens. Acheteur : N3 la première fois, N4 en récidive. Revendeur régulier ou réseau : N5. Source frauduleuse : B11.

---

### B6. Exploitation volontaire d'un bug sans le signaler

**Définition.** Utiliser une erreur du jeu (duplication, ressources gratuites, calcul erroné, résolution temporelle, faille de timing, trou de l'API) pour obtenir un avantage, **et** ne pas la signaler, ou la répéter après avoir été prévenu, ou la partager ou la vendre.

**Exemples.** Annulation à la milliseconde pour un remboursement multiple ; double dépense par requêtes parallèles ; boucle d'expéditions sur une erreur de probabilité ; tutoriel d'exploitation ; mode vacances enchaîné grâce à une faille (voir B7).

**Légitime.** Bug découvert par hasard et signalé rapidement (récompensé, D8 ; avantage négligeable conservé, sinon retiré sans sanction) ; stratégie inattendue mais conforme aux règles ; comportement documenté comme « fonctionnement prévu » ; une seule utilisation signalée sous 24 h (N0).

**Preuves.** Répétition (au moins deux utilisations ou un gain majeur) et absence de signalement ou usage après avertissement ; ou diffusion publique de la méthode.

**Détection.** Alertes de ressources inattendues, écarts de cohérence (production et consommation, doublons d'objets, soldes de Kaelite) ; revue d'anomalies, signalements, veille.

**Sanctions.** Utilisation limitée : N0-N1 et retrait. Usage répété ou gain important : N2-N3 et retrait. Diffusion, vente de la méthode, exploitation touchant la Kaelite ou l'économie : N4. Faille de sécurité exploitée à des fins malveillantes : B13. Signaler tôt réduit d'un niveau.

---

### B7. Contournement d'une protection

**Définition.** Détourner ou neutraliser, par un artifice technique, un second compte ou un bug, un mécanisme de protection : paix par défaut des alliances sans bannière, bannière d'alliance et ses délais, boucliers, trêves, protection des débutants, ligues, limites d'attaque, **mode vacances**, règles de guerre et de pactes. *Vocabulaire provisoire en attente de R16 de l'étude PvP.*

**Mode vacances en guerre [Décision 2026-10-31].** Le mode vacances est **autorisé pendant une guerre**, avec trois verrous serveur : **48 h minimum** (il ne peut pas être levé avant) ; **non enchaînable** ; **72 h d'attente après sa levée** avant de pouvoir le réactiver. Ces verrous relèvent du principe 1 : c'est le serveur qui les impose, la modération ne sanctionne que leur contournement. Cette décision remplace la recommandation R9 de l'étude PvP (« mode vacances impossible après la déclaration »). Restent à fixer (D21) : activation possible ou non avec une attaque en approche ou des flottes en vol ; effets sur la production, les missions sortantes et le score de guerre ; durée maximale. **[TBD]**

**Exemples d'infractions.** Activer un bouclier ou le mode vacances par une faille, ou enchaîner deux périodes de mode vacances par un bug (B6) ; faire jouer un sitter ou un second compte pendant le mode vacances pour garder l'activité tout en restant inattaquable (B4 ou B2) ; envoyer des ressources à un compte pour le faire sortir d'une ligue ; compte « mule » maintenu bas avec des ressources cachées chez un tiers (*sandbagging*) ; faire attaquer par un **second compte** pour contourner un interdit de diplomatie.

**Légitime.**
- Utiliser un bouclier, une trêve, un délai ou le mode vacances **au meilleur moment**, y compris juste avant une attaque attendue, tant que le serveur l'autorise. Si une activation à la dernière seconde paraît abusive, c'est au serveur de la bloquer (D21) ; tant qu'elle est permise, ce n'est pas du contournement.
- Diplomatie trompeuse : signer un pacte pour endormir l'adversaire et le rompre au premier délai permis, mentir, promettre une aide qu'on ne donnera pas, faire attaquer un adversaire par un **tiers réel** (guerre par procuration).
- Quitter une alliance, changer de camp, en rejoindre une autre dans les délais du serveur (7 jours de présence, exposition maintenue jusqu'à la fin de la guerre).
- Monter lentement ou rester sous un seuil de ligue par choix de jeu.

**Preuves.** Séquence au journal prouvant l'artifice (horodatages, transferts, comptes liés), répétition ou avantage mesurable.

**Détection.** Activations atypiques de boucliers et du mode vacances, actions d'un compte en vacances, flux vers des comptes de ligue inférieure ; revue des plaintes. Le sandbagging se traite d'abord par conception (ligue déterminée par la puissance historique maximale, non par la puissance courante).

**Sanctions.** Premier cas sans gain notable : N1 et annulation. Avantage obtenu : N2 (participation à un classement ou à une récompense de guerre retirée) puis N3. Contournement organisé ou par un bug : N4.

---

### B8. Abus des récompenses et des events

**Définition.** Obtenir des récompenses (arrivée, event d'alliance, classement, Kaelite gagnée, packs) par des moyens artificiels : comptes jetables, contribution truquée à un objectif collectif. **Le parrainage relève désormais de B15.**

**Exemples.** Comptes créés pour récolter un cadeau d'arrivée ; plusieurs comptes qui contribuent au même event ; revente de codes de bienvenue.

**Légitime.** Alliance qui recrute activement ; contribution massive d'une vraie alliance.

**Preuves.** Comptes liés (B2), récompenses cumulées, absence d'activité réelle, schéma répétitif.

**Détection.** Comptes sans autre activité que la collecte, collectes chaînées par IP ou agent ; revue avant versement des récompenses de valeur.

**Sanctions.** Retrait des récompenses ; N1 la première fois ; N2-N3 si répété ; N4 pour une ferme de comptes organisée ; N5 seulement pour un réseau qui monétise (revente de codes, de Kaelite) ou la récidive après un N4. Une Kaelite gagnée indûment est d'abord reprise, avec N1-N2.

---

### B9. Harcèlement, propos haineux, contenus illicites

**Définition.** Tout comportement, dans le jeu (chat, noms de joueur, d'alliance, de cité, messages, descriptions), sur Discord ou sur les canaux officiels, qui vise à intimider, humilier, discriminer ou menacer **la personne réelle**, ou qui publie un contenu illicite. **L'attaque en jeu n'est jamais du harcèlement en soi.**

**Exemples.** Insultes répétées visant une personne ; propos racistes, sexistes, homophobes, validistes ; menaces, doxxing ; contenu sexuel explicite ; nom injurieux ; incitation au suicide ; contenu illégal (apologie du terrorisme, pédocriminalité).

**Légitime.**
- Jeu de rôle et langage de l'univers ; provocation, moquerie, fanfaronnade, noms d'alliance et titres agressifs, messages de victoire, intimidation **dans le personnage**, « tu es mort, quitte le serveur » comme réplique de guerre.
- Attaques répétées dans les plafonds du serveur, y compris le même joueur à chaque fenêtre autorisée en guerre.
- Vanne entre amis consentants, jurons non dirigés ; critique civile du jeu ou de l'équipe.
- La ligne : l'identité (origine, genre, orientation, handicap, religion), les proches, la vie réelle (travail, adresse, santé), les menaces hors du jeu. Au-delà, on sanctionne quel que soit le contexte de guerre.

**Ciblage hors guerre.** Il ne devient une infraction que combiné à un élément extérieur au jeu : insultes ou menaces visant la personne, suivi sur Discord ou en messages privés, après un refus explicite, contournement du plafond par des comptes tiers. Ciblage seul, même obstiné : N0 au plus, et question de conception.

**Signalements comme arme de guerre.** Aucun gel ni N2 sur un signalement venu d'un camp adverse sans preuve propre. Une rafale de signalements coordonnés et infondés est un cas de B9 : N0, puis N1 ; N2 (fonction « Signaler » retirée) seulement pour une campagne coordonnée.

**Preuves.** Capture ou journal intégral avec contexte (message précédent et suivant, identifiant ou lien vérifiable pour Discord), identité de l'auteur, plusieurs occurrences pour le harcèlement. Le signalement de la victime déclenche l'enquête, il ne suffit pas seul. Comportements sur Discord : sanctionnables en jeu seulement parce que les CGU visent expressément les canaux officiels.

**Détection.** Signalement en jeu (bouton « Signaler » obligatoire, DSA art. 16), modération Discord ; filtre de mots qui alerte sans sanctionner. Verrou serveur : débit du chat, nouveaux comptes muets quelques minutes.

**Sanctions.**
1. Menaces réelles hors jeu, doxxing, sollicitation d'un mineur, contenu illicite : **N5 d'emblée, P1**, et signalement aux autorités (ci-dessous).
2. Harcèlement ciblé persistant (au moins 3 occurrences, après un refus clair ou un N0), sans menace réelle : **[À arbitrer : C4]**. Position de la revue game master : N3 (7 jours), puis N4 en cas de reprise, le N1 jouant le rôle de mise en demeure. Version 1 : « N4-N5 sans passer par N1 ». À confirmer avec l'avocat : ce harcèlement relève-t-il de l'urgence qui dispense de mise en demeure ?
3. Propos haineux isolés : N2 (chat 7 jours), N1 s'ils sont ambigus.
4. Insultes dans le feu d'une guerre, sans identité, proches ni menace : N0, puis N1 à la troisième fois.
5. Propos isolé : N0-N1 et suppression. Nom injurieux : renommé d'office.

Les N2 de 24 à 72 h de chat décidés sur preuve intégrale évitent la plupart des escalades.

**Points juridiques.**
- **Signalement aux autorités : obligation.** Tout hébergeur qui a connaissance d'informations faisant soupçonner une infraction pénale présentant une menace pour la vie ou la sécurité d'une personne en informe promptement les autorités (DSA art. 18, *vérifié*) : menaces de mort crédibles, incitation au suicide visant une personne, pédocriminalité. Procédure écrite (qui alerte, par quel canal : police, gendarmerie, PHAROS) ; les preuves ne sont pas supprimées avant transmission.
- Suppression d'un message, renommage d'office : exposé des motifs, même bref (DSA art. 17).
- Victime mineure : traitement P1 et art. 18 du DSA.
- Jamais de rapport public nominatif (section 2.5).

---

### B10. Usurpation de l'équipe de Kalendrath ou d'un autre joueur

**Définition.** Se faire passer pour l'équipe, un modérateur, un développeur ou un autre joueur ; utiliser la marque Kalendrath de façon trompeuse (faux concours, fausses boutiques, faux serveurs).

**Exemples.** Pseudo « Admin_Kalendrath » ; compensation promise contre un mot de passe ; faux Discord officiel ; faux Patreon.

**Légitime.** Parodie manifeste sans intention trompeuse ; contenu de fan avec mention claire de non-officialité ; homonymie fortuite.

**Preuves.** Capture du message ou du pseudo avec contexte, élément montrant l'intention trompeuse ou la confusion.

**Détection.** Signalements ; termes réservés bloqués à la création des noms (Admin, Modo, Staff, Kalendrath, Équipe et équivalents).

**Sanctions.** Pseudo trompeur sans escroquerie : renommage et N1. Usurpation d'un autre joueur : N2 puis N3. Usage pour obtenir des identifiants ou de l'argent : N5, et plainte si dommage. Pas de rapport public nominatif (section 2.5).

---

### B11. Fraude de paiement

**Définition.** Obtenir de la Kaelite ou des avantages payants sans payer, ou en annulant le paiement de mauvaise foi : carte volée ou utilisée sans accord, rétrofacturation obtenue en prétendant faussement ne pas avoir fait l'achat, exploitation d'une faille de la boutique, revente de Kaelite obtenue frauduleusement. **Exercer son droit de rétractation n'est jamais une fraude** : le risque se traite dans le parcours d'achat (renonciation expresse confirmée sur support durable, Code de la consommation, art. L221-28, 13°, *vérifié* ; fonction de rétractation en ligne obligatoire depuis le 19 juin 2026, *probable*), pas par la sanction.

**Exemples.** Achat par carte volée puis revente ; rétrofacturation abusive après dépense ; code promotionnel détourné ; requête modifiée pour payer moins cher.

**Légitime.** Achat d'un mineur à l'insu d'un parent (annulation à la demande du parent, Code civil art. 1148 : remboursement, jamais sanction) ; erreur d'achat ; rétrofacturation justifiée (double débit, service non reçu, paiement non autorisé, Code monétaire et financier art. L133-18) ; litige de bonne foi (contact d'abord).

**Preuves.** Notification du prestataire de paiement, journal de la transaction, utilisation de la Kaelite après l'achat, issue du litige bancaire.

**Détection.** Alertes du prestataire, anomalies de volume ou de montant, rétrofacturation reçue ; revue des ventes.

**Sanctions.**
- Rétrofacturation reçue : gel de la seule Kaelite issue du paiement contesté jusqu'à l'issue du litige (CGV 13.3) ; motivé dès son application ; levée ou sanction après revue humaine.
- Erreur de bonne foi : aucune sanction, régularisation.
- Mauvaise foi établie (litige perdu par le joueur, aveu, achat manifestement fait par lui) ou carte volée : **N5** sans passer par N1, retrait de la Kaelite frauduleuse, signalement au prestataire, plainte possible. La Kaelite achetée régulièrement et non dépensée est perdue, sans remboursement discrétionnaire (section 4).
- Revente de Kaelite frauduleuse : N5 pour chaque participant dont la connaissance de la fraude est établie.
- Pas de « liste noire » générale de fraudeurs : dossier du cas et listes du prestataire seulement (RGPD art. 10, loi Informatique et libertés art. 46). **[Avocat]** Pas de rapport public nominatif.

---

### B12. Abus de l'API et des extensions

**Définition.** Utiliser la clé d'extension ou l'API contrairement aux règles : partage ou vente de la clé, dépassement délibéré des limites de débit, collecte massive de données de joueurs non publiques, contournement de la liste blanche, tentative de faire agir une extension, extension qui contient une action cachée.

**Exemples.** Clé vendue ou publiée ; scraper qui aspire les données de tous les joueurs ; extension qui envoie des actions en se faisant passer pour la session ; clé utilisée pour surveiller un joueur précis.

**Légitime.** Extension de lecture dans les limites ; données de ses alliés avec leur accord ; auteur d'une extension conforme dont d'autres font un mauvais usage ; **tracker de flottes ou d'alliances ennemies** construit à partir de ce que le jeu montre légitimement (rapports d'espionnage, carte) : acte de guerre, pas infraction.

**Preuves.** Journal d'appels par clé, requêtes refusées sur des routes d'action, publication de l'outil.

**Détection.** Journal d'appels, limites de débit, refus sur routes fermées (tests Pest). Le blocage automatique de la clé au dépassement est une mesure légère et réversible, automatisable avec un message qui l'explique.

**Sanctions.** Dépassement accidentel : blocage de la clé et message, sans sanction. Dépassement ponctuel délibéré, collecte massive de données publiques sans nuisance : blocage, N1, N2 en cas de reprise. Répétition ou usage détourné : révocation, N2 (API retirée), puis N3. Collecte de données non publiques, vente de clé, tentative d'action : N4. Auteur d'une extension piégée : N5.

**Points juridiques.** Un tiers qui collecte massivement des données de joueurs devient responsable de traitement ; Kalendrath limite ce que l'API expose (RGPD art. 25 et 32) et le dit dans les conditions de l'API (D9).

---

### B13. Atteinte à la sécurité et au service

**Définition.** Toute tentative d'accéder à ce qui n'est pas ouvert : piratage de compte, hameçonnage, test d'intrusion non autorisé, déni de service, injection, exploitation d'une faille de sécurité, spam massif, rupture volontaire du service.

**Exemples.** Hameçonnage de mots de passe ; force brute ; tests de charge non sollicités ; exploitation d'une faille d'authentification ; envoi massif de messages. **Hameçonnage ou vol de mot de passe entre alliances adverses** : ce n'est pas de la diplomatie, c'est B13.

**Légitime.** Chercheur de bonne foi qui signale sans exploiter ni publier (CGU article 12, D8) ; oubli d'accès involontaire ; pic d'activité humain.

**Preuves.** Journaux de sécurité, signature des requêtes, adresses et comptes concernés, plainte de la victime.

**Détection.** Limitation des tentatives de connexion, alertes sur volumes et motifs d'attaque ; enquête sur incident.

**Sanctions.** Joueur curieux qui teste une faille sur son propre compte sans dommage ni publication, ou test de charge sans intention de nuire : N2-N3 et invitation à signaler. Vol de comptes, hameçonnage, publication ou vente d'une faille, déni de service volontaire : **N5 d'emblée**, plainte si dommage (Code pénal, art. 323-1 et 323-2). Spam léger : N1-N2. Victime d'un piratage : aucune sanction, restauration du compte.

**Points juridiques.** Un piratage qui expose des données de joueurs peut être une violation de données à notifier à la CNIL sous 72 h (RGPD art. 33) et, si le risque est élevé, aux joueurs (art. 34) : voir la [procédure 08](legal/08-procedure-droits-et-violations.md). Pas de rapport public nominatif.

---

### B14. Contournement d'une sanction

**Définition.** Se reconnecter ou recréer un compte pour échapper à une restriction, une suspension ou un bannissement ; faire jouer un tiers à sa place pendant la sanction ; masquer son identité pour la contourner.

**Exemples.** Nouveau compte après un N4 sur le même serveur ; prêt de session pendant un N3 ; changement de pseudo après un N2 pour continuer à parler.

**Légitime.** Nouvel arrivant légitime du même foyer (à vérifier, B2) ; joueur banni N4 qui joue sur un autre serveur ; connexion pendant un appel si la sanction est suspendue.

**Preuves.** Agent, IP et adresse communs, comportement identique, lien de paiement, aveu.

**Détection.** Correspondance avec la table `bans` : elle **alerte**, elle ne refuse ni ne ferme seule un nouveau compte (décision automatisée à effet significatif, RGPD art. 22, arrêt SCHUFA) ; revue humaine avant toute fermeture. Données conservées pour la détection : identifiant du lobby, adresse électronique hachée, jeton du moyen de paiement, **3 ans renouvelables une fois** après réexamen motivé (registre T5), mentionnées dans la politique de confidentialité et l'AIPD.

**Sanctions.** N2 ou N3 contourné : durée doublée. Contournement caractérisé d'un N4, ou récidive délibérée : N5. Après un N5 : fermeture de tous les comptes **dont il est établi qu'ils sont tenus par le joueur banni** (un compte lié par l'IP ou le foyer ne l'est pas à lui seul).

---

### B15. Fraude au parrainage **[Décision 2026-10-31]**

**Contexte.** Les récompenses du parrain sont liées à la **progression du filleul** (paliers atteints, durée d'activité réelle), et non à la seule inscription. Ce choix de conception (principe 1) rend les inscriptions poubelles inutiles tant que le filleul ne joue pas ; la fraude consiste donc surtout à faire progresser de faux filleuls. Paliers, nature des récompenses et plafonds : D22. **[TBD]**

**Définition.** Obtenir des récompenses de parrainage par des filleuls qui ne sont pas des personnes réelles jouant pour elles-mêmes : inscriptions poubelles (comptes créés en masse, adresses jetables ou adresses de tiers utilisées sans leur accord), filleuls joués par le parrain lui-même (second compte du lobby, B2), filleuls rémunérés ou achetés pour atteindre les paliers, échange de filleuls arrangé entre parrains, automatisation de l'inscription ou de la progression (B1).

**Exemples.** Dix comptes créés avec des adresses jetables, puis montés au premier palier par le parrain ; filleul joué en alternance avec son propre compte ; parrainages vendus sur un forum ou un Discord (« je vous parraine contre 2 € ») ; inscriptions achetées à une ferme de clics ; adresse d'un collègue inscrite sans son accord.

**Légitime.**
- Parrainer un ami, un proche, un membre de sa famille qui joue sur son propre compte, même depuis le même foyer (déclaration D1).
- Diffuser son lien de parrainage sur ses réseaux, sa chaîne de vidéo ou son stream, ou dans une alliance qui recrute : légitime, même à grande échelle. Le spam (messages non sollicités en masse, dans le jeu ou sur d'autres communautés) relève de B13 (spam) ou des règles de la plateforme concernée.
- Aider son filleul à progresser par l'entraide prévue par le jeu, sous les plafonds (B3).
- Filleul qui abandonne après un palier : rien à reprocher au parrain.

**Preuves.** Filleuls liés au parrain (agent, IP hors foyer déclaré, sessions qui ne se chevauchent jamais avec le parrain, même jeton de paiement), adresses jetables ou en série, progression mécanique jusqu'au palier puis abandon, nombre anormal de filleuls, annonce de vente, plainte d'une personne inscrite à son insu.

**Détection.** Vérification de l'adresse électronique (double opt-in) à l'inscription ; récompense de valeur versée après une revue humaine rapide au-delà d'un certain nombre de filleuls ; **retenue** de la récompense en attente d'examen quand le filleul partage des indices avec le parrain (mesure conservatoire : brève, motivée, revue humaine avant tout refus, principe 2) ; plafond de filleuls récompensés par période.

**Sanctions.**
- Toujours : retrait des récompenses de parrainage indues (mesure annexe) ; fermeture des comptes poubelles qui ne correspondent à aucune personne réelle ; la Kaelite achetée d'un compte filleul tenu par le parrain est transférée ou remboursée (section 4).
- Premier cas, petite échelle : N1.
- Répétition, ou filleuls joués par le parrain (multicompte du lobby) : N2 (parrainage retiré) puis N3.
- Organisation à grande échelle (dizaines de comptes, scripts d'inscription) : N4.
- Réseau qui monétise (vente ou achat de parrainages, ferme d'inscriptions payée) ou récidive après un N4 : N5 (P2).
- Filleul réel complice (payé pour s'inscrire) : N0-N1 et retrait de ses propres récompenses d'arrivée.
- Personne inscrite à son insu : aucune sanction ; son adresse est effacée.

**Points juridiques.** Inscrire l'adresse d'un tiers sans son accord est une collecte illicite de données dont le parrain est responsable ; Kalendrath efface l'adresse et ne la réutilise pas. Le programme de parrainage n'a pas encore de fiche au registre des traitements (MI-17 de la revue des documents légaux) : à ajouter, avec les données utilisées pour la détection. Les CGU (article 7.8) et le texte du programme décrivent les conditions de versement des récompenses avant son ouverture.

## 6. Règles du jeu : version joueurs (FR)

*Texte destiné à la vitrine, au lobby et à l'annexe des CGU. Vouvoiement, ton sobre. Provisoire : à relire par un avocat, et à régénérer dans l'annexe des CGU une fois validé. Les noms de la bannière, des boucliers et des trêves attendent R16 de l'étude PvP.*

### Règles du jeu de Kalendrath

Kalendrath se joue à plusieurs et ne vaut que si chacun joue à armes égales. Ces règles tiennent en quelques lignes ; les cas plus subtils sont détaillés dans nos conditions d'utilisation.

**Ce que nous attendons de vous**

1. **Jouez vous-même.** Chaque action de jeu (construire, recruter, envoyer une armée ou un héros, répondre à une attaque) est faite par vous, par un clic ou une commande. Les programmes, scripts et macros qui jouent à votre place sont interdits. Les outils qui se contentent d'afficher, de calculer ou de vous rappeler quelque chose sont les bienvenus ; ils utilisent une clé d'extension que vous créez vous-même, et qui ne peut jamais agir à votre place.
2. **Un compte, un personnage par serveur.** Vous avez un seul compte Kalendrath, et un personnage sur chaque serveur où vous jouez. Si plusieurs personnes jouent depuis le même foyer, déclarez-le à l'équipe.
3. **Pas de transferts déguisés.** N'envoyez pas de ressources à un compte pour lui faire gagner du temps sans contrepartie réelle ; ne perdez pas un combat à dessein au profit d'un autre de vos comptes ou d'un complice. L'entraide d'alliance prévue par le jeu, la retraite, la reddition et le sacrifice tactique sont permis.
4. **Votre compte est le vôtre.** Ne le vendez pas, ne l'achetez pas, ne le partagez pas. Une garde ponctuelle par un proche, de bonne foi, est tolérée : prévenez-nous.
5. **Pas d'argent contre du jeu, hors boutique.** Ne vendez ni n'achetez de ressources, d'objets, de héros, de comptes, de services de jeu, de parrainages ou de Kaelite contre de l'argent réel en dehors de la boutique officielle.
6. **Signalez les bugs.** Si vous découvrez une faille ou une erreur à votre avantage, signalez-la. L'exploiter sans la signaler, ou la répandre, est sanctionné. Les joueurs qui signalent sont remerciés.
7. **Respectez les protections.** La paix par défaut, la bannière d'alliance, les boucliers, les trêves, le mode vacances et les ligues ont leurs règles, que le serveur applique. Le mode vacances reste possible en guerre : 48 heures au moins, sans enchaînement, avec 72 heures d'attente avant de le réactiver. Ne détournez aucune de ces protections, ni par un autre compte, ni par un bug.
8. **Pas d'abus des récompenses ni du parrainage.** Une récompense d'arrivée, d'event ou de parrainage est pour une personne réelle qui joue réellement. Parrainez de vrais joueurs : les récompenses du parrain viennent de la progression de son filleul, et les inscriptions fictives ou achetées sont sanctionnées.
9. **Soyez courtois.** Pas d'insultes répétées, de harcèlement, de menaces, de propos haineux ou de contenus illégaux. Le roleplay et l'esprit de guerre sont bienvenus ; viser une personne ne l'est pas.
10. **Ne vous faites pas passer pour l'équipe**, ni pour un autre joueur.
11. **Payez honnêtement.** Les achats frauduleux et les rétrofacturations abusives mènent à la fermeture du compte et peuvent donner lieu à des poursuites.
12. **Respectez la sécurité du jeu.** Ne tentez pas d'accéder à ce qui n'est pas ouvert. Si vous trouvez une faille de sécurité, écrivez-nous plutôt que de l'utiliser.
13. **Une sanction se respecte.** Recréer un compte pour la contourner l'aggrave.

**Ce que le jeu permet, et que nous ne sanctionnons pas**

Kalendrath est un jeu de guerre. Attaquer, piller, farmer un joueur plus faible dans les limites du serveur, coordonner une alliance, intimider « en personnage », provoquer, signer un pacte et le rompre, mentir en diplomatie, espionner par un autre joueur, vous mettre en mode vacances au moment qui vous arrange : tout cela fait partie du jeu. Nous ne sanctionnons pas ce que le serveur autorise. Notre limite est la personne réelle (insultes sur l'identité, menaces, divulgation de sa vie privée), la triche, la fraude et l'atteinte au service.

**Ce qui se passe en cas de manquement**

Nous allons du rappel à l'avertissement, puis à la restriction temporaire (chat, envois, achats), à la suspension, au bannissement d'un serveur, et en dernier recours au bannissement du compte. Un manquement grave (fraude, atteinte à la sécurité, menaces, divulgation d'informations personnelles, contenus illégaux) peut être sanctionné d'emblée. Toute sanction vous est notifiée avec ses motifs.

Pour repérer la triche, nous analysons l'activité des comptes (connexions, rythme des actions, échanges entre comptes), en partie avec des outils automatiques. Ces outils peuvent signaler un compte ; ils ne décident jamais seuls d'une sanction : une personne de l'équipe examine chaque dossier, et vous pouvez toujours donner votre version. La notification vous dit si un outil automatique a servi. Le détail figure dans notre politique de confidentialité.

**Votre Kaelite.** Une suspension gèle votre Kaelite sans la réduire. Un bannissement d'un serveur vous fait perdre la Kaelite gagnée sur ce serveur, pas la Kaelite achetée. **Un bannissement définitif du compte, dernier niveau de l'échelle, vous fait perdre toute votre Kaelite, y compris la Kaelite achetée et non dépensée, qui n'est pas remboursée**, sauf décision contraire de notre part hors cas de fraude. Le détail figure dans nos conditions de vente.

**Rapports publics.** Pour que chacun sache que les règles sont appliquées, nous publions des rapports d'enquête, en général anonymes. Pour certaines triches graves (bannissement d'un serveur ou du compte, faits établis, décision définitive), le rapport peut citer votre pseudonyme en jeu, jamais votre nom, pendant 6 mois au plus, sur une page réservée aux joueurs. Vous en êtes prévenu à l'avance et pouvez vous y opposer. Les joueurs mineurs ne sont jamais cités.

**Vous contestez une décision ?**

Vous avez 14 jours pour faire appel, par le formulaire du lobby ou à l'adresse indiquée dans la notification ; passé ce délai, vous pouvez encore nous adresser une réclamation pendant 6 mois. Une personne, jamais un outil automatique, examine votre appel. Nous répondons par écrit, avec nos motifs, en général sous 10 jours ouvrés. Si nous avons eu tort, nous annulons la sanction, rétablissons ce qui a été retiré et retirons tout rapport public. Dans tous les cas, vous gardez le droit de saisir gratuitement le médiateur de la consommation [coordonnées à venir] ou les tribunaux. Si vous êtes mineur, l'un de vos parents peut faire appel en votre nom.

**Un doute ?** Écrivez-nous avant d'agir. Nous préférons répondre à une question que sanctionner une erreur.

## 7. Game rules: player version (EN)

*Text for the showcase site, the lobby and the appendix to the Terms of Use. Formal and sober tone. Draft, to be reviewed by a lawyer. Names of the banner, shields and truces pending R16 of the PvP study.*

### Kalendrath: rules of the game

Kalendrath is played together, and only works when everyone plays on equal terms. These rules fit in a few lines; finer points are set out in our Terms of Use.

**What we expect of you**

1. **Play yourself.** Every game action (building, recruiting, sending an army or a hero, answering an attack) is performed by you, with a click or a command. Programs, scripts and macros that play for you are forbidden. Tools that only display, calculate or remind you of something are welcome; they use an extension key that you create yourself, and that can never act on your behalf.
2. **One account, one character per server.** You have a single Kalendrath account, and one character on each server you play on. If several people play from the same household, please tell the team.
3. **No disguised transfers.** Do not send resources to an account to save it time without a real return; do not lose a fight on purpose to benefit another of your accounts or an accomplice. Alliance mutual aid provided by the game, retreat, surrender and tactical sacrifice are allowed.
4. **Your account is yours.** Do not sell it, buy it or share it. Occasional, good-faith care of your account by someone close to you is tolerated: let us know.
5. **No real money for game goods outside the shop.** Do not sell or buy resources, items, heroes, accounts, game services, referrals or Kaelite for real money outside the official shop.
6. **Report bugs.** If you find a flaw or an error in your favour, report it. Exploiting it without reporting it, or spreading it, is sanctioned. Players who report are thanked.
7. **Respect the protections.** Default peace, the alliance banner, shields, truces, vacation mode and leagues have their own rules, enforced by the server. Vacation mode remains available during a war: at least 48 hours, no back-to-back use, and a 72-hour wait before it can be turned on again. Do not misuse any of these protections, whether through another account or a bug.
8. **No abuse of rewards or referrals.** A welcome, event or referral reward is for a real person who really plays. Refer real players: a referrer's rewards come from their referral's progress, and fake or bought sign-ups are sanctioned.
9. **Be civil.** No repeated insults, harassment, threats, hateful remarks or illegal content. Roleplay and the spirit of war are welcome; targeting a person is not.
10. **Do not impersonate the team**, or another player.
11. **Pay honestly.** Fraudulent purchases and abusive chargebacks lead to account closure and may be pursued.
12. **Respect the game's security.** Do not try to reach what is not open. If you find a security flaw, write to us rather than use it.
13. **A sanction must be respected.** Creating a new account to avoid it makes it worse.

**What the game allows, and what we do not sanction**

Kalendrath is a war game. Attacking, raiding, farming a weaker player within the server's limits, coordinating an alliance, intimidating in character, taunting, signing a pact and breaking it, lying in diplomacy, spying through another player, going on vacation mode whenever it suits you: all of this is part of the game. We do not sanction what the server allows. Our limit is the real person (insults about identity, threats, exposing private life), cheating, fraud and harm to the service.

**What happens in case of a breach**

We go from a reminder to a warning, then to a temporary restriction (chat, transfers, purchases), a suspension, a ban from a server, and as a last resort a ban of the account. A serious breach (fraud, security breach, threats, exposing personal information, illegal content) may be sanctioned immediately. Every sanction is notified to you with its reasons.

To detect cheating, we analyse account activity (logins, pace of actions, exchanges between accounts), partly with automated tools. These tools may flag an account; they never decide a sanction on their own: a member of the team reviews every case, and you can always give your side of the story. The notification tells you whether an automated tool was used. Details are in our privacy policy.

**Your Kaelite.** A suspension freezes your Kaelite without reducing it. A ban from a server makes you lose the Kaelite earned on that server, not purchased Kaelite. **A permanent ban of your account, the last level of the scale, makes you lose all your Kaelite, including purchased Kaelite you have not spent, which is not refunded**, unless we decide otherwise outside cases of fraud. Details are in our terms of sale.

**Public reports.** So that everyone knows the rules are enforced, we publish investigation reports, usually anonymous. For some serious cheating (ban from a server or of the account, established facts, final decision), a report may name your in-game username, never your real name, for 6 months at most, on a page reserved for players. You are told in advance and may object. Minors are never named.

**Do you disagree with a decision?**

You have 14 days to appeal, through the lobby form or at the address given in the notification; after that, you may still send us a complaint for 6 months. A person, never an automated tool, reviews your appeal. We reply in writing, with our reasons, usually within 10 working days. If we were wrong, we cancel the sanction, restore what was removed and withdraw any public report. In every case, you keep the right to refer the matter, free of charge, to the consumer mediator [details to come] or to the courts. If you are a minor, one of your parents may appeal on your behalf.

**In doubt?** Write to us before acting. We would rather answer a question than sanction a mistake.

## 8. Points à arbitrer par Gregory (C1 à C5)

Rien n'est tranché ici ; la version 2 présente les deux positions là où elles s'appliquent.

| Code | Sujet | Position de la revue juridique / version 1 | Position de la revue game master | Recommandation de la revue générale | Où dans le document |
|---|---|---|---|---|---|
| C1 | Vendeur d'un compte, premier cas | N5 d'emblée | N4 ; N5 pour revendeur, intermédiaire, récidive | N4 premier cas | B4, principe 9 (a) |
| C2 | Formalisme (dossier figé, exposé des motifs complet, revue humaine tracée) pour un modérateur unique | Exigences non négociables | Les garder, en réduire le coût (modèles, tri P1-P3, faisceau réservé au N3+) | Garder, réduire le coût | Principe 10, section 2.1 (fiche courte et dossier complet, proposition compatible avec les deux positions) |
| C3 | Kaelite achetée des bannis pour bot ou RMT | Remboursement hors fraude de paiement | Dissuasion amoindrie ; compenser un préjudice prouvé | Accepter le remboursement, compensation pour le RMT organisé | **Question modifiée par la décision du 2026-10-31** : il n'y a plus de remboursement au N5, sauf geste discrétionnaire hors fraude (section 4). Reste à arbitrer : le geste discrétionnaire (D23) peut-il bénéficier à un banni pour bot ou RMT ? |
| C4 | Harcèlement persistant sans menace | Pas de saut de niveau sauf urgence ; à confirmer avec l'avocat | N3 puis N4 | N3 puis N4, saut direct réservé aux menaces, doxxing, mineurs, contenus illicites | B9, sanction 2 |
| C5 | Rétroactivité des ajouts | Faits antérieurs appréciés au regard des règles alors en vigueur | Pas de conflit | Rien à trancher, à garder en tête | Principe 5 ; vaut aussi pour B15, le mode vacances, les rapports publics et la perte de la Kaelite au N5 |

## 9. Décisions ouvertes

Les propositions sont de Claude ; rien n'est acté tant que Gregory n'a pas tranché, sauf mention « Close ».

| # | Décision | Proposition ou statut |
|---|---|---|
| D1 | **Foyer partagé** : régime de comptes liés déclarés | Déclaration par formulaire, comptes marqués dans le panneau, transferts et attaques entre eux bloqués par le serveur ; collecte du seul lien entre comptes. |
| D2 | **Seuils chiffrés du push** | À fixer avec le simulateur et le plafond de transferts, après les premières données de l'alpha fermée. |
| D3 | **Sitting** | Déclaration en un clic, 7 jours consécutifs au plus, pas d'envoi de flotte vers un tiers ni d'achat ; en guerre, pas de déclaration ou de rupture de pacte ni de reddition sans accord du titulaire ; le sitter n'active ni ne lève le mode vacances. Sitting ponctuel non déclaré : pas de N1. |
| D4 | **Kaelite achetée en cas de N5** | **Close [Décision 2026-10-31]** : perdue et non remboursée au niveau final, avec avertissements préalables documentés, clause claire dès l'achat et remboursement discrétionnaire hors fraude (section 4). Risque de clause abusive noté ; **[Avocat]**. |
| D5 | **Délais d'appel, second relecteur** | « En général 10 jours ouvrés », sans garantie contractuelle. Second relecteur avant d'atteindre ~15 sanctions N2+ par semaine sur un serveur, pas à date fixe. |
| D6 | **Gel conservatoire** | 7 jours au plus, renouvelable une fois sur motif écrit (CGU 9.3) ; motivé dès son application ; levé ou converti en sanction après revue humaine ; jamais sur le seul signalement d'un camp adverse. |
| D7 | **Suspension (N3) pendant une guerre** | Réécrite pour la bannière : pendant un N3, le compte est **protégé comme sous bouclier**, ne rapporte ni ne coûte aucun point de guerre, n'est pas compté dans le contrôle de tranche ; sa production continue. Il ne compte pas comme mode vacances (les verrous de 48 h et 72 h ne s'appliquent pas). À valider avec l'étude PvP. |
| D8 | **Programme de signalement** | Barème simple : titre pour un bug mineur, Kaelite gagnée sur le serveur choisi pour une faille importante ; page de divulgation responsable (CGU article 12). |
| D9 | **Données collectées par une extension** | Conditions de l'API : collecte limitée aux données publiques du classement ; l'auteur est responsable de traitement ; l'API n'expose pas plus (RGPD art. 25). |
| D10 | **Mineurs** | Âge minimum à trancher (13 ans avec accord parental avant 15 ans, recommandé par la revue générale ; 16 ans par prudence en version 1), à réexaminer à l'adoption de l'EU KIDS Act. Sanction d'un mineur : langage simple, parent informé pour N4-N5 et paiements, appel par le parent ; jamais de rapport public. |
| D11 | **Conservation** | Alignée sur le registre : journaux de jeu et de connexion 12 mois glissants (LCEN, décret 2021-1362, *probable*) ; signalements sans suite 6 mois ; dossiers d'enquête 3 ans après la fin de la sanction, ou après la décision définitive pour un bannissement ; anti-contournement 3 ans renouvelables une fois ; rapports publics nominatifs 6 mois au plus (D20) ; factures 10 ans. **[Avocat]** pour les durées exactes. |
| D12 | **Qui modère** | Gregory seul au départ ; modérateurs de la communauté dès la bêta, droits N0-N2 et signalement, N3-N5 réservés à Gregory ; aucun accès aux paiements ; jamais un dossier d'un joueur de son alliance ou d'une alliance en guerre avec la sienne ; préférer des modérateurs sans alliance de premier plan ; journal consultable de leurs actions ; engagement de confidentialité écrit, accès minimal (RGPD art. 29 et 32). Statut de bénévole : **[Avocat]**. |
| D13 | **Infiltration, espionnage, vol d'alliance** | Espionnage par un tiers réel : autorisé. Vol permis par les droits d'alliance (trésorier qui part avec le dépôt) : légitime si la fonction existe et s'affiche à la création de l'alliance. Exclus : second compte (B2), hameçonnage (B13), RMT (B5), harcèlement hors jeu (B9). |
| D14 | **Mode de Guerre** | **Close** : guerre d'alliances par bannière, tous les membres attaquables, pas d'interrupteur individuel (étude PvP, 2026-10-30). B2, B3, B7 et l'échelle N2 sont réécrits en ce sens. Pas de comportement « fausse déclaration de guerre » : une déclaration trompeuse est de la diplomatie ; seuls les abus techniques du casus belli (griefs fabriqués par des comptes multiples) relèvent de B2, B3 ou B7. |
| D15 | **Détection du rythme non humain** | À cadrer en Phase 3b avec les limites de débit ; le contrôle ne bloque jamais un joueur de bonne foi sans issue ; attention aux biais (joueurs handicapés aux rythmes atypiques). |
| D16 | **Publication des règles** | Publier la version joueurs, l'échelle N0-N5, la procédure d'appel, l'usage d'outils automatiques et la revue humaine (DSA art. 14, § 1, *vérifié*) ; garder internes les seuils et méthodes de détection. |
| D17 | **Statistiques publiques** | Rapport trimestriel à partir de la bêta : sanctions par niveau et par famille, nombre de N0, appels, taux d'annulation ; chiffres agrégés seulement. Complète les rapports d'enquête anonymisés. |
| D18 | **Modération par bot ou IA** | L'outil signale, l'humain décide au-delà du N0 et des mesures techniques réversibles ; usage décrit dans les CGU et signalé dans chaque exposé des motifs ; fournisseur d'IA = sous-traitant (RGPD art. 28), sans réutilisation pour l'entraînement ; un bot qui converse se déclare comme IA (règlement IA art. 50, § 1, *probable*) ; aucune IA ne rédige seule un rapport public. Préalable : mise à jour de la politique de confidentialité, qui exclut aujourd'hui tout envoi à une IA. |
| D19 | **Documents RGPD avant l'alpha fermée** | Fiche « modération et lutte contre la triche » (T4, T5), mise en balance de l'intérêt légitime (y compris pour les rapports publics), AIPD simple, paragraphe de la politique de confidentialité, procédure de violation de données, fiche du parrainage. |
| D20 | **Rapports d'enquête publics** (nouvelle) | Paramètres à confirmer : forme anonymisée par défaut ; comportements admis à la forme nominative (section 2.5) ; durée nominative 6 mois au plus ; publication après l'appel de 14 jours ou après les 6 mois de réclamation ; page réservée aux joueurs connectés, non indexée. **[Avocat]** |
| D21 | **Mode vacances en guerre** (nouvelle) | Décidé : autorisé, 48 h minimum, non enchaînable, 72 h d'attente après la levée. À fixer : activation possible avec une attaque en approche ou des flottes en vol (proposition : non, comme dans OGame) ; production et missions sortantes pendant le mode vacances ; durée maximale ; effet sur le score et le contrôle de tranche. À reporter dans l'étude PvP (R9) et le GDD 5.4. |
| D22 | **Programme de parrainage** (nouvelle) | Décidé : récompenses du parrain liées à la progression du filleul. À fixer : paliers (palier de cité, jours d'activité), nature des récompenses (titre, cosmétique, Kaelite gagnée), plafond de filleuls récompensés par période, revue humaine au-delà d'un seuil. À passer par le simulateur et le GDD. |
| D23 | **Remboursement discrétionnaire de la Kaelite** (nouvelle) | Critères internes proposés : N5 sans avertissement antérieur au dossier ; joueur mineur ; achats de moins de 14 jours ; montant élevé au regard du manquement ; jamais en cas de fraude de paiement. Appliqués de façon égale et tracés. Lien avec C3. |

## 10. À faire valider par un avocat

Liste consolidée (revue juridique des bannissements, revue des documents légaux et ajouts de la v2) :

1. **Rapports d'enquête publics** : les sept points de la section 2.6 (principe, liste des comportements, durée, moment de la publication, opposition, diffamation et droit de réponse, clause des CGU). **Nouveau.**
2. **Perte de la Kaelite achetée au N5** : validité de la clause au regard des art. L212-1 et R212-2, 3° du Code de la consommation, requalification en clause pénale (Code civil art. 1231-5), différence entre N5 d'emblée et N5 en fin d'échelle, rédaction de la clause et du message de commande (section 4). **Nouveau.**
3. Rédaction des CGU (règles, échelle, procédure, clause générale de loyauté, modification avec préavis) et des CGV (Kaelite à la fermeture, rétractation, rétrofacturation).
4. Empreintes d'appareil et détection de bots : consentement ou exemption.
5. Durées de conservation exactes (décret 2021-1362, LCEN après la loi SREN) et données d'infractions (RGPD art. 10, loi Informatique et libertés art. 46), y compris dans les dossiers d'enquête.
6. Médiateur de la consommation pour les litiges de sanction sur un compte gratuit.
7. Lecture des messages privés par les modérateurs.
8. Statut des modérateurs bénévoles.
9. Âge minimum et parcours parental (D10).
10. Harcèlement sans menace et mise en demeure (C4).
11. Programme de parrainage : conditions de versement, données de détection, adresses de tiers inscrites sans accord. **Nouveau.**

## 11. Répercussions sur les autres documents (non modifiés par cette version)

| Document | Ce qui doit changer |
|---|---|
| [CGV 15.4](legal/05-cgv-kaelite.md) (FR et EN) | Remplacer le remboursement de la Kaelite achetée au N5 (fraude et hors fraude) par la clause de la section 4 ; ajouter le message de l'écran de commande à l'article 8.1 |
| [CGU 9.5](legal/04-cgu.md) (FR et EN) | Même correction (« un bannissement du Compte … ouvre droit au remboursement » devient la perte, sauf geste discrétionnaire) ; ajouter à l'article 9 la publication des rapports d'enquête et le droit de s'y opposer ; règle de rappel de la conséquence Kaelite dans les notifications |
| CGU 7.7 et 7.8, annexe | Mode vacances en guerre ; parrainage lié à la progression ; régénérer l'annexe à partir des sections 6 et 7 |
| [README légal](legal/README.md), section 3 | Ligne « Bannissement N5 hors fraude » à mettre à jour ; ajouter les rapports publics aux points pour l'avocat |
| [Registre](legal/07-registre-des-traitements.md), T5 ; nouvelle fiche parrainage | Rapports publics (finalité, base légale, durée, destinataires = joueurs connectés) ; fiche du parrainage (MI-17) |
| [Politique de confidentialité](legal/02-politique-de-confidentialite.md), 2.5 | Rapports publics, droit d'opposition ; données du parrainage |
| [Étude PvP](etude-pvp.md), section bouclier et R9 ; [GDD](game-design-document.md) 5.4 | Le mode vacances n'est plus refusé en guerre : 48 h minimum, non enchaînable, 72 h d'attente (D21) |
| GDD (programme de parrainage) | Section à créer : récompenses liées à la progression du filleul (D22) |
| [Revue générale](revue-generale-2026-10-30.md), décisions 7 et 17 | IM-10 et C3 à relire à la lumière de la décision sur la Kaelite au N5 |

## Historique des versions

- **v1, 2026-10-30** : premier jet, puis annotations [Juridique] et [GM] et corrections [Revue]. Conservée dans [comportements-bannissables-v1.md](comportements-bannissables-v1.md).
- **v2, 2026-10-31** : annotations sans conflit intégrées au corps ; B2, B3, B7, l'échelle N2 et D7 réécrits pour la bannière ; D14 close ; index des codes ; nouvelle section 2 (enquêtes et rapports d'enquête, versions interne et publique) ; nouvelle section 4 (Kaelite et sanctions, perte de la Kaelite achetée au N5) ; nouvelle fiche B15 (fraude au parrainage) ; mode vacances en guerre dans B7 ; règles joueurs FR et EN mises à jour ; C1 à C5 laissés à l'arbitrage de Gregory ; nouvelles décisions ouvertes D20 à D23.
