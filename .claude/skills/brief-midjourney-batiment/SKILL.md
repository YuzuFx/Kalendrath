---
name: brief-midjourney-batiment
description: Rédiger, corriger ou valider un brief Midjourney pour un bâtiment de Kalendrath (paliers visuels 1, 2, 3 d'un bâtiment, paliers de l'Hôtel de ville ou du Donjon, paliers de cité), puis archiver le rendu validé. À utiliser dès que Gregory parle d'un prompt Midjourney, d'une grille à juger, d'un palier à générer ou d'une image de bâtiment à valider.
---

# Brief Midjourney d'un bâtiment

La méthode a été construite essai après essai depuis le 2026-10-13. Elle est consignée dans [docs/direction-artistique-batiments.md](../../../docs/direction-artistique-batiments.md), qui reste la **source de vérité** : ce skill dit dans quel ordre travailler et quoi ne pas oublier. En cas d'écart, le document l'emporte, et une nouvelle leçon s'écrit dans le document, pas ici.

## 1. Avant d'écrire : relire

1. La **section du bâtiment** dans le document : prompts validés des paliers précédents, leçons, écarts acceptés, brief déjà prêt pour le palier visé.
2. La **section « Réglage commun »** (structure, style par palier, paramètres) et le bloc **« Méthode à retenir (Midjourney V8) »** du plan de session.
3. Le **dernier test de lisibilité à 300 px**, et ce qu'il dit à retenir pour le palier visé (élément signature, confusions entre bâtiments voisins).
4. Le rôle du bâtiment et son palier de cité d'ouverture dans le GDD (section 4.2) : un bâtiment qui s'ouvre tard est plus abouti dès son palier 1.

## 2. Paliers visuels

| Palier | Niveaux | Allure |
|---|---|---|
| 1 — Modeste | 1 à 14 | Petit, simple, utilitaire, très peu de magie visible |
| 2 — Développé | 15 à 29 | Plus grand, plus solide, activité plus intense, un peu de mana |
| 3 — Majeur | 30 et plus | Imposant, architecture ou mécanismes arcaniques, le mana devient la lumière principale |

L'Hôtel de ville a ses propres paliers, un tous les 3 niveaux (1-3, 4-6, 7-9, 10-12, 13-15). Ne jamais utiliser au palier N un élément réservé au palier N+1 : la répartition est écrite dans le document.

## 3. Composer le prompt

Ordre : **sujet du bâtiment et du palier**, puis **style du palier**, puis **paramètres**. Midjourney pèse davantage le début du prompt.

- **Sujet** : nommer des éléments visibles de grandeur (étage, murs de pierre, deux toits, grue, tour), pas seulement « larger ». Un palier change de silhouette, ce n'est pas un agrandissement.
- **Cadrage** : `pulled back wide shot from further away`, premier plan dégagé, bâtiment entier dans le cadre avec une marge de ciel. Personnages petits et lointains.
- **Nombres** : écrire « exactly three » pour un petit nombre (« several » donne douze à vingt).
- **Lumière** : lanternes ou lueurs **violet-bleu nommées** comme accent ; au palier 3, `as the main light accent`.
- **Style** : la variante du palier, copiée depuis « Réglage commun ».
- **Paramètres** : `--ar 3:2 --stylize 150 --sref <cité validée> --sw 80` et la liste d'exclusion du palier. Toujours exclure `text, letters, watermark, sign, signboard, lettering, inscription, portrait, close-up face`.

**Palier N+1** : l'image validée du palier N va dans **Image Prompts** (pas « Attach to prompt », pas « Style reference »), **aucune URL dans le texte**, et `--iw` entre **0.25 et 0.35** dans les paramètres. À 0.5, Midjourney recopie trop le cadrage et les éléments à retirer.

## 4. Pièges connus

- « Carved like totems » donne des mannequins à visage tiki : ne pas l'écrire.
- Un linteau « gravé de runes » devient une enseigne lisible : exclusions de texte obligatoires.
- Un cadrage serré sur de la pierre fait basculer vers la forteresse : garder `pulled back`, décrire les murs comme blocs au sol ou murs bas. `castle, fortress, towers, battlements` ne suffisent pas seuls.
- Pas d'eau au sol si elle n'est pas voulue : écrire `on dry ground`, exclure `water, pond`.
- Le cyan et le blanc-bleu reviennent souvent à la place du violet-bleu : nommer `deep violet-blue` partout, exclure `cyan, neon, electric blue, white glow`.
- **Quick Edit** : bon pour recolorer ou déplacer un personnage, mauvais pour le cadrage, une ou deux passes au maximum. Éviter **Vary Subtle** quand la distance compte.
- Texte parasite dans un coin sombre : Quick Edit ne l'efface pas. Retoucher localement ou choisir une autre case.

## 5. Juger une grille

Pour chaque case : filigrane ou texte parasite ; élément signature entier dans le cadre ; couleur violet-bleu (pas cyan, pas blanc) ; aucun élément réservé au palier suivant ; lecture du bâtiment à petite taille ; pas de confusion avec un bâtiment voisin (Scierie et Entrepôt de bois, Maîtres d'œuvre et Remparts). Dire clairement quelle case retenir et pourquoi, ou quoi changer pour relancer.

## 6. Archiver un rendu validé

1. Upscale **Subtle**, fichier en **2688 × 1792**. Un upscale à 1344 × 896 a déjà été envoyé une fois : vérifier la taille.
2. Fichier `docs/direction-artistique/references/batiment-<nom>-palier<N>.png`.
3. Une ligne dans le tableau de [references/README.md](../../../docs/direction-artistique/references/README.md) : une ligne par image, aucune URL en double ni manquante.
4. Dans la section du bâtiment : mention *Validé le AAAA-MM-JJ* avec liens image et Midjourney et case choisie, leçons, écarts acceptés, **prompt réellement utilisé** et image de référence glissée dans Image Prompts.
5. Mettre à jour le compteur et le plan de session en bas du document.
6. **Un commit par bâtiment.**

## 7. Test de lisibilité à 300 px

Une planche de contact par série de paliers : vignettes de 300 × 200 px, 5 colonnes, nom sous chaque vignette. Sur le Mac, PowerShell n'existe pas : utiliser Python avec Pillow, `montage` d'ImageMagick ou `sips`. Consigner les verdicts (lisibles, à surveiller, risques de confusion, exposition) dans une section dédiée du document.

Les unités ont leur propre document : [docs/direction-artistique-unites.md](../../../docs/direction-artistique-unites.md). La planche de style et l'usage du `--sref` sont dans [docs/direction-artistique-planche-de-style.md](../../../docs/direction-artistique-planche-de-style.md).
