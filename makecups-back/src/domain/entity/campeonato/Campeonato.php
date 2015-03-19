<?php
class Campeonato {
	private $id;
	private $nome;
	private $criado;
	private $finalizado;
	private $status;
	private $campeao;
	private $jogadores;
	private $clubes;
	private $rodadas;
	
	function __construct() {

		$data =func_get_args();
		if(is_array($data) && !empty($data)) {
			$data = $data[0];
			$data = array_merge(array(
				"nome" => null,
				"jogadores" => array(),
				"clubes" => array(),
				"criado" => date("Y-m-d",time()),
				"status" => "C"), $data);
			foreach ($data as $key => $value) {
				$this->$key = $value;
			}
		}

				
		$this->sortearClubes ($this->clubes);

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

	function getJogadores(){
		return $this->jogadores;
	}

	function setNome($nome) {
		$this->nome = $nome;
	}
	function setCampeao($campeao) {
		$this->campeao = $campeao;
	}

	function getFullName() {
		return $this->nome . ' ' . $this->criado_em;
	}
	
	public static function from($state) {
		return new Campeonato($state);
	}
	

	static function builder($nome, $campeonatoRepository, $clubeRepository) {

		return new CampeonatoBuilderImp ( $nome, $campeonatoRepository, $clubeRepository);
	}


	private function sortearClubes($clubes) {
		
		shuffle($clubes);
		$max_jogadores = count($this->jogadores);
		
		foreach($clubes as $idx => $clube) {
			$this->jogadores[$idx % $max_jogadores]->addClube($clube);

			
		}
		
		
	}

	private function geraRodadas(){
		
	}
}
