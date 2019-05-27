<?php

require 'DAO/AdministradoresDAO.php';
require 'Model/Administradores.php';

$app->get('/admin', function ($request, $response, $args) {
    
    $admin = new AdministradoresDAO();
    $res = $admin->listar();
    
    return $this->view->render($response, 'admin.html', [
        'admin' => $res 
    ]);

})->setName('admin');

$app->get('/cadastrarAdmin', function ($request, $response, $args) {

    return $this->view->render($response, 'cadastraradmin.html');

})->setName('cadastrarAdmin');

$app->get('/alterarAdmin/{id}', function ($request, $response, $args) {
    
    $admin = new AdministradoresDAO();
    $res = $admin->listarUnico($args['id']);
    
    return $this->view->render($response, 'alterarAdmin.html', [
        'admin' => $res
    ]);

})->setName('alterarAdmin');

$app->post('/cadastrarAdmin', function ($request, $response, $args) {
    
    $usuario = filter_input(INPUT_POST, 'usuario');
    $senha = filter_input(INPUT_POST, 'senha');

    $admin = new AdministradoresDAO();
    $adminModel = new Administradores();
    $adminModel->setUsuario($usuario);
    $adminModel->setSenha($senha);

    $admin->salvar($adminModel);
    
    return $response->withRedirect($this->router->pathFor('admin'));

})->setName('cadastrarAdmin');

$app->post('/alterarAdmin/{id}', function ($request, $response, $args) {
    
    $usuario = filter_input(INPUT_POST, 'usuario');
    $senha = filter_input(INPUT_POST, 'senha');

    $admin = new AdministradoresDAO();
    $adminModel = new Administradores();
    $adminModel->setUsuario($usuario);
    $adminModel->setSenha($senha);

    $admin->alterar($adminModel, $args['id']);
    
    return $response->withRedirect($this->router->pathFor('admin'));

})->setName('alterarAdmin');

$app->get('/deletarAdmin/{id}', function ($request, $response, $args) {

    $admin = new AdministradoresDAO();
    $admin->deletar($args['id']);
    return $response->withRedirect($this->router->pathFor('admin'));

})->setName('deletarAdmin');