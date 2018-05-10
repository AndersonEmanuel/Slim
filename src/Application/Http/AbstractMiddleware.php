<?php

namespace Application\Http;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of AbstractMiddleware
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
abstract class AbstractMiddleware implements \Application\Http\MiddlewareInterface {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param callable $next
     */
    abstract public function __invoke(Request $request, Response $response, callable $next);
}
