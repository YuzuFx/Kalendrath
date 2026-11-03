# Registre des activités de traitement (simplifié)

*Document interne, non publié. Tenu en application de l'article 30.1 du RGPD : l'exemption des structures de moins de 250 personnes (article 30.5) ne s'applique pas, car les traitements de Kalendrath sont réguliers et non occasionnels. À présenter à la CNIL sur demande. Brouillon du 2026-10-30, à compléter à chaque nouveau traitement ou prestataire, et à revoir au moins une fois par an. Version anglaise : [07-registre-des-traitements-en.md](07-registre-des-traitements-en.md). Modèle de référence : registre simplifié proposé par la CNIL.*

## 0. Responsable du traitement

| | |
|---|---|
| Responsable | [À COMPLÉTER : prénom et nom] EI, entrepreneur individuel exerçant sous le nom commercial « Kalendrath » *[Revue : IM-12]* |
| Adresse | [À COMPLÉTER : adresse] |
| SIREN | [À COMPLÉTER : SIREN] |
| Contact données personnelles | privacy@kalendrath.com |
| Délégué à la protection des données | Aucun (non obligatoire, article 37 du RGPD) |
| Représentant hors UE | Sans objet (responsable établi en France) |
| Date de création du registre | [À COMPLÉTER : date] |
| Dernière revue | [À COMPLÉTER : date] |

## 1. Fiches de traitement

Pour chaque traitement : finalité, base légale (article 6), personnes concernées, catégories de données, destinataires, transferts hors UE, durée de conservation, mesures de sécurité (renvoi à la section 3).

### T1. Liste d'information et préinscription à la bêta

