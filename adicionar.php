<?php 

	require_once 'config.php';
	require_once 'models/Receita.php';
	require_once 'dao/ReceitaDaoMysql.php';

	

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
 		<h3 class="cabecalho">ADICIONE OS VALORES NECESSÁRIOS</h3>
 	<form  method="post" action="<?=$base;?>/adicionar_action.php" class="formTotal">

 		<?php  if(!empty($_SESSION['flash'])): ?>
                <?=$_SESSION['flash'];?>
                <?php $_SESSION['flash'] = ''; ?>
                <?php endif; ?>

 		<label>data</label>
 	<input type="text" name="data" placeholder="ex: 00/00/0000" id="data">
 	<label>doc</label>
 	<input type="text" name="doc">
 	<label>ndoc</label>
 	<input type="text" name="ndoc">
 	<label>categoria</label>
 	<input type="text" name="categoria">
 	<label>cliente</label>
 	<input type="text" name="cliente">
 	<label>valor</label>
 	<input type="text" name="valor">
 	<label>obs</label>
 	<input type="text" name="obs">
 	<input type="submit" value="enviar finanças">
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