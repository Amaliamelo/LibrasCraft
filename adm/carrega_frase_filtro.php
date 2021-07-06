<?php
    header("Content-type: application/json");
    include "conexao.php";

    $sql = "SELECT id_frase, frase, video_frase, cod_subfase, id_subfase, subfase.nome as nome_subfase, cod_fase, id_fase, fase.nome as nome_fase 
            FROM frase INNER JOIN subfase ON frase.cod_subfase=subfase.id_subfase 
            INNER JOIN fase ON subfase.cod_fase=fase.id_fase";

    if(!empty($_POST)){
        $sql .= " WHERE (1=1) ";   
       
        //filtro
        if($_POST["nome_filtro"]!=""){
            $nome = $_POST["nome_filtro"];

            $sql .= " AND frase like '%$nome%'";
            
        }   
        if($_POST["fase"]!="0"){
            $fase = $_POST["fase"];

            $sql .= " AND cod_fase = '$fase' ";
        }   
        if($_POST["subfase"]!="0"){
            $subfase = $_POST["subfase"];

            $sql .= " AND cod_subfase = '$subfase'";
        } 
        if(!isset($_POST["fase"])){
            $sql .= " WHERE (1=1) ";
        } 
        $nome="0";
        $fase="0";
        $subfase="0"; 
    }
    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));

    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }
    if(!isset($matriz)){
        $matriz=null;
    }

    //die($matriz);

    echo json_encode($matriz);




?>