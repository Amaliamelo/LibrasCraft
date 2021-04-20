<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Librascraft</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="estilo.css">      
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/md5.js"></script>
        <style>
        .menu 
        {
            background-color:black;
            height:60px;
            width:100%;
        }
       
body
{
	background-image:url("img/fundo/login_cadastro.png");
}

       
        </style>
    </head>
    <body>

    <div class="menu"></div>

    <div class="container">
        <div class="row">
            <div class="ajuda"><!-- ICONE AJUDA -->
            <a href="ajuda.php"style="width:5%; margin-top:-85px; margin-left:1130px;"></a>
            </div>
        </div>

         <div class="row">
            <div class="voltar"><!-- ICONE SAIR -->
            <a href="logout.php" style="width:3%; margin-top:-135px; margin-left:1100px;"></a>
            </div>
        </div>
        <div class="row">
            <div class="logo"><!-- ICONE LIBRASCRAFT -->
            <a href="index.php"><img src="img/icones/menu/librascraft.png" style="width:27%; margin-top:-183px; margin-left:410px;"></a>
            </div>
        </div>
        <div class="row">
            <div class="voltar"><!-- ICONE VOLTAR -->
            <a href="index.php"><img src="img/icones/menu/voltar.png" style="width:3%; margin-top:-230px; margin-left:-50px;"></a>
            </div>
        </div>
        
    </div>

