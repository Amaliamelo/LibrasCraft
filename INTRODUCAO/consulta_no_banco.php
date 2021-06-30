<?php
$pagina = $_GET["pagina"]; // vem de submapa_casa

$consulta = "SELECT palavra, video_sinal, cod_subfase FROM palavra WHERE cod_subfase = $pagina";
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
		$img_palavra=strtolower(str_replace(" ", "_",$linha["palavra"])).".png"; // transforma tudo em minusculo // str_replace substitui espaco por _ (só nesse caso)
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