<?php

require_once 'DAO/ClientesDAO.php';
require_once 'DAO/ProdutosDAO.php';
require_once 'DAO/UsuariosDAO.php';

$app->get('/dashboard', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {

        $cliente = new ClientesDAO();
        $func = new UsuariosDAO();
        $prod = new ProdutosDAO();

        $res1 = $cliente->listarN();
        $res2 = $func->listarN();
        $res3 = $prod->listarN();

        return $this->view->render($response, 'dashboard.html', [
            'clientes' => $res1,
            'func' => $res2,
            'prod' => $res3
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('dashboard');

$app->get('/cloud', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        return $this->view->render($response, 'armazenamento.html');
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('cloud');

$app->get('/credito', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        return $this->view->render($response, 'credito.html');
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('credito');

$app->get('/erroChave', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        return $this->view->render($response, 'errochave.html');
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('erroChave');