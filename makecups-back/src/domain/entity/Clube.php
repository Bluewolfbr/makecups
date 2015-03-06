<?php
class Clube {
	
	private $id;
	private $nome;
	private $nome_completo;
	private $abbr;
	private $liga;
		
	function getId(){
		return $this->id;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function getNomeCompleto(){
		return $this->nome_completo;
	}
	
	function getAbbr(){
		return $this->abbr;
	}
	
	function getLiga(){
		return $this->liga;
	}
	
	function setId($id){
		$this->id = $id;
	}
	
	function setNome($nome){
		$this->nome = utf8_encode($nome);
	}
	
	function setNomeCompleto($nome_completo){
		$this->nome_completo = utf8_encode($nome_completo);
	}
	
	function setAbbr($abbr){
		$this->abbr = utf8_encode($abbr);
	}
	
	function setLiga($liga){
		$this->liga = $liga;
	}
	
	
}