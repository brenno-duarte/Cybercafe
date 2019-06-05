<?php

class Usuarios
{
    private $funcionarios;
    private $adm_ponto;

    /**
     * Get the value of funcionarios
     */ 
    public function getFuncionarios()
    {
        return $this->funcionarios;
    }

    /**
     * Set the value of funcionarios
     *
     * @return  self
     */ 
    public function setFuncionarios($funcionarios)
    {
        $this->funcionarios = $funcionarios;

        return $this;
    }

    /**
     * Get the value of adm_ponto
     */ 
    public function getAdm_ponto()
    {
        return $this->adm_ponto;
    }

    /**
     * Set the value of adm_ponto
     *
     * @return  self
     */ 
    public function setAdm_ponto($adm_ponto)
    {
        $this->adm_ponto = $adm_ponto;

        return $this;
    }
}
