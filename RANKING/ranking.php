<?php

include "../conexao.php";
include "../ABC/cabecalho_abc.php";
include "../ABC/menu_abc.php";
    /*SELECT COUNT(id_palavra) as qtd,cod_usuario
        FROM fase INNER JOIN subfase ON fase.id_fase = subfase.cod_fase
        INNER JOIN palavra ON palavra.cod_subfase=subfase.id_subfase 
        INNER JOIN resposta ON 
        resposta.cod_palavra=palavra.id_palavra and resposta.resposta=resposta.cod_palavra 
        GROUP BY cod_usuario ORDER BY qtd DESC*/


    $consulta = "SELECT COUNT(id_palavra) as qtd,cod_usuario, usuario.email as email, id_fase FROM fase INNER JOIN subfase on
    fase.id_fase = subfase.cod_fase INNER JOIN palavra on
    palavra.cod_subfase=subfase.id_subfase INNER JOIN resposta ON 
    resposta.cod_palavra=palavra.id_palavra and resposta.resposta=resposta.cod_palavra 
    and id_fase='4'
    inner join usuario on usuario.id_usuario = resposta.cod_usuario 
    GROUP BY cod_usuario order by qtd DESC";
     $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");



    while($linha=mysqli_fetch_assoc($resultado)){
            $pontuacao_abc[$linha["cod_usuario"]]=$linha["qtd"];
            $email[$linha["cod_usuario"]]=$linha["email"];
            $total[$linha["cod_usuario"]]=$pontuacao_abc[$linha["cod_usuario"]];
            print_r($linha["cod_usuario"] );
    }

    $consulta = "SELECT COUNT(id_palavra) as qtd,cod_usuario, usuario.email as email, id_fase FROM fase INNER JOIN subfase on
	fase.id_fase = subfase.cod_fase INNER JOIN palavra on
	palavra.cod_subfase=subfase.id_subfase INNER JOIN resposta ON 
    resposta.cod_palavra=palavra.id_palavra and resposta.resposta=resposta.cod_palavra 
    and id_fase!='4'
    inner join usuario on usuario.id_usuario = resposta.cod_usuario 
    GROUP BY cod_usuario order by qtd DESC";
    
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");

    while($linha=mysqli_fetch_assoc($resultado)){
            $pontuacao[$linha["cod_usuario"]]=($linha["qtd"]*2);
            $email[$linha["cod_usuario"]]=$linha["email"];
            if(!isset($total[$linha["cod_usuario"]])){
                $total[$linha["cod_usuario"]]=0;

            }
            $total[$linha["cod_usuario"]]+=$pontuacao[$linha["cod_usuario"]];
    }
    
    $consulta= "SELECT COUNT(id_frase) as qtd, cod_usuario FROM fase
	INNER JOIN subfase ON fase.id_fase = subfase.cod_fase
	INNER JOIN frase ON frase.cod_subfase=subfase.id_subfase 
    INNER JOIN resposta_frase ON resposta_frase.cod_frase=frase.id_frase 
    and resposta_frase.resposta_frase_correta =resposta_frase.resposta_frase_usuario 
    GROUP BY cod_usuario order by cod_usuario, qtd desc";
    
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");

     while($linha=mysqli_fetch_assoc($resultado)){
         $pontuacao_frase[$linha["cod_usuario"]]=($linha["qtd"]*3);
        $total[$linha["cod_usuario"]]+= $pontuacao_frase[$linha["cod_usuario"]];
         //print_r($total[$linha["cod_usuario"]]);
    }
    arsort($total);
    
?>
<main class="bodyscores " style="padding-top:3%; padding-bottom:21.3%" >
<div class="container align-middle pt-5 mt-5 mp-5">
    <table class="table border pt-5 table-hover ranking  ">
        <thead class="table-success ">
            <tr class="bg-warning">
                <th scope="col-sm-2">Posição</th>
                <th scope="col-sm-2">Usuário</th>
                <th scope="col-sm-2">Acertos</th>
            </tr>
        </thead>
        <?php 
        $posicao_usuario=0;
        $pontuacao_anterior=-1;
        foreach($total as $cod_usuario => $qtd){
            if($qtd!=$pontuacao_anterior){
                $posicao_usuario++;
                $pontuacao_anterior=$qtd;
            }
            if($cod_usuario == $_SESSION["autorizado"]){
                echo'<tr class="flex-column justify-content-center align-items-center" style="background-color: #f7db63;">';
                if($posicao_usuario == 1){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'<img src="../img/medalhas/ouro.png" height="50" width="50" /></th>';
                }if($posicao_usuario == 2){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'<img src="../img/medalhas/prata.png" height="50" width="50" /></th>';
                }if($posicao_usuario == 3){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'<img src="../img/medalhas/bronze.png" height="50" width="50" /></th>';
                }if($posicao_usuario > 3){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'</th>';
                }
                    
                echo'<td >'.$email[$cod_usuario].'</td>
                    <td>'.$qtd.'</td>
                </tr>';
            }
            else{
                echo'<tr class="flex-column justify-content-center align-items-center table-warning">';
                if($posicao_usuario == 1){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'<img src="../img/medalhas/ouro.png" height="50" width="50" /></th>';
                }if($posicao_usuario == 2){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'<img src="../img/medalhas/prata.png" height="50" width="50" /></th>';
                }if($posicao_usuario == 3){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'<img src="../img/medalhas/bronze.png" height="50" width="50" /></th>';
                }if($posicao_usuario > 3){
                    echo'<th scope="row-sm-2" >'.$posicao_usuario.'</th>';
                }
                    
                echo'<td >'.$email[$cod_usuario].'</td>
                    <td>'.$qtd.'</td>
                </tr>';
            }

        }
        ?>
    </table>
</div>