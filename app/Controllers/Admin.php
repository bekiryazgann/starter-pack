<?php

namespace app\Controllers;

use src\Controller;
use src\Http\Request;
use src\Router\Attributes\Route;

class Admin extends Controller
{
    /**
     * @return string
     */
    #[Route('/admin')]
    public function index(): string
    {
        return $this->view('admin.home');
    }

    /**
     * @param Request $request
     * @return string
     */
    #[Route('/admin/auth/login')]
    public function login(Request $request): string
    {
        if ($request->isMethod('POST')) {
            redirect(site('admin'))
                ->send([
                    'title' => 'Başarılı!',
                    'message' => 'Başarılı bir şekilde giriş yaptınız.'
                ]);
        }
        return $this->view('admin.core.auth.login');
    }
}