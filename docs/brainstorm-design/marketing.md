# Brainstorm design, vision marketing et conversion

*Rédigé le 2026-11-01. Angle : acquisition, conversion de préinscription, partage, premières impressions. Sources : CLAUDE.md, [plan marketing](../plan-marketing.md), [brief du site vitrine](../brief-site-vitrine.md), [références du genre](../references-jeux-du-genre.md), [lore](../lore.md), puis les quatre artefacts : mockups initiaux (accueil A, accueil B, 404, contact), lot 1 (cité vivante, chronique, table du royaume), lot 2 (Atlas des Éclats, Guet de nuit, Cité en coupe), 7 pistes de logo.*

**Méthode et limites.** Les dossiers de travail du scratchpad (`site/`, `lot2/`) n'existaient pas : j'ai retéléchargé les lots 1 et 2 depuis les artefacts et rendu chaque accueil à 1440 px (première vue de 900 px de haut, le test des « cinq secondes »). Je n'ai pas capturé le 1920 px ni le mobile, ni testé les interactions (lanterne du Guet, survol de l'Atlas, altimètre de la Coupe) : ces points sont jugés sur le code et le texte. Les logos ont été rendus à 110 px, 60 px, en avatar rond Discord (100 px), puis en favicon 32, 24 et 16 px. Les chiffres de conversion cités plus bas sont des **hypothèses**, aucune source ne les étaye.

---

## 1. Constats qui valent pour les six accueils (et pour A et B)

Ce sont les points qui pèsent plus que le choix entre les propositions.

1. **L'accroche promet ce qui n'est plus tenable.** « …un empire qu'aucun autre joueur ne viendra raser dans votre sommeil » figure dans les six accueils, dans A et dans B (sous une autre forme). Depuis les décisions du 2026-10-30 (guerres d'alliances dès le chapitre 1, tous les membres d'une alliance à bannière attaquables), cette phrase est inexacte pour beaucoup de joueurs. Le brief la signale pour la carte « Le PvP n'est jamais subi » mais pas pour l'accroche elle-même. C'est le risque de promesse non tenue numéro un : le premier joueur pillé en bêta la citera sur Reddit. À reformuler avant toute publication. Pistes (propositions, à valider par Gregory) :
   - « …et faites grandir un empire qui travaille pendant que vous dormez. » (positive, tenable)
   - « Bâtissez sur la durée, sans la nuit blanche. » (reprise du message du vétéran dans le plan marketing)
