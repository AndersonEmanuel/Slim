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
        'mail' => [
            'host' => (string) env("MAIL_HOST"),
            'port' => (int) env("MAIL_PORT"),
            'encryption' => (string) env("MAIL_ENCRYPTION"),
            'authmode' => (string) env("MAIL_AUTH_MODE"),
            'username' => (string) env("MAIL_USERNAME"),
            'password' => (string) env("MAIL_PASSWORD"),
        ],
    ],
];
