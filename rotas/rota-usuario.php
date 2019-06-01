<?php

require 'DAO/UsuariosDAO.php';
require 'Model/Usuarios.php';

$app->get('/usuarios', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $usuariosDAO = new UsuariosDAO();
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
        $pontos = new PontosFisicosDAO();
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
        $usuariosDAO = new UsuariosDAO();
        $res = $usuariosDAO->listarUnico($args['id']);

        return $this->view->render($response, 'alterarusuario.html', [
            'users' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('usuariosAlterar');

$app->post('/usuariosCadastro', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $func = filter_input(INPUT_POST, 'func');
        $ponto = filter_input(INPUT_POST, 'ponto');

        $usuarios = new Usuarios();
        $usuariosDAO = new UsuariosDAO();
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

        $usuarios = new Usuarios();
        $usuariosDAO = new UsuariosDAO();
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
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->deletar($args['id']);

        return $response->withRedirect($this->router->pathFor('usuarios'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('usuariosDeletar');