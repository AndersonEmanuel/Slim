<?php

$configuration = require __DIR__ . '/../web/settings.php';

$container = new \Slim\Container($configuration);

$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    $capsule->getContainer()->singleton(Illuminate\Contracts\Debug\ExceptionHandler::class);
    return $capsule;
};
/*
$container['errorHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response, \Exception $exception) use ($container) {
        //return $response->withStatus(500)->withHeader('Content-Type', 'text/html')->write('Internal Server Error');
        return $response->withJson(array(array("CODE" => 500, "DESCRIPTION" => "Internal Server Error")), 500);
    };
};

$container['notFoundHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response) use ($container) {
        //return $response->withStatus(404)->withHeader('Content-Type', 'text/html')->write('Page not found');
        return $response->withJson(array(array("CODE" => 404, "DESCRIPTION" => "Not found")), 404);
    };
};

$container['notAllowedHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response, $methods) use ($container) {
        //return $response->withStatus(405)->withHeader('Allow', implode(', ', $methods))->withHeader('Content-type', 'text/html')->write('Method not allowed');
        return $response->withJson(array(array("CODE" => 405, "DESCRIPTION" => "Method not allowed")), 405);
    };
};

$container['phpErrorHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response, \Throwable $error) use ($container) {
        //return $response->withStatus(500)->withHeader('Content-Type', 'text/html')->write('Internal Server Error');
        return $response->withJson(array(array("CODE" => 500, "DESCRIPTION" => "Internal Server Error")), 500);
    };
};
*/
$container['db'];
