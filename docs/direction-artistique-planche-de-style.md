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

**Essai 3 — `--sw 275`, lancé le 2026-10-01, résultat reçu.** Objectif : trouver le point d'équilibre entre "trop faible" (essai 1) et "trop fort / écrase la caractérisation" (essai 2). Prompts exacts utilisés (mêmes que les essais précédents, seul `--sw` change) :

```
… (prompt Soldat complet, cf. direction-artistique-unites.md) --ar 2:3 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```
```
… (prompt icône v3 complet, cf. section 3 ci-dessus) --ar 1:1 --stylize 150 --no photography, orange, red, fire, reflection, floating, ring, jewelry, wearable, gemstone jewelry, engagement ring, band, claw setting, prongs, metal band --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

**Résultat :**
- **Icône :** bon résultat sur les 4 variations — cristal de mana brut bleu-violet net, encastré dans roche/minerai, aucune dérive vers bijou/anneau, aucune dérive orange/rouge/feu. Le style ancre (sombre, dramatique) tient bien à `--sw 275`. **Prompt figé tel quel.**
- **Soldat :** mitigé. Sur les 4 variations, 3 visages restent plutôt jeunes/confiants (pas assez "conscrit quelconque"), 1 seule s'en approche. Surtout : la lueur arcanique reste **quasi invisible sur les 4**, contrairement à l'essai 2 (`--sw 500`) où elle apparaissait nettement. Donc `--sw 275` n'a pas récupéré le défaut de l'essai 1 (lueur absente) tout en gardant partiellement celui qu'on cherchait à corriger (visage pas assez quelconque) — pire des deux compromis plutôt que bon milieu.

**Hypothèse sur la cause :** le préambule utilisait encore "a faint violet-blue arcane mana glow" au moment de cet essai (correction du point ouvert ci-dessous pas encore appliquée) — c'est probablement ce mot "faint" dans le *texte* qui étouffe la lueur à `--sw` modéré, et seul un `--sw` très fort (500) arrivait à la forcer malgré le texte, au prix de la dérive du visage. Le vrai levier pour la lueur serait donc le texte du prompt, pas `--sw` — cranker `--sw` ne serait qu'un palliatif qui abîme la caractérisation en même temps.

Correctif appliqué le 2026-10-01 sur [direction-artistique-unites.md](direction-artistique-unites.md) : "faint" → "clearly visible" dans le préambule commun.

**Essai 4 à lancer (prochaine étape) :** reprendre le prompt Soldat avec le préambule corrigé, en gardant `--sw 275` (qui préserve mieux la caractérisation que 500) :

```
Dark heroic fantasy full-body character/vehicle concept art, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source side lighting, clean neutral studio background, sharp readable silhouette, highly detailed, Common human foot soldier, cheap conscript-tier infantry, light padded leather armor with a partial rusted mail vest, round wooden shield banded in iron, short sword or simple spear, plain unremarkable tabard, tired weary expression, meant to look replaceable and numerous rather than heroic, dirt and travel-worn gear --ar 2:3 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

À vérifier sur le résultat : la lueur apparaît-elle enfin nettement sans faire dériver le visage vers "héros confiant" ? Si oui → `--sw 275` + préambule corrigé devient le réglage standard pour tout le roster (icône déjà validée dessus). Si la lueur reste absente malgré le mot corrigé → le levier est bien `--sw` et non le texte ; remonter progressivement entre 275 et 500 (ex. 350–400) en acceptant un compromis, ou moduler `--sw` par tier d'unité (plus fort pour les élites proches de l'archétype "commandant" de l'ancre, plus faible pour les communes). Si la lueur apparaît mais le visage dérive quand même → le problème est ailleurs dans le prompt Soldat lui-même (reformuler "tired weary expression" en des termes plus résistants au tirage du `--sref`).

