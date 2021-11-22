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
$qtd = mysqli_num_rows($resultado);
print_r($qtd);
$linha_frase= mysqli_fetch_assoc($resultado);



if($qtd>0){
    $atividade= $linha_frase['frase'];
    //SELECIONANDO IDS NA TABELA FRASE_PALAVRA
    $consulta2 = "SELECT  cod_palavra, palavra, video_sinal FROM frase_palavra INNER JOIN palavra 
                  ON palavra.id_palavra = frase_palavra.cod_palavra WHERE cod_subfase ='9'  AND cod_frase ='".$linha_frase['id_frase']."' ";

    
          
    $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
    $i=0;
    while($linha_correto=mysqli_fetch_assoc($resultado2)){
        $palavras_corretas[$i] = $linha_correto['video_sinal']; 
        $codigo_palavras_corretas[$i] = $linha_correto['cod_palavra']; 
        $i++;
        
	}
    $consulta2 = "SELECT  cod_palavra, palavra, video_sinal FROM frase_palavra INNER JOIN palavra 
                  ON palavra.id_palavra = frase_palavra.cod_palavra WHERE cod_subfase ='10'  AND cod_frase ='".$linha_frase['id_frase']."' ";

    
          
    $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
    while($linha_correto=mysqli_fetch_assoc($resultado2)){
        $palavras_corretas[$i] = $linha_correto['video_sinal']; 
        $codigo_palavras_corretas[$i] = $linha_correto['cod_palavra']; 
        $i++;
        
	}
    $consulta2 = "SELECT  cod_palavra, palavra, video_sinal FROM frase_palavra INNER JOIN palavra 
                  ON palavra.id_palavra = frase_palavra.cod_palavra WHERE cod_subfase = $pagina  AND cod_frase ='".$linha_frase['id_frase']."' ";
         
    $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
    while($linha_correto=mysqli_fetch_assoc($resultado2)){
        $palavras_corretas[$i] = $linha_correto['video_sinal']; 
        $codigo_palavras_corretas[$i] = $linha_correto['cod_palavra']; 
        $i++;
        
	}
    print_r($codigo_palavras_corretas);

    $j=0;
    $id_corretos="0";
    foreach($codigo_palavras_corretas as $id){
        $id_corretos.=", $id";
    }
    
    //SELECIONANDO VERBOS ERRADOS
    $select_verbo = "SELECT id_palavra,palavra, video_sinal FROM palavra WHERE cod_subfase ='10'
    AND id_palavra NOT IN ($id_corretos) ORDER BY RAND() LIMIT 2";
    
    $resultado_verbo = mysqli_query($conexao,$select_verbo);
    while($linha_verbo=mysqli_fetch_assoc($resultado_verbo)){
        $palavra_errada[$j] = $linha_verbo['video_sinal']; 
        $codigo_palavra_errada[$j] = $linha_verbo['id_palavra']; 
        $j++; 
    }    

    //SELECIONANDO PRONOMES ERRADOS
    $select_pronome = "SELECT id_palavra,palavra, video_sinal FROM palavra WHERE cod_subfase ='9'
    AND id_palavra NOT IN ($id_corretos) ORDER BY RAND() LIMIT 2";
    
    $resultado_pronome = mysqli_query($conexao,$select_pronome);

    while($linha_pronome=mysqli_fetch_assoc($resultado_pronome)){
        $palavra_errada[$j] = $linha_pronome['video_sinal']; 
        $codigo_palavra_errada[$j] = $linha_pronome['id_palavra']; 
        $j++;

    }
    
    //SELECIONANDO PALAVRAS ERRADAS
    $select_palavra= "SELECT id_palavra,palavra, video_sinal FROM palavra WHERE cod_subfase = $pagina 
    AND id_palavra NOT IN ($id_corretos) ORDER BY RAND() LIMIT 2";
    
    $resultado_palavra= mysqli_query($conexao,$select_palavra);

    while($linha_palavra=mysqli_fetch_assoc($resultado_palavra)){
        $palavra_errada[$j] = $linha_palavra['video_sinal']; 
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
//NOME DA SUBFASE
$consulta4 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
$resultado4 = mysqli_query($conexao,$consulta4) or die("Erro na consulta2");
$linha = mysqli_fetch_assoc($resultado4);

}
?>