| | |
|---|---|
| Statut | **Prévu, pas en service** : aucune liste ni aucun prestataire d'envoi au 31/10/2026 *[Màj 31/10]* |
| Finalités | Envoi des actualités du projet ; préinscription à la bêta et attribution des bonus de préinscription |
| Base légale | Consentement (6.1.a) ; article L34-5 du CPCE ; article 8 du RGPD (âge) |
| Personnes | Visiteurs de 16 ans ou plus inscrits sur la vitrine |
| Données | Adresse électronique, langue, source d'inscription, confirmation « 16 ans ou plus », preuve du consentement (date, double validation). Pas de statistiques individuelles d'ouverture ni de clic sans consentement distinct *[Màj 31/10 : BL-4, MIN-3]* |
| Destinataires | Éditeur ; [À COMPLÉTER : prestataire d'envoi (sous-traitant), à choisir] |
| Transferts hors UE | [À COMPLÉTER : selon le prestataire ; à vérifier, avec ses sous-traitants ultérieurs, avant tout choix] |
| Conservation | Jusqu'au retrait ; relance puis suppression après 3 ans sans interaction ; preuve du consentement 5 ans après le retrait |
| Point de collecte | Formulaire de la vitrine : case de consentement non cochée, case « J'ai 16 ans ou plus » non cochée, double opt-in, mention d'information, lien vers la politique |
| Exigences pour le choix du prestataire | Contrat de l'article 28 ; données dans l'UE de préférence ; suivi d'ouverture et de clic désactivable (désactivé par défaut) ; double opt-in natif ; lien de désinscription en un clic ; export et suppression des contacts *[Màj 31/10]* |

### T2. Gestion des comptes et fonctionnement du jeu

| | |
|---|---|
| Finalités | Création et gestion du compte lobby, authentification unique vers les serveurs, fonctionnement du jeu, classements, courriels de service |
| Base légale | Contrat (6.1.b) |
| Personnes | Joueurs |
| Données | Adresse électronique, pseudonyme, mot de passe haché, langue, âge déclaré, dates d'inscription et de connexion, serveurs ; données de jeu par serveur (cité, héros, progression, alliance, classements, messages) |
| Destinataires | Éditeur ; modérateurs (accès limité) ; OVH SAS, hébergeur des VPS (sous-traitant) ; Cloudflare (acheminement du trafic, sous-traitant) ; [À COMPLÉTER : prestataire des courriels de service] (sous-traitant) ; autres joueurs pour les éléments publics ; extensions d'autres joueurs pour les seules données publiques, par l'API en lecture *[Màj 31/10]* |
| Transferts hors UE | Aucun pour l'hébergement si le centre de données OVH choisi est dans l'UE [À COMPLÉTER : localisation] ; Cloudflare, Inc. (États-Unis) |
| Conservation | Durée du compte ; inactivité 3 ans (5 ans si Kaelite achetée), préavis 60 jours puis suppression ou anonymisation ; données d'un serveur fermé supprimées sous 6 mois, classements historiques réduits au pseudonyme (« Joueur supprimé » après suppression du compte) ; après fermeture du compte, adresse électronique, pseudonyme et données de paiement en archive restreinte 1 an (obligation des hébergeurs) *[Revue : IM-11, points 3, 5, 6 et 7 ; MI-6]* |

### T3. Vérification de l'âge et protection des mineurs

| | |
|---|---|
| Finalités | Âge minimum, accord parental avant 15 ans, plafond de dépense des mineurs |
| Base légale | Contrat (6.1.b, application des conditions d'âge des CGU) et intérêt légitime (6.1.f) ; obligation légale pour la liste d'information fondée sur le consentement (article 8 du RGPD, article 45 de la loi Informatique et Libertés) *[Revue : MIN-2]* |
| Personnes | Joueurs mineurs ; titulaires de l'autorité parentale |
| Données | Âge déclaré, adresse électronique du parent, preuve de l'accord, plafond et dépenses |
| Destinataires | Éditeur |
| Conservation | Durée du compte ; preuve de l'accord 5 ans après la fermeture |

### T4. Journaux techniques, sécurité et lutte contre la triche

| | |
|---|---|
| Finalités | Sécurité, détection et instruction de la triche, réponse aux réquisitions, conservation des données d'identification des auteurs de contenus |
| Base légale | Intérêt légitime (6.1.f) ; obligation légale (article 6 (V, A) de la loi n° 2004-575, LCEN ; décret n° 2021-1362) |
| Personnes | Joueurs, visiteurs du lobby, utilisateurs de l'API |
| Données | IP, horodatages, agent utilisateur et en-têtes transmis par le navigateur (aucune empreinte calculée dans le navigateur), identifiant de session, actions de jeu, appels API, signaux de détection (profilage au sens de l'article 4.4) ; filtrage par mots-clés des messages publics et d'alliance |
| Destinataires | Éditeur ; modérateurs pour les signaux utiles à une enquête ; autorités sur réquisition |
| Conservation | 12 mois glissants |
| Décision automatisée | Non au sens de l'article 22 : alertes et restrictions techniques temporaires seulement ; toute sanction au-delà de N1, tout gel conservatoire, tout refus ou fermeture de compte et tout blocage d'achat décidés par un humain |
| Analyse d'impact | Requise (profilage pouvant conduire à l'exclusion du service, liste CNIL, délibération 2018-327 ; présence de mineurs ; liste anti-contournement). AIPD simple à rédiger avant l'alpha fermée, avec la mise en balance de l'intérêt légitime (D19) *[Revue : BL-3, IM-6, IM-7, MI-2]* |

### T5. Modération, signalements, sanctions et appels

| | |
|---|---|
| Finalités | Traitement des signalements (DSA, article 16), sanctions motivées (article 17), appels, prévention du contournement |
| Base légale | Obligation légale ; contrat ; intérêt légitime |
| Personnes | Joueurs signalés, auteurs de signalements, membres du Discord |
| Données | Contenu signalé et contexte, identité du signaleur, faits, preuves, sanction, motifs, appel |
| Destinataires | Éditeur ; modérateurs ; autorités (article 18 du DSA, réquisitions) |
| Données relatives à des infractions | Limitées au dossier du cas, conservées pour la constatation, l'exercice ou la défense de droits en justice ; pas de liste générale de fraudeurs (article 10 du RGPD, article 46 de la loi Informatique et Libertés ; à valider par un avocat) |
| Conservation | Dossier : 3 ans après la fin de la sanction, ou après la décision définitive pour un bannissement ; bannissement définitif : courriel haché et empreinte du moyen de paiement 3 ans, renouvelables une fois après réexamen motivé ; signalements sans suite : 6 mois *[Revue : IM-5, IM-11 point 8, IM-18]* |
| Rapports d'enquête internes | Le dossier de chaque cas N3 et plus comprend un rapport d'enquête (faits, preuves figées avec empreinte numérique, analyse, décision), qui sert à la notification motivée, à l'appel et, le cas échéant, au rapport public (T5 bis) *[Màj 31/10]* |

### T5 bis. Rapports d'enquête publics *[Màj 31/10]*

*Décision de Gregory du 2026-10-31, alignée sur la section 2.5 de [comportements-bannissables.md](../comportements-bannissables.md) (v2). À valider par l'avocat avant le premier rapport publié (voir le README).*

| | |
|---|---|
| Finalités | Transparence de la modération ; justification des sanctions ; dissuasion de la triche ; information des joueurs lésés |
| Base légale | Intérêt légitime (6.1.f). Mise en balance écrite à documenter dans l'AIPD (T4) : pourquoi le rapport anonymisé et les statistiques ne suffisent pas dans les cas publiés sous pseudonyme |
| Personnes | Joueurs sanctionnés (rapport anonymisé : tous niveaux ; rapport nominatif : N4 ou N5 seulement, certitude établie, codes B1, B2, B3, B5, B6, B8, B12, B14, B15, B4 pour le revendeur) |
| Exclusions | Jamais nominatif : mineurs ; B9, B10, B11, B13 (faits susceptibles d'être des infractions pénales, article 10 du RGPD, article 46 de la loi Informatique et Libertés) ; procédure pénale ou judiciaire en cours ; faits antérieurs à la clause des CGU |
| Données publiées | Identifiant du dossier, Serveur, pseudonyme de jeu (nominatif seulement), règle, période et faits neutres, sanction, mesures pour les joueurs lésés. Jamais : nom réel, courriel, IP, paiement, messages privés, signaleurs, victimes, tiers non sanctionnés, méthode de détection, qualification pénale |
| Moment | Après la décision définitive (appel tranché ou délai de 14 jours expiré) ; projet de texte communiqué au joueur dans la notification |
| Destinataires | Nominatif : joueurs connectés, page « Registre des sanctions » du lobby et du Jeu, non indexée. Anonymisé : public, Discord, notes de version |
| Transferts hors UE | Aucun pour le nominatif (lobby et Jeu chez OVH) ; rapports anonymisés sur Discord (États-Unis), hors champ du RGPD s'ils sont réellement anonymes |
| Conservation | Nominatif : fin du chapitre du Serveur, 6 mois au plus, puis anonymisation ou retrait automatique ; retrait pendant une réclamation ou une action, suppression si la sanction est annulée ou réduite sous N4. Anonymisé : historique du Serveur. Archive interne selon T5 |
| Droits | Opposition (article 21) pendant le délai d'appel, acceptée par défaut (publication anonymisée) sauf motif impérieux écrit au dossier ; rectification, effacement ; droit de réponse |

### T6. Ventes de Kaelite, paiements et comptabilité

| | |
|---|---|
| Finalités | Exécution des ventes, crédit de Kaelite, rétractation et remboursements, plafond des mineurs, lutte contre la fraude, comptabilité et fiscalité |
| Base légale | Contrat ; obligation légale ; intérêt légitime (fraude) |
| Personnes | Acheteurs |
| Vendeur | L'Éditeur est le vendeur légal de la Kaelite ; Stripe n'est que prestataire de paiement (Stripe Managed Payments exclu : ses conditions interdisent la vente de monnaie virtuelle, voir l'[étude Stripe](../etude-stripe.md)) *[Màj 31/10]* |
| Données | Identifiant de compte, offre, montant, pays et preuves de localisation pour la TVA (pays déclaré, adresse de facturation ou pays de la carte, IP à l'achat), date, identifiant de transaction, statut, renonciation à la rétractation, factures ; aucune donnée bancaire complète (type, quatre derniers chiffres, pays et empreinte de carte fournis par Stripe) |
| Destinataires | Éditeur ; Stripe Payments Europe, Limited (paiement, Stripe Tax, Radar ; responsable distinct pour ses propres finalités, sous-traitant pour le reste [À VÉRIFIER : accord de traitement des données de Stripe]) ; comptable ; administration fiscale *[Màj 31/10]* |
| Décision automatisée | Refus automatique d'un paiement par Stripe Radar, sous la responsabilité de Stripe ; aucun blocage du compte de jeu sans examen humain (T4) *[Màj 31/10]* |
| Transferts hors UE | Stripe, Inc. (États-Unis) pour une partie des traitements de Stripe : cadre UE-États-Unis et clauses contractuelles types [À VÉRIFIER dans le contrat Stripe] |
| Conservation | Pièces comptables 10 ans (article L123-22 du Code de commerce) ; preuve de transaction 5 ans ; données antifraude 13 mois |

### T7. Soutiens Patreon

| | |
|---|---|
| Finalités | Remise des contreparties, correspondance avec les soutiens |
| Base légale | Contrat |
| Personnes | Soutiens Patreon |
| Données | Nom ou pseudonyme Patreon, adresse électronique, palier, statut |
| Destinataires | Éditeur. Patreon, Inc. est responsable distinct pour son service |
| Transferts hors UE | Données reçues depuis Patreon (États-Unis) ; aucune réexportation |
| Conservation | Durée du soutien puis 3 ans ; crédits jusqu'à demande de retrait |

### T8. Communauté Discord

| | |
|---|---|
| Finalités | Animation, modération, rôles, tests, annonces, liaison de compte à la demande |
| Base légale | Intérêt légitime ; contrat pour la liaison de compte |
| Personnes | Membres du serveur Discord |
| Données | Identifiant et pseudonyme Discord, rôles, messages, signalements, journal de modération, lien avec le compte de jeu |
| Destinataires | Éditeur, modérateurs. Discord est responsable distinct pour sa plateforme |
| Transferts hors UE | Plateforme Discord (États-Unis), sous la responsabilité de Discord |
| Conservation | Journal de modération 12 mois ; lien de compte jusqu'à suppression |
| Point à suivre | Possible responsabilité conjointe avec Discord pour les statistiques du serveur (jurisprudence CJUE, C-210/16, *Wirtschaftsakademie*) : voir le [README](README.md) |

### T9. Support, contact et exercice des droits

| | |
|---|---|
| Finalités | Réponse aux demandes de support, presse, partenariat, appel, exercice des droits |
| Base légale | Intérêt légitime ; obligation légale (droits) |
| Personnes | Toute personne qui nous écrit |
| Données | Adresse électronique, identité déclarée, messages, pièces jointes, identifiant de compte |
| Destinataires | Éditeur ; OVH (messagerie, sous-traitant) |
| Conservation | 3 ans après le dernier échange ; demandes d'exercice des droits 5 ans ; registre des demandes : voir la [procédure](08-procedure-droits-et-violations.md) |

### T10. Mesure d'audience de la vitrine

| | |
|---|---|
| Finalités | Statistiques de fréquentation agrégées |
| Base légale | Intérêt légitime ; exemption de consentement (article 82 de la loi Informatique et Libertés, lignes directrices CNIL) |
| Personnes | Visiteurs de la vitrine |
| Données | Données techniques de visite agrégées, sans cookie ni identifiant |
| Destinataires | Éditeur ; Cloudflare (sous-traitant) |
| Transferts hors UE | Cloudflare, Inc. (États-Unis) : cadre UE-États-Unis (décision (UE) 2023/1795) et clauses contractuelles types |
| Conservation | Statistiques agrégées 25 mois au plus |

### T11. API et clés d'extension

| | |
|---|---|
| Finalités | Fonctionnement de l'API, limites de débit, détection des abus, révocation |
| Base légale | Contrat ; intérêt légitime |
| Personnes | Joueurs créateurs de clés, développeurs d'extensions ; tous les joueurs, dont les données publiques sont lisibles par l'API *[Revue : IM-11, point 3]* |
| Données | Clé hachée, droits, date de création, journal d'appels |
| Destinataires | Éditeur |
| Conservation | Clé jusqu'à révocation ; journaux 12 mois |

### T12. Parrainage *[Revue : MI-17]*

| | |
|---|---|
| Statut | **Prévu, pas en service** : mécanique à l'étude ([étude du parrainage](../etude-parrainage.md)), rien de codé au 03/11/2026. Fiche créée d'avance pour combler la lacune MI-17 ; à confirmer ou à ajuster au codage *[Màj 03/11]* |
| Finalités | Attribuer une récompense en Kaelite gagnée au parrain et au filleul quand le filleul franchit des paliers de progression ; détecter les abus (auto-parrainage, comptes liés) |
| Base légale | Récompense : exécution du contrat (6.1.b), le parrainage étant une fonction du service décrite dans les CGU ; lutte contre la fraude : intérêt légitime (6.1.f), avec mise en balance à rédiger dans l'AIPD de T4 (D19) |
| Personnes | Joueurs parrains ; joueurs filleuls (inscrits par un lien ou un code de parrainage). **Aucune donnée sur des tiers non inscrits** : aucune adresse électronique d'ami saisie, aucun import de contacts, aucun message d'invitation envoyé par Kalendrath |
| Données | Code de parrainage (identifiant aléatoire par compte) ; lien parrain-filleul (deux identifiants de compte, date de rattachement) ; paliers atteints (palier, date, serveur) ; récompenses versées ou en attente. Pour la détection des abus : seuls les signaux déjà collectés par T4 (IP, horodatages, agent utilisateur), **sans nouvelle collecte et sans empreinte d'appareil** |
| Ce que voit le parrain | Le pseudonyme de jeu du filleul et le palier atteint, jamais l'adresse électronique, l'IP ni l'âge déclaré ; le filleul peut masquer son pseudonyme (« Un joueur invité ») |
| Destinataires | Éditeur ; modérateurs, pour les seuls cas de versement bloqué (accès limité au dossier du cas) ; le parrain et le filleul, pour les éléments ci-dessus. Aucun sous-traitant nouveau |
| Transferts hors UE | Ceux de T2 et T4 (hébergement OVH ; Cloudflare, États-Unis), sans transfert propre au parrainage |
| Conservation | Lien et paliers : jusqu'à la clôture du parrainage (180 à 365 jours, selon la fenêtre de palier), puis 12 mois pour la défense en cas de litige sur la récompense, puis suppression ou anonymisation. Dossier d'un versement bloqué : régime de T5 (limité au cas). **Durées proposées, à arrêter avec l'avocat** |
| Décision automatisée | Non au sens de l'article 22 : un recoupement de signaux **suspend** un versement et déclenche une revue humaine ; aucune sanction, aucun refus définitif ni aucune fermeture de compte sans décision humaine. Profilage au sens de l'article 4.4 : à couvrir dans l'AIPD de T4 |
| Mineurs | Pas de mise en avant du parrainage à l'inscription, pas de message invitant à recruter des camarades ; plafonds de gain par serveur ; règle d'âge des CGU applicable aux deux côtés du lien |
| Droits | Accès et portabilité : lien et paliers du compte. Effacement du compte du filleul : le lien nominatif est supprimé, la récompense déjà versée au parrain reste acquise. Opposition à l'intérêt légitime : examinée au cas par cas, sans effet sur la revue des versements en cours. Les deux côtés du lien sont traités dans la [procédure 08](08-procedure-droits-et-violations.md) |
| Point de collecte | Inscription par un lien ou un code : phrase d'information au filleul (articles 13 et 14 du RGPD) et renvoi à la politique de confidentialité |
| Analyse d'impact | Couverte par celle de T4 si elle est étendue aux versements bloqués ; à confirmer |

## 2. Sous-traitants (article 28 du RGPD)

| Sous-traitant | Traitements | Localisation | Garanties | Contrat de sous-traitance signé |
|---|---|---|---|---|
| OVH SAS | T2 à T6, T11 (VPS) ; T9 (messagerie) ; noms de domaine *[Màj 31/10]* | [À COMPLÉTER : centre de données choisi, dans l'UE] | Contrat OVHcloud et son accord de traitement des données | [À COMPLÉTER : date d'acceptation] |
| Cloudflare, Inc. | Vitrine, DNS, protection, T2, T4, T10, T11, contrôle anti-robot *[Revue : IM-11, point 6]* | États-Unis et réseau mondial | Cadre UE-États-Unis, clauses contractuelles types | [À COMPLÉTER : date d'acceptation du DPA Cloudflare] |
| [À COMPLÉTER : prestataire d'envoi des courriels, non choisi] | T1, courriels de service *[Màj 31/10 : Brevo n'est ni choisi ni en place]* | [À COMPLÉTER] | [À COMPLÉTER] | [À COMPLÉTER : date] |
| Stripe Payments Europe, Limited | T6, pour la part où Stripe agit comme sous-traitant *[Màj 31/10]* | Irlande ; Stripe, Inc. (États-Unis) | Accord de traitement des données de Stripe, cadre UE-États-Unis, clauses contractuelles types [À VÉRIFIER] | [À COMPLÉTER : date d'activation du compte] |

Responsables distincts (pas de contrat de sous-traitance) : Patreon, Inc. (T7), Discord (T8), Stripe pour ses propres finalités (T6).

**Règle interne sur les outils d'intelligence artificielle.** Les données personnelles des joueurs (bases de production, journaux, courriels de support, dossiers de sanction) ne sont pas transmises à un outil d'IA générative, y compris l'assistant de développement. Les tests et le développement se font sur des données fictives ou anonymisées. Toute exception exigerait d'ajouter le fournisseur à ce tableau et de mettre à jour la politique de confidentialité. Une modération assistée par IA (décision D18 des comportements bannissables, étude des bots Grok) imposerait d'abord un sous-traitant déclaré, un contrat de l'article 28 et la mise à jour de la politique de confidentialité, qui affirme aujourd'hui l'inverse (section 3). *[Revue : MI-17]*

## 3. Mesures de sécurité (article 32 du RGPD)

- Chiffrement des échanges (HTTPS partout, HSTS).
- Mots de passe hachés (algorithme de Laravel : bcrypt ou Argon2id), clés d'API hachées, secrets hors du dépôt Git.
- Authentification à deux facteurs sur tous les comptes d'administration (OVH, Cloudflare, prestataire de courriels, Stripe, Patreon, Discord, GitHub, panneau d'administration du jeu).
- Droits des modérateurs limités : pas d'accès aux paiements, ni aux N3 à N5 seuls.
- Sauvegardes quotidiennes chiffrées, dont une copie hors du serveur, testées par une restauration au moins trimestrielle.
- Mises à jour de sécurité du système, de PHP et des dépendances ; suivi des correctifs de l'amont OGameX.
- Journalisation des accès d'administration ; limitation des tentatives de connexion.
- Pseudonymisation des données utilisées pour les statistiques internes.
- Procédure de violation de données : [08-procedure-droits-et-violations.md](08-procedure-droits-et-violations.md).

## 4. Historique des modifications du registre

| Date | Modification | Auteur |
|---|---|---|
| 2026-10-30 | Création du brouillon | Claude Code, à valider par l'Éditeur |
| 2026-10-30 | Reprise des corrections non controversées de la revue juridique et de la revue comptable (T2 à T5, T11, sous-traitants, règle IA) | Claude Code, revue générale |
| 2026-10-31 | Décisions de Gregory : OVH (hébergement, domaines), Stripe classique (T6), T1 prévu mais pas en service (Brevo retiré, exigences ajoutées), T5 bis rapports d'enquête publics | Claude Code, à valider par l'Éditeur |
| 2026-11-03 | Fiche T12 (parrainage, MI-17), prévue et non en service | Claude Code, à valider par l'Éditeur |
