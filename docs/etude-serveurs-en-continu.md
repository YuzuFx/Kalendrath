# Serveurs ouverts en continu : impact sur l'architecture

*Étude ouverte le 2026-10-26 à partir d'une piste de Gregory. Rien n'est décidé. Elle prolonge l'option C de [formats-serveur-et-rattrapage.md](references-jeux/formats-serveur-et-rattrapage.md) et la question ouverte n°7 du [GDD](game-design-document.md).*

## La piste

Un nouveau serveur s'ouvre tous les 4 mois environ. Chaque serveur est **persistant** et suit la même ligne de chapitres (saisons) à partir de sa propre date d'ouverture, donc **aucun contenu supplémentaire à produire**. Au bout de plusieurs chapitres, les serveurs sont **fusionnés par niveau de puissance**. Un même joueur peut avoir un compte sur deux serveurs ; si deux de ses comptes se retrouvent sur le même serveur après fusion, le boost entre comptes doit rester impossible.

## État du code (vérifié le 2026-10-26)

- OGameX est **mono-univers par déploiement** : aucune colonne `universe_id` ou `server_id` dans les migrations. Les réglages de serveur vivent en base (`SettingsService`).
- Le score est déjà calculé : `PlayerService` (ligne ~795) = ressources dépensées / 1000, arrondi bas. `HighscoreService` sépare général, économie, recherche et militaire.
- Le chantier de résolution temporelle (Phase 3c, jobs Redis différés) n'est pas encore posé : c'est le bon moment pour y prévoir le multi-serveur.

## Deux architectures possibles

| | **A. Une pile par serveur** (recommandée) | **B. Un seul code, `server_id` partout** |
|---|---|---|
| Principe | Chaque serveur = ses conteneurs, sa base MySQL, son préfixe Redis, son application Reverb. Un service central (le « hub ») porte les comptes | Toutes les tables gagnent une clé de serveur |
| Domaine PHP | **Intact** : les 1109 tests restent valides, la fusion avec l'upstream reste possible | Touche `app/Models`, `app/Services`, `app/GameMissions` : contraire au principe « le domaine ne se touche qu'avec raison » |
| Isolation | Forte : un serveur qui plante n'entraîne pas les autres | Faible |
| Coût d'hébergement | Croît linéairement avec le nombre de serveurs | Mutualisé, mais une seule base énorme |
| Difficulté | Outillage de provisionnement, hub | Réécriture transversale |

**Choix A.** Il garde le moteur intact. Sa contrepartie est un nouveau composant, le **hub**.

## Contrainte de coût (Gregory, 2026-10-26) : la pile ne doit pas se complexifier pour les premiers serveurs

L'architecture A se lit donc ainsi pour les premiers serveurs : **une seule machine, une infrastructure partagée, des données isolées**.

- **Un VPS, on le grossit plutôt que d'en ajouter** : s1, s2, s3 vivent sur la même machine tant que la charge mesurée le permet.
- **Un seul MySQL, une base par serveur** (pas un conteneur de base par serveur).
- **Un seul Redis**, avec un préfixe ou un numéro de base par serveur.
- **Un seul Reverb**, qui accepte plusieurs applications dans sa configuration.
- **Une seule image applicative**, lancée une fois par serveur avec ses variables d'environnement (base, préfixe, sous-domaine).
- **Un seul reverse proxy**, qui route `s1.`, `s2.`… par sous-domaine.
- Le coût marginal d'un serveur est alors surtout de la mémoire et de la taille de base. Les chiffres réels sont **inconnus** : test de charge avant de dimensionner.

## Le lobby (`lobby.kalendrath.com`, nouveau composant)

Le lobby est une petite application distincte, sur la même machine. Parcours du joueur : `lobby` → choix du serveur → `sN`.

- **Authentification unique** : le lobby possède le compte (Sanctum). Au clic sur un serveur, il émet un jeton signé à courte durée de vie ; `sN` le vérifie avec une clé publique et crée ou retrouve le personnage local lié à l'identifiant du compte. Cela ajoute une garde d'authentification au jeu, **pas de logique de jeu dans le domaine**.
- **Identité globale** : un compte lobby, puis un personnage par serveur. C'est ce qui permet le reroll et les deux serveurs.
- **Liste des serveurs**, état, date d'ouverture, chapitre en cours.
- **Classement global** et score de puissance comparable entre serveurs.
- **Détection des comptes liés** : le hub sait quels personnages appartiennent au même propriétaire.

## Ce que chaque ouverture de serveur implique

