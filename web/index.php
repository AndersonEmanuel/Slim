<?php

/**
 * Enabled display errors
 */
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

/**
 * This makes our life easier when dealing with paths. Everything is relative to the application root now.
 */
chdir(dirname(__DIR__));

/**
 * Decline static file requests back to the PHP built-in webserver
 */
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI'), PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../web/dependencies.php';

$app = new \Application\Application($container);

//require __DIR__ . '/../web/middleware.php';

require __DIR__ . '/../web/routes.php';

$app->run();
