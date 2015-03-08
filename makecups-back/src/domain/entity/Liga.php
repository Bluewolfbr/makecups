<?php
class Liga {

	private final $id;
	private final $nome;

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
