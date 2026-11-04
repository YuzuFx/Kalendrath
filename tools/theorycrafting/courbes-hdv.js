// Étude de la courbe de l'Hôtel de ville (2026-10-30) : trois options de coût et de durée, niveau par niveau,
// pour que le joueur gratuit atteigne le palier 10 (Cité des Sphères, Hôtel de ville niv. 28) entre J540 et J730.
// Rien ici ne modifie le modèle de référence : les options passent par `P.courbe` (voir makeCost et dureeMult de model.js).
//
// Périmètre : l'Hôtel de ville (hdv) et ses deux prérequis de passage de palier, le Rite d'Ancrage Tellurique (rite)
// et l'Atelier des Maîtres d'œuvre (maitres). Les niveaux nécessaires au palier 5 (hdv 13, rite 6, maitres 8) restent
// ceux du modèle de référence : les paliers 2 à 5 (J2,5 / J6,5 / J18 / J84) sont déjà dans leurs fenêtres.
// Seule la suite change. « Travée p » = niveaux à gagner pour débloquer le palier p :
//   hdv  : niveaux 3p-4 à 3p-2 (p=6 : 14 à 16), rite : 2p-5 à 2p-4, maitres : 2p-3 à 2p-2 (p=6 : 9 à 10).
import { COST } from './model.js';

export const BASE = { hdv: 13, rite: 6, maitres: 8 };            // derniers niveaux inchangés
export const PAR_TRAVEE = { hdv: 3, rite: 2, maitres: 2 };         // niveaux par travée
export const MAXLV = { hdv: 30, rite: 16, maitres: 18 };
export const travee = {
  hdv: l => Math.ceil((l + 2) / 3),
  rite: l => Math.ceil((l + 4) / 2),
  maitres: l => Math.ceil(l / 2) + 1,
};
const ref = (o, l) => { const b = COST[o]; const k = b[3] ** (l - 1); return [b[0] * k, b[1] * k, b[2] * k]; };

// steps[o][l] = multiplicateur de coût entre le niveau l-1 et le niveau l (l > BASE[o]).
// durG[l] = croissance de la durée de l'Hôtel de ville entre l-1 et l (référence : 1,15 par niveau au-delà de 10).
function assemble(steps, durG, nom) {
  const cout = {}, tables = {};
  for (const o of ['hdv', 'rite', 'maitres']) {
    const t = [null]; // t[l]
    for (let l = 1; l <= MAXLV[o]; l++) {
      if (l <= BASE[o]) t.push(ref(o, l));
      else t.push(t[l - 1].map(x => x * steps[o](l)));
    }
    tables[o] = t;
    cout[o] = l => t[Math.min(l, MAXLV[o])];
  }
  // durée de l'Hôtel de ville : 1,15 par niveau de 11 à 13 (inchangé), puis durG(l)
  const dm = [null, 1];
  for (let l = 2; l <= 30; l++) dm.push(dm[l - 1] * (l <= 10 ? 1 : l <= BASE.hdv ? 1.15 : durG(l)));
  return { nom, cout, duree: { hdv: l => dm[Math.min(l, 30)] }, tables, dureeTable: dm };
}

// Option A : facteur de coût décroissant par palier. s règle l'intensité (calage).
export const F0_A = { 6: 1.60, 7: 1.40, 8: 1.25, 9: 1.15, 10: 1.10, 11: 1.08 };
export const G_A = { 6: 1.12, 7: 1.09, 8: 1.07, 9: 1.05, 10: 1.04, 11: 1.04 };
export function optionA(s) {
  const f = p => F0_A[p] ** s;
  return assemble({
    hdv: l => f(travee.hdv(l)),
    rite: l => f(travee.rite(l)) ** 1.5,
    maitres: l => f(travee.maitres(l)) ** 1.5,
  }, l => G_A[travee.hdv(l)], 'A · facteur décroissant par palier');
}

// Option B : table plate par palier (coût identique pour les niveaux d'une travée), saut entre travées,
// puis rampe finale (saut multiplié par 1,2 dès la travée 8). r règle le saut de base.
export const RAMPE_B = { 6: 1, 7: 1, 8: 1.2, 9: 1.2, 10: 1.2, 11: 1.2 };
export const DUR_B = { 6: 1.25, 7: 1.25, 8: 1.25, 9: 1.3, 10: 1.35, 11: 1.35 };
export function optionB(r) {
  // le premier niveau de la travée porte le saut ; les deux suivants restent plats
  const pas = (o, trav) => l => {
    const p = trav(l), premier = (o === 'hdv' ? 3 * p - 4 : o === 'rite' ? 2 * p - 5 : 2 * p - 3);
    return l === premier ? r * RAMPE_B[p] : 1;
  };
  const durG = l => {
    const p = travee.hdv(l), premier = 3 * p - 4;
    return l === premier ? DUR_B[p] : 1;
  };
  return assemble({ hdv: pas('hdv', travee.hdv), rite: pas('rite', travee.rite), maitres: pas('maitres', travee.maitres) }, durG, 'B · table plate par palier, rampe finale');
}

// Option C : table calée sur des jalons de jours. f[p] = facteur par niveau de la travée p (calé par étude-courbe-hdv.js).
export const JALONS_C = { 6: 170, 7: 275, 8: 390, 9: 520, 10: 635 };
export function optionC(f) {
  const g = p => f[p] ?? f[10];
  return assemble({
    hdv: l => g(travee.hdv(l)),
    rite: l => g(travee.rite(l)) ** 1.5,
    maitres: l => g(travee.maitres(l)) ** 1.5,
  }, () => 1.06, 'C · table calée sur des jalons');
}
