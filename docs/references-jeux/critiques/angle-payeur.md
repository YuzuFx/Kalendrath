# Critique, angle « le joueur payant » (vague 2, 2026-10-23)

*Contradicteur : je défends le point de vue de celui qui sort sa carte bancaire, du petit au gros. Fiches lues : monétisation-et-boutiques, cadre-legal-ue, state-of-survival, evony, grepolis, forge-of-empires, nouveaux-venus-2024-2026, plus la synthèse du 22 octobre. Un grep ciblé dans le GDD (4.2 point 13, ligne 255 et 662). Aucune recherche web. Quand un argument manque de données, je le dis.*

## 1. Le verdict en huit lignes

1. Le plafond de +30 % est une bonne promesse, mais **tel que formulé il n'est ni mesurable ni applicable** : « +30 % de quoi ? » n'a pas de réponse dans le GDD ni dans les fiches.
2. Le joueur payant de Kalendrath **atteint le plafond en quelques semaines** (ouvriers, abonnement, quelques packs) puis n'a plus rien d'utile à acheter. Le modèle actuel vend un **stock** (achats uniques), alors que seul un **flux** fait payer au 6e, 12e, 20e mois.
3. Le revenu récurrent ne peut venir que de trois choses : abonnement de confort, pass de saison, cosmétiques. Les deux premiers sont **dans le plafond** et se disputent le même budget de 30 % ; le troisième est **le seul hors plafond** et c'est le moins préparé (aucune surface d'affichage, aucune chaîne de production).
4. Le gros payeur (0,19 % des joueurs, 48 % du revenu chez Swrve) ne viendra pas ou partira. **Il faut l'accepter**, et chercher le « dauphin » (le payeur moyen) en lui donnant une raison de payer plus que la case « 5 € une fois ».
5. Les ouvriers « définitifs » à ~5 € et ~20 € sont **le plus gros levier de puissance de la boutique**, pas un confort : une file parallèle en plus peut valoir bien plus que +30 % de débit.
6. Les estimations de revenu de la fiche monétisation reposent sur **un taux de payeurs non sourcé** (6 % « hypothèse haute ») et sur un ARPPU qui dépend d'un budget mensuel de boutique que personne n'a encore décidé.
7. Grepolis et Guerre tribale prouvent qu'un jeu navigateur tient des années avec un avantage payant **supérieur** à +30 % (Grepolis : +30 % production, +20 % combat, trois fois). Le plafond n'est donc pas « honnête par rapport au marché », il est **plus serré**, et il faut le dire comme un engagement chiffré, pas comme un adjectif.
8. Une contradiction à trancher avant tout code : le GDD vend les ouvriers **définitivement** (brief et GDD 4.2 point 13), la fiche légale raisonne sur une **location de 30 jours**. Ce sont deux modèles économiques opposés.

## 2. Ce qu'il y a à acheter (inventaire honnête)

| Produit envisagé | Fréquence d'achat par joueur | Dans le plafond ? | Source |
|---|---|---|---|
| 2e ouvrier (~5 €, facile en gratuit) | Une fois | Oui | brief, monétisation §5.3 |
| 3e ouvrier (~20 €) | Une fois | Oui | idem |
| Packs limités | Épisodique, par définition | Oui | brief |
| Abonnement de confort (~5 €/mois), proposé par la fiche monétisation | Mensuel | Oui | monétisation §6.1 |
| Pass de saison (~10 €), idem | Par saison, seulement si format à saisons | Oui | monétisation §6.1 |
| Cosmétiques (blason, skin de cité, cadre de héros) | Libre | **Non** | monétisation §6.4 |

Lecture : sur la durée de vie, **seules deux lignes sont récurrentes** (abonnement, pass), et elles doivent rester sous un plafond que les ouvriers consomment déjà. La fiche monétisation chiffre elle-même les ouvriers à ~3,50 € **par joueur sur toute sa vie** (30 % de payeurs à la 2e file, 10 % à la 3e). Ce n'est pas un modèle économique, c'est un premier achat.

Absents de la liste et pourtant les moteurs des jeux du panel : le **confort d'interface** (Grepolis : Administrateur, file de 7 ordres), la **vitesse sur les chantiers** (Evony, Last War), les **héros** (Evony : ~300 généraux, un nouveau presque chaque mois). Chacun pose un problème de plafond (§4) ou d'unicité (§6). Le héros payant n'est même pas évoqué dans le brief : à décider.

