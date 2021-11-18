<?php
    header("Content-type: application/json");
    include "conexao.php";

    $sql = "SELECT id_frase, frase, video_frase, cod_subfase, id_subfase, subfase.nome as nome_subfase, cod_fase, id_fase, fase.nome as nome_fase 
            FROM frase INNER JOIN subfase ON frase.cod_subfase=subfase.id_subfase 
            INNER JOIN fase ON subfase.cod_fase=fase.id_fase";

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