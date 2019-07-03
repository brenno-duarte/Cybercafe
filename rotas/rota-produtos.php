<?php

require 'DAO/ProdutosDAO.php';
require 'Model/Produtos.php';

$app->get('/produtos', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $prodDAO = new ProdutosDAO();
        $res = $prodDAO->listar($_SESSION['logado']);

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
        $empresa = new EmpresaDAO();
        $func = new FuncionariosDAO();

        $res = $clienteDAO->listar();
        $res2 = $empresa->listar();
        $res3 = $func->listar();

        return $this->view->render($response, 'cadastrarproduto.html', [
            'clientes' => $res,
            'empresa' => $res2,
            'func' => $res3
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('produtosCadastro');

$app->get('/produtosAlterar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $prodDAO = new ProdutosDAO();
        $clienteDAO = new ClientesDAO();
        $empresa = new EmpresaDAO();
        $func = new FuncionariosDAO();
        $res = $prodDAO->listarUnico($args['id']);
        $res2 = $clienteDAO->listar();
        $res3 = $empresa->listar();
        $res4 = $func->listar();

        return $this->view->render($response, 'alterarproduto.html', [
            'prod' => $res,
            'clientes' => $res2,
            'empresa' => $res3,
            'func' => $res4
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
        #$empresa = filter_input(INPUT_POST, 'empresa');
        $func = filter_input(INPUT_POST, 'func');

        $prod = new Produtos();
        $prodDAO = new ProdutosDAO();
        $prod->setNome($nome);
        $prod->setCategoria($categoria);
        $prod->setTipo($tipo);
        $prod->setPreco($preco);
        $prod->setCliente($cliente);
        $prod->setFuncionario($func);
        $prod->setEmpresa($_SESSION['logado']);
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
        $empresa = filter_input(INPUT_POST, 'empresa');
        $func = filter_input(INPUT_POST, 'func');

        $prod = new Produtos();
        $prodDAO = new ProdutosDAO();
        $prod->setNome($nome);
        $prod->setCategoria($categoria);
        $prod->setTipo($tipo);
        $prod->setPreco($preco);
        $prod->setCliente($cliente);
        $prod->setFuncionario($func);
        $prod->setEmpresa($empresa);
        $prodDAO->alterar($prod, $args['id']);
        
        return $response->withRedirect($this->router->pathFor('produtos'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('produtosAlterar');

$app->get('/produtosDeletar/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        try {
            $prodDAO = new ProdutosDAO();
            $prodDAO->deletar($args['id']);
            
            return $response->withRedirect($this->router->pathFor('produtos'));
        } catch (PDOException $e) {
            return $response->withRedirect($this->router->pathFor('erroChave'));
        }
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('produtosDeletar');