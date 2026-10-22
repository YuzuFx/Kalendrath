// Modèle de theorycrafting de Kalendrath : prérequis, coûts et simulateur de rythme.
// Source unique : la ligne de commande (simulate.js), les tests (model.test.js) et la page
// interactive (arbre-prerequis.html, régénérée par build-artifact.js) lisent ce fichier.
// Hypothèses et mode d'emploi : README.md du même dossier.

// ---------- Données : prérequis proposés ----------
// k : gate (palier), b (bâtiment), r (recherche). o : herite, adapte, nouveau, repo, palier.
// p : palier d'apparition. req : [id, niveau]. cible : fenêtre de déblocage proposée, en jours, pour un joueur
// gratuit actif (profil « gratuit ») en vitesse ×1 avec colonies.
const N = [
  { id: 'hdv1', k: 'gate', p: 1, n: 'Hôtel de ville', sub: 'Palier 1 · Hameau', hdv: 1, o: 'palier', og: null, req: [],
    why: "Bâtiment central présent dès la fondation (Donjon dans la capitale). Il fait apparaître les bâtiments du Hameau et porte l'Obélisque." },
  { id: 'hdv2', k: 'gate', p: 2, n: 'Village', sub: 'Palier 2 · HdV niv. 4', hdv: 4, o: 'palier', og: null, req: [['hdv1', 3], ['rite', 1], ['maitres', 2]], cible: [1, 3],
    why: "Premier passage : il oblige à ouvrir l'Institut pour étudier le Rite, et à poser l'Atelier des Maîtres d'œuvre. Cible : le 2ᵉ ou 3ᵉ jour, pour que l'armée arrive vite." },
  { id: 'hdv3', k: 'gate', p: 3, n: 'Bourg', sub: 'Palier 3 · HdV niv. 7', hdv: 7, o: 'palier', og: null, req: [['hdv2', 6], ['rite', 2], ['maitres', 4]], cible: [5, 10],
    why: "Murs de pierre partiels et tour de guet : la ville s'ouvre au soin, à la diplomatie et à la surveillance. Cible : fin de la première semaine." },
  { id: 'hdv4', k: 'gate', p: 4, n: 'Cité fortifiée', sub: 'Palier 4 · HdV niv. 10', hdv: 10, o: 'palier', og: null, req: [['hdv3', 9], ['rite', 4], ['maitres', 6]], cible: [14, 30],
    why: "Remparts complets : l'Atelier des Remparts apparaît. Cible : entre la 2ᵉ et la 4ᵉ semaine." },
  { id: 'hdv5', k: 'gate', p: 5, n: 'Citadelle', sub: 'Palier 5 · HdV niv. 13', hdv: 13, o: 'palier', og: null, req: [['hdv4', 12], ['rite', 6], ['maitres', 8]], cible: [60, 120],
    why: "Donjon et quartiers spécialisés : l'Atelier des Automates Arcaniques apparaît. Cible : entre 2 et 4 mois." },
  { id: 'hdv6', k: 'gate', p: 6, n: 'Métropole', sub: 'Palier 6 · HdV niv. 16', hdv: 16, o: 'palier', og: null, req: [['hdv5', 15], ['rite', 8], ['maitres', 10]], cible: [540, 730],
    why: "Cité monumentale : le Portail des Sphères apparaît. Cible : 18 à 24 mois pour un joueur gratuit actif, l'équivalent des unités T5 de Call of Dragons (1,5 à 2 ans en parcours standard). Niveau 16 au-delà du plafond provisoire de 15 (point 1)." },

  { id: 'scierie', k: 'b', p: 1, n: 'Scierie', o: 'herite', og: 'metal_mine', was: 'aucun', req: [], why: 'Production de base, disponible dès la fondation.' },
  { id: 'minefer', k: 'b', p: 1, n: 'Mine de fer', o: 'herite', og: 'crystal_mine', was: 'aucun', req: [], why: 'Production de base.' },
  { id: 'puits', k: 'b', p: 1, n: 'Puits de mana', o: 'herite', og: 'deuterium_synthesizer', was: 'aucun', req: [], why: "Production de base. Devient le socle des études arcaniques (point 4)." },
  { id: 'champ', k: 'b', p: 1, n: 'Champ de blé', o: 'herite', og: 'solar_plant', was: 'aucun', req: [], why: "Production de nourriture. Exigé par l'Académie Militaire : les troupes coûtent de la nourriture." },
  { id: 'entbois', k: 'b', p: 1, n: 'Entrepôt de bois', o: 'herite', og: 'metal_store', was: 'aucun', req: [], why: 'Stockage, sans prérequis comme dans OGameX.' },
  { id: 'entfer', k: 'b', p: 1, n: 'Entrepôt de fer', o: 'herite', og: 'crystal_store', was: 'aucun', req: [], why: 'Stockage, sans prérequis.' },
  { id: 'reservoir', k: 'b', p: 1, n: 'Réservoir de mana', o: 'herite', og: 'deuterium_store', was: 'aucun', req: [], why: 'Stockage, sans prérequis.' },
  { id: 'silo', k: 'b', p: 1, n: 'Silo de nourriture', o: 'nouveau', og: null, was: '—', req: [], why: 'Nouveau stockage, aligné sur les trois autres : aucun prérequis.' },
  { id: 'maitres', k: 'b', p: 1, n: "Atelier des Maîtres d'œuvre", o: 'adapte', og: 'robot_factory', was: 'aucun', req: [],
    why: "Gardé sans prérequis comme dans OGameX, mais avancé du palier 2 au palier 1 (point 2) : il accélère la construction et il conditionne l'Académie et les passages de palier." },
  { id: 'institut', k: 'b', p: 1, n: 'Institut Arcanique', o: 'adapte', og: 'research_lab', was: 'aucun', req: [['hdv1', 2], ['puits', 1]], cible: [0.25, 1.5],
    why: "Pas un bâtiment du premier jour (cf. sa direction artistique) : il demande un Hôtel de ville niveau 2 et un premier Puits de mana, puisque les érudits étudient le mana." },
  { id: 'academie', k: 'b', p: 2, n: 'Académie Militaire', o: 'adapte', og: 'shipyard', was: 'robot_factory 2', req: [['maitres', 2], ['champ', 3]], cible: [1, 3],
    why: "Hérite de l'Atelier des Maîtres d'œuvre 2. Ajout du Champ de blé 3, parce que former des troupes coûte de la nourriture." },
  { id: 'forge', k: 'b', p: 2, n: 'Forge', o: 'nouveau', og: null, was: '—', req: [['minefer', 5], ['maitres', 2]], cible: [1, 4],
    why: "L'équipement du héros se forge dans le fer : Mine de fer 5. Les Maîtres d'œuvre 2 marquent un artisanat déjà organisé." },
  { id: 'hopital', k: 'b', p: 3, n: 'Hôpital', o: 'adapte', og: 'space_dock', was: 'shipyard 2', req: [['academie', 2], ['institut', 3]], cible: [5, 12],
    why: "Hérite de l'Académie Militaire 2 : on soigne les troupes qu'on forme. Ajout de l'Institut 3, la guérison relevant aussi de la magie de lumière." },
  { id: 'ambassade', k: 'b', p: 3, n: 'Ambassade', o: 'herite', og: 'alliance_depot', was: 'aucun', req: [], cible: [5, 14],
    why: "Aucun prérequis dans OGameX. Le palier 3 suffit à la placer après les débuts." },
  { id: 'tour', k: 'b', p: 3, n: 'Tour de guet arcanique', o: 'adapte', og: 'sensor_phalanx', was: 'lunar_base 1', req: [['espionnage', 3], ['institut', 3]], cible: [7, 14],
    why: "La base lunaire n'existe plus. La surveillance à distance passe par l'Espionnage 3 et un Institut capable d'enchanter la tour." },
  { id: 'remparts', k: 'b', p: 4, n: 'Atelier des Remparts', o: 'nouveau', og: null, was: '—', req: [['maitres', 5], ['academie', 4]], cible: [14, 30],
    why: "Les défenses demandent des bâtisseurs (Maîtres d'œuvre 5) et une doctrine militaire (Académie 4). Les recherches entrent en jeu au niveau des défenses elles-mêmes." },
  { id: 'automates', k: 'b', p: 5, n: 'Atelier des Automates Arcaniques', o: 'adapte', og: 'nano_factory', was: 'robot_factory 10, computer_technology 10', req: [['maitres', 10], ['resonance', 5]], cible: [60, 150],
    why: "Garde l'Atelier des Maîtres d'œuvre 10. La Chaîne de Ravitaillement 10 (ex-informatique) n'a pas de lien avec des automates : remplacée par la Résonance du Mana 5." },
  { id: 'portail', k: 'b', p: 6, n: 'Portail des Sphères', o: 'adapte', og: 'jump_gate', was: 'lunar_base 1, hyperspace_technology 7', req: [['institut', 12], ['arcanes', 8], ['decouverte', 6]], cible: [540, 800],
    why: "Né de l'étude des obélisques : Arcanes des Obélisques 8 et Institut 12. La Découverte Tellurique 6 fait connaître les nœuds que le Portail relie." },

  { id: 'abondance', k: 'r', n: 'Abondance', o: 'herite', og: 'energy_technology', was: 'research_lab 1', req: [['institut', 1]],
    why: "Recherche de la nourriture. Elle ne porte plus que les recherches de troupes (point 4)." },
  { id: 'lecture', k: 'r', n: 'Lecture des Runes', nomProv: true, o: 'adapte', og: 'laser_technology', was: 'energy_technology 2, research_lab 1', req: [['institut', 1], ['puits', 3]],
    why: "Première étude arcanique. L'Énergie 2 devient le Puits de mana 3. Nom provisoire (point 5)." },
  { id: 'resonance', k: 'r', n: 'Résonance du Mana', nomProv: true, o: 'adapte', og: 'ion_technology', was: 'research_lab 4, energy_technology 4, laser_technology 5', req: [['institut', 4], ['lecture', 5], ['puits', 6]],
    why: "L'Énergie 4 devient le Puits de mana 6. Exigée par les Automates Arcaniques. Nom provisoire." },
  { id: 'arcanes', k: 'r', n: 'Arcanes des Obélisques', nomProv: true, o: 'adapte', og: 'plasma_technology', was: 'research_lab 4, energy_technology 8, laser_technology 10, ion_technology 5', req: [['institut', 4], ['lecture', 10], ['resonance', 5]],
    why: "L'étude des obélisques du lore. L'Énergie 8 est retirée (les deux études précédentes suffisent). Clé du Portail. Nom provisoire." },
  { id: 'endurance', k: 'r', n: 'Endurance du Fantassin', o: 'herite', og: 'combustion_drive', was: 'energy_technology 1, research_lab 1', req: [['abondance', 1], ['institut', 1]],
    why: "Hérité tel quel : un fantassin qui marche loin doit être nourri." },
  { id: 'equestre', k: 'r', n: 'Art Équestre', o: 'herite', og: 'impulse_drive', was: 'energy_technology 1, research_lab 2', req: [['abondance', 1], ['institut', 2]],
    why: "Hérité tel quel : les chevaux aussi mangent." },
  { id: 'siege', k: 'r', n: 'Ingénierie de Siège', o: 'adapte', og: 'hyperspace_drive', was: 'research_lab 7, hyperspace_technology 3', req: [['institut', 7], ['lecture', 5]],
    why: "La technologie hyperspatiale est supprimée. Les engins de siège marchent au mana : Lecture des Runes 5." },
  { id: 'espionnage', k: 'r', n: 'Espionnage', o: 'herite', og: 'espionage_technology', was: 'research_lab 3', req: [['institut', 3]],
    why: 'Hérité tel quel. Exigé par la Tour de guet arcanique.' },
  { id: 'ravitaillement', k: 'r', n: 'Chaîne de Ravitaillement', o: 'herite', og: 'computer_technology', was: 'research_lab 1', req: [['institut', 1]],
    why: "Hérité tel quel. Ne débloque plus les Automates (remplacée par la Résonance du Mana)." },
  { id: 'decouverte', k: 'r', n: 'Découverte Tellurique', o: 'herite', og: 'astrophysics', was: 'impulse_drive 3, research_lab 3, espionage_technology 4', req: [['equestre', 3], ['institut', 3], ['espionnage', 4]],
    why: "Hérité tel quel : on explore à cheval avec des éclaireurs. Exigée par le Portail." },
  { id: 'affutage', k: 'r', n: 'Affûtage', o: 'herite', og: 'weapon_technology', was: 'research_lab 4', req: [['institut', 4]],
    why: "Palier 1 de la chaîne d'attaque. Hérité tel quel." },
  { id: 'alliage', k: 'r', n: 'Alliage de Guerre', o: 'nouveau', og: null, was: '—', req: [['affutage', 6], ['forge', 3]],
    why: "Palier 2 de la chaîne d'attaque. Un alliage se met au point à la Forge : Forge 3." },
  { id: 'runescombat', k: 'r', n: 'Runes de Combat', o: 'nouveau', og: null, was: '—', req: [['alliage', 6], ['lecture', 6]],
    why: "Palier 3 : bascule vers la magie, d'où la Lecture des Runes 6." },
  { id: 'benediction', k: 'r', n: 'Bénédiction des Armes', o: 'nouveau', og: null, was: '—', req: [['runescombat', 6], ['arcanes', 5]],
    why: "Palier 4, le plus magique : Arcanes des Obélisques 5." },
  { id: 'armures', k: 'r', n: 'Forge des Armures', o: 'herite', og: 'armor_technology', was: 'research_lab 2', req: [['institut', 2]],
    why: 'Hérité tel quel.' },
  { id: 'infusion', k: 'r', n: 'Infusion Arcanique', o: 'adapte', og: 'shielding_technology', was: 'research_lab 6, energy_technology 3', req: [['institut', 6], ['lecture', 3]],
    why: "Barrière magique : l'Énergie 3 devient la Lecture des Runes 3." },
  { id: 'rite', k: 'r', n: "Rite d'Ancrage Tellurique", o: 'repo', og: 'terraformer', was: 'nano_factory 1, energy_technology 12', req: [['institut', 1]],
    why: "Les érudits étendent l'influence de l'Obélisque : c'est ce qui permet à la ville de grandir. Devient la clé des passages de palier (point 3)." },
];

