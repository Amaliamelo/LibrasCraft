<?php

include "conexao.php";

    $coluna=$_POST["coluna"];
    $tabela=$_POST["tabela"];
switch($_POST["atualizar"]["aux"]){

    case 0:
        $fase=$_POST["atualizar"]["fase"];
		$subfase=$_POST["atualizar"]["subfase"];
		$palavra=$_POST["atualizar"]["palavra"];
		$video_sinal=$_POST["atualizar"]["video_sinal"];
		$id=$_POST["atualizar"]["id"];

        $alterar = "UPDATE $tabela SET palavra='$palavra', video_sinal='$video_sinal', cod_subfase='$subfase' WHERE $coluna='$id'";

        
        $resultado = mysqli_query($conexao,$alterar)
        or die(mysqli_error($conexao));
    
        echo "1";
    break;
   
};
?>