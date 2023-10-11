<?php

namespace app\Commands;

use Carbon\Carbon;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Terminal;
use Symfony\Component\Process\Process;

#[AsCommand(name: 'serve')]
class Server extends Command
{
    public OutputInterface $output;

    public string $host;

    public string $port;

    public array $data = [];

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;
        $this->host = 'localhost';
        $this->port = '3000';

        $process = new Process(['php', '-S', $this->host . ':' . $this->port]);
        for ($i = 1; $i < 900000; $i++) {
            $process->setTimeout($process->getTimeout() * $i);
        }

        $process->run([$this, 'handleProcess']);
        $process->wait();

        return Command::INVALID;
    }

    public function handleProcess($type, $line): void
    {
        $str = str_contains($line, "\n") ? str_replace("\n", '', $line) : $line;
        $url = 'http://' . $this->host . ':' . $this->port;
        $terminal = new Terminal();

        if (str_contains($str, 'Development Server (http')) {
            $this->output->writeln("<info>          Server running on [{$url}]</info>");
            logger()->console("Server running on [{$url}]");
            $this->output->writeln("          Press Ctrl+C to stop the server.");
            $process = new Process(['open', $url]);
            $process->run();
            $this->output->write(PHP_EOL);
        } else if (str_contains($str, ' Accepted')) {
            $this->data['start_time'] = $this->getDateFromLine($str);
            $this->data['start_micro'] = microtime(true);
        } else if (preg_match('/\[(\d{3})\]: (\w+) (.*)(?![\w\s]*Closing|Accepted)/', $line, $matches)) {
            $this->data['path'] = $matches[3];
            $this->data['method'] = $matches[2];
            $this->data['status'] = $matches[1];
        } else if (str_contains($str, ' Closing')) {
            $startTime = Carbon::parse($this->data['start_time']);

            $seconds = mb_substr((string) microtime(true) - $this->data['start_micro'], 0, 6);

            [$date, $time] = explode(' ', $startTime);
            $nowDate = '<fg=gray>' . $date . '</> ' . $time;

            $path = str_contains($this->data['path'], '-') ? trim(explode(' - ', $this->data['path'])[0]) : $this->data['path'];
            logger()->console("[" . $this->data['status'] . "] " . $this->data['method'] . $path . " ..................... ~" . $seconds . "s");
            $dots = str_repeat('<fg=gray>.</>', $terminal->getWidth() - (38 + mb_strlen($seconds) + mb_strlen($this->data['path']) + mb_strlen($this->data['method']) + mb_strlen($this->data['status'])));

            if ((float) $seconds > 1) {
                $seconds = "<fg=red;options=bold>~{$seconds}s</>";
            } else {
                $seconds = "<fg=gray;options=bold>~{$seconds}s</>";
            }
            $this->output->writeln("<fg=cyan>[SERVER]  </>{$nowDate} " . $this->responseCode($this->data['status']) . " " . $this->data['method'] . "{$path} {$dots} {$seconds}");
        }
    }

    public function getDateFromLine($line): string
    {
        $regex = '/^\[([^\]]+)\]/';
        $line = str_replace('  ', ' ', $line);
        preg_match($regex, $line, $matches);

        return Carbon::createFromFormat('D M d H:i:s Y', $matches[1]);
    }

    public function responseCode($statusCode): string
    {
        if ($statusCode >= 100 && $statusCode <= 199) {
            $colorCode = "\033[0;37m";
        } elseif ($statusCode >= 200 && $statusCode <= 299) {
            $colorCode = "\033[0;32m";
        } elseif ($statusCode >= 300 && $statusCode <= 399) {
            $colorCode = "\033[0;33m";
        } elseif ($statusCode >= 400 && $statusCode <= 499) {
            $colorCode = "\033[0;31m";
        } elseif ($statusCode >= 500 && $statusCode <= 599) {
            $colorCode = "\033[1;31m";
        } else {
            $colorCode = "\033[0;37m";
        }

        return $colorCode . '[' . $statusCode . ']' . "\033[0m";
    }
}