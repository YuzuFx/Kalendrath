# Direction artistique — Planche de style

*Document de travail pour la Phase 3a de la roadmap ("Planche de style Midjourney pour figer palette, matières et ambiance", cf. [feuille-de-route-projet-jeu.md](feuille-de-route-projet-jeu.md) et [decision-architecture-cible.md](decision-architecture-cible.md)). Prompts en anglais, cohérent avec [direction-artistique-unites.md](direction-artistique-unites.md).*

---

## Outil retenu : Midjourney

Décidé le 2026-09-29. Plan **Basic** (facturation annuelle, ~8 $/mois) pour démarrer — ~200 jobs image/mois, largement suffisant pour figer le style puis produire le roster d'unités déjà briefé. Upgrade possible vers **Standard** (~24 $/mois, relax illimité) si le rythme de génération le justifie.

**Pourquoi Midjourney plutôt que ChatGPT ou Gemini :** `--sref` permet de figer un rendu validé et de le réappliquer sur des dizaines de générations indépendantes (personnages, bâtiments, icônes) — c'est exactement le besoin de cette phase. ChatGPT Plus et Google AI Pro sont des abonnements généralistes où la génération d'image n'est qu'une fonctionnalité annexe, sans mécanisme équivalent de verrouillage de style, et pour un coût comparable ou supérieur.

## Méthode

