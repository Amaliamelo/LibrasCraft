<?php
    session_start();
    include "../conexao.php";
    
    $palavra = $_POST["palavra"];

    $sql = "SELECT id_palavra FROM palavra WHERE palavra LIKE '$palavra' ";
    $resultado = mysqli_query($conexao,$sql)
        or die(mysqli_error($conexao));

    if(mysqli_num_rows($resultado)>0){
        $linha=mysqli_fetch_assoc($resultado);
        echo $linha["id_palavra"];
    }
    else{
        echo "0";
    }
?>