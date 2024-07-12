<?php

namespace App\Models;

class News
{

    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $short_image,
        public readonly string $full_image,
        public readonly string $short_text,
        public readonly string $full_text,
        public readonly string $news_date
    )
    {}

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

    public function news_date(): string
    {
        return $this->news_date;
    }

}