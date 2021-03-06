<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of StockController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class StockController {
    
    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function get(Request $request, Response $response, $args): Response {
        $id = isset($args["id"]) ? $args["id"] : null;
        if ($id) {
            return $response->withJson(\Application\Database\Model\Stock::find($id) ?: []);
        } else {
        return $response->withJson(\Application\Database\Model\Stock::where(["disabled" => false])->get());
    }}

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function post(Request $request, Response $response): Response {
        
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function put(Request $request, Response $response, $args): Response {
        
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function delete(Request $request, Response $response, $args): Response {
        $id = $args["id"];
        $data = $request->getParsedBody();
        $provider = \Application\Database\Model\Stock::find($id);
        $provider->deactivation_date = date("Y-m-d H:i:s") ?: $provider->deactivation_date;
        $provider->disabled = $data["disabled"] ?: $provider->disabled;

        $provider->save();

        return $response->withStatus(200);
    }

}
