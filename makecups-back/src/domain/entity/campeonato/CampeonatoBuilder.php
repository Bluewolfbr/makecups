<?php
require 'src/domain/repository/IFactoryBase.php';

interface CampeonatoBuilder extends IFactoryBase {

  function clubes($clubes);

  function jogadores($jogadores);

  function build();

}

class CampeonatoBuilderImp implements CampeonatoBuilder {

  private $nome;

  private $clubes = array();

  private $jogadores = array();

  private $campeonatoRepository;

  private $clubeRepository;

  function __construct($nome, $campeonatoRepository, $clubeRepository) {
    $this->nome = $nome;
    $this->campeonatoRepository = $campeonatoRepository;
    $this->clubeRepository = $clubeRepository;
   
  }

  function jogadores ($jogadores){
  	
  	if (!is_array($jogadores)){
      $jogadorObj = $this->campeonatoRepository->createJogador($jogadores);
  		array_push($this->jogadores, $jogadorObj);
  	}
  	else {
  		foreach ($jogadores as $jogador) {
        $jogadorObj = $this->campeonatoRepository->createJogador($jogador);
  			array_push($this->jogadores, $jogadorObj);
  		}
  	}

  	return $this;
  }
  
  function clubes ($clubes){
  	
  	if (!is_array($clubes)){
      $clubeObj = $this->clubeRepository->createClube($clubes);
  		array_push($this->clubes, $clubeObj);
  	}
  	else {
  		foreach ($clubes as $clube) {
        $clubeObj = $this->clubeRepository->createClube($clube);
  			array_push($this->clubes, $clubeObj);
  		}
  	}
  	 
  	return $this;
  }

  function build () {
    return new Campeonato(array(
      "nome" => $this->nome,
      "clubes" => $this->clubes,
      "jogadores" => $this->jogadores
      ));
  }
}
