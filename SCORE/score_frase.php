<?php


//// Monta vetor de frases do sistema
$select_frase= "SELECT id_frase, frase FROM frase";
$resultado_frase = mysqli_query($conexao,$select_frase)
   or die(mysqli_error($conexao));
while($linha_frase=mysqli_fetch_assoc($resultado_frase)){
  $frase[$linha_frase["id_frase"]]=$linha_frase["frase"];
}
//////////////////////////////////////////////////

/// Conta quantas frase tem na subfase e armazena esta quantidade em um vetor
$select_frase = "SELECT COUNT(id_frase) as qtd, subfase.id_subfase as subfase
      FROM fase INNER JOIN subfase ON fase.id_fase = subfase.cod_fase";
if(isset($_GET["pagina"])){
  $select_frase.= " AND subfase.id_subfase='".$_GET["pagina"]."' ";
}

$select_frase.= " INNER JOIN frase ON frase.cod_subfase=subfase.id_subfase 
          GROUP BY fase.id_fase, subfase.id_subfase ORDER BY fase.nome, subfase.nome";
 
$resultado_frase = mysqli_query($conexao,$select_frase)
or die(mysqli_error($conexao));
   while($linha_frase=mysqli_fetch_assoc($resultado_frase)){
     $subfase_frase[$linha_frase["subfase"]]=$linha_frase["qtd"];
   }

/////////////////////////////////////////////////////////////////////////////

/// Conta quantas frases o usuario respondeu na subfase
$select_frase= "SELECT COUNT(id_frase) as qtd, subfase.id_subfase as subfase
      FROM fase INNER JOIN subfase ON fase.id_fase = subfase.cod_fase";
if(isset($_GET["pagina"])){
  $select_frase.= " AND subfase.id_subfase='".$_GET["pagina"]."' ";
}

$select_frase.= " INNER JOIN frase ON frase.cod_subfase=subfase.id_subfase 
          INNER JOIN resposta_frase ON 
                    resposta_frase.cod_frase=frase.id_frase AND 
                    cod_usuario='".$_SESSION["autorizado"]."'
          GROUP BY fase.id_fase, subfase.id_subfase ORDER BY fase.nome, subfase.nome";
 
$resultado_frase = mysqli_query($conexao,$select_frase)
or die(mysqli_error($conexao));
   while($linha_frase=mysqli_fetch_assoc($resultado_frase)){
     $subfase_usuario_frase[$linha_frase["subfase"]]=$linha_frase["qtd"];
   }
/////////////////////////////////////////////////////////////////////////////

/// Nota da subfase para o usuário
$select_frase= "SELECT COUNT(resposta_frase_usuario) as qtd, cod_subfase FROM
           resposta_frase
           WHERE cod_usuario='".$_SESSION["autorizado"]."'
           AND resposta_frase_correta=resposta_frase_usuario
          GROUP BY cod_subfase";

$resultado_frase = mysqli_query($conexao,$select_frase)
or die(mysqli_error($conexao));
  $acerto_subfase_usuario_frase[]=0;
   while($linha_frase=mysqli_fetch_assoc($resultado_frase)){
      $acerto_subfase_usuario_frase[$linha_frase["cod_subfase"]]=$linha_frase["qtd"];
    
   }   
/////////////////////////////////////////////////////////////////////////////

////////Consulta de frases agrupadas pelo id do usuario
 $select_frase= "SELECT fase.nome as fase, 
                   subfase.nome as subfase, 
                   subfase.id_subfase as id_subfase,
                   resposta_frase_usuario, 
                   resposta_frase.resposta_frase_correta as questao 
           FROM `resposta_frase` 
               INNER JOIN frase ON  
                       resposta_frase.cod_frase = frase.id_frase
               INNER JOIN subfase ON 
                       resposta_frase.cod_subfase=subfase.id_subfase AND 
                       cod_usuario='".$_SESSION["autorizado"]."'";
if(isset($_GET["pagina"])){
  $select_frase.= " AND subfase.id_subfase='".$_GET["pagina"]."' ";
}
$select_frase.= "  INNER JOIN fase ON 
                       subfase.cod_fase = fase.id_fase ORDER BY resposta_frase.cod_subfase";
 $resultado_frase = mysqli_query($conexao,$select_frase) 
   or die(mysqli_error($conexao));
///////////////////////////////////////////////////////////////
//NOME DA SUBFASE
$i=0;
  if(isset($_GET["pagina"])){
      $pagina=$_GET["pagina"];
      $consulta2 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
      $resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
      $linha= mysqli_fetch_assoc($resultado2);
  }
    else{
      $linha["nome"]="scores";
      $pagina="scores";

  }

?>

