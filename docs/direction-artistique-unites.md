# Direction artistique — Prompts visuels pour les unités

*Document de travail pour la Phase 3 de la roadmap ("Démarrer la direction artistique avec Midjourney"). Contient un brief visuel par unité militaire, prêt à coller dans Midjourney/DALL-E/Gemini/ChatGPT. Prompts en anglais (les IA génératives répondent mieux en anglais), noms d'unités en français — cohérent avec le principe "contenu français d'abord" qui concerne le contenu affiché au joueur, pas les prompts de génération d'image (cf. CLAUDE.md).*

---

## Préambule de style commun

À coller en tête de chaque prompt pour garder une cohérence visuelle sur l'ensemble du roster (ambiance déjà établie pour le système héros : "arcane mystique sombre") :

```
Dark heroic fantasy full-body character/vehicle concept art in a dynamic battle scene, human kingdom under siege by resurgent orc hordes, weathered practical plate and leather gear with hand-forged imperfections, muted earthy palette (iron grey, oxblood red, aged bronze) accented by a clearly visible violet-blue arcane mana glow on runes and weapons, painterly digital illustration, dramatic single-source lighting consistent with the scene, atmospheric battle environment supporting the action without overwhelming the character, sharp readable silhouette with the character as the clear focal point, highly detailed
```

*Traduction (vérification) :* Art conceptuel de personnage/véhicule en pied, heroic fantasy sombre, dans une scène de bataille dynamique, royaume humain assiégé par des hordes d'orcs résurgentes, équipement pratique et usé en plaques et cuir avec des imperfections de forge artisanale, palette terreuse sourde (gris fer, rouge sang séché, bronze vieilli) rehaussée d'une lueur arcanique violet-bleu nettement visible sur les runes et les armes, illustration numérique façon peinture, éclairage dramatique à source unique cohérent avec la scène, environnement de bataille atmosphérique qui soutient l'action sans écraser le personnage, silhouette nette et lisible avec le personnage comme point focal clair, très détaillé

*Correctif du 2026-10-01 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md), essai 3 du réglage `--sw`) : "faint" → "clearly visible" — le mot "faint" semblait étouffer la lueur même à `--sw` modéré, forçant à monter `--sw` très haut pour l'obtenir (au prix de la caractérisation des visages).*

*Correctif structurant du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md), pivot "mise en situation") : "clean neutral studio background" → mise en scène dynamique propre à chaque unité. Décision : plutôt qu'un fond studio neutre partagé, chaque unité est montrée dans une action et un micro-décor qui lui sont propres (l'archer en hauteur qui décoche, le garde qui encaisse une charge, le mage en pleine incantation) — cohérent avec le fait que les unités du roster ont des rôles tactiques très différents qu'un décor générique ne peut pas tous représenter de façon crédible. **Toutes les unités déjà briefées/validées en fond studio (Soldat, Garde, Rôdeur des ombres, Mage de Combat, Franc-Archer) sont à reprendre avec une clause d'action/décor propre une fois ce nouveau format validé** — chaque section ci-dessous précise sa propre mise en situation en plus de la description du personnage.*

**Notes pratiques :**
- Une fois un premier rendu qui te plaît obtenu, utilise `--sref` (Midjourney) sur cette image pour figer le style et le réutiliser sur toutes les unités suivantes — c'est justement l'usage prévu en Phase 3 de la roadmap.
- Chaque unité doit rester lisible **en petite icône** (listes de construction façon Ogame, pas seulement en grand artwork) — même avec un décor, le personnage doit rester le point focal net et la silhouette lisible ; le décor soutient l'action sans noyer le sujet.
- Ajoute tes propres paramètres techniques (`--ar`, `--v`, `--stylize`, etc.) selon l'outil utilisé — pour les scènes avec décor, un format plus large (`--ar 3:2` par exemple) peut mieux convenir qu'un format portrait serré.

---

## 🦶 Unités au sol

