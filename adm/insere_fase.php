<?php
    include("conexao.php");
    $fase = $_POST["fase"];
        
    $insert =
    "INSERT INTO fase(nome)
            VALUES
        ('$fase')";

    mysqli_query($conexao,$insert) or die("ERRO AO INSERIR");
    
    
    echo "1";
?>