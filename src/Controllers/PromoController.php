<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\PromoService;

class PromoController extends Controller
{

    public function index(): void
    {
        $this->promo = new PromoService($this->db());

        if ($this->request()->input('id')) {
            $promo = $this->promo->find($this->request()->input('id'));

            $this->view('promos', '', [
                'promo' => $promo
            ], $promo->name());

        } else {
            $this->view('promos', '', [
                'promos' => $this->promo->all()
            ], 'Акции');
        }
    }

    public function addShow(): void
    {
        $this->view('promo/add', 'admin', [], 'Добавить акцию');
    }

    public function deleteShow(): void
    {
        $this->view('promo/delete', 'admin', [
            'promos' => $this->service()->all()
        ], 'Удалить акцию');
    }

    public function deletePromo(): void
    {
        $this->service()->delete($this->request()->input('id'));
        $this->session()->set('Успешно', 'Акция удалена');
        $this->redirect('/admin/promo/delete');
    }

    public function addPromo(): void
    {
        $validation = $this->request()->validate([
            'name' => ['required'],
            'short_text' => ['required', 'min:3', 'max:255'],
            'full_text' => ['required'],
            'date' => ['required']
        ]);

        if (!$validation) {
            foreach($this->request()->errors() as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect('/admin/promo/add');
        }

        $this->service()->create(
            $this->request()->input('name'),
            $this->request()->file('short_image'),
            $this->request()->file('full_image'),
            $this->request()->input('short_text'),
            $this->request()->input('full_text'),
            $this->request()->input('date')
        );

        $this->session()->set('Успешно', 'Акция добавлена');
        $this->redirect('/admin/promo/add');
    }

    private function service(): PromoService
    {
        if (!isset($this->promo)) {
            $this->promo = new PromoService($this->db());
        }

        return $this->promo;

    }
}