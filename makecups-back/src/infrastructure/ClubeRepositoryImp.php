<?php
require 'src/domain/repository/IClubeRepository.php';
require 'src/domain/entity/Clube.php';
require 'src/domain/entity/Liga.php';

class ClubeRepositoryImp implements IClubeRepository {
	function getAll(){
		$liga = new Liga();
		$liga->setIdLiga(1);
		$liga->setNome("Brasileirão Série A");
		
		$clube = new Clube();
		$clube->setIdClube(1);
		$clube->setAbbr("GRE");
		$clube->setLiga($liga);
		$clube->setNome("GRÊMIO");
		$clube->setNome("GRÊMIO FUTEBOL PORTO ALEGRENSE");
		
		$listClubes = array($clube);
		return $listClubes;
	}
}