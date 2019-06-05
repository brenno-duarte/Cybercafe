<?php

require 'DAO/ProdutosDAO.php';
require 'Model/Produtos.php';

$app->get('/produtos', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $prodDAO = new ProdutosDAO();
        $res = $prodDAO->listar();

        return $this->view->render($response, 'produtos.html', [
            'produtos' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('produtos');

$app->get('/produtosCadastro', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $clienteDAO = new ClientesDAO();
        $res = $clienteDAO->listar();

        return $this->view->render($response, 'cadastrarproduto.html', [
            'clientes' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('produtosCadastro');

$app->get('/produtosAlterar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $prodDAO = new ProdutosDAO();
        $clienteDAO = new ClientesDAO();
        $res = $prodDAO->listarUnico($args['id']);
        $res2 = $clienteDAO->listar();
        
        return $this->view->render($response, 'alterarproduto.html', [
            'prod' => $res,
            'clientes' => $res2
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
  
})->setName('produtosAlterar');

$app->post('/produtosCadastro', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
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
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('produtosCadastro');

$app->post('/produtosAlterar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
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
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('produtosAlterar');

$app->get('/produtosDeletar/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $prodDAO = new ProdutosDAO();
        $prodDAO->deletar($args['id']);
        
        return $response->withRedirect($this->router->pathFor('produtos'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('produtosDeletar');