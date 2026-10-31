# Revue juridique : comportements bannissables

*Revue du 2026-10-30 de [comportements-bannissables.md](comportements-bannissables.md) (14 comportements, échelle N0-N5, procédure d'appel, règles joueurs FR/EN), sous l'angle du droit français et européen du numérique, de la consommation et des données personnelles. Les corrections sont écrites dans le document, marquées « [Juridique] ».*

> **Ceci n'est pas un avis d'avocat.** C'est une analyse faite par une IA, à partir de recherches web du 2026-10-30. Plusieurs textes n'ont pu être lus que via des sources secondaires (EUR-Lex et Légifrance sont mal lus par les outils). Les points marqués **Avocat** doivent être validés par un avocat en droit du numérique et de la consommation avant publication des CGU.

**Niveaux de certitude** : **Certain** = texte relu ou sources officielles concordantes ; **Probable** = source sérieuse ou texte connu recoupé ; **Incertain** = question ouverte, jurisprudence absente ou divergente ; **Avocat** = à faire trancher par un avocat humain.

## En bref

Le document est solide sur l'esprit : gradation, revue humaine, motivation, appel, prudence sur les faux positifs. Les défauts sont des manques de forme juridique plus que des erreurs de fond. Cinq corrections comptent vraiment :

1. **Rétractation** : « abus du droit de rétractation » ne peut pas être une fraude sanctionnée ; le risque se traite dans le parcours d'achat.
2. **Kaelite achetée en cas de bannissement** : la garder sans contrepartie expose à une clause abusive ; rembourser la Kaelite achetée non dépensée, hors fraude de paiement.
3. **Décisions automatisées** : la revue humaine doit couvrir aussi le gel du portefeuille et le refus automatique d'un nouveau compte (table `bans`), et être réelle et tracée.
4. **Conservation** : 6 mois pour les journaux de connexion est probablement trop court pour un hébergeur de contenus (1 an) ; « durée plus longue » pour les dossiers doit devenir une durée chiffrée.
5. **Menaces pour la vie ou la sécurité** : le signalement aux autorités est une obligation (DSA art. 18), pas une option.

## Constats, base juridique, correction

| # | Sujet | Constat | Base juridique | Correction (dans le document) | Certitude |
|---|---|---|---|---|---|
| 1 | Motivation des sanctions | Le principe 4 prévoit motif, règle, durée, voie d'appel ; il manque l'usage de moyens automatisés, les faits, l'origine (signalement ou enquête), les recours externes | DSA art. 17 (tout hébergeur, même micro-entreprise) | Principe 4 et procédure, étape 1 : contenu complet de l'exposé des motifs, y compris pour les mesures conservatoires | Contenu de l'art. 17 : **Certain**. Application aux sanctions de comportement (bot, multicompte) plutôt que de contenu : **Incertain**, d'où la recommandation de l'appliquer partout |
| 2 | Recours interne | 14 jours, un appel ; pas de garantie d'examen humain écrite | DSA art. 20 (≥ 6 mois, pas de décision purement automatisée), mais art. 19 exempte micro et petites plateformes ; Code conso R212-2, 10° (entrave aux recours) | Appel prioritaire 14 jours, réclamation recevable 6 mois, examen toujours humain, recours externes mentionnés | Exemption art. 19 : **Certain**. Qualification de « plateforme en ligne » : **Incertain** |
| 3 | Médiateur | Limité « à ce qui touche à un achat » | Code conso L611-1, L612-1 | Mentionner le médiateur et les tribunaux sans restriction | Obligation de médiateur : **Probable**. Couverture d'un litige sur un service gratuit : **Avocat** |
| 4 | Décision automatisée | Bon principe, mais gel du portefeuille (B11) et rapprochement automatique avec `bans` (B14) non couverts | RGPD art. 22 ; CJUE SCHUFA, C-634/21, 7 déc. 2023 ; CJUE Dun & Bradstreet, C-203/22, 27 fév. 2025 | Revue humaine réelle et tracée pour toute mesure à effet significatif ; explication suffisante malgré le secret des méthodes | **Probable** (arrêts confirmés par plusieurs sources ; seuil exact de l'« effet significatif » pour un bannissement de jeu : **Incertain**) |
| 5 | Base légale | Non précisée | RGPD art. 6, § 1, f ; considérants 47 et 49 ; CEPD lignes directrices 2/2019 | Intérêt légitime + mise en balance écrite + droit d'opposition ; obligation légale pour la conservation LCEN | **Probable** |
| 6 | Empreintes d'appareil | Utilisées comme preuve (B1, B2, B14) | ePrivacy art. 5, § 3 ; loi I&L art. 82 ; CEPD lignes directrices 2/2023 (v2, 7 oct. 2024) ; FAQ cookies CNIL | S'en tenir aux données reçues côté serveur ; empreinte calculée en JavaScript seulement après avis d'avocat | Lutte contre la fraude non exemptée de consentement en général, sauf sécurité de l'authentification : **Certain** (CNIL). Qualification de la détection de bots comme « sécurité de l'authentification » : **Avocat** |
| 7 | Analyse d'impact | Absente | RGPD art. 35 ; liste CNIL (délib. 2018-327) : profilage pouvant exclure du bénéfice d'un contrat | AIPD simple avant l'alpha fermée (D19) | **Probable** (inscription sur la liste : vérifiée via sources secondaires et PDF CNIL cité) |
| 8 | Durées de conservation | 12 mois jeu, 6 mois connexion, « plus long » pour les dossiers | CNIL délib. 2021-122 (6 mois à 1 an, jusqu'à 3 ans si justifié) ; décret 2021-1362 (LCEN art. 6) ; Code civil art. 2224 | 1 an pour les données de connexion liées aux contenus ; durées chiffrées pour les dossiers (12 mois après la fin pour N0-N2 ; 5 ans max en archive restreinte pour N3-N5) ; liste anti-contournement limitée | Recommandation CNIL : **Certain**. Durées exactes du décret 2021-1362 pour un hébergeur : **Probable**, **Avocat** |
| 9 | Données d'infractions | Fraude à la carte, piratage, menaces : données pénales | RGPD art. 10 ; loi I&L art. 46 | Pas de liste noire générale de fraudeurs ; dossier du cas et listes du prestataire | **Avocat** |
| 10 | Kaelite achetée et N5 | D4 hésite entre perte, prorata, conservation | Code conso R212-1, 8° et R212-2, 3° ; Code civil art. 1229 ; principes CPC de mars 2025 ; TGI Paris 17 sept. 2019 (Steam) | Remboursement de la Kaelite achetée non dépensée, au prix payé, hors bonus et hors fraude de paiement | Principe : **Probable**. Portée exacte et jurisprudence (appel Steam non trouvé) : **Avocat** |
| 11 | Rétractation | B11 sanctionne « l'abus du droit de rétractation » ; dit que les CGV décident du sort de la Kaelite dépensée | Code conso L221-28, 13° ; directive 2011/83 art. 14, § 4, b ; directive 2023/2673 (fonction de rétractation, 19 juin 2026) | Retiré de la fraude ; le risque se gère par la renonciation expresse confirmée sur support durable | L221-28, 13° : **Certain**. Kaelite livrée non dépensée : **Incertain**. Transposition par l'ordonnance 2026-2 : **Probable** |
| 12 | Rétrofacturation | N5 dès la rétrofacturation | Code monétaire et financier L133-18 | N5 seulement si la mauvaise foi est établie ; gel pendant le litige bancaire | **Probable** |
| 13 | Rétroactivité | Exception « sauf fraude manifeste ou atteinte grave » | Code conso R212-1, 3° ; R212-2 | Exception supprimée ; viser une clause générale existante ; préavis de modification | **Probable** |
| 14 | Résolution du contrat | N4-N5 = résolution unilatérale, non qualifiée comme telle | Code civil art. 1224 à 1226 (mise en demeure sauf urgence, notification motivée, preuve de la gravité par le créancier) | N1 joue le rôle de mise en demeure ; sauts de niveau réservés aux cas urgents ou graves ; compte fermé, pas supprimé, pendant les délais de recours | **Probable** (art. 1226 connu, recoupé par une source secondaire) |
| 15 | Charge de la preuve | « Sans révéler les méthodes » ; aucune clause sur la preuve | Code civil art. 1353, 1356 ; Code conso R212-1, 12° | Pas de clause « nos journaux font foi » ; dossier de preuves figé (extraits, hachage, auteur de la revue) | R212-1, 12° : **Certain** (liste noire, sources secondaires concordantes) |
| 16 | Proportionnalité et individualisation | « N4 pour tous » (B3), « tous les comptes liés » (B14), N5 pour l'acheteur d'un compte (B4), N5 pour un test de charge (B13) | DSA art. 14, § 4 ; Code civil art. 1226 | Sanction individuelle fondée sur la participation établie ; propositions d'allègement pour l'acheteur primo-contrevenant et le test de charge sans intention de nuire | Obligation de proportionnalité : **Certain**. Calibrage précis : choix de Gregory |
| 17 | Menaces, contenus illicites | « Signalement aux autorités » présenté comme une option | DSA art. 18 (menace pour la vie ou la sécurité), art. 16 (mécanisme de signalement) | Procédure écrite d'alerte (police, gendarmerie, PHAROS), conservation des preuves avant transmission | **Certain** |
| 18 | Chat et messages privés | Analyse de mots-clés, lecture sur enquête | Directive 2018/1972 (chat de jeu probablement accessoire) ; secret des correspondances | Messages privés analysés seulement sur signalement ou enquête ciblée ; information dans la politique de confidentialité | **Incertain**, **Avocat** |
| 19 | CGU et publicité des règles | D16 garde les fiches internes | DSA art. 14, § 1 (politiques, procédures, outils, décision algorithmique, revue humaine, en langage clair) ; Code civil art. 1119 (opposabilité des conditions générales) | Seuils internes possibles, mais échelle, procédure et usage d'outils automatiques publiés ; règles intégrées aux CGU acceptées à l'inscription | **Certain** |
| 20 | Mineurs | D10 : 16 ans, 13 avec accord parental | Loi I&L art. 45 (15 ans) ; Code civil art. 1148 ; proposition EU KIDS Act (17 sept. 2026) ; DSA art. 14, § 3 et 28 | Notification en langage simple ; parent informé pour N4-N5 et paiements ; appel par le parent ; achat d'un mineur = remboursement, jamais sanction | Art. 45 : **Certain**. KIDS Act (existence, champ jeux) : **Probable** ; texte non adopté |
| 21 | Modération par bot ou IA | Non traitée | RGPD art. 22, 28 ; DSA art. 14 et 17, § 3, c ; règlement IA art. 50, § 1 (depuis le 2 août 2026) | L'outil signale, l'humain décide ; fournisseur d'IA = sous-traitant ; un bot conversationnel se déclare comme IA (D18) | Art. 50 applicable et non reporté : **Probable** (sources de cabinets) |
| 22 | Modérateurs bénévoles | D12 | RGPD art. 29, 32 ; droit du travail | Engagement de confidentialité, accès minimal, journalisation ; statut à vérifier | Statut bénévole : **Avocat** |

## Ce qui est certain

- Kalendrath est un **hébergeur** dès qu'il stocke chat, pseudos et noms d'alliance : les art. 14, 16, 17 et 18 du DSA s'appliquent quelle que soit sa taille. Les obligations propres aux plateformes en ligne (art. 20 à 28, dont recours interne de 6 mois et règlement extrajudiciaire) ne s'appliquent pas à une micro ou petite entreprise (art. 19).
- Les CGU doivent décrire publiquement la modération, y compris l'usage d'outils automatiques et la revue humaine.
- Le droit de rétractation pour un contenu numérique ne disparaît qu'avec un accord exprès **et** une renonciation expresse ; une clause des CGV ne peut pas l'écarter autrement.
- Une clause qui fait peser sur le consommateur une preuve qui incombe au professionnel, ou qui permet au professionnel de résilier de façon discrétionnaire sans le même droit pour le consommateur, est sur la liste noire (R212-1, 8° et 12°).
- La CNIL ne considère pas les traceurs de lutte contre la fraude comme exemptés de consentement en général.
- Le signalement aux autorités d'une menace pour la vie ou la sécurité est obligatoire.

## Ce qui est incertain

- Si l'art. 17 du DSA couvre les sanctions de **comportement** (bot, multicompte) et pas seulement de **contenu**. Recommandation : l'appliquer partout.
- Si un bannissement de jeu est un « effet significatif » au sens de l'art. 22 du RGPD. Recommandation : faire comme si, pour toute mesure sévère.
- Le sort de la Kaelite livrée mais non dépensée au regard de la rétractation.
- L'issue de l'appel dans l'affaire Steam (clauses du portefeuille), introuvable.
- Le régime des messages privés du chat (secret des correspondances).
- La portée finale du KIDS Act pour les jeux et l'âge minimum qui en sortira.

## À faire valider par un avocat

1. Rédaction des CGU (règles, échelle, procédure, clause générale de loyauté, modification des règles avec préavis) et des CGV (Kaelite en cas de fermeture, rétractation, rétrofacturation).
2. Sort de la Kaelite achetée en cas de N4, N5 et de suspension (D4).
3. Empreintes d'appareil et détection de bots : consentement ou exemption.
4. Durées de conservation exactes (décret 2021-1362, LCEN après la loi SREN) et données d'infractions (RGPD art. 10, loi I&L art. 46).
5. Médiateur de la consommation pour les litiges de sanction sur un compte gratuit.
6. Lecture des messages privés par les modérateurs.
7. Statut des modérateurs bénévoles.
8. Âge minimum et parcours parental (D10), à revoir quand le KIDS Act avancera.

## À faire, sans avocat, avant l'alpha fermée

- Fiche du registre RGPD « modération et lutte contre la triche », mise en balance de l'intérêt légitime, AIPD simple (D19).
- Modèle de notification de sanction conforme à l'art. 17 du DSA (mesure, faits, origine, automatisation, clause, recours).
- Bouton « Signaler » en jeu et procédure d'alerte des autorités (art. 16 et 18).
- Dossier de preuves figé pour N3-N5 (extraits, hachage, auteur de la revue).
- Paragraphe de la politique de confidentialité sur la détection de triche.

## Sources

Fiabilité indiquée pour l'usage qui en est fait.

- DSA, art. 14, 17, 18, 19, 20 (texte anglais consolidé) : https://www.eu-digital-services-act.com/Digital_Services_Act_Article_17.html (et pages art. 14, 18, 19, 20) — *vérifié* ; EUR-Lex illisible par l'outil
- CNIL, FAQ cookies et traceurs (lutte contre la fraude, CAPTCHA) : https://cnil.fr/fr/cookies-et-autres-traceurs/regles/cookies/FAQ — *vérifié*
- CNIL, recommandation sur la journalisation (délib. 2021-122) : https://www.cnil.fr/fr/node/9999 et https://www.CNIL.fr/sites/cnil/files/atoms/files/recommandation_-_journalisation.pdf — *vérifié*
- CNIL, liste des traitements soumis à AIPD : https://www.cnil.fr/sites/default/files/atoms/files/liste-traitements-avec-aipd-requise-v2.pdf — *probable* (lu via un résumé)
- CNIL, consentement parental sous 15 ans : https://cnil.fr/fr/node/319 — *vérifié*
- CEPD, lignes directrices 2/2023 sur l'art. 5, § 3 ePrivacy (v2) : https://edpb.europa.eu/system/files/2024-10/edpb_guidelines_202302_technical_scope_art_53_eprivacydirective_v2_en_0.pdf — *probable* (existence et date vérifiées, contenu non relu)
- CJUE, SCHUFA, C-634/21 : https://curia.europa.eu/jcms/jcms/p1_4213241/fr ; Bird & Bird : https://twobirds.com/en/insights/2023/global/key-takeaways-from-the-schufa-case-of-the-cjeu — *probable*
- CJUE, Dun & Bradstreet Austria, C-203/22 : https://www.dalloz-actualite.fr/document/cjue-27-fevr-2025-dun-bradstreet-austria-aff-c-20322 ; A&O Shearman : https://www.aoshearman.com/en/insights/ao-shearman-on-data/cjeu-issues-judgment-on-balancing-the-right-of-access-and-protecting-trade-secrets — *probable*
- Clauses abusives (listes R212-1 et R212-2) : DGCCRF https://www.economie.gouv.fr/dgccrf/les-fiches-pratiques/clauses-abusives-12-clauses-interdites-et-10-clauses-dont-il-faut-demontrer-la-legitimite (non lisible par l'outil, cité par les résultats) ; https://www.donneespersonnelles.fr/clauses-abusives-cgv ; https://gdroit.fr/liste-noire-des-clauses-abusives/ — *probable*
- Steam, TGI Paris 17 sept. 2019 : https://www.quechoisir.org/action-ufc-que-choisir-condamnation-de-steam-l-ufc-que-choisir-fait-reconnaitre-le-droit-de-revente-de-jeux-video-n70803/ ; https://www.lemondeinformatique.fr/actualites/lire-jurisprudence-steam-le-tgi-de-paris-se-range-derriere-la-cjue-76829.html — *probable* pour le portefeuille ; appel non trouvé
- Rétractation et contenu numérique : https://www.service-public.gouv.fr/particuliers/vosdroits/F10485 — *vérifié* ; https://donneespersonnelles.fr/contenu-numerique-acces-immediat — *probable*
- Code civil art. 1226 (résolution par notification) : https://www.swim.legal/blog/article-1226-code-civil-resolution-unilaterale-contrat ; https://www.actu-juridique.fr/civil/obligations-contrats/resolution-extrajudiciaire-pour-inexecution-et-dispense-de-mise-en-demeure/ — *probable*
- Décret 2021-1362 (conservation par les hébergeurs) : https://www.dalloz-actualite.fr/document/decr-n-2021-1362-20-oct-2021-jo-21-oct ; avis du Conseil d'État https://www.assemblee-nationale.fr/dyn/15/textes/l15b4153_avis-conseil-etat.pdf — *probable*
- Règlement sur l'IA, art. 50 et omnibus numérique : https://www.houthoff.com/insights/news/ai-act-transparency-obligations-and-the-ai-omnibus-regulation/ ; https://www.bakerbotts.com/thought-leadership/publications/2026/september/eu-ai-act-article-50-transparency-obligations-go-live — *probable*
- EU KIDS Act : https://www.gaming.net/european-commission-adopts-eu-kids-act-proposal-covering-online-games/ ; https://www.mlex.com/mlex/articles/2527228 — *probable*
- Textes cités sans relecture en ligne (*texte connu, non relu*) : Code civil art. 1119, 1148, 1229, 1353, 1356, 2224 ; Code de la consommation L211-1, L611-1, L612-1 ; directive 2011/83 art. 14 ; directive 2018/1972 art. 2 et considérant 17 ; Code monétaire et financier L133-18 ; Code pénal 323-1 et 323-2 ; loi Informatique et libertés art. 46 et 82 ; RGPD art. 10, 25, 28 à 35 ; règlement IA annexe III. Point de départ : https://eur-lex.europa.eu et https://www.legifrance.gouv.fr
- Cadre général déjà documenté : [cadre légal UE](references-jeux/cadre-legal-ue.md)
