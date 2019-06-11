<!DOCTYPE html>
<html lang="pt-br">
	<head>
	<link href="<?= base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet" type="text/css" />		
		<link href="<?= base_url().'assets/css/custom.css'?>" rel="stylesheet" type="text/css" />		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Biblioteca - Busca</title>
	</head>
	<body>
		<?php include 'includes/navbar.php' ?>
		<center>		
		<div class="container">
			<h3>Busca de livros</h3>
			<div class="row">
				<div class="col-md-3">
					<p>Buscar por:</p>
					<input type="radio" id="titulo" value="titulo">
					<label for="titulo">Título</label>
					<input type="radio" id="autor" value="autor">
					<label for="autor">Autor</label>
					<input type="radio" id="genero" value="genero">
					<label for="genero">Gênero</label>
				</div>
				<div class="col-md-6">
					<input type="text">
				</div>
				<div class="col-md-3">
					<button>Pesquisar</button>
				</div>
			</div>
			
			
		</div>
		
			<h3>Resultado</h3>
					
		</center>
	</body>
</html>