<?php


include '../conexao.php';

$email          = $_POST["emailReset"]; 
$password       = $_POST["password"]; 

$resultado = mysqli_query($conexao,"SELECT * FROM usuario WHERE email='$email'") or die("Erro na consulta");
$get = mysqli_fetch_assoc($resultado);
$db_email = $get['email'];

    if ($email != $db_email) {
        echo "<span id=\"msgOne\">Dados incorretos.</span>";
        return true;
    } else {
        $sql = mysqli_query($conexao,"UPDATE usuario SET senha = '".md5($password)."'  WHERE email =  '$email'");

        $sendEmail = mysqli_query($conexao,"SELECT * FROM usuario WHERE email='$email'");
        $get =  mysqli_fetch_assoc($sendEmail);
        $row = $sendEmail->num_rows;
        $assunto     = "Sua senha foi alterada!";
        $emailz  = $_POST["emailReset"];
        $mensagem    = 'Ola! alteramos sua senha temporariamente!
                     Mude ela através do painel de usuário.<br>Sua nova senha é: '.$password.'
                     http://librascraft2.herokuapp.com';


        $enviar         = "$mensagem";
        require ("PHPMailerAutoload.php");
        define('GUSER', 'librascraft'); 
        define('GPWD', 'librascraft2020');        

        function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
            global $error;
            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';
            $mail->IsSMTP();        
            $mail->SMTPDebug =0;        
            $mail->SMTPAuth = true;     
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'tls://smtp.gmail.com:587';    
            $mail->Port = 587;        
            $mail->Username = 'librascraft@gmail.com';
            $mail->Password = 'librascraft2020';
            $mail->SetFrom($de, $de_nome);
            $mail->Subject = $assunto;
            $mail->Body = $corpo;
            $mail->IsHTML(true);
            $mail->AddAddress($para);
            if(!$mail->Send()) {
                $error = 'Mail error: '.$mail->ErrorInfo; 
                return false;
            } else {
                $error = 'Mensagem enviada!';
                return true;
            }
        }


        if (smtpmailer($emailz, 'librascraft@.smtp.gmail.com', 'LibrasCraft', $assunto, $enviar)) {
            header('location: ../index.php?senha=alterado');
            return true;

        } else {
            if (!empty($error)){
                echo $error;
            }
        }
}
?>