<?php
    header("Content-type: application/json");
    
    session_start();
     include "../conexao.php";

    $id_usuario=$_SESSION["autorizado"];

    $consulta = "SELECT nome, email, senha FROM usuario WHERE id_usuario=$id_usuario";
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
    while($linha=mysqli_fetch_assoc($resultado))
    {
        $matriz[]=$linha;
    }

    echo json_encode($matriz);

?>