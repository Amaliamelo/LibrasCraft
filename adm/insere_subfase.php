<?php
		
    include("conexao.php");
    $cod_fase = $_POST["fase"];
    $subfase = $_POST["subfase"];
        
    $insert =
    "INSERT INTO subfase(cod_fase, nome)
            VALUES
        ('$cod_fase','$subfase')";

    mysqli_query($conexao,$insert) or die("ERRO AO INSERIR");
    
    
    echo "1";
?>