<?php

namespace App\Kernel\View;
use App\Kernel\Auth\AuthInterface;
use App\Kernel\Auth\Auth;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;
use App\Kernel\Storage\StorageInterface;
use App\Kernel\Storage\Storage;

class View implements ViewInterface
{

    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth,
        private StorageInterface $storage,
    )
    {}
    public function page(string $name, string $status = '', array $data = [], string $title = ''): void
    {
        $this->title = $title;

        if ($status == "admin") {
            $viewPath = APP_PATH . "/views/pages/admin/$name.php";
        }
        else {
            $viewPath = APP_PATH . "/views/pages/$name.php";
        }

        extract(array_merge($this->extractData(), $data));

        include $viewPath;
    }

    public function component(string $name, string $status = '', array $data = []): void
    {
        if ($status == "admin") {
            $viewPath = APP_PATH . "/views/components/admin/$name.php";
        }
        else {
            $viewPath = APP_PATH . "/views/components/$name.php";
        }

        extract(array_merge($this->extractData(), $data));

        include $viewPath;
    }

    private function extractData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
            'storage' => $this->storage,
        ];
    }
}