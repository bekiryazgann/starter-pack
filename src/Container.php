<?php

namespace src;


use Spatie\Ignition\Ignition;
use src\Database\Database;
use src\Router\RouteRegistrar;


class Container
{
    /**
     * @var \Spatie\Ignition\Ignition
     */
    public Ignition $ignition;

    /**
     * @throws \ReflectionException
     */
    public function __construct()
    {
        $this->ignition = Ignition::make()
            ->registerMiddleware([
                Reporter::class,
            ])
            ->register();
        new Database();
        new RouteRegistrar();
    }
}