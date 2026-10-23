# Cadre légal européen et français — monétisation et exploitation d'un jeu free-to-play

*Recherche du 2026-10-23, pour l'audit des boutiques (Phase 8) et les décisions de monétisation du [GDD](../game-design-document.md) (4.2, points 8 et 13).*

> **Ceci n'est pas un avis juridique.** C'est une synthèse documentaire faite par une IA à partir de sources publiques, avec ses limites : certaines sources sont des notes de cabinets d'avocats, d'autres des pages officielles lues via un outil de résumé. Avant d'ouvrir une boutique payante, faire relire les CGV et le parcours d'achat par un juriste (avocat en droit de la consommation, ou au minimum la CCI ou un service d'aide aux créateurs d'entreprise).

**Limite de la recherche.** Le budget de recherche web de la session s'est épuisé en cours de travail. Les points marqués *texte connu, non relu* viennent du texte des règlements et du code tels que je les connais, mais je n'ai pas pu les relire en ligne cette fois : à vérifier sur EUR-Lex ou Légifrance avant de s'appuyer dessus.

**Fiabilité** : *vérifié* (source officielle ou plusieurs sources concordantes), *probable* (une source sérieuse), *incertain* (source isolée ou faible), *texte connu, non relu* (voir ci-dessus).

## Résumé en 5 lignes

1. Aucune loi européenne propre aux monnaies virtuelles ou aux loot boxes n'est en vigueur fin 2026. Mais le droit de la consommation existant s'applique déjà, et le réseau CPC a dit en mars 2025 comment il le lit : **prix en euros affiché, pas de monnaies multiples qui brouillent le coût, pas de paquets qui forcent à acheter trop, rétractation, protection des mineurs**.
2. La **fausse urgence est déjà interdite** (liste noire de la directive sur les pratiques commerciales déloyales). Un pack réellement limité est licite ; un compte à rebours mensonger ne l'est pas. Le cas Star Stable (2025) montre que les autorités ciblent les offres limitées dans le temps quand des enfants jouent.
3. Deux textes arrivent : le **Digital Fairness Act** (proposition attendue mi-novembre 2026, application pas avant fin 2028 environ) et l'**EU KIDS Act** (proposé le 17 septembre 2026, qui couvre les jeux en ligne et vise les récompenses aléatoires et les séries de connexion pour les mineurs).
4. Pour un éditeur seul en France : **micro-entreprise** (pas de vente « en particulier » répétée), franchise de TVA jusqu'à 37 500 € de prestations de services, mais **TVA du pays du client via le guichet OSS au-delà de 10 000 € de ventes vers les autres pays de l'UE**. Un médiateur de la consommation est obligatoire.
5. Pour Kalendrath, les deux choix de Gregory tiennent juridiquement (packs limités, location d'ouvriers), **à condition** que la limite soit vraie, que l'équivalent en euros soit visible, et que la location ne devienne pas un abonnement à reconduction tacite sans le bouton de résiliation et l'information qui vont avec.

## 1. Droit de la consommation appliqué aux monnaies virtuelles

### 1.1 Les principes du réseau CPC (21 mars 2025)

Le réseau CPC (coopération des autorités nationales de protection des consommateurs, coordonné par la Commission) a publié le 21 mars 2025 sept « principes clés » sur les monnaies virtuelles dans les jeux, en même temps qu'une action contre Star Stable Online. *Vérifié* (Commission, Reed Smith, Linklaters, Baker McKenzie concordent).

**Statut : non contraignant.** Ce n'est pas une loi : le CPC reconnaît qu'un manquement n'est pas automatiquement illégal. Mais chaque principe s'adosse à un texte qui, lui, est contraignant (directive pratiques commerciales déloyales, directive droits des consommateurs, directive clauses abusives). C'est la lecture que les autorités appliqueront en cas de contrôle. *Vérifié.*

**Point juridique clé.** Le CPC qualifie la monnaie virtuelle achetée avec de l'argent réel et servant surtout à payer du contenu de « représentation numérique de valeur » : son achat entre dans le droit de la consommation. L'industrie (EGDF, Video Games Europe) conteste cette qualification et préfère « contenu numérique ». *Vérifié.*

| # | Principe | Ce que ça veut dire pour une boutique |
|---|---|---|
| 1 | Prix clair en monnaie réelle | Le prix de chaque contenu doit être indiqué en argent réel, pas seulement en gemmes. Le prix de référence est le prix plein, hors réduction. |
| 2 | Ne pas brouiller le coût | Éviter plusieurs monnaies payantes et les conversions en cascade (euros → gemmes → jetons → objet). |
| 3 | Ne pas forcer l'achat de monnaie inutile | Éviter les paquets de monnaie qui ne collent pas aux prix des objets (acheter 500 quand l'objet en coûte 520). Permettre d'acheter le montant voulu. |
| 4 | Information précontractuelle claire | Nature du produit, prix, droits du consommateur, avant l'achat. |
| 5 | Droit de rétractation | Informer, et permettre la rétractation sous 14 jours « le cas échéant » (voir 4). |
| 6 | Conditions claires et équitables | CGV en langage simple ; pas de clause qui limite abusivement les droits, notamment sur un changement de valeur de la monnaie. |
| 7 | Respect des vulnérabilités, surtout des enfants | Ne pas exploiter les vulnérabilités ; contrôle parental et réglages protecteurs par défaut encouragés. |

