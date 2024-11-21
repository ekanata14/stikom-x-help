<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | Here you can configure your CORS settings. You can change these options
    | based on your needs and which kind of requests you want to allow from
    | different origins.
    |
    */

    'paths' => ['api/*'], // Apply CORS settings to all API routes

    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'], // Allow requests from all domains (use specific domains for production)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Allow all headers

    'exposed_headers' => [],
    
    'max_age' => 0,

    'supports_credentials' => false, // Set to true if you want to allow cookies, etc.

];
