<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\NewsService;
class NewsController extends Controller
{

    public function index(): void
    {
        if ($this->request()->input('id')) {
            $news = $this->service()->find($this->request()->input('id'));
            $this->view('news', '', [
                'news' => $news
            ], $news->name());
        } else {
            $this->view('news', '', [
                'news' => $this->service()->all()
            ], 'Новости');
        }
    }

    public function addShow(): void
    {
        $this->view('news/add', 'admin', [], 'Добавить новость');
    }

    public function addNews(): void
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

            $this->redirect('/admin/news/add');
        }

        $this->service()->create(
            $this->request()->input('name'),
            $this->request()->file('short_image'),
            $this->request()->file('full_image'),
            $this->request()->input('short_text'),
            $this->request()->input('full_text'),
            $this->request()->input('date')
        );

        $this->session()->set('Успешно', 'Новость добавлена');
        $this->redirect('/admin/news/add');
    }


    public function deleteShow(): void
    {
        $this->view('news/delete', 'admin', [
            'news' => $this->service()->all()
        ], 'Удалить новость');
    }


    public function deleteNews(): void
    {
        $this->service()->delete($this->request()->input('id'));
        $this->session()->set('Успешно', 'Новость удалена');
        $this->redirect('/admin/news/add');
    }

    private function service(): NewsService
    {
        if (!isset($this->news)) {
            $this->news = new NewsService($this->db());
        }

        return $this->news;
    }


}