Sources : Reed Smith, Linklaters, Baker McKenzie, CMS. Les sept principes : *vérifié*. Le détail « prix de référence = prix plein » et « paquets qui ne collent pas aux prix » : *probable* (CMS, Linklaters).

**Sanctions.** Les amendes pour infraction de grande ampleur au droit de la consommation peuvent atteindre 4 % du chiffre d'affaires annuel dans l'UE (directive Omnibus 2019/2161, *texte connu, non relu*). En Belgique : 800 000 € ou 6 % du chiffre d'affaires, selon Baker McKenzie (*probable*). En France, les manquements relevés par la DGCCRF se sanctionnent par amende administrative (voir 5 pour les abonnements).

**Suite.** Atelier de la Commission avec l'industrie le 3 juin 2025 ; le CPC décidera ensuite d'éventuelles mesures. Je n'ai pas trouvé de suite officielle en 2026, ni l'issue de l'affaire Star Stable (engagements ou non) : **non trouvé**.

### 1.2 Affichage du prix en euros

- **Obligatoire** : le prix d'achat de la monnaie virtuelle en euros TTC (règle générale d'information sur les prix, code de la consommation, art. L112-1, *texte connu, non relu*). En franchise de TVA, le prix affiché est le prix final, avec la mention « TVA non applicable, art. 293 B du CGI » sur les factures (*texte connu, non relu*).
- **Lecture des autorités (CPC), donc à traiter comme obligatoire en pratique** : afficher aussi l'équivalent en euros des objets vendus en monnaie virtuelle. Dans l'affaire Star Stable, l'absence de prix en euros figure parmi les griefs. *Probable.*
- **À venir** : le KIDS Act proposé imposerait d'afficher la valeur de la monnaie virtuelle dans la monnaie officielle, au moins pour certains services (champ exact pour les jeux encore flou). *Probable* (William Fry).

### 1.3 Fausse urgence, comptes à rebours, packs limités

- **Obligatoire (déjà en vigueur)** : la directive 2005/29 sur les pratiques commerciales déloyales met sur sa liste noire le fait de « déclarer faussement qu'un produit ne sera disponible que pendant une période très limitée » pour obtenir une décision immédiate (annexe I, point 7 ; en France, code de la consommation art. L121-4, *texte connu, non relu*). CMS confirme que le droit actuel interdit déjà les fausses allégations d'urgence. *Vérifié pour le principe, articles non relus.*
- Conséquence : un **compte à rebours est licite s'il dit vrai**. Il devient trompeur s'il se relance à zéro, si le même pack « dernière chance » revient aussitôt, ou si la quantité « limitée » ne l'est pas.
- **Avec des enfants dans le public**, même une limite vraie peut être reprochée : dans l'affaire Star Stable, le CPC a qualifié les offres limitées dans le temps, annoncées à l'avance sur Instagram, de « techniques de pression » sur les enfants, ainsi qu'une fenêtre « Get 30% Off […] Buy now » qui les incitait directement à acheter. *Vérifié* (Commission, CMS, Forbrukertilsynet). L'incitation directe des enfants à acheter est elle aussi sur la liste noire (annexe I, point 28, *texte connu, non relu*).
- **Fausses réductions** : afficher une « valeur » ou un prix barré fictif est une pratique trompeuse. Pour les annonces de réduction, la règle du « prix le plus bas des 30 derniers jours » (directive Omnibus) vise les biens ; son application à la monnaie virtuelle n'est pas tranchée (**incertain**). Bonne pratique : ne barrer un prix que s'il a réellement été pratiqué.

### 1.4 Le Digital Fairness Act : où en est-il ?

- **Pas encore proposé au 23 octobre 2026.** Consultation publique close le 24 octobre 2025. Le programme de travail 2026 de la Commission le place au 4e trimestre 2026 ; le service de recherche du Parlement européen (EPRS, octobre 2026) parle de « mi-novembre », CMS (19 octobre 2026) du **11 novembre 2026**. *Probable* (deux sources sérieuses concordent sur novembre).
- **Contenu attendu** (pistes, rien d'acté) : élargir la liste noire des pratiques déloyales aux dark patterns, voire une interdiction générale et une obligation de « loyauté dès la conception » ; design addictif ; personnalisation déloyale ; **loot boxes et monnaies de jeu** cités par le bilan de qualité comme probablement concernés ; abonnements (annulation facile, rappels avant renouvellement, consentement exprès avant qu'un essai gratuit devienne payant). *Probable* (CMS, EPRS).
- **Calendrier** : négociation Parlement-Conseil en 2027 et au-delà ; CMS ne voit pas d'application avant **fin 2028**. *Probable.*
- **Pour Kalendrath** : l'ouverture publique tombera probablement pendant la négociation. Concevoir la boutique comme si les principes CPC et l'interdiction de la fausse urgence étaient déjà la loi coûte peu, et évite une refonte en 2028.

