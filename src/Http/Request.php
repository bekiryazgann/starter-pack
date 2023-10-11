<?php

namespace src\Http;

use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Valitron\Validator;

class Request extends HttpRequest
{
    /**
     * @var \Valitron\Validator
     */
    public Validator $validator;

    /**
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param $content
     *
     * @throws \Exception
     */
    public function __construct(array $query = [], array $request = [], array $attributes = [], array $cookies = [], array $files = [], array $server = [], $content = null)
    {
        parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
        $this->validator = validator();
        if (FRAMEWORK_CSRF ?? true){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (! csrf()->is_verify()) {
                    throw new \Exception('Trying to crush the security layer. application has been stopped');
                }
            }
        }
    }

    /**
     * @param $rule
     * @param $fields
     *
     * @return \Valitron\Validator
     */
    public function rule($rule, $fields): Validator
    {
        return $this->validator->rule($rule, $fields);
    }

    /**
     * @param array $labels
     *
     * @return \Valitron\Validator
     */
    public function labels(array $labels = []): Validator
    {
        return $this->validator->labels($labels);
    }

    /**
     * @param $value
     *
     * @return \Valitron\Validator
     */
    public function label($value): Validator
    {
        return $this->validator->label($value);
    }

    /**
     * @return array|bool
     */
    public function validate(): array|bool
    {
        if ($this->validator->validate()){
            return $this->validator->data();
        }
        return false;
    }

    /**
     * @return bool|array
     */
    public function errors(): bool|array
    {
        return $this->validator->errors();
    }
}