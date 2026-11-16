# Audit de Rakorn (play.rakorn.fr) — fonctionnalités, progression, rythme, transposition à Kalendrath

Agent A, 2026-11-15. Compte audité : personnage « Kalendrath », niveau 7, titre « Artisan reconnu », Forgeron 10 / Mineur 11. Captures dans `docs/archives/audit-rakorn-2026-11-15/` (numérotées, citées ci-dessous). Aucun fichier du GDD n'a été modifié ; tout ce qui suit sont des pistes.

## 0. Actions ayant modifié l'état du compte

- **Un seul combat de campagne** : « Archer embusqué » (zone I, combat 7/15), victoire en un tour. Effets : énergie 400 -> 395 (-5), +47 XP (508 -> 555 / 630), +35 or (3 393 -> 3 428), progression de campagne 6/15 -> 7/15, 1 Trempe gagnée (indiquée +1 avant le combat).
- **Butin abandonné** : le sac était plein (15/15), le butin (Cuivre x2, Charbon x3, Câble effiloché x2) n'a pas pu être pris, j'ai cliqué « Tout laisser ». Perte mineure, mais c'est un point de friction à noter (cf. 3).
- Tout le reste est de la lecture : ouverture des écrans, fenêtres Métiers/Journal/Rapport (fermées sans rien récupérer), sélection de recettes et d'offres sans fabriquer ni acheter ni vendre. Les récompenses du Journal de la semaine (« Récupérer »), les hauts faits « à retirer » (29), le « Prendre l'or » des Premiers pas et l'encaissement de 161 or de ventes au Marché n'ont **pas** été touchés : ils attendent toujours Gregory. Aucun clic sur « Envoyer le lien », aucun achat, aucun message.
- Constat de contexte : le compte de Gregory a déjà beaucoup joué (34 pièces forgées cette semaine, 10 offres en vente, 1 062 or en vente, 60 achats de la semaine).

## 1. Vue d'ensemble : ce qu'est Rakorn

Rakorn est un jeu d'**artisanat-économie à énergie**, pas un jeu de gestion de territoire. Le personnage unique (niveau 1-60) fait trois choses : combattre en campagne (8 zones de 15 niveaux, tour par tour), exercer **deux métiers** (récolte + artisanat parmi 8) et échanger sur un **marché entre joueurs** très profond. Une **guilde** (« maison ») et une **Conquête** de territoires par saison ajoutent le collectif. Tout est borné par une **énergie 400/400** qui se régénère à 1 point par minute. Interface : barre latérale de 14 écrans avec raccourcis clavier (L C I Q F A P J G H X N M), en-tête avec or, énergie, messagerie, proclamations ; version mobile annoncée (news du 9 nov.). Le jeu est très jeune et itère vite : 38 proclamations, dont 4 mises à jour du 12 au 14 novembre (cf. capture 29).

Capture d'accueil : `00-accueil-royaume.png`.

## 2. Écran par écran

### 2.1 Royaume (accueil) — `00-accueil-royaume.png`, `27-classement.png`

- Fiche du personnage : Puissance (75), Vie, Attaque, Armure, Parade, Critique, chacune avec un **palier visuel** (« Ivoire · palier suivant à 250 »), un titre porté, et la rangée des métiers (niveau, « Héritage » 0).
- Carte « Classement des artisans » : 75e sur 78, 8 points cette semaine, rotation des serments dans 7 h, « 935 points pour le Top 10 », coffres hebdomadaires du Top 10.
- Les « portes du royaume » : Quêtes (1 en cours), Campagne (chapitre 1, 6/15).
- Trois cartes d'accueil : Premiers pas, Journal des serments, Rapport de l'intendant (cf. 2.14 à 2.16).
- Bandeau persistant : rappel de validation d'e-mail (récompenses du parrainage et du sondage liées à la validation, accès aux canaux « Général » et « Commerce » de la messagerie), proclamations, **La Chronique du jour** (« La commande de Finwë », un fait de commerce de la veille mis à l'honneur, avec « son héros »).

### 2.2 Campagne — `12-campagne.png`, `19-combat-avant.png`, `20-combat-en-cours.png`, `21-combat-victoire.png`

