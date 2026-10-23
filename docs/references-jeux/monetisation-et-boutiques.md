# Monétisation et boutiques du genre 4X / city builder persistant

*Audit thématique ouvert le 2026-10-23 (Phase 8 de la feuille de route, préparée en avance). Il complète [references-jeux-du-genre.md](../references-jeux-du-genre.md). Les décisions qui en sortent vont dans le [GDD](../game-design-document.md), pas ici.*

**Fiabilité.** Chaque chiffre porte une mention : *vérifié* (source officielle ou plusieurs sources concordantes), *probable* (une source sérieuse : presse spécialisée citant Sensor Tower ou AppMagic, page d'aide officielle), *incertain* (revendeur, blog promotionnel, forum, chiffre ancien). Les données de revenus des applis (Sensor Tower, AppMagic, Appfigures) sont des **estimations** de cabinets d'analyse, pas des chiffres publiés par les éditeurs.

**Limite de cette recherche.** Le quota de recherches web de la session a été épuisé en cours de route. Plusieurs points restent donc **non trouvés** : prix exacts des files de construction de Last War et de Call of Dragons, grille VIP de Rise of Kingdoms, prix réels des gachas de héros, revenus de Torn, Fallen London, Path of Exile et Illyriad. Ils sont signalés comme tels. Une seconde passe pourra les compléter.

## 1. Résumé en 5 lignes

1. Les leaders du genre (Last War, Whiteout Survival, Rise of Kingdoms) gagnent des milliards **parce qu'ils n'ont pas de plafond** : une poignée de payeurs, souvent moins de 0,2 % des joueurs, fait près de la moitié du chiffre d'affaires, et un VIP maximal se chiffre en dizaines de milliers de dollars.
2. Les jeux navigateur qui durent (Travian, Guerre tribale, OGame) vivent sur un modèle plus modeste : **abonnement de confort à ~5 € par mois** plus une monnaie premium. InnoGames en a tiré 2 milliards d'euros en 18 ans.
3. Les files de construction se vendent partout, mais sous des formes différentes : achat définitif à prix croissant (Clash of Clans : 250 / 500 / 1 000 / 2 000 gemmes), achat pour la durée d'un serveur (Travian Kingdoms : 50 / 75 / 100 or), déblocage par palier VIP (Rise of Kingdoms : 2e file au VIP 6), ou abonnement (Guerre tribale).
4. Le plafond de +30 % de Kalendrath coupe la queue des gros payeurs, celle qui porte la moitié du revenu ailleurs. Il est **viable pour un projet solo à petite échelle**, à condition d'avoir un revenu **récurrent** (abonnement ou pass) et non des achats uniques : les ouvriers à 5 € et 20 € ne rapportent qu'une fois par joueur.
5. Ordre de grandeur à viser : **0,15 à 1 € par joueur actif mensuel**, soit ~5 000 joueurs actifs pour dégager environ 2 000 € nets par mois dans le scénario central. C'est 20 à 60 fois moins par joueur que les 4X mobiles non plafonnés, ce qui interdit l'acquisition payante : la croissance devra venir de la communauté.

## 2. Ce que vendent les jeux du genre

### 2.1 Grille par jeu

| Jeu | Monnaie premium | Abonnement / pass | Files de construction | Prix observés | Plafond d'avance |
|---|---|---|---|---|---|
| **OGame** (Gameforge, navigateur) | Antimatière (gagnable en expédition, ou achetée) | Officiers à la semaine ou au trimestre ; Commandant (outils d'interface et automatisation) | Via le Commandant (outil d'interface) | App Store Mexique : 9 000 AM pour 19… 1 000 000 AM pour 999 (devise ambiguë, cf. 2.3) ; offres « +30 % » et « +40 % » d'AM bonus *(probable)*. Technocrate : 10 000 AM la semaine, 100 000 AM les 3 mois *(incertain, page ancienne)* | Aucun : l'AM achète aussi des ressources via le marchand |
| **Travian Kingdoms** (navigateur, serveurs de 5-6 mois) | Or (acheté ; aussi échangeable contre l'argent gagné en jeu, ou gagné au jeu de cartes) | Travian Plus : 10 or pour 5 jours (3 jours sur serveur rapide), ou acheté pour tout le serveur, prix ajusté à la durée restante *(probable)* | 3 emplacements de file supplémentaires à **50, 75 et 100 or**, actifs pour tout le serveur et tous les villages *(probable)* | App Store US : 8 paquets d'or de 1,99 $ à 79,99 $ *(probable)* ; bonus +25 % de production : 20 or / 5 jours *(probable)* | Aucun chiffré ; Travian annonce que Travian Plus « ne donne aucun avantage de combat » *(probable)* |
| **Guerre tribale / Tribal Wars** (InnoGames, navigateur) | Points premium | **Compte premium : 4,99 $ / 30 jours** (5,99 € en Espagne ; 1,99 € les 7 jours) | Sans premium, file limitée à 2 ; avec premium, file allongée (au-delà de 5, surcoût) *(incertain, script tiers de 2020)* | 80 PP 2,99 $ ; 200 PP 5,99 $ ; 600 PP 9,99 $ ; 1 500 PP 19,99 $ ; 8 000 PP 79,99 $ ; +20 % de production d'une ressource 0,99 $ / 7 jours ; assistant de pillage 0,99 $ / 30 jours *(probable, relevé App Store août 2026)* | Aucun |
| **Clash of Clans** (Supercell, mobile, référence hors 4X) | Gemmes (gagnées en jeu : succès, obstacles) | Gold Pass *(prix non trouvé)* | 5 huttes d'ouvrier : 1re gratuite, puis **250, 500, 1 000, 2 000 gemmes** (3 750 au total) ; un 6e ouvrier se gagne en jeu (O.T.T.O.) *(vérifié, plusieurs guides)* | Prix des gemmes en $ non relus dans cette recherche | Les 5 ouvriers sont atteignables **sans payer avant l'Hôtel de ville 7** *(probable)* |
| **Rise of Kingdoms** (Lilith, mobile) | Gemmes, 1 gemme = 1 point VIP | VIP par paliers | 2e file : objet temporaire (48 h), ou **définitive au VIP 6**, « atteignable vite sans dépenser » ; ancien prix de 150 gemmes pour 2 jours *(incertain)* | Grille VIP non trouvée | Aucun |
| **Last War: Survival** (FunFly, mobile) | Diamants, lingots d'or | Pack d'accueil 0,99 $, pack hebdomadaire 4,99 $, pack mensuel 19,99 $ *(incertain, guide communautaire)* ; « Super Monthly Pass » à 24,99 $ *(incertain, revendeur)* | Non trouvé | VIP 8 ≈ 500 $, VIP 12 ≈ 5 000 $, VIP 16 ≈ 25 000 $, **VIP 18 entre 15 000 et 75 000 $** selon le calcul *(incertain : source promotionnelle et incohérente avec elle-même)* ; VIP 18 donne +12,5 % de stats de héros | Aucun |
| **Torn** (navigateur, créé par un développeur seul) | Points | **Donator Pack** : 31 jours de statut donateur + 60 points ; abonnements mensuel et annuel (annonce d'août 2024 : 2 recharges par pack, 3 par mois d'abonnement, 36 par an) *(probable)* | Sans objet | ~5 $ le pack de base *(incertain, script tiers)* ; achats en lots de 25 puis 50 | Les packs s'échangent contre la monnaie de jeu : un gratuit peut en acheter à un payeur |
| **Fallen London** (Failbetter, navigateur narratif) | Fate | Abonnement : double la réserve d'actions (20 → 40) et donne des histoires exclusives mensuelles *(vérifié)* | Sans objet | Prix non trouvé | Le contenu payant est surtout narratif |
| **Path of Exile** (GGG, action-RPG, référence « fair ») | Points | Packs de soutien | Sans objet | Cosmétiques, emplacements de coffre, ligues privées ; 2,2 M$ de financement participatif pendant la bêta *(vérifié)* | **Cosmétique et confort uniquement**, revendiqué comme « micro-transactions éthiques » |

### 2.2 Types d'offres : ce qu'on a trouvé, ce qu'on n'a pas trouvé

- **VIP à paliers cumulés** : Rise of Kingdoms et Last War. Chaque gemme achetée fait monter un niveau VIP permanent, avec des avantages de jeu (2e file, automatisations, stats de héros). C'est le principal moteur de dépense sans plafond. *(probable)*
- **Abonnement de confort mensuel** : Travian Plus, compte premium de Guerre tribale, donateur de Torn, abonnement de Fallen London, officiers d'OGame. Prix observé : **5 à 6 € par mois**. Les avantages sont du confort (files, listes, interface) plus un petit bonus de production. *(probable)*
- **Pass ou carte mensuelle à 20-25 $** : Last War. Il donne des ressources et des accélérateurs chaque jour pendant 30 jours. *(incertain)*
- **Pack de premier achat à 0,99 $** : Last War. *(incertain)* Travian Kingdoms propose un « pack de démarrage » à chaque début de serveur. *(probable)*
- **Bonus de monnaie limité** : OGame affiche des paquets d'antimatière « +30 % » et « +40 % ». *(probable)*
- **Achat valable pour la durée d'un serveur** : Travian (Plus et files pour toute la manche, prix ajusté à la durée restante ; le temps non utilisé redevient de l'or en fin de serveur). *(probable)* C'est une forme de **plafond naturel** : on n'achète la file qu'une fois par manche.
- **Packs déclenchés par le niveau, cadeaux d'alliance, gacha de héros** : présents dans Last War, Call of Dragons et Rise of Kingdoms d'après le document de référence existant (recherche Gemini, *incertain*). **Prix et taux de gacha non trouvés** dans cette recherche.
- **Cosmétiques purs** : Path of Exile en vit, et Last War les donne au VIP 18 (skin de base). Pour un 4X navigateur, **aucun exemple chiffré trouvé** d'un modèle entièrement cosmétique.

### 2.3 Monnaies virtuelles et conversion

| Jeu | Conversion relevée | Fiabilité |
|---|---|---|
| OGame | 9 000 AM pour 19 « $ » et 1 M AM pour 999 « $ » sur l'App Store mexicain : la devise est **ambiguë** (pesos selon une lecture, dollars selon une autre), donc pas de prix en euros fiable ; seul le rapport est sûr, ~2,1 ¢ puis ~1 ¢ par 10 AM, soit une dégressivité d'environ ×2 | incertain |
| Guerre tribale | 80 PP pour 2,99 $ (3,7 ¢/PP) → 8 000 PP pour 79,99 $ (1 ¢/PP) : **le gros paquet coûte 3,7 fois moins cher au point** | probable |
| Last War (VIP) | 1 point VIP ≈ 0,0015 $ en achat direct | incertain |
| Torn | 5 $ ≈ 23,5 M de monnaie de jeu (taux de base d'un Donator Pack) | incertain |
| Rise of Kingdoms | 1 gemme = 1 point VIP | probable |

La dégressivité est la règle partout : plus on achète, moins l'unité coûte. C'est ce qui pousse le gros payeur vers les gros paquets.

## 3. Petit payeur contre gros payeur

### 3.1 Qui paie, et combien

| Donnée | Valeur | Source | Fiabilité |
|---|---|---|---|
| Part des joueurs qui paient dans le mois, tous genres F2P | **1,9 %** (fév. 2016), contre 1,5 % en janv. 2014 | Swrve, 20 M de joueurs, 40 jeux | probable (ancien) |
| Part du revenu faite par **0,19 % des joueurs** | **48 %** | Swrve 2016 | probable (ancien) |
| Rapport précédent | 0,23 % des joueurs font 60 % du revenu | Swrve 2015 | probable (ancien) |
| Payeurs qui n'achètent qu'une fois dans le mois | 64 % ; 6,5 % achètent 5 fois ou plus | Swrve 2016 | probable |
| Dépense mensuelle moyenne d'un payeur (ARPPU) | 24,33 $ | Swrve 2016 (relayé par la presse) | incertain : chiffre non retrouvé dans l'article Adweek relu |
| Taux de conversion des jeux de stratégie | **2 à 3 %**, parmi les plus élevés | GameAnalytics, S1 2019 | probable (ancien) |
| ARPPU stratégie / action / RPG | 27 à 31 $ (période non précisée) | GameAnalytics 2019 | incertain |
| Revenu par joueur actif et par jour (ARPDAU) | médiane tous genres 0,02 $ ; top 15 % : 0,10 à 0,14 $ | GameAnalytics 2019 | probable |
| ARPDAU 4X / stratégie | 0,10 à 0,35 $ | Juego Studios 2026, sans source précise | incertain |
| Poids de la stratégie | 21,4 % du revenu des achats intégrés mobiles pour ~4 % des téléchargements (2024) | Segwise, cité par Juego Studios | incertain |
| Navigateur, ARPPU historique | Bigpoint ≈ 10 $ ; Puzzle Pirates ≈ 50 $ | GamesBrief 2011 | incertain (ancien) |
| Répartition type des payeurs | « baleines » 10 % des payeurs (ARPPU 20 $), « dauphins » 40 % (5 $), « vairons » 50 % (1 $) | GamesBrief 2011, modèle indicatif | incertain |
| « Baleines » | 1 à 2 % des joueurs, 50 à 70 % du revenu | blog Udonis, sans source | incertain |

**Contradiction à signaler.** Un article de 2024 affirme que les baleines « comptent moins » parce que les petits payeurs sont plus nombreux ; une analyse GameAnalytics relayée par Udonis montre au contraire que la part des baleines monte jusqu'à 81 % au 10e mois dans les jeux conçus pour elles. Les deux peuvent être vrais selon la conception du jeu : **c'est la boutique qui fabrique la concentration**.

### 3.2 Ce que dépense un gros payeur

- **Game of War** : Kevin Lee Co, comptable, a détourné ~4,8 M$ chez son employeur et en a dépensé **~1 M$ dans Game of War**. Condamné à 10 ans de prison. *(vérifié, nombreuses sources de presse et ministère de la Justice américain)*
- **Last War** : un VIP 18 coûterait de 15 000 à 75 000 $ selon la façon d'acheter. *(incertain)*
- **Rise of Kingdoms** : revenu par téléchargement de **142 $ en Corée du Sud** et ~62-63 $ aux États-Unis et en Chine (sur toute la vie du jeu). *(probable, Sensor Tower via Pocket Gamer)*
- Ordre de grandeur général : les « super-baleines » (0,1 à 1 % des joueurs) dépensent 10 000 à 100 000 $ et plus sur plusieurs années. *(incertain, glossaire sans source)*

### 3.3 Ce que ça rapporte au sommet

| Jeu | Revenu | Source | Fiabilité |
|---|---|---|---|
| Last War: Survival | **N° 1 mondial des jeux mobiles en 2025** ; ~180 M$ en septembre 2025 ; ~3,5 Md$ sur sa vie | Sensor Tower (via TechNode, WN Hub) ; AppMagic (via Udonis) | probable |
| Whiteout Survival | **3 Md$ en moins de 2,5 ans** (juillet 2025) ; record à 205,9 M$ en mars 2025 ; États-Unis 28 % | AppMagic via PocketGamer.biz | probable |
| Whiteout Survival, début 2026 | « plus de 70 M$ par mois », en net recul sur le pic | Appfigures | probable |
| Kingshot (même éditeur) | 500 M$ en moins d'un an | Appfigures | probable |
| Rise of Kingdoms | > 3,5 Md$ (juin 2024) | Sensor Tower via Pocket Gamer | probable |
| Call of Dragons | Pas de total trouvé ; pics de 3 à 7,7 M$ selon les périmètres au T2 2024, **chiffres contradictoires** d'une page Sensor Tower à l'autre | Sensor Tower | incertain |
| InnoGames (Forge of Empires, Guerre tribale, Grepolis, Elvenar) | **2 Md€ cumulés en 18 ans** (juillet 2025) ; Forge of Empires > 1 Md€ ; Guerre tribale, Grepolis, Elvenar > 200 M€ chacun ; 99 % du revenu en achats intégrés | Communiqué InnoGames | vérifié |
| InnoGames, année 2020 | 220 M€ | Wikipédia (dernier communiqué financier) | probable |
| Torn | Pas de chiffre officiel ; un article de presse titrait qu'un jeune de 21 ans « gagne 1 M£ avec un jeu en ligne » ; plus d'un million d'inscrits en 2008 | Wikipédia | incertain |

**Lecture.** Le modèle « abonnement de confort + monnaie premium » des jeux navigateur rapporte ~10 à 20 fois moins par an que le modèle VIP sans plafond des 4X mobiles (InnoGames : ~110 M€ par an en moyenne sur 5 jeux, contre ~1,5 à 2 Md$ par an pour Last War seul). Mais il fait vivre des jeux depuis 15 à 20 ans (Guerre tribale depuis 2003, Fallen London depuis 2009, Torn depuis 2004).

## 4. Les modèles « fair » ou plafonnés

| Jeu | Forme | Résultat commercial | Fiabilité |
|---|---|---|---|
| Path of Exile | Cosmétique et confort uniquement | Assez solide pour tenir depuis 2013 et financer une suite ; chiffres de revenu non trouvés | probable |
| Fallen London | Abonnement qui double les actions + contenu narratif | En ligne sans interruption depuis 2009 ; les fondateurs ne se sont salariés qu'au bout de trois ans | vérifié |
| Torn | Pack donateur mensuel, échangeable contre la monnaie de jeu | Lancé par un développeur seul en 2004, toujours actif ; revenu non publié | probable |
| Guerre tribale | Abonnement premium ~5 € / mois + points | > 200 M€ cumulés depuis 2003 | vérifié |
| Travian Kingdoms | Plus et files achetés pour un serveur de 5-6 mois ; « aucun avantage de combat » revendiqué pour Plus | Revenu non trouvé | probable |
| Clash of Clans | Ouvriers payants mais atteignables gratuitement tôt | Hors genre (mobile, pas de serveur persistant) ; revenu non relu ici | — |

**Aucun 4X persistant avec un plafond d'avance payante chiffré et assumé n'a été trouvé.** Les jeux « fair » cités plafonnent par la nature de ce qu'ils vendent (cosmétique, confort, durée d'un serveur), pas par un pourcentage annoncé. Kalendrath serait, à notre connaissance, une exception : c'est un argument de communication, mais il n'existe pas de précédent pour en mesurer l'effet commercial.

## 5. Confrontation aux décisions de Gregory

### 5.1 Le plafond de +30 %

- **Ce qu'il coûte.** Ailleurs, ~0,2 % des joueurs font ~50 % du revenu (Swrve). Un plafond d'avance ne coupe pas directement la dépense, mais il retire au gros payeur sa raison de dépenser au-delà du plafond. Si la boutique ne vend plus rien d'utile une fois le plafond atteint, **on peut perdre jusqu'à la moitié du revenu qu'aurait un jeu équivalent sans plafond**. C'est une estimation par raisonnement, pas une mesure.
- **Ce qu'il peut rapporter.** Un jeu perçu comme honnête garde mieux ses joueurs gratuits, et les joueurs gratuits font la communauté, qui fait la croissance sans publicité. Aucune donnée chiffrée trouvée pour le prouver dans le genre ; les longévités de Guerre tribale, Torn et Fallen London vont dans ce sens.
- **Conséquence pratique.** Le plafond définit **un budget mensuel maximal utile** : ce que coûte « toute la boutique » sur un mois. C'est lui qui fixe l'ARPPU maximal. Il faut le chiffrer dans le simulateur : si toute la boutique coûte 15 € par mois, aucun payeur « utile » ne dépassera 15 € par mois, et seuls les cosmétiques peuvent aller au-delà.

### 5.2 Les packs limités

Conforme à la pratique (offres « +30 % / +40 % » d'OGame, pack de démarrage de Travian). La limite en quantité est ce qui rend le plafond tenable. Point de vigilance : la dégressivité des gros paquets (×3,7 sur Guerre tribale) est le levier classique pour pousser à acheter gros ; avec un plafond, elle a moins de sens.

### 5.3 Les ouvriers à ~5 € et ~20 €

| Jeu | 2e file | 3e file et suivantes | Forme |
|---|---|---|---|
| Clash of Clans | 250 gemmes | 500, 1 000, 2 000 | Définitif, gagnable gratuitement |
| Travian Kingdoms | 50 or | 75, 100 | Pour la durée du serveur (5-6 mois) |
| Rise of Kingdoms | VIP 6 (ou objet de 48 h) | — | Définitif via VIP |
| Guerre tribale | Compte premium (~5 € / mois) | — | Abonnement |
| **Kalendrath (décidé)** | **~5 €, facile en gratuit** | **~20 €** | Définitif, monnaie virtuelle |

- La progression du prix (×4 de la 2e à la 3e) est proche de Clash of Clans (×2 à chaque hutte) et de Travian (×1,5). **Cohérent.**
- La 2e file facile à obtenir en gratuit est **exactement le choix de Clash of Clans et de Rise of Kingdoms**. Cohérent.
- **Mais c'est un achat unique sur un serveur de 2 ans.** Travian revend ses files à chaque serveur (tous les 5-6 mois) ; Guerre tribale les loue chaque mois. Kalendrath les vend une fois pour 2 ans. Exemple : si 30 % des joueurs achètent la 2e file et 10 % la 3e, cela fait ~3,50 € par joueur **pour toute sa vie**. Les ouvriers ne sont pas un modèle économique ; ils doivent être vus comme une porte d'entrée vers le premier achat.
- Si un format à saisons est retenu, les ouvriers peuvent rester définitifs (meilleure image) ; le revenu récurrent doit venir d'ailleurs.

### 5.4 Quel revenu par joueur actif attendre ?

Hypothèses (à défaut de données pour un 4X plafonné) : taux de payeurs mensuels entre 2 % (Swrve, tous genres) et 6 % (hypothèse haute pour un modèle à abonnement, **non sourcée**) ; ARPPU borné par le plafond, entre 8 et 18 € par mois (sous les ~24 $ de Swrve, qui inclut les baleines).

| Scénario | Payeurs / mois | ARPPU (TTC) | Revenu par joueur actif mensuel (TTC) | Joueurs actifs mensuels pour 2 500 € TTC / mois |
|---|---|---|---|---|
| Prudent | 2 % | 8 € | 0,16 € | ~15 600 |
| Central | 4 % | 12 € | 0,48 € | ~5 200 |
| Haut | 6 % | 18 € | 1,08 € | ~2 300 |

Du prix TTC payé au revenu réel : retirer la TVA (20 % en France), puis les frais de paiement (~3 % sur le web), soit **~81 % du prix TTC** sur le web. Sur mobile, la commission d'Apple et de Google est de **15 % pour les petits éditeurs** (programmes « small business », à revérifier au moment de publier), soit **~71 % du prix TTC**. 2 500 € TTC par mois donnent donc ~2 000 € sur le web, avant hébergement, cotisations sociales et impôts.

À titre de comparaison, Rise of Kingdoms touche ~62 $ par téléchargement aux États-Unis sur la vie du jeu. Kalendrath, au scénario central et pour un joueur qui reste un an, toucherait ~6 € par joueur retenu, et bien moins par téléchargement. **L'acquisition payante (publicité) est donc hors de portée** : les 4X mobiles la financent par leurs gros payeurs.

### 5.5 Verdict

**Viable pour un projet solo, pas pour un studio.** Un serveur de 5 000 joueurs actifs mensuels avec un abonnement à ~5 € suffit à faire vivre une personne et à payer l'hébergement. Trois conditions : un **revenu récurrent** (abonnement ou pass de saison), une **croissance organique** (Discord, bouche-à-oreille, argument « pas de pay-to-win »), et une **base de coûts très faible** (hébergement, aucun salarié). Le plafond de +30 % n'est pas en contradiction avec ce modèle, mais il exclut tout espoir de revenus du niveau des 4X mobiles.

## 6. Leçons pour Kalendrath

1. **Le cœur du revenu doit être un abonnement de confort mensuel, pas les ouvriers.** C'est le modèle de tous les jeux navigateur qui durent : Travian Plus, compte premium de Guerre tribale, donateur de Torn, abonnement de Fallen London, tous autour de 5 € par mois. → *Relié au plafond de +30 % : l'abonnement doit être compté dans le plafond, et doit en représenter la plus grosse part. Proposition à faire passer par le simulateur : un abonnement de ~5 €/mois (confort, file d'attente, petit bonus) et un pass de saison à ~10 €, sans autre avantage achetable au-delà.*
2. **Les ouvriers à 5 € et 20 € sont bien calibrés, mais rapportent une seule fois.** Leur prix et leur progression ressemblent à Clash of Clans et Travian. → *À garder comme « premier achat » : c'est l'offre qui convertit un joueur gratuit en payeur. Ne pas compter dessus dans le budget.*
3. **Le plafond doit se traduire en un budget mensuel affiché.** Personne dans le genre ne l'a fait ; c'est un argument commercial à condition d'être concret. → *Calculer dans le simulateur le coût de « toute la boutique » par mois et par saison, et vérifier qu'il donne bien +30 % au plus. Un chiffre du type « tout acheter coûte X € par mois, et ne donne jamais plus de 30 % d'avance » peut aller sur le site vitrine.*
4. **Au-delà du plafond, seule la vente de cosmétiques permet aux gros payeurs de dépenser.** Path of Exile prouve que des joueurs paient pour du cosmétique ; Last War donne un skin au VIP 18. → *Prévoir dès la Phase 3 des emplacements cosmétiques (blason, skin de cité, cadre de héros) : c'est le seul revenu non plafonné compatible avec la promesse.*
5. **Le format de serveur change l'économie de la boutique.** Travian revend files et Plus à chaque serveur de 5-6 mois ; un serveur unique de 2 ans vend ses achats définitifs une seule fois. → *Relié à la question ouverte du format : le format hybride avec saisons de 8 à 12 semaines permet un pass par saison, donc un revenu récurrent sans relever le plafond. C'est un argument économique en sa faveur, à mettre dans le sondage.*
6. **Une monnaie premium échangeable entre joueurs aide le joueur gratuit.** Dans Torn, un gratuit peut acheter un pack donateur avec la monnaie de jeu ; dans Travian, l'argent gagné en jeu s'échange contre de l'or. → *Piste : que le gratuit actif puisse obtenir l'abonnement par le jeu (marché ou exploits PvE), ce qui rend le plafond encore plus crédible et entretient le marché.*

## 7. Sources

**Données de marché et de payeurs**
- https://www.adweek.com/performance-marketing/report-0-19-of-players-account-for-48-of-free-to-play-game-revenue/ — Swrve 2016, 0,19 % / 48 %, 1,9 % de payeurs — *probable*
- https://gamesbeat.com/in-mobile-games-60-of-revenues-come-from-0-23-of-players/ — Swrve 2015, 0,23 % / 60 % — *probable*
- https://appdevelopermagazine.com/mobile-gaming-industry-benchmarks-offer-fresh-look-on-industry/ — GameAnalytics S1 2019 — *probable*
- https://wnhub.io/news/analytics/item-2261 — GameAnalytics 2019 : ARPDAU, ARPPU, conversion par genre — *probable*
- https://www.juegostudio.com/blog/arpdau-benchmarks-by-game-genre — ARPDAU 4X 0,10-0,35 $, Segwise 21,4 % — *incertain*
- https://www.gamesbrief.com/2011/11/arppu-in-freemium-games/ — ARPPU historiques, répartition des payeurs — *incertain (2011)*
- https://blog.udonis.co/mobile-marketing/mobile-games/mobile-games-whales — baleines 1-2 % / 50-70 % — *incertain*
- https://www.inc.com/john-koetsier/mobile-gaming-entrepreneurs-paying-players-up-33-whales-now-less-important.html — baleines moins centrales (non relu, page bloquée) — *incertain*
- https://mwm.ai/glossary/arppu — ARPPU modélisé du top 1 % — *incertain*

**Revenus des jeux**
- https://technode.com/2025/10/30/funflys-last-war-tops-global-mobile-game-revenue-chart-in-september-with-180-million-in-earnings/ — Last War, sept. 2025 — *probable*
- https://wnhub.io/news/analytics/item-49875 — classement 2025 Sensor Tower — *probable*
- https://www.blog.udonis.co/statistics/last-war-survival — Last War 3,5 Md$ (AppMagic) — *incertain*
- https://www.pocketgamer.biz/whiteout-survival-hits-3bn-in-player-spending-in-under-25-years/ — Whiteout Survival — *probable*
- https://appfigures.com/resources/insights/kingshot-500m-revenue-century-games — Kingshot, Whiteout début 2026 — *probable*
- https://pocketgamer.com/rise-of-kingdoms/3-5bn-milestone — Rise of Kingdoms, revenu par téléchargement — *probable*
- https://sensortower.com/blog/2024-q2-ios-top-5-dragon%20games-revenue-hu-6023e501241bc16eb8e453a8 — Call of Dragons T2 2024 — *incertain (contradictoire)*
- https://newsroom.innogames.com/strong-evergreen-ips-enable-innogames-to-reach-eur-2-billion-in-lifetime-revenues — InnoGames 2 Md€ — *vérifié*
- https://en.wikipedia.org/wiki/InnoGames — InnoGames 2020 — *probable*
- https://www.theregister.co.uk/2016/12/12/game_of_war_million_bucks/ et https://uk.news.yahoo.com/man-embezzled-4-8-million-111815330.html — Game of War, 1 M$ — *vérifié*

**Boutiques et prix**
- https://apps.apple.com/mx/app/ogame/id1593395507 — prix de l'antimatière — *probable*
- https://en.wikipedia.org/wiki/OGame — antimatière, officiers, Commandant — *probable*
- https://www.collegesidekick.com/study-docs/16209845 — coût du Technocrate — *incertain*
- https://support.kingdoms.com/en/articles/164-travian-plus — Travian Plus — *probable*
- https://support.kingdoms.com/en/articles/60-building-queue — files de Travian Kingdoms — *probable*
- https://support.kingdoms.com/en/support/solutions/articles/7000078806-travian-plus-a-bonusy-produkce — 50 / 75 / 100 or, bonus de production (lu via résumé de recherche, page indisponible ensuite) — *probable*
- https://support.kingdoms.com/en/articles/162-gold-in-travian-kingdoms — or, échange argent/or — *probable*
- https://apps.apple.com/us/app/-/id977102758 — paquets d'or Travian Kingdoms — *probable*
- https://apppricinglab.com/iap/apple/435365767 — prix Guerre tribale (US) — *probable*
- https://apps.apple.com/es/app/guerras-tribales-tribal-wars/id435365767 — prix Guerre tribale (euros) — *probable*
- https://support.innogames.com/kb/TribalWars/en_DK/1296 — avantages premium — *probable*
- https://greasyfork.org/scripts/387424-auto-builder — file de 2 sans premium — *incertain*
- https://www.highgroundgaming.com/clash-of-clans-best-way-spend-gems/ — huttes d'ouvrier — *vérifié (concordant avec Supercheats)*
- https://www.supercheats.com/clash-of-clans/walkthrough/builders-and-builders-huts — huttes d'ouvrier — *probable*
- https://itwire.com/games/the-ultimate-beginners-guide-to-clash-of-clans-in-2026 — 5 ouvriers avant HdV 7 — *probable*
- https://www.appgamer.com/rise-of-kingdoms/strategy-guide/unlocking-the-2nd-builder-queue — 2e file au VIP 6 — *probable*
- https://riseofkingdoms.fandom.com/wiki/Frequently_Asked_Questions — 2e file, VIP 6 — *probable*
- https://www.appgamer.com/rise-of-kingdoms/answers/30505-does-the-game-only-allows-2-builder — 150 gemmes / 2 jours — *incertain*
- https://root-nation.com/en/games-en/games-articles-en/en-last-war-survival-pack-guide-0-99-vs-4-99-vs-19-99-value/ — packs Last War — *incertain*
- https://www.topuplive.com/news/last-war-survival-monthly-pass.html — Super Monthly Pass — *incertain (revendeur)*
- https://www.packsify.com/blogs/last-war-survival-vip-18-cost — coût VIP Last War — *incertain (promotionnel, incohérent)*
- https://en.wikipedia.org/wiki/Torn_(2004_video_game) — Torn — *probable*
- https://wiki.torn.com/wiki/Donator_Pack — pack donateur (lu via résumé de recherche, page bloquée ensuite) — *probable*
- https://greasyfork.org/scripts/582336-torn-usd-converter — taux 5 $ / 23,5 M — *incertain*
- https://en.wikipedia.org/wiki/Fallen_London — abonnement Fallen London — *vérifié*
- https://en.wikipedia.org/wiki/Path_of_Exile — modèle cosmétique — *vérifié*

**Non trouvé** (à compléter dans une seconde passe) : prix des files de Last War et Call of Dragons ; grille VIP de Rise of Kingdoms ; prix et taux des gachas de héros ; prix des gemmes de Clash of Clans et du Gold Pass ; revenus de Travian Games, Gameforge (OGame), Torn, Fallen London, Path of Exile ; exemples chiffrés d'un 4X à monétisation cosmétique (Illyriad et autres) ; taux de conversion propres aux jeux à abonnement.
