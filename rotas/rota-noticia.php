<?php

require 'DAO/NoticiasDAO.php';
require 'Model/Noticias.php';

$app->get('/noticias', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $noticias = new NoticiasDAO();
        $res = $noticias->listar();

        return $this->view->render($response, 'noticias.html', [
            'noticias' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('noticias');

$app->get('/noticiasCadastrar', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        return $this->view->render($response, 'cadastrarnoticia.html');
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('noticiasCadastrar');

$app->get('/noticiasAlterar/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $noticias = new NoticiasDAO();
        $res = $noticias->listarUnico($args['id']);

        return $this->view->render($response, 'alterarnoticia.html', [
            'news' => $res
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('noticiasAlterar');

$app->post('/noticiasCadastrar', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $noticia_tema = filter_input(INPUT_POST, 'noticia_tema');
        $data = filter_input(INPUT_POST, 'data');
        $usuario = filter_input(INPUT_POST, 'usuario');
        $ponto = filter_input(INPUT_POST, 'ponto');

        $noticia = new Noticias();
        $noticiaDAO = new NoticiasDAO();
        $noticia->setNoticia($noticia_tema);
        $noticia->setData($data);
        $noticia->setUsuario($usuario);
        $noticia->setPonto_fisico($ponto);
        $noticiaDAO->salvar($noticia);
        
        return $response->withRedirect($this->router->pathFor('noticias'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }
 
})->setName('noticiasCadastrar');

$app->post('/noticiasAlterar/{id}', function ($request, $response, $args) {
    
    if ($_SESSION['logado']) {
        $noticia_tema = filter_input(INPUT_POST, 'noticia_tema');
        $data = filter_input(INPUT_POST, 'data');
        $usuario = filter_input(INPUT_POST, 'usuario');
        $ponto = filter_input(INPUT_POST, 'ponto');

        $noticia = new Noticias();
        $noticiaDAO = new NoticiasDAO();
        $noticia->setNoticia($noticia_tema);
        $noticia->setData($data);
        $noticia->setUsuario($usuario);
        $noticia->setPonto_fisico($ponto);
        $noticiaDAO->alterar($noticia, $args['id']);
        
        return $response->withRedirect($this->router->pathFor('noticias'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('noticiasAlterar');

$app->get('/noticiasDeletar/{id}', function ($request, $response, $args) {

    if ($_SESSION['logado']) {
        $noticiaDAO = new NoticiasDAO();
        $noticiaDAO->deletar($args['id']);
        
        return $response->withRedirect($this->router->pathFor('noticias'));
    } else {
        return $response->withRedirect($this->router->pathFor('login'));
    }

})->setName('noticiasDeletar');