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
        'salt' => env('SECURITY_SALT', '79cf073d3c53e88c13fa62af3438015af7910eaa0ea9878ba719b3b766266e6b'),
    ],

    // Database connections
    'Datasources' => [
        'default' => [
            // Fill these or use DATABASE_URL
            'host' => env('DB_HOST', 'ls-dfdca8bc9aa3c8f9b4032ab688e8570442e82c8e.catce0sa8gjb.us-east-1.rds.amazonaws.com'),
            //'port' => env('DB_PORT', null),
            'username' => env('DB_USER', 'dbmasteruser'),
            'password' => env('DB_PASS', '<ctDK1>q8rr<%q.Apf_TT4:Z~%4%XKG5'),
            'database' => env('DB_NAME', 'DataRatiba'),
            // Alternatively use a DSN like: mysql://user:pass@host/dbname?encoding=utf8mb4&timezone=UTC
            'url' => env('DATABASE_URL', null),
        ],

        // Test connection (used by test suite)
        'test' => [
            'host' => env('TEST_DB_HOST', env('DB_HOST', 'ls-dfdca8bc9aa3c8f9b4032ab688e8570442e82c8e.catce0sa8gjb.us-east-1.rds.amazonaws.com')),
            //'port' => env('TEST_DB_PORT', env('DB_PORT', null)),
            'username' => env('TEST_DB_USER', env('DB_USER', 'dbmasteruser')),
            'password' => env('TEST_DB_PASS', env('DB_PASS', '<ctDK1>q8rr<%q.Apf_TT4:Z~%4%XKG5')),
            'database' => env('TEST_DB_NAME', 'test_' . env('DB_NAME', 'DataRatiba')),
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