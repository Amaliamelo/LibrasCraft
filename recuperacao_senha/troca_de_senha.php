<?php

$sql = mysqli_query($conexao,"UPDATE usuario SET senha = '".md5($_POST["senha_alterar"])."'  WHERE email='".$_POST["email"]."'");
$row = $sql->num_rows;
if($row='1'){
    header('location: ../index.php?senha=1');
}


?>


