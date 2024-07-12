<?php

namespace App\Models;

class Request
{
        public function __construct(
            public int $id,
            public int $user_id,
            public string $user_name,
            public string $user_email,
            public string $service,
            public string $description,
            public string $date,
        ) {}

        public function id() { return $this->id; }
        public function user_id() { return $this->user_id; }
        public function user_name() { return $this->user_name; }
        public function user_email() { return $this->user_email; }
        public function service() { return $this->service; }
        public function description() { return $this->description; }
        public function date() { return $this->date; }
}