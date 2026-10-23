# Critique, angle « économie d'un projet porté par une seule personne »

*Rédigée le 2026-10-23, vague 2 des critiques. Matière : monetisation-et-boutiques, lancement-indie-et-communaute, navigateur-vs-mobile, cadre-legal-ue, jeux-fermes-ou-echoues, pve-dans-le-genre, nouveaux-venus-2024-2026, plus la feuille de route (phases 5 à 8) et la synthèse du 22 octobre. Aucune recherche web. Les calculs sont les miens, refaits à partir des fiches : les hypothèses sont nommées, et celles qui ne viennent d'aucune fiche sont marquées « de mémoire » ou « hypothèse ».*

## 1. Verdict en cinq lignes

1. Le modèle plafonné à +30 % **couvre ses frais** (quelques centaines de joueurs actifs suffisent) mais **ne rémunère pas Gregory** avant des milliers de joueurs actifs, et probablement jamais s'il reste sur les hypothèses réalistes de payeurs. Il faut dire clairement ce qu'on vise : un projet qui s'autofinance, ou un revenu. Les fiches mélangent les deux.
2. Le scénario « central » de monetisation-et-boutiques (4 % de payeurs, 12 € par payeur et par mois) est **plus optimiste que ses propres sources** : 2 à 3 % de payeurs en stratégie (GameAnalytics), et un plafond de boutique qui interdit justement l'ARPPU moyen de 12 €. Le scénario « prudent » de la fiche est en réalité le scénario réaliste.
3. La phrase « ouvriers : 30 % des joueurs achètent la 2e file et 10 % la 3e » est **incompatible avec la fiche elle-même** : elle suppose plus d'acheteurs que de payeurs. Corrigée, la vie entière des ouvriers rapporte environ 0,2 € par joueur, pas 3,5 €.
4. La vraie dépense du projet n'est pas l'argent, c'est le **temps de Gregory** : quelques heures par semaine pendant des années, sans premier euro avant 2028 environ (hypothèse, la feuille de route ne date rien). Le point mort financier est atteignable ; le point mort en temps, non, tant que l'acquisition reste un trou noir.
5. Ce que le plafond de +30 % coûte vraiment : il coupe **toute montée de l'ARPPU avec l'ancienneté**. Les jeux qui font vivre leur équipe grossissent la dépense du même joueur année après année. Ici, le joueur de deuxième année rapporte autant que celui du premier mois, et un serveur unique à 2 ans de cycle voit son flux de nouveaux joueurs s'éteindre.

## 2. Ce que le projet coûte vraiment

Les fiches ne chiffrent pas les coûts. Voici l'inventaire, avec ce qui est sourcé et ce qui ne l'est pas.

| Poste | Montant mensuel | Source |
|---|---|---|
| VPS (OVH VPS-2) | 8,65 € | feuille de route, Phase 7. Dimensionné pour quoi ? Octane, MySQL, Redis, Horizon et Reverb sur une machine : **non testé**. Prévoir 20 à 40 € avec sauvegarde hors site |
| Domaine, e-mails d'envoi (RGPD), outil de sondage | 5 à 15 € | hypothèse |
| Abonnement Claude (tout le code passe par lui) | 20 à 200 € selon la formule | **à renseigner par Gregory**, aucune fiche ne le chiffre |
| Midjourney | 10 à 60 $ | de mémoire ; la licence commerciale dépend de la formule, à vérifier |
| Comptes de stores | 99 $ par an Apple, 25 $ une fois Google | navigateur-vs-mobile, *probable*, non revérifié |
| Médiateur de la consommation (obligatoire) | **non trouvé** | cadre-legal-ue le rend obligatoire mais ne donne aucun prix ; hypothèse de quelques centaines d'euros par an |
| Comptable | 0 en micro-entreprise | cadre-legal-ue ; à confirmer, la franchise de TVA dispense de déclarations mais pas de la comptabilité de recettes |
| Relecture juridique des CGV et du parcours d'achat | ponctuel, **non trouvé** | cadre-legal-ue la demande avant la Phase 8 sans chiffre |

