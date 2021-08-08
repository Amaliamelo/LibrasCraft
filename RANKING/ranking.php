<?php

include "../conexao.php";
include "../ABC/cabecalho_abc.php";
include "../ABC/menu_abc.php";

    $consulta = "SELECT usuario.nome as nome, cod_subfase, sum(usuario_subfase.qtd_acertos) AS acertos_total,
    subfase.cod_fase as fase, subfase.nome as nome_subfase FROM usuario_subfase INNER JOIN usuario
    on usuario_subfase.cod_usuario=usuario.id_usuario INNER JOIN subfase on 
    subfase.id_subfase=usuario_subfase.cod_subfase GROUP BY usuario.nome,cod_subfase 
    ORDER BY acertos_total DESC";
    print_r($consulta);
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta1");
?>
<main class="bodyscores" style="height: 100%; padding-top:3%; padding-bottom:17%;" >
<div class="container  mt-4">
    <table class="table border">
        <thead class="table-success">
            <tr>
                <th scope="col">Posição</th>
                <th scope="col">Usuário</th>
                <th scope="col">Acertos</th>
                <th scope="col">Subfase</th>
                <th scope="col">Fase</th>
            </tr>
        </thead>
        <?php 
        $posicao_usuario=0;
        while($linha=mysqli_fetch_assoc($resultado)){
            $posicao_usuario++;
            echo'<tr class="table-warning">
                <th scope="row" >'.$posicao_usuario.'</th>
                <td >'.$linha["nome"].'</td>
                <td>'.$linha["acertos_total"].'</td>
                <td>'.$linha["nome_subfase"].'</td>
                <td>'.$linha["fase"].'</td>

            </tr>';

        }
        ?>
    </table>
</div>