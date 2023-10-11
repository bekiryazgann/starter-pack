<?php

namespace src;

class Crypto
{
    /**
     * @var string
     */
    public string $key;

    /**
     * @var string
     */
    public string $cipher;

    /**
     * @param string $key
     * @param string $cipher
     */
    public function __construct(string $key, string $cipher = 'AES-128-ECB') {
        $this->key = $key;
        $this->cipher = $cipher;
    }

    /**
     * @param string $data
     * @param string $cipher_algo
     *
     * @return string
     */
    public function encrypt(string $data, string $cipher_algo = ''):string
    {
        return openssl_encrypt($data, $cipher_algo == '' ? $this->cipher : $cipher_algo, $this->key);
    }

    /**
     * @param string $data
     * @param string $cipher_algo
     *
     * @return string
     */
    public function decrypt(string $data, string $cipher_algo = ''): string
    {
        return openssl_decrypt($data, $cipher_algo == '' ? $this->cipher : $cipher_algo, $this->key);
    }
}