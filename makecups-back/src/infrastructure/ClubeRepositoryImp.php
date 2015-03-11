<?php
require 'src/domain/repository/IClubeRepository.php';
require 'src/infrastructure/Connect.php';

class ClubeRepositoryImp implements IClubeRepository {
	
	function getAll(){

		$sql = "SELECT * FROM CLUBE";

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
		$liga = new Liga($id, "Brasileirão Série A");
				
		$clube = new Clube();
		$clube->setId($id);
		$clube->setAbbr("GRE");
		$clube->setLiga($liga);
		$clube->setNome("GRÊMIO");
		$clube->setNomeCompleto("GRÊMIO FUTEBOL PORTO ALEGRENSE");
		
						
		return $clube;
	}

	function createClube($id){
		$clube = $this->getById($id);
		return $clube;
	}
	
	private function parseToJson($clubes){
		$json = array();

		var_dump($clubes);
		
		for ($i=0; $i < count($clubes); $i++) {
			
			/*$tmp = array(
					"id" => $clube->getId(),
					"nome" => $clube->getNome(),
					"abbr" => $clube->getAbbr(),
					"nome_completo" => $clube->getNomeCompleto(),
					"liga" => $clube->getLiga()->getNome()
			);*/
			//array_push($json, $tmp);	
		}
				
		return $json;
		
	}
}