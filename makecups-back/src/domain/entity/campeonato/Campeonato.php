<?php

require 'src/infrastructure/JogadorRepositoryImp.php';

class Campeonato {

	private $id;
	private $nome;
	private $criado;
	private $finalizado;
	private $status;
	private $campeao;
	private $jogadorRepository;

	function __construct($nome, $times, $jogadores){
		$this->jogadorRepository = $jogadorRepository;
		$this->criado = new DateTime();
		$this->status = "CRIADO";
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

	function getJogadorRepository () {
		return $this->jogadorRepository;
	}


	function setId ($id) {
		$this->id = $id;
	}

	function setNome ($nome) {
		$this->nome = $nome;
	}

	function setCampeao ($campeao){
		$this->campeao = $campeao;
	}


	function builder($nome) {
		return new CampeonatoBuilder($nome);
	}

}
