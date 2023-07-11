<?php 
	require_once 'config.php';
	require_once 'dao/ReceitaDaoMysql.php';
	require_once 'models/Receita.php';

	$receita = new Receita();
	$receitaDao = new ReceitaDaoMysql($pdo);

	$id = filter_input(INPUT_POST, 'id');
	$data = filter_input(INPUT_POST, 'data');
	$doc = filter_input(INPUT_POST, 'doc');
	$ndoc = filter_input(INPUT_POST, 'ndoc');
	$categoria = filter_input(INPUT_POST, 'categoria');
	$cliente = filter_input(INPUT_POST, 'cliente');
	$valor = filter_input(INPUT_POST, 'valor');
	$obs = filter_input(INPUT_POST, 'obs');

	if ($data && $doc && $ndoc && $categoria && $cliente && $valor && $obs){
		
		$receita->data = $data;
		$receita->doc = $doc;
		$receita->ndoc = $ndoc;
		$receita->categoria = $categoria;
		$receita->cliente = $cliente;
		$receita->valor = $valor;
		$receita->obs = $obs;

		$receitaDao->update($receita);



	}

	header("Location:". $base);
	exit;

 ?>