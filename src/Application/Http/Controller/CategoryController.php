<?php

namespace Application\Http\Controller;

use Slim\Container;
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
class CategoryController {

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
     * @return Response
     */
    public function get(Request $request, Response $response, $args): Response {
        //$id = $args['id'];
        //return $response->withJson(\Application\Database\Model\Category::find($id) ?: []);
        return $response->withJson(\Application\Database\Model\Category::where(['disabled' => false])->get());
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function post(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $category = new \Application\Database\Model\Category();
        $category->name = $data['name'];
        $category->description = $data['description'];

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
    public function put(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $category = \Application\Database\Model\Category::find($id);
        $category->name = $data['name'] ?: $category->name;
        $category->description = $data['description'] ?: $category->description;

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
    public function delete(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $category = \Application\Database\Model\Category::find($id);
        $category->deactivation_date = date("Y-m-d H:i:s") ?: $category->deactivation_date;
        $category->disabled = $data['disabled'] ?: $category->disabled;

        $category->save();

        return $response->withStatus(200);
    }

}
