<?php
namespace App\Model;

use PDO;
use PDOException;

class Databases
{
    protected string $dsn;
    protected string $user;
    protected string $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demo";
        $this->user = "root";
        $this->password = "200997";
    }

    public function connect(): PDO
    {
        try {
            return new PDO($this->dsn,$this->user,$this->password);
        }catch (PDOException $PDOException){
            echo $PDOException->getMessage();
            die();
        }
    }

}