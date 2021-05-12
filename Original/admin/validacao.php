<?php

	include("conexao.php");
	
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$consulta= " SELECT id_adm FROM adiministrador WHERE email = '$email' AND senha = '$senha'";
	$resultado = mysqli_query($conexao,$consulta);

		if(mysqli_num_rows($resultado)>0)
		{  
			session_start();
			$linha = mysqli_fetch_assoc($resultado);
			$_SESSION["autorizado"]=$linha["id_adm"];
			header("location: index.php");
		} 
		else
		{
			die ("Email ou senha incorretos!");
			header("location: login.php?erro=1");
		}
?>