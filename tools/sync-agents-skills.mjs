#!/usr/bin/env node
// Recopie .claude/skills (source unique) vers .agents/skills (lu par Codex).
// Sans lien symbolique, pour que ça marche aussi sous Windows.
// Usage : node tools/sync-agents-skills.mjs          (copie)
//         node tools/sync-agents-skills.mjs --check  (échoue si les deux dossiers divergent)
import { cpSync, existsSync, readdirSync, readFileSync, rmSync, statSync } from 'node:fs';
import { join } from 'node:path';

const source = '.claude/skills';
const target = '.agents/skills';
const files = (dir, base = dir) =>
  readdirSync(dir).flatMap((n) => {
    const p = join(dir, n);
    return statSync(p).isDirectory() ? files(p, base) : [p.slice(base.length + 1)];
  });

if (process.argv.includes('--check')) {
  const a = files(source).sort();
  const b = existsSync(target) ? files(target).sort() : [];
  const same = a.join() === b.join() && a.every((f) => readFileSync(join(source, f), 'utf8') === readFileSync(join(target, f), 'utf8'));
  if (!same) {
    console.error('.agents/skills diverge de .claude/skills : lancer node tools/sync-agents-skills.mjs');
    process.exit(1);
  }
  process.exit(0);
}
rmSync(target, { recursive: true, force: true });
cpSync(source, target, { recursive: true });
console.log(`${files(target).length} fichier(s) copiés vers ${target}`);
