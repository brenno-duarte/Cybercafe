<?php

require 'DAO/FuncionariosDAO.php';
require 'Model/Funcionarios.php';

$app->get('/usuarios', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $usuariosDAO = new FuncionariosDAO();
        $res = $usuariosDAO->listar();

        return $this->view->render($response, 'usuarios.html', [
            'usuarios' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('usuarios');

$app->get('/usuariosCadastro', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $pontos = new EmpresaDAO();
        $res = $pontos->listar();

        return $this->view->render($response, 'cadastrarusuario.html', [
            'pontos' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('usuariosCadastro');

$app->get('/usuariosAlterar/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $usuariosDAO = new FuncionariosDAO();
        $res = $usuariosDAO->listarUnico($args['id']);

        $pontos = new EmpresaDAO();
        $res2 = $pontos->listar();

        return $this->view->render($response, 'alterarusuario.html', [
            'users' => $res,
            'pontos' => $res2
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('usuariosAlterar');

$app->post('/usuariosCadastro', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $func = filter_input(INPUT_POST, 'func');
        $ponto = filter_input(INPUT_POST, 'ponto');

        $usuarios = new Funcionarios();
        $usuariosDAO = new FuncionariosDAO();
        $usuarios->setFuncionarios($func);
        $usuarios->setAdm_ponto($ponto);
        $usuariosDAO->salvar($usuarios);

        return $response->withRedirect($this->router->pathFor('usuarios'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('usuariosCadastro');

$app->post('/usuariosAlterar/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $func = filter_input(INPUT_POST, 'func');
        $ponto = filter_input(INPUT_POST, 'ponto');

        $usuarios = new Funcionarios();
        $usuariosDAO = new FuncionariosDAO();
        $usuarios->setFuncionarios($func);
        $usuarios->setAdm_ponto($ponto);
        $usuariosDAO->alterar($usuarios, $args['id']);

        return $response->withRedirect($this->router->pathFor('usuarios'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('usuariosAlterar');

$app->get('/usuariosDeletar/{id}', function ($request, $response, $args) {
 
    if ($_SESSION['logado']) {
        try {
            $usuariosDAO = new FuncionariosDAO();
            $usuariosDAO->deletar($args['id']);

            return $response->withRedirect($this->router->pathFor('usuarios'));
        } catch (PDOException $e) {
            return $response->withRedirect($this->router->pathFor('erroChave'));
        }
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('usuariosDeletar');