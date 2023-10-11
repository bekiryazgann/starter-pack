<?php

namespace src\Router;

use ReflectionClass;
use src\Router\Attributes\Route;

class RouteRegistrar
{
    /**
     * @var \src\Router\Router
     */
    private Router $router;

    /**
     * RouteRegistrar constructor.
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function __construct()
    {
        $this->initializeRouter();
        $this->registerRoutes();
        $this->addRoutesToRouter();
        $this->runRouter();
    }

    /**
     * @return void
     */
    private function initializeRouter(): void
    {
        $this->router = new Router();
    }

    /**
     * @throws \ReflectionException
     */
    private function registerRoutes(): void
    {
        $routeClasses = $this->getRouteClasses();

        foreach ($routeClasses as $routeClass) {
            $this->processRouteClass($routeClass);
        }
    }

    /**
     * @return array
     */
    private function getRouteClasses(): array
    {
        $controllerPath = $this->router->paths['controllers'];
        $files = glob($controllerPath . '/*.php');
        $routeClasses = [];

        foreach ($files as $file) {
            $className = "app\\Controllers\\" . str_replace('.php', '', basename($file));
            $routeClasses[] = $className;
        }

        return $routeClasses;
    }

    /**
     * @throws \ReflectionException
     */
    private function processRouteClass(string $routeClass): void
    {
        $reflector = new ReflectionClass($routeClass);

        foreach ($reflector->getMethods() as $method) {
            $attributes = $method->getAttributes(Route::class);

            foreach ($attributes as $attribute) {
                $routeInfo = $attribute->newInstance();
                $path = $routeInfo->getPath();
                $httpMethod = $routeInfo->getHttpMethod();
                $options = $routeInfo->getOptions();
                $handler = [$routeClass, $method->getName()];

                $this->router->add($httpMethod, $path, $handler, $options);
            }
        }
    }

    /**
     * @return void
     */
    private function addRoutesToRouter(): void
    {
        // Routes are added during registration, no need for additional logic here.
    }

    /**
     * @throws \Exception
     */
    private function runRouter(): void
    {
        $this->router->run();
    }
}