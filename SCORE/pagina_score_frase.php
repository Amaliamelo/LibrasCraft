<?php

 $fase_anterior_frase = "";
 $subfase_anterior_frase ="";
 $primeiro_frase = true;
 echo '
   
                 <!-- C (filha da div B) -->
                 <div class="col border bg-white">
                     <!-- D (filha da div C) : LINHA -->
         
                     <div class="row">
                         <div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
                             <h4 style="text-align:center;">ATIVIDADES NÍVEL FRASE - PONTUAÇÃO GERAL</h4>
                             <h6 style="text-align:center;"> Lembre-se, você deve acertar no minimo 75% das atividades para passar para o proximo nível</h6>
                         </div>
                         
                     </div>
                     <div class="row m-2">
                     <table class="table text-center  table-striped">';
 
  $qtd_frase=0;
  while($linha=mysqli_fetch_assoc($resultado_frase)){
   $fase_atual_frase = $linha["fase"];
   if($fase_anterior_frase!=$fase_atual_frase){
        if(!$primeiro_frase){
            echo "</tbody>";
            echo "<tr><td colspan='3' style='height:15px;background-color:black'></td></tr>";
        }

        echo '<tbody style="">
                <tr>
                    <td colspan="3" style="background-color:rgb(133, 199, 253);color:white;">                   
                                <h5>FASE: <b>'.$fase_atual_frase.'</b></h5>
                    </td>
                </tr>';
        $fase_anterior_frase = $fase_atual_frase;
    }

   

    $subfase_atual_frase = $linha["subfase"];
    if($subfase_anterior_frase!=$subfase_atual_frase){
        
        if($subfase_usuario_frase[$linha["id_subfase"]]==$subfase_frase[$linha["id_subfase"]]){
            if(isset($acerto_subfase_usuario_frase[$linha["id_subfase"]])){
                $acerto_frase = $acerto_subfase_usuario_frase[$linha["id_subfase"]];
                $qtd_questoes_frase = $subfase_frase[$linha["id_subfase"]];
                $nota_frase = number_format((($acerto_frase/$qtd_questoes_frase)*100),2);
                if($nota_frase>=75){
                    $status_fase_frase="#a6f7a6";
                    $msg_status_frase = "<h3>APROVADO</h3>";
                    if($pagina!="scores"){
                        $usuario_seleciona=$_SESSION["autorizado"];
                        $subfase_seleciona=$linha['id_subfase'];
                        $qtd_acerto_seleciona=$acerto_subfase_usuario_frase[$linha["id_subfase"]];
            
                        $seleciona = "SELECT * FROM usuario_subfase WHERE cod_usuario=$usuario_seleciona AND cod_subfase=$subfase_seleciona";
                        $resultado_seleciona = mysqli_query($conexao,$seleciona) or  die(mysqli_error($conexao));
                        if(mysqli_num_rows($resultado_seleciona)==1){
                            $insert = "UPDATE usuario_subfase SET qtd_acertos = qtd_acertos + $qtd_acerto_seleciona WHERE cod_usuario = $usuario_seleciona AND cod_subfase= $subfase_seleciona";                        mysqli_query($conexao,$insert)
                            or die(mysqli_error($conexao).$insert);    
                        }
                    }
                }
                else{
                    $status_fase_frase="#f87c7c";
                    $msg_status_frase = "<h3>REPROVADO</h3><br/>
                    <a href='limpar_respostas_frase.php?pagina=".$linha["id_subfase"]."' style='color:white;'>REFAZER TAREFA!</a>";
                }
            }
            else{
                $status_fase_frase="#f87c7c";
                $msg_status_frase = "<h3>REPROVADO</h3><br/>
                <a href='limpar_respostas_frase.php?pagina=".$linha["id_subfase"]."' style='color:white;'>REFAZER TAREFA!</a>";
           
            }
           
        }
        else{
        $status_fase_frase="#ffee57";
        $msg_status_frase = "<h3>EM ANDAMENTO</h3>
                <a href='../ATIVIDADES/atividade_".$_SESSION["condicao_auditiva"]."_frase.php?pagina=".$linha["id_subfase"]."'style='color:white;'>CONTINUAR TAREFA!</a>";
        }
        if(isset($acerto_subfase_usuario_frase[$linha["id_subfase"]])){
            $porcentagem_frase = $acerto_subfase_usuario_frase[$linha["id_subfase"]]/$subfase_frase[$linha["id_subfase"]];
            $qtd_acerto_frase=$acerto_subfase_usuario_frase[$linha["id_subfase"]];
        }
        else{
            $qtd_acerto_frase=0;
            $porcentagem_frase=0;
        }
        $porcentagem_frase = number_format($porcentagem_frase*100,2);
            /*
            <td class="m-3" colspan="3"  style="background-color:'.$status_fase_frase.';color:white;">               
                <h5>SUBFASE: <b> '.$subfase_atual_frase.'</br></b>
                Respondido: ('.$subfase_usuario_frase[$linha["id_subfase"]].' de 
                '.$subfase_frase[$linha["id_subfase"]].')</h5>
                <b>Acertos</b>:
                '.$qtd_acerto_frase.'/'.
                    $subfase_frase[$linha["id_subfase"]].' - '.$porcentagem_frase.'%
                <br />
                '.$msg_status_frase.'   
                <br />         
                <h4 style="cursor:pointer;">Clique aqui para verificar suas respostas</h4>
            </td>
            */
        echo '
        <tr id="id_'.$subfase_atual_frase.'_frase">
            <td class="m-3" colspan="3"  style="background-color:'.$status_fase_frase.';color:#696969;">               
                <h5>'.$subfase_atual_frase.'</h5>
                '.$msg_status_frase.'
                <b>Respondido:</b>'.$subfase_usuario_frase[$linha["id_subfase"]].' de 
                '.$subfase_frase[$linha["id_subfase"]].'<br/>
                <b>Acertos:</b>
                '.$qtd_acerto_frase.'/'.
                    $subfase_frase[$linha["id_subfase"]].' - '.$porcentagem_frase.'%
                <br />  
                <br />         
                <h5 style="cursor:pointer;">Clique aqui para verificar suas respostas</h5>
            </td>
        </tr>
        <script>
            $(function(){
                var status_'.$subfase_atual_frase.' = true;
                $("#id_'.$subfase_atual_frase.'_frase").click(function(){
                    if(status_'.$subfase_atual_frase.'){
                        $(".subfase_'.$subfase_atual_frase.'_frase").fadeIn();
                        status_'.$subfase_atual_frase.' = false;
                    }
                    else{
                        $(".subfase_'.$subfase_atual_frase.'_frase").fadeOut();
                        status_'.$subfase_atual_frase.' = true;
                    }
                });
            });
        </script>';

        echo '<tr class="subfase_'.$subfase_atual_frase.'_frase" style="display:none;"><th>O Exercício</th><th>Sua Resposta</th><th>STATUS</th></tr>';     
        $subfase_anterior_frase = $subfase_atual_frase;
        $qtd_frase = 0;
        $pontuacao_frase = 0;
    }
   $qtd_frase++;

    if($linha["questao"]==$linha["resposta_frase_usuario"]){
        $img_status = "correto";
        $pontuacao_frase++;
    }
    else{
        $img_status = "incorreto";
    }
    $r_correto="";
    $r_usuario="";
    if($_SESSION["condicao_auditiva"]=="surdo"){
        $r_usuario= $linha["resposta_frase_usuario"];
        $r_correto= $linha["questao"];
    }else{
        $resposta_usuario=explode("-",$linha["resposta_frase_usuario"]);
        $resposta_correta=explode("-",$linha["questao"]);
        foreach($resposta_usuario as $i => $r){
            if($i!=0){
                $r_usuario.=" ".$palavra[$r];
            }
        }
        foreach($resposta_correta as $i => $r){
            if($i!=0){
                $r_correto.=" ".$palavra[$r];
            }
        }
    }
   
    
   echo '<tr class=" subfase_'.$subfase_atual_frase.'_frase" style="display:none;">
            <th style="height:70px;">                                                
                '.$r_correto.'
            </th>
            <th>
                '.$r_usuario.'
            </th>
            <th>
                <img src="../img/icones/score/'.$img_status.'.png" width="50px" />
            </th>
        </tr>';
    $r_correto=null;
    $r_usuario=null;
   
   $primeiro_frase = false; 
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