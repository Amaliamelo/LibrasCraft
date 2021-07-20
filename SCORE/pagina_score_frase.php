<?php

 $fase_anterior = "";
 $subfase_anterior ="";
 $primeiro = true;
 echo '
   
                 <!-- C (filha da div B) -->
                 <div class="col border bg-white">
                     <!-- D (filha da div C) : LINHA -->
         
                     <div class="row">
                         <div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
                             <h4 style="text-align:center;">PONTUAÇÃO GERAL DAS ATIVIDADES DO NIVEL FRASE</h4>
                             <h5 style="text-align:center;"> Lembre-se, você deve acertar no minimo 75% das atividades para passar para o proximo nível</h5>
                         </div>
                         
                     </div>
                     <div class="row m-2">
                     <table class="table text-center  table-striped">';
 
  $qtd=0;
  while($linha=mysqli_fetch_assoc($resultado_frase)){
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
                <a href='atividade_".$_SESSION["condicao_auditiva"]."_frase.php?pagina=".$linha["id_subfase"]."'style='color:white;'>CONTINUAR TAREFA!</a>";
        }
        if(isset($acerto_subfase_usuario[$linha["id_subfase"]])){
            $porcentagem = $acerto_subfase_usuario[$linha["id_subfase"]]/$subfase[$linha["id_subfase"]];
            $qtd_acerto=$acerto_subfase_usuario[$linha["id_subfase"]];
        }
        else{
            $qtd_acerto=0;
            $porcentagem=0;
        }
        $porcentagem = number_format($porcentagem*100,2);
        echo '
        <tr id="id_'.$subfase_atual.'_frase">
            <td class="m-3" colspan="3"  style="background-color:'.$status_fase.';color:white;">               
            <h5>SUBFASE: <b> '.$subfase_atual.'</br></b>
            Respondido: ('.$subfase_usuario[$linha["id_subfase"]].' de 
            '.$subfase[$linha["id_subfase"]].')</h5>
            <b>Acertos</b>:
            '.$qtd_acerto.'/'.
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
                $("#id_'.$subfase_atual.'_frase").click(function(){
                    if(status_'.$subfase_atual.'){
                        $(".subfase_'.$subfase_atual.'_frase").fadeIn();
                        status_'.$subfase_atual.' = false;
                    }
                    else{
                        $(".subfase_'.$subfase_atual.'_frase").fadeOut();
                        status_'.$subfase_atual.' = true;
                    }
                });
            });
        </script>';

        echo '<tr class="subfase_'.$subfase_atual.'_frase" style="display:none;"><th>O Exercício</th><th>Sua Resposta</th><th>STATUS</th></tr>';     
        $subfase_anterior = $subfase_atual;
        $qtd = 0;
        $pontuacao = 0;
    }
   $qtd++;

    if($linha["questao"]==$linha["resposta_frase_usuario"]){
        $img_status = "correto";
        $pontuacao++;
    }
    else{
        $img_status = "incorreto";
    }

   echo '<tr class=" subfase_'.$subfase_atual.'_frase" style="display:none;">
            <th style="height:70px;">                                                
                '.$frase[$linha["questao"]].'
            </th>
            <th>
                '.$frase[$linha["resposta_frase_usuario"]].'
            </th>
            <th>
                <img src="../img/icones/score/'.$img_status.'.png" width="50px" />
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
";
include "../rodape.php";
?>