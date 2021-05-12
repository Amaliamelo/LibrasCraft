<?php

	include("conexao.php");
	include("menu_validacao.php");


?>

<body>
<?php
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$con1= " SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
	$consultaA = mysqli_query($conexao,$con1);
		if(mysqli_num_rows($consultaA)==1)
		{  
			session_start();
			$linha = mysqli_fetch_assoc($consultaA);
			$_SESSION["autorizado"]=$linha["id_usuario"];
			if($linha["condicao_auditiva"]=="s"){
				$_SESSION["condicao_auditiva"]="surdo";
			}
			else{
				$_SESSION["condicao_auditiva"]="ouvinte";
			}
			header("location: index.php");
		} 
		else
			{
				die(" <div class='container'>
				<div class='row'>
					<div class='col-sm-9 col-md-7 col-lg-9 mx-auto' style='margin-top:-100px;'>
						<div class='card card-signin my-5' style='border-color:#828282;'>
							<div class='card-body'>
							<h3 style='text-align:center; color:grey;'>Senha ou Email incorretos</h3>
							<h5 style='text-align:center; color:grey;'>Por favor, verifique se seus dados estão corretos</h5>
								<a href='login.php' class='btn btn-lg btn-google btn-block w-50 text-uppercase' id='proximo' style='border-color:#828282;background-color:#828282;color:white; margin-left:200px; margin-top:47px;'>Voltar para o Login</button>
							
							
						
			");} 
?>
