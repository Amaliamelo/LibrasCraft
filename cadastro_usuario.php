<?php
		
           include "conexao.php";
            
			$nome = $_POST["nome"];
			$email = $_POST["email_cad"];
			$senha = $_POST["senha_cad"];
            $sexo = $_POST["sexo"];
            $data = $_POST["data_nascimento"];
            $condicao = $_POST["condicao_auditiva"];

            if(($nome!='' && $email!='')&&(($senha!='' && $sexo!='')&&($data!='' && $condicao!=''))){
                $sql = "SELECT email FROM usuario WHERE email=? ";
        
                if($stmt = mysqli_prepare($conexao, $sql)) { 

                    mysqli_stmt_bind_param($stmt, "s", $email);

                    mysqli_stmt_execute($stmt);

                    $resultado_select = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($resultado_select) == "1") {

                        echo "2";
                    }
                    else {
                        $insert =
                        "INSERT INTO usuario(nome, email, senha, sexo, data_nascimento, condicao_auditiva)
                            VALUES
                        ('$nome','$email','$senha','$sexo','$data','$condicao')";

                        mysqli_query($conexao,$insert) or die(mysqli_error($conexao));

                        echo "1";
                    }
                    mysqli_stmt_close($stmt);
                }
            }else{
                echo "0";
            }
			
?>