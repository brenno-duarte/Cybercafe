<?php

require 'DAO/PagamentosDAO.php';
require 'Model/Pagamentos.php';

$app->get('/pagamento', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $venda = new PagamentosDAO();
        $res = $venda->listar();
        
        return $this->view->render($response, 'pagamento.html', [
            'venda' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('pagamento');

$app->get('/realizarPag/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $venda = new PagamentosDAO();
        $res = $venda->listarUnico($args['id']);
        
        return $this->view->render($response, 'efetuarpag.html', [
            'pag' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('realizarPag');

$app->post('/realizarPag/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $empresa = filter_input(INPUT_POST, 'empresa');
        $cliente = filter_input(INPUT_POST, 'cliente');
        $func = filter_input(INPUT_POST, 'func');
        $produto = filter_input(INPUT_POST, 'produto');
        
        echo '<pre>';
        var_dump($empresa);
        var_dump($cliente);
        var_dump($func);
        var_dump($produto);

    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('realizarPag');