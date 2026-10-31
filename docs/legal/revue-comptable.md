# Revue comptable et fiscale de la documentation légale

*Revue du 2026-10-30, rédigée par Claude Code sous l'angle d'un expert-comptable spécialisé en micro-entreprises de services numériques. **Ceci n'est ni un avis comptable ni un avis fiscal engageant** : c'est une préparation du rendez-vous avec un expert-comptable humain, à qui les questions de la section 8 sont destinées. Documents relus : [CLAUDE.md](../../CLAUDE.md), [plan marketing](../plan-marketing.md) (sections 0, 8 et 10), [README](README.md), [mentions légales](01-mentions-legales.md), [CGU](04-cgu.md) (articles 5, 9, 15, 16), [CGV de la Kaelite](05-cgv-kaelite.md), [règles du Patreon](06-regles-patreon.md), [politique de confidentialité](02-politique-de-confidentialite.md) (2.6), [registre](07-registre-des-traitements.md) (T6), [GDD, section 9](../game-design-document.md). Aucun de ces documents n'a été modifié.*

> **[Màj 31/10] Recommandation infirmée.** Cette revue recommandait Stripe Managed Payments (section 3 et 9.1) en pensant que la Kaelite n'était visée par aucune interdiction. C'est faux : les conditions de Stripe Managed Payments (article 7(f), version du 28 septembre 2026) interdisent de l'utiliser pour vendre une « *virtual currency* » (voir l'[étude Stripe](../etude-stripe.md), section 1). **Gregory a retenu le 2026-10-31 le scénario A : Stripe classique avec Stripe Tax, Gregory vendeur légal.** Les passages de cette revue propres aux marchands de référence (B1 sur la scission des CGV, I4 et I5 pour un marchand, I11, questions 1, 4, 5, 8, 11, 14) deviennent sans objet pour la Kaelite ; ceux qui valent en vente directe (B3, B4, I1 à I3, I6 à I10, Royaume-Uni, OSS, livre des recettes, facturation) restent pleinement applicables. Les CGV ont été mises à jour en ce sens.

**Niveaux de certitude** utilisés : **élevée** (texte officiel ou documentation du prestataire consultés le 2026-10-30), **moyenne** (règle connue, confirmée par des sources secondaires concordantes), **faible** (interprétation, ou sources divergentes : à trancher par le comptable).

---

## 1. En une page

Les CGV sont solides sur le droit de la consommation, mais elles sont écrites comme si **Gregory vendait lui-même la Kaelite**, encaissait, facturait et remboursait. Or le choix du prestataire de paiement n'est pas fait, et c'est lui qui détermine tout le reste : qui est le vendeur pour la TVA, qui facture, qui rembourse, ce qui entre dans le chiffre d'affaires de la micro-entreprise, et quelles déclarations Gregory doit déposer. **C'est la décision à prendre en premier**, avant la relecture par l'avocat, faute de quoi il relira des CGV à réécrire.

Trois autres points pèsent sur l'argent réel :

1. **Les engagements de remboursement sont illimités dans le temps** dans deux clauses (bannissement hors fraude, refus d'une modification des CGV), alors qu'en micro-entreprise la recette est imposée et soumise à cotisations le jour de l'encaissement. Un remboursement tardif coûte donc le prix payé en entier, et les cotisations déjà versées ne se récupèrent que s'il reste du chiffre d'affaires futur à minorer. Il faut une **réserve de trésorerie** et un **registre des lots**.
2. **L'activité est commerciale** (édition et vente en ligne d'un contenu de jeu) : le **compte bancaire dédié est obligatoire dès l'immatriculation**, pas seulement au-delà de 10 000 € de chiffre d'affaires.
3. **La mention de TVA prévue dans les CGV est incomplète** : elle ne prévoit ni la sortie de la franchise française, ni le Royaume-Uni (TVA due dès la première vente), ni le cas d'un marchand de référence, où Gregory ne facture plus de TVA du tout.

| # | Constat | Gravité | Certitude |
|---|---|---|---|
| B1 | CGV écrites pour une vente directe, alors que le prestataire de paiement (et son modèle : simple encaisseur ou marchand de référence) n'est pas choisi | Bloquant | Élevée |
| B2 | Paddle interdit la vente de « valeur stockée » : risque de fermeture de compte et de fonds bloqués si la Kaelite y est assimilée | Bloquant (si Paddle) | Élevée sur le texte, moyenne sur l'application |
| B3 | Mention de TVA des CGV (7.1, 18) et des mentions légales incomplète ou fausse selon le scénario | Bloquant | Élevée |
| B4 | Compte bancaire dédié obligatoire dès le départ pour une activité commerciale ; immatriculation à faire avant l'ouverture du Patreon | Bloquant | Élevée |
| I1 | Engagements de remboursement sans limite de durée (CGV 15.4, 20 ; CGU 16.2) et cotisations non récupérables en fin d'activité | Important | Élevée sur le mécanisme, moyenne sur les montants |
| I2 | Remboursements tardifs « par le même moyen de paiement » souvent impossibles (fenêtres des prestataires) | Important | Moyenne |
| I3 | Gel conservatoire : CGV 13.3 (jusqu'à l'issue de la rétrofacturation) contredit CGU 9.3 (7 jours renouvelable une fois) | Important | Élevée |
| I4 | Assiette du chiffre d'affaires micro (brut ou net de frais, date d'encaissement, conversion des devises) non tranchée pour un marchand de référence et pour Patreon | Important | Faible |
| I5 | Si le marchand de référence est une entité de l'UE : numéro de TVA intracommunautaire et déclaration européenne de services (DES) obligatoires, même en franchise | Important | Moyenne |
| I6 | Kaelite offerte (bonus de préinscription et de participation, compensations, récompense de faille) : aucune règle n'interdit de la créditer sur le solde « acheté », ce qui créerait une dette de remboursement sans recette | Important | Élevée |
| I7 | Frais de paiement : le plan marketing parle d'un pourcentage seul, or il existe un frais fixe par transaction qui écrase les petits paquets | Important | Élevée |
| I8 | Prix TTC et sortie de la franchise : sans anticipation, la marge baisse d'un sixième du jour au lendemain | Important | Élevée |
| I9 | Facturation électronique : réception obligatoire depuis le 1er septembre 2026, émission et e-reporting des ventes aux particuliers au 1er septembre 2027 | Important | Moyenne |
| I10 | Sort de la Kaelite achetée lors de la suppression d'un compte inactif (5 ans) non prévu par les CGV | Important | Élevée |
| I11 | Rétractation et remboursements : la politique du marchand de référence peut contredire les articles 10, 11 et 13 | Important (si marchand de référence) | Élevée |
| M1 à M10 | Points de cohérence chiffrée, de formulation et de calendrier | Mineur | Variable |

---

## 2. Repères chiffrés 2026

