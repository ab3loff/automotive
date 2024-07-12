<?php

namespace App\Controllers;
use App\Kernel\Controller\Controller;

class LoginController extends Controller
{

    public function index(): void
    {
        $this->view('login', '', [], 'Авторизация');
    }

    public function login(): void
    {
        $email = $this->request()->input('email');
        $password = $this->request()->input('password');
        if ($this->auth()->attempt($email, $password)) {
            $this->redirect('/');
        } else {
            $this->redirect('/login');
        }
    }

    public function logout(): void
    {
        $this->auth()->logout();
        $this->redirect('/');
    }
}