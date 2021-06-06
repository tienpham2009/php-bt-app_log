<?php
namespace App\Service;

use App\Blog;
use JetBrains\PhpStorm\Pure;

class BlogService
{
    public function getData()
    {
        $data  = [
            "title" => $_POST["title"],
            "teaser" => $_POST["teaser"],
            "content" => $_POST["content"],
            "dateCreate" => $_POST["dateCreate"]
        ];

        return new Blog($data);
    }
}