<?php

//$this->get('db')->table('user')->get();
//$this->get('db')->table('user')->select('email', 'password')->get()

$app->get('/provider', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\Provider::all());
});

$app->get('/user', function (Slim\Http\Request $request, Slim\Http\Response $response) {
    return $response->withJson(\Application\Model\User::all());
});

$app->post('/login', function ($request, $response) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $table = $this->db->table('users');

    $users = $table->where([
                'email' => $email,
                'password' => $password
            ])->get();
    if ($users->count()) {
        $_SESSION['user'] = (array) $users->first();
        return $response->withStatus(302)->withHeader('Location', '/users');
    }
});
