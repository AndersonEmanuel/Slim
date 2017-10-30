<?php

namespace Application\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of DefaultController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class DefaultController {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response) {

        $controller = $request->getAttribute('controller');
        $action = $request->getAttribute('action');
        $parameters = $request->getAttribute('parameters');

        $controller = sprintf("\Application\Model\%s", $controller);

        $class = new $controller();

        if ($request->isGet()) {
            $return = call_user_func(array($class, $action));
            $response = $response->withJson($return);
        }
        if ($request->isPost()) {
            $response->getBody()->write('Hello world');
        }
        if ($request->isPut()) {
            $response->getBody()->write('Hello world');
        }
        if ($request->isDelete()) {
            $response->getBody()->write('Hello world');
        }

        return $response;
    }

}
