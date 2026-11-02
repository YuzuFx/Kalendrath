# Phase 2, angle marketing : six accueils PC et dix logos

*Rédigé le 2026-11-01. Fait suite à [marketing.md](marketing.md). Sources : plan marketing, brief du site vitrine, skill `voix-kalendrath`, captures du scratchpad (1280, 1600, 1920, 2560), code source des six pages et de la page des logos.*

**Limites de cette lecture.** Je n'ai pas pu rouvrir les artefacts en ligne (non connecté dans le navigateur) ni exécuter les sources locales des coupes (chaînes de traduction et images non construites). Les pages ont été jugées sur les captures existantes, le code et les notes de maquette. Les interactions (curseur, altimètre, clics de paliers) ne sont pas testées. Les « Salles » et la « Maquette » ont donc été vues surtout à 1440 et 1920 px, la « Maquette » sans son canevas animé. Aucune donnée de conversion : tout ce qui suit est du jugement.

## 1. Ce que les six pages ont en commun (bon et moins bon)

- **L'accroche est corrigée dans les six** : « …faites grandir un empire qui travaille pendant que vous dormez. » Elle est tenable après les décisions du 30/10 et elle porte directement l'angle demandé. C'est un net progrès sur « qu'aucun autre joueur ne viendra raser dans votre sommeil ». Elle reste marquée « à valider » par Gregory.
- **La carte PvP est réécrite honnêtement dans les six** : les guerres opposent des alliances qui lèvent leur bannière, tous leurs membres sont attaquables, on peut perdre des ressources et des troupes, jamais un bâtiment, et « pour bâtir en paix, rejoignez une alliance qui ne la lève pas ». Verdict : honnête, et même la meilleure formulation du projet à ce jour. Deux réserves : (a) la phrase est enfouie loin dans la page (strate « Les remparts » ou section dédiée), donc un visiteur de Reddit ne la lit pas avant de s'inscrire ; c'est acceptable tant que rien dans le haut de page ne promet l'inverse ; (b) « les boucliers vous couvrent » / « des boucliers protègent qui en a besoin » peut se lire comme une garantie : le bouclier payant n'est pas mentionné, ce qui est la bonne décision, mais éviter « vous couvrent » sans condition.
- **Genre lisible** : la ligne « Stratégie / Jeu de stratégie et de gestion d'empire au long cours, par navigateur, pensé d'abord pour le PvE et la coopération » est maintenant en or, au-dessus du titre, dans les six. Le défaut relevé dans mon analyse précédente (ligne de genre minuscule et grise) est corrigé.
- **Toujours absents** : « gratuit » (question n°1 d'un visiteur), la mention du Discord dans le haut de page (le bouton Discord de la barre de navigation est discret) et toute balise de partage. Le Discord ne doit s'afficher qu'une fois l'invitation permanente créée, les notes l'indiquent déjà.
- **Appel unique à l'action** : le formulaire d'e-mail est l'appel principal partout. Le Discord est un second chemin, mais jamais mis en avant avant la section « Le Discord est ouvert » du bas de page. Si l'objectif est « préinscription **ou** Discord », le Discord manque dans la première vue des six.
- **Rendu pleine page, sans largeur fixe en pixels** : toutes utilisent `clamp()`, `vw`, `svh` et des grilles fluides ; les seuls pixels sont des points de rupture `@media (max-width: 900px)` et la case à cocher (20 px). Exceptions à noter :
  - **La Montée** : `min-height: 620px` sur la scène épinglée (hauteur plancher, pas une largeur ; sans effet visible sur écran de bureau).
  - **La Partition** : `min-width: 520px` sur le schéma du lobby, avec défilement horizontal interne en dessous. Acceptable (schéma, pas la page), à vérifier sur écran étroit.
  - **La Maquette** : la maquette en coupe disparaît sous 900 px de large (choix assumé, mais perte d'identité sur mobile).
  - À 2560 px, les textes courants restent proportionnels (lisibles) dans toutes ; la Montée et les coupes gagnent à 2560, la Partition aussi.
- **Défaut commun bloquant avant publication** : des espaces réservés « image Midjourney à générer » (MJ-H1, le héros) subsistent dans les trois coupes, plus MJ-C1 (coupe souterraine) dans les Salles. Pas publiables en l'état.

## 2. Classement des six pages

Critères : conversion (préinscription / Discord), pitch en 5 s, ton, honnêteté PvP, accroche « qui travaille pendant que vous dormez ». Notes sur 5.

| Rang | Page | Conversion | Pitch en 5 s | Ton | PvP honnête | Accroche |
|---|---|---|---|---|---|---|
| 1 | Frise V3, la Partition | 5 | 5 | 4 | 5 | 5 |
| 2 | Frise V2, la Colonne | 5 | 4 | 4 | 5 | 5 |
| 3 | Cité en coupe V1, l'Axe | 4 | 4 | 5 | 5 | 5 |
| 4 | Cité en coupe V3, les Salles | 4 | 3 | 5 | 5 | 5 |
| 5 | Frise V1, la Montée | 3 | 4 | 5 | 5 | 5 |
| 6 | Cité en coupe V2, la Maquette | 2 | 3 | 4 | 5 | 4 |

**1. La Partition.** Tout est dans la première vue à 1600 px : genre, KALENDRATH, accroche complète (« …un empire qui travaille pendant que vous dormez » en entier), formulaire large avec son bouton « Suivre le royaume », et une image de cité nette dont l'obélisque trône au centre-droit. Aucune superposition, texte gauche sur fond sombre, contraste confortable. Le pitch se lit en 5 secondes. La section suivante (« Dix paliers, un seul obélisque ») montre la progression qui est le vrai moteur de désir du genre. Le texte est clair. Réserve : la ligne « Pour bâtir tranquille, rejoignez une alliance… » est bien dite ; vérifier les deux mentions « à générer » relevées dans le code (probablement des notes, à confirmer).

**2. La Colonne.** Même solidité de première vue : titre à gauche, accroche en blanc sous le titre, formulaire en carte à droite, obélisque entre les deux. Image plus sombre et plus « paysage » que « cité » (on ne voit pas encore le jeu). Le genre en or est posé sur l'obélisque et se lit un peu moins bien à 1600 px. Bonne mise en valeur de la progression plus bas. Légèrement derrière la Partition parce que l'image montre moins de cité.

**3. L'Axe.** La plus épique : le trait vertical de la coupe prolonge l'obélisque jusqu'aux Straumar, et l'idée « descendre dans la cité » (strates +20, 0, −40, −120 toises) structure la page. À 1920 px la première vue contient genre, titre, accroche, formulaire et la bande des dix paliers. Faiblesses : l'accroche est en lead sous le titre et un peu petite à 1920 ; le formulaire est plus bas que dans la Partition ; les strates longues retardent le second appel. Mais c'est la page qui raconte le mieux « un monde avec des couches », et la carte PvP y est la mieux placée (encadré « La guerre se déclare, elle ne se subit pas »).

**4. Les Salles.** Très belle image (la métropole au palier X avec portail), curseur de paliers au bas du hero, et barre d'inscription collante en bas de l'écran dès la première vue : très bon pour la conversion (le formulaire est toujours visible). Mais la première vue est chargée (titre, genre, accroche italique, curseur, barre de formulaire) et l'accroche en italique serrée est la moins lisible de la série. Montre en outre le palier X (« Le portail s'éveille ») dès l'ouverture, ce qui expose le sommet de la progression avant la découverte. Les deux images à générer (MJ-H1, MJ-C1) la rendent la moins prête.

**5. La Montée.** La plus ambitieuse, avec scène épinglée de 11,5 hauteurs d'écran et des panneaux par palier (le palier IV avec « Au-delà des murs » et un chevalier est très convaincant, y compris à 2560 px). Mais : (a) la capture à 1600 px montre un **chevauchement de texte** (la phrase du palier superposée à l'accroche et au formulaire), à reproduire et corriger ; (b) à 1920 px l'en-tête affiche le K séparé du mot KALENDRATH par un grand vide, plus la pastille « logo provisoire » ; (c) un défilement de 11,5 écrans pour atteindre le formulaire final nuit à la conversion et au partage. Idée forte, exécution à reprendre.

