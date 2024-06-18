<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/scanner', 'PessoasController@scannerPessoa');
$router->post('/registrarPontos', 'PessoasController@addScanner');


