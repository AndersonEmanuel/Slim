<?php

namespace Application\Http\Controller;

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
class LoginController extends \Application\Http\AbstractController {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function get(Request $request, Response $response, $args): Response {
        
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function post(Request $request, Response $response): Response {
        $email = $request->getParam("email");
        $password = md5($request->getParam("password"));

        $users = \Application\Database\Model\User::where([
                    "email" => $email,
                    "password" => $password,
                    "disabled" => false
                ])->get();

        if ($users->count()) {
            \Application\Session\Session::set("user", (array) $users->first());
            return $response->withStatus(302)->withHeader("Location", "/");
        }
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function put(Request $request, Response $response, $args): Response {
        return $response->withJson(array(array("CODE" => 405, "DESCRIPTION" => "Method not allowed")), 405);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function delete(Request $request, Response $response, $args): Response {
        return $response->withJson(array(array("CODE" => 405, "DESCRIPTION" => "Method not allowed")), 405);
    }

}
