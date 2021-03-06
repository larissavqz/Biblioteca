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
		<title>Biblioteca - Cadastrar Usuário</title>
	</head>
	<body>
		<?php include 'menu.php' ?>
		<br><br><br>
		<center>
			<form style="width: 300px;" method="POST" action="cad_user.php">
			  <div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
			  </div>
			  <div class="form-group">
				<label for="cpf">CPF</label>
				<input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="11">
			  </div>
			  <div class="form-group">
				<label for="cep">CEP</label>
				<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="8">
			  </div>
			  <div class="form-group">
				<label for="endereco">Endereço</label>
				<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
			  </div>
			  <div class="form-group">
				<label for="bairro">Bairro</label>
				<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
			  </div>
			  <div class="form-group">
				<label for="numero">Número</label>
				<input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
			  </div>
			  <div class="form-group">
				<label for="data">Data Nascimento</label>
				<input type="date" class="form-control" id="data" name="data" >
			  </div>
			  <div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
			  </div>
			  <div class="form-group">
				<label for="posicao">E-mail</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
			  </div>			  
			  <div class="form-group">
				<label for="ctps">CTPS</label>
				<input type="text" class="form-control" id="ctps" name="ctps" placeholder="CTPS">
			  </div>			  
			  <div class="form-group">
				<label for="cargo">Cargo</label>
				<input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>	
			
		</center>
	</body>
</html>