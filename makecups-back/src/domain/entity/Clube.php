<?php
class Clube {
	
	private $id_clube;
	private $nome;
	private $nome_completo;
	private $abbr;
	private $liga;
		
	function getIdClube(){
		return $this->id_clube;
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
	
	function setIdClube($id_clube){
		$this->id_clube = $id_clube;
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