<?php
    session_start();
    include "../conexao.php";
    $cod_usuario = $_SESSION["autorizado"];
    $cod_subfase = $_POST["subfase"];
    $cod_frase=$_POST["cod_frase"];

   


    if($_SESSION["condicao_auditiva"]=="surdo"){
        $resposta_frase_correta= strtoupper($_POST["correto"]);
        $resposta_frase_usuario= strtoupper($_POST["resposta"]);
    }else{
        $resposta_frase_correta="";
        foreach($_POST["correto"] as $c){
            $resposta_frase_correta.= "-".$c;
        }
       

        $resposta_frase_usuario="";
        foreach($_POST["resposta"] as $u){
            $resposta_frase_usuario.= "-".$u;
        }
    }

    

    $select = "SELECT * FROM resposta_frase WHERE cod_usuario='$cod_usuario' 
                AND cod_frase='$cod_frase'";
    $resultado = mysqli_query($conexao,$select) or die(mysqli_error($conexao));

    if(mysqli_num_rows($resultado)==0){
        $insert = "INSERT INTO resposta_frase VALUES (
            NULL,
            '$resposta_frase_correta',
            '$resposta_frase_usuario',
            '$cod_usuario',
            '$cod_subfase',
            '$cod_frase'
            )";
        mysqli_query($conexao,$insert)
        or die(mysqli_error($conexao).$insert);

        echo "1";
    }
    else{
        echo "0";
    }

?>