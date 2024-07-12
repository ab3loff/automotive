<?php

namespace App\Services;

use App\Kernel\Upload\UploadedFileInterface;
use App\Kernel\Database\DatabaseInterface;
use App\Models\Promo;

class PromoService
{
    public function __construct(private DatabaseInterface $db)
    {
    }

    public function create(string $name, UploadedFileInterface $short_image, UploadedFileInterface $full_image, string $short_text, string $full_text, string $date): int|false
    {
        $path_img = $full_image->move('promos');
        $path_short_img = $short_image->move('promos');

        return $this->db->insert('promos', [
            'name' => $name,
            'short_image' => $path_img,
            'full_image' => $path_short_img,
            'short_text' => $short_text,
            'full_text' => $full_text,
            'promo_date' => $date
        ]);
    }

    public function all(): array
    {
        $promos =$this->db->get('promos');
        $arr = [];

        foreach ($promos as $promo) {
            $arr[] = new Promo($promo[0], $promo[1], $promo[2], $promo[3], $promo[4], $promo[5], $promo[6]);
        }

        return $arr;

    }

    public function delete(int $id): bool
    {
        return $this->db->delete('promos', [
            'id' => $id
        ]);
    }

    public function find(int $id): Promo
    {
        $promo = $this->db->first('promos', [
            'id' => $id
        ]);

        return new Promo($promo['id'], $promo['name'], $promo['short_image'], $promo['full_image'], $promo['short_text'], $promo['full_text'], $promo['promo_date']);
    }
}