<?php

require_once 'DB.php';

class UsuariosDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM usuarios_pontos";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM usuarios_pontos WHERE id_usuario = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Usuarios $usuarios){
        $sql = "INSERT INTO `usuarios_pontos`(`funcionarios`, `adm_ponto`) VALUES (:funcionarios, :adm_ponto)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':funcionarios', $usuarios->getFuncionarios());
        $stmt->bindValue(':adm_ponto', $usuarios->getAdm_ponto());
        $stmt->execute();
    }

    public function alterar(Usuarios $usuarios, int $id){
        $sql = "UPDATE `usuarios_pontos` SET 
        `funcionarios` = :funcionarios,
        `adm_ponto` = :adm_ponto
        WHERE id_usuario = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':funcionarios', $usuarios->getFuncionarios());
        $stmt->bindValue(':adm_ponto', $usuarios->getAdm_ponto());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `usuarios_pontos` WHERE id_usuario = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
