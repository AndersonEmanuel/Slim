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

$app->post('/category', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/category/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/category/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/company', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Company::all());
});

$app->post('/company', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/company/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/company/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/customer', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Customer::all());
});

$app->post('/customer', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/customer/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/customer/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/group', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Group::all());
});

$app->post('/group', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/group/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/group/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/log', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Log::all());
});

$app->post('/log', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/log/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/log/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/paymenttype', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\PaymentType::all());
});

$app->post('/paymenttype', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/paymenttype/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/paymenttype/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/price', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Price::all());
});

$app->post('/price', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/price/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/price/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/product', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(
                    \Application\Model\Product::
                            with('stock')
                            ->with('price')
                            ->get()
    );
});

$app->post('/product', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/product/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/product/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/provider', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Provider::all());
});

$app->post('/provider', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/provider/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/provider/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/sale', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(
                    \Application\Model\Sale::
                            with('customer')
                            ->with('paymentType')
                            ->with('user')
                            ->with('saleProduct')
                            ->get()
    );
});

$app->post('/sale', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/sale/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/sale/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/stock', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Stock::all());
});

$app->post('/stock', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/stock/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/stock/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->get('/user', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\User::all());
});

$app->post('/user', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/user/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/user/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});
