# Étude du parrainage

*Rédigée le 2026-10-31, à la demande de Gregory : le parrainage est **très important** ; le parrain gagne de la Kaelite quand son filleul **monte en puissance**, pour valider qu'il joue vraiment et éviter les inscriptions poubelles. Document de cadrage, rien n'est codé. Sources internes : [GDD](game-design-document.md) (sections 4.2, 5.6, 9), [comparatif du genre](references-jeux-du-genre.md), [plan marketing](plan-marketing.md), [comportements bannissables](comportements-bannissables.md) (B2, B8, D1), [registre des traitements](legal/07-registre-des-traitements.md), [CGV Kaelite](legal/05-cgv-kaelite.md), [simulateur](../tools/theorycrafting/README.md).*

**Fiabilité.** Ce qui vient du dépôt est cité avec son fichier. Ce qui vient de ma mémoire (exemples de jeux, droit) est marqué **à vérifier** : aucune recherche web n'a été faite pour ce document, et le comparatif du genre ne contient qu'**un seul** chiffre de parrainage sourcé (Grepolis). Aucun montant de Kaelite n'est arrêté dans le dépôt (pas de prix de pack, pas de valeur de la file de construction supplémentaire) : les récompenses ci-dessous sont donc exprimées en **unités relatives** (`K`), à caler au simulateur.

---

## 1. Principe

Un parrainage récompense **une personne réelle qui joue**, pas une inscription. Deux idées découlent de la demande de Gregory :

1. **Le gain du parrain est versé par paliers, à mesure que le filleul progresse**, jamais à l'inscription. La progression du filleul est la preuve de présence.
2. **Le gain du parrain doit être petit à chaque palier et valoir surtout par l'accumulation**, de sorte qu'un compte jetable ne rapporte rien (il n'atteint pas le palier 2) et qu'une ferme de comptes coûte plus de temps qu'elle ne rapporte.

Ce que le parrainage ne doit pas devenir : une source de Kaelite si rentable qu'elle remplace l'achat, ou si lente qu'elle ne motive personne. La fourchette visée est détaillée en section 6.

---

## 2. Mécanique proposée

### 2.1 Lien et code

- Chaque **compte du lobby** a **un code de parrainage** et un lien (`lobby.kalendrath.com/r/<code>`). Le code est un identifiant aléatoire, sans lien avec l'e-mail ni le pseudonyme.
- Le filleul s'inscrit **depuis le lien** ou saisit le code **à l'inscription uniquement** (pas après coup, pour éviter les rattachements opportunistes). Le rattachement est **définitif**.
- Le lien suit le filleul **sur le lobby**, pas sur un serveur : le parrainage est attaché au compte, la progression se mesure **sur un serveur** (voir 2.3).
- **Aucune saisie d'e-mail d'amis** dans le jeu (voir RGPD, section 5). Le parrain partage son lien par ses propres moyens (Discord, messagerie, bouche à oreille).

### 2.2 Paliers de progression du filleul

Les paliers s'appuient sur des grandeurs **déjà dans le GDD** et difficiles à simuler sans jouer : les **paliers de cité** (Hôtel de ville), puis le **Prestige**. Fenêtres de référence du joueur gratuit actif (GDD, 4.2) : Village J1-J3, Bourg J5-J10, Cité fortifiée J14-J30, Citadelle J60-J120, Métropole J540-J730 (le simulateur est sous réserve de correction, voir son README).

| Palier | Condition du filleul (sur un même serveur) | Ce que cela prouve | Gain du parrain | Gain du filleul |
|---|---|---|---|---|
| **P0** | Compte validé (e-mail confirmé) | Rien : **aucun gain** | 0 | Lot d'arrivée normal du jeu (le même qu'un joueur non parrainé) |
| **P1** | **Bourg** atteint **et** au moins 5 jours de connexion distincts sur 14, dans les 30 jours après l'inscription | Il a dépassé le tutoriel et revient | `1 K` | `1 K` (récompense de bienvenue « d'amitié ») |
| **P2** | **Cité fortifiée** atteinte, dans les 60 jours | Il est entré dans la boucle moyenne | `2 K` | `1 K` |
| **P3** | **Citadelle** atteinte, dans les 180 jours | Joueur installé | `4 K` | `2 K` |
| **P4** | **Prestige : premier palier** (ou Métropole) | Joueur de long terme | `8 K` + titre honorifique « Passeur » | `2 K` |

Remarques de conception :

