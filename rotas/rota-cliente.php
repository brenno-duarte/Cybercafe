<?php

require 'DAO/ClientesDAO.php';
require 'Model/Clientes.php';

$app->get('/clientes', function ($request, $response, $args) {

    $clienteDAO = new ClientesDAO();
    $res = $clienteDAO->listar();
    
    return $this->view->render($response, 'clientes.html', [
        'clientes' => $res
    ]);

})->setName('clientes');

$app->get('/cadastrarClientes', function ($request, $response, $args) {
    return $this->view->render($response, 'cadastrarcliente.html');
})->setName('cadastrarClientes');

$app->get('/AlterarClientes/{id}', function ($request, $response, $args) {

    $clienteDAO = new ClientesDAO();
    $res = $clienteDAO->listarUnico($args['id']);

    return $this->view->render($response, 'alterarcliente.html', [
        'cliente' => $res
    ]);

})->setName('AlterarClientes');

$app->post('/cadastrarClientes', function ($request, $response, $args) {
    
    $nome = filter_input(INPUT_POST, 'nome');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $ponto = filter_input(INPUT_POST, 'ponto');
    $vip = filter_input(INPUT_POST, 'vip');

    $clienteModel = new Clientes();
    $clienteDAO = new ClientesDAO();

    $clienteModel->setNome($nome);
    $clienteModel->setCpf($cpf);
    $clienteModel->setPonto_registrado($ponto);
    $clienteModel->setVip($vip);

    $clienteDAO->salvar($clienteModel);
    
    return $response->withRedirect($this->router->pathFor('clientes'));
})->setName('cadastrarClientes');

$app->post('/AlterarClientes/{id}', function ($request, $response, $args) {
    
    $nome = filter_input(INPUT_POST, 'nome');
    $cpf = filter_input(INPUT_POST, 'cpf');
    $ponto = filter_input(INPUT_POST, 'ponto');
    $vip = filter_input(INPUT_POST, 'vip');

    $clienteModel = new Clientes();
    $clienteDAO = new ClientesDAO();

    $clienteModel->setNome($nome);
    $clienteModel->setCpf($cpf);
    $clienteModel->setPonto_registrado($ponto);
    $clienteModel->setVip($vip);

    $clienteDAO->alterar($clienteModel, $args['id']);
    
    return $response->withRedirect($this->router->pathFor('clientes'));
})->setName('AlterarClientes');

$app->get('/DeletarCliente/{id}', function ($request, $response, $args) {

    $clienteDAO = new ClientesDAO();
    $clienteDAO->deletar($args['id']);
    
    return $response->withRedirect($this->router->pathFor('clientes'));
})->setName('DeletarCliente');