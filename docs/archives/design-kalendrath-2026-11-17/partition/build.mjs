import { readFile, writeFile, mkdir, access } from 'node:fs/promises';
import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';
import { Script } from 'node:vm';
const root = dirname(fileURLToPath(import.meta.url));
const files = ['index.html', 'jeu.html', 'style.css', 'script.js', 'logo.svg', ...Array.from({length:5}, (_,i)=>`silhouette-${i+6}.svg`)];
new Script(await readFile(resolve(root,'script.js'),'utf8'));
await mkdir(resolve(root,'dist'), {recursive:true});
for (const file of files) {
 const source = await readFile(resolve(root,file),'utf8');
 for (const match of source.matchAll(/(?:src|href)="([^"]+)"|url\('([^']+)'\)/g)) {
  const path = match[1] || match[2];
  if (path.startsWith('#') || ['../index.html','../identite.html'].includes(path)) continue;
  await access(resolve(root,path.split('#')[0]));
 }
 const output = source.replaceAll('../../../direction-artistique/','../../../../direction-artistique/').replaceAll("../fonts/","../../fonts/").replaceAll('href="../index.html"','href="../../index.html"').replaceAll('href="../identite.html"','href="../../identite.html"');
 await writeFile(resolve(root,'dist',file),output);
}
console.log('Assemblage statique réussi : 2 pages + styles/scripts + 6 SVG. Syntaxe JS et ressources locales contrôlées. dist dépend du dépôt et des polices communes.');
