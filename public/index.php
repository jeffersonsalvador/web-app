<?php
ini_set("display_errors", true);
error_reporting(E_ALL);

require_once "../vendor/autoload.php";

use CoffeeCode\DataLayer\Connect;

$con = Connect::getInstance();
$error = Connect::getError();
if ($error) {
    echo 'Database connection error, check your .env file: ' . $error->getMessage();
    die;
} else {
    include_once "../config/routes.php";
}