## 3. Pourquoi paierait-il au 6e, 12e, 20e mois ?

### 3.1 Le problème du plafond « saturé »

Un plafond de +30 % pour « toute la boutique » se sature. Le joueur motivé a tout acheté (ouvriers, abonnement) dans les deux premiers mois. Ensuite : rien. Les jeux sans plafond n'ont pas ce problème parce que chaque événement ou chaque génération de héros **réarme** l'envie (Evony : un nouveau général payant toutes les quelques semaines, 25 septembre 2026 pour le dernier ; State of Survival : générations de héros, plasma). Kalendrath s'est interdit ce réarmement. Sa seule source de dépense future est donc ce qui ne compte pas dans le plafond.

Les fiches ne contiennent **aucune donnée de rétention des payeurs** dans un jeu plafonné (la fiche monétisation le dit : « aucun 4X persistant avec un plafond d'avance payante chiffré et assumé n'a été trouvé »). Tout ce qui suit est du raisonnement, pas de la mesure.

### 3.2 Ce qui fait payer longtemps dans les jeux « honnêtes » du panel

- **Torn, Fallen London, Guerre tribale, Travian Plus** : un abonnement mensuel à ~5 € (monétisation §2.2). Le payeur est fidèle parce que **s'arrêter fait perdre quelque chose de visible** (statut, doublement d'actions, files). Kalendrath peut le faire, mais l'abonnement **doit donner du confort réel** (voir §5) sinon l'arrêt ne coûte rien.
- **Fallen London** : l'abonnement donne aussi du **contenu exclusif mensuel** (histoires). Pour un jeu PvE-first avec un stock de lore, c'est l'analogie la plus naturelle : un chapitre ou une quête de saison réservé aux abonnés, sans effet de puissance. *Réserve* : cela suppose de produire ce contenu chaque mois, avec une équipe d'une personne.
- **Path of Exile** : cosmétique et confort, depuis 2013 (monétisation §4). C'est la preuve que des joueurs paient pour du cosmétique, mais **dans un jeu où des milliers de joueurs se voient en permanence**.
- **Forge of Empires** : 10 events par an, passes Silver et Golden à plafonds d'achat, diamants qui achètent du progrès dans l'event. Le revenu récurrent vient du **calendrier d'events**, pas de la puissance cumulée. C'est l'inverse du plafond (FoE reconnaît lui-même sa course à la puissance), mais le **rythme** (3 semaines par event) est un modèle de réarmement sain.

### 3.3 Les cosmétiques ne se vendent que s'ils se voient

Argument central, sous-estimé par la fiche monétisation (qui recommande « des emplacements cosmétiques » en une ligne). Dans un jeu PvE-first à cité unique, **qui voit le skin de cité de qui ?**

- Path of Exile et Last War donnent des cosmétiques parce que des foules les croisent. Dans Kalendrath, les joueurs se croisent surtout à travers l'alliance, le classement, la carte et le profil.
- Si la cité n'est visible que du propriétaire, un skin de cité est un achat **pour soi seul**, donc rare. Il faut des **surfaces sociales** : profil visible dans l'alliance, blason sur la carte, cadre de héros dans le classement, cité visitable par les alliés. Aucune fiche ne chiffre cette demande ; le GDD n'a pas décidé de ces surfaces.
- Chaque cosmétique est un **actif à produire** : la planche de style, le pipeline Midjourney sont déjà lourds pour 19 bâtiments × 3 paliers + 10 paliers de cité. Un catalogue de cosmétiques régulier est une charge de plus pour une équipe d'une personne. Estimation : non faite, aucune donnée dans les fiches.

### 3.4 Alliance : la seule influence que le payeur veut vraiment

Les jeux du panel monétisent le **statut dans le collectif** : VIP visible, rang de noblesse (Evony), Conseillers (Grepolis), guildes (FoE). Pour un payeur qui a atteint le plafond, la dépense restante la plus naturelle est **pour les autres**. Pistes sans puissance personnelle :

