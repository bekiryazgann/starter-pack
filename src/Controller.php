<?php

namespace src;

class Controller
{
    /**
     * @var \src\View
     */
    public View $view;

    /**
     * @var \src\Carbon
     */
    public Carbon $carbon;

    public function __construct()
    {
        $this->view = new View();
        $this->carbon = new Carbon();
    }

    /**
     * @param string $view
     * @param array $data
     *
     * @return string
     */
    public function view(string $view, array $data = []): string
    {
        return $this->view->show($view, $data);
    }
}