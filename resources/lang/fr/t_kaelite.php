<?php

return [
    'name' => 'Kaelite',
    'balance' => [
        'total' => 'Kaelite : :total',
        'earned' => 'Gagnée sur ce serveur : :amount',
        'purchased' => 'Achetée (valable sur tous vos serveurs) : :amount',
        'spent_first_hint' => 'La Kaelite gagnée est dépensée en premier.',
    ],
    'purchase' => [
        'bonus_beta' => '+:percent % de Kaelite offerte pendant la bêta',
        'beta_reset_notice' => 'Votre progression de bêta sera remise à zéro à la sortie ; votre Kaelite non dépensée est conservée sur votre compte.',
    ],
    'errors' => [
        'insufficient' => 'Vous n\'avez pas assez de Kaelite.',
        'frozen' => 'Votre portefeuille de Kaelite est temporairement gelé. Contactez le support.',
        'not_transferable' => 'La Kaelite gagnée ne peut pas être transférée.',
        'invalid_amount' => 'Montant de Kaelite invalide.',
    ],
    'transaction_types' => [
        'purchase' => 'Achat',
        'purchase_bonus' => 'Bonus d\'achat',
        'reward' => 'Récompense',
        'spend' => 'Dépense',
        'admin_adjustment' => 'Ajustement',
        'chargeback' => 'Annulation de paiement',
        'server_reset' => 'Remise à zéro du serveur',
    ],
];
