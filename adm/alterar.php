<?php

header('Content-Type: application/json');
include "conexao.php";

    $id=$_POST["id"];
    $coluna=$_POST["coluna"];
    $tabela=$_POST["tabela"];
    $valores[]=$_POST["valores"];
switch($_POST["aux"]){

    case 0:
        $alterar = "UPDATE $tabela SET palavra=$valores[0], video_sinal=$valores[1] WHERE $coluna=$id";
    
        
        $resultado = mysqli_query($conexao,$alterar)
        or die(mysqli_error($conexao));
    
        while($linha = mysqli_fetch_assoc($resultado)){
         $matriz[]=$linha;
        }
    
        echo json_encode(1);
    break;
   
};
?>