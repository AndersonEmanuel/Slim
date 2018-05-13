<?php

namespace Application\Http\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of HttpBasicAuthentication
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class RedirectIfAuthenticated extends \Application\Http\AbstractMiddleware {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return type
     */
    public function __invoke(Request $request, Response $response, callable $next) {
        return $next($request, $response);
    }

}
