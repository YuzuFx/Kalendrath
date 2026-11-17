import {readFile,access} from 'node:fs/promises';
import {dirname,resolve} from 'node:path';
import {fileURLToPath} from 'node:url';
const root=dirname(fileURLToPath(import.meta.url));
for(const f of ['index.html','identite.html']){
 const html=await readFile(resolve(root,f),'utf8');
 for(const [,url] of html.matchAll(/(?:src|href)="([^"#]+)"/g)){
  if(!/^(https?:|data:)/.test(url))await access(resolve(root,url));
 }
}
console.log('Comparateur et identité : références locales vérifiées. Sources statiques sans transpilation.');
