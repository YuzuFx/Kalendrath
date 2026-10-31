# Procédure d'exercice des droits et de gestion des violations de données

*Document interne, non publié. Brouillon du 2026-10-30, à faire relire par un avocat (voir [README](README.md)). Il décrit ce que fait l'Éditeur quand une personne exerce ses droits (articles 12 à 22 du RGPD) et quand une violation de données survient (articles 33 et 34). Version anglaise : [08-procedure-droits-et-violations-en.md](08-procedure-droits-et-violations-en.md).*

---

# Partie A. Exercice des droits

## A1. Canaux de réception

- privacy@kalendrath.com (canal principal) ;
- courrier à l'adresse de l'Éditeur ;
- réglages du compte dans le lobby : « Télécharger mes données » et « Supprimer mon compte » (traitement automatique, sans intervention) ;
- toute demande arrivée par un autre canal (contact@, Discord, appel@) est **transférée le jour même** à privacy@ et traitée selon cette procédure : la personne n'a pas à utiliser un canal précis.

## A2. Délais

| Étape | Délai | Fondement |
|---|---|---|
| Accusé de réception | 3 jours ouvrés | Bonne pratique |
| Réponse | **1 mois** à compter de la réception | Article 12.3 du RGPD |
| Prolongation | **+ 2 mois** pour une demande complexe ou de nombreuses demandes, en informant la personne **dans le premier mois**, avec les motifs | Article 12.3 |
| Refus ou absence de suite | Dans le mois, avec les motifs et la mention du droit de réclamation auprès de la CNIL et du recours juridictionnel | Article 12.4 |

Le délai est suspendu le temps d'obtenir une information nécessaire à la vérification d'identité.

## A3. Vérification de l'identité

1. Demande envoyée **depuis l'adresse liée au compte** : identité présumée, aucune pièce exigée.
2. Demande depuis une autre adresse : envoyer un code de confirmation à l'adresse du compte, ou demander de se connecter au lobby et d'utiliser les réglages.
3. Ne **jamais** exiger de copie de pièce d'identité par défaut. Seulement en cas de doute sérieux et persistant, et dans ce cas la supprimer dès la vérification faite.
4. Demande d'un parent pour un mineur : vérifier le lien par l'adresse parentale enregistrée lors de l'accord parental, ou par un échange avec le compte.
5. Demande d'un mandataire : mandat signé et justification de l'identité du mandant.

## A4. Où se trouvent les données

| Système | Données | Accès |
|---|---|---|
| Base du lobby | Compte, âge, Kaelite achetée, achats, clés d'API, liens Discord et Patreon | Panneau d'administration, requêtes SQL |
| Base de chaque serveur (`sN`) | Personnage, cité, héros, messages, Kaelite gagnée, journaux de jeu | Panneau d'administration de chaque serveur |
| Journaux serveur | IP, connexions, appels API | Fichiers de journaux, 12 mois glissants |
| [À COMPLÉTER : prestataire d'envoi des courriels, non choisi] | Liste d'information, préinscription (pas en service au 31/10) *[Màj 31/10]* | Interface du prestataire |
| Stripe | Transactions, preuves de localisation fiscale | Tableau de bord Stripe ; Stripe reste responsable de ses propres traitements *[Màj 31/10]* |
| Rapports d'enquête publics | Pseudonyme, faits résumés, sanction | Page « Registre des sanctions » du lobby et du Jeu (nominatif) ; Discord et notes de version (anonymisé) : anonymisation sur opposition, rectification, retrait à 6 mois au plus *[Màj 31/10]* |
| OVH (messagerie) | Courriels échangés | Webmail |
| Discord | Rôles, messages sur notre serveur, journal de modération | Discord (outils de modération) ; Discord reste responsable du reste |
| Patreon | Données de soutien | Tableau de bord Patreon ; Patreon reste responsable du reste |
| Sauvegardes | Copie des bases | Effacement à l'expiration du cycle de rotation des sauvegardes |

## A5. Traitement par droit

**Accès (article 15).** Fournir : la confirmation du traitement ; une copie des données (export JSON lisible du lobby et de chaque serveur, historique Kaelite, achats, journaux de connexion des 12 derniers mois, dossier de sanction sans révéler les méthodes de détection ni les données de tiers) ; les finalités, catégories, destinataires, durées, droits, source des données, absence de décision automatisée au sens de l'article 22. Gratuit ; une copie supplémentaire peut donner lieu à des frais raisonnables. Retirer les données de tiers (identité d'un signaleur, messages d'autres joueurs hors conversation avec la personne).

**Rectification (article 16).** Corriger l'adresse, l'âge, la langue. Le pseudonyme se modifie par la fonction du jeu (règles de nom des CGU). Les données de jeu (progression, classement) ne se « rectifient » pas : elles reflètent le jeu.

**Effacement (article 17).** Supprimer le compte et les données de tous les serveurs, la liste d'information (chez le prestataire d'envoi), le lien Discord et Patreon. **Conserver** : pièces comptables (10 ans), données d'identification au titre de la LCEN (12 mois, dont adresse électronique, pseudonyme et données de paiement un an après la fermeture du compte), éléments anti-contournement d'un bannissement définitif (3 ans, renouvelables une fois après réexamen motivé) *[Revue : IM-11 point 5, IM-18]*, preuve du consentement et des échanges utiles à la défense de droits. Informer la personne de ce qui est conservé et pourquoi. Remplacer le pseudonyme par « Joueur supprimé » dans les messages et classements visibles. Prévenir que la Kaelite est perdue et proposer avant le remboursement de la Kaelite achetée non dépensée dans les cas prévus par les CGV.

