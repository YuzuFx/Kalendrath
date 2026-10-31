# Politique cookies

*Brouillon du 2026-10-30, à faire relire par un avocat avant publication (voir [README](README.md)). Publication prévue : `kalendrath.com/fr/cookies/`, lien dans le pied de page de la vitrine, du lobby et des serveurs. Version anglaise : [03-politique-cookies-en.md](03-politique-cookies-en.md).*

*Dernière mise à jour : [À COMPLÉTER : date de publication]*

## 1. Le principe

Un cookie, ou plus largement un traceur, est une information enregistrée dans votre navigateur ou lue depuis celui-ci (fichier cookie, stockage local, empreinte, pixel). L'article 82 de la loi n° 78-17 du 6 janvier 1978 (loi Informatique et Libertés), qui transpose l'article 5.3 de la directive 2002/58/CE (« vie privée et communications électroniques »), impose de recueillir votre consentement avant tout dépôt ou toute lecture de traceur, **sauf** si ce traceur a pour finalité exclusive de permettre la communication par voie électronique, ou s'il est strictement nécessaire à la fourniture d'un service que vous demandez expressément.

**Kalendrath n'utilise que des traceurs exemptés de consentement.** Aucun traceur publicitaire, aucun réseau social intégré qui vous suive, aucun outil de mesure d'audience qui dépose un cookie. C'est pourquoi aucun bandeau de consentement ne s'affiche. Si nous ajoutions un jour un traceur soumis à consentement, nous vous le demanderions par un bandeau permettant d'accepter ou de refuser aussi simplement, et cette politique serait mise à jour avant.

## 2. Traceurs utilisés

### 2.1 Site vitrine (`kalendrath.com`)

| Nom | Type | Émetteur | Finalité | Durée | Consentement |
|---|---|---|---|---|---|
| `lang` | Stockage local | Kalendrath | Mémoriser la langue que vous avez choisie (français ou anglais) | Jusqu'à effacement par vous | Non requis : nécessaire au service demandé (choix de langue) |
| `__cf_bm` | Cookie | Cloudflare | Distinguer les humains des robots malveillants, protéger le site | 30 minutes | Non requis : sécurité du service |
| Cookies du contrôle anti-robot (Cloudflare Turnstile), sur les pages du formulaire uniquement | Cookie ou stockage technique | Cloudflare | Vérifier qu'un formulaire est envoyé par un humain, sans suivi publicitaire | Durée de la vérification | Non requis : sécurité du formulaire que vous envoyez |

**Mesure d'audience.** Le site utilise Cloudflare Web Analytics, qui **ne dépose et ne lit aucun cookie** et ne produit que des statistiques agrégées, pour notre seul compte, sans suivi d'une personne d'un site à l'autre. Il répond aux conditions d'exemption de la CNIL pour les outils de mesure d'audience : finalité strictement limitée à la mesure de fréquentation, données statistiques anonymes, aucun recoupement avec d'autres traitements, conservation de 25 mois au plus.

### 2.2 Lobby et serveurs de jeu (`lobby.kalendrath.com`, `sN.kalendrath.com`)

| Nom | Type | Émetteur | Finalité | Durée | Consentement |
|---|---|---|---|---|---|
| `kalendrath_session` | Cookie | Kalendrath | Vous garder connecté pendant votre session de jeu | 12 heures, renouvelées à chaque activité | Non requis : authentification |
| `XSRF-TOKEN` | Cookie | Kalendrath | Protéger vos actions contre la falsification de requête intersite | Durée de la session | Non requis : sécurité |
| `remember_web_…` | Cookie | Kalendrath | Vous garder connecté d'une visite à l'autre, **seulement si vous cochez « Rester connecté »** | 13 mois au plus | Non requis : service expressément demandé |
| Préférences d'interface (langue, thème, filtres, tri, volets ouverts) | Stockage local | Kalendrath | Mémoriser vos réglages d'affichage | Jusqu'à effacement par vous | Non requis : personnalisation de l'interface demandée par vous |
| `__cf_bm` | Cookie | Cloudflare | Protection contre les robots malveillants | 30 minutes | Non requis : sécurité |

### 2.3 Page de paiement

Lors d'un achat, la page ou la fenêtre de paiement est fournie par notre prestataire de paiement, Stripe (Stripe Payments Europe, Limited) *[Màj 31/10]*. Il dépose des traceurs strictement nécessaires à la réalisation du paiement et à la prévention de la fraude, sous sa propre responsabilité ; ils sont décrits dans sa politique : https://stripe.com/fr/legal/cookies-policy [À VÉRIFIER : lien à jour au moment de la publication].

### 2.4 Contenus de plateformes tierces

Nous n'intégrons pas de vidéo YouTube, de publication X ou de widget Discord qui se charge automatiquement. Lorsqu'une vidéo ou un contenu tiers est proposé, il s'affiche d'abord sous forme d'image fixe : la plateforme ne reçoit rien tant que vous ne cliquez pas pour le lancer. En cliquant, vous acceptez les traceurs de cette plateforme, régis par sa propre politique. Les liens simples vers Discord, Reddit, X, YouTube ou Patreon ne déposent aucun traceur sur nos pages.

## 3. Ce que vous pouvez faire

- Effacer le stockage local et les cookies depuis les réglages de votre navigateur. Les traceurs du tableau sont indispensables : les bloquer peut vous empêcher de vous connecter ou de jouer.
- Ne pas cocher « Rester connecté » : seul le cookie de session sera utilisé.
- Configurer votre navigateur pour refuser les cookies de tiers : cela n'affecte pas le jeu.

Aides des principaux navigateurs : Firefox (support.mozilla.org), Chrome (support.google.com/chrome), Safari (support.apple.com), Edge (support.microsoft.com).

## 4. Contact

Pour toute question : privacy@kalendrath.com. Voir aussi la [politique de confidentialité](02-politique-de-confidentialite.md).
