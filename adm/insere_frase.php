<?php
		
    include("conexao.php");
    $subfase = $_POST["subfase"];
    $frase = $_POST["frase"];
    $video_frase = $_POST["video_frase"];
    
    
    
    $insert =
    "INSERT INTO frase(frase,video_frase,cod_subfase)
            VALUES
        ('$frase','$video_frase','$subfase')";

    mysqli_query($conexao,$insert) or die($insert);
    
    echo "1";
?>