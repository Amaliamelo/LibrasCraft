<?php
    session_start();
    include "conexao.php";

    $usuario = $_SESSION["autorizado"];
    $pagina = $_GET["pagina"];

    $delete = "DELETE FROM resposta 
                    WHERE cod_usuario='$usuario' AND cod_subfase='$pagina'";
    mysqli_query($conexao,$delete)
        or die(mysqli_error($conexao));

    header("location: atividade_".$_SESSION["condicao_auditiva"].".php?pagina=".$pagina);
?>