<?php

    include("conexao.php");

    $id = $_POST["id"];
    $nivel = $_POST["nivel"];
    $subnivel = $_POST["subnive"];
    $palavra = $_POST["palavra"];
    $video_s = $_POST["video_s"];
    $video_d = $_POST["video_d"];
    

    $update = "UPDATE palavra SET nivel = '$nivel', 
                                  subnnivel = '$subnivel',
                                  palavra = '$palavra',
                                  video_s = '$video_s',
                                  video_d = '$video_d'
                WHERE id_palavra='$id'";

    mysqli_query($conexao,$update) or die(mysqli_error($conexao));
			
			
		echo "1";
?>