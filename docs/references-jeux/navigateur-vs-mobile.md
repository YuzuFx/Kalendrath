# Navigateur ou appli mobile native pour un jeu de stratégie persistant

*Fiche thématique du comparatif élargi, rédigée le 2026-10-23. Elle confronte l'objectif « appli Android/iOS plus tard, à partir de l'interface React » aux faits du marché, des stores et de la technique. Les décisions qui en sortent vont dans le [GDD](../game-design-document.md) ou dans la [décision d'architecture](../decision-architecture-cible.md), pas ici.*

**Fiabilité.** *vérifié* = source officielle ou plusieurs sources concordantes ; *probable* = une source sérieuse, ou règle bien connue non revérifiée pendant cette recherche ; *incertain* = blog de prestataire, forum, estimation. **Limite de la recherche :** le quota de recherches web de la session a été épuisé en cours de route. Trois points n'ont pas pu être documentés et sont marqués « non trouvé » : les chiffres de rétention dus aux notifications push, la part du PC dans les revenus de Last War et de Whiteout Survival, les chiffres d'InnoGames après 2019 par plateforme.

## Résumé en 5 lignes

1. L'argent du genre est sur mobile : 113 milliards de dollars, soit 56 % du marché du jeu en 2025. Le jeu par navigateur est un segment résiduel, d'environ 2 milliards et en recul de 15 à 17 % par an au dernier chiffre publié (2023).
2. Les éditeurs navigateur qui ont survécu (InnoGames, Gameforge, Travian) ont tous ajouté des applis avec **un compte unique partagé** entre navigateur et mobile. Le mobile y pèse environ 43 % des revenus d'InnoGames depuis 2020, pas 90 %.
3. Pour une personne seule avec une interface React, la voie réaliste est **une seule base de code** : un site web installable (PWA) d'abord, puis la même interface emballée par Capacitor pour les stores. React Native ou Expo obligerait à écrire une deuxième interface.
4. Depuis 2025-2026, payer hors store est permis aux États-Unis (Apple sans commission pour l'instant, Google avec des frais à partir du 1er octobre 2026) et en Europe (Apple : 15 % sur un lien vers le web, 10 % pour les petits développeurs). Une boutique web garde l'essentiel de la marge.
5. Le mobile vit de la publicité payante (installation à 4-6 $ en stratégie dans les pays riches, plus de 8 $ en mid-core sur iOS aux États-Unis). Avec un écart payeur plafonné à +30 %, Kalendrath ne peut pas acheter ses joueurs : **l'appli sert la rétention, pas l'acquisition**.

## 1. Marché : où sont les joueurs et l'argent

| Segment | Chiffre | Fiabilité |
|---|---|---|
| Marché mondial 2025 | 201,6 Md$, +9,1 % (Newzoo, chiffre final ; prévision de septembre 2025 : 188,8 Md$) | vérifié (plusieurs relais de Newzoo) |
| Mobile 2025 | 113,3 Md$, 56 % du total ; croissance portée par les mini-jeux chinois et les ventes directes (D2C) | vérifié |
| PC 2025 | 43,6 Md$, +12 % | vérifié |
| Navigateur PC 2022 | 2,3 Md$, −15 % à −16,7 % selon l'édition, « migration continue des joueurs vers le mobile » | vérifié (Newzoo, deux éditions) |
| Navigateur PC 2023 (prévision) | 1,9 Md$, −16,9 % par an | probable |
| Navigateur après 2023 | non trouvé (Newzoo ne semble plus isoler ce segment dans ses communiqués) | — |
| Stratégie mobile 2025 | plus de 20 Md$, +20 % sur un an (Sensor Tower, relayé) | probable |
| 4X mobile 2025 | Last War et Whiteout Survival n° 1 et n° 2 du genre ; Whiteout ≈ 1,3 Md$ en 2025 ; Kingshot ≈ 330 M$ dès sa première année | probable (Sensor Tower via Naavik) |

**Contradiction :** le cumul de Whiteout Survival est donné à 2,5 Md$ (Naavik, novembre 2025) et à 4 Md$ (presse coréenne citant Sensor Tower, date plus tardive). L'écart peut venir de la date ; à ne pas citer sans préciser la source.

**Lecture.** Le navigateur pèse environ 1 % du marché, et ce qui en reste appartient à de vieux titres (OGame, Travian, Tribal Wars, Forge of Empires). Un nouveau jeu navigateur ne se bat pas contre Last War pour les mêmes joueurs : il vise une niche de joueurs PC, souvent plus âgés, qui jouent au bureau ou en parallèle d'autre chose. C'est cohérent avec le public adulte visé par Kalendrath.

## 2. Jeux navigateur passés au mobile

| Jeu ou éditeur | Passage au mobile | Compte unique | Effet connu | Fiabilité |
|---|---|---|---|---|
| **InnoGames** (Forge of Empires, Tribal Wars, Grepolis, Elvenar) | Forge of Empires sur iPad (juin 2014), iPhone (septembre 2014), Android (mars 2015) | Oui, dès le départ : « se connecter avec son compte navigateur, passer d'un appareil à l'autre sans perdre sa progression » | Mobile : 54,5 M€ sur 161,5 M€ en 2017 (+62 % sur un an) ; « près de la moitié » en 2019 (190 M€) ; 27 % des revenus cumulés 2007-2019, 43 % depuis 2020. Plus de 2 Md€ cumulés (juillet 2025), 99 % en achats intégrés | vérifié (communiqués InnoGames, PocketGamer.biz) |
| **OGame** (Gameforge) | Applis iOS et Android en octobre 2022, pour les 20 ans du jeu, avec l'extension Formes de vie | non trouvé dans la recherche (les univers étant les mêmes, c'est probablement le même compte) | Aucun chiffre d'audience publié | probable pour la date ; incertain pour le compte |
| **Travian Kingdoms** | Navigateur en 2015, Android (septembre 2015) et iOS (novembre 2015) la même année | Le jeu se présente comme jouable « sur PC et/ou smartphone » ; Travian Legends s'affiche explicitement multi-plateforme | non trouvé | incertain (agrégateur et fiche de store) |
| **Evony** (Top Games) | Le succès mobile est un **autre jeu**, *Evony: The King's Return*, pensé pour le mobile ; l'Evony navigateur de 2009 n'a pas été porté tel quel | Non (jeux distincts) | Plus de 100 millions de téléchargements ; ≈ 14 M$ sur Google Play en janvier 2023 ; top 10 iOS américain des revenus pendant longtemps | probable pour les chiffres ; l'origine navigateur relève de la mémoire de l'auteur, à vérifier |

**Ce qu'on en tire.**
- Le modèle qui marche pour un jeu né sur navigateur, c'est **le même monde, le même compte, deux portes d'entrée**. Le mobile s'ajoute à l'audience navigateur, il ne la remplace pas : chez InnoGames, même après dix ans d'applis, le PC fait encore plus de la moitié des revenus.
- Le cas Evony montre l'autre voie, celle d'un jeu conçu pour le mobile et financé par la publicité. Elle demande un budget d'acquisition qu'une personne seule n'a pas (cf. §5).
- Pour les gros 4X mobiles, le mouvement inverse existe aussi (clients PC de Last War, Whiteout Survival, Rise of Kingdoms) : leurs joueurs veulent un grand écran pour gérer la cité. Part du PC dans leurs revenus : non trouvé.

## 3. Cross-play et compte unique

Dans un jeu de stratégie persistant, il n'y a pas de « cross-play » à construire : tous les joueurs sont sur le même serveur et la même base de données. La seule exigence est que **le compte vive côté serveur, pas dans le store**. L'architecture retenue le permet déjà : API `/api/v1` + Sanctum, l'appli mobile n'étant « qu'un client de plus » (décision d'architecture, §3).

