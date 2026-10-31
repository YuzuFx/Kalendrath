# Extension and API terms for players

*Draft of 2026-10-30, to be reviewed by a lawyer before the API opens to extensions, which itself depends on a security audit (see [README](README.md)). Sources: [marketing plan, section 9](../plan-marketing.md), [bannable behaviours](../comportements-bannissables.md) (B1, B12, D9). To be published at `kalendrath.com/en/api/`, accepted when creating the first extension key. French version: [09-conditions-extensions-api.md](09-conditions-extensions-api.md). The French version prevails in case of discrepancy.*

*Version [À COMPLÉTER : numéro], effective [À COMPLÉTER : date]*

## 1. Why an open API

Kalendrath welcomes tools written by players: simulators, calculators, maps, alliance dashboards, reminders. Good ideas are meant to make their way into the game. In return, the API is **closed by default** and **never allows acting on a player's behalf**. These terms supplement the [terms of use](04-cgu-en.md) ("Terms of Use"), in particular their Articles 7.1 and 11.

## 2. Definitions

- **API**: the Game's programming interface open to extensions, under `/api/v1`, limited to the routes published in its documentation.
- **Extension Key**: a token you create in the lobby settings, separate from your session, attached to your account, with limited permissions (scopes).
- **Extension**: any program, script, page, Discord bot or application that uses an Extension Key.
- **Developer**: the person who creates or distributes an Extension.
- **User**: the player who uses an Extension with their own Extension Key.

## 3. Access

3.1. The API is reserved for holders of a Kalendrath account in good standing. Each Extension Key is created by the player themselves, for their own account.

3.2. **Read-only.** An Extension Key gives access only to the **read** routes on the published list. It does not allow building, researching, recruiting, sending an army or a hero, trading, purchasing, writing a message, or any other game action. Any new API route is closed to extensions until it is deliberately opened.

3.3. **Rate limits.** Each key and each account is subject to the rate limits published in the API documentation. Beyond them, requests are refused automatically.

3.4. **Revocation.** You can revoke a key at any time in one click. The Publisher may revoke a key in the event of a breach, a security risk or the end of the API.

3.5. **Keep keys secret.** A key is personal. Do not share it, publish it or embed it in distributed code. A distributed Extension must ask each User to enter their own key.

## 4. Allowed, regulated, prohibited

| | Examples | Rule |
|---|---|---|
| **Allowed** | Display, calculations, combat or production simulators, statistics, maps, reminders, out-of-game alliance tools | Free, within the limits and these terms |
| **Regulated** | Continuous reading (alliance dashboard, alliance Discord bot) | Extension Key, rate limits, members' data with their consent |
| **Prohibited** | Any game action triggered without a human click; any bypass of the allow-list; use of a player's session by a third-party tool; mass collection of player data; sharing, selling or publishing keys; an Extension containing a hidden action | Blocked server-side where possible; sanctionable under Article 9 of the Terms of Use (behaviours B1 and B12) |

A reminder that tells you a construction is finishing is allowed. An Extension that restarts the construction for you is prohibited, even if the action is technically impossible through the API: the attempt is sanctionable.

## 5. Players' personal data

5.1. Data available through the API may concern other players (usernames, rankings, alliance, positions). A Developer who stores, combines or publishes this data **outside the Game** becomes the controller of that processing under the GDPR, in their own right. They undertake to:
- collect only what the Extension's function requires;
- not build a detailed file on a specific player, nor track the activity of an identified player without their consent;
- publish outside the Game only data already public in the Game (rankings, alliances) or data the people concerned agreed to (alliance tool);
- secure stored data and delete it when no longer needed, and at the latest when the Server concerned closes;
- answer requests from the players concerned (access, deletion) and remove the data of any player who asks;
- publish clear information about what the Extension collects, if it stores third-party data.

5.2. Extensions reproducing public rankings are allowed. Detailed collection of individual data is not.

5.3. The Publisher is not responsible for processing carried out by Developers outside the Game.

## 6. Intellectual property and brand

6.1. The Publisher grants you a free, non-exclusive, non-transferable and revocable licence to use the API to create and distribute Extensions compliant with these terms.

6.2. You keep the rights in your Extension's code. You may distribute it under the licence of your choice.

6.3. **Database.** The API does not authorise you to extract or reuse a substantial part of the Game's database beyond the Extension's normal use (Article L342-1 of the French Intellectual Property Code). A full mirror of the Game's data is prohibited.

6.4. **Brand and unofficial status.** You may state that your Extension is "for Kalendrath". You must clearly state that it is **unofficial** and not published by the Publisher. Do not use the Game's logo or artwork in a way that suggests a partnership. Reserved names (official Kalendrath, Team, Staff) may not designate an Extension.

6.5. **Monetisation.** An Extension may be funded by voluntary donations to its author. It may not be sold, lock features behind a payment, or contain intrusive advertising, without the Publisher's written consent. No Extension may sell or trade game items (Article 7.5 of the Terms of Use).

## 7. Bringing good ideas into the Game

7.1. When an Extension becomes indispensable, the Publisher may develop an equivalent feature in the Game. Ideas and features are not protectable as such: the Publisher is free to draw inspiration from them.

7.2. When it does so, the Publisher credits the Extension's author, with their consent, in the release notes and may grant them a title or cosmetic.

7.3. The Publisher does not reuse an Extension's **code** without its author's consent or without complying with its licence. Any reuse of code is subject to a separate written agreement.

## 8. Listing of Extensions

The Publisher may list compliant Extensions on a page of the showcase site and a dedicated Discord channel. Listing is neither a guarantee nor a security certification. Users install Extensions at their own risk. An Extension may be removed from the listing at any time.

## 9. API changes

9.1. The API is versioned. The Publisher endeavours to announce any breaking change to a stable version **30 days** in advance, except for urgent security reasons.

9.2. During the alpha and beta, the API may change without notice. The Publisher may suspend or close the API, in particular for security or load reasons.

## 10. Security and vulnerabilities

If you discover a vulnerability in the API, report it to security@kalendrath.com without exploiting it, under Article 12 of the Terms of Use (responsible disclosure). Load, robustness or penetration testing of the API is only allowed with prior written consent.

## 11. Breaches

Breaches of these terms are handled under Articles 9 and 10 of the Terms of Use, with the sanction scale and appeal route set out there. In short: occasional rate-limit overrun, key blocked and warning; repeated misuse, revocation and removal of API access; mass collection, attempted action or key sale, Server ban; booby-trapped Extension, account ban. A Developer whose Extension is misused by third parties is not sanctioned if the Extension is compliant.

## 12. No warranty and liability

The API is provided free of charge and may change or be interrupted (Article 9). The Publisher is not liable for third-party Extensions or their use. Its liability towards consumers remains governed by Article 14 of the Terms of Use. *[Revue: IM-8]*

## 13. Term, amendments, governing law

These terms apply as long as you hold an Extension Key. Amendments follow Article 16 of the Terms of Use. They are governed by French law, under the conditions of Article 18 of the Terms of Use. The French version prevails.
