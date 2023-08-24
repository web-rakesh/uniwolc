<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1343339089920041',
        'client_secret' => 'd2e0dbdf07ebcaddfe754fba68c3f7a3',
        'redirect' => 'http://127.0.0.1:8000/callback/facebook',
    ],
    'google' => [
        'client_id' => '430438941290-ci8j8ne1h9nmnj1ifmgo49gm5mluouj8.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

];
