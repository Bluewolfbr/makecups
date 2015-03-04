<?php
class Clube {
	
	private $id_clube;
	private $nome;
	private $nome_completo;
	private $abbr;
	private $liga;
	
	function getIdClube(){
		return $id_clube;
	}
	
	function getNome(){
		return $nome;
	}
	
	function getNomeCompleto(){
		return $nome_completo;
	}
	
	function getAbbr(){
		return $abbr;
	}
	
	function getLiga(){
		return $liga;
	}
	
	function setIdClube($id_clube){
		$this->id_clube = $id_clube;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function setNomeCompleto($nome_completo){
		$this->nome_completo = $nome_completo;
	}
	
	function setAbbr($abbr){
		$this->abbr = $abbr;
	}
	
	function setLiga($liga){
		$this->liga = $liga;
	}
	
	
	
	
	
}