**Résultat de l'essai 4, reçu le 2026-10-01 :** net progrès — confirme que le texte était bien la cause principale (cf. hypothèse ci-dessus).
- Variation 1 (éclair) : lueur très marquée mais effet "foudre de mage" trop démonstratif pour un conscrit, fond désertique hors-brief — écartée.
- **Variation 2 (retenue) :** jeune, traits fatigués/inexpérimentés, silhouette "remplaçable" bien lue — correspond au brief mieux que les essais précédents. Pas de lueur nettement visible dessus, mais c'est cohérent avec le lore du Soldat (conscrit non-équipé, déjà noté comme un résultat acceptable dès l'essai 1) plutôt qu'un défaut à corriger.
- Variation 3 : bien exécutée mais dérive vers "vétéran grisonnant", plus proche d'une unité d'élite — écartée pour ce rôle.
- Variation 4 : lueur discrète et visible (petite marque bleue sur l'épaulière) sans dérive de visage — bonne option de repli si on veut une trace de magie sur ce conscrit.

**Décision : `--sw 275` + préambule corrigé ("clearly visible") est figé comme réglage standard pour tout le roster** (icône et unité tous deux validés dessus). La prévalence variable de la lueur d'une variation à l'autre est normale et acceptable : elle doit de toute façon varier selon le tier de l'unité (quasi absente sur un conscrit, nette sur une unité d'élite/magique) plutôt qu'être uniforme.

**Référence retenue pour l'archétype Soldat :** variation 2 de l'essai 4 (jeune conscrit inexpérimenté) — à upscale et à utiliser comme référence de cohérence si d'autres générations du Soldat sont nécessaires plus tard (portrait, variantes d'équipement, etc.).

## Suite du roster — premier lot (Garde, Rôdeur des ombres)

Premiers tests du réglage standard (`--sw 275` + préambule corrigé) sur deux unités du roster, 2026-10-04.

**Rôdeur des ombres — validé.** Les 4 variations confirment que le réglage tient sur une unité avec son propre brief magique (pas de surcharge entre la lueur du préambule et "faint dark violet magical energy" du brief — les deux se combinent en une seule signature cohérente sur la lame). **Référence retenue : variation 4** — cheveux visibles (pas de capuche complète), double dague, posture et ambiance "assassin" bien lues.

**Garde — à reprendre (essai 5 lancé).** Gabarit massif, bouclier tour et heaume fermé bien là sur les 4 variations, mais deux défauts :
- L'arme n'est pas clairement lisible comme une épée — le "halberd or broadsword" du brief laissait Midjourney choisir, et l'arme finissait souvent cachée derrière le bouclier ou ambiguë (lames doubles sur une variation).
- L'armure rend "chevalier poli/propre" plutôt que "cabossée et marquée de cicatrices de bataille" — l'usure demandée dans le brief était sous-pondérée face au rendu par défaut assez propre de l'ancre.

