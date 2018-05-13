<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of LogController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class LogController extends \Application\Http\AbstractController {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function get(Request $request, Response $response, $args): Response {
        return $response->withJson(\Application\Database\Model\Log::all());
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function post(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $log = new \Application\Database\Model\Log();
        $log->description = $data["description"];
        $log->source = $data["source"];

        $log->save();

        return $response->withJson($log);
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
