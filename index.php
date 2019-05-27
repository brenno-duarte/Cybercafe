<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';
require 'dependences.php';
require 'rotas/rota-admin.php';
require 'rotas/rota-cliente.php';
require 'rotas/rota-noticia.php';
require 'rotas/rota-pontos.php';

$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'login.html');
})->setName('login');

$app->get('/dashboard', function ($request, $response, $args) {
    return $this->view->render($response, 'dashboard.html');
})->setName('dashboard');


$app->get('/produtos', function ($request, $response, $args) {
    return $this->view->render($response, 'produtos.html');
})->setName('produtos');

$app->get('/usuarios', function ($request, $response, $args) {
    return $this->view->render($response, 'usuarios.html');
})->setName('usuarios');

$app->run();