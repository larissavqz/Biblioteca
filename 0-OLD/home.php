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
			<form style="width: 300px;" method="POST" action="busca.php">
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="opcao" id="nome" value="1" checked>
				  <label class="form-check-label" for="nome">
					Nome
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="opcao" id="editora" value="2">
				  <label class="form-check-label" for="editora">
					Editora
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="opcao" id="autor" value="3">
				  <label class="form-check-label" for="autor">
					Autor
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="opcao" id="genero" value="4">
				  <label class="form-check-label" for="autor">
					Gênero
				  </label>
				</div>
				<br><br>
				<input type="text" name="consulta" id="consulta" style="text-transform:uppercase"  placeholder="Consulta" required/>
				<br><br>
			  <button type="submit" class="btn btn-primary">Buscar</button>
			</form>	
			
		</center>
	</body>
</html>