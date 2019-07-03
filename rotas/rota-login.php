<?php

require_once 'DAO/AdministradoresDAO.php';
require_once 'Model/Administradores.php';

$app->get('/', function ($request, $response, $args) {
    return $response->withRedirect($this->router->pathFor('login'), 302);
})->setName('inicio');

$app->get('/login', function ($request, $response, $args) {
    return $this->view->render($response, 'login.html');
})->setName('login');

$app->post('/login', function ($request, $response, $args) {
    
    $usuario = filter_input(INPUT_POST, 'usuario');
    $senha = filter_input(INPUT_POST, 'senha');

    $admin = new AdministradoresDAO();
    $adminModel = new Administradores();
    $adminModel->setUsuario($usuario);
    $adminModel->setSenha($senha);

    #$admin->login($adminModel);

    if ($admin->login($adminModel)) {
        return $response->withRedirect($this->router->pathFor('dashboard'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'), 302);
    }

})->setName('login');

$app->get('/logout', function ($request, $response, $args) {
    
    session_destroy();
    return $response->withRedirect($this->router->pathFor('login'));
})->setName('logout');