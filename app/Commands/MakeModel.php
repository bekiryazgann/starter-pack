<?php

namespace app\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

#[asCommand('make:model')]
class MakeModel extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $modelName = $this->askForModelName($input, $output);
        $className = $this->formatModelName($modelName);
        $tableName = slugify($modelName);
        $modelName = PATH . '/app/Models/' . $className . '.php';

        if (! file_exists($modelName)) {
            if (touch($modelName)) {
                $content = "<?php

namespace app\Models;

use src\Database\Model;

/**
 * @method static where(string \$column, string \$operator = null, string \$value = null, string \$boolean = 'and')
 * @method static insert(array \$data)
 * @method static update(array \$data)
 */
class {$className} extends Model
{
    protected \$table = '{$tableName}';
    public \$timestamps = true;
}";
                if (file_put_contents($modelName, $content)) {
                    $output->writeln("<info>[SUCCESS] </info>Model created as <fg=green;options=bold>" . str_replace(PATH, '', $modelName) . "</>");
                } else {
                    unlink($modelName);
                    $output->writeln("<info>[ERROR]   </info><error>The file could not be created. Please check folder permissions</error>");
                }
            } else {
                $output->writeln("<info>[ERROR]   </info><error>The file could not be created. Please check folder permissions</error>");
            }
        } else {
            $output->writeln('<info>[ERROR]   </info><error>A model with this name already exists. Please delete that file first!</error>');
        }


        return Command::SUCCESS;
    }

    private function askForModelName(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new Question('<info>Enter the Model Name: </info>');

        return $helper->ask($input, $output, $question);
    }

    /**
     * @param string $input
     *
     * @return string
     */
    private function formatModelName(string $input): string
    {
        $input = str_replace('-', '', slugify($input));
        $input = ucfirst($input);

        return ucwords(strtolower($input));
    }
}