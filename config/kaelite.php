<?php

/*
|--------------------------------------------------------------------------
| Kaelite (premium currency)
|--------------------------------------------------------------------------
|
| Two balances (docs/plan-marketing.md, "Kaelite liée au compte"):
| - purchased Kaelite belongs to the account (all servers);
| - earned Kaelite belongs to the server where it was earned.
*/

return [
    // Identifier of this game server. Earned Kaelite is stored per (user, server_key).
    'server_key' => env('KAELITE_SERVER_KEY', 'local'),

    // Bonus Kaelite granted on top of every purchase, in percent (0 disables it).
    // Decision of 2026-10-28: +30 % on every purchase during the beta.
    'beta_bonus_percent' => (int) env('KAELITE_BETA_BONUS_PERCENT', 30),
];