**Plancher réaliste : 60 €/mois ; fourchette haute : 300 €/mois ; pivot de calcul : 150 €/mois.** C'est bas, et c'est ce qui rend le projet « survivable ». Le piège est l'inverse : un coût d'exploitation faible tient un jeu en vie des années (Illyriad, jeux-fermes-ou-echoues) sans jamais le faire grandir.

Le coût caché est la **dépendance à un fournisseur unique de code**. « Zéro code manuel » signifie que chaque incident de production, chaque mise à jour de sécurité d'OGameX (qui reste upstream actif, CLAUDE.md) et chaque montée de version PHP ou Laravel passent par des sessions payantes. Si le prix ou les limites de l'abonnement changent, c'est le premier poste qui bouge.

## 3. Les scénarios de revenus de monetisation-et-boutiques, démontés

### 3.1 Les hypothèses du tableau 5.4

| Hypothèse | Valeur de la fiche | Ce que disent ses propres sources |
|---|---|---|
| Part de payeurs | 2 % / 4 % / 6 % | 1,9 % tous genres (Swrve 2016, *probable*, ancien) ; 2 à 3 % en stratégie (GameAnalytics 2019, *probable*, ancien). Le 6 % est « non sourcé » de l'aveu de la fiche. Le 4 % « central » est **au-dessus de la fourchette sourcée** |
| ARPPU mensuel | 8 / 12 / 18 € | « borné par le plafond », donc par le catalogue. Si toute la boutique coûte environ 15 € par mois (abonnement 5 + pass 10), un ARPPU moyen de 12 € suppose que presque tous les payeurs achètent presque tout |
| Répartition réelle des payeurs | non utilisée | la fiche cite GamesBrief : 50 % de « vairons » à 1, 40 % de « dauphins » à 5, 10 % de « baleines » à 20. Moyenne pondérée : **4,5** (en $, *incertain*, 2011). Les baleines à 20 sont ici plafonnées par le catalogue |
| Net de frais | 81 % du TTC sur le web | voir 3.3 : faux dans les deux sens |

### 3.2 Mes trois scénarios (revenu mensuel TTC par joueur actif mensuel, « MAU »)

| Scénario | Payeurs | ARPPU | Revenu TTC par MAU |
|---|---|---|---|
| Plafonné réaliste | 2,5 % | 5 € (abonnement ou pass pour la plupart, quelques-uns plus) | 0,125 € |
| Fiche « prudent » | 2 % | 8 € | 0,16 € |
| Fiche « central » | 4 % | 12 € | 0,48 € |

Je retiens un net de 80 % du TTC (TVA ou frais, voir 3.3) et des cotisations sociales de micro-entreprise de l'ordre de 22 % du chiffre d'affaires (de mémoire, à confirmer ; **aucune fiche ne le donne**). La poche de Gregory est alors d'environ 0,62 fois le TTC, moins les coûts fixes.

| Objectif mensuel | Plafonné réaliste | Fiche prudent | Fiche central |
|---|---|---|---|
| Couvrir 150 € de coûts (TTC nécessaire : 190 €) | ~1 500 MAU | ~1 200 MAU | ~400 MAU |
| Dégager 500 € dans la poche (TTC : ~1 040 €) | ~8 300 MAU | ~6 500 MAU | ~2 200 MAU |
| Dégager 1 500 € dans la poche (TTC : ~2 640 €) | ~21 000 MAU | ~16 500 MAU | ~5 500 MAU |

Lecture : les « 5 000 joueurs pour 2 000 € nets » du résumé de la fiche ne tiennent que dans le scénario central, et même là la fiche se contredit. Son résumé dit « 2 000 € nets » ; son §5.4 dit « 2 000 € avant hébergement, cotisations et impôts ». La différence est de 25 à 35 %.

### 3.3 Les frais, mal calculés dans les deux sens

