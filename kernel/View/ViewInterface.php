<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page(string $name, string $status = '', array $data = [], string $title = ''): void;
    public function component(string $name, string $status = '', array $data = []): void;
}