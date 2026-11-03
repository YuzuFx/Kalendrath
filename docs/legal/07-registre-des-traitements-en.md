# Record of processing activities (simplified)

*Internal document, not published. Kept under Article 30(1) GDPR: the exemption for organisations with fewer than 250 employees (Article 30(5)) does not apply, because Kalendrath's processing is regular rather than occasional. To be made available to the CNIL on request. Draft of 2026-10-30, to be completed for every new processing operation or provider, and reviewed at least once a year. French version (reference): [07-registre-des-traitements.md](07-registre-des-traitements.md). Reference model: the CNIL's simplified record template.*

## 0. Controller

| | |
|---|---|
| Controller | [À COMPLÉTER : prénom et nom] EI, sole trader trading as "Kalendrath" *[Revue: IM-12]* |
| Address | [À COMPLÉTER : adresse] |
| SIREN | [À COMPLÉTER : SIREN] |
| Data protection contact | privacy@kalendrath.com |
| Data protection officer | None (not mandatory, Article 37 GDPR) |
| Non-EU representative | Not applicable (controller established in France) |
| Record created on | [À COMPLÉTER : date] |
| Last review | [À COMPLÉTER : date] |

## 1. Processing sheets

For each operation: purpose, legal basis (Article 6), data subjects, data categories, recipients, transfers outside the EU, retention, security measures (see section 3).

### T1. Mailing list and beta pre-registration

| | |
|---|---|
| Status | **Planned, not live**: no list and no email-sending provider as of 31/10/2026 *[Màj 31/10]* |
| Purposes | Sending project news; beta pre-registration and granting of pre-registration bonuses |
| Legal basis | Consent (6(1)(a)); Article L34-5 of the French Postal and Electronic Communications Code; Article 8 GDPR (age) |
| Data subjects | Visitors aged 16 or over who sign up on the showcase site |
| Data | Email address, language, sign-up source, "16 or older" confirmation, proof of consent (date, double opt-in). No individual open or click statistics without separate consent *[Màj 31/10: BL-4, MIN-3]* |
| Recipients | Publisher; [À COMPLÉTER : prestataire d'envoi (sous-traitant), à choisir] |
| Transfers outside the EU | [À COMPLÉTER : selon le prestataire ; à vérifier avec ses sous-traitants ultérieurs avant tout choix] |
| Retention | Until withdrawal; re-confirmation then deletion after 3 years without interaction; proof of consent 5 years after withdrawal |
| Collection point | Showcase form: unticked consent box, unticked "I am 16 or older" box, double opt-in, information notice, link to the policy |
| Requirements for choosing the provider | Article 28 contract; data in the EU preferably; open and click tracking that can be switched off (off by default); native double opt-in; one-click unsubscribe link; export and deletion of contacts *[Màj 31/10]* |

### T2. Account management and game operation

| | |
|---|---|
| Purposes | Creating and managing the lobby account, single sign-on to servers, running the game, rankings, service emails |
| Legal basis | Contract (6(1)(b)) |
| Data subjects | Players |
| Data | Email address, username, hashed password, language, declared age, sign-up and sign-in dates, servers; game data per server (city, heroes, progress, alliance, rankings, messages) |
| Recipients | Publisher; moderators (limited access); OVH SAS, VPS host (processor); Cloudflare (traffic routing, processor); [À COMPLÉTER : prestataire des courriels de service] (processor); other players for public elements; other players' extensions for public data only, through the read-only API *[Màj 31/10]* |
| Transfers outside the EU | None for hosting if the chosen OVH data centre is in the EU [À COMPLÉTER : localisation]; Cloudflare, Inc. (United States) |
| Retention | Life of the account; 3 years of inactivity (5 years if purchased Kaelite), 60 days' notice then deletion or anonymisation; data of a closed server deleted within 6 months, historical rankings reduced to the username ("Deleted player" after account deletion); after account closure, email address, username and payment data kept in restricted archive for 1 year (hosting providers' obligation) *[Revue: IM-11, points 3, 5, 6 and 7; MI-6]* |

