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
    $data = $request->getParsedBody();
    $category = new \Application\Model\Category();
    $category->name = $data['name'];
    $category->description = $data['description'];

    $category->save();

    return $response->withJson($category);
});

$app->put('/category/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $category = \Application\Model\Category::find($id);
    $category->name = $data['name'] ?: $category->name;
    $category->description = $data['description'] ?: $category->description;

    $category->save();

    return $response->withJson($category);
});

$app->delete('/category/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $category = \Application\Model\Category::find($id);
    $category->deactivation_date = $data['deactivation_date'] ?: $category->deactivation_date;
    $category->disabled = $data['disabled'] ?: $category->disabled;

    $category->save();

    return $response->withStatus(200);
});

$app->get('/company', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Company::all());
});

$app->post('/company', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $data = $request->getParsedBody();
    $company = new \Application\Model\Company();
    $company->name = $data['name'];
    $company->email = $data['email'];
    $company->phone = $data['phone'];
    $company->postal_code = $data['postal_code'];

    $company->save();

    return $response->withJson($company);
});

$app->put('/company/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $company = \Application\Model\Company::find($id);
    $company->name = $data['name'] ?: $company->name;
    $company->description = $data['email'] ?: $company->email;
    $company->phone = $data['phone'] ?: $company->phone;
    $company->postal_code = $data['postal_code'] ?: $company->postal_code;

    $company->save();

    return $response->withJson($company);
});

$app->delete('/company/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $company = \Application\Model\Company::find($id);
    $company->deactivation_date = $data['deactivation_date'] ?: $company->deactivation_date;
    $company->disabled = $data['disabled'] ?: $company->disabled;

    $company->save();

    return $response->withStatus(200);
});

$app->get('/customer', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Customer::all());
});

$app->post('/customer', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $data = $request->getParsedBody();
    $customer = new \Application\Model\Company();
    $customer->name = $data['name'];
    $customer->email = $data['email'];
    $customer->phone = $data['phone'];
    $customer->postal_code = $data['postal_code'];

    $customer->save();

    return $response->withJson($customer);
});

$app->put('/customer/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $customer = \Application\Model\Customer::find($id);
    $customer->name = $data['name'] ?: $customer->name;
    $customer->description = $data['email'] ?: $customer->email;
    $customer->phone = $data['phone'] ?: $customer->phone;
    $customer->postal_code = $data['postal_code'] ?: $customer->postal_code;

    $customer->save();

    return $response->withJson($customer);
});

$app->delete('/customer/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $customer = \Application\Model\Customer::find($id);
    $customer->deactivation_date = $data['deactivation_date'] ?: $customer->deactivation_date;
    $customer->disabled = $data['disabled'] ?: $customer->disabled;

    $customer->save();

    return $response->withStatus(200);
});

$app->get('/group', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Group::all());
});

$app->post('/group', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $data = $request->getParsedBody();
    $group = new \Application\Model\Group();
    $group->name = $data['name'];
    $group->description = $data['description'];

    $group->save();

    return $response->withJson($group);
});

$app->put('/group/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $group = \Application\Model\Group::find($id);
    $group->name = $data['name'] ?: $group->name;
    $group->description = $data['description'] ?: $group->description;

    $group->save();

    return $response->withJson($group);
});

$app->delete('/group/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $group = \Application\Model\Group::find($id);
    $group->deactivation_date = $data['deactivation_date'] ?: $group->deactivation_date;
    $group->disabled = $data['disabled'] ?: $group->disabled;

    $group->save();

    return $response->withStatus(200);
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
    return $response->withJson(
                    \Application\Model\Price::
                            with('product')
                            ->with('paymentType')
                            ->get()
    );
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
                            with('productStock')
                            ->with('productPrice')
                            ->get()
    );
});

$app->post('/product', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $data = $request->getParsedBody();
    $product = new \Application\Model\Product();
    $product->name = $data['name'];
    $product->description = $data['description'];

    $product->save();

    return $response->withJson($product);
});

$app->put('/product/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $product = \Application\Model\Product::find($id);
    $product->name = $data['name'] ?: $product->name;
    $product->description = $data['description'] ?: $product->description;

    $product->save();

    return $response->withJson($product);
});

$app->delete('/product/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $product = \Application\Model\Product::find($id);
    $product->deactivation_date = $data['deactivation_date'] ?: $product->deactivation_date;
    $product->disabled = $data['disabled'] ?: $product->disabled;

    $product->save();

    return $response->withStatus(200);
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
    $data = $request->getParsedBody();
    $user = new \Application\Model\User();
    $user->name = $data['name'];
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->password = $data['password'];
    $user->profile = $data['profile'];
    $user->cover = $data['cover'];

    $user->save();

    return $response->withJson($user);
});

$app->put('/user/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user = \Application\Model\User::find($id);
    $user->name = $data['name'] ?: $user->name;
    $user->username = $data['username'] ?: $user->username;
    $user->email = $data['email'] ?: $user->email;
    $user->password = $data['password'] ?: $user->password;
    $user->profile = $data['profile'] ?: $user->profile;
    $user->cover = $data['cover'] ?: $user->cover;

    $user->save();

    return $response->withJson($user);
});

$app->delete('/user/{id}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user = \Application\Model\User::find($id);
    $user->deactivation_date = $data['deactivation_date'] ?: $user->deactivation_date;
    $user->disabled = $data['disabled'] ?: $user->disabled;

    $user->save();

    return $response->withStatus(200);
});
