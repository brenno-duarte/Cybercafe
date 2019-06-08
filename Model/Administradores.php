<?php

class Administradores
{
    private $usuario;
    private $senha;
    private $empresa;

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getEmpresa()
    {
        return $this->empresa;
    }

    
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

}
