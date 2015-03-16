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
		
		
		array_push($campeonatos, $campeonato2);
		
		
		
		return $this->parseToJson ( $campeonatos );
	}

	function createJogador ($nome){

		$jogador = new Jogador($nome);
		return $jogador;
	}

	function save ($campeonato){
		

		$sql = " INSERT INTO CAMPEONATO 
					(ID_CAMPEONATO,
					 NOME,
					 CRIADO,
					 STATUS	 )
 					VALUES (
 					 NEXTVAL('CAMPEONATO_SEQ'),
 					  $1,
 					  $2,
 					  $3	) ";

		$params = array($campeonato->getNome(), $campeonato->getCriado(), $campeonato->getStatus());

		$conexao = Connect::getInstance();

		$con = $conexao->establishConnection();

		$result = $conexao->executeQueryParams($con, $sql, $params);

	
		//dump the result object
		var_dump($result);


		//return $campeonato;
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