<?php
require 'src/domain/repository/IClubeRepository.php';

class ClubeRepositoryImp implements IClubeRepository {
	
	function getAll(){
		$liga = new Liga();
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
		
		
		return $this->parseToJson($listClubes);
	}
	
	function getById($id){
		$liga = new Liga();
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
				
		return $this->parseToJson($listClubes);
	}
	
	private function parseToJson($clubes){
		$json = array();
		
		foreach ($clubes as $clube) {
			$tmp = array(
					"id" => $clube->getId(),
					"nome" => $clube->getNome(),
					"abbr" => $clube->getAbbr(),
					"nome_completo" => $clube->getNomeCompleto(),
					"liga" => $clube->getLiga()->getNome()
			);
			array_push($json, $tmp);	
		}
				
		return $json;
		
	}
}