<?php

require_once 'DB.php';

class AdministradoresDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM administradores a INNER JOIN pontos_fisicos b ON a.empresa=b.id_ponto";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function login(Administradores $admin){
        $sql = "SELECT * FROM administradores WHERE usuario = :usuario AND senha = :senha";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':usuario', $admin->getUsuario());
        $stmt->bindValue(':senha', $admin->getSenha());
        $stmt->execute();
        $res = $stmt->rowCount();

        if ($res > 0) {
            $_SESSION['logado'] = true;
            return true;
        } else {
            return false;
        }
    }

    public function listarUnico(int $id){
        $sql = "SELECT * FROM administradores WHERE id_admin = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_OBJ);

        return $res;
    }

    public function salvar(Administradores $admin){
        $sql = "INSERT INTO `administradores`(`usuario`, `senha`, `empresa`) VALUES (:usuario, :senha, :empresa)";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':usuario', $admin->getUsuario());
        $stmt->bindValue(':senha', $admin->getSenha());
        $stmt->bindValue(':empresa', $admin->getEmpresa());
        $stmt->execute();
    }

    public function alterar(Administradores $admin, int $id){
        $sql = "UPDATE `administradores` SET 
        `usuario` = :usuario,
        `senha` = :senha,
        `empresa` = :empresa
        WHERE id_admin = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindValue(':usuario', $admin->getUsuario());
        $stmt->bindValue(':senha', $admin->getSenha());
        $stmt->bindValue(':empresa', $admin->getEmpresa());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `administradores` WHERE id_admin = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
