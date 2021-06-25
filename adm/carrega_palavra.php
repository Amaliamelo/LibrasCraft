<?php
    header("Content-type: application/json");

    include("conexao.php");

    $sql = "SELECT fase.nome as nome_fase, subfase.nome as nome_subfase, palavra, video_sinal, id_palavra FROM palavra
            INNER JOIN subfase ON palavra.cod_subfase=subfase.id_subfase INNER JOIN fase ON subfase.cod_fase=fase.id_fase";

    if(!empty($_POST)){

        if($_POST["nome_filtro"]!=""){
            $nome = $_POST["nome_filtro"];

            $sql .= " AND palavra like '%$nome%'";
        }   
        if($_POST["fase"]!="0"){
            $fase = $_POST["fase"];

            $sql .= " AND cod_fase = '$fase' ";
        }   
        if($_POST["subfase"]!="0"){
            $subfase = $_POST["subfase"];

            $sql .= " AND cod_subfase = '$subfase'";
        } 
        if($_POST["fase"]=="0"){
            $sql .= " WHERE (1=1) ";
        }  
    }
    $sql .= " ORDER BY palavra";

    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }

    if(!isset($matriz)){
        $matriz = null;
    }
    echo json_encode($matriz);



?>