1. **Amorçage** — un prompt par type de sujet (personnage, architecture, icône, motif d'interface), 1 grid chacun.
2. **Variations** — affiner le(s) favori(s) retenu(s) en gardant le prompt de base.
3. **Verrouillage** — upscale le gagnant, récupérer son URL, l'appliquer en `--sref <url>` sur un prompt d'unité déjà écrit (cf. [direction-artistique-unites.md](direction-artistique-unites.md)) et sur le prompt d'icône ci-dessous, pour valider que le style tient sur des sujets différents avant de l'utiliser pour tout le roster.

## Prompts d'amorçage

### 1 — Portrait ancre (personnage) (v2, corrigée après premiers retours)
Passe 1 : visage lu comme trop âgé/trop marqué ("battle-worn"/"weathered" poussent vers des rides profondes), et la lueur runique ("faint... glow") ressortait à peine — imperceptible sur un portrait, donc inexploitable comme signature visuelle. Correctifs : vieillissement/marques tempérés et explicitement bornés, lueur décrite comme nettement visible plutôt que "faible".
```
Dark heroic fantasy character portrait, human kingdom under siege by resurgent orc hordes, a seasoned battle-hardened human commander in weathered practical plate armor with hand-forged imperfections, rugged and determined, middle-aged rather than elderly, muted earthy palette (iron grey, oxblood red, aged bronze) accented by prominent clearly glowing violet-blue arcane runes etched into the armor plating and pauldron, painterly digital illustration, dramatic single-source side lighting, clean neutral dark studio background, sharp readable silhouette, highly detailed, bust shot --ar 1:1 --stylize 250 --no elderly, frail, deep wrinkles, old age, faint glow, dim
```
*Traduction (vérification) :* Portrait de personnage heroic fantasy sombre, royaume humain assiégé par des hordes d'orcs résurgentes, un commandant humain aguerri et endurci par les combats en armure de plates pratique et usée avec des imperfections de forge artisanale, rude et déterminé, d'âge mûr plutôt qu'âgé, palette terreuse sourde (gris fer, rouge sang séché, bronze vieilli) rehaussée de runes arcaniques violet-bleu nettement lumineuses et gravées dans le plastron et l'épaulière, illustration numérique façon peinture, éclairage dramatique à source unique de côté, fond de studio neutre sombre, silhouette nette et lisible, très détaillé, cadrage buste

### 2 — Architecture / environnement
```
Dark heroic fantasy stronghold interior, weathered stone and hand-forged iron architecture, ancient support pillars carved with faintly glowing violet-blue arcane runes, muted earthy palette (iron grey, oxblood red, aged bronze), a single dramatic shaft of side light cutting through dust and shadow, painterly digital illustration, moody atmospheric, highly detailed, empty of characters --ar 16:9 --stylize 250
```
*Traduction :* Intérieur de forteresse heroic fantasy sombre, architecture en pierre usée et fer forgé artisanal, anciens piliers de soutien gravés de runes arcaniques violet-bleu faiblement lumineuses, palette terreuse sourde (gris fer, rouge sang séché, bronze vieilli), un unique rayon de lumière dramatique traversant la poussière et l'ombre, illustration numérique façon peinture, ambiance atmosphérique, très détaillé, sans personnage

### 3 — Icône de ressource (v3, corrigée après passes 1 et 2)
Passe 1 : lueur dérivant vers l'orange/rouge, mise en scène "photo produit". Passe 2 : lueur et mise en scène corrigées, mais "claw setting" a fait lire le rendu comme un bijou (bague/anneau à 4 griffes) plutôt que comme une ressource brute. Correctif v3 : suppression du vocabulaire de joaillerie, reformulation autour de "matériau brut / ressource de craft", exclusions explicites en `--no`.

*Repère externe (hors style retenu) : le même prompt testé sur Gemini gratuit donne une icône plate à la composition très lisible (cristal tenu par des mains/pinces de pierre, silhouette simple) — utile comme repère de **composition/lisibilité**, pas comme source de style puisque le `--sref` reste basé sur les rendus Midjourney.*
```
Dark heroic fantasy RPG resource icon, a raw uncut mana crystal embedded in a small chunk of weathered rock and raw iron ore, clearly a crafting material / raw resource, not jewelry, not a wearable ring or gemstone jewelry, uniform faint violet-blue arcane glow only, muted earthy palette (iron grey, aged bronze) for the rock and ore, flat simple digital illustration icon style, isolated on a clean flat dark neutral background, centered composition, simple bold readable silhouette designed to stay legible at small icon scale, highly detailed but not visually noisy --ar 1:1 --stylize 150 --no photography, orange, red, fire, reflection, floating, ring, jewelry, wearable, gemstone jewelry, engagement ring, band, claw setting, prongs, metal band
```
*Traduction :* Icône de ressource RPG heroic fantasy sombre, un cristal de mana brut non taillé incrusté dans un petit morceau de roche usée et de minerai de fer brut, clairement un matériau de craft / une ressource brute, pas un bijou, pas une bague ou un bijou en pierre précieuse portable, lueur arcanique violet-bleu uniforme et exclusive, palette terreuse sourde (gris fer, bronze vieilli) pour la roche et le minerai, style d'icône d'illustration numérique plate et simple, isolé sur un fond plat neutre sombre, composition centrée, silhouette simple et lisible conçue pour rester lisible à petite échelle, très détaillé mais visuellement sobre

### 4 — Motif de cadre / interface (v2, corrigée après passe 1)
Passe 1 : Midjourney a produit un anneau métallique 3D façon bijou/portail posé au sol, pas un cadre plat exploitable comme asset d'UI. Correctifs : vocabulaire recentré sur un asset de bordure rectangulaire plat, `--no` pour exclure l'interprétation "objet 3D".
```
Dark heroic fantasy rectangular UI panel border frame, flat 2D game interface asset texture, carved weathered stone inlaid with hand-forged iron banding, faintly glowing violet-blue arcane rune engravings running along the border only, muted earthy palette (iron grey, oxblood red, aged bronze), empty dark center, flat orthographic frontal view like a texture asset, no characters, highly detailed border ornamentation, dark neutral background --ar 1:1 --stylize 150 --no photography, jewelry, ring, portal, 3D render, shadow, ground, perspective
```
*Traduction :* Cadre de bordure de panneau d'UI rectangulaire heroic fantasy sombre, texture d'asset d'interface de jeu plate en 2D, pierre sculptée usée incrustée de bandes de fer forgé, gravures runiques arcaniques violet-bleu faiblement lumineuses courant uniquement le long de la bordure, palette terreuse sourde (gris fer, rouge sang séché, bronze vieilli), centre vide sombre, vue frontale plate et orthographique façon asset de texture, sans personnage, ornementation de bordure très détaillée, fond neutre sombre

**Notes pratiques :**
- Ces 4 prompts ciblent volontairement des usages différents : le 1 et le 2 servent à trouver "l'image ancre" pour le `--sref`, le 3 et le 4 testent que le style survit à l'échelle icône/UI (pertinent pour le design system de 3a : carte de bâtiment, ligne de ressource, compteur).
- Midjourney ne produit pas de maquette d'écran complète — ces rendus alimentent la palette/matières du design system, pas l'assemblage des écrans lui-même (ça reste un travail de maquette séparé, cf. checklist 3a de la roadmap).
- Une fois le `--sref` figé, documenter son URL ici pour que toutes les générations suivantes (unités, icônes) le réutilisent. Pour cette passe 2, ajouter `--sref <URL de l'ancre>` en fin de prompt (icône et cadre) pour tester la cohérence du style en même temps que la correction de composition.

## Image ancre retenue

Figée le 2026-10-01 — portrait ancre (prompt 1 v2), variation subtile, upscale Subtle :

```
--sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png
```

À ajouter en fin de prompt pour toute génération voulant reprendre ce style (unités du roster, icônes, cadres UI).

**Leçon à reporter sur [direction-artistique-unites.md](direction-artistique-unites.md) :** le préambule de style commun utilise encore "a faint violet-blue arcane mana glow" — la même formulation qui rendait la lueur runique quasi invisible sur le prompt 1 avant correction ici. À corriger (glow "clearly visible"/"prominent" plutôt que "faint") avant de lancer le roster d'unités, pour éviter de regénérer tout le lot une fois le problème découvert.

## Test croisé du `--sref` — réglage du `--sw` (en cours)

Objectif : vérifier que l'ancre s'applique correctement sur des sujets différents (unité, icône) avant de lancer tout le roster. Test fait sur le Soldat (unité la plus "sans magie" du roster, donc cas limite) et l'icône de ressource (prompt v3).

**Essai 1 — `--sw` par défaut (~100), 2026-10-01 :** lueur arcanique quasi absente sur le Soldat (cohérent avec son lore de conscrit non-équipé, mais pas de transfert de palette visible non plus), icône quasi identique au rendu obtenu sans `--sref` du tout — conclusion : le poids par défaut est trop faible pour qu'on voie l'effet de l'ancre.

**Essai 2 — `--sw 500`, 2026-10-01 :** nette amélioration sur l'icône (fond sombre et dramatique, cohérent avec l'ancre). Sur le Soldat, la lueur arcanique apparaît enfin (éclat sur l'arme/la main, marque runique sur l'épaule) — confirme que `--sw` est le bon levier. **Mais** effet de bord : le visage du Soldat dérive vers "aventurier héroïque confiant" au lieu de "conscrit fatigué et quelconque" explicitement demandé dans son brief — risque de gommer la hiérarchie visuelle voulue entre unités de base et unités d'élite (Paladin, etc.) si on généralise ce réglage à tout le roster.