### T3. Age verification and protection of minors

| | |
|---|---|
| Purposes | Minimum age, parental consent under 15, spending cap for minors |
| Legal basis | Contract (6(1)(b), applying the age conditions of the Terms of Use) and legitimate interest (6(1)(f)); legal obligation for the consent-based mailing list (Article 8 GDPR, Article 45 of the French Data Protection Act) *[Revue: MIN-2]* |
| Data subjects | Minor players; holders of parental responsibility |
| Data | Declared age, parent's email address, proof of consent, cap and spending |
| Recipients | Publisher |
| Retention | Life of the account; proof of consent 5 years after closure |

### T4. Technical logs, security and anti-cheat

| | |
|---|---|
| Purposes | Security, detecting and investigating cheating, responding to lawful requests, retaining data identifying authors of content |
| Legal basis | Legitimate interest (6(1)(f)); legal obligation (Article 6 (V, A) of Law No. 2004-575, LCEN; Decree No. 2021-1362) |
| Data subjects | Players, lobby visitors, API users |
| Data | IP, timestamps, user agent and headers sent by the browser (no fingerprint computed in the browser), session identifier, game actions, API calls, detection signals (profiling within the meaning of Article 4(4)); keyword filtering of public and alliance messages |
| Recipients | Publisher; moderators for signals relevant to an investigation; authorities upon lawful request |
| Retention | Rolling 12 months |
| Automated decision | Not within the meaning of Article 22: alerts and temporary technical restrictions only; any sanction beyond N1, any precautionary freeze, any account refusal or closure and any purchase block decided by a human |
| Impact assessment | Required (profiling that may lead to exclusion from the service, CNIL list, deliberation 2018-327; presence of minors; anti-evasion list). Simple DPIA to be written before the closed alpha, together with the legitimate-interest balancing test (D19) *[Revue: BL-3, IM-6, IM-7, MI-2]* |

### T5. Moderation, reports, sanctions and appeals

| | |
|---|---|
| Purposes | Handling reports (DSA Article 16), reasoned sanctions (Article 17), appeals, preventing evasion |
| Legal basis | Legal obligation; contract; legitimate interest |
| Data subjects | Reported players, reporters, Discord members |
| Data | Reported content and context, reporter identity, facts, evidence, sanction, reasons, appeal |
| Recipients | Publisher; moderators; authorities (DSA Article 18, lawful requests) |
| Data relating to offences | Limited to the case file, kept for establishing, exercising or defending legal claims; no general list of fraudsters (Article 10 GDPR, Article 46 of the French Data Protection Act; to be validated by a lawyer) |
| Retention | File: 3 years after the sanction ends, or after the final decision for a ban; permanent ban: hashed email and payment-method fingerprint 3 years, renewable once after a reasoned review; reports not acted upon: 6 months *[Revue: IM-5, IM-11 point 8, IM-18]* |
| Internal investigation reports | The file for each N3+ case includes an investigation report (facts, evidence frozen with a digital fingerprint, analysis, decision), used for the reasoned notice, the appeal and, where applicable, the public report (T5a) *[Màj 31/10]* |

### T5a. Public investigation reports *[Màj 31/10]*

*Gregory's decision of 2026-10-31, aligned with section 2.5 of [comportements-bannissables.md](../comportements-bannissables.md) (v2). To be approved by the lawyer before the first report is published (see the README).*

