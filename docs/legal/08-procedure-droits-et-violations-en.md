# Procedure for data subject rights and personal data breaches

*Internal document, not published. Draft of 2026-10-30, to be reviewed by a lawyer (see [README](README.md)). It describes what the Publisher does when a person exercises their rights (Articles 12 to 22 GDPR) and when a data breach occurs (Articles 33 and 34). French version (reference): [08-procedure-droits-et-violations.md](08-procedure-droits-et-violations.md).*

---

# Part A. Data subject rights

## A1. Channels

- privacy@kalendrath.com (main channel);
- post to the Publisher's address;
- account settings in the lobby: "Download my data" and "Delete my account" (automatic, no manual step);
- any request received through another channel (contact@, Discord, appel@) is **forwarded the same day** to privacy@ and handled under this procedure: the person does not have to use a specific channel.

## A2. Deadlines

| Step | Deadline | Basis |
|---|---|---|
| Acknowledgement | 3 working days | Good practice |
| Reply | **1 month** from receipt | Article 12(3) GDPR |
| Extension | **+ 2 months** for complex or numerous requests, informing the person **within the first month**, with reasons | Article 12(3) |
| Refusal or no action | Within the month, with reasons and mention of the right to complain to the CNIL and to seek a judicial remedy | Article 12(4) |

The deadline is suspended while information needed to verify identity is obtained.

## A3. Identity verification

1. Request sent **from the address linked to the account**: identity presumed, no document required.
2. Request from another address: send a confirmation code to the account address, or ask the person to sign in to the lobby and use the settings.
3. **Never** require a copy of an ID document by default. Only in case of serious and persistent doubt, and then delete it once verified.
4. Request from a parent for a minor: verify the link through the parental address recorded at consent, or through an exchange with the account.
5. Request from a representative: signed mandate and proof of the principal's identity.

## A4. Where the data lives

