<?php
    session_start();
    include "../conexao.php";

    $id_usuario=$_SESSION["autorizado"];
    $nome=$_POST["nome"];
    $email=$_POST["email"];
    $senha = $_POST["senha"];


    $update = "UPDATE usuario SET nome='$nome',
                                email='$email'";
    if($senha!=""){
        $update.=",             senha='$senha'";
    }

    $update .= " WHERE id_usuario='$id_usuario'";
    mysqli_query($conexao,$update)
    or die(mysqli_error($conexao));
    
    echo "1";   

?>