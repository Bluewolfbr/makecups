<?php
class Campeonato {
	private $id;
	private $nome;
	private $criado;
	private $finalizado;
	private $status;
	private $campeao;
	private $jogadores;
	
	function __construct($nome, $clubes, $jogadores) {
		$this->nome = $nome;
		$this->jogadores = $jogadores;
		$this->criado = new DateTime ();
		$this->status = "CRIADO";
		
		$this->sortearClubes ($clubes);
	}
	function getId() {
		return $this->id;
	}
	function getNome() {
		return $this->nome;
	}
	function getCriado() {
		return $this->criado;
	}
	function getFinalizado() {
		return $this->finalizado;
	}
	function getStatus() {
		return $this->status;
	}
	function getCampeao() {
		return $this->campeao;
	}
	function setId($id) {
		$this->id = $id;
	}
	function setNome($nome) {
		$this->nome = $nome;
	}
	function setCampeao($campeao) {
		$this->campeao = $campeao;
	}
	static function builder($nome) {

		return new CampeonatoBuilderImp ( $nome, new CampeonatoRepositoryImp(), new ClubeRepositoryImp());
	}
	private function sortearClubes($clubes) {
		
		shuffle($clubes);
		$max_jogadores = count($this->jogadores);
		
		foreach($clubes as $idx => $clube) {
			$this->jogadores[$idx % $max_jogadores]->addClube($clube);

			
		}
		
		
	}
}
