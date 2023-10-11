<?php

namespace src;

use Valitron\Validator;

class Error
{
    /**
     * @var \src\Error
     */
    public static self $instance;

    /**
     * @param $validator
     *
     * @return self
     */
    public static function getInstance($validator): self
    {
        if (! isset(self::$instance)) {
            self::$instance = new self($validator);
        }

        return self::$instance;
    }

    /**
     * @param \Valitron\Validator $validator
     */
    public function __construct(
        public Validator $validator
    ) {
    }

    /**
     * @return bool|array
     */
    public function all(): bool|array
    {
        $formatErrors = [];
        foreach ($this->validator->errors() as $error){
            $formatErrors[] = $error[0];
        }
        return $formatErrors;
    }

    /**
     * @param $name
     * @param $template
     *
     * @return mixed
     */
    public function show($name, $template = null): mixed
    {
        $errors = $this->validator->errors();
        if ($template == null) {
            if (isset($errors[$name])) {
                return $errors[$name][0];
            }
        } else {
            if (str_contains($template, ':message')) {
                if (isset($errors[$name])) {
                    $error = $errors[$name][0];

                    return str_replace(':message', $error, $template);
                }

                return null;
            }
        }

        return null;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function is($name): bool
    {
        $errors = $this->validator->errors();

        return isset($errors[$name]);
    }
}