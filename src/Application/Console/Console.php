<?php

namespace Application\Console;

use Symfony\Component\Console\Application;

/**
 * 
 * Description of Console
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class Console extends Application {

    /**
     * 
     * @param \Application\Console\Kernel $kernel
     */
    public function boot(\Application\Console\Kernel $kernel) {
        foreach ($kernel->getCommands() as $command) {
            $this->add(new $command());
        }
    }

}
