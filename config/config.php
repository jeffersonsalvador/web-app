<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

define("DATA_LAYER_CONFIG", [
    "driver" => getenv('DB_CONNECTION'),
    "host" => getenv("DB_HOST"),
    "port" => getenv("DB_PORT"),
    "dbname" => getenv("DB_DATABASE"),
    "username" => getenv("DB_USERNAME"),
    "passwd" => getenv("DB_PASSWORD"),
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);