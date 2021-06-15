<?php

    include "conexao.php";

    $tabela = $_POST["tabela"];
    $coluna = $_POST["coluna"];
    $id = $_POST["id"];

    $delete = "DELETE FROM $tabela WHERE $coluna=$id";

    if(mysqli_query($conexao,$delete)){
        echo "1";
    }else{
        echo "2";
    }
        //or die("Erro: ".mysqli_error($conexao));

    

?>