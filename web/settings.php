<?php

return [
    'settings' => [
        'determineRouteBeforeAppMiddleware' => (bool) false,
        'displayErrorDetails' => (bool) true,
        'db' => [
            'driver' => (string) env("DB_DRIVER"),
            'host' => (string) env("DB_HOST"),
            'database' => (string) env("DB_NAME"),
            'username' => (string) env("DB_USERNAME"),
            'password' => (string) env("DB_PASSWORD"),
            'charset' => (string) env("DB_CHARSET"),
            'collation' => (string) env("DB_COLLATION"),
            'port' => (int) env("DB_PORT"),
            'prefix' => (string) env("DB_PREFIX"),
        ],
        'mailer' => [
            'host' => (string) env("MAILER_HOST"),
            'port' => (int) env("MAILER_PORT"),
            'encryption' => (string) env("MAILER_ENCRYPTION"),
            'username' => (string) env("MAILER_USERNAME"),
            'password' => (string) env("MAILER_PASSWORD"),
        ],
    ],
];
