<?php
include("menu.php");
$img_palavra = "chuveiro.png";
$palavra = "chuveiro";
?>
<style>
	body 
	{
		background: url("img/casa/comodo/banheiro.png") no-repeat center top fixed;
		width:100%; 
        overflow: hidden;
	}
</style>
</head>
<body>

	<div class="container mt-5 align-middle" >
		<div class="row justify-content-center "style="margin-top:-100px;">
			<div class="row">
				<div class="col d-flex flex-column justify-content-center align-items-center">
					<div class="col-12 border bg-white">
						<div class="row">
							<div class="col px-md-3 border bg-light d-flex flex-column justify-content-center align-items-center">
							<!-- INICIO TABELA-->
								<table border="1" class = "table-bordered" style="text-align:center;text-transform:uppercase;"> 
										<tr>
											<?php for($i=0;$i<strlen($palavra);$i++){ echo "<th>".$palavra[$i]."</th>"; } ?>
										</tr>
										<tr>
										<?php for($i=0;$i<strlen($palavra);$i++){ echo "<td><img src='alfabeto/".$palavra[$i].".png' style='width:70px;'/></td>"; } ?>
										</tr>
								</table>
							</div>
						</div>
							<!-- IMAGEM DO OBJETO -->
							<div class="row mt-4 mx-md-n5">
								<div class="col py-3 px-md-3 border bg-light d-flex flex-column justify-content-center align-items-center">
									<img src="img/casa/banheiro/objetos/<?php echo $img_palavra;?>" class="rounded float-left" style="width:70%; margin-top:-40px;">
								</div>
								<!-- VIDEO EM LIBRAS -->
								<div class="col py-3 px-md-3 border bg-light">
									<iframe width="330" height="200" src="https://www.youtube.com/embed/Xxiry0x6jxE" class="rounded float-right" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-left:20px;"></iframe>
								</div>
									
							</div>
							<!-- BOTOES -->
							<div class="col d-flex justify-content-center mt-2 align-items-center">
								<button type="button" src="" class="btn btn-lg btn-google btn-block w-50 text-uppercase" style="border-color:#828282;background-color:#828282;color:white; margin-left:-10px;">Anterior</button>
								<button type="button" src="" class="btn btn-lg btn-google btn-block w-50 text-uppercase" style="border-color:#828282;background-color:#828282;color:white; margin-left:50px;margin-top:-1px;">Próxima</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>