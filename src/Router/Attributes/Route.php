<?php

namespace src\Router\Attributes;

use Attribute;

#[Attribute]
class Route
{
    /**
     * @param string $path
     * @param string $httpMethod
     * @param array $options
     */
    public function __construct(
        private string $path,
        private string $httpMethod = 'ANY',
        private array $options = []
    ) {
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}