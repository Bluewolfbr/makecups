<?php
require 'src/domain/repository/ICampeonatoRepository.php';

class CampeonatoRepositoryImp implements ICampeonatoRepository {
	
	function getAll() {
	}
	
	function getById($id) {

		return array(
              "campeonato" 
			);

		
	}
	
	function getCampeonatos($usuario) {
		$campeonato1 = new Campeonato ( new JogadorRepositoryImp () );
		$campeonato1->setId ( 1 );
		$campeonato1->setNome ( "IV Copa de Rua" );
		
		$campeonatos = array ();
		array_push ( $campeonatos, $campeonato1 );
		
		
		$campeonato2 = new Campeonato ( new JogadorRepositoryImp () );
		$campeonato2->setId ( 1 );
		$campeonato2->setNome ( "IV Copa de Rua" );
		
		$jogador = new Jogador("Kley");
		
		$liga = new Liga();
		$liga->setId(1);
		$liga->setNome("Brasileirão Série A");
		
		$clube = new Clube();
		$clube->setId(1);
		$clube->setAbbr("GRE");
		$clube->setLiga($liga);
		$clube->setNome("GRÊMIO");
		$clube->setNomeCompleto("GRÊMIO FUTEBOL PORTO ALEGRENSE");
		
		$jogador->setClube($clube);
		
		$campeonato2->setCampeao($jogador);
		
		array_push($campeonatos, $campeonato2);
		
		
		
		return $this->parseToJson ( $campeonatos );
	}

	function createJogador ($nome){

		$jogador = new Jogador($nome);
		return $jogador;
	}

	function save ($campeonato){
		$campeonato->setId(1);
		return $campeonato;
	}

	private function parseToJson($campeonatos) {
		$json = array ();
		
		foreach ( $campeonatos as $campeonato ) {
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