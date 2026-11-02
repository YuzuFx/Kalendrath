# Direction artistique et qualité d'exécution du site vitrine

*Brainstorm du 2026-11-01. Regard de directeur artistique et de designer d'identité : artisanat visuel, qualité d'exécution, système de marque. Complète les regards marketing ([marketing.md](marketing.md)) et game design ([game-design.md](game-design.md)). Document de travail, rien n'est décidé.*

**Ce qui a été examiné.** Les quatre artefacts (canvas des mockups initiaux, lot 1, lot 2, sept pistes de logo) ont été relus en source, puis **rendus dans un vrai navigateur** (Chromium, Playwright) à 1280 × 720, 1920 × 1080 et 2560 × 1440, en capture d'écran visible et en page entière. Les SVG de `site-prototype/logos/` ont été rendus à 16, 32 et 64 px, à la densité 1 et 2, puis agrandis au pixel près pour juger le rendu réel. Les contrastes ont été calculés avec la formule de luminance du WCAG 2.2.

**Limites.** Les fichiers de travail locaux indiqués (`scratchpad/site/` et `scratchpad/lot2/`) n'existaient plus : les pages ont été retéléchargées depuis les artefacts publiés, ce qui revient au même. Les artboards du canvas (`.dc.html`) dépendent d'un moteur propre au canvas : je les ai rendus après avoir figé leurs variables (premier palier sélectionné), ce qui ne change rien à la mise en page. Aucun test sur un vrai téléphone ni avec un lecteur d'écran.

---

## 1. Verdict en une page

- **Accueil A reste le meilleur socle**, et Gregory a raison de le préférer : c'est le seul où l'illustration fait le travail et où la page ne cherche pas à prouver qu'elle est « interactive ». Il lui manque un moment marquant et une finition typographique.
- **Le moment marquant existe déjà, dans le lot 1 (proposition 1, « La cité vivante »)** : la frise des dix paliers de cité. C'est l'argument visuel le plus fort du projet. Il faut le greffer sur A, pas adopter tout P1.
- **Lot 2, « Le Guet de nuit », a la meilleure idée de récit** (la nuit qui recule jusqu'à l'aube, où l'on s'inscrit), mais l'exécution abîme les images. On garde le récit et la progression de couleur, on jette la lanterne.
- **Logos : aucune piste n'est livrable en l'état.** Le K-obélisque (3) est le meilleur départ, le Monolithe (1) le plus sûr. Tous partagent un défaut de construction : la veine de mana est invisible sur l'or (contraste 1,14:1), donc elle disparaît en petit, en niveaux de gris et pour une partie des daltoniens. Je propose trois directions nouvelles (section 11), dont **Le Nœud**, qui corrige le K-obélisque.
- **Plusieurs maquettes publient ce que le brief interdit** : noms des paliers de cité (lot 1, P1), chiffres décoratifs (lot 1, P3), géographie non validée (lot 2, Atlas). À purger quelle que soit la piste retenue.

---

## 2. Classement des accueils

La consigne parle de six accueils ; il y en a huit à départager (A et B du canvas, trois dans chaque lot). Je les classe tous.

| Rang | Accueil | Note /10 | En une phrase |
|---|---|---|---|
| 1 | **A, « Le seuil de la cité »** (canvas) | 7,5 | Retenu, lisible, l'image porte l'épique ; finition typographique et grand écran à reprendre |
| 2 | **Lot 1, P1, « La cité vivante »** | 7 | Le meilleur moment de la série (dix paliers) ; trop de contenu, autoplay lourd, noms de paliers publiés |
| 3 | **Lot 2, II, « Le Guet de nuit »** | 6,5 | Le meilleur récit ; la lanterne assombrit l'art jusqu'à la boue, images d'unités floues |
| 4 | **Lot 2, III, « La Cité en coupe »** | 6 | Concept fort (de la flèche aux Straumar), mais c'est un catalogue de tous les bâtiments : une page « Le jeu », pas un accueil |
| 5 | **Lot 1, P2, « La chronique »** | 5,5 | Mise en page éditoriale propre, sommaire réussi ; titre rempli d'image et dégradé or-violet kitsch, Cormorant italique, six images encore à générer |
| 6 | **B, « La chronique de la Rupture »** (canvas) | 5 | La veine de mana verticale est une belle idée ; le héros centré « titre + slogan + bouton » est le gabarit le plus générique, et il repose sur des images qui n'existent pas |
| 7 | **Lot 2, I, « L'Atlas des Éclats »** | 4,5 | Une roue SVG procédurale qui ressemble à une datavisualisation, pas à un monde peint ; invente une géographie (huit Régions) non validée |
| 8 | **Lot 1, P3, « La table du royaume »** | 3,5 | L'interface du jeu plaquée sur la vitrine : pastilles de ressources, compteurs (« 60 images de bâtiments »), bento ; l'obélisque coupe le titre en KALEN / DRATH |

