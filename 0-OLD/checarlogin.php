<?php
	session_start();
?>

<html lang="pt-br">
	<head>
		
	</head>	
	<body>
	
	<?php
	// script foi chamado de index.php
	//include "conecta.php";
	$con=mysqli_connect("localhost","root","","biblioteca");
	
	$cpf = $_POST['cpf'];
	$cpf = strtolower($cpf);
	$senha = md5($_POST['senha']);
	$senha = $senha;
	//$pao="select * from login where cpf = 'admin' and senha = '202cb962ac59075b964b07152d234b70'  exclusao = 'FALSE'";
	//$tipo=$_SESSION["tipo"];
	$sql = sprintf("SELECT cpf FROM usuarios WHERE cpf='%s' AND senha='%s'", mysqli_real_escape_string($con, $cpf), mysqli_real_escape_string($con, $senha));
	$result = mysqli_query($con, $sql);
	$cont = mysqli_num_rows($result);
	if ($cont <= 0)
	{
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
		//echo $cpf."  ";
		//echo $senha;
		//echo $result;			
	?>
	<script type="text/javascript">

	//definindo uma mensagem de alerta usando function 

	function nome () {

	alert ("CPF ou senha incorretos.");

        }
	nome();
	</script>
	
<?php
}
else
{
		$_SESSION["logou"] = "s";
		$_SESSION['cpf']=$cpf;
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>";
	}
	
?>
</body>
</html>