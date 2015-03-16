<?php
require 'src/domain/repository/IClubeRepository.php';
require 'src/infrastructure/Connect.php';

class ClubeRepositoryImp implements IClubeRepository {
	
	function getAll(){

		$sql = " SELECT CL.ID_CLUBE,
				       LI.NOME LIGA,
				       CL.NOME,
				       CL.NOME_COMPLETO,
				       CL.ABBR
				FROM CLUBE CL
				INNER JOIN LIGA LI ON LI.ID_LIGA = CL.ID_LIGA ";

		$conexao = Connect::getInstance();

		$con = $conexao->establishConnection();

		$result = $conexao->executeQuery($con, $sql);

		

		/*$liga = new Liga();
		$liga->setId(1);
		$liga->setNome("Brasileirão Série A");
		
		$clube = new Clube();
		$clube->setId(1);
		$clube->setAbbr("GRE");
		$clube->setLiga($liga);
		$clube->setNome("GRÊMIO");
		$clube->setNomeCompleto("GRÊMIO FUTEBOL PORTO ALEGRENSE");
		
		$listClubes = array();
		array_push($listClubes, $clube);
		
		$liga = new Liga();
		$liga->setId(2);
		$liga->setNome("Brasileirão Série A");
		
		$clube = new Clube();
		$clube->setId(2);
		$clube->setAbbr("INT");
		$clube->setLiga($liga);
		$clube->setNome("INTERNACIONAL");
		$clube->setNomeCompleto("INTERNACIONAL FUTEBOL CLUBE");
		
		array_push($listClubes, $clube);
		
		*/
		return $this->parseToJson($result); 
	}
	
	function getById($id){
	
		$sql = " SELECT CL.ID_CLUBE,
				       LI.NOME LIGA,
				       CL.NOME,
				       CL.NOME_COMPLETO,
				       CL.ABBR
				FROM CLUBE CL
				INNER JOIN LIGA LI ON LI.ID_LIGA = CL.ID_LIGA 
				WHERE CL.ID_CLUBE = $1 ";

		$params = array($id);

		$conexao = Connect::getInstance();

		$con = $conexao->establishConnection();

		$result = $conexao->executeQueryParams($con, $sql, $params);
		
						
		return $this->parseToJson($result);
	}

	function createClube($id){
		$clube = $this->getById($id);
		return $clube;
	}
	
	private function parseToJson($clubes){
		$json = array();

		while ($clube = pg_fetch_object($clubes)) {
		    $tmp = array(
					"id" => $clube->id_clube,
					"nome" => $clube->nome,
					"nome_completo" => $clube->nome_completo,
					"liga" => $clube->liga,
					"abbr" => $clube->abbr
					
					
			);
			
			array_push($json, $tmp);	
		   
		}
		
		$retorno = array("clubes" => $json);
		
		return $retorno;
		
	}
}