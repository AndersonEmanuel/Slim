<?php

namespace Application\Http\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of LoginController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class LoginController implements \Application\Http\ControllerInterface {

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
        $email = $request->getParam("email");
        $password = md5($request->getParam("password"));

        $users = \Application\Database\Model\User::where([
                    "email" => $email,
                    "password" => $password,
                    "disabled" => false,
                    "expired" => false
                ])->get();

        if ($users->count()) {
            \Application\Session\Session::set("user", (array) $users->first());
            return $response->withStatus(302)->withHeader("Location", "/");
        } else {
            return $response->withJson(array(array("CODE" => 401, "DESCRIPTION" => "Unauthorized")), 401);
        }
    }

}
