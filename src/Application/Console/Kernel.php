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
     * @var type 
     */
    protected $commands = [];

    /**
     *
     * @var type 
     */
    protected $defaultCommands = [
        \Application\Console\Command\ServerCommand::class,
    ];

    /**
     * 
     * @return type
     */
    public function getCommands() {
        return array_merge($this->commands, $this->defaultCommands);
    }

}
