<?php

$app->get('/category', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Category::where(['disabled' => false])->get());
});

$app->get('/category/{id:[0-9]+}', function (Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    return $response->withJson(\Application\Database\Model\Category::find($id) ?: []);
});

$app->post('/category', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $category = new \Application\Database\Model\Category();
    $category->name = $data['name'];
    $category->description = $data['description'];

    $category->save();

    return $response->withJson($category);
});

$app->put('/category/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $category = \Application\Database\Model\Category::find($id);
    $category->name = $data['name'] ?: $category->name;
    $category->description = $data['description'] ?: $category->description;

    $category->save();

    return $response->withJson($category);
});

$app->delete('/category/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $category = \Application\Database\Model\Category::find($id);
    $category->deactivation_date = date("Y-m-d H:i:s") ?: $category->deactivation_date;
    $category->disabled = $data['disabled'] ?: $category->disabled;

    $category->save();

    return $response->withStatus(200);
});

$app->get('/company', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Company::where(['disabled' => false])->get());
});

$app->get('/company/{id:[0-9]+}', function (Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    return $response->withJson(\Application\Database\Model\Company::find($id) ?: []);
});

$app->post('/company', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $company = new \Application\Database\Model\Company();
    $company->name = $data['name'];
    $company->email = $data['email'];
    $company->phone = $data['phone'];
    $company->postal_code = $data['postal_code'];

    $company->save();

    return $response->withJson($company);
});

$app->put('/company/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $company = \Application\Database\Model\Company::find($id);
    $company->name = $data['name'] ?: $company->name;
    $company->email = $data['email'] ?: $company->email;
    $company->phone = $data['phone'] ?: $company->phone;
    $company->postal_code = $data['postal_code'] ?: $company->postal_code;

    $company->save();

    return $response->withJson($company);
});

$app->delete('/company/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $company = \Application\Database\Model\Company::find($id);
    $company->deactivation_date = date("Y-m-d H:i:s") ?: $company->deactivation_date;
    $company->disabled = $data['disabled'] ?: $company->disabled;

    $company->save();

    return $response->withStatus(200);
});

$app->get('/customer', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Customer::where(['disabled' => false])->get());
});

$app->get('/customer/{id:[0-9]+}', function (Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    return $response->withJson(\Application\Database\Model\Customer::find($id) ?: []);
});

$app->post('/customer', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $customer = new \Application\Database\Model\Company();
    $customer->name = $data['name'];
    $customer->email = $data['email'];
    $customer->phone = $data['phone'];
    $customer->postal_code = $data['postal_code'];

    $customer->save();

    return $response->withJson($customer);
});

$app->put('/customer/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $customer = \Application\Database\Model\Customer::find($id);
    $customer->name = $data['name'] ?: $customer->name;
    $customer->email = $data['email'] ?: $customer->email;
    $customer->phone = $data['phone'] ?: $customer->phone;
    $customer->postal_code = $data['postal_code'] ?: $customer->postal_code;

    $customer->save();

    return $response->withJson($customer);
});

$app->delete('/customer/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $customer = \Application\Database\Model\Customer::find($id);
    $customer->deactivation_date = date("Y-m-d H:i:s") ?: $customer->deactivation_date;
    $customer->disabled = $data['disabled'] ?: $customer->disabled;

    $customer->save();

    return $response->withStatus(200);
});

$app->get('/group', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Group::where(['disabled' => false])->get());
});

$app->post('/group', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $group = new \Application\Database\Model\Group();
    $group->name = $data['name'];
    $group->description = $data['description'];

    $group->save();

    return $response->withJson($group);
});

$app->put('/group/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $group = \Application\Database\Model\Group::find($id);
    $group->name = $data['name'] ?: $group->name;
    $group->description = $data['description'] ?: $group->description;

    $group->save();

    return $response->withJson($group);
});

$app->delete('/group/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $group = \Application\Database\Model\Group::find($id);
    $group->deactivation_date = date("Y-m-d H:i:s") ?: $group->deactivation_date;
    $group->disabled = $data['disabled'] ?: $group->disabled;

    $group->save();

    return $response->withStatus(200);
});

$app->get('/log', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Log::all());
});

$app->get('/log/{id:[0-9]+}', function (Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    return $response->withJson(\Application\Database\Model\Log::find($id) ?: []);
});

$app->post('/log', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $company = new \Application\Database\Model\Log();
    $company->description = $data['description'];
    $company->source = $data['source'];

    $company->save();

    return $response->withJson($company);
});

$app->put('/log/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/log/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->post('/login', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    $email = $request->getParam('email');
    $password = md5($request->getParam('password'));

    $users = \Application\Database\Model\User::where([
                'email' => $email,
                'password' => $password,
                'disabled' => false
            ])->get();

    if ($users->count()) {
        $_SESSION['user'] = (array) $users->first();
        return $response->withStatus(302)->withHeader('Location', '/');
    }
});

$app->get('/paymenttype', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\PaymentType::where(['disabled' => false])->get());
});

$app->get('/paymenttype/{id:[0-9]+}', function (Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    return $response->withJson(\Application\Database\Model\PaymentType::find($id) ?: []);
});

$app->post('/paymenttype', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $paymenttype = new \Application\Database\Model\PaymentType();
    $paymenttype->name = $data['name'];
    $paymenttype->description = $data['description'];
    $paymenttype->allows_discount = $data['allows_discount'];
    $paymenttype->allows_installment = $data['allows_installment'];

    $paymenttype->save();

    return $response->withJson($paymenttype);
});

