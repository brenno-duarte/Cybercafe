<?php

require_once 'DB.php';

class ProdutosDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM produtos a INNER JOIN clientes_pontos b ON a.cliente=b.id_cliente";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarN(){
        $sql = "SELECT COUNT(*) as qnt FROM produtos";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res[0]['qnt'];
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM produtos WHERE id_produto = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Produtos $produtos){
        $sql = "INSERT INTO `produtos`(`nome_prod`, `categoria`, `tipo`, `preco`, `cliente`) 
        VALUES (:nome_prod, :categoria, :tipo, :preco, :cliente)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':nome_prod', $produtos->getNome());
        $stmt->bindValue(':categoria', $produtos->getCategoria());
        $stmt->bindValue(':tipo', $produtos->getTipo());
        $stmt->bindValue(':preco', $produtos->getPreco());
        $stmt->bindValue(':cliente', $produtos->getCliente());
        $stmt->execute();
    }

    public function alterar(Produtos $produtos, int $id){
        $sql = "UPDATE `produtos` SET 
       `nome_prod` = :nome_prod,
       `categoria` = :categoria,
       `tipo` = :tipo,
       `preco` = :preco,
       `cliente` = :cliente WHERE id_produto = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':nome_prod', $produtos->getNome());
        $stmt->bindValue(':categoria', $produtos->getCategoria());
        $stmt->bindValue(':tipo', $produtos->getTipo());
        $stmt->bindValue(':preco', $produtos->getPreco());
        $stmt->bindValue(':cliente', $produtos->getCliente());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `produtos` WHERE id_produto = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
