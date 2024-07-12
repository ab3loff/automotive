<?php

namespace App\Controllers;
use App\Kernel\View\View;
use App\Kernel\Controller\Controller;
use App\Kernel\Http\Request;
use App\Models\Service;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    public function addShow(): void
    {
        $this->view('service/add', 'admin', [], 'Добавление услуги');
    }

    public function addService(): void
    {

        $validation = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);

        if (!$validation) {
            foreach($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/admin/service/add');
        }

        $this->service()->create(
            $this->request()->input('name'),
            $this->request()->file('image'),
        );

        $this->session()->set('Успешно', 'Услуга добавлена');
        $this->redirect('/admin/service/add');
        
    }

    public function deleteShow(): void
    {
        $this->view('service/delete', 'admin', [
            'services' => $this->service()->all()
        ], 'Удаление услуги');
    }

    public function deleteService(): void
    {
        $this->service()->delete($this->request()->input('id'));
        $this->session()->set('Успешно', 'Услуга удалена');
        $this->redirect('/admin/service/delete');
    }

    private function service(): ServiceService
    {
        if (! isset($this->service)) {
            $this->service = new ServiceService($this->db());
        }

        return $this->service;
    }
}