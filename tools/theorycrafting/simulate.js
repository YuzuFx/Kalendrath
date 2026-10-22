// Ligne de commande du simulateur de rythme.
//
//   node tools/theorycrafting/simulate.js                     paliers et bâtiments, joueur gratuit actif
//   node tools/theorycrafting/simulate.js --profil payeur     autre profil : reference, gratuit, pass, payeur
//   node tools/theorycrafting/simulate.js --profils           compare les profils sur les paliers et le Portail
//   node tools/theorycrafting/simulate.js --vitesse 2         vitesse économique ×2
//   node tools/theorycrafting/simulate.js --capitale          joueur sans colonies
//   node tools/theorycrafting/simulate.js --hdv 1.95          facteur de coût de l'Hôtel de ville
//   node tools/theorycrafting/simulate.js --tout              ajoute les recherches
//   node tools/theorycrafting/simulate.js --comparer-hdv 1.85,1.9,1.95
//                                                             compare plusieurs facteurs, paliers seuls
import { N, COST, PROFILS, simulate, unlockTargets, fmtTime } from './model.js';

const args = process.argv.slice(2);
const opt = (name, def) => { const i = args.indexOf(name); return i >= 0 && args[i + 1] ? args[i + 1] : def; };
const params = {
  speed: Number(opt('--vitesse', 1)),
  empire: !args.includes('--capitale'),
  hdvF: Number(opt('--hdv', COST.hdv[3])),
  profil: opt('--profil', 'gratuit'),
};
if (!PROFILS[params.profil]) {
  console.error(`Profil inconnu : ${params.profil}. Profils : ${Object.keys(PROFILS).join(', ')}.`);
  process.exit(1);
}

// Les fenêtres cibles sont calées sur le profil « gratuit » : le verdict n'a de sens que pour lui.
function verdict(x, h) {
  if (!x.cible || params.profil !== 'gratuit') return '';
  const d = h / 24;
  if (d < x.cible[0]) return 'en avance';
  if (d > x.cible[1]) return 'EN RETARD';
  return 'dans la cible';
}
const label = x => (x.k === 'gate' ? `Palier ${x.p} · ${x.n}` : x.n);
const pad = (s, n) => String(s).padEnd(n);
const virgule = v => String(v).replaceAll('.', ',');
const entete = p => `Vitesse ×${p.speed} · ${p.empire ? 'empire en croissance' : 'capitale seule'} · Hôtel de ville facteur ${virgule(p.hdvF)}`;

const comparer = opt('--comparer-hdv', null);
if (comparer) {
  const gates = N.filter(x => x.k === 'gate' && x.cible);
  console.log(`Profil : ${PROFILS[params.profil].nom}\n`);
  console.log(pad('Facteur HdV', 13) + gates.map(g => pad(g.n, 22)).join(''));
  for (const f of comparer.split(',').map(Number)) {
    const p = { ...params, hdvF: f };
    console.log(pad(virgule(f), 13) + gates.map(g => pad(fmtTime(simulate(unlockTargets(g.id), p)), 22)).join(''));
  }
  process.exit(0);
}

if (args.includes('--profils')) {
  const ids = ['hdv2', 'hdv3', 'hdv4', 'hdv5', 'hdv6', 'portail'];
  const nom = id => N.find(x => x.id === id).n.split(' ')[0];
  console.log(entete(params) + '\n');
  console.log(pad('Profil', 40) + ids.map(id => pad(nom(id), 20)).join(''));
  const t = {};
  for (const [k, prof] of Object.entries(PROFILS)) {
    t[k] = ids.map(id => simulate(unlockTargets(id), { ...params, profil: k }));
    console.log(pad(prof.nom, 40) + t[k].map(h => pad(fmtTime(h), 20)).join(''));
  }
  const i = ids.indexOf('hdv6');
  const gain = k => Math.round(100 * (1 - t[k][i] / t.gratuit[i]));
  console.log(`\nMétropole : le gros payeur va ${gain('payeur')} % plus vite que le gratuit actif, le pass payant ${gain('pass')} %.`);
  process.exit(0);
}

console.log(`${entete(params)} · ${PROFILS[params.profil].nom}\n`);
console.log(pad('Élément', 36) + pad('Débloqué vers', 22) + pad('Cible', 14) + 'Verdict');
const rows = N.filter(x => args.includes('--tout') || x.k !== 'r');
let enRetard = 0;
for (const x of rows) {
  const h = simulate(unlockTargets(x.id), params);
  const v = verdict(x, h);
  if (v === 'EN RETARD') enRetard++;
  const cible = x.cible ? virgule(`J${x.cible[0]}-J${x.cible[1]}`) : '';
  console.log(pad(label(x), 36) + pad(fmtTime(h), 22) + pad(cible, 14) + v);
}
if (params.profil !== 'gratuit') console.log('\nLes fenêtres cibles concernent le joueur gratuit actif : pas de verdict pour ce profil.');
if (enRetard) console.log(`\n${enRetard} élément(s) en retard sur leur fenêtre cible.`);
