<?php

namespace Application\Http\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of ForgotPasswordController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class ForgotPasswordController implements \Application\Http\ControllerInterface {

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

    public function __invoke(Request $request, Response $response, $args): Response {
        
    }

}