### Soldat *(chair à canon)*
```
Common human foot soldier, cheap conscript-tier infantry, light padded leather armor with a partial rusted mail vest, round wooden shield banded in iron, short sword or simple spear, sword or spear already drawn and gripped firmly in a ready grip — not being unsheathed or drawn from behind the back, blade a proportionate readable short-sword length, plain unremarkable tabard, tired weary expression, meant to look replaceable and numerous rather than heroic, dirt and travel-worn gear, charging forward mid-stride across a muddy battlefield, more human soldiers charging alongside in the hazy background, the orc horde visible ahead in the distance across the field
```

**Référence retenue : variation 4** de l'essai 2 "mise en situation" du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) — expression plus inquiète/peu assurée que les autres candidats, ce qui sert mieux le "conscrit quelconque, pas un héros" visé depuis le premier essai en studio.
*Traduction :* Simple fantassin humain, infanterie de conscription bon marché, armure de cuir légère matelassée avec une cotte de mailles partielle rouillée, bouclier rond en bois cerclé de fer, épée courte ou lance simple, tabard quelconque sans distinction, expression fatiguée, doit paraître remplaçable et nombreux plutôt qu'héroïque, équipement sale et usé par la route

### Garde *(tank de ligne)*
```
Heavily armored human line infantry, thick full plate armor plating, large tower shield held in one hand, a single-handed broadsword clearly visible and drawn in the other hand, closed great helm hiding the face, visibly dented, scratched and battle-worn plate armor with chipped edges and old repairs — no pristine or polished surfaces, imposing bulky silhouette, braced in a defensive shield wall stance with the tower shield raised forward to absorb an incoming blow, an orc warrior charging directly at him about to collide with the shield, dust and debris kicked up by the impact
```
*Traduction :* Infanterie de ligne humaine lourdement blindée, épaisse armure de plates complète, grand bouclier tour tenu dans une main, épée large à une main clairement visible et dégainée dans l'autre main, grand heaume fermé cachant le visage, armure visiblement cabossée, griffée et usée par la bataille avec des éclats et de vieilles réparations — aucune surface pristine ou polie, silhouette imposante et massive, posture de défense en mur de boucliers avec le bouclier tour levé pour absorber un coup entrant, un guerrier orc chargeant directement sur lui sur le point de percuter le bouclier, poussière et débris soulevés par l'impact

*Correctif du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md), essai 5) : le "halberd or broadsword" laissait Midjourney choisir et l'épée finissait souvent cachée derrière le bouclier ou remplacée par une arme ambiguë — reformulé pour forcer une épée à une main clairement visible. L'usure ("dented and battle-scarred") était aussi sous-pondérée face au rendu par défaut assez propre/poli de l'ancre — renforcée explicitement.*

**Référence retenue : variation 3** de l'essai "mise en situation" du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) — remplace la référence studio précédente (variation 4 de l'essai 5). Seule variation vraiment "en plein combat", en train de stopper la créature orc avec son bouclier.

### Rôdeur des ombres *(puissant mais mono-cible)*
```
Elite human assassin-warrior, fitted dark leather-and-blackened-steel armor, tattered dark cloak, dual curved blades, lower face hidden by a wrapped mask, faint dark violet magical energy wisping off the weapon edge, crouched in the shadows of a ruined alley or rocky outcrop at night, about to strike down upon an unaware orc sentry standing just below, moonlight catching the blade's edge
```
*Traduction :* Guerrier-assassin humain d'élite, armure ajustée de cuir et d'acier noirci, cape sombre en lambeaux, deux lames courbes, bas du visage caché par un tissu enroulé, faible énergie magique violet sombre s'échappant du tranchant de l'arme, accroupi dans l'ombre d'une ruelle en ruine ou d'un éperon rocheux de nuit, sur le point de frapper une sentinelle orc qui ne l'a pas vu juste en contrebas, clair de lune accrochant le fil de la lame

**Référence retenue : variation 4** de l'essai "mise en situation" du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) — remplace la référence studio précédente (variation 4 de l'essai initial). La variation 2 était visuellement la meilleure mais montrait une dague fusionnée dans l'avant-bras plutôt que tenue en main (erreur d'anatomie) ; la 4 a une prise crédible, la lueur sur la lame et une bonne posture d'assassin.

