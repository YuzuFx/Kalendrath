# Étude Stripe : encaisser la Kaelite, et le pack à 0,99 €

*Étude du 2026-10-31, rédigée par Claude Code à la demande de Gregory. Point de départ : Gregory a choisi **Stripe** comme intermédiaire de paiement (domaine et VPS chez OVH, entreprise pas encore immatriculée) et vise un **pack minimum à 0,99 €** pour lever le verrou du premier achat. Documents relus : [CLAUDE.md](../CLAUDE.md), [revue comptable](legal/revue-comptable.md), [CGV de la Kaelite](legal/05-cgv-kaelite.md), [GDD, section 9](game-design-document.md), [plan marketing](plan-marketing.md) (sections 0 et 10). Aucun de ces documents n'a été modifié. **Ce n'est ni un avis juridique, ni un avis fiscal** : les points fiscaux restent à confirmer avec le comptable (questions de la revue comptable, section 8).*

**Convention.** **[Vérifié]** : lu sur une page officielle de Stripe (stripe.com, docs.stripe.com, conditions contractuelles) ou de la Commission, consultée les 30 et 31 octobre 2026, citée en section 7. **[Supposé]** : déduction, pratique connue ou source secondaire, à confirmer (en général auprès du support Stripe ou du comptable).

---

## 0. En bref

1. **Stripe Managed Payments ne peut pas vendre la Kaelite.** Ses conditions interdisent expressément de l'utiliser « *to sell non-fungible tokens, cryptocurrency, **virtual currency**, and similar digital assets* » (Stripe Managed Payments Terms, art. 7(f), version du 28 septembre 2026) **[Vérifié]**. La revue comptable du 30/10 recommandait Managed Payments en pensant que la Kaelite n'était visée par aucune interdiction : **ce point est à corriger**.
2. **Stripe « classique » accepte la Kaelite** : la vente de monnaie de jeu est une activité « restreinte » (vérifications renforcées), **sauf si le vendeur est l'exploitant du monde virtuel**, ce qui est le cas de Gregory **[Vérifié]**. Le dossier d'ouverture doit le dire clairement.
3. **Stripe classique + Stripe Tax couvre le besoin au lancement, mais pas tout** : Stripe Tax calcule et collecte la taxe, surveille les seuils, aide à s'immatriculer ; il **ne dépose pas la déclaration OSS de l'Union** pour un vendeur français (seulement l'OSS non-Union via l'Irlande, et le Canada simplifié) **[Vérifié]**. Tant que Gregory est en franchise et sous 10 000 € de ventes dans l'UE, il n'y a d'ailleurs rien à déclarer à l'OSS ; le seul vrai trou est **le Royaume-Uni** (TVA dès la 1re vente).
4. **Le pack à 0,99 € est viable comme offre d'appel unique, pas comme palier courant** : en Stripe classique et en franchise, Stripe prend **0,26 € (27 %)** ; après cotisations, il reste **environ 0,50 €**. Il doit être **unique par compte**, réservé aux comptes connectés, et ne jamais se répéter.
5. **Avant immatriculation**, Gregory peut tout développer et tester en **mode test (sandbox)** ; il ne doit **pas activer** le compte en production ni encaisser quoi que ce soit avant l'immatriculation, le compte bancaire dédié et le médiateur.

---

## 1. Stripe classique ou Stripe Managed Payments

### 1.1 Ce qui les distingue

