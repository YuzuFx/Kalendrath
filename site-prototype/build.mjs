// Génère le HTML statique de chaque langue (fr/index.html, en/index.html), la racine, robots.txt et sitemap.xml.
// Aucune dépendance : `node site-prototype/build.mjs`. Les textes vivent dans src/fr.json et src/en.json.
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const root = path.dirname(fileURLToPath(import.meta.url));
const template = fs.readFileSync(path.join(root, 'src/template.html'), 'utf8');

const switcher = (lang) => lang === 'fr'
  ? '<span aria-current="true" lang="fr">FR</span>\n      <a href="/en/" hreflang="en" lang="en" aria-label="English">EN</a>'
  : '<a href="/fr/" hreflang="fr" lang="fr" aria-label="Français">FR</a>\n      <span aria-current="true" lang="en">EN</span>';

for (const lang of ['fr', 'en']) {
  const s = JSON.parse(fs.readFileSync(path.join(root, `src/${lang}.json`), 'utf8'));
  s.lang_switch = switcher(lang);
  s.marks = s.marks.map((m) =>
    `<li class="mark${m.now ? ' mark--now' : ''}"><span>${m.t}${m.now ? ` <span class="mark__state">${s.state_now}</span>` : ''}</span></li>`
  ).join('\n        ');
  const html = template.replace(/\{\{(\w+)\}\}/g, (_, k) => {
    if (!(k in s)) throw new Error(`Clé manquante dans ${lang}.json : ${k}`);
    return s[k];
  });
  fs.mkdirSync(path.join(root, lang), { recursive: true });
  fs.writeFileSync(path.join(root, lang, 'index.html'), html);
}

// Racine : choix de la langue (le navigateur, sinon l'anglais), avec lien direct sans JavaScript.
fs.writeFileSync(path.join(root, 'index.html'), `<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kalendrath</title>
<meta name="robots" content="noindex">
<meta name="color-scheme" content="dark">
<link rel="canonical" href="https://kalendrath.com/en/">
<link rel="alternate" hreflang="fr" href="https://kalendrath.com/fr/">
<link rel="alternate" hreflang="en" href="https://kalendrath.com/en/">
<link rel="alternate" hreflang="x-default" href="https://kalendrath.com/en/">
<style>
  body { margin: 0; min-height: 100svh; display: grid; place-content: center; gap: 1.5rem; text-align: center; background: #1D2631; color: #E6E2D8; font: 1.25rem/1.5 system-ui, sans-serif; }
  a { color: #C59B5E; margin-inline: 1rem; }
</style>
<script>
try {
  var saved = localStorage.getItem('kalendrath-lang');
  var l = saved || ((navigator.language || 'en').slice(0, 2) === 'fr' ? 'fr' : 'en');
  location.replace('/' + l + '/');
} catch (e) {}
</script>
</head>
<body>
<p>Kalendrath</p>
<p><a href="/fr/" hreflang="fr" lang="fr">Français</a><a href="/en/" hreflang="en" lang="en">English</a></p>
</body>
</html>
`);

fs.writeFileSync(path.join(root, 'robots.txt'), 'User-agent: *\nAllow: /\nSitemap: https://kalendrath.com/sitemap.xml\n');
fs.writeFileSync(path.join(root, 'sitemap.xml'), `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
${['fr', 'en'].map((l) => `  <url>
    <loc>https://kalendrath.com/${l}/</loc>
    <xhtml:link rel="alternate" hreflang="fr" href="https://kalendrath.com/fr/"/>
    <xhtml:link rel="alternate" hreflang="en" href="https://kalendrath.com/en/"/>
    <xhtml:link rel="alternate" hreflang="x-default" href="https://kalendrath.com/en/"/>
  </url>`).join('\n')}
</urlset>
`);
console.log('Build OK');
