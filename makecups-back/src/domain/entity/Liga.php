<?php
class Liga {

	private $id;
	private $nome;
	
	public function getId(){
		return $this->id;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function setNome($nome){
		$this->nome = utf8_encode($nome);
	}
	
	
	
	
}