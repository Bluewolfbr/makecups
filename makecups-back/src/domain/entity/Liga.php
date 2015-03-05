<?php
class Liga {

	private $id_liga;
	private $nome;
	
	public function getIdLiga(){
		return $this->id_liga;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setIdLiga($id_liga){
		$this->id_liga = $id_liga;
	}
	
	public function setNome($nome){
		$this->nome = utf8_encode($nome);
	}
	
	
	
	
}