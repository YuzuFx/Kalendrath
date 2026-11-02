# Phase 2 : regard game design, 6 accueils PC « paliers » et 10 logos

*Rédigé le 2026-11-01. Suite de [game-design.md](game-design.md) (phase 1). Lecture : GDD (paliers de cité 4.2, héros 5.5, prestige 5.6, PvP 5.4, alliance 5.9), [étude PvP](../etude-pvp.md) (R13, tableau des trois étages, section 6.5), [étude serveurs en continu](../etude-serveurs-en-continu.md), plus le code source complet des 7 artefacts et les captures 1280/1920/2560 déjà produites. Je n'ai pas relancé de rendu ; je juge ce que chaque page promet, pas son rendu.*

*Nomenclature des artefacts. « Cité en coupe » : V1 l'Axe, V2 la Maquette, V3 les Salles. « Frise des paliers » : V1 la Montée, V2 la Colonne, V3 la Partition. Logos : « version 2 », dix signes (K1 à K6, N1, N2, C1, C2), plus gonfanons et sceaux dérivés de K1.*

---

## 1. Verdict

| Famille | Classement | Pourquoi en une ligne |
|---|---|---|
| Cité en coupe | **1. V2 Maquette** · 2. V3 Salles · 3. V1 Axe | V2 est la seule qui scelle vraiment les paliers VI à X (images non chargées). V1 et V3 révèlent les dix paliers, légendes comprises, dont « Le portail s'éveille ». |
| Frise des paliers | **1. V3 Partition** · 2. V2 Colonne · 3. V1 Montée | V3 range les systèmes aux bons paliers (GDD 4.2) et seule explique le lobby ; mais elle promet « jusqu'à quatre conseillers » et ses paliers « scellés » ne le sont que par un flou CSS. V2 est la plus sûre sur les spoilers (silhouettes dessinées). V1 est la moins fidèle (images VII à X plein écran sous un cadenas). |
| Entre familles | Cité en coupe V2 > Frise V3 > Frise V2 > Cité V3 > Cité V1 > Frise V1 | La coupe raconte le jeu (systèmes réels, ressources, héros), la frise raconte une progression. Voir section 5 pour ce qui se combine. |
| Logos | **1. K1 Taillé** · 2. K5 Négatif (icône seule) · 3. C1 Couronne cité (pictogramme) · 4. N1 Nœud losange · 5. K3 Médaillon · 6. K6 Paliers · 7. K2 Fil · 8. K4 Rune · 9. N2 Nœud cordon · 10. C2 Couronne pointes | Voir section 4. Gonfanon et sceau : bonne idée, deux défauts de vocabulaire et de système à corriger avant adoption. |

**À corriger avant toute publication, par ordre de gravité** (détail sections 2 et 3) :
1. Paliers VII à X : ne montrer ni image, ni légende, ni le Portail des Sphères (Cité en coupe V1, V3, Frise V1).
2. « Jusqu'à quatre conseillers » (Frise V3) : à retirer.
3. Placement du PvP sur un palier (Frise V1 et V2 : « palier V ») : retirer, la règle ne dépend pas d'un palier.
4. « Vos boucliers vous couvrent » / « protégés par des boucliers » : trop fort (section 2.3).
5. Hôtel de ville et Donjon dans la même cité (Cité en coupe, les trois) : inexact.
6. Gonfanon : le champ « sang » et le mot « bannière » entrent en collision avec la bannière levée de la guerre.

---

## 2. Exactitude de ce que les pages promettent

### 2.1 Paliers et systèmes associés

Référence : GDD 4.2, tableau des 10 paliers (validés le 2026-10-28), premier jet de déblocage. Le simulateur est encore à 6 paliers : **tout rattachement d'un système à un palier est indicatif**, et la Frise V1/V2/V3 le dit dans ses notes de maquette. À garder en tête avant d'afficher quoi que ce soit en public.

