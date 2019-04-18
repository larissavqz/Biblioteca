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
			
			
		</center>
	</body>
</html>