1. **Provisionnement scripté** : un modèle de `docker-compose` paramétré (nom, sous-domaine, base, préfixe Redis, port Reverb). L'ouverture doit tenir en une commande. Sans ce script, chaque serveur devient du travail manuel.
2. **Planification relative au serveur** : tous les événements et le déblocage de contenu doivent se calculer à partir de la date d'ouverture du serveur (`t0`), jamais en dates absolues. C'est **la condition pour qu'aucun contenu ne soit à reproduire**. Ce point touche le domaine : à traiter dans le chantier de résolution temporelle.
3. **Ressources** : chaque serveur lance son scheduler, ses workers Horizon et sa base. La charge réelle par serveur est **inconnue** ; il faut la mesurer par un test de charge avant de dimensionner le VPS (la roadmap prévoit un OVH VPS-2 à environ 8,65 €/mois).
4. **Sauvegardes, mises à jour et supervision** : multipliées par le nombre de serveurs. Une migration de base doit se jouer sur N serveurs.
5. **Cadence : décision de Gregory, 2026-10-26 — un calendrier fixe, un nouveau serveur à chaque nouveau chapitre.** Le déclencheur « seuil de population » est écarté : il ferait arriver un nouveau joueur sur un serveur déjà au chapitre 3. Le calendrier garantit qu'il existe toujours un serveur jeune, et le serveur principal ne se fragmente pas : son contenu continue de sortir, et ses joueurs ont déjà joué le chapitre 1. Deux conséquences : **les inscriptions des anciens serveurs restent ouvertes** (précision de Gregory : on n'empêche pas un joueur de rejoindre un ami ; le lobby propose par défaut le serveur le plus récent), et **chaque ouverture devient un événement de communication** (la campagne se cale sur le calendrier). Reste le risque d'un serveur neuf peu peuplé si la communication n'a pas suivi : il se traite par la promotion, pas par le calendrier.

## La fusion

Une fusion de bases brutes est le mauvais chemin : identifiants en collision, coordonnées de planètes occupées, noms de joueurs et d'alliances en double.

**Piste recommandée : migrer vers un nouveau serveur.**
- Un outil d'**export/import de personnage** (cité, héros, recherches, alliance) vers un serveur neuf, avec **réattribution des coordonnées**.
- Le **regroupement par ligues** utilise le score de puissance : les personnages sont répartis par tranche, pas serveur par serveur. Les perdants sont ceux dont le classement local est écrasé : à annoncer à l'avance.
- C'est un chantier d'ingénierie à part entière, **hors périmètre V1**.

## Comptes multiples et boost

Le hub règle le problème **par l'affectation** : lors d'une fusion, deux personnages du même propriétaire ne sont jamais envoyés sur le même serveur, ou l'un est archivé avec compensation. Il n'y a alors aucun cas de fusion de deux comptes sur un même serveur à gérer. Reste la décision du GDD sur les transferts de ressources entre joueurs (voir [triche-multicomptes-bots.md](references-jeux/triche-multicomptes-bots.md)), qui s'applique serveur par serveur.

## Score de puissance

Trois candidats, à passer au simulateur de theorycrafting :
1. **Le score OGameX actuel** (ressources dépensées / 1000) : déjà implémenté, mais il récompense le dépensier et ne distingue pas la puissance militaire de l'économie.
2. **Le niveau de prestige d'empire** (GDD) : plus parlant en fantasy, à définir.
3. **Un indice composite** (économie, recherche, héros, militaire) : plus juste, plus lourd à régler.

Le score doit être **comparable d'un serveur à l'autre**, donc normalisé par l'âge du serveur.

## Ce qu'on peut faire sans rien construire maintenant

- Ne rien promettre d'irréversible sur la fusion dans la communication publique (leçon New World).
- Choisir la **résolution temporelle relative à `t0`** dès la Phase 3c.
- Construire d'abord s1 seul, **avec le lobby dès le départ** (même vide, il porte les comptes), pour que s2 ne demande ni migration de comptes ni refonte de l'authentification. Le multi-serveur proprement dit (provisionnement, fusion) attend s2.
- Tenir compte de l'architecture A dans la décision d'hébergement (Phase 5/7).

## Questions ouvertes

- Flux d'arrivées attendu : combien de joueurs par ouverture ?
- Seuil de population qui déclenche une fusion, et délai de préavis.
- Les alliances suivent-elles ? Les noms en collision sont-ils renommés ?
- Quels éléments sont conservés à la migration (héros, objets, prestige) ?
