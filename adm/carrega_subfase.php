<?php
    header("Content-type: application/json");
    //session_start();
    include "conexao.php";

    //$cod_fase= $_POST["cod_fase"];

    //$cod_fase=1;

    $sql = "SELECT * FROM subfase ";

    if(!empty($_POST)){
        $sql .= " WHERE (1=1) ";   
        if($_POST["cod_fase"]!=""){
            $fase = $_POST["cod_fase"];

            $sql .= " AND cod_fase = '$fase' ";
        }     
    }

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }
    
    //print_r($cod_fase);
    
    echo json_encode($matriz);




?>