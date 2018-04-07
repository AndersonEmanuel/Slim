<?php

namespace Application;

use Slim\Container;

/**
 * 
 * Description of Application
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Application extends \Slim\App {

    /**
     * Current version
     *
     * @var string
     */
    const APP_VERSION = "1.0-debug";

    /**
     * 
     * @param Container $container
     */
    public function __construct(Container $container) {
        parent::__construct($container);
    }

}
