<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of GroupController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class GroupController extends \Application\Http\AbstractController {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function get(Request $request, Response $response, $args): Response {
        return $response->withJson(\Application\Database\Model\Group::where(["disabled" => false])->get());
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
        $group = new \Application\Database\Model\Group();
        $group->name = $data["name"];
        $group->description = $data["description"];

        $group->save();

        return $response->withJson($group);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function put(Request $request, Response $response, $args): Response {
        $id = $args["id"];
        $data = $request->getParsedBody();
        $group = \Application\Database\Model\Group::find($id);
        $group->name = $data["name"] ?: $group->name;
        $group->description = $data["description"] ?: $group->description;

        $group->save();

        return $response->withJson($group);
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
        $group = \Application\Database\Model\Group::find($id);
        $group->deactivation_date = date("Y-m-d H:i:s") ?: $group->deactivation_date;
        $group->disabled = $data["disabled"] ?: $group->disabled;

        $group->save();

        return $response->withStatus(200);
    }

}
