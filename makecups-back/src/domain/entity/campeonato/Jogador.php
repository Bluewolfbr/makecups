<?php
//require 'src/domain/entity/Clube.php';

class Jogador {
	
	private $nome;
	private $clube;
	
	function __construct($nome){
		$this->nome = $nome;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getClube(){
		return $this->clube;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setClube($clube){
		$this->clube = $clube;
	}
	
}