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



$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta".$consulta);
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
									<h5 style="text-align:center;"> Escreva a palavra que corresponde ao sinal do vídeo</h5>
								</div>
							</div>
							<div class="row">
								<div class="col p-3 py-6 px-md-6">
								<div class="video"><?php echo $atividade;?></div>
								</div>
							</div>
						
						<div class="row">
							<div class="col justify-content-center mt-12 align-items-center">		
									
									<input type="text" name="resposta" class="resposta form-control" placeholder="Digite aqui o que significa este símbolo..." />
									<div id="msg_cod_palavra"></div>
									<input type="button" style="display:none;color:white;"  name="envia_resposta" value="Enviar Resposta" class="form-control btn-info " />
									<input type='hidden' name='resposta_enviar' value='' />
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
	<?php
		if($_GET["pagina"]=='7' || $_GET["pagina"]=='8'){
			$tamanho_verificacao="0";
		}
		else{
			$tamanho_verificacao="2";
		}
	?>
	$(function(){
		resp = "";
		$(".resposta").focus(function(){
			$("input[name='envia_resposta']").hide();
		});
		$(".resposta").keyup(function(){
			p = $(this).val();			
			if(p.length><?php echo $tamanho_verificacao;?>){
			post = {palavra:p}
			$.post("cod_palavra.php",post,function(r){				
				if(r=="0"){					
					$("input[name='envia_resposta']").hide();
					$("#msg_cod_palavra").html("palavra não identificada...corrija a palavra");
				}			
				else{
					$("#msg_cod_palavra").html("Palavra existente no sistema! Deseja enviar esta resposta?");
					$("input[name='envia_resposta']").show();
					resp = r;					
				}
			});
			}			
		});

		$("input[name='envia_resposta']").click(function(){						
			c = $("input[name='resposta_correta']").val();
			sf = "<?php echo $_GET["pagina"];?>";
			post = {resposta:resp, correto:c,subfase:sf};
			console.log(post);
			$.post("salva_resposta.php",post,function(r){				
				location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina='+sf;
			});			
		});
		
	});

	</script>
</body>
</html>