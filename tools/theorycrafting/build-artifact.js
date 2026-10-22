// Recopie model.js dans le bloc <script id="model"> de arbre-prerequis.html,
// pour que la page interactive utilise exactement les données et le moteur du dépôt.
//
//   node tools/theorycrafting/build-artifact.js
//
// La page se republie ensuite comme artefact (même lien) depuis ce fichier.
import { readFileSync, writeFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const dir = dirname(fileURLToPath(import.meta.url));
const pagePath = join(dir, 'arbre-prerequis.html');
const model = readFileSync(join(dir, 'model.js'), 'utf8')
  // Le navigateur charge le modèle comme script classique : la ligne d'export n'y a pas sa place.
  .replace(/^export \{[^}]*\};\s*$/m, '')
  .trimEnd();
const page = readFileSync(pagePath, 'utf8');
const pattern = /(<script id="model">\n)[\s\S]*?(\n<\/script>)/;
if (!pattern.test(page)) {
  console.error('Bloc <script id="model"> introuvable dans arbre-prerequis.html.');
  process.exit(1);
}
writeFileSync(pagePath, page.replace(pattern, (_, open, close) => open + model + close));
console.log('arbre-prerequis.html mis à jour depuis model.js.');
