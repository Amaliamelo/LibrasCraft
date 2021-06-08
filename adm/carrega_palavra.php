<?php
    header("Content-type: application/json");

    include("conexao.php");

    //$p= $_POST["pg"];

    $sql = "SELECT * FROM palavra
            INNER JOIN fase ON palavra.cod_fase=fase.id_fase
            LEFT JOIN subfase ON palavra.cod_subfase=subfase.id_subfase ";

    if(!empty($_POST)){
        $sql .= " WHERE (1=1) ";

        if($_POST["nome_filtro"]!=""){
            $nome = $_POST["nome_filtro"];

            $sql .= "AND palavra like '%$nome%'";
        }   
        if($_POST["fase"]!=""){
            $fase = $_POST["fase"];

            $sql .= "WHERE cod_fase = '$fase' ORDER BY palavra";
        }   
        if($_POST["subfasefase"]!=""){
            $fase = $_POST["subfase"];

            $sql .= "WHERE cod_subfase = '$subfase' ORDER BY palavra";
        }   
    }
    /*if(isset($_POST["nome_filtro"]))
    {
        print_r($_POST["nome_filtro"]);
        $nome = $_POST["nome_filtro"];
        $sql .= " WHERE palavra LIKE '%$nome%'";
    }*/

    //$sql .= " ORDER BY cod_fase LIMIT $p,5";
    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }

    echo json_encode($matriz);



?>