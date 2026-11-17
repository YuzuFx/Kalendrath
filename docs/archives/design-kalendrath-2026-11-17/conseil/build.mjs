import { mkdir, copyFile, readFile } from 'node:fs/promises';
const files = ['index.html', 'jeu.html', 'style.css', 'app.js', 'logo.svg', 'README.md'];
await mkdir(new URL('dist/', import.meta.url), {recursive: true});
for (const file of files) {
 const content = await readFile(new URL(file, import.meta.url), 'utf8');
 if (!content.trim()) throw new Error(`Empty asset: ${file}`);
 if (file.endsWith('.html') && (!content.includes('lang="fr"') || !content.includes('name="viewport"'))) throw new Error(`Missing metadata: ${file}`);
 await copyFile(new URL(file, import.meta.url), new URL(`dist/${file}`, import.meta.url));
}
console.log(`Conseil: ${files.length} source assets verified and assembled. Shared illustration paths are resolved by the parent publishing bundle.`);
