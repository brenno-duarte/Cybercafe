<?php

class Noticias
{
    private $noticia;
    private $data;
    private $usuario;
    private $ponto_fisico;

    /**
     * Get the value of noticia
     */ 
    public function getNoticia()
    {
        return $this->noticia;
    }

    /**
     * Set the value of noticia
     *
     * @return  self
     */ 
    public function setNoticia($noticia)
    {
        $this->noticia = $noticia;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

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
     * Get the value of ponto_fisico
     */ 
    public function getPonto_fisico()
    {
        return $this->ponto_fisico;
    }

    /**
     * Set the value of ponto_fisico
     *
     * @return  self
     */ 
    public function setPonto_fisico($ponto_fisico)
    {
        $this->ponto_fisico = $ponto_fisico;

        return $this;
    }
}
