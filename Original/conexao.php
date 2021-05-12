<?php

    //local no qual o banco de dados está instalado
    $local = "uranus.ignitionserver.net:3306";
    $usuario = "bsts_librascraft";
    $senha = "lib15900!";
    $bd = "bsts_librascraft";

    $conexao = mysqli_connect($local,$usuario,$senha,$bd) 
                    or die("ERRO");
    mysqli_set_charset($conexao,"utf8");

?>