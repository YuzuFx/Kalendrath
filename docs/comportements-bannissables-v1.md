# Comportements bannissables de Kalendrath

*Rédigé le 2026-10-30, à partir du premier jet de la section 9 du [plan marketing](plan-marketing.md). Document de travail, à valider par Gregory avant publication. Il alimentera les conditions d'utilisation (Phase 7) et la page « Règles du jeu » de la vitrine, en français et en anglais, avant l'alpha fermée.*

> **Ceci n'est pas un avis juridique.** Les CGU, la procédure de sanction et la conservation des journaux doivent être relues par un juriste avant publication (voir [cadre légal UE](references-jeux/cadre-legal-ue.md), notamment la motivation des sanctions, art. 17 du DSA, *texte connu, non relu*).
>
> **[Juridique]** Revue du 2026-10-30 (droit du numérique, de la consommation, RGPD) : synthèse, sources et degré de certitude dans [revue-juridique-bannissements.md](revue-juridique-bannissements.md). Les ajouts et corrections issus de cette revue sont marqués « [Juridique] » ci-dessous. L'art. 17 du DSA a été relu depuis (contenu confirmé, voir principe 4). Cette revue est faite par une IA : elle ne remplace pas la relecture d'un avocat, qui reste nécessaire avant publication des CGU.

Sources de cadrage : [plan marketing](plan-marketing.md) section 9, [GDD](game-design-document.md) (Mode de Guerre 5.4, bots PvE 5.8, alliance 5.9, Kaelite section 9), fiche [triche, multicomptes et bots](references-jeux/triche-multicomptes-bots.md).

## 0. Principes

1. **Le code d'abord, la sanction ensuite.** Ce qui peut être empêché côté serveur l'est (plafonds, limites de débit, transferts impossibles, clé d'extension en lecture seule). Une règle écrite ne remplace jamais un verrou. Les sanctions ne couvrent que ce que le verrou ne peut pas empêcher.
2. **Un faux positif coûte plus cher qu'un tricheur toléré une semaine.** Aucune sanction au-dessus de l'avertissement ne repose sur un seul signal automatique : il faut une revue humaine (Gregory ou modérateur désigné) d'un faisceau de preuves.
   - **[Juridique] Décision automatisée (RGPD art. 22).** Le principe tient, mais il doit couvrir **toute** mesure qui produit un effet significatif sur le joueur, pas seulement les sanctions N2 à N5 : gel conservatoire, gel du portefeuille (B11), refus ou fermeture automatique d'un nouveau compte rapproché de la table `bans` (B14), blocage d'achat. Depuis l'arrêt SCHUFA (CJUE, 7 décembre 2023, C-634/21), un score automatique qui « guide de manière déterminante » la décision humaine peut lui-même être une décision automatisée : la revue humaine doit donc être **réelle** (la personne examine les éléments, peut s'écarter du score, et le fait de temps en temps) et **tracée** (qui a revu, quoi, quand). Une validation de principe d'une alerte ne suffit pas. Les mesures mineures et immédiatement réversibles (défi de vérification, blocage de clé au dépassement de débit) restent automatisables.
3. **Proportion et gradation.** On n'applique pas l'échelle mécaniquement : la gravité, l'intention, l'ancienneté du compte, les récidives et le préjudice aux autres joueurs entrent en compte. Les infractions marquées « grave » peuvent sauter des niveaux.
   - **[Juridique]** La proportionnalité est une obligation, pas seulement une valeur : le DSA impose d'appliquer les restrictions « de manière diligente, objective et proportionnée » (art. 14, § 4, *vérifié*). Côté contrat, un bannissement définitif est une **résolution unilatérale pour inexécution** (Code civil, art. 1224 à 1226) : elle suppose une inexécution « suffisamment grave », une mise en demeure préalable **sauf urgence**, et une notification motivée ; en cas de contestation, c'est à Kalendrath de prouver la gravité du manquement (*texte connu, recoupé par une source secondaire*). L'avertissement N1 joue en pratique le rôle de mise en demeure : c'est une raison juridique de ne sauter des niveaux que pour les cas réellement urgents ou graves (fraude, sécurité, harcèlement, menaces). Chaque sanction est **individuelle** : on ne sanctionne pas un compte pour la faute d'un autre (voir B3 et B14).
4. **Sanction motivée et appelable.** Tout joueur sanctionné reçoit le motif, la règle visée, la durée et la voie d'appel.
   - **[Juridique] Contenu minimal imposé par le DSA, art. 17 (*vérifié*).** Tout hébergeur (Kalendrath l'est dès qu'il stocke chat, pseudos, noms d'alliance ou descriptions) doit fournir un « exposé des motifs » au plus tard **au moment où la restriction s'applique**, pour toute suspension, restriction ou fermeture de compte ou de service. Il doit indiquer : (a) la mesure, sa portée et sa durée ; (b) les faits et circonstances, et si la décision fait suite à un signalement ou à une enquête interne ; (c) **si des moyens automatisés ont été utilisés** pour détecter ou décider ; (e) la clause des CGU visée et pourquoi le comportement y contrevient ; (f) les voies de recours (appel interne, médiateur de la consommation, tribunaux). L'information doit être claire et assez précise pour permettre de contester. Cela vaut aussi pour les **mesures conservatoires** (gel, gel du portefeuille). *Incertain* : l'art. 17 vise les décisions prises au motif que les « informations fournies » par le joueur sont illicites ou contraires aux CGU ; une sanction pour un comportement (bot, multicompte) n'est pas clairement couverte. Recommandation : appliquer le même format à toutes les sanctions, cela ne coûte rien et répond aussi à l'exigence de motivation de l'art. 1226 du Code civil.
5. **Les règles ne sont pas rétroactives.** Une règle ajoutée ou précisée ne s'applique qu'à partir de sa publication, ~~sauf fraude manifeste ou atteinte grave à autrui~~.
   - **[Juridique] Correction.** L'exception « sauf fraude manifeste ou atteinte grave à autrui » est supprimée : appliquer rétroactivement une clause nouvelle serait une modification unilatérale du contrat au détriment du joueur (Code de la consommation, art. R212-1, 3° pour les caractéristiques du service, et art. R212-2 pour les autres modifications, *vérifié via sources secondaires*). La fraude et l'atteinte à autrui restent sanctionnables **parce qu'elles sont déjà interdites** par la loi et par une clause générale des CGU (loyauté, respect d'autrui, interdiction de toute fraude) ; c'est cette clause générale, existante au moment des faits, qui doit être visée. Toute modification des règles est annoncée à l'avance (30 jours, comme dans les CGU 16.2 et les CGV 20 *[Revue : la proposition initiale de 15 jours contredisait les CGU]*, sauf mise en conformité légale ou sécurité), avec la faculté pour le joueur de résilier et, s'il y a lieu, d'obtenir le remboursement de sa Kaelite achetée non dépensée.
6. **Journal de modération.** Chaque décision est consignée (date, joueur, règle, preuves, niveau, décideur), de façon à garantir la cohérence entre cas semblables. S'appuie sur la table `bans` et le panneau d'administration d'OGameX (détection d'IP partagées, missions entre comptes liés, activité 24 h sur 24, réactions instantanées).
   - **[Juridique]** Le journal de modération, les journaux de jeu et les journaux de connexion sont des traitements de données personnelles : ils doivent figurer au registre (RGPD art. 30), avoir une durée de conservation **fixée** (voir D11, corrigée) et être cités dans la politique de confidentialité. Le journal consigne aussi **si un outil automatique ou une IA a contribué** à la détection, et la trace de la revue humaine (principe 2).
