// Étude de la courbe de l'Hôtel de ville : cale les trois options et imprime les tableaux (Markdown) de
// docs/etude-courbe-hotel-de-ville.md.   node tools/theorycrafting/etude-courbe-hdv.js [--cible 635] [--tables]
// Reproductible : aucune donnée aléatoire, le modèle de référence (model.js) n'est pas modifié.
import { PROFILS, simulate, unlockTargets, byId } from './model.js';
import { optionA, optionB, optionC, JALONS_C } from './courbes-hdv.js';

const args = process.argv.slice(2);
const CIBLE = Number(args[args.indexOf('--cible') + 1]) || 635;   // centre de la fenêtre 540-730
const PAL = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
const jour = (id, courbe, profil = 'gratuit', empire = true) =>
  simulate(unlockTargets(id), { speed: 1, empire, profil, courbe }) / 24;

// Le simulateur est une fonction en escalier du coût (la file de construction saute d'un chantier à l'autre,
// README « défaut connu ») : on dégrossit par dichotomie, puis on prend dans le voisinage le paramètre
// qui tombe le plus près de la cible.
function caler(fabrique, cible, id, lo, hi) {
  for (let i = 0; i < 18; i++) {
    const mid = (lo + hi) / 2;
    if (jour(id, fabrique(mid)) < cible) lo = mid; else hi = mid;
  }
  let best = (lo + hi) / 2, ecart = Infinity;
  const w = (hi0 => (hi0 - 0) * 0.08)(hi);
  for (let x = Math.max(lo - w, 0.01); x <= hi + w; x += w / 24) {
    const e = Math.abs(jour(id, fabrique(x)) - cible);
    if (e < ecart - 1e-9) { ecart = e; best = x; }
  }
  return best;
}

const A = (() => { const s = caler(optionA, CIBLE, 'hdv10', 0.1, 1.2); return { s, c: optionA(s) }; })();
const B = (() => { const r = caler(optionB, CIBLE, 'hdv10', 1.0, 2.5); return { r, c: optionB(r) }; })();
const C = (() => {
  const f = {};
  for (let p = 6; p <= 10; p++) {
    f[p] = 1.0;
    f[p] = caler(x => optionC({ ...f, [p]: x }), JALONS_C[p], 'hdv' + p, 1.0, 1.6);
  }
  return { f, c: optionC(f) };
})();
const OPTIONS = [['A', A.c], ['B', B.c], ['C', C.c]];

const v = x => x.toFixed(2).replace('.', ',');
const j = x => (Number.isFinite(x) ? String(Math.round(x)) : '>1500');
const L = (...c) => console.log('| ' + c.join(' | ') + ' |');

console.log(`Calage : cible palier 10 = J${CIBLE} (gratuit actif, vitesse ×1, empire en croissance).`);
console.log(`Paramètres : A s=${v(A.s)} ; B saut r=${v(B.r)} ; C facteurs par niveau ${Object.entries(C.f).map(([p, x]) => `p${p}=${v(x)}`).join(', ')}\n`);

// Jours d'atteinte par profil et par option
const profils = Object.keys(PROFILS);
const res = {};
for (const [k, c] of OPTIONS) {
  res[k] = {};
  for (const pr of profils) res[k][pr] = PAL.map(p => (p === 1 ? 0 : jour('hdv' + p, c, pr)));
  res[k].capitale = PAL.map(p => (p === 1 ? 0 : jour('hdv' + p, c, 'gratuit', false)));
  res[k].niv30 = simulate([['hdv', 30]], { speed: 1, empire: true, profil: 'gratuit', courbe: c }) / 24;
}
// Référence (courbe actuelle) pour comparaison
res.R = {};
for (const pr of profils) res.R[pr] = PAL.map(p => (p === 1 ? 0 : jour('hdv' + p, null, pr)));

console.log('### Jour d\'atteinte de chaque palier\n');
for (const k of ['R', 'A', 'B', 'C']) {
  console.log(`**${k === 'R' ? 'Courbe actuelle (référence)' : OPTIONS.find(o => o[0] === k)[1].nom}**\n`);
  L('Profil', ...PAL.map(p => 'P' + p)); L('---', ...PAL.map(() => '---'));
  for (const pr of [...profils, ...(k === 'R' ? [] : ['capitale'])]) {
    L(pr === 'capitale' ? 'Gratuit, capitale seule' : PROFILS[pr].nom, ...res[k][pr].map(j));
  }
  console.log('');
}