Correctif appliqué le 2026-10-04 sur le brief Garde dans [direction-artistique-unites.md](direction-artistique-unites.md) : arme reformulée en épée à une main explicitement visible et dégainée (bouclier dans l'autre main), usure de l'armure renforcée et rendue non-négociable ("no pristine or polished surfaces").

**Essai 5 à lancer :**
```
Dark heroic fantasy full-body character/vehicle concept art, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source side lighting, clean neutral studio background, sharp readable silhouette, highly detailed, Heavily armored human line infantry, thick full plate armor plating, large tower shield held in one hand, a single-handed broadsword clearly visible and drawn in the other hand, closed great helm hiding the face, wide stable battle stance, visibly dented, scratched and battle-worn plate armor with chipped edges and old repairs — no pristine or polished surfaces, implying countless frontline clashes, imposing bulky silhouette --ar 2:3 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

À vérifier sur le résultat : l'épée est-elle désormais clairement identifiable (pas cachée derrière le bouclier, pas ambiguë) ? L'armure montre-t-elle une usure visible (chocs, éraflures, réparations) plutôt qu'un rendu poli ?

**Résultat de l'essai 5, reçu le 2026-10-04 :** net progrès sur les deux défauts visés.
- Variation 1 : épée présente mais non dégainée (au fourreau) — ne répond pas au brief, écartée.
- **Variation 2 :** épée dégainée et clairement visible, armure bien marquée par l'usure (rouille, éraflures) — bon candidat.
- Variation 3 : épée tenue du mauvais côté, rendu incohérent (bouclier et épée mal répartis entre les mains) — écartée.
- **Variation 4 (retenue) :** épée dégainée et visible avec une légère lueur arcanique bleutée sur le fil de la lame, armure cabossée/usée bien lue — meilleur équilibre entre le brief (épée, usure) et la signature du roster (lueur discrète, cohérente avec un tank de ligne sans brief magique propre, entre le quasi-rien du Soldat et le net du Rôdeur).

**Décision : variation 4 retenue comme référence pour l'archétype Garde.** Les deux défauts de l'essai initial (arme ambiguë, armure trop propre) sont corrigés — brief Garde figé dans [direction-artistique-unites.md](direction-artistique-unites.md).

## Suite du roster — deuxième lot (Piquier des Marches, Mage de Combat, Franc-Archer)

Tests du réglage standard sur trois unités supplémentaires, 2026-10-04.

**Piquier des Marches — à reprendre (essai 1 rejeté).** Le gabarit rustique de garde-frontière est là, mais 2 variations sur 4 montrent des erreurs d'anatomie/physique : pique traversant littéralement le corps sur l'une, prise en main improbable sur l'autre. Cause probable : "pike/halberd" ambigu (comme pour l'épée du Garde) et absence de précision sur la prise en main, qui laissent Midjourney improviser une pose incohérente sur une arme aussi longue et fine.

Correctif appliqué le 2026-10-04 sur [direction-artistique-unites.md](direction-artistique-unites.md) : une seule arme (pique, plus de "/halberd"), prise à deux mains explicitement décrite (hampe contre l'épaule, tête crochetée vers l'avant, "not clipping through the body").

**Essai 2, reçu le 2026-10-04 :** le problème d'anatomie est corrigé — prise à deux mains cohérente et pique qui ne traverse plus le corps sur les 4 variations. **Mais rejeté pour une autre raison :** silhouette trop proche du Soldat et du Franc-Archer — même base de cape/capuche en fourrure et cuir brut qui domine le rendu, bouclier à peine visible, armure "banded" peu lisible, et la touche "earthy browns and **greens**" du brief ne ressort quasiment pas (tout reste dans les bruns). Le Piquier devrait pourtant se distinguer comme un fantassin plus armé que l'Archer (cuir léger) mais moins qu'un chevalier, avec une silhouette de "garde-frontière" plutôt que de "rôdeur" — hors, actuellement rien ne l'en différencie fortement à l'œil.

Correctif proposé pour l'essai 3 : retirer la capuche/cape (partagée avec le Franc-Archer), rendre l'armure à bandes métalliques explicitement visible sur le torse, ajouter une pièce d'équipement distinctive (surcot/tabard vert sombre avec un insigne régional usé) pour ancrer la teinte verte du brief et casser la ressemblance avec les deux autres unités en cuir.

**Essai 3 à lancer :**
```
Dark heroic fantasy full-body character/vehicle concept art, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source side lighting, clean neutral studio background, sharp readable silhouette, highly detailed, Border-guard human pikeman, visibly riveted banded metal armor plates layered over a padded gambeson on the torso and forearms, a worn dark-green surcoat with a faded regional insignia over the armor, no hood or heavy fur cloak, short practical hair with the face clearly visible, a single very long hooked pike held firmly in both hands with a clear anatomically correct two-handed grip, the shaft resting against the shoulder and the hooked head pointing forward, not clipping through the body, small round buckler strapped to the forearm, planted wide defensive stance angled forward --ar 2:3 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

**Essai 4, reçu le 2026-10-04 :** net progrès, les deux défauts de l'essai 2 sont réglés sur les 4 variations — prise à deux mains enfin crédible (mains bien refermées sur la hampe, plus de main flottante/déconnectée), plus de capuche/écharpe (têtes et visages dégagés), armure à bandes lisible. Le surcot vert ressort nettement sur les variations 3 et 4.

**Nouveau défaut identifié :** la pique sort du cadre en haut sur les 4 variations — attendu, le `--ar 2:3` (portrait) ne laisse pas la place à une arme "very long" tenue en diagonale sur toute sa longueur une fois les autres contraintes de cadrage par défaut appliquées.

**Essai 5 à lancer** — ajout d'une consigne de cadrage explicite pour garder l'arme entière dans le champ :
```
Dark heroic fantasy full-body character/vehicle concept art, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source side lighting, clean neutral studio background, sharp readable silhouette, highly detailed, wide full-body shot with the camera pulled back so the entire pike from butt to hooked tip is fully visible within frame, nothing cropped out, Border-guard human pikeman, both hands visibly closed around a single very long hooked pike held diagonally across the body, one hand gripping just below the hooked head and the other hand gripping lower near the waist, no gap between either hand and the shaft, visibly riveted banded metal armor plates layered over a padded gambeson on the torso and forearms, a worn dark-green surcoat with a faded regional insignia over the armor, bare head, short practical hair, face and neck clearly visible, no scarf, hood or fur wrap, small round buckler strapped to the forearm, planted wide defensive stance angled forward --ar 2:3 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275 --no floating weapon, weapon merging with hand, disconnected grip, gap between hand and shaft, extra weapon, scarf, hood, cropped weapon, weapon cut off by frame
```

**Essai 5, reçu le 2026-10-04 :** le cadrage est corrigé (arme entière visible, crochet net sur plusieurs variations), mais l'ensemble est jugé en retrait par rapport à l'essai 4 — éclairage plus dur/sombre, surcot vert quasi absent, lecture plus "guerrier" que "garde-frontière". Cause probable : la longue liste `--no` ajoutée pour forcer le cadrage a sur-contraint le prompt et tiré le rendu vers un résultat moins soigné esthétiquement (effet classique de sur-contrainte sur Midjourney). **Mise en pause du Piquier** sur ce point précis — pas de décision prise entre repartir du texte de l'essai 4 avec juste `--ar` ajusté, ou accepter le crop partiel de la pointe (convention courante en concept art de personnage).

**Mage de Combat — validé. Référence retenue : variation 1** (modèle masculin).

**Franc-Archer — validé. Référence retenue : variation 3.**

## Pivot structurant — mise en situation plutôt que fond studio (2026-10-04)

En comparant au rendu des cartes d'unités d'Aleryos et d'Embercraft (jeux de référence), le fond de studio neutre commun à toutes les unités a été remis en question : il produit des fiches cohérentes entre elles mais anonymes, alors que chaque unité du roster a un rôle tactique et une mécanique de jeu différents (l'archer tire à distance, le garde encaisse en ligne, le mage lance des sorts, le rôdeur frappe en embuscade) qui gagnent à être montrés plutôt que décrits.

