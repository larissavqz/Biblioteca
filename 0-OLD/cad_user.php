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
			$cep                = $_POST['cep'];
			$senha              = md5($_POST['senha']);
			$email              = strtoupper ($_POST['email']);
			$ctps               = NULL;
			$cargo              = NULL;
			
			
			$sql = "insert into usuarios (cpf, nome, data_nascimento, endereco, cep, senha, email, ctps, cargo) values(	'$cpf',
																														'$nome',
																														'$data_nascimento',
																														'$endereco',
																														'$cep',
																														'$senha',
																														'$email',
																														'$ctps',
																														'$cargo')";
			if ($conn->query($sql) === TRUE) {?>
	<script type="text/javascript">

	//definindo uma mensagem de alerta usando function 

	function nome () {

	alert ("Usuário registrado com sucesso!");

        }
	nome();
	</script>
	
<?php
		
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadlivro.php'>";	
			
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
				
			
		
		?>