- **Pas de palier par « niveau de puissance brute »** (score au classement) : il se gonfle par le pillage entre comptes liés. Les paliers de cité sont des **constructions**, qui demandent du temps réel et ne se transfèrent pas.
- **Condition de présence** au P1 : la progression seule (Bourg en J5-J10) pourrait s'atteindre en deux ou trois sessions avec des accélérations payées par le parrain. Les 5 jours de connexion distincts coupent ce raccourci sans pénaliser un joueur occasionnel (5 jours sur 14).
- **Fenêtres de validité** (30, 60, 180 jours) : un parrainage qui n'avance pas expire, ce qui borne l'engagement comptable (Kaelite promise).
- Progression **sur un seul serveur par palier** : le palier se valide sur le serveur où le filleul a joué ; un filleul qui change de serveur redémarre la fenêtre du palier suivant, sans perdre les paliers déjà versés.
- **Paliers à ajuster** après passage au simulateur (questions de la section 7). Les fenêtres de temps doivent laisser le **joueur gratuit occasionnel** les atteindre, sinon le parrain d'un ami décontracté ne touche rien.

### 2.3 Quel solde de Kaelite est crédité

Le GDD (section 9) tient **deux soldes** : la Kaelite **achetée** (compte, tous serveurs) et la Kaelite **gagnée** (serveur d'origine). Les CGV précisent qu'**aucun crédit gratuit n'est porté au solde acheté** (le sort des crédits gratuits liés au compte reste « à décider »).

**Recommandation : le parrainage crédite de la Kaelite gagnée, jamais de la Kaelite achetée.**

- Elle est **liée à un serveur**, donc non « farmable » sur plusieurs serveurs ; c'est la règle posée le 2026-10-28 contre la ferme de comptes.
- Elle **ne touche pas** au régime juridique de la Kaelite achetée (remboursement, traçabilité, CGV art. 4).
- Quel serveur ? **Le serveur sur lequel le filleul a atteint le palier**, et **le parrain doit y avoir un compte** pour la toucher. Un parrain qui n'a pas (ou plus) de compte sur ce serveur reçoit la récompense en **attente 90 jours** sur ce serveur ; passé ce délai, elle est convertie en une récompense **non monétaire** (titre, cosmétique, ressources). C'est le point le plus délicat : il crée une prime à jouer sur le même serveur que son filleul, ce qui est **voulu** (le parrainage amène un ami à jouer avec soi).
- **Variante écartée : un troisième solde « Kaelite de parrainage » lié au compte.** Il rendrait le parrainage farmable multi-serveurs et compliquerait l'affichage (« une seule somme, avec le détail au survol »). Rouvrir seulement si le portage serveur frustre trop de parrains.

Le joueur voit **une seule somme** ; la Kaelite gagnée se dépense en premier (GDD, section 9) : le parrainage ne change pas cette règle.

### 2.4 Plafonds

| Plafond | Valeur de départ proposée | Motif |
|---|---|---|
| **Filleuls récompensés par parrain, par serveur** | 10 | Un vrai joueur n'amène pas plus de 10 amis sur le même serveur ; au-delà, c'est une activité d'acquisition (voir 4) |
| **Filleuls récompensés par parrain, au total sur le compte** | 25 | Borne l'exposition globale |
| **Kaelite de parrainage par parrain et par serveur et par mois** | à calibrer (≈ la valeur d'une file de construction supplémentaire gagnée sans payer, GDD 9) | Pas de revenu de parrainage permanent |
| **Gain total d'un parrainage complet (P1 à P4)** | 15 `K` pour le parrain, 6 `K` pour le filleul | Fixe l'ordre de grandeur |
| **Parrain à ancienneté minimale** | 3 jours de compte et P1 atteint soi-même | Pas de parrains créés pour l'occasion |
| **Filleul à nouveau compte du lobby uniquement** | Un compte existant ne peut pas être « parrainé après coup » | Le parrainage amène des joueurs, il ne rémunère pas des retours |

Ces valeurs sont des **points de départ** à valider (section 7).

### 2.5 Récompenses autres que la Kaelite

À prévoir pour que le parrainage ne soit pas qu'une monnaie, et pour garder la dimension sociale :

- **Titre « Passeur »** (aux paliers P3 et P4), cosmétique, sans puissance.
- **Bonus de jeu en commun** : un filleul et son parrain dans la **même alliance** reçoivent un petit bonus cosmétique partagé. À ne pas rendre plus puissant que ce que la règle +30 % de l'avance payante tolère (GDD 4.2, point 8).
- **Pas de ressources de jeu en quantité**, car elles se transfèrent facilement entre comptes d'un même joueur (push, B8/B2).

### 2.6 Règle sur la durée de vie du parrainage

- Parrainage **actif 180 jours** après l'inscription du filleul, puis **clos** : plus de nouveaux paliers (P4 excepté, jusqu'à 365 jours).
- Si le **filleul est banni** (N3 et plus) avant un palier, le palier n'est pas versé. Si le palier a été versé, il est repris selon la règle des comportements bannissables (**retrait des gains avant la sanction**, principe 9).

---

## 3. Calendrier d'introduction

| Quand | Quoi |
|---|---|
| **Alpha** | **Pas de Kaelite, pas de boutique** (le Patreon tient lieu de boutique, plan marketing). Parrainage **mesuré seulement** : code, lien, comptage des filleuls et des paliers, **sans récompense monétaire** (titre « Passeur » et cosmétique). Données pour caler les paliers |
| **Bêta** | Parrainage complet **avec Kaelite gagnée**. À articuler avec le bonus de préinscription et le classement de bêta : **un parrainage par bêta**, valable sur le serveur de bêta, **remis à zéro** avec lui |
| **Sortie `1.0`** | Parrainage reporté sur s1 : le lien de bêta reste valable pour **les inscriptions de bêta**, un nouveau lien pour s1 |
| **Après** | Parrainage « **retour d'un ancien joueur** » : à instruire plus tard, pas en V1 (principe « V1 minimum jouable d'abord ») |

