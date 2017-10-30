<?php

namespace Application\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of Application
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Authentication {

    /**
     * Authentication middleware invokable class
     * 
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * 
     * @return Response $response
     */
    public function __invoke(Request $request, Response $response, callable $next): Response {
        $path = $request->getUri()->getPath();

        if (isset($_SESSION['user']) and is_array($_SESSION['user'])) {
            $response = $next($request, $response);
        } if ($path == "login" and ! isset($_SESSION['user'])) {
            $response = $next($request, $response);
        } else {
            $response = $response->withJson(array(array("CODE" => 401, "DESCRIPTION" => "Unauthorized")), 401);
        }
        return $response;
    }

}