**6. La Maquette.** Le hero place un KALENDRATH géant sur une ligne ondulante, mais le genre, l'accroche et le formulaire sont **sous la ligne de flottaison à 1080 px de haut** : la première vue est de l'image et un titre. À 5 secondes on ne sait pas que c'est un jeu. La maquette en coupe (canevas) est mémorable mais disparaît sous 900 px. Gain d'identité réel, coût de conversion trop élevé : on ne la retient que pour une section.

## 3. Choix du logo

Page des logos : dix signes, un seul lettrage dessiné (K1 à K6, N1, N2, C1, C2).

**Recommandation marketing :**

| Usage | Choix | Motif |
|---|---|---|
| **Logo principal (en-tête, bannières, Reddit, X, Discord)** | **K1 Taillé** | Le plus lisible et le plus fidèle à l'obélisque. Lettrage à empattements droits, cohérent avec le Cinzel du site. Fonctionne sur nuit (or) et sur aube (bronze). Le K lit « K », pas « i< », grâce aux branches soudées à la haste. |
| **Favicon et icône d'application** | **K5 Négatif** | Seul lisible à 16 px. À présenter comme une déclinaison de K1 pour ne pas donner l'impression de deux marques. |
| **Avatar Discord / X (rond)** | **K3 Médaillon** | Bon en avatar rond, mauvais en favicon : donc seulement pour les profils. |
| **Pictogramme de capitale / palier** | **C1 Couronne cité** | Pas une marque, un symbole de jeu. |
| **À garder pour plus tard** | N1 Nœud losange | Idée de convergence des Straumar, mais le losange disparaît en monochrome : intéressant pour le jeu, pas pour la marque. |
| **Écartés** | K2 Fil, K4 Rune, K6 Paliers, N2 Cordon, C2 Pointes | K2 et K6 s'effacent à petite taille ; K4 peut encore se lire « I< » ; N2 est trop doux pour le ton épique ; C2 se lit « herse ». |

