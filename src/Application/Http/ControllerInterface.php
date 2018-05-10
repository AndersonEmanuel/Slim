<?php

namespace Application\Http;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of ControllerInterface
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
interface ControllerInterface {

    /**
     * 
     * @param Container $container
     */
    public function __construct(Container $container);

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     */
    public function __invoke(Request $request, Response $response, $args): Response;
}
