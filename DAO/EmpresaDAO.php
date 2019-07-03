<?php

require_once 'DB.php';

class EmpresaDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM empresa";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM empresa WHERE id_ponto = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Empresa $pontos){
        $sql = "INSERT INTO `empresa`(`cnpj`, `nome_comercial`, `tipo`, `contrato`, `maquinas_ativas`) 
        VALUES (:cnpj, :nome_comercial, :tipo, :contrato, :maquinas_ativas)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':cnpj', $pontos->getCnpj());
        $stmt->bindValue(':nome_comercial', $pontos->getNome_comercial());
        $stmt->bindValue(':tipo', $pontos->getTipo());
        $stmt->bindValue(':contrato', $pontos->getContrato());
        $stmt->bindValue(':maquinas_ativas', $pontos->getMaquinas_ativas());
        $stmt->execute();
    }

    public function alterar(Empresa $pontos, int $id){
        $sql = "UPDATE `empresa` SET 
        `cnpj` = :cnpj,
        `nome_comercial` = :nome_comercial,
        `tipo` = :tipo,
        `contrato` = :contrato,
        `maquinas_ativas` = :maquinas_ativas WHERE id_ponto = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':cnpj', $pontos->getCnpj());
        $stmt->bindValue(':nome_comercial', $pontos->getNome_comercial());
        $stmt->bindValue(':tipo', $pontos->getTipo());
        $stmt->bindValue(':contrato', $pontos->getContrato());
        $stmt->bindValue(':maquinas_ativas', $pontos->getMaquinas_ativas());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `empresa` WHERE id_ponto = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
