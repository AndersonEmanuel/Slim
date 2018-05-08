<?php

namespace Application\Http\Controller;

use Slim\Container;
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
class PaymentTypeController {

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
        return $response->withJson(\Application\Database\Model\PaymentType::where(['disabled' => false])->get());
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
        $paymenttype = new \Application\Database\Model\PaymentType();
        $paymenttype->name = $data['name'];
        $paymenttype->description = $data['description'];
        $paymenttype->allows_discount = $data['allows_discount'];
        $paymenttype->allows_installment = $data['allows_installment'];

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
    public function put(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $paymenttype = \Application\Database\Model\PaymentType::find($id);
        $paymenttype->name = $data['name'] ?: $paymenttype->name;
        $paymenttype->description = $data['description'] ?: $paymenttype->description;
        $paymenttype->allows_discount = $data['allows_discount'] ?: $paymenttype->allows_discount;
        $paymenttype->allows_installment = $data['allows_installment'] ?: $paymenttype->allows_installment;

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
    public function delete(Request $request, Response $response, $args): Response {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $paymenttype = \Application\Database\Model\PaymentType::find($id);
        $paymenttype->deactivation_date = date("Y-m-d H:i:s") ?: $paymenttype->deactivation_date;
        $paymenttype->disabled = $data['disabled'] ?: $paymenttype->disabled;

        $paymenttype->save();

        return $response->withStatus(200);
    }

}