**Points de vigilance.**
- **Test de 5 secondes non fait** : la page l'admet. Avant de figer, faire lire K1 à dix personnes (« quelle lettre, quel mot ? ») sur fond sombre, à 32 px de hauteur. C'est le seul risque marketing sérieux (confusion « i< » ou « KAIENDRATH »).
- **Lettrage généré en code**, pas dessiné à la main : à confier à un typographe ou, au minimum, à retoucher avant tout usage imprimé (goodies Patreon, bannières). Les traits sont à convertir en contours.
- **La veine de mana n'existe qu'en couleur** : le logo ne doit jamais en dépendre (vrai en l'état).
- **Gonfanon et Sceau de chapitre** : le sceau (avec numéro de chapitre) est un bon objet de marque pour les e-mails de préinscription et les chapitres. À garder pour la phase suivante, sans l'afficher avant que « chapitre » soit expliqué.
- **Cohérence** : les pages montrent encore l'ancien K avec la pastille « logo provisoire » ; remplacer par K1 et retirer la pastille avant toute capture publique.

## 4. Ce qu'il faut combiner

1. **Base : la Partition.** Première vue (genre, titre, accroche entière, formulaire large, cité nette), section « Dix paliers, un seul obélisque ».
2. **De l'Axe** : l'idée d'une ligne verticale qui prolonge l'obélisque, et l'encadré de la carte PvP (« La guerre se déclare, elle ne se subit pas »), le mieux lu de la série. Garder les strates en bas de page, pas en haut.
3. **Des Salles** : la barre d'inscription collante en bas dès la première vue, et l'image du palier X **en fin de page** comme récompense, pas à l'ouverture. Un second bouton « Rejoindre le Discord » à côté du formulaire, quand l'invitation sera créée.
4. **De la Montée** : la scène du palier IV (« Au-delà des murs ») comme **une** section, avec défilement court (au plus 3 à 4 écrans), pas 11,5.
5. **De la Colonne** : son découpage en trois temps de la première vue, si la Partition n'en fournit pas assez.
6. **De la Maquette** : seulement le canevas de coupe, comme illustration d'une strate, pas comme hero.

## 5. Défauts bloquants avant publication

1. **Images à générer** : MJ-H1 (héros) dans les trois coupes, MJ-C1 (coupe souterraine) dans les Salles, deux mentions « à générer » dans la Partition à vérifier (notes ou espaces réservés visibles).
2. **Chevauchement de texte dans la Montée** à 1600 px et en-tête désaligné (K séparé du mot) à 1920 px.
3. **Pastille « logo provisoire »** et ancien K à remplacer par le logo retenu dans la Colonne, la Partition et la Montée.
4. **Formulaire sous la ligne de flottaison** dans la Maquette (et pas assez haut dans l'Axe à 1080 px de haut).
5. **« Gratuit » à décider**, au minimum une mention sobre ; son absence se lit comme un piège.
6. **Accroche et carte PvP à faire valider par Gregory** (les notes de maquette le disent). Reformuler « vos boucliers vous couvrent » en « des boucliers protègent qui en a besoin ».
7. **Le Discord ne s'affiche qu'une fois l'invitation permanente créée** ; sinon le bouton de la barre de navigation mène à rien.
8. **Balises de partage** (`og:image` 1200 x 630, `description`) absentes de toutes les pages ; à prévoir dans le futur site Astro.
9. **Texte EN à relire** avec le skill `voix-kalendrath` : l'anglais doit sonner natif, pas calqué (« builds an empire that works while you sleep »), avant toute publication.