**Option envisagée puis écartée :** personnage isolé sur fond neutre (comme actuellement) + décor générique réutilisé composé dans l'UI (CSS/layering). Écartée car elle ne permet pas à chaque unité d'avoir une action et un décor qui lui sont propres — un mage en pleine incantation et un rôdeur en embuscade n'ont pas de raison de partager un même arrière-plan pour être cohérents.

**Décision : chaque unité est générée directement dans sa propre mise en situation** (action + micro-décor adaptés à son rôle), plutôt que sur un fond neutre partagé. Le préambule commun est corrigé en conséquence dans [direction-artistique-unites.md](direction-artistique-unites.md) : "clean neutral studio background" → consigne de scène de bataille dynamique propre à chaque unité, avec le personnage qui reste le point focal net.

**Conséquence :** les 5 unités déjà validées en fond studio (Soldat, Garde, Rôdeur des ombres, Mage de Combat, Franc-Archer) seront à reprendre avec une mise en situation une fois ce nouveau format validé — à ne pas refaire avant d'avoir confirmé que le style `--sref` tient toujours une fois un vrai décor ajouté.

**Unité test : Franc-Archer**, repris avec son brief mis à jour (perché sur une tour de guet en ruine, arc complètement bandé, horde d'orcs et feux de siège visibles en contrebas dans la brume) :
```
Dark heroic fantasy full-body character/vehicle concept art in a dynamic battle scene, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source lighting consistent with the scene, atmospheric battle environment supporting the action without overwhelming the character, sharp readable silhouette with the character as the clear focal point, highly detailed, Human ranger archer, light leather scout gear with a hooded cloak, quiver full of rune-tipped arrows, agile and lightly equipped, perched on a high vantage point atop a ruined stone watchtower overlooking a besieged valley, longbow fully drawn with a rune-tipped arrow nocked and about to be released, focused aiming stance, muted forest-camouflage tones, a hazy orc warband and distant siege fires visible far below in the background --ar 3:2 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

À vérifier sur le résultat : le style de l'ancre (palette, lueur, matières) tient-il toujours avec un vrai décor derrière le personnage ? Le personnage reste-t-il le point focal net malgré la scène ? Le format plus large (`--ar 3:2`) convient-il mieux qu'un portrait serré pour ce genre de composition ?

**Résultat, reçu le 2026-10-04 : pivot validé.** Le style de l'ancre (palette, lueur, matières) tient très bien avec un vrai décor, le `--ar 3:2` fonctionne bien pour ce type de composition, et l'ambiance gagne nettement par rapport au fond studio. **Référence retenue : variation 1.**

Deux dérives identifiées à corriger pour la suite (déjà reportées dans le brief Franc-Archer de [direction-artistique-unites.md](direction-artistique-unites.md)) :
- Variation 2 : oreilles elfiques — dérive hors-lore (l'unité est humaine), probablement l'archétype "ranger/archer" qui tire le style vers des tropes elfiques. À surveiller sur toute unité à l'arc/à distance : préciser "human ears, not elven" au besoin.
- Variations 3 et 4 : la flèche semble viser un pan de mur au premier plan plutôt que la vallée — rien dans le prompt ne garantissait une ligne de mire dégagée. À reprendre sur toute unité en action de visée/tir à distance : préciser explicitement une ligne de mire dégagée vers la cible.

**Prochaine étape :** reprendre les 4 autres unités déjà validées en fond studio (Soldat, Garde, Rôdeur des ombres, Mage de Combat) avec une mise en situation propre à chacune, sur le modèle du Franc-Archer.

## Suite du roster — mise en situation (Soldat, Garde, Rôdeur des ombres, Mage de Combat)

**Soldat — essai 1, reçu le 2026-10-04 : à reprendre.** Bonne énergie de charge sur les 4 variations (mouvement, boue, poussière, autres soldats flous en arrière-plan — le côté "nombreux" du brief est bien lu), mais l'arme pose problème sur les meilleurs candidats : variation 2 (bon visage) montre l'épée à mi-dégainage dans le dos plutôt qu'en main prête à combattre ; variation 3 a une lame disproportionnée, plus courte qu'une épée courte (proche du couteau).

Correctif appliqué le 2026-10-04 sur [direction-artistique-unites.md](direction-artistique-unites.md) : arme explicitement déjà dégainée et tenue en prise de combat (pas en train d'être dégainée), longueur de lame proportionnée précisée.

**Essai 2 à lancer :**
```
Dark heroic fantasy full-body character/vehicle concept art in a dynamic battle scene, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source lighting consistent with the scene, atmospheric battle environment supporting the action without overwhelming the character, sharp readable silhouette with the character as the clear focal point, highly detailed, Common human foot soldier, cheap conscript-tier infantry, light padded leather armor with a partial rusted mail vest, round wooden shield banded in iron, short sword or simple spear, sword or spear already drawn and gripped firmly in a ready grip — not being unsheathed or drawn from behind the back, blade a proportionate readable short-sword length, plain unremarkable tabard, tired weary expression, meant to look replaceable and numerous rather than heroic, dirt and travel-worn gear, charging forward mid-stride across a muddy battlefield, more human soldiers charging alongside in the hazy background, the orc horde visible ahead in the distance across the field --ar 3:2 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

**Résultat, reçu le 2026-10-04 : validé.** Les deux défauts de l'essai 1 sont corrigés sur les 4 variations — arme bien en main, taille de lame cohérente. **Référence retenue : variation 4** — expression plus inquiète/peu assurée que les autres (notamment la 2, également solide), ce qui sert mieux le "conscrit quelconque, pas un héros" du brief.

**Garde — mise en situation, reçu le 2026-10-04 : validé. Référence retenue : variation 3.** La seule des 4 variations vraiment "en plein combat" — bouclier levé en train de stopper un orc qui percute juste au moment du rendu, dynamique et lisible.

**Rôdeur des ombres — mise en situation, reçu le 2026-10-04 : validé avec un bémol. Référence retenue : variation 4.** La variation 2 était visuellement la plus aboutie (posture, ambiance) mais montrait la dague fusionnée dans l'avant-bras plutôt que tenue en main — erreur d'anatomie. La variation 4 n'a pas ce défaut : prise crédible, lueur bien visible sur la lame, main au sol, bonne posture d'assassin.

**Mage de Combat — mise en situation, reçu le 2026-10-04 : rejeté, manque d'impact.** Le cercle runique au sol reste trop discret ("a glowing rune circle forming" — même défaut de sous-pondération que le "faint" qu'on avait dû corriger ailleurs dans le préambule), et l'éclair partant d'une seule main en ligne fine manque de présence. Demande explicite : plus d'impact visuel, en gardant la palette bleu-violet du roster plutôt que de basculer sur du feu/orange (qu'on a justement exclu ailleurs pour la cohérence de palette).

