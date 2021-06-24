<?php
    header("Content-type: application/json");

    include("conexao.php");

    //$p= $_POST["pg"];

    $sql = "SELECT * FROM fase";

    if(!empty($_POST)){
        $sql .= " WHERE (1=1) ";
        if($_POST["cod_fase"]!=""){
            $fase = $_POST["cod_fase"];

            $sql .= " AND id_fase = '$fase' ";
        }
    }
    $sql .= " ORDER BY nome";

    //$sql .= " ORDER BY cod_fase LIMIT $p,5";
    $resultado = mysqli_query($conexao,$sql) or die(mysqli_error($conexao));
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }

    echo json_encode($matriz);



?>