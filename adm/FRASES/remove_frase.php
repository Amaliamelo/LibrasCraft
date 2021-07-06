<?php
    include "conexao.php";

    $tabela = $_POST["tabela"];
    $coluna = $_POST["coluna"];
    $id = $_POST["id"];

    $select = "SELECT * FROM frase_palavra WHERE cod_frase='$id'";
    $resultado = mysqli_query($conexao,$select) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $delete_frase_palavra = "DELETE FROM frase_palavra WHERE cod_frase=$id";
    }
    $delete = "DELETE FROM frase WHERE id_frase=$id";
        //or die("Erro: ".mysqli_error($conexao));

    if(mysqli_query($conexao,$delete) && mysqli_query($conexao,$delete)){
        echo "1";
    }else{
        echo "2";
    }
    
 
?>