7. **[Juridique] Base légale, information et analyse d'impact.**
   - **Base légale** : la détection de triche et de fraude repose sur l'**intérêt légitime** (RGPD art. 6, § 1, f ; considérant 47, qui cite la prévention de la fraude, et 49, la sécurité des réseaux), pas sur l'exécution du contrat, que le CEPD réserve à ce qui est objectivement nécessaire au service (lignes directrices 2/2019, *texte connu, non relu*). Il faut rédiger une courte mise en balance (intérêt de Kalendrath et des autres joueurs, attentes raisonnables, garanties) et permettre l'exercice du droit d'opposition (art. 21), auquel on peut opposer des motifs impérieux. La conservation imposée par la LCEN (voir D11) repose, elle, sur l'obligation légale.
   - **Information** : la politique de confidentialité décrit les données de détection (IP, sessions, horodatages, rythme d'actions, transferts), le profilage anti-triche, les durées et les destinataires. Les CGU décrivent la modération, l'usage d'outils automatiques et la revue humaine (DSA art. 14, § 1, *vérifié*).
   - **Empreintes d'appareil** : une empreinte calculée dans le navigateur (*fingerprinting*) est un accès au terminal soumis à la règle des traceurs (directive ePrivacy art. 5, § 3 ; loi Informatique et libertés art. 82 ; lignes directrices 2/2023 du CEPD, *probable*). La CNIL considère que les traceurs de lutte contre la fraude **ne sont pas, en général, exemptés de consentement**, sauf ceux qui assurent la sécurité d'un mécanisme d'authentification, par exemple en limitant les tentatives d'accès robotisées (*vérifié*, FAQ cookies de la CNIL). En pratique : s'en tenir aux données reçues côté serveur (IP, agent, horodatages, comportement en jeu) et aux cookies de session ; toute empreinte d'appareil calculée en JavaScript passe par un avocat avant d'être codée (voir la revue).
   - **Analyse d'impact (AIPD)** : un profilage pouvant aboutir à l'exclusion du bénéfice d'un contrat figure dans la liste CNIL des traitements soumis à AIPD obligatoire (*vérifié*, délibération 2018-327) ; s'y ajoutent la présence probable de mineurs et la surveillance systématique de l'activité. Une AIPD simple est donc à rédiger avant l'alpha fermée.
8. **[GM] Le PvP en guerre d'alliances n'est jamais, en soi, un comportement bannissable.** Attaquer, piller, harceler **en jeu** (dans les limites que le serveur impose : 3 attaques par cible et par 24 h, boucliers, pas de destruction de bâtiments), farmer un inactif ou un plus faible, coordonner une alliance, mentir en diplomatie, trahir un pacte, espionner, intimider « en personnage » : tout cela est le jeu. Une règle de modération ne vise jamais un acte que le serveur autorise ; si cet acte pose problème, c'est une décision de conception, pas de sanction (principe 1). Les sanctions ne visent que ce qui sort du jeu : tricherie, fraude, atteinte à la personne réelle, atteinte au service. En cas de doute entre « rude » et « abusif », trancher en faveur du jeu : un serveur jeune a plus à perdre d'un joueur ou d'une alliance découragés que d'un comportement agressif mais légal.
9. **[GM] Dissuader sans vider le serveur.** Trois réglages valent pour toute l'échelle. (a) **Le N4 est la sanction définitive par défaut** ; le N5 (compte du lobby, tous serveurs) est réservé à la fraude de paiement, à l'atteinte à la sécurité, au RMT organisé, aux menaces ou doxxing, et à la récidive après un N4. (b) **Période de grâce** : pendant l'alpha et la bêta, et pour tout compte de moins de 7 jours, les cas ambigus ne dépassent pas le N1 (hors fraude, sécurité, menaces, contenus illicites) ; les règles se précisent encore et le joueur qui découvre le jeu ne doit pas être puni pour une règle qu'on n'a pas su lui expliquer. (c) **Le retrait des gains vient avant la sanction** : la plupart des abus (push, bug, parrainage) se règlent en reprenant l'avantage et en prévenant, ce qui dissuade presque autant et ne coûte pas un joueur.
10. **[GM] Faisabilité pour un modérateur unique.** Gregory ne peut pas tout traiter à la même vitesse. Tri par priorité, annoncé dans le journal : **P1** (sécurité, fraude de paiement, menaces, contenus illicites, mineur victime) : traitement sous 24 h, y compris le week-end ; **P2** (RMT, harcèlement, usurpation, vente de compte) : sous 72 h ; **P3** (bots, multicompte, push, bug, parrainage, API) : en lot hebdomadaire, sauf impact visible sur une guerre en cours. Conséquences : (a) les enquêtes de faible gravité (B3, B8, B6 mineur) se règlent par retrait des gains et N0-N1 sur un seul indice solide **sans** monter un faisceau de trois indices, ce faisceau étant réservé à N3 et plus ; (b) des modèles de notification et de réponse d'appel prêts à l'emploi, un par famille, pour que l'exposé des motifs (principe 4) ne coûte que quelques minutes ; (c) le détecteur sert à classer la file d'attente, pas à la remplir : seuils réglés pour ne produire que quelques alertes par jour au plus ; (d) **conflit d'intérêts** : un modérateur (Gregory compris) ne traite pas un dossier où il est partie, allié ou ennemi déclaré ; Gregory ne joue pas sur un serveur où il modère, ou son compte est déclaré et un tiers de confiance traite ce qui le touche. Voir aussi D12 et l'annotation [GM] de D5.

## 1. Échelle de sanctions (commune)

| Niveau | Sanction | Effet | Durée type |
|---|---|---|---|
| N0 | **Rappel informel** | Message de l'équipe, aucune trace disciplinaire | - |
| N1 | **Avertissement** | Notification motivée, inscrite au dossier | Dossier : 90 jours actifs |
| N2 | **Restriction temporaire** | Retrait ciblé d'une fonction : chat, envoi de ressources, accès à l'API/aux clés d'extension, achats, classement, Mode de Guerre | 24 h à 14 jours |
| N3 | **Suspension** | Compte inaccessible (production figée ou non : voir décision ouverte D7) | 3 à 30 jours |
| N4 | **Bannissement du serveur** | Compte supprimé sur le serveur concerné ; le joueur peut jouer sur d'autres serveurs | Définitif sur ce serveur |
| N5 | **Bannissement du compte (lobby)** | Compte du lobby fermé : tous serveurs, portefeuille de Kaelite (voir D4) | Définitif |

**Mesures annexes** (non disciplinaires, immédiates et réversibles) : gel conservatoire d'un compte pendant l'enquête (7 jours maximum, voir D6), annulation d'une transaction ou d'une mission, retrait des avantages obtenus indûment (ressources, objets, Kaelite gagnée), exclusion d'un classement ou d'une récompense d'event.

**[Juridique] Précisions sur l'échelle.**
- **N4 et N5 : « compte fermé », pas « supprimé » immédiatement.** Le compte est fermé à l'accès, mais ses données et le dossier de preuves sont conservés jusqu'à l'expiration des délais de recours (appel interne, puis délai raisonnable pour une action, voir D11). Supprimer tout de suite empêcherait de rétablir le compte si l'appel aboutit, et priverait Kalendrath de ses preuves en cas de litige.
- **N5 et Kaelite achetée** : voir D4 (corrigée). La perte sans contrepartie de la Kaelite achetée **non dépensée**, hors fraude de paiement, expose à une clause abusive.
- **N3 et achats à durée limitée** (ouvrier loué, avantage de 30 jours) : dire dans les CGV si la durée continue de courir pendant une suspension justifiée. Si la suspension est annulée en appel, la durée perdue est rendue.
- **« Dossier : 90 jours actifs »** : préciser dans les CGU ce que veut dire « actifs » (jours de connexion ou jours calendaires). Une notion floue s'interprète en faveur du joueur (Code de la consommation, art. L211-1, *texte connu, non relu*).
- **Mesures annexes** : elles ne sont pas des sanctions, mais elles restreignent le service ; elles reçoivent le même exposé des motifs (principe 4) et relèvent de la revue humaine dès qu'elles dépassent le simple blocage technique réversible (principe 2).

**Récidive.** Un manquement de même famille dans les 90 jours suivant un avertissement monte d'un niveau au moins ; deux sanctions N2 ou plus en 12 mois ouvrent la voie au N3. **[GM]** « Au moins » ne veut pas dire « automatiquement le maximum » : la récidive monte d'un niveau, deux au plus, sauf fait grave ; une récidive sur un fait plus léger que le premier (par exemple un chat limite après un script) n'est pas une récidive de même famille. Les manquements graves (fraude de paiement, vente de compte, harcèlement ciblé, atteinte à la sécurité) ne passent pas par N1.

**Contournement de sanction** : voir B14.

**[GM] Calibrage de l'échelle.**
- **Cohérence N0-N5 / gravité réelle.** N0-N1 : gêne mineure sans avantage (chat limite, script de confort, bug isolé). N2 : avantage ou nuisance réels mais récupérables (retrait de fonction). N3 : atteinte répétée à l'équité ou à autrui, joueur encore récupérable. N4 : le joueur ne doit plus jouer sur ce serveur (bot compétitif, vente de compte, multicompte pour nuire, harcèlement persistant). N5 : danger pour les autres joueurs, le service ou le portefeuille (fraude, piratage, menaces, réseau RMT). Un comportement dont le préjudice ne touche qu'un seul joueur ne monte pas à N5 sans circonstance aggravante.
- **N2 en cours de guerre.** Une restriction qui retire une fonction centrale (envoi de flotte, Ambassade, diplomatie) à un chef d'alliance pendant une guerre change l'issue de la guerre : à n'appliquer qu'avec un motif de P1 ou P2, et jamais dans la fenêtre de 24 h d'une bataille déclarée sauf urgence. Un gel conservatoire (D6) ne se déclenche pas sur un seul signalement d'un camp adverse. Le « Mode de Guerre » cité à N2 n'existe plus comme interrupteur individuel si l'étude PvP est suivie (D14) : ne pas retirer à un joueur la participation à une guerre, seulement la possibilité d'agir.
- **N3 minimum 3 jours** est cohérent ; en pratique viser 3 à 7 jours pour un premier N3 sur un serveur jeune, 14 à 30 jours pour la récidive. Les suspensions longues sur un serveur de quelques mois pèsent comme un N4 : l'alliance du joueur y perd un membre au pire moment.
- **Équité entre camps.** Une sanction identique pour un même fait, quel que soit le rang, la taille de l'alliance ou le statut de payeur (Kaelite). Le journal (principe 6) sert aussi à vérifier qu'aucun camp n'est sanctionné plus durement qu'un autre.

## 2. Procédure d'appel

1. **Notification** : par e-mail du compte et message en jeu, avec règle visée, faits retenus (sans révéler les méthodes de détection), niveau, durée, date de fin, lien d'appel.
2. **Dépôt de l'appel** : dans les **14 jours** suivant la notification, par formulaire (ou e-mail dédié, `appel@` à créer), avec l'identifiant du compte et les arguments du joueur. Un seul appel par sanction.
3. **Examen** : accusé de réception immédiat ; réponse motivée sous **10 jours ouvrés** (objectif, pas garantie ; voir D5). L'appel est examiné par une personne qui n'a pas pris la décision initiale dès que l'équipe le permet ; tant qu'elle compte une seule personne, la décision est revue à froid après 48 h minimum, sur dossier complet.
4. **Issues** : sanction confirmée, réduite (niveau ou durée), annulée avec rétablissement des avantages retirés, ou requalifiée. En cas d'annulation, la mention disparaît du dossier et une compensation proportionnée est étudiée (temps de suspension rendu en production, etc.).
5. **Effet suspensif** : l'appel ne suspend pas une sanction N3 à N5 ou un gel pour fraude, sécurité ou harcèlement. Il suspend un N1-N2 contesté pour erreur manifeste de compte.
6. **Fin de la procédure** : la décision d'appel est définitive côté Kalendrath. Le joueur conserve ses droits légaux (réclamation, médiateur de la consommation pour ce qui touche à un achat).
7. **Appel pour les mineurs / représentant légal** : à cadrer avec les CGU (D10).

**[Juridique] Corrections de la procédure.**
- **Étape 1, notification** : y ajouter les éléments de l'art. 17 du DSA (principe 4) : faits et circonstances, origine (signalement ou enquête interne), **usage ou non de moyens automatisés**, clause des CGU visée, voies de recours internes **et externes**. « Sans révéler les méthodes de détection » reste possible, à condition de donner assez de faits pour que le joueur puisse contester (dates, nature des actions, comptes liés). Le RGPD autorise à protéger un secret d'affaires dans une réponse d'accès, mais seulement après mise en balance motivée, et jamais au point de vider l'explication de son contenu (CJUE, 27 février 2025, Dun & Bradstreet Austria, C-203/22, *probable*, pour les décisions automatisées).
- **Étape 2, délai de 14 jours** : un délai interne court est licite pour un **examen prioritaire** de l'appel, mais il ne doit pas fermer la porte à une réclamation ultérieure ni aux recours externes ; une clause qui entrave les recours du consommateur est présumée abusive (Code de la consommation, art. R212-2, 10°, *vérifié via sources secondaires*). Proposition : appel prioritaire sous 14 jours, réclamation encore recevable pendant **6 mois** (durée minimale que l'art. 20 du DSA impose aux plateformes en ligne ; Kalendrath en est exempté tant qu'il reste une micro ou petite entreprise, art. 19, *vérifié*, mais s'aligner dès maintenant évite une refonte).
- **Étape 3, examen** : la décision sur l'appel n'est **jamais** prise par un outil automatique ou une IA seule (RGPD art. 22, § 3 ; DSA art. 20, § 6 à titre de référence).
- **Étape 6, recours externes** : le médiateur de la consommation n'est pas limité aux achats ; il couvre les litiges contractuels entre un consommateur et un professionnel (Code de la consommation, art. L611-1 et L612-1, *texte connu, non relu* ; l'application à un service gratuit est **incertaine**, avocat). Formulation proposée : « sans préjudice de votre droit de saisir gratuitement le médiateur de la consommation [coordonnées] ou les tribunaux compétents ». Ne jamais écrire que la décision est « sans recours ».
- **Charge de la preuve** : c'est à Kalendrath de prouver le manquement (Code civil, art. 1353 et 1226). Les CGU ne doivent **pas** dire que les journaux de Kalendrath « font foi » de manière absolue : une clause qui fait peser sur le consommateur une preuve qui incombe au professionnel est sur la liste noire (art. R212-1, 12°, *vérifié via sources secondaires*), et une convention de preuve ne peut créer de présomption irréfragable (Code civil, art. 1356, *texte connu, non relu*). Les journaux sont un moyen de preuve parmi d'autres, que le joueur peut contester.
- **Conservation des preuves** : pour chaque sanction N3 à N5, un **dossier figé** est constitué au moment de la décision : extraits de journaux, captures, empreinte numérique (hachage) des fichiers, date, auteur de la revue. Il est conservé selon D11.
- **Données des autres joueurs** : l'identité de la personne qui a signalé n'est pas révélée au joueur sanctionné (protection de la victime ; RGPD art. 15, § 4).

## 3. Les comportements

Légende des preuves : **Journal** = journaux serveur (actions, IP, sessions, appareil, horodatages) ; **Panneau** = panneau admin de détection d'OGameX ; **Signalement** = signalement d'un joueur, jamais suffisant seul.

**[Juridique]** « Appareil » et « empreintes d'appareil », partout dans les fiches ci-dessous, s'entendent des données reçues côté serveur (adresse IP, agent du navigateur, cookie de session) tant que la question du consentement aux empreintes calculées dans le navigateur n'est pas tranchée par un avocat (principe 7). Le signalement d'un joueur est un « signalement » au sens de l'art. 16 du DSA quand il vise un contenu illicite : accusé de réception, décision motivée et information du signaleur, en indiquant si des moyens automatisés ont été utilisés (*vérifié* pour l'existence de l'obligation ; détail des paragraphes non relu).

