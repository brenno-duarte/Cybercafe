<?php

class Pagamentos {
	private $cliente;
	private $empresa;
	private $funcionario;
	private $produto;

	public function getCliente(){
		return $this->cliente;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function getEmpresa(){
		return $this->empresa;
	}

	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}

	public function getFuncionario(){
		return $this->funcionario;
	}

	public function setFuncionario($funcionario){
		$this->funcionario = $funcionario;
	}

	public function getProduto(){
		return $this->produto;
	}

	public function setProduto($produto){
		$this->produto = $produto;
	}
}