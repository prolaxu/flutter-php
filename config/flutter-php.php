<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Output Path
    |--------------------------------------------------------------------------
    |
    | Where the generated app_structure.json file will be saved.
    | Defaults to the public directory of the Laravel application.
    |
     */
    'output_path' => public_path('app_structure.json'),

    /*
    |--------------------------------------------------------------------------
    | Flutter Output Path
    |--------------------------------------------------------------------------
    |
    | Default output directory for ui:compile-flutter generated Dart files.
    | Relative to the Laravel project root.
    |
    */
    'flutter_output_path' => base_path('../flutter_php_renderer/lib/generated'),

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | Prefix for all FlutterPHP API routes.
    |
    */
    'route_prefix' => 'api',

    /*
    |--------------------------------------------------------------------------
    | App Structure Route
    |--------------------------------------------------------------------------
    |
    | The URI path for the app structure endpoint.
    |
    */
    'structure_route' => '/app-structure',

    /*
    |--------------------------------------------------------------------------
    | Client Environment
    |--------------------------------------------------------------------------
    |
    | Values exposed to the Flutter client via app_structure.json.
    |
    */
    'app_env' => env('APP_ENV', 'local'),

    'api_base_url' => env(
        'FLUTTER_API_BASE_URL',
        rtrim(env('APP_URL', 'http://localhost:8000'), '/').'/api',
    ),

    'show_debug_banner' => filter_var(
        env('FLUTTER_SHOW_DEBUG_BANNER', false),
        FILTER_VALIDATE_BOOL,
    ),

    /*
    |--------------------------------------------------------------------------
    | Real-time broadcasting (Reverb / Pusher)
    |--------------------------------------------------------------------------
    |
    | Exposed to the Flutter client for pusher_channels_flutter. Reverb speaks
    | the Pusher protocol — use driver "reverb" for self-hosted websockets.
    |
    */
    'broadcasting' => [
        'enabled' => filter_var(env('BROADCASTING_ENABLED', false), FILTER_VALIDATE_BOOL),
        'driver' => env('BROADCAST_DRIVER', 'reverb'),
        'key' => env('REVERB_APP_KEY', env('PUSHER_APP_KEY', '')),
        'cluster' => env('PUSHER_APP_CLUSTER', 'mt1'),
        'host' => env('REVERB_HOST', env('PUSHER_HOST', 'localhost')),
        'port' => (int) env('REVERB_PORT', env('PUSHER_PORT', 8080)),
        'scheme' => env('REVERB_SCHEME', env('PUSHER_SCHEME', 'http')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Firebase Cloud Messaging (server-side via kreait/laravel-firebase)
    |--------------------------------------------------------------------------
    */
    'firebase' => [
        'enabled' => filter_var(env('FIREBASE_ENABLED', false), FILTER_VALIDATE_BOOL),
    ],
];
