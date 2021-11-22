<?php

include "../ABC/cabecalho_abc.php";
include '../conexao.php';

$query="UPDATE usuario SET senha = '".md5($_POST["senha_alterar"])."' WHERE email='".$_POST["email"]."'";
$sql = mysqli_query($conexao,$query);
if($sql=="1"){
    header("location: ../index.php?senha=1");       

}


?>


