<?php
session_start();

    if(!empty($_POST)) {
        
        include "conexao.php";
        
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql =" SELECT * FROM usuario WHERE email = ? AND senha = ?";
        
        if($stmt = mysqli_prepare($conexao, $sql)) { 

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($resultado) == "1") {

                $linha = mysqli_fetch_assoc($resultado);
                
                $_SESSION["autorizado"]=$linha["id_usuario"];
                if($linha["condicao_auditiva"]=="s"){
                    $_SESSION["condicao_auditiva"]="surdo";
                }
                else{
                    $_SESSION["condicao_auditiva"]="ouvinte";
                }
                echo "0";
            }
            else {
                echo "1";
            }
            mysqli_stmt_close($stmt);

        }else{
            echo "2";
        }
        mysqli_close($conexao);
    }
    else {
        header("location: index.php");
    }
?>
