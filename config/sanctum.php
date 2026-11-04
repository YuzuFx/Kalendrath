<?php

use Laravel\Sanctum\Sanctum;

return [
    /*
    |--------------------------------------------------------------------------
    | Stateful Domains
    |--------------------------------------------------------------------------
    |
    | Token authentication only for now: no SPA cookie authentication.
    |
    */

    'stateful' => [],

    /*
    |--------------------------------------------------------------------------
    | Sanctum Guards
    |--------------------------------------------------------------------------
    |
    | Empty on purpose: the API must never be authenticated by a web session,
    | only by a personal access token.
    |
    */

    'guard' => [],

    /*
    |--------------------------------------------------------------------------
    | Expiration Minutes
    |--------------------------------------------------------------------------
    */

    'expiration' => env('SANCTUM_TOKEN_EXPIRATION_MINUTES') ? (int) env('SANCTUM_TOKEN_EXPIRATION_MINUTES') : null,

    'token_prefix' => env('SANCTUM_TOKEN_PREFIX', ''),

    'middleware' => [
        'authenticate_session' => Laravel\Sanctum\Http\Middleware\AuthenticateSession::class,
        'encrypt_cookies' => Illuminate\Cookie\Middleware\EncryptCookies::class,
        'validate_csrf_token' => Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class,
    ],
];
