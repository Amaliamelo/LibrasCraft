<?php
		
    include("conexao.php");
    $cod_subfase = $_POST["subnivel"];
    $palavra = $_POST["palavra"];
    $video_sinal = $_POST["video_sinal"];
    
    
    
    $insert =
    "INSERT INTO palavra(palavra,video_sinal,cod_subfase)
            VALUES
        ('$palavra','$video_sinal','$cod_subfase')";

    mysqli_query($conexao,$insert) or die("ERRO AO INSERIR");
    
    
        echo "1";
?>