<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of ProductController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class ProductController {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    public function get(Request $request, Response $response, $args): Response {
        return $response->withJson(
                        \Application\Database\Model\Product::
                                with('productStock')
                                ->with('productPrice')
                                ->get()
        );
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
        $product = new \Application\Database\Model\Product();
        $product->name = $data['name'];
        $product->description = $data['description'];

        $product->save();

        return $response->withJson($product);
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
        $product = \Application\Database\Model\Product::find($id);
        $product->name = $data['name'] ?: $product->name;
        $product->description = $data['description'] ?: $product->description;

        $product->save();

        return $response->withJson($product);
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
        $product = \Application\Database\Model\Product::find($id);
        $product->deactivation_date = date("Y-m-d H:i:s") ?: $product->deactivation_date;
        $product->disabled = $data['disabled'] ?: $product->disabled;

        $product->save();

        return $response->withStatus(200);
    }

}
