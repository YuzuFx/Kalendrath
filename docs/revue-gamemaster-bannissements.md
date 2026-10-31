# Revue game master : comportements bannissables

*Revue du 2026-10-30 de [comportements-bannissables.md](comportements-bannissables.md), sous l'angle d'un game master / responsable de communauté (Ogame, Travian, Last War, EVE), à la lumière de [etude-pvp.md](etude-pvp.md) (guerres d'alliances dès le chapitre 1, tous membres attaquables, boucliers, pas de destruction de bâtiments, 3 attaques par cible et par 24 h). Les corrections sont écrites dans le document, marquées « [GM] ». Les ajouts « [Juridique] » n'ont pas été modifiés ni retirés. Analyse faite par une IA, sans données de serveur réel : les seuils chiffrés sont à confirmer à l'alpha.*

## En bref

Le document est juridiquement solide et bien gradué, mais il est écrit comme si le PvP était une exception à surveiller. Dans Kalendrath, la guerre d'alliances est le jeu : le risque principal n'est pas qu'on tolère trop, c'est qu'on sanctionne du jeu légitime et qu'on vide un serveur jeune. Les corrections vont dans quatre directions : protéger le jeu légitime (nouveau principe 8, listes de cas limites), alléger les sanctions de premier cas (principe 9), rendre la charge tenable pour une personne (principe 10) et rappeler que la modération peut être détournée comme arme de guerre.

## Constats et corrections

| # | Sujet | Constat | Correction |
|---|---|---|---|
| 1 | Harcèlement par le jeu (B9) | La définition inclut « attaque répétée d'un joueur choisi ». Avec des guerres où tout membre est attaquable et un plafond serveur de 3 attaques par 24 h, cela criminalise le jeu normal | L'attaque n'est jamais du harcèlement en soi ; il faut un élément extérieur au jeu (insultes visant la personne, suivi sur Discord, refus explicite, contournement du plafond) |
| 2 | Ton de guerre (B9) | Le roleplay est toléré mais la ligne est floue | Liste de ce qui est légitime en guerre (provocation, intimidation en personnage, noms d'alliance) ; ligne = identité, proches, vie réelle, menaces hors jeu |
| 3 | Diplomatie trompeuse (B7, D13, D14) | D14 envisage un comportement « fausse déclaration de guerre » ; D13 laisse un doute sur l'espionnage et le vol d'alliance | Diplomatie trompeuse légitime, y compris la rupture de pacte et la guerre par procuration ; D14 à abandonner ; D13 : espionnage par un tiers réel permis, second compte = B2 |
| 4 | Combat arrangé / « perdre à dessein » (B3, règle 3) | Interdit tel quel, alors que la reddition, la retraite et le sacrifice de diversion sont des mécaniques de guerre | Règle limitée au profit d'un autre de ses comptes ou d'un complice ; liste des gestes légitimes ; ajout du *wintrading* d'alliances (guerre de façade) comme vrai cas à surveiller, avec nullité des points côté serveur |
| 5 | Farm et bash (B3) | Absents des cas limites | Légitimes dans les plafonds serveur |
| 6 | Boucliers et protections (B7) | L'exemple « changer de mode juste avant le combat » contredit « activer un bouclier au bon moment » | Si le serveur l'autorise, c'est du jeu ; sinon c'est un bug (B6) ou une règle à bloquer |
| 7 | Échelle N5 | Utilisé trop facilement (B2 récidive, B8, B14, B4 vendeur) : un N5 ferme tous les serveurs, y compris ceux où le joueur est irréprochable | N4 par défaut ; N5 réservé à fraude, sécurité, RMT organisé, menaces/doxxing, récidive après N4 |
| 8 | Premier cas de bot (B1) | N4 d'emblée pour « avantage compétitif » : lourd pour un joueur qui vient de découvrir le jeu | N3 7 jours + retrait des gains sauf avertissement antérieur, usage > 7 jours ou diffusion ; auteur et revendeur restent N5 |
| 9 | Harcèlement sans menace (B9) | « N4-N5 sans passer par N1 » met dans le même panier une menace de mort et une insulte répétée | Échelle en cinq cas (menaces et doxxing N5 ; harcèlement persistant N3 puis N4 ; haine isolée N2 ; insultes de guerre N0 puis N1) |
| 10 | Abus de récompenses (B8), API (B12), sécurité (B13) | N4-N5 trop vite pour la Kaelite gagnée, le scraping de données publiques, le test de faille sans dommage | Barèmes affinés (voir fiches) |
| 11 | Modération comme arme de guerre | Un camp peut signaler massivement un chef adverse pour le faire geler avant une bataille | Aucun gel ni N2 sur un signalement d'un camp adverse sans preuve propre ; pas de N2 qui coupe un chef de ses fonctions dans la fenêtre d'une bataille déclarée sauf P1/P2 ; signalements abusifs coordonnés = N0 puis N1 |
| 12 | Suspension en guerre (D7) | Mode Paix forcé = joueur intouchable pour esquiver une guerre | Compte protégé comme sous bouclier, sans points de guerre, hors contrôle de tranche |
| 13 | Faisabilité modérateur unique | 14 fiches, trois indices sur une semaine, revue à froid de 48 h, dossier figé : trop pour une personne dès que le serveur grossit | Tri P1/P2/P3 et lots hebdomadaires ; faisceau de trois indices réservé au N3+ ; modèles de notification ; seuils de détection limités à quelques alertes par jour ; conflit d'intérêts (modérateur partie prenante) |
| 14 | Faux positifs bots (B1) | Délai de réaction de 2 s : un joueur mobile qui répond à une notification peut y arriver | Valeur probante seulement répétée (5 occurrences) et combinée à une autre famille d'indices ; fleetsave manuel et alertes relayées légitimes |
| 15 | Récidive | « Au moins un niveau » rend la montée mécanique | Un niveau, deux au plus sauf fait grave ; pas de récidive de même famille sur un fait plus léger |
| 16 | Serveur jeune | Aucune tolérance prévue pour des règles encore en cours d'écriture | Période de grâce alpha/bêta et compte de moins de 7 jours : N1 maximum pour les cas ambigus, hors fraude, sécurité, menaces, contenus illicites |
| 17 | Règles joueurs | Rien ne dit ce qui est permis ; un joueur peut lire la liste comme une interdiction du jeu agressif | Paragraphe « Ce que le jeu permet » en FR et EN |
| 18 | Mode de Guerre (B7, N2) | Les sanctions parlent encore d'un Mode de Guerre individuel, en cause depuis le 28/10 | Lire comme « participation à un classement ou récompense de guerre » ; ne pas retirer la participation à une guerre |

## Pratiques des jeux de référence retenues

- **EVE** : tout ce que le jeu permet, y compris l'arnaque, la trahison et le vol de corporation, est légitime ; sont bannis le RMT, le harcèlement hors jeu et la divulgation d'informations personnelles. C'est le modèle des principes 8 et de D13.
- **OGame** : bash limit serveur, sanctions de multicompte et de push, usage large du « retrait puis avertissement ». Retenu pour le principe 9 (c).
- **Travian** : sanctions échelonnées, multicompte et push comme sujets principaux, bannissement du serveur plutôt que du compte global.
- **Last War** : le boosting naît de l'exposition partielle (voir l'étude PvP) ; la modération y est peu transparente, ce qui nourrit la méfiance : d'où l'intérêt des rapports D17 et d'un taux de N0 publié.

Ces pratiques sont citées de mémoire et à partir des fiches de `docs/references-jeux/` ; non revérifiées en ligne.

## Conflits et tensions avec les ajouts [Juridique] (à trancher par Gregory)

- **C1. Vente de compte (B4) : N5 d'emblée pour le vendeur.** La revue juridique le maintient comme justifié. Le GM le juge trop lourd pour un vendeur occasionnel, premier cas, sans activité commerciale (N4 proposé, N5 pour revendeur, récidive, intermédiaire). Non tranché : note [GM] ajoutée dans B4, texte inchangé. Conséquence de l'arbitrage : si N5 reste, le principe 9 (a) (N5 rare) a une exception à écrire.
- **C2. Charge de preuve et de formalisme pour N3-N5.** Le dossier figé (extraits, hachage, auteur de la revue), l'exposé des motifs complet (art. 17 DSA) pour chaque mesure, y compris un message supprimé ou un N2 de chat, et l'examen humain réel et tracé sont des contraintes [Juridique] non négociables ; pour un modérateur unique, elles rendent la modération des petits cas coûteuse. Le GM n'a pas retiré ces exigences ; il propose des modèles, un tri P1-P3 et de réserver le faisceau de trois indices au N3+. Risque résiduel : si la charge devient trop lourde, la solution n'est pas d'alléger le formalisme mais de limiter ce qui est sanctionné (d'où le principe 8).
- **C3. Remboursement de la Kaelite achetée à la clôture (D4, [Juridique]).** Il s'applique y compris aux bannis pour bot ou RMT (seule la fraude de paiement est exclue). Effet dissuasif amoindri pour les acteurs de RMT qui achètent de la Kaelite ; acceptable si la Kaelite gagnée ou offerte reste perdue. À confirmer avec l'avocat : possibilité de compenser un préjudice prouvé (rappelée par la revue juridique) pour les cas de RMT organisé.
- **C4. Pas de saut de niveau sauf urgence ([Juridique], principe 3).** Cohérent avec les corrections [GM] (N1 comme mise en demeure) mais en tension avec « N4-N5 sans passer par N1 » du harcèlement ciblé ; la correction [GM] limite le saut direct aux menaces, doxxing, sollicitation d'un mineur et contenus illicites, ce qui est compatible. Vérifier avec l'avocat que « harcèlement persistant sans menace » n'a pas besoin d'être traité comme urgent.
- **C5. Rétroactivité.** Les ajouts [GM] (wintrading, signalements abusifs, ce que le jeu permet) ne s'appliquent qu'à partir de leur publication ; s'appuyer sur la clause générale de loyauté existante pour tout fait antérieur. Pas de conflit, à garder en tête pour l'alpha.

## À décider par Gregory

1. C1 (vendeur de compte N4 ou N5).
2. Position sur le Mode Paix forcé pendant N3 en guerre (D7) : protection comme bouclier, sans points.
3. D13 : vol permis par les droits d'alliance, oui ou non (dépend de la conception de l'Ambassade).
4. Qui est le second relecteur et à partir de quel volume (D5).
5. Faire valider par l'avocat les conséquences de C2 et C3.
