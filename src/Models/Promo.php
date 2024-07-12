<?php

namespace App\Models;

class Promo
{
    public function __construct(
        private int $id,
        private string $name,
        private string $short_image,
        private string $full_image,
        private string $short_text,
        private string $full_text,
        private string $promo_date
    ) {}


    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function short_image(): string
    {
        return $this->short_image;
    }

    public function full_image(): string
    {
        return $this->full_image;
    }

    public function short_text(): string
    {
        return $this->short_text;
    }

    public function full_text(): string
    {
        return $this->full_text;
    }

    public function promo_date(): string
    {
        return $this->promo_date;
    }

}