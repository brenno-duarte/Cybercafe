<?php

require_once 'DB.php';

class FuncionariosDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM funcionarios a INNER JOIN empresa b ON a.adm_ponto=b.id_ponto";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarN(){
        $sql = "SELECT COUNT(*) as qnt FROM funcionarios";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res[0]['qnt'];
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM funcionarios WHERE id_usuario = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Usuarios $usuarios){
        $sql = "INSERT INTO `funcionarios`(`funcionarios`, `adm_ponto`) VALUES (:funcionarios, :adm_ponto)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':funcionarios', $usuarios->getFuncionarios());
        $stmt->bindValue(':adm_ponto', $usuarios->getAdm_ponto());
        $stmt->execute();
    }

    public function alterar(Usuarios $usuarios, int $id){
        $sql = "UPDATE `funcionarios` SET 
        `funcionarios` = :funcionarios,
        `adm_ponto` = :adm_ponto
        WHERE id_usuario = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':funcionarios', $usuarios->getFuncionarios());
        $stmt->bindValue(':adm_ponto', $usuarios->getAdm_ponto());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `funcionarios` WHERE id_usuario = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
