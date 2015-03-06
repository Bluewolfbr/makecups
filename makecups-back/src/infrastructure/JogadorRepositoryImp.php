<?php
require 'src/domain/entity/campeonato/Jogador.php';

class JogadorRepositoryImp implements IJogadorRepository {
	
	private $jogador;
	
	function setInstanceJogador($nome){
		$this->jogador = new Jogador($nome);
	}
	
	function getAll(){
		
	}
	
	function getById($id) {
		
	}
	
	
}