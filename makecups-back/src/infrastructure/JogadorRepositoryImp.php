<?php

require 'src/domain/repository/IJogadorRepository.php';

class JogadorRepositoryImp implements IJogadorRepository {
	
	private $jogador;
	
	function setInstanceJogador($nome){
		$this->jogador = new Jogador($nome);
	}
	
	function getAll(){
		
	}
	
	function getById($id) {
		
	}
	
private function parseToJson($jogadores) {
		$json = array ();
		
		foreach ( $jogadores as $jogador ) {
			$tmp = array (
					"id" => $campeonato->getId (),
					"nome" => $campeonato->getNome (),
					"criado" => $campeonato->getCriado(),
					"finalizado" => $campeonato->getFinalizado (),
					"status" => $campeonato->getStatus(),
					"campeao" => $campeonato->getJogadorRepository()->parseToJson($campeonato->getCampeao())
			);
			array_push ( $json, $tmp );
		}
		
		return $json;
	}
	
	
}