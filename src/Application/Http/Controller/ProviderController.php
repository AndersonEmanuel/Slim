<?php

namespace Application\Http\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of ProviderController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2018, Anderson Emanuel
 * @version 1.0
 */
class ProviderController {

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function get(Request $request, Response $response, $args): Response {
        return $response->withJson(\Application\Database\Model\Provider::where(['disabled' => false])->get());
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
        $provider = new \Application\Database\Model\Provider();
        $provider->name = $data['name'];
        $provider->email = $data['email'];
        $provider->phone = $data['phone'];
        $provider->postal_code = $data['postal_code'];

        $provider->save();

        return $response->withJson($provider);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function put(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $provider = \Application\Database\Model\Provider::find($id);
        $provider->name = $data['name'] ?: $provider->name;
        $provider->email = $data['email'] ?: $provider->email;
        $provider->phone = $data['phone'] ?: $provider->phone;
        $provider->postal_code = $data['postal_code'] ?: $provider->postal_code;

        $provider->save();

        return $response->withJson($provider);
    }

    /**
     * 
     * @param Request $request
     * @param Response $response
     * @param type $args
     * @return Response
     */
    protected function delete(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $provider = \Application\Database\Model\Provider::find($id);
        $provider->deactivation_date = date("Y-m-d H:i:s") ?: $provider->deactivation_date;
        $provider->disabled = $data['disabled'] ?: $provider->disabled;

        $provider->save();

        return $response->withStatus(200);
    }

}
