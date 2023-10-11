<?php

namespace src\Http;

class Response extends \Symfony\Component\HttpFoundation\Response
{
    /**
     * @param string|null $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(?string $content = '', int $status = 200, array $headers = [])
    {
        parent::__construct($content, $status, $headers);
    }
}