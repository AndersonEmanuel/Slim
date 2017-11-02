<?php

namespace Application\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * 
 * Description of ServerCommand
 * 
 * @package Application
 * @author Anderson Emanuel <contato@andersonemanuel.com.br>
 * @copyright (c) 2017, Anderson Emanuel
 * @version 1.0
 */
class ServerCommand extends Command {

    protected function configure() {
        $this->setName("server:run")->setDescription("Run a PHP Built-In Server");
    }

    /**
     * 
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->write("Run server in http://localhost:8080 \n");
        exec(sprintf("php -S localhost:8080 -t %s%sweb", getcwd(), DIRECTORY_SEPARATOR));
    }

}
