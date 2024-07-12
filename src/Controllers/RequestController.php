<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\ServiceService;
use App\Services\RequestService;

class RequestController extends Controller
{

    public function index(): void
    {
        $services = new ServiceService($this->db());
        $this->view('request', '', ['services' => $services->all()], 'Заявка');
    }

    public function adminShow(): void
    {
        $requests = new RequestService($this->db());
        $this->view('request/index', 'admin', ['requests' => $requests->all()]);
    }

    public function requests()
    {
        if (!$this->auth()->user()) {
            $this->redirect('/login');
        }
        if ($this->db()->first('requests', ['time'=>$this->request()->input('time'), 'date'=>$this->request()->input('date')])) {
            echo 'Заявка уже существует';
        } else {
            $this->db()->insert('requests', [
                'user_id' => $this->auth()->user()->id(),
                'user_name' => $this->auth()->user()->name(),
                'user_email' => $this->auth()->user()->username(),
                'service' => $this->request()->input('service'),
                'description' => $this->request()->input('description'),
                'date' => $this->request()->input('date'),
                'time' => $this->request()->input('time')
            ]);
            $this->redirect('/');
        }


    }
}