### Piquier des Marches *(anti-monté)*
```
Border-guard human infantryman armed with a single very long cavalry lance, a simple straight tapered point at the tip, braced in a spear-bracing stance against a charge: front hand gripping underhand near the middle of the shaft, back hand gripping overhand near the butt end which is wedged firmly against the hip or the ground, no gap between either hand and the shaft, turned side-on to face the oncoming threat rather than the viewer, visibly riveted banded metal armor plates layered over a padded gambeson on the torso and forearms, a worn dark-green surcoat with a faded regional insignia over the armor, bare head, short practical hair, face visible in profile or three-quarter view, no scarf, hood or fur wrap, small round buckler strapped to the forearm, bracing against a charging enemy knight clearly visible in the saddle atop an armored warhorse bearing down on him, the lance's point driving toward the horse's barding as it bears down, dust and debris kicked up by the charge, more distant riders visible in the hazy background
```
*Traduction :* Fantassin humain de garde-frontière armé d'une seule très longue lance de cavalerie, une pointe simple et effilée à l'extrémité, en posture d'arrêt de charge : main avant en sous-prise au milieu de la hampe, main arrière en sur-prise près de l'extrémité calée fermement contre la hanche ou le sol, aucun espace entre les mains et la hampe, tourné de profil vers la menace plutôt que vers le spectateur, plaques d'armure métallique à bandes visiblement rivetées par-dessus un gambison matelassé sur le torse et les avant-bras, surcot vert sombre usé avec un insigne régional délavé par-dessus l'armure, tête nue, cheveux courts et pratiques, visage visible de profil ou de trois-quarts, sans écharpe, capuche ni fourrure, petit bouclier rond (targe) sanglé à l'avant-bras, en train d'encaisser un chevalier ennemi clairement visible en selle sur un destrier bardé fondant sur lui, la pointe de la lance visant le caparaçon du cheval au moment de l'impact, poussière et débris soulevés par la charge, d'autres cavaliers visibles au loin dans la brume

*Correctif du 2026-10-04, v6 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md), essai 2) : l'essai avec "lance" a réglé le problème de forme de l'arme (pointe enfin lisible, cavaliers visibles), mais 3 variations sur 4 posaient un problème de mise en scène — personnage tourné dos à la menace pour faire face à la caméra, ou posture qui lit comme un recul/une fuite plutôt qu'un arrêt de charge. v6 précise une vraie technique d'arrêt de charge (prise avant/arrière asymétrique, hampe calée contre la hanche) et impose explicitement que le personnage fasse face au cheval plutôt qu'au spectateur.*

**Référence retenue : variation 2** du lot "Vary (Subtle)" relancé sur la variation 1 de l'essai 2 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) — capture conservée dans [references/piquier-vary-subtle.png](references/piquier-vary-subtle.png). Unité la plus longue à boucler du roster (8 essais au total, studio et mise en situation confondus) du fait de la double contrainte arme longue + interaction avec un second sujet (le cheval) ; prise en main perfectible mais jugée suffisante après ce nombre d'itérations plutôt que de continuer à chercher un résultat parfait.

*Correctif du 2026-10-04, v5 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) : v4 retirait l'adjectif "hooked" mais gardait le mot "pike", qui porte probablement lui-même des associations visuelles confuses dans l'entraînement de Midjourney (bardiche, bec de corbin, hallebarde...) — ce qui expliquerait pourquoi aucune des 6 tentatives précédentes (studio et mise en situation confondues) n'a donné de tête d'arme lisible, même sans crochet explicite. v5 remplace le mot-clé par "lance" (arme longue à pointe simple, sans ambiguïté de forme) plutôt que de continuer à qualifier "pike". **Repli possible si "lance" ne rend pas assez "infanterie lourde anti-cavalerie" : rebasculer sur "halberd"** (déjà cité comme alternative dans le GDD — "pique/hallebarde à crochet") plutôt que de re-complexifier la description autour de "pike".*

