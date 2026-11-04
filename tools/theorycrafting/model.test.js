// Garde-fous du modèle : cohérence des données et comportement attendu du simulateur.
// Les fenêtres cibles ne sont pas testées ici (elles bougent pendant le theorycrafting) :
// simulate.js les affiche avec un verdict.
//
//   node --test tools/theorycrafting/model.test.js
import { test } from 'node:test';
import assert from 'node:assert/strict';
import { N, COST, byId, reqsFor, closure, simulate, unlockTargets } from './model.js';

const DEFAUT = { speed: 1, empire: true, profil: 'gratuit' };

test('chaque prérequis désigne un élément existant', () => {
  for (const x of N) for (const [id] of x.req) assert.ok(byId[id], `${x.id} exige ${id}, inconnu`);
});

test('chaque élément simulable a un coût', () => {
  for (const x of N) if (x.k !== 'gate') assert.ok(COST[x.id], `${x.id} sans coût`);
  assert.ok(COST.hdv, "Hôtel de ville sans coût");
});

test("aucun élément ne s'exige lui-même, même indirectement", () => {
  for (const x of N) {
    if (x.k === 'gate') continue;
    const need = closure(reqsFor(x.id, 1));
    assert.ok(!(x.id in need), `${x.id} dépend de lui-même`);
  }
});

test('un bâtiment exige le niveau d\'Hôtel de ville de son palier', () => {
  for (const x of N.filter(b => b.k === 'b' && b.p > 1)) {
    const hdv = reqsFor(x.id, 1).find(([a]) => a === 'hdv');
    assert.ok(hdv, `${x.id} sans palier`);
    assert.equal(hdv[1], byId['hdv' + x.p].hdv);
  }
});

test('dix paliers, un tous les 3 niveaux d\'Hôtel de ville', () => {
  const paliers = N.filter(x => x.k === 'gate');
  assert.equal(paliers.length, 10);
  paliers.forEach((g, i) => {
    assert.equal(g.p, i + 1, `${g.id} : numéro de palier`);
    assert.equal(g.hdv, 3 * i + 1, `${g.id} : niveau d'Hôtel de ville`);
  });
});

test('le Portail des Sphères appartient au palier 10', () => {
  const hdv = reqsFor('portail', 1).find(([a]) => a === 'hdv');
  assert.deepEqual(hdv, ['hdv', 28]);
});

test('les paliers 2 à 6 arrivent dans l\'ordre, et tous finissent', () => {
  const t = [2, 3, 4, 5, 6].map(p => simulate(unlockTargets('hdv' + p), DEFAUT));
  for (let i = 1; i < t.length; i++) assert.ok(t[i] > t[i - 1], `palier ${i + 2} avant palier ${i + 1}`);
  assert.ok(t.every(Number.isFinite), 'un palier ne finit jamais');
});

test('les paliers 7 à 10 ne reviennent jamais avant le palier précédent', () => {
  const t = [6, 7, 8, 9, 10].map(p => simulate(unlockTargets('hdv' + p), DEFAUT));
  for (let i = 1; i < t.length; i++) assert.ok(t[i] >= t[i - 1], `palier ${i + 6} avant palier ${i + 5}`);
});

test('une vitesse plus haute raccourcit le rythme', () => {
  const lent = simulate(unlockTargets('hdv4'), DEFAUT);
  const rapide = simulate(unlockTargets('hdv4'), { ...DEFAUT, speed: 2 });
  assert.ok(rapide < lent);
});

test('les colonies accélèrent le long terme', () => {
  const empire = simulate(unlockTargets('hdv5'), DEFAUT);
  const capitale = simulate(unlockTargets('hdv5'), { ...DEFAUT, empire: false });
  assert.ok(empire < capitale);
});

test('un Hôtel de ville plus cher retarde la Citadelle (palier 6)', () => {
  const a = simulate(unlockTargets('hdv6'), DEFAUT);
  const b = simulate(unlockTargets('hdv6'), { ...DEFAUT, hdvF: COST.hdv[3] + 0.05 });
  assert.ok(b > a);
});

test('les bonus des profils accélèrent la progression, dans l\'ordre', () => {
  const t = ['reference', 'gratuit', 'pass', 'payeur'].map(profil => simulate(unlockTargets('hdv6'), { ...DEFAUT, profil }));
  for (let i = 1; i < t.length; i++) assert.ok(t[i] < t[i - 1], `profil ${i} pas plus rapide que le précédent`);
});

test('les chantiers ralentissent avec le niveau', () => {
  const lent = simulate(unlockTargets('hdv6'), { ...DEFAUT, buildMult: 1 });
  const instantane = simulate(unlockTargets('hdv6'), { ...DEFAUT, buildMult: 1e-6 });
  assert.ok(lent > instantane * 1.2, 'les durées ne pèsent presque pas sur la Métropole');
});
