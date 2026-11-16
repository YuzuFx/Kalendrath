// Adaptation du protocole Codex ; les contrôles restent dans .claude/hooks/.
import { spawnSync } from 'node:child_process';
import { existsSync, readFileSync } from 'node:fs';
import { dirname, isAbsolute, relative, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = resolve(dirname(fileURLToPath(import.meta.url)), '..');
const input = JSON.parse(readFileSync(0, 'utf8') || '{}');
const paths = new Set();
const add = (path) => {
  if (typeof path !== 'string' || !path) return;
  const full = resolve(input.cwd || root, path);
  const rel = relative(root, full);
  if (rel === '..' || rel.startsWith('../') || isAbsolute(rel)) return;
  paths.add(full);
};

add(input.tool_input?.file_path);
add(input.tool_response?.filePath);
const patch = typeof input.tool_input === 'string' ? input.tool_input : input.tool_input?.command;
if (input.tool_name === 'apply_patch' && typeof patch === 'string') {
  for (const match of patch.matchAll(/^\*\*\* (?:Add File:|Update File:|Delete File:|Move to:) (.+)\r?$/gm)) {
    add(match[1].trimEnd());
  }
}

const context = [];
for (const path of paths) {
  if (!existsSync(path)) {
    context.push(`Fichier supprimé ou déplacé : ${relative(root, path)}. Contrôler les références et les tests associés.`);
    continue;
  }
  const result = spawnSync(process.execPath, [resolve(root, '.claude/hooks/post-edit.mjs')], {
    cwd: root,
    env: { ...process.env, CLAUDE_PROJECT_DIR: root },
    input: JSON.stringify({ ...input, tool_input: { file_path: path } }),
    encoding: 'utf8',
    timeout: 120000,
  });
  if (result.error || result.status !== 0) {
    context.push(`Hook commun non exécuté pour ${relative(root, path)} : ${result.error?.message || result.stderr || result.status}`);
    continue;
  }
  if (result.stdout.trim()) {
    try {
      const output = JSON.parse(result.stdout);
      if (output.hookSpecificOutput?.additionalContext) context.push(output.hookSpecificOutput.additionalContext);
      if (output.systemMessage) context.push(output.systemMessage);
    } catch {
      context.push(`Sortie du hook commun non reconnue pour ${relative(root, path)}.`);
    }
  }
}
if (context.length) {
  process.stdout.write(JSON.stringify({ hookSpecificOutput: {
    hookEventName: 'PostToolUse', additionalContext: [...new Set(context)].join('\n\n'),
  } }));
}
