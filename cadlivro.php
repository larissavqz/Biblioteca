<?php
	session_start();
	if (isset($_SESSION["logou"]))
	{
		session_unset();
		session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css" />		
		<script src="bootstrap.min.js" type="text/javascript"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Biblioteca - Cadastrar Livro</title>
	</head>
	<body>
		<?php include 'menu.php' ?>
		<br><br><br>
		<center>
			<form style="width: 300px;" method="POST" action="cad_livro.php">
			  <div class="form-group">
				<label for="titulo">Título</label>
				<input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo">
			  </div>
			  <div class="form-group">
				<label for="autor">Autor</label>
				<input type="text" class="form-control" id="autor" name="autor" placeholder="Autor">
			  </div>
			  <div class="form-group">
				<label for="genero">Gênero</label>
				<input type="text" class="form-control" id="genero" name="genero" placeholder="Gênero">
			  </div>
			  <div class="form-group">
				<label for="data">Data Publicação</label>
				<input type="date" class="form-control" id="data" name="data" >
			  </div>
			  <div class="form-group">
				<label for="editora">Editora</label>
				<input type="text" class="form-control" id="editora" name="editora" placeholder="Editora">
			  </div>
			  <div class="form-group">
				<label for="secao">Seção</label>
				<input type="text" class="form-control" id="secao" name="secao" placeholder="Seção">
			  </div>
			  <div class="form-group">
				<label for="qttotal">Quantidade Total</label>
				<input type="text" class="form-control" id="qttotal" name="qttotal" placeholder="Quantidade Total">
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>	
			
		</center>
	</body>
</html>