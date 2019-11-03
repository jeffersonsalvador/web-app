<?php
use MiladRahimi\PhpRouter\Router;

$router = new Router('', 'App\Controllers');

$router->get('/', 'UserController@home');
$router->post('/user', 'UserController@create');
$router->get('/success', 'UserController@sucess');

$router->dispatch();