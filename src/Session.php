<?php

namespace src;

class Session
{
    /**
     * @var \src\Session
     */
    public static self $instance;

    /**
     * @var int|float
     */
    public int|float $expire;

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

    public function __construct()
    {
        $this->expire = time() + 3600 * 24 * 7;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return void
     */
    public function set($key, $value): void
    {
        setcookie(md5(crypto()->encrypt($key)), crypto()->encrypt($value), $this->expire * 123, '/');
    }

    /**
     * @param $key
     *
     * @return string|false
     */
    public function get($key): string|false
    {
        if (isset($_COOKIE[md5(crypto()->encrypt($key))])) {
            return crypto()->decrypt($_COOKIE[md5(crypto()->encrypt($key))]);
        }

        return false;
    }

    /**
     * @return bool
     */
    public function clear(): bool
    {
        foreach ($_COOKIE as $key => $value) {
            $_COOKIE[$key] = '';
            setcookie($key, '', -$this->expire, '/');
            unset($_COOKIE[$key]);
        }

        return true;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function delete($key): bool
    {
        if (isset($_COOKIE[md5(crypto()->encrypt($key))])) {
            $_COOKIE[md5(crypto()->encrypt($key))] = '';
            setcookie(md5(crypto()->encrypt($key)), '', -$this->expire * 360, '/');
            unset($_COOKIE[md5(crypto()->encrypt($key))]);

            return true;
        }

        return false;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return void
     */
    public function setFlash($key, $value): void
    {
        setcookie(md5(crypto()->encrypt($key)), crypto()->encrypt($value), time() + 1, '/');
    }

    /**
     * @param $key
     *
     * @return string|false
     */
    public function getFlash($key): string|false
    {
        if (isset($_COOKIE[md5(crypto()->encrypt($key))])) {
            return crypto()->decrypt($_COOKIE[md5(crypto()->encrypt($key))]);
        }

        return false;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $sessions = [];

        foreach ($_COOKIE as $key => $value) {
            $sessions[$key] = crypto()->decrypt($value);
        }

        return $sessions;
    }
}