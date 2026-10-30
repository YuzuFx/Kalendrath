# Compléments : IA générative, échecs de 4X, push, coûts, fiches de jeux

*Recherche web du 2026-10-30 (WebSearch/WebFetch), seconde passe sur la section 6 de [references-jeux-du-genre.md](../../references-jeux-du-genre.md). Légende : **sourcé** = chiffre lu sur une page consultée ; **estimation** = calcul ou chiffre de tiers non officiel ; **non trouvé**. Les points juridiques ne constituent pas un avis juridique.*

## Résumé

1. **Midjourney** : les abonnés payants possèdent leurs images « dans toute la mesure permise par la loi » ; sous 1 M$ de CA annuel, Basic/Standard suffisent ; pas d'indemnisation en cas de litige ; Stealth (images non publiques) réservé à Pro/Mega. Les ToS officiels n'ont pas pu être lus (HTTP 403) : tout vient de commentaires tiers.
2. **Droit d'auteur FR/UE** : une image purement générée n'est probablement pas protégeable ; la contribution humaine (suite de prompts, retouches) est ce qui compte. Résolution du Parlement européen du 10/03/2026 et jugement de Munich (02/2026) dans ce sens (presse, non vérifiés à la source).
3. **Règles de communautés** : règles de r/4Xgaming, r/WebGames : **non trouvé** (Reddit inaccessible). Steam et itch.io imposent une déclaration d'IA. Des subreddits voisins interdisent l'IA. Conclusion : lire chaque barre latérale avant de poster.
4. **Échecs de 4X** : Millennia (Paradox, 2024, abandonné en oct. 2025) et Ara: History Untold (2024) sont des 4X solo, pas PvE-first au sens du projet. Aucun 4X persistant PvE-first échoué trouvé.
5. **Push** : opt-in applis ~49-53 % (médiane Airship 2025) ; web push 2,7-6 % chez des vendeurs e-commerce ; l'effet sur la rétention n'est que corrélationnel.
6. **iOS UE** : Apple a maintenu les web apps d'écran d'accueil dans l'UE le 01/03/2024 ; MagicBell (03/2026) affirme le contraire. Contradiction non résolue : tester sur un iPhone européen.
7. **Coûts** : médiateur ~30-80 €/an (estimation) ; relecture CGV/CGU 500 € HT et plus ; Paddle et Lemon Squeezy 5 % + 0,50 $ ; Stripe EEE 1,5 % + 0,25 € (+3,5 % si Managed Payments) ; micro-entreprise 2026 : 12,3 % / 21,2 % / 25,6 % (BNC, taux discuté).
8. **Fiches de jeux** : Total Battle, Lords Mobile, Kingdom Guard, PvE de Last War, Kingshot : très peu de données exploitables (moteur de recherche faible sur ces sujets), voir section 5.

---

## 1. IA générative : communautés et licence Midjourney

### 1.1 Règles des communautés

