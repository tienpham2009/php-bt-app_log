<?php

namespace App\Model;

use App\Blog;

class BlogDB extends Models
{
    public function index()
    {
        $sql = "SELECT * FROM blog";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        $blogs = [];


        foreach ($result as $item) {
            $data = [
                "title" => $item["Title"],
                "teaser" => $item["Teaser"],
                "content" => $item["Content"],
                "dateCreate" => $item["Date_Create"],
            ];
            $blog = new Blog($data);
            $blog->setId($item["Id"]);

            $blogs[] = $blog;
        }
        return $blogs;
    }

    public function create($blog)
    {
        $sql = "INSERT INTO `blog`(`Title`, `Teaser`, `Content`, `Date_Create`) VALUES (:title,:teaser,:content,:dateCreat)";
        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam("title", $blog->title);
        $stmt->bindParam("teaser", $blog->teaser);
        $stmt->bindParam("content", $blog->content);
        $stmt->bindParam("dateCreat", $blog->dateCreat);

        return $stmt->execute();
    }

    public function delete($ids)
    {
        foreach ($ids as $value) {
            $sql = "DELETE FROM `blog` WHERE `blog`.`Id` = :value";
            $stmt = $this->connect->prepare($sql);

            $stmt->bindParam(":value", $value);

            $stmt->execute();
        }
    }

    public function update($blog,int $id)
    {
        $sql = "UPDATE blog SET 
                Title = :title,
                Teaser = :teaser,
                Content = :content,
                Date_Create = :dateCreat 
                WHERE 
                      Id = :id";
        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam("title", $blog->title);
        $stmt->bindParam("teaser", $blog->teaser);
        $stmt->bindParam("content", $blog->content);
        $stmt->bindParam("dateCreat", $blog->dateCreat);
        $stmt->bindParam("id",  $id);

        return $stmt->execute();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM blog WHERE Id = :id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $blogs = [];
        $result = $stmt->fetchAll();
        foreach ($result as $item) {
            $data = [
                "title" => $item["Title"],
                "teaser" => $item["Teaser"],
                "content" => $item["Content"],
                "dateCreate" => $item["Date_Create"],
            ];
            $blog = new Blog($data);
            $blog->setId($item["Id"]);
            $blogs[] = $blog;
        }
        return $blogs;
    }
}