**Essai 2 à lancer — deux pistes en parallèle :**

*Variante A — deux mains :*
```
Dark heroic fantasy full-body character/vehicle concept art in a dynamic battle scene, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source lighting consistent with the scene, atmospheric battle environment supporting the action without overwhelming the character, sharp readable silhouette with the character as the clear focal point, highly detailed, Human battle mage, lightly armored robes reinforced with glowing rune-etched plates, both arms outstretched with violet-blue arcane lightning erupting from both hands at once, a large glowing rune circle radiating brightly beneath their feet and casting light upward across the character and surroundings, dynamic wide spellcasting stance, slender frame engulfed by an intense magical aura, wind-swept robes and cloak, standing atop a ruined stone battlement, unleashing twin bolts of violet-blue arcane lightning toward an orc warband charging across the valley below, a clear unobstructed line of sight between the mage and the target --ar 3:2 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

*Variante B — bâton arcanique :*
```
Dark heroic fantasy full-body character/vehicle concept art in a dynamic battle scene, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source lighting consistent with the scene, atmospheric battle environment supporting the action without overwhelming the character, sharp readable silhouette with the character as the clear focal point, highly detailed, Human battle mage, lightly armored robes reinforced with glowing rune-etched plates, both hands gripping a tall arcane staff topped with a glowing crystal, a massive bolt of violet-blue arcane lightning erupting from the staff's crystal toward the enemy, a large glowing rune circle radiating brightly beneath their feet and casting light upward across the character and surroundings, dynamic wide spellcasting stance, slender frame engulfed by an intense magical aura, wind-swept robes and cloak, standing atop a ruined stone battlement, unleashing the bolt toward an orc warband charging across the valley below, a clear unobstructed line of sight between the mage and the target --ar 3:2 --stylize 250 --sref https://cdn.midjourney.com/8c4d6ce1-2b39-4487-b1c7-c83ed8ed7ce2/0_0.png --sw 275
```

**Résultat, reçu le 2026-10-04 : validé, tranché en faveur de la variante bâton.** Les deux variantes gagnent nettement en impact par rapport à l'essai 1 — cercle runique enfin bien visible sur les deux, éclairs beaucoup plus présents. La variante "deux mains" est impressionnante en pure énergie mais dilue la lisibilité (pas de point focal d'arme, silhouette moins nette en petite icône). **Référence retenue : variante bâton, variation 2** (haut-droite) — pose dynamique de face, cercle runique net, éclair qui part clairement du cristal vers la horde en contrebas. Brief figé dans [direction-artistique-unites.md](direction-artistique-unites.md) sur la version bâton.

## Points encore ouverts

- [x] Image ancre choisie et URL du `--sref` figé — voir "Image ancre retenue"
- [x] Reporter la correction "faint glow" → "clearly visible glow" sur le préambule de [direction-artistique-unites.md](direction-artistique-unites.md) — fait le 2026-10-01
- [x] Réglage du `--sw` figé à **275** (préambule corrigé) — validé sur icône et Soldat (essai 4, 2026-10-01)
- [x] Pivot "mise en situation" (décor propre à chaque unité plutôt que fond studio) validé sur le Franc-Archer — 2026-10-04
- [x] Soldat repris en mise en situation — validé (essai 2), référence : variation 4 — 2026-10-04
- [x] Garde repris en mise en situation — validé, référence : variation 3 — 2026-10-04
- [x] Rôdeur des ombres repris en mise en situation — validé, référence : variation 4 — 2026-10-04
- [x] Mage de Combat repris en mise en situation — validé (essai 2, variante bâton), référence : variation 2 — 2026-10-04
- [ ] Reprendre le Piquier des Marches (en pause depuis l'essai 5, cf. section dédiée) avec le nouveau format
- [ ] Palette de couleurs définitive validée sur rendu réel (cf. point ouvert similaire dans [direction-artistique-unites.md](direction-artistique-unites.md))
- [ ] Lancer la génération du reste du roster d'unités (cf. [direction-artistique-unites.md](direction-artistique-unites.md)) avec le réglage désormais figé : préambule corrigé + mise en situation + `--sref` + `--sw 275`, en acceptant une lueur plus ou moins marquée selon le tier de chaque unité
