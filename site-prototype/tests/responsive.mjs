// Playwright aux trois largeurs (390, 720, 2560) pour FR et EN.
// Échoue si : défilement horizontal, élément qui déborde, requête vers un tiers, erreur de console,
// bouton d'inscription sous la ligne de flottaison (390 x 844 et 720 x 900), jalons qui se chevauchent.
// Usage : node tests/responsive.mjs [baseUrl] [dossierCaptures]
import { chromium } from 'playwright';
import fs from 'node:fs';

const base = process.argv[2] || 'http://localhost:8765';
const outDir = process.argv[3];
if (outDir) fs.mkdirSync(outDir, { recursive: true });
const sizes = [[390, 844], [720, 900], [2560, 1440]];
const browser = await chromium.launch();
let failures = 0;

for (const lang of ['fr', 'en']) for (const [w, h] of sizes) {
  const page = await browser.newPage({ viewport: { width: w, height: h } });
  const external = []; const errors = [];
  page.on('request', (r) => { if (!r.url().startsWith(base) && !r.url().startsWith('data:')) external.push(r.url()); });
  page.on('console', (m) => { if (m.type() === 'error') errors.push(m.text()); });
  page.on('pageerror', (e) => errors.push(String(e)));
  await page.goto(`${base}/${lang}/`, { waitUntil: 'networkidle' });
  await page.evaluate(() => document.querySelectorAll('img[loading=lazy]').forEach((i) => { i.loading = 'eager'; }));
  await page.waitForFunction(() => [...document.images].every((i) => i.complete && i.naturalWidth > 0), null, { timeout: 15000 });
  await page.waitForTimeout(900);
  const r = await page.evaluate(() => {
    const vw = document.documentElement.clientWidth;
    const overflowing = [...document.querySelectorAll('body *')]
      .filter((e) => e.getBoundingClientRect().right > vw + 1 && getComputedStyle(e).position !== 'absolute' && !e.closest('.hero__media'))
      .map((e) => e.className || e.tagName).slice(0, 6);
    const marks = [...document.querySelectorAll('.mark')].map((m) => m.getBoundingClientRect());
    const overlap = marks.some((a, i) => i && (() => { const b = marks[i - 1]; return b.right > a.left + 1 && b.left < a.right - 1 && b.bottom > a.top + 1 && b.top < a.bottom - 1; })());
    // Mesure : caractères par ligne = longueur du texte / nombre de lignes (paragraphes de 2 lignes ou plus).
    const longest = Math.max(0, ...[...document.querySelectorAll('main p')].map((e) => {
      const cs = getComputedStyle(e); const lh = parseFloat(cs.lineHeight) || parseFloat(cs.fontSize) * 1.5;
      const lines = Math.round(e.getBoundingClientRect().height / lh);
      return lines >= 2 ? e.textContent.trim().length / lines : 0;
    }));
    return {
      scrollWidth: document.documentElement.scrollWidth, vw, overflowing, overlap,
      ctaBottom: Math.round(document.querySelector('.pitch__actions .btn').getBoundingClientRect().bottom),
      approxCharsPerLine: Math.round(longest), htmlLang: document.documentElement.lang,
    };
  });
  const problems = [];
  if (r.scrollWidth > r.vw) problems.push('défilement horizontal');
  if (r.overflowing.length) problems.push(`débordement : ${r.overflowing}`);
  if (r.overlap) problems.push('jalons qui se chevauchent');
  if (external.length) problems.push(`requêtes tierces : ${external}`);
  if (errors.length) problems.push(`erreurs : ${errors}`);
  if (w < 1000 && r.ctaBottom > h) problems.push(`bouton sous la ligne de flottaison (${r.ctaBottom} > ${h})`);
  if (r.htmlLang !== lang) problems.push('attribut lang incorrect');
  if (r.approxCharsPerLine > 90) problems.push(`lignes trop longues (~${r.approxCharsPerLine} caractères)`);
  if (problems.length) failures++;
  console.log(`${lang} ${w}x${h}`, JSON.stringify(r), problems.length ? `ECHEC ${problems.join(' ; ')}` : 'OK');
  if (outDir) {
    await page.screenshot({ path: `${outDir}/${lang}-${w}.png`, fullPage: true });
    await page.screenshot({ path: `${outDir}/${lang}-${w}-ecran-1.png` });
  }
  await page.close();
}
await browser.close();
process.exit(failures ? 1 : 0);
