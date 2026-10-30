<?php

return [
    'name' => 'Kaelite',
    'balance' => [
        'total' => 'Kaelite: :total',
        'earned' => 'Earned on this server: :amount',
        'purchased' => 'Purchased (valid on all your servers): :amount',
        'spent_first_hint' => 'Earned Kaelite is spent first.',
    ],
    'purchase' => [
        'bonus_beta' => '+:percent% bonus Kaelite during the beta',
        'beta_reset_notice' => 'Your beta progress will be reset at launch; your unspent Kaelite is kept on your account.',
    ],
    'errors' => [
        'insufficient' => 'You do not have enough Kaelite.',
        'frozen' => 'Your Kaelite wallet is temporarily frozen. Please contact support.',
        'not_transferable' => 'Earned Kaelite cannot be transferred.',
        'invalid_amount' => 'Invalid Kaelite amount.',
    ],
    'transaction_types' => [
        'purchase' => 'Purchase',
        'purchase_bonus' => 'Purchase bonus',
        'reward' => 'Reward',
        'spend' => 'Spend',
        'admin_adjustment' => 'Adjustment',
        'chargeback' => 'Payment reversal',
        'server_reset' => 'Server reset',
    ],
];
