<?php
    header("Content-type: application/json");
    //session_start();
    include "conexao.php";

    $cod_fase= $_POST["cod_fase"];

    //$cod_fase=1;

    $sql = "SELECT * FROM subfase WHERE cod_fase ='$cod_fase'";

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }
    
    
    echo json_encode($matriz);




?>