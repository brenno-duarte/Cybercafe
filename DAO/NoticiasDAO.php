<?php

require_once 'DB.php';

class NoticiasDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM noticias_empresa";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM noticias_empresa WHERE id_noticia = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Noticias $noticia){
        $sql = "INSERT INTO `noticias_empresa`(`noticia`, `dta_noticia`, `usuario`, `ponto_fisico`) 
        VALUES (:noticia_tema, :dta_noticia, :usuario, :ponto_fisico)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':noticia_tema', $noticia->getNoticia());
        $stmt->bindValue(':dta_noticia', $noticia->getData());
        $stmt->bindValue(':usuario', $noticia->getUsuario());
        $stmt->bindValue(':ponto_fisico', $noticia->getPonto_fisico());
        $stmt->execute();
    }

    public function alterar(Noticias $noticias, int $id){
        $sql = "UPDATE `noticias_empresa` SET 
        `noticia` = :noticia,
        `dta_noticia` = :dta_noticia,
        `usuario` = :usuario,
        `ponto_fisico` = :ponto_fisico WHERE id_noticia = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':noticia', $noticias->getNoticia());
        $stmt->bindParam(':dta_noticia', $noticias->getData());
        $stmt->bindParam(':usuario', $noticias->getUsuario());
        $stmt->bindParam(':ponto_fisico', $noticias->getPonto_fisico());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `noticias_empresa` WHERE id_noticia = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
