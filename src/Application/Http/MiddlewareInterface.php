<?php

namespace Application\Http;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of MiddlewareInterface
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
interface MiddlewareInterface {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param callable $next
     */
    public function __invoke(Request $request, Response $response, callable $next);
}
