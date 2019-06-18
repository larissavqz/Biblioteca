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
				
			$autor		= strtoupper ($_POST['autor']);
			$data		= $_POST['data'];						
			$editora	= strtoupper ($_POST['editora']);
			$nome		= strtoupper ($_POST['nome']);
			$genero		= strtoupper ($_POST['genero']);
			$secao		= strtoupper ($_POST['secao']);
			$qttotal	= strtoupper ($_POST['qttotal']);
			
			$sql = "insert into livro (autor, dtpublicacao, editora, titulo, genero, secao, qttotal) values('$autor',
																							 '$data',
																							 '$editora',
																							 '$nome',
																							 '$genero',
																							 '$secao',
																							 '$qttotal')";
			if ($conn->query($sql) === TRUE) {?>
	<script type="text/javascript">

	//definindo uma mensagem de alerta usando function 

	function nome () {

	alert ("Livro registrado com sucesso!");

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