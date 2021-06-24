<?php
// faz as alteracoes no banco
// CASE 0 -> PALAVRA
//CASE 1 -> FASE
//CASE 2 -> SUBFASE
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


    case 1:
        $fase=$_POST["atualizar"]["fase"];
        $id=$_POST["atualizar"]["id"];

        $alterar = "UPDATE $tabela SET nome='$fase' WHERE $coluna='$id'";

        
        $resultado = mysqli_query($conexao,$alterar)
        or die(mysqli_error($conexao));

        echo "1";
    break;


    case 2:
        $fase=$_POST["atualizar"]["fase"];
        $subfase=$_POST["atualizar"]["subfase"];
        $id=$_POST["atualizar"]["id"];

        $alterar = "UPDATE $tabela SET cod_fase='$fase', nome='$subfase' WHERE $coluna='$id'";

        
        $resultado = mysqli_query($conexao,$alterar)
        or die(mysqli_error($conexao));

        echo "1";
    break;


};
?>