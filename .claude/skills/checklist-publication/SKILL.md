---
name: checklist-publication
description: Checklist à parcourir avant toute publication publique de Kalendrath (devlog, news, notes de version, post Reddit ou X, message Discord, e-mail, page de la vitrine, texte Patreon). À utiliser dès qu'un texte est prêt à partir, ou que Gregory demande de relire, valider ou publier une communication.
---

# Checklist avant publication

Cadre : [docs/plan-marketing.md](../../../docs/plan-marketing.md) (sections 3, 5, 6, 7, 8). Parcourir chaque point, répondre par OK, correction faite, ou question à Gregory. Ne rien publier ni commiter sans son accord.

## 1. Voix
- [ ] Registre conforme au tableau de `voix-kalendrath` (news épique, notes neutres, devlog à la première personne).
- [ ] Vouvoiement tenu en FR (tutoiement seulement en devlog ou discussion).
- [ ] Une seule touche de légèreté au plus ; aucun emoji-blague, aucune majuscule criée, pas de familiarité.
- [ ] Pas de comparaison avec OGame ou Travian dans l'accroche, pas de jargon marketing.

## 2. Bilingue
- [ ] Version FR et version EN toutes deux prêtes, EN réécrite et non calquée.
- [ ] Mêmes faits, mêmes chiffres, mêmes liens dans les deux langues.
- [ ] Salon, compte ou dossier propre à chaque langue (`Kalendrath` EN, `Kalendrath_FR`, `#news` FR/EN, `/fr` `/en`).

## 3. Lexique et faits
- [ ] Noms de jeu conformes à `lexique-kalendrath` ; aucun nom inventé (sinon **[TBD]** ou « provisoire »).
- [ ] Aucune mécanique **[TBD]** du GDD annoncée comme acquise ; rien qui relève de « plus tard ».
- [ ] Chiffres vérifiés contre le code, le GDD ou le simulateur ; équilibrage en « ancienne -> nouvelle valeur ».
- [ ] Aucune date promise avant les préinscriptions ; après, date tenue avec sa marge.
- [ ] Mention de l'IA générative cohérente avec la transparence voulue, si des visuels IA sont utilisés.

## 4. Liens et visuels
- [ ] Tous les liens ouvrent (vitrine `kalendrath.com`, Discord, Patreon, page de la news), en FR et EN.
- [ ] Captures : écran à jour, sans donnée de test ni information privée, mockup signalé comme tel, format PC et mobile si pertinent.
- [ ] Visuels : bon ratio par canal, texte alternatif, droits clairs.

## 5. Canal et horaire
- [ ] Bon canal pour ce type : news -> `#news`, vitrine, e-mail, X ; notes de version -> `#notes-de-version`/`#release-notes`, vitrine ; devlog -> `#devlog`, vitrine.
- [ ] Règles de la communauté lues (Reddit : un post par subreddit et par mois max, promotion sous un quart de l'activité, règle sur l'IA).
- [ ] Texte trop long pour Discord : résumé et lien.
- [ ] Horaire choisi pour l'audience de chaque langue ; pas de publication FR et EN en conflit ; pas de lancement un soir ou un week-end où Gregory est indisponible pour répondre.
- [ ] Cadence respectée (devlog tous les 15 jours ; message de pause si le silence dépasse trois semaines).

## 6. Cohérence de version
- [ ] Numéro conforme à la table des versions (alpha `0.1`-`0.4`, bêta `0.5`-`0.9`, `1.0`, majeure par chapitre).
- [ ] Le numéro, le nom de chapitre et le contenu des notes correspondent au build réellement déployé.
- [ ] La news et les notes de version se renvoient mutuellement et ne se contredisent pas.
- [ ] Rien d'une autre phase annoncé (Patreon et bêta restent distincts).

## 7. Mise en ligne
- [ ] Fichiers aux bons emplacements (`content/news/{fr,en}/`, `content/notes-de-version/{fr,en}/`). *[Revue] À aligner sur `site/src/content/…` (brief de la vitrine, 3.1) dès que le générateur est choisi.*
- [ ] Gregory a validé les deux langues ; relecture finale à voix haute de l'accroche.
- [ ] Après publication : vérifier l'affichage réel (vitrine, Discord, publication vers les serveurs abonnés) et surveiller les premières réponses.
