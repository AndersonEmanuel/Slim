<?php

namespace Application\Console;

/**
 * 
 * Description of ServerCommand
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Kernel {

    /**
     * 
     * @return type
     */
    public function getCommands() {
        return array(
            \Application\Console\Command\ServerCommand::class
        );
    }

}
