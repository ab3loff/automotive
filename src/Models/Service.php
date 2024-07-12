<?php

namespace App\Models;

class Service
{
    public function __construct(
        private int $id,
        private string $name,
        private string $image
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function image(): string
    {
        return $this->image;
    }
}