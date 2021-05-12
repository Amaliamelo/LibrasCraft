<?php
include("menu.php");
$img_palavra = "sofa.png";
$palavra = "sofa";
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
	<div class="container mt-5 align-middle" >
		<!-- B (filha da principal - A)-->
		<div class="row justify-content-center "style="margin-top:-100px;">
			<div class="row">
				<div class="col d-flex flex-column justify-content-center align-items-center">
					<!-- C (filha da div B) -->
					<div class="col-12 border bg-white">
						<!-- D (filha da div C) : LINHA -->
			
						<div class="row">
							<div class="col py-3 px-md-3 border bg-light d-flex flex-column justify-content-center align-items-center">
								<table border="1" class = "table-bordered" style="text-align:center;text-transform:uppercase;"> <!-- inicio tabela-->
									<tr>
										<?php for($i=0;$i<strlen($palavra);$i++){ echo "<th>".$palavra[$i]."</th>"; } ?>
									</tr>
									<tr>
									<?php for($i=0;$i<strlen($palavra);$i++){ echo "<td><img src='alfabeto/".$palavra[$i].".jpg' style='width:70px;'/></td>"; } ?>
									</tr>
								</table>
							</div>
						</div>
						<div class="row mt-4 mx-md-n5">
							<div class="col py-3 px-md-3 border bg-light d-flex flex-column justify-content-center align-items-center">
								<img src="img/CASA/SALA/<?php echo $img_palavra;?>" class="rounded float-left" style="width:45%;">
							</div>
							<div class="col py-3 px-md-3 border bg-light">
								<iframe width="400" height="200" src="https://www.youtube.com/embed/Xxiry0x6jxE" class="rounded float-right" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
								
						</div><div class="col d-flex justify-content-center mt-2 align-items-center">
				<button type="button" src="" class="btn btn-lg btn-google btn-block w-50 text-uppercase" style="border-color:#828282;background-color:#828282;color:white; margin-left:-10px;">Anterior</button>
				<button type="button" src="" class="btn btn-lg btn-google btn-block w-50 text-uppercase" style="border-color:#828282;background-color:#828282;color:white; margin-left:50px;margin-top:-1px;">Próxima</button>
		<p></p>
		</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
</body>
</html>