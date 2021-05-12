<?php

	include("conexao.php");

	$email = $_GET["email"];

	$con= " SELECT email FROM usuario WHERE email= $email";
	$consulta = mysqli_query($conexao,$con);
		if(mysqli_num_rows($consulta)==1)
		{  
			echo"email ja cadastrado";
		} 
		else
		{

		} 
?>
