<?php

require 'DAO/AdministradoresDAO.php';
require 'Model/Administradores.php';

$app->get('/admin', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $admin = new AdministradoresDAO();
        $res = $admin->listar();
        
        return $this->view->render($response, 'admin.html', [
            'admin' => $res 
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('admin');

$app->get('/cadastrarAdmin', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $empresa = new PontosFisicosDAO();
        $res = $empresa->listar();

        return $this->view->render($response, 'cadastraradmin.html', [
            'empresa' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('cadastrarAdmin');

$app->get('/alterarAdmin/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $admin = new AdministradoresDAO();
        $res = $admin->listarUnico($args['id']);

        $empresa = new PontosFisicosDAO();
        $res2 = $empresa->listar();
        
        return $this->view->render($response, 'alterarAdmin.html', [
            'admin' => $res,
            'empresa' => $res2
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('alterarAdmin');

$app->post('/cadastrarAdmin', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = filter_input(INPUT_POST, 'senha');
        $empresa = filter_input(INPUT_POST, 'empresa');

        $admin = new AdministradoresDAO();
        $adminModel = new Administradores();
        $adminModel->setUsuario($usuario);
        $adminModel->setSenha($senha);
        $adminModel->setEmpresa($empresa);
        $admin->salvar($adminModel);
        
        return $response->withRedirect($this->router->pathFor('admin'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('cadastrarAdmin');

$app->post('/alterarAdmin/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $usuario = filter_input(INPUT_POST, 'usuario');
        $senha = filter_input(INPUT_POST, 'senha');
        $empresa = filter_input(INPUT_POST, 'empresa');

        $admin = new AdministradoresDAO();
        $adminModel = new Administradores();
        $adminModel->setUsuario($usuario);
        $adminModel->setSenha($senha);
        $adminModel->setEmpresa($empresa);
        $admin->alterar($adminModel, $args['id']);
        
        return $response->withRedirect($this->router->pathFor('admin'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('alterarAdmin');

$app->get('/deletarAdmin/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $admin = new AdministradoresDAO();
        $admin->deletar($args['id']);
        return $response->withRedirect($this->router->pathFor('admin'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('deletarAdmin');