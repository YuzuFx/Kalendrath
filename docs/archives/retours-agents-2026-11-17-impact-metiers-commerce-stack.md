# Impact des métiers et du commerce sur la stack

17 novembre 2026 — analyse Codex demandée par Gregory. Aucun changement de code, de GDD ou de décision d'architecture. Les préconisations ci-dessous restent des recommandations techniques.

## Conclusion

Conserver la stack cible : Laravel/PHP, MariaDB, FrankenPHP/Octane, Redis/Horizon, Reverb, API/Sanctum et React/TypeScript. Les métiers et le commerce augmentent surtout le périmètre du domaine, les exigences de cohérence et le travail de validation. Ils ne démontrent aucun besoin de changer de langage, de base ou de distribuer le marché en microservices.

## Sources du projet et décisions prises en compte

- `docs/decision-architecture-cible.md` : stack cible, séparation domaine/API, résolution temporelle.
- `docs/sessions/2026-11-16-synthese-metiers-marche-questions-ouvertes.md` : deux métiers par royaume, monnaie dédiée, commerce par serveur et annulation/restitution des annonces lors d'une fusion. Ces décisions sont plus récentes que le GDD et ne sont pas encore intégrées à celui-ci.
- `docs/plan-deploiement.md` : hypothèse de départ sur un VPS, infrastructure partagée et montée en puissance mesurée.
- `docs/etude-serveurs-en-continu.md` : bases isolées par serveur, lobby, infrastructure mutualisée.
- `docs/plan-marketing.md` et roadmap HTML : budget historique d'environ 40 euros/mois, dont environ 15 euros d'infrastructure, pour 1 000 joueurs et capacité visée de 2 500. Ce ne sont ni des résultats de benchmark ni un devis actualisé.
- Audits Rakorn et réflexion croisée du 15 novembre : références de conception, sans preuve de capacité technique de Kalendrath.

## Architecture recommandée

Garder un monolithe Laravel organisé en services distincts pour inventaire, métiers, fabrication, marché et monnaie. Le marché PNJ existant n'est pas un marché d'objets entre joueurs ; ce dernier constitue un nouveau domaine.

Pour un achat, valider et exécuter dans une transaction SQL courte l'état de l'offre, les règles d'éligibilité, le débit de l'acheteur, le crédit du vendeur et le transfert du bien. Employer des verrous sur les lignes concernées, des contraintes SQL et une clé d'idempotence. Une requête répétée ne doit pas répéter l'achat. Une annulation simultanée avec un achat doit avoir une seule issue.

Réserver les biens à la publication : un équipement proposé ne peut plus être porté, recyclé ou revendu ailleurs ; une quantité de composants est retirée du stock disponible. Distinguer catalogue d'objets, stocks empilables et exemplaires individuels d'équipements. Utiliser des montants entiers à unité minimale définie et conserver un journal durable des mouvements de monnaie et des transferts, avec identifiant d'opération commun.

MariaDB reste la source de vérité. Redis porte cache et files, pas l'unique preuve de propriété ou de solde. Les notifications partent après validation SQL ; prévoir un rattrapage durable des traitements manqués, car une validation SQL et une publication Redis ne sont pas une transaction unique. Les tâches relancées doivent être idempotentes.

La fabrication se résout à son échéance, avec horodatage durable et rattrapage après incident. Les compteurs tournent localement dans React. Séparer les files et la capacité de traitement des missions urgentes, de la fabrication et des traitements secondaires : les statistiques du marché ne doivent pas retarder les combats.

Limiter les notifications du marché à ce qui est utile ; éviter la diffusion de chaque vente à tous les joueurs. Pagination, filtres indexés et agrégats de prix évitent de recalculer tout l'historique à chaque ouverture d'une recette.

## Dimensionnement

La hausse dépend du nombre d'actions, des joueurs simultanés, de la fréquence de consultation du marché et des objets conservés ; le nombre de recettes seul ne permet pas de la chiffrer. Les historiques, équipements individualisés, filtres et diffusions peuvent peser davantage que le calcul de fabrication.

Conserver le principe d'un démarrage sur une infrastructure simple, mais retirer toute interprétation garantie de la cible de 2 500 joueurs. Aucun multiplicateur de coût ou nouveau prix d'hébergement ne peut être déduit de cette analyse. Les tarifs des documents n'ont pas été réactualisés.

Avant validation de capacité, tester : navigation et filtres du marché avec jeu actif ; achats simultanés de la dernière unité ; achats contre annulations ; doubles requêtes ; reprise après interruption ; pics de fabrication et de missions ; restitution d'annonces avant fusion. Mesurer latence au 95e percentile, attentes SQL, retards des files, mémoire, CPU et croissance des tables/sauvegardes. Définir explicitement comptes inscrits, actifs quotidiens et simultanés.

## Serveurs, fusion et monétisation

Le marché local à chaque serveur correspond à l'architecture actuelle et évite les transactions économiques inter-bases. À la fusion, gel, annulation, restitution et journalisation doivent être rejouables sans double restitution. Préserver les historiques d'audit même si les références publiques de prix sont remises à zéro. La destination des soldes commerciaux et des stocks reste à définir ; le reset du marché ne vaut pas destruction des patrimoines.

La monnaie premium globale du lobby et la monnaie commerciale locale restent deux responsabilités distinctes. Une éventuelle interaction entre elles doit être explicitement conçue, surtout si une accélération payante crée des biens revendables. Cela affecte les règles, la traçabilité et les tests ; cela ne justifie pas à soi seul une nouvelle stack.

## Conséquence sur les projections

Le calendrier et l'estimation d'effort doivent être révisés davantage que les choix d'outils. Le classement historique du marché inter-modes comme effort « moyen » ne décrit plus un système complet de métiers, stocks, équipements, monnaie et commerce. Le chantier de cohérence économique devient transversal, à côté de la résolution temporelle ; il ne doit pas être traité comme un simple écran supplémentaire.

## Vérification documentaire externe

Documentation officielle Laravel consultée le 17 novembre 2026 :

- https://laravel.com/framework/docs/13.x/queries — verrous pessimistes.
- https://laravel.com/framework/docs/13.x/queues — publication après commit et files.
- https://laravel.com/framework/docs/reverb — diffusion et évolution du serveur WebSocket.

Ces sources confirment les primitives disponibles ; elles ne fournissent aucun benchmark de Kalendrath. Aucun test de charge exécuté dans cette tâche.
