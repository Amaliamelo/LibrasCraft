<?php
include "../conexao.php";
include "../ABC/cabecalho_abc.php";
include "../ABC/menu_abc.php";

//// Monta vetor de palavras do sistema
$select = "SELECT id_palavra, palavra FROM palavra";
$resultado = mysqli_query($conexao,$select)
   or die(mysqli_error($conexao));
while($linha=mysqli_fetch_assoc($resultado)){
  $palavra[$linha["id_palavra"]]=$linha["palavra"];
}
//////////////////////////////////////////////////

/// Conta quantas palavras tem na subfase e armazena esta quantidade em um vetor
$select = "SELECT COUNT(id_palavra) as qtd, subfase.id_subfase as subfase
      FROM fase INNER JOIN subfase ON fase.id_fase = subfase.cod_fase";
if(isset($_GET["pagina"])){
  $select.= " AND subfase.id_subfase='".$_GET["pagina"]."' ";
}

$select.= " INNER JOIN palavra ON palavra.cod_subfase=subfase.id_subfase 
          GROUP BY fase.id_fase, subfase.id_subfase ORDER BY fase.nome, subfase.nome";
 
$resultado = mysqli_query($conexao,$select)
or die(mysqli_error($conexao));
   while($linha=mysqli_fetch_assoc($resultado)){
     $subfase[$linha["subfase"]]=$linha["qtd"];
   }

/////////////////////////////////////////////////////////////////////////////

/// Conta quantas palavras o usuario respondeu na subfase
$select = "SELECT COUNT(id_palavra) as qtd, subfase.id_subfase as subfase
      FROM fase INNER JOIN subfase ON fase.id_fase = subfase.cod_fase";
if(isset($_GET["pagina"])){
  $select.= " AND subfase.id_subfase='".$_GET["pagina"]."' ";
}

$select.= " INNER JOIN palavra ON palavra.cod_subfase=subfase.id_subfase 
          INNER JOIN resposta ON 
                    resposta.cod_palavra=palavra.id_palavra AND 
                    cod_usuario='".$_SESSION["autorizado"]."'
          GROUP BY fase.id_fase, subfase.id_subfase ORDER BY fase.nome, subfase.nome";
 
$resultado = mysqli_query($conexao,$select)
or die(mysqli_error($conexao));
   while($linha=mysqli_fetch_assoc($resultado)){
     $subfase_usuario[$linha["subfase"]]=$linha["qtd"];
   }
/////////////////////////////////////////////////////////////////////////////

/// Nota da subfase para o usuário
$select = "SELECT COUNT(resposta) as qtd, cod_subfase FROM
           resposta            
           WHERE cod_usuario='".$_SESSION["autorizado"]."'
           AND resposta=cod_palavra
          GROUP BY cod_subfase";

$resultado = mysqli_query($conexao,$select)
or die(mysqli_error($conexao));
   while($linha=mysqli_fetch_assoc($resultado)){
     $acerto_subfase_usuario[$linha["cod_subfase"]]=$linha["qtd"];
   }   

/////////////////////////////////////////////////////////////////////////////

////////Consulta de palavras agrupadas pelo id do usuario
 $select = "SELECT fase.nome as fase, 
                   subfase.nome as subfase, 
                   subfase.id_subfase as id_subfase,
                   resposta, 
                   resposta.cod_palavra as questao 
           FROM `resposta` 
               INNER JOIN palavra ON  
                       resposta.cod_palavra = palavra.id_palavra 
               INNER JOIN subfase ON 
                       resposta.cod_subfase=subfase.id_subfase AND 
                       cod_usuario='".$_SESSION["autorizado"]."'";
if(isset($_GET["pagina"])){
  $select.= " AND subfase.id_subfase='".$_GET["pagina"]."' ";
}
$select.= "  INNER JOIN fase ON 
                       subfase.cod_fase = fase.id_fase ORDER BY resposta.cod_subfase";
 $resultado = mysqli_query($conexao,$select) 
   or die(mysqli_error($conexao));
///////////////////////////////////////////////////////////////

//NOME DA SUBFASE
$i=0;
  if(isset($_GET["pagina"])){
      $pagina=$_GET["pagina"];
      $consulta2 = "SELECT nome, cod_fase FROM subfase WHERE id_subfase = $pagina";
      $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
      $linha = mysqli_fetch_assoc($resultado2);
      if($linha["cod_fase"]!="4"){
        include "score_frase.php";

        include "pagina_score.php";
        include "pagina_score_frase.php";
      }
      else{
        include "pagina_score.php";
      }
  }
    else{
      $linha["nome"]="scores";
      $pagina="scores";
      
      include "score_frase.php";
      include "pagina_score.php";
      include "pagina_score_frase.php";

  }