| | |
|---|---|
| Purposes | Transparency of moderation; justifying sanctions; deterring cheating; informing affected players |
| Legal basis | Legitimate interest (6(1)(f)). Written balancing test to be documented in the DPIA (T4): why the anonymised report and statistics are not enough in the cases published under a username |
| Data subjects | Sanctioned players (anonymised report: all levels; named report: N4 or N5 only, established certainty, codes B1, B2, B3, B5, B6, B8, B12, B14, B15, B4 for resellers) |
| Exclusions | Never named: minors; B9, B10, B11, B13 (facts that may constitute criminal offences, Article 10 GDPR, Article 46 of the French Data Protection Act); pending criminal or court proceedings; facts prior to the Terms of Use clause |
| Data published | Case identifier, Server, in-game username (named only), rule, period and neutral facts, sanction, measures for affected players. Never: real name, email, IP, payment, private messages, reporters, victims, non-sanctioned third parties, detection method, criminal characterisation |
| Timing | After the final decision (appeal decided or 14-day period expired); draft text given to the player in the notice |
| Recipients | Named: signed-in players, "Sanctions register" page of the lobby and the Game, not indexed. Anonymised: public, Discord, release notes |
| Transfers outside the EU | None for named reports (lobby and Game hosted by OVH); anonymised reports on Discord (United States), outside the GDPR if truly anonymous |
| Retention | Named: end of the Server's chapter, 6 months at most, then automatic anonymisation or removal; removed during a complaint or legal action, deleted if the sanction is cancelled or reduced below N4. Anonymised: Server history. Internal archive under T5 |
| Rights | Objection (Article 21) during the appeal period, accepted by default (anonymised publication) unless a compelling reason is recorded in the file; rectification, erasure; right of reply |

### T6. Kaelite sales, payments and accounting

| | |
|---|---|
| Purposes | Performing sales, crediting Kaelite, withdrawal and refunds, minors' cap, fraud prevention, accounting and tax |
| Legal basis | Contract; legal obligation; legitimate interest (fraud) |
| Data subjects | Buyers |
| Seller | The Publisher is the legal seller of Kaelite; Stripe is only the payment provider (Stripe Managed Payments excluded: its terms prohibit selling virtual currency, see the [Stripe study](../etude-stripe.md)) *[Màj 31/10]* |
| Data | Account identifier, offer, amount, country and location evidence for VAT (declared country, billing address or card country, IP at purchase), date, transaction identifier, status, withdrawal waiver, invoices; no full card data (card type, last four digits, country and fingerprint provided by Stripe) |
| Recipients | Publisher; Stripe Payments Europe, Limited (payments, Stripe Tax, Radar; separate controller for its own purposes, processor for the rest [À VÉRIFIER : accord de traitement des données de Stripe]); accountant; tax authorities *[Màj 31/10]* |
| Automated decision | Automatic refusal of a payment by Stripe Radar, under Stripe's responsibility; no game account block without human review (T4) *[Màj 31/10]* |
| Transfers outside the EU | Stripe, Inc. (United States) for part of Stripe's processing: EU-US Data Privacy Framework and standard contractual clauses [À VÉRIFIER dans le contrat Stripe] |
| Retention | Accounting records 10 years (Article L123-22 of the French Commercial Code); transaction evidence 5 years; anti-fraud data 13 months |

### T7. Patreon supporters

| | |
|---|---|
| Purposes | Delivering benefits, corresponding with supporters |
| Legal basis | Contract |
| Data subjects | Patreon supporters |
| Data | Patreon name or username, email address, tier, status |
| Recipients | Publisher. Patreon, Inc. is a separate controller for its service |
| Transfers outside the EU | Data received from Patreon (United States); no onward transfer |
| Retention | Duration of support then 3 years; credits until removal is requested |

### T8. Discord community

| | |
|---|---|
| Purposes | Community management, moderation, roles, tests, announcements, account linking on request |
| Legal basis | Legitimate interest; contract for account linking |
| Data subjects | Discord server members |
| Data | Discord identifier and username, roles, messages, reports, moderation log, link to game account |
| Recipients | Publisher, moderators. Discord is a separate controller for its platform |
| Transfers outside the EU | Discord platform (United States), under Discord's responsibility |
| Retention | Moderation log 12 months; account link until removed |
| Open point | Possible joint controllership with Discord for server statistics (CJEU case law, C-210/16, *Wirtschaftsakademie*): see the [README](README.md) |

