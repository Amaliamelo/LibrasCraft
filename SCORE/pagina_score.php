<?php

 $fase_anterior = "";
 $subfase_anterior ="";
 $primeiro = true;
 echo '	<!-- A - div principal-->
 <main class="body'.$linha["nome"].'" style="height: 100%; padding-bottom:24%;" >
    <div class="container align-middle"   >
     <!-- B (filha da principal - A)-->
     <div class="row justify-content-center" >
         <div class="row card_atv">
             <div class="col justify-content-center align-items-center">
                 <!-- C (filha da div B) -->
                 <div class="col border bg-white">
                     <!-- D (filha da div C) : LINHA -->
         
                     <div class="row">
                         <div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
                             <h4 style="text-align:center;">ATIVIDADES NÍVEL PALAVRA - PONTUAÇÃO GERAL</h4>
                             <h6 style="text-align:center;"> Lembre-se, você deve acertar no minimo 75% das atividades para passar para o proximo nível</h6>
                         </div>
                         
                     </div>
                     <div class="row m-2">
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
                    <td colspan="3" style="background-color:rgb(133, 199, 253);color:white;">                   
                                <h5>FASE: <b>'.$fase_atual.'</b></h5>
                    </td>
                </tr>';
        $fase_anterior = $fase_atual;
    }

   

    $subfase_atual = $linha["subfase"];
    if($subfase_anterior!=$subfase_atual){
        
        if($subfase_usuario[$linha["id_subfase"]]==$subfase[$linha["id_subfase"]]){
            if(isset($acerto_subfase_usuario[$linha["id_subfase"]])){
                $acerto = $acerto_subfase_usuario[$linha["id_subfase"]];
                $qtd_questoes = $subfase[$linha["id_subfase"]];
                $nota = number_format((($acerto/$qtd_questoes)*100),2);
                if($nota>=75){
                    $status_fase="#a6f7a6";
                    $msg_status = "<h3>APROVADO</h3>";
                    if($pagina!="scores"){
                        $usuario_seleciona=$_SESSION["autorizado"];
                        $subfase_seleciona=$linha['id_subfase'];
                        $qtd_acerto_seleciona=$acerto_subfase_usuario[$linha["id_subfase"]];
            
                        $seleciona = "SELECT * FROM usuario_subfase WHERE cod_usuario=$usuario_seleciona AND cod_subfase=$subfase_seleciona";
                        $resultado_seleciona = mysqli_query($conexao,$seleciona) or  die(mysqli_error($conexao));
                        if(mysqli_num_rows($resultado_seleciona)==0){
                            $insert = "INSERT INTO usuario_subfase(cod_usuario,cod_subfase,qtd_acertos) VALUES (
                                '$usuario_seleciona',
                                '$subfase_seleciona',
                                '$qtd_acerto_seleciona'
                                )";
                            mysqli_query($conexao,$insert)
                            or die(mysqli_error($conexao).$insert);    
                        }
                    }
                }
                else{
                    $status_fase="#f87c7c";
                    $msg_status = "<h3>REPROVADO</h3>
                    <a href='limpar_respostas.php?pagina=".$linha["id_subfase"]."' style='color:white;'>REFAZER TAREFA!</a>";
                }
            }
            else{
                $status_fase="#f87c7c";
                $msg_status = "<h3>REPROVADO</h3>
                <a href='limpar_respostas.php?pagina=".$linha["id_subfase"]."' style='color:white;'>REFAZER TAREFA!</a>";
            
            }
           
        
        }
        else{
        $status_fase="#ffee57";
        $msg_status = "<h3>EM ANDAMENTO</h3>
                <a href='atividade_".$_SESSION["condicao_auditiva"].".php?pagina=".$linha["id_subfase"]."'style='color:white;'>CONTINUAR TAREFA!</a>";
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
        /*<td class="m-3" colspan="3"  style="background-color:'.$status_fase.';color:white;">               
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
            </td>*/
        echo '
        <tr id="id_'.$subfase_atual.'" class="table-success">
            <td class="m-3" colspan="3"  style="background-color:'.$status_fase.'; color:#696969;">               
            
                <h5>'.$subfase_atual.'<h5>
                '.$msg_status.'   
                <b>Respondido:</b> '.$subfase_usuario[$linha["id_subfase"]].' de 
                '.$subfase[$linha["id_subfase"]].'<br/>
                <b>Acertos</b>:
                '.$qtd_acerto.'/'.
                    $subfase[$linha["id_subfase"]].' - '.$porcentagem.'%
                <br />
                <br />         
                <h5 style="cursor:pointer;">Clique aqui para verificar suas respostas</h5>
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
                '.$palavra[$linha["questao"]].'
            </th>
            <th>
                '.$palavra[$linha["resposta"]].'
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
           
";
?>