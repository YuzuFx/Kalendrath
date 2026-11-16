# Intégration Codex de Kalendrath

Vérification du 4 novembre 2026. Le cadre reste `AGENTS.md` → `CLAUDE.md` ; les règles métier et éditoriales ne sont pas recopiées ici.

## Skills

Les cinq skills sont découverts dans `.agents/skills/`. Leur source est `.claude/skills/` : ne jamais éditer les copies. Vérification : `node tools/sync-agents-skills.mjs --check`.

## Hook après édition

`.codex/hooks.json` appelle `post-edit.mjs`, adaptateur de protocole seulement. Les contrôles restent exclusivement dans `.claude/hooks/post-edit.mjs`.

Codex transmet un patch dans `tool_input.command`, alors que le hook commun attend `tool_input.file_path`. L'adaptateur extrait les chemins des opérations ajout/modification/déplacement/suppression, refuse les chemins hors projet, puis appelle le script commun pour chaque fichier existant. Les suppressions produisent un rappel sans lancer de formateur sur un fichier absent. Les événements à chemin explicite restent acceptés.

Le filtre `Write|Edit` reconnaît `apply_patch` dans Codex. Les modifications faites par une commande shell ne sont pas converties en événements d'édition : l'agent doit lancer les contrôles requis explicitement. Un hook par fichier ne remplace jamais la chaîne de qualité prévue par le projet.

**Tests effectués :** protocole Codex multi-fichiers, protocole Claude, suppression, refus hors projet, événement de lecture sans effet ; syntaxe Node valide. Tests d'intégration exécutés hors du sandbox : dans le sandbox de cette session, la création synchrone du sous-processus Node a expiré. Aucun test de formatage sur un fichier du domaine n'a été fait. Le conteneur PHP n'était pas démarré.

**Activation automatique :** Codex redemande la confiance lorsque la définition d'un hook change. Utiliser la revue des hooks de l'extension ou `/hooks` dans le CLI. Ne jamais fabriquer les `trusted_hash` de `~/.codex/config.toml`. Les tests manuels prouvent la compatibilité de protocole ; ils ne prouvent pas que la nouvelle définition sera exécutée automatiquement avant cette revue. Source : [documentation officielle des hooks](https://learn.chatgpt.com/docs/hooks).

## Archivage des transcriptions

Le hook Codex `SessionEnd` a été retiré. Deux différences empêchent de réutiliser directement le script Claude sans autre changement :

- Il fait `git add -A`, commit, pull/rebase et push automatiquement. Gregory peut interdire ces opérations dans une session, comme pendant cet audit.
- Il archive `dirname(transcript_path)` : chez Codex ce dossier regroupe les sessions d'une journée, éventuellement de plusieurs projets. Test en bac à sable : les deux transcriptions sœurs ont été copiées, alors qu'une seule était indiquée.

La correction durable à proposer dans la source commune est un mode de copie locale explicite, sans Git, et une sélection de fichiers adaptée à chaque fournisseur. Ce travail modifierait un fichier Claude : il n'a pas été réalisé lors de cet audit. En attendant, le compte rendu demandé va toujours dans `docs/archives/`, et l'archivage Git reste une action explicite. La commande actuelle ne doit pas être utilisée pour une simple copie locale.

## Navigateur Windows / WSL

Un accès direct a été testé, sans installation supplémentaire :

- Chrome Windows : `C:\Program Files\Google\Chrome\Application\chrome.exe`.
- Profil dédié : `%LOCALAPPDATA%\KalendrathCodexChrome` ; port CDP local `9224`.
- Le port Windows ne répondait pas directement depuis le Node Linux de WSL. Node Windows (`C:\Program Files\nodejs\node.exe`) l'atteint et peut charger le Playwright déjà installé dans le cache npm de Gregory via `\\wsl.localhost\Ubuntu\…`.
- Connexion testée : `chromium.connectOverCDP('http://127.0.0.1:9224')`. En quittant le script, `browser.close()` déconnecte le client CDP ; la fenêtre Chrome reste ouverte.
- Lire les seuls onglets autorisés pour la mission. Ne jamais publier, partager ou ouvrir d'autres conversations implicitement. Les captures destinées au dépôt doivent exclure la barre latérale personnelle de Claude.

Les scripts de l'audit et leurs caches sont temporaires dans `/tmp/kalendrath-browser-audit*`. Le chemin du cache npm est une donnée de machine, pas une dépendance durable. Aucun serveur MCP n'a été ajouté à Codex : `codex mcp list --json` retourne `[]`. Pour un usage durable, installer/configurer Playwright MCP explicitement avec une version et un chemin stables, puis vérifier ses outils dans la session relancée. Ne pas inscrire un chemin de cache npm éphémère dans la configuration partagée.

Claude dispose d'un MCP Playwright dans sa configuration utilisateur ; cette configuration n'est pas automatiquement héritée par Codex. Les plugins Claude (superpowers, code-review, security) ne deviennent pas non plus des plugins Codex par copie de leurs noms. Les capacités de revue et de sous-agents existent dans cette session Codex ; les politiques de délégation et les modèles disponibles restent propres à chaque outil.
