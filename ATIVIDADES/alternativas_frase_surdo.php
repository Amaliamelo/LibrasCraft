<?php

    include "../conexao.php";
	include "../ABC/cabecalho_abc.php";
	include "../ABC/menu_abc.php";

//SELECIONANDO FRASE ----------------------------------------------------------------------------
$pagina = $_GET["pagina"]; 

$consulta = "SELECT id_frase, frase, video_frase FROM frase WHERE cod_subfase = $pagina 
           AND id_frase NOT IN (
               SELECT cod_frase FROM resposta_frase WHERE cod_usuario='".$_SESSION["autorizado"]."'
           )

           ORDER BY RAND() LIMIT 1";
$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");
$qtd_frase = mysqli_num_rows($resultado);

$linha_frase= mysqli_fetch_assoc($resultado);

$frase_correta = $linha_frase['frase'];

if($qtd_frase>0){
    $atividade= '<iframe id="link_video" class="iframe_video" src="https://www.youtube.com/embed/'.$linha_frase["video_frase"].'?" class="rounded mx-auto d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    //SELECIONANDO IDS NA TABELA FRASE_PALAVRA
    $consulta2 = "SELECT  cod_palavra, palavra FROM frase_palavra INNER JOIN palavra 
                  ON palavra.id_palavra = frase_palavra.cod_palavra AND cod_frase ='".$linha_frase['id_frase']."'";
          
    $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
    $i=0;
    while($linha_correto=mysqli_fetch_assoc($resultado2)){
        //SELECIONANDO PALAVRAS NA TABELA PALAVRAS
        $palavras_corretas[$i] = $linha_correto['palavra']; 
        $codigo_palavras_corretas[$i] = $linha_correto['cod_palavra']; 
        $i++;
            
	}
    print_r($palavras_corretas);
    $j=0;
    $id_corretos="0";
    foreach($codigo_palavras_corretas as $id){
        $id_corretos.=", $id";
    }
    
    //SELECIONANDO VERBOS ERRADOS
    $select_verbo = "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase ='10'
    AND id_palavra NOT IN ($id_corretos) ORDER BY RAND() LIMIT 3";
    
    $resultado_verbo = mysqli_query($conexao,$select_verbo);
    while($linha_verbo=mysqli_fetch_assoc($resultado_verbo)){
        $palavra_errada[$j] = $linha_verbo['palavra']; 
        $codigo_palavra_errada[$j] = $linha_verbo['id_palavra']; 
        $j++; 
    }    

    //SELECIONANDO PRONOMES ERRADOS
    $select_pronome = "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase ='9'
    AND id_palavra NOT IN ($id_corretos) ORDER BY RAND() LIMIT 3";
    
    $resultado_pronome = mysqli_query($conexao,$select_pronome);

    while($linha_pronome=mysqli_fetch_assoc($resultado_pronome)){
        $palavra_errada[$j] = $linha_pronome['palavra']; 
        $codigo_palavra_errada[$j] = $linha_pronome['id_palavra']; 
        $j++;

    }
    //SELECIONANDO PALAVRAS ERRADAS
    $select_palavra= "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase = $pagina 
    AND id_palavra NOT IN ($id_corretos) ORDER BY RAND() LIMIT 3";
    
    $resultado_palavra= mysqli_query($conexao,$select_palavra);

    while($linha_palavra=mysqli_fetch_assoc($resultado_palavra)){
        $palavra_errada[$j] = $linha_palavra['palavra']; 
        $codigo_palavra_errada[$j] = $linha_palavra['id_palavra']; 

        $j++;

    }

   
    
   foreach($palavras_corretas as $cod => $p ){
     $palavra[$codigo_palavras_corretas[$cod]]=$p;
    }
    foreach($palavra_errada as $cod => $p ){
        $palavra[$codigo_palavra_errada[$cod]]=$p;
    }


    $palavra_aux = $palavra;
    shuffle($palavra_aux);
    // VETOR EMBARALHADO COM OS INDICES CORRETOS
    foreach($palavra_aux as $cod1 => $p1){
        foreach($palavra as $cod2 => $p2){
            if($p1==$p2){
                $p_final[$cod2]=$p1;
                break;
            }
        }
    }
    //print_r($p_final);
//NOME DA SUBFASE
$consulta4 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
$resultado4 = mysqli_query($conexao,$consulta4) or die("Erro na consulta2");
$linha = mysqli_fetch_assoc($resultado4);

}
?>