| Promesse | Où | GDD | Verdict |
|---|---|---|---|
| Forge au palier 2, Académie Militaire au palier 2 | Frise V1, V2, V3 | Village : Académie Militaire, Forge, Atelier des Maîtres d'œuvre | Exact |
| Ambassade au palier 3 (alliés accélèrent les chantiers) | Frise V1, V2, V3 | Bourg : Hôpital, Ambassade ; entraide +5 min sur la file | Exact |
| Atelier des Remparts / remparts au palier 5 | Frise V3 (portée « Les remparts ») | Place forte : Atelier des Remparts | Exact |
| Héros dès le palier I, six archétypes nommés | Frise V1, V2, V3 | 5.5 : un héros principal, archétype choisi à l'inscription, six noms | Exact |
| « Un héros mène votre empire » | toutes | 5.5 : bonus à portée empire | Exact (correction de « gouverne votre cité » faite) |
| « Un échec coûte du temps, jamais le héros » | toutes | Indisponibilité proportionnelle au niveau, jamais de perte définitive | Exact |
| Hordes d'orcs et gobelins « au palier IV » | Frise V1, V2 | Pas de rattachement à un palier : le PvE (expéditions, bots) existe d'emblée | À dérattacher : le joueur croirait que le PvE n'ouvre qu'au palier IV |
| Guerre « au palier V » | Frise V1, V2 | Porte d'entrée : compte de 14 jours et palier Bourg (palier 3) pour rejoindre une alliance à bannière ; guerre à partir de J21 du serveur (étude PvP, 5) | Faux ou au mieux invérifiable : le Bourg (III) est le vrai seuil. La Frise V3 évite le piège en sortant la guerre de la frise |
| Ligues de niveaux au palier VI avec l'image « Académie Militaire 3 » | Frise V1, V2 | Étage 1 : events PvP en ligues dès J14 d'un serveur, sans pertes réelles | Contresens de gating (J14 tombe bien avant le palier VI) ; l'Académie est un bâtiment du palier 2 |
| Donjon (remparts) **et** Hôtel de ville (place) dans la même cité | Cité en coupe V1, V2, V3 | Le Donjon est le bâtiment central de la **capitale** ; les colonies ont un Hôtel de ville. Pas les deux | Inexact. Au minimum, légender le Donjon « capitale » ou n'en montrer qu'un |
| Image « Portail des Sphères » dans la strate « Les tours » | Cité en coupe V1, V2, V3 | Bâtiment du palier 10 (Cité des Sphères) | Spoil du sommet (voir 2.4). Et V2 le charge malgré ses paliers scellés : incohérence interne |

Réserve de fond : toutes les pages présentent « la cité grandit » comme un acte d'Hôtel de ville. C'est exact (un palier tous les 3 niveaux), mais le GDD ajoute deux conditions de passage (Rite d'Ancrage Tellurique, Atelier des Maîtres d'œuvre) et un plan de rythme très étiré (Métropole vers J683 pour un joueur gratuit, GDD 4.2, point 14 non tranché). **La phrase « votre cité change de visage à mesure que son Hôtel de ville s'élève » ne promet aucun délai : bonne.** À ne pas accompagner de « palier I à X en N semaines ».

### 2.2 Héros et conseillers

- **« Jusqu'à quatre conseillers autour de lui »** (Frise V3, section héros) : la note de maquette de V3 écrit « décidé au GDD 5.5, à confirmer ». Mon avis : **à retirer de toute page publique**.
  - Le GDD 5.5 fixe bien « jusqu'à 4 », mais Gregory ne l'a pas arrêté pour la communication.
  - Les sièges sont **débloqués par les paliers de Prestige** (GDD 5.6), et le plan marketing ne présente pas le Prestige publiquement. Annoncer 4 conseillers revient à annoncer 4 paliers de prestige.
  - Les pistes « conseillers fixes » (24 personnages, ou 2 par archétype au lancement) sont explicitement non tranchées : le chiffre peut bouger.
  - Formulation de repli : « un héros, des talents, un équipement forgé ; plus tard, un conseil pour l'épauler » ou rien du tout (le héros suffit à vendre le pilier).
