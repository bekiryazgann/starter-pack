<?php

namespace src\Database\Interface;

use Closure;

interface CacheInterface
{
    /**
     * @param $key
     */
    public function __construct($key);

    /**
     * @param string $key
     * @param Closure $closure
     *
     * @return mixed
     */
    public static function use(string $key, Closure $closure): mixed;

    /**
     * @param $data
     *
     * @return void
     */
    public function set($data): void;

    /**
     * @return false|mixed|string
     */
    public function get(): mixed;

    /**
     * @return void
     */
    public function flush(): void;
}