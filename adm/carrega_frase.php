<?php
    header("Content-type: application/json");
    include "conexao.php";


    $sql = "SELECT * FROM frase";

    if(!empty($_POST)){
        $sql .= " WHERE (1=1) ";   
        if($_POST["frase"]!=""){
            $frase = $_POST["frase"];

            $sql .= " AND frase = '$frase' ";
        }   
    }

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }
    
    
    echo json_encode($matriz);




?>