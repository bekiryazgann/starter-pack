<?php

namespace app\Controllers;

use src\Controller;
use src\Http\Request;
use src\Router\Attributes\Route;

class Home extends Controller
{
    /**
     * @param \src\Http\Request $request
     *
     * @return string
     */
    #[Route('/')]
    public function index(Request $request): string
    {
        return $this->view('home');
  }
}
