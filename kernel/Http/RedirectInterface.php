<?php

namespace App\Kernel\Http;

interface RedirectInterface
{
    public function to($url): void;
}