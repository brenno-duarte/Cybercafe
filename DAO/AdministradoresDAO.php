<?php

require_once 'DB.php';

class AdministradoresDAO extends DB
{
    public function listar(){
        $sql = "SELECT * FROM administradores";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function login(Administradores $admin){
        $sql = "SELECT * FROM administradores WHERE usuario = :usuario AND senha = :senha";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':usuario', $admin->getUsuario());
        $stmt->bindParam(':senha', $admin->getSenha());
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($res > 0) {
            $_SESSION['logado'] = true;
            return true;
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
        $sql = "INSERT INTO `administradores`(`usuario`, `senha`) VALUES (:usuario, :senha)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':usuario', $admin->getUsuario());
        $stmt->bindParam(':senha', $admin->getSenha());
        $stmt->execute();
    }

    public function alterar(Administradores $admin, int $id){
        $sql = "UPDATE `administradores` SET 
        `usuario` = :usuario,
        `senha` = :senha 
        WHERE id_admin = $id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':usuario', $admin->getUsuario());
        $stmt->bindParam(':senha', $admin->getSenha());
        $stmt->execute();
    }

    public function deletar(int $id){
        $sql = "DELETE FROM `administradores` WHERE id_admin = $id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}
