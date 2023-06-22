<?php 
	require_once 'config.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/style.css">
	<title>FINANÇAS</title>
</head>
<body>
	<h1>SUAS FINANÇAS</h1>
	<fieldset class="valoresFinal">
	<label>total de entradas</label>
	<input type="text" name="" id="total1" value="R$:0,00" disabled><br><br>

	<label>total de saida</label>
	<input type="text" name="" id="total2" value="R$:0,00" disabled>

	
	</fieldset>
	<button><a href="<?=$base;?>/adicionar.php">adicionar novos valores</a></button>


<div class="pesquisar">
	<form method="GET" action="">
	<input type="search" name="s" placeholder="pesquisar">
</form>
</div><br><br><br>

<div class="tabela">
	<table>
		<thead>
			<tr>
				<th>data</th>
				<th>doc</th>
				<th>nº doc</th>
				<th>categoria</th>
				<th>cliente</th>
				<th>valor</th>
				<th>obs</th>
				<th>ação</th>
			</tr>
		</thead>

		
	</table>
		
	
</div>

</html>