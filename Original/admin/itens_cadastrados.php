<?php
    include("menu.php");
    include("conexao.php");

    $consulta_palavra = "SELECT * FROM palavra ORDER BY nivel ";
    $resultado_palavra = mysqli_query($conexao,$consulta_palavra) or die ("Erro");

    $consulta_atividade = "SELECT * FROM atividade ORDER BY nivel";
    $resultado_atividade = mysqli_query($conexao,$consulta_atividade) or die ("Erro");

    ?> 
