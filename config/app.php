<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Twitter Bearer Tokens
    |--------------------------------------------------------------------------
    */
    'twitter_bearer_tokens' => [
        'AAAAAAAAAAAAAAAAAAAAAJJkzwEAAAAA2bOpsTn%2Bs2VatpEaNUDvv7ypKOM%3DrqaJAYETVlml9coVQsi0FreNNpSEF6gdCrv7FJWACTdqCdQPZg',
        'AAAAAAAAAAAAAAAAAAAAAJug0QEAAAAAVd%2FS2olqAOuXgkSmw2bOM%2B%2FXAJk%3DTqWO0Rt43EhThmPr1Gm7jQCmnRaXP3cjJ2JJuKocER4LcK9gyy',
        'AAAAAAAAAAAAAAAAAAAAAHP8zwEAAAAAtqlexwTUAVB8DkABw%2FbS9T%2FvfxI%3DW9kRcRRVrS8cv4MmNZody5nyc2XsvpXobbJXOREZFPnTRPyXeY',
        'AAAAAAAAAAAAAAAAAAAAAAW1wgEAAAAAqbBmS1Gp5ifwVeYKoxB7Ec8pt6g%3DI7RkvjFYfFudVwoxyzHACmbKhFXLQQOMPvulcQlWz86N18whGz',
        'AAAAAAAAAAAAAAAAAAAAAGnU0QEAAAAA4twhwtgj6QkTM5IIPIa9baW8aC4%3D218dqHUQjSuE65xsyoDz7P0Pv1BPb5ZaWrQMY3NkF2ZnQSmHay',
        'AAAAAAAAAAAAAAAAAAAAANik0gEAAAAArOEsThcrv9Y10PDD6eJNagm5eFA%3DsI0kSlrZdzizgoIXxpqmV5RS39I7wSkD1hoZnM1YEcPy8zO1Lc',
        'AAAAAAAAAAAAAAAAAAAAAOuk0gEAAAAA2XT2yLqSP5uw2c94Y6Flv1MNZc4%3DdHOuLuo3Z28m9GXuiesvw8KnbAWY7znKsVDbDg5fx2JbjD9eNj',
    ],

];