**Lien avec le bonus de bêta (+30 % de Kaelite offerte sur tout achat) :** le parrainage ne doit **pas** s'y cumuler en bonus d'achat. Le parrainage crédite de la Kaelite gagnée, le bonus d'achat porte sur la Kaelite achetée : deux flux séparés.

---

## 4. Anti-abus

Le parrainage est un **vecteur de fraude** classique : la récompense incite à créer des comptes. Principe de la demande de Gregory : le gain dépend d'une progression réelle, donc **le coût de la fraude dépasse le gain**.

### 4.1 Auto-parrainage et multi-comptes

| Risque | Parade |
|---|---|
| Parrainer ses propres comptes (le parrain et le filleul sont la même personne) | **Comparaison de signaux** à la création et à chaque palier : IP, horodatage, agent utilisateur, jeton de moyen de paiement (jamais le numéro de carte), appareil. Un recoupement fort **bloque le versement** (revue manuelle), il **ne bannit pas** (voir ci-dessous) |
| Foyer partagé légitime (frère, colocataire, école) | **Déclaration de foyer** (D1 des comportements bannissables) : les comptes déclarés **peuvent** être parrain et filleul, mais **le palier ne verse que la moitié**, et aucun échange de ressources n'est permis entre eux. Un parrainage « sauvage » dans un même foyer est vérifié avant versement |
| Chaînes de parrainage (A parraine B, qui parraine C, qui parraine A) | **Un compte ne peut pas être à la fois parrain et filleul dans une même chaîne de profondeur 3**, détection de cycle côté lobby |
| Parrainages en série par un même parrain | Plafonds de 10 par serveur et de 25 au total ; **au-delà de 5 filleuls en 7 jours**, le versement passe en **revue manuelle** |

La règle de proportionnalité des comportements bannissables s'applique : **la première réponse est toujours le retrait du gain, avec avertissement** (N1 ou N2), pas le bannissement. Le barème B8 retenu par la revue du game-master : **N4 pour une boucle de parrainage ou une ferme de comptes organisée, N5 seulement pour un réseau qui monétise (revente de codes ou de Kaelite) ou la récidive après N4.**

### 4.2 Fermes de filleuls (comptes jetables qui « jouent » un peu)

