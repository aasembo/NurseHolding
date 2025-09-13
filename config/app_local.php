<?php
/*
 * Local configuration overrides for your application.
 *
 * Note: Do not commit real credentials to version control.
 * You can also use environment variables instead of editing this file.
 */

return [
    // Set debug mode via env or toggle here for local dev
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    // Security salt. In production set via env SECURITY_SALT
    'Security' => [
        'salt' => env('SECURITY_SALT', '5b9640e6740593ab2c8b626c82a2ca2667e0683221c6b66de4f3ff490c856519'),
    ],

    // Database connections
    'Datasources' => [
        'default' => [
            // Fill these or use DATABASE_URL
            'host' => env('DB_HOST', 'localhost'),
            //'port' => env('DB_PORT', null),
            'username' => env('DB_USER', 'root'),
            'password' => env('DB_PASS', ''),
            'database' => env('DB_NAME', ''),
            // Alternatively use a DSN like: mysql://user:pass@host/dbname?encoding=utf8mb4&timezone=UTC
            'url' => env('DATABASE_URL', null),
        ],

        // Test connection (used by test suite)
        'test' => [
            'host' => env('TEST_DB_HOST', env('DB_HOST', 'localhost')),
            //'port' => env('TEST_DB_PORT', env('DB_PORT', null)),
            'username' => env('TEST_DB_USER', env('DB_USER', '')),
            'password' => env('TEST_DB_PASS', env('DB_PASS', '')),
            'database' => env('TEST_DB_NAME', 'test_' . env('DB_NAME', '')),
            // By default tests use sqlite tmp DB; override with DATABASE_TEST_URL for MySQL/Postgres
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tmp/tests.sqlite'),
        ],
    ],

    // Email transport (optional to customize locally)
    'EmailTransport' => [
        'default' => [
            'host' => env('MAIL_HOST', 'localhost'),
            'port' => (int)env('MAIL_PORT', 25),
            'username' => env('MAIL_USER', null),
            'password' => env('MAIL_PASS', null),
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],

    'Error' => [
        'errorLevel' => E_ALL & ~E_USER_DEPRECATED & ~E_DEPRECATED,
        'exceptionRenderer' => \Cake\Error\Renderer\WebExceptionRenderer::class,
        'ignoredDeprecationPaths' => [
            'vendor/cakephp/cakephp/src/ORM/Table.php',
            'vendor/cakephp/cakephp/src/Core/functions.php',
            'vendor/cakephp/cakephp/src/Http/ResponseEmitter.php',
            'vendor/cakephp/cakephp/src/Cache/Engine/FileEngine.php',
            realpath('vendor/cakephp/cakephp/src/ORM/Table.php'),
        ],
    ],
];

