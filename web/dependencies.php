<?php

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

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

$container['mail'] = function ($container) {
    $transport = new \Swift_SmtpTransport();
    $transport->setHost($container['settings']['mail']['host']);
    $transport->setPort($container['settings']['mail']['port']);
    $transport->setEncryption($container['settings']['mail']['encryption']);
    $transport->setAuthMode($container['settings']['mail']['authmode']);
    $transport->setUsername($container['settings']['mail']['username']);
    $transport->setPassword($container['settings']['mail']['password']);

    return new \Swift_Mailer($transport);
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../src/Application/Resources/Views/', [
        'cache' => false,
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
            $container->router, $container->request->getUri()
    ));
    return $view;
};

$container['errorHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response, \Exception $exception) use ($container) {
        return $response->withJson(array(array("CODE" => 500, "DESCRIPTION" => "Internal Server Error")), 500);
    };
};

$container['notFoundHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response) use ($container) {
        return $response->withJson(array(array("CODE" => 404, "DESCRIPTION" => "Not found")), 404);
    };
};

$container['notAllowedHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response, $methods) use ($container) {
        return $response->withJson(array(array("CODE" => 405, "DESCRIPTION" => "Method not allowed")), 405);
    };
};

$container['phpErrorHandler'] = function ($container) {
    return function (Slim\Http\Request $request, Slim\Http\Response $response, \Throwable $error) use ($container) {
        return $response->withJson(array(array("CODE" => 500, "DESCRIPTION" => "Internal Server Error")), 500);
    };
};

$container['db'];