2. **Le genre n'est jamais lisible en cinq secondes.** La ligne « Stratégie et gestion d'empire au long cours, par navigateur » est, dans les six, le texte le plus petit et le plus gris du premier écran. Or c'est la phrase dont un visiteur venu de Reddit a besoin avant le lore. L'accroche épique est belle, mais elle ne dit ni « jeu », ni « navigateur », ni « stratégie » dans ses deux premières lignes. Il faut remonter la ligne de genre au rang de sous-titre (même corps que l'accroche), ou l'insérer en surtitre au-dessus du H1.
3. **Les six partagent la même coque** : nav en verre dépoli, titre Cinzel, carte de formulaire en verre, violet et or, bouton or dégradé. C'est la signature visuelle « site fantasy généré » de 2026. Les images (cohérentes, issues d'un seul `--sref`) sont ce qui distingue Kalendrath, pas le gabarit. Le choix doit donc se faire sur l'image d'ouverture et sur une interaction signature, pas sur le gabarit (voir la section 5).
4. **« Gratuit » n'apparaît nulle part.** C'est la première question d'un visiteur de jeu par navigateur. Le plan marketing interdit de parler de pay-to-win et de plafond, mais ne tranche pas « gratuit à jouer ». À décider **[À DÉCIDER]** : une mention sobre (« gratuit pour commencer ») vaut mieux qu'un silence qui se lit comme un piège.
5. **Aucune balise de partage dans les prototypes** (ni `og:image`, ni `twitter:card`, ni `description`). À prévoir dans le futur site Astro : une image 1200 x 630 par page, et pas la capture brute du hero. Un test simple : la miniature doit se lire à 300 px de large.
6. **Des espaces réservés « Image Midjourney à générer » restent visibles** dans la Table du royaume, le Guet de nuit et l'accueil B. Ces trois ne sont pas publiables en l'état et dépendent d'une génération qui n'a pas eu lieu. Le lot 1 « cité vivante », le lot 2 « Coupe » et l'accueil A n'en dépendent pas.
7. **Les noms des paliers de cité sont affichés** dans la Cité vivante (Hameau, Village, Bourg, Ville franche, Place forte, Citadelle, Cité-Obélisque, Cité palatine, Métropole, Cité des Sphères) : le brief demande explicitement de ne pas les annoncer avant décision. La Table du royaume affiche « 10 paliers de cité, 20 bâtiments, 60 images de bâtiments ». Voir le détail plus bas.
8. **Kaelite et boutique** : la Kaelite n'est pas un texte de ces pages, mais ses icônes de ressource (`ico-kaelite`, `ic-kaelite`) sont embarquées dans les lots. Une barre de ressources avec la Kaelite sur le site public annoncerait la monnaie premium contre la décision du plan marketing (la boutique se présente par ce qu'elle offre, pas avant). À retirer de toute vue publique tant que la boutique n'est pas annoncée.
9. **Réseaux et IA générative** : le pied de page assume Midjourney, ce qui est la bonne décision pour la confiance. Mais plusieurs sous-reddits d'art ou de fantasy interdisent ou rejettent l'art généré : l'image d'ouverture sera le premier objet de critique sur Reddit. Prévoir un message tout prêt, et ne pas viser ces sous-reddits.

---

## 2. Grille de lecture des accueils

Notes de 1 à 5 (5 = meilleur). « Risque » : niveau de risque de promesse non tenue ou d'image non publiable.

| Accueil | Promesse en 5 s | Envie de jouer | Appel à l'inscription | Mémorabilité | Partage (miniature) | SEO | Public adulte stratège | Risque |
|---|---|---|---|---|---|---|---|---|
| Cité vivante (lot 1) | 4 | 5 | 5 | 4 | 5 | 4 | 5 | moyen (noms des paliers) |
| Cité en coupe (lot 2) | 4 | 5 | 4 | 5 | 4 | 4 | 4 | moyen (une promesse par strate) |
| Atlas des Éclats (lot 2) | 3 | 3 | 4 | 5 | 2 | 3 | 5 | moyen (suggère une carte de conquête) |
| Table du royaume (lot 1) | 3 | 3 | 3 | 2 | 3 | 4 | 4 | élevé (images à générer, compteurs internes) |
| Guet de nuit (lot 2) | 2 | 4 | 3 | 5 | 2 | 2 | 3 | moyen (images à générer, lanterne au survol) |
| Chronique (lot 1) | 2 | 1 | 4 | 3 | 3 | 4 | 4 | faible |
| Accueil A initial (mockups) | 4 | 4 | 4 | 3 | 4 | 4 | 4 | faible (images toutes validées) |
| Accueil B initial (mockups) | 4 | 4 | 4 | 4 | 4 | 4 | 4 | élevé (trois images à générer) |

## 3. Classement argumenté des six accueils

