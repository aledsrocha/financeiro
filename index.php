<?php 
	require_once 'config.php';
	require_once 'dao/ReceitaDaoMysql.php';

	$lista = [];
	$sql = $pdo->query("SELECT * FROM receita");
	if ($sql->rowCount() > 0) {
		$lista = $sql->fetchAll(PDO::FETCH_ASSOC);



	}
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
	<label id="valorTotal">total de entradas</label>
	<input type="text" name="" id="total1" value="R$:0,00" disabled><br><br>

	<label>total de saida</label>
	<input type="text" name="" id="total2" value="R$:0,00" disabled>
	<button onclick="somarValores()">atualizar valores</button>

	
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
				<th>valor em R$</th>
				<th>obs</th>
				<th>ação</th>
			</tr>
		</thead>
		<?php foreach($lista as $usuarios):?>
			<tr>
				<td><?=$usuarios['data'];?></td>
				<td><?=$usuarios['doc'];?></td>
				<td><?=$usuarios['ndoc'];?></td>
				<td><?=$usuarios['categoria'];?></td>
				<td><?=$usuarios['cliente'];?></td>
				<td id="valor"><?=$usuarios['valor'];?></td>
				<td><?=$usuarios['obs'];?></td>
				<td>
				<a href="<?=$base;?>/excluir.php?id=<?=$usuarios['id'];?>"> <img src="<?=$base?>/media/img/excluir.png" width="25">[ excluir ]</a>
				<a href="<?=$base;?>/editar.php?id=<?=$usuarios['id'];?>"> <img src="<?=$base?>/media/img/excluir.png" width="25">[ editar ]</a>
				
				</td>

			</tr>

			<?php endforeach;?>

		
	</table>

		
	
</div>


</html>