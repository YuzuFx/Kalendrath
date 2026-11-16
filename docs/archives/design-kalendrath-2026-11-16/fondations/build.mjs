import {readFile,writeFile,mkdir,access} from 'node:fs/promises';
import {resolve,dirname} from 'node:path';
import {fileURLToPath} from 'node:url';
const root=dirname(fileURLToPath(import.meta.url));
const read=name=>readFile(resolve(root,name),'utf8');
const css=await read('style.css');
const js=await read('main.js');
const pages=['index.html','jeu.html','logo.html'];
await mkdir(resolve(root,'dist'),{recursive:true});
for(const page of pages){
 let html=await read(page);
 for(const match of html.matchAll(/(?:src|href)="([^"]+)"/g)){
  const target=match[1];
  if(target.startsWith('#')||target.includes('://')||target==='../index.html')continue;
  await access(resolve(root,target));
 }
 html=html.replace('<link rel="stylesheet" href="style.css">',`<style>${css}</style>`).replace('<script src="main.js" defer></script>',`<script defer src="main.js"></script>`).replaceAll('../../../direction-artistique/','../../../../direction-artistique/').replaceAll('href="../index.html"','href="../../index.html"').replaceAll('href="README.md"','href="../README.md"');
 await writeFile(resolve(root,'dist',page),html);
}
await writeFile(resolve(root,'dist','main.js'),js.replaceAll('../../../direction-artistique/','../../../../direction-artistique/'));
await writeFile(resolve(root,'dist','logo.svg'),await read('logo.svg'));
console.log('3 pages compilées : CSS embarqué, références locales vérifiées. Sortie dist/.');
