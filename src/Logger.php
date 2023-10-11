<?php

namespace src;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger as Monolog;

class Logger
{
    /**
     * @var \src\Logger
     */
    public static self $instance;

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        if (! isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param $data
     *
     * @return void
     */
    public function console($data): void
    {
        $logger = new Monolog('console');
        $file = PATH . '/storage/log/console/' . carbon()::now()->format('Y-m-d') . '.log';
        if (! file_exists($file)) {
            touch($file);
        }
        $logger->pushHandler(new StreamHandler($file, Level::Info));
        $logger->info($data);
        print_r($data);
    }


    /**
     * @param $data
     *
     * @return void
     */
    public function error($data): void
    {
        $logger = new Monolog('error');
        $file = PATH . '/storage/log/error/' . carbon()::now()->format('Y-m-d') . '.log';
        if (! file_exists($file)) {
            touch($file);
        }
        $logger->pushHandler(new StreamHandler($file, Level::Error));
        $logger->error($data);
    }
}