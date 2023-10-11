<?php

namespace src\Database;

use Illuminate\Database\Capsule\Manager;
use ReflectionClass;

class Database
{
    /**
     * @var \Illuminate\Database\Capsule\Manager
     */
    public Manager $manager;

    /**
     * @throws \ReflectionException
     */
    public function __construct()
    {
        $this->manager = new Manager;

        $this->manager->addConnection([
            'driver' => 'mysql',
            'host' => FRAMEWORK_DATABASE_HOST,
            'database' => FRAMEWORK_DATABASE_NAME,
            'username' => FRAMEWORK_DATABASE_USER,
            'password' => FRAMEWORK_DATABASE_PASS,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix' => '',
        ]);

        $this->manager->setAsGlobal();
        $this->manager->bootEloquent();
        $this->bootAllModels();
    }

    /**
     * @throws \ReflectionException
     */
    public function bootAllModels(): void
    {

        $namespace = 'app\\Models\\';
        $classes = [];
        $namespace_path = PATH . '/' . str_replace('\\', '/', $namespace);
        foreach (glob($namespace_path . '/*.php') as $file) {
            $class_name = $namespace . pathinfo($file, PATHINFO_FILENAME);
            $classes[] = $class_name;
        }
        foreach ($classes as $class) {
            $reflection = new ReflectionClass($class);
            if (!$reflection->isAbstract() && !$reflection->isInterface()) {
                $instance = $reflection->newInstance();
            }
        }
    }
}