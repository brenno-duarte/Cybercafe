<?php

require_once 'DB.php';

class ClientesDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM clientes_pontos a INNER JOIN pontos_fisicos b ON a.ponto_registrado=b.id_ponto";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarN(){
        $sql = "SELECT COUNT(*) as qnt FROM clientes_pontos";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res[0]['qnt'];
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM clientes_pontos WHERE id_cliente = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Clientes $cliente){
        $sql = "INSERT INTO `clientes_pontos`(`nome`, `cpf`, `ponto_registrado`, `vip`) 
        VALUES (:nome, :cpf, :ponto_registrado, :vip)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':cpf', $cliente->getCpf());
        $stmt->bindParam(':ponto_registrado', $cliente->getPonto_registrado());
        $stmt->bindParam(':vip', $cliente->getVip());
        $stmt->execute();
    }

    public function alterar(Clientes $cliente, int $id){
        $sql = "UPDATE `clientes_pontos` SET 
        `nome` = :nome,
        `cpf` = :cpf,
        `ponto_registrado` = :ponto_registrado,
        `vip` = :vip WHERE id_cliente = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $cliente->getNome());
        $stmt->bindParam(':cpf', $cliente->getCpf());
        $stmt->bindParam(':ponto_registrado', $cliente->getPonto_registrado());
        $stmt->bindParam(':vip', $cliente->getVip());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `clientes_pontos` WHERE id_cliente = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