### Mage de Combat *(anti-unités légères)*
```
Human battle mage, lightly armored robes reinforced with glowing rune-etched plates, both hands gripping a tall arcane staff topped with a glowing crystal, a massive bolt of violet-blue arcane lightning erupting from the staff's crystal toward the enemy, a large glowing rune circle radiating brightly beneath their feet and casting light upward across the character and surroundings, dynamic wide spellcasting stance, slender frame engulfed by an intense magical aura, wind-swept robes and cloak, standing atop a ruined stone battlement, unleashing the bolt toward an orc warband charging across the valley below, a clear unobstructed line of sight between the mage and the target
```
*Traduction :* Mage de combat humain, robes légèrement blindées renforcées de plaques gravées de runes lumineuses, les deux mains tenant un grand bâton arcanique surmonté d'un cristal lumineux, un puissant éclair arcanique bleu-violet jaillissant du cristal du bâton vers l'ennemi, un large cercle runique rayonnant brillamment sous ses pieds et éclairant le personnage et les alentours, large posture dynamique de lancement de sort, silhouette fine engloutie par une aura magique intense, robes et cape soulevées par le vent, debout sur un rempart de pierre en ruine, libérant l'éclair vers une horde d'orcs chargeant dans la vallée en contrebas, une ligne de mire dégagée entre le mage et la cible

**Référence retenue : variante bâton, variation 2** de l'essai 2 "mise en situation" du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) — pose dynamique de face, cercle runique enfin bien visible, éclair qui part clairement du cristal vers la cible. Préférée à la variante "deux mains" testée en parallèle (plus impressionnante en pure énergie mais moins lisible en petite icône, sans point focal d'arme).

*Historique : l'essai 1 (un seul bras tendu, pas de bâton, cercle runique "se formant") avait été rejeté pour manque d'impact — cercle et éclair trop discrets. Palette conservée en bleu-violet arcanique (cohérent avec le reste du roster) plutôt qu'une variante feu/orange, qui casserait la signature couleur déjà posée sur toutes les unités.*

### Franc-Archer *(anti-mobilité)*
```
Human ranger archer (human ears, not elven), light leather scout gear with a hooded cloak, quiver full of rune-tipped arrows, agile and lightly equipped, perched on a high vantage point atop a ruined stone watchtower overlooking a besieged valley, a clear unobstructed line of sight toward the valley below with nothing blocking the arrow's trajectory, longbow fully drawn with a rune-tipped arrow nocked and about to be released, focused aiming stance, muted forest-camouflage tones, a hazy orc warband and distant siege fires visible far below in the background
```
*Traduction :* Archer-rôdeur humain (oreilles humaines, pas elfiques), équipement léger de cuir avec une cape à capuche, carquois rempli de flèches à pointe runique, agile et légèrement équipé, perché en hauteur au sommet d'une tour de guet en ruine surplombant une vallée assiégée, une ligne de mire dégagée vers la vallée en contrebas, rien ne bloquant la trajectoire de la flèche, arc long complètement bandé avec une flèche à pointe runique encochée sur le point d'être relâchée, posture de visée concentrée, tons sourds de camouflage forestier, une horde d'orcs et des feux de siège visibles au loin en contrebas, dans la brume

**Référence retenue : variation 1** de l'essai "mise en situation" du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md)) — remplace la référence studio précédente (variation 3).

*Correctif du 2026-10-04 post-essai : deux dérives observées sur l'essai initial — oreilles elfiques sur une variation (hors-lore, l'unité est humaine), et trajectoire de tir qui semblait viser un pan de mur au premier plan sur deux variations faute de préciser une ligne de mire dégagée. Les deux corrigées explicitement dans le brief ci-dessus — à surveiller sur toute future unité à distance/visée (Mage de Combat notamment).*

---

## 🐎 Unités montées

### Cavalier *(mobile/anti-unités)*
```
Human cavalry rider on a fast war-horse, medium plate armor, one-handed lance or sword, small round shield, kingdom-colored tabard or banner streaming behind, dynamic mid-charge galloping pose, dust kicked up beneath the horse's hooves
```
*Traduction :* Cavalier humain sur un cheval de guerre rapide, armure moyenne, lance ou épée à une main, petit bouclier rond, tabard ou bannière aux couleurs du royaume flottant derrière lui, posture dynamique en pleine charge au galop, poussière soulevée sous les sabots du cheval

