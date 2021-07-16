<?php
// faz as alteracoes no banco
//  CASE 0 -> PALAVRA
//  CASE 1 -> FASE
//  CASE 2 -> SUBFASE
//  CASE 3 -> FRASE
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

    

    case 3:
    $fase=$_POST["atualizar"]["fase"];
    $subfase=$_POST["atualizar"]["subfase"];
    $pronome=$_POST["atualizar"]["pronome"];
    $verbo=$_POST["atualizar"]["verbo"];
    $palavra=$_POST["atualizar"]["palavra"];
    $frase=$_POST["atualizar"]["frase"];
    $video_sinal=$_POST["atualizar"]["video_frase"];
    $id=$_POST["atualizar"]["id"];

    $alterar = "UPDATE $tabela SET frase='$frase', video_frase='$video_sinal', cod_subfase='$subfase' WHERE $coluna='$id'";
        $resultado = mysqli_query($conexao,$alterar)
        or die(mysqli_error($conexao));



    $delete_frase_palavra = "DELETE FROM frase_palavra WHERE cod_frase=$id";
        $resultado_delete = mysqli_query($conexao,$delete_frase_palavra) or die(mysqli_error($conexao));

    

    $insert_pronome = "INSERT INTO frase_palavra(cod_frase,cod_palavra)
                VALUES ('$id','$pronome')";
        $resultado_delete = mysqli_query($conexao,$insert_pronome) or die(mysqli_error($conexao));

    $insert_verbo = "INSERT INTO frase_palavra(cod_frase,cod_palavra)
                VALUES ('$id','$verbo')";
        $resultado_delete = mysqli_query($conexao,$insert_verbo) or die(mysqli_error($conexao));

    $insert_palavra = "INSERT INTO frase_palavra(cod_frase,cod_palavra)
                VALUES ('$id','$palavra')";
        $resultado_delete = mysqli_query($conexao,$insert_palavra) or die(mysqli_error($conexao));

    echo "1";
break;

};
?>