### T9. Support, contact and data subject requests

| | |
|---|---|
| Purposes | Answering support, press, partnership, appeal and data subject requests |
| Legal basis | Legitimate interest; legal obligation (rights) |
| Data subjects | Anyone who writes to us |
| Data | Email address, stated identity, messages, attachments, account identifier |
| Recipients | Publisher; OVH (mail, processor) |
| Retention | 3 years after the last exchange; data subject requests 5 years; request log: see the [procedure](08-procedure-droits-et-violations-en.md) |

### T10. Showcase site audience measurement

| | |
|---|---|
| Purposes | Aggregated traffic statistics |
| Legal basis | Legitimate interest; consent exemption (Article 82 of the French Data Protection Act, CNIL guidelines) |
| Data subjects | Showcase site visitors |
| Data | Aggregated technical visit data, no cookie or identifier |
| Recipients | Publisher; Cloudflare (processor) |
| Transfers outside the EU | Cloudflare, Inc. (United States): EU-US Data Privacy Framework (Decision (EU) 2023/1795) and standard contractual clauses |
| Retention | Aggregated statistics no more than 25 months |

### T11. API and extension keys

| | |
|---|---|
| Purposes | Running the API, rate limits, abuse detection, revocation |
| Legal basis | Contract; legitimate interest |
| Data subjects | Players who create keys, extension developers; all players, whose public data can be read through the API *[Revue: IM-11, point 3]* |
| Data | Hashed key, permissions, creation date, call log |
| Recipients | Publisher |
| Retention | Key until revoked; logs 12 months |

### T12. Referral *[Revue: MI-17]*

| | |
|---|---|
| Status | **Planned, not live**: mechanic under study ([referral study](../etude-parrainage.md), in French), nothing coded as of 2026-11-03. Sheet created in advance to close gap MI-17; to be confirmed or adjusted when coded *[Update 03/11]* |
| Purposes | Grant an earned Kaelite reward to the sponsor and the referred player when the referred player reaches progression milestones; detect abuse (self-referral, linked accounts) |
| Legal basis | Reward: performance of the contract (6.1.b), referral being a service feature described in the Terms of Service; fraud prevention: legitimate interest (6.1.f), with a balancing test to be written in the DPIA for T4 (D19) |
| Data subjects | Sponsoring players; referred players (registered through a referral link or code). **No data about unregistered third parties**: no friend email address entered, no contact import, no invitation message sent by Kalendrath |
| Data | Referral code (random identifier per account); sponsor-referred link (two account identifiers, link date); milestones reached (milestone, date, server); rewards granted or pending. For abuse detection: only the signals already collected under T4 (IP, timestamps, user agent), **no new collection and no device fingerprint** |
| What the sponsor sees | The referred player's in-game nickname and the milestone reached, never the email address, IP or declared age; the referred player may hide their nickname ("An invited player") |
| Recipients | Publisher; moderators, for blocked payouts only (access limited to the case file); the sponsor and the referred player, for the items above. No new processor |
| Transfers outside the EU | Those of T2 and T4 (OVH hosting; Cloudflare, United States), none specific to referral |
| Retention | Link and milestones: until the referral closes (180 to 365 days, depending on the milestone window), then 12 months to defend against a reward dispute, then deletion or anonymisation. Blocked-payout file: T5 regime (limited to the case). **Proposed durations, to be settled with the lawyer** |
| Automated decision | No within the meaning of Article 22: a cross-check of signals **suspends** a payout and triggers human review; no sanction, final refusal or account closure without a human decision. Profiling within the meaning of Article 4.4: to be covered in the T4 DPIA |
| Minors | Referral not promoted at sign-up, no message urging players to recruit classmates; per-server reward caps; the Terms of Service age rule applies to both sides of the link |
| Rights | Access and portability: the account's link and milestones. Erasure of the referred player's account: the named link is deleted, the reward already granted to the sponsor stays acquired. Objection to legitimate interest: examined case by case, with no effect on the review of payouts in progress. Both sides of the link are handled in [procedure 08](08-procedure-droits-et-violations-en.md) |
| Collection point | Sign-up through a link or code: information sentence to the referred player (Articles 13 and 14 GDPR) and link to the privacy policy |
| DPIA | Covered by the T4 one if extended to blocked payouts; to be confirmed |

