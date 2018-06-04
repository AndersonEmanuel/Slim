<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of SaleController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class SaleController extends \Application\Http\AbstractController {

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
            return $response->withJson(
                            \Application\Database\Model\Sale::
                                    with("customer")
                                    ->with("paymentType")
                                    ->with("user")
                                    ->with("saleProduct")
                                    ->find($id) ?: []);
        } else {
            return $response->withJson(
                            \Application\Database\Model\Sale::
                                    with("customer")
                                    ->with("paymentType")
                                    ->with("user")
                                    ->with("saleProduct")
                                    ->get());
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

        $sale = new \Application\Database\Model\Sale();

        $sale->id_customer = $data["id_customer"];
        $sale->id_payment_type = $data["id_payment_type"];
        $sale->id_user = $data["id_user"];
        $sale->subtotal = $data["subtotal"];
        $sale->discount = $data["discount"];
        $sale->total = $data["total"];

        $sale->save();

        foreach ($data["sale_product"] as $item) {
            $product = new \Application\Database\Model\SaleProduct();
            
            $product->id_sale = $sale->id;
            $product->id_product = $item->id_product;
            $product->value = $item->value;
            $product->amount = $item->amount;
            $product->subtotal = $item->subtotal;
            
            $product->save();
        }

        return $response->withJson($sale);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function put(Request $request, Response $response, $args): Response {
        $data = $request->getParsedBody();
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
        $provider = \Application\Database\Model\Sale::find($id);
        $provider->deleted_at = date("Y-m-d H:i:s") ?: $provider->deleted_at;
        $provider->disabled = $data["disabled"] ?: $provider->disabled;

        $provider->save();

        return $response->withStatus(200);
    }

}
