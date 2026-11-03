// Lighthouse sur FR et EN, mobile et bureau. Échoue sous les seuils.
// Usage : node tests/lighthouse.mjs [baseUrl]
import lighthouse from 'lighthouse';
import { launch } from 'chrome-launcher';
import { chromium } from 'playwright';

const base = process.argv[2] || 'http://localhost:8765';
// Seuils : performance mesurée sur un serveur statique local sans compression, donc volontairement indulgents.
const min = { performance: { mobile: 90, desktop: 70 }, accessibility: 95, 'best-practices': 95, seo: 95 };
const chrome = await launch({ chromePath: chromium.executablePath(), chromeFlags: ['--headless=new', '--no-sandbox'] });
let failures = 0;
for (const lang of ['fr', 'en']) for (const form of ['mobile', 'desktop']) {
  const config = form === 'desktop'
    ? { extends: 'lighthouse:default', settings: { formFactor: 'desktop', screenEmulation: { mobile: false, width: 1350, height: 940, deviceScaleFactor: 1, disabled: false } } }
    : undefined;
  const { lhr } = await lighthouse(`${base}/${lang}/`, { port: chrome.port, output: 'json', logLevel: 'error', onlyCategories: ['performance', 'accessibility', 'best-practices', 'seo'] }, config);
  const scores = Object.fromEntries(Object.entries(lhr.categories).map(([k, v]) => [k, Math.round(v.score * 100)]));
  const bad = Object.entries(scores).filter(([k, v]) => v < (k === 'performance' ? min.performance[form] : min[k]));
  if (bad.length) failures++;
  console.log(lang, form, JSON.stringify(scores), 'LCP', Math.round(lhr.audits['largest-contentful-paint'].numericValue), 'ms', bad.length ? `ECHEC ${bad.map(([k]) => k)}` : 'OK');
}
await chrome.kill();
process.exit(failures ? 1 : 0);
