
<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
 
if( $detect->isMobile()){
    $initial_scale="0.65";
}
else{
    $initial_scale="1";    
} 
session_cache_expire(10000000);
session_start();

$id_usuario=$_SESSION["autorizado"];

if(!$id_usuario)
    header("location: login.php?sessao=1");

$consulta = "SELECT nome FROM usuario WHERE id_usuario=$id_usuario";
$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
$linha = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=<?php echo $initial_scale;?>">
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
       
        </style>
    </head>
    <body>

    <div class="menu"></div>

    <div class="container">
        <div class="row">
            <div class="ajuda" style=" margin-top:-40px; margin-left:850px;"><!-- ICONE AJUDA -->
            <b><h7 style="color:white;">Bem-Vindo(a) <?php echo $linha["nome"]?></h7><b>
            </div>
        </div>

         <div class="row">
            <div class="voltar"><!-- ICONE SAIR -->
            
            <a href="logout.php"><img src="img/icones/menu/logout.png" style="width:2%; margin-top:-90px; margin-left:1150px;"></a>
            
            </div>
        </div>
        <div class="row">
            <div class="logo"><!-- ICONE LIBRASCRAFT -->
            <a href="index.php"><img src="img/icones/menu/librascraft.png" style="width:27%; margin-top:-133px; margin-left:410px;"></a>
            </div>
        </div>
        <div class="row">
            <div class="voltar"><!-- ICONE VOLTAR -->
            <a href="mapa.php"><img src="img/icones/menu/voltar.png" style="width:3%; margin-top:-180px; margin-left:-50px;"></a>
           
            </div>
        </div>
        <div class="row">
            <div class="voltar"><!-- ICONE SCORE -->
            <a href="score.php"><img src="img/icones/menu/score.png" style="width:9%; margin-top:-235px; margin-left:125px;"></a>
            </div>
        </div>
    </div>

