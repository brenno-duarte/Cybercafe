<?php

require_once 'DB.php';

class vendasDAO extends DB
{
	public function listar(){
        $sql = "SELECT * FROM vendas a INNER JOIN clientes_pontos b inner join pontos_fisicos c 
		inner join usuarios_pontos d  
		on a.cliente=b.id_cliente and a.empresa=c.id_ponto and a.func=d.id_usuario";
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
        $sql = "SELECT * FROM vendas WHERE id_venda = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(vendas $vendas){
        $sql = "INSERT INTO `vendas`(`cliente`, `empresa`, `func`) VALUES (:cliente, :empresa, :func)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':cliente', $vendas->getCliente());
        $stmt->bindValue(':empresa', $vendas->getEmpresa());
        $stmt->bindValue(':func', $vendas->getFuncionario());
        $stmt->execute();
    }

    public function alterar(vendas $vendas, int $id){
        $sql = "UPDATE `vendas` SET 
       `cliente` = :cliente,
       `empresa` = :empresa,
       `func` = :func 
       	WHERE id_venda = $id";
       	$stmt = DB::prepare($sql);
        $stmt->bindValue(':cliente', $vendas->getCliente());
        $stmt->bindValue(':empresa', $vendas->getEmpresa());
        $stmt->bindValue(':func', $vendas->getFuncionario());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `vendas` WHERE id_venda = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}