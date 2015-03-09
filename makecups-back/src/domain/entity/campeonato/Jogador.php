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
		return $this->clube;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setClubes($clubes){
		$this->clubes = $clube;
	}

	function addClube($clube) {
		array_push($this->clubes, $clube);
	}
	
}