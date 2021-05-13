<?php
session_start();

    if(!empty($_POST)) {
        
        include "conexao.php";
        
        $email = $_POST["email_login"];
        $senha = $_POST["senha_login"];

        $sql =" SELECT * FROM usuario WHERE email = ? AND senha = ?";
        
        if($stmt = mysqli_prepare($conexao, $sql)) { 

            mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($resultado) == "1") {
                
                session_start();

                $linha = mysqli_fetch_assoc($resultado);
                
                $_SESSION["autorizado"]=$linha["id_usuario"];
                if($linha["condicao_auditiva"]=="s"){
                    $_SESSION["condicao_auditiva"]="surdo";
                }
                else{
                    $_SESSION["condicao_auditiva"]="ouvinte";
                }
                header("location: index.php");
            }
            else {
                echo'<div id="erro" class="alert alert-danger col-6 text-center" role="alert">Credenciais InvÃ¡lidas</div>';
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conexao);
    }
    else {
        header("location: index.php");
    }
?>