Points à prévoir dès maintenant, parce qu'ils coûtent cher à rattraper :
- **Identifiant propre au jeu** (e-mail + mot de passe ou lien magique), jamais un compte Google Play Games ou Game Center comme seule clé.
- **Connexion sociale :** si l'appli iOS propose « Se connecter avec Google », Apple impose aussi une option de connexion respectueuse de la vie privée (en pratique « Se connecter avec Apple »), règle 4.8 de l'App Store. *Probable (règle connue, non revérifiée dans cette recherche).*
- **Suppression du compte depuis l'appli :** exigée par Apple depuis 2022 pour toute appli qui permet de créer un compte (règle 5.1.1). *Probable (idem).*
- **Achats et monnaie virtuelle stockés côté serveur**, attachés au compte, quelle que soit la porte d'achat (web, App Store, Google Play). Un joueur qui achète sur le web doit retrouver sa monnaie dans l'appli, et inversement.
- **Interface pensée mobile d'abord :** la règle des mockups PC + mobile au format 390 × 844 va déjà dans ce sens.

## 4. Options techniques pour une personne seule

| Option | Ce que c'est | Une seule base de code avec le React web ? | Notifications push | Stores | Verdict pour Kalendrath |
|---|---|---|---|---|---|
| **Site responsive** | Le jeu dans le navigateur du téléphone | Oui | Aucune en arrière-plan | Non | Le point de départ, gratuit |
| **PWA** (site installable) | Le même site, avec manifeste et service worker, ajouté à l'écran d'accueil | Oui | Android : oui, comme une appli. iOS : seulement depuis iOS 16.4 (mars 2023) **et** seulement si le joueur a ajouté le site à l'écran d'accueil à la main (pas d'invite automatique) | Non (sauf Google Play via une TWA, non étudiée ici) | Excellent premier pas, insuffisant sur iPhone |
| **Capacitor** | Le même build React dans une coquille native (WebView) avec des greffons natifs (push, vibrations, achats intégrés) | Oui, à 95 % | Natives (APNs et FCM), fiables sur iOS | Oui | **Recommandé** pour passer aux stores |
| **React Native / Expo** | Une interface native, écrite en React mais avec d'autres composants (pas de HTML ni de CSS, donc pas de Tailwind ni de shadcn/ui tels quels) | Non : seule la logique (requêtes TanStack Query, types, état) se partage ; **chaque écran est à réécrire** | Natives, bien outillées par Expo | Oui | Écarté tant que l'équipe est d'une personne |

**Limites d'une PWA sur iPhone** (MagicBell, mis à jour en mars 2026, *probable*) : pas de synchronisation en arrière-plan ; données en cache effacées après 7 jours sans ouverture ; stockage plafonné vers 50 Mo ; pastille d'icône possible depuis iOS 16.4. Pour un jeu dont l'état vit sur le serveur, le cache n'est pas grave. **Le vrai problème est la notification** : la plupart des joueurs iPhone n'installeront jamais un site sur leur écran d'accueil.

**Contradiction sur l'Union européenne :** en février 2024, Apple a annoncé retirer les web apps d'écran d'accueil aux utilisateurs européens (iOS 17.4, au nom du DMA), donc aussi leurs notifications. Un billet de développeur relaie ensuite un revirement d'Apple, qui aurait maintenu cette fonction dans l'UE. Pourtant, le guide de MagicBell mis à jour en 2026 parle encore d'un retrait dans l'UE, et la page DMA d'Apple n'en dit rien. *Incertain.* Pour un public d'abord français, c'est un point bloquant : il faudra le tester sur un vrai iPhone européen avant de compter sur le push en PWA.

**Risque de refus sur l'App Store (règle 4.2, « fonctionnalité minimale »).** Apple refuse les applis qui ne sont « qu'un site web emballé ». Un développeur rapporte un refus d'appli Capacitor, alors même qu'elle avait des notifications push, de la géolocalisation et du partage : le testeur jugeait l'expérience trop proche de Safari. Un testeur d'Apple a écrit sur les forums développeurs que l'appli « doit aller au-delà de ce que peut faire une PWA ». *Probable (forums Apple et Ionic, blog Capgo).* Pour un jeu, on réduit le risque avec une interface sans aspect de site (pas de barre d'adresse, pas de liens externes visibles, navigation basse), de vraies notifications natives, des vibrations, un écran de lancement, et éventuellement un widget ou une Live Activity (« votre flotte arrive dans 12 min »). Google Play est nettement plus tolérant.