### Ce que les captures montrent, au-delà du code

- **A à 1920 px** : le titre en Cinzel 124 px tombe sur les flèches du château, les lettres « TH » se lisent contre les tours éclairées. Le dégradé gauche (78 % à 0 %, s'arrête à 70 %) est trop court.
- **A à 2560 px** : le conteneur reste plafonné à 1280 px. Le contenu devient une île centrale avec 640 px de vide de chaque côté, le texte paraît petit, la bannière « jalon en cours » flotte. L'image, elle, tient bien.
- **A à 1280 × 720** : le héros fait 900 px de haut minimum ; la bande « Jalon en cours » passe sous la ligne de flottaison, ce qui est acceptable, mais le formulaire est coupé en bas.
- **Lot 1, P1** : la frise des dix paliers est superbe en vignettes, mais **l'obélisque ne reste pas au même endroit** d'une image à l'autre (il est vers 50 % du cadre aux paliers 1 à 4, vers 35 % au 7, plus à gauche au 8 et au 10). L'argument « l'obélisque ne bouge pas, la ville grandit » n'est donc pas encore démontré à l'écran : il faut recadrer chaque image (`object-position` par palier) pour épingler l'obélisque.
- **Lot 1, P2** : le mot « Kalendrath » rempli d'une photo de cité avec un dégradé or vers violet est l'effet le plus « généré » de toute la série. Il se lit, mais il dit « modèle de page de jeu mobile ».
- **Lot 2, Guet** : le calque sombre (`brightness(.32)`) éteint la cité ; seul le cercle de lanterne est beau, et il ne suit que la souris (rien au clavier ni au doigt, à part le bouton « Tout éclairer »). Plus bas, le mage et le garde sont des **quarts de grilles Midjourney à environ 560 px agrandis à 900 px** : flous à 1920.
- **Lot 2, Coupe** : la règle d'altitude à droite est collée au bord à 1920 et mange 150 px utiles ; les six portraits d'unités en bas de « Les remparts » sont des vignettes de grilles.
- **Lot 2, Atlas** : la carte est dessinée au code (polygones aléatoires, lignes de mana en courbes). À côté des illustrations Midjourney, elle paraît d'un autre jeu. Les petites étiquettes (« Contrées basses », 11 px #8F8AB0 sur la carte) sont illisibles.

---

## 3. Typographie

**Ce qui est en place partout** : Cinzel (titres, capitales seulement) et Outfit (texte), parfois Cormorant Garamond italique (lot 1, P2). Outfit est la police de l'interface du jeu (Mix v5) : c'est un vrai lien de marque entre le site et le jeu, à garder.

**Les problèmes que l'on voit à l'écran :**

1. **Cinzel n'a pas de minuscules.** Tout titre devient une suite de capitales et petites capitales. Sur un nom de cinq lettres, c'est noble ; sur « UN HÉROS GOUVERNE VOTRE CITÉ. » ou « UN MONDE NEUF À CHAQUE CHAPITRE. » en deux lignes dans une carte, la lecture ralentit et le gris typographique devient uniforme. Cinzel est aussi le premier cliché de la fantasy sur le web (l'ancien document de direction l'avait écarté pour cette raison).
2. **Outfit 300 sur image** (l'accroche du héros, 22 px) : les fûts sont trop fins pour un fond peint chargé, l'ombre portée compense mal. Passer en 400.
3. **Trop de tailles proches** : dans A, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22 px coexistent. Une échelle de six pas suffit.
4. **Apostrophes droites** partout (« qu'aucun », « l'accueil », « d'autre »), pas d'espace fine avant « : ». C'est le détail qui trahit le mieux une page assemblée par une machine pour un lecteur français.
5. **Point médian comme séparateur** (« Reddit · r/Kalendrath », « Palier 1 · Hameau », « FR · EN ») : tic de gabarit.

**Recommandation de système :**

| Rôle | Police | Règle |
|---|---|---|
| Nom « Kalendrath » | **Lettrage du logo**, en tracés | Jamais tapé dans une police : c'est le logo qui l'écrit |
| Titres de section (H1, H2) | **Cinzel 600** | Cinq mots au plus, interlettrage +2 %, jamais en dessous de 28 px |
| Titres de carte, H3, boutons | **Outfit 600**, casse de phrase | « Un héros gouverne votre cité. » |
| Texte courant | **Outfit 400**, 17 à 19 px, interligne 1,6 | 34 em de ligne au plus |
| Citation de lore, glose | **Alegreya italique** (SIL OFL) | Une par page, à la place de Cormorant |

Échelle (desktop, fluide de 1280 à 2560 px) : 14, 17, 21, 28, 40, 64, et le H1 en `clamp(64px, 6.2vw, 168px)`. Toutes ces polices sont sous **SIL OFL 1.1** : auto-hébergement autorisé, sous-ensemble latin et latin étendu en WOFF2, Outfit en fichier variable (un seul fichier pour 400 à 600). Budget réaliste : Cinzel 600 (~28 Ko), Outfit variable (~35 Ko), Alegreya italique (~30 Ko), deux fichiers préchargés.

---

## 4. Couleurs et contrastes

Palette effective des maquettes (proche de Mix v5) : Nuit `#0A0A14`, Nuit 2 `#12101F`, Texte `#F1EEFA`, Secondaire `#A9A5C6`, Mana `#9A8CFF` / `#B9AEFF`, Or `#E9BE74`, Sang `#8E3B34`.

| Texte | Fond | Rapport | Verdict |
|---|---|---|---|
| `#F1EEFA` | `#0A0A14` | 17,2 | Très bien |
| `#A9A5C6` secondaire | `#0A0A14` | 8,3 | Très bien |
| `#8F8AAE` mention IA, 12 px | `#08080F` | 6,1 | Bien |
| `#1A1226` sur bouton or (haut / bas du dégradé) | `#F2CD8A` / `#C9974A` | 12,0 / 6,9 | Bien |
| **Blanc sur bouton violet** (`.btn.vio`, « Rejoindre le Discord ») | `#9A8CFF` → `#7A6CF0` | **2,8 → 4,0** | **Échec AA** sur toute la hauteur du bouton |
| **Mana `#B9AEFF` sur or `#E9BE74`** (veine des logos) | | **1,14** | La veine ne se distingue que par la teinte |
| Nuit du gonfanon `#2A2250` | `#0A0A14` | 1,35 | La moitié sombre du gonfanon disparaît sur fond sombre |
| Or des logos `#E9BE74` | clair `#F2EDE3` | 1,49 | D'où la version claire en bronze `#9A6A1C` (4,48 : juste sous 4,5) |

**À corriger :** le bouton violet (le remplacer par un bouton secondaire à filet, ou un violet foncé `#4B3CC4` avec texte blanc, 7,66:1) ; texte posé sur l'image dans le lot 1, P3 (accroche centrée sur l'obélisque et le ciel clair : illisible par endroits) ; légendes de 11 px sur la carte de l'Atlas.

**Règle de sens à garder** (reprise de l'ancien document, elle était juste) : l'or porte l'action, le mana porte ce qui est vivant (focus, « en cours », veine), le sang une seule surface par page. Aucun aplat violet décoratif, aucun dégradé or-violet.

---

## 5. Rythme, composition et signes d'un site généré

Ce qui se voit dans les captures, par ordre de gravité :

1. **Le verre dépoli partout** (en-tête, formulaire, cartes, bandeau, mot de l'auteur). Il est cohérent avec Mix v5, donc pas à bannir, mais à **réserver à une seule surface par écran** (le formulaire du héros). Sur les cartes, il donne l'aspect « kit SaaS ».
2. **Le filet dégradé après chaque H2** (`.ttl::after`) : un ornement répété à l'identique sur cinq sections cesse d'être un ornement.
3. **Les étiquettes en capitales au-dessus des titres** (lot 1 P1 : « LE GOUVERNEUR », « LES CHAPITRES » ; lot 2 : « 22 H, PREMIÈRE VEILLE ») et **les icônes au trait dans des pastilles** (lot 2, Atlas, cartes) : deux signes classiques.
4. **Le survol qui zoome les images** (mosaïque du lot 1, transect de l'Atlas, pièces de la Coupe).
5. **Les compteurs décoratifs** (lot 1, P3 : « 10 paliers de cité », « 20 bâtiments », « 60 images ») : chiffres sans information, et fuite d'informations que le brief garde.
6. **Rythme vertical irrégulier dans A** : 96 px au-dessus, 40 px en dessous de chaque section ; les sections se collent à la suivante. Prendre une seule valeur, `clamp(80px, 8vw, 160px)`, en haut et en bas.
7. **Halo violet derrière les titres** (`text-shadow … rgba(154,140,255,.25)`) : invisible sur l'image, il salit le titre sur fond uni.

---

## 6. Grand écran, performance, accessibilité, production

### Grand écran (1920 et 2560 px)
- A et B : conteneur figé à 1240 ou 1280 px, typographie en pixels fixes. À 2560, tout rétrécit visuellement. Corriger : `max-width: 1600px` pour la grille, typographie fluide jusqu'à 2560, images d'appoint qui débordent la grille (pleine largeur) pour occuper le grand écran.
- Les lots 1 et 2 dimensionnent tout en unités de conteneur (`cqi`) : le rendu à 2560 est proportionné, c'est la bonne technique à reprendre.
- Les images servies (1400 à 2400 px de large, JPEG) sont trop petites pour un héros en 2560 sur écran haute densité : prévoir 3200 px en AVIF pour ce seul cas.

### Performance (constaté sur les fichiers des artefacts)
- **Lot 1** : 7,3 Mo d'images dans l'artefact. L'accueil P1 charge le héros (339 Ko), dix vignettes (~50 Ko chacune), puis, si l'autoplay tourne, **dix images pleines d'environ 300 Ko** (≈ 3 Mo) et la mosaïque de douze bâtiments (≈ 2 Mo). Ordre de grandeur : 5 à 6 Mo pour un accueil. Le budget de l'ancien document (≤ 550 Ko avant défilement sur PC) est dépassé d'un facteur dix.
- **Lot 2** : 4,9 Mo ; héros 318 à 330 Ko en JPEG 2400 ; aucune image en `loading="lazy"`.
- **Canvas (A)** : 1,6 Mo au total, le plus sobre.
- Partout : polices chargées depuis Google Fonts (interdit par le brief, RGPD), Cinzel + Outfit en cinq graisses + Cormorant.
- Le `backdrop-filter: blur(18px) saturate(1.3)` sur de grandes surfaces posées sur une image coûte cher en défilement sur mobile d'entrée de gamme.

### Accessibilité
- **Mouvement réduit** : le lot 1 coupe l'autoplay si `prefers-reduced-motion` (bien) ; le lot 2 aussi pour l'essentiel, mais l'anneau pulsé de l'Atlas reste en CSS (couvert par la règle globale, à vérifier). L'autoplay de P1 a un bouton « Arrêter » : conforme au critère 2.2.2, mais il démarre seul pendant que le visiteur lit le formulaire.
- **Clavier** : la lanterne du Guet ne réagit qu'au pointeur ; les infobulles des runes s'ouvrent au focus (bien). Dans A, les onglets de paliers ont `role="tab"` sans `tabpanel` ni navigation aux flèches : utiliser un groupe de boutons radio.
- **Libellé du champ e-mail masqué** (`sr-only`) dans A et B : le texte indicatif « votre@adresse.fr » ne suffit pas, mettre un libellé visible.
- **Sélecteur de langue en boutons** : ce doivent être des liens vers la page jumelle, avec `hreflang` et `lang`.
- Bouton de copie de l'adresse (Contact) sans texte visible.
- Cases à cocher de 16 px : la zone cliquable inclut le libellé, donc conforme 2.5.8, mais agrandir la case à 20 px.

### Faisabilité Astro / Cloudflare Pages
- **A est trivial à produire** : une page statique, un îlot JavaScript (sélecteur de paliers, < 2 Ko), `astro:assets` pour générer AVIF + WebP + JPEG en 640 / 960 / 1280 / 1920 / 2560 avec `width` et `height` (aucun CLS).
- **P1 (frise de dix paliers)** : faisable sans framework : boutons radio + `<picture>` empilés, une seule image visible, préchargement de la suivante uniquement.
- **Guet (lanterne)** : faisable en CSS `mask-image` + un écouteur de pointeur, mais c'est l'élément le plus fragile (mobile, clavier, coût de rendu) pour un gain faible.
- **Atlas** : la carte SVG est légère à produire ; c'est sa direction artistique qui pose problème, pas sa technique.
- Polices : `@fontsource` ou fichiers WOFF2 sous-ensemblés dans `site/public/fonts/`, `font-display: swap`, `size-adjust` sur la police de repli.
- Images Midjourney : passer chaque illustration retenue par un recadrage manuel (point focal) avant la génération des tailles ; ne jamais utiliser un quart de grille comme image de contenu.

---

## 7. Corrections précises des deux meilleurs accueils

### A, « Le seuil de la cité » (à retenir comme socle)

1. **Héros** : élargir le dégradé gauche (opaque jusqu'à 30 %, transparent à 62 %) et décaler l'image (`object-position: 72% 38%`) pour que « Kalendrath » ne morde plus sur les flèches. Remplacer le H1 tapé en Cinzel par le **logo en grand** (le lettrage du wordmark retenu).
2. **Grand écran** : grille à 1600 px maximum, H1 en `clamp(64px, 6.2vw, 168px)`, accroche en `clamp(19px, 1.15vw, 26px)`.
3. **Accroche** : Outfit 400 au lieu de 300, `max-width: 32em`, apostrophes typographiques.
4. **Formulaire** : seul élément en verre (opacité 0,72), libellé « Adresse e-mail » visible au-dessus du champ, bouton or **plat** (`#E9BE74`, filet inférieur `#B58A45` de 2 px, sans halo `box-shadow`).
5. **Bande « Jalon en cours »** : la sortir du héros (elle concurrence le bouton) et en faire une ligne de texte sous le formulaire, avec un losange mana.
6. **Cartes « Ce qui vous attend »** : titres en Outfit 600 casse de phrase ; une grande carte et deux petites plutôt que trois identiques ; images d'unités remplacées par leurs **upscales** (les quarts de grille actuels sont recadrés en `background-size: 205%`).
7. **« Une cité qui grandit »** : remplacer les trois onglets par **la frise des dix paliers de P1** (voir hybride H1), en groupe radio, libellés neutres (chiffres romains, pas de noms). Retirer l'onglet désactivé « Niveaux 10 à 15 » tant que ce découpage n'est pas public.
8. **« Le mot de l'auteur »** : remplacer le bouton violet (contraste 2,8) par un bouton à filet.
9. **Rythme** : une seule valeur d'espacement de section ; filet dégradé après le H2 gardé sur une seule section (ou remplacé par un losange).
10. **Pied de page** : « Reddit (r/Kalendrath) » au lieu du point médian ; sélecteur de langue en liens.

### Lot 1, P1, « La cité vivante » (à démonter pour pièces)

1. **Retirer les noms des paliers** (« Hameau », « Village », … « Cité des Sphères ») : le brief (2.3) les garde secrets. Chiffres romains seuls, ou « Premier palier » à « Dixième palier ».
2. **Épingler l'obélisque** : un `object-position` par image pour que l'obélisque soit au même x à l'écran sur les dix paliers. C'est ce qui rendra la séquence magique.
3. **Pas d'autoplay au chargement** : la lecture démarre au clic sur « Voir la cité grandir » ; préchargement de l'image suivante seulement ; vignettes en `-s` (50 Ko) déjà prêtes.
4. **Supprimer la mosaïque de douze bâtiments** (c'est la Galerie) et garder une seule visionneuse « un bâtiment, trois paliers ».
5. **Supprimer les étiquettes en capitales** au-dessus des titres de cartes et le zoom au survol.
6. **Héros** : le formulaire en verre à droite et le titre à gauche se disputent la même hauteur ; empiler (titre, accroche, formulaire) à gauche, laisser l'image respirer à droite, et poser la frise des paliers en bas comme bandeau d'entrée.

---

## 8. Hybrides possibles

- **H1, recommandé : A + la frise de P1.** Structure, sobriété et poids de A ; la section « Une cité qui grandit » devient la frise des dix paliers à obélisque épinglé, qui est le seul moment interactif de la page.
- **H2 : A + la progression de couleur du Guet.** Le fond de la page passe très lentement de la nuit (`#0A0A14`) à un brun d'aube (`#2C1D22`) jusqu'au bloc d'inscription final, intitulé à la manière du Guet (« Le jour se lève sur la cité »). Aucun calque sombre sur les images, aucune lanterne.
- **H3 : A + la veine de B.** Une veine de mana verticale fine relie les sections, avec un nœud en losange à chaque section, et se termine sur la feuille de route, où les nœuds deviennent les jalons. Une seule ligne, pas de lueur.
- **Hors accueil** : la chronique de P2 (sommaire en chiffres romains, rail daté) est parfaite pour la page **Univers** ; la Coupe pour la page **Le jeu** ou la **Galerie** (de la flèche aux Straumar, un bâtiment par étage) ; l'Atlas pour une future page **Monde**, une fois la géographie validée et la carte peinte.

---

## 9. Idées de finition qui élèvent le site

1. **L'obélisque immobile, partout.** Même position à l'écran pour l'obélisque dans le héros, la frise des paliers, la page Univers et la 404 (cadrages choisis à la main). Le visiteur le retrouve sans qu'on le lui dise : c'est la signature du site.
2. **Une ligne de fracture dessinée** entre le héros et le contenu, à la place du fondu au noir : un tracé SVG brisé, et dans la faille un filet mana de 1,5 px. Réutilisée en 404 et en pied de page, nulle part ailleurs.
3. **Typographie française soignée** : apostrophes ’, guillemets « » avec espaces insécables, espace fine avant « ; : ? ! », chiffres romains en Cinzel pour les jalons, chiffres tabulaires dans les dates. Filtre de rendu dans Astro, pas à la main.
4. **Un ornement unique dérivé du logo** : le losange (ou le nœud de la piste 9) sert de puce de liste, de marqueur de jalon, d'anneau de focus du sélecteur de paliers et de séparateur. Un seul motif, décliné, au lieu de filets dégradés et d'icônes au trait.
5. **Anneau de focus de marque** : 2 px mana, décalé de 3 px, et en `#1A1226` sur les boutons or. Le parcours au clavier devient beau, pas seulement conforme.
6. **Transitions entre pages** (View Transitions natives, prises en charge par Astro) : le logo et l'obélisque restent en place pendant que le contenu change. Désactivées en mouvement réduit.
7. **Images à l'arrivée sans saut** : couleur dominante en fond de chaque `<picture>`, puis fondu de 200 ms une fois l'AVIF décodé ; aucune image sans `width` / `height`.
8. **Images Open Graph faites à la main**, une par langue, à partir de la cité au crépuscule et du logo en bas à gauche : c'est ce que verront Reddit, X et Discord avant le site.
9. **Le bouton or comme une plaque de bronze coulée** : aplat, filet inférieur plus sombre, aucun dégradé ni halo ; au survol, l'or s'éclaire de 6 %, rien ne bouge.

---

## 10. Les sept logos

### Classement

| Rang | Piste | Note /10 | Verdict |
|---|---|---|---|
| 1 | **3, Le K-obélisque** | 7 | Seul monogramme qui tient à 16 px ; à reconstruire (lecture « i< » ou « lK ») |
| 2 | **1, Le Monolithe** | 6,5 | Sûr et lisible ; trop trapu (un « pion doré »), veine invisible, wordmark trop fin |
| 3 | **4, Le Gonfanon** | 6 | Le plus riche en système (bannières d'alliance) ; illisible sous 32 px, moitié nuit invisible sur fond sombre (1,35:1) |
| 4 | **2, La Rupture** | 5,5 | La meilleure histoire en un signe, le meilleur monochrome ; bouillie de pixels à 16 px |
| 5 | **5, Le Sceau brisé** | 5 | Excellent cachet secondaire (e-mails, jalons de chapitre), mauvaise marque : à 16 px, un anneau et un trait, on lit un bouton marche-arrêt ou un « 0 » |
| 6 | **7, Le L-obélisque** | 4 | Idée fine, échec de lecture confirmé au rendu : « KAIENDRATH » ; le favicon est un L quelconque |
| 7 | **6, La Taille** | 3 | Lettrage condensé lourd, esprit années 2000, le Λ à barre mana ne dit rien de l'univers |

### Défauts de construction communs

- **La veine mana sur l'or** : `#B9AEFF` sur `#E9BE74` = 1,14:1. Elle n'existe que par la teinte. En niveaux de gris, en impression une couleur, pour un deutéranope et à petite taille, elle disparaît. Correction : **évider** la veine (un canal de fond de 1 unité de chaque côté) ou la poser sur la face d'ombre, jamais directement sur l'or clair.
- **Traits fins non mis à l'échelle** : la veine est un trait de 1,3 à 1,6 unités ; dans le favicon (échelle 0,2), cela fait 0,3 px : rien. Un favicon se **redessine** (grille de 16 et de 32 px, veine de 1 et 2 px pleins, alignée sur le pixel), il ne se réduit pas.
- **Remplissage du favicon** : les symboles étroits (1, 2, 7) occupent un tiers de la largeur du carré ; à 16 px, il reste une épingle de 4 px. Le favicon doit occuper 80 % de la hauteur **et** de la largeur utile.
- **Wordmarks en polices de catalogue** converties en tracés (Tenor Sans, Marcellus, Poppins, Cinzel), interlettrées à +20 à +30 % : à la taille d'un en-tête (28 px de haut pour tout le lockup), les capitales font 6 px et la lecture casse. Il faut un **lettrage dessiné** (partir d'une OFL comme Cinzel ou Marcellus est permis, mais retoucher K, R, A, et l'interlettrage à +8 %), avec une version « petite taille » plus grasse et plus espacée.
- **Version claire** : le bronze `#9A6A1C` sur `#FBF9F4` fait 4,48:1, juste sous le seuil texte. Assombrir à `#8A5E17` (5,4:1) pour les wordmarks utilisés comme texte.

### Corrections des deux meilleures pistes

**3, Le K-obélisque**
1. **Supprimer l'étincelle** au-dessus de la pointe : avec le jour entre la haste et les branches, c'est elle qui fait lire « i » puis « < ».
2. **Souder les branches à la haste** : elles ne touchent la haste qu'en un point ; poser un nœud mana en losange à la jonction (c'est la piste 9 ci-dessous) ou faire naître les branches d'un empattement commun.
3. **Hiérarchie des hauteurs** : les branches montent à y = 0, l'obélisque s'arrête à y = 9,5. L'obélisque doit dépasser (c'est lui le héros), les branches s'arrêter 8 % sous sa pointe.
4. **Poids optique** : les branches (20 unités) paraissent plus grasses que la haste coupée en deux faces ; épaissir la haste de 10 % ou affiner les branches.
5. **Coupe des branches** : coupes horizontales (pierre taillée) plutôt qu'obliques, pour éviter l'effet « logo de marque de luxe ».
6. **Wordmark** : abandonner Poppins (géométrique neutre) pour un lettrage à empattements taillés, cohérent avec Cinzel.

**1, Le Monolithe**
1. **Proportions** : le fût fait environ 1:3 (largeur : hauteur) ; un obélisque se lit à partir de 1:5. Affiner de 35 %, garder le socle.
2. **Pyramidion** : la cassure d'angle est à 35 % de la hauteur ; la remonter à 12 % pour un vrai pyramidion, sinon on lit un crayon.
3. **Veine** évidée (voir plus haut), pleine hauteur, et étincelle supprimée ou fondue dans la pointe.
4. **Socle** : deux gradins de 4,5 et 5,5 unités séparés de 2 : à 32 px, ils fusionnent. Un seul gradin plus haut.
5. **Wordmark** : Tenor Sans est trop maigre au format d'en-tête ; passer à une capitale romaine plus contrastée, interlettrage +8 %.

---

## 11. Trois directions de logo nouvelles

Croquis dans [`logos-ideas/`](logos-ideas/) : chaque planche montre le symbole en grand, le lockup horizontal, les favicons 64, 32 et 16 px, et le monochrome sur clair. Le mot « Kalendrath » y est en police provisoire (à dessiner).

### 8, Le Seuil — [`8-le-seuil.svg`](logos-ideas/8-le-seuil.svg)
Un **losange taillé en deux Éclats**. L'obélisque n'est pas dessiné : il est **le vide entre les deux**, et la veine de mana court dans ce vide. La moitié droite a glissé de 3 unités vers le haut : la Rupture.
- *Pour* : silhouette la plus simple de toutes (un losange), donc la plus forte à 16 px ; le losange est déjà le motif des jalons et des sélecteurs dans toutes les maquettes ; la veine est sur fond sombre, donc visible (pas sur l'or).
- *Contre* : le jeu de contre-forme se perd sur un fond clair chargé ; le losange seul est générique tant qu'on n'a pas vu la fente.

### 9, Le Nœud — [`9-le-noeud.svg`](logos-ideas/9-le-noeud.svg)
Le K-obélisque reconstruit. La haste est un obélisque à deux faces ; les deux branches **naissent d'un nœud de mana en losange**, posé contre la haste : le point de convergence des Straumar, là où le voile s'amincit. Plus d'étincelle, plus de jour entre haste et branches.
- *Pour* : se lit « K » sans hésitation dès 16 px ; l'unique touche mana a une signification de lore (la convergence) ; le nœud seul devient l'ornement du site (puces, jalons, focus) et l'icône de notification du jeu.
- *Contre* : reste une lettre ; le nœud violet sur fond sombre doit garder au moins 2 px à 16 px.

### 10, La Couronne de la cité — [`10-la-couronne.svg`](logos-ideas/10-la-couronne.svg)
Une **cité vue de face** : rempart continu, quatre tours, et au centre l'obélisque, plus haut que tout, fendu d'une fenêtre de mana. C'est l'argument des images de l'Hôtel de ville (« l'obélisque ne bouge pas, la ville grandit autour ») réduit à un pictogramme.
- *Pour* : le seul signe qui raconte la boucle de jeu (bâtir) ; se décline en **paliers** : une cité de 1 à 10 tours pour les badges de palier, les jalons de chapitre ou l'icône de la capitale en jeu ; lisible comme une couronne en petit.
- *Contre* : silhouette de château déjà vue (attention aux logos de jeux mobiles de cités) ; détails (porte, fenêtre) à supprimer sous 24 px.

**Ma préférence pour la suite** : approfondir **9, Le Nœud** comme marque principale (monogramme, favicon, avatar), avec un **lettrage dessiné** pour le wordmark, et garder **10, La Couronne** comme pictogramme de jeu (capitale, paliers). Le Sceau brisé (5) reste le cachet des e-mails et des annonces de chapitre ; le Gonfanon (4) devient le gabarit des bannières d'alliance.

---

## 12. Système de marque proposé

| Élément | Choix | Usage |
|---|---|---|
| Monogramme | Le Nœud (ou K-obélisque corrigé) | Favicon, avatar Discord et X, icône d'application, écran de chargement |
| Wordmark | Lettrage dessiné, deux tailles optiques (grande, petite) | En-tête, pied de page, images Open Graph, titre du héros |
| Cachet | Sceau brisé, daté « An 3000 PR », un par chapitre | E-mails, annonces de chapitre, notes de version |
| Pictogramme de jeu | Couronne de la cité, en paliers | Capitale, badges de palier, jalons |
| Couleurs | Nuit `#0A0A14`, Nuit 2 `#12101F`, Texte `#F1EEFA`, Secondaire `#A9A5C6`, Or `#E9BE74`, Bronze `#B58A45`, Mana `#B9AEFF`, Sang `#8E3B34` | Mêmes valeurs que Mix v5 : le site et le jeu ne font qu'un |
| Règle de couleur | Or = action ; mana = vivant (focus, en cours, veine) ; sang = une surface par page ; jamais de mana posé sur l'or | Site, jeu, communication |
| Typographies | Cinzel (titres courts), Outfit (texte et interface), Alegreya italique (citations) ; SIL OFL, auto-hébergées | Site et jeu |
| Ornement | Le losange-nœud, seul motif décoratif | Puces, jalons, séparateurs, focus |
| Monochrome | Tous les signes testés en une couleur, noir et blanc, sans perte de sens | Impression, gravure, tampons, filigranes |

**Prochaines étapes suggérées** : (1) Gregory choisit entre H1, H2 et H3 ; (2) on dessine le Nœud et son lettrage sur une vraie grille (16, 32, 512 px) ; (3) on recadre les dix images de cité pour épingler l'obélisque ; (4) on lance les upscales Midjourney des unités avant tout usage sur le site.
