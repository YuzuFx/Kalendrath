# Theorycrafting de Kalendrath

Outil de la Phase 6 (équilibrage), démarré le 2026-10-21 avec l'audit des prérequis de bâtiments. Il répond à une question : **avec ces prérequis, ces coûts, ces durées et ces récompenses, quand un joueur débloque-t-il chaque palier et chaque bâtiment ?** Kalendrath vise un serveur unique qui dure des années, pas un univers relancé tous les deux mois, donc ce rythme se règle avant d'écrire le domaine.

Version interactive (arbre, réglages, frise) : [Arbre des prérequis](https://claude.ai/artifact/2GSoLWt91J28Rve5n12EMK). Proposition reportée dans le GDD, section 4.2, « Prérequis et rythme de déblocage ».

> **⚠️ Défaut connu (audit du 2026-10-22), à corriger avant toute nouvelle conclusion.** La règle « action la moins chère » ne regarde pas les durées : le joueur simulé lance des mines aux chantiers de 68 à 123 jours, qui monopolisent l'unique file de construction. La date de Métropole dépend alors de ce comportement plus que de l'économie (production ×3 : −2 % seulement), et elle saute de 130 jours entre un facteur d'Hôtel de ville de 1,89 et 1,90. Correctifs prévus : règle de rentabilité des mines, sessions de connexion, colonies qui démarrent à zéro, résultats en fourchette plutôt qu'en chiffre unique.

## Fichiers

| Fichier | Rôle |
|---|---|
| `model.js` | **Source unique** : prérequis (`N`), coûts (`COST`), coûts proposés pour les objets nouveaux (`PROPOSED`), fenêtres cibles, moteur de simulation |
| `simulate.js` | Ligne de commande : tableau des temps de déblocage et verdict par rapport aux cibles |
| `model.test.js` | Garde-fous : données cohérentes, pas de prérequis circulaire, simulateur qui réagit dans le bon sens |
| `build-artifact.js` | Recopie `model.js` dans la page interactive |
| `arbre-prerequis.html` | Source de la page interactive publiée comme artefact |

## Commandes

```bash
node tools/theorycrafting/simulate.js                      # joueur gratuit actif, réglages par défaut
node tools/theorycrafting/simulate.js --profils            # compare les profils (sans bonus, gratuit, pass, payeur)
node tools/theorycrafting/simulate.js --profil payeur      # un autre profil
node tools/theorycrafting/simulate.js --vitesse 2          # vitesse économique ×2
node tools/theorycrafting/simulate.js --capitale           # joueur sans colonies
node tools/theorycrafting/simulate.js --hdv 1.95           # facteur de coût de l'Hôtel de ville
node tools/theorycrafting/simulate.js --tout               # ajoute les recherches
node tools/theorycrafting/simulate.js --comparer-hdv 1.85,1.9,1.95
node --test tools/theorycrafting/model.test.js
node tools/theorycrafting/build-artifact.js                # puis republier la page au même lien
```

## Modifier le modèle

1. Changer `model.js` : un prérequis dans `N` (`req: [[id, niveau]]`), un palier (`p`), une fenêtre cible (`cible: [jour min, jour max]`), un coût dans `COST` (`[bois, fer, mana, facteur]`), une courbe dans `DUREES` ou un profil dans `PROFILS`.
2. Lancer les tests, puis `simulate.js` pour lire les verdicts.
3. Lancer `build-artifact.js` et republier la page.
4. Reporter ce qui est validé dans le GDD (section 4.2). Le domaine PHP (`app/GameObjects`) ne change qu'une fois la proposition tranchée.

## Hypothèses du modèle

- **Formules OGameX** : coût = base × facteur^(niveau − 1) ; production des mines (Scierie = métal, Mine de fer = cristal, Puits de mana = deutérium à 20 °C) ; revenu de base 30 bois et 15 fer par heure ; capacité des entrepôts `5000 × floor(2,5 × e^(20 × niv / 33))`.
- **Durées** (`DUREES`) : base OGameX (bois + fer) / (2 500 × max(4 − niv/2, 1) × (1 + Maîtres d'œuvre) × vitesse), sans le ×2 par niveau d'Automates. Au-delà du niveau 10, ×1,095 par niveau pour les bâtiments et ×1,15 pour l'Hôtel de ville. L'Atelier des Automates retire 3 % par niveau (30 % au plus). Recherche : durée OGameX, (bois + fer) / (1 000 × (1 + Institut) × vitesse).
- **Profils** (`PROFILS`) : bonus de production, bonus de vitesse de construction et accélérateurs en heures par jour, utilisés aussitôt sur le chantier en cours. Les fenêtres cibles visent le profil « gratuit » ; la tendance pour l'écart avec le gros payeur est de 20 à 30 %.
- **Pas d'énergie** : les mines produisent sans centrale. La nourriture n'entre pas dans les coûts de bâtiments (GDD 4.1 : elle suit les êtres vivants).
- **Le joueur** vise un élément et fait toujours l'action la moins chère, en équivalent bois (ratio 3:2:1), entre sa prochaine mine et le prochain prérequis disponible. Il construit un entrepôt quand un coût dépasse sa capacité. Une file de construction, une file de recherche.
- **Empire en croissance** : une colonie aux jours 4, 8, 14, 21, 30, 45, 60 et 90, chacune produisant la moitié de la capitale. **Capitale seule** : aucune colonie.
- **Absents** : marchand, pillage, expéditions, classes, héros et conseillers, Prestige. Un joueur actif ira plus vite, un joueur occasionnel plus lentement.

Ce sont des ordres de grandeur pour comparer des réglages entre eux, pas des promesses de temps de jeu. Les tests vérifient la cohérence du modèle, pas les fenêtres cibles : c'est `simulate.js` qui donne les verdicts.

## Pistes d'évolution

- Unités et défenses (coût en nourriture, Académie Militaire, Atelier des Remparts) une fois leurs prérequis proposés.
- Emplacements de cité (socle, +N par palier) : vérifier qu'un build complet tient dans les emplacements au fil des paliers.
- Profils de joueur (occasionnel, régulier, très actif) à la place du seul profil « empire en croissance ».
- Bonus du héros et des conseillers, quand leurs valeurs seront chiffrées.
- Tiers d'unités (T1 à T5) si la piste est retenue : la cible de 2 ans est calée sur les unités T5 de Call of Dragons.
- Accélérateurs gardés pour les gros chantiers (comportement réel des joueurs) au lieu d'être utilisés aussitôt.