**Coûts fixes des stores** (*probable*, tarifs connus non revérifiés) : Apple 99 $ par an ; Google 25 $ une fois. Les nouveaux comptes Google personnels doivent faire tester l'appli en test fermé (12 testeurs pendant 14 jours) avant de la publier, ce qui suppose une petite communauté Discord déjà active.

Rappel : Aleryos, l'un des jeux de référence de Gregory, fait par une personne seule, a une appli Android sur une base React (décision d'architecture, §1). C'est le précédent le plus proche.

## 5. Stores : commissions et paiements hors store

### Commissions de base

| Plateforme | Règle | Fiabilité |
|---|---|---|
| Apple, programme petites entreprises | 15 % sur les achats intégrés tant que le développeur fait moins de 1 M$ de recettes nettes par an ; 10 % dans l'UE sous les conditions alternatives | vérifié (page officielle Apple) |
| Google Play | 15 % sur le premier million de dollars de l'année, 30 % au-delà ; un barème différent s'applique en Australie, dans l'EEE, au Japon, au Royaume-Uni et aux États-Unis | vérifié (aide officielle Google) |

À l'échelle de Kalendrath, on paie donc **15 % et non 30 %** sur ce qui passe par les stores.

### Paiements hors store

**États-Unis, Apple (procès Epic).** L'arrêt d'appel du 11 décembre 2025 (9e circuit) maintient l'injonction : Apple ne peut ni interdire les boutons et liens vers un paiement externe, ni afficher d'écran dissuasif, ni rendre ces liens moins visibles que ses propres achats intégrés. Il pourra un jour prélever une commission « raisonnable », mais **aucune tant que le tribunal n'a pas fixé un taux**. Statut en octobre 2026 : non vérifié. *Probable (Neon Pay, blog de prestataire de paiement, qui cite l'arrêt).*