console.log('### Écart gratuit / payeur et intervalles (gratuit)\n');
L('Option', 'Écart payeur P10', 'Écart pass P10', 'Écart payeur P6', 'Intervalles P5→P10 (jours)', 'Dernier / avant-dernier', 'Niv. 30 (gratuit)');
L('---', '---', '---', '---', '---', '---', '---');
for (const [k] of OPTIONS) {
  const g = res[k].gratuit, pa = res[k].payeur, ps = res[k].pass;
  const iv = g.slice(4).map((x, i, a) => (i ? x - a[i - 1] : null)).slice(1);
  const pct = (a, i) => `${Math.round(100 * (1 - a[i] / g[i]))} %`;
  L(k, pct(pa, 9), pct(ps, 9), pct(pa, 5), iv.map(j).join(' · '), v(iv[iv.length - 1] / iv[iv.length - 2]), `J${j(res[k].niv30)}`);
}

if (args.includes('--tables')) {
  const M = x => (x >= 1e9 ? v(x / 1e9) + ' G' : x >= 1e6 ? v(x / 1e6) + ' M' : x >= 1e3 ? v(x / 1e3) + ' k' : String(Math.round(x)));
  const eq = c => c[0] + 1.5 * c[1] + 3 * c[2];
  // Rite : niveaux 7 à 16 ; Maîtres : niveaux 9 à 18 ; HdV : niveaux 13 à 30 (lignes alignées par palier, pas par niveau)
  for (const [k, c] of OPTIONS) {
    console.log(`\n### Coûts niveau par niveau, option ${k} (équivalent bois 3:2:1, multiplicateur de durée de l'Hôtel de ville)\n`);
    L('Objet', 'Niveau', 'Palier visé', 'Coût', 'Durée ×'); L('---', '---', '---', '---', '---');
    for (let l = 13; l <= 30; l++) L('Hôtel de ville', l, Math.ceil((l + 2) / 3), M(eq(c.tables.hdv[l])), v(c.dureeTable[l]));
    for (let l = 7; l <= 16; l++) L('Rite', l, Math.ceil((l + 4) / 2), M(eq(c.tables.rite[l])), '');
    for (let l = 9; l <= 18; l++) L('Maîtres d\'œuvre', l, Math.ceil(l / 2) + 1, M(eq(c.tables.maitres[l])), '');
  }
}

// Plus long chantier unique du parcours jusqu'au palier 10 (gratuit actif, accélérateurs déjà déduits)
console.log('\n### Plus longs chantiers (gratuit actif, jusqu\'au palier 10)\n');
L('Option', 'Plus long chantier', 'Objet', 'Plus long chantier d\'Hôtel de ville', 'Durée totale en chantiers HdV');
L('---', '---', '---', '---', '---');
for (const [k, c] of OPTIONS) {
  const journal = [];
  simulate(unlockTargets('hdv10'), { speed: 1, empire: true, profil: 'gratuit', courbe: c, journal });
  const d = journal.map(x => ({ ...x, jours: (x.fin - x.debut) / 24 }));
  const top = d.reduce((m, x) => (x.jours > m.jours ? x : m), d[0]);
  const hdv = d.filter(x => x.o === 'hdv'), topH = hdv.reduce((m, x) => (x.jours > m.jours ? x : m), hdv[0]);
  L(k, `${v(top.jours)} j`, `${top.o} niv. ${top.niv}`, `${v(topH.jours)} j (niv. ${topH.niv})`, `${j(hdv.reduce((s, x) => s + x.jours, 0))} j`);
}

// Sensibilité : le paramètre de calage bouge de ±5 % et de ±10 % (l'intensité du coût, pas sa forme)
console.log('\n### Sensibilité du jour du palier 10 (gratuit actif) à l\'intensité de la courbe\n');
L('Option', '−10 %', '−5 %', 'calée', '+5 %', '+10 %'); L('---', '---', '---', '---', '---', '---');
const mult = [0.9, 0.95, 1, 1.05, 1.1];
L('A (s)', ...mult.map(m => j(jour('hdv10', optionA(A.s * m)))));
L('B (r)', ...mult.map(m => j(jour('hdv10', optionB(1 + (B.r - 1) * m)))));
L('C (facteurs − 1)', ...mult.map(m => j(jour('hdv10', optionC(Object.fromEntries(Object.entries(C.f).map(([p, x]) => [p, 1 + (x - 1) * m])))))));
