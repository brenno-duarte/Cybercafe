<?php

class Empresa
{
    private $cnpj;
    private $nome_comercial;
    private $tipo;
    private $contrato;
    private $maquinas_ativas;

    /**
     * Get the value of cnpj
     */ 
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     *
     * @return  self
     */ 
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get the value of nome_comercial
     */ 
    public function getNome_comercial()
    {
        return $this->nome_comercial;
    }

    /**
     * Set the value of nome_comercial
     *
     * @return  self
     */ 
    public function setNome_comercial($nome_comercial)
    {
        $this->nome_comercial = $nome_comercial;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of contrato
     */ 
    public function getContrato()
    {
        return $this->contrato;
    }

    /**
     * Set the value of contrato
     *
     * @return  self
     */ 
    public function setContrato($contrato)
    {
        $this->contrato = $contrato;

        return $this;
    }

    /**
     * Get the value of maquinas_ativas
     */ 
    public function getMaquinas_ativas()
    {
        return $this->maquinas_ativas;
    }

    /**
     * Set the value of maquinas_ativas
     *
     * @return  self
     */ 
    public function setMaquinas_ativas($maquinas_ativas)
    {
        $this->maquinas_ativas = $maquinas_ativas;

        return $this;
    }
}
