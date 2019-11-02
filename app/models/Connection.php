<?php

namespace App\models;

use PDO;

class Connection
{

    public static function connect()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=wonder", "root", "root");
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
    }

}