// Coûts niveau 1 [bois, fer, mana, facteur]. Valeurs OGameX, sauf les objets marqués « proposé ».
const COST = {
  scierie: [60, 15, 0, 1.5], minefer: [48, 24, 0, 1.6], puits: [225, 75, 0, 1.5], champ: [75, 30, 0, 1.5],
  entbois: [1000, 0, 0, 2], entfer: [1000, 500, 0, 2], reservoir: [1000, 1000, 0, 2], silo: [1000, 500, 0, 2],
  maitres: [400, 120, 200, 2], institut: [200, 400, 200, 2], academie: [400, 200, 100, 2],
  forge: [1200, 800, 200, 2], hopital: [200, 0, 50, 2], ambassade: [20000, 40000, 0, 2],
  tour: [20000, 40000, 10000, 2], remparts: [6000, 4000, 1000, 2], automates: [1000000, 500000, 100000, 2],
  portail: [2000000, 4000000, 2000000, 2], hdv: [400, 250, 100, 1.9],
  abondance: [0, 800, 400, 2], lecture: [200, 100, 0, 2], resonance: [1000, 300, 100, 2], arcanes: [2000, 4000, 1000, 2],
  endurance: [400, 0, 600, 2], equestre: [2000, 4000, 600, 2], siege: [10000, 20000, 6000, 2], espionnage: [200, 1000, 200, 2],
  ravitaillement: [0, 400, 600, 2], decouverte: [4000, 8000, 4000, 1.75], affutage: [800, 200, 0, 2],
  armures: [1000, 0, 0, 2], infusion: [200, 600, 0, 2], rite: [300, 600, 300, 2],
  alliage: [4000, 2000, 0, 2], runescombat: [8000, 8000, 4000, 2], benediction: [20000, 20000, 20000, 2],
};
const PROPOSED = [
  ['hdv', "Hôtel de ville", 16, "Règle le rythme des paliers avec la courbe de durées. Chantier brut d'environ 35 jours au niveau 16."],
  ['forge', 'Forge', 1, "Un peu plus chère que l'Académie Militaire, surtout en bois."],
  ['silo', 'Silo de nourriture', 1, "Aligné sur l'Entrepôt de fer."],
  ['remparts', 'Atelier des Remparts', 1, "Investissement net au palier 4, sans bloquer."],
  ['rite', "Rite d'Ancrage Tellurique", 8, "Le coût du Terraformeur (50 000 fer, 100 000 mana) aurait bloqué le Village : remplacé."],
  ['alliage', 'Alliage de Guerre', 1, "Chaîne d'attaque : environ 5 fois l'Affûtage."],
  ['runescombat', 'Runes de Combat', 1, "Environ 4 fois l'Alliage, avec du mana."],
  ['benediction', 'Bénédiction des Armes', 1, "Palier ultime, très coûteux en mana."],
];

