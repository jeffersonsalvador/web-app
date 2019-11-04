<?php
use MiladRahimi\PhpRouter\Router;

$router = new Router('', 'App\Controllers');

$router->get('/', 'UserController@home');
$router->post('/user', 'UserController@create');
$router->put('/user', 'UserController@update');
$router->delete('/user', 'UserController@destroy');
$router->get('/success/{iban}', 'UserController@success');

// Problems with put
$router->post('/user/update', 'UserController@update');

$router->dispatch();