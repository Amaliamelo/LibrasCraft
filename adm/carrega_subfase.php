<?php
    header("Content-type: application/json");
    include "conexao.php";


    $sql = "SELECT fase.nome AS nome_fase, subfase.nome, subfase.id_subfase, subfase.cod_fase FROM subfase 
            INNER JOIN fase ON subfase.cod_fase=fase.id_fase";

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
    
    
    echo json_encode($matriz);




?>