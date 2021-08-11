<?php

include "../conexao.php";
include "../ABC/cabecalho_abc.php";
include "../ABC/menu_abc.php";

    $consulta = "SELECT usuario.email as email, cod_subfase, sum(usuario_subfase.qtd_acertos) AS acertos_total,
    subfase.cod_fase as fase, fase.nome as nome_fase, subfase.nome as nome_subfase FROM usuario_subfase INNER JOIN usuario
    on usuario_subfase.cod_usuario=usuario.id_usuario INNER JOIN subfase on 
    subfase.id_subfase=usuario_subfase.cod_subfase INNER JOIN fase on subfase.cod_fase=fase.id_fase GROUP BY usuario.nome,cod_fase 
    ORDER BY acertos_total DESC";
    
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");
?>
<main class="bodyscores" style="padding-top:3%; padding-bottom:15.7%" >
<div class="container align-middle pt-5 mt-5 mp-5">
    <table class="table border pt-5  table-hover">
        <thead class="table-success">
            <tr class="bg-warning">
                <th scope="col-sm-2">Posição</th>
                <th scope="col-sm-2">Usuário</th>
                <th scope="col-sm-2">Acertos</th>
                <th scope="col-sm-2">Subfase</th>
                <th scope="col-sm-2">Fase</th>
            </tr>
        </thead>
        <?php 
        $posicao_usuario=0;
        while($linha=mysqli_fetch_assoc($resultado)){
            $posicao_usuario++;
            echo'<tr class="table-warning flex-column justify-content-center align-items-center">
                <th scope="row-sm-2" >'.$posicao_usuario.'</th>
                <td >'.$linha["email"].'</td>
                <td>'.$linha["acertos_total"].'</td>
                <td>'.$linha["nome_subfase"].'</td>
                <td>'.$linha["nome_fase"].'</td>
            </tr>';

        }
        ?>
    </table>
</div>