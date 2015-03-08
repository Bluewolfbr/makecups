<?php

interface CampeonatoBuilder implements IFactoryBase {

  function times($times);

  function jogadores($jogadores);

  function build();

}
class CampeonatoBuilderImpl implements CampeonatoBuilder {

  private $nome;

  private $times = [];

  private $jogadores;

  function __constructor($nome) {
    $this->nome = $nome;
    $this->times = array();
    $this->jogadores = array();
  }

  ...

  fucntion build(){
    $campeonato = new Campeonato($nome, $times, $jogadores);
  }
}
