<?php

    //local no qual o banco de dados está instalado
    $local = "us-mm-auto-dca-04-a.cleardb.net";
	$bd = "heroku_40a387c8584725b";
	$usuario = "b7440030167e1c";
    $senha = "cc79340c";

    $conexao = mysqli_connect($local,$usuario,$senha,$bd) 
                    or die("ERRO");
    mysqli_set_charset($conexao,"utf8");

?>