<?php

/*
  $this->get('db')->table('user')->get();
  $this->get('db')->table('user')->select('email', 'password')->get();
  $app->post('/login', function ($request, $response) {
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = filter_input(INPUT_POST, 'password');

  //$table = $this->db->table('user');
  $users = \Application\Model\User::where([
  'email' => $email,
  'password' => $password
  ])->get();

  if ($users->count()) {
  $_SESSION['user'] = (array) $users->first();
  return $response->withStatus(302)->withHeader('Location', '/users');
  }
  });
 */

$app->get('/category', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Category::all());
});

$app->get('/company', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Company::all());
});

$app->get('/customer', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Customer::all());
});

$app->get('/group', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Group::all());
});

$app->get('/log', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Log::all());
});

$app->get('/paymenttype', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\PaymentType::all());
});

$app->get('/price', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Price::all());
});

$app->get('/product', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Product::all());
});

$app->get('/provider', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Provider::all());
});

$app->get('/sale', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Sale::all());
});

$app->get('/stock', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Stock::all());
});

$app->get('/user', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\User::all());
});
