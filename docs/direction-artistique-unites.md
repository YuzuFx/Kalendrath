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
Common human foot soldier, cheap conscript-tier infantry, light padded leather armor with a partial rusted mail vest, round wooden shield banded in iron, short sword or simple spear, plain unremarkable tabard, tired weary expression, meant to look replaceable and numerous rather than heroic, dirt and travel-worn gear
```
*Traduction :* Simple fantassin humain, infanterie de conscription bon marché, armure de cuir légère matelassée avec une cotte de mailles partielle rouillée, bouclier rond en bois cerclé de fer, épée courte ou lance simple, tabard quelconque sans distinction, expression fatiguée, doit paraître remplaçable et nombreux plutôt qu'héroïque, équipement sale et usé par la route

### Garde *(tank de ligne)*
```
Heavily armored human line infantry, thick full plate armor plating, large tower shield held in one hand, a single-handed broadsword clearly visible and drawn in the other hand, closed great helm hiding the face, wide stable battle stance, visibly dented, scratched and battle-worn plate armor with chipped edges and old repairs — no pristine or polished surfaces, implying countless frontline clashes, imposing bulky silhouette
```
*Traduction :* Infanterie de ligne humaine lourdement blindée, épaisse armure de plates complète, grand bouclier tour tenu dans une main, épée large à une main clairement visible et dégainée dans l'autre main, grand heaume fermé cachant le visage, posture de combat large et stable, armure visiblement cabossée, griffée et usée par la bataille avec des éclats et de vieilles réparations — aucune surface pristine ou polie, suggérant d'innombrables affrontements en première ligne, silhouette imposante et massive

*Correctif du 2026-10-04 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md), essai 5) : le "halberd or broadsword" laissait Midjourney choisir et l'épée finissait souvent cachée derrière le bouclier ou remplacée par une arme ambiguë — reformulé pour forcer une épée à une main clairement visible. L'usure ("dented and battle-scarred") était aussi sous-pondérée face au rendu par défaut assez propre/poli de l'ancre — renforcée explicitement.*

### Rôdeur des ombres *(puissant mais mono-cible)*
```
Elite human assassin-warrior, fitted dark leather-and-blackened-steel armor, tattered dark cloak, dual curved blades or one massive two-handed sword, lower face hidden by a wrapped mask, faint dark violet magical energy wisping off the weapon edge, crouched predatory stance, singled out for a decisive killing strike rather than fighting a crowd
```
*Traduction :* Guerrier-assassin humain d'élite, armure ajustée de cuir et d'acier noirci, cape sombre en lambeaux, deux lames courbes ou une immense épée à deux mains, bas du visage caché par un tissu enroulé, faible énergie magique violet sombre s'échappant du tranchant de l'arme, posture accroupie et prédatrice, ciblé pour un coup fatal décisif plutôt que pour combattre une foule

### Piquier des Marches *(anti-monté)*
```
Border-guard human pikeman, visibly riveted banded metal armor plates layered over a padded gambeson on the torso and forearms, a worn dark-green surcoat with a faded regional insignia over the armor, no hood or heavy fur cloak, short practical hair with the face clearly visible, a single very long hooked pike held firmly in both hands with a clear anatomically correct two-handed grip, the shaft resting against the shoulder and the hooked head pointing forward, not clipping through the body, small round buckler strapped to the forearm, planted wide defensive stance angled forward
```
*Traduction :* Piquier humain de garde-frontière, plaques d'armure métallique à bandes visiblement rivetées, portées par-dessus un gambison matelassé sur le torse et les avant-bras, surcot vert sombre usé avec un insigne régional délavé par-dessus l'armure, sans capuche ni grande cape en fourrure, cheveux courts et pratiques avec le visage clairement visible, une seule très longue pique crochetée tenue fermement à deux mains avec une prise anatomiquement correcte et lisible, la hampe reposant contre l'épaule et la tête crochetée pointant vers l'avant, sans traverser le corps, petit bouclier rond (targe) sanglé à l'avant-bras, posture défensive large et plantée, orientée vers l'avant

*Correctif du 2026-10-04, v2 (cf. [direction-artistique-planche-de-style.md](direction-artistique-planche-de-style.md), essais 1 et 2 du Piquier) : v1 avait corrigé l'arme (prise à deux mains explicite, "pike/halberd" ambigu supprimé), ce qui a réglé les erreurs d'anatomie. Mais le résultat restait trop proche en silhouette du Soldat et du Franc-Archer (même base cape/capuche en fourrure et cuir brut, armure à bandes peu lisible, teinte verte du brief absente du rendu). v2 retire la capuche/cape partagée avec les autres unités, rend l'armure à bandes explicitement visible, et ajoute un surcot vert sombre distinctif pour casser la ressemblance.*

### Mage de Combat *(anti-unités légères)*
```
Human battle mage, lightly armored robes reinforced with glowing rune-etched plates, arcane staff or floating orb channeling violet-blue mana energy, a glowing rune circle forming at their feet, dynamic spellcasting pose with one arm outstretched, slender frame contrasted by an intense magical aura, wind-swept robes
```
*Traduction :* Mage de combat humain, robes légèrement blindées renforcées de plaques gravées de runes lumineuses, bâton arcanique ou orbe flottant canalisant une énergie mana violet-bleu, un cercle runique lumineux se formant à ses pieds, posture dynamique de lancement de sort avec un bras tendu, silhouette fine contrastant avec une aura magique intense, robes soulevées par le vent

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
