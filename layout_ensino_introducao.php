<?php
$img_caractere = "a.png";
$caractere = "a";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, inicial-scale=1, shrink-to-fit=no">
    <title>Librascraft</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	
	<script src='js/jquery-3.4.1.min.js'></script>
	<script src="js/bootstrap.min.js"></script>
	
	<style>
	body {
    background: url("img/sala.png") no-repeat center top fixed;

    -webkit-background-size: cover;
    -moz-background-size: cover; 
    -o-background-size: cover;
    background-size: cover;
}
	</style>
</head>
<body>
	<!-- A - div principal-->
	<div class="container mt-5 align-middle">
		<!-- B (filha da principal - A)-->
		<div class="row justify-content-center ">
			<div class="row">
				<div class="col d-flex flex-column justify-content-center align-items-center">
					<!-- C (filha da div B) -->
					<div class="col-12 border border-warning bg-white">
						<!-- D (filha da div C) : LINHA -->
			
						
						<div class="row mt-4 mx-md-n5">
							<div class="col py-3 px-md-3 border bg-light d-flex flex-column justify-content-center align-items-center">
								<?php echo $caractere;?>
							</div>
							<div class="col py-3 px-md-3 border bg-light">
							    <img src="alfabeto/<?php echo $img_caractere;?>" class="rounded float-left" style="width:40%;">
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col d-flex justify-content-center mt-2 align-items-center">
				<button type="button" src="" class="rounded ">Anterior</button>
				<button type="button" src="" class="rounded ml-5 ">Proxima</button>
		</div>
	</div>
</div>
</body>
</html>