- Image de héros : Frise V1/V2 illustrent « Un héros mène votre empire » avec `unit-mage.webp`, alors que le héros est choisi parmi six archétypes. Prendre un portrait neutre ou une silhouette ; la Frise V3 (six emplacements MJ-H1 à MJ-H6) fait le bon choix de principe, mais n'est pas publiable tant que les six portraits n'existent pas.
- « De la pièce commune à la pièce rare » (Frise V2, Forge) : les tiers de rareté existent (GDD 5.7, cadrés le 2026-09-15), l'expression est acceptable.

### 2.3 PvP, boucliers, guerres

Cadre : étude PvP et décisions du 30/10. Trois étages : paix par défaut (joueur seul ou alliance sans bannière : invulnérable, toujours), events PvP en ligues sans pertes réelles, guerre d'alliances à bannière levée.

Ce qui est exact dans toutes les pages (Cité en coupe `s2.p2`, Frise V1/V2/V3) :
- les guerres opposent des alliances qui ont levé leur bannière ;
- tous leurs membres sont attaquables ;
- on peut perdre ressources et troupes, jamais un bâtiment ni la cité ;
- les « ligues de niveaux » existent (étage 1) ;
- la reformulation du slogan : « raser dans votre sommeil » est retiré, bonne décision (voir plus bas).

Ce qui est trop fort ou incomplet :
1. **« Vos boucliers vous couvrent » (Cité en coupe, les trois) et « protégés par des boucliers » (Frise V1, V2).** Le bouclier gratuit est un stock gagné en jeu, strictement personnel, qui se rompt dès qu'on mène une action hostile ; la couverture continue est payante. La phrase laisse entendre une protection acquise. Proposition : « des boucliers, gagnés en jeu, protègent celui qui ne veut pas combattre ». Ne pas écrire non plus « boucliers » seul sans dire que le détail est ailleurs.
2. **« Pour bâtir en paix, rejoignez une alliance qui ne lève pas la sienne »** (toutes) : exact mais incomplet, car **un joueur sans alliance est aussi invulnérable** (étage 0). La phrase fabrique de la pression sociale (« il faut une alliance pour être tranquille ») ; l'étude PvP (6.5) propose une formule plus juste : « les autres bâtissent en paix ». À reprendre. La Frise V3 (« Les autres bâtissent sans cette menace ») est la plus proche de la vérité.
3. **« Vous êtes prévenu »** (Frise V3) : exact, la levée de bannière prévient tous les membres pendant 72 h et l'adhésion demande une confirmation explicite. Bon argument, à garder.
4. **« Dès le premier chapitre »** (Frise V3) : exact (décision du 30/10), mais l'étude précise « à partir de J21 d'un serveur » et réserve l'accès aux comptes de 14 jours au palier Bourg. Ne pas écrire « dès l'ouverture » : la formule actuelle est correcte, ne pas la durcir.
5. **R13** : l'étude pose la question de remplacer « un joueur pacifique ou sans alliance ne se fait pas écraser par plus fort que lui ». Aucune des six pages ne la reprend telle quelle. **R13 est donc respectée** ; l'ajout éventuel « un joueur dont l'alliance n'a pas levé sa bannière » n'est pas nécessaire.
6. **Slogan « un empire qui travaille pendant que vous dormez »** : plus sûr que l'ancien. L'étude PvP (6.5) note pourtant que « aucun autre joueur ne viendra raser dans votre sommeil » tient mieux qu'avant (une cité ne se rase jamais). Les deux formules sont défendables ; la nouvelle ne dépend pas de la trêve quotidienne, qui n'est qu'une proposition. Je garde la nouvelle, mais un joueur qui lit « pendant que vous dormez » puis « on peut vous prendre des ressources » ne sera pas surpris, puisque le texte est honnête sur ce point.
7. **Ton de l'encart guerre (Frise V3, bande « sang »)** : assumé. Tant que la guerre reste un choix d'alliance, c'est la bonne hiérarchie (un seul bloc rouge, le reste sobre).

