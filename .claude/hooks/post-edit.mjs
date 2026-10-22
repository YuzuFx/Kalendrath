// Hook PostToolUse (Write|Edit) de Kalendrath : applique les règles de CLAUDE.md après chaque édition.
//
// - PHP : pint (format) puis phpstan sur le fichier, dans le conteneur ogamex-app. Les erreurs phpstan
//   sont renvoyées à Claude.
// - Domaine (app/Services, app/GameMissions, app/GameObjects, app/Models) : rappel « proche de l'upstream,
//   règle + test Pest ».
// - Blade hors administration : rappel « rien de durable en Blade, l'interface est en React ».
// - Contrôleurs d'API : rappel « aucune logique de jeu, valider / appeler un service / sérialiser ».
// - Simulateur (tools/theorycrafting) : tests relancés ; si model.js change, rappel de régénérer la page.
//
// Les rappels ne sont donnés qu'une fois par session. Le hook ne bloque jamais l'édition.
import { spawnSync } from 'node:child_process';
import { existsSync, readFileSync, writeFileSync } from 'node:fs';
import { tmpdir } from 'node:os';
import { join, relative, sep } from 'node:path';

const input = JSON.parse(readFileSync(0, 'utf8') || '{}');
const projectDir = process.env.CLAUDE_PROJECT_DIR || process.cwd();
const filePath = input.tool_input?.file_path || input.tool_response?.filePath;
if (!filePath) process.exit(0);

const rel = relative(projectDir, filePath).split(sep).join('/');
if (rel.startsWith('..') || /^(vendor|node_modules|storage|public\/build)\//.test(rel)) process.exit(0);

const context = [];
const failures = [];

// Rappels une fois par session.
const seenPath = join(tmpdir(), `kalendrath-hooks-${input.session_id || 'x'}.json`);
let seen = {};
try { seen = JSON.parse(readFileSync(seenPath, 'utf8')); } catch {}
const once = (key, text) => { if (!seen[key]) { seen[key] = true; context.push(text); } };

function run(cmd, args, timeoutMs = 45000) {
  const r = spawnSync(cmd, args, { cwd: projectDir, encoding: 'utf8', timeout: timeoutMs });
  return { code: r.status, out: `${r.stdout || ''}${r.stderr || ''}`.trim(), error: r.error };
}
const container = () => run('docker', ['compose', 'exec', '-T', 'ogamex-app', 'true'], 15000).code === 0;
const trim = (s, n = 2500) => (s.length > n ? s.slice(0, n) + '\n[…]' : s);

const isBlade = rel.endsWith('.blade.php');

// PHP : format et analyse statique.
if (rel.endsWith('.php') && !isBlade) {
  if (!container()) {
    once('docker', "Hook : le conteneur ogamex-app ne répond pas, pint et phpstan n'ont pas été lancés. Démarrer Docker (docker compose up -d) pour les réactiver.");
  } else {
    run('docker', ['compose', 'exec', '-T', 'ogamex-app', './vendor/bin/pint', rel]);
    if (/^(app|database|php\/Rules|tests)\//.test(rel)) {
      const stan = run('docker', ['compose', 'exec', '-T', 'ogamex-app', './vendor/bin/phpstan', 'analyse',
        '--memory-limit=512M', '--no-progress', '--error-format=raw', rel], 90000);
      if (stan.code !== 0 && stan.out) failures.push(`phpstan signale des erreurs dans ${rel} :\n${trim(stan.out)}`);
    }
  }
}

// Domaine hérité d'OGameX.
if (/^app\/(Services|GameMissions|GameObjects|Models)\//.test(rel)) {
  once('domaine', "Rappel CLAUDE.md : app/Services, app/GameMissions, app/GameObjects et app/Models restent proches de l'upstream lanedirt/OGameX. On n'y touche qu'avec raison (résolution temporelle Phase 3c, mécaniques différenciantes Phase 4), et toute règle ajoutée vient avec son test Pest.");
}

// Blade : seule l'administration serveur reste en Blade.
if (isBlade && !/^resources\/views\/ingame\/(admin\/|layouts\/admin-menu)/.test(rel)) {
  once('blade', "Rappel CLAUDE.md : ne rien développer en Blade qui soit destiné à durer. Les nouvelles fonctionnalités se construisent dans l'interface React ; seule l'administration serveur reste en Blade.");
}

// API JSON.
if (/^app\/Http\/Controllers\/Api\//.test(rel)) {
  once('api', "Rappel CLAUDE.md : aucune logique de jeu dans les contrôleurs API. Ils valident, appellent un service, sérialisent ; toute règle manquante va dans app/Services ou app/GameMissions avec son test Pest.");
}

// Simulateur de theorycrafting.
if (/^tools\/theorycrafting\/.*\.js$/.test(rel)) {
  const test = run('node', ['--test', 'tools/theorycrafting/model.test.js']);
  if (test.code !== 0) failures.push(`Les tests du simulateur échouent après la modification de ${rel} :\n${trim(test.out)}`);
  if (rel === 'tools/theorycrafting/model.js') {
    once('modele', "Le modèle de theorycrafting a changé : lancer node tools/theorycrafting/build-artifact.js puis republier tools/theorycrafting/arbre-prerequis.html au même lien, et reporter dans le GDD (section 4.2) ce qui est validé.");
  }
}

try { writeFileSync(seenPath, JSON.stringify(seen)); } catch {}

if (!context.length && !failures.length) process.exit(0);
const out = { hookSpecificOutput: { hookEventName: 'PostToolUse', additionalContext: [...failures, ...context].join('\n\n') } };
if (failures.length) out.systemMessage = failures.map(f => f.split('\n')[0]).join(' · ');
process.stdout.write(JSON.stringify(out));