## 2. Dark patterns et DSA

- Le règlement sur les services numériques (DSA) interdit aux **plateformes en ligne** les interfaces trompeuses (art. 25) et leur impose un haut niveau de protection des mineurs (art. 28). *Texte connu, non relu.*
- **Kalendrath est-il une « plateforme en ligne » ?** Un jeu dont le seul contenu est celui de l'éditeur, non. Avec un forum public ou des profils visibles de tous, il peut le devenir (hébergement + diffusion au public). Un chat d'alliance fermé relève plutôt du simple hébergement. **Incertain**, à trancher selon les fonctions sociales retenues.
- **Exemption des micro et petites entreprises** : l'art. 19 du DSA exclut les plateformes qui sont des micro ou petites entreprises (moins de 50 personnes et 10 M€ de chiffre d'affaires) de la section 3, qui contient les articles 25 et 28. Restent dues, pour tout hébergeur : point de contact (art. 11-12), CGU qui décrivent la modération (art. 14), mécanisme de signalement des contenus illicites (art. 16), motivation des sanctions contre un joueur (art. 17). *Texte connu, non relu.*
- **Ne pas s'en croire quitte** : l'exemption DSA ne couvre pas le droit de la consommation (1.3). Une interface trompeuse dans le parcours d'achat reste une pratique commerciale déloyale, quelle que soit la taille de l'éditeur.
- **Lignes directrices de la Commission sur l'art. 28** (14 juillet 2025) : elles citent les loot boxes payantes et les monnaies virtuelles parmi les pratiques qui peuvent pousser les mineurs à des dépenses excessives ou non voulues. Non contraignantes, mais servent de référence. *Probable* (CMS, Hunton, Observatoire européen de l'audiovisuel).

## 3. Mineurs

- **EU KIDS Act** (*Keeping Internet Digital Spaces Accountable and Trustworthy*), proposé le **17 septembre 2026**, pas encore adopté. Champ : réseaux sociaux, plateformes vidéo, mais aussi **jeux en ligne** et magasins d'applications, avec des obligations propres aux jeux non détaillées dans les synthèses lues. Pistes : interdiction du design addictif pour les mineurs (lecture automatique, défilement infini, notifications push, **séries de connexion et récompenses de connexion quotidienne**), information claire avant tout achat, valeur de la monnaie virtuelle en monnaie officielle, **interdiction des systèmes de récompense variable dont les loot boxes**. Notifications push désactivées par défaut. Les synthèses disent clairement que ces règles visent les réseaux sociaux ; leur extension aux jeux n'est pas claire. Application six mois après publication au Journal officiel si adopté. *Probable* (William Fry, DWT, EPRS ; détails non lus dans le texte officiel).
- **Consentement RGPD** : en France, un mineur peut consentir seul au traitement de ses données pour un service en ligne à partir de **15 ans** ; en dessous, consentement conjoint du parent (loi Informatique et libertés, art. 45, *texte connu, non relu*). Ne concerne que les traitements fondés sur le consentement.
- **Capacité à acheter** : un mineur ne peut conclure seul que des « actes de la vie courante » ; un achat important sans accord des parents peut être annulé (*texte connu, non relu*). En pratique, les remboursements demandés par des parents sont un risque réel.
- **Bonne pratique** (et attente explicite du CPC) : vérification d'âge à l'inscription, plafond de dépense mensuel pour les moins de 18 ans, aucune offre limitée dans le temps poussée aux mineurs, pas de notification push commerciale.

## 4. Loot boxes et objets numériques monétisables

