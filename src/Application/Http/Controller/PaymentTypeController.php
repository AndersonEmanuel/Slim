<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of PaymentTypeController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class PaymentTypeController extends \Application\Http\AbstractController {

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
            return $response->withJson(\Application\Database\Model\PaymentType::find($id) ?: []);
        } else {
        return $response->withJson(\Application\Database\Model\PaymentType::where(["disabled" => false])->get());
    }}

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function post(Request $request, Response $response): Response {
        $data = $request->getParsedBody();
        $paymenttype = new \Application\Database\Model\PaymentType();
        $paymenttype->name = $data["name"];
        $paymenttype->description = $data["description"];
        $paymenttype->allows_discount = $data["allows_discount"];
        $paymenttype->allows_installment = $data["allows_installment"];

        $paymenttype->save();

        return $response->withJson($paymenttype);
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
        $paymenttype = \Application\Database\Model\PaymentType::find($id);
        $paymenttype->name = $data["name"] ?: $paymenttype->name;
        $paymenttype->description = $data["description"] ?: $paymenttype->description;
        $paymenttype->allows_discount = $data["allows_discount"] ?: $paymenttype->allows_discount;
        $paymenttype->allows_installment = $data["allows_installment"] ?: $paymenttype->allows_installment;

        $paymenttype->save();

        return $response->withJson($paymenttype);
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
        $paymenttype = \Application\Database\Model\PaymentType::find($id);
        $paymenttype->deactivation_date = date("Y-m-d H:i:s") ?: $paymenttype->deactivation_date;
        $paymenttype->disabled = $data["disabled"] ?: $paymenttype->disabled;

        $paymenttype->save();

        return $response->withStatus(200);
    }

}