**États-Unis, Google (procès Epic).** Depuis fin octobre 2025, Google autorise les paiements alternatifs et les liens vers l'extérieur aux États-Unis. Les frais de service s'appliquent **à partir du 1er octobre 2026** (aide officielle Google). Dans le projet d'accord, ils seraient de 20 % pour un achat qui donne un avantage de jeu « plus que minime » et de 9 % sinon, avec 5 % de plus si l'on passe par la facturation Google. Accord pas encore approuvé à la date de la source (juin 2026). *Incertain pour les taux, vérifié pour la date du 1er octobre 2026.*

**Union européenne, Apple (DMA).** Le nouveau barème, annoncé le 18 août 2026, s'applique depuis le 1er octobre 2026 (*probable* : The Next Web et l'agence Anadolu concordent) :
- achats intégrés Apple : 26 %, et 15 % pour les petits développeurs ;
- prestataire de paiement tiers dans l'appli : 20 %, et 10 % pour les petits ;
- **lien vers le web pour payer : 15 %, et 10 % pour les petits** ;
- distribution hors App Store (autre boutique ou web) : seulement 5 % de « Core Technology Commission » ;
- les frais par installation, les frais d'acquisition initiale et les frais de services de store sont supprimés.

Les barèmes de juin 2025 citent encore des frais initiaux de 2 % : ils sont caducs.

### Les boutiques web des éditeurs mobiles

La part des ventes directes (D2C) a fortement monté depuis 2024 :

