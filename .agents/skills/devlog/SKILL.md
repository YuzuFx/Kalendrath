---
name: devlog
description: Méthode et gabarit pour rédiger un devlog, une note de version ou une news de Kalendrath en français et en anglais, à partir de l'historique git et des synthèses de docs/sessions. À utiliser quand Gregory demande un devlog, une news, des notes de version, un résumé de ce qui a avancé, ou une annonce de jalon ou de chapitre.
---

# Devlog, news et notes de version

Cadre éditorial : [docs/plan-marketing.md](../../../docs/plan-marketing.md), sections 3 (ton), 6 (flux, format, versions, publication) et 7 (cadence). Ne pas le dupliquer ici. Voix : skill `voix-kalendrath`. Noms : skill `lexique-kalendrath`.

## Choisir le bon type

| Type | Quand | Public | Ton | Destination |
|---|---|---|---|---|
| Devlog | Toutes les deux semaines | Curieux, communauté | « Je » de Gregory, sincère, chiffré | Vitrine, `#devlog`, X |
| News | Un événement (jalon, chapitre, devlog publié, sondage) | Tout le monde | Épique en accroche, clair ensuite | `#news`, vitrine, e-mail, X |
| Notes de version | Chaque mise à jour, dès l'alpha | Joueur engagé, testeur | Neutre, exhaustif | `#notes-de-version` / `#release-notes`, vitrine |

Un devlog s'accompagne d'une news qui l'annonce. Un serveur plus jeune qui atteint un chapitre déjà sorti sur s1 est une news, pas une note de version.

## Collecter la matière

1. Dernière publication : `ls content/` si présent, sinon dernier devlog connu. Repérer la date de coupure.
2. Historique : `git log --since=<date> --no-merges --pretty='%h %ad %s' --date=short`, puis `git log --stat` pour jauger l'ampleur.
3. Synthèses : lire les fichiers de `docs/sessions/` postérieurs à la coupure (décisions, chiffres, blocages).
4. Trier : ce que le joueur verra ou comprendra vs ce qui reste interne. Les commits `docs:` et refactors sans effet visible se résument en une phrase au plus.
5. Ne rien inventer : une date, un chiffre ou une mécanique absents des sources s'écrit **[TBD]** ou s'omet. Les mécaniques du GDD marquées **[TBD]** ne s'annoncent pas.

## Gabarit devlog (1 page)

```
# <Titre court, image du monde ou fait marquant>
<Accroche : 2 phrases>
## Ce qui a avancé      (3 à 5 points, chiffrés)
## Ce qui a coincé      (honnête, une touche de légèreté possible)
## Ce que j'ai appris / décidé
## Prochaine étape      (jalon, pas de date avant les préinscriptions)
## Votre avis           (une question précise, lien vers le forum ou sondage)
```

## Gabarit news

Titre, un visuel (à préciser), trois à cinq lignes, un lien. Accroche épique, puis clair. Voir l'exemple dans `voix-kalendrath`.

## Gabarit notes de version

Format exact dans la section 6 du plan marketing : « Nouveautés, Équilibrage, Interface, Corrections, Problèmes connus ». Règles :
- Numéro selon la table des versions (alpha `0.1`-`0.4`, bêta `0.5`-`0.9`, `1.0`, une majeure par chapitre, `X.Y.Z` pour les correctifs).
- Une ligne par modification, impersonnelle, noms du lexique.
- Équilibrage toujours « ancienne -> nouvelle valeur ».
- Sections vides omises, sauf « Problèmes connus » si connus.
- Mention du joueur ou outil qui a inspiré une modification (crédit) quand il y en a.

## Sortie

Fichiers dans le dépôt, un par langue :
- `content/news/{fr,en}/AAAA-MM-JJ-titre.md`
- `content/notes-de-version/{fr,en}/X.Y.Z.md`

*[Revue] Le site vit dans `site/` (décision du 2026-10-30) et le brief de la vitrine (3.1) place les articles dans `site/src/content/news/{fr,en}/` avec un front matter `title`, `date`, `lang`, `type`, `translationKey`. Aligner ces chemins sur le générateur retenu dès que `site/` existe.*
- Devlog : suivre le dossier existant dans `content/` s'il y en a un, sinon proposer l'emplacement à Gregory.

Rédiger le FR puis l'EN (réécriture native, pas calque). Texte long pour Discord : prévoir un résumé avec lien. Terminer par `checklist-publication`. Ne pas commiter ni publier sans accord : Gregory valide en fusionnant sur `main`.
