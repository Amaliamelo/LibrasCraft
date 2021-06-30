<?php
		
    include("conexao.php");
    $cod_frase = $_POST["cod_frase"];
    $cod_palavra = $_POST["cod_palavra"];
    
    
    
    $insert =
    "INSERT INTO frase_palavra(cod_frase,cod_palavra)
            VALUES
        ('$cod_frase','$cod_palavra')";

    mysqli_query($conexao,$insert) or die($insert);
    
    echo "1";
?>