<?php

namespace app\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'cache:clear')]
class Cache extends Command
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $directory = PATH . '/storage/cache/*.php';
        $files = glob($directory);
        $count = 0;

        foreach ($files as $file) {
            print_r($file);
            if (unlink($file)) {
                $count++;
            }
        }

        $output->writeln("<info>[INFO]    </info>$count dosya silindi.");

        return Command::SUCCESS;
    }
}