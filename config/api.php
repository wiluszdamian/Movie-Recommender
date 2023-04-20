<?php

return [

    /*
        |--------------------------------------------------------------------------
        | API Connections
        |--------------------------------------------------------------------------
        |
        | Here are each of the API connections setup for your application.
        | Of course, examples of configuring each API platform that is
        | supported by Laravel is shown below to make development simple.
        |
        */

    'tmdb' => [
        'base_uri' => env('API_TMDB_BASE_URI'),
        'api_key' => env('API_TMDB_KEY'),
    ],
];
