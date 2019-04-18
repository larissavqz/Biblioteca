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
		<title>Biblioteca - Login</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Biblioteca</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="index.php">Login</a>
			  </li>		
			  <li class="nav-item">
				<a class="nav-link" href="#">Cadastre-se</a>
			  </li>	
			  <li class="nav-item">
				<a class="nav-link" href="cadlivro.php">Cadastrar Livro</a>
			  </li>			  
			</ul>
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		  </div>
		</nav>
		<br><br><br>
		<center>
			<form style="width: 300px;" method="POST" action="/biblioteca/home.php">
			  <div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" placeholder="Nome">
			  </div>
			  <div class="form-group">
				<label for="autor">Autor</label>
				<input type="text" class="form-control" id="autor" placeholder="Autor">
			  </div>
			  <div class="form-group">
				<label for="genero">Gênero</label>
				<input type="text" class="form-control" id="genero" placeholder="Gênero">
			  </div>
			  <div class="form-group">
				<label for="data">Data Publicação</label>
				<input type="date" class="form-control" id="data">
			  </div>
			  <div class="form-group">
				<label for="editora">Editora</label>
				<input type="text" class="form-control" id="editora" placeholder="Editora">
			  </div>
			  <div class="form-group">
				<label for="posicao">Posição</label>
				<input type="text" class="form-control" id="posicao" placeholder="Posição">
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>	
			
		</center>
	</body>
</html>