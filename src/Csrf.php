<?php

namespace src;


class Csrf
{
    /**
     * @var string
     */
    public string $key;

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $key = strtoupper(substr(crypto()->encrypt(md5(rand(0, 9999)) . hash('sha512', rand(0, 9129391239))), 0, 128));
            $this->key = base64_encode($key);
            session()->set('_token', base64_encode($key));
        }
    }

    /**
     * Get Token Value
     *
     * @return string
     */
    public function get_token(): string
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return session()->get('_token');
        } else {
            return $this->key ?? '';
        }
    }

    /**
     * Token Check, match or not
     *
     * @return bool
     */
    public function is_verify(): bool
    {
        if (isset($_POST['_token'])){
            if ($_POST['_token'] == $this->get_token()) {
                return true;
            }
        }
        return false;
    }
}