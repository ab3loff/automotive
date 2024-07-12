<?php

namespace App\Controllers;

use App\Kernel\View\View;
use App\Kernel\Controller\Controller;
use App\Models\Service;
use App\Services\NewsService;
use App\Services\PromoService;
use App\Services\ServiceService;

class HomeController extends Controller
{
    public function index(): void
    {
        $services = new ServiceService($this->db());
        $promos = new PromoService($this->db());
        $news = new NewsService($this->db());

        $this->view('home', '', [
            'services' => $services->all(),
            'promos' => $promos->all(),
            'news' => $news->all()
        ], 'Автомотив');
    }
}