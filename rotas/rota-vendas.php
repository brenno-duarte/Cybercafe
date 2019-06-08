<?php

require 'DAO/VendasDAO.php';
require 'Model/Vendas.php';

$app->get('/vendas', function($request, $response){
	if ($_SESSION['logado']) {
    	$venda = new VendasDAO();
    	$res = $venda->listar();
        
        return $this->view->render($response, 'vendas.html', [
        	'venda' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
})->setName('vendas');

$app->get('/vendasCadastrar', function($request, $response){
	if ($_SESSION['logado']) {
    	$empresa = new PontosFisicosDAO();
    	$cliente = new ClientesDAO();
    	$func = new UsuariosDAO();
        $produto = new ProdutosDAO();

    	$res1 = $empresa->listar();
    	$res2 = $cliente->listar();
    	$res3 = $func->listar();
        $res4 = $produto->listar();
        
        return $this->view->render($response, 'vendascadastro.html', [
        	'empresa' => $res1,
        	'cliente' => $res2,
        	'func' => $res3,
            'prod' => $res4
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
})->setName('vendasCadastrar');

$app->get('/vendasAlterar/{id}', function($request, $response, $args){
	if ($_SESSION['logado']) {
       	$empresa = new PontosFisicosDAO();
    	$cliente = new ClientesDAO();
    	$func = new UsuariosDAO();
        $produto = new ProdutosDAO();

    	$res1 = $empresa->listar();
    	$res2 = $cliente->listar();
    	$res3 = $func->listar();
        $res4 = $produto->listar();

       	$venda = new VendasDAO();
    	$res = $venda->listarUnico($args['id']);
        
        return $this->view->render($response, 'vendasalterar.html', [
        	'vendas' => $res,
        	'empresa' => $res1,
        	'cliente' => $res2,
        	'func' => $res3,
            'prod' => $res4
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
})->setName('vendasAlterar');

$app->post('/vendasCadastrar', function($request, $response){
	if ($_SESSION['logado']) {
        
        $empresa = filter_input(INPUT_POST, 'empresa');
        $cliente = filter_input(INPUT_POST, 'cliente');
        $func = filter_input(INPUT_POST, 'func');
        $produtos = filter_input(INPUT_POST, 'produtos');
        $pag = filter_input(INPUT_POST, 'pag');
        
        $vendas = new Vendas();
        $vendasDAO = new VendasDAO();
        $vendas->setCliente($cliente);
        $vendas->setEmpresa($empresa);
        $vendas->setFuncionario($func);
        $vendas->setProduto($produtos);
        $vendas->setPagamento($pag);
        $vendasDAO->salvar($vendas);

        return $response->withRedirect($this->router->pathFor('vendas'));
        
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
})->setName('vendasCadastrar');

$app->post('/vendasAlterar/{id}', function($request, $response, $args){
	if ($_SESSION['logado']) {
    	$vendas = new Vendas();
        $vendasDAO = new VendasDAO();

    	$empresa = filter_input(INPUT_POST, 'empresa');
    	$cliente = filter_input(INPUT_POST, 'cliente');
    	$func = filter_input(INPUT_POST, 'func');
        $produtos = filter_input(INPUT_POST, 'produtos');
        $pag = filter_input(INPUT_POST, 'pag');
    	
        $vendas->setCliente($cliente);
        $vendas->setEmpresa($empresa);
        $vendas->setFuncionario($func);
        $vendas->setProduto($produtos);
        $vendas->setPagamento($pag);
        $vendasDAO->alterar($vendas, $args['id']);

        return $response->withRedirect($this->router->pathFor('vendas'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
})->setName('vendasAlterar');

$app->get('/vendasDeletar/{id}', function($request, $response, $args){
	if ($_SESSION['logado']) {
       	$vendasDAO = new VendasDAO();
       	$vendasDAO->deletar($args['id']);
        
        return $response->withRedirect($this->router->pathFor('vendas'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
})->setName('vendasDeletar');