- **Seuils de présence** (5 jours distincts sur 14 au P1) : un script qui se connecte sans jouer est repéré par le détecteur de bots (B3), mais il suffit de **ne pas se reposer là-dessus**.
- **Coût en temps** : les paliers P2 à P4 exigent des jours de construction réels (Cité fortifiée J14-J30, Citadelle J60-J120). Une ferme de 10 comptes doit faire grandir 10 villes en parallèle pour récolter `2 + 4 + 8 K` par compte, soit un **coût de jeu élevé** (ou des accélérations payées, donc un gain **net négatif** si le gain est calé sous la valeur de l'accélération : **à vérifier au simulateur**, question Q5).
- **Pas de Kaelite au P0.** Les « inscriptions poubelles » sont ainsi **sans valeur** : la récompense du parrain commence à `1 K` après 5 jours de présence et un Bourg, ce qui coûte déjà plus de temps qu'il ne rapporte pour un fraudeur.
- **Revue manuelle avant versement des paliers de valeur** (P3, P4), comme le prévoit B8 (« revue avant versement des récompenses de valeur »). Faisabilité d'un modérateur unique : traitement **P3** (lot hebdomadaire, comportements bannissables, principe 10), donc **délai de versement annoncé de 7 jours** pour ces paliers.
- **Détection** (B8) : parrainages chaînés par IP/appareil, comptes sans autre activité que la collecte, comptes parrainés qui n'envoient jamais de message, ne rejoignent aucune alliance, n'attaquent ni ne se font attaquer. Le détecteur **classe la file**, il ne la remplit pas (principe 10c).
- **Transfert de ressources du parrain vers le filleul** (push pour accélérer le palier) : déjà couvert par les règles anti-push ; à surveiller particulièrement sur les couples parrain-filleul (alerte automatique sur un don d'un parrain à son filleul avant un palier).

### 4.3 Revente de codes et monétisation

- Le code est **gratuit et non cessible** : vendre ou acheter des codes de parrainage est interdit (CGU 7.8 couvre les récompenses ; ajouter la mention explicite « codes de parrainage » à la liste de B8). Réseau qui monétise : N5.
- Les **échanges de liens** sur les groupes de parrainage et les sites de « codes » ne sont pas interdits en soi, mais le **détecteur** surveille les parrains au rythme d'acquisition anormal.
- **Reddit** : r/WebGames interdit les liens de parrainage dans ses publications (règle P6, relevée dans `references-jeux/complements/reddit-vague-2.md`) ; le plan marketing ne doit donc **jamais** poster un lien de parrainage sur Reddit. Les liens de parrainage restent un outil **de joueur à ami**.

### 4.4 Gestion des cas limites

- **Parrainage d'un vrai ami ou membre de la famille jouant sur son propre compte : légitime** (B8). Le foyer partagé se règle par la déclaration (D1).
- **Alliance qui recrute activement : légitime** (B8). Un chef d'alliance qui parraine 10 recrues reste dans le plafond.
- Parrain qui joue peu mais dont le filleul progresse : la récompense est versée (pas de condition d'activité du parrain après P1 du parrain).
- **Parrain banni** avant versement : récompenses **annulées** ; le filleul garde sa récompense de bienvenue.
- **Parrain ou filleul qui exerce son droit d'accès, d'effacement ou de portabilité** : voir section 5.

---

## 5. Exigences RGPD

*Éléments à faire relire par un avocat ou un conseil RGPD. Les références ci-dessous ont été **recoupées le 2026-11-03** (voir [verification-references-2026-11-03.md](legal/verification-references-2026-11-03.md)) ; ce qui reste non sourcé est signalé ; le registre actuel ([MI-17 de la revue juridique](legal/revue-juridique.md)) note déjà qu'**il n'y a pas de fiche pour le parrainage**.*

1. **Un nouveau traitement à inscrire au registre** (fiche T-parrainage ou extension de T2/T5), avec sa finalité (« attribuer une récompense au parrain et au filleul, détecter les abus »), sa base légale (**contrat** pour la récompense ; **intérêt légitime** pour la lutte contre la fraude, avec mise en balance, comme D19), les données, les destinataires, la durée de conservation.
2. **Données collectées, au minimum :**
   - Le **code de parrainage** (identifiant aléatoire par compte).
   - Le **lien parrain-filleul** (deux identifiants de compte, date de rattachement).
   - La **progression par palier** (paliers atteints, dates, serveur).
   - Les **signaux anti-abus** déjà collectés par le registre (IP, horodatages, agent utilisateur), **réutilisés sans nouvelle collecte** et **sans empreinte d'appareil** calculée dans le navigateur (le registre l'exclut aujourd'hui, à ne pas changer sans mise à jour de la politique).
3. **Aucune adresse e-mail de tiers saisie dans le jeu.** Le partage se fait par **lien ou code** que le parrain envoie lui-même. C'est la solution la plus sûre : on **ne collecte aucune donnée sur une personne qui n'a rien demandé**, et on évite le régime de la prospection électronique (consentement préalable, article L34-5 du Code des postes et des communications électroniques : **référence exacte**, le texte exige le consentement préalable pour la prospection directe par courrier électronique vers une personne physique, et la CNIL le cite dans sa page sur la prospection ; texte officiel de Légifrance non lu, voir la vérification). *[Correction 2026-11-03 : la phrase d'origine, « La CNIL admet en principe l'envoi par le parrain depuis son propre outil, mais pas l'envoi par le service des messages de relance », est **inexacte** telle qu'écrite. La page de la CNIL sur le parrainage vise le cas où **l'organisme** envoie le message au filleul : il doit alors indiquer l'identité du parrain, n'utiliser les coordonnées du filleul qu'**une seule fois** pour cet envoi, et obtenir un consentement exprès pour tout autre message. Elle ne traite pas, dans le texte lu, de l'envoi par le parrain depuis son propre outil. Cette dernière lecture reste **non sourcée**.]* La conclusion de conception ne change pas, et reste la plus prudente : pas d'envoi par Kalendrath. **Ne pas implémenter de « importer mes contacts » ni d'envoi d'e-mails d'invitation par Kalendrath.**
4. **Information du filleul** (articles 13-14) : à l'inscription via un lien, une phrase claire : « Vous avez été invité par un joueur ; il pourra gagner de la Kaelite quand vous progresserez. Il verra *que* vous avez atteint un palier, pas votre identité ni vos données. » Mise à jour de la **politique de confidentialité** (FR et EN).
5. **Ce que le parrain voit** : le **pseudonyme de jeu** du filleul (déjà public sur les serveurs) et le **palier atteint**, **jamais** l'adresse e-mail, l'IP, l'âge déclaré. Option : le filleul peut **masquer son pseudonyme** (le parrain voit alors « Un joueur invité »).
6. **Durées de conservation :**
   - Lien et paliers : **jusqu'à la clôture du parrainage** (180 à 365 jours), puis **12 mois** pour la défense en cas de litige sur la récompense, puis suppression ou anonymisation. *(Durées à arrêter avec le reste du registre.)*
   - Dossiers d'abus : régime des dossiers de modération (limités au cas ; pas de liste générale de fraudeurs, article 10 du RGPD, à valider).
7. **Droits** (effacement, accès, opposition) : la suppression du compte du filleul **ne retire pas** la récompense déjà versée au parrain (légitime : service rendu), mais **supprime le lien** nominatif ; le parrain ne peut pas « retrouver » un filleul effacé. Les **procédures de droits** ([08](legal/08-procedure-droits-et-violations.md)) doivent traiter les deux côtés du lien.
8. **Profilage anti-abus** : un recoupement de signaux qui **bloque un versement** est un profilage (article 4, 4) ; il ne doit conduire qu'à **une revue humaine**, jamais à une sanction automatique (principe 2 des comportements bannissables, arrêt SCHUFA). Mention dans la politique de confidentialité.
9. **Mineurs** : la récompense ne doit pas être un levier de **pression** sur des mineurs à recruter des camarades. Plafonds déjà prévus ; **pas de bannière « invite 10 amis »** dans l'interface, pas de mise en avant à l'inscription. À confronter à la règle d'âge des CGU et au **cadre de la protection des consommateurs** (le comparatif du genre note que le cadre légal UE impose des choix de conception maintenant).
10. **CGV Kaelite** : ajouter que la Kaelite de parrainage est de la **Kaelite gagnée** (serveur d'origine), **non remboursable, non cessible, reprise en cas d'abus**. Pas de bonus d'achat sur elle.
11. **Boutique et Kaelite gagnée** : si la Kaelite gagnée devient dépensable contre des offres payantes, la qualification juridique d'une **récompense** (sans contrepartie) est plus simple que celle d'une monnaie achetée ; ne **pas** la présenter comme « monnaie » ou « argent offert ».

---

## 6. Effet sur l'économie de Kaelite et sur le pay-to-win

### 6.1 Ce que le parrainage fait à l'économie

- **Source de Kaelite gagnée, de plus.** Le GDD n'a pas chiffré la **quantité de Kaelite gagnée** dans le jeu (events, classement, bugs). Le parrainage s'ajoute à ce flux. Ce flux doit rester **faible** devant l'offre payante, sinon la Kaelite se dévalue (la boutique est le revenu du projet, [plan marketing, référence d'économie solo](references-jeux-du-genre.md) : ~0,13 € par joueur actif mensuel).
- **Puits de Kaelite** : à ce jour, ni le prix des offres en Kaelite, ni la file de construction supplémentaire ne sont chiffrés. Le GDD pose seulement que la 2e file doit être **facile à obtenir pour le joueur gratuit** par la monnaie gagnée. **Le parrainage ne doit pas, à lui seul, offrir la 2e file** : sinon le gratuit qui a un ami paie moins que celui qui n'en a pas, et l'on crée une inégalité arbitraire (par la chance sociale, pas par le jeu).
- **Acquisition à coût variable.** Un parrainage complet (15 `K` au parrain, 6 `K` au filleul) coûte **de la Kaelite non achetée**, donc un manque à gagner et non une dépense, **si** les `K` sont dépensés sur des offres qui auraient été achetées. À calibrer : **un parrainage complet doit coûter nettement moins que le revenu moyen d'un joueur actif** (hypothèse de 2 à 3 % de payeurs, environ 5 € par payeur et par mois, comparatif du genre, décision 4).
- **Valeur d'acquisition.** Si le parrainage ramène des joueurs à coût nul, il vaut **mieux que la publicité payante**, exclue par le chiffre (un 4X paie 4 à 8 $ par installation, comparatif). Le coût en Kaelite d'un filleul qui atteint P2 doit rester **très en dessous de ces 4 à 8 $** pour avoir un sens.

### 6.2 Pay-to-win

- **Le parrainage est un avantage obtenu par le jeu et la sociabilité, pas par l'argent.** Il ne crée pas de pay-to-win, **à condition que la Kaelite gagnée n'achète rien que la Kaelite achetée ne puisse acheter plus cher** (elle est dépensée en premier, mêmes offres).
- **Risque indirect : le gros payeur parraine ses propres filleuls « acquis »** (alts ou amis payés) pour tirer de la Kaelite : plafonds et revue le contiennent.
- **Risque de plafond +30 %** (avance payante maximale du GDD 4.2, point 8) : l'avantage obtenu par le parrainage **entre dans le plafond**, il ne s'y **ajoute pas**. À modéliser : si la Kaelite de parrainage achète des accélérations, le **total** (achat + parrainage) reste sous +30 %. Les cumuls de bonus font éclater les plafonds dans d'autres jeux (le comparatif cite Grepolis et Evony).
- **Un joueur très sociable ne doit pas distancer un joueur isolé.** Le plafond de 10 filleuls par serveur et le gain total de 15 `K` par filleul servent à ça ; **question Q3** du simulateur.

---

## 7. Exemples de jeux de référence

| Jeu | Mécanique de parrainage | Statut de la source |
|---|---|---|
| **Grepolis** | **200 pièces d'or par filleul qui atteint 3 000 points** : paliers de **puissance** du filleul, un seul palier | **Vérifié** (`references-jeux/grepolis.md`, ligne 82) |
| **OGame, Travian, Tribal Wars, Forge of Empires, Ikariam, Last War, Call of Dragons, Whiteout, Rise of Kingdoms** | Les fiches du dépôt **ne documentent pas** leur parrainage | **Non trouvé dans le dépôt**. Ces jeux ont des systèmes d'invitation ou de parrainage (récompenses en monnaie premium quand l'ami atteint un seuil, ou codes d'invitation) : **à instruire avant d'arrêter les montants** |
| **Dropbox** (2008-2012) | Espace gratuit pour le parrain et le filleul ; **250 Mo par invitation**, doublé à **500 Mo** pour chacun des deux le **3 avril 2012**, plafond de 16 Go (32 invités) en compte gratuit. *[Correction 2026-11-03 : la mention « 2008-2010 » ne datait pas le doublement ; la croissance « +3 900 % » est relayée par des blogs aux dates contradictoires, **non sourcée** officiellement]* | **Vérifié en partie** ([blog Dropbox, 2012-04-03](https://blog.dropbox.com/topics/company/dropbox-referrals-are-now-twice-as-nice)) |

Leçons **tirées de ce qui est dans le dépôt** :

- **Un palier fondé sur la progression** (Grepolis : 3 000 points) est l'état de l'art du genre sur ce point : Gregory retrouve la même logique, en plus **progressive**.
- **Le seuil unique de Grepolis est une cible de farm** (3 000 points s'atteignent par des filleuls jetables aidés par le parrain) ; **plusieurs paliers dont le dernier dépend de constructions longues** réduisent ce risque.
- **Le comparatif insiste sur la confiance comme capital de départ** (décision 15) : un parrainage visible, honnête, sans publicité trompeuse, est cohérent avec ce positionnement.
- **Mise à jour à faire :** avant de figer les montants, **ajouter une fiche** dans `references-jeux/` sur le parrainage d'OGame, Travian, Tribal Wars, Last War et Call of Dragons (montants, seuils, plafonds, critiques de la communauté). Le GDD 9 réclame déjà un audit des boutiques « avant de figer l'offre » ; le parrainage en fait partie.

---

## 8. À valider au simulateur de theorycrafting

Le simulateur modélise la construction et la recherche d'un joueur gratuit ; il **n'a ni Kaelite, ni parrainage, ni profils occasionnels**, et son **défaut connu** (file de construction monopolisée par des chantiers de 68 à 123 jours) doit être **corrigé avant** toute conclusion. Les questions suivantes supposent ce correctif fait, et l'ajout de profils de joueur (occasionnel, régulier, très actif) qui figure déjà dans ses pistes d'évolution.

| # | Question chiffrée | Ce qu'il faut ajouter au modèle |
|---|---|---|
| **Q1** | À quel **jour** un joueur **gratuit occasionnel** (connexion 3 à 4 jours par semaine, une session courte) atteint-il Bourg, Cité fortifiée, Citadelle ? **Les fenêtres de 30, 60 et 180 jours des paliers P1, P2, P3 laissent-elles passer au moins 80 % de ces joueurs ?** | Profil occasionnel ; sorties en fourchette (percentiles), pas en chiffre unique |
| **Q2** | Le critère « 5 jours de connexion distincts sur 14 » exclut-il un **joueur qui accélère par achat** mais ne se connecte pas ? **Combien de jours réels faut-il au minimum** pour atteindre le Bourg avec le profil « payeur » le plus rapide ? | Profil payeur ; jours de connexion comptés |
| **Q3** | Avec **10 filleuls au plafond** qui atteignent tous P1 à P3, combien de Kaelite gagne le parrain **sur 3, 6, 12 mois** ? **Est-ce moins que la valeur de la file de construction supplémentaire** (hypothèse de départ : quelques `K`) ? Un joueur très sociable est-il **plus rapide** qu'un joueur isolé de plus de X % ? | Flux de Kaelite gagnée par source ; valeur de l'avance en jours (30 % sur 24 mois = 5 à 6 mois d'avance, comparatif) |
| **Q4** | **Valeur en jours de construction** de chaque `K` dépensé en accélération : un parrainage complet (15 `K`) équivaut-il à **combien de jours** gagnés ? Doit rester **dans le plafond +30 %** avec les autres sources (achat, events). | Table de conversion Kaelite → heures d'accélération ; compte du plafond |
| **Q5** | **Rentabilité de la fraude** : coût en jours-joueur (ou en accélérations achetées) pour amener un faux filleul jusqu'à P2 (Cité fortifiée), contre `2 + 1 K` perçus. **À quel niveau de gain par palier la ferme devient-elle rentable** pour un fraudeur qui joue ses comptes à la chaîne avec les mêmes ressources en les poussant ? | Modèle d'un joueur multi-comptes sans transfert (les transferts sont interdits) |
| **Q6** | **Distribution** attendue des paliers : sur 100 filleuls réels, combien atteignent P1, P2, P3, P4 ? (hypothèses de rétention : J30 à 4 % pour Last War dans le comparatif, jeux navigateur plus durables) et **coût moyen en `K` par filleul inscrit** et **par filleul actif à J90**. | Courbe de rétention comme paramètre ; à remplacer par les **données d'alpha** dès qu'elles existent |
| **Q7** | **Effet sur l'équilibre gratuit/payeur :** à profil de payeur constant, **l'écart d'avance** entre un joueur qui **parraine 3 amis** et un joueur isolé dépasse-t-il 5 % ? 10 % ? | Profils croisés (payeur, gratuit, gratuit parrain) |
| **Q8** | **Seuils du palier P4** (Prestige : premier palier) : le **premier palier de Prestige** est-il atteint avant ou après la Citadelle ? **Le Prestige n'est pas encore chiffré** (GDD 5.6, [TBD]) : le modèle n'a pas de Prestige. **Remplacer P4 par un seuil de cité (Métropole) tant que le Prestige n'est pas chiffré.** | Prestige à ajouter, ou palier P4 sur la Métropole |
| **Q9** | **Quantité de Kaelite gagnée totale** (events, classements, signalements de bugs, parrainage) **par joueur actif et par mois** : le parrainage pèse-t-il **moins de 20 %** de ce flux ? | Budget de la Kaelite gagnée, à définir (point ouvert du GDD) |
| **Q10** | **Moitié de gain en foyer déclaré** (section 4.1) : le gain réduit suffit-il à décourager la fraude sans pénaliser les vraies familles ? | Cas de foyer, avec comptes liés |

**Ordre conseillé :** corriger le défaut du simulateur, ajouter le profil occasionnel (Q1, Q2), puis la conversion Kaelite → jours (Q4) qui conditionne tout, puis la fraude (Q5). **Q6 et Q9 dépendent de données d'alpha** : un parrainage « à blanc » pendant l'alpha (section 3) les produira.

---

## 9. Décisions pour Gregory

| # | Décision | Avis |
|---|---|---|
| **D1** | **Solde crédité** : Kaelite **gagnée** (serveur d'origine) ou un troisième solde lié au compte ? | **Gagnée**, sur le serveur où le filleul progresse. Un troisième solde rouvre la ferme multi-serveurs |
| **D2** | **Le parrain doit-il avoir un compte sur le serveur du filleul** pour toucher la récompense (attente de 90 jours, puis conversion en titre ou cosmétique) ? | Oui, c'est la règle qui garde le parrainage serveur par serveur et pousse à jouer ensemble |
| **D3** | **Quatre paliers** (Bourg + présence, Cité fortifiée, Citadelle, Prestige 1) ou **trois** ? Palier fondé sur la **cité** ou sur la **puissance** ? | Quatre paliers sur les **constructions**, pas sur la puissance (pillable entre comptes liés). **P4 sur la Métropole** tant que le Prestige n'est pas chiffré |
| **D4** | **Montants** : ordre de grandeur de 15 `K` au parrain et 6 `K` au filleul pour un parrainage complet. Quelle **valeur** donner à 1 `K` ? | À **ne pas fixer maintenant** : **Q3 et Q4** d'abord. Seule règle ferme : un parrainage complet ne remplace pas la 2e file gratuite |
| **D5** | **Récompense au filleul** (oui/non) | Oui, petite : un parrainage à sens unique ressemble à une démarche de vendeur ; l'ami récompensé a une raison de venir. Mais **jamais au P0** |
| **D6** | **Plafonds** : 10 filleuls par serveur, 25 par compte, ancienneté minimale du parrain de 3 jours et P1 atteint | Oui comme points de départ, réglés à l'alpha |
| **D7** | **Revue manuelle des paliers P3 et P4** avec **délai de 7 jours annoncé** | Oui (principe 10 du GM : lot hebdomadaire). Le P1 et le P2 sont versés automatiquement, sauf alerte |
| **D8** | **Foyer déclaré** : moitié du gain, ou parrainage interdit entre comptes déclarés ? | **Moitié du gain** : on ne punit pas la famille, mais on ne paie pas pleinement |
| **D9** | **Aucune saisie d'e-mails d'amis, aucun import de contacts** (lien et code seulement) | Oui (RGPD, section 5) |
| **D10** | **Alpha** : parrainage **sans Kaelite** (titre et comptage seulement) pour **mesurer** ; **Kaelite à la bêta** ? | Oui. Le Patreon tient lieu de boutique à l'alpha ; les données d'alpha alimentent Q6 et Q9 |
| **D11** | **Interdire explicitement la revente de codes** et l'ajouter à la liste de B8 et aux CGU | Oui, avec le barème B8 révisé (N4 boucle organisée, N5 réseau qui monétise) |
| **D12** | **Auditer le parrainage des jeux de référence** avant de figer les montants (nouvelle fiche dans `references-jeux/`) | Oui, c'est le trou principal de cette étude |
| **D13** | **Visibilité** : un encart « Parrainage » discret dans le lobby, **sans** bannière insistante, **sans** compte à rebours, **sans** message de pression au départ du joueur | Oui (cohérent avec la confiance, décision 15 du comparatif, et avec les mineurs) |
| **D14** | **Traiter le parrainage dans le registre et la politique** (nouvelle fiche T) **avant** la bêta | Oui ; MI-17 de la revue juridique le signale déjà |

---

## 10. Suites

1. Valider D1 à D3 et D9 avec Gregory : ce sont elles qui fixent l'architecture (portefeuille du lobby, paliers sur serveur).
2. Instruire le parrainage de 4 ou 5 jeux de référence (D12), puis corriger le simulateur et ajouter profil occasionnel et Kaelite (section 8).
3. Mettre à jour : **GDD 9** (parrainage et Kaelite gagnée), **comportements bannissables** (B8, mention des codes), **registre et politique de confidentialité** (nouvelle fiche), **CGV Kaelite** (nature de la Kaelite de parrainage), **plan marketing** (le parrainage comme canal, sans lien sur Reddit).
4. Côté code (plus tard, domaine intact) : le parrainage vit dans le **lobby** et un **service** dédié avec ses tests Pest ; **aucune logique dans les contrôleurs API** (CLAUDE.md).