**Essai 3 — `--sw 275`, lancé le 2026-10-01, résultat pas encore reçu.** Objectif : trouver le point d'équilibre entre "trop faible" (essai 1) et "trop fort / écrase la caractérisation" (essai 2). Prompts exacts utilisés (mêmes que les essais précédents, seul `--sw` change) :

```
… (prompt Soldat complet, cf. direction-artistique-unites.md) --ar 2:3 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```
```
… (prompt icône v3 complet, cf. section 3 ci-dessus) --ar 1:1 --stylize 150 --no photography, orange, red, fire, reflection, floating, ring, jewelry, wearable, gemstone jewelry, engagement ring, band, claw setting, prongs, metal band --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

**Prochaine étape dès reprise :** regarder le résultat de l'essai 3 — en particulier si le visage du Soldat redevient quelconque/fatigué tout en gardant une trace de lueur arcanique. Si oui, figer `--sw 275` (ou proche) comme réglage standard pour tout le roster et le documenter plus haut dans "Image ancre retenue". Si le compromis n'est toujours pas bon, tester une valeur encore entre 100 et 275, ou accepter de moduler le `--sw` unité par unité selon son tier (plus fort pour les unités d'élite proches de l'archétype "commandant" de l'ancre, plus faible pour les unités communes/déclassées).

## Points encore ouverts

- [x] Image ancre choisie et URL du `--sref` figé — voir "Image ancre retenue"
- [ ] Réglage du `--sw` à figer (essai 3 à `--sw 275` en attente de résultat, cf. section ci-dessus) — bloquant avant de lancer tout le roster
- [ ] Reporter la correction "faint glow" → "clearly visible glow" sur le préambule de [direction-artistique-unites.md](direction-artistique-unites.md)
- [ ] Palette de couleurs définitive validée sur rendu réel (cf. point ouvert similaire dans [direction-artistique-unites.md](direction-artistique-unites.md))
