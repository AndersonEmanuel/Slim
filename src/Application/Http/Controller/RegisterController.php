<?php

namespace Application\Http\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * 
 * Description of RegisterController
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class RegisterController implements \Application\Http\ControllerInterface {

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
        $message = new \Swift_Message();
        $message->setSubject("Your account has been registered");
        $message->setFrom($this->container->settings["mail"]["username"]);
        $message->setTo(["andersonemanuel.s@gmail.com"]);
        $message->setBody($this->container->view->fetch("register.html.twig"));
        $message->setContentType("text/html");

        $this->container->mail->send($message);

        return $response->withJson(array(array("CODE" => 200, "DESCRIPTION" => "Ok")), 200);
    }

}
