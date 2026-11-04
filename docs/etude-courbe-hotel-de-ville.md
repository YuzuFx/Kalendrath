# Étude de la courbe de l'Hôtel de ville — options chiffrées

*Rédigée le 2026-10-30. Aucune option n'est tranchée : ce document prépare la décision de Gregory. Le modèle de référence (`tools/theorycrafting/model.js`) n'est pas modifié dans ses données ; les options passent par un crochet facultatif `P.courbe`.*

## Question

Avec la courbe actuelle (facteur 1,9 pour l'Hôtel de ville, 2 pour le Rite et l'Atelier des Maîtres d'œuvre, durées ×1,15 par niveau), le palier 6 arrive à J683 et le palier 7 (Cité-Obélisque) n'arrive jamais dans l'horizon de 1 500 jours du simulateur. Décision : la fenêtre **J540 à J730** s'applique au **palier 10** (Cité des Sphères, Hôtel de ville niv. 28), fin de la capitale. Il faut une courbe niveau par niveau qui y amène le joueur gratuit actif, avec un palier tous les 3 niveaux.

## Méthode et hypothèses

- **Périmètre** : coût et durée de l'Hôtel de ville, du Rite d'Ancrage Tellurique et de l'Atelier des Maîtres d'œuvre (les trois seuls prérequis de passage de palier). Les mines, entrepôts et autres bâtiments gardent leurs formules.
- **Niveaux inchangés** : jusqu'à Hôtel de ville 13, Rite 6, Maîtres 8 (palier 5), donc les paliers 2 à 5 restent à J2 / J7 / J18 / J84, déjà dans leurs fenêtres. Les options ne diffèrent que **pour la suite** (travées des paliers 6 à 10).
- **Rite et Maîtres** suivent la même forme que l'Hôtel de ville. Ils montent de 2 niveaux par palier contre 3 pour l'Hôtel de ville : leur facteur par niveau est mis à la puissance 1,5 (A et C) pour que la croissance par palier soit la même.
- **Durée de l'Hôtel de ville** : multiplicateur par niveau (référence : ×1,15 par niveau au-delà de 10), appliqué à la durée OGameX (qui dépend aussi du coût et du niveau des Maîtres). Les autres bâtiments gardent ×1,095.
- **Calage** : un paramètre par option (trois pour C) est ajusté par le script pour que le gratuit actif atteigne le palier 10 vers **J635** (milieu de la fenêtre). Profils, colonies (J4 à J90), vitesse ×1 : ceux du simulateur.
- **Hypothèse explicite** : les niveaux 29 et 30 de l'Hôtel de ville (fin du palier 10) prolongent la dernière pente de chaque option ; ils ne comptent pas dans le jour du palier 10, qui est atteint au niveau 28.
- **Bruit du simulateur** : la date est une fonction en escalier du coût (défaut connu du README : la file de construction saute d'un chantier à l'autre). Un même réglage bouge de 15 à 30 jours pour 1 % de coût. Lire les dates à **± 20 jours**.

## Les trois options

| | A · facteur décroissant | B · table plate puis rampe | C · table calée sur des jalons |
|---|---|---|---|
| Principe | Le facteur de coût par niveau baisse à chaque palier : 1,60 / 1,40 / 1,25 / 1,15 / 1,10 (paliers 6 à 10), le tout mis à la puissance 0,52 par le calage ; durée ×1,12 puis ×1,09 … ×1,04 par niveau | Coût identique pour les niveaux d'une même travée, saut entre travées (×1,33, puis ×1,6 dès le palier 8) ; durée plate par travée, saut de ×1,25 à ×1,35 | Jalons visés par palier : P6 J170, P7 J275, P8 J390, P9 J520, P10 J635 ; facteur par niveau calé palier par palier (1,25 / 1,22 / 1,08 / 1,14 / 1,06) ; durée ×1,06 par niveau |
| Forme dans le domaine | Formule à paramètres par palier | Table de paliers | Table niveau par niveau |
| Coût Hôtel de ville niv. 16 / 22 / 28 (éq. bois) | 4,95 M / 11,8 M / 17,0 M | 3,2 M / 6,8 M / 17,3 M | 4,6 M / 10,8 M / 19,2 M |
| Durée Hôtel de ville niv. 28 (× niv. 10) | ×4,4 | ×5,2 | ×3,6 |

Les coûts de base du niveau 1 (400 bois, 250 fer, 100 mana pour l'Hôtel de ville) ne changent pas. Tables complètes niveau par niveau : `node tools/theorycrafting/etude-courbe-hdv.js --tables`.

## Jour d'atteinte de chaque palier (vitesse ×1, empire en croissance)

Courbe actuelle (référence) : P2 J2, P3 J7, P4 J18, P5 J84, P6 J683 (gratuit), au-delà de J1 500 ensuite.

**Option A**

| Profil | P2 | P3 | P4 | P5 | P6 | P7 | P8 | P9 | P10 |
|---|---|---|---|---|---|---|---|---|---|
| Moteur seul | 3 | 7 | 20 | 98 | 221 | 336 | 512 | 602 | 742 |
| **Gratuit actif** | 2 | 7 | 18 | 84 | 187 | 283 | 432 | 507 | **625** |
| Pass payant | 2 | 6 | 17 | 76 | 167 | 253 | 385 | 452 | 557 |
| Gros payeur | 2 | 6 | 16 | 65 | 143 | 215 | 326 | 382 | 470 |
| Gratuit, capitale seule | 2 | 8 | 27 | 107 | 225 | 336 | 501 | 585 | 719 |

**Option B**

| Profil | P2 | P3 | P4 | P5 | P6 | P7 | P8 | P9 | P10 |
|---|---|---|---|---|---|---|---|---|---|
| Moteur seul | 3 | 7 | 20 | 98 | 144 | 182 | 277 | 490 | 785 |
| **Gratuit actif** | 2 | 7 | 18 | 84 | 123 | 155 | 234 | 414 | **661** |
| Pass payant | 2 | 6 | 17 | 76 | 110 | 139 | 210 | 369 | 590 |
| Gros payeur | 2 | 6 | 16 | 65 | 95 | 119 | 179 | 313 | 498 |
| Gratuit, capitale seule | 2 | 8 | 27 | 107 | 156 | 203 | 299 | 497 | 760 |

**Option C**

| Profil | P2 | P3 | P4 | P5 | P6 | P7 | P8 | P9 | P10 |
|---|---|---|---|---|---|---|---|---|---|
| Moteur seul | 3 | 7 | 20 | 98 | 184 | 325 | 484 | 657 | 755 |
| **Gratuit actif** | 2 | 7 | 18 | 84 | 156 | 274 | 408 | 553 | **635** |
| Pass payant | 2 | 6 | 17 | 76 | 140 | 245 | 364 | 493 | 566 |
| Gros payeur | 2 | 6 | 16 | 65 | 119 | 208 | 308 | 417 | 478 |
| Gratuit, capitale seule | 2 | 8 | 27 | 107 | 191 | 328 | 478 | 640 | 737 |

## Comparaison

| Critère (gratuit actif) | A | B | C |
|---|---|---|---|
| Palier 10 | J625 | J661 | J635 |
| Écart gros payeur au palier 10 | 25 % | 25 % | 25 % |
| Écart pass payant au palier 10 | 11 % | 11 % | 11 % |
| Intervalles P5→P6 … P9→P10 (jours) | 103 · 96 · 148 · 75 · 118 | 39 · 32 · 80 · 179 · 248 | 72 · 118 · 134 · 145 · 82 |
| Plus long intervalle / moyenne | 1,4 | 2,2 | 1,3 |
| Palier 10 dans la fenêtre pour le « moteur seul » (sans bonus) | J742, juste hors | J785, hors | J755, hors |
| Palier 10 pour « capitale seule » | J719, dans | J760, hors | J737, juste hors |
| Sensibilité : coût ± 5 % → palier 10 | 532 à 698 | 598 à 674 | 620 à 716 |
| Hôtel de ville niv. 30 atteint | J752 | J1 108 | J774 |
| Plus long chantier d'Hôtel de ville | 33 j (niv. 28) | 40 j (niv. 27) | 31 j (niv. 28) |

Lecture :
- **L'écart payeur ne dépend pas de l'option** (25 % partout, dans la cible de 20 à 30 %) : il vient des accélérateurs et des bonus de profil, pas de la forme de la courbe.
- **A** : rythme régulier jusqu'à P8 puis creux irrégulier (148 j puis 75 j). Une seule formule à décrire, mais les dates sont instables autour de la cible (sensibilité forte vers le bas).
- **B** : les paliers 6 et 7 tombent en un mois chacun (J123, J155), puis un **mur** : 179 j, 248 j pour les deux derniers. L'Hôtel de ville niveau 30 n'arrive qu'à J1 108. C'est le profil à éviter pour la sensation de progression.
- **C** : intervalles réguliers (72 à 145 j) et dernier palier plus court (82 j), qui évite le mur. Le prix : une table à maintenir à la main et recalibrer si l'économie bouge.

## Risques communs

1. **Le simulateur est le maillon faible** (README, « défaut connu »). Le plus long chantier du parcours est une Scierie niveau 31 de 71 jours, identique pour les trois options : l'économie des mines pèse autant que la courbe de l'Hôtel de ville. Recalculer toutes les dates après la correction du comportement du joueur simulé (règle de rentabilité des mines, sessions, colonies).
2. **Fenêtre étroite** : ± 5 % de coût déplace le palier 10 de 70 à 90 jours, donc la fenêtre de 540 à 730 jours est franchie pour une erreur de 5 à 10 % sur l'économie réelle. Prévoir une table réglable côté serveur plutôt qu'une constante figée.
3. **Joueur léger** (une ou deux visites par jour) non modélisé : il sort de la fenêtre dans toutes les options. « Capitale seule » en donne une borne : J719 à J760.
4. **Maîtres d'œuvre** : le niveau 18 divise les durées de tous les bâtiments par 19. Le garder bon marché (A et C) accélère aussi les autres bâtiments ; le laisser coûteux ralentirait tout le jeu. À arbitrer avec les autres paliers de bâtiments.
5. **Palier 5 inchangé (J84)** : si la fenêtre du palier 5 (60 à 120) est revue, tout se décale.
6. **Hors périmètre** : les coûts du Portail des Sphères, des recherches de palier et des bâtiments de palier 6 à 10 (aucun défini). Les emplacements de cité (GDD) ne sont pas simulés.
7. **Écart avec le GDD** : la décision du 2026-10-22 parle d'une table niveau par niveau ; l'option A en est une formule, donc plus éloignée de la décision.

## Recommandation (non tranchée)

**C comme base**, avec la forme de A pour la mise à jour. C est la seule qui garde des intervalles réguliers jusqu'au dernier palier, qui colle à la décision d'une table niveau par niveau et dont les jalons (P6 J170, P7 J275 …) se lisent et se discutent avec les joueurs. Son défaut est de demander un recalage empirique à chaque correction de l'économie : le script `etude-courbe-hdv.js` le fait en quelques secondes. **B est déconseillée** (mur final, niveau 30 à J1 100). **A** reste le bon choix si Gregory préfère une formule à quelques paramètres plutôt qu'une table.

Questions à trancher : jalons des paliers 6 à 9 (ou seulement J635 pour le palier 10) ; faut-il une fenêtre plus basse (J540) pour laisser une marge au joueur léger ; le niveau 30 doit-il être atteint dans l'horizon des 2 ans (A et C : oui, B : non).

## Reproduire

```bash
node tools/theorycrafting/etude-courbe-hdv.js              # calage et tableaux ci-dessus
node tools/theorycrafting/etude-courbe-hdv.js --tables     # + coûts niveau par niveau
node tools/theorycrafting/etude-courbe-hdv.js --cible 600  # autre cible pour le palier 10
node --test tools/theorycrafting/model.test.js tools/theorycrafting/courbes-hdv.test.js
```

Fichiers : `tools/theorycrafting/courbes-hdv.js` (les trois options), `etude-courbe-hdv.js` (calage et rapport), `courbes-hdv.test.js` (garde-fous). Seul changement dans `model.js` : le crochet facultatif `P.courbe` dans `makeCost` et `dureeMult`, sans effet quand il est absent.
