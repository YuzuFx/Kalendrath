// Garde-fous de l'étude de courbe de l'Hôtel de ville : les trois options finissent, dans l'ordre,
// et ne changent rien avant le palier 5.   node --test tools/theorycrafting/courbes-hdv.test.js
import { test } from 'node:test';
import assert from 'node:assert/strict';
import { simulate, unlockTargets } from './model.js';
import { optionA, optionB, optionC } from './courbes-hdv.js';

const P = { speed: 1, empire: true, profil: 'gratuit' };
const options = { A: optionA(0.52), B: optionB(1.33), C: optionC({ 6: 1.25, 7: 1.22, 8: 1.08, 9: 1.14, 10: 1.06 }) };

for (const [k, courbe] of Object.entries(options)) {
  test(`option ${k} : palier 5 inchangé, paliers 6 à 10 finis et dans l'ordre`, () => {
    assert.equal(simulate(unlockTargets('hdv5'), { ...P, courbe }), simulate(unlockTargets('hdv5'), P));
    const t = [6, 7, 8, 9, 10].map(p => simulate(unlockTargets('hdv' + p), { ...P, courbe }));
    assert.ok(t.every(Number.isFinite));
    for (let i = 1; i < t.length; i++) assert.ok(t[i] >= t[i - 1]);
  });
}