- **Structure** : 8 zones de 15 niveaux (combats) chacune, avec un boss à la fin d'un « rang » (rang 10 : Vesk le Corrupteur, rang 15 : Malachar l'Ombre). Zones débloquées par niveau de personnage : I Village des Apprentis (début), II Côte des Épaves (« Bloqué » tant que la zone I n'est pas finie), III Sylve de Rouvre niv. 14, IV Mine d'argent 21, V Gorges de Fendeval 29, VI Cimes de Kaerloch 37, VII Profondeurs de Sombrefer 45, VIII Trône sous la Montagne 53. Tous les ~7-8 niveaux une nouvelle zone : c'est le rythme de la progression 1-60.
- **Avant le combat** (fiche de la créature) : niveau, Vie, Attaque, Armure, Parade, Énergie (5 par combat), un **trait** nommé de la créature (« Fragile : frappe fort et tombe vite », « Rapide »), avec un conseil tactique, une **estimation de chance de victoire** (94 %, « très favorable », avec explication de ce qu'elle mesure et de ce qu'elle ne mesure pas), les récompenses possibles (XP, or, Trempe) et un **butin avec probabilités** (100 %, 60 %, 40 %). Aucun hasard caché : le joueur choisit en connaissance de cause.
- **Déroulement** : tour par tour, « à vous d'agir ». Le joueur voit **ce que l'ennemi prépare** (« Il prépare : dégâts projetés 7-9 ») avant de choisir. Barre de 5 techniques (Frappe, Coup lourd, Garde, Pansement, Coup de pommeau) avec dégâts en fourchette, **temps de recharge en tours**, soins en pourcentage, une « relique » verrouillée (niv. 10, « les Dix Déchus »), bouton « Fuir le combat ». Résultat : XP, or, **« le prix de la victoire »** (vie, énergie, usure), butin à récupérer.
- **Nouveauté à retenir** : une victoire n'use plus l'équipement, une défaite coûte 5 points de durabilité (news du 11 nov.). L'échec coûte donc du temps et un peu d'usure, jamais une perte sèche, ce qui rejoint le pilier « pas de perte irréversible » de Kalendrath.
- **120 créatures** : non vérifié directement (le bestiaire du Codex, onglet « Bestiaire », n'a pas été ouvert), le chiffre vient de la consigne. Hauts faits « Bestiaire : Village des Apprentis 6/15 » confirme 15 créatures par zone x 8 zones = 120.
- **Quêtes** (`18-quetes.png`) : 185 quêtes au tableau, chapitres I à VIII + « Les Arts ». Histoire principale (« Les brigands de Kroff », 12 étapes) et histoires secondaires (« Les remèdes de mère Gerte », « La forge de Hobb »). Chaque quête affiche un récit (PNJ, citation), un objectif chiffré, et ce qu'elle ouvre. Les **Arts** (soigner, relever, protéger, absorber, renvoyer) sont des techniques de combat apprises au bout de suites de quêtes (compétences « niv. 10 · Quête » en `13-competences.png`).
- **Compétences** (`13-competences.png`) : 27 techniques (dégâts, défense, contrôle, soins, renfort, purge), débloquées par niveau ou par quête, 5 emplacements de « rotation », arbres de talents (1 point à placer), et une **« analyse du build »** (profil de menace 68, dégâts totaux, absorption, cycle moyen, forces/risques). Fioles de soin : 3 emplacements, antidote niv. 15 et renfort niv. 35 verrouillés.

### 2.3 Inventaire — `08-inventaire.png`

Sac de **15 emplacements** (piles de ressources qui « grossissent » même sac plein, mais plus aucun nouvel objet), poupée d'équipement à 12 emplacements environ (casque, plastron, gants, pantalon, bottes, cape, ceinture, amulette, 2 anneaux, outils métier, armes, 4 sacs). Filtres par métier (Mineur, Ingénieur, Forgeron) : le rangement est organisé par la logique des métiers. Les **sacs** s'équipent et donnent des places supplémentaires (on trouve des « Sac à minerai » dans la recette Mineur, niv. 10 : le sac est un produit d'artisanat).

### 2.4 Banque — `09-banque.png`

« Salle forte » : coffre à son nom, **5 000 or pour l'ouvrir, une fois**, puis 10 emplacements de sac à poser dans le coffre, de 250 à 2 500 or (13 750 or les dix). Elle sert seulement à ranger : l'établi, la Forge, le Marché et les commandes ne puisent que dans le sac à dos. C'est un **puits d'or** structurel et une réponse payante-en-or à la saturation du sac.

### 2.5 Forge — `07-forge.png`

Quatre modes : **Réparer**, **Recycler**, **Assembler**, **Sertissage** (« au niveau 40 »). La durabilité est un système central (ex. Épée simple : 60 de durabilité) : une pièce à zéro cesse de compter mais « ne se perd jamais ». Réparer 3 pièces est un serment quotidien : l'usure est un robinet d'or/matières et d'activité. À noter : la Forge **n'est pas** l'écran de fabrication, c'est celui de l'entretien et de la transformation ; la fabrication est dans Métiers.

### 2.6 Métiers — `01-metiers-recolte.png`, `02-metiers-artisanat.png`, `03-metiers-forgeron-recette.png`, `04-metiers-choix-metier-charte.png`

C'est le coeur de ce que Gregory veut récupérer.

- **8 métiers** : Mineur, Bûcheron, Ingénieur, Couturier, Joaillier, Forgeron, Alchimiste, Logisticien. Chaque métier a **une récolte** (Mineur et Bûcheron surtout ; les autres transforment) et **un artisanat**. Niveau de métier 1 à 60, frise de paliers 1-7-14-21-29-37-45-53-60 (comme les zones de campagne).
- **Deux métiers offerts, le troisième est verrouillé par un objet fabriqué par un autre métier** : « Charte de spécialisation, que fabrique le logisticien ». On peut aussi « remplacer » un métier. Forte interdépendance sociale voulue.
- **Récolte** (écran Gisements) : 16 gisements de Mineur de « Filon de charbon » niv. 1 à « Veine de mithril » niv. 55, chacun avec un **temps par lot** (30 s à 2 min 30 s) et une quantité (« 400 possibles » = bornée par l'énergie). On choisit la quantité (min, +10, +20, max) et on lance le lot : c'est du **temps différé en minutes**, pas de l'attente en heures. Une **« réserve partagée »** par gisement (ex. 3 050 / 3 090, « abondant ») : la ressource peut s'épuiser collectivement. Un **« Héritage des profondeurs »** : rang de Renom par métier (cf. 2.12).
- **Rendement** : chaque lot donne de l'XP de métier **et** de l'XP de personnage (+1 XP, avec un indicateur « 25 % » : l'XP personnage via les métiers est plafonnée à une fraction). Un **outil de métier** (« outil au cran 0 », Aiguille de couturier au Codex) réduit la durée de 10 % par cran, jusqu'à 5 crans, et se gagne « à la forge au niveau de métier 10 ».
- **Artisanat** (écran Recettes) : liste filtrable (Toutes / Connues), groupes par type : **Matières d'atelier** (lingots, alliages, bloc de pierre), **Armures**, **Sacs**, **Armes et mains gauches**, **Bijoux**, **Signature**. Chaque recette affiche : temps de fabrication (25 s pour un bloc de pierre, 2 h pour une pièce « du Serment » niv. 60), **deux niveaux requis** (niveau de métier **et** niveau de personnage pour porter l'objet, visible en rouge si non atteint), le nombre de fabrications possibles avec les stocks actuels (« 20 possibles »), la valeur au marché (« Au marché 17 or, 26 vendues en 7 j » : le prix du marché est affiché dans l'écran de fabrication, ce qui relie craft et économie), un **gain estimé** en or (+8 pour un bloc de pierre, -9 pour une épée simple : le jeu dit si fabriquer est rentable).
- **Composition requise** : ingrédients nécessaires, chacun avec la quantité en sac (0/3, 0/3, 0/6 pour l'Épée simple). Chaînes de matières : minerai (récolte Mineur) -> lingot (artisanat Mineur ou Forgeron, 4 familles de lingots au Forgeron : escarbille, battiture, braise, laitier...) -> pièce d'équipement (Forgeron) ; les armures du Mineur sont fabriquées par le Mineur. Chaque métier fabrique de l'équipement lié à son thème : casques/ceintures/gants chez le Mineur, armes/boucliers/plastrons chez le Forgeron.
- **Qualité et maîtrise** (capture 03) : à chaque recette, une **Maîtrise** (ex. 15/100 = base 6 + écart 9) fait varier le résultat entre trois paliers : **Honnête**, **Royale**, **Chef-d'oeuvre** (ex. « Honnête assurée, 19 % de royale »), avec deux emplacements de modificateurs (« + + »). Sur le Marché, la même pièce existe en **Grossière / Normale / Royale** (ex. « Bottes simples » à 61 / 80 / 125 or) : la qualité est un gradient de prix réel. Les hauts faits parlent de « Maîtrise : Poigne, Habitué, Oeil du maître » : des **spécialités de maîtrise** qui se développent.
- **Raretés** : COMMUN / PEU COMMUN / RARE / MYTHIQUE / etc. (échelle colorée), les ressources ont une rareté propre (Adamantite rare à 41 or, Chêne peu commun à 1 or).
- **Recettes « Aux Archives »** : certaines recettes ne se débloquent pas par le niveau mais par un **objet** (« Minerai de fer ancestral, Aux Archives, niv. 40 »). Les pièces **Signature** (5 par métier, ex. Forgeron : Égide des Braises niv. 40, Heaume du Fer-Serment 48, Hache de Fendeval 52, Lame du Veilleur 56, Marteau du Premier Forgeron 60) sont débloquées par le **Renom du métier** (cf. 2.12) : objectifs de très long terme.
- **Ensembles** : filtre « Ensembles » au Marché, haut fait « Assorti : Ensemble simple », « Bien assorti : Ensemble simple 4/6 » (un bonus par nombre de pièces portées), onglet Ensembles au Codex. Quand on équipe 6 pièces d'un même ensemble, un haut fait pousse à finir la série.
- **Accélérer** : bouton « Accélérer » consommant un **Sceau Céleste** (la monnaie premium) pour terminer instantanément une récolte, une fabrication, un combat gagné ou une réparation. C'est la seule monétisation vue côté temps.
- **Énergie** : la fabrication affiche « Énergie 2/400 » (coût apparent du lot : 1 pour une récolte, 2 pour une fabrication d'une unité ; la lecture exacte du coût en fonction de la quantité n'a pas été vérifiée).

### 2.7 Marché — `05-marche.png`, `06-marche-vendre.png`

- **Trois modes** : Acheter, Vendre, Mes ventes. 348 articles catalogués, catégories : Ressources (103), Artisanat (85), Armes (21), Armures (91), Bijoux (37), Conteneurs (5), Potions (6).
- **Présentation par article regroupé** (pas par annonce) : nom, rareté, **tendance 7 j** (▲ +40 %, ▼ -53 %), meilleur vendeur, **prix moyen**, **à partir de** (meilleur prix), **disponibles** (stock cumulé). Recherche texte, filtres « Mon niveau » (n'affiche que ce qu'un personnage de son niveau peut porter ou boire : 127 offres masquées), tranche de niveaux, **« Oeuvres »** (qualité Grossière/Normale/Royale), **« Ensembles »**, tri. Le détail d'un article montre la meilleure offre, un jugement du prix (« pas encore de prix du marché pour le juger »), ventes 7 j, plus haut payé, graphique d'historique 7 jours, une **alerte de prix** (news du 13 nov. : « le Marché vous prévient quand un objet passe sous votre prix »), et l'achat par quantité (Min, +5, +10, Max) au prix unitaire.
- **Frais** : **5 % de frais d'achat, payés par l'acheteur en plus du prix** (« Un marché ou une route tenus à la Conquête les réduisent »). Le vendeur ne paie rien à la mise en vente, ce qui encourage à lister massivement.
- **Plafond d'offres** : 100 offres simultanées par joueur (« au plafond, plus rien ne se met en vente avant qu'une offre parte »). Ici 10 / 100.
- **Vendeurs** : joueurs et **« Comptoir »** (le comptoir marchand PNJ, qui apparaît comme vendeur de ressources de base : Bois, Chanvre, Bouleau, Cellule énergétique vide...). Le Comptoir fixe un plancher et donne un repère de prix ; un compteur (19:05, décroissant : 18:50, 18:45 à la lecture suivante) indique vraisemblablement le prochain renouvellement de son stock.
- **Vendre** (capture 06) : trois prix assistés : **Vente rapide** (1re place, ex. 3), **Équilibré** (prix moyen, 5), **Meilleur rendement** (le plus haut payé 7 j, 5) ; « votre place au marché : 7e sur 9 » ; **fourchette** autorisée (plancher 1, plafond 24, référence 6) : le prix d'une annonce est borné autour d'une référence, ce qui limite la manipulation ; bandeau « −10 % / Suggéré / +10 % ».
- **Mes ventes** : liste des offres actives, journal « Activité du marché » (acheteur, quantité, gain, statut « à retirer » / « encaissé », ancienneté), bouton **« Récupérer vos ventes »** (161 or à encaisser) : l'or n'arrive pas automatiquement, il attend « au comptoir que vous veniez le chercher » (c'est un hameçon de retour). Chaque offre affiche un indicateur de compétitivité (« Au prix du marché +8 % », « 2e / 7 parmi les offres »).
- **Boucle sociale** : l'acheteur est nommé, l'écran « Rapport de l'intendant » raconte les ventes à l'hôte au retour (« Bâche huilée, +105, à Finwë »). La Chronique du jour met en avant une vente du jour.

### 2.8 Commandes — `11-commandes.png`

Place de **commandes d'artisanat entre joueurs** (« courtage ») : un joueur poste une commande (ex. « Pic de sape x1, niveau 16 requis, commission 500 or + 16 + 6 »), un artisan du bon métier et du bon niveau la prend, la fabrique et la livre. Colonnes : métier, quantité, objet, **commanditaire**, ancienneté, mode (Ouverte à tous), **commission** (or) + récompenses (XP/Renom), niveau requis. Deux listes : « Ouvertes à tous » et « **En cours d'ouverture** » : une commande est **réservée d'abord aux artisans de son niveau** (ex. niv. 6 à 13) puis s'ouvre à tous après quelques dizaines de minutes, pour que les débutants aient d'abord accès aux petites commandes (news du 12 nov.). Compteurs « 0 / 5 » : limite de commandes simultanées. Onglets « Registre » et « Courtages ». Serment quotidien « Poster 2 commandes d'artisanat ».

### 2.9 Contrats — `10-contrats.png`

« La table de la Couronne » : le **PNJ** passe des « lettres de la Couronne » (le Chancelier, l'herboriste du palais Clémence, le sénéchal Thibaut...). Une lettre demande des ingrédients précis (ex. « Charme x7 », « Alliage de bronze x1 +2 »), de difficulté Simple / Intermédiaire / Difficile / Décret, avec une récompense en or (53 à 472) + **Réputation d'artisan** + **Faveur de la Couronne** (crans qui ouvrent 4 coffres hebdomadaires : 0-10-25-45-65). Renouvellement quotidien (6 h 59 min restantes), 1 lettre rejetable par jour. « Ce que vous déposez est remis à la Couronne : il ne revient pas si la lettre expire. » C'est un **puits de ressources** conçu comme une quête quotidienne qui consomme des produits de métiers.

### 2.10 Guilde (« Maisons ») — `15-guilde.png`

6 maisons, une seule par joueur, 12 à 24 membres (« Compagnie de fortune » / « établie » selon le niveau de la guilde), recrutement ouvert ou sur candidature, critère de niveau. Fonder une maison : niveau 10, une maison ouvre « Cité, expéditions, trésorerie, transport, rangs ». Blason personnalisable (news du 13 nov.). Étape finale des Premiers pas : « Rejoindre une maison ». Je n'ai rejoint aucune guilde.

### 2.11 Conquête — `14-conquete.png`, `31-conquete-territoire.png`

Carte stratégique d'une vingtaine de **territoires** (forts, tours, citadelles, relais, marché des routes, port...) que les guildes se prennent et se reperdent (journal public : « Aure Entuluva prend Bastion Rouge », « Tour des Marées est arraché à Le Mordor »). Compteurs : Mes territoires, **Influence** (20 disponibles), « Royaume tenu 0/25 ». Saison des « Comptes Justes » du 1er au 30 novembre ; semaine close dans 6 h 59. Un territoire « marché » ou « route » tenu réduit les frais du Marché (le 5 %), donc la Conquête a un effet **économique** direct. Je n'ai ouvert aucun territoire en détail (non utile pour le sujet métiers/craft/marché).

### 2.12 Héritage (Renom de métier) — `26-heritage.png`

Chaque métier a un **Renom** gagné par la production et les commandes remplies. Paliers : 150 (Coffret du forgeron) -> 1 500 (Égide des Braises, pièce Signature) -> 3 000 (Bannière) -> 4 800 -> 6 800 -> 9 000 -> 11 500 -> 14 200 -> 17 000 -> 20 000 (Marteau du Premier Forgeron). Les récompenses mélangent **recettes Signature**, **cosmétiques** (bannière, cadre épique, fond d'inspection) et un **titre**. C'est la progression « grande distance » du métier, détachée du niveau.

### 2.13 Hauts faits, Codex, Collections — `16-hauts-faits.png`, `17-codex.png`, `28-collections-titres.png`

- **Hauts faits** : 918 au registre, 1 177 points, filtres (Campagne, Récolte, Artisanat, Équipement, Marché, Contrats, Progression, Guilde). Chacun donne des points et parfois un titre ; **récompense à retirer** (clic) ; « La Voie » : 8 paliers de 5 à 50 points. Ce sont des centaines de micro-objectifs : « Première fabrication : Lingot de zinc », « Récolteur : Étain », « Marchand de charbon 62/100 », « Fournée peu communs 55/100 », « Ordres difficiles x10 ». Il y a un haut fait pour **chaque ressource récoltée** et **chaque première fabrication**, ce qui pousse à explorer tout le catalogue.
- **Codex** : encyclopédie par onglets (Aperçu, Bestiaire, Trophées, Expéditions, Originels, Donjons, Ensembles + un onglet par métier), fiches d'objet avec nature, provenance, rareté, emplacement, évolution (ex. Aiguille de couturier, cran 1 à 5, -10 % de durée par cran). C'est le catalogue de référence.
- **Collections** : cadres de portrait (40), titres, plaques, fonds, objets événementiels (0/75 pièces, « Curieux », Amateur à 8). Cosmétique pur à collectionner (gagné en jeu ou acheté, cf. 2.17).

### 2.14 Premiers pas (tutoriel, 9 étapes) — `30-premiers-pas.png`

Carte de l'accueil, 0/9 d'après le compteur mais plusieurs étapes sont cochées (état du compte, le compteur n'inclut que celles dont l'or a été pris). Les 9 étapes (titres lus dans le DOM) : **Saluer le royaume, Ta première arme, Ta première quête, Première récolte, Première fabrication, Première vente, Première commande, Première livraison, Rejoindre une maison**. Chaque étape a un texte d'instruction court et un or à « prendre » (100 or pour 6 pas restants). Le tutoriel est donc une **visite guidée de tous les piliers** (campagne, métiers, marché, commandes, contrats, guilde) sans écran dédié.

### 2.15 Journal des serments — `23-journal-serments.png`, `24-serments-semaine.png`

- **Journal du jour** : 9 serments (vaincre 8 monstres, récolter 30 ressources, fabriquer 5 objets, mettre 2 objets en vente, acheter 10 unités au marché, poster 2 commandes, réparer 3 pièces, remplir 2 contrats, dépenser 300 énergie), chacun paie 15 à 30 or, **« Prime des neuf » : 1 Sceau Céleste + 100 or**, rotation à 7 h (compte à rebours).
- **Journal de la semaine** : mêmes 9 types à 5-10 fois l'échelle (50 monstres, 200 ressources, 30 objets, 60 achats, 1 600 énergie, 15 contrats...), 80 à 150 or chacun, **prime : 3 Sceaux Célestes + 500 or**. Bon résumé du design : **chaque serment pousse un système différent** (combat, récolte, craft, marché vendeur, marché acheteur, commandes, forge/entretien, contrats, énergie), de sorte qu'une routine quotidienne complète fait tourner toute l'économie. L'un d'eux, « Acheter 10 unités », oblige les joueurs à acheter : demande garantie sur le marché.

### 2.16 Rapport de l'intendant — `25-rapport-intendant.png`

Écran de **retour de session** : « ce que votre intendant a consigné pendant votre absence ». Meilleure vente, or de ventes (+247), or de commissions (+14), pièces forgées (34), commande vivante ; la semaine (1 131 de ventes, 104 pièces forgées) ; un fil par jour (ventes, artisanat, commandes, maison) avec bouton « Tout marquer comme lu ». C'est l'outil de rétention le plus marquant : il traduit l'activité asynchrone en récit.

### 2.17 Boutique et monnaies — `22-boutique-sceaux.png`

- **Monnaies** : **Or** (monnaie de jeu), **Sceau Céleste** (premium : « termine immédiatement une récolte, une fabrication ou une réparation », aussi un combat déjà gagné), **Renom** (par métier et de saison, non échangeable), **Trempe** (« monte les rangs de vos techniques »), **Faveur de la Couronne** (crans hebdomadaires), **Réputation d'artisan** (score du classement).
- **Prix réels** : 20 Sceaux 1,99 EUR, 30 : 2,99, 50 : 4,99, 70 : 6,99, 100 : 8,99 (+11 %), 250 : 19,99 (+24 %). Soit 0,08 à 0,10 EUR le sceau. Paiement Stripe, TVA non applicable (micro-entreprise).
- **Les Sceaux se gagnent aussi en jeu** : prime des serments (1 par jour, 3 par semaine), coffres du classement (jusqu'à 20 pour le 1er), donc le premium est atteignable gratuitement mais lentement.
- **Cosmétiques en vente** : cadres de portrait (35), bannières de titre (15), fonds d'inspection (10). La boutique « à la une » est un habillage, pas de la puissance.
- **Valeur d'un Sceau** : un lot de fabrication de 20 min se termine pour 1 Sceau (« Accélérer 1 »), soit ~0,10 EUR ; c'est le prix de la réduction d'attente.

### 2.18 Classement et saison — `27-classement.png`

Classements par **Puissance** et par **Réputation d'artisan** (« livraisons de la semaine »), joueurs et guildes, avec « coffres chaque lundi » : Top 10 (Coffre d'artisan : 2 Sceaux, 50 Renom), Top 5 avec 5 à 20 Sceaux + Renom + **titre de saison** pour le Top 3. Saison des Comptes Justes 2026 (1-30 novembre) : une saison = un mois, titres de saison permanents (« Porteur du Sceau 2026 », « Premier souverain de Rakorn »).

## 3. Cheminement de progression

- **Niveau de personnage 1-60** : XP par combat (47 XP au niv. 7, 52 par quête), par quête et, pour 25 %, par les métiers. Niveau 8 à 630 XP, donc ~120 XP/niveau au début : une soirée de combats.
- **Déblocages par niveau** : zones de campagne (7-8 niveaux d'écart), techniques (27, échelonnées de 1 à 60), fioles (15, 35), Sertissage (niveau 40), fonder une maison (niv. 10), reliques (niv. 10), arts par quête (niv. 10), pièces d'équipement (niveau requis personnage + niveau de métier).
- **Titres** : « Artisan reconnu » (porté) se gagne aux hauts faits ; « Artisan confirmé » (457/500 réputation) est la marche suivante. Les titres sont plutôt **cosmétiques et sociaux** (rang sous le nom dans le classement), mais certains (Marché, Contrats) viennent avec des primes. Les titres cités dans le classement (« Fournisseur réputé », « Survivant de la crypte », « Porteur du sceau 2026 ») montrent une hiérarchie sociale lisible.
- **Court terme (minutes)** : un combat (5 énergie, 5 min), un lot de récolte (30 s - 2 min), un lot de fabrication (25 s - 2 h), un serment à valider.
- **Moyen terme (jours)** : 9 serments du jour (305 or), coffres hebdomadaires de la Couronne, quêtes de chapitre, classement hebdomadaire (remise à zéro le lundi), Héritage.
- **Long terme (semaines/mois)** : niveau 60, 8 zones, maîtrise des métiers, pièces Signature (20 000 de Renom pour la dernière), titres de saison mensuels, 918 hauts faits, collection cosmétique, Conquête de territoires par guilde.
- **Ce qui pousse à revenir** : énergie à dépenser (se remplit en 6 h 40), serments qui tournent toutes les 24 h, argent en attente au comptoir (« à encaisser »), rapport d'intendant, lettres de la Couronne quotidiennes (rotation), commandes d'artisanat ouvertes, classement hebdomadaire, saisons, nouvelles du royaume (nouveau contenu quasi quotidien), réserve partagée de gisements et prix de marché changeants.

## 4. Rythme et friction

- **Énergie 400 max, +1 point par minute** (lecture : « Un point toutes les 1 min », pleine en 6 h 40 min depuis zéro). Un combat coûte 5, un lot de récolte ou de fabrication coûte ~1-2 par lot d'après l'écran. 1 600 énergie par semaine est un serment hebdomadaire : l'énergie dépensée ne bride pas un joueur régulier, elle **plafonne le joueur intensif** et récompense la régularité (le surplus de plus de 400 est perdu). On ne s'arrête pas à l'énergie : le **temps** (lots de 25 s à 2 h) est le second frein, contournable avec des Sceaux.
- **Temps d'attente** : très courts, de l'ordre de la minute pour récolter, jusqu'à 2 h pour les pièces de fin de jeu ; fabrication « en lots » (quantité x durée unitaire ? non vérifié). Les minuteurs sont **à l'échelle d'une session**, pas de la semaine, ce qui contraste avec OGameX (heures/jours).
- **Frictions notées** :
  - **Sac plein à 15 emplacements** : dès le deuxième combat, le butin ne rentre plus (observé : 3 objets perdus). Les sacs, la banque (5 000 or + 13 750 or) et le marché sont les soupapes, un très gros levier de rétention ET d'agacement.
  - **Double niveau requis** (métier + personnage) : lisible, mais beaucoup de recettes sont verrouillées visuellement (cadenas).
  - **Argent à encaisser manuellement** et **récompenses à retirer** (29 hauts faits, 6 récompenses hebdo) : micro-clics, mais ils créent un rendez-vous.
  - **Validation d'e-mail** requise pour accéder aux canaux Général/Commerce de la messagerie et aux récompenses de parrainage : un frein volontaire (anti-bot), rappel persistant à l'écran.
  - **Dépendance entre métiers** (3e métier = Charte du logisticien) : beaucoup de joueurs doivent acheter pour avancer, donc le marché est vivant dès le début.
- **Ce qui est bloqué par quoi** : zones par niveau ; recettes par niveau de métier, niveau de personnage, Renom ou « Archives » ; 3e métier par un objet ; Sertissage par niveau 40 ; fonder une maison par niveau 10 ; Top 10 par points hebdomadaires ; banque par or.

## 5. Pour Kalendrath : transposable, à éviter, articulation avec le GDD

### 5.1 Lecture du GDD (rappel utile)

Le GDD de Kalendrath a déjà : craft/forge **non défini** (section 5.7 : slots d'équipement à 8 emplacements, 5 raretés Blanc -> Orange, recettes et sources de composants en [TBD]), un **héros-gouverneur** comme fil conducteur, des **bots PvE** (camps fixes + expéditions), une **alliance** (boss à seuils, score cumulé), un **marché PNJ** (`MerchantService`) mais pas de marché joueur-à-joueur (effort « moyen », 5.10) et la **monétisation en Phase 8** (Kaelite, files de construction supplémentaires, accélérations tolérées, jamais de pay-to-win direct). Le moteur reste OGameX en V1 : formules de production et de coût héritées, rythme des constructions en heures/jours, simulateur `tools/theorycrafting` pour tout coût/rythme. Pas de métiers, pas d'énergie, pas de tour par tour.

### 5.2 Ce qui est transposable (pistes)

1. **Les métiers comme couche artisanale du royaume**, pas du héros. Dans Kalendrath, les ressources de base (Bois/Fer/Mana/Nourriture) sont **produites passivement** par les bâtiments. Une transposition cohérente : les métiers deviennent des **spécialités de la cité** (ex. un bâtiment/atelier par métier, avec un niveau d'artisan, et la forge est le lieu de craft du GDD 5.7). On garde de Rakorn l'idée : **chaque métier a une chaîne matière -> composant -> pièce**, des **niveaux de métier à paliers**, et un **troisième métier verrouillé par un objet d'un autre métier** (interdépendance). Le héros n'a pas à récolter : c'est la **cité** qui produit, le joueur choisit quoi fabriquer.
2. **Le craft à qualité à trois paliers** (Honnête/Royale/Chef-d'oeuvre) et la **maîtrise** pour l'équipement de héros : s'accorde avec les 5 raretés du GDD (la rareté = niveau de l'objet ; la qualité = lot de fabrication d'une même rareté). Garder le gradient de prix visible : la même pièce se vend à des prix différents selon la qualité, ce qui donne un but au perfectionnement. **Pas d'obligation de PvP**, très compatible avec le pilier « coopération ».
3. **Recettes débloquées par des sources variées** : niveau de métier, niveau du héros, objet rare lâché par un camp PvE (« Aux Archives »), et **pièces Signature** achetées par du Renom de métier. Cela répond au [TBD] « source précise des composants rares » du GDD 5.7 : les camps hostiles (5.8A) et expéditions (5.8B) **lâchent les composants/plans**, la cité les transforme. À valider dans le simulateur avant d'écrire des coûts.
4. **Marché joueur-à-joueur à la Rakorn** (le gros morceau) :
   - Affichage **par article regroupé** (prix moyen, à partir de, stock, tendance 7 j), alerte de prix, historique 7 jours : très lisible, à reprendre.
   - **Frais de 5 % payés par l'acheteur**, annonces de durée longue sans frais de mise en vente, **plafond d'offres** par joueur, **fourchette de prix bornée autour d'une référence** (anti-manipulation, anti-dumping) : un bon garde-fou pour un jeu coopératif.
   - **Comptoir marchand PNJ** comme vendeur de base et plancher de prix : c'est exactement `MerchantService` dans OGameX, déjà prévu au GDD ; il stabilise l'économie quand peu de joueurs sont présents (cas d'un serveur de chapitre jeune).
   - **Vente à encaisser** (or en attente au comptoir) comme rendez-vous quotidien, et **« Rapport de l'intendant »** comme écran de retour : très adapté à un jeu où les joueurs sont absents des heures (ce qu'on appelle déjà « boucle courte » dans le GDD).
   - **Serments d'achat** (« acheter 10 unités ») : crée de la demande sans forcer à acheter cher.
   - Liaison **Conquête -> réduction des frais** (frais -> avantage de guilde/alliance) : très cohérent avec « alliance coopérative » et la guerre d'alliances décidée le 30/10.
5. **Commandes d'artisanat entre joueurs** (courtage), avec **réservation d'abord aux artisans du même niveau** avant ouverture à tous, une échéance, une commission : bon outil d'entraide qui cadre bien avec le pilier « accessible/noob-friendly » (les petits artisans ont d'abord les petites commandes). Le serveur à chapitre de Kalendrath produira peu de joueurs au début : prévoir des **commandes PNJ** pour que les artisans aient toujours du travail.
6. **Contrats PNJ quotidiens (« lettres de la Couronne »)** : puits de ressources à consommer par des PNJ narratifs, avec coffres hebdomadaires ; correspond à l'idée de « quête hebdomadaire narrée par un PNJ » du GDD boucle moyenne, aujourd'hui 100 % à construire.
7. **Journal de serments quotidien/hebdomadaire à 9 éléments** qui touche chaque système + prime au complet : un modèle de **tutoriel permanent** et de routine quotidienne ; chaque serment oriente vers un système différent. À transposer en « Ordres du jour » avec des primes en **Kaelite gagnée** (liée au serveur, cf. GDD 9) plutôt qu'en or seul.
8. **Premiers pas** en 9 étapes qui visitent tous les piliers, avec or à prendre : bon modèle pour l'onboarding de Phase 3 (interface).
9. **Hauts faits massifs et Codex** : 918 hauts faits dont un par première fabrication ou par ressource : peu coûteux à générer, grand effet de collection ; le Codex est l'occasion de montrer le lore et le catalogue de contenu (GDD section 6, aujourd'hui [TBD]).
10. **Durabilité douce** (pièce à zéro = inactive, jamais perdue ; victoire sans usure, défaite = quelques points) : respecte le pilier « pas de perte irréversible », et fournit un puits d'or/matières régulier via la Forge (réparer/recycler). Compatible avec « L'échec coûte du temps, jamais une remise à zéro ».
11. **Monétisation « temps contre argent » + cosmétique** : un seul bien premium (Sceau Céleste) qui termine une action en cours, ~0,08-0,10 EUR l'unité, gagnable gratuitement (primes de serments, coffres de classement), plus des cadres/bannières/fonds. Cela confirme la ligne du GDD 9 (accélérations et cosmétique acceptables, pas de pay-to-win direct) et donne un ordre de grandeur de prix à confronter à l'audit de monétisation prévu avant la Phase 8.
12. **Classement hebdomadaire à coffres, saisons mensuelles, titres de saison** : un cycle de « rendez-vous » facile à greffer sur le **score cumulé d'alliance** (GDD 5.9) et les **chapitres de serveur** (étude serveurs en continu), sans PvP.

### 5.3 Ce qui est à éviter ou à adapter

- **L'énergie 400/400 à +1/min comme verrou central** : dans Kalendrath, l'énergie d'OGameX est **supprimée** comme ressource (remplacée par la Nourriture) et le rythme repose sur des files de construction et des missions en heures. Une énergie type « mobile » entrerait en conflit avec le rythme hérité et avec la boucle « bâtiments/recherches » ; si l'on veut un équivalent, il vaut mieux borner par la **file/les emplacements** (déjà dans la piste « ouvriers supplémentaires » du GDD 9) que créer une 5e ressource. À trancher avec le simulateur.
- **Le sac de 15 emplacements** : forte friction (butin perdu dès le 2e combat) ; si on reprend un sac, ne **jamais** faire perdre un butin non récupéré (garder le butin en attente) et vendre les emplacements en or de jeu, pas en argent réel direct.
- **Le héros qui récolte lui-même** : en V1 Kalendrath, ce serait écrasant pour le « héros comme fil conducteur ». Réserver le héros au combat, à la mission et aux conseillers ; la production et l'artisanat appartiennent à la cité.
- **Les centaines de hauts faits / 918 micro-objectifs** : lourds à écrire en bilingue (obligation FR + EN avant l'alpha, CLAUDE.md) ; ne viser que quelques dizaines de hauts faits d'amorce.
- **Les files très courtes (secondes/minutes)** : bien pour une session mobile, mais incompatibles avec le rythme OGameX hérité ; Kalendrath doit garder ses minuteurs en heures. L'idée à garder n'est pas la durée mais la **structure** (lot, quantité, accélération).
- **Le palier 3e métier verrouillé par un autre métier** : excellent sur un serveur avec beaucoup de joueurs, mais risqué sur un serveur de chapitre jeune : prévoir une alternative PNJ (Comptoir) pour ne pas bloquer le débutant (pilier accessibilité).
- **Marché sans limite** : le « Mon niveau » et le filtre par qualité sont indispensables ; sans eux, 348 articles sont illisibles. À copier, pas à simplifier.
- **Spéculation** (hausses de +5890 % constatées sur un article rare) : prévoir la fourchette bornée (plancher/plafond) dès le départ ; le marché PNJ à taux fixes de `MerchantService` doit servir de garde-fou.
- **Prime « Sceau Céleste » dans le Journal** : conçue pour donner un goût du premium ; à confronter à la limite « +30 % d'avance payante » (GDD 4.2).

### 5.4 Articulation avec les piliers de Kalendrath

- **PvE-first, PvP consenti** : Rakorn n'a aucun PvP direct entre joueurs (compétition via classement et Conquête de territoires par guildes, PvE+PvP de guilde ; je n'ai pas détaillé la Conquête). Les métiers/craft/marché sont **neutres vis-à-vis du pilier** : ils s'ajoutent sans exposer un joueur à un autre, ce qui est un point fort.
- **Accessible / noob-friendly** : réservation des commandes aux artisans de leur niveau, durabilité sans perte, victoire sans usure, Premiers pas guidés, prix assistés à la vente, estimation de chance de victoire et butin avec probabilités. Les piliers se renforcent.
- **Coopération** : commandes, contrats de la Couronne, réserve partagée de gisements, frais réduits par une conquête de guilde. À relier aux **boss à seuils** (cf. « Fléaux du Royaume » de Rakorn, 5 boss que tout le royaume affronte ensemble, news du 13 nov.) du GDD 5.9, et au **score cumulé** (le classement par livraisons est un score cumulé hebdomadaire).
- **Héros** : le héros de Kalendrath peut **porter** les pièces fabriquées (8 slots, GDD 5.7), les composants rares tombent des **camps PvE**/expéditions, et les Signature (Renom) servent d'objectifs de long terme et de lien avec le prestige. Ne pas mélanger l'« artisan » et le « héros ».
- **Prestige d'empire** : l'équivalent chez Rakorn est la **Réputation d'artisan** (par commande/contrat/livraison, plafonnée par saison et par semaine). Elle est cousine du prestige (jauge unique, gain pondéré par la difficulté de la commande : « Simple / Intermédiaire / Difficile / Décret »). Piste : un **prestige d'artisanat** distinct ou une composante du prestige.
- **Serveurs en continu / chapitres** : saisons mensuelles de Rakorn (titres de saison permanents) ≈ chapitre de Kalendrath ; les titres/cosmétiques de saison restent liés au compte (cf. Kaelite achetée vs gagnée).
- **Monétisation** (Phase 8) : Rakorn donne un exemple vivant d'« accélération + cosmétiques » acceptable ; à comparer à Last War/Call of Dragons dans `references-jeux-du-genre.md`.

### 5.5 Ordre de grandeur pour le simulateur (à passer par `tools/theorycrafting` avant tout chiffrage)

- Durée de fabrication d'un lot de pièces : de 25 s (matière de base niv. 2) à 2 h (pièce niv. 60). Ratio ~290x entre le bas et le haut.
- Récompense de journal : 305 or/jour pour 9 serments, 1 520 or/semaine pour la version semaine (~1,0 serment/jour pour l'or hebdo) ; prime des neuf : 1 Sceau + 100 or/jour.
- Frais : 5 % acheteur. Banque : 5 000 + 13 750 or. Niveaux de métier : 60 ; paliers 1-7-14-21-29-37-45-53-60.
- Ces chiffres sont des observations, pas des recommandations ; en V1 les formules OGameX restent héritées.

## 6. Limites de l'audit

- Je n'ai **pas** rejoint de guilde, posté de commande, acheté ou vendu, ni fabriqué : les détails de ces flux (coût réel en énergie d'un lot, calcul exact de la qualité, effet réel de la Maîtrise, rendement des Sceaux) restent à confirmer en jouant.
- La Conquête (territoires, Influence), les Fléaux du Royaume, le Sertissage (niv. 40) et l'Assemblage de la Forge ne sont pas détaillés.
- Les 120 créatures et les 185 quêtes sont des chiffres lus à l'écran (185 quêtes) ou déduits (15 x 8 = 120).
- Chiffres du compte de Gregory : le contenu est tronqué à ~7 000 caractères par écran quand la page est longue ; les listes complètes (348 articles, 918 hauts faits) ne sont pas reproduites ici.

## 7. Index des captures (`docs/archives/audit-rakorn-2026-11-15/`)

00 accueil/royaume ; 01 métiers (récolte) ; 02 métiers (artisanat, Bloc de pierre) ; 03 métiers (Forgeron, Épée simple, maîtrise et qualité) ; 04 choix de métier et Charte ; 05 marché (acheter) ; 06 marché (vendre) ; 07 forge ; 08 inventaire ; 09 banque ; 10 contrats ; 11 commandes ; 12 campagne ; 13 compétences ; 14 conquête ; 15 guilde ; 16 hauts faits ; 17 codex ; 18 quêtes ; 19-21 combat (avant, en cours, victoire) ; 22 boutique (Sceaux) ; 23 journal du jour ; 24 serments de la semaine ; 25 rapport de l'intendant ; 26 héritage ; 27 classement ; 28 collections et titres ; 29 proclamations ; 30 Premiers pas ; 31 conquête (territoire).
