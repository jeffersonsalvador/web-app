<?php

namespace App\models;

abstract class Model
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connection::connect();
    }


}