## 2. Processors (Article 28 GDPR)

| Processor | Operations | Location | Safeguards | Data processing agreement signed |
|---|---|---|---|---|
| OVH SAS | T2 to T6, T11 (VPS); T9 (mail); domain names *[Màj 31/10]* | [À COMPLÉTER : centre de données choisi, dans l'UE] | OVHcloud contract and its data processing agreement | [À COMPLÉTER : date] |
| Cloudflare, Inc. | Showcase site, DNS, protection, T2, T4, T10, T11, anti-bot check *[Revue: IM-11, point 6]* | United States and global network | EU-US Data Privacy Framework, standard contractual clauses | [À COMPLÉTER : date] |
| [À COMPLÉTER : prestataire d'envoi des courriels, non choisi] | T1, service emails *[Màj 31/10: Brevo is neither chosen nor in place]* | [À COMPLÉTER] | [À COMPLÉTER] | [À COMPLÉTER : date] |
| Stripe Payments Europe, Limited | T6, to the extent Stripe acts as processor *[Màj 31/10]* | Ireland; Stripe, Inc. (United States) | Stripe data processing agreement, EU-US Data Privacy Framework, standard contractual clauses [À VÉRIFIER] | [À COMPLÉTER : date d'activation du compte] |

Separate controllers (no processing agreement): Patreon, Inc. (T7), Discord (T8), Stripe for its own purposes (T6).

**Internal rule on artificial intelligence tools.** Players' personal data (production databases, logs, support emails, sanction files) is not passed to any generative AI tool, including the development assistant. Testing and development use fictitious or anonymised data. Any exception would require adding the provider to this table and updating the privacy policy. AI-assisted moderation (decision D18 of the bannable behaviours, Grok bots study) would first require a declared processor, an Article 28 contract and an update of the privacy policy, which currently states the opposite (section 3). *[Revue: MI-17]*

## 3. Security measures (Article 32 GDPR)

- Encrypted connections (HTTPS everywhere, HSTS).
- Hashed passwords (Laravel algorithm: bcrypt or Argon2id), hashed API keys, secrets kept out of the Git repository.
- Two-factor authentication on all administrative accounts (OVH, Cloudflare, email provider, Stripe, Patreon, Discord, GitHub, game admin panel).
- Limited moderator permissions: no access to payments, no N3 to N5 alone.
- Encrypted daily backups, including an off-server copy, tested by a restore at least quarterly.
- Security updates for the system, PHP and dependencies; tracking of upstream OGameX fixes.
- Logging of administrative access; sign-in attempt limits.
- Pseudonymisation of data used for internal statistics.
- Data breach procedure: [08-procedure-droits-et-violations-en.md](08-procedure-droits-et-violations-en.md).

## 4. Record change history

| Date | Change | Author |
|---|---|---|
| 2026-10-30 | Draft created | Claude Code, to be validated by the Publisher |
| 2026-10-30 | Uncontroversial corrections from the legal and accounting reviews carried over (T2 to T5, T11, processors, AI rule) | Claude Code, general review |
| 2026-10-31 | Gregory's decisions: OVH (hosting, domains), standard Stripe (T6), T1 planned but not live (Brevo removed, requirements added), T5a public investigation reports | Claude Code, to be validated by the Publisher |
| 2026-11-03 | Sheet T12 (referral, MI-17), planned and not live | Claude Code, to be validated by the Publisher |
