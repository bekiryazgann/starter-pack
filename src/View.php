<?php

namespace src;

use Jenssegers\Blade\Blade;

class View
{
    /**
     * @var \Jenssegers\Blade\Blade
     */
    public Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(PATH . '/public/view/', PATH . '/storage/cache/view/');
        if (isset($_SERVER['HTTP_PRAGMA'])) {
            $this->clearCache();
        }
    }

    /**
     * @param string $view
     * @param array $data
     *
     * @return string
     */
    public function show(string $view, array $data): string
    {
        return $this->blade->render($view, $data);
    }

    /**
     * @return void
     */
    public function clearCache(): void
    {
        $files = glob(PATH . '/storage/cache/view/*.php');
        foreach ($files as $file) {
            unlink($file);
        }
    }
}
