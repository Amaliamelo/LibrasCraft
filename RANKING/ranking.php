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
    $consulta = "SELECT COUNT(id_palavra) as qtd,cod_usuario, usuario.email as email FROM fase INNER JOIN subfase on
	fase.id_fase = subfase.cod_fase INNER JOIN palavra on
	palavra.cod_subfase=subfase.id_subfase INNER JOIN resposta ON 
    resposta.cod_palavra=palavra.id_palavra and resposta.resposta=resposta.cod_palavra 
    inner join usuario on usuario.id_usuario = resposta.cod_usuario 
    GROUP BY cod_usuario order by qtd DESC";
    
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");

    while($linha=mysqli_fetch_assoc($resultado)){
        $pontuacao[$linha["cod_usuario"]]=$linha["qtd"];
        $email[$linha["cod_usuario"]]=$linha["email"];
    }

    $consulta= "SELECT COUNT(id_frase) as qtd, cod_usuario FROM fase
	INNER JOIN subfase ON fase.id_fase = subfase.cod_fase
	INNER JOIN frase ON frase.cod_subfase=subfase.id_subfase 
    INNER JOIN resposta_frase ON resposta_frase.cod_frase=frase.id_frase 
    and resposta_frase.resposta_frase_correta =resposta_frase.resposta_frase_usuario 
    GROUP BY cod_usuario order by cod_usuario, qtd desc";
    
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");

     while($linha=mysqli_fetch_assoc($resultado)){
         $pontuacao[$linha["cod_usuario"]]+=$linha["qtd"];
     }
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
        </thead><!--abc = 1; plavra= 2; frase = 3; tentar dividir as fase na mostra do ranking -->
        <?php 
        $posicao_usuario=0;
        arsort($pontuacao);
        foreach($pontuacao as $cod_usuario => $qtd){
            $posicao_usuario++;
            echo'<tr class="table-warning flex-column justify-content-center align-items-center ">
                <th scope="row-sm-2" >'.$posicao_usuario.'</th>
                <td >'.$email[$cod_usuario].'</td>
                <td>'.$qtd.'</td>
            </tr>';

        }
        ?>
    </table>
</div>