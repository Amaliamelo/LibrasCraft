<?php
		
            include("conexao.php");
            
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$senha = $_POST["senha"];
            $sexo = $_POST["sexo"];
            $data = $_POST["data_n"];
            $condicao = $_POST["condicao"];
			
			
				$insert =
				"INSERT INTO usuario(nome,email,senha,sexo,data_nascimento,condicao_auditiva)
					VALUES
				('$nome','$email','$senha','$sexo','$data','$condicao')";

				mysqli_query($conexao,$insert) or die(mysqli_error($conexao));
				
			
				echo "1";
			
?>