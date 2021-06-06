<?php
include "vendor/autoload.php";
use App\Controller\BlogController;
$page = $_REQUEST["page"] ?? null;
$action = $_REQUEST["action"] ?? null;
$blogController = new BlogController();
switch ($page) {
    case "blog":
        switch ($action) {
            case "show-list":
                $blogController->index();
                break;
            case "add":
                $blogController->add();
                break;
            case "delete":
                $blogController->delete();
                break;
            case "update":
                $blogController->update();
                break;
            case "detail":
                $blogController->detail();
                break;
        }
        break;

}