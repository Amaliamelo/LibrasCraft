<?php
//MONTANDO AS ALTERNATIVAS ------------------------------
     $pagina = $_GET["pagina"]; 

     $consulta = "SELECT id_palavra, palavra, video_sinal FROM palavra WHERE cod_subfase = $pagina 
				AND id_palavra NOT IN (
					SELECT cod_palavra FROM resposta WHERE cod_usuario='".$_SESSION["autorizado"]."'
				)

				ORDER BY RAND() LIMIT 1";
	//BUSCANDO NO BANCO A PALAVRA/LETRA/NUMERAL DA ATIVIDADE PRINCIPAL E VERIFICANDO SE ELA JÁ NÃO FOI ACERTADA PELO USARIO, CASO FOI, SELECIONA OUTRA


$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
$qtd = mysqli_num_rows($resultado);

if($qtd>0){
	//algoritmo para montar o exercicio
	$linha_questao = mysqli_fetch_assoc($resultado);
	//ENTENDEU -- PEGA VIDEO/IMAGEM -- UMA PAGINA DE ATIVIDADE PARA CASA E ABC(ALFABETO/NUMERAL) SE NÃO FOR ABC APARECE VIDEO
	if($_GET["pagina"]=="7" || $_GET["pagina"]=="8"){
		$atividade= "<center><img width='200px;' src='../img/".$linha_questao["video_sinal"]."' /></center>";
	}
	else{
		$atividade= '<iframe id="link_video" class="iframe_video" src="https://www.youtube.com/embed/'.$linha_questao["video_sinal"].'?" class="rounded mx-auto d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		 
	}//
	//PEGA PALAVRA CORRETA
	$cod_correto = $linha_questao["id_palavra"];
	//PEGA POSIÇÃO DA PALAVRA CORRETA
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
// FIM DA MONTAGEM DAS ALTERNATIVAS ----------------------------------------------------
?>