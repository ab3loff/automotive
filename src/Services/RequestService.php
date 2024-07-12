<?php

namespace App\Services;
use App\Models\Request;
use App\Kernel\Database\DatabaseInterface;

class RequestService
{

    public function __construct(private DatabaseInterface $db)
    {}

    public function create(int $user_id, string $user_name, string $user_email, string $service, string $description, string $date): int|false
    {
        return $this->db->insert('requests', [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'service' => $service,
            'description' => $description,
            'date' => $date
        ]);
    }
    public function all(): array
    {
        $requests = $this->db->get('requests');
        $arr = [];
        foreach($requests as $request) {
            $arr[] = new Request($request[0], $request[1], $request[2], $request[3], $request[4], $request[5], $request[6]);
        }
        return $arr;
    }
}