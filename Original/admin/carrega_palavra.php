<?php
    header("Content-type: application/json");

    include("conexao.php");

    $p= $_POST["pg"];

    $sql = "SELECT * FROM palavra
            INNER JOIN fase ON palavra.cod_fase=fase.id_fase
            LEFT JOIN subfase ON palavra.cod_subfase=subfase.id_subfase ";

    if(isset($_POST["nome_filtro"]))
    {
        $nome = $_POST["nome_filtro"];
        $sql .= " WHERE cod_fase LIKE '%$nome%'";
    }

    $sql .= " ORDER BY cod_fase LIMIT $p,5";
    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }

    echo json_encode($matriz);



