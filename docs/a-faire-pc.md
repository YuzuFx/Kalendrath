# À faire sur le PC

Rédigé le 2026-11-04 depuis le Mac. À lire en début de session sur le PC : demander à Claude Code « reprends `docs/a-faire-pc.md` ». Cocher au fur et à mesure.

Contexte : des rapports d'agents et des branches du week-end du 2026-10-31 n'existent que sur le PC (ni sur `origin`, ni sur le Mac). Les étapes 1 à 3 sont **urgentes** et se font **avant** tout nouveau travail.

## Urgent (dans cet ordre)

- ☐ **1. Sauvegarder les conversations du PC.** Copier le dossier du projet dans `.claude/projects/` du profil utilisateur Windows (le nom du dossier encode le chemin du projet) vers un endroit sûr, hors du dépôt. Ne rien supprimer. Ces fichiers contiennent les rendus des agents du week-end.
- ☐ **2. Sauver les branches non poussées.**
  - `git fetch origin`, puis `git branch -vv` : repérer les branches sans suivi distant ou marquées « ahead ».
  - Pousser en priorité `feat/heros-suite` (commit `f3a6a17c`, citée dans [taches-a-valider.md](taches-a-valider.md)) : `git push -u origin feat/heros-suite`.
  - Faire de même pour toute autre branche locale utile, et pour les branches `worktree-agent-*` du PC.
  - Vérifier aussi `git status` dans chaque worktree de `.claude/worktrees/` (fichiers non commités).
- ☐ **3. Récupérer le travail du Mac.** `git pull` sur `main` (cela suppose que les modifications du Mac ont été commitées et poussées : voir la note en bas).

## Archives de transcriptions

- ☐ **4. Cloner le dépôt d'archives** à sa place, hors du suivi du jeu :
  `git clone https://github.com/YuzuFx/kalendrath-archives.git docs/archives/transcriptions`
  Le jeton GitHub du PC doit avoir accès en écriture à ce dépôt (le jeton « fine-grained » doit lister `kalendrath-archives`, permission *Contents* en lecture et écriture).
- ☐ **5. Tester le hook sous Windows.** Il n'a été testé que sur macOS. Lancer à la main :
  `node .claude/hooks/archive-transcripts.mjs "<dossier du projet dans .claude/projects>"`
  Vérifier : une copie dans `docs/archives/transcriptions/<nom-de-la-machine>/`, un commit, un push. Si une erreur apparaît (chemins, `hostname`, variable `CLAUDE_PROJECT_DIR`), la noter ici pour que Claude corrige le script.
- ☐ **6. Récupérer les rapports du week-end.** Une fois les conversations sauvegardées (étape 1) et les archives poussées (étape 5), demander à Claude Code de retrouver les rendus d'agents du vendredi 2026-10-31 et de les verser dans `docs/archives/retours-agents-*.md`.

## Ensuite (moins urgent)

- ☐ **7. Installer Codex** et vérifier qu'il lit le dépôt. Sa mise en parité avec Claude Code (fichier `AGENTS.md`, audit complet) reste à faire ; voir la discussion du 2026-11-03.
- ☐ **8. Repérer les écarts de configuration** entre les deux machines (version de Node, de Docker, extension Claude Code) qui pourraient expliquer des comportements différents.

## Rappels

- **Avant de changer de machine :** commit, push du jeu **et** des archives (« fais le push » lance les deux, cf. [CLAUDE.md](../CLAUDE.md)).
- **Sessions web :** ouvrir une session web dans VS Code la télécharge en local, et elle n'est plus disponible ailleurs. La doc précise que les modifications ne sont pas resynchronisées vers claude.ai. Ne pas compter sur elle comme sauvegarde.
- **Ma mémoire (`memory/`) est locale à chaque machine.** Ce qui doit être connu partout est dans [CLAUDE.md](../CLAUDE.md) ou dans `docs/`.

## Note sur ce fichier

Ce fichier n'existe sur le PC qu'après un `git pull`. Il faut donc que le Mac l'ait commité et poussé avant que vous vous mettiez au PC.
