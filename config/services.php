<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'google' => [
        'client_id' => env('GOOGLE_ID','682253014702-eghp3aglipp4rl3spdgj09o7jv1446ac.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_SECRET','-HHoo9pkT7mXK7wlmOgqFmv4'),
        'redirect' => env('GOOGLE_REDIRECT','http://job.io/login/google/callback'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_ID','1614825361993906'),
        'client_secret' => env('FACEBOOK_SECRET','8c408efd1f32c536c85cd40e66c90b4b'),
        'redirect' => env('FACEBOOK_REDIRECT','http://job.io/login/facebook/callback'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDDIRECT','http://job.io/login/github/callback'),
    ],

    'twitter' => [
        'client_id' => env('TWITTER_ID','jblItJD7HYMwstxI8U007Jc4v'),
        'client_secret' => env('TWITTER_SECRET','R7s4dUcX5ZjWFMLC4InF6EYAFHA0hgsjH2LLBpyNgmGVLUvwwQ'),
        'redirect' => env('TWITTER_REDIRECT','http://job.io/login/twitter/callback'),
    ],

];
