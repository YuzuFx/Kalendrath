# Étude : Grok Bot (xAI) comme équipe d'assistants IA pour Kalendrath

*Version 2 du 2026-10-30, qui remplace la version 1 (consacrée à l'API xAI et à des bots Discord maison, donc au mauvais produit). Étude demandée par Gregory. Liée à [plan-marketing.md](plan-marketing.md), [specification-discord.md](specification-discord.md), [comportements-bannissables.md](comportements-bannissables.md) et [docs/legal/](legal/).*

**Transparence :** étude rédigée par Claude (Anthropic), concurrent de xAI ; biais possible. Étiquettes : **[Vérifié]** = page officielle xAI lue le 2026-10-30 (pages `docs.x.ai/grok-bot/...`) ; **[Tiers]** = blog, agrégateur, presse ; **[Supposition]** = raisonnement de l'auteur. La page d'origine `https://x.ai/bot` a répondu **403 : non lue directement** (seul son titre, « AI teammates that finish the work », est connu par un résultat de recherche). Sa description ci-dessous vient de la documentation officielle `docs.x.ai/grok-bot`, qui en est le prolongement. Ont aussi répondu 403 : `x.ai/news`, `x.ai/changelog/bot`, `x.ai/legal/terms-of-service`, `x.ai/legal/privacy-policy`, `grok.com/plans` (page vide). Les **conditions d'utilisation et la politique de confidentialité de xAI n'ont donc pas été lues.**

---

## 1. Résumé

1. **Grok Bot est un vrai produit**, distinct de l'API Grok : des **« Bots » persistants** (un nom, un métier, une mémoire) qui travaillent sur **un ordinateur cloud** (navigateur, fichiers, terminal), en parallèle, y compris ordinateur éteint, et se passent le travail. **[Vérifié]**
2. **L'ancienne étude avait tort sur le produit** (voir section 9). Elle concluait qu'il n'existait « aucun produit Grok Bots » ; c'est faux.
3. **Il est utilisable comme assistant**, pas comme employé : il **agit sous votre identité** (« Bots have no identity of their own and act as the signed-in member »), partage un seul ordinateur et les mêmes sessions connectées entre tous vos Bots, et sa défense contre l'injection de prompt est, selon xAI, **réduite mais pas éliminée**. **[Vérifié]**
4. **Blocages pour Kalendrath :** (a) les données sont traitées **aux États-Unis**, la documentation **ne mentionne pas le RGPD** (renvoi au DPA, non lu) ; (b) **Discord n'est pas un connecteur documenté** ; (c) le **tag @bot sur X est indisponible dans l'UE** ; (d) les journaux d'audit et les contrôles réseau sont **réservés à l'offre Enterprise**. **[Vérifié]**
5. **Recommandation :** l'adopter **par paliers, en lecture et brouillon uniquement**, pour la communication, le SEO, le marketing et la préparation des partenariats ; **jamais** pour trancher en comptabilité ou en droit, **jamais** en bannissement, **jamais** avec un compte ou un accès bancaire. Voir sections 4 et 7.
6. **Coût :** l'abonnement coûte plausiblement de l'ordre de 30 $/mois, mais **le prix officiel n'a pas pu être lu** et les plans ont été remaniés en octobre 2026 (section 5).

---

## 2. Le produit tel que présenté par xAI [Vérifié, docs.x.ai/grok-bot]

| Point | Ce que disent les pages officielles |
|---|---|
| Définition | « Persistent AI assistants called Bots », « AI teammates with names, jobs, and context that compounds over time ». Chaque Bot a nom, rôle, mémoire, fichiers, sessions de navigateur, préférences. |
| Pilotage | Texte, dictée, discussion vocale ; applis macOS, Windows, Linux, iPhone, Android. |
| Collaboration | Les Bots tournent en parallèle, **s'écrivent entre eux, partagent le contexte en discussion de groupe, se transmettent la responsabilité d'une tâche**. |
| Ordinateur | Un **ordinateur cloud par compte** (pas par Bot) : navigateur, fichiers, terminal. « Work continues while your laptop is closed. » |
| Navigateur | Peut utiliser « many browser-based tools, including services without a connected app » ; rend la main à l'humain pour CAPTCHA, passkey, SSO, QR code, et « ne doit pas contourner ». Certains sites bloquent les ordinateurs cloud. |
| Applications connectées | Google Agenda, Sheets, Drive ; **Slack** (publie en tant que l'utilisateur Slack connecté) ; **Gmail** (une boîte à la fois) ; Notion ; **X** (plugin qui exige des **crédits d'API X**) ; SharePoint, Zoom, Linear, 1Password. **Discord : non documenté.** (Un fournisseur tiers, Composio, annonce un connecteur Discord de 27 outils **[Tiers]** : à ne pas tenir pour acquis.) |
| E-mail | Chaque compte peut réserver **une adresse `mail.grokbot.com`** que les Bots lisent et utilisent pour écrire. « Anyone can send mail to the address » : le courrier entrant est de l'information, pas des ordres. |
| Routines | Planifiées (au moins 5 minutes d'écart) ou déclenchées par événement : Slack, GitHub, Linear, Sentry, PagerDuty, **e-mail**, **webhook**. Jusqu'à 50 routines par Bot, 200 exécutions/heure par routine, 300 en tout ; 20 derniers historiques conservés. Échecs non relancés automatiquement. |
| @bot sur X | Mentionner @bot sur X transmet le post à **votre** Bot ; **@bot ne publie que la confirmation**, le résultat reste dans l'appli. Exige un compte X relié et, **indisponible pour les comptes basés dans l'UE, le Royaume-Uni, l'Australie, l'Islande, le Liechtenstein, la Norvège**. |
| Hébergement | Fonctionne « only on Cursor-hosted cloud computers » (la documentation est celle de Cursor/Anysphere, avec les modèles « SpaceXSI », le nom que prend xAI dans ces pages). Pas de déploiement sur site. |
| Modèles | « SpaceXSI first-party models » et **possiblement des modèles tiers** de la liste des sous-traitants. |

---

## 3. Sécurité, confidentialité, quotas [Vérifié]

**Approbations.** Auto Review (modèle de contrôle indépendant) est **activé par défaut** et décide si l'action part ou demande confirmation ; cartes « Allow once / Always allow / Deny ». « **Most actions run on their own.** » Les règles « Ask first » l'emportent. xAI recommande des limites explicites pour : envoyer des messages ou invitations, **publier**, achats et virements, suppression, permissions, production, **acceptation de conditions juridiques**. Auto Review « **does not review every side effect** » (écritures en mémoire, plupart des réglages).

**E-mail.** Un e-mail demandé en conversation part dès qu'Auto Review l'autorise ; ceux issus de **routines, de messages entrants ou de tâches de fond restent en brouillon** jusqu'à clic « Send ». Les transferts et pièces jointes illisibles attendent toujours votre accord. Les cartes de routines expirent après 30 minutes.

**Publication web / réseaux.** Aucun circuit d'approbation spécifique ; c'est à vous d'écrire la limite (« Never post back to Slack without approval »). **Les publications ne sont donc protégées que par vos propres règles.**

**Injection de prompt.** Le contenu externe est « marqué comme non fiable » ; xAI écrit que ces contrôles « **reduce, but do not eliminate, risk** » et qu'il faut garder les actions conséquentes derrière approbation.

**Identités et secrets.** Tous vos Bots **partagent un ordinateur, des cookies, des sessions connectées et des identifiants en ligne de commande** : « not a security boundary ». Les jetons de connecteurs restent côté serveur ; les mots de passe et cartes remplis via Vault, 1Password ou formulaire sécurisé **ne sont pas vus du modèle**. **Le Vault n'est pas disponible sur les Bots partagés.** Une carte enregistrée dans le Vault **se remplit au paiement sans approbation séparée**.

**Données.** Régions : « Grok Bot computers run in the United States » ; résidence US garantie sur demande (Enterprise). **Le RGPD n'est pas mentionné** ; renvois vers le DPA et `trust.cursor.com` (non lus). Mode confidentialité : pas d'entraînement avec les données client ; mais Grok Bot « **requires data storage** » et ne prend pas en charge l'ancien mode de non-conservation ; le désengagement de l'entraînement suit les réglages du compte Cursor. Hibernation n'est pas suppression ; supprimer un Bot ne supprime pas ses fichiers ni ses sessions ; **pas de politique de rétention par organisation**. Suppression des données sous 30 jours après la fin du service, sur demande écrite (DPA). Certifications ISO 27001 et 42001 (Anysphere). Une page Cursor séparée indique que la couverture UE/EEE est « en développement » (inférence seulement, sur demande).

**Journaux.** Journal d'audit, enregistrement des actions (90 jours), export OpenTelemetry, contrôles réseau, règles d'équipe, SSO/SCIM : **Enterprise uniquement**. Aucun plafond de dépense dédié à Grok Bot.

**Quotas.** Un **pool hebdomadaire** partagé avec Grok et Cursor, mesuré en étapes d'agent et en jetons, pas en messages. Valeurs numériques **non publiées** (« Highest / Generous / below... »). Essai gratuit : crédit d'usage sur 7 jours, jamais converti en abonnement.

---

## 4. Évaluation rôle par rôle

Règle commune : le Bot **prépare**, Gregory **valide et déclenche**. Chaque envoi, publication, paiement ou acceptation reste derrière une règle « Ask first » écrite et testée.

| Rôle | Ce que le Bot peut faire sérieusement | Supervision | Risques propres | Verdict |
|---|---|---|---|---|
| **Communication** | Brouillons FR/EN (news, devlog, posts), calendrier éditorial, reformulation selon le skill `voix-kalendrath`, veille de mentions (lecture). | Relecture avec `checklist-publication` ; **aucune publication autonome**. | Ton de marque, promesses de dates ou de fonctions inventées, publication non voulue (pas de circuit d'approbation natif). **Obligation d'indiquer l'IA** si un bot converse avec le public **[Tiers : règlement IA art. 50, à valider]**. | **Utile, en brouillon.** |
| **SEO / référencement** | Audit du site vitrine, mots-clés, titres et méta, comparaison de concurrents, suivi de classement via navigateur. | Gregory applique les changements. | Chiffres non sourcés, conseils génériques ; le navigateur peut être bloqué par des sites. | **Utile, bon cas d'usage.** |
| **Marketing** | Veille Reddit/X/forums, idées de posts, analyse de retours de sondage, tableaux de suivi (Sheets). | Publication humaine. Reddit et X : **règles de plateformes contre l'automatisation** (cf. ancienne étude, section 7, toujours valable). | Spam perçu, bannissement du compte, autopromotion interdite sur certains sous-reddits. | **Utile en préparation ; pas d'action autonome sur les comptes.** |
| **Comptabilité** | Classer des justificatifs, préparer un tableau de recettes et dépenses, rappeler des échéances. | **Gregory ou un expert-comptable valide tout** ; aucun accès bancaire, aucune carte dans le Vault, aucune déclaration. | Erreurs chiffrées, hallucinations de règles fiscales, paiements (la carte du Vault se remplit sans approbation). | **Assistant de saisie seulement. Ne pas déléguer les décisions ni les déclarations.** |
| **Partenariats** | Repérer des créateurs et studios, rédiger des premiers messages, suivre un tableau de contacts. | **Aucun e-mail envoyé sans clic** ; aucune promesse (prix, exclusivité, partage de revenus). | **Engagement de l'entreprise** par un message envoyé sous votre nom ; injection par un e-mail entrant. | **Préparation oui ; envoi et négociation non.** |
| **Modération** | Trier des signalements collés dans un salon ou un tableau, résumer, traduire FR/EN, proposer la règle concernée. | **Décision humaine** : D18 de [comportements-bannissables.md](comportements-bannissables.md), DSA art. 17, RGPD art. 22. | **Pas de connecteur Discord documenté** ; données de joueurs vers les États-Unis ; la politique de confidentialité actuelle exclut l'envoi à un fournisseur d'IA (cf. `docs/legal/02` cité par l'ancienne étude) ; injection par les joueurs. | **Non au démarrage.** Si besoin, le bot maison de l'ancienne étude (sections 9 et 10, toujours valables) reste préférable car il tient les droits de sanction à l'écart du modèle. |
| **Support joueurs** | Réponses à la FAQ depuis des documents fournis, tri de tickets e-mail. | Réponses en brouillon au début ; la routine d'e-mail laisse déjà les envois en brouillon (vérifié). | Hallucination, courrier entrant malveillant, données personnelles aux États-Unis, 24 h/24 sans que personne ne regarde. | **Brouillons seulement ; automatisation après la bêta, après avis juridique.** |

**À ne pas déléguer, quel que soit le produit :** décisions comptables et fiscales, déclarations, contrats et conditions juridiques (xAI lui-même recommande de borner « accepting legal terms »), sanctions de joueurs, engagements financiers ou contractuels, remboursements.

---

## 5. Coût réel

- **Prix officiel : non lu.** Les pages docs.x.ai renvoient vers des pages de prix (`grok.com/dashboard/billing`, page Cursor Plans) sans afficher les montants ; `grok.com/plans` est revenue vide.
- **[Tiers, contradictoire]** : un article du 2026-08-31 dit que l'entrée de gamme est passée d'environ 200 $ à environ 30 $/mois, lié à SuperGrok ; d'autres sources donnent SuperGrok à 30 $ (Lite 10 $, Heavy 300 $). Un agrégateur évoque une **refonte d'octobre 2026** (Plus 8 $, Premium 30 $, Super 100 $, Ultra 200 $) **non confirmée par xAI**. Attention : la page officielle indique que **SuperGrok Lite et X « Plus » n'incluent pas Grok Bot** ; il faut Premium, Super, Ultra (X) ou SuperGrok, Plus ou Heavy (lien Cursor).
- **L'estimation de Gregory (≈ 30 €/mois) est plausible mais à confirmer sur le tarif affiché à l'achat**, en tenant compte de la TVA, du prix en euros et de la quantité d'usage : le pool hebdomadaire est mesuré en étapes d'agent et peut être consommé vite par des routines fréquentes, des navigations longues et plusieurs Bots en parallèle. Les dépassements se paient en crédits prépayés (pas de plafond dédié).
- **Coûts annexes :** crédits d'API X pour le plugin X ; temps de relecture de Gregory (le vrai coût) ; éventuel expert-comptable ; éventuelle mise à niveau pour l'audit et les contrôles réseau (Enterprise, prix non publiés).

---

## 6. Ce qui est vrai, faux ou à vérifier

**Constats non confirmés :** « 24 h/24 » est exact dans le sens où le calcul continue ordinateur fermé, **mais** les cartes d'approbation issues des routines **expirent en 30 minutes**, donc une routine qui a besoin de vous **s'arrête** si vous êtes absent. Les routines n'ont pas de réglage d'approbation propre : tout repose sur les instructions écrites.

**Non vérifié :** conditions d'utilisation, politique de confidentialité, DPA, liste de sous-traitants, disponibilité du produit en France (aucune restriction d'achat lue, mais **non confirmée**), connecteur Discord, prix, quotas chiffrés, limite de nombre de Bots, qualité du français.

---

## 7. Architecture de mise en place progressive

**Principe : des accès en lecture d'abord, des brouillons ensuite, des actions seulement derrière une validation. Un compte dédié et jetable pour chaque service.**

**Garde-fous de base (palier 0)**
1. Un **compte Grok dédié au projet**, avec l'authentification à deux facteurs ; ne jamais réutiliser le compte personnel.
2. **Aucun** accès à la banque, à PayPal, aux impôts, à l'hébergeur, à GitHub en écriture, à l'administration serveur ni au dépôt de secrets (`.env`).
3. Des **comptes de service distincts** (boîte e-mail de travail dédiée, compte X de test) plutôt que les comptes principaux, puisque les Bots **agissent comme vous** et partagent sessions et cookies.
4. Un **seul Bot au départ** (pas de swarm) : les Bots ne sont pas des frontières de sécurité, donc multiplier les Bots multiplie la surface sans isoler.
5. Règles « Ask first » écrites pour : envoyer, publier, supprimer, payer, modifier un accès, accepter des conditions. **Tester ces règles** avant de s'y fier (Auto Review ne couvre pas tous les effets de bord).
6. Ne jamais coller mot de passe, jeton ou clé d'API dans une conversation. Aucune donnée personnelle de joueur au début.

**Palier 1 (semaines 1 à 3) : essai gratuit ou un mois d'abonnement.** Un Bot « Rédacteur » : brouillons FR/EN, SEO du site vitrine, veille concurrentielle en lecture. Mesure : temps gagné, erreurs, ton (skill `voix-kalendrath`).

**Palier 2 : routines de lecture.** Veille quotidienne (mentions, Reddit, concurrents), résumé hebdomadaire envoyé **à Gregory seulement**. Routines à événement e-mail ou Slack **limitées à un canal et à une phrase étroits** (consommation). Aucun envoi vers l'extérieur.

**Palier 3 : brouillons d'e-mails et partenariats.** Boîte de travail dédiée ; le Bot prépare des réponses (elles restent en brouillon pour les routines : vérifié) ; Gregory clique « Send ». Tableau de partenaires dans Sheets.

**Palier 4 : compta d'appui.** Classement de justificatifs en lecture seule ; **un expert-comptable ou l'accompagnement de l'auto-entreprise valide**.

**Palier 5 (après la bêta, après avis juridique) : support joueurs.** FAQ à partir de documents fermés ; données minimales ; mention dans la politique de confidentialité et le registre RGPD ; transfert hors UE encadré. **Modération : reste humaine** ; l'IA ne sert qu'à résumer des signalements déjà collectés.

**Critères d'arrêt :** une action non demandée, un envoi non validé, une divulgation, un dépassement de quota imprévu, une absence de réponse du support xAI sur le DPA.

---

## 8. Décisions à trancher

1. Acheter un mois d'essai (palier 1) ou utiliser l'essai gratuit s'il est proposé ?
2. Demander à xAI/Cursor le **DPA, la liste des sous-traitants et la position RGPD** avant toute donnée de joueur ; en attendant, aucune donnée de joueur.
3. Lire les **conditions d'utilisation et la politique de confidentialité** (non lues ici) avant l'abonnement.
4. Confirmer « brouillon seulement pour tout ce qui sort » ; compta et droit **jamais** délégués.
5. Quel compte de service et quelle adresse e-mail dédiée ?
6. Modération : maintenir la décision humaine et l'outil maison de l'ancienne étude, ou différer toute IA.

---

## 9. Ce que l'ancienne étude avait raté ou erroné

- **Mauvais produit.** Elle affirmait qu'aucun produit « Grok Bots » n'existait et ne regardait que l'API (modèle + bot maison). **Faux** : Grok Bot est un produit d'agents persistants, sur abonnement, avec ordinateur cloud, routines, e-mail, navigateur.
- **Mauvais modèle de coût** : tarifs par jeton au lieu d'un abonnement à pool hebdomadaire.
- **Risques non vus** : ordinateur et sessions partagés entre Bots, identité empruntée, actions autonomes par défaut, publication non protégée, carte du Vault sans approbation, absence de RGPD documenté, hébergement US, expiration des approbations de routine, injection par e-mail entrant.
- **Périmètre trop étroit** : modération et Discord seulement ; ni SEO, ni compta, ni partenariats, ni support.
- **Conservé parce que toujours vrai :** l'IA propose, l'humain décide en modération (art. 22 RGPD, DSA) ; ne pas automatiser X ni Reddit (règles de plateformes) ; transparence sur l'IA ; données personnelles et DPA à clarifier ; injection de prompt ; secrets hors du modèle ; interrupteur d'arrêt ; le bot maison avec séparation des pouvoirs pour la modération ; le plan d'essai comparatif (utile si l'on veut aussi comparer Claude).
- **Sa remarque sur la raison sociale « SpaceXSI »** se confirme : c'est le nom des modèles dans ces pages. **L'API et ses tarifs par jeton (grok-4.3, etc.) restent exacts** mais ne concernent pas ce produit.

---

## Sources (consultées le 2026-10-30)

Officielles lues : [docs.x.ai/grok-bot](https://docs.x.ai/grok-bot), [security](https://docs.x.ai/grok-bot/security), [security-faq](https://docs.x.ai/grok-bot/security-faq), [approvals-security-and-privacy](https://docs.x.ai/grok-bot/approvals-security-and-privacy), [computer-and-apps](https://docs.x.ai/grok-bot/computer-and-apps), [skills-routines-and-automations](https://docs.x.ai/grok-bot/skills-routines-and-automations), [tag-on-x](https://docs.x.ai/grok-bot/tag-on-x), [teams-and-enterprises](https://docs.x.ai/grok-bot/teams-and-enterprises), [bots](https://docs.x.ai/grok-bot/bots), [faq](https://docs.x.ai/grok-bot/faq), [settings-and-notifications](https://docs.x.ai/grok-bot/settings-and-notifications), [x-subscription/grok-bot](https://docs.x.ai/x-subscription/grok-bot), [Cursor, plans](https://cursor.com/help/grok-bot/plans), [Cursor, confidentialité](https://cursor.com/docs/enterprise/privacy-and-data-governance).
Non lues (403) : x.ai/bot, x.ai/news, x.ai/changelog/bot, conditions et confidentialité xAI. 
Tiers : [MindStudio, prix](https://www.mindstudio.ai/blog/grokbot-pricing-access-course), [Composio, Discord](https://composio.dev/toolkits/discord/framework/grok-bot), recherches de prix (agrégateurs).