**Limitation (article 18).** Marquer le compte comme « limité » : les données sont conservées mais non utilisées, sauf conservation ou défense de droits.

**Portabilité (article 20).** Export JSON structuré des données fournies par la personne et générées par son activité (compte, personnage, héros, messages envoyés), sur la base du contrat ou du consentement.

**Opposition (article 21).** Pour les traitements fondés sur l'intérêt légitime : examiner la situation particulière invoquée. Pour la sécurité et la lutte contre la triche, l'Éditeur peut faire valoir des motifs légitimes impérieux ; répondre de façon motivée. Pour la prospection : opposition toujours satisfaite, sans motif.

**Retrait du consentement (article 7.3).** Désinscription immédiate de la liste d'information.

**Directives post mortem (article 85 de la loi Informatique et Libertés).** Enregistrer la directive particulière transmise ; à la demande d'un héritier justifiant du décès, appliquer la directive ou, à défaut, clôturer le compte.

## A6. Registre des demandes

Tenir un tableau (fichier hors dépôt Git, chiffré) : n°, date de réception, canal, droit exercé, vérification d'identité, date de réponse, issue, prolongation éventuelle et motif. Conservation : 5 ans.

## A7. Modèles de réponse

**Accusé de réception (FR).**
> Bonjour, nous avons bien reçu votre demande du [date] relative à vos données personnelles ([droit]). Nous vous répondrons au plus tard le [date + 1 mois]. [Si nécessaire : Pour vérifier votre identité, merci de confirmer le code envoyé à l'adresse liée à votre compte.] L'équipe de Kalendrath.

**Accusé de réception (EN).**
> Hello, we have received your request of [date] regarding your personal data ([right]). We will reply no later than [date + 1 month]. [If needed: To verify your identity, please confirm the code sent to the address linked to your account.] The Kalendrath team.

**Réponse à une demande d'effacement (FR).**
> Bonjour, votre compte et vos données de jeu ont été supprimés le [date]. Conformément à la loi, nous conservons [liste] pendant [durées], pour [motifs] ; ces données ne sont utilisées à aucune autre fin. Vous pouvez saisir la CNIL (www.cnil.fr) si vous estimez que vos droits ne sont pas respectés. L'équipe de Kalendrath.

**Réponse à une demande d'effacement (EN).**
> Hello, your account and game data were deleted on [date]. As required by law, we keep [list] for [periods], for [reasons]; this data is used for no other purpose. You may contact the CNIL, the French data protection authority (www.cnil.fr), or the authority of your country if you believe your rights are not respected. The Kalendrath team.

---

# Partie B. Violations de données

Une violation de données personnelles est une atteinte à la sécurité entraînant, de manière accidentelle ou illicite, la destruction, la perte, l'altération, la divulgation non autorisée de données ou l'accès non autorisé à celles-ci (article 4.12 du RGPD). Exemples : base de données exposée, sauvegarde perdue, compte d'administration compromis, courriel envoyé au mauvais destinataire avec des données, fuite chez un sous-traitant, rançongiciel.

## B1. Chronologie

| Délai depuis la prise de connaissance | Action |
|---|---|
| Immédiatement | **Contenir** : couper l'accès compromis, révoquer les clés et jetons, changer les mots de passe d'administration, isoler le serveur, préserver les preuves (journaux, copies) sans les altérer |
| Sous 24 h | **Évaluer** (B2) ; consigner dans le registre des violations (B5) ; prévenir le sous-traitant concerné ou, si la violation vient de lui, exiger son rapport |
| Sous **72 h** | **Notifier la CNIL** si la violation est susceptible d'engendrer un risque pour les droits et libertés des personnes (article 33.1). Si toutes les informations ne sont pas connues, notifier quand même et compléter ensuite (article 33.4). Une notification au-delà de 72 h doit être motivée |
| Sans délai injustifié | **Informer les personnes** si le risque est élevé (article 34) |
| Dans les jours qui suivent | Corriger la cause, vérifier, réinitialiser ce qui doit l'être, compléter la notification, porter plainte si l'origine est malveillante |
| Sous 1 mois | Retour d'expérience écrit, mise à jour du registre des traitements et des mesures de sécurité |

**Sous-traitants.** Chaque contrat doit obliger le sous-traitant à notifier l'Éditeur dans les meilleurs délais après avoir pris connaissance d'une violation (article 33.2).

## B2. Évaluation du risque

Questions à se poser : quelles données (adresse, mot de passe haché, IP, messages privés, données de paiement, données de mineurs) ; combien de personnes ; les données sont-elles chiffrées ou hachées de façon robuste ; sont-elles exploitables par un tiers ; conséquences possibles (hameçonnage, prise de compte, atteinte à la réputation, perte financière).

| Niveau | Exemples | CNIL | Personnes |
|---|---|---|---|
| Risque improbable | Sauvegarde chiffrée perdue dont la clé n'est pas compromise ; erreur interne sans accès d'un tiers | Pas de notification, consignation au registre | Non |
| Risque | Fuite d'adresses électroniques et de pseudonymes ; accès non autorisé à des journaux d'IP | **Notification sous 72 h** | Non, sauf choix de transparence |
| Risque élevé | Fuite de mots de passe faiblement protégés, de messages privés, de données de mineurs, d'informations de paiement, de données permettant une usurpation | **Notification sous 72 h** | **Oui, sans délai** |

L'information des personnes n'est pas exigée si les données étaient rendues incompréhensibles (chiffrement), si des mesures ultérieures ont supprimé le risque élevé, ou si elle exigerait des efforts disproportionnés (une communication publique la remplace alors) (article 34.3).

## B3. Contenu de la notification à la CNIL

Par le téléservice de notification de la CNIL (www.cnil.fr, rubrique « Notifier une violation de données personnelles »). Contenu exigé par l'article 33.3 :

1. nature de la violation, catégories et nombre approximatif de personnes concernées, catégories et nombre approximatif d'enregistrements ;
2. nom et coordonnées du point de contact (privacy@kalendrath.com) ;
3. conséquences probables ;
4. mesures prises ou envisagées pour remédier à la violation et en atténuer les effets.

## B4. Message aux personnes concernées (article 34)

Envoyé par courriel et affiché dans le lobby, en français et en anglais, en termes clairs : nature de la violation ; contact ; conséquences probables ; mesures prises ; ce que la personne peut faire.

**Modèle (FR).**
> **Incident de sécurité concernant votre compte Kalendrath.** Le [date], nous avons découvert que [description simple]. Les données concernées sont : [liste]. [Ne sont pas concernées : …]. Nous avons immédiatement [mesures]. Ce que nous vous recommandons : [changer votre mot de passe sur Kalendrath et partout où vous utilisez le même ; vous méfier des courriels qui se réclament de Kalendrath et vous demandent vos identifiants]. Nous ne vous demanderons jamais votre mot de passe. Nous avons informé la CNIL. Pour toute question : privacy@kalendrath.com. Nous sommes désolés de cet incident. L'équipe de Kalendrath.

**Modèle (EN).**
> **Security incident concerning your Kalendrath account.** On [date], we discovered that [plain description]. The data concerned is: [list]. [Not concerned: …]. We immediately [measures]. What we recommend: [change your password on Kalendrath and anywhere you use the same one; be wary of emails claiming to be from Kalendrath and asking for your credentials]. We will never ask for your password. We have informed the CNIL, the French data protection authority. Any question: privacy@kalendrath.com. We are sorry for this incident. The Kalendrath team.

## B5. Registre des violations (article 33.5)

Toute violation est consignée, **même non notifiée** : date et heure de découverte, date de la violation, description, données et personnes concernées, évaluation du risque et sa justification, mesures prises, notification CNIL (date, numéro) ou motif de non-notification, information des personnes ou motif, retour d'expérience. Conservation : 5 ans.

## B6. Contacts utiles

- CNIL, téléservice de notification des violations : www.cnil.fr.
- Assistance aux victimes de cybermalveillance : www.cybermalveillance.gouv.fr.
- Plainte pour accès frauduleux à un système (articles 323-1 et suivants du Code pénal) : commissariat, gendarmerie ou plainte en ligne.
- Stripe (fraude, cartes) : [À COMPLÉTER : contact sécurité de Stripe, depuis le tableau de bord].
- OVH (hébergement) : [À COMPLÉTER : contact d'urgence OVHcloud, depuis l'espace client].
- Cloudflare, OVH, prestataire d'envoi des courriels : support depuis l'espace client de chacun.

## B7. Préparation (à faire avant l'alpha)

- Lister et sauvegarder hors ligne les accès d'urgence (codes de secours 2FA).
- Tester une restauration de sauvegarde.
- Vérifier que chaque contrat de sous-traitance contient la clause de notification.
- Préparer les modèles B4 dans le système d'envoi de courriels.
- Faire un exercice sur table d'une demi-heure (scénario : base de données du lobby exposée) avant la bêta.