### 1. La cité vivante (lot 1, proposition 1)
- **Ce qu'on voit en 5 secondes** : l'obélisque de nuit au bord d'un fleuve, un feu au loin, KALENDRATH en grand, le formulaire à droite, une frise de dix miniatures de la cité qui grandit. On comprend : un monde sombre, une cité à faire croître, une inscription. Tout est au-dessus de la ligne de flottaison à 1440 x 900, formulaire compris.
- **Pourquoi elle l'emporte** : c'est la seule qui montre le **moteur de désir du genre** (la progression visible de sa cité) dès l'écran d'ouverture. L'accueil A de Gregory est ce même principe en plus modeste (trois paliers) ; la Cité vivante est sa version aboutie. L'image d'ouverture fait une très bonne carte de partage (sujet unique, contraste fort, lisible en petit). Les 10 + 20 images existent déjà.
- **Faiblesses** : (a) les noms de paliers, à retirer ou à contrôler (voir ci-dessous) ; (b) la ligne de genre minuscule ; (c) la frise de dix vignettes très sombres est peu lisible en petit, et rien ne dit que cliquer anime la ville ; (d) risque de montrer le sommet (« Cité des Sphères ») trop tôt et de gâcher le sentiment de découverte.
- **Correctif** : conserver la frise, mais ne nommer que les cinq premiers paliers et cacher les cinq suivants derrière un cadenas ou une silhouette (« ? »). La curiosité fait revenir sur le site et nourrit les posts (« voici le palier 6 »). Ou utiliser des numéros romains seuls.

### 2. La Cité en coupe (lot 2, proposition III)
- **Ce qu'on voit** : un panorama d'une cité immense avec le Portail des Sphères, KALENDRATH, le formulaire, et sur la droite un altimètre gradué en toises (+140 Les Sphères, +60 Les tours, ... −120 Les Straumar).
- **Atouts** : la plus **mémorable** de la série avec l'Atlas. L'idée de descendre dans la cité est une métaphore de profondeur de jeu, qui parle au joueur de stratégie : on lui dit « il y a des couches ». Chaque strate porte une promesse, ce qui structure le défilement. L'image d'ouverture est spectaculaire (la meilleure du lot 2 pour le partage). Aucune image à générer.
- **Faiblesses** : l'altimètre est un gadget desktop (il disparaît ou se réduit au mobile, où se trouve l'essentiel du trafic Reddit et X) ; la page est longue ; les noms de bâtiments sont affichés (Institut arcanique, Tour de guet, Portail des Sphères...), ce qui convient si la Galerie les montre déjà ; une strate par promesse risque d'en tenir une que le jeu n'a pas encore.
- **Rôle conseillé** : corps de page de l'accueil final (voir hybride 1), plutôt qu'accueil complet.

### 3. L'Atlas des Éclats (lot 2, proposition I)
- **Ce qu'on voit** : une roue de huit Régions autour du Gouffre, des Éclats en polygones, la ligne « Le monde s'est brisé en Éclats. L'un d'eux vous attend. », le formulaire à gauche.
- **Atouts** : l'idée la plus **originale et la plus cohérente avec le lore** (structure cartographique en Régions, Contrées, Éclats). Elle parle directement au joueur d'alliance : un monde à partager, un point de départ marqué (« Votre cité commence ici »). La phrase d'accroche (« L'un d'eux vous attend ») est la meilleure de toutes pour l'implication.
- **Faiblesses** : c'est un dessin de données, pas une image de jeu : le premier écran ne montre ni cité, ni héros, ni couleur chaude, donc peu d'envie de jouer pour le profil « 4X mobile » ou « PvE et RPG ». Miniature de partage peu parlante. La carte suggère la conquête territoriale (PvP) à un public qu'on veut aussi rassurer. Les Régions et Contrées sont dans le lore mais pas annoncées : à vérifier avant de les nommer publiquement.
- **Rôle conseillé** : section « Le monde » de l'accueil, ou page Univers. Excellente pour le Discord (carte interactive épinglée) et les posts de lore.

### 4. La Table du royaume (lot 1, proposition 3)
- **Ce qu'on voit** : une barre de chiffres (10 paliers, 20 bâtiments, 60 images, un devlog tous les 15 jours), un bandeau Discord, une carte « héros » vide avec l'étiquette « Image Midjourney à générer », le formulaire, un panneau de jalons.
- **Atouts** : la preuve que le projet est vivant (jalons, bandeau Discord, devlog régulier) répond à la plus grande peur d'un site de préinscription : le vaporware. Utile au « curieux du développement ».
- **Faiblesses** : les compteurs sont des chiffres de production (« 60 images de bâtiments ») qui parlent au créateur, pas au joueur, et qui se lisent « pile d'images IA ». Trop d'éléments en compétition (nav, barre de chiffres, bandeau, formulaire, jalons, carte héros) : le regard ne sait pas où aller, l'appel à l'inscription perd en force. Image de héros absente. Pas de signature mémorable.
- **Rôle conseillé** : récupérer le **panneau de jalons** et le **bandeau Discord** pour l'accueil final, laisser le reste.

