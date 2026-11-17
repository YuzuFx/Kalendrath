import {readFile,writeFile,mkdir,access,copyFile} from 'node:fs/promises';
import {resolve,dirname,basename} from 'node:path';
import {fileURLToPath} from 'node:url';
const root=dirname(fileURLToPath(import.meta.url));const out=resolve(root,'dist');
await mkdir(resolve(out,'assets'),{recursive:true});
const files=['index.html','jeu.html','style.css','main.js'];
for(const name of files){let content=await readFile(resolve(root,name),'utf8');
 for(const match of content.matchAll(/(?:\.\.\/){3}direction-artistique\/references\/[A-Za-z0-9_-]+\.png/g)){const path=match[0];await access(resolve(root,path));await copyFile(resolve(root,path),resolve(out,'assets',basename(path)));}
 if(name==='main.js')for(const match of content.matchAll(/'([a-z0-9-]+\.png)'/g)){await copyFile(resolve(root,'../../../direction-artistique/references',match[1]),resolve(out,'assets',match[1]));}
 content=content.replaceAll('../../../direction-artistique/references/','assets/');await writeFile(resolve(out,name),content);
}
await copyFile(resolve(root,'logo.svg'),resolve(out,'logo.svg'));
await copyFile(resolve(root,'README.md'),resolve(out,'README.md'));
console.log('Build OK : 2 pages, styles, script, logo et images I–V copiés. Polices partagées attendues en ../fonts/.');
