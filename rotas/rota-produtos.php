<?php

require 'DAO/ProdutosDAO.php';
require 'Model/Produtos.php';

$app->get('/produtos', function ($request, $response, $args) {

    $prodDAO = new ProdutosDAO();
    $res = $prodDAO->listar();

    return $this->view->render($response, 'produtos.html', [
        'produtos' => $res
    ]);
})->setName('produtos');

$app->get('/produtosCadastro', function ($request, $response, $args) {
    return $this->view->render($response, 'cadastrarproduto.html');
})->setName('produtosCadastro');

$app->get('/produtosAlterar/{id}', function ($request, $response, $args) {
    
    $prodDAO = new ProdutosDAO();
    $res = $prodDAO->listarUnico($args['id']);
    
    return $this->view->render($response, 'alterarproduto.html', [
        'prod' => $res
    ]);
})->setName('produtosAlterar');

$app->post('/produtosCadastro', function ($request, $response, $args) {
    
    $nome = filter_input(INPUT_POST, 'nome');
    $categoria = filter_input(INPUT_POST, 'categoria');
    $tipo = filter_input(INPUT_POST, 'tipo');
    $preco = filter_input(INPUT_POST, 'preco');
    $cliente = filter_input(INPUT_POST, 'cliente');

    $prod = new Produtos();
    $prodDAO = new ProdutosDAO();

    $prod->setNome($nome);
    $prod->setCategoria($categoria);
    $prod->setTipo($tipo);
    $prod->setPreco($preco);
    $prod->setCliente($cliente);

    $prodDAO->salvar($prod);
    
    return $response->withRedirect($this->router->pathFor('produtos'));
})->setName('produtosCadastro');

$app->post('/produtosAlterar/{id}', function ($request, $response, $args) {
    
    $nome = filter_input(INPUT_POST, 'nome');
    $categoria = filter_input(INPUT_POST, 'categoria');
    $tipo = filter_input(INPUT_POST, 'tipo');
    $preco = filter_input(INPUT_POST, 'preco');
    $cliente = filter_input(INPUT_POST, 'cliente');

    $prod = new Produtos();
    $prodDAO = new ProdutosDAO();

    $prod->setNome($nome);
    $prod->setCategoria($categoria);
    $prod->setTipo($tipo);
    $prod->setPreco($preco);
    $prod->setCliente($cliente);

    $prodDAO->alterar($prod, $args['id']);
    
    return $response->withRedirect($this->router->pathFor('produtos'));
})->setName('produtosAlterar');

$app->get('/produtosDeletar/{id}', function ($request, $response, $args) {

    $prodDAO = new ProdutosDAO();
    $prodDAO->deletar($args['id']);
    
    return $response->withRedirect($this->router->pathFor('produtos'));
})->setName('produtosDeletar');