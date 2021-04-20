<?php
include("conexao.php");
include("menu.php");

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
           where cod_usuario='".$_SESSION["autorizado"]."'
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
                       subfase.cod_fase = fase.id_fase";
 $resultado = mysqli_query($conexao,$select)
   or die(mysqli_error($conexao));
///////////////////////////////////////////////////////////////
//NOME DA SUBFASE
if(isset($_GET["pagina"])){
$pagina=$_GET["pagina"];
$consulta2 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
$resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
$linha = mysqli_fetch_assoc($resultado2);
}
else{
  $linha["nome"]="scores";
}
?>
<style>
  body 
  {
    
    background: url("img/fundo/<?php echo $linha["nome"];?>.png") no-repeat center top fixed;
    width:100%; 
    
  }
</style>



<?php

 $fase_anterior = "";
 $subfase_anterior ="";
 $primeiro = true;
 
 echo '	<!-- A - div principal-->
 <div class="container mt-5 align-middle" >
     <!-- B (filha da principal - A)-->
     <div class="row justify-content-center "style="margin-top:-100px;">
         <div class="row">
             <div class="col d-flex flex-column justify-content-center align-items-center">
                 <!-- C (filha da div B) -->
                 <div class="col-9 border bg-white">
                     <!-- D (filha da div C) : LINHA -->
         
                     <div class="row">
                         <div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
                             <h4 style="text-align:center;">PONTUAÇÃO GERAL DAS ATIVIDADES</h4>
                             <h5 style="text-align:center;"> Lembre-se, você deve acertar no minimo 75% das atividades para passar para o proximo nível</h5>
                         </div>
                         
                     </div>
                     <div class="row">
                     <table class="table text-center  table-striped">';
 
  $qtd=0;
  while($linha=mysqli_fetch_assoc($resultado)){
   $fase_atual = $linha["fase"];
   if($fase_anterior!=$fase_atual){

    if(!$primeiro){
        echo "</tbody>";
        echo "<tr><td colspan='3' style='height:15px;background-color:black'></td></tr>";
    }

     echo '<tbody style="">
            <tr>
                <td colspan="3" style="background-color:#00E5EE;color:white;">                   
                            <h5>FASE: <b>'.$fase_atual.'</b></h5>
                </td>
            </tr>';
     $fase_anterior = $fase_atual;
   }
   $subfase_atual = $linha["subfase"];
   if($subfase_anterior!=$subfase_atual){
     
     if($subfase_usuario[$linha["id_subfase"]]==$subfase[$linha["id_subfase"]]){
       $acerto = $acerto_subfase_usuario[$linha["id_subfase"]];
       $qtd_questoes = $subfase[$linha["id_subfase"]];
      $nota = number_format((($acerto/$qtd_questoes)*100),2);
      if($nota>=75){
        $status_fase="green";
        $msg_status = "<h1>APROVADO</h1>";
      }
      else{
        $status_fase="#EE2C2C";
        $msg_status = "<h2>REPROVADO</h2>
        <a href='limpar_respostas.php?pagina=".$linha["id_subfase"]."' style='color:white;'>REFAZER TAREFA!</a>";
      }
      
     }
     else{
       $status_fase="#EEC900";
       $msg_status = "<h2>EM ANDAMENTO</h2>
            <a href='atividade_".$_SESSION["condicao_auditiva"].".php?pagina=".$linha["id_subfase"]."'style='color:white;'>CONTINUAR TAREFA!</a>";
     }
     $porcentagem = $acerto_subfase_usuario[$linha["id_subfase"]]/$subfase[$linha["id_subfase"]];
     $porcentagem = number_format($porcentagem*100,2);
     echo '
        <tr id="id_'.$subfase_atual.'">
            <td colspan="3"  style="background-color:'.$status_fase.';color:white;">               
               <h5>SUBFASE: <b> '.$subfase_atual.'
               Respondido: ('.$subfase_usuario[$linha["id_subfase"]].' de 
               </b>'.$subfase[$linha["id_subfase"]].')</h5>
               <b>Acertos</b>:
               '.$acerto_subfase_usuario[$linha["id_subfase"]].'/'.
                $subfase[$linha["id_subfase"]].' - '.$porcentagem.'%
               <br />
               '.$msg_status.'   
               <br />         
               <h4 style="cursor:pointer;">Clique aqui para verificar suas respostas</h4>
            </td>
        </tr>
        <script>
        $(function(){

          var status_'.$subfase_atual.' = true;
          $("#id_'.$subfase_atual.'").click(function(){
            if(status_'.$subfase_atual.'){
              $(".subfase_'.$subfase_atual.'").fadeIn();
              status_'.$subfase_atual.' = false;
            }
            else{
              $(".subfase_'.$subfase_atual.'").fadeOut();
              status_'.$subfase_atual.' = true;
            }
          });
        });
        </script>';

    echo '<tr class="subfase_'.$subfase_atual.'" style="display:none;"><th>O Exercício</th><th>Sua Resposta</th><th>STATUS</th></tr>';     
     $subfase_anterior = $subfase_atual;
     $qtd = 0;
     $pontuacao = 0;
   }
   $qtd++;


   if($linha["questao"]==$linha["resposta"]){
    $img_status = "correto";
    $pontuacao++;
  }
  else{
    $img_status = "incorreto";
  }

   echo '<tr class="subfase_'.$subfase_atual.'" style="display:none;">
            <th style="height:70px;">                                                
                '.$palavra[$linha["resposta"]].'
            </th>
            <th>
                '.$palavra[$linha["questao"]].'
            </th>
            <th>
                <img src="img/icones/score/'.$img_status.'.png" width="50px" />
            </th>
        </tr>';
   
   $primeiro = false; 
 }


 echo "             
 
                        </tbody>
                        <tr><td colspan='3' style='height:5px;background-color:#363636'></td></tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
?>
