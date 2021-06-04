<?php
    //session_start();
    $id_adm=$_SESSION["autorizado_adm"];

    $consulta = "SELECT nome FROM adiministrador WHERE id_adm=$id_adm";
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");
    $linha = mysqli_fetch_assoc($resultado);

?>
<header id="header">

        <nav class="navbar fixed-top navbar-expand-md navbar-dark " id="nav" style="background-color:black;">
        
            <!-- botão que aparece quando a tela for pequena -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
                <li class="nav-item active" >
                    <div class="row">
                    <div class="col-md-2 offset-md-1">
                        <a href="index.php"><img src="../img/icones/menu/librascraft.ico" ></a>
                    </div>
                    </div>
                </li>
                <div class='collapse navbar-collapse' id='menucollapse'>
                        
                        <ul class="navbar-nav mr-auto" >
                            <li class="nav-item active mr-5 ml-5 ">
                                <a href="../logout.php" style="color:white;"> <i class="fas fa-sign-out-alt"></i> </a>
                            </li>
                            
                        </ul> 
                        <ul class="navbar-nav">
                            <li class="nav-item active  mr-5 ml-5">
                            <b><h7 style="color:white;">Bem-Vindo(a) <?php echo $linha["nome"]?></h7></b>
                            </li>
                            <li class="nav-item active  mr-5 ml-5">
                            <a href="mapa.php" style="color:white;"> <i class="fas fa-undo-alt"></i></a>
                            </li>
                        </ul>
                        
                     <div id='menu2'>
                        <ul class="navbar-nav mr-auto nvbar1">
                            <li class="nav-item active">
                                <a href="./logout.php" style="color:white;"> Sair </a>
                            </li>
                        </ul>
                    </div>
                           <!-- <li class="nav-item active  mr-5 ml-5">
                                <a href="score.php" style="color:white;">Score</a>
                            </li>
                        </ul> 
                        <ul class="navbar-nav navbar2">
                            <li class="nav-item active  mr-5 ml-5">
                            <a href="./mapa.php" style="color:white;">Voltar</a>
                            </li>
                            <li class="nav-item active">
                            <b><h7 style="color:white;">Bem-Vindo(a) <?php //echo $linha["nome"]?></h7><b>
                            </li>
                            
                        </ul>
                    </div>-->

            </div>
            
        </nav>
</header>

