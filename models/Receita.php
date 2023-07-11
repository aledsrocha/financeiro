<?php 

	class Receita{
		public $id;
		public $data;
		public $doc;
		public $ndoc;
		public $categoria;
		public $cliente;
		public $valor;
		public $obs;


	}

	interface ReceitaDao{
		public function insert(Receita $r);
		public function update(Receita $r);
	}

 ?>