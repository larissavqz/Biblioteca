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
		<?php include 'menu.php' ?>
		<br><br><br>
		<center>
			<form style="width: 300px;" method="POST" action="checarlogin.php">
			  <div class="form-group">
				<label for="cpf">CPF</label>
				<input type="text" class="form-control" id="cpf" name = "cpf" placeholder="CPF" required>
			  </div>
			  <div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" placeholder="Password" required>
			  </div>
			  <button type="submit" id="entrar" name="entrar" class="btn btn-primary">Login</button>
			</form>	
		</center>
	</body>
</html>