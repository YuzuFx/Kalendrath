import { readFile, mkdir, copyFile } from 'node:fs/promises';
const files = ['index.html','jeu.html','logo.html','style.css','app.js','logo.svg','carte.svg','cite.svg','logo-complet.svg','README.md'];
await mkdir(new URL('./dist/', import.meta.url), { recursive: true });
for (const file of files) {
  const content = await readFile(new URL(file, import.meta.url), 'utf8');
  if (!content.trim()) throw new Error(`Empty file: ${file}`);
  if (file.endsWith('.html') && (!content.includes('lang="fr"') || !content.includes('name="viewport"'))) throw new Error(`Missing document metadata: ${file}`);
  await copyFile(new URL(file, import.meta.url), new URL(`dist/${file}`, import.meta.url));
}
console.log(`Atlas: ${files.length} static assets verified and built in dist/.`);
