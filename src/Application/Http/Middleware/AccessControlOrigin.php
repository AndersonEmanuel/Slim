<?php

namespace Application\Http\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of AccessControlOrigin
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class AccessControlOrigin {

    /**
     * AccessControlOrigin middleware invokable class
     * 
     * @param Request $request
     * @param Response $response
     * @param callable $next
     */
    public function __invoke(Request $request, Response $response, callable $next) {
        return $next($request, $response)
                        ->withHeader('Access-Control-Allow-Origin', '*')
                        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

}
