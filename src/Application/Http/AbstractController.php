<?php

namespace Application\Http;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of AbstractController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
abstract class AbstractController {

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
     */
    abstract protected function get(Request $request, Response $response, $args): Response;

    /**
     * 
     * @param Request $request
     * @param Response $response
     */
    abstract protected function post(Request $request, Response $response): Response;

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     */
    abstract protected function put(Request $request, Response $response, $args): Response;

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     */
    abstract protected function delete(Request $request, Response $response, $args): Response;
}