### 2.4 Spoilers et révélations sur les paliers VII à X

Brief 2.3 : aucun nom de palier public. Prévision marketing de la phase 1 : « 5 ouverts, 5 cadenassés ». GDD : les paliers 7 à 9 n'ont pas de bâtiment ; le 10 porte le Portail des Sphères, lui-même issu de l'étude de l'Obélisque (twist de fond, lore 62, « indices jamais annoncés frontalement »).

| Page | Ce qui est visible pour VII à X | Gravité |
|---|---|---|
| **Cité en coupe V1 Axe** | Dix vignettes en images, bouton « Voir la cité grandir » qui déroule jusqu'à X ; légendes : « Les veines de mana affleurent » (7), « Un palais au bord de l'eau » (8), « La ville déborde de la vallée » (9), « Le portail s'éveille » (10) ; image du Portail des Sphères en strate +60 | **Élevée**. Le dernier palier est livré en spoil, avec le mot « portail » |
| **Cité en coupe V3 Salles** | Curseur I à X, mêmes légendes, mêmes images ; image du Portail en strate +60 | **Élevée** (même contenu que V1) |
| **Cité en coupe V2 Maquette** | VI à X en pastilles hachurées « À découvrir en jeu », images non chargées ; **mais** image « Portail des Sphères » dans le panneau +60, et la maquette dessinée montre « un obélisque » qui reste fixe | **Faible**, un seul défaut (l'image du Portail) |
| **Frise V1 Montée** | Les dix images plein écran en fondu, avec un cadenas « Nous n'en dirons pas plus » posé sur l'image du palier VIII ; « La lumière du mana devient celle de la ville » (7, repris mot pour mot du GDD) ; « Le pouvoir s'installe » (8) ; « Une ville-monde, enceinte après enceinte » (9) | **Élevée** : le texte ment sur ce qu'il cache, l'image dit tout |
| **Frise V2 Colonne** | VII à X en silhouettes dessinées au canvas, sans image ni légende ; seule phrase : « La magie, puis le pouvoir, puis plus haut encore » | **Faible**, la meilleure sur ce point |
| **Frise V3 Partition** | Colonnes VII à X floutées (`blur`, luminosité réduite), mais **les vraies images sont chargées dans la page** ; légendes de détail : « La magie s'installe », « Le pouvoir s'installe », « La ville passe d'une enceinte à plusieurs » (9) | **Moyenne**. Le flou masque l'écran, pas le code : il suffit d'ouvrir l'onglet réseau |

Recommandations :
- **Ne pas annoncer ce que sont les paliers VII à IX.** Le GDD n'a encore aucun contenu validé pour eux. Écrire « magie » puis « pouvoir » promet des mécaniques qui n'existent pas (la phrase du GDD « la magie puis le pouvoir » est un thème, pas une fonctionnalité).
- **Ne jamais mettre le mot « portail » ni l'image du Portail des Sphères avant la Phase 2 du jeu.** C'est le seul élément qui relie les paliers au twist.
- Si l'on garde la formule « cinq ouverts, cinq scellés », **ne charger aucune image des paliers scellés** (comme le fait la Maquette), ou fournir des silhouettes dessinées (comme la Colonne).
- Le décompte « dix paliers » est lui-même une information ; je le juge sans danger (10 est dans la décision du 28/10 et l'on y gagne en curiosité).

### 2.5 Lobby, chapitres, serveurs

Référence : étude serveurs en continu. À noter que son bandeau d'introduction dit « Rien n'est décidé » alors que la cadence « un serveur par chapitre, calendrier fixe » est bien une décision de Gregory du 2026-10-26.

- **Exact** : un serveur par chapitre, calendrier fixe, un seul compte via le lobby, le lobby propose par défaut le serveur le plus récent, on peut rejoindre un ami sur un serveur plus ancien. Cité en coupe (`s6.p`) et Frise (V1, V2, V3) reprennent la décision sans excès.
- **À adoucir** : « vous pourrez **toujours** rejoindre un ami » : l'étude dit que les inscriptions des anciens serveurs *restent ouvertes*, sans engagement de durée ; « toujours » est un engagement. Remplacer par « les serveurs plus anciens restent ouverts ».
- **« Toutes les cités repartent du premier palier, ensemble »** (Frise V1, V2, V3) : vrai pour un serveur neuf, mais « ensemble » fait croire à une synchronisation entre serveurs ; chaque serveur a son propre `t0`. Préférer « chaque serveur repart du premier palier ».
- **Aucune des pages ne mentionne la fusion**, c'est conforme à l'étude (« ne rien promettre d'irréversible sur la fusion »).
- **Bannières de chapitre (Frise V1 et V2)** : quatre gonfanons « Chapitre I : Le premier serveur », « II : Calendrier fixe », « III : Toujours ouvert aux amis », « … : Le plus récent, proposé par le lobby ». Ce sont des **fonctionnalités**, pas des chapitres ; elles laissent croire qu'il existe trois chapitres nommés. Remplacer par une unique ligne de temps neutre ou par un schéma comme celui de la Partition.
- **Schéma du lobby (Frise V3)** : le meilleur support, mais il montre trois serveurs I, II, III avec « le plus récent, proposé » sur le III : à ramener à un état « I (ouvert) + prochain chapitre » tant que seul le serveur 1 est prévu.
- Rien dans les pages sur la détection de comptes liés ni sur le score de puissance : bien.

### 2.6 Cohérence du récit de progression

- **Cité en coupe.** Récit spatial (du ciel aux Straumar) ; ne dépend pas d'une chronologie, donc ne peut pas mentir sur le rythme. Seul accroc : la même cité réunit Donjon et Hôtel de ville.
- **Frise V1 et V2.** Récit temporel (I à X) avec un enchaînement qui n'est pas celui du jeu :
  1. héros (I), 2. Forge (II), 3. Ambassade (III), 4. hordes (IV), 5. guerre (V), 6. ligues (VI).
  Le vrai enchaînement du GDD est : tout le PvE dès le jour 1, alliance au Bourg (III), guerre à J21 après le Bourg, ligues dès J14. Le récit « on débloque la guerre au palier V » est une **invention narrative** ; elle est séduisante, mais elle fige une règle que le simulateur n'a pas validée. Ne pas la publier sans le simulateur.
- **Frise V3** : la portée « Remparts » commence au palier V (exact), tout le reste est tenu hors de la frise ; sa structure (portées qui s'allument) est la plus honnête.
- **Le slogan et la timeline sont cohérents** : « Trois mille ans après la Rupture » (an 3000 PR) et « Neuf Sphères » sont exacts.

---

## 3. Corrections par page

**Cité en coupe V1 (l'Axe)** : retirer les légendes 7 à 10 et les vignettes VII à X (remplacer par des cadenas, comme V2) ; retirer l'image du Portail ; ne pas laisser « Voir la cité grandir » dérouler jusqu'à X ; corriger Donjon / Hôtel de ville ; reformuler « vos boucliers vous couvrent » ; « le Discord est ouvert » à n'afficher qu'avec un lien permanent.

**Cité en coupe V2 (la Maquette)** : retirer l'image du Portail (incohérent avec « paliers VI à X scellés ») ; corriger Donjon / Hôtel de ville ; reformuler les boucliers ; version mobile à concevoir (la maquette disparaît sous 900 px).

**Cité en coupe V3 (les Salles)** : mêmes corrections que V1, plus la plaque « −120 » qui annonce « Découvrir l'univers » : ne pas y ajouter le twist.

**Frise V1 (la Montée)** : ne charger que les images I à VI (ou des silhouettes) ; retirer les phrases des paliers 7 à 9 ; dérattacher hordes, guerre, ligues ; supprimer les gonfanons « Chapitre I/II/III » ; boucliers : voir 2.3.

**Frise V2 (la Colonne)** : dérattacher hordes, guerre, ligues ; supprimer les gonfanons de chapitre ; image de héros neutre ; sinon la plus propre. À conserver telle quelle : « Quatre paliers scellés ».

**Frise V3 (la Partition)** : **retirer « jusqu'à quatre conseillers »** ; ne plus charger les images VII à X ; retirer « La magie s'installe », « Le pouvoir s'installe », « La ville passe d'une enceinte à plusieurs » ; le schéma lobby à ramener à un serveur ouvert + le prochain ; boucliers à reformuler ; garder la portée « Votre héros » (palier I) et le bloc guerre sorti de la frise.

---

## 4. Logos : alliances et chapitres

Le brief de la phase 1 attendait d'un logo qu'il serve cinq usages : écran de chargement, icône d'app, blason d'alliance, bannière de serveur, évolution par chapitre. La version 2 propose dix signes, un wordmark dessiné et deux emblèmes dérivés de K1.

### 4.1 Classement

| Rang | Signe | Fidélité au monde | Alliances | Chapitres / serveurs | Verdict |
|---|---|---|---|---|---|
| 1 | **K1 Taillé** | Obélisque + K, la fente entre faces claire et sombre fait écho à la Rupture sans la nommer | Bonne base de blason (silhouette forte) | Bonne base pour le sceau | **À retenir comme marque** |
| 2 | **K5 Négatif** | Stèle pleine : lisible, mais peut se lire « maison » (limite notée par la page) | Faible | Faible | **Icône d'app et favicon seulement**, dérivé de K1 : pas un second logo |
| 3 | **C1 Couronne cité** | Le seul qui parle de la **cité** (rempart, quatre tours, obélisque) | Moyen | Moyen | **Pictogramme de cité**. Piste de jeu : le décliner sur les 10 paliers (une couronne qui grandit), pas un seul dessin |
| 4 | **N1 Nœud losange** | Le losange de mana soude haste et branches : évoque la convergence des Straumar, donc **la Grande Conjonction**, c'est-à-dire la cause de la Rupture | Faible | Moyen | Intéressant mais risqué : un logo qui célèbre le rite qui a détruit le monde. À creuser plutôt pour le chapitre qui y revient |
| 5 | K3 Médaillon | Neutre | **Avatar** et jeton de profil | Faible | Utilitaire |
| 6 | K6 Paliers | Pierres appareillées : parle des **paliers**, bon clin d'œil | Moyen (trop détaillé) | Moyen | Disparaît sous 24 px, donc écarté comme logo ; garder l'idée pour un motif |
| 7 | K2 Fil | Délicat | Faible | Faible | Trop fin pour un jeu épique |
| 8 | K4 Rune | Se lit « I< » (défaut que la page reconnaît) | Moyen | Faible | Réservé au blason de faction ennemie, si besoin |
| 9 | N2 Nœud cordon | Le plus doux, donc hors ton | Faible | Faible | Écarter |
| 10 | C2 Couronne pointes | Cinq pointes d'obélisque : pas un logo | Faible | **Marque de rang ou de chapitre** | Peut servir de repère de prestige, mais ne pas s'en servir avant que le Prestige soit annoncé (GDD 5.6) |

### 4.2 Gonfanon d'alliance

- **Idée juste** : champ plein, bordure d'or, lisible sur nuit comme sur aube.
- **Collision de vocabulaire (à corriger).** L'étude PvP fixe « **bannière levée** » comme l'état de guerre d'une alliance, et propose de la rendre visible partout (fiche d'alliance, recherche, fiche de membre). Le gonfanon, qui est aussi une bannière, va **se lire comme cette bannière** : si toutes les alliances ont un gonfanon, personne ne saura lequel est « levé ». Deux solutions :
  - appeler l'emblème d'alliance « **blason** » ou « emblème », et réserver **bannière** à l'état de guerre ;
  - mieux, en faire un vrai objet de jeu : le gonfanon est **baissé** par défaut et **levé** quand la bannière de guerre est levée (l'animation du drapeau devient l'indicateur de l'étage 2, voir R-bannière dans l'étude).
- **Couleur « sang » comme rang 2** : le rouge sang est, dans les pages du site, la couleur de la guerre. L'utiliser comme « champ de rang » mélange deux informations. Réserver le sang à l'état de guerre et prendre une autre teinte de rang (le vert mousse proposé est bon, le nuit aussi).
- **Pastilles de mana = rang** : le GDD n'a pas de « rang d'alliance » au sens d'un niveau visible ; le modèle d'OGameX porte seulement des rôles et droits (`AllianceRank`). Soit on définit un niveau d'alliance (c'est une décision de design), soit on évite d'afficher un rang qui n'existe pas. Ne pas intégrer le K dans le gonfanon de toutes les alliances : une alliance doit pouvoir avoir son propre emblème ; le K est la marque du jeu, pas celle de l'alliance.

### 4.3 Sceau de chapitre

- **Anneau brisé, moitié droite décalée comme à la Rupture, nom en arc** : cohérent avec le lore (chapitre = époque après la Rupture) et lisible sur un e-mail de préinscription.
- **« Autant d'obélisques que de chapitres »** : joli pour 1 à 3, illisible à 8 (le sceau devient une rangée de traits). Prévoir un plafond de dessin (par exemple chiffres romains au-delà de 4) dès maintenant.
- **Un sceau par chapitre, un serveur par chapitre** : les deux se correspondent, ce qui fonctionne tant que « un serveur = un chapitre » reste vrai. Si la fusion de serveurs devait arriver (étude, section fusion), le sceau n'identifie plus un serveur ; à garder en tête, sans le mentionner publiquement.
- **Sceau de cire (cire rouge)** : même remarque que pour le sang : la cire rouge évoque la guerre. Pour une estampille d'e-mail, préférer un or ou un mana neutre.

### 4.4 Autres usages

- **Écran de chargement** : K1 horizontal convient.
- **Icône d'app** : K5. Le K évidé dans la stèle est lisible à 16 px (la page l'atteste).
- **Pas de test utilisateur** : la page propose un test de cinq secondes avec dix personnes ; je le recommande sur K1 vs K5 vs C1, pour la lecture « K » contre « I< ».

---

## 5. Ce qu'on garde, pour un accueil unique

1. **Ouverture et corps : Cité en coupe V2 (Maquette)**, avec les corrections 2.1 (Donjon/Hôtel de ville, Portail) et 2.3 (boucliers).
2. **Frise des dix paliers : celle de la Colonne**, mais avec la portée « systèmes qui s'allument » de la Partition (rattachement correct aux paliers 1, 2, 3, 5).
3. **Bloc guerre : celui de la Partition**, sorti de la frise, avec la formulation de l'étude 6.5 (« les alliances qui le veulent lèvent leur bannière ; les autres bâtissent en paix »).
4. **Bloc lobby/chapitres : schéma de la Partition**, réduit au serveur 1 plus le prochain.
5. **Rien sur les conseillers, rien sur le Prestige, rien sur le Portail.**

## 6. Questions à trancher par Gregory

1. **Rattacher ou non les systèmes à un palier dans la communication ?** Mon avis : seulement ce que le GDD fixe (Forge, Académie, Ambassade, Remparts), jamais la guerre, jamais les ligues.
2. **Cinq ou six paliers visibles ?** La Maquette en montre cinq ; la Colonne six (VI « Un château domine la vallée ») ; la Montée montre tout. À aligner avec la liste 4.2.
3. **Jusqu'à quatre conseillers : on retire ?** Oui, voir 2.2.
4. **Blason d'alliance ou bannière d'alliance ?** Voir 4.2 : décision de vocabulaire avant de dessiner.
5. **Le slogan « un empire qui travaille pendant que vous dormez » : validé ?** Je le recommande.
6. **« Toujours ouvert aux amis » : on s'engage ?** Je recommande « restent ouverts ».
