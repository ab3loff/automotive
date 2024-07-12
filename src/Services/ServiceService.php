<?php

namespace App\Services;
use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Service;

class  ServiceService
{

    public function __construct(private DatabaseInterface $db)
    {}

    public function create(string $name, UploadedFileInterface $image): int|false
    {
        $filePath = $image->move('services');

        return $this->db->insert('services', [
            'name' => $name,
            'image' => $filePath
        ]);
    }

    public function all(): array
    {
        $services = $this->db->get('services');
        $arr = [];
        foreach($services as $service) {
            $arr[] = new Service($service[0], $service[1], $service[2]);
        }
        return $arr;
    }

    public function delete(int $id): bool
    {
        return $this->db->delete('services', [
            'id' => $id
        ]);
    }
}