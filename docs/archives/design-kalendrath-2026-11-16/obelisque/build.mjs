import { readFile, writeFile, mkdir, access } from 'node:fs/promises';
import { resolve, dirname } from 'node:path';
import { fileURLToPath } from 'node:url';
import { createHash } from 'node:crypto';
import { Script } from 'node:vm';
const root = dirname(fileURLToPath(import.meta.url));
const files = ['index.html', 'jeu.html', 'logo.html', 'style.css', 'script.js', 'logo.svg'];
new Script(await readFile(resolve(root, 'script.js'), 'utf8'));
await mkdir(resolve(root, 'dist'), { recursive: true });
const hashes = {};
for (const file of files) {
  const source = await readFile(resolve(root, file), 'utf8');
  if (file.endsWith('.html') || file.endsWith('.css')) {
    for (const match of source.matchAll(/(?:src|href)="([^"]+)"|url\('([^']+)'\)/g)) {
      const target = match[1] || match[2];
      if (target.startsWith('#') || target === '../index.html' || target.includes('://')) continue;
      await access(resolve(root, target.split('#')[0]));
    }
  }
  const output = source.replaceAll('../../../direction-artistique/', '../../../../direction-artistique/').replaceAll('href="../index.html"', 'href="../../index.html"');
  await writeFile(resolve(root, 'dist', file), output);
  hashes[file] = createHash('sha256').update(output).digest('hex');
}
await writeFile(resolve(root, 'dist', 'manifest.json'), JSON.stringify(hashes, null, 2));
console.log('Build statique réussi : 3 pages, CSS, JS, SVG ; références locales et syntaxe JS vérifiées. dist reste lié aux illustrations du dépôt.');
