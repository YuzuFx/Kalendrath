# Conditions des extensions et de l'API pour les joueurs

*Brouillon du 2026-10-30, à faire relire par un avocat avant l'ouverture de l'API aux extensions, elle-même conditionnée à un audit de sécurité (voir [README](README.md)). Sources : [plan marketing, section 9](../plan-marketing.md), [comportements bannissables](../comportements-bannissables.md) (B1, B12, D9). Publication prévue : `kalendrath.com/fr/api/`, acceptation à la création de la première clé d'extension. Version anglaise : [09-conditions-extensions-api-en.md](09-conditions-extensions-api-en.md).*

*Version [À COMPLÉTER : numéro], en vigueur le [À COMPLÉTER : date]*

## 1. Pourquoi une API ouverte

Kalendrath s'ouvre aux outils que les joueurs écrivent : simulateurs, calculateurs, cartes, tableaux de bord d'alliance, rappels. Les bonnes idées ont vocation à entrer dans le jeu. En contrepartie, l'API est **fermée par défaut** et **ne permet jamais d'agir à la place d'un joueur**. Ces conditions complètent les [conditions générales d'utilisation](04-cgu.md) (« CGU »), notamment leurs articles 7.1 et 11.

## 2. Définitions

- **API** : l'interface de programmation du Jeu ouverte aux extensions, sous `/api/v1`, dans les seules routes publiées dans sa documentation.
- **Clé d'extension** : un jeton que vous créez dans les réglages du lobby, distinct de votre session, rattaché à votre compte, doté de droits (*scopes*) limités.
- **Extension** : tout programme, script, page, robot Discord ou application qui utilise une Clé d'extension.
- **Développeur** : la personne qui crée ou distribue une Extension.
- **Utilisateur** : le joueur qui utilise une Extension avec sa propre Clé d'extension.

## 3. Accès

3.1. L'API est réservée aux titulaires d'un compte Kalendrath en règle. Chaque Clé d'extension est créée par le joueur lui-même, pour son propre compte.

3.2. **Lecture seule.** Une Clé d'extension ne donne accès qu'aux routes de **lecture** inscrites sur la liste publiée. Elle ne permet pas de construire, rechercher, recruter, envoyer une armée ou un héros, échanger, acheter, écrire un message, ni aucune autre action de jeu. Toute nouvelle route de l'API est fermée aux extensions tant qu'elle n'a pas été ouverte volontairement.

3.3. **Limites de débit.** Chaque clé et chaque compte sont soumis aux limites de débit publiées dans la documentation de l'API. Au-delà, les requêtes sont refusées automatiquement.

3.4. **Révocation.** Vous pouvez révoquer une clé à tout moment en un clic. L'Éditeur peut révoquer une clé en cas de manquement, de risque de sécurité ou de fin de l'API.

3.5. **Secret de la clé.** Une clé est personnelle. Ne la partagez pas, ne la publiez pas, ne l'intégrez pas dans un code distribué. Une Extension distribuée doit demander à chaque Utilisateur de saisir sa propre clé.

## 4. Ce qui est autorisé, encadré, interdit

| | Exemples | Règle |
|---|---|---|
| **Autorisé** | Affichage, calculs, simulateurs de combat ou de production, statistiques, cartes, rappels, outils d'alliance hors jeu | Libre, dans le respect des limites et des présentes |
| **Encadré** | Lecture en continu (tableau de bord d'alliance, robot Discord d'alliance) | Clé d'extension, limites de débit, données des membres avec leur accord |
| **Interdit** | Toute action de jeu déclenchée sans clic humain ; tout contournement de la liste blanche ; l'usage de la session d'un joueur par un outil tiers ; la collecte massive de données de joueurs ; le partage, la vente ou la publication de clés ; une Extension qui contient une action cachée | Bloqué côté serveur quand c'est possible ; sanctionnable selon l'article 9 des CGU (comportements B1 et B12) |

Un rappel qui vous prévient qu'un chantier se termine est autorisé. Une Extension qui relance le chantier pour vous est interdite, même si l'action est techniquement impossible par l'API : la tentative est sanctionnable.

## 5. Données personnelles des joueurs

