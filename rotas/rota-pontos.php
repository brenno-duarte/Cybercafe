<?php

require 'DAO/PontosFisicosDAO.php';
require 'Model/PontosFisicos.php';

$app->get('/pontos', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $pontos = new PontosFisicosDAO();
        $res = $pontos->listar();

        return $this->view->render($response, 'pontos.html', [
            'ponto' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('pontos');

$app->get('/pontosCadastrar', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        return $this->view->render($response, 'cadastrarponto.html');
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('pontosCadastrar');

$app->get('/pontosAlterar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $pontos = new PontosFisicosDAO();
        $res = $pontos->listarUnico($args['id']);
        
        return $this->view->render($response, 'alterarponto.html', [
            'ponto' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('pontosAlterar');

$app->post('/pontosCadastrar', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
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
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
        
})->setName('pontosCadastrar');

$app->post('/pontosAlterar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
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
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('pontosAlterar');

$app->get('/pontosDeletar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        try {
            $pontos = new PontosFisicosDAO();
            $pontos->deletar($args['id']);
            
            return $response->withRedirect($this->router->pathFor('pontos'));
        } catch (PDOException $e) {
            return $response->withRedirect($this->router->pathFor('erroChave'));
        }
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('pontosDeletar');
