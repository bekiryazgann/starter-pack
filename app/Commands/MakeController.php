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

#[asCommand('make:controller')]
class MakeController extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $controllerName = $this->askForControllerName($input, $output);
        $className = $this->formatControllerName($controllerName);
        $requestName = '/' . slugify($controllerName);
        $controllerName = PATH . '/app/Controllers/' . $className . '.php';

        if (!file_exists($controllerName)){
            if (touch($controllerName)){
                $content = "<?php

namespace app\Controllers;

use src\Controller;
use src\Router\Attributes\Route;

class {$className} extends Controller
{
    #[Route('{$requestName}')]
    public function index(): string
    {
        return '{$requestName}';
    }
}";
                if (file_put_contents($controllerName, $content)){
                    $output->writeln("<info>[SUCCESS] </info>Controller created as <fg=green;options=bold>" . str_replace(PATH ,'', $controllerName) . "</>");
                } else {
                    unlink($controllerName);
                    $output->writeln("<info>[ERROR]   </info><error>The file could not be created. Please check folder permissions</error>");
                }
            } else {
                $output->writeln("<info>[ERROR]   </info><error>The file could not be created. Please check folder permissions</error>");
            }
        } else {
            $output->writeln('<info>[ERROR]   </info><error>A controller with this name already exists. Please delete that file first!</error>');
        }



        return Command::SUCCESS;
    }

    private function askForControllerName(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question('<info>Enter the Controller Name: </info>');

        return $helper->ask($input, $output, $question);
    }

    private function formatControllerName(string $input): string
    {
        $input = str_replace('-', '', slugify($input));
        $input = ucfirst($input);
        return ucwords(strtolower($input));
    }
}