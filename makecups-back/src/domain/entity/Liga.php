<?php
class Liga {

	private $id;
	private $nome;

	function __constructor($id, $nome){
			$this->id = $id;
			$this->nome= $nome;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}
}
