<?php
    session_cache_expire(10000000);
    session_start();
    $id_usuario=$_SESSION["autorizado"];
    if (!isset($_SESSION[ "autorizado" ]))
    {
        header("location: index.php");
    }

    $consulta = "SELECT nome FROM usuario WHERE id_usuario=$id_usuario";
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
    $linha = mysqli_fetch_assoc($resultado);

?>
<header id="header">

        <nav class="navbar fixed-top navbar-expand-md navbar-dark " id="nav" style="background-color:black;">
            <div class="logo">
                <a href="index.php"><img src="img/icones/menu/librascraft.ico" ></a>
            </div>
            <!-- botão que aparece quando a tela for pequena -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class='collapse navbar-collapse menu' id='menucollapse'>
                        <ul class="navbar-nav mr-auto"  >
                            <li class="trofeu nav-item active  mr-5 ml-5">
                                <a href="RANKING/ranking.php" style="color:white;"><i class="fas fa-code fa-3x fa-trophy"></i></a>
                            </li>
                            <li class="nav-item active  mr-5 ml-5">
                                <a href="SCORE/score.php" style="color:white;"><img height= "50vh" width="50vw" src="img/icones/menu/score.png" alt="Score" ><alt</a>
                            </li>
                        </ul> 
                        <ul class="navbar-nav">
                            <li class="nav-item active  mr-5 ml-5">
                            <b><a href="perfil/perfil.php" style="color:white;"><h7 >Bem-Vindo(a) <?php echo $linha["nome"]?></h7></a></b>
                            </li>
                            <li class="nav-item active mr-5 ml-2">
                                <a href="logout.php" style="color:white;"> <i class="fas fa-sign-out-alt"></i> </a>
                            </li>
                        </ul> 
                   </div>
            
        </nav>
</header>

