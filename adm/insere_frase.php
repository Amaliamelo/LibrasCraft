<?php
		
    include("conexao.php");
    $palavra = $_POST["palavra"];
    $frase = $_POST["frase"];
    $video_frase = $_POST["video_frase"];
    
    
    
    $insert =
    "INSERT INTO frase(frase,video_frase,cod_palavra)
            VALUES
        ('$palavra','$video_frase','$cod_palavra')";

    mysqli_query($conexao,$insert) or die("ERRO AO INSERIR");
    
    
        echo "1";
?>