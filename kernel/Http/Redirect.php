<?php

namespace App\Kernel\Http;

class Redirect implements RedirectInterface
{
    public function to($url): void
    {
        header('Location:'. $url);
        exit;
    }
}