| Pays | Règle | Fiabilité |
|---|---|---|
| **Belgique** | La Commission des jeux de hasard juge depuis avril 2018 que les loot boxes payantes (mise, hasard, gain) sont un jeu de hasard illégal sans licence. Sanctions pénales : jusqu'à 800 000 € et 5 ans de prison. Application inégale : une étude relève que 82 % des 100 jeux iPhone les plus rentables en Belgique en vendaient encore. Une décision d'Anvers de 2025 annoncerait plus de fermeté. | Interdiction : *vérifié*. Décision d'Anvers : *incertain*. |
| **Pays-Bas** | Le Conseil d'État a annulé en mars 2022 l'amende de l'autorité des jeux contre EA (FIFA), en jugeant le jeu dans son ensemble, à dominante d'adresse. Les loot boxes payantes ne sont plus interdites en soi ; le risque reste quand les gains se revendent. Le gouvernement aurait confirmé en septembre 2024 ne pas vouloir rétablir d'interdiction. | Arrêt de 2022 : *vérifié*. Position de 2024 : *incertain* (sources contradictoires). |
| **France** | Pas de qualification de jeu d'argent tant que les gains ne peuvent pas être convertis en argent réel. L'ANJ n'a pas classé les loot boxes comme jeux d'argent. | *Probable.* |
| **France, JONUM** | La loi SREN (mai 2024, art. 40-41) crée les « jeux à objets numériques monétisables » : un sacrifice financier, du hasard, et des objets **cessibles à des tiers** contre de l'argent (souvent des NFT), mais pas revendables à l'éditeur. Régime expérimental de 3 ans, sous l'ANJ, mis en œuvre par le **décret n° 2026-60 du 4 février 2026** (en vigueur le 7 février 2026) ; six catégories de jeux admises, dont « aventure et quêtes » et « gestion et construction ». | *Vérifié* (Bird & Bird, Squire Patton Boggs, National Law Review). |
| **Pologne** | Projet fin 2025 : licence de jeu exigée pour les achats soumis au hasard. | *Incertain.* |
| **UE** | Aucune loi en vigueur. Résolution du Parlement européen de novembre 2025 qui demande l'interdiction des loot boxes dans les jeux accessibles aux mineurs. Pistes dans le DFA et le KIDS Act. | Résolution : *probable*. |
| **Stores** | Apple et Google imposent d'afficher les probabilités des tirages payants (règle 3.1.1 de l'App Store, *texte connu, non relu*). | — |

**Pour Kalendrath** : le plus simple et le plus robuste est **aucun tirage aléatoire payant**, même payé en monnaie virtuelle achetée. Les récompenses aléatoires gratuites (expéditions, butin PvE) ne posent pas de problème de jeu d'argent : pas de mise. Le JONUM ne concerne Kalendrath que si des objets devenaient revendables entre joueurs contre de l'argent, ce qu'il faut éviter.

## 5. Droit de rétractation et abonnements

### 5.1 Rétractation pour le contenu numérique

- **Principe** : 14 jours de rétractation pour un achat à distance (code de la consommation, art. L221-18). *Vérifié* (service-public.gouv.fr).
- **Exception** (art. L221-28, 13°) : le contenu numérique fourni sans support matériel, dont l'exécution a commencé **avec l'accord préalable exprès** du consommateur et **sa renonciation expresse** à son droit de rétractation. *Vérifié* (service-public.gouv.fr).
- **Mise en œuvre** : une case ou une étape distincte du bouton « Acheter » (« Je demande la livraison immédiate et je renonce à mon droit de rétractation »), puis une **confirmation sur support durable** (courriel de reçu qui reprend cette renonciation). Sans cela, le joueur garde ses 14 jours même s'il a déjà dépensé. *Probable* (CMS).
- Monnaie non encore dépensée : le CPC laisse entendre que la rétractation s'éteint une fois la monnaie utilisée ; pour un stock non utilisé, la question reste débattue. **Incertain.**
- **Bouton de rétractation** : la directive (UE) 2023/2673 ajoute à la directive droits des consommateurs une « fonction de rétractation » obligatoire pour les contrats conclus en ligne, applicable à partir du **19 juin 2026**. *Probable* (citée par CMS ; transposition française non vérifiée). Elle ne s'applique que quand la rétractation existe : avec une renonciation valable, elle ne joue pas pour le contenu déjà livré.

### 5.2 Abonnements : la résiliation « en trois clics »

