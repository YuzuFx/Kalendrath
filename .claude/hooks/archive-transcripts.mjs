#!/usr/bin/env node
// Hook SessionEnd : archive les transcriptions Claude Code (conversations, sous-agents, mémoire)
// dans docs/archives/transcriptions/<machine>/, qui est un dépôt Git séparé (ignoré par le dépôt du jeu).
// Ne bloque jamais la session : toute erreur est avalée et écrite sur stderr.
import { cpSync, existsSync, mkdirSync, readFileSync } from 'node:fs';
import { execFileSync } from 'node:child_process';
import { dirname, join } from 'node:path';
import { hostname } from 'node:os';

const projectDir = process.env.CLAUDE_PROJECT_DIR ?? process.cwd();
const archiveRoot = join(projectDir, 'docs', 'archives', 'transcriptions');

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
