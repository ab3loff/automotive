<?php

namespace App\Kernel\Auth;

class User
{
    public function __construct(
        public int $id,
        public string $name,
        public string $username,
        public string $password,
        public int $isAdmin = 0
    ) {}

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function isAdmin(): int
    {
        return $this->isAdmin;
    }


}