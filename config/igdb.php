<?php

return [
    /*
     * These are the credentials you got from https://dev.twitch.tv/console/apps
     */
    'credentials' => [
        'client_id' => env('9qm78ysatgv5erf6tei65f3fhuc5zy'),
        'client_secret' => env('o6qmdwswyvgeog53jazjyszgpbj9zh'),
    ],

    /*
     * This package caches queries automatically (for 1 hour per default).
     * Here you can set how long each query should be cached (in seconds).
     *
     * To turn cache off set this value to 0
     */
    'cache_lifetime' => env(0),

    /*
     * This is the per-page limit for your tier.
     */
    'per_page_limit' => 500,
];
