<?php

namespace App\Services;
use App\Kernel\Database\DatabaseInterface;
use App\Models\News;
use App\Kernel\Upload\UploadedFileInterface;
class NewsService
{
    public function __construct(private DatabaseInterface $db)
    {}

    public function all(): array
    {
        $news = $this->db->get('news');
        $arr = [];

        foreach ($news as $new) {
            $arr[] = new News($new[0], $new[1], $new[2], $new[3], $new[4], $new[5], $new[6]);
        }

        return $arr;
    }

    public function create(string $name, UploadedFileInterface $short_image, UploadedFileInterface $full_image, string $short_text, string $full_text, string $date): int|false
    {
        $path_img = $full_image->move('news');
        $path_img_short = $short_image->move('news');

        return $this->db->insert('news', [
            'name' => $name,
            'short_image' => $path_img_short,
            'full_image' => $path_img,
            'short_text' => $short_text,
            'full_text' => $full_text,
            'date' => $date
        ]);
    }

    public function delete(int $id): bool
    {
        return $this->db->delete('news', [
            'id' => $id
        ]);
    }
    public function find(int $id): News
    {
        $news = $this->db->first('news', [
            'id' => $id
        ]);

        return new News($news['id'], $news['name'], $news['short_image'], $news['full_image'], $news['short_text'], $news['full_text'], $news['date']);
    }
}