### Paladin *(tank d'élite)*
```
Heavily armored human paladin knight, ornate full plate armor engraved with golden sacred motifs, mounted on a massive barded warhorse, large heraldic kite shield, heavy warhammer or blessed longsword, faint golden holy light aura around the figure, noble imposing bearing
```
*Traduction :* Chevalier paladin humain lourdement blindé, armure de plates complète et ornée gravée de motifs sacrés dorés, monté sur un imposant destrier caparaçonné, grand bouclier héraldique en écu, lourd marteau de guerre ou épée longue bénie, faible aura de lumière dorée et sacrée autour de la silhouette, prestance noble et imposante

### Pourfendeur *(duelliste/anti-élite)*
```
Lone human knight duelist in distinctive dark tarnished armor, riding an agile lean warhorse, two-handed sword or a broken lance held ready, torn cape flowing, confrontational forward-leaning stance, marked as a specialist hunter of enemy knights and elite riders rather than common troops
```
*Traduction :* Chevalier duelliste humain solitaire dans une armure sombre et ternie distinctive, monté sur un destrier agile et élancé, épée à deux mains ou lance brisée tenue prête, cape déchirée flottante, posture de confrontation penchée vers l'avant, marqué comme un chasseur spécialisé d'autres chevaliers et cavaliers d'élite ennemis plutôt que de troupes communes

### Chevaucheur des Plaines *(harceleur)*
```
Light human skirmish cavalry rider, minimal leather armor for speed, riding a lean fast nervous horse, short recurve bow or throwing axes, leaning forward in a hit-and-run raiding posture, dusty muted colors, no heavy shield or armor
```
*Traduction :* Cavalier léger humain d'escarmouche, armure de cuir minimale pour la vitesse, monté sur un cheval fin, rapide et nerveux, arc court recourbé ou haches de jet, penché vers l'avant dans une posture de raid éclair (frappe-et-fuite), couleurs sourdes et poussiéreuses, sans bouclier ni armure lourde

---

## 🏰 Engins de siège

### Brise-Rempart *(anti-défenses)*
```
Massive wheeled siege engine, thick reinforced iron plating, large mounted arcane cannon or catapult arm aimed at fortifications, small visible crew operating it, slow and imposing scale, clearly built to demolish fixed structures rather than fight infantry, smoke or mana-charged glow from its main weapon
```
*Traduction :* Immense engin de siège à roues, plaques de fer épaisses renforcées, grand canon arcanique ou bras de catapulte monté visant des fortifications, petit équipage visible l'actionnant, échelle lente et imposante, clairement construit pour démolir des structures fixes plutôt que combattre l'infanterie, fumée ou lueur chargée de mana s'échappant de son arme principale

### Catapulte de Rupture *(anti-fortification)*
```
Great siege catapult or battering ram reinforced with glowing arcane runes carved into wood and iron, heavy swinging arm or metal-capped ram head at the front, hauled by draft beasts or a small crew, massive scale designed to shatter gates and walls, weathered wood and iron construction
```
*Traduction :* Grande catapulte de siège ou bélier renforcé de runes arcaniques lumineuses gravées dans le bois et le fer, lourd bras oscillant ou tête de bélier à embout métallique à l'avant, tracté(e) par des bêtes de trait ou un petit équipage, échelle massive conçue pour briser portes et remparts, construction en bois et fer usés par le temps

---

## Points encore ouverts

- [ ] Palette de couleurs définitive (royaume du joueur vs factions ennemies) — à figer une fois les premiers essais Midjourney validés
- [ ] Reaper (classe héros General, cf. GDD 5.5) — pas encore de nom/description, à traiter avec le reste du système héros
- [ ] Unités civiles (Récupérateur, Caravane, Convoi, Éclaireur, Pionnier) et défenses statiques — pas encore de brief visuel
