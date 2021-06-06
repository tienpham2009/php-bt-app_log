<?php

namespace App\Controller;

use App\Model\BlogDB;
use App\Service\BlogService;

class BlogController
{
    protected BlogDB $blogDB;
    protected BlogService $blogService;

    public function __construct()
    {
        $this->blogDB = new BlogDB();
        $this->blogService = new BlogService();
    }

    public function index()
    {
        $blogs = $this->blogDB->index();
        include "View/Blog/show-list.php";
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "View/Blog/add.php";
        } else {
            $error = array();
            $fields = ["title","teaser","content","dateCreate"];

            foreach ($fields as $field){
                if (empty($_POST[$field])){
                    $error[$field] = "Khong duoc de trong";
                }
            }
            if (empty($error)){
                $blog = $this->blogService->getData();
                $this->blogDB->create($blog);
                header("Location:./index.php?page=blog&action=show-list");
            }else{
                include "View/Blog/add.php";
            }
        }

    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
            $id = $_REQUEST["id"];
            $blogs = $this->blogDB->getById($id);
            include "View/Blog/update.php";
        }else{
            $id = $_POST["id"];
            $blog = $this->blogService->getData();
            $this->blogDB->update($blog, $id);
            header("Location:./index.php?page=blog&action=show-list");
        }
    }

    public function delete()
    {
        $ids = $_POST;
        $this->blogDB->delete($ids);
        header("Location:./index.php?page=blog&action=show-list");

    }

    public function detail()
    {
        $id = $_REQUEST["id"];
        $blog = $this->blogDB->getById($id);
        include "View/Blog/detail.php";
    }


}