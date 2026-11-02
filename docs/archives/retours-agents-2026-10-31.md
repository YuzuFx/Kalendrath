# Retours des agents — PvP, parrainage, Stripe, Grok Bots (30-31/10/2026)

Archive des comptes rendus finaux de quatre agents. Ces sujets sont **mis de côté** par décision de Gregory (2026-11-01) : ni validés, ni intégrés tant qu'ils ne sont pas contrôlés. Les documents complets restent dans `docs/` ; la liste des contrôles à faire est dans [../taches-a-valider.md](../taches-a-valider.md).

Ces textes sont des comptes rendus de modèles, relayés tels quels : ils n'ont pas été relus par Claude ni par Gregory.

## 1. PvP — mise à jour boucliers, mode vacances, débris

Document : [../etude-pvp.md](../etude-pvp.md) (+ bloc 5.4 du GDD modifié).

- Plafond de 3 boucliers et interdiction du mode vacances retirés ; lecture « taxe à la sécurité » retirée. Risques réexaminés en 4.3, débris chiffrés en 4.6 (d'après le code ; la bataille type est un ordre de grandeur, pas une simulation). Deux questions simulateur ajoutées : S13 (débris), S14 (alternance vacances / boucliers).
- **Risque 1 (le plus grave)** : si « hostile » ne couvre que l'attaque, un producteur sous bouclier ravitaille les combattants de son alliance (boosting de Last War). Recommandation : compter aussi transport, déploiement, défense groupée et récolte de débris pendant une guerre (R4).
- **Risque 2** : sans plafond de stock, seul le rythme de gain limite la couverture gratuite. Proposition : 1 bouclier par semaine avec plafond de gain (le stock reste illimité). À trancher : bouclier activé juste avant l'impact ; défi accepté puis entièrement couvert.
- **Risque 3** : les débris rapportent environ 7 fois le butin dans la bataille type, ce qui rend rentable la destruction d'armée ; avec l'Hôpital un combat peut créer des ressources. Pistes : ne compter que les pertes définitives, réserver la récolte aux belligérants, taux de guerre à simuler à partir de 15 %.
- **Risque 4** : le mode vacances n'a pas de durée maximale et peut couvrir une guerre, mais coupe la production. À confirmer : délai de 12 h après une attaque menée ; refus si une attaque ennemie est déjà en vol (le code ne vérifie qu'au départ) ; test de ce cas.
- Incohérence connue : la règle R9 de l'étude contredit la décision de Gregory sur le mode vacances.

## 2. Parrainage

Document : [../etude-parrainage.md](../etude-parrainage.md).

- Mécanique en 4 paliers de cité (Bourg + 5 jours de connexion, Cité fortifiée, Citadelle, Métropole), récompenses parrain/filleul, plafonds, anti-abus (B2/B8/D1), RGPD, effet sur Kaelite et pay-to-win. 10 questions simulateur (Q1–Q10), 14 décisions (D1–D14).
- Recommandation : créditer de la Kaelite **gagnée** (liée au serveur du filleul), jamais de la Kaelite achetée ; rien au palier 0 ; gain par paliers ; revue manuelle des paliers de valeur ; lien/code seulement, sans saisie d'e-mails d'amis.
- Montants en unités relatives (K) : le dépôt ne chiffre ni prix de pack ni valeur de la 2e file ; à caler au simulateur (qui n'a ni Kaelite ni profil occasionnel, et un défaut connu).
- Seul exemple sourcé dans le dépôt : Grepolis (200 or par filleul à 3 000 points). Dropbox et les références de droit (L34-5 CPCE, CNIL) viennent de la mémoire de l'agent, « à vérifier », sans recherche web. Pas de fiche parrainage au registre des traitements (MI-17).

## 3. Stripe et pack à 0,99 €

Document : [../etude-stripe.md](../etude-stripe.md).

- **Constat (vérifié par l'agent)** : Stripe Managed Payments ne peut pas vendre la Kaelite (conditions du 28/09/2026, art. 7(f) : « virtual currency » interdite). La recommandation de la revue comptable est infirmée.
- Stripe classique accepte la Kaelite si le vendeur exploite le jeu. Avec Stripe Tax, couvre la V1 sauf : Royaume-Uni (TVA dès la 1re vente) et déclaration OSS (non déposée par Stripe pour un vendeur français).
- Net par palier (joueur FR, carte EEE 1,5 % + 0,25 €, cotisations 22,9 %) : 0,99 € → frais 0,26 € (27 %), reste 0,50 € en franchise / 0,37 € avec TVA 20 % / 0,34 € en Managed Payments ; 1,99 € → 1,25 / 1,00 / 0,93 ; 4,99 € → 3,52 / 2,88 / 2,71 ; 9,99 € → 7,30 / 6,02 / 5,67. Frais sous 10 % à partir de 2,94 €. Un litige (20 €) efface environ 40 packs à 0,99 €.
- Recommandation de l'agent : 0,99 € en offre de bienvenue unique par compte, puis 4,99 / 9,99 / 19,99 / 49,99 €. Décision de Gregory : pack minimum visé à 0,99 € (à confronter à ce constat).
- Avant l'immatriculation : mode test seulement ; activer le compte après SIREN, compte dédié et médiateur. Demander à Stripe une confirmation écrite pour la Kaelite et le tarif de Stripe Tax avec Checkout.

## 4. Grok Bots (v2 de l'étude)

Document : [../etude-grok-bots.md](../etude-grok-bots.md).

- Produit réel : Bots persistants sur ordinateur cloud partagé (navigateur, terminal), routines (planifiées, e-mail, webhook, Slack), adresse `mail.grokbot.com`, connecteurs Gmail, Slack, Sheets, Drive, Notion, X. Discord non documenté ; tag `@bot` sur X indisponible dans l'UE. Documentation officielle hébergée par Cursor, modèles « SpaceXSI ».
- Lu : 14 pages officielles. Non lus (403) : x.ai/bot, x.ai/news, changelog, CGU et politique de confidentialité xAI ; DPA non lu.
- Risques documentés : les Bots agissent sous l'identité de l'utilisateur (sessions et cookies partagés) ; la plupart des actions partent sans validation ; pas de circuit d'approbation natif des publications ; carte du Vault remplie sans approbation ; xAI reconnaît que ses défenses contre l'injection de prompt « réduisent mais n'éliminent pas » le risque ; cartes d'approbation des routines expirant en 30 min ; données traitées aux États-Unis, RGPD non évoqué ; journaux d'audit et contrôles réseau réservés à l'offre Enterprise.
- Coût : prix officiel non lu ; sources tierces ~30 $/mois (SuperGrok), plans remaniés en octobre 2026 non confirmés ; SuperGrok Lite et X « Plus » n'incluent pas Grok Bot ; pool d'usage hebdomadaire sans chiffres ni plafond de dépense.
- Rôles : communication, SEO, marketing utiles en brouillon ; partenariats = préparation sans envoi ; compta = saisie d'appui ; comptabilité, droit, bannissements et engagements jamais délégués ; modération et support joueurs déconseillés au démarrage.
- Architecture proposée : 6 paliers, de la lecture seule aux actions validées ; compte dédié avec 2FA, aucun accès bancaire, un seul Bot au départ, règles « Ask first » testées.
