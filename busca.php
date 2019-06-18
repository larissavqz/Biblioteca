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
		
			<h3>Resultado</h3><br>
								
								
				<?php
					 $con=mysqli_connect("localhost","root","","biblioteca");
					
					 $consulta = $_POST['consulta'];
					 $opcao = $_POST['opcao'];
					 switch ($opcao)
					 {
						case 1: $sql = "SELECT * FROM livro WHERE titulo LIKE '%".$consulta."%'"; break;
						case 2: $sql = "SELECT * FROM livro WHERE editora LIKE '%".$consulta."%'"; break;
						case 3: $sql = "SELECT * FROM livro WHERE autor LIKE '%".$consulta."%'"; break;
						case 4: $sql = "SELECT * FROM livro WHERE genero LIKE '%".$consulta."%'"; break;
					 }
					 
					 $qr = mysqli_query($con, $sql) or die(mysqli_error());
					 
					 while($ln = mysqli_fetch_assoc($qr)){
						echo "<div class='col-12 col-12-xsmall'><b>Título:      </b>".$ln['titulo']."
															<br><b>Editora:        </b>".$ln['editora']."
															<br><b>Autor:         </b>".$ln['autor']."
															<br><b>Gênero:         </b>".$ln['genero'].
															
							"</div>
						<br><br><br><br><br><div id='rodape'><hr></div>";
					 }
				?>
		
		
		</center>
	</body>
</html>