const byId = Object.fromEntries(N.map(x => [x.id, x]));
const RESEARCH = new Set(N.filter(x => x.k === 'r').map(x => x.id));
const toSim = ([a, l]) => byId[a].k === 'gate' ? ['hdv', l] : [a, l];
const PASSAGE = {};
N.filter(x => x.k === 'gate' && x.p > 1).forEach(g => (PASSAGE[g.hdv] = g.req.filter(r => byId[r[0]].k !== 'gate')));

function reqsFor(obj, lv) {
  if (obj === 'hdv') { const r = []; for (const k in PASSAGE) if (+k <= lv) r.push(...PASSAGE[k]); return r; }
  const x = byId[obj]; if (!x) return [];
  const r = x.req.map(toSim);
  if (x.k === 'b' && x.p > 1) r.push(['hdv', byId['hdv' + x.p].hdv]);
  return r;
}
function makeCost(hdvF) {
  return (obj, lv) => {
    const b = COST[obj]; const f = obj === 'hdv' ? (hdvF ?? b[3]) : b[3]; const k = f ** (lv - 1);
    return [Math.floor(b[0] * k), Math.floor(b[1] * k), Math.floor(b[2] * k)];
  };
}
function closure(targets) {
  const need = {};
  const visit = (o, l) => {
    if ((need[o] || 0) >= l) return;
    need[o] = l;
    for (let i = 1; i <= l; i++) reqsFor(o, i).forEach(([a, b]) => visit(a, b));
  };
  targets.forEach(([o, l]) => visit(o, l));
  return need;
}
const MINES = { scierie: 0, minefer: 1, puits: 2 };
const STORE = ['entbois', 'entfer', 'reservoir'];
const cap = l => 5000 * Math.floor(2.5 * Math.exp(20 * l / 33));
const COLONY_DAYS = [4, 8, 14, 21, 30, 45, 60, 90];
const colonies = days => COLONY_DAYS.filter(d => days >= d).length;
const prodOf = lv => [30 + 30 * lv.scierie * 1.1 ** lv.scierie, 15 + 20 * lv.minefer * 1.1 ** lv.minefer, 10 * lv.puits * 1.1 ** lv.puits * 1.36];
const W = [1, 1.5, 3];
const eqv = v => v[0] * W[0] + v[1] * W[1] + v[2] * W[2];