| Communauté | Règle | Statut |
|---|---|---|
| r/4Xgaming, r/WebGames, r/playmygame | Texte des règles | **Non trouvé** (reddit.com bloqué pour l'outil ; la recherche n'a rien remonté) |
| r/IndieDev | Pas de règle écrite trouvée ; un fil de 2025 rapporte que les posts de développement utilisant l'IA sont « descendus » dans la communauté, surtout par des gens venus de r/gamedev | Sourcé (fil relayé, [redlib r/IndieDev, avr. 2025](https://redlib.ssps.io/r/IndieDev/s/viMbbv7dn4)) |
| r/ProgressionFantasy | Depuis juin 2023, interdit de montrer de l'art IA en promotion, sauf données « éthiques » ; vu comme un filtre anti-contenu bâclé | Sourcé ([reddit.rtrace.io, 10/06/2023](https://reddit.rtrace.io/r/ProgressionFantasy/comments/146e9eb/discussion_rules_changes_for_promotion_and_ai/jnu4t5y/?context=3)) |
| r/c64, r/oblivion | Interdiction du contenu IA générative (exemples de la tendance, hors genre) | Sourcé ([r/c64](https://reddit.birdcat.cafe/r/c64/comments/1jm36e8/rule_5_no_generative_ai_content)) |
| r/aigamedev | Sous-reddit où l'IA est assumée (~41 000 membres) | Sourcé ([gummysearch](https://gummysearch.com/r/aigamedev/)) |
| Steam | Déclaration obligatoire dans le questionnaire Steamworks ; contenu « pré-généré » signalé sur la page du jeu ; outils d'efficacité en coulisses exemptés ; politique ajustée le 17/01/2026 | Sourcé ([tbreak](https://tbreak.com/steam-ai-disclosure-policy-update-developers/), [GoSuGamers](https://www.gosugamers.net/entertainment/news/77861-steam-revises-ai-policy-while-keeping-generative-content-disclosure-intact)) ; texte Valve non lu |
| itch.io | Champ « Generative AI Disclosure » obligatoire pour les créateurs d'assets ; couverture des jeux entiers incertaine selon les sources ; un asset non étiqueté disparaît des pages de navigation | Sourcé, secondaire ([80.lv](https://80.lv/articles/asset-creators-on-itch-io-now-have-to-disclose-the-use-of-generative-ai/)) |
| Jams itch.io | Beaucoup interdisent l'IA, page de store comprise | Sourcé ([exemple](https://itch.io/jam/one-page-rpg-jam-2025/topic/5041892/generative-ai-policy)) |

**Lecture pour Kalendrath** (estimation) : la déclaration d'emblée, déjà recommandée dans [lancement-indie-et-communaute.md](../lancement-indie-et-communaute.md), est cohérente avec Steam/itch.io. Avant chaque post, lire la barre latérale du subreddit ; prévoir un plan B (post texte/gameplay, sans visuel IA) pour les communautés hostiles.

### 1.2 Licence commerciale Midjourney

Tous les points ci-dessous viennent de [terms.law (15/01/2026, mis à jour le 19/03/2026)](https://www.terms.law/2026/01/15/midjourney-commercial-use-rights-complete-2026-guide/index.html), qui cite les ToS ; la page officielle docs.midjourney.com a renvoyé 403, donc **le texte officiel n'a pas été lu**. À vérifier sur [docs.midjourney.com](https://docs.midjourney.com) avant décision.

- Propriété : « You own all Assets You create with the Services to the fullest extent possible under applicable law » (cité par terms.law). Essai gratuit : licence CC BY-NC 4.0, non commerciale.
- Seuil : si l'entité a eu plus de 1 000 000 $ de CA brut l'année civile précédente, il faut Pro (60 $/mois) ou Mega (120 $/mois). Basic (10 $) et Standard (30 $) suffisent en dessous. Prix et seuil aussi dans [conductatlas](https://conductatlas.com/platform/midjourney/midjourney-terms-of-service/revenue-based-asset-ownership-threshold/) (extrait).
- Pas d'indemnisation PI : sorties fournies « telles quelles », le risque de réclamation tierce est à l'utilisateur.
- Les générations sont publiques par défaut (prompts compris) ; Stealth réservé à Pro/Mega. Conséquence (estimation) : sur Basic/Standard, les prompts du projet, dont ceux du lore, sont visibles.
- À noter : l'abonnement doit rester actif et conforme au seuil quand l'entité dépassera 1 M$ (peu probable dans l'horizon visé, estimation).

### 1.3 Statut juridique des images générées (France/UE)

Sources de presse et de commentaires, pas les textes : [JDN](https://www.journaldunet.com/solutions/dsi/1525057-midjourney-stable-diffusion-generative-fill-comment-proteger-les-creations-visuelles-generees-par-ia/), [question écrite Assemblée nationale QE 5986](https://questions.assemblee-nationale.fr/dyn/17/questions/QANR5L17QE5986.pdf), [culture.gouv.fr](https://www.culture.gouv.fr/en/switchToLanguage/437507/eng-GB).

- Le CPI exige une création humaine et l'empreinte de la personnalité de l'auteur ; la directive 2019/790 ne prévoit pas de régime IA (sourcé, commentaires).
- Un tribunal de Munich (02/2026) a refusé la qualité d'œuvre à trois logos issus de prompts, faute d'influence créatrice humaine prépondérante ; la contribution peut venir de la suite de prompts ou des retouches (sourcé, non vérifié à la décision).
- Résolution du Parlement européen du 10/03/2026 : un contenu entièrement généré par IA ne devrait pas être protégé (sourcé, résumé de presse).
- Aux États-Unis, le refus de cert. du 02/03/2026 laisse en place l'exigence d'auteur humain (terms.law).
- **Implication** (estimation, pas un avis juridique) : un visuel Midjourney brut est probablement copiable par n'importe qui. Pour le logo, la marque et les personnages centraux, prévoir retouche humaine documentée (versions, prompts conservés) ou commande à un illustrateur ; déposer le nom « Kalendrath » comme marque (INPI) protège le nom, pas l'image.

---

## 2. Échecs de 4X lancés en 2024-2026

| Jeu | Faits | Fiabilité |
|---|---|---|
| **Millennia** (C Prompt / Paradox, sorti env. avril 2024) | Dernier patch (Update 8) et arrêt du développement actif annoncés le 03/10/2025, ~18 mois après la sortie. Accueil « tiède », 7/10 chez PCGamesN, avis Steam jamais sortis de « mitigé ». Ventes estimées 83 980 exemplaires (VGI via SteamPulse). Paradox n'a pas publié de chiffres | Sourcé ([PCGamesN, 05/10/2025](https://www.pcgamesn.com/millennia/final-update)) ; ventes = estimation tierce ([SteamPulse](https://steampulse.org/game/1268590)) |
| **Ara: History Untold** (Oxide / Xbox Game Studios, 24/09/2024) | Estimations tierces : ~39 000 à 52 400 exemplaires Steam, ~1,6 M$ de CA brut ; pic de 4 262 joueurs simultanés le 24/09/2024 puis ~99 % de baisse (Steambase). Pas de chiffre officiel ni de fermeture | Estimation ([Raijin](https://raijin.gg/app/2021880/Ara_History_Untold_Anniversary_Edition), [Steambase](https://steambase.io/apps/2021880)) |

**Cause probable** (estimation, non établie par une source) : concurrence de Civilization et d'Humankind sur un public de joueurs solo ; cycle de contenu payant trop mince.

**Limites de la comparaison** : ces deux jeux sont solo, vendus à l'achat, sur PC ; ils ne sont ni persistants, ni free-to-play, ni PvE-first. Ils renseignent sur le risque « clone d'un géant » plutôt que sur le modèle de Kalendrath.

**4X PvE-first échoué : non trouvé.** Les recherches ont remonté d'autres fermetures de stratégie ou de city builders (The Elder Scrolls: Blades, fermeture annoncée au 30/06/2026, [Mezha](https://mezha.ua/en/news/bethesda-shutss-down-the-elder-scrolls-blades-309826/) ; AD2460, jeu de stratégie navigateur, fermeture au 1er mars, [MassivelyOP](https://massivelyop.com/?p=258869), année non vérifiée), qui ne sont pas des 4X PvE-first lancés en 2024-2026. Warcraft Rumble (déjà noté, hors 4X) reste le seul cas voisin. Voir aussi [jeux-fermes-ou-echoues.md](../jeux-fermes-ou-echoues.md).

---

## 3. Notifications push et PWA

### 3.1 Taux d'acceptation

| Mesure | Valeur | Source | Fiabilité |
|---|---|---|---|
| Applis, médiane opt-in | Android 53,3 %, iOS 48,85 % ; échantillon >3 Md d'utilisateurs, données 2025 | [Airship, benchmarks 2026](https://www.airship.com/mobile-app-push-notification-benchmarks-for-2026/) | Sourcé (vendeur), date de parution non indiquée |
| Jeux et paris, Android | Plancher à 21,35 % (10e centile) ; pas d'autre chiffre « jeux » lisible (graphiques en images) | idem | Sourcé |
| Autres synthèses | 60 à 67,5 % toutes plateformes ; Android 81-91 % vs iOS 44-51 % | [MobiLoud](https://www.mobiloud.com/blog/push-notification-opt-in-rate), relais de tiers | Estimation : définitions divergentes ; la baisse Android depuis l'opt-in explicite d'Android 13 n'est pas chiffrée |
| **Web push** (navigateur) | 2,7 % (PushOwl, marchands) à 6 % (visiteurs uniques) ; d'autres sources annoncent 45-90 % avec un autre dénominateur | [PushOwl](https://docs.pushowl.com/en/articles/6361107-web-push-notification-benchmarks), [Mobiloud](https://www.mobiloud.com/blog/push-notification-statistics) | Estimation : e-commerce, pas des joueurs engagés |

### 3.2 Effet sur la rétention

- Airship : un opt-in d'une compagnie aérienne a 2,9× plus d'activation à J30 que les non-inscrits ; les acheteurs « divertissement » achètent 10 % plus souvent (Airship, ci-dessus). Corrélationnel, sans groupe témoin.
- Chiffres souvent repris : « retention presque ×3 » pour qui reçoit un push dans les 90 premiers jours, « +71 % » pour un push d'onboarding en première semaine : origine et méthode **non vérifiées** (agrégats de [MobiLoud](https://www.mobiloud.com/blog/push-notification-statistics)).
- **Aucune mesure propre à un 4X ou un jeu à timers : non trouvé.** Prudence : le joueur qui active les notifications est déjà le plus engagé (biais de sélection). Dans un jeu où les timers sont la boucle, le push est utile, mais le gain ne se lit pas dans ces chiffres.

### 3.3 Statut des web apps iOS dans l'UE (PWA)

- **Sourcé** : le 01/03/2024, Apple a annoncé qu'elle conservait les web apps d'écran d'accueil dans l'UE (iOS 17.4), après avoir prévu de les retirer au nom du DMA ([Engadget, 01/03/2024](https://www.engadget.com/apple-backtracks-on-plans-to-get-rid-of-web-apps-on-iphones-in-the-eu-195232177.html)). L'article ne dit rien des notifications.
- **Contradiction** : le guide [MagicBell, mis à jour le 20/03/2026](https://www.magicbell.com/blog/pwa-ios-limitations-safari-support-complete-guide) affirme encore que, dans l'UE sous iOS 17.4+, les PWA ne s'exécutent plus en mode autonome et que le push ne fonctionne pas. Il paraît ne pas intégrer le revirement de 2024 (estimation).
- Hors UE : push web depuis iOS 16.4, sur site ajouté à l'écran d'accueil (MagicBell).
- La page Apple « DMA et applis dans l'UE » ne mentionne pas les web apps ([developer.apple.com, consultée le 30/10/2026](https://developer.apple.com/support/dma-and-apps-in-the-eu/)). Rien sur iOS 26 spécifique à l'UE trouvé.
- **Verdict : incertain, à tester sur un iPhone européen en conditions réelles.** Cela renforce la piste Capacitor déjà retenue dans [navigateur-vs-mobile.md](../navigateur-vs-mobile.md).

---

## 4. Coûts manquants de l'économie du projet

### 4.1 Médiateur de la consommation

- Obligation et sanction : amende jusqu'à 3 000 € (personne physique) ou 15 000 € (société) selon L612-2, cité par [Margeo (maj. 27/10/2026)](https://margeoapp.com/blog/mediateur-consommation-revendeur-obligatoire) ; même page : adhésion de **30 à 80 € par an** selon le médiateur (CM2C, Médicys, AFEDEM cités sans tarif détaillé). Le tableau de la page indique « 500-3 000 € » pour l'amende, incohérent : à vérifier.
- Autres fourchettes : 25 € HT pour 3 ans minimum + 60 € HT pour une médiation, ou 30-150 € d'adhésion + 60-150 € par médiation, 30 € pour 3 ans à la SMP (témoignage), 45 €/an pour moins de 10 salariés chez un médiateur régional ([CoPePS](https://copeps.fr/actualites/mediateur-consommation-auto-entrepreneur/), [espace-autoentrepreneur](https://espace-autoentrepreneur.com/ruche/article/la-mediation-de-la-consommation-pour-les-auto-entrepreneurs), pages commerciales).
- Le médiateur doit être référencé par la CECMC. **Estimation budgétaire : 30 à 150 €/an + 60 à 150 € par litige traité.** Le jeu facture à des particuliers européens : confirmer qu'un médiateur couvre la vente en ligne transfrontalière.

### 4.2 Relecture juridique des CGU/CGV

- Fourchette 2026 : 500 € HT pour une relecture, 600 € HT à 3 000 € HT et plus pour une rédaction ; honoraires horaires ~250 € HT/h ; plateformes à 199 € HT pour un contrat commercial ≤20 pages (non spécifique aux CGV) ([Swim.legal](https://www.swim.legal/blog/avocat-cgv-guide-pratique-securiser-conditions-generales-vente), [Captain Contrat](https://www.captaincontrat.com/contrats-commerciaux-cgv/cgv-cgu-cga/combien-coute-redaction-cgv), [consultation.avocat.fr](https://consultation.avocat.fr/cout-avocat-redaction-de-conditions-generales-de-vente-cgv-71-devis.html)). Sourcé mais commercial.
- **Estimation budgétaire** : 500 à 1 500 € HT pour une relecture ciblée (CGV avec monnaie virtuelle, rétractation, mineurs), plutôt 2 000 à 3 000 € HT pour une rédaction complète avec politique de confidentialité. Cadre : [cadre-legal-ue.md](../cadre-legal-ue.md). Non un avis juridique.

### 4.3 Prestataires de paiement et « marchand officiel » (Merchant of Record)

Tarifs lus sur les pages officielles le 30/10/2026 :

| Prestataire | Frais | Inclus | Source |
|---|---|---|---|
| **Paddle** (MoR) | 5 % + 0,50 $ par transaction Checkout ; produits <10 $ : « contactez Paddle » pour tarif spécifique | TVA mondiale, déclarations, fraude, rétrofacturations, support paiement | [paddle.com/pricing](https://www.paddle.com/pricing) |
| **Lemon Squeezy** (MoR) | 5 % + 0,50 $ ; « petits frais supplémentaires » hors États-Unis, montants non donnés | TVA mondiale, fraude | [lemonsqueezy.com/pricing](https://www.lemonsqueezy.com/pricing) |
| **Stripe France** (non MoR) | Cartes EEE standard 1,5 % + 0,25 € ; premium 2,8 % + 0,25 € ; UK 2,5 % + 0,25 € ; internationales 3,15 % + 0,25 € | Paiement seul : TVA et facturation à votre charge | [stripe.com/en-fr/pricing](https://stripe.com/en-fr/pricing) |
| **Stripe Managed Payments** (MoR) | +3,5 % en plus des frais de paiement, soit environ 5,0 % + 0,25 € pour une carte EEE standard (calcul de l'outil de lecture, estimation) | MoR | idem ; disponibilité en France **non vérifiée** |

**Lecture** (estimation) : sur un micro-paiement à 4,99 €, 5 % + 0,50 $ représente ~15 % du prix. Un MoR retire la gestion de la TVA OSS et du litige, mais pèse lourd sur les petits paniers ; Stripe seul coûte moins cher mais impose la gestion de la TVA. À arbitrer avec un expert-comptable. Les frais des stores (Apple/Google) sont traités dans [navigateur-vs-mobile.md](../navigateur-vs-mobile.md).

### 4.4 Cotisations de micro-entreprise 2026

- Taux Urssaf : vente 12,3 %, services BIC 21,2 %, BNC et CIPAV 23,2 % hors CFP ; avec CFP et versement libératoire environ 13,4 %, 23,2 %, 25,6 % ; ACRE : moitié la première année ([Swim.legal 2026](https://www.swim.legal/blog/charges-micro-entreprise-2026-taux-urssaf-calcul-obligations-d9294)). Les sources divergent sur le BNC : 25,6 % ([economie.gouv.fr, 06/03/2026, via synthèse de recherche](https://www.economie.gouv.fr/micro-entreprises-quel-est-le-montant-de-vos-cotisations-sociales), page 403 à la lecture directe), 26,1 % ou 21,1 % ailleurs. **Le 25,6 % est le taux avec versement libératoire et CFP ; sans versement libératoire, le total est ~23,4 %** (Swim.legal, exemple).
- Plafonds 2026 : 203 100 € (vente), 83 600 € (services) ([Swim.legal](https://www.swim.legal/blog/charges-micro-entreprise-2026-taux-urssaf-calcul-obligations-d9294)) ; d'autres sites affichent 188 700 € / 77 700 € (probablement anciens).
- **Non tranché** : la catégorie applicable à un jeu en ligne (BIC prestation de services, BNC, ou vente pour un bien virtuel) n'a pas été sourcée. Ordre de grandeur de prudence : **~21-26 % du CA encaissé**, assiette brute, sans déduction des frais (frais de plateforme compris). À confirmer avec l'Urssaf ou un comptable.

---

## 5. Fiches courtes de jeux

*Le moteur de recherche a mal couvert ces jeux : les fiches sont maigres, les manques sont dits.*

### Total Battle
- Jeu de stratégie par navigateur et mobile, édité par scoreWarz ; disponible aussi sur Steam (gg.deals).
- Prix des achats intégrés : de 0,99 $ (« Small package ») à 249,99 $ (« Royal package ») sur l'App Store ([App Pricing Lab](https://apppricinglab.com/iap/apple/1274132545), page incohérente, estimation).
- Niveaux de bâtiments, files, coût en gemmes : **non trouvé**. Une promotion Google Play mentionne un « boost de développement » de 2 jours gratuit, prolongeable ([Google Play](https://play.google.com/store/apps/eventdetails/4830894249190737800)), mécanique non détaillée.

### Lords Mobile
- Plafond du château : une source dit 25 (marche max de 200 000 troupes), contredisant l'idée d'un niveau 30 ; à vérifier ([BlueStacks](https://www.bluestacks.com/ru/blog/game-guides/lords-mobile/lords-mobile-castle-level-25-ru.html), non lu en entier).
- Le niveau du château conditionne les autres bâtiments : un guide de **2019** (ancien) liste des déblocages par niveau (prison au niveau 10, Académie niveau 24, Atelier niveaux 17 et 25) et dit que les bâtiments de ressources ne peuvent dépasser le château que de 2 à 4 niveaux ([gameplay.tips, juin 2019](https://gameplay.tips/guides/4282-lords-mobile.html)).
- Constructeurs, files, durées, prix : **non trouvé**. Les durées au-delà du niveau 20 « se comptent en jours » (une source, sans chiffre).

### Kingdom Guard
- Jeu de tap4fun, mélange de tower defense et de gestion de château : les héros sont centraux, jusqu'à deux au départ, un troisième au niveau 200 via un talent d'Académie ; le château améliore les unités à l'entraînement ([MuMu Global](https://www.mumuglobal.com/blog/kingdom-guard-tower-defense-guide.html), guide, date non vue).
- Rétention, prix, files : **non trouvé**. Attention aux homonymes (King's Guard TD, Kingdom Defend) : ce ne sont pas ce jeu.

### PvE de Last War
- Seule donnée trouvée : l'événement « Zombie Siege » d'alliance utilise des tâches radar (+300 points majeures, +10 mineures) ; un R4 ou R5 dépense les points pour chercher la base ennemie ; il faut 48 h d'ancienneté dans l'alliance et un niveau de QG minimal selon la difficulté ([repost, source médiocre](https://lotus.fpmt.org/news-feed/p/442/)).
- Niveaux, files, prix du PvE : **non trouvé**. Voir [pve-dans-le-genre.md](../pve-dans-le-genre.md) pour ce qui est déjà documenté.

### Kingshot
- Le Centre-ville plafonne à 30 jusqu'à l'événement « Age of True Gold » (~jour 60), qui ouvre la voie du Truegold (rare, obtenu en événements ou à la boutique du Royaume de la Puissance) ; le Centre-ville 30 exige que l'Ambassade et l'Académie soient aussi à 30 ([kingshotguide.com](https://www.kingshotguide.com/guides/first-100-days-strategy), [kingshotguide.org](https://www.kingshotguide.org/guide/kingshot-truegold)).
- Calendrier : héros de 2e génération vers les jours 40-50 (semaine 6), première bataille de château vers le jour 54 ; les armures rouges d'abord aux payeurs ([kingshotguide.com](https://www.kingshotguide.com/guides/first-100-days-strategy)).
- Files de construction, prix des packs et de l'or : **non trouvé**. Voir [nouveaux-venus-2024-2026.md](../nouveaux-venus-2024-2026.md) pour le reste.

---

## 6. Ce qui reste non trouvé

- Règles écrites de r/4Xgaming, r/WebGames, r/playmygame, Discords d'indie (Reddit inaccessible depuis l'outil).
- Texte officiel des ToS Midjourney ; décision de Munich et résolution du Parlement européen lues à la source.
- Tout 4X PvE-first échoué en 2024-2026 ; taux de rétention push propres aux jeux.
- Statut des web apps iOS dans l'UE en 2026 tranché par une source officielle Apple.
- Catégorie d'activité Urssaf pour un jeu en ligne ; tarifs exacts de médiateurs agréés ; disponibilité de Stripe Managed Payments en France.
- Niveaux, files et prix pour Total Battle, Lords Mobile, Kingdom Guard, PvE de Last War, Kingshot.

*Ce document n'est pas un avis juridique ou fiscal ; il rassemble des sources publiques datées du 2026-10-30.*