| | **Stripe classique** (Payments + Checkout, avec ou sans Stripe Tax) | **Stripe Managed Payments** |
|---|---|---|
| Vendeur légal face au joueur | **Gregory EI** | **Sold through Link, LLC**, filiale de Stripe, « marchand officiel » ; le joueur voit « Vendu via Link » et `LINK.COM*` sur son relevé **[Vérifié]** |
| Contrat | Gregory ↔ Stripe (en Europe : Stripe Payments Europe / Stripe Technology Europe) | Gregory ↔ SMP (Sold through Link, LLC), entité **américaine** **[Vérifié pour le nom ; l'établissement aux États-Unis est Supposé d'après « LLC »]** |
| TVA et taxes de vente | Gregory (Stripe Tax peut calculer et collecter) | SMP, dans plus de 80 pays, **ventes nationales françaises comprises** (la France n'est pas dans les exceptions, seuls le Japon et Singapour B2B le sont) **[Vérifié]** |
| Factures au joueur | Gregory (ou les reçus Stripe, à compléter des mentions légales) | SMP, en son nom, PDF systématique **[Vérifié]** |
| Remboursements | Gregory décide | SMP peut rembourser **jusqu'à 60 jours** après l'achat, même contre la politique de Gregory, et si Gregory ne répond pas sous 48 h ; Gregory en supporte le coût **[Vérifié]** |
| Litiges (rétrofacturations) | Gregory répond et fournit les preuves ; 20 € par litige reçu, 20 € de plus pour le contester (rendus s'il est gagné) **[Vérifié]** | SMP les traite ; le frais de réception reste dû par Gregory, SMP prend en charge le frais de contestation quand il conteste lui-même **[Vérifié]** |
| Intégrations | Checkout, Elements (formulaire intégré), Payment Links, factures | **Checkout ou Payment Links seulement**, pas de domaine personnalisé sur la page de paiement, pas de Connect **[Vérifié]** |
| Frais | 1,5 % + 0,25 € (cartes standard de l'EEE) | Les mêmes **+ 3,5 %** **[Vérifié]** |
| **Kaelite (monnaie virtuelle)** | **Acceptée** (Gregory est l'exploitant du monde virtuel) | **Interdite** (art. 7(f)) |

### 1.2 Éligibilité de Managed Payments, point par point

- **France** : pays vendeur pris en charge **[Vérifié]**.
- **Jeux vidéo** : catégorie prise en charge, avec des codes fiscaux « Video Games – streamed – subscription » ou « non subscription » **[Vérifié]**. Il n'existe **aucun code pour une monnaie de jeu** dans la liste **[Vérifié]**.
- **Monnaie virtuelle** : interdite par l'article 7(f) des conditions **[Vérifié]**. Que la Kaelite soit une « monnaie virtuelle » au sens de cet article est une lecture, mais elle est difficile à contester : les CGV la nomment elle-même « monnaie virtuelle Kaelite » (CGV 1.1), et le réseau européen des autorités de consommation la traite comme une « représentation numérique de valeur » (cf. section 3.3) **[Supposé, probabilité forte]**.
- **Accès** : soumis à un « examen d'éligibilité » par Stripe **[Vérifié]**. Une dérogation écrite n'est pas exclue (l'article 7(g) prévoit une pré-approbation écrite pour les activités restreintes, mais pas pour l'interdiction du 7(f)) **[Vérifié pour le texte ; une dérogation au 7(f) est Supposée improbable]**.
- **Clients** : plus de 195 pays, sauf Chine, Cuba, Iran, Corée du Nord, Russie, Syrie, Kosovo, Île de l'Ascension, Tristan da Cunha **[Vérifié]**.

**Ce que Managed Payments pourrait quand même vendre** : un **abonnement de confort** payé en euros (code « Video Games – streamed – subscription »), voire un objet ou un passe vendu directement en euros, sans passer par la Kaelite **[Supposé : éligible sur le papier, à faire confirmer par l'examen d'éligibilité]**. Mais faire coexister deux vendeurs légaux (Gregory pour la Kaelite, Link pour l'abonnement) doublerait les CGV, la facturation et le support. **Non recommandé en V1.**

### 1.3 Stripe classique + Stripe Tax couvre-t-il les besoins ?

| Besoin | Couvert ? |
|---|---|
| Calcul de la taxe selon le pays du joueur, prix TTC | Oui, Stripe Tax **[Vérifié]** |
| Suivi des seuils (10 000 € UE, seuils étrangers) | Oui, Stripe Tax surveille les seuils **[Vérifié]** |
| Immatriculation OSS / à l'étranger | Aide via des partenaires, et immatriculation par Stripe pour la vente à distance dans l'UE et au Canada **[Vérifié]** |
| **Déclaration OSS de l'Union** (vendeur établi en France) | **Non** : Stripe dépose seulement l'OSS non-Union (Irlande) et le Canada simplifié ; le reste est en bêta privée **[Vérifié]**. Gregory dépose lui-même sur impots.gouv.fr, à partir des rapports Stripe Tax |
| Franchise en base française (« TVA non applicable, art. 293 B ») | Stripe Tax ne collecte rien là où aucune immatriculation n'est déclarée ; la mention 293 B se porte sur le justificatif **[Supposé]** |
| Royaume-Uni (TVA dès la 1re vente) | Calcul oui, mais Gregory doit s'immatriculer auprès du HMRC et déclarer lui-même ; ou **bloquer** les achats depuis le Royaume-Uni **[Supposé, cf. revue comptable section 2]** |
| Coût | 0,5 % par transaction en intégration sans code (Checkout) ; 0,45 € par transaction en intégration API ; « Tax Complete » à partir de 80 € par mois **[Vérifié]**. L'affectation de Checkout au tarif « sans code », et l'absence de frais là où Gregory n'est immatriculé nulle part, sont **[Supposées]** : à confirmer, car 0,45 € par transaction rendrait le pack à 0,99 € absurde |

**Conclusion** : oui, en V1, à trois conditions : (1) **Checkout** plutôt qu'une intégration API, pour rester au tarif en pourcentage de Stripe Tax ; (2) **décision sur le Royaume-Uni** (blocage ou immatriculation) ; (3) **suivi mensuel des seuils** de 10 000 € (UE) et de 37 500 / 41 250 € (franchise française).

---

## 2. L'économie d'un pack à 0,99 €

### 2.1 Hypothèses

- Frais Stripe **[Vérifié]** : cartes standard de l'EEE 1,5 % + 0,25 € ; cartes premium de l'EEE 2,8 % + 0,25 € ; cartes britanniques 2,5 % + 0,25 € ; cartes internationales 3,15 % + 0,25 € (+ 2 % en cas de conversion). Managed Payments : + 3,5 %. Montant minimum d'un paiement en euros : **0,50 €**, donc 0,99 € est accepté.
- Cotisations et impôt **[Vérifié, revue comptable section 2]** : 21,2 % + 1,7 % de versement libératoire = **22,9 %**, appliqués ici au prix TTC encaissé en franchise (hypothèse prudente de la revue), au prix HT sinon.
- Les frais de traitement **ne sont pas rendus** en cas de remboursement **[Vérifié]**.
- Stripe Tax (0,5 %) n'est pas compté : il coûte moins d'un centime sur 0,99 € **[Supposé, cf. 1.3]**.

### 2.2 Tableau, joueur français, carte standard

| Prix TTC | **A1. Classique, franchise** : frais Stripe | Net encaissé | **Reste après cotisations** | **A2. Classique, hors franchise (TVA 20 %)** : reste | **B. Managed Payments** (TVA 20 % collectée par Link) : frais | **B : reste** |
|---|---|---|---|---|---|---|
| **0,99 €** | 0,26 € (27 %) | 0,73 € | **0,50 € (50 %)** | 0,37 € (37 %) | 0,30 € | 0,34 € (34 %) |
| **1,99 €** | 0,28 € (14 %) | 1,71 € | **1,25 € (63 %)** | 1,00 € (50 %) | 0,35 € | 0,93 € (47 %) |
| **4,99 €** | 0,32 € (6,5 %) | 4,67 € | **3,52 € (71 %)** | 2,88 € (58 %) | 0,50 € | 2,71 € (54 %) |
| **9,99 €** | 0,40 € (4,0 %) | 9,59 € | **7,30 € (73 %)** | 6,02 € (60 %) | 0,75 € | 5,67 € (57 %) |

Variantes pour 0,99 € : carte premium de l'EEE, net 0,71 € au lieu de 0,73 € ; **joueur britannique** (TVA britannique 20 % due par Gregory, carte britannique), net **0,55 €**, reste 0,36 €. La colonne B est donnée pour comparaison : **Managed Payments ne peut pas vendre la Kaelite** (section 1).

### 2.3 Seuils de rentabilité

- **Part des frais Stripe** (classique) = 1,5 % + 0,25 € ÷ prix. Elle passe sous **10 % à partir de 2,94 €**, sous **5 % à partir de 7,14 €**. À 0,99 €, le frais fixe fait à lui seul un quart du prix.
- **Un litige efface environ 40 packs à 0,99 €** : 20 € de frais + 0,99 € repris, contre 0,50 € de reste par pack. Un seul paiement frauduleux contesté sur 40 suffit à rendre le palier déficitaire.
- **Un remboursement de pack à 0,99 € coûte 0,26 €** (frais non rendus), en plus de la Kaelite rendue.
- **Test de cartes volées** : Stripe signale que les fraudeurs font des « *paiements de faible montant* » pour tester des cartes **[Vérifié]**. Un produit à 0,99 € achetable en boucle est une cible. Parades : achat réservé aux comptes connectés, **une seule fois par compte**, Checkout (CAPTCHA et limites intégrés **[Vérifié]**), Radar, limite de débit par IP.

**Lecture** : le pack à 0,99 € n'est pas rentable comme produit ; il l'est comme **coût d'acquisition**. Un joueur qui franchit le premier achat a de fortes chances d'en faire un second (c'est la logique de toute l'industrie). Le seul vrai risque financier est la fraude, d'où le caractère unique et connecté.

### 2.4 Mini-paquets alternatifs

| Formule | Prix | Intérêt | Limites |
|---|---|---|---|
| **Offre de bienvenue unique** (recommandée) | 0,99 € | Lève le verrou psychologique ; valeur en Kaelite nettement supérieure au taux standard (par exemple ×2 à ×3), affichée honnêtement | Une seule fois par compte, jamais pour un compte surnuméraire ; reste 0,50 € ; à intégrer au plafond des mineurs |
| **Palier d'entrée permanent** | 1,99 € | Reste 1,25 € (63 %) ; achetable plusieurs fois | Frais encore lourds (14 %) ; à n'ouvrir que si le 4,99 € freine visiblement |
| **Paliers standard** | 4,99 / 9,99 / 19,99 / 49,99 € | Recommandés par la revue comptable (I7) ; frais sous 7 % | Pas d'effet « premier pas » |
| **Abonnement de confort** | 4,99 € par mois | Recette récurrente, frais 6,5 %, un seul paiement pour un mois de valeur | Règles de résiliation (CGV 17.2) ; ne doit pas devenir du pay-to-win |
| **Pack de démarrage en objets** (sans Kaelite) | 0,99 à 2,99 € | Contenu connu, pas de solde à rembourser | Même coût de frais ; CGV à compléter pour les offres payées en euros |
| ~~Recharge libre à petit montant~~ | — | — | Écartée : multiplie les frais fixes et les tests de cartes |

**Proposition de grille V1** : offre de bienvenue **0,99 €** (unique) ; puis **4,99 / 9,99 / 19,99 / 49,99 €** ; abonnement de confort **4,99 €** (fourchette de 5 à 10 € du plan marketing, à trancher). Le bonus de bêta (+30 %) s'applique aussi à l'offre de bienvenue, ou non : à décider.

---

## 3. Restrictions Stripe : contenus numériques, monnaies virtuelles, mineurs

### 3.1 Liste des activités interdites et restreintes (mise à jour du 22 septembre 2026) **[Vérifié]**

- « *Sale of in-game currency or game items, **unless the business is the operator of the virtual world*** » : activité restreinte, **sauf exploitant** du jeu. Gregory est l'exploitant : la Kaelite n'est pas visée, à condition de le déclarer clairement.
- « *Sale of stored value or credits maintained, accepted and issued by anyone other than the seller* » : restreinte quand l'émetteur est un tiers. La Kaelite est émise et acceptée par Gregory seul.
- « *Pre-loaded payment cards, gift cards, virtual credits… in which a monetary value is stored* » : restreinte. **Point d'attention** : une fonction de cadeau (CGV 4.2) ou des cartes-cadeaux Kalendrath rapprocheraient la Kaelite de cette catégorie. **Ne pas proposer de carte-cadeau en V1.**
- Interdits sans exception : jeux d'argent, loteries, tirages au sort payants ; jeux d'adresse avec tournois à gains. Les CGV excluent déjà tout tirage payant (7.4) ; **aucun tournoi à récompense en argent réel**.
- « Restreint » signifie « *vérifications supplémentaires par Stripe* », approbation révocable **[Vérifié]**.

**Ce qui protège Gregory devant Stripe** (et que les CGV disent déjà, art. 4.2) : la Kaelite n'est **ni convertible en euros, ni cessible, ni retirable**, et ne sert que dans le jeu. À reprendre mot pour mot dans la description d'activité du compte Stripe. **[Supposé : c'est ce qui distingue une monnaie de jeu d'une valeur stockée ; à faire confirmer par écrit au support Stripe]**

### 3.2 Mineurs

- La liste de Stripe **ne contient aucune règle sur les mineurs acheteurs** **[Vérifié]**. Stripe ne vérifie pas l'âge du porteur de carte. Le contrôle repose entièrement sur Gregory : plafond de 50 € par mois (CGV 16.2), contrôlé **avant** la page de paiement (revue comptable, M5).
- Le titulaire du compte Stripe doit être majeur et capable de contracter **[Supposé, pratique générale des conditions de Stripe, non relue mot pour mot]**.
- **Un pack à 0,99 € vise précisément l'achat d'impulsion**, donc aussi les mineurs. Il entre dans le plafond de 50 € et ne doit jamais être poussé par une fenêtre surgissante auprès d'eux (CGV 16.2).

### 3.3 Cadre européen sur les monnaies de jeu

Le réseau des autorités de consommation de l'UE (CPC) a publié le **21 mars 2025** sept « principes clés » sur les monnaies virtuelles de jeu : afficher l'équivalent en euros des offres, ne pas brouiller le coût réel, protéger particulièrement les enfants **[Vérifié via sources secondaires ; texte publié par la Commission, page officielle de l'atelier du 3 juin 2025]**. C'est du droit souple, mais il est opposable dans les faits. Conséquence pour le 0,99 € : **la quantité de Kaelite** doit permettre d'acheter quelque chose d'utile sans reliquat important (pas de « 99 Kaelite pour un objet à 100 »), conformément à CGV 7.3.

---

## 4. Ouvrir le compte, litiges et rétrofacturations

### 4.1 Entreprise non immatriculée : ce qui est possible

| | Avant immatriculation | Après |
|---|---|---|
| Créer un compte Stripe et développer en **mode test** (sandbox, cartes de test, webhooks, Checkout, Stripe Tax) | **Oui** **[Supposé, pratique documentée de Stripe : les sandboxes ne demandent pas d'activation]** | Oui |
| **Activer** le compte (vérification d'identité, IBAN, encaissement réel) | **Non recommandé** : le compte doit être au nom de l'EI, avec SIREN et compte bancaire dédié ; encaisser avant l'immatriculation, c'est une activité commerciale non déclarée **[Supposé pour l'exigence de SIREN par Stripe ; l'obligation d'immatriculation et de compte dédié est Vérifiée par la revue comptable, B4]** | Oui |
| Ouvrir la boutique | Non | Après immatriculation, compte dédié, **médiateur de la consommation**, CGV relues |

**Ce que Stripe demandera à l'activation [Supposé, contenu habituel du formulaire]** : type d'entreprise (entreprise individuelle), SIREN, adresse (la domiciliation commerciale convient), identité et pièce d'identité, IBAN du compte dédié, **description de l'activité** (dire « éditeur et exploitant du jeu Kalendrath, vente d'une monnaie de jeu non convertible et non cessible »), site web montrant les prix, les CGV, la politique de remboursement et un contact. Le site sur le domaine OVH doit donc être en ligne, CGV comprises, avant l'activation. Le libellé de relevé bancaire (« KALENDRATH ») est à choisir pour limiter les contestations de joueurs qui ne reconnaissent pas l'achat.

### 4.2 Litiges et rétrofacturations

- **Coût** : 20 € par litige reçu, 20 € de plus pour le contester, rendus si Gregory gagne **[Vérifié]**. Gregory reste redevable du montant contesté et de la fraude ; les plafonds de responsabilité généraux ne s'appliquent pas à la fraude **[Vérifié, conditions de Stripe Payments]**.
- **Délai** : un porteur de carte peut contester pendant environ 120 jours **[Supposé, règles des réseaux de cartes, cf. revue comptable I3]**.
- **Preuves utiles** : journal de connexion du compte de jeu, horodatage du crédit de Kaelite, adresse IP, case de renonciation au droit de rétractation cochée (CGV 10.1), historique de dépense de la Kaelite. Le registre des lots (revue comptable, section 6) sert aussi de dossier de preuve.
- **Taux de litiges** : un taux élevé fait entrer le compte dans les programmes de surveillance des réseaux de cartes, puis peut le faire fermer **[Vérifié pour le principe]**. Les petits paquets et les tests de cartes sont la première source de litiges pour fraude.
- **Gel** : CGV 13.3 gèle la Kaelite du paiement contesté jusqu'à l'issue ; c'est cohérent avec Stripe.

---

## 5. Recommandation et décisions pour Gregory

### Recommandation

**Stripe classique (Checkout) + Stripe Tax, Gregory vendeur légal**, avec une boutique ouverte seulement après l'immatriculation. Managed Payments est écarté pour la Kaelite (interdiction contractuelle). Le texte actuel des CGV, écrit pour une vente directe, reste donc la bonne base (revue comptable B1, scénario A), sous réserve de la mention de TVA (B3) et du Royaume-Uni.

Le pack à 0,99 € est retenu **sous forme d'offre de bienvenue unique par compte**, pas comme palier permanent.

### Décisions à prendre

| # | Décision | Proposition de Claude |
|---|---|---|
| 1 | Prestataire et modèle | Stripe classique + Stripe Tax, Checkout |
| 2 | Pack à 0,99 € | Offre de bienvenue, une fois par compte, comptes connectés seulement, quantité de Kaelite généreuse et sans reliquat |
| 3 | Grille | 0,99 (unique) / 4,99 / 9,99 / 19,99 / 49,99 € ; 1,99 € seulement si le 4,99 € freine |
| 4 | Royaume-Uni | Bloquer les achats depuis le Royaume-Uni au lancement (simple), immatriculation HMRC plus tard si la demande le justifie |
| 5 | Abonnement de confort | Via Stripe Billing, même compte, Gregory vendeur ; pas de Managed Payments en parallèle |
| 6 | Cartes-cadeaux, fonction de cadeau | Pas en V1 (risque de requalification en valeur stockée) |
| 7 | Bonus de bêta (+30 %) sur l'offre de bienvenue | À trancher : non recommandé (l'offre est déjà bonifiée) |
| 8 | Prix calculés comme s'ils incluaient la TVA | Oui (revue comptable I8) : la grille ci-dessus reste tenable hors franchise |

### À faire, dans l'ordre

1. **Corriger la revue comptable** (section 3 et 9.1) : Managed Payments n'est plus le premier candidat, à cause de l'article 7(f).
2. **Écrire au support Stripe** (avant tout développement de la boutique) : décrire la Kaelite, demander une confirmation écrite qu'elle relève de l'exception « exploitant du monde virtuel » ; demander le tarif de Stripe Tax avec Checkout et l'exigence de SIREN à l'activation.
3. **Développer en mode test** dès maintenant si utile : Checkout, webhooks de crédit de Kaelite, registre des lots, contrôle du plafond des mineurs avant paiement, offre unique par compte.
4. **Immatriculation**, compte bancaire dédié, médiateur, domiciliation (revue comptable, section 9).
5. **Activer** le compte Stripe au nom de l'EI, relier l'IBAN dédié, renseigner la description d'activité et le libellé de relevé.
6. Compléter les CGV : article 2 (SIREN), 9.1 (« Stripe »), 7.1 et 18 (TVA), achats depuis le Royaume-Uni, offre de bienvenue unique (article 6.4).
7. Corriger le plan marketing (section 10) : « pas de paquet sous 4,99 € » devient « une offre de bienvenue unique à 0,99 €, puis rien sous 4,99 € ».

---

## 6. Ce qui reste incertain

- Le tarif réel de Stripe Tax pour une intégration Checkout, et s'il est dû là où Gregory n'est immatriculé nulle part (à demander à Stripe).
- La position écrite de Stripe sur la Kaelite (attendue, probablement favorable).
- L'exigence exacte de SIREN à l'activation d'un compte d'entreprise individuelle en France (non trouvée dans la documentation publique).
- L'assiette des cotisations (brut ou net de frais) : question 1 de la revue comptable ; les tableaux prennent l'hypothèse prudente.

---

## 7. Sources consultées les 30 et 31 octobre 2026

- Tarifs Stripe France (cartes, litiges, remboursements, Stripe Tax, Managed Payments) : [stripe.com/fr/pricing](https://stripe.com/fr/pricing).
- Managed Payments : [présentation](https://docs.stripe.com/payments/managed-payments), [éligibilité](https://docs.stripe.com/payments/managed-payments/eligibility), [fonctionnement](https://docs.stripe.com/payments/managed-payments/how-it-works), [conformité fiscale](https://docs.stripe.com/payments/managed-payments/tax-compliance).
- Conditions de Stripe Managed Payments, version du 28 septembre 2026 (articles 2.1, 3.3, 3.4, 4.1, 7(f), 7(g)) : [stripe.com/legal/managed-payments](https://stripe.com/en-fr/legal/managed-payments).
- Politique de remboursement « Sold through Link » : [support.link.com](https://support.link.com/questions/sold-through-link-refunds) ; entité « Sold through Link, LLC » : [support Stripe](https://support.stripe.com/questions/why-is-sold-through-link-llc-the-legal-entity-on-my-invoice-for-stripe-managed-payments-fees).
- Activités interdites et restreintes, mise à jour du 22 septembre 2026 : [stripe.com/legal/restricted-businesses](https://stripe.com/en-fr/legal/restricted-businesses).
- Déclarations fiscales hors États-Unis par Stripe Tax : [docs.stripe.com/tax/file-with-stripe-outside-us](https://docs.stripe.com/tax/file-with-stripe-outside-us).
- Montant minimum par devise : [docs.stripe.com/currencies](https://docs.stripe.com/currencies).
- Tests de cartes : [docs.stripe.com/disputes/prevention/card-testing](https://docs.stripe.com/disputes/prevention/card-testing).
- Numéro SIREN chez Stripe : [support.stripe.com](https://support.stripe.com/questions/siren-and-siret-numbers) (ne traite pas l'ouverture sans SIREN).
- Principes clés du réseau CPC sur les monnaies de jeu (21 mars 2025) : [atelier de la Commission du 3 juin 2025](https://commission.europa.eu/news-and-media/news/european-commission-hosts-stakeholders-talks-application-cpc-networks-key-principles-games-virtual-2025-06-03_lv), [analyse Bird & Bird](https://www.twobirds.com/en/insights/2025/european-move-towards-protecting-users-from-harmful-practices-in-video-games-eu-consumer-protection).
- Repères fiscaux (cotisations, franchise, seuil de 10 000 €, Royaume-Uni) : repris de la [revue comptable](legal/revue-comptable.md), section 2 et 11.