- **Offrir** : acheter pour un camarade la 2e file ou un mois d'abonnement. Torn et Travian le font via une monnaie échangeable (monétisation §6.6). Le payeur dépense, le gratuit en profite, l'équilibre personnel du payeur ne bouge pas. C'est l'astuce qui contourne le plafond **par construction** (le plafond est individuel, le don est collectif). *Réserve* : le don transfère de la puissance à un gratuit et fait grimper l'écart gratuit/gratuit, ce qui est tolérable mais à mesurer.
- **Mécénat visible** : financer un monument d'alliance ou de saison, avec une plaque au nom du donateur. FoE a le meilleur mécanisme de contribution du panel (Grands Monuments), mais sa contribution passe par des Points de forge achetables : donc de la puissance. Ici, la contribution payante doit être **cosmétique ou nominative** seulement.
- **Fondateur / mécène de saison** : titre permanent, nom dans la chronique du monde, effet de lore. Gratuit à produire côté domaine, fort en reconnaissance. **Aucune donnée** dans les fiches sur son efficacité commerciale.

### 3.5 Le piège des packs limités pour un payeur tardif

« Packs limités en durée et en quantité » est cohérent avec le droit (la limite doit être vraie, cadre-legal-ue §1.3) mais il a un effet secondaire que personne n'a regardé : **un joueur qui arrive au 8e mois ne peut plus acheter ce qui a existé aux mois 1 à 7**. Trois conséquences :

1. Le payeur « complet » du mois 1 et le payeur tardif n'ont **pas** le même accès à la boutique : le plafond de +30 % n'est pas atteignable pour le second. Est-ce voulu ?
2. Cela se heurte à la question du **rattrapage des retardataires** : si la ligne accélérée rejoue les events passés, rejoue-t-elle aussi les packs ? Si oui, ils ne sont plus « limités » (risque de fausse urgence, droit des pratiques déloyales). Si non, la ligne accélérée est un rattrapage **sans** boutique, donc sans revenu pour ceux qui en ont le plus besoin.
3. « Limité en quantité » peut vouloir dire par joueur (acceptable) ou global (stock partagé : crée des fuites de premier arrivé, avantage aux fuseaux horaires, frustration). Le brief ne tranche pas.

Evony montre l'inverse extrême : les plafonds sont **journaliers**, un pack à 4,99 $ peut être racheté tous les jours, jusqu'à 12 fois par jour au grade le plus cher. Un plafond « par jour » n'en est pas un. Il faut donc un plafond **cumulé par compte** (ou par saison), et c'est exactement ce qu'on ne peut contrôler sans **registre** (§4).

## 4. Le plafond de +30 % est-il mesurable et applicable ?

### 4.1 « +30 % » de quoi ?

Le brief dit « +30 % au plus pour qui achète toute la boutique face à un gratuit actif », le GDD parle d'« avance payante ». Au moins cinq grandeurs sont candidates, et elles ne se confondent pas :

| Grandeur | Pourquoi elle est trompeuse |
|---|---|
| Vitesse de construction | Se compose : construire plus vite augmente la production, donc la vitesse suivante. +30 % de vitesse au départ peut devenir bien plus au jour 365. |
| Débit de production | Idem, et il pèse sur tout ce qu'on peut acheter. |
| Puissance de combat | Seule grandeur visible des autres joueurs ; aucune tolérance sociale (Grepolis : « critique n° 1 »). |
| Temps pour atteindre le palier N | Mesure parlante mais dépendante du profil joueur. |
| Rang dans l'alliance | Ce qui compte pour le joueur, impossible à plafonner. |

Le plafond doit être **défini sur une seule grandeur de référence**, pour laquelle on publie la méthode. Je recommande : « temps cumulé pour atteindre le palier N de la cité, à comportement identique », mesuré par le simulateur, plus un **plafond sec de 0 %** sur la puissance de combat (voir §6).

### 4.2 Les pièges de composition