| Éditeur | Part D2C | Période | Fiabilité |
|---|---|---|---|
| Stillfront | 39 % des revenus nets (34 % un an plus tôt ; 44 % selon une source plus récente) | T2 2025 | vérifié (résultats publiés, PocketGamer.biz) |
| Playtika | 25,3 % au T2 2025, puis 31 % au T3 2025 ; objectif de 40 % en deux ans | 2025 | vérifié (conférence de résultats) |
| MTG (maison mère d'InnoGames) | 24 %, **ventes navigateur comprises** | T2 2025 | vérifié |
| Huuuge, Ten Square Games, SciPlay | 18 à 21 % | 2025 | vérifié |
| Éditeurs 4X (Century Games, FunPlus, Scopely) | non trouvé | — | — |

Leçon : les éditeurs mobiles cherchent à **ramener les joueurs vers une boutique web**, c'est-à-dire là où Kalendrath commence. Un jeu né sur le web a déjà sa boutique, son compte et sa relation directe avec le joueur. L'appli mobile n'a pas besoin de vendre quoi que ce soit au début.

## 6. Acquisition : le mobile vit de la publicité payante

| Indicateur | Valeur | Fiabilité |
|---|---|---|
| Coût par installation (CPI) en stratégie, pays riches | ≈ 5,50 $ iOS, ≈ 4 $ Android (« fourchettes 2026 ») ; 5,50-6 $ iOS et 4-4,50 $ Android (2024-2025) | incertain (blogs de prestataires, Segwise et Mapendo) |
| CPI mid-core ou RPG, iOS États-Unis, T1 2026 | plus de 8,50 $ (moyenne tous genres aux États-Unis : 4,90 $) | incertain (Fox Data, blog) |
| CPI mondial moyen tous genres 2025 | États-Unis 1,71 $ (+31 %), Europe 0,53 $ (+47 %) | incertain |
| Rentabilité à 30 jours (ROAS J30), stratégie | 60 % iOS, 27 % Android : une installation n'est pas remboursée au bout d'un mois | probable (Liftoff / Singular 2025) |
| Part des affichages publicitaires mobiles prise par le 4X | ≈ 19 %, le premier genre | incertain (une source) |
| Rise of Kingdoms | 62 $ de revenu par téléchargement aux États-Unis ; 25,6 % de ses revenus viennent des États-Unis | probable (Sensor Tower via WN Hub, vers 2023) |
| CPI propre au 4X | non trouvé | — |

**Lecture.** Un 4X mobile achète ses joueurs plusieurs dollars pièce, et se rembourse en quelques mois grâce à des payeurs qui dépensent des centaines ou des milliers de dollars. C'est exactement l'écart payeur que Kalendrath refuse (+30 % au plus). Avec un revenu par joueur nettement plus bas, une campagne d'installations payantes ne sera pas rentable. Ce n'est pas un défaut : c'est la conséquence logique du positionnement. Il faut juste ne pas croire que « être sur les stores » amène des joueurs tout seul. La visibilité organique d'un petit jeu sur les stores est faible (pas de chiffre trouvé).

## 7. Notifications : le levier de rétention d'un jeu à timers

Chiffres sur la rétention due aux notifications push dans les jeux : **non trouvé** (quota de recherche épuisé). Ce qui suit relève de la logique du genre, pas d'une mesure.

- Dans un jeu où l'on lance un chantier de 4 h ou une flotte de 6 h, la notification « c'est terminé » **est la boucle courte**. Sans elle, le joueur doit penser à revenir, et l'optimisation récompense celui qui reste devant son écran. Avec elle, le joueur occasionnel joue à égalité de rythme, ce qui sert le pilier PvE-first et le joueur gratuit actif.
- OGame et Travian ont longtemps compensé par des réglages de rythme (×1, vitesses lentes). Les 4X mobiles notifient tout : fin de chantier, attaque entrante, coffre d'alliance, event qui commence.
- **Risque :** trop de notifications font désactiver les autorisations, et sur iOS l'autorisation ne se redemande pas. Il faut un réglage par type (chantier, flotte, attaque, alliance, event), avec des valeurs par défaut sobres, et demander l'autorisation au bon moment (au premier chantier long, pas à l'ouverture).
- **Côté serveur, c'est le chantier de la résolution temporelle** (décision d'architecture, §5) : un job planifié qui s'exécute à `completed_at` peut envoyer la notification au même moment, même si le joueur est déconnecté. Le middleware paresseux actuel d'OGameX en est incapable. La notification est donc un argument de plus pour ce chantier, et elle doit y être prévue dès le départ (canal Reverb si le joueur est connecté, push web ou natif sinon).
- **Le premier substitut gratuit au push iPhone :** le bot Discord (rappel d'event, attaque sur un membre d'alliance) et l'e-mail pour les événements rares. Sur Android, le push web d'une PWA suffit.

## Leçons pour Kalendrath

1. **Rester web d'abord, et assumer que c'est la bonne porte, pas un pis-aller.** Le navigateur est une niche (≈ 1 % du marché), mais c'est la niche des joueurs adultes sur PC qui jouent à OGame et Travian depuis quinze ans, et c'est là qu'une personne seule peut exister sans budget publicitaire. InnoGames montre qu'un jeu né sur le web garde plus de la moitié de ses revenus sur PC dix ans après ses applis.
   → *Conforte la stack actuelle. Aucune décision à rouvrir.*

2. **Une seule interface : PWA puis Capacitor, jamais une deuxième interface en React Native.** Le choix de l'API JSON + Sanctum rend l'appli possible, et celui de React + Tailwind la rend emballable telle quelle. React Native ferait doubler chaque écran.
   → *À inscrire dans la décision d'architecture (section stack ou « Ordre de bascule »), comme lot 8 : PWA installable avec push web (Android) au moment du lot 2 ; coquille Capacitor Android, puis iOS, une fois la V1 jouable. Cela tranche la question laissée ouverte dans la mémoire « appli mobile native » (Capacitor ou React Native/Expo).*

3. **L'appli native se justifie d'abord par la notification sur iPhone.** C'est le seul manque réel de la PWA pour un jeu à timers (installation manuelle obligatoire, statut incertain dans l'UE). Elle n'est pas un canal d'acquisition.
   → *Concevoir la notification dans le chantier de la résolution temporelle (Phase 3c), avec un réglage par type. Prévoir côté serveur une table d'abonnements push (web push d'abord, APNs/FCM ensuite).*

4. **Le plafond payeur de +30 % interdit l'achat d'installations, et il faut le dire franchement.** Un 4X mobile paie 4 à 8 $ ou plus par installation et se rembourse sur des gros payeurs que Kalendrath refuse de créer. Le lancement mobile ne fera pas grossir la communauté tout seul : la croissance viendra du bouche-à-oreille, de Discord, des streamers et des joueurs d'OGame ou Travian déçus.
   → *Ne pas compter l'appli dans le plan d'acquisition de la Phase 7. La sortie sur les stores se fait quand la communauté existe déjà : le test fermé Google (12 testeurs pendant 14 jours) en a besoin, de toute façon.*

5. **La boutique principale est sur le web, le store est une porte secondaire.** Payer sur le web évite toute commission de store (on paie le prestataire, quelques pour cent). Depuis 2025-2026, le lien vers le web est permis aux États-Unis et dans l'UE (15 % chez Apple, 10 % pour un petit développeur). Les achats intégrés restent nécessaires pour les autres pays, mais à 15 % tant qu'on fait moins d'un million de dollars.
   → *Le compte, la monnaie virtuelle et les achats restent sur le serveur, attachés au compte, quel que soit le canal. Phase 8 : prévoir le prix web au moins égal, voire plus avantageux que dans l'appli (petit bonus de monnaie), comme le font les éditeurs mobiles. Règles à revérifier au moment de la sortie, elles bougent tous les six mois.*

6. **Préparer dès maintenant ce qui coûte cher à rattraper.** Identifiant propre au jeu (pas de compte store comme seule clé), suppression du compte depuis l'interface, connexion sociale accompagnée de « Se connecter avec Apple » si l'on en propose une, interface sans aspect de site (navigation basse, aucun lien qui sort du jeu) pour passer la règle 4.2 d'Apple.
   → *À ajouter aux critères du lot 0 (socle) et des mockups mobiles 390 × 844, déjà en cours.*

## Sources