| System | Data | Access |
|---|---|---|
| Lobby database | Account, age, purchased Kaelite, purchases, API keys, Discord and Patreon links | Admin panel, SQL queries |
| Each server database (`sN`) | Character, city, heroes, messages, earned Kaelite, game logs | Admin panel of each server |
| Server logs | IP, connections, API calls | Log files, rolling 12 months |
| [À COMPLÉTER : prestataire d'envoi des courriels, non choisi] | Mailing list, pre-registration (not live as of 31/10) *[Màj 31/10]* | Provider interface |
| Stripe | Transactions, tax location evidence | Stripe dashboard; Stripe remains responsible for its own processing *[Màj 31/10]* |
| Public investigation reports | Username, summarised facts, sanction | "Sanctions register" page of the lobby and the Game (named); Discord and release notes (anonymised): anonymisation upon objection, rectification, removal after 6 months at most *[Màj 31/10]* |
| OVH (mail) | Emails exchanged | Webmail |
| Discord | Roles, messages on our server, moderation log | Discord moderation tools; Discord remains responsible for the rest |
| Patreon | Support data | Patreon dashboard; Patreon remains responsible for the rest |
| Backups | Copies of the databases | Deleted when the backup rotation cycle expires |

## A5. Handling by right

**Access (Article 15).** Provide: confirmation of processing; a copy of the data (readable JSON export from the lobby and each server, Kaelite history, purchases, connection logs for the last 12 months, sanction file without revealing detection methods or third-party data); purposes, categories, recipients, retention, rights, source of the data, absence of automated decisions within the meaning of Article 22. Free of charge; a reasonable fee may apply to additional copies. Remove third-party data (identity of a reporter, other players' messages outside conversations with the person).

**Rectification (Article 16).** Correct the address, age, language. The username is changed through the game feature (naming rules in the terms of use). Game data (progress, ranking) is not "rectified": it reflects the game.

**Erasure (Article 17).** Delete the account and the data on all servers, the mailing list entry (with the email provider), the Discord and Patreon links. **Keep**: accounting records (10 years), identification data under the LCEN (12 months, including email address, username and payment data for one year after account closure), anti-evasion elements for a permanent ban (3 years, renewable once after a reasoned review) *[Revue: IM-11 point 5, IM-18]*, proof of consent and exchanges needed to defend legal claims. Tell the person what is kept and why. Replace the username with "Deleted player" in visible messages and rankings. Warn that Kaelite is lost and offer beforehand a refund of unspent purchased Kaelite in the cases provided by the terms of sale.

**Restriction (Article 18).** Flag the account as "restricted": data is kept but not used, except for storage or the defence of legal claims.

**Portability (Article 20).** Structured JSON export of the data provided by the person and generated by their activity (account, character, heroes, messages sent), based on contract or consent.

**Objection (Article 21).** For processing based on legitimate interest: examine the particular situation invoked. For security and anti-cheat, the Publisher may demonstrate compelling legitimate grounds; reply with reasons. For direct marketing: objection always granted, no reason needed.

**Withdrawal of consent (Article 7(3)).** Immediate unsubscription from the mailing list.

**Post-mortem instructions (Article 85 of the French Data Protection Act).** Record the specific instruction received; at the request of an heir providing proof of death, apply the instruction or, failing that, close the account.

## A6. Request log

Keep a table (file outside the Git repository, encrypted): no., date received, channel, right exercised, identity check, reply date, outcome, any extension and reason. Retention: 5 years.

## A7. Reply templates

See the French version, section A7, which contains both the French and English templates.

---

# Part B. Personal data breaches

A personal data breach is a breach of security leading to the accidental or unlawful destruction, loss, alteration, unauthorised disclosure of, or access to, personal data (Article 4(12) GDPR). Examples: exposed database, lost backup, compromised admin account, email with data sent to the wrong recipient, leak at a processor, ransomware.

## B1. Timeline

| Time since becoming aware | Action |
|---|---|
| Immediately | **Contain**: cut off the compromised access, revoke keys and tokens, change admin passwords, isolate the server, preserve evidence (logs, copies) without altering it |
| Within 24 h | **Assess** (B2); record in the breach log (B5); notify the processor concerned or, if the breach originates with it, demand its report |
| Within **72 h** | **Notify the CNIL** if the breach is likely to result in a risk to the rights and freedoms of individuals (Article 33(1)). If not all information is known, notify anyway and complete later (Article 33(4)). A notification after 72 hours must give reasons for the delay |
| Without undue delay | **Inform the individuals** if the risk is high (Article 34) |
| In the following days | Fix the cause, verify, reset what needs resetting, complete the notification, file a complaint if the origin is malicious |
| Within 1 month | Written lessons learned, update of the record of processing and security measures |

**Processors.** Each contract must require the processor to notify the Publisher without undue delay after becoming aware of a breach (Article 33(2)).

## B2. Risk assessment

Questions: which data (address, hashed password, IP, private messages, payment data, minors' data); how many people; is the data robustly encrypted or hashed; can a third party exploit it; possible consequences (phishing, account takeover, reputational harm, financial loss).

| Level | Examples | CNIL | Individuals |
|---|---|---|---|
| Risk unlikely | Encrypted backup lost with uncompromised key; internal error without third-party access | No notification, recorded in the log | No |
| Risk | Leak of email addresses and usernames; unauthorised access to IP logs | **Notify within 72 h** | No, unless chosen for transparency |
| High risk | Leak of weakly protected passwords, private messages, minors' data, payment information, data enabling identity theft | **Notify within 72 h** | **Yes, without undue delay** |

Informing individuals is not required if the data was rendered unintelligible (encryption), if subsequent measures removed the high risk, or if it would involve disproportionate effort (a public communication then replaces it) (Article 34(3)).

## B3. Content of the CNIL notification

Through the CNIL's online notification service (www.cnil.fr, "Notifier une violation de données personnelles"). Content required by Article 33(3):

1. nature of the breach, categories and approximate number of individuals concerned, categories and approximate number of records;
2. name and contact details of the contact point (privacy@kalendrath.com);
3. likely consequences;
4. measures taken or proposed to address the breach and mitigate its effects.

## B4. Message to the individuals concerned (Article 34)

Sent by email and shown in the lobby, in French and English, in plain language: nature of the breach; contact; likely consequences; measures taken; what the person can do. Templates in French and English: see the French version, section B4.

## B5. Breach log (Article 33(5))

Every breach is recorded, **even if not notified**: date and time of discovery, date of the breach, description, data and individuals concerned, risk assessment and justification, measures taken, CNIL notification (date, number) or reason for not notifying, information of individuals or reason, lessons learned. Retention: 5 years.

## B6. Useful contacts

- CNIL breach notification service: www.cnil.fr.
- Assistance for victims of cyber-attacks: www.cybermalveillance.gouv.fr.
- Complaint for unauthorised access to a system (Articles 323-1 et seq. of the French Criminal Code): police, gendarmerie or online complaint.
- Stripe (fraud, cards): [À COMPLÉTER : contact sécurité de Stripe].
- OVH (hosting): [À COMPLÉTER : contact d'urgence OVHcloud].
- Cloudflare, OVH, email-sending provider: support from each customer area.

## B7. Preparation (before the alpha)

- List and store offline the emergency accesses (2FA recovery codes).
- Test a backup restore.
- Check that every processing agreement contains the notification clause.
- Load the B4 templates into the email system.
- Run a 30-minute tabletop exercise (scenario: lobby database exposed) before the beta.
