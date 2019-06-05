<?php

class Clientes
{
    private $nome;
    private $cpf;
    private $ponto_registrado;
    private $vip;

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of ponto_registrado
     */ 
    public function getPonto_registrado()
    {
        return $this->ponto_registrado;
    }

    /**
     * Set the value of ponto_registrado
     *
     * @return  self
     */ 
    public function setPonto_registrado($ponto_registrado)
    {
        $this->ponto_registrado = $ponto_registrado;

        return $this;
    }

    /**
     * Get the value of vip
     */ 
    public function getVip()
    {
        return $this->vip;
    }

    /**
     * Set the value of vip
     *
     * @return  self
     */ 
    public function setVip($vip)
    {
        $this->vip = $vip;

        return $this;
    }
}
