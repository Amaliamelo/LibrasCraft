<?php
include("conexao.php");
include("menu.php");
$pagina = $_GET["pagina"]; 

//consulta para pegar aleatoriamente palavras que nao foram respondidas nesta subfase para este usuario
$consulta = "SELECT id_palavra,palavra, video_sinal FROM palavra WHERE cod_subfase = $pagina 
				AND id_palavra NOT IN (
					SELECT cod_palavra FROM resposta WHERE cod_usuario='".$_SESSION["autorizado"]."'
				) 
				ORDER BY RAND() LIMIT 1";



$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
$qtd = mysqli_num_rows($resultado);

if($qtd>0){
	//algoritmo para montar o exercicio
	$linha_questao = mysqli_fetch_assoc($resultado);
	//
	if($_GET["pagina"]=="7" || $_GET["pagina"]=="8"){
		$atividade= "<center><img width='200px;' src='img/".$linha_questao["video_sinal"]."' /></center>";
	}
	else{
		$atividade= '<iframe id="link_video" width="500" height="300" src="https://www.youtube.com/embed/'.$linha_questao["video_sinal"].'?" class="rounded mx-auto d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		 
	}

	$cod_correto = $linha_questao["id_palavra"];

	$posicao_correto = mt_rand(0,3);//2

	$palavra[$posicao_correto]=$linha_questao["palavra"];
	$codigo[$posicao_correto]=$cod_correto;

	$cor[0] = "btn-warning";
	$cor[1] = "btn-success";
	$cor[2] = "btn-info";
	$cor[3] = "btn-danger";

	//SELECIONA AS 3 PALAVRAS ERRADAS
	$select = "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase = $pagina 
						AND id_palavra != $cod_correto ORDER BY RAND() LIMIT 3";
	$resultado_palavras = mysqli_query($conexao,$select);

	$i=0;
	//MONTAR NO VETOR DE 4 POSIÇÕES AS PALAVRAS FALTANTES (ERRADAS)
	while($linha_palavras=mysqli_fetch_assoc($resultado_palavras)){
		if($i!=$posicao_correto){
			$palavra[$i]=$linha_palavras["palavra"];
			$codigo[$i]=$linha_palavras["id_palavra"];
		}else{
			$i++;
			$palavra[$i]=$linha_palavras["palavra"];
			$codigo[$i]=$linha_palavras["id_palavra"];
		}
		$i++;
	}
}
	//NOME DA SUBFASE
	$consulta2 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
	$resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
	$linha = mysqli_fetch_assoc($resultado2);
	?>
	<style>
		body 
		{

			background: url("img/fundo/<?php echo $linha["nome"];?>.png") no-repeat center top fixed;
			width:100%; 
			
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
							<?php
							if($qtd>0){
								//monta html com os dados coletados
								?>
							<div class="row">
								<div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
									<h4>ATIVIDADE DO NÍVEL <?php echo $linha["nome"];?> </h4>
									<h5> Selecione a palavra que corresponde ao sinal do vídeo</h5>
								</div>
							</div>
							<div class="row">
								<div class="col p-3 py-6 px-md-6">
								<div class="video"><?php echo $atividade;?></div>
								</div>
							</div>
						
						<div class="row">
							<div class="col justify-content-center mt-12 align-items-center">		
									<?php for($i=0;$i<=3;$i++){?>
									<button type="button" value="<?php echo $codigo[$i];?>"  class="resposta btn <?php echo $cor[$i];?> btn-google btn-block text-uppercase text-dark" ><?php echo $palavra[$i];?></button>
									<?php }?>
									<input type='hidden' name='resposta_correta' value='<?php echo $cod_correto;?>' />
									<br />
							</div>								
						</div>				

							<?php
							} // fim do if que verifica se ainda há itens sem resposta.
							else{
								//acabou as palavras... acabou a atividade da subfase
									header("location: score.php?pagina=".$_GET["pagina"]);
								}
							?>
				
					</div>
				</div>
			</div>
		</div>
	<p><br /><br /></p>
	<script>

	$(function(){
		$(".resposta").click(function(){
			r = $(this).val();
			$(".resposta").attr("disabled",true);
			c = $("input[name='resposta_correta']").val();
			sf = "<?php echo $_GET["pagina"];?>";
			post = {resposta:r, correto:c,subfase:sf}
			$.post("salva_resposta.php",post,function(r){
				if(r=="1"){					
					location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina='+sf;
				}
				else{
					console.log(r);
				}
			});			
		});
	});

	</script>
</body>
</html>