// Durées des chantiers (proposé le 2026-10-22). Tous les bâtiments ralentissent au-delà d'un seuil de niveau,
// l'Hôtel de ville plus fort que les autres (modèle Call of Dragons / Last War : un grand jalon à accélérer).
// L'Atelier des Automates réduit un peu les durées des bâtiments, sans le ×2 par niveau d'OGameX,
// pour laisser leur valeur aux accélérateurs.
const DUREES = {
  batiments: { seuil: 10, croissance: 1.095 },
  hdv: { seuil: 10, croissance: 1.15 },
  automates: { parNiveau: 0.03, max: 0.3 },
};
// Profils de joueur (hypothèses à confronter à l'audit des boutiques de la Phase 8).
// prod : bonus de production (events, packs de ressources, pass) ; vitesse : bonus permanent de vitesse
// de construction ; accel : accélérateurs gagnés ou achetés, en heures par jour, utilisés sur le chantier en cours.
const PROFILS = {
  reference: { nom: 'Référence (moteur seul)', prod: 0, vitesse: 0, accel: 0 },
  gratuit: { nom: 'Gratuit actif (events, pass gratuit)', prod: 0.10, vitesse: 0.10, accel: 2 },
  pass: { nom: 'Pass payant', prod: 0.15, vitesse: 0.15, accel: 4 },
  payeur: { nom: 'Gros payeur', prod: 0.20, vitesse: 0.20, accel: 8 },
};
const dureeMult = (o, nl) => { const d = o === 'hdv' ? DUREES.hdv : DUREES.batiments; return d.croissance ** Math.max(0, nl - d.seuil); };

