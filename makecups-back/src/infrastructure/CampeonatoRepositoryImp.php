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

		$sql = " SELECT J.NOME,
				       CL.ID_CLUBE,
				       CL.NOME NOME_CLUBE,
				       CL.NOME_COMPLETO,
				       LI.NOME NOME_LIGA,
				       CL.ABBR
				        
				FROM JOGADOR J
				INNER JOIN CLUBE CL ON CL.ID_CLUBE = J.ID_CLUBE
				INNER JOIN LIGA LI ON LI.ID_LIGA = CL.ID_LIGA
				WHERE J.ID_CAMPEONATO = $1 ";

		$params = array($id);

		$resJogadores = $conexao->executeQueryParams($con, $sql, $params);


		
						
		return $this->parseToJson($resCampeonato, $resJogadores);
		

		
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

				$sql = " INSERT INTO JOGADOR 
					(ID_CAMPEONATO,
					 ID_CLUBE,
					 NOME )
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

	private function parseToJson($resCampeonato, $resJogadores) {
		$jsonCampeonato = array();
		$jsonJogadores = array();

		while ($campeonato = pg_fetch_object($resCampeonato)) {
		    $tmp = array(
					"id" => $campeonato->id_campeonato,
					"nome" => $campeonato->nome,
					"criado" => $campeonato->criado,
					"finalizado" => $campeonato->finalizado,
					"status" => $campeonato->status
					
					
			);
			
			array_push($jsonCampeonato, $tmp);	
		   
		}
		
		while ($jogador = pg_fetch_object($resJogadores)) {
		    $tmp = array(
					"nome" => $jogador->nome,
					"clube" => array(
						"id" => $jogador->id_clube,
						"nome" => $jogador->nome_clube,
						"nome_completo" => $jogador->nome_completo,
						"liga" => $jogador->nome_liga,
						"abbr" => $jogador->abbr	
						)
					
			);
			
			array_push($jsonJogadores, $tmp);	
		   
		}

		$retorno = array(
			"campeonato" => $jsonCampeonato,
			"jogadores" => $jsonJogadores
			    );
		
		return $retorno;
	}
}