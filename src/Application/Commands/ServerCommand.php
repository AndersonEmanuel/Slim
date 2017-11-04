<?php

namespace Application\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
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

        $io = new SymfonyStyle($input, $output);

        $io->title("Running a PHP Built-In Server");
        $io->text("Server running at http://localhost:8080");
        $io->comment("Quit the server with CONTROL-C");

        exec(sprintf("php -S 0.0.0.0:8080 -t web web%sindex.php", DIRECTORY_SEPARATOR));
    }

}
