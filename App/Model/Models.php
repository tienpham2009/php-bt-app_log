<?php
namespace App\Model;

class Models
{
    protected  $connect;

    public function __construct()
    {
        $database = new Databases();
        $this->connect  = $database->connect();
    }
}