// Temps (heures) pour réunir toutes les cibles [obj, niveau].
// P : speed (vitesse économique), empire (colonies ou non), hdvF (facteur de coût de l'Hôtel de ville),
// profil (clé de PROFILS, « gratuit » par défaut), buildMult / researchMult / prodMult (multiplicateurs libres).
// P.journal (tableau, facultatif) reçoit chaque chantier terminé : { file, o, niv, debut, fin } en heures.
function simulate(targets, P) {
  const speed = P.speed, cost = makeCost(P.hdvF);
  const prof = PROFILS[P.profil || 'gratuit'];
  const buildMult = (P.buildMult ?? 1) / (1 + prof.vitesse), researchMult = P.researchMult ?? 1, prodMult = (P.prodMult ?? 1) * (1 + prof.prod);
  let banque = 0;
  const need = closure(targets);
  const lv = {}; Object.keys(COST).forEach(k => (lv[k] = 0)); lv.hdv = 1;
  if (Object.keys(need).every(k => lv[k] >= need[k])) return 0;
  const res = [500, 500, 0];
  let t = 0, bq = null, rq = null;
  const H = 1500 * 24;
  const done = () => Object.keys(need).every(k => lv[k] >= need[k]);
  const queued = o => (bq && bq.o === o ? 1 : 0) + (rq && rq.o === o ? 1 : 0);
  const avail = o => reqsFor(o, lv[o] + 1).every(([a, b]) => lv[a] >= b);
  const pick = research => {
    let best = null, bc = Infinity;
    for (const o in need) {
      if (RESEARCH.has(o) !== research) continue;
      if (lv[o] >= need[o] || queued(o) || !avail(o)) continue;
      const s = eqv(cost(o, lv[o] + 1));
      if (s < bc) { bc = s; best = o; }
    }
    return best;
  };
  const afford = c => res[0] >= c[0] && res[1] >= c[1] && res[2] >= c[2];
  const pay = c => { res[0] -= c[0]; res[1] -= c[1]; res[2] -= c[2]; };
  // Durée OGameX (sans le ×2 par niveau d'Automates), allongée par DUREES, réduite par les Automates et les bonus.
  const bTime = (o, nl, c) => {
    const auto = Math.min(DUREES.automates.max, DUREES.automates.parNiveau * lv.automates);
    return buildMult * dureeMult(o, nl) * (1 - auto) * (c[0] + c[1]) / (2500 * Math.max(4 - nl / 2, 1) * (1 + lv.maitres) * speed);
  };
  while (t < H) {
    if (done()) return t;
    const mult = P.empire ? 1 + 0.5 * colonies(t / 24) : 1;
    const PR = prodOf(lv).map(x => x * speed * mult * prodMult);
    const CAP = STORE.map(k => cap(lv[k]));
    const tooBig = c => { for (let i = 0; i < 3; i++) if (c[i] > CAP[i]) return STORE[i]; return null; };
    if (!bq) {
      let mine = null, mc = Infinity;
      for (const m in MINES) { const e = eqv(cost(m, lv[m] + 1)); if (e < mc) { mc = e; mine = m; } }
      const next = pick(false);
      let o = next && eqv(cost(next, lv[next] + 1)) <= mc ? next : mine;
      const st = tooBig(cost(o, lv[o] + 1)); if (st) o = st;
      const c = cost(o, lv[o] + 1);
      if (afford(c)) { pay(c); bq = { o, start: t, end: t + Math.max(bTime(o, lv[o] + 1, c), 1 / 3600) }; }
    }
    if (!rq) {
      const o = pick(true);
      if (o) {
        const c = cost(o, lv[o] + 1), st = tooBig(c);
        if (st && !bq) { const cs = cost(st, lv[st] + 1); if (afford(cs)) { pay(cs); bq = { o: st, start: t, end: t + bTime(st, lv[st] + 1, cs) }; } }
        else if (!st && afford(c)) { pay(c); rq = { o, start: t, end: t + Math.max(researchMult * (c[0] + c[1]) / (1000 * (1 + lv.institut) * speed), 1 / 3600) }; }
      }
    }
    // Accélérateurs : gagnés au fil des jours, utilisés aussitôt sur le chantier en cours.
    if (bq && banque > 0) { const u = Math.min(banque, bq.end - t); bq.end -= u; banque -= u; }
    let step = t < 24 * 30 ? 0.25 : 1;
    if (bq) step = Math.min(step, bq.end - t);
    if (rq) step = Math.min(step, rq.end - t);
    step = Math.max(step, 1e-6);
    t += step;
    banque += prof.accel / 24 * step;
    for (let i = 0; i < 3; i++) if (res[i] < CAP[i]) res[i] = Math.min(res[i] + PR[i] * step, CAP[i]);
    if (bq && bq.end <= t + 1e-9) { lv[bq.o]++; if (P.journal) P.journal.push({ file: 'construction', o: bq.o, niv: lv[bq.o], debut: bq.start, fin: t }); bq = null; }
    if (rq && rq.end <= t + 1e-9) { lv[rq.o]++; if (P.journal) P.journal.push({ file: 'recherche', o: rq.o, niv: lv[rq.o], debut: rq.start, fin: t }); rq = null; }
  }
  return Infinity;
}
// Cible de simulation pour un élément : le palier atteint, ou tous ses prérequis réunis.
function unlockTargets(id) {
  const x = byId[id];
  if (x.k === 'gate') return [['hdv', x.hdv]];
  return reqsFor(id, 1);
}
function fmtTime(h) {
  if (h === Infinity) return '> 4 ans';
  if (h === 0) return 'fondation';
  if (h < 48) return `${h < 10 ? h.toFixed(1).replace('.', ',') : Math.round(h)} h`;
  const d = h / 24;
  if (d < 60) return `J${d < 10 ? d.toFixed(1).replace('.', ',') : Math.round(d)}`;
  return `J${Math.round(d)} (${(d / 30.44).toFixed(1).replace('.', ',')} mois)`;
}

export { N, COST, PROPOSED, PASSAGE, DUREES, PROFILS, byId, reqsFor, makeCost, closure, simulate, unlockTargets, fmtTime, colonies, cap };