| Repère | Valeur 2026 | Source | Certitude |
|---|---|---|---|
| Plafond du régime micro, prestations de services BIC | 83 600 € HT (sortie seulement après deux années consécutives de dépassement) | [service-public F32353](https://entreprendre.service-public.gouv.fr/vosdroits/F32353) | Élevée |
| Franchise en base de TVA, services | 37 500 € (seuil de base, N-1) ; 41 250 € (seuil majoré, perte immédiate dès le premier jour de dépassement) | [service-public F21746](https://entreprendre.service-public.gouv.fr/vosdroits/F21746), vérifiée le 1er janvier 2026 ; réforme du seuil unique rejetée en loi de finances 2026 | Élevée |
| Seuil européen des services électroniques aux particuliers de l'UE | 10 000 € HT, tous pays de l'UE cumulés hors France, apprécié sur l'année civile précédente **et** l'année en cours (article 259 D du CGI, article 59 *quater* de la directive 2006/112/CE) | [BOFiP, actualité 2021](https://bofip.impots.gouv.fr/bofip/13411-PGP.html/ACTU-2021-00303) | Moyenne sur le mode de calcul, élevée sur le seuil |
| Cotisations sociales, BIC prestations de services | 21,2 % du chiffre d'affaires ; 22,9 % avec le versement libératoire (1,7 %) | [service-public F36232](https://entreprendre.service-public.gouv.fr/vosdroits/F36232), vérifiée le 1er janvier 2026 | Élevée |
| Contribution à la formation professionnelle | 0,1 % (commerçant), en plus | Sources secondaires | Moyenne |
| Abattement forfaitaire pour l'impôt sur le revenu (micro-BIC services) | 50 % | Règle connue | Élevée |
| ACRE | Sur demande à l'URSSAF ; réduction ramenée de 50 % à 25 % pour les débuts d'activité depuis le 1er juillet 2026 ; conditions d'éligibilité à vérifier | [Hayot Expertise](https://hayot-expertise.fr/blog/acre-2026-exoneration-createur-apres-reforme), [Clementine](https://www.clementine.fr/blog/creation-et-financement/acre-2026/) | Moyenne |
| CFE | Exonération l'année de création ; ensuite exonération si le chiffre d'affaires de référence est au plus de 5 000 € | [Bpifrance Création](https://bpifrance-creation.fr/encyclopedie/aides-a-creation-a-reprise-dentreprise/aides-fiscales/exonerations-cotisation-fonciere) | Moyenne |
| Compte bancaire dédié | Obligatoire dès le départ pour une activité commerciale ; sinon au-delà de 10 000 € deux années de suite | [service-public F35991](https://entreprendre.service-public.gouv.fr/vosdroits/F35991), vérifiée le 28 mai 2026 | Élevée |
| Royaume-Uni, services numériques aux particuliers par un vendeur étranger | TVA britannique due dès la première vente, aucun seuil | [gov.uk](https://www.gov.uk/government/publications/revenue-and-customs-brief-4-2016-vat-moss-simplifications-for-businesses-trading-below-the-vat-registration-threshold), [vatcalc](https://www.vatcalc.com/uk/uk-vat-on-foreign-digital-services/) | Élevée |

**Le « seuil de 5 000 € »** de la mémoire du projet (26/10) était l'objectif d'un financement participatif, abandonné le 27/10 au profit du Patreon. Il n'a aucune portée fiscale. Il coïncide seulement avec le seuil d'exonération de la CFE.

**Nature de l'activité.** Vendre de la Kaelite, des passes et un abonnement de confort, c'est fournir un **service électronique** (annexe II de la directive TVA ; un contenu numérique sans support est une prestation de services, pas une vente de marchandises). Pour la micro-entreprise, l'activité relève des **BIC, prestations de services**, à 21,2 %, et non de la vente de marchandises (12,3 %, plafond 203 100 €), ni d'une activité libérale (BNC, 25,6 %). Le code d'activité probable est 58.21Z (édition de jeux électroniques), une activité **commerciale**. Certitude : moyenne à élevée ; à faire confirmer lors de l'immatriculation.

---

## 3. Qui encaisse, qui facture, qui déclare : les quatre scénarios

C'est le cœur de la revue. Le choix du prestataire change la nature juridique de la vente.

| | **A. Stripe classique** (Gregory vendeur) | **B. Stripe Managed Payments** (marchand de référence) | **C. Paddle** (marchand de référence) | **D. Lemon Squeezy** (marchand de référence) |
|---|---|---|---|---|
| Vendeur pour le joueur | Gregory EI | Stripe, sous la marque Link (« Vendu via Link ») | Paddle | Lemon Squeezy LLC |
| Client de Gregory | Chaque joueur | Stripe | Paddle | Lemon Squeezy |
| TVA, taxes de vente | **Gregory** : franchise française, puis OSS au-delà de 10 000 € dans l'UE, Royaume-Uni dès la 1re vente, autres pays selon leurs seuils | Stripe, dans plus de 80 pays ; Gregory reste redevable ailleurs | Paddle | Lemon Squeezy |
| Facture ou reçu au joueur | Gregory | Stripe (PDF systématique) | Paddle | Lemon Squeezy |
| Rétractation, remboursements | Gregory | Stripe et Gregory ; Stripe peut rembourser sans accord dans les 60 jours et si Gregory ne répond pas sous 48 h | Paddle et Gregory | Lemon Squeezy et Gregory |
| Rétrofacturations | Gregory (frais forfaitaire par litige, preuves à fournir) | Stripe les traite et soumet les preuves | Paddle | Lemon Squeezy |
| Acceptation de la Kaelite | Oui (activité « restreinte » chez Stripe, sauf pour l'exploitant du monde virtuel, ce qu'est Gregory : à déclarer clairement à l'ouverture du compte) | ~~Catégorie « jeux vidéo » éligible ; la France est un pays vendeur éligible ; examen d'éligibilité préalable~~ **[Màj 31/10] Interdit : l'article 7(f) des conditions exclut la vente de monnaie virtuelle** (étude Stripe) | **Interdit : « virtual currency or stored value, including store credit »** : confirmation écrite indispensable (B2) | Pas d'interdiction explicite ; produits numériques admis ; confirmation recommandée |
| Frais indicatifs (à vérifier au contrat) | 1,5 % + 0,25 € (cartes de l'EEE) ; plus pour les cartes britanniques et hors EEE | Frais Stripe + 3,5 % | 5 % + 0,50 $ | 5 % + 0,50 $ (+ surcoûts internationaux) |
| Limites | Toute la conformité fiscale mondiale | Page de paiement Stripe seulement (pas de domaine personnalisé), Checkout ou Payment Links | Interdiction ci-dessus | Avenir incertain depuis le rachat par Stripe |

Sources : [Stripe Managed Payments](https://docs.stripe.com/payments/managed-payments), [éligibilité](https://docs.stripe.com/payments/managed-payments/eligibility), [fonctionnement](https://docs.stripe.com/payments/managed-payments/how-it-works) ; [Paddle, produits interdits](https://paddle.com/help/start/intro-to-paddle/what-am-i-not-allowed-to-sell-on-paddle) ; [Lemon Squeezy, produits interdits](https://docs.lemonsqueezy.com/help/getting-started/prohibited-products), consultés le 2026-10-30.

### Ce que coûte chaque scénario sur un achat de 10 € TTC d'un joueur français

Calcul indicatif, Gregory en franchise de TVA, cotisations à 22,9 % (versement libératoire compris), sur l'hypothèse la plus prudente d'une assiette brute :

| | Prix payé | TVA | Frais | Encaissé par Gregory | Cotisations et impôt libératoire | **Reste** |
|---|---|---|---|---|---|---|
| A. Stripe classique | 10,00 € | 0 (franchise) | 0,40 € | 9,60 € | 2,29 € (sur 10,00 €) | **7,31 €** |
| B. Stripe Managed Payments | 10,00 € | 1,67 € (20 %, collectée par Stripe) | environ 0,75 € | environ 7,58 € | 1,91 € (sur 8,33 €) | **environ 5,67 €** |
| C. Paddle | 10,00 € | 1,67 € | environ 0,96 € | environ 7,37 € | 1,91 € | **environ 5,46 €** |

**Lecture.** Un marchand de référence n'est jamais en franchise : il collecte toujours la TVA du pays du joueur. Pour un joueur français, il coûte donc environ **un quart du revenu net** tant que Gregory bénéficie de la franchise. En contrepartie, il supprime toute la conformité fiscale étrangère (OSS, Royaume-Uni, États américains, Suisse, Norvège, Canada, Australie, etc.), les rétrofacturations et le service client de paiement.

**[Màj 31/10] Recommandation infirmée** : Managed Payments ne peut pas vendre la Kaelite (article 7(f) de ses conditions, voir l'étude Stripe). **Décision de Gregory : scénario A, Stripe classique + Stripe Tax**, avec les obligations qui l'accompagnent (franchise puis TVA française, seuil de 10 000 € et guichet OSS que Stripe Tax ne dépose pas pour un vendeur français, Royaume-Uni). Texte initial, conservé pour mémoire : ~~**Recommandation (certitude moyenne, c'est un arbitrage).** Pour un entrepreneur seul, sans comptable salarié et avec une ambition internationale dès la bêta, **le marchand de référence est le bon choix au lancement**, et **Stripe Managed Payments est le premier candidat** (pays et catégorie éligibles, Kaelite non visée par une interdiction). À faire avant tout développement : faire valider le produit par Stripe (examen d'éligibilité), par écrit. Paddle ne vient qu'après une confirmation écrite que la Kaelite n'est pas de la « valeur stockée ». Le scénario A redevient intéressant si la clientèle reste très majoritairement française ; il suppose alors de bloquer les achats depuis le Royaume-Uni ou de s'y immatriculer à la TVA, et de suivre le seuil de 10 000 € au jour le jour.~~

---

## 4. Constats bloquants

### B1. Les CGV supposent une vente directe

**Constat.** Article 2 (le vendeur est Gregory EI), 9 (paiement « traité par le prestataire »), 11.5 (Gregory rembourse), 13 (Gregory gère les rétrofacturations), 18 (Gregory émet le justificatif et applique la TVA). Avec un marchand de référence, le joueur achète au marchand, pas à Gregory : l'article 2 est faux, la facture vient du marchand, le remboursement passe par lui, et ses propres conditions d'achat s'appliquent au paiement. La relecture par l'avocat (README, point 4) porterait sur un texte à refaire.

**Correction proposée.** Choisir le prestataire (section 9), puis, en cas de marchand de référence, scinder le texte : (1) les conditions du marchand régissent l'achat, le paiement, la facture, la rétractation légale et les rétrofacturations ; (2) des « conditions de la Kaelite » de Gregory régissent ce qui se passe après le crédit : nature, deux soldes, ordre de dépense, bonus, fermeture de serveur, sanctions, engagements commerciaux de remboursement. Les articles 7.1, 9, 11.5, 13.3 et 18 renvoient alors aux conditions du marchand. En cas de vente directe (scénario A), le texte actuel convient, sous réserve de B3.

**Certitude.** Élevée.

### B2. Paddle et la « valeur stockée »

**Constat.** Paddle interdit « *virtual currency or stored value, including but not limited to store credit, gift cards, vouchers* ». Une monnaie de jeu achetée en lots, conservée sur un compte, remboursable au prorata (CGV 14.4, 15.4, 20), ressemble à un avoir. Un refus a posteriori se traduit en général par une fermeture de compte et une retenue des fonds.

**Correction proposée.** Si Paddle est envisagé : décrire la Kaelite au service commercial de Paddle (non convertible, non cessible, usage limité au jeu, remboursable seulement dans les cas des CGV) et obtenir une **confirmation écrite** avant l'intégration. Même démarche, plus légère, auprès de Stripe (examen d'éligibilité de Managed Payments) et de Lemon Squeezy. *[Màj 31/10 : sans objet, Stripe classique retenu ; garder seulement la demande de confirmation écrite à Stripe que la Kaelite relève de l'exception « exploitant du monde virtuel »]*

**Certitude.** Élevée sur le texte de Paddle, moyenne sur la façon dont Paddle l'applique aux monnaies de jeu.

### B3. La mention de TVA des CGV et des mentions légales

**Constat.** CGV 7.1 et 18 prévoient deux états : franchise (« TVA non applicable, art. 293 B du CGI »), puis « TVA du pays du client au-delà du seuil européen de 10 000 € ». Il manque :
- la **sortie de la franchise française** : au-delà de 41 250 € dans l'année (ou de 37 500 € l'année précédente), la TVA française à 20 % s'applique aux joueurs français, et aux joueurs de l'UE tant que le seuil de 10 000 € n'est pas franchi ;
- les **pays tiers** : au Royaume-Uni, la TVA est due dès la première vente par un vendeur étranger ; d'autres pays ont leurs propres seuils ;
- le **marchand de référence** : Gregory ne mentionne plus aucune TVA envers le joueur ; c'est le marchand qui facture.

La mention « 293 B » est, en outre, une mention de **facture**, pas une mention de prix : sur la page de la boutique, seul le prix TTC est exigé.

**Correction proposée.** Scénario A : « Les prix sont indiqués toutes taxes comprises. La taxe applicable dépend de votre pays de résidence et figure sur votre justificatif ; tant que l'Éditeur bénéficie de la franchise en base, les ventes soumises à la TVA française portent la mention TVA non applicable, art. 293 B du CGI. » Scénario B, C ou D : « Le paiement est encaissé par [marchand], revendeur et marchand officiel, qui facture la taxe applicable dans votre pays et vous adresse la facture. » Dans les mentions légales, garder la mention 293 B tant que la franchise s'applique, et ajouter le numéro de TVA intracommunautaire dès qu'il est attribué (voir I5).

**Certitude.** Élevée.

### B4. Immatriculation et compte bancaire dédié

**Constat.** Le plan marketing (8) pose « auto-entreprise immatriculée, compte bancaire dédié » comme préalables au Patreon : c'est juste, mais le compte dédié n'est pas une simple précaution. Pour une activité **commerciale**, il est **obligatoire dès le départ** (service-public, vérifié le 28 mai 2026). Les revenus du Patreon, perçus avant l'immatriculation, ne pourraient pas être rattachés proprement à l'entreprise.

**Correction proposée.** Ordre : immatriculation (activité commerciale, micro-BIC prestations de services), puis ouverture d'un compte dédié (compte personnel séparé possible, un compte professionnel n'est pas exigé par la loi), puis compte Patreon et compte du prestataire de paiement à ce nom et sur ce compte. Le Patreon n'ouvre qu'après.

**Certitude.** Élevée.

---

## 5. Constats importants

### I1. Engagements de remboursement sans limite de durée

**Constat.** En micro-entreprise, la comptabilité est une comptabilité de **trésorerie** : la recette est déclarée à l'URSSAF et à l'impôt le mois ou le trimestre de son encaissement, que la Kaelite soit dépensée ou non. La notion de produit constaté d'avance n'existe pas dans ce régime. Un remboursement ultérieur vient minorer le chiffre d'affaires de la période où il est fait. S'il n'y a plus de chiffre d'affaires (arrêt du jeu, cessation), les cotisations versées sur la recette remboursée sont perdues en pratique, et les frais de paiement ne sont jamais rendus par les prestataires.

Or les textes prévoient trois remboursements **sans plafond de durée** :
- CGV 15.4 : bannissement du compte hors fraude, toute la Kaelite achetée non dépensée, quelle que soit l'ancienneté du lot ;
- CGV 20 et CGU 16.2 : refus d'une modification des CGV ou CGU, toute la Kaelite achetée non dépensée ;
- CGU 16.2 étend même ce droit à **toute** modification des CGU, y compris celles qui ne touchent pas la Kaelite, alors que CGV 20 le limite aux modifications qui affectent la Kaelite. Les deux textes ne disent pas la même chose.

Seul l'arrêt du jeu (CGV 14.4) est plafonné aux lots des 12 derniers mois. Grâce à l'ordre de dépense (Kaelite gagnée d'abord, puis lots du plus ancien au plus récent, CGV 5.3), le solde restant est surtout composé de lots récents, ce qui est favorable.

**Ordre de grandeur.** Hypothèse du plan marketing : 300 à 450 € de ventes par mois. Si un tiers de la Kaelite achetée reste non dépensé, la dette de remboursement potentielle tourne autour de 1 200 à 1 800 € par année de ventes, à couvrir en trésorerie.

**Correction proposée.**
1. Aligner CGU 16.2 sur CGV 20 : le droit au remboursement ne naît que d'une modification qui affecte la Kaelite achetée.
2. Proposer à l'avocat un plafond commun (par exemple les lots des 24 derniers mois) pour CGV 15.4 et 20, à valider au regard des clauses abusives (README, point 4). Certitude juridique : faible, c'est à lui de dire si c'est opposable.
3. Tenir une **réserve de trésorerie** égale à la valeur, au prix payé, de la Kaelite achetée non dépensée des lots remboursables (voir section 6), sur le compte dédié, distincte de l'argent disponible.
4. Ne pas annoncer l'arrêt du jeu après la cessation de l'entreprise : les remboursements de CGV 14.4 doivent être faits **avant** la radiation, pendant que du chiffre d'affaires peut encore les absorber.

**Certitude.** Élevée sur le mécanisme de trésorerie ; moyenne sur la possibilité de déclarer un chiffre d'affaires négatif ou de régulariser les cotisations après coup (question 3).

### I2. Remboursements tardifs « par le même moyen de paiement »

**Constat.** L'article 11.5 (rétractation) impose le même moyen de paiement, sauf accord du joueur : c'est la loi (L221-24). Mais les remboursements de CGV 14.4 (jusqu'à 6 mois après l'arrêt), 15.4 et 20 peuvent porter sur des paiements vieux de plusieurs mois ou années. Les remboursements sur carte ont des fenêtres limitées selon les prestataires ; les cartes expirent ; avec un marchand de référence, le remboursement doit passer par lui, et son solde négatif est débité à Gregory. Stripe précise aussi que, dans certains pays, la taxe collectée n'est pas rendue au vendeur lors d'un remboursement : Gregory rembourse alors le prix TTC en ne récupérant que le HT.

**Correction proposée.** Dans CGV 14.4, 15.4 et 20, prévoir : « par le moyen de paiement d'origine lorsque c'est possible, sinon par virement sur un compte au nom du joueur ou de son représentant légal ». Prévoir le recueil d'un IBAN et sa suppression après remboursement (à ajouter à la politique de confidentialité, 2.6). Vérifier au contrat du prestataire retenu la fenêtre de remboursement et le sort de la taxe.

**Certitude.** Moyenne (les fenêtres exactes dépendent du contrat).

### I3. Gel conservatoire en cas de rétrofacturation

**Constat.** CGV 13.3 : une rétrofacturation entraîne le gel du portefeuille « jusqu'à son issue ». CGU 9.3 : un gel dure 7 jours au plus, renouvelable une fois. Or une contestation de paiement peut être ouverte par le porteur de carte jusqu'à 120 jours après l'achat environ, et se dénouer en plusieurs semaines. Les deux clauses sont incompatibles.

**Correction proposée.** Dans CGU 9.3, exclure du plafond de 7 jours le gel lié à une rétrofacturation en cours, renvoyé à CGV 13.3 ; limiter ce gel à la **Kaelite du lot contesté** plutôt qu'à tout le portefeuille, ce qui est plus proportionné. Comptablement, une rétrofacturation se traite comme un remboursement (minoration de la recette à la date du débit) ; le frais de litige est une charge non déductible en micro-entreprise.

**Certitude.** Élevée sur la contradiction ; moyenne sur les délais de contestation, qui varient selon les réseaux de cartes.

### I4. Assiette du chiffre d'affaires micro

**Constat.** Trois incertitudes, toutes de nature à changer les cotisations :
- **Marchand de référence.** Gregory vend au marchand, pas au joueur. Son chiffre d'affaires est-il le prix HT payé par le joueur, ou ce que lui reverse le marchand (après sa commission) ? Les deux lectures circulent ; l'écart représente 5 à 10 % de l'assiette.
- **Patreon.** Même question entre le montant brut des soutiens hors TVA et le versement net des 10 % de commission et des frais de paiement. En micro-entreprise, les frais ne sont jamais déductibles : l'enjeu est donc réel.
- **Date et devise.** Patreon verse en dollars. Les marchands de référence versent selon un calendrier. La date d'encaissement retenue (paiement du joueur ou versement sur le compte) et le cours de conversion doivent être fixés une fois pour toutes et appliqués de façon constante.

**Correction proposée.** Faire trancher ces trois points par le comptable (questions 1 et 2), puis les écrire dans une note de méthode d'une page, conservée avec le livre des recettes.

**Certitude.** Faible : c'est précisément le point à faire trancher.

### I5. Prestation à une entité de l'UE : numéro de TVA et DES

**Constat.** Avec un marchand de référence, Gregory rend une prestation de services à une entreprise. Si cette entreprise est établie dans un autre État de l'UE (par exemple une entité irlandaise du groupe Stripe), la prestation est imposable dans cet État, par autoliquidation (article 259-1° du CGI). Même en franchise, Gregory doit alors **obtenir un numéro de TVA intracommunautaire**, porter la mention « Autoliquidation » sur ses factures au marchand, et déposer la **déclaration européenne de services** chaque mois où il y a une opération. Si l'entité est hors UE (Paddle au Royaume-Uni, Lemon Squeezy ou Patreon aux États-Unis), la prestation est hors champ de la TVA française, sans DES.

**Correction proposée.** Identifier l'entité contractante exacte dans le contrat du marchand retenu, puis appliquer la règle correspondante (question 4).

**Certitude.** Moyenne (la règle est connue, l'entité contractante reste à identifier).

### I6. La Kaelite offerte ne doit jamais entrer dans le solde « acheté »

**Constat.** Le solde « acheté » ouvre droit à remboursement au prorata du prix payé. Plusieurs crédits gratuits sont prévus ou envisagés : bonus des préinscrits et des participants à la bêta (plan marketing 8), compensations après incident, récompense de faille de sécurité (CGU 12), éventuelle fonction de cadeau (CGV 4.2). Rien n'interdit aujourd'hui de les créditer en Kaelite achetée. Ce serait une dette de remboursement sans recette, et une source d'erreur dans le calcul du prorata. Par ailleurs la Kaelite gagnée est liée à un serveur, ce qui ne convient pas à un bonus de compte (préinscription, compensation globale).

**Correction proposée.** Poser la règle dans les CGV (article 3) : seule la Kaelite d'un lot payé, bonus d'achat compris, est de la Kaelite achetée. Pour les crédits gratuits liés au compte, créer une troisième catégorie, « Kaelite offerte », liée au compte, jamais remboursable, dépensée avant la Kaelite achetée ; ou décider que ces bonus sont de la Kaelite gagnée sur un serveur désigné. À soumettre à Gregory (décision de conception).

**Certitude.** Élevée.

### I7. Le frais fixe par transaction

**Constat.** Le plan marketing (10) range les frais de la boutique parmi les « pourcentages, pas un coût fixe ». Tous les prestataires prennent aussi un frais fixe : 0,25 € chez Stripe, 0,50 $ chez Paddle et Lemon Squeezy, 0,30 $ chez Patreon. Sur un paquet à 1,99 €, Paddle prend environ un tiers du prix hors taxe.

**Correction proposée.** Pas de paquet de Kaelite en dessous de 4,99 € TTC ; préférer des paliers à 4,99, 9,99, 19,99 et 49,99 €. Corriger la phrase du plan marketing.

**Certitude.** Élevée.

### I8. Prix TTC et sortie de la franchise

**Constat.** Les prix sont affichés TTC (CGV 7.1). En vente directe (scénario A), à la sortie de la franchise, un paquet à 9,99 € qui rapportait 9,99 € n'en rapporte plus que 8,33 €, sans changement visible pour le joueur. Changer les prix au même moment serait mal perçu.

**Correction proposée.** En scénario A, fixer les prix comme s'ils incluaient déjà 20 % de TVA, et suivre chaque mois le chiffre d'affaires cumulé de l'année face à 37 500 € et 41 250 €. En scénario B, C ou D, la question ne se pose pas : la TVA est toujours déduite.

**Certitude.** Élevée.

### I9. Facturation électronique

**Constat.** Depuis le **1er septembre 2026**, toute entreprise, micro-entreprise en franchise comprise, doit pouvoir **recevoir** ses factures fournisseurs par une plateforme agréée. Au **1er septembre 2027**, les micro-entreprises devront **émettre** leurs factures entre entreprises sous forme électronique et **transmettre les données de leurs ventes aux particuliers et à l'étranger** (e-reporting), même en franchise.

**Correction proposée.** À l'immatriculation, choisir une plateforme agréée (beaucoup de logiciels de facturation pour micro-entrepreneurs en intègrent une). Pour 2027, vérifier avec le comptable comment l'e-reporting s'applique aux ventes passées par un marchand de référence (une seule facture mensuelle au marchand, ou rien côté particuliers).

**Certitude.** Moyenne (sources secondaires concordantes, textes officiels non relus).

### I10. Suppression d'un compte inactif détenant de la Kaelite achetée

**Constat.** La politique de confidentialité (2) supprime ou anonymise un compte après 5 ans sans connexion s'il détient de la Kaelite achetée, après un préavis de 60 jours. Les CGV ne disent pas ce que devient le solde. Comptablement, il n'y a rien à faire en micro-entreprise (la recette a déjà été déclarée) ; juridiquement, une perte non annoncée dans les CGV est contestable.

**Correction proposée.** Ajouter aux CGV : « Après 5 ans sans connexion et un préavis de 60 jours par courriel resté sans réponse, le compte est supprimé et la Kaelite qu'il détient est perdue. » Garder la preuve de l'envoi du préavis.

**Certitude.** Élevée sur la lacune.

### I11. Politique du marchand de référence face aux articles 10, 11 et 13

**Constat.** Stripe Managed Payments déclare appliquer lui-même « les délais de rétractation régionaux » et peut rembourser jusqu'à 60 jours après l'achat, sans l'accord du vendeur. Le parcours des articles 10 et 11 (livraison immédiate avec renonciation, ou livraison différée de 14 jours) devra s'articuler avec la page de paiement du marchand, que Gregory ne contrôle pas. La livraison différée suppose de savoir que la page de paiement Stripe ne recueille pas elle-même une renonciation contraire.

**Correction proposée.** Une fois le marchand choisi, faire relire par l'avocat les conditions d'achat du marchand avec les articles 10, 11 et 13. Comptablement, la livraison différée ne change rien en micro-entreprise : la recette est déclarée à l'encaissement, pas au crédit de la Kaelite.

**Certitude.** Élevée sur l'existence du sujet ; à vérifier sur le contrat.

---

## 6. Traitement comptable de la Kaelite

### En micro-entreprise (situation de départ)

- **Recette** : le montant encaissé, à sa date d'encaissement, selon la méthode fixée en I4. Pas de produit constaté d'avance, pas de provision : la micro-entreprise n'a qu'un livre des recettes.
- **Bonus d'achat de la bêta (+30 %)** : aucune écriture. Le prix payé couvre tout le lot ; aucune TVA n'est due sur le bonus.
- **Kaelite gagnée** : aucune écriture, aucune TVA.
- **Remboursement, rétractation, rétrofacturation** : minoration de la recette de la période où il est payé, inscrite au livre des recettes avec sa référence (question 3 pour le cas où la période n'a pas assez de recettes).
- **Recrédit en Kaelite** (fermeture de serveur, CGV 14.3) : aucune écriture, il n'y a pas de flux d'argent.
- **Bannissement pour fraude, Kaelite perdue** : aucune écriture.

### Le registre des lots : indispensable même en micro-entreprise

Il ne s'agit pas d'une obligation comptable, mais sans lui les remboursements au prorata (CGV 6.3, 11.3, 14.4, 15.4, 20) sont impossibles à calculer. Il relève du lobby, donc du code (cf. README, section 5). Champs par lot : identifiant de commande et de transaction du prestataire, date, compte, pays de résidence déclaré, prix TTC, taxe, devise, quantité de base, bonus, quantité restante, statut (actif, remboursé, contesté, perdu).

**Calcul du remboursement d'un lot** : prix payé × (Kaelite restante du lot ÷ Kaelite totale du lot, bonus compris). Exemple : lot de 1 000 Kaelite + 300 de bonus pour 9,99 € ; 520 restantes ; remboursement 9,99 × 520 ÷ 1 300 = 4,00 €. Comme la base et le bonus sont consommés en proportion (CGV 5.3), la formule est cohérente avec l'article 6.3.

**Valeur de la dette potentielle**, à recalculer chaque mois : somme, sur les lots actifs, de prix payé × restant ÷ total. C'est le montant de la réserve de trésorerie (I1).

### Si l'entreprise passe un jour au régime réel ou en société

Le chiffre d'affaires sera alors rattaché à l'exercice selon les règles de la comptabilité d'engagement. La pratique des éditeurs de jeux est de ne reconnaître le produit qu'à la consommation de la monnaie virtuelle, avec un produit constaté d'avance sur le solde non consommé, et d'estimer la part qui ne sera jamais consommée. Le registre des lots rend ce changement possible sans reconstitution. Sujet à revoir au moment du changement de régime (question 9).

### Revenus Patreon

- Patreon collecte et reverse la TVA de ses membres européens et figure comme redevable sur les déclarations : Gregory ne facture aucune TVA aux soutiens.
- Pour Gregory, c'est une prestation rendue à Patreon, Inc. (États-Unis) : hors champ de la TVA française, sans DES.
- Le revenu entre dans le chiffre d'affaires de la micro-entreprise, dans la même activité BIC (question 2 sur l'assiette et sur le rattachement BIC ou BNC).
- Remplir le formulaire fiscal américain W-8BEN demandé par Patreon, pour éviter toute retenue à la source (la convention franco-américaine s'applique aux bénéfices d'entreprise). Même démarche avec un marchand de référence américain.
- Une plateforme comme Patreon peut transmettre les revenus de ses créateurs à l'administration fiscale (directive DAC7) : déclarer exactement ce que Patreon a versé (question 8).

---

## 7. Obligations déclaratives et calendrier

| Quand | Quoi | Où | Scénario |
|---|---|---|---|
| À l'immatriculation | Déclaration d'activité commerciale, option micro-social, choix de la périodicité (mensuelle ou trimestrielle), option éventuelle pour le versement libératoire, demande d'ACRE si éligible | Guichet unique de l'INPI, puis autoentrepreneur.urssaf.fr | Tous |
| Dès l'immatriculation | Ouverture du compte dédié ; choix d'une plateforme agréée de réception des factures ; logiciel ou tableur pour le livre des recettes | Banque, plateforme agréée | Tous |
| Chaque mois ou trimestre | Déclaration du chiffre d'affaires encaissé, **même nul**, et paiement des cotisations (et du versement libératoire) | autoentrepreneur.urssaf.fr | Tous |
| Chaque mois où une opération a lieu | Déclaration européenne de services | impots.gouv.fr | Marchand de référence établi dans l'UE (I5) |
| Avant le 31 décembre de l'année de création | Déclaration initiale de CFE (1447-C-SD), si le service des impôts la demande | impots.gouv.fr, espace professionnel | Tous |
| Chaque printemps | Déclaration de revenus avec l'annexe 2042-C-PRO (chiffre d'affaires de l'année, case des prestations de services BIC), même avec le versement libératoire | impots.gouv.fr | Tous |
| Chaque fin d'année, à partir de la 2e année | CFE (avis en ligne), sauf exonération si chiffre d'affaires de référence au plus de 5 000 € | impots.gouv.fr | Tous |
| Chaque trimestre, dès le dépassement de 10 000 € dans l'UE | Déclaration du guichet unique OSS, même à zéro | impots.gouv.fr | A seulement |
| Dès la première vente britannique | Immatriculation à la TVA britannique et déclarations | HMRC | A seulement, sauf blocage des ventes au Royaume-Uni |
| 1er septembre 2027 | Émission électronique et e-reporting | Plateforme agréée | Tous, modalités selon I9 |

**Conservation.** Livre des recettes, relevés du prestataire, relevés bancaires, factures d'achat et justificatifs de remboursement : 10 ans (les textes retiennent 6 ans pour l'administration fiscale et 10 ans pour le Code de commerce ; la politique de confidentialité retient 10 ans, ce qui est cohérent).

**Livre des recettes.** Une ligne par encaissement : date, identité du client, nature de la prestation, montant, mode de règlement, référence de la pièce. Pour les petites ventes au détail payées par des particuliers, un total journalier est admis quand chaque opération est inférieure à 76 € TTC (certitude moyenne, à confirmer, question 6). Avec un marchand de référence, une ligne par versement suffit, justifiée par son relevé.

**Facture ou note aux particuliers.** En vente directe, une note est obligatoire pour une prestation de 25 € TTC ou plus, et sur demande en dessous ; le justificatif prévu à l'article 18 la remplace s'il porte les mentions : numéro unique et chronologique, date, nom commercial suivi de « EI », adresse, SIREN, désignation, quantité, prix, taxe ou mention 293 B, date de paiement. Avec un marchand de référence, c'est lui qui facture le joueur, et Gregory facture le marchand (ou reçoit de lui un relevé d'autofacturation, à vérifier au contrat).

**Impôt sur le revenu.** Versement libératoire (1,7 % du chiffre d'affaires, en plus des cotisations) : intéressant si le taux marginal du foyer est faible ou nul et si le revenu fiscal de référence de l'avant-dernière année est sous le plafond par part ; à défaut, imposition au barème après abattement de 50 %. À simuler avec le comptable (question 7).

---

## 8. Questions à poser à un expert-comptable humain

1. **Assiette avec un marchand de référence** : chiffre d'affaires = prix HT payé par le joueur, ou somme reversée par le marchand ? Date d'encaissement : paiement du joueur ou versement ? Cours de conversion ?
2. **Patreon** : revenu déclaré brut ou net des frais ? Rattaché à l'activité commerciale BIC du jeu, ou en BNC comme activité de création de contenu ? Faut-il une seconde activité déclarée ?
3. **Remboursements** : comment déclarer un mois où les remboursements dépassent les recettes (chiffre d'affaires négatif impossible à saisir) ? Report sur le mois suivant ? Que devient la perte en cas de cessation ?
4. **Entité contractante** du marchand retenu : si elle est établie dans l'UE, confirmer l'obligation de numéro de TVA intracommunautaire et de DES en franchise.
5. **Seuil de 10 000 €** : confirmer qu'il s'apprécie sur l'année précédente et l'année en cours, et que les ventes passées par un marchand de référence n'y entrent pas.
6. **Franchise française** : les recettes Patreon et les reversements d'un marchand étranger (prestations dont le lieu est hors de France) entrent-elles dans le calcul des seuils de 37 500 € et 41 250 € ? Et la tolérance du total journalier au livre des recettes s'applique-t-elle ?
7. **Versement libératoire** et **ACRE** : intérêt et éligibilité selon la situation fiscale du foyer de Gregory.
8. **DAC7** : Patreon ou le marchand transmettront-ils les revenus à l'administration ? Comment rapprocher ces chiffres de la déclaration ?
9. **TVA de la Kaelite en vente directe** : imposition au moment de l'achat (service électronique), ou au moment de l'utilisation si la Kaelite était un « bon à usages multiples » (directive (UE) 2016/1065) ? La pratique retient l'achat, la doctrine n'est pas fixée.
10. **Réserve de trésorerie** : un montant de référence pour la dette de remboursement, et faut-il l'afficher dans un suivi en cas de passage au réel ?
11. **Facturation électronique** : quelle plateforme agréée pour un micro-entrepreneur sans clients professionnels hors le marchand de référence ? Quel e-reporting en 2027 si toutes les ventes aux particuliers passent par le marchand ?
12. **CFE** : commune de rattachement en cas de domiciliation commerciale ; montant de la base minimum ; dépôt de la 1447-C-SD.
13. **Steam** (plan marketing, 5) : si la version Steam ouvre, Valve sera le vendeur ; même analyse que pour un marchand de référence, avec 30 % de commission.

---

## 9. Ce que Gregory doit décider ou ouvrir

### À décider

1. ~~**Le prestataire de paiement et son modèle** (section 3). Recommandation : Stripe Managed Payments, sous réserve d'une validation écrite de la Kaelite par Stripe ; Paddle seulement après confirmation écrite (B2).~~ **[Màj 31/10] Décidé** : Stripe classique + Stripe Tax, Gregory vendeur légal (Managed Payments interdit la monnaie virtuelle, étude Stripe). Restent à faire : confirmation écrite de Stripe sur la Kaelite, choix sur le Royaume-Uni (point 8), suivi des seuils de 10 000 € (OSS, que Stripe Tax ne dépose pas pour un vendeur français) et de la franchise.
2. **Le moment de l'immatriculation** : avant l'ouverture du Patreon pendant l'alpha. L'ACRE, si Gregory y est éligible, se demande dans les 60 jours (délai à confirmer) ; la CFE est exonérée l'année de création, ce qui plaide pour un début d'activité en début d'année civile si le calendrier le permet.
3. **Le versement libératoire** : oui ou non (question 7).
4. **La périodicité des déclarations URSSAF** : mensuelle (suivi plus fin, recommandée tant que les remboursements sont possibles) ou trimestrielle.
5. **La Kaelite offerte** (I6) : troisième catégorie liée au compte, ou Kaelite gagnée sur un serveur désigné.
6. **Le plafond de durée des remboursements** de CGV 20 (I1), à proposer à l'avocat. *[Màj 31/10 : CGV 15.4 ne prévoit plus de remboursement en cas de bannissement (décision de Gregory) ; CGV 14.4 rembourse sans limite d'ancienneté à l'arrêt du jeu, d'où l'importance de la réserve de trésorerie]*
7. **La grille des paquets** : rien en dessous de 4,99 € TTC (I7) ; prix calculés comme s'ils comprenaient déjà la TVA (I8). *[Màj 31/10 : Gregory vise un pack minimum à 0,99 € ; l'étude Stripe le juge viable seulement comme offre de bienvenue unique par compte (frais de 27 %, environ 0,50 € de reste). Les CGV ne fixent aucun montant]*
8. **Les ventes au Royaume-Uni** en cas de vente directe : immatriculation à la TVA britannique, ou blocage des achats depuis le Royaume-Uni.
9. **Le plafond des mineurs** : 50 € par mois civil (CGV 16.2), cohérent avec le panier visé de 15 € ; préciser qu'il inclut l'abonnement de confort payé en euros (M3). *[Màj 31/10 : 50 € validé par Gregory]*

### À ouvrir

| Compte ou service | Pourquoi | Coût indicatif |
|---|---|---|
| Immatriculation de la micro-entreprise | Préalable à tout encaissement | Gratuit |
| Compte bancaire dédié | Obligatoire pour une activité commerciale (B4) | 0 à 15 € par mois |
| Espace professionnel impots.gouv.fr et espace autoentrepreneur.urssaf.fr | Déclarations | Gratuit |
| Plateforme agréée de facturation électronique (ou logiciel qui en intègre une) | Réception obligatoire depuis le 1er septembre 2026 (I9) | Souvent gratuit pour une micro-entreprise |
| Domiciliation commerciale | Ne pas publier l'adresse personnelle (README, 4.1) | 10 à 30 € par mois |
| Compte Stripe (classique, avec Stripe Tax), au nom de l'EI, relié au compte dédié ; mode test possible avant l'immatriculation, activation après *[Màj 31/10]* | Boutique de la bêta | 1,5 % + 0,25 € par paiement (cartes de l'EEE) ; Stripe Tax 0,5 % en Checkout (à confirmer) |
| Compte Patreon, au nom de l'EI, versements sur le compte dédié, W-8BEN rempli | Ouverture du Patreon | 10 % + frais de paiement |
| Numéro de TVA intracommunautaire | Si OSS ou sortie de la franchise (scénario A, retenu le 31/10) | Gratuit |
| Adhésion à un médiateur de la consommation | Obligatoire avant la première vente (README) | Quelques dizaines à quelques centaines d'euros sur 3 ans |
| Expert-comptable ou association de gestion agréée (facultatif) | Les questions de la section 8, une fois | Une consultation ponctuelle |

**Coûts fixes à ajouter au budget du plan marketing (10)** : compte dédié, domiciliation, médiateur, éventuellement comptable. Ils restent modestes, mais ils ne figurent pas dans les 40 € par mois.

---

## 10. Constats mineurs

- **M1. Plafond des remboursements de courtoisie.** CGV 11.3 : « plus de trois sur 12 mois » ; README : « 3 fois par an au plus ». Le sens est le même, la formulation diffère (12 mois glissants contre année). Aligner le README sur les CGV.
- **M2. Cohérence des préavis.** Fermeture de serveur 60 jours (CGU 5.3, CGV 14.3), arrêt du jeu 90 jours (CGU 15.3, CGV 14.4), modification des conditions 30 jours (CGU 16.2, CGV 20), hausse de prix d'abonnement 30 jours (CGV 17.2) : cohérents entre eux. Le préavis de 90 jours laisse le temps de rembourser avant la cessation (I1, point 4).
- **M3. Plafond des mineurs.** CGV 16.2 ne dit pas si l'abonnement payé en euros entre dans les 50 € ; ni si le plafond s'apprécie TTC. Proposer : « toutes offres payées en euros comprises, prix TTC ». Vérifier aussi l'âge minimum exigé par les conditions d'achat du marchand de référence (question à poser au prestataire).
- **M4. Engagement de crédit sous 24 heures** (CGV 10.2) : sans effet comptable ; le délai supplémentaire de 7 jours avant résolution est raisonnable.
- **M5. Refus de commande pour dépassement du plafond des mineurs** (CGV 8.4) : à contrôler **avant** la page de paiement, pour ne jamais encaisser puis rembourser (frais non rendus).
- **M6. Abonnement de confort** (plan marketing 9, CGV 17.2) : en micro-entreprise, chaque échéance est une recette à sa date ; rien à étaler. Le remboursement au prorata de la durée restante en cas d'arrêt (CGV 14.4) se calcule par jour.
- **M7. Récompense de faille en Kaelite** (CGU 12) : à créditer en Kaelite offerte ou gagnée, jamais achetée (I6).
- **M8. Mention « TVA non applicable, art. 293 B du CGI » dans les mentions légales** : facultative à cet endroit, utile ; le numéro de TVA intracommunautaire devra s'y ajouter s'il est attribué.
- **M9. Pièces comptables et politique de confidentialité** : la durée de 10 ans est cohérente ; ajouter l'IBAN recueilli pour un remboursement par virement (I2), avec suppression après le remboursement.
- **M10. Fiscalité hors UE en vente directe** : hors Royaume-Uni, les principaux pays (Suisse, Norvège, Canada, Australie, États américains) ont des seuils que le projet n'atteindra pas vite, mais il faut les suivre ; un marchand de référence règle la question.

---

## 11. Sources consultées le 2026-10-30

- Franchise en base de TVA 2026 : [service-public F21746](https://entreprendre.service-public.gouv.fr/vosdroits/F21746) ; rejet du seuil unique en loi de finances 2026 : [CCI Lyon Métropole](https://www.lyon-metropole.cci.fr/actualite/micro-entreprises-le-projet-de-loi-de-finances-2026-relance-la-reforme-du-seuil-de), [Legifiscal](https://www.legifiscal.fr/actualites-fiscales/4339-plf-2026-rejet-deputes-hausse-seuil-franchise-base-tva.html), [WebLex](https://www.weblex.fr/weblex-actualite/reforme-de-la-franchise-en-base-de-tva-retour-en-arriere).
- Plafonds du régime micro 2026 : [service-public F32353](https://entreprendre.service-public.gouv.fr/vosdroits/F32353).
- Taux de cotisations 2026 : [service-public F36232](https://entreprendre.service-public.gouv.fr/vosdroits/F36232).
- Compte bancaire dédié : [service-public F35991](https://entreprendre.service-public.gouv.fr/vosdroits/F35991).
- CFE : [Bpifrance Création](https://bpifrance-creation.fr/encyclopedie/aides-a-creation-a-reprise-dentreprise/aides-fiscales/exonerations-cotisation-fonciere).
- ACRE 2026 : [Hayot Expertise](https://hayot-expertise.fr/blog/acre-2026-exoneration-createur-apres-reforme), [Clementine](https://www.clementine.fr/blog/creation-et-financement/acre-2026/).
- Seuil de 10 000 € et OSS : [BOFiP, actualité 2021](https://bofip.impots.gouv.fr/bofip/13411-PGP.html/ACTU-2021-00303), [Superindep](https://www.superindep.fr/blog/2026/tva-ecommerce-autoentrepreneur/), [Keobiz](https://www.keobiz.fr/le-mag/tva-e-commerce/).
- TVA britannique des vendeurs étrangers : [gov.uk](https://www.gov.uk/government/publications/revenue-and-customs-brief-4-2016-vat-moss-simplifications-for-businesses-trading-below-the-vat-registration-threshold), [vatcalc](https://www.vatcalc.com/uk/uk-vat-on-foreign-digital-services/).
- Facturation électronique des micro-entreprises : [lamicrobyflo](https://lamicrobyflo.fr/calendrier-facturation-electronique-micro-entreprise/), [Abby](https://abby.fr/guide/facturation-electronique/franchise-base-tva-facturation-electronique).
- Stripe Managed Payments : [présentation](https://docs.stripe.com/payments/managed-payments), [éligibilité](https://docs.stripe.com/payments/managed-payments/eligibility), [fonctionnement](https://docs.stripe.com/payments/managed-payments/how-it-works).
- Paddle : [produits interdits](https://paddle.com/help/start/intro-to-paddle/what-am-i-not-allowed-to-sell-on-paddle). Lemon Squeezy : [produits interdits](https://docs.lemonsqueezy.com/help/getting-started/prohibited-products).
- Patreon et TVA : [How VAT works for members](https://support.patreon.com/hc/en-us/articles/360059712131-How-VAT-works-for-members-on-Patreon), [EU Creator FAQ](https://support.patreon.com/hc/en-us/articles/360047578411) (pages d'aide de Patreon ; la première n'a pas pu être relue en entier, accès refusé à l'outil).

Non relus en ligne, cités d'après leur texte connu : articles 259-1°, 259 D, 289 B et 293 B du CGI ; articles 58, 59 *quater* et annexe II de la directive 2006/112/CE ; directive (UE) 2016/1065 sur les bons ; règlement d'exécution (UE) n° 282/2011 ; règles du livre des recettes et de la note de prestation de services. À vérifier sur [Légifrance](https://www.legifrance.gouv.fr), [BOFiP](https://bofip.impots.gouv.fr) et [EUR-Lex](https://eur-lex.europa.eu) lors du rendez-vous avec le comptable.
