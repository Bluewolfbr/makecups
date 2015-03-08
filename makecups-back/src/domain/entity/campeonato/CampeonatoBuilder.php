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

  function __constructor($nome) {
    $this->nome = $nome;
   
  }

  function jogadores ($jogadores){
  	if (!is_array($jogadores)){
  		array_push($this->jogadores, $jogadores);
  	}
  	else {
  		foreach ($jogadores as $jogador) {
  			array_push($this->jogadores, $jogador);
  		}
  	}
  	
  	return $this;
  }
  
  function clubes ($clubes){
  	if (!is_array($clubes)){
  		array_push($this->clubes, $clubes);
  	}
  	else {
  		foreach ($clubes as $clube) {
  			array_push($this->clubes, $clube);
  		}
  	}
  	 
  	return $this;
  }

  function build () {
    $campeonato = new Campeonato($this->nome, $this->clubes, $this->jogadores);
    return $campeonato;
  }
}