$app->put('/paymenttype/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $paymenttype = \Application\Database\Model\PaymentType::find($id);
    $paymenttype->name = $data['name'] ?: $paymenttype->name;
    $paymenttype->description = $data['description'] ?: $paymenttype->description;
    $paymenttype->allows_discount = $data['allows_discount'] ?: $paymenttype->allows_discount;
    $paymenttype->allows_installment = $data['allows_installment'] ?: $paymenttype->allows_installment;

    $paymenttype->save();

    return $response->withJson($paymenttype);
});

$app->delete('/paymenttype/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $paymenttype = \Application\Database\Model\PaymentType::find($id);
    $paymenttype->deactivation_date = date("Y-m-d H:i:s") ?: $paymenttype->deactivation_date;
    $paymenttype->disabled = $data['disabled'] ?: $paymenttype->disabled;

    $paymenttype->save();

    return $response->withStatus(200);
});

$app->get('/price', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(
                    \Application\Database\Model\Price::
                            with('product')
                            ->with('paymentType')
                            ->get()
    );
});

$app->post('/price', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/price/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/price/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $provider = \Application\Database\Model\Price::find($id);
    $provider->deactivation_date = date("Y-m-d H:i:s") ?: $provider->deactivation_date;
    $provider->disabled = $data['disabled'] ?: $provider->disabled;

    $provider->save();

    return $response->withStatus(200);
});

$app->get('/product', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(
                    \Application\Database\Model\Product::
                            with('productStock')
                            ->with('productPrice')
                            ->get()
    );
});

$app->post('/product', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $product = new \Application\Database\Model\Product();
    $product->name = $data['name'];
    $product->description = $data['description'];

    $product->save();

    return $response->withJson($product);
});

$app->put('/product/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $product = \Application\Database\Model\Product::find($id);
    $product->name = $data['name'] ?: $product->name;
    $product->description = $data['description'] ?: $product->description;

    $product->save();

    return $response->withJson($product);
});

$app->delete('/product/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $product = \Application\Database\Model\Product::find($id);
    $product->deactivation_date = date("Y-m-d H:i:s") ?: $product->deactivation_date;
    $product->disabled = $data['disabled'] ?: $product->disabled;

    $product->save();

    return $response->withStatus(200);
});

$app->get('/provider', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Provider::where(['disabled' => false])->get());
});

$app->post('/provider', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $provider = new \Application\Database\Model\Provider();
    $provider->name = $data['name'];
    $provider->email = $data['email'];
    $provider->phone = $data['phone'];
    $provider->postal_code = $data['postal_code'];

    $provider->save();

    return $response->withJson($provider);
});

$app->put('/provider/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $provider = \Application\Database\Model\Provider::find($id);
    $provider->name = $data['name'] ?: $provider->name;
    $provider->email = $data['email'] ?: $provider->email;
    $provider->phone = $data['phone'] ?: $provider->phone;
    $provider->postal_code = $data['postal_code'] ?: $provider->postal_code;

    $provider->save();

    return $response->withJson($provider);
});

$app->delete('/provider/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $provider = \Application\Database\Model\Provider::find($id);
    $provider->deactivation_date = date("Y-m-d H:i:s") ?: $provider->deactivation_date;
    $provider->disabled = $data['disabled'] ?: $provider->disabled;

    $provider->save();

    return $response->withStatus(200);
});

$app->get('/sale', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(
                    \Application\Database\Model\Sale::
                            with('customer')
                            ->with('paymentType')
                            ->with('user')
                            ->with('saleProduct')
                            ->get()
    );
});

$app->post('/sale', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    
});

$app->put('/sale/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/sale/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $provider = \Application\Database\Model\Sale::find($id);
    $provider->deactivation_date = date("Y-m-d H:i:s") ?: $provider->deactivation_date;
    $provider->disabled = $data['disabled'] ?: $provider->disabled;

    $provider->save();

    return $response->withStatus(200);
});

$app->get('/stock', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\Stock::where(['disabled' => false])->get());
});

$app->post('/stock', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->put('/stock/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    
});

$app->delete('/stock/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $provider = \Application\Database\Model\Stock::find($id);
    $provider->deactivation_date = date("Y-m-d H:i:s") ?: $provider->deactivation_date;
    $provider->disabled = $data['disabled'] ?: $provider->disabled;

    $provider->save();

    return $response->withStatus(200);
});

$app->get('/user', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Database\Model\User::where(['disabled' => false])->get());
});

$app->get('/user/{id:[0-9]+}', function (Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    return $response->withJson(\Application\Database\Model\User::find($id) ?: []);
});

$app->post('/user', function(Slim\Http\Request $request, Slim\Http\Response $response) {
    $data = $request->getParsedBody();
    $user = new \Application\Database\Model\User();
    $user->name = $data['name'];
    $user->username = $data['username'];
    $user->email = $data['email'];
    $user->password = md5($data['password']);
    $user->profile = $data['profile'];
    $user->cover = $data['cover'];

    $user->save();

    return $response->withJson($user);
});

$app->put('/user/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user = \Application\Database\Model\User::find($id);
    $user->name = $data['name'] ?: $user->name;
    $user->username = $data['username'] ?: $user->username;
    $user->email = $data['email'] ?: $user->email;
    $user->password = md5($data['password']) ?: $user->password;
    $user->profile = $data['profile'] ?: $user->profile;
    $user->cover = $data['cover'] ?: $user->cover;

    $user->save();

    return $response->withJson($user);
});

$app->delete('/user/{id:[0-9]+}', function(Slim\Http\Request $request, Slim\Http\Response $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $user = \Application\Database\Model\User::find($id);
    $user->deactivation_date = date("Y-m-d H:i:s") ?: $user->deactivation_date;
    $user->disabled = $data['disabled'] ?: $user->disabled;

    $user->save();

    return $response->withStatus(200);
});