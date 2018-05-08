<?php

namespace Application\Http\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of UserController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class UserController {

    /**
     *
     * @var Container 
     */
    protected $container;

    /**
     * 
     * @param Container $container
     */
    public function __construct(Container $container) {
        $this->container = $container;
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $args): Response {
        if ($request->isGet()) {
            return $this->get($request, $response, $args);
        }
        if ($request->isPost()) {
            return $this->post($request, $response);
        }
        if ($request->isPut()) {
            return $this->put($request, $response, $args);
        }
        if ($request->isDelete()) {
            return $this->delete($request, $response, $args);
        }
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function get(Request $request, Response $response, $args): Response {
        return $response->withJson(\Application\Database\Model\User::where(['disabled' => false])->get());
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function post(Request $request, Response $response): Response {
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
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function put(Request $request, Response $response, $args): Response {
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
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function delete(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $user = \Application\Database\Model\User::find($id);
        $user->deactivation_date = date("Y-m-d H:i:s") ?: $user->deactivation_date;
        $user->disabled = $data['disabled'] ?: $user->disabled;

        $user->save();

        return $response->withStatus(200);
    }

}
