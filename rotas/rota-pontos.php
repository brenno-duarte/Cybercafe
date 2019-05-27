<?php

require 'DAO/PontosFisicosDAO.php';
require 'Model/PontosFisicos.php';

$app->get('/pontos', function ($request, $response, $args) {

    $pontos = new PontosFisicosDAO();
    $res = $pontos->listar();

    return $this->view->render($response, 'pontos.html', [
        'ponto' => $res
    ]);
})->setName('pontos');

$app->get('/pontosCadastrar', function ($request, $response, $args) {
    return $this->view->render($response, 'cadastrarponto.html');
})->setName('pontosCadastrar');

$app->get('/pontosAlterar/{id}', function ($request, $response, $args) {
    
    $pontos = new PontosFisicosDAO();
    $res = $pontos->listarUnico($args['id']);
    
    return $this->view->render($response, 'alterarponto.html', [
        'ponto' => $res
    ]);
})->setName('pontosAlterar');

$app->post('/pontosCadastrar', function ($request, $response, $args) {
    
    $cnpj = filter_input(INPUT_POST, 'cnpj');
    $comercial = filter_input(INPUT_POST, 'comercial');
    $tipo = filter_input(INPUT_POST, 'tipo');
    $contrato = filter_input(INPUT_POST, 'contrato');
    $maquinas = filter_input(INPUT_POST, 'maquinas');

    $pontos = new PontosFisicosDAO();
    $pontosModel = new PontosFisicos();

    $pontosModel->setCnpj($cnpj);
    $pontosModel->setNome_comercial($comercial);
    $pontosModel->setTipo($tipo);
    $pontosModel->setContrato($contrato);
    $pontosModel->setMaquinas_ativas($maquinas);

    $pontos->salvar($pontosModel);
    
    return $response->withRedirect($this->router->pathFor('pontos'));
})->setName('pontosCadastrar');

$app->post('/pontosAlterar/{id}', function ($request, $response, $args) {
    
    $cnpj = filter_input(INPUT_POST, 'cnpj');
    $comercial = filter_input(INPUT_POST, 'comercial');
    $tipo = filter_input(INPUT_POST, 'tipo');
    $contrato = filter_input(INPUT_POST, 'contrato');
    $maquinas = filter_input(INPUT_POST, 'maquinas');

    $pontos = new PontosFisicosDAO();
    $pontosModel = new PontosFisicos();

    $pontosModel->setCnpj($cnpj);
    $pontosModel->setNome_comercial($comercial);
    $pontosModel->setTipo($tipo);
    $pontosModel->setContrato($contrato);
    $pontosModel->setMaquinas_ativas($maquinas);

    $pontos->alterar($pontosModel, $args['id']);
    
    return $response->withRedirect($this->router->pathFor('pontos'));
})->setName('pontosAlterar');
