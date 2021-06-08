<?php
    session_start();
    $id_usuario=$_SESSION["autorizado"];

    $consulta = "SELECT nome FROM usuario WHERE id_usuario=$id_usuario";
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
    $linha = mysqli_fetch_assoc($resultado);

?>
<header id="header">

        <nav class="navbar fixed-top navbar-expand-md navbar-dark " id="nav" style="background-color:black;">
            <div class="logo">
                <a href="../index.php"><img src="../img/icones/menu/librascraft.ico" ></a>
            </div>
            <!-- botão que aparece quando a tela for pequena -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class='collapse navbar-collapse menu' id='menucollapse'>
                        <ul class="navbar-nav mr-auto"  >
                            <li class="nav-item active  mr-5 ml-5">
                                <a href="../mapa.php" style="color:white;"> <i class="fas fa-undo-alt"></i></a>
                            </li>
                            <li class="nav-item active  mr-5 ml-5">
                                <a href="../ATIVIDADES/score.php" style="color:white;"><img height= "50vh" width="50vw" src="../img/icones/menu/score.png" alt="Score" ><alt</a>
                            </li>
                        </ul> 
                        <ul class="navbar-nav">
                            <li class="nav-item active  mr-5 ml-5">
                            <b><h7 style="color:white;">Bem-Vindo(a) <?php echo $linha["nome"]?></h7></b>
                            </li>
                            <li class="nav-item active mr-5 ml-5 ">
                                <a href="../logout.php" style="color:white;"> <i class="fas fa-sign-out-alt"></i> </a>
                            </li>
                        </ul> 
                   </div>
            
        </nav>
</header>
