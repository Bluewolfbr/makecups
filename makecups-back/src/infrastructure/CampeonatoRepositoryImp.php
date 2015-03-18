<?php
require 'src/domain/repository/ICampeonatoRepository.php';

class CampeonatoRepositoryImp implements ICampeonatoRepository {
	
	function getAll() {
	}
	
	function getById($id) {
		
		$conexao = Connect::getInstance();

		$con = $conexao->establishConnection();

		$sql = " SELECT ID_CAMPEONATO,
				        NOME,
				        CRIADO,
				        FINALIZADO,
				        STATUS
				 FROM CAMPEONATO
				 WHERE ID_CAMPEONATO = $1 ";

		$params = array($id);
		
		$resCampeonato = $conexao->executeQueryParams($con, $sql, $params);

		$sql = " SELECT ID_CAMPEONATO,
				        NOME,
				        CRIADO,
				        FINALIZADO,
				        STATUS
				 FROM CAMPEONATO
				 WHERE ID_CAMPEONATO = $1 ";

		$params = array($id);

		$conexao = Connect::getInstance();

		$con = $conexao->establishConnection();

		$resCampeonato = $conexao->executeQueryParams($con, $sql, $params);


		
						
		return $this->parseToJson($result);
		

		
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

		$campeonato = $this->saveCampeonato($campeonato);
		$this->saveJogadores($campeonato);

		
		return $campeonato;
	}

	function saveCampeonato($campeonato){

		$sql = " INSERT INTO CAMPEONATO 
					(ID_CAMPEONATO,
					 NOME,
					 CRIADO,
					 STATUS	 )
 					VALUES (
 					 NEXTVAL('CAMPEONATO_SEQ'),
 					  $1,
 					  $2,
 					  $3	) RETURNING ID_CAMPEONATO ";

		$params = array($campeonato->getNome(), $campeonato->getCriado(), $campeonato->getStatus());

		$conexao = Connect::getInstance();

		$con = $conexao->establishConnection();

		$result = $conexao->executeQueryParams($con, $sql, $params);

		$res = pg_fetch_row($result);
		
		$campeonato->setId($res[0]);

		return $campeonato;

	}

	function saveJogadores ($campeonato){

		foreach ($campeonato->getJogadores() as $jogador) {
			foreach ($jogador->getClubes() as $clube) {
				var_dump($clube);

				$sql = " INSERT INTO JOGADOR 
					(ID_CAMPEONATO,
					 ID_CLUBE,
					 JOGADOR )
 					VALUES (
 					  $1,
 					  $2,
 					  $3 ) ";

				$params = array($campeonato->getId(), $clube->getId(), $jogador->getNome());

				$conexao = Connect::getInstance();

				$con = $conexao->establishConnection();

				$result = $conexao->executeQueryParams($con, $sql, $params);
				
			}
			

			
		}

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