---

### B1. Automatisation : bots et scripts qui jouent à la place du joueur

**Définition.** Toute action de jeu (construire, rechercher, recruter, envoyer une flotte ou un héros, lancer une expédition, répondre à une attaque, collecter, aider en alliance, cliquer une récompense) déclenchée par un programme sans clic ou commande d'un humain pour **cette** action. Un script lancé « toutes les heures » est de l'automatisation, même si le joueur l'a démarré lui-même.

**Exemples.** Bot qui relance la file de construction dès qu'elle se vide ; script qui envoie des expéditions en boucle ; programme qui fuit ou renvoie une flotte à l'approche d'une attaque ; macro d'interface (clics enregistrés) ; appel de l'API de session par un outil tiers ; utilisation de la clé d'extension pour agir (impossible côté serveur, mais la tentative compte).

**Cas limites et faux positifs.**
- Extensions en **lecture seule** (affichage, calculs, rappels, tableaux de bord, simulateurs) : autorisées (plan marketing section 9). Un rappel qui sonne n'est pas une action.
- Raccourcis clavier, gestionnaire de mots de passe, remplissage automatique, lecteur d'écran et outils d'accessibilité : autorisés.
- File de construction multiple ou automatisation **vendue en boutique** : c'est le serveur qui l'accorde, donc licite.
- Joueur très régulier ou en décalage horaire (clics à heure fixe) : une régularité seule n'est pas une preuve.
- Plusieurs joueurs sur le même réseau (famille, colocation) : IP partagée sans rapport avec l'automatisation.
- Outil qui lit l'API en continu mais dépasse la limite de débit : infraction à B12, pas B1.
- **[GM]** Alerte d'attaque entrante relayée par une extension de lecture sur le téléphone ou un salon Discord, puis **réaction humaine** (le joueur renvoie lui-même sa flotte) : légitime, c'est le jeu normal d'un serveur en guerre. Seule la réaction **programmée** est visée. Un joueur mobile qui répond à une notification en quelques secondes n'est pas un bot : le délai bas ne vaut preuve que **répété** (au moins 5 occurrences) et combiné à une autre famille d'indices.
- **[GM]** Le « fleetsave » (mettre sa flotte à l'abri avant de se déconnecter) fait à la main, même chaque soir, même à heure fixe : légitime.

**Preuves requises (au moins deux familles concordantes).** (a) Journal : actions à intervalles quasi constants sur plusieurs jours, délais de réaction inférieurs au temps humain après un événement (flotte ennemie détectée puis renvoyée en moins de ~2 s), activité 24 h sur 24 sans pause plausible, séquences d'appels sans passer par l'interface ; (b) signature technique (agent, absence d'événements d'interface, jeton non issu de l'interface) ; (c) aveu ou publication de l'outil par son auteur. Un signalement seul ne suffit pas.

**Détection.** Automatique : score de rythme non humain par session (régularité, vitesse, absence de pause), déclencheur d'un **contrôle** (vérification humaine type défi) puis d'une revue. Manuelle : revue du panneau, signalements, veille Discord/Reddit sur les outils publiés. Prévention : actions réservées à la session, limites de débit, clé d'extension en lecture seule.

**Sanctions.** Premier cas léger (script de confort isolé, sans avantage compétitif décisif) : N1, retrait des gains. Cas caractérisé : N2 (suspension des fonctions concernées) puis N3. Bot d'avantage compétitif ou usage prolongé : N4 d'emblée. Auteur ou **revendeur** d'un bot d'action : N5. Récidive après N3 : N4.

**[GM]** Correction : « N4 d'emblée » est trop lourd pour un premier bot de joueur sur un serveur jeune. Barème retenu : N1 pour le script de confort isolé ; **N3 (7 jours) avec retrait des gains** pour le premier cas caractérisé, même d'avantage compétitif, tant que le joueur n'a pas été prévenu ; **N4 d'emblée** seulement si l'usage est établi sur plus de 7 jours, s'il y a eu un avertissement antérieur, ou si un bot vendu ou partagé est en cause. Pour les bots, le risque n'est pas l'isolé mais la diffusion : l'auteur et le revendeur restent en N5. Faisabilité : une revue par lot hebdomadaire (P3) suffit pour les cas isolés ; seule la diffusion publique d'un outil passe en P2.

**[Juridique]** Le « score de rythme non humain » est un **profilage** (RGPD art. 4, 4) : il est mentionné dans la politique de confidentialité, et il ne déclenche qu'un contrôle ou une revue, jamais une sanction (principe 2, arrêt SCHUFA). Le contrôle de type défi est une mesure de sécurité légère ; s'il s'appuie sur un service tiers de CAPTCHA, celui-ci ne doit pas réutiliser les données pour son compte, sinon le consentement devient nécessaire (FAQ cookies de la CNIL, *vérifié*). « La tentative compte » : une tentative techniquement impossible ne cause aucun dommage ; la sanctionner au-delà de N1-N2 serait difficile à justifier au regard de la proportionnalité (principe 3), sauf répétition ou outil diffusé.

---

### B2. Multicomptes au-delà de ce que permettent les règles

**Définition.** Jouer, ou faire jouer en coordination, **plus d'un compte par serveur** (règle de base : un compte par joueur et par serveur). Plusieurs serveurs : un compte par serveur est permis. Le compte du lobby est unique par personne.

**Exemples.** Deuxième compte sur le même serveur « ferme » ou « d'éclaireur » ; compte secondaire pour contourner le Mode de Guerre, le bouclier ou une sanction ; comptes multiples pour multiplier les récompenses d'arrivée, de parrainage ou d'event ; contribution de plusieurs comptes d'une même personne à un event d'alliance.

**Cas limites et faux positifs.**
- **Foyer ou réseau partagé** : plusieurs vrais joueurs sur la même IP (famille, colocation, résidence, école, réseau mobile CGNAT, VPN d'entreprise). Déclaration volontaire à l'équipe recommandée (les comptes déclarés ne peuvent pas échanger de ressources entre eux ni s'attaquer, voir D1).
- **Changement de pseudo ou de compte légitime** (migration, suppression du compte précédent) ; **compte de remplacement après perte d'accès** signalé à l'équipe.
- **Intérim** : un ami qui garde le compte quelques jours (voir B4, sitting).
- Deux comptes sur deux serveurs différents : toujours autorisés.
- **[GM] Espionnage d'alliance.** Un **vrai joueur tiers** qui rejoint une alliance ennemie pour la renseigner : jeu légitime (voir D13). Un **second compte du même joueur** utilisé comme espion ou comme éclaireur, sur le même serveur : multicompte (B2), même si l'intention est « seulement diplomatique ». À écrire clairement dans les règles pour que l'espion ne se croie pas couvert.

**Preuves requises.** Faisceau d'au moins trois indices indépendants sur une période d'au moins une semaine : IP et empreintes d'appareil partagées, sessions qui ne se chevauchent jamais, transferts ou missions entre les comptes, comportements miroir, noms/e-mails proches, achats par le même moyen de paiement. Une IP commune seule ne prouve rien.

**Détection.** Automatique : alertes du panneau (IP partagée, missions entre comptes liés). Manuelle : revue d'enquête, signalements. Prévention : pas de transfert entre joueurs sans encadrement (Mode Paix vers Mode de Guerre bloqué, GDD 5.4 ; *[Revue] remplacé depuis le 2026-10-30 par la fermeture du transport vers les tiers et des transports entrants dans une alliance en guerre, étude PvP 2 et 6.2*), Kaelite gagnée liée au serveur (GDD section 9).

**Sanctions.** Premier cas sans avantage tiré : N1 + fermeture des comptes surnuméraires (le plus ancien est conservé par défaut). Avantage tiré : N2, retrait des avantages, puis N3. Multicompte pour harceler, contourner une sanction ou alimenter un compte principal : N4. Récidive : N5.

**[GM]** Précisions : (1) « Récidive : N5 » devient « récidive après un N4 : N5 » ; un deuxième multicompte après un N1-N2 reste en N3 (principe 9). (2) Le faisceau de trois indices sur une semaine est un seuil de **N3 et plus** ; pour la fermeture d'un compte surnuméraire sans sanction au-delà du N1, deux indices concordants (dont des transferts ou des sessions jamais simultanées) suffisent, après demande d'explication au joueur. (3) Un compte surnuméraire créé pour être la cible d'un farm ou le relais d'un push (« compte ferme ») est le cas typique du N4.

**[Juridique]** « Achats par le même moyen de paiement » : n'utiliser que le jeton ou l'empreinte de carte que fournit le prestataire de paiement, jamais le numéro de carte, et seulement pour cette finalité (minimisation, RGPD art. 5, § 1, c). La déclaration de foyer (D1) collecte le strict nécessaire (lien entre comptes), pas l'identité des membres du foyer. Fermer un compte surnuméraire ayant reçu de la Kaelite achetée : rembourser ou transférer sur le compte conservé la Kaelite achetée non dépensée (voir D4).

---

### B3. Push, pull et transferts abusifs entre comptes

**Définition.** Transfert de valeur sans contrepartie réelle, au bénéfice d'un compte précis : don déguisé en échange, mission d'envoi de ressources, combat arrangé (flotte sacrifiée, débris récupérés par un complice), faux marché à prix fixés très au-dessus ou en dessous du cours, prêt jamais remboursé organisé. *Pushing* = vers un compte plus avancé (souvent le même joueur) ; *pulling* = vers un compte plus faible pour contourner une protection.

**Exemples.** Compte B envoie toutes ses ressources à A ; combat Mode de Guerre « perdu volontairement » contre un allié pour lui donner des points ; échanges asymétriques répétés entre deux comptes sur le marché officiel ; achat à des prix de cession.

**Cas limites et faux positifs.**
- **Aide de débutant** : un joueur ancien aide un nouvel arrivant d'alliance dans les limites des plafonds : toléré, ce n'est pas un push ; au-delà du plafond, c'est le serveur qui bloque.
- Entraide d'alliance prévue par le jeu (aide de construction de l'Ambassade, défense ACS, soutien de flotte) : autorisée.
- Échanges via le **marché officiel** au ratio imposé (GDD 5.4) : autorisés.
- Un échange très déséquilibré entre amis réels qui jouent à des rythmes différents : à apprécier selon l'ampleur et la répétition.
- Don à un compte du même foyer déclaré : voir D1.
- **[GM] Légitime en guerre d'alliances, à ne pas sanctionner :** reddition avec tribut plafonné (mécanique du jeu) ; retraite tactique ou flotte laissée sans défense pour attirer l'ennemi ; sacrifice d'une flotte de diversion ; ravitaillement et envoi de renforts **à un allié réel** via les missions prévues ; « nourrir » un camp adverse par erreur de calcul ; dons d'un chef à ses membres sous les plafonds ; **farm** répété d'un joueur plus faible ou inactif, y compris les 3 attaques par 24 h autorisées ; **bash** de masse d'une alliance entière tant que les plafonds serveur sont respectés. Ces actes sont le jeu, pas du push.
- **[GM] Cas à regarder : la guerre de façade (*wintrading* d'alliances).** Deux alliances déclarées ennemies qui s'arrangent pour se faire gagner mutuellement du score, des débris ou des récompenses de guerre (batailles à sens unique alternées, flottes envoyées pour être détruites, paix blanche signée pour répartir un butin). La preuve est l'**alternance** et l'**asymétrie sans résistance** sur plusieurs batailles, pas une défaite isolée. Une alliance qui perd franchement une guerre n'est jamais suspecte pour cela.

**Preuves requises.** Journal des transferts/missions sur au moins trois occurrences ou un volume anormal (au-delà d'un seuil à définir en rapport avec la production d'une journée ; D2), asymétrie répétée, absence de contrepartie, lien entre les comptes (B2 ou B4) ou aveu.

**Détection.** Automatique : déséquilibre cumulé entre paires de comptes, flux vers un nœud unique, pertes de combat inhabituelles entre alliés. Manuelle : revue périodique des plus gros flux. Prévention : plafonds de transferts, ratio du marché, interdiction Paix vers Guerre, Kaelite gagnée non transférable.

**Sanctions.** Occasionnel et faible volume : N1, annulation si possible. Répétition ou volume notable : N2 (envois bloqués) puis N3, retrait des gains chez le bénéficiaire. Organisation systématique (réseau de comptes) : N4 pour tous, N5 pour l'organisateur.

**[GM]** Barème : la guerre de façade vise d'abord le **retrait des points et récompenses** de guerre, puis N2 (exclusion du classement de guerre) pour les chefs ; N4 seulement pour l'organisation prouvée avec transferts ou comptes liés. Un seul indice suffit au retrait des gains, pas à la sanction. Prévention (principe 1) : le serveur rend nuls les points d'une bataille sans perte significative pour l'un des camps, ce qui épargne presque toute enquête.

**[Juridique]** « N4 pour tous » : à remplacer par « N4 pour chaque titulaire dont la participation consciente est établie ». Un joueur réel qui a reçu des ressources sans rien organiser peut perdre l'avantage indu (mesure annexe), mais pas son compte sans faute personnelle prouvée (principe 3, individualisation ; Code civil art. 1226, preuve de la gravité de *son* inexécution).

---

### B4. Partage, vente, achat et prêt abusif de compte

**Définition.** Le compte est utilisé par une personne autre que son titulaire, ou change de titulaire, **hors du cadre prévu par le jeu** ; ou sitting continu permettant à plusieurs personnes de jouer 24 h sur 24.

**Exemples.** Vente d'un compte sur un site de revente ou Discord ; échange de comptes ; mot de passe confié à un « booster » ; deux joueurs qui se relaient en permanence sur un même compte ; compte tenu par un tiers rémunéré.

**Cas limites et faux positifs.**
- **Sitting ponctuel** : un ami ou un proche qui garde le compte pendant une absence (voyage, hôpital) : toléré s'il est déclaré et limité (durée max à fixer, D3), sans action de combat ni transfert sans accord du titulaire.
- Aide à un proche pour jouer (parent et enfant, personne en situation de handicap) : autorisée.
- Compte piraté : la victime n'est pas sanctionnée ; voir B13.
- Transmission d'un compte d'un proche décédé ou dans un cas grave : à traiter au cas par cas.

**Preuves requises.** Changement brutal de comportement (rythme, horaires, appareil, langue, style de chat), connexions depuis des zones éloignées incompatibles dans un court laps de temps, annonces de vente ou témoignage vérifiable, changement d'e-mail/mot de passe suivi de l'usage du compte par un autre profil.

**Détection.** Manuelle surtout (signalements, veille des sites de revente). Automatique partielle : rupture d'empreinte appareil/localisation et changement de comportement.

**Sanctions.** Partage simple sans avantage : N1. Sitting continu ou prêt à plusieurs : N2 puis N3. **Vente ou achat** : N5 pour le vendeur et l'acheteur, après vérification (le compte vendu étant la cause de la fraude). Intermédiaire/revendeur : N5.

**[GM] Point soumis à arbitrage (voir revue-gamemaster-bannissements.md, conflit C1).** N5 d'emblée pour le **vendeur** d'un seul compte, premier cas, sans activité commerciale, est le niveau le plus lourd de la fiche pour un fait dont le préjudice est limité (un compte déplacé, un joueur remplacé). Les jeux de référence bannissent le compte vendu et le plus souvent l'acheteur, rarement tout un portefeuille pour un premier cas. Position du GM : N4 pour le vendeur occasionnel premier cas, N5 pour le revendeur, la récidive ou l'intermédiaire. Cette position **contredit** le maintien du N5 d'emblée par la revue juridique : non tranché ici.

**[Juridique]** N5 pour l'**acheteur** d'un compte, dès la première fois, fait perdre tout le compte du lobby, y compris des achats sans lien avec la vente : c'est discutable au regard de la proportionnalité. Proposition : fermeture du compte acheté (N4 sur ce serveur) pour l'acheteur primo-contrevenant, N5 en récidive ; N5 d'emblée reste justifié pour le vendeur et le revendeur. Dans les cas de N5, voir D4 pour la Kaelite achetée. « Aide à un proche » et « personne en situation de handicap » : bien maintenir cette tolérance dans les CGU, une interdiction générale du partage pourrait être reprochée comme discriminatoire si elle exclut une aide nécessaire.

---

### B5. Commerce en argent réel hors boutique (RMT)

**Définition.** Échanger contre de l'argent réel, des cryptoactifs ou des biens extérieurs au jeu, des ressources, objets, comptes, services de jeu (boost, farm), héros ou **Kaelite**, en dehors de la boutique officielle. L'incitation indirecte (promesse de dons en jeu contre paiement Patreon d'un tiers) en fait partie.

**Exemples.** Vente de ressources contre PayPal ; « boost » de classement payé ; revente de codes de Kaelite ; cadeaux de Kaelite en échange d'un virement ; annonce « je vends mon héros ».

**Cas limites et faux positifs.**
- **Cadeau à un ami** si la boutique l'autorise officiellement (par exemple offrir de la Kaelite via le système prévu) : autorisé.
- Échange d'objets ou de ressources entre joueurs en jeu, sans argent réel : pas du RMT (encadré par B3).
- Dons Patreon au projet : licite, sans contrepartie de jeu cachée.
- Conversation hors-sujet sur le commerce d'un autre jeu : non concernée.

**Preuves requises.** Annonce ou conversation (copie intégrale avec contexte), puis transfert correspondant dans le journal. L'annonce seule reçoit N1-N2 (retrait de l'annonce) ; la transaction avérée est nécessaire pour N3 et plus.

**Détection.** Manuelle : signalements, veille externe. Automatique : mots-clés de chat sur offres de vente (alerte, jamais sanction automatique), flux anormaux B3.

**Sanctions.** Annonce sans transaction : N1 puis N2 (chat). Transaction avérée : N3 minimum, retrait des biens ; revendeur régulier ou réseau : N5. Acheteur : N3 la première fois, N4 en récidive. Si la source est une fraude de paiement : voir B11.

**[Juridique]** L'analyse automatique de mots-clés dans le chat est un traitement du contenu des messages : la mentionner dans la politique de confidentialité et les CGU. Pour les **messages privés** entre joueurs, s'en tenir à une analyse sur signalement ou sur enquête ciblée, pas à une lecture systématique par un humain. Le chat d'un jeu est probablement exclu du régime des communications électroniques (fonction accessoire, directive (UE) 2018/1972, art. 2, 5 et considérant 17, *texte connu, non relu*), mais le principe du secret des correspondances privées invite à la prudence : **incertain, avocat**.

---

### B6. Exploitation volontaire d'un bug sans le signaler

**Définition.** Utiliser une erreur du jeu (duplication, ressources gratuites, calcul erroné, résolution temporelle, faille de timing, trou de l'API) pour obtenir un avantage, **et** ne pas la signaler, ou la répéter après avoir été prévenu, ou la partager/vendre.

**Exemples.** Annuler une construction à la milliseconde pour toucher un remboursement multiple ; double dépense par requêtes parallèles ; boucle d'expéditions rentables suite à une erreur de probabilité ; diffusion d'un tutoriel d'exploitation.

**Cas limites et faux positifs.**
- **Bug découvert par hasard** et signalé rapidement : non seulement toléré, mais récompensé (voir D8). On peut garder l'avantage indûment obtenu de bonne foi seulement s'il est négligeable ; sinon retrait sans sanction.
- Mécanique mal comprise ou stratégie inattendue mais conforme aux règles : un « glitch d'optimisation » n'est pas un bug.
- Comportement documenté dans les notes de version comme « fonctionnement prévu » : légitime.
- Utilisation d'un bug **une seule fois**, signalé dans les 24 h : N0.

**Preuves requises.** Journal montrant la répétition (au moins deux utilisations ou un gain majeur) ET l'absence de signalement (ou l'usage après avertissement) ; ou diffusion publique de la méthode.

**Détection.** Automatique : alertes de ressources inattendues, écarts de cohérence (production vs consommation, doublons d'objets, soldes de Kaelite). Manuelle : revue d'anomalies, signalements, veille communautaire.

**Sanctions.** Une utilisation limitée : N0-N1 + retrait. Usage répété ou gain important : N2-N3 + retrait. **Diffusion, vente de la méthode, exploitation touchant la Kaelite ou l'économie** : N4. Faille de sécurité exploitée à des fins malveillantes : N5 (voir B13). Signaler tôt réduit d'un niveau.

---

### B7. Contournement d'une protection

**Définition.** Détourner ou neutraliser un mécanisme de protection du jeu : Mode Paix/Mode de Guerre, bouclier temporaire, protection des débutants, ligue de niveaux, règles de guerre d'alliance et pactes de diplomatie, limites d'attaque.

**Exemples.** Changer de mode juste avant la résolution d'un combat ; activer un bouclier à l'instant précis permis par une faille ; envoyer des ressources à un compte pour le faire sortir d'une ligue ; compte « mule » maintenu bas pour rester dans une ligue faible (*sandbagging*) ; rompre un pacte puis attaquer avant le délai prévu par un abus d'interface ; faire attaquer un compte par un tiers pour contourner un interdit de diplomatie.

**Cas limites et faux positifs.**
- Utilisation normale de la mécanique, y compris stratégique (activer un bouclier au bon moment) : légitime tant qu'elle passe par les règles.
- **Ligue** : monter lentement ou rester volontairement en dessous d'un seuil par choix de style de jeu : légitime ; seul est visé le maintien artificiel d'un compte fort via des artifices (sandbagging avec ressources cachées chez un tiers).
- Rupture de pacte conforme aux délais : légitime.
- **[GM] Diplomatie trompeuse : légitime.** Signer un PNA pour endormir l'adversaire, le rompre au premier délai permis, mentir en diplomatie, promettre une aide qu'on ne donnera pas, faire croire à une alliance ou à une retraite, faire attaquer un adversaire par un **tiers réel** (guerre par procuration) : c'est la diplomatie du genre (EVE, Travian). Seuls les artifices techniques, les comptes multiples et le bug (B6) sont visés.
- **[GM]** Utiliser un bouclier, un changement de mode ou un délai **au meilleur moment** : légitime tant que le serveur l'autorise. Si l'activation à la dernière seconde avant un combat est jugée abusive, c'est au serveur de la bloquer (principe 1) ; la mécanique, une fois en place, n'est pas du contournement. Corrige l'exemple « changer de mode juste avant la résolution d'un combat » qui n'est une infraction que si le serveur le refuse et qu'un bug le permet.
- **[GM]** Changer de camp, quitter une alliance avant ou pendant une guerre, ou en rejoindre une autre : légitime dans les limites des délais du serveur (7 jours de présence, exposition maintenue jusqu'à la fin de la guerre). Pas de sanction pour un départ « opportuniste ».

**Preuves requises.** Séquence au journal prouvant l'artifice (horodatages, transferts, comptes liés), répétition ou avantage mesurable.

**Détection.** Automatique : changements de mode avant/après combat, activations de bouclier atypiques, flux vers des comptes de ligue inférieure. Manuelle : revue des plaintes.

**Sanctions.** Premier cas sans gain notable : N1 + annulation. Avantage obtenu : N2 (Mode de Guerre/classement retiré) puis N3. Contournement organisé, ou via bug (B6) : N4.

**[GM]** « Mode de Guerre retiré » est à lire « participation à un classement ou une récompense de guerre retirée » (voir calibrage de l'échelle). Le sandbagging d'une ligue est une **question de conception** autant que de modération : à traiter par des seuils serveur (ligue déterminée par la puissance historique maximale, non par la puissance courante) avant d'ouvrir des enquêtes.

---

### B8. Abus des récompenses, parrainages et events

**Définition.** Obtenir des récompenses (arrivée, parrainage, event d'alliance, classement, Kaelite gagnée, packs) par des moyens artificiels : comptes jetables, boucles de parrainage entre ses propres comptes, contribution truquée à un objectif collectif.

**Exemples.** Parrainer ses propres comptes ; créer des comptes pour récolter un cadeau d'arrivée ; faire contribuer plusieurs comptes au même event ; revendre des codes de bienvenue.

**Cas limites et faux positifs.**
- Parrainage d'un vrai ami ou membre de la famille jouant sur son propre compte : légitime (même foyer : déclaration, voir D1).
- Alliance qui recrute activement : légitime.
- Contribution massive par une vraie alliance : légitime.

**Preuves requises.** Comptes liés (B2), récompenses cumulées, absence d'activité réelle du compte parrainé, schéma répétitif.

**Détection.** Automatique : parrainages chaînés par IP/appareil, comptes sans activité autre que la collecte. Manuelle : revue avant versement des récompenses de valeur (Kaelite).

**Sanctions.** Retrait des récompenses ; N1 la première fois ; N2-N3 si répété ; N4-N5 si organisé ou si Kaelite concernée.

**[GM]** Correction : « N4-N5 si organisé ou si Kaelite concernée » est trop sévère pour la simple présence de Kaelite gagnée (quelques unités par parrainage). Barème : N4 pour une boucle de parrainage ou une ferme de comptes organisée ; N5 seulement pour un réseau qui monétise (revente de codes, de Kaelite) ou pour la récidive après N4. Une Kaelite gagnée indûment est d'abord reprise, avec N1-N2.

---

### B9. Harcèlement, propos haineux, contenus illicites

**Définition.** Tout comportement, dans le jeu (chat, noms de joueur, d'alliance, de ville, messages, descriptions), sur Discord ou sur les canaux officiels, qui vise à intimider, humilier, discriminer, menacer, ou qui publie du contenu illégal. Inclut le harcèlement par le jeu lui-même (attaque répétée d'un joueur choisi, voir cas limites).

**Exemples.** Insultes répétées visant une personne ; propos racistes, sexistes, homophobes, validistes ; menaces, doxxing ; contenu sexuel explicite ou violent gratuit ; pseudo ou nom d'alliance injurieux ; incitation au suicide ; contenu illégal (apologie du terrorisme, pédocriminalité : signalement aux autorités).

**Cas limites et faux positifs.**
- **Jeu de rôle et langage de l'univers** : « Je vais vous réduire en cendres » dans le cadre d'une guerre déclarée : légitime. Le contexte compte.
- Vanne entre amis consentants, jurons non dirigés contre quelqu'un : tolérés.
- **PvP** consenti et conforme aux règles : l'attaque n'est pas du harcèlement ; le **ciblage répété et exclusif** d'un joueur hors guerre déclarée, en l'accompagnant d'insultes ou après un refus clair, peut l'être (à apprécier).
- **[GM] Correction de cadrage.** L'attaque en jeu n'est **jamais** du harcèlement en soi : les plafonds du serveur (3 attaques par cible et par 24 h) existent pour cela, et dans une guerre d'alliances **tous les membres sont attaquables**, y compris le même joueur à chaque fenêtre autorisée. Le ciblage d'un joueur hors guerre ne devient une infraction que **combiné à un élément extérieur au jeu** (insultes ou menaces visant la personne, suivi sur Discord ou en messages privés, après un refus ou un « laissez-moi tranquille » explicite, contournement du plafond par comptes tiers ou ACS monté à cet effet). Ciblage seul, même obstiné : message de l'équipe au plus (N0), et question de conception (plafond, bouclier, protection des petits comptes).
- **[GM] Légitime en guerre :** provocation, moquerie, fanfaronnade, noms d'alliance et titres agressifs (« Les Cendres de X »), messages de victoire, intimidation **dans le personnage** par le chat de jeu, spam d'attaques à la limite du plafond, pression diplomatique, « tu es mort, quitte le serveur » dit comme réplique de guerre. La ligne est l'identité (origine, genre, orientation, handicap, religion), les proches, la vie réelle (travail, adresse, santé) et les menaces hors du jeu : là, on sanctionne quel que soit le contexte de guerre.
- **[GM] Signalements comme arme de guerre.** Une alliance en guerre peut signaler massivement un chef adverse pour le faire geler avant une bataille. Aucun gel ni N2 sur un signalement venu d'un camp adverse sans preuve propre (principe 2 et calibrage de l'échelle) ; une rafale de signalements coordonnés et infondés est un cas limite de B9 (voir ci-dessous), à traiter d'abord par un N0.
- Critique du jeu, de l'équipe ou d'une décision : légitime tant qu'elle reste civile.
- Langue étrangère mal traduite : demander clarification avant sanction.

**Preuves requises.** Capture ou journal intégral avec contexte (message précédent et suivant), identité de l'auteur, plusieurs occurrences pour le harcèlement. Le signalement de la victime déclenche l'enquête ; il ne suffit pas seul.

**Détection.** Manuelle (signalement en jeu, modération Discord). Automatique : filtre de mots à alerter, pas à sanctionner.

**Sanctions.** Propos isolé : N0-N1 + suppression. Répétition ou propos haineux : N2 (chat) puis N3. **Harcèlement ciblé, menaces, doxxing** : N4-N5 sans passer par N1. Contenu illégal : N5 + signalement aux autorités. Un nom injurieux est renommé d'office.

**[GM]** Échelle affinée, car « harcèlement ciblé » recouvre des faits d'une gravité très inégale. (1) **Menaces réelles hors jeu, doxxing, sollicitation d'un mineur, contenu illicite** : N5 d'emblée, P1. (2) **Harcèlement ciblé persistant** (au moins 3 occurrences, après un refus clair ou un N0) **sans menace réelle** : N3 (7 jours), puis N4 en cas de reprise, plutôt que N4-N5 d'emblée ; l'avertissement N1 joue ici le rôle de mise en demeure (principe 3 [Juridique]) pour tout fait qui n'est pas une menace ou un doxxing. (3) **Propos haineux isolés** : N2 (chat 7 jours) directement, N1 seulement s'il est ambigu. (4) **Insultes dans le feu d'une guerre** (sans identité, sans proches, sans menace) : N0, puis N1 à la troisième fois. (5) **Cas limite de B9 : signalements abusifs** : N0, puis N1 ; N2 (retrait de la fonction « Signaler ») seulement en cas de campagne coordonnée. Pour un modérateur seul : un filtre de mots, des modèles de réponse et des **N2 de 24 à 72 h de chat** décidés sur preuve intégrale évitent la plupart des escalades ; le gros de la charge vient du chat, qu'on limite par le verrou serveur (débit, mots, nouveaux comptes muets pendant quelques minutes).

**[Juridique]**
- **Signalement aux autorités : obligation, pas option.** Tout hébergeur qui a connaissance d'informations faisant soupçonner une infraction pénale présentant une **menace pour la vie ou la sécurité** d'une personne doit en informer **promptement** les autorités répressives ou judiciaires et leur transmettre les informations dont il dispose (DSA art. 18, *vérifié*). Cela couvre les menaces de mort crédibles, l'incitation au suicide visant une personne, la pédocriminalité. Prévoir une procédure écrite (qui alerte, par quel canal : police, gendarmerie, plateforme PHAROS) et ne pas supprimer les preuves avant transmission.
- **Mécanisme de signalement** : obligatoire pour tout hébergeur (DSA art. 16) : un bouton « Signaler » en jeu, accessible et électronique, suffit ; le signaleur est informé de la suite.
- **Suppression d'un message ou renommage d'office** : ce sont des restrictions de contenu, qui reçoivent un exposé des motifs (DSA art. 17, *vérifié*), même bref.
- **Comportements tenus sur Discord** : Kalendrath ne peut les sanctionner en jeu que si les CGU du jeu le prévoient expressément (« canaux officiels »). Les captures fournies par des tiers sont recevables, mais leur authenticité doit être vérifiable (identifiant du message, lien).
- **Signalements abusifs** (non couverts par les fiches) : l'art. 23 du DSA, qui ne s'impose pas à une micro-entreprise, prévoit la suspension de ceux qui signalent fréquemment des contenus manifestement infondés. Proposition : en faire un cas limite de B9 (harcèlement par signalements) plutôt qu'une 15e fiche.

---

### B10. Usurpation de l'équipe de Kalendrath ou d'un autre joueur

**Définition.** Se faire passer pour l'équipe, un modérateur, un développeur, ou un autre joueur ; utiliser la marque Kalendrath dans une intention trompeuse (faux concours, fausses boutiques, faux serveurs).

**Exemples.** Pseudo « Admin_Kalendrath » ; message prétendant une compensation contre un mot de passe ; faux Discord officiel ; faux Patreon.

**Cas limites et faux positifs.**
- Pseudo ou parodie manifeste sans intention trompeuse (« Kaelite Bank Corp ») : toléré, sauf plainte.
- Création de contenu de fan (vidéos, outils, wiki) avec mention claire de non-officialité : autorisée.
- Homonymie fortuite : rien à sanctionner.

**Preuves requises.** Capture du message ou du pseudo avec contexte, élément montrant l'intention trompeuse ou la confusion.

**Détection.** Manuelle : signalements. Automatique : blocage des pseudos contenant des termes réservés (Admin, Modo, Kalendrath, Staff) à la création.

**Sanctions.** Pseudo trompeur sans escroquerie : renommage + N1. Usage pour obtenir quelque chose (identifiants, argent) : N5 + signalement/ plainte si dommage. Usurpation d'un autre joueur : N2 puis N3.

---

### B11. Fraude de paiement

**Définition.** Obtenir de la Kaelite ou des avantages payants sans payer, ou en annulant le paiement de mauvaise foi : carte volée ou empruntée sans accord, rétrofacturation abusive, exploitation d'une faille de la boutique, revente de Kaelite achetée frauduleusement~~, abus du droit de rétractation après consommation de la Kaelite~~.

**[Juridique] Correction.** « Abus du droit de rétractation » est retiré de la définition : exercer un droit légal ne peut pas être une fraude sanctionnable. Soit Kalendrath a recueilli, avant la livraison, l'accord exprès du joueur pour une exécution immédiate **et** sa renonciation expresse, confirmées sur support durable (Code de la consommation, art. L221-28, 13°, *vérifié via service-public.gouv.fr*) : le droit de rétractation n'existe plus, la demande est simplement refusée, sans sanction. Soit Kalendrath ne l'a pas fait : le joueur garde ses 14 jours, même s'il a dépensé la Kaelite, et ne doit alors rien pour le contenu consommé (directive 2011/83/UE, art. 14, § 4, b, *texte connu, non relu*). Le risque est donc à traiter **dans le parcours d'achat** (case distincte, reçu par courriel), pas par la sanction. En revanche, une rétrofacturation bancaire obtenue en prétendant faussement ne pas avoir fait l'achat reste une fraude.

**Exemples.** Achat par carte volée suivi d'une revente ; rétrofacturation après avoir dépensé la Kaelite ; code promotionnel détourné ; modification d'une requête pour obtenir un pack moins cher.

**Cas limites et faux positifs.**
- **Achat par un mineur à l'insu d'un parent** ou erreur d'achat : à traiter par la voie commerciale (remboursement), pas par la sanction.
- Rétrofacturation justifiée (double débit, service non reçu) : légitime.
- **Droit de rétractation de 14 jours** : la loi s'applique ; la Kaelite non dépensée est remboursable, la Kaelite dépensée peut ne pas l'être selon les CGV (à rédiger avec un juriste).
  - **[Juridique] Correction** : ce n'est pas aux CGV de décider, c'est à la loi. Sans renonciation expresse recueillie et confirmée (voir la correction de la définition), la Kaelite dépensée **reste** couverte par la rétractation. Avec renonciation valable, l'exception joue pour le contenu livré ; pour la Kaelite livrée mais non dépensée, la question est débattue (**incertain**, avocat). Depuis le 19 juin 2026, une « fonction de rétractation » en ligne est obligatoire pour les contrats conclus en ligne lorsque la rétractation existe (directive (UE) 2023/2673, transposée par l'ordonnance n° 2026-2 du 5 janvier 2026, *probable*).
- **[Juridique] Achat par un mineur** : un mineur ne peut conclure seul que les actes courants autorisés par la loi ou l'usage (Code civil, art. 1148, *texte connu, non relu*) ; un achat disproportionné peut être annulé à la demande des parents. C'est une voie de remboursement, jamais un motif de sanction pour le mineur ni pour le parent qui demande l'annulation.
- Litige de bonne foi avec le prestataire de paiement : contact d'abord.

**Preuves requises.** Notification du prestataire de paiement (fraude, rétrofacturation), journal de la transaction, utilisation de la Kaelite après l'achat.

**Détection.** Automatique : alertes du prestataire, anomalies de volume/montant, rétrofacturation reçue. Manuelle : revue des ventes.

**Sanctions.** Gel conservatoire du portefeuille dès notification. Erreur de bonne foi : aucune sanction, régularisation. Rétrofacturation abusive ou carte volée : **N5** (fraude, sans passer par N1), avec retrait de la Kaelite et signalement au prestataire ; plainte possible. Revente de Kaelite frauduleuse : N5 pour tous les participants.

**[Juridique]**
- **Gel du portefeuille** : mesure conservatoire, motivée dès son application (DSA art. 17) ; la levée ou la sanction passe par une revue humaine (principe 2). Le retrait porte sur la Kaelite correspondant au paiement contesté, pas sur l'ensemble du portefeuille.
- **N5 pour rétrofacturation** : seulement si la mauvaise foi est établie (litige perdu par le joueur auprès de sa banque, aveu, achat manifestement fait par lui). Tant que le litige bancaire est en cours, on s'en tient au gel : une rétrofacturation peut être légitime (paiement non autorisé, Code monétaire et financier art. L133-18, *texte connu, non relu*).
- **« Revente de Kaelite frauduleuse : N5 pour tous les participants »** : seulement pour ceux dont la connaissance de la fraude est établie (individualisation, principe 3).
- **Fichier des fraudeurs** : conserver des données sur des infractions pénales (vol de carte, escroquerie) relève d'un régime restrictif (RGPD art. 10 ; loi Informatique et libertés art. 46, qui l'admet notamment pour une victime qui prépare ou exerce une action en justice, *texte connu, non relu*). Ne pas tenir de « liste noire » générale de fraudeurs sans avis d'un avocat ; s'en tenir au dossier du cas et aux listes du prestataire de paiement.

---

### B12. Abus de l'API et des extensions

**Définition.** Utiliser la clé d'extension ou l'API de façon contraire aux règles : partage de sa clé avec d'autres, dépassement délibéré des limites de débit, collecte massive de données de joueurs, contournement de la liste blanche, tentative de faire agir une extension, ou distribution d'une extension qui contient une action cachée.

**Exemples.** Clé vendue ou publiée ; scraper qui aspire les données de tous les joueurs pour un classement parallèle ; extension qui envoie des actions en se faisant passer pour la session ; clé utilisée pour surveiller un joueur précis.

**Cas limites et faux positifs.**
- Extension de lecture respectant les limites : autorisée (tableau de bord d'alliance, simulateur, cartes, rappels).
- **Dépassement accidentel** d'une limite de débit (bug de l'extension) : blocage automatique et avertissement, pas de sanction.
- **Données de ses propres alliés** consultées avec leur accord : pas un abus ; un outil qui publie les données de tiers hors du jeu sans accord : à apprécier (D9).
- Auteur d'une extension qui n'a pas prévu que des utilisateurs en fassent un usage fautif : l'auteur n'est pas sanctionné si l'extension est conforme.

**Preuves requises.** Journal d'appels par clé (conservé), signatures de requêtes interdites (routes d'action refusées), publication de l'outil.

**Détection.** Automatique : journal d'appels, limites de débit, refus sur routes fermées (les tests Pest garantissent le verrou). Manuelle : revue de l'outil publié.

**Sanctions.** Dépassement ponctuel : blocage de la clé + N1. Répétition ou usage détourné : révocation de la clé, N2 (API retirée), puis N3. Exfiltration massive, tentative d'action, vente de clé : N4. Auteur d'une extension piégée : N5.

**[GM]** Précisions : la **collecte massive de données publiques** (classements, cartes) sans clé et sans nuisance est d'abord un problème de limite de débit : blocage, N1, N2 en cas de reprise. N4 est réservé à la collecte de données non publiques, à la vente de clé ou à la tentative d'action. Un joueur qui publie un **tracker de flottes ou d'alliances ennemies** à partir de données que le jeu lui montre légitimement (rapports d'espionnage, carte) fait un acte de guerre, pas une infraction.

**[Juridique]** Le blocage automatique de la clé au dépassement de débit est une mesure technique légère et réversible : automatisable, avec un message qui l'explique. La collecte massive de données de joueurs par un tiers fait de ce tiers un responsable de traitement soumis au RGPD ; Kalendrath doit, de son côté, limiter ce que l'API expose (minimisation, sécurité, RGPD art. 25 et 32) et le dire dans les conditions de l'API. Voir D9.

---

### B13. Atteinte à la sécurité et au service

**Définition.** Toute tentative d'accéder à ce qui n'est pas ouvert : piratage de compte, phishing, test d'intrusion non autorisé, déni de service, injection, exploitation d'une faille de sécurité, spam massif, rupture volontaire du service.

**Exemples.** Hameçonnage de mots de passe de joueurs ; attaque par force brute ; tests de charge non sollicités ; exploitation d'une faille d'authentification ; envoi massif de messages.

**Cas limites et faux positifs.**
- **Chercheur de bonne foi** qui signale une faille à l'équipe sans l'exploiter ni la publier : accueilli, remercié ; une page « divulgation responsable » est à prévoir (D8).
- Joueur qui teste un oubli d'accès involontairement : pas une attaque.
- Pic d'actions humain (event) ou erreur de configuration : non concernés.

**Preuves requises.** Journaux de sécurité, signature des requêtes, adresses et comptes concernés, plainte de la victime pour le piratage.

**Détection.** Automatique : limitation de tentatives de connexion, alertes sur volumes et patterns d'attaque. Manuelle : enquête sur incident.

**Sanctions.** Pas de gradation douce : **N5 d'emblée** pour toute attaque caractérisée, avec signalement/plainte si dommage. Spam léger : N1-N2. Victime d'un piratage : aucune sanction, restauration du compte.

**[GM]** « N5 d'emblée pour toute attaque caractérisée » : à moduler selon le préjudice et l'intention. Un joueur curieux qui teste une faille sur son propre compte sans dommage ni publication : N2-N3 et invitation à signaler (programme D8) ; N5 pour le vol de comptes, l'hameçonnage, la publication ou la vente de la faille, le déni de service volontaire. **Hameçonnage ou vol de mot de passe entre alliances adverses** : ce n'est pas de la « diplomatie trompeuse », c'est B13 (N5), même dit « pour la guerre ».

**[Juridique]** L'accès ou le maintien frauduleux dans un système et l'entrave à son fonctionnement sont des délits (Code pénal, art. 323-1 et 323-2, *texte connu, non relu*) : la plainte relève de Kalendrath comme victime. Un piratage de compte qui expose des données de joueurs peut être une **violation de données** à notifier à la CNIL sous 72 h (RGPD art. 33) et, si le risque est élevé, aux joueurs concernés (art. 34). « Tests de charge non sollicités » : N5 d'emblée seulement si l'intention de nuire ou l'atteinte au service est établie ; sinon, N2-N3 (proportionnalité).

---

### B14. Contournement d'une sanction

**Définition.** Se reconnecter ou recréer un compte pour échapper à une restriction, une suspension ou un bannissement ; faire jouer un tiers à sa place pendant la sanction ; utiliser une extension ou un VPN pour masquer sa sanction.

**Exemples.** Nouveau compte après N4 ; prêt de session à un ami pendant N3 ; changement de pseudo après N2 pour continuer à parler dans le chat.

**Cas limites et faux positifs.**
- Même foyer, nouvel arrivant légitime : à vérifier avant de conclure (voir B2).
- Joueur banni d'un serveur qui rejoint un autre serveur : légitime si la sanction ne vise que le serveur (N4).
- Appel en cours : connexion interdite uniquement si la sanction est suspensive.

**Preuves requises.** Appareil/IP/empreintes communs, comportement identique, lien de paiement, aveu.

**Détection.** Automatique : correspondance d'empreintes avec la table `bans`. Manuelle : revue des nouveaux comptes aux caractéristiques proches.

**Sanctions.** Prolongation de la sanction initiale (durée doublée) ; seconde infraction : N5 ; en cas de N5 déjà prononcé, fermeture de tous les comptes liés.

**[GM]** Pour un N2 ou un N3 contourné (changement de pseudo, prêt de session), la durée doublée suffit ; le N5 pour « seconde infraction » n'est justifié que si le contournement d'un **N4** est caractérisé ou si la récidive est délibérée. Un joueur banni N4 qui rejoint un autre serveur n'enfreint rien (cas limites).

**[Juridique]**
- **Correspondance automatique avec la table `bans`** : elle peut alerter, mais pas refuser ni fermer seule un nouveau compte : le refus de contracter fondé sur un rapprochement automatique est une décision automatisée à effet significatif (RGPD art. 22 ; arrêt SCHUFA). Revue humaine avant toute fermeture.
- **« Fermeture de tous les comptes liés »** : à remplacer par « fermeture de tous les comptes **dont il est établi qu'ils sont tenus par le joueur banni** ». Un compte lié par l'IP ou le foyer n'est pas, à lui seul, un compte du joueur banni (B2, cas limites).
- **Données conservées pour détecter le contournement** : le strict nécessaire (identifiant du compte du lobby, adresse e-mail hachée, jeton du moyen de paiement), pour une durée fixée (proposition : la durée de la sanction, et 3 ans au plus pour un N5, à réexaminer ensuite), mentionnée dans la politique de confidentialité. Une liste d'exclusion de ce type entre dans le champ de l'AIPD (principe 7).

---

## 4. Règles du jeu : version joueurs (FR)

*Texte destiné à la vitrine, au lobby et aux CGU (en résumé). Vouvoiement, ton sobre. Texte provisoire, à relire par un juriste avant publication.*

### Règles du jeu de Kalendrath

Kalendrath se joue à plusieurs et ne vaut que si chacun joue à armes égales. Ces règles tiennent en quelques lignes. Les cas plus subtils sont détaillés dans nos conditions d'utilisation.

**Ce que nous attendons de vous**

1. **Jouez vous-même.** Chaque action de jeu (construire, recruter, envoyer une armée ou un héros, répondre à une attaque) est faite par vous, par un clic ou une commande. Les programmes, scripts et macros qui jouent à votre place sont interdits. Les outils qui se contentent d'afficher, de calculer ou de vous rappeler quelque chose sont les bienvenus ; ils utilisent une clé d'extension que vous créez vous-même, et qui ne peut jamais agir à votre place.
2. **Un compte par serveur.** Vous pouvez jouer sur plusieurs serveurs, un compte sur chacun. Si plusieurs personnes jouent depuis le même foyer, déclarez-le à l'équipe.
3. **Pas de transferts déguisés.** N'envoyez pas de ressources à un compte pour lui faire gagner du temps sans contrepartie réelle ; ne perdez pas un combat à dessein au profit d'un autre de vos comptes ou d'un complice. L'entraide d'alliance prévue par le jeu est permise.
4. **Votre compte est le vôtre.** Ne le vendez pas, ne l'achetez pas, ne le partagez pas. Une garde ponctuelle par un proche, de bonne foi, est tolérée : prévenez-nous.
5. **Pas d'argent contre du jeu, hors boutique.** Ne vendez ni n'achetez de ressources, d'objets, de héros, de comptes, de services de jeu ou de Kaelite contre de l'argent réel en dehors de la boutique officielle.
6. **Signalez les bugs.** Si vous découvrez une faille ou une erreur à votre avantage, signalez-la. L'exploiter sans la signaler, ou la répandre, est sanctionné. Les joueurs qui signalent sont remerciés.
7. **Respectez les protections.** La paix par défaut, la bannière d'alliance, les boucliers, les trêves et les ligues sont là pour que le PvP ne soit jamais subi. Ne les détournez pas. *[Revue : le Mode de Guerre individuel est remplacé par la bannière d'alliance (décision du 2026-10-30) ; noms définitifs en attente de R16 de l'étude PvP]*
8. **Pas d'abus des récompenses.** Une récompense d'arrivée, de parrainage ou d'event est pour une personne réelle qui joue réellement.
9. **Soyez courtois.** Pas d'insultes répétées, de harcèlement, de menaces, de propos haineux ou de contenus illégaux. Le roleplay et l'esprit de guerre sont bienvenus ; viser une personne ne l'est pas.
10. **Ne vous faites pas passer pour l'équipe**, ni pour un autre joueur.
11. **Payez honnêtement.** Les achats frauduleux ou les rétrofacturations abusives mènent à la fermeture du compte et peuvent donner lieu à des poursuites.
12. **Respectez la sécurité du jeu.** Ne tentez pas d'accéder à ce qui n'est pas ouvert. Si vous trouvez une faille de sécurité, écrivez-nous plutôt que de l'utiliser.
13. **Une sanction se respecte.** Recréer un compte pour la contourner l'aggrave.

*[GM] Ajout proposé, avant « Ce qui se passe en cas de manquement » :* **Ce que le jeu permet, et que nous ne sanctionnons pas.** Kalendrath est un jeu de guerre. Attaquer, piller, farmer un joueur plus faible dans les limites du serveur, coordonner une alliance, intimider « en personnage », provoquer, signer un pacte et le rompre, mentir en diplomatie, espionner par un autre joueur : tout cela fait partie du jeu. Nous ne sanctionnons pas ce que le serveur autorise. Notre limite est la personne réelle (insultes sur l'identité, menaces, divulgation de sa vie privée), la triche, la fraude et l'atteinte au service.

**Ce qui se passe en cas de manquement**

Nous allons de l'avertissement à la restriction temporaire (chat, envois, achats), à la suspension, puis au bannissement. Un manquement grave (fraude, vente de compte, harcèlement ciblé, atteinte à la sécurité) peut être sanctionné d'emblée. Toute sanction vous est notifiée avec ses motifs. Aucune sanction sévère ne repose sur un seul signal automatique.

*[Juridique] Ajout proposé :* Pour repérer la triche, nous analysons l'activité des comptes (connexions, rythme des actions, échanges entre comptes), en partie avec des outils automatiques. Ces outils peuvent signaler un compte ; ils ne décident jamais seuls d'une suspension ou d'un bannissement : une personne de l'équipe examine chaque dossier. La notification vous dit si un outil automatique a servi. Le détail figure dans notre politique de confidentialité.

*[Juridique] Ajout proposé :* Si votre compte du lobby est fermé pour une raison autre qu'une fraude au paiement, la Kaelite que vous avez achetée et pas encore dépensée vous est remboursée, selon nos conditions de vente. *(Rédaction à arrêter avec D4.)*

**Vous contestez une décision ?**

Vous avez 14 jours pour faire appel, par le formulaire du lobby ou à l'adresse indiquée dans la notification. Nous répondons par écrit, avec nos motifs, en général sous 10 jours ouvrés. Si nous avons eu tort, nous annulons la sanction et rétablissons ce qui a été retiré.

*[Juridique] Ajout proposé :* Passé ce délai, vous pouvez encore nous adresser une réclamation pendant 6 mois. Une personne, jamais un outil automatique, examine votre appel. Dans tous les cas, vous gardez le droit de saisir gratuitement le médiateur de la consommation [coordonnées à venir] ou les tribunaux. Si vous êtes mineur, l'un de vos parents peut faire appel en votre nom.

**Un doute ?** Écrivez-nous avant d'agir. Nous préférons répondre à une question que sanctionner une erreur.

## 5. Game rules: player version (EN)

*Text for the showcase site, the lobby and a summary in the terms of use. Formal and sober tone. Draft, to be reviewed by a lawyer before publication.*

### Kalendrath: rules of the game

Kalendrath is played together, and only works when everyone plays on equal terms. These rules fit in a few lines. Finer points are set out in our terms of use.

**What we expect of you**

1. **Play yourself.** Every game action (building, recruiting, sending an army or a hero, answering an attack) is performed by you, with a click or a command. Programs, scripts and macros that play for you are forbidden. Tools that only display, calculate or remind you of something are welcome; they use an extension key that you create yourself, and that can never act on your behalf.
2. **One account per server.** You may play on several servers, one account on each. If several people play from the same household, please tell the team.
3. **No disguised transfers.** Do not send resources to an account to save it time without a real return; do not lose a fight on purpose to benefit another of your accounts or an accomplice. Alliance mutual aid provided by the game is allowed.
4. **Your account is yours.** Do not sell it, buy it or share it. Occasional, good-faith care of your account by someone close to you is tolerated: let us know.
5. **No real money for game goods outside the shop.** Do not sell or buy resources, items, heroes, accounts, game services or Kaelite for real money outside the official shop.
6. **Report bugs.** If you find a flaw or an error in your favour, report it. Exploiting it without reporting it, or spreading it, is sanctioned. Players who report are thanked.
7. **Respect the protections.** Default peace, the alliance banner, shields, truces and leagues exist so that PvP is never forced on anyone. Do not misuse them. *[Revue: the individual War Mode is replaced by the alliance banner (decision of 2026-10-30); final names pending R16 of the PvP study]*
8. **No reward abuse.** A welcome, referral or event reward is for a real person who really plays.
9. **Be civil.** No repeated insults, harassment, threats, hateful remarks or illegal content. Roleplay and the spirit of war are welcome; targeting a person is not.
10. **Do not impersonate the team**, or another player.
11. **Pay honestly.** Fraudulent purchases and abusive chargebacks lead to account closure and may be pursued.
12. **Respect the game's security.** Do not try to reach what is not open. If you find a security flaw, write to us rather than use it.
13. **A sanction must be respected.** Creating a new account to avoid it makes it worse.

*[GM] Proposed addition, before "What happens in case of a breach":* **What the game allows, and what we do not sanction.** Kalendrath is a war game. Attacking, raiding, farming a weaker player within the server's limits, coordinating an alliance, intimidating in character, taunting, signing a pact and breaking it, lying in diplomacy, spying through another player: all of this is part of the game. We do not sanction what the server allows. Our limit is the real person (insults about identity, threats, exposing private life), cheating, fraud and harm to the service.

**What happens in case of a breach**

We go from a warning to a temporary restriction (chat, transfers, purchases), then to a suspension, then to a ban. A serious breach (fraud, account sale, targeted harassment, security breach) may be sanctioned immediately. Every sanction is notified to you with its reasons. No severe sanction rests on a single automated signal.

*[Juridique] Proposed addition:* To detect cheating, we analyse account activity (logins, pace of actions, exchanges between accounts), partly with automated tools. These tools may flag an account; they never decide a suspension or a ban on their own: a member of the team reviews every case. The notification tells you whether an automated tool was used. Details are in our privacy policy.

*[Juridique] Proposed addition:* If your lobby account is closed for a reason other than payment fraud, the Kaelite you bought and have not yet spent is refunded, under our terms of sale. *(Wording to be settled with D4.)*

**Do you disagree with a decision?**

You have 14 days to appeal, through the lobby form or at the address given in the notification. We reply in writing, with our reasons, usually within 10 working days. If we were wrong, we cancel the sanction and restore what was removed.

*[Juridique] Proposed addition:* After that period, you may still send us a complaint for 6 months. A person, never an automated tool, reviews your appeal. In every case, you keep the right to refer the matter, free of charge, to the consumer mediator [details to come] or to the courts. If you are a minor, one of your parents may appeal on your behalf.

**In doubt?** Write to us before acting. We would rather answer a question than sanction a mistake.

## 6. Décisions ouvertes

Les propositions sont de Claude ; rien n'est acté tant que Gregory n'a pas tranché.

| # | Décision | Proposition |
|---|---|---|
| D1 | **Foyer partagé** : faut-il un régime de comptes « liés déclarés » (échanges et attaques mutuels interdits, comme OGame) ? | Oui : déclaration par formulaire, comptes marqués dans le panneau, transferts et attaques entre eux bloqués par le serveur. |
| D2 | **Seuils chiffrés du push** (volume par jour, par semaine, par paire de comptes) | À fixer avec le simulateur de theorycrafting et le plafond de transferts, après les premières données de l'alpha fermée. |
| D3 | **Sitting** : durée maximale, déclaration obligatoire ou non, actions permises à un sitter | Déclaration en un clic, 7 jours maximum consécutifs, pas d'envoi de flotte vers un tiers ni d'achat. |
| D4 | **Sort de la Kaelite achetée en cas de N5** : conservée, remboursée au prorata, ou perdue ? | Perdue pour fraude de paiement, remboursable au prorata en cas de bannissement non lié à la fraude (juriste à consulter ; la Kaelite non dépensée reste sur le compte après la remise à zéro, GDD section 9). |
| D5 | **Délais d'appel** (14 jours pour déposer, 10 jours ouvrés pour répondre) : tenables avec une équipe d'une personne ? | Annoncer « en général 10 jours » sans garantie contractuelle ; second relecteur désigné (une personne de confiance de la communauté) à partir de la bêta. |
| D6 | **Gel conservatoire pendant l'enquête** : durée maximale et conséquences (production figée ou continue) | 7 jours maximum, jamais renouvelé sans motif écrit. |
| D7 | **Suspension (N3)** : la production du compte continue-t-elle, ou le temps est-il gelé ? | Le compte reste exposé aux bots PvE mais protégé en PvP (Mode Paix forcé), de façon à ne pas le détruire pendant la suspension. À vérifier avec le Mode de Guerre. |
| D8 | **Programme de signalement** : récompense pour un bug ou une faille signalée (Kaelite, titre, mention), page de divulgation responsable | Oui, barème simple (titre pour un bug mineur, Kaelite pour une faille importante). Cadrer avec l'audit de sécurité de l'API. |
| D9 | **Données des joueurs collectées par une extension** : consentement, publication hors du jeu | À régler avec la RGPD et les CGU : l'extension publique des classements est permise, la collecte détaillée de données individuelles non. |
| D10 | **Mineurs** : âge minimum, représentant légal dans l'appel et le paiement | À caler avec le cadre légal et le KIDS Act ; âge minimum de 16 ans à retenir par prudence, 13 ans avec accord parental. |
| D11 | **Conservation des journaux** (durée, finalités, accès) | 12 mois pour les journaux de jeu, 6 mois pour les journaux de connexion, durée plus longue pour les dossiers de sanction ; à valider avec le registre RGPD. |
| D12 | **Qui modère** : Gregory seul jusqu'à quand, quand recruter des modérateurs bénévoles, quelles limites de leurs droits (aucun accès aux paiements, pas de N4-N5 seuls) | Modérateurs de la communauté dès la bêta, droits N0-N2 et signalement, les N3 à N5 restent à Gregory. |
| D13 | **Infiltration et espionnage d'alliance** : autorisés comme jeu diplomatique ou interdits ? | Autorisés en jeu (rôle) tant qu'il n'y a ni vol de ressources par abus de droits, ni sabotage hors règles ; à valider avec la diplomatie du Mode de Guerre et des alliances. |
| D14 | **Mode de Guerre remis en question (2026-10-28)** : B7 et B3 dépendent de l'issue (PvP individuel ou AvA) | Réviser B3 (combats arrangés) et B7 après la décision AvA ; les règles de diplomatie et de casus belli ajouteront probablement un comportement « fausse déclaration de guerre ». *[Revue] Issue tranchée le 2026-10-30 : guerre d'alliances par bannière, tous les membres attaquables, pas d'interrupteur individuel ([étude PvP](etude-pvp.md)). Les mentions « Mode Paix / Mode de Guerre » de B2, B3, B7 et de l'échelle N2 sont à lire « bannière, état de guerre, bouclier, trêve » ; réécriture complète à faire avec la version 2 de ces fiches.* |
| D15 | **Détection du rythme non humain** : seuils et forme du contrôle (défi, délai, vérification) | À cadrer à la Phase 3b avec les limites de débit ; le contrôle ne doit jamais bloquer un joueur de bonne foi sans issue. |
| D16 | **Publication** : où et quand (CGU en Phase 7, page vitrine, Discord) et ce qu'on rend public de la liste détaillée (version joueurs ci-dessus, ou aussi les fiches) | Publier la version joueurs ; garder les fiches (détection, seuils) internes pour ne pas aider les tricheurs. |
| D17 | **Statistiques publiques de modération** (transparence : nombre de sanctions, d'appels, taux d'annulation) | Rapport trimestriel simple, à partir de la bêta. |

### [GM] Annotations sur les décisions ouvertes

- **D3, sitting** : 7 jours consécutifs est cohérent avec les pratiques d'OGame (mode vacances) ; en **guerre**, le sitter ne peut pas déclarer ou rompre un pacte, ni rendre une paix, sans accord du titulaire. Un joueur qui part en urgence doit pouvoir déléguer en un clic ; ne pas punir le sitting non déclaré à N1 s'il est ponctuel.
- **D5, délais d'appel** : tenable seul **seulement si** les P3 se traitent en lot et si les modèles existent (principe 10). Au-delà de ~15 sanctions N2+ par semaine sur un serveur, la double revue à froid de 48 h devient la première charge : prévoir un second relecteur avant ce seuil, non à la bêta par principe.
- **D7, suspension et PvP** : forcer le Mode Paix pendant un N3 crée un abus (un joueur « sanctionné » devient intouchable en guerre, et son alliance perd une cible mais garde le soutien). Proposition : pendant un N3, le compte est **protégé comme sous bouclier**, ne rapporte aucun point de guerre, et ne peut pas être compté dans le contrôle de tranche ; sa production continue. À valider avec l'étude PvP.
- **D12, modérateurs** : droits N0-N2 acceptables ; ajouter l'**interdiction de traiter un dossier d'un joueur de son alliance ou d'une alliance en guerre avec la sienne**, et un journal consultable des actions des modérateurs. Les bénévoles issus d'alliances actives sont les plus exposés au soupçon de favoritisme : préférer des modérateurs sans alliance de premier plan.
- **D13, infiltration et espionnage** : autorisés (rôle d'un tiers réel). Va aussi pour le vol de ressources **permis par les droits d'alliance** (trésorier qui s'enfuit avec le dépôt) : jeu légitime à la EVE **si** la fonction est dans le jeu et déclarée à la création de l'alliance, sinon décision de conception. Sont exclus : second compte du même joueur (B2), hameçonnage de mot de passe (B13), RMT (B5), harcèlement hors jeu (B9). Proposition : trancher oui, avec cette liste d'exclusions.
- **D14, fausse déclaration de guerre** : la rédaction proposée (« comportement fausse déclaration de guerre ») est à abandonner : une déclaration trompeuse est de la diplomatie, pas un comportement bannissable. Seuls les abus **techniques** du casus belli (griefs fabriqués par des comptes multiples, farm de griefs) relèvent de B2/B3/B7.
- **D17, statistiques** : vigilance sur la lecture publique du taux d'annulation : un taux bas peut être lu comme un laxisme, un taux élevé comme un arbitraire. Publier aussi le nombre de N0 pour montrer l'usage de la pédagogie.

### [Juridique] Annotations sur les décisions ouvertes

- **D4, Kaelite achetée en cas de N5 — correction.** Le remboursement « au prorata » n'a pas de sens pour une monnaie déjà payée : proposer le remboursement de **la Kaelite achetée non dépensée**, au prix effectivement payé (la Kaelite offerte en bonus, +30 % de la bêta, n'est pas remboursée), par le moyen de paiement d'origine. Motifs : une clause qui permet au professionnel de garder les sommes versées pour des prestations non fournies, ou qui prévoit une indemnité manifestement disproportionnée, est présumée abusive (Code de la consommation, art. R212-2, 3°, *vérifié via sources secondaires* ; exemple cité par la DGCCRF) ; en cas de résolution, les prestations non exécutées donnent lieu à restitution (Code civil, art. 1229, *texte connu, non relu*) ; le tribunal de Paris a jugé abusives en 2019 des clauses de Steam, dont, selon la presse, celle qui laissait à Valve les fonds du portefeuille à la clôture du compte (TGI Paris, 17 septembre 2019, UFC-Que Choisir c/ Valve, *probable* pour ce point ; issue de l'appel **non trouvée**). En cas de fraude de paiement, rien n'a été réellement payé : pas de remboursement. Un préjudice prouvé causé par le tricheur peut être réclamé, mais pas compensé d'office par une clause forfaitaire. **À valider par un avocat.**
- **D5, délais d'appel** : voir la correction de la procédure (appel prioritaire 14 jours, réclamation 6 mois, recours externes toujours mentionnés). Annoncer « en général » sans garantie contractuelle est correct.
- **D6, gel conservatoire** : 7 jours maximum, motivé dès son application (DSA art. 17), levé ou converti en sanction après revue humaine. Correct.
- **D9, données collectées par une extension** : l'auteur d'une extension qui collecte des données de joueurs en est responsable de traitement ; les conditions de l'API doivent l'interdire au-delà des données publiques du classement, et l'API ne doit pas exposer plus (RGPD art. 25).
- **D10, mineurs — compléments.** (1) Consentement RGPD seul à **15 ans** en France (loi Informatique et libertés, art. 45, *vérifié*), mais seulement pour ce qui repose sur le consentement ; le compte de jeu repose sur le contrat, qui pose la question de la capacité (Code civil, art. 1148). (2) La proposition de **règlement EU KIDS Act** (17 septembre 2026, *vérifié* qu'elle existe et vise les jeux en ligne ; non adoptée) envisage un âge minimum de 15 ans pour un compte propre sur les réseaux sociaux, la vérification d'âge pour les jeux, la transparence de la valeur des monnaies virtuelles ; son application exacte aux jeux reste **incertaine**. La proposition « 16 ans, ou 13 ans avec accord parental » reste prudente ; garder la possibilité de relever à 15 ou 16 ans sans exception selon l'issue du texte. (3) Sanction d'un mineur : notification en langage simple ; pour N4-N5 et pour tout ce qui touche à un paiement, information du parent dont le contact a été recueilli ; appel possible par le parent. (4) Victime mineure (harcèlement, sollicitation sexuelle) : traitement prioritaire et DSA art. 18.
- **D11, conservation des journaux — correction.** (1) Journaux techniques et de modération : la CNIL recommande en général **6 mois à 1 an**, en glissant, plus longtemps si justifié (jusqu'à 3 ans dans les cas courants) ou si une procédure est en cours (délibération 2021-122, *vérifié*). « 12 mois pour les journaux de jeu » est dans la fourchette. (2) **Les 6 mois proposés pour les journaux de connexion sont probablement trop courts** : en tant qu'hébergeur de contenus (chat, noms), Kalendrath doit conserver les données permettant d'identifier l'auteur d'un contenu, selon le décret n° 2021-1362 du 20 octobre 2021 pris pour l'art. 6 de la LCEN : identité déclarée jusqu'à 5 ans après la fin du contrat, autres informations du compte et de paiement et données techniques de connexion pendant 1 an (*probable* : durées recoupées dans un avis du Conseil d'État et une délibération de la CNIL, texte du décret non relu ; renumérotation de l'art. 6 par la loi SREN non vérifiée). Proposition : **1 an** pour les données de connexion liées à la création de contenus. (3) Dossiers de sanction : remplacer « durée plus longue » par des durées fixes, par exemple : N0-N2, effacement 12 mois après la fin de la sanction (fenêtre de récidive) ; N3-N5, conservation jusqu'à la fin des recours internes puis archivage restreint **5 ans** au plus (prescription de droit commun, Code civil art. 2224, *texte connu, non relu*), pour la seule défense en justice ; liste anti-contournement, voir B14. Les factures relèvent de leur propre durée légale (10 ans en comptabilité). **À valider dans le registre et par un avocat.**
- **D12, modérateurs bénévoles** : ils accèdent à des données personnelles pour le compte de Kalendrath : engagement de confidentialité écrit, accès limité au nécessaire, journalisation de leurs consultations (RGPD art. 29 et 32). Statut de bénévole (absence de lien de subordination) : **incertain**, à faire vérifier, la requalification en contrat de travail étant un risque connu de la modération bénévole.
- **D16, publication** : les seuils de détection peuvent rester internes, mais les CGU doivent décrire publiquement les restrictions possibles, les procédures et outils de modération, **y compris la prise de décision algorithmique et la revue humaine**, et la procédure de réclamation, en langage clair (DSA art. 14, § 1, *vérifié*). L'échelle N0-N5 et la procédure d'appel sont donc publiques.
- **D17, statistiques** : les rapports de transparence (DSA art. 15) ne s'imposent pas aux micro et petites entreprises ; la publication volontaire est une bonne pratique. Uniquement des chiffres agrégés, jamais de pseudonymes de joueurs sanctionnés.
- **D18 (nouvelle), modération par bot ou IA.** Proposition : un outil automatique ou un modèle d'IA peut **signaler** (mots-clés, rythme, analyse de messages), jamais **décider** au-delà du N0 ou d'une mesure technique réversible. Conditions : (1) l'usage d'outils automatiques est décrit dans les CGU (DSA art. 14) et signalé dans chaque exposé des motifs (art. 17, § 3, c) ; (2) un fournisseur d'IA externe qui reçoit des messages de joueurs est un **sous-traitant** : contrat RGPD (art. 28), pas de réutilisation pour l'entraînement, transferts hors UE encadrés, attention aux messages de mineurs ; (3) un bot (Discord ou en jeu) qui **converse** avec les joueurs doit dire qu'il est une IA (règlement sur l'IA, art. 50, § 1, applicable depuis le 2 août 2026, non reporté par l'omnibus numérique, *probable*) ; (4) la détection de triche ne fait pas partie des systèmes « à haut risque » de l'annexe III du règlement sur l'IA (*texte connu, non relu*) ; (5) surveiller les biais (langue étrangère, joueurs en situation de handicap aux rythmes atypiques).
- **D19 (nouvelle), documents RGPD à produire avant l'alpha fermée** : fiche du registre « modération et lutte contre la triche », mise en balance de l'intérêt légitime, AIPD simple, paragraphe dédié de la politique de confidentialité, procédure de violation de données. Avis d'avocat ciblé sur les empreintes d'appareil.
