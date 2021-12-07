<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection
    |--------------------------------------------------------------------------
    |
    | The default connection that Web3 client will connect to.
    |
    */

    'default' => env('WEB3_CONNECTION', 'http'),

    'connections' => [

        /*
        |--------------------------------------------------------------------------
        | HTTP Driver
        |--------------------------------------------------------------------------
        |
        | This is the default connection, where it takes place directly
        | with the default request manager and HTTP provider.
        | You can pass the provider and request manager class names
        | that will be used to initialize the client with.
        |
        */

        'http' => [
            'driver' => 'http',
            'host' => env('WEB3_HTTP_HOST', 'http://localhost:8545'),
        ],

    ],

];