- **Cumul entre sources** : la fiche Grepolis montre quatre Conseillers cumulables (+30 %, +20 %, +20 %, +20 %) plus l'expansion achetée par fêtes à 50 or. Un plafond par produit est facile ; un plafond **sur la somme** exige que chaque nouveau produit repasse par le calcul.
- **Cumul entre axes** : Evony VIP 28 = +54 % construction, +46 % recherche, +70 % production, simultanément. Un « +30 % » qui s'applique à chaque axe séparément n'est pas un +30 % global. Il faut un **budget unique** réparti entre axes.
- **Ouvriers** : la file parallèle n'est pas un pourcentage. Une ville qui gèle (une seule file par ville, GDD 4.2 point 13) qui passe à deux files peut doubler son débit sur les phases où deux chantiers sont possibles. Le GDD note que l'effet d'une file en plus compte dans le plafond, **mais ne le chiffre pas** ; la synthèse du 22 octobre dit que le simulateur est en panne (la règle « action la moins chère » bloque l'unique file avec des chantiers de 68 à 123 jours) et que « l'écart payeur de 25 % » n'est **pas fiable**. Le chiffre 25 % ne doit donc être cité nulle part tant que la simulation n'est pas corrigée.
- **Colonies** : si le format retenu est « colonies », chaque colonie a ses files (le GDD le suggère) : les ouvriers se multiplient, l'écart aussi. Un 3e ouvrier à 20 € sur 4 villes ne vaut pas 20 € de confort.
- **Héros et équipement** : le GDD n'a pas encore arrêté ce qui s'achète (héros, équipement, craft). Aucune fiche ne donne de règle. State of Survival : les générations de héros sont le vrai mur du joueur gratuit ; Evony : ~300 généraux, éveil complet à plus de 10 000 $. Si un seul héros payant devient prérequis ou nécessaire à la fin de cité, **le plafond saute** (evony §Leçon 6, déjà notée).
- **Events** : FoE reconnaît que ses bâtiments d'event créent une course à la puissance qu'il ne maîtrise plus ; il a dû interdire en août 2024 les objets « Finish Special Productions » sur les bâtiments de récompense, au nom de « la monétisation, qui finance le développement ». Un event payant avec récompense de puissance permanente est un contournement de plafond.
- **Monnaie gagnée gratuitement** : l'échange ressources contre monnaie premium (Grepolis, 200 or maximum par échange) ou la monnaie d'event gratuite (décision de Gregory pour la 2e file) peuvent faire **baisser le plafond effectif**, puisque l'écart se mesure face au gratuit actif. Chaque source de monnaie gratuite doit avoir un plafond hebdomadaire, comme FoE (60 diamants par semaine d'Expédition).

### 4.3 Les contre-mesures pour l'applicabilité

1. **Un registre de plafond** : tableau, dans le simulateur, qui fait le compte de chaque produit (axe, valeur, durée). Un produit absent du registre ne se publie pas. La fiche monétisation le suggère sous forme de « budget mensuel affiché ».
2. **Un test automatique** : profil « tout acheté » contre « gratuit actif » ; échec si l'écart de temps au palier N dépasse 30 % à 90, 365 et 730 jours. Le brief dit que le simulateur est la pierre angulaire ; il faut qu'il **bloque** les ajouts, pas seulement qu'il les informe.
3. **Publier la méthode**, pas seulement le chiffre. « +30 % au plus » sans méthode est une phrase marketing que personne ne peut vérifier, donc un argument que personne ne croit (le public averti des 4X mobiles a vu mille « fair-to-play »).
4. **Prévoir une marge de sécurité** : viser 20 % mesuré pour annoncer 30 %. Les modèles sont toujours optimistes sur le gratuit (profil actif) et pessimistes sur le payeur (hypothèse de comportements).

## 5. Ce que le payeur doit recevoir (sans toucher au plafond)

Classement par impact commercial attendu (hypothèse, sans donnée pour le mesurer) :

