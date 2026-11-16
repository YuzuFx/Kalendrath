import { readFile, access } from 'node:fs/promises';
import { fileURLToPath } from 'node:url';
import { dirname, resolve } from 'node:path';
const root = dirname(fileURLToPath(import.meta.url));
const html = await readFile(resolve(root, 'index.html'), 'utf8');
for (const match of html.matchAll(/(?:src|href)="([^"#]+)"/g)) {
  if (!/^(https?:|data:)/.test(match[1])) await access(resolve(root, match[1]));
}
console.log('Portail statique : tous les fichiers liés sont présents. HTML/CSS servis directement, aucune transpilation nécessaire.');
