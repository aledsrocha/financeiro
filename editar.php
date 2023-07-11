<?php 

	require_once 'config.php';
	require_once 'models/Receita.php';
	require_once 'dao/ReceitaDaoMysql.php';

    $recaitaDao = new ReceitaDaoMysql($pdo, $base);

	$info = [];
    $id = filter_input(INPUT_GET, 'id');
    if ($id) {
        $sql = $pdo->prepare("SELECT * FROM receita WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() >0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        }

        
    }


 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assent/css/form.css">

 	<title>adicionar finanças</title>
 </head>
 <body>

 	
 	<div class="container">
 		<h3 class="cabecalho">faça suas alterações</h3>
 	<form  method="post" action="<?=$base;?>/editar_action.php" class="formTotal">
        <input type="hidden" name="id" value="<?=$info['id']?>" >
 		<label>data</label>
        
 	<input type="text" name="data" value="<?=$info['data']?>" id="data" disabled>
 	<label>doc</label>
 	<input type="text" name="doc" value="<?=$info['doc']?>">
 	<label>ndoc</label>
 	<input type="text" name="ndoc" value="<?=$info['ndoc']?>">
 	<label>categoria</label>
 	<input type="text" name="categoria" value="<?=$info['categoria']?>">
 	<label>cliente</label>
 	<input type="text" name="cliente" value="<?=$info['cliente']?>">
 	<label>valor</label>
 	<input type="text" name="valor" value="<?=$info['valor']?>">
 	<label>obs</label>
 	<input type="text" name="obs" value="<?=$info['obs']?>">
 	<input type="submit" name="" value="atualizar dados">
 	</form>
 </div>

 <script src="https://unpkg.com/imask"></script>
    <script >
        IMask(
            document.getElementById("data"),
            {mask: '00/00/0000'}
            );
    </script>
 
 </body>
 </html>