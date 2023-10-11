<?php

namespace app\Commands;

use src\Controller;
use src\Http\Request;
use src\Router\Attributes\Route;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

#[asCommand('make:middleware')]
class MakeMiddleware extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $middlewareName = $this->askForMiddlewareName($input, $output);
        $className = $this->formatMiddlewareName($middlewareName);
        $middlewareName = PATH . '/app/Middlewares/' . $className . '.php';

        if (!file_exists($middlewareName)){
            if (touch($middlewareName)){
                $content = "<?php

namespace app\Middlewares;

class {$className}
{
    public function handle(): bool
    {
        return true;
    }
}";
                if (file_put_contents($middlewareName, $content)){
                    $output->writeln("<info>[SUCCESS] </info>Middleware created as <fg=green;options=bold>" . str_replace(PATH ,'', $middlewareName) . "</>");
                } else {
                    unlink($middlewareName);
                    $output->writeln("<info>[ERROR]   </info><error>The file could not be created. Please check folder permissions</error>");
                }
            } else {
                $output->writeln("<info>[ERROR]   </info><error>The file could not be created. Please check folder permissions</error>");
            }
        } else {
            $output->writeln('<info>[ERROR]   </info><error>A middleware with this name already exists. Please delete that file first!</error>');
        }

        return Command::SUCCESS;
    }

    private function askForMiddlewareName(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question('<info>Enter the Middleware Name: </info>');

        return $helper->ask($input, $output, $question);
    }

    private function formatMiddlewareName(string $input): string
    {
        $input = str_replace('-', '', slugify($input));
        $input = ucfirst($input);
        return ucwords(strtolower($input));
    }
}