- Newzoo, marché 2025 (201,6 Md$, mobile 113,3 Md$) — https://gamedevreports.substack.com/p/newzoo-gaming-market-surpassed-200 — *vérifié* (relais concordants : https://wnhub.io/news/analytics/item-51165, https://www.pocketgamer.biz/newzoo-global-games-market-set-to-hit-1888bn-in-2025)
- Newzoo, navigateur PC 2022 et 2023 — https://gameworldobserver.com/2022/11/16/global-games-market-184-billion-first-decline-in-15-years-newzoo ; https://gamedevreports.substack.com/p/newzoo-the-gaming-industry-in-2023 ; https://80.lv/articles/newzoo-global-video-game-market-dropped-5-in-2022 — *vérifié*
- Sensor Tower, état du jeu mobile 2025 (stratégie, 4X) — https://www.bolsamania.com/nota-de-prensa/mercados/sensor-tower-state-of-gaming-gaming-drove-94-billion-in-revenue-in-2025-downloads-reached-52-billion--21828650.html — *probable*
- Naavik, Century Games et le 4X (novembre 2025) — https://naavik.co/digest/century-games-4x-portfolio-strategy/ — *probable*
- Cumul de Whiteout Survival à 4 Md$ — https://www.digitaltoday.co.kr/jp/view/38165/sensortower-says-4x-strategy-genre-overtakes-mmorpg-to-top-south-korea-mobile-game-revenue — *incertain* (contredit Naavik)
- InnoGames, 2 Md€ cumulés et part mobile 27 % / 43 % (juillet 2025) — https://www.pocketgamer.biz/innogames-has-surpassed-2-billion-in-lifetime-revenue/ — *vérifié*
- InnoGames, résultats 2017 et 2019 — https://wnhub.io/news/other/item-13864 ; https://newsroom.innogames.com/innogames-increases-revenues-to-eur-190m-in-2019 — *vérifié*
- Forge of Empires, compte unique iPad, iPhone et Android — https://www.cosmocover.com/nl/newsroom/a-new-era-of-cross-platform-forge-of-empires-launched-for-ipad-mmo-innogames-via-cosmocover/ ; https://newsroom.innogames.com/with-your-iphone-through-the-centuries-forge-of-empires-app-released ; https://newsroom.innogames.com/innogames-launches-android-app-for-forge-of-empires — *vérifié* (communiqués officiels, 2014-2015)
- OGame sur mobile (2022) — https://www.pockettactics.com/ogame/mobile ; https://uberstrategist.com/press-release/ogame-now-available-on-ios-and-android-devices — *probable*
- Travian Kingdoms, dates des applis — https://es.vgtimes.com/games/travian-kingdoms/release-dates/ ; https://apps.apple.com/app/id977102758 ; Travian Legends multi-plateforme : https://apps.apple.com/us/app/-/id1544118325 — *incertain*
- Evony: The King's Return — https://mobidictum.com/top-games-gets-twelve-times-revenue-by-flexion/ ; https://www.businesswire.com/news/home/20220701005037/en/Top-Games-Inc-Announces-Record-Breaking-Sales-for-June — *probable*
- Limites des PWA sur iOS (mars 2026) — https://www.magicbell.com/blog/pwa-ios-limitations-safari-support-complete-guide — *probable*
- Retrait des web apps dans l'UE (février 2024) et revirement signalé — https://notificare.com/blog/2024/02/16/apple-giveth-apple-taketh-away/ ; https://portrait.atlassian.net/wiki/spaces/PA/blog/2024/02/20/958201960 ; https://developer.apple.com/support/dma-and-apps-in-the-eu/ (muette sur ce point) — *incertain* (sources contradictoires)
- Règle 4.2 d'Apple et applis Capacitor — https://developer.apple.com/forums/thread/126359 ; https://forum.ionicframework.com/t/apple-4-2-minimum-functionality/189688 ; https://capgo.app/blog/how-to-put-a-web-app-on-the-app-store/ — *probable*
- Programme petites entreprises d'Apple — https://developer.apple.com/app-store/small-business-program/ — *vérifié*
- Frais de service de Google Play — https://support.google.com/googleplay/android-developer/answer/112622 — *vérifié*
- Google aux États-Unis, frais à partir du 1er octobre 2026 — https://support.google.com/googleplay/android-developer/answer/15582165 — *vérifié* ; taux du projet d'accord : https://www.techradar.com/phones/android/android-could-soon-change-in-a-big-way-thanks-to-the-google-and-epic-settlement-heres-what-it-means-for-you ; https://tech-insider.org/epic-google-play-store-changes-2026/ — *incertain*
- Epic contre Apple, arrêt d'appel du 11 décembre 2025 — https://www.neonpay.com/blog/the-latest-epic-v.-apple-appeal-ruling-december-2025-what-changed-for-game-developers — *probable*
- Apple et l'UE, barème du 18 août 2026 — https://thenextweb.com/news/apple-eu-app-store-fees-dma-core-technology-commission ; https://aa.com.tr/en/science-technology/apple-revamps-eu-app-store-fees-to-resolve-regulatory-dispute/4031035 — *probable* ; barème de juin 2025 : https://mjtsai.com/blog/2025/06/27/eu-app-store-tiers-and-core-technology-commission/
- Ventes directes des éditeurs mobiles (août 2025) — https://www.pocketgamer.biz/how-much-direct-to-consumer-revenue-are-mobile-games-publishers-making/ — *vérifié* ; Playtika T3 2025 : https://www.fool.com/earnings/call-transcripts/2025/11/06/playtika-pltk-q3-2025-earnings-call-transcript — *vérifié*
- CPI en stratégie — https://segwise.ai/blog/cpi-ipm-roas-benchmarks-optimizing-ad-spend/ ; https://mapendo.co/blog/mobile-games-cpi-2025 ; https://foxdata.com/en/blogs/mobile-game-ua-in-2026-why-cpi-is-rising-and-what-smart-studios-do-differently/ — *incertain* ; ROAS J30 : https://liftoff.ai/?p=34267 — *probable*
- Rise of Kingdoms, revenu par téléchargement — https://wnhub.io/news/finance/item-43560 — *probable*
- Règles 4.8 (connexion avec Apple) et 5.1.1 (suppression du compte), tarifs des comptes développeur, test fermé de Google : règles connues de l'auteur, **non revérifiées pendant cette recherche** — *probable*, à confirmer sur https://developer.apple.com/app-store/review/guidelines/ et l'aide Google Play avant la sortie