### 5. Le Guet de nuit (lot 2, proposition II)
- **Ce qu'on voit** : une cité nocturne presque noire, des repères lumineux (L'obélisque, Le fleuve, La porte, Un feu sur la crête), « Cette nuit, c'est vous qui veillez. », le formulaire en bas à droite.
- **Atouts** : l'ambiance et la narration sont excellentes, la lanterne qui révèle la cité est une **vraie accroche interactive**, et la descente de la nuit vers l'aube qui amène à l'inscription est une idée de conversion élégante (la conclusion de la page est le bouton).
- **Faiblesses** : le premier écran est très sombre : la miniature de partage serait un rectangle noir. La lanterne dépend de la souris, donc morte au mobile. Le formulaire est en bas du premier écran, à peine visible à 900 px. Le jeu apparaît peu (pas de bâtiments lisibles, pas de héros). Un visiteur pressé ne voit pas « jeu ».
- **Rôle conseillé** : une page éphémère de campagne (annonce d'événement, teaser de chapitre), pas l'accueil permanent.

### 6. La Chronique (lot 1, proposition 2)
- **Ce qu'on voit** : un titre KALENDRATH en dégradé doré et violet incrusté d'une image de cité, l'accroche en italique, une chronologie du monde (vers −5000 ... an 3000 ... à écrire), le formulaire.
- **Atouts** : le titre en lettres-fenêtres est très beau et mémorable ; le texte est riche pour le SEO ; l'aspect « livre » plaît au lecteur de lore.
- **Faiblesses** : aucune image de jeu, aucun signal « jeu » ou « stratégie » : c'est un site de roman. L'envie de jouer est la plus faible. Le formulaire est un bandeau tardif. Le titre en dégradé a un contraste faible aux endroits clairs.
- **Rôle conseillé** : la chronologie devient la page Univers. Le traitement du titre peut servir de **bannière de devlog** ou de couverture de chapitre.

### Positionnement des deux accueils initiaux
- **A (Le seuil de la cité)**, que Gregory préfère : il a raison. Il est publiable aujourd'hui, avec ses images validées, et a la bonne structure (image plein cadre, formulaire, trois promesses, sélecteur de paliers). La Cité vivante en est l'amélioration naturelle. Son défaut est le même que celui des autres : accroche lore, genre en petit, promesse du sommeil.
- **B (La chronique de la Rupture)** : la meilleure intention narrative (alternance image-texte le long d'une veine de mana, le titre de 150 px), mais ses trois images d'ouverture sont à générer. Ne pas la choisir comme accueil ; reprendre sa structure pour la page Univers.

**Verdict en une phrase** : prendre la Cité vivante comme ouverture, la Cité en coupe comme corps, l'Atlas comme section monde, les jalons de la Table pour la confiance. Voir les hybrides ci-dessous.

---

## 4. Hybrides les plus prometteurs

### Hybride 1 (recommandé) : « Cité vivante » en ouverture, « Cité en coupe » pour le corps
1. **Écran 1** : hero de la Cité vivante (obélisque, titre, formulaire, ligne de genre remontée), frise de paliers réduite (5 nommés, 5 cadenassés).
2. **Corps** : la coupe verticale de la Cité en coupe, mais avec les quatre promesses validées comme strates (au lieu de six strates d'ingénierie). L'altimètre devient une barre de progression légère, absente au mobile.
3. **Section Monde** : une version réduite de l'Atlas (la roue seule, sans panneaux), qui renvoie vers la page Univers.
4. **Confiance** : le panneau de jalons de la Table et le bandeau « Le Discord est ouvert » juste au-dessus du pied de page.
5. **Formulaire** répété en fin de page, et en barre collante discrète après le premier écran.

*Pourquoi* : chaque pièce a déjà fait ses preuves dans son rôle (désir, profondeur, monde, confiance) ; aucune n'impose d'image à générer.

### Hybride 2 : « Guet de nuit » en prologue de la Cité vivante
Page d'accueil de campagne : la cité de nuit avec la lanterne (3 repères maximum), puis au défilement le jour se lève et on passe au hero de la Cité vivante. Intéressant pour une annonce de chapitre ou un teaser de bêta (« la nuit recule ») ; trop lourd pour l'accueil permanent.

### Hybride 3 : « Chronique » en page Univers, « B » pour l'alternance
La chronologie de la Chronique et l'alternance image-texte de B, réunies, font la page Univers. Le titre en lettres-fenêtres sert de bandeau.

### Hybride 4 : accueil A avec la frise de la Cité vivante
Le chemin le plus court si Gregory veut publier vite : garder A tel quel et remplacer son sélecteur 1-3, 4-6, 7-9 par la frise de dix paliers de la Cité vivante, avec les cinq derniers cadenassés.

---

## 5. Idées nouvelles pour le site (au moins cinq)

Aucune n'est dans les artefacts. Les points [À DÉCIDER] concernent des promesses ou des mécaniques que Gregory n'a pas arrêtées.

1. **Réserver le nom de sa cité.** Un champ facultatif dans le formulaire de préinscription : « Le nom de votre cité (nous le garderons pour vous) ». C'est l'effet de possession et de cohérence : une fois qu'on a nommé sa cité, on revient. Donne en plus à l'équipe des noms pour les posts. **[À DÉCIDER]** : réservation réelle ou simple souhait, collisions, modération du nom.
2. **Un rang de préinscription et un lien de parrainage.** Après l'inscription : « Vous êtes le 137e à avoir juré fidélité ; invitez trois amis pour monter dans le rang. » C'est la boucle virale la plus rentable pour un petit budget. Il existe déjà une [étude de parrainage](../etude-parrainage.md) à relire avant de choisir la récompense. **[À DÉCIDER]** : récompense (cosmétique, titre), avec la règle du plan marketing qu'aucun bonus n'est promis tant que Gregory ne l'a pas fixé.
3. **Choix de voie dans le formulaire (segmentation).** Trois boutons au-dessus du champ e-mail : « Bâtisseur », « Stratège d'alliance », « Aventurier PvE ». C'est un micro-engagement (qui fait monter la conversion), et chaque choix alimente un attribut Brevo (`PROFIL`) : les envois peuvent parler au bon persona. Correspond aux profils du plan marketing.
4. **Le carnet de la cité en direct, sur l'accueil.** Un bloc de trois lignes : les trois derniers devlogs (titre, date, « il y a 6 jours »). Contre le soupçon de projet abandonné, c'est ce qui rassure le plus. Le flux existe déjà (RSS, Markdown).
5. **Compteur de bâtisseurs, mais seulement au-delà d'un seuil.** « N bâtisseurs ont posé leur première pierre ». Preuve sociale très efficace, mais un compteur à 12 tue la conversion : ne l'afficher qu'à partir d'un seuil (par exemple 300) et le formuler en pierres, pas en inscrits.
6. **Une boucle de 12 secondes du dernier palier à jour** (fondu enchaîné des paliers, avec le grondement du fleuve en option coupée par défaut). Existe presque déjà (« Voir la cité grandir »). Elle sert de poster vidéo du hero, de GIF pour X, de visuel de lancement Reddit (« voici ce qu'est devenue la même cité en 10 étapes »). Zéro coût de production, car les 10 images existent.
7. **Une capture du vrai jeu dès qu'elle existe.** Aucun site IA générique ne peut montrer de véritable interface. Dès que l'écran Héros React existe, il doit remplacer le héros « ambiance » dans une section (« Voici le vrai écran »). D'ici là, présenter l'écran Héros du canvas de mockups, étiqueté « maquette ».
8. **Un « Serment » de lancement.** Le jour de l'ouverture des préinscriptions, la page change d'état : le formulaire devient « Soyez là au premier jour : la bêta ouvre le [date] ». Les dates sont des engagements (décision 19 du plan marketing) : concevoir ce second état dès maintenant, avec le compte à rebours, pour ne pas bricoler au jour J.
9. **Barre collante de formulaire** en haut après le premier écran (desktop) et en feuille basse au mobile : un champ et un bouton, sans case séparée, avec le consentement réduit à une ligne sous le champ.

### Corrections de conversion, sans idée neuve
- Bouton : « Je m'inscris » est neutre. « Suivre la naissance du royaume » (accueil B) est plus fort et plus cohérent avec le titre du formulaire.
- Une seule case de consentement, non cochée, et le texte du double opt-in annoncé avant le clic : « Un e-mail de confirmation vous sera envoyé ».
- Un seul appel à l'action visible par écran. La Table du royaume en a quatre.
- Mettre le Discord en second appel à l'action pour ceux qui refusent d'envoyer leur e-mail : un visiteur qui ne s'inscrit pas à la liste peut encore rejoindre le Discord. Ne pas les mettre côte à côte au premier écran.
- Mobile en 390 x 844 : le formulaire doit tenir dans le premier écran, sans que le titre le repousse.

---

## 6. Ce qui ferait la différence face à un site IA générique

Le diagnostic d'ensemble : un site « fantasy sombre, verre dépoli, Cinzel, violet et or » est devenu le gabarit par défaut. Ce qui distingue Kalendrath n'est pas ce gabarit mais **ce qu'un gabarit ne peut pas inventer**.

1. **La cohérence des images.** Un seul `--sref`, un univers unique (obélisque, Gouffre, Éclats). Les accueils doivent laisser la place à l'image plutôt qu'à des cartes en verre : moins de panneaux translucides, plus d'image plein cadre.
2. **Un vocabulaire propre.** Straumar, Éclats, Contrées, Rupture, toises, veille : la page doit parler avec ces mots, déjà inventés, et les glosser par l'image. C'est la voix du projet (épique, légère, vouvoiement), que les pages A, B, Atlas et Guet respectent bien.
3. **La transparence qui coûte quelque chose.** « Une personne qui ne code pas, une IA qui ne dort pas » et « pas de dates, des jalons » sont des aveux qu'un site générique ne fait pas. Ils créent la confiance par le contraste. À garder, mais à signer : le nom ou le pseudo de Gregory, et un lien vers le dépôt public.
4. **Une seule interaction signature**, pas six. La frise de paliers (Cité vivante) est la plus utile : elle montre le produit. La lanterne du Guet est la plus charmante. Choisir une et la faire parfaitement, au mobile compris.
5. **La preuve du produit.** Des écrans réels, un jalon daté (quand une date existe), un devlog récent. Un site générique n'a que des promesses.
6. **Des détails de jeu dans l'interface du site**, pas des détails de SaaS : cartouche de parchemin pour les citations de lore, sceau de cire pour confirmer l'inscription (la page de remerciement), cadres inspirés de l'interface du jeu (le Mix v5), plutôt que des cartes à bordure fine.
7. **Un 404 et un contact qui ont du caractère** : « Cette Contrée n'est sur aucune carte » et « Les corbeaux sont en grève » sont les meilleures lignes des mockups. C'est exactement la pointe de légèreté demandée. Les citer dans les posts Reddit comme exemples de ton.

---

## 7. Logos : grille de lecture

Rendu vérifié en symbole (110 px sombre, 60 px clair), en avatar Discord rond (cadre circulaire 100 px), en favicon (32, 24, 16 px) et en version horizontale.

| Piste | Lisible à 16 px | Avatar rond | Mémorabilité | Initiale K | Écho du lore | Distinctif | Risque |
|---|---|---|---|---|---|---|---|
| 3 K-obélisque | 4 | 4 | 5 | oui | fort | 5 | faible |
| 1 Monolithe | 4 | 5 | 3 | non | fort | 2 | faible (banal) |
| 5 Sceau brisé | 2 | 5 | 4 | non | moyen | 4 | texte illisible sous 64 px |
| 2 Rupture | 2 | 3 | 4 | non | très fort | 4 | illisible à 16 px, asymétrie |
| 4 Gonfanon | 3 | 3 | 4 | non | moyen | 3 | message « guerre », contraire au « PvE d'abord » |
| 6 Taille | 4 | 4 | 3 | non (lit un A) | faible | 2 | confusion d'initiale |
| 7 L-obélisque | 4 | 4 | 3 | non (lit un L) | fort | 3 | confusion d'initiale |

## 8. Classement argumenté des sept logos

1. **K-obélisque (3).** Le seul symbole qui porte à la fois **l'initiale de la marque et le motif du lore** : un K dont la hampe est un obélisque. À 32 et 24 px il reste un K ; à 16 px il reste reconnaissable (une hampe et deux bras). Il se mémorise, s'écrit (on le cherche en tapant K), et fonctionne en avatar rond. C'est le meilleur candidat pour le favicon et la miniature des posts. Réserve : dans le cercle Discord, la pointe de l'obélisque et le bras du K frôlent le bord ; prévoir un cadrage à 80 % et un fond uni.
2. **Monolithe (1).** La meilleure silhouette brute : un obélisque doré sur fond sombre, remarquable en avatar rond et en favicon. Défaut : il est générique (il ressemble à beaucoup de marques de jeu et de monument), et à 16 px il ressemble à un crayon. À garder comme **plan B sûr**, ou comme pictogramme de ressource ou de bâtiment, pas comme logo principal.
3. **Sceau brisé (5).** L'avatar rond parfait : il est déjà rond, il évoque un sceau de royaume, il fait « objet de jeu ». Mais le texte circulaire (« KALENDRATH · AN 3000 PR ») devient illisible sous 64 px, et à 16 px il devient un anneau. À utiliser **comme estampille** (e-mails, devlogs, certificat de préinscription, bouton de l'inscription confirmée), pas comme logo.
4. **Rupture (2).** Le meilleur concept narratif : l'obélisque fendu dit « la Rupture » en un coup d'œil. Mais l'asymétrie et la fissure fine se perdent en petit (à 16 px, un éclat flou), et la forme évoque une plume. À garder pour les grands formats : **bannière, en-tête de devlog, annonces de chapitre**.
5. **Gonfanon (4).** Un étendard est le symbole de l'alliance, et la guerre d'alliances par bannière est une mécanique décidée : la piste est donc **cohérente avec le jeu futur**. Mais en logo principal elle projette du militaire, au rebours du « PvE d'abord » du pitch, et elle est complexe à petite taille. Excellente **comme emblème d'alliance par défaut** dans le jeu.
6. **Taille (6).** Un « A » dont la barre est entaillée : le **mot-symbole horizontal** (KALENDRATH en capitales étroites entaillées) est très réussi, mais le symbole seul se lit « A » : initiale fausse, avatar qui interroge (« A pour quoi ? »).
7. **L-obélisque (7).** Même défaut avec un « L ». Mais attention : dans le **mot-symbole**, l'obélisque remplace le L de KA**L**ENDRATH, ce qui est une trouvaille (un détail qu'on découvre) ; c'est le symbole isolé qui échoue.

### Ce que je retiens
- **Symbole** : K-obélisque (3). **Plan B** : Monolithe (1).
- **Mot-symbole** : celui de la piste 7 (l'obélisque dans le L de KALENDRATH) : il donne un détail de découverte à la marque. À associer avec le symbole 3, dont il partage le motif.
- **Estampille** : Sceau brisé (5), pour les e-mails et la confirmation de préinscription.
- **Grands formats** : Rupture (2), pour les bannières.
- **Emblème d'alliance par défaut** : Gonfanon (4).

## 9. Idées nouvelles pour le logo (au moins trois)

1. **Avatar = scène, favicon = glyphe.** Sur Discord, Reddit et X, l'avatar rond est une miniature d'image : un petit paysage (l'obélisque contre le crépuscule du hero, recadré en cercle) retient mieux l'œil qu'une lettre dorée à plat. Utiliser la scène pour l'avatar des réseaux et le K-obélisque seulement pour le favicon et le contexte officiel (en-tête, e-mails). Les deux doivent partager l'obélisque et la couleur d'accent.
2. **Une famille à deux états : entier et brisé.** Le K-obélisque « intact » est le logo courant ; sa version « fendue » (veine violette qui traverse la hampe, reprise de la piste 2) s'emploie pour les événements de la Rupture et les annonces de chapitre. Un petit système qui donne de la vie à la marque sans la changer, et qui se décline par chapitre (même silhouette, couleur d'accent différente par chapitre ou par serveur, ce qui sert aussi d'identifiant dans le lobby).
3. **Le K comme ombre portée.** Un obélisque debout dont l'**ombre au sol** dessine le K (la diagonale du K est l'ombre). Le logo raconte le jeu : on voit l'objet, l'ombre est la marque. Ne marche qu'en grand format (en-tête, vidéo d'ouverture), mais c'est un logo animé idéal : l'ombre tourne avec le temps, en cohérence avec le thème du temps et des chapitres.
4. **Un favicon qui s'allume.** Le favicon s'éclaire (la veine violette) quand un nouveau devlog est publié, et rien d'autre : un détail que seuls les fidèles remarquent, partageable (« vous avez vu ? »).
5. **Le sceau comme preuve d'inscription.** L'estampille de la piste 5 sert d'image à partager après la préinscription (« Sceau n°137 », avec le nom de la cité si l'idée 1 du site est retenue) : un support social prêt à l'emploi.

---

## 10. Plan d'action proposé

1. **Décisions de Gregory** : accroche (reformulée sans le « sommeil »), mention de gratuité, noms de paliers montrés ou cadenassés, symbole du logo.
2. **Prototype** : l'hybride 1 (Cité vivante + Cité en coupe), sur le site Astro prévu (`site/`), en gardant les balises de partage et le contenu bilingue.
3. **Génération des images manquantes seulement si besoin** : aucune pour l'hybride 1 ; trois (MJ-B1 à B3) si la page Univers reprend la structure de B.
4. **Test des cinq secondes** : montrer pendant cinq secondes la première vue de chaque candidat à cinq personnes du public cible (vétéran, joueur d'alliance, RPG), et demander : « c'est quel genre de jeu ? Que fait-on ? » Mesure : le mot « stratégie » ou « bâtir » doit sortir. Un test de préférence entre le K-obélisque et le Monolithe en avatar rond sur le Discord peut se faire dans le salon dédié.
5. **Hypothèses à suivre après la mise en ligne** (aucune source ne les étaye) : taux d'inscription visé de 3 à 6 % du trafic Reddit froid et de 8 à 15 % du trafic venu du Discord ; mesurer par source (attribut `SOURCE` de Brevo).
6. **Avant toute publication** : parcourir la checklist de publication, relire le brief, retirer les icônes de Kaelite et les espaces réservés visibles.

---

## Annexe : trois réponses courtes aux questions de Gregory

- **Quel accueil choisir ?** La Cité vivante, avec le corps de la Cité en coupe. Pas parce qu'elle est plus belle, mais parce qu'elle montre le jeu et l'inscription au premier écran, avec des images déjà validées.
- **Quel logo ?** Le K-obélisque, avec le mot-symbole où l'obélisque remplace le L. Le Monolithe en recours.
- **Qu'est-ce qui compte le plus ?** Avant le choix visuel : la phrase du « sommeil », qui ne sera plus vraie, et la ligne de genre, trop petite.
