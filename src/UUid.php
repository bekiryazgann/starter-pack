<?php

namespace src;

class UUid
{
    /**
     * @var \src\UUid
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
     * @param string $string
     *
     * @return string
     */
    public function v4(string $string = ''): string
    {
        if (empty($string)) {
            $data = openssl_random_pseudo_bytes(16);
            assert(strlen($data) == 16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
            $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        } else {
            $md5 = md5($string);

            $uuid = sprintf('%s-%s-%s-%s-%s',
                substr($md5, 0, 8),
                substr($md5, 8, 4),
                substr($md5, 12, 4),
                substr($md5, 16, 4),
                substr($md5, 20, 12)
            );
        }

        return $uuid;
    }
}