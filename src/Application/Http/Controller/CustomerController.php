<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of CustomerController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class CustomerController extends \Application\Http\AbstractController {

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
            return $response->withJson(\Application\Database\Model\Customer::find($id) ?: []);
        } else {
            return $response->withJson(\Application\Database\Model\Customer::where(["disabled" => false])->get());
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
        $customer = new \Application\Database\Model\Company();
        $customer->name = $data["name"];
        $customer->email = $data["email"];
        $customer->phone = $data["phone"];
        $customer->postal_code = $data["postal_code"];

        $customer->save();

        return $response->withJson($customer);
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
        $customer = \Application\Database\Model\Customer::find($id);
        $customer->name = $data["name"] ?: $customer->name;
        $customer->email = $data["email"] ?: $customer->email;
        $customer->phone = $data["phone"] ?: $customer->phone;
        $customer->postal_code = $data["postal_code"] ?: $customer->postal_code;

        $customer->save();

        return $response->withJson($customer);
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
        $customer = \Application\Database\Model\Customer::find($id);
        $customer->deactivation_date = date("Y-m-d H:i:s") ?: $customer->deactivation_date;
        $customer->disabled = $data["disabled"] ?: $customer->disabled;

        $customer->save();

        return $response->withStatus(200);
    }

}
