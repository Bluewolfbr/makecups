<?php

class Jogador {
	
	private $nome;
	private $clubes;
	
	function __construct($nome){
		$this->nome = $nome;
		$this->clubes = array();
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getClubes(){
		return $this->clubes;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setClubes($clubes){
		$this->clubes = $clubes;
	}

	function addClube($clube) {
		array_push($this->clubes, $clube);
	}
	
}