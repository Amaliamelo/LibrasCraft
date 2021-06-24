<?php

    // pagina para carregar a fase no modal do alterar palavra
    // linha 191 do main.js
    header("Content-type: application/json");

    include "../conexao.php";

    $id_subfase=$_POST["cod_subfase"];
    $sql = "SELECT * FROM subfase INNER JOIN fase ON subfase.cod_fase = fase.id_fase AND id_subfase = '$id_subfase'";
   
    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }

    //die($sql);
    echo json_encode($matriz);



?>