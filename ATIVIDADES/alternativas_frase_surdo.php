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

$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
$qtd = mysqli_num_rows($resultado);
$linha_frase= mysqli_fetch_assoc($resultado);



if($qtd>0){
    $atividade= '<iframe id="link_video" class="iframe_video" src="https://www.youtube.com/embed/'.$linha_frase["video_frase"].'?" class="rounded mx-auto d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    //SELECIONANDO IDS NA TABELA FRASE_PALAVRA
    $consulta2 = "SELECT id_frase_palavra, cod_palavra, cod_frase FROM frase_palavra WHERE cod_frase ='".$linha_frase['id_frase']."'";
          
    $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta");
    $g=0;
    $i=0;
    $h=0;
    while($linha_correto=mysqli_fetch_assoc($resultado2)){
        //SELECIONANDO PALAVRAS NA TABELA PALAVRAS
        $consulta3 = "SELECT palavra, id_palavra FROM palavra WHERE id_palavra ='".$linha_correto['cod_palavra']."'";
          
        $resultado3 = mysqli_query($conexao,$consulta3) or die("Erro na consulta");
        while($linha_palavras_corretas=mysqli_fetch_assoc($resultado3)){
            $palavras_corretas[$i] = $linha_palavras_corretas['palavra']; 
            $codigo_palavras_corretas[$i] = $linha_palavras_corretas['id_palavra']; 
            $i++;
            
        }

	}
    foreach($codigo_palavras_corretas as $c){
        $codigo[$h]=$c;
        $h++;  
    }
    //COLOCANDO PALAVRAS NO VETOR $palavras
    foreach($palavras_corretas as $p){
        $palavras[$g]=$p;
        print_r($palavras[$g]);
        print_r("--");
        $g++;
        
    }
    $j=0;
    foreach($codigo_palavras_corretas as $id){
        //SELECIONANDO VERBOS ERRADOS
        $select_verbo = "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase ='10'
        AND id_palavra != $id ORDER BY RAND() LIMIT 1";
        
        $resultado_verbo = mysqli_query($conexao,$select_verbo);

        while($linha_verbo=mysqli_fetch_assoc($resultado_verbo)){
            $palavra_errada[$j] = $linha_verbo['palavra']; 
            $codigo_palavra_errada[$j] = $linha_verbo['id_palavra']; 

            $j++;

        }
        //SELECIONANDO PRONOMES ERRADOS
        $select_pronome = "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase ='9'
        AND id_palavra != $id ORDER BY RAND() LIMIT 1";
        
        $resultado_pronome = mysqli_query($conexao,$select_pronome);

        while($linha_pronome=mysqli_fetch_assoc($resultado_pronome)){
            $palavra_errada[$j] = $linha_pronome['palavra']; 
            $codigo_palavra_errada[$j] = $linha_pronome['id_palavra']; 

            $j++;

        }
        //SELECIONANDO PALAVRAS ERRADAS
        $select_palavra= "SELECT id_palavra,palavra FROM palavra WHERE cod_subfase = $pagina 
        AND id_palavra != $id ORDER BY RAND() LIMIT 1";
        
        $resultado_palavra= mysqli_query($conexao,$select_palavra);

        while($linha_palavra=mysqli_fetch_assoc($resultado_palavra)){
            $palavra_errada[$j] = $linha_palavra['palavra']; 
            $codigo_palavra_errada[$j] = $linha_palavra['id_palavra']; 

            $j++;

        }
    }
    foreach($codigo_palavra_errada as $c){
        $codigo[$h]=$c;
        $h++;  
    }
    //COLOCANDO PALAVRAS ERRADAS NO VETOR PALAVRAS
    foreach($palavra_errada as $p){
        $palavras[$g]=$p;
        print_r($palavras[$g]);
        print_r("-");
        $g++;
        
    }
 
//NOME DA SUBFASE
$consulta4 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
$resultado4 = mysqli_query($conexao,$consulta4) or die("Erro na consulta2");
$linha = mysqli_fetch_assoc($resultado4);

}
?>