<?php

require_once 'DB.php';

class PagamentosDAO extends DB
{
	public function listar(){
        $sql = "SELECT * FROM pagamentos a INNER JOIN clientes_pontos b inner join pontos_fisicos c 
        inner join usuarios_pontos d INNER JOIN produtos e
        on a.cliente=b.id_cliente and a.empresa=c.id_ponto and a.func=d.id_usuario 
        and a.produtos=e.id_produto";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function listarN(){
        $sql = "SELECT COUNT(*) as qnt FROM pagamentos";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res[0]['qnt'];
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM pagamentos a INNER JOIN clientes_pontos b inner join pontos_fisicos c 
        inner join usuarios_pontos d INNER JOIN produtos e
        on a.cliente=b.id_cliente and a.empresa=c.id_ponto and a.func=d.id_usuario 
        and a.produtos=e.id_produto WHERE id_pag = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Vendas $vendas){
        $sql = "INSERT INTO `pagamentos`(`cliente`, `empresa`, `func`, `produtos`) VALUES (:cliente, :empresa, :func, :produtos)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':cliente', $vendas->getCliente());
        $stmt->bindValue(':empresa', $vendas->getEmpresa());
        $stmt->bindValue(':func', $vendas->getFuncionario());
        $stmt->bindValue(':produtos', $vendas->getProduto());
        $stmt->execute();
    }

    public function alterar(Vendas $vendas, int $id){
        $sql = "UPDATE `pagamentos` SET 
       `cliente` = :cliente,
       `empresa` = :empresa,
       `func` = :func,
       `produtos` = :produtos
       	WHERE id_pag = $id";
       	$stmt = DB::prepare($sql);
        $stmt->bindValue(':cliente', $vendas->getCliente());
        $stmt->bindValue(':empresa', $vendas->getEmpresa());
        $stmt->bindValue(':func', $vendas->getFuncionario());
        $stmt->bindValue(':produtos', $vendas->getProduto());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `pagamentos` WHERE id_pag = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}