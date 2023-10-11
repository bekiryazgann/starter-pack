<?php

namespace src;

use Symfony\Component\HttpFoundation\RedirectResponse;

class Redirect
{
    /**
     * @var \src\Redirect
     */
    private static Redirect $instance;

    /**
     * @var string|mixed
     */
    public string $url;

    /**
     * @var int
     */
    public int $statusCode = 302;

    /**
     * @param $url
     *
     * @return \src\Redirect
     */
    public static function getInstance(string|null $url = null): Redirect
    {
        if (! isset(self::$instance)) {
            self::$instance = new self($url);
        }

        return self::$instance;
    }

    /**
     * @param string|null $url
     */
    public function __construct(string|null $url = null)
    {
        $this->url = $url ?? site();
    }

    /**
     * @param array|false $data
     *
     * @return void
     */
    public function send(array|false $data = false): void
    {
        if (!!$data) {
            session()->setFlash('system-message', json_encode($data));
        }
        if ($this->url === 'referer') {
            $this->url = $_SERVER['HTTP_REFERER'] ?? site();
        }
        $redirect = new RedirectResponse($this->url, $this->statusCode);
        $redirect->send();
    }
}