5.1. Les données accessibles par l'API peuvent concerner d'autres joueurs (pseudonymes, classements, alliance, positions). Le Développeur qui conserve, combine ou publie ces données **hors du Jeu** devient responsable de ce traitement au sens du RGPD, à son propre titre. Il s'engage à :
- ne collecter que ce qui est nécessaire à la fonction de l'Extension ;
- ne pas constituer de fichier détaillé sur un joueur précis, ni suivre l'activité d'un joueur identifié sans son accord ;
- ne publier hors du Jeu que des données déjà publiques dans le Jeu (classements, alliances) ou des données dont les intéressés ont donné leur accord (outil d'alliance) ;
- sécuriser les données stockées et les supprimer quand elles ne sont plus utiles, et au plus tard à la fermeture du Serveur concerné ;
- répondre aux demandes des joueurs concernés (accès, suppression) et retirer les données d'un joueur qui le demande ;
- publier une information claire sur ce que l'Extension collecte, si elle stocke des données de tiers.

5.2. Les Extensions qui reproduisent les classements publics sont permises. La collecte détaillée de données individuelles ne l'est pas.

5.3. L'Éditeur n'est pas responsable des traitements effectués par les Développeurs hors du Jeu.

## 6. Propriété intellectuelle et marque

6.1. L'Éditeur vous accorde une licence gratuite, non exclusive, non cessible et révocable d'utiliser l'API pour créer et distribuer des Extensions conformes aux présentes.

6.2. Vous restez titulaire des droits sur le code de votre Extension. Vous pouvez la distribuer sous la licence de votre choix.

6.3. **Base de données.** L'API ne vous autorise pas à extraire ou réutiliser une partie substantielle de la base de données du Jeu en dehors de l'usage normal de l'Extension (article L342-1 du Code de la propriété intellectuelle). Un miroir complet des données du Jeu est interdit.

6.4. **Marque et non-officialité.** Vous pouvez indiquer que votre Extension est « pour Kalendrath ». Vous devez indiquer clairement qu'elle n'est **pas officielle** et n'est pas éditée par l'Éditeur. N'utilisez pas le logo ni les illustrations du Jeu d'une façon qui suggère un partenariat. Les noms réservés (Kalendrath officiel, Équipe, Staff) ne peuvent pas désigner une Extension.

6.5. **Monétisation.** Une Extension peut être financée par des dons libres à son auteur. Elle ne peut pas être vendue, ni réserver des fonctions à un paiement, ni contenir de publicité intrusive, sans accord écrit de l'Éditeur. Aucune Extension ne peut vendre ou échanger des éléments de jeu (article 7.5 des CGU).

## 7. Intégration des bonnes idées dans le Jeu

7.1. Lorsqu'une Extension devient indispensable, l'Éditeur peut développer une fonction équivalente dans le Jeu. Les idées et fonctions ne sont pas protégeables en elles-mêmes : l'Éditeur est libre de s'en inspirer.

7.2. Lorsqu'il le fait, l'Éditeur crédite l'auteur de l'Extension, avec son accord, dans les notes de version et peut lui accorder un titre ou un cosmétique.

7.3. L'Éditeur ne reprend pas le **code** d'une Extension sans l'accord de son auteur ou sans respecter sa licence. Une reprise de code fait l'objet d'un accord écrit séparé.

## 8. Recensement des Extensions

L'Éditeur peut recenser les Extensions conformes sur une page de la vitrine et un salon Discord dédié. Le recensement n'est ni une garantie, ni une certification de sécurité. Les Utilisateurs installent les Extensions sous leur responsabilité. Une Extension peut être retirée du recensement à tout moment.

## 9. Évolution de l'API

9.1. L'API est versionnée. L'Éditeur s'efforce d'annoncer **30 jours** à l'avance toute modification incompatible d'une version stable, sauf urgence de sécurité.

9.2. Pendant l'alpha et la bêta, l'API peut changer sans préavis. L'Éditeur peut suspendre ou fermer l'API, notamment pour des raisons de sécurité ou de charge.

## 10. Sécurité et failles

Si vous découvrez une faille dans l'API, signalez-la à security@kalendrath.com sans l'exploiter, selon l'article 12 des CGU (divulgation responsable). Les tests de charge, de robustesse ou d'intrusion sur l'API ne sont autorisés qu'avec un accord écrit préalable.

## 11. Manquements

Les manquements aux présentes sont traités selon les articles 9 et 10 des CGU, avec l'échelle de sanctions et la voie d'appel qui y sont prévues. En résumé : dépassement ponctuel des limites, blocage de la clé et avertissement ; usage détourné répété, révocation et retrait de l'accès à l'API ; collecte massive, tentative d'action ou vente de clés, bannissement du Serveur ; Extension piégée, bannissement du compte. Un Développeur dont l'Extension est utilisée de façon fautive par des tiers n'est pas sanctionné si l'Extension est conforme.

## 12. Absence de garantie et responsabilité

L'API est fournie gratuitement et peut évoluer ou s'interrompre (article 9). L'Éditeur n'est pas responsable des Extensions de tiers ni de leur usage. Sa responsabilité à l'égard des consommateurs reste régie par l'article 14 des CGU. *[Revue : IM-8]*

## 13. Durée, modification, droit applicable

Les présentes s'appliquent tant que vous détenez une Clé d'extension. Leur modification suit l'article 16 des CGU. Elles sont soumises au droit français, dans les conditions de l'article 18 des CGU. La version française fait foi.
