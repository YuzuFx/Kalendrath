# Rakorn — audit visuel et ergonomique

Date : 15 novembre 2026. Agent : Codex, mission visuelle déléguée.

## État réel de l’observation

**Audit connecté réalisé en lecture seule**, après connexion personnelle de Gregory dans Chromium dédié. Accueil public, Royaume (`/home`), Inventaire, Métiers (artisanat et récolte), Marché et infobulle d’ingrédient consultés. Compte : personnage niveau 7, Mineur 11, Forgeron 10. Aucun combat, achat, vente, équipement, lancement de fabrication/récolte, collecte de récompense, message ni validation d’adresse effectué.

Consignes consultées : `CLAUDE.md` et `docs/sessions/2026-11-02-synthese.md`. Aucune proposition de changement de la direction artistique ou des mécaniques de Kalendrath n’est arrêtée ici.

Accès initial par outil web et requête HTTP indisponible ; observation ensuite réussie dans Chromium dédié via CDP. Les constatations reposent sur les écrans rendus, des captures et les animations calculées du navigateur. Aucun mot de passe, cookie, stockage de session ou profil Chrome personnel consulté.

## Premières observations publiques vérifiées

Source : [accueil Rakorn](https://www.rakorn.fr/), observation dans Chromium au viewport 1280 × 720. Preuve archivée : [capture de l’accueil](rakorn-2026-11-15/accueil-public-1280x720.png).

- Fond noir et charbon, accents or, illustration panoramique de forteresse et montagnes au coucher du soleil. La photographie n’est pas le registre : les visuels sont des illustrations fantasy à rendu réaliste.
- Grand titre à empattements en capitales ; textes explicatifs plus simples ; boutons or marqués. Navigation à pictogrammes encadrés de losanges.
- Une vitrine d’interface occupe le bas de l’accroche : liste de marché sur fond sombre, filtres latéraux, quantités et prix en colonnes. La liste du marché connecté a ensuite été examinée séparément.
- La page présente les chaînes de fabrication avec de grandes icônes d’objets détourées, reliées par des flèches : matière, intermédiaire, équipement, pièce d’ensemble. Une fiche d’objet associe statistiques, durabilité, prérequis et paliers de bonus d’ensemble. Les couleurs différencient des raretés sur la présentation.
- L’annonce des fonctionnalités suit des sections numérotées, avec onglets thématiques. Le DOM décrit notamment un aperçu des métiers organisé en métiers en haut, travail au centre et fiche à droite. L’organisation connectée observée est détaillée ci-dessous.

La lecture de l’API d’animations du navigateur confirme des animations CSS sur l’accueil : `rpg-lp-breathe`, durée 16 secondes en boucle, appliquée à l’illustration de fond ; `rpg-lp-rise`, 900 ms pour plusieurs éléments d’entrée ; `rpg-lp-vitrine`, 1 100 ms ; `rpg-lp-mythique`, 5,5 secondes en boucle sur des noms d’objets mythiques. Les noms techniques et durées viennent du navigateur, pas d’une supposition sur des captures. Aucune conclusion sur l’amplitude ou la fluidité perçue n’est tirée de cette seule liste. Les animations connectées sont documentées plus bas.

Une capture de page entière a aussi été réalisée temporairement ; certaines sections hors écran y sont vides ou non révélées. Elle ne permet donc pas de conclure à des images manquantes ou à des défauts de rendu. La capture de viewport est la preuve conservée dans le dépôt.

## Écrans connectés et preuves

Captures dans `docs/archives/rakorn-2026-11-15/`. Un rectangle sombre masque volontairement le rappel contenant l’adresse e-mail : ce n’est pas un défaut de Rakorn. Les premières captures magenta ont été remplacées par un masque neutre. Onglet dédié : `rakorn-visuel-audit`, distinct de celui de l’agent gameplay. Navigateur et contexte laissés ouverts.

| Écran | Capture | Observation |
|---|---|---|
| Royaume | [royaume-1280x720.png](rakorn-2026-11-15/royaume-1280x720.png) | Paysage central ouvert, statut à gauche, premiers pas et tâches à droite. Récompenses fortement mises en avant, sans les prendre. |
| Inventaire | [inventaire-1280x720.png](rakorn-2026-11-15/inventaire-1280x720.png) | Grille de matières à gauche, portrait et équipement à droite ; contours de rareté colorés et quantités dans les coins. Sac plein explicite, piles encore extensibles. |
| Artisanat impossible | [metiers-1280x720.png](rakorn-2026-11-15/metiers-1280x720.png) | Bloc de pierre sélectionné, ingrédient manquant rouge, bouton Fabriquer atténué. Liste à gauche, objet au centre, gains et commandes à droite. |
| Artisanat possible | [recette-lingot-fer.png](rakorn-2026-11-15/recette-lingot-fer.png) | Lingot de fer sélectionné, ingrédients suffisants, bouton or disponible. La sélection n’a pas lancé de production. |
| Ingrédient au survol | [ingredient-survol.png](rakorn-2026-11-15/ingredient-survol.png) | Fer : nom, rareté, possédé/requis 100/5, indication clic pour récolte et clic droit pour Codex. Ces clics n’ont pas été déclenchés. |
| Récolte | [recolte-consultation.png](rakorn-2026-11-15/recolte-consultation.png) | Quantité, énergie, durée ; réserve partagée et état « Abondant ». Aucun lancement. |
| Marché | [marche-1280x720.png](rakorn-2026-11-15/marche-1280x720.png) | Lignes compactes : prix moyen, prix minimal, vendeurs, disponibilité ; filtres, ensembles, tri. Message indiquant explicitement des offres cachées. Aucun achat ni encaissement. |
| Métiers mobile | [metiers-mobile-390x844.png](rakorn-2026-11-15/metiers-mobile-390x844.png) | Navigation en bas avec libellés, bandeau haut réorganisé, onglets Récolte/Artisanat. Grande zone centrale vide dans cette capture ; continuité du parcours à vérifier. |

## Anneaux et ingrédients : mécanisme vérifié

L’objet central de Métiers est une **image AVIF détourée**, et non une scène 3D animée. Deux **anneaux SVG** l’encadrent. L’API `document.getAnimations()` et les keyframes calculées donnent :

| Élément | Animation | Mesure |
|---|---|---|
| Objet | `rpg-mtx-flotte` | Boucle 6 s ; `translateY(5px)` → `translateY(-5px)` → `translateY(5px)`, interpolation douce. Course totale de 10 px. |
| Anneau extérieur | `rpg-sct-tourne` | Tour complet en 120 s, linéaire, sens normal. |
| Anneau intérieur | `rpg-sct-tourne` | Tour complet en 90 s, linéaire, sens inverse. |
| Halo et socle | `rpg-sct-respire`, `rpg-sct-flamme` | Boucles de 5 s et 3,4 s relevées. Leur nom seul ne prouve pas l’amplitude du rendu. |
| Ambiance | `rpg-dsl-respire`, `rpg-dsl-monte` | Lueur de 6 s ; plusieurs particules aux durées étalées approximativement entre 11 et 18 s. |

Deux captures cadrées, [t0](rakorn-2026-11-15/objet-anime-t0.png) et [t+2,2 s](rakorn-2026-11-15/objet-anime-t2200.png), complètent les preuves DOM. Aucun lancement nécessaire pour observer cette présence au repos. Les durées longues expliquent la discrétion des anneaux. Pas de mesure de FPS ou de performance réalisée.

**Interprétation :** la composition donne de la valeur à une matière banale. Décor et lumière restent derrière, anneaux périphériques et silhouette nette. La réussite est dans la superposition de couches simples, pas dans une illustration dont chaque détail serait animé.

### Réduction des mouvements

Émulation `prefers-reduced-motion: reduce` dans l’onglet d’audit, puis retour au réglage initial. La lévitation disparaît des animations actives, mais les deux anneaux continuent à 120 s et 90 s. Prise en compte **partielle pour ce composant**, sans conclusion générale sur l’accessibilité. Aucune préférence de compte modifiée.

### Largeur mobile

Émulation à 390 × 844, puis restauration à 1280 × 720. Largeur de document mesurée : 384 px pour un viewport de 390 px ; aucun débordement horizontal global détecté à cet instant. Navigation en bas avec icône et libellé. Le panneau de recette visible sur ordinateur n’apparaît pas dans la capture ; celle-ci montre surtout progression, onglets et ambiance vide. Choix de recette et défilement nécessitent un contrôle complémentaire sur mobile réel. Ce seul instant ne prouve pas une fonctionnalité absente ou cassée. Aucun test tactile ou physique effectué.

## Trois forces, trois réserves

**Forces :**

1. Une matière devient une récompense visuelle : grand objet détouré, lévitation légère, halo et anneaux, avec liste et commandes à proximité.
2. Une grammaire commune relie les écrans : charbon/or, losanges, icônes illustrées, raretés et panneaux cohérents entre inventaire, métiers et marché.
3. La progression reste proche de la décision : jalons, deux gains d’XP, quantités possibles et infobulle 100/5 relient objectif et ingrédients.

**Réserves :**

1. Lisibilité secondaire fragile : légendes petites, lettres espacées, gris sombre sur noir, particulièrement au marché. Constat visuel, sans mesure WCAG de contraste.
2. Repérage demandant de l’apprentissage : barre latérale essentiellement iconographique sur ordinateur ; accès au Codex par clic droit annoncé dans une infobulle, donc moins découvrable et à vérifier pour le tactile.
3. Ambiance à arbitrer avec l’efficacité : grande zone centrale consacrée à l’objet, nombreuses alertes lumineuses sur l’accueil et le bandeau ; parcours mobile incomplet dans cette vérification, anneaux maintenus en mode mouvements réduits. Fatigue à long terme non testée.

## Pistes de transposition à Kalendrath

Pistes d’interface seulement, sans modifier le GDD. Planche de style et architecture cible relues pour rester dans le cadre existant.

| Principe observé | Piste à prototyper | Garde-fou |
|---|---|---|
| Objet détaché et mouvements légers | Mettre en scène une ressource ou un équipement avec image fixe et petites couches SVG/CSS. | Garder le rendu Kalendrath validé ; ne pas reprendre les illustrations Rakorn. |
| Anneaux périphériques | Motif arcanique lent autour de l’objet sélectionné, selon les runes et accents violet-bleu de la planche de style. | Ne pas animer chaque cellule ; arrêt complet avec réduction des mouvements. |
| Fiche près de la recette | Possédé/requis, bénéfice et provenance visibles dans le contexte. | Information disponible sans survol ni clic droit, notamment sur mobile. |
| Jalons visibles | Prochain déblocage et distance restante d’après les règles validées. | Aucun coût ni palier ajouté depuis cet audit : cela relève du simulateur. |
| Écrin réutilisable | Composant commun de fiche et vignette dans React. | Vérifier chiffres et états avant d’ajouter des effets. |

La piste immédiatement exploitable est le composant de présentation d’un objet sélectionné : illustration fixe, effets indépendants, fiche concise. Son intérêt peut être évalué sans attendre un système complet de métiers. Cet audit ne justifie pas à lui seul un élargissement de la V1.

## Limites

Compte existant de niveau 7 ; pas de tutoriel neuf ni de contenu joué jusqu’au niveau 60. Pas de combat ou de résultat de fabrication observé, pas de fiche détaillée d’offre marchande vérifiée par cet agent, pas de test clavier complet, lecteur d’écran, FPS ou réseau. Les chiffres de l’accueil public sont des déclarations du site. Le rapport gameplay complète ce périmètre. Les captures décrivent un instant d’un jeu évolutif.
