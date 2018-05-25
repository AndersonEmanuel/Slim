<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of CompanyController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class CompanyController extends \Application\Http\AbstractController {

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
            return $response->withJson(\Application\Database\Model\Company::find($id) ?: []);
        } else {
            return $response->withJson(\Application\Database\Model\Company::where(["disabled" => false])->get());
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
        $company = new \Application\Database\Model\Company();
        $company->name = $data["name"];
        $company->email = $data["email"];
        $company->phone = $data["phone"];
        $company->postal_code = $data["postal_code"];

        $company->save();

        return $response->withJson($company);
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
        $company = \Application\Database\Model\Company::find($id);
        $company->name = $data["name"] ?: $company->name;
        $company->email = $data["email"] ?: $company->email;
        $company->phone = $data["phone"] ?: $company->phone;
        $company->postal_code = $data["postal_code"] ?: $company->postal_code;

        $company->save();

        return $response->withJson($company);
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
        $company = \Application\Database\Model\Company::find($id);
        $company->deactivation_date = date("Y-m-d H:i:s") ?: $company->deactivation_date;
        $company->disabled = $data["disabled"] ?: $company->disabled;

        $company->save();

        return $response->withStatus(200);
    }

}