- **Contradiction entre fiches.** monetisation-et-boutiques retire 20 % de TVA puis 3 % de frais. cadre-legal-ue dit que, en micro-entreprise, la franchise de TVA s'applique jusqu'à 37 500 € par an : **sous ce seuil on ne reverse pas de TVA**, le TTC est le chiffre d'affaires. Les deux ne peuvent pas être vrais en même temps.
- **Le scénario central (30 000 € par an) colle au seuil de franchise de 37 500 €.** Au-delà, la TVA de 20 % mord soit sur la marge, soit sur les prix. Et dès 10 000 € de ventes vers l'UE hors France (Belgique, Luxembourg, très probable pour un public francophone), la TVA du pays du client s'applique, via le guichet OSS (cadre-legal-ue). Autrement dit, le « net 81 % » n'est ni valable sous le seuil ni au-dessus.
- **Les frais fixes par transaction pèsent sur un panier de 5 €.** Un prestataire de paiement prend un pourcentage plus un fixe d'environ 0,25 € (de mémoire, non sourcé) : sur 5 €, ce n'est pas 3 % mais 6 à 7 %. Le prestataire « marchand officiel » que cadre-legal-ue recommande pour régler la TVA coûte nettement plus (de l'ordre de 5 % plus un fixe, de mémoire) : jusqu'à 15 % sur un panier de 5 €. Cette conséquence économique de la recommandation juridique n'est tirée nulle part.
- **Provision pour fin de service.** jeux-fermes-ou-echoues propose une charte avec remboursement des derniers mois d'achats (modèle Castle Siege : six mois). Cela veut dire une réserve de trésorerie égale à plusieurs mois de ventes, donc 15 à 25 % du revenu non dépensable. Personne ne l'a mise dans le calcul.

### 3.4 Le grand écart avec Elvenar

pve-dans-le-genre calcule pour Elvenar environ 20 M€ par an pour 240 000 joueurs mensuels, soit près de 7 € par joueur actif et par mois. monetisation-et-boutiques vise 0,15 à 1 €. Le rapport est de 7 à 45. La fiche pve-dans-le-genre prévient que ce chiffre mélange une moyenne sur 10 ans et un instantané 2025 : on peut le diviser par 2 ou 3. Il reste 2 à 3 € au minimum.

Ce n'est pas une preuve que Kalendrath peut gagner 2 € par joueur. C'est la preuve que **le plafond de +30 % est le facteur qui fait la différence**, parce qu'Elvenar vend des extensions, des accélérations et des paquets sans plafond annoncé (nous ne l'avons pas vérifié, la fiche dit seulement « refus du pay-to-win »). Un fait à ne pas rater : aucune fiche ne mesure ce que perd un jeu en s'imposant un plafond ; l'estimation de la fiche (« jusqu'à la moitié du revenu ») est un raisonnement, pas une mesure. Les deux fiches se contredisent sans que personne le dise.

### 3.5 Les ouvriers : le chiffre le plus faux de la fiche

La fiche écrit : « si 30 % des joueurs achètent la 2e file et 10 % la 3e, cela fait ~3,50 € par joueur ». Or 30 % + 10 % de **tous les joueurs** est impossible quand seuls 2 à 4 % paient dans le mois, d'après la même fiche. Recalcul avec 3 % de payeurs au total, dont la moitié achète la 2e file, et un sixième la 3e :

- 2e file à 5 € : 1,5 % des joueurs, soit 0,075 € par joueur
- 3e file à 20 € : 0,5 % des joueurs, soit 0,10 €
- **Total : environ 0,18 € par joueur sur sa vie entière**, contre 3,50 € dans la fiche.

Et la décision de Gregory aggrave cela : la 2e file doit être « facile à obtenir en gratuit » (comme Clash of Clans et Rise of Kingdoms, fiche monetisation). Plus elle est facile, moins elle se vend. Sur 20 000 inscrits : environ 3 600 € en tout, contre 70 000 € dans la fiche. **Les ouvriers ne sont pas un revenu, ils sont un produit d'appel** ; la fiche le dit en une phrase puis chiffre le contraire.

### 3.6 Abonnement ou location sans reconduction ?

monetisation-et-boutiques recommande un revenu récurrent (abonnement, pass). cadre-legal-ue recommande, pour éviter la résiliation « en trois clics » et les futures règles du Digital Fairness Act, une location de 30 jours **sans reconduction automatique**. Ces deux recommandations tirent en sens contraire et la fiche légale ne chiffre pas ce que la reconduction rapporte. Sans reconduction, chaque mois est une décision : la perte de payeurs d'un mois à l'autre est certainement nette (ordre de grandeur : un tiers à la moitié de moins de revenu récurrent, **hypothèse, aucune donnée trouvée**). À trancher avant d'écrire le moindre code de boutique : c'est le chiffre qui fait basculer les tableaux de 3.2.

## 4. Le trou noir : d'où viennent les joueurs

Tout le calcul précédent suppose un nombre de joueurs actifs. **Aucune fiche ne donne un seul chiffre de conversion** de l'audience (devlog, Discord, e-mails) vers des joueurs actifs. Ce qui est connu :

- OGameX : 151 membres sur Discord, 36 en ligne, 327 étoiles (lancement-indie-et-communaute, *vérifié*). C'est le public le plus ciblé, et il est minuscule.
- Forum français d'OGame : 15 112 membres, mais c'est celui de Gameforge et la promotion y est probablement interdite. Discord « Serveur Privé » : 4 776 membres, 573 en ligne.
- Panel de Gregory : 12 à 15 personnes (feuille de route, Phase 6).
- Screeps, déjà jouable : 310 contributeurs, 11 493 $ (*vérifié*). C'est la mesure la plus honnête d'un public indépendant à l'état de projet.
- Les précédents qui ont grandi seuls (OGame, Travian, Kingdom of Loathing) l'ont fait **dans un marché neuf**, sans Discord ni stores (lancement-indie-et-communaute, 2e partie). Kingdom of Loathing a fait vivre son créateur avec 100 000 à 150 000 joueurs réguliers : vingt à trente fois la cible de 5 000.

Calcul d'ordre de grandeur, **hypothèse sans source** : si 20 à 30 % des inscrits jouent chaque mois, 5 000 MAU demandent 17 000 à 25 000 inscrits. Pour 16 500 à 21 000 MAU (rémunérer 1 500 € dans les scénarios réalistes), compter 55 000 à 100 000 inscrits. Pour un jeu sans publicité, sans marque, avec un récit d'« IA qui construit un jeu » (un sujet de devlog, pas un public), aucune fiche n'étaye cela.

**La publicité payante est exclue par construction, et le chiffre l'impose.** Avec 0,125 à 0,48 € TTC par MAU et par mois, un joueur qui reste 6 mois rapporte 0,75 à 2,9 € TTC, soit 0,6 à 2,3 € net. Au CPI d'un 4X (4 à 6 $ en pays riche, *incertain*), la perte est de 3 à 5 $ par joueur. Même au CPI européen moyen tous genres (0,53 $, *incertain*), le gain tend vers zéro. navigateur-vs-mobile le dit, avec raison : l'appli mobile sert la rétention, jamais l'acquisition.

Autre effet sur l'économie : **le flux de nouveaux joueurs décroît**. Sur un serveur unique à fin de cité visée à 2 ans, la courbe de MAU monte avec le lancement puis redescend, et les ouvriers, vendus une fois par joueur, s'épuisent avec les nouveaux arrivants. Travian revend ses files tous les 5 à 6 mois précisément pour cette raison (monetisation, 5.3). C'est un argument économique **contre** le serveur unique sans fin, que l'on ne lit dans aucun résumé.

## 5. Ce qui coûte cher en temps et ne rapporte rien

Classé du plus lourd au plus léger, estimation qualitative faute de décompte d'heures. La mémoire du projet ne contient aucun suivi du temps passé : **première recommandation, en tenir un.**

1. **Un an de contenu en stock avant l'ouverture.** jeux-fermes-ou-echoues (Crowfall : six ans de développement puis un jeu jugé moyen) et lancement-indie-et-communaute (les succès ont ouvert un jeu brut en semaines) vont dans le même sens : c'est un an où le projet ne rapporte rien ni n'apprend rien. pve-dans-le-genre le ramène à six gabarits plus un calendrier, ce qui est réaliste, mais seulement s'il ne s'agit pas de 52 événements écrits un par un.
2. **La direction artistique Midjourney à grande échelle** : 19 bâtiments en 3 paliers, 10 paliers de cité (à réécrire de 6 à 10), planche de style, unités. L'historique du dépôt montre des séries entières consacrées à valider chaque palier (« paliers 2 : 20/20 »). C'est un travail visible et motivant, mais **sans client** : tant que personne ne joue, l'art ne rapporte pas. Il ne se rentabilise que s'il sert de vitrine (capture, devlog) ou de cosmétique vendable. Voir le point suivant.
3. **Les cosmétiques comme seul revenu non plafonné** (monetisation, leçon 4). Contradiction non relevée : ils reposent sur de l'art généré par IA, alors que lancement-indie-et-communaute signale que plusieurs communautés ont des règles contre l'IA générative, et que le public visé (joueurs PC adultes) sanctionne vite ce qui sent le pay-to-win ou le bas de gamme (nouveaux-venus : Age of Empires Mobile à 44 % d'avis positifs sur Steam). Statut de droit d'auteur d'images générées, licence commerciale de l'outil, revente d'éléments que n'importe qui peut copier : **aucune fiche ne traite ces trois points**. Path of Exile, cité en exemple, a un studio entier et un public de millions.
4. **Le simulateur de theorycrafting comme « pierre angulaire »** (CLAUDE.md). La synthèse du 22 octobre admet que ses chiffres actuels ne sont pas fiables et que sa règle de rentabilité est fausse. Un outil de précision pour un jeu qui n'a pas de joueur est un coût de temps élevé pour un gain d'équilibrage qu'une alpha à ratios ×3 à ×5 mesurera en quelques semaines, **avec de vrais joueurs**.
5. **L'appli mobile (Capacitor, stores).** Coût visible : 99 $ par an, un test fermé Google de 12 testeurs pendant 14 jours, le risque de refus Apple 4.2, les notifications push, la maintenance de deux fiches de store. Gain d'acquisition : nul (navigateur-vs-mobile). Gain de rétention : réel mais ne compte qu'avec une base de joueurs qui n'existe pas encore. À reporter jusqu'à un seuil de MAU, pas à une date.
6. **Les saisons et le pass de saison.** Chaque saison de 8 à 12 semaines est une production de contenu, de classement et d'équilibrage à tenir seul. Recette supposée : 10 € × 3 % de payeurs = 0,30 € par MAU par saison, soit 0,10 € par MAU et par mois. Le gain est du niveau de l'erreur d'arrondi des tableaux de 3.2, le coût est un travail récurrent. Elvenar (23 personnes) tient un contenu toutes les deux semaines (pve-dans-le-genre) ; un seul humain qui s'oblige à un rythme comparable en plus des devlogs bimensuels va s'épuiser, c'est la première cause de mort d'un projet solo selon jeux-fermes-ou-echoues.
7. **Le sondage et la structuration Discord avant le jeu** : utile mais borné. Les fiches le placent dans l'ordre juste (panel connu, puis cercles).
8. **La conformité légale** : coût réel mais incompressible, et peu élevé si on retient la solution la plus simple (location de 30 jours sans reconduction, aucun tirage payant, un seul type de monnaie). Je ne la classe pas comme gaspillage.

## 6. Alternatives concrètes, classées par impact

1. **Fixer deux seuils avant tout et les publier dans la feuille de route** : (a) seuil de survie, environ 1 500 MAU (couvre 150 €/mois dans le scénario réaliste) ; (b) seuil de revenu, 6 500 à 21 000 MAU. Sous (a) on garde le jeu gratuit et sans boutique complexe ; entre (a) et (b) il s'agit d'un loisir qui s'autofinance ; au-dessus de (b) seulement on parle de revenu. Cela transforme la Phase 8 d'une promesse en un test.
2. **Sortir un jeu plus tôt, et plus petit.** Alpha fermée par vagues dès qu'une boucle est jouable, même sur l'interface Blade existante (lancement, leçon 1). Un premier euro encaissé (don, abonnement de soutien à 5 €) vaut cent hypothèses de ce document. Kingdom of Loathing et Torn ont d'abord ouvert, puis mis en place le don. L'ordre actuel de la feuille de route, où la boutique est « dernière étape », est le contraire.
3. **Vendre le soutien avant la boutique** : un « pack fondateur » ou un don contre un objet cosmétique non échangeable, uniquement pendant l'alpha, plafonné en nombre. Cela finance le premier mois d'hébergement et donne la seule mesure réelle du taux de payeurs. Attention : le droit de rétractation et la TVA s'appliquent dès le premier euro (cadre-legal-ue, micro-entreprise avant le premier euro).
4. **Revoir le format de serveur pour l'économie, pas pour la narration.** Des saisons ou des serveurs de six mois redonnent à Gregory de quoi revendre l'ouvrier, l'abonnement et le pass à chaque cycle (Travian). Un serveur unique à fin de cité visée à 2 ans mise tout sur un flux d'entrants qui s'éteint. Les fiches pointent le serveur unique comme plus sûr pour le démarrage (jeux-fermes, Crowfall) : c'est vrai en termes de population, faux en termes de revenu. À arbitrer explicitement.
5. **Remplacer « 2e ouvrier à 5 € en achat définitif » par « 2e ouvrier gratuit, 3e ouvrier en abonnement ou en location »**. Comme la 2e est de toute façon facile, la vendre à 5 € n'a pas de sens ; le revenu est dans la 3e file et dans le confort récurrent. Aligné avec Tribal Wars (premium mensuel) et Travian (files par serveur).
6. **Mesurer avant de tarifer.** Mettre en alpha trois niveaux de prix (3, 5, 8 €) sur des cohortes différentes pour obtenir le premier ARPPU réel. Tous les chiffres du présent document sont des bornes ; seule une alpha les remplacera.
7. **Réduire le périmètre de la boutique d'ouverture à trois produits** : un soutien mensuel de 5 € (confort, aucun avantage de combat), un cosmétique de blason, et un pack de fondateur. Le pass de saison et la 3e file viendront quand le jeu dépassera le seuil (a).
8. **Mettre en réserve 6 mois de ventes** (charte de fin de service, remboursements, rétractation) et publier la charte dès l'ouverture : c'est un argument de confiance et le plus fort contre le risque d'abandon (« bus factor de 1 »).
9. **Acquisition : faire de l'écart avec les 4X mobiles l'argument, pas de l'IA.** Le sujet « un non-développeur construit un jeu avec un agent » attire d'abord des développeurs, pas des joueurs. Les joueurs viennent de l'écart de confiance (nouveaux-venus, leçon 1 : publicités trompeuses, pression à payer), de r/StrategyGames et du public OGame et Travian. Faire de chaque devlog une capture de jeu jouable, pas un billet sur l'outil.

## 7. Ce qui est bien vu et doit être gardé

- **Le plafond de +30 % comme argument de communication** (monetisation, nouveaux-venus, lancement). C'est probablement le seul avantage compétitif réel d'un projet sans budget. Il rend aussi inutile la publicité, qui était de toute façon hors de portée.
- **Le constat « viable en solo, pas en studio »** de la fiche monetisation (5.5) : exact, à condition de l'appliquer à ses propres chiffres (voir 3).
- **La boutique d'abord sur le web** (navigateur-vs-mobile, leçon 5) : zéro commission de store, compte unique, prix web égal ou meilleur. Bonne décision économique.
- **Le choix du stack à une seule interface (PWA puis Capacitor, pas React Native)** : divise par deux le coût de maintenance mobile.
- **Aucun tirage payant** (cadre-legal-ue) : écarte le risque légal le plus coûteux (Belgique) pour un revenu de toute façon négligeable.
- **La 2e file facile en gratuit** : protège contre l'accusation d'achat forcé et sert la rétention. Seule la façon de la compter dans le budget est à corriger.
- **La charte de fin de service** (jeux-fermes, leçon 6) : à garder et à budgéter.
- **Un coût d'exploitation très bas** : c'est ce qui laisse à Gregory le temps d'apprendre, la meilleure assurance contre l'arrêt.
- **La dépendance à l'upstream OGameX** : éviter de toucher au domaine limite aussi le coût de maintenance dans le temps.

## 8. Contradictions et chiffres incertains utilisés comme certains

| Où | Problème |
|---|---|
| monetisation 5.3 vs 5.4 | 30 % + 10 % d'acheteurs d'ouvriers contre 2 à 4 % de payeurs |
| monetisation 5.4 vs cadre-legal-ue 7.2 | TVA retirée à 20 % alors que la franchise de 37 500 € annule la TVA ; frais de paiement à 3 % alors qu'un marchand officiel est recommandé |
| monetisation (résumé) vs 5.4 | « 2 000 € nets » vs « 2 000 € avant hébergement, cotisations et impôts » |
| monetisation vs pve-dans-le-genre | 0,15 à 1 € par joueur actif et par mois contre environ 7 € pour Elvenar (même ordre de jeu : PvE, fantasy, fidèle) |
| monetisation 3.1 | ARPPU de 24,33 $ marqué *incertain* par la fiche, mais utilisé comme plafond de référence ; les baleines sont retirées du scénario sans que la répartition le soit |
| monetisation §2 vs lancement-indie | Torn « créé par un développeur seul » : la fiche lancement dit que ce n'est **confirmé par aucune source** |
| cadre-legal-ue vs monetisation | location sans reconduction (simple) contre abonnement récurrent (économique) |
| navigateur-vs-mobile vs jeux-fermes | « rester web d'abord » (pertinent) contre l'appli native comme levier de rétention : aucun chiffre trouvé sur les push |
| toutes | Les statistiques de payeurs (Swrve 2016, GameAnalytics 2019, GamesBrief 2011) sont anciennes et viennent du mobile généraliste ; **aucune ne vient d'un jeu navigateur à abonnement** (la fiche le reconnaît dans sa liste « non trouvé » : « taux de conversion propres aux jeux à abonnement ») |

## 9. Les 5 questions que Gregory doit trancher

1. **Quel est l'objectif financier : couvrir les frais (150 €/mois), un revenu d'appoint (500 €/mois dans la poche) ou un revenu de remplacement (1 500 €/mois) ?** Chaque palier multiplie par 4 à 5 le nombre de joueurs à trouver (environ 1 500, 8 000, 21 000 joueurs actifs mensuels dans le scénario réaliste). Réponds avec un montant et une date de revue : sans cela, le projet n'a pas de critère d'arrêt ni de réussite.
2. **Combien d'heures par semaine peux-tu tenir pendant trois ans, et au-delà de quel seuil de joueurs actifs acceptes-tu de passer de 10 heures à 25 heures ?** La fiche de lancement parle de « quelques heures », mais à 5 000 joueurs il faut modération, support, événements, devlog, CGV. Choisis ton plafond maximal ; il fixe la taille du jeu que tu peux exploiter, pas le contraire.
3. **Acceptes-tu d'encaisser un premier euro avant la fin de la Phase 3c (soutien, pack fondateur, alpha payante) ?** Sinon, tu finances seul 18 à 30 mois (hypothèse) de coûts et de temps sans aucune mesure de ce qu'un joueur paie. Si oui, quel est le plafond de ce premier test et quelle est la promesse faite aux premiers soutiens ?
4. **Le revenu récurrent passe-t-il par un abonnement reconduit (plus rentable, plus de contraintes légales) ou par une location de 30 jours sans reconduction (plus simple, moins de revenu) ?** C'est la décision qui fait varier les tableaux du §3.2 d'un tiers environ. Elle conditionne aussi le format de serveur : saisons et abonnement vont ensemble, serveur unique sans fin et achat unique aussi.
5. **Quel est le nombre minimal de joueurs actifs qui te fait arrêter ou changer de formule, et à quelle date l'évalues-tu après l'ouverture ?** Par exemple : moins de 500 actifs six mois après l'ouverture, on passe en hébergement minimal sans nouvelles fonctions ; plus de 1 500, on ouvre la boutique ; plus de 6 500, on parle de revenu. Écris les trois chiffres dans la feuille de route avant d'écrire une ligne de code de boutique.
