<?php
		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "biblioteca";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
				
			
			$cpf				= $_POST['cpf'];		 
			$nome		        = strtoupper ($_POST['nome']);
			$data_nascimento    = $_POST['data'];
			$endereco           = strtoupper ($_POST['endereco']);
			$bairro             = strtoupper ($_POST['bairro']);
			$numero             = strtoupper ($_POST['numero']);
			$cep                = $_POST['cep'];
			$senha              = md5($_POST['senha']);
			$email              = strtoupper ($_POST['email']);
			$ctps               = strtoupper ($_POST['ctps']);
			$cargo              = strtoupper ($_POST['cargo']);
			
			
			$sql = "insert into usuario (cpf, nome,	dtnascimento, email) values('$cpf',
																				'$nome',
																				'$data_nascimento',
																				'$email')";
			if ($conn->query($sql) === TRUE) {
				
					$sql = "insert into dados_acesso (cpf_usuario,	senha) values('$cpf',
																		  '$senha')";
				if ($conn->query($sql) === TRUE) {	
					$sql = "insert into endereco (cpf_usuario,	rua,	numero,	bairro,	cep) values('$cpf',
																							'$endereco',
																							'$numero',
																							'$bairro',
																							'$cep')";
					if ($conn->query($sql) === TRUE) {	
						$sql = "insert into funcionario (cpf_usuario,	ctps,	cargo) values('$cpf',
																							'$ctps',
																							'$cargo')";
						if ($conn->query($sql) === TRUE) {	?>
	<script type="text/javascript">

	//definindo uma mensagem de alerta usando function 

	function nome () {

	alert ("Usuário registrado com sucesso!");

        }
	nome();
	</script>
	
<?php
		
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadlivro.php'>";	
			}}}}
			 else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
				
			
		
		?>