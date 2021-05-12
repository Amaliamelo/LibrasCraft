<?php
include("conexao.php");
include("menu.php");

$pagina = $_GET["pagina"];

$consulta = "SELECT palavra, video_sinal FROM palavra WHERE cod_subfase = $pagina";
$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
$vetor_palavra = "palavras = new Array("; // ??????????????????????????????????
$vetor_video = "videos = new Array("; // ??????????????????????????????????
$count = 0;
while($linha= mysqli_fetch_assoc($resultado)) // todas as palavras selecionadas na consulta
{
    if($count!=0) 
    {
        $vetor_palavra.=",";      
        $vetor_video.=",";      
	}
	else // pega o primeiro video/palavra	
	{
		$palavra=$linha["palavra"];
		$video=$linha["video_sinal"];
		$video_sinal= "https://www.youtube.com/embed/".$video;
	}							
    $count++;
    $vetor_palavra.="'".$linha["palavra"]."'";
    $vetor_video.="'".$linha["video_sinal"]."'";
} 
$vetor_palavra.=");
";
$vetor_video.=");
";
$consulta2 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
$resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
$linha = mysqli_fetch_assoc($resultado2);
?>
<style>
	body 
	{
		background: url("img/casa/comodo/<?php echo $linha["nome"];?>.png") no-repeat center top fixed;
		width:100%; 
        
	}
    table
    {
        border:1px;
    }
</style>
<script>
    posicao = 0;
    <?php
        echo $vetor_palavra;
        echo $vetor_video;
    ?>
     function troca_palavra(acao) // PROXIMA LETRA
        {
            posicao= posicao + acao;
			palavra=palavras[posicao];
			video=videos[posicao];

			
			link_video="https://www.youtube.com/embed/"+video;
            $("#link_video").attr("src",link_video);
		} 
		
</script>
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
							<div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
								<h4 style="text-align:center;">PONTUAÇÃO DAS ATIVIDADES DO NÍVEL <?php  echo $linha["nome"];?> </h4>
                                <h5> Lembre-se, você deve acertar no minimo 75% das atividades para passar para o proximo nível</h5>
							</div>
						</div>
						<div class="row">
                        <table class="table  table-striped">
                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 1 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-danger btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/incorreto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>
                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 2 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 3 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-danger btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/incorreto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 4 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-danger btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/incorreto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 5 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 6 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 7 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 8 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 9 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>

                        <tr>
                        <th>
							<div class=" col p-3 py-6 px-md-6">
                            <h4 style="text-align:left; color:#828282; color:#828282;">ATIVIDADE 10 <?php // echo $linha["POSICAO"];?> </h4>
                            </br>
                            <div class="video"><iframe id="link_video" width="200" height="100" style="margin-right:200px;" src="<?php echo $video_sinal; ?>" class="rounded  d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<h6 style= "margin-left:250px; margin-top:-100px; color:#828282;"> SUA RESPOSTA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Cadeira</button>
                            </br>
                            <h6 style= "margin-left:250px; margin-top:0px; color:#828282;"> RESPOSTA CORRETA:</h6>
                            <button type="" src="" class="resposta btn btn-success btn-google btn-block w-25 text-uppercase text-dark" style=" margin-left:450px;margin-top: -35px;">Janela</button>
                            </div>
                            <img src="img/objetos/correto.png" style="width:100px; height:100px; margin-left:730px; margin-top:-150px;">
                        </th>
                        </tr>
                        <tr>
                        <th style=" color:#828282;"> QUANTIDADE DE ACERTOS: 8 (80%)</th>
                        </tr>
                        <tr>
                        <th style=" color:#828282;"> QUANTIDADE DE ERROS: 2 (20%)</th>
                        </tr>
                            </table>
                            </div>
                            <h4  style="text-align:center; color:#828282;"> Parabéns! Você concluiu as atividades do nível CASA</h4>
                            <button type="submit" onclick = "location.href='submapa_casa.php'" src="" class="rounded mx-auto d-block btn btn-success btn-google btn-block w-50 text-uppercase" id="concluir" style=" margin-left:50px;margin-top: 50px;">Concluir</button>
						
				</div>
			</div>
		</div>
	</div>
</body>
</html>