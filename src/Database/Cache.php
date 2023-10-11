<?php

namespace src\Database;

use Closure;
use src\Database\Interface\CacheInterface;

class Cache implements CacheInterface
{
    /**
     * @var string
     */
    public string $fileName;

    /**
     * @var string
     */
    public string $path;

    /**
     * @var string
     */
    public string $ext;

    /**
     * @var string
     */
    public string $key;

    /**
     * @var \src\Database\Cache
     */
    public static self $instance;


    /**
     * @param string $key
     *
     * @return \src\Database\Cache
     */
    public static function getInstance(string $key = ''): Cache
    {
        if (! isset(self::$instance)) {
            self::$instance = new self($key);
        }

        return self::$instance;
    }

    /**
     * @param string $key
     */
    public function __construct($key = '')
    {
        $this->key = $key;
        $this->path = PATH . '/storage/cache/database/';
        $this->ext = '.json';
        $this->fileName = $this->path . $this->key . $this->ext;
        if (isset($_SERVER['HTTP_PRAGMA'])) {
            $this->flush();
        }
    }

    /**
     * @param string $key
     * @param Closure $closure
     *
     * @return mixed
     */
    public static function use(string $key, Closure $closure): mixed
    {
        $instance = new static($key);
        $cachedData = $instance->get();

        if ($cachedData !== false) {
            return $cachedData;
        }

        $data = $closure()->toArray();
        $instance->set($data);

        return json_decode(json_encode($data));
    }

    /**
     * @param $data
     *
     * @return void
     */
    public function set($data): void
    {
        if (! file_exists($this->fileName)) {
            touch($this->fileName);
        }
        $data = json_encode([
            'data' => crypto()->encrypt(is_array($data) ? json_encode($data) : $data),
            'array' => is_array($data) ? 'true' : 'false',
        ]);
        file_put_contents($this->fileName, $data);
    }

    /**
     * @param $key
     *
     * @return false|mixed|string
     */
    public function get(): mixed
    {
        if (file_exists($this->fileName)) {
            $data = json_decode(file_get_contents($this->fileName));
            if (! $data == null) {
                return ($data->array == 'true') ? json_decode(crypto()->decrypt($data->data)) : crypto()->decrypt($data->data);
            }

            return false;
        }

        return false;
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $files = glob($this->path . '*' . $this->ext);
        foreach ($files as $file) {
            unlink($file);
        }
    }
}
