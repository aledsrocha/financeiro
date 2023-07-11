<?php 
	require_once 'config.php';
	require_once 'models/Receita.php';
	require_once 'dao/ReceitaDaoMysql.php';

	$data = filter_input(INPUT_POST, 'data');
	$doc = filter_input(INPUT_POST, 'doc');
	$ndoc = filter_input(INPUT_POST, 'ndoc');
	$categoria = filter_input(INPUT_POST, 'categoria');
	$cliente = filter_input(INPUT_POST, 'cliente');
	$valor = filter_input(INPUT_POST, 'valor');
	$obs = filter_input(INPUT_POST, 'obs');

	if ($data && $doc && $ndoc && $categoria && $cliente && $valor && $obs) {
		$receitaDao = new ReceitaDaoMysql($pdo);
		$receita = new Receita();
		
		$data = explode('/', $data);

		if (count($data) != 3) {
			$_SESSION['flash'] = 'Data de nascimento Invalida';
			header("Location:" .$base . "/signup.php");
			exit;
		}

		//verificando se a data de nascimento e real primeiro o ano segundo o mes e o terceiro dia
		$data = $data[2]. '-'. $data[1]. '-'. $data[0];

		if (strtotime($data) === false) {
			$_SESSION['flash'] = 'Data de nascimento Invalida';
			header("Location:" .$base . "/signup.php");
			exit;
		}

		

		$receita->data = $data;
		$receita->doc = $doc;
		$receita->ndoc = $ndoc;
		$receita->categoria = $categoria;
		$receita->cliente = $cliente;
		$receita->valor = $valor;
		$receita->obs = $obs;


		$receitaDao->insert($receita);

	}

	header("Location:". $base ."/adicionar.php");
	exit;

 ?>