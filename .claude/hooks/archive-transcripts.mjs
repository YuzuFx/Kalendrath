#!/usr/bin/env node
// Hook SessionEnd : archive les transcriptions Claude Code (conversations, sous-agents, mémoire)
// dans docs/archives/transcriptions/<machine>/, qui est un dépôt Git séparé (ignoré par le dépôt du jeu).
// Ne bloque jamais la session : toute erreur est avalée et écrite sur stderr.
import { cpSync, existsSync, mkdirSync, readFileSync, readdirSync, statSync, rmSync, openSync, writeSync, closeSync } from 'node:fs';
import { execFileSync } from 'node:child_process';
import { dirname, join } from 'node:path';
import { hostname } from 'node:os';

const projectDir = process.env.CLAUDE_PROJECT_DIR ?? process.cwd();
const archiveRoot = join(projectDir, 'docs', 'archives', 'transcriptions');

// GitHub refuse les fichiers de plus de 100 Mo : on découpe par lignes (.part00, .part01…) au-delà de 50 Mo.
const MAX_BYTES = 50 * 1024 * 1024;
function splitLargeFiles(dir) {
  for (const entry of readdirSync(dir, { withFileTypes: true })) {
    const path = join(dir, entry.name);
    if (entry.isDirectory()) { splitLargeFiles(path); continue; }
    if (!entry.isFile() || statSync(path).size <= MAX_BYTES) continue;
    const lines = readFileSync(path, 'utf8').split('\n');
    let part = 0, size = 0, fd = openSync(`${path}.part${String(part).padStart(2, '0')}`, 'w');
    for (const line of lines) {
      const chunk = line + '\n';
      const len = Buffer.byteLength(chunk);
      if (size > 0 && size + len > MAX_BYTES) {
        closeSync(fd);
        part++; size = 0;
        fd = openSync(`${path}.part${String(part).padStart(2, '0')}`, 'w');
      }
      writeSync(fd, chunk); size += len;
    }
    closeSync(fd);
    rmSync(path);
  }
}

try {
  // Le dossier source passé en argument évite de lire l'entrée standard (qui bloquerait à la main).
  let input = {};
  if (!process.argv[2]) {
    try {
      input = JSON.parse(readFileSync(0, 'utf8'));
    } catch {
      // entrée vide ou invalide
    }
  }

  const source = process.argv[2] ?? (input.transcript_path ? dirname(input.transcript_path) : null);
  if (!source || !existsSync(source)) {
    console.error('archive-transcripts : dossier source introuvable, rien à faire.');
    process.exit(0);
  }

  const target = join(archiveRoot, hostname().replace(/[^A-Za-z0-9._-]/g, '_'));
  mkdirSync(target, { recursive: true });
  cpSync(source, target, { recursive: true, force: true });
  splitLargeFiles(target);

  if (!existsSync(join(archiveRoot, '.git'))) {
    console.error('archive-transcripts : copie faite, mais le dépôt Git des archives n\'est pas initialisé.');
    process.exit(0);
  }

  const git = (...args) => execFileSync('git', ['-C', archiveRoot, ...args], { stdio: 'pipe' }).toString();
  git('add', '-A');
  if (git('status', '--porcelain').trim() === '') process.exit(0);
  git('commit', '-m', `archive ${hostname()} ${new Date().toISOString()}`);

  if (git('remote').trim() !== '') {
    try {
      git('pull', '--rebase', '--autostash');
      git('push');
    } catch (e) {
      console.error('archive-transcripts : commit local fait, push impossible (' + e.message.split('\n')[0] + ').');
    }
  }
} catch (e) {
  console.error('archive-transcripts : ' + e.message);
}
process.exit(0);
