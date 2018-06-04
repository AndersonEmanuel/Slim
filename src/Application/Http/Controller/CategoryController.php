<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of CategoryController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class CategoryController extends \Application\Http\AbstractController {

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
            return $response->withJson(\Application\Database\Model\Category::find($id) ?: []);
        } else {
            return $response->withJson(\Application\Database\Model\Category::where(["disabled" => false])->get());
        }
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
        $category = new \Application\Database\Model\Category();
        $category->name = (string) $data["name"];
        $category->description = (string) $data["description"];

        $category->save();

        return $response->withJson($category);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function put(Request $request, Response $response, $args): Response {
        $id = isset($args["id"]) ? $args["id"] : null;
        $data = $request->getParsedBody();
        $category = \Application\Database\Model\Category::find($id);
        $category->name = (string) $data["name"] ?: $category->name;
        $category->description = (string) $data["description"] ?: $category->description;

        $category->save();

        return $response->withJson($category);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function delete(Request $request, Response $response, $args): Response {
        $id = isset($args["id"]) ? $args["id"] : null;
        $data = $request->getParsedBody();
        $category = \Application\Database\Model\Category::find($id);
        $category->deleted_at = (string) date("Y-m-d H:i:s") ?: $category->deleted_at;
        $category->disabled = (bool) 1 ?: $category->disabled;

        $category->save();

        return $response->withStatus(200);
    }

}