1. **Abonnement de confort riche mais sans puissance** : file d'attente d'ordres (plusieurs chantiers pré-programmés dans la file existante, comme Grepolis, mais sans parallélisme), notifications et rappels, vue d'ensemble de l'empire, historique, filtres, thèmes d'interface, planificateur d'attaques PvE. **Vigilance** : Grepolis montre que vendre de la commodité pousse les gratuits à écrire des scripts et à se faire bannir. Il faut un état du jeu qui rende ces outils **gratuits en base** (liste de ce qui n'est jamais payant : lisibilité, accessibilité) et ne vendre que l'automatisation.
2. **Chapitre mensuel exclusif** (modèle Fallen London) : un récit ou une quête de lore sans effet de puissance. Coût de production : fort, à confronter au rythme d'une seule personne.
3. **Reconnaissance** : titre de mécène, ligne dans la chronique du serveur, blason de fondateur. Quasi gratuits à produire. Points de vigilance : ne pas fabriquer de classes (les gratuits ne doivent pas se sentir inférieurs) ; il faut aussi une **reconnaissance équivalente gagnable** (rang de saison, titre d'exploit).
4. **Don à un camarade** (§3.4).
5. **Cosmétiques sur surfaces sociales** (§3.3).

Ce qui **ne** doit **pas** être vendu : pourcentage de combat, génération de héros, tirage aléatoire (droit : Belgique, KIDS Act ; cadre-legal-ue §4), rachat quotidien de pack.

## 6. Contradictions et chiffres incertains traités comme certains

| Point | Problème |
|---|---|
| Ouvriers « définitifs » (brief, GDD 4.2 point 13) contre « location de 30 jours » (cadre-legal-ue, checklist) | Deux modèles opposés : l'un est un achat unique de plus de 2 ans, l'autre un revenu mensuel. Le GDD écrit « location temporaire » parmi les options de la 2e file. Il faut choisir **avant** de calibrer prix et plafond. |
| « 0,15 à 1 € par joueur actif mensuel » (monétisation §1.5) | Le haut de la fourchette repose sur 6 % de payeurs « non sourcé » ; le bas sur 2 %, qui est la moyenne de Swrve 2016 (tous genres, mobile, base de téléchargeurs, pas d'actifs). Applicabilité à un jeu navigateur à communauté sélectionnée : inconnue. |
| ARPPU 8 à 18 €/mois | Borné par un « budget mensuel de toute la boutique » qui n'existe pas. Le chiffre est déduit de ce que le plafond *permettra* d'acheter, pas de ce que les gens achèteraient. Le plafond de 30 % mesuré en pourcentage de progression n'a pas de traduction en euros tant que l'on n'a pas fixé le prix de chaque produit. |
| « Le plafond coupe jusqu'à la moitié du revenu » (§5.1 de la fiche) | Raisonnement par analogie à Swrve (0,19 % font 48 %) ; la fiche elle-même note que la concentration est fabriquée par la boutique. Si la boutique n'a pas de gros paquets, il n'y a pas de baleines à perdre : le chiffre est invérifiable dans les deux sens. |
| Dégressivité des paquets de monnaie | Monétisation : le gros paquet coûte jusqu'à 3,7 fois moins cher au point (Guerre tribale) ; FoE : de ~2,7 à ~0,8 centime le diamant. La fiche légale (principes CPC 2 et 3) demande des paquets alignés sur les prix des objets. Contradiction directe entre le levier commercial classique et le cadre légal. Sans dégressivité ni paquets énormes, **le revenu par paquet** baisse encore. |
| Revenu navigateur des leaders | Les chiffres AppMagic sous-estiment (web shops, hors Android chinois, net contre brut, nouveaux-venus §préambule). Kingshot : « plus de 70 M$ » contre « 96,7 M$ » pour un même mois. Conséquence : toute comparaison de revenu par joueur avec ces jeux est à ±30 %. |
| Evony « 1 315,86 $ par payeur et par mois » | Étude de cas du distributeur Aptoide, canal particulier, *incertain* (fiche Evony). Ne pas s'en servir comme repère de gros payeur. |
| Last War « VIP 18 de 15 000 à 75 000 $ » | Source promotionnelle incohérente avec elle-même (monétisation). Ne pas citer. |

## 7. Ce qui est bien vu et doit être gardé

- **La 2e file facile en gratuit**, même formule que Clash of Clans (cinq ouvriers avant HdV 7 sans payer) et Rise of Kingdoms (VIP 6). Elle règle aussi l'accusation d'« achat forcé » (cadre-legal-ue checklist). Gregory a raison de la garder, à condition que la monnaie gratuite soit **plafonnée par semaine**.
- **Les packs réellement limités**, parce que la limite est licite si elle est vraie (cadre-legal-ue §1.3) et parce que c'est la seule manière de faire tenir un plafond. À la condition de préciser par compte et sur la vie du compte.
- **Un cadre légal respecté dès le départ** (prix en euros, pas de tirage payant, une seule monnaie, rétractation). C'est la bonne approche et la seule qui évite la refonte de 2028 (DFA).
- **Le refus du bonus de combat payant** : la critique n° 1 de Grepolis (fiche), de l'Age of Empires Mobile sur Steam (44 % d'avis positifs, « pay-to-win extrême ») et d'Evony. Le garder comme argument d'acquisition : le public déçu par ces jeux est la cible.
- **Le désir d'un web shop dès le départ** (nouveaux-venus §3.4, §6) : 0 % de commission des stores sur navigateur (cadre-legal-ue §8).
- **L'appli mobile en second** : les commissions Apple (15 à 26 %) et Google changent les prix par canal (cadre-legal-ue §8). Prévoir tout de suite des prix par canal.

## 8. Alternatives classées par impact

1. **Définir le plafond en une seule grandeur** (temps cumulé au palier N), avec marge de sécurité (viser 20 % pour annoncer 30 %) et **plafond de 0 % sur la puissance de combat**. Impact : décisif, c'est la promesse.
2. **Faire du simulateur un portail de publication** : aucun produit de boutique ne sort sans un test « tout acheté contre gratuit actif » à 90, 365 et 730 jours. Impact : élevé, coût faible une fois le simulateur corrigé.
3. **Un abonnement unique, riche en confort et en lore, à ~5 €/mois**, non reconduit tacitement sans les garde-fous légaux (cadre-legal-ue §5.2), compté dans le plafond pour une part minoritaire (par exemple 8 à 10 points sur 30). Impact : c'est la ligne de revenu qui existe vraiment.
4. **Ouvriers : trancher entre achat définitif et location.** Mon avis : **2e définitif et gratuit/facile, 3e en location par saison** (revenu récurrent, effet limité dans le temps, plafond maîtrisé par durée), pas à 20 € définitifs sur 2 ans qui ne rapportent qu'une fois et valent le plus de puissance. Impact : élevé sur le plafond et sur le revenu ; c'est contre la décision de Gregory, donc à confronter au sondage.
5. **Le don à un camarade** : le payeur au plafond dépense pour son alliance. Impact : moyen à élevé (c'est la seule sortie crédible pour qui a tout acheté), coût domaine faible, risque d'écart gratuit/gratuit à surveiller.
6. **Reconnaissance sans puissance** : titre de mécène, chronique, plaque sur monument. Impact : moyen, coût quasi nul.
7. **Cosmétiques seulement quand la surface sociale existe** : ne pas les compter sur le revenu avant d'avoir décidé où ils s'affichent. Impact : moyen, charge de production à planifier.
8. **Pass de saison uniquement si le format est à saisons**, sans effet de puissance cumulable (FoE : la course à la puissance des events est leur dette technique). Impact : dépend du format.
9. **Ne pas essayer de capter les baleines** : accepter que 0,2 % des joueurs ne viendront pas et ne pas leur vendre un VIP caché sous un autre nom. Impact : défensif, protège la promesse.

## 9. Les 5 questions que Gregory doit trancher

1. **Sur quelle grandeur mesure-t-on le « +30 % » ?** Parmi : temps cumulé pour atteindre le palier N de la cité, débit de production, puissance de combat. Réponse attendue : une grandeur, une méthode publiée, et si le combat est à 0 % ou compris dans les 30 %.
2. **Les ouvriers sont-ils des achats définitifs (5 € et 20 € une fois) ou des locations (mensuelles ou par saison) ?** Le GDD ligne 255 évoque les deux ; la fiche légale suppose la location ; la fiche monétisation montre que l'achat unique rapporte ~3,50 € par joueur pour toute sa vie. Le 3e ouvrier est-il à vie ou à durée limitée ?
3. **Qu'achète le joueur qui a atteint le plafond, et que fait-il au mois 6, 12, 20 ?** Parmi : abonnement, chapitre mensuel, don à un camarade, cosmétique sur surface sociale, titre de mécène. Combien de ces cinq lignes veux-tu avoir ouvertes à l'alpha, et lesquelles seulement après ?
4. **Où se voit un cosmétique ?** Profil d'alliance, blason sur la carte, cité visitable, cadre de héros dans le classement ? Sans surface choisie, aucun cosmétique n'entre dans le prévisionnel de revenu.
5. **Un pack « limité en quantité » est-il limité par compte (et sur toute la vie du compte) ou en stock global, et un joueur qui arrive au 8e mois peut-il atteindre le même plafond que celui du mois 1 ?** Cette réponse conditionne le rattrapage des retardataires (la ligne accélérée rejoue-t-elle les packs ?) et la légalité des comptes à rebours.