- **Obligatoire en France depuis le 1er juin 2023** : art. L215-1-1 du code de la consommation (loi pouvoir d'achat du 16 août 2022) et **décret n° 2023-417 du 31 mai 2023**. Si l'abonnement peut se souscrire en ligne, il doit pouvoir se résilier en ligne, gratuitement, par une fonction « résilier votre contrat » facile d'accès en permanence depuis l'interface, avec confirmation sur support durable. Amende administrative jusqu'à 15 000 € (personne physique) ou 75 000 € (personne morale). *Vérifié* pour la base légale (Dalloz, plusieurs sites concordants) ; montants des amendes *probable* (Selectra). Les sources divergent sur le numéro de l'article de la loi (15 ou 17) : sans importance pratique.
- **Reconduction tacite** : pour un contrat de services à durée déterminée reconduit tacitement, le professionnel doit prévenir le consommateur de la possibilité de ne pas reconduire (art. L215-1, *texte connu, non relu*). Son application exacte à un abonnement mensuel est à faire vérifier.
- **Via les stores** : la résiliation passe par l'interface d'Apple ou de Google, qui gèrent eux-mêmes ces obligations. Pour un paiement direct sur le site, c'est à Kalendrath de les remplir.

## 6. RGPD pour un petit éditeur

**Obligatoire** (pas d'exemption de taille pour l'essentiel) :
- Une **politique de confidentialité** claire : quelles données (compte, courriel, adresse IP, journaux de connexion, achats), pourquoi, combien de temps, qui y accède (hébergeur, prestataire de paiement), droits du joueur et comment les exercer.
- **Base légale** : exécution du contrat pour le compte et la partie ; obligation légale pour les factures (conservation 10 ans) ; consentement pour l'infolettre et les traceurs non exemptés.
- **Suppression du compte** possible, et durées de conservation fixées (comptes inactifs purgés).
- **Sous-traitants** : un contrat de traitement avec chaque prestataire (hébergeur, paiement, envoi de courriels) ; préférer un hébergement dans l'UE, ou vérifier l'encadrement des transferts hors UE.
- **Registre des traitements** : la dispense pour les structures de moins de 250 personnes ne vaut pas pour les traitements réguliers, donc un registre simple (une page) reste de mise (RGPD art. 30, *texte connu, non relu*). Pas de délégué à la protection des données obligatoire à cette échelle.
- **Violation de données** : notification à la CNIL sous 72 h si risque pour les personnes.

**Mesure d'audience** : un outil est **exempté de consentement** si sa finalité est strictement limitée à la mesure d'audience pour le compte exclusif de l'éditeur, s'il ne produit que des statistiques anonymes, sans recoupement ni suivi de navigation. Recommandations de la CNIL : traceurs de 13 mois au plus, données conservées 25 mois au plus. Un outil qui réutilise les données pour son propre compte sort de l'exemption. *Vérifié* (CNIL). Bonne pratique : un outil auto-hébergé ou européen configuré en mode exempté, donc pas de bandeau cookies du tout.

**Discord** : Discord est responsable de son propre service. Kalendrath devient responsable pour ce qu'il collecte lui-même via le serveur (bot qui relie un compte Discord à un compte de jeu, formulaires, sondages nominatifs) : le mentionner dans la politique de confidentialité, ne collecter que le nécessaire. Un sondage anonyme ne pose pas de problème. *Analyse, non sourcée.*

## 7. Statut juridique, TVA et mentions obligatoires

### 7.1 Vendre en tant que particulier ?

Non, pas de façon répétée. Vendre régulièrement de la monnaie virtuelle ou des packs est une activité professionnelle : il faut une structure. Le plus simple pour démarrer est la **micro-entreprise** (entrepreneur individuel), déclarée sur le guichet unique de l'INPI. *Analyse ; la qualification exacte (prestation de services commerciale, BIC) est à confirmer à la création.*

**Plafonds 2026 de la micro-entreprise** (sortie du régime seulement après deux années consécutives de dépassement) : 203 100 € pour la vente de marchandises, **83 600 € pour les prestations de services**. *Vérifié* (entreprendre.service-public.gouv.fr). La vente de contenu numérique relève en principe des prestations de services.

### 7.2 TVA

- **Franchise en base en 2026** : pas de TVA facturée tant que le chiffre d'affaires de l'année précédente reste sous **37 500 €** pour les prestations de services (seuil majoré 41 250 € dans l'année, au-delà duquel la TVA s'applique dès le jour du dépassement). La réforme qui prévoyait un seuil unique de 25 000 € a été **abandonnée**. *Vérifié* (entreprendre.service-public.gouv.fr, page vérifiée le 1er janvier 2026).
- **Ventes vers les autres pays de l'UE** : les services électroniques vendus à des particuliers sont taxés dans le pays du client. Sous **10 000 € par an** de ventes transfrontières dans l'UE (tous pays cumulés), les règles du pays de l'éditeur peuvent s'appliquer. Au-delà, TVA du pays de chaque client, déclarée et payée via le **guichet unique OSS** (déclaration trimestrielle, même à zéro). *Vérifié* pour le seuil et l'OSS (Your Europe, Commission). Point d'attention : au-delà de 10 000 €, la franchise française ne couvre pas ces ventes, même sous 37 500 € (*probable*, à confirmer avec le service des impôts).
- **Solution simple** : un prestataire de paiement « marchand officiel » (*merchant of record*), qui revend en son nom et gère lui-même la TVA de chaque pays, contre une commission plus élevée qu'un simple processeur de paiement. Les ventes via l'App Store et Google Play suivent ce modèle : Apple et Google collectent et reversent la TVA. *Analyse.*

### 7.3 Mentions et dispositifs obligatoires

- **Mentions légales** sur le site (identité, adresse, numéro SIREN, hébergeur), loi pour la confiance dans l'économie numérique, art. 6. *Texte connu, non relu.*
- **CGV** avec le prix, les modalités de paiement, la rétractation, la garantie de conformité du contenu numérique, les conditions de fermeture du serveur.
- **Médiateur de la consommation** : tout professionnel qui vend à des consommateurs doit leur garantir l'accès gratuit à un médiateur et en indiquer les coordonnées (code de la consommation, art. L612-1). Adhésion payante auprès d'un médiateur agréé. *Texte connu, non relu.* La plateforme européenne de règlement en ligne des litiges (RLL) a été supprimée en juillet 2025 : le lien vers elle n'est plus exigé (*probable*).
- **Accessibilité** : l'Acte européen sur l'accessibilité, applicable depuis le 28 juin 2025, vise le commerce électronique ; les microentreprises de services (moins de 10 personnes et 2 M€) en sont exemptées. *Texte connu, non relu.* Bonne pratique quand même.

## 8. Stores et paiements externes (DMA)

| | Commission sur les achats intégrés | Paiement externe dans l'UE | Fiabilité |
|---|---|---|---|
| **Apple (UE, conditions du 1er octobre 2026)** | 26 % standard ; **15 %** pour le programme petites entreprises et les abonnements après un an | Paiement alternatif dans l'appli : 20 % (10 % petites entreprises). Lien vers une offre extérieure : 15 % (10 % petites entreprises) sur les achats faits dans les 7 jours suivant le clic. Choix du mode de paiement figé 12 mois. Paiements alternatifs derrière un contrôle parental pour les 13-17 ans ; liens externes interdits aux moins de 13 ans. | *Probable* (page officielle Apple, lue via un outil de résumé : à relire avant toute décision) |
| **Google Play (EEE, nouvelle grille depuis le 30 juin 2026)** | Grille en deux parts (frais de service + 5 % de frais de facturation), qui distingue nouvelles et anciennes installations : de 10 % + 5 % (abonnements, premier million de dollars) à 25 % + 5 %. Ancienne grille hors de ces régions : 15 % sur le premier million de dollars annuel, 30 % au-delà. | Liens vers des offres externes et facturation alternative autorisés dans l'EEE, sous conditions de programme ; frais réduits pour les liens externes. | *Incertain* (page officielle, mais résumé confus : à relire) |

**Pour Kalendrath** : tant que le jeu est sur navigateur, **aucune commission de store** ; seuls comptent les frais du prestataire de paiement. L'appli mobile changera l'équation : un même pack vendu sur le site et dans l'appli peut avoir des prix différents. Prévoir dès maintenant une boutique dont le prix en euros dépend du canal, et garder en tête que les règles DMA d'Apple et de Google ont changé plusieurs fois depuis 2024 et changeront encore.

## 9. Ce qui est obligatoire, ce qui est bonne pratique

| Sujet | Obligatoire (déjà en vigueur) | Lecture des autorités (non contraignante, à suivre) | Bonne pratique |
|---|---|---|---|
| Prix | Prix TTC en euros de la monnaie virtuelle | Équivalent en euros de chaque objet ; une seule monnaie payante ; paquets qui collent aux prix | Bouton « montant exact » |
| Urgence | Pas de fausse limite de durée ou de quantité | Pas d'offre limitée poussée aux enfants | Rythme des packs public et prévisible |
| Mineurs | Consentement parental sous 15 ans pour ce qui repose sur le consentement | Contrôle parental, réglages protecteurs par défaut | Plafond de dépense mensuel sous 18 ans ; pas de push commercial |
| Loot boxes | Interdites en Belgique si payantes | Lignes directrices DSA : risque pour les mineurs | Aucun tirage payant |
| Rétractation | 14 jours sauf renonciation expresse et confirmée | Informer clairement | Geste commercial sur le premier achat litigieux |
| Abonnement | Résiliation en ligne « en trois clics » | DFA à venir : rappels, essais gratuits | Rappel avant chaque échéance |
| Données | Politique de confidentialité, droits, registre, sous-traitants | — | Mesure d'audience exemptée, pas de bandeau |
| Statut et TVA | Micro-entreprise, franchise, OSS au-delà de 10 000 € UE, médiateur, mentions légales | — | Prestataire « marchand officiel » |

## 10. Checklist pour Kalendrath

### Packs limités en durée et en quantité (GDD 4.2, point 8)

- [ ] **La limite est vraie.** Un pack « 3 jours » disparaît vraiment au bout de 3 jours ; il ne revient pas identique la semaine suivante sous l'étiquette « dernière chance ». Un pack « 5 achats max » est bloqué au 6e. Le compte à rebours affiche l'heure réelle de fin, ne se relance pas.
- [ ] **Calendrier des packs publié** (ou rythme connu : « un pack de saison toutes les 2 semaines ») : l'urgence reste réelle sans être une pression cachée. C'est aussi cohérent avec le plafond de +30 %.
- [ ] **Aucune incitation directe des enfants** (« Achète maintenant ! ») ; pas de fenêtre surgissante d'achat à la connexion pour les comptes de moins de 18 ans ; pas de pack limité poussé par notification.
- [ ] **Pas de fausse valeur** : pas de « valeur 50 € » ni de prix barré qui n'a jamais été pratiqué. Si la valeur est montrée, l'exprimer en contenu (« 3 jours d'ouvrier + 2 000 pierres »), pas en faux prix.
- [ ] **Prix en euros** de chaque pack, et équivalent en euros pour tout ce qui se paie en monnaie virtuelle.

### Location mensuelle des ouvriers (GDD 4.2, point 13)

- [ ] **Choisir la forme juridique avant le code.** Option la plus simple : une **location de 30 jours payée en monnaie virtuelle, sans reconduction automatique** (achat ponctuel, pas d'abonnement, donc pas de résiliation « en trois clics » à prévoir). Option abonnement en euros reconduit automatiquement : fonction de résiliation en ligne accessible en permanence, confirmation sur support durable, information avant reconduction, et rappels qui seront probablement exigés par le DFA.
- [ ] **Date d'expiration visible** dans la file de construction, rappel quelques jours avant.
- [ ] **Loyauté à l'expiration** : un chantier lancé par l'ouvrier loué se termine même si la location expire (sinon, pression pour renouveler qui ressemble à un dark pattern, et frustration).
- [ ] **Prix en euros affiché** à côté du prix en monnaie virtuelle (« 300 gemmes, soit environ 5 € »), et paquets de gemmes calibrés pour que 300 gemmes s'achètent sans reste important.
- [ ] La 2e file **obtenable sans payer** (déjà décidé) : c'est aussi le meilleur argument face à une accusation d'achat forcé.

### Boutique en général

- [ ] **Une seule monnaie payante.** Les monnaies gagnées en jeu (ressources, jetons d'event) ne s'achètent pas directement en euros.
- [ ] **Paquets de monnaie** alignés sur les prix des objets ; idéalement un achat au montant exact.
- [ ] **Renonciation à la rétractation** : case distincte du bouton d'achat, reçu par courriel qui la reprend.
- [ ] **Aucun tirage aléatoire payant**, même en monnaie virtuelle (Belgique, KIDS Act, DFA).
- [ ] **Âge à l'inscription** ; sous 15 ans, consentement parental pour ce qui en dépend ; sous 18 ans, plafond de dépense mensuel et réglages protecteurs par défaut.
- [ ] **Pas de séries de connexion punitives** (perdre une récompense accumulée en manquant un jour) : c'est dans le viseur du KIDS Act pour les mineurs. Préférer un calendrier où un jour manqué décale sans tout perdre.
- [ ] **Fermeture du serveur** prévue dans les CGV : préavis, sort de la monnaie non dépensée.

### Exploitation

- [ ] **Micro-entreprise** créée avant le premier euro encaissé ; franchise de TVA ; suivi du cumul des ventes vers les autres pays de l'UE (seuil de 10 000 €), ou prestataire « marchand officiel ».
- [ ] **Médiateur de la consommation** choisi, coordonnées dans les CGV.
- [ ] **Mentions légales, CGU, CGV, politique de confidentialité** publiées avant l'alpha publique (les CGU et la confidentialité dès l'alpha, même gratuite).
- [ ] **Mesure d'audience exemptée de consentement** ; aucun traceur publicitaire.
- [ ] **Point de contact et signalement** des contenus illicites dès qu'il y a un chat ou un forum (DSA).
- [ ] **Faire relire** le parcours d'achat et les CGV par un juriste avant l'ouverture de la boutique (Phase 8).
- [ ] **Surveiller** : proposition du DFA (novembre 2026), négociation du KIDS Act, suites du CPC sur les monnaies virtuelles, règles DMA d'Apple et Google.

## Sources

Fiabilité indiquée pour l'usage qui en est fait ci-dessus.

- Commission européenne, atelier CPC sur les monnaies virtuelles (3 juin 2025) — https://commission.europa.eu/news-and-media/news/european-commission-hosts-stakeholders-talks-application-cpc-networks-key-principles-games-virtual-2025-06-03_pl — *vérifié*
- Reed Smith, Q&A sur les principes CPC (mars 2025) — https://www.reedsmith.com/en/perspectives/2025/03/qas-on-the-eu-consumer-protection-authorities-joint-guidance-paper — *probable*
- Linklaters, « Game changer » — https://techinsights.linklaters.com/post/102k6t4/game-changer-eu-introduces-consumer-protection-guidance-for-in-game-virtual-curr — *probable*
- Baker McKenzie, principes CPC et Belgique — https://connectontech.bakermckenzie.com/european-consumer-protection-network-issues-new-key-principles-on-in-game-virtual-currencies-impact-for-gaming-and-gambling-entities-in-belgium-the-eu-and-beyond/ — *probable*
- Copie du document CPC (PDF, non lisible par mes outils) — https://esportslegal.news/wp-content/uploads/2025/03/Key-principles-on-in-game-virtual-currencies.pdf — non exploité
- CMS, « Level Up Compliance » (Star Stable, rétractation) — https://cms.law/en/gbr/legal-updates/level-up-compliance-video-games-industry-in-the-spotlight-again-for-consumer-law-compliance — *probable*
- Forbrukertilsynet (autorité norvégienne), action contre Star Stable — https://www.forbrukertilsynet.no/eng-articles/national-consumer-authorities-and-commission-take-action-on-harmful-practices-in-the-gaming-industry — *vérifié*
- CMS, « Inside the EU's planned Digital Fairness Act » (19 octobre 2026) — https://cms.law/en/int/legal-updates/inside-the-eu-s-planned-digital-fairness-act-digital-design-subscription-traps-and-influencer-marketing — *probable*
- EPRS (Parlement européen), « Towards a digital fairness act » (octobre 2026) — https://eprs.europarl.europa.eu/contents/publications/EPRS/2026/10/EPRS_BRI(2026)791529.html — *vérifié*
- Wikipedia, Digital Fairness Act (dates de consultation) — https://en.wikipedia.org/wiki/Digital_Fairness_Act — *probable*
- William Fry, EU KIDS Act — https://www.williamfry.com/knowledge/eu-kids-act-grown-up-rules-for-online-providers/ — *probable*
- Davis Wright Tremaine, EU KIDS Act — https://www.dwt.com/blogs/privacy--security-law-blog/2026/09/eu-kids-act-online-child-safety-proposal — *probable*
- CMS, protection des mineurs (lignes directrices DSA art. 28) — https://cms.law/fr/fra/news-information/protecting-minors-in-the-digital-space — *probable*
- Observatoire européen de l'audiovisuel, lignes directrices art. 28 — https://merlin.obs.coe.int/article/10383 — *probable*
- Promise Legal, loot boxes par pays — https://blog.promise.legal/lootbox-laws-jurisdiction-indie-game-studios/ — *incertain* (blog), recoupé pour la Belgique et les Pays-Bas
- Programming Insider, loot boxes en 2026 — https://programminginsider.com/loot-boxes-regulation-and-where-the-line-sits-in-2026/ — *incertain*
- Bird & Bird, loi SREN et JONUM — https://cm.twobirds.com/en/insights/2025/france/loi-sren-nouvelle-definition-et-nouveau-regime-pour-les-jeux-a-objets-numeriques-monetisables-jonum — *probable*
- Squire Patton Boggs, régime expérimental des JONUM — https://larevue.squirepattonboggs.com/le-regime-experimental-des-jonum-jeux-a-objet-numeriques-monetisables.html — *probable*
- National Law Review, JONUM — https://natlawreview.com/article/french-experimental-framework-games-monetisable-digital-objects-so-called-jonum — *probable*
- Service-public.gouv.fr, droit de rétractation — https://www.service-public.gouv.fr/particuliers/vosdroits/F10485 — *vérifié*
- Dalloz, décret n° 2023-417 du 31 mai 2023 — https://www.dalloz-actualite.fr/document/decr-n-2023-417-31-mai-2023-jo-1er-juin — *vérifié*
- Donneespersonnelles.fr, résiliation en trois clics — https://donneespersonnelles.fr/resiliation-en-trois-clics — *probable*
- Selectra, sanctions du bouton de résiliation — https://selectra.info/finance/actualites/marche/bouton-resiliation-absent-amende-recours — *probable*
- CNIL, mesure d'audience exemptée de consentement — https://www.cnil.fr/fr/cookies-et-autres-traceurs/regles/cookies-solutions-pour-les-outils-de-mesure-daudience — *vérifié*
- Entreprendre.service-public.gouv.fr, franchise en base de TVA — https://entreprendre.service-public.gouv.fr/vosdroits/F21746 — *vérifié*
- Entreprendre.service-public.gouv.fr, plafonds de la micro-entreprise — https://entreprendre.service-public.gouv.fr/vosdroits/F32353 — *vérifié*
- Your Europe, TVA transfrontière (seuil de 10 000 €) — https://europa.eu/youreurope/business/taxation/vat/cross-border-vat/index_fr.htm — *vérifié*
- Commission, guichet unique OSS — https://vat-one-stop-shop.ec.europa.eu/one-stop-shop/declare-and-pay-oss_en — *vérifié*
- Apple, DMA et applis dans l'UE — https://developer.apple.com/support/dma-and-apps-in-the-eu/ — *probable* (à relire)
- Google Play, frais de service — https://support.google.com/googleplay/android-developer/answer/112622 — *incertain* (à relire)
- Textes cités sans relecture en ligne (*texte connu, non relu*) : règlement (UE) 2022/2065 (DSA), art. 11-19, 25, 28 ; directive 2005/29/CE, annexe I, points 7 et 28 ; directive (UE) 2019/2161 (Omnibus) ; directive (UE) 2023/2673 ; code de la consommation, art. L112-1, L121-4, L215-1, L612-1 ; loi Informatique et libertés, art. 45 ; RGPD, art. 30 ; LCEN, art. 6 ; CGI, art. 293 B ; Acte européen sur l'accessibilité (directive (UE) 2019/882) ; App Store Review Guidelines, 3.1.1. Point de départ : https://eur-lex.europa.eu et https://www.legifrance.gouv.fr
