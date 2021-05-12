<?php

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
 
if( $detect->isMobile()){
    $initial_scale="0.63";
}
else{
    $initial_scale="1";    
} 

session_cache_expire(1000);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=<?php echo $initial_scale;?>">
        <title>Librascraft</title>
        <link href="css/bootstrap.min.css" rel="stylesssheet"/>
        
        <script src='js/jquery-3.4.1min.js'></script>
        <script src="js/bootstrap.min.js"></script>
        
        <style>
    html 
    {
        background: url("img/fundo/index.png") no-repeat ;
        width:100%; 
        overflow: hidden;
    }
    a:link
    {
        text-decoration: none;
    }
    .placa_esquerda
    {
        width:90%; 
        margin-top:-440px;
        margin-left:767px;
    }
    @media(width:640px)
    {
        html 
    {
        background: url("img/medias/index.png") no-repeat ;
        width:100%; 
        overflow: hidden;
    }
        .placa_cabo
        {
            width:100%; 
            margin-top:250px;
            margin-left:200px;
        }
      
    .placa_esquerda
    {
        width:100%; 
        margin-top:-160px;
        margin-left:943px;
    }

    .placa_direita
    {
        width:100%; 
        margin-left:-943px;
            
    }
    .mapa
    {
        margin-top:-216px;
        font-size:30px;
        margin-left:450px;
    }
    .logout
    {
        margin-top:30px;
        font-size:30px;
        margin-left:644px;
    }
    }
    @media (width:)
    {

    }
    .placa_direita
    {
        width:90%; 
        margin-top:-200px;
        margin-left:900px;
    }
    .mapa
    {
        margin-top:-216px;
        font-size:30px;
        margin-left:450px;
    }
    .logout
    {
        margin-top:30px;
        font-size:30px;
        margin-left:644px;
    }
    .login
    {
        margin-top:-216px;
        font-size:30px;
        margin-left:430px;
    }
    .cadastro
    {
        margin-top:30px;
        font-size:27px;
        margin-left:630px;
    }
        </style>
    </head>
    <body>
        
    <div class ="container">   <!-- BARRA -->
        <div class="row">
            <div class="placa_cabo">
                <img src="img/icones/placa/barra.png" style="width:43%; margin-top:240px; margin-left:750px;"></a>
            </div>
        </div>
    </div>
    <div class ="container">   <!-- PLACA ESQUERDA -->
        <div class="row">
            <div class="placa_esquerda">
                <img src="img/icones/placa/placa_esquerda.png" placeholder="login" style="width:30%;">
            </div>
        </div>        
    </div>
    <div class ="container">  <!-- PLACA DIREITA -->
        <div class="row">
            <div class="placa_direita">
                <img src="img/icones/placa/placa_direita.png" style="width:32%;"></a>
            </div>
        </div>        
    </div>

    <div class="login">
    <?php
        if(isset($_SESSION["autorizado"]))
        {
            echo '<div class="mapa"><a href = "mapa.php" style= "font-family:arial, Helvetica, sans-serif; color:black;">MAPA</a></div>';
            echo '<div class="logout"><a href = "logout.php" style= "font-family:arial, Helvetica, sans-serif; color:black;">LOGOUT</a></div>';
        }
        else{
            echo '<div class="login"><a href = "login.php"style= "font-family:arial, Helvetica, sans-serif; color:black;">LOGIN</a></div>';
            echo ' <div class="cadastro"><a href="form_cadastro_usuario.php" style= "font-family:arial, Helvetica, sans-serif; color:black; ">CADASTRO</a>
            </div>';
        }
    ?>
    </div>
    </body>
</html>