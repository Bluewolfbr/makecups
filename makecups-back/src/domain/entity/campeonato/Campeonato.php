<?php
class Campeonato {
	
	private $id;
	private $nome;
	private $criado;
	private $finalizado;
	private $status;
	private $campeao;
	private $jogadorRepository;
	
	function __construct($jogadorRepositoryImp){
		$this->jogadorRepository = $jogadorRepositoryImp;
	}
	
	function getId () {
		return $this->id;
	}
	
	function getNome () {
		return $this->nome;
	}

	function getCriado () {
		return $this->criado;
	}
	
	function getFinalizado () {
		return $this->finalizado;
	}
	
	function getStatus () {
		return $this->status;
	}
	
	function getCampeao () {
		return $this->campeao;
	}
	
	
	function setId ($id) {
		$this->id = $id;
	}
	
	function setNome ($nome) {
		$this->nome = $nome;
	}

	function setCriado ($criado) {
		$this->criado = $criado;
	}
	
	function setFinalizado ($finalizado) {
		$this->finalizado = $finalizado;
	}
	
	function setStatus ($status) {
		$this->status = $status;
	}
	
	function setCampeao ($campeao) {
		$this->campeao = $campeao;
	}
	
	
}