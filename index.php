<?php
    include "cabecalho.php";
    session_start();
?>

    <main class="bodyIndex">
        <?php
            if(isset($_SESSION["autorizado"]))
            {
                echo '<div class="cont">
                    <a class="btn btn-dark  m-3" href="mapa.php" role="button">Mapa</a>
                    <a class="btn btn-dark  m-3" href="logout.php" role="button">Sair</a>
                </div>'; 
            }
            else{
                echo '<div class="cont">
                    <button type="button"  data-toggle="modal"data-target="#modal_login" name="login" class="btn btn-dark m-3" id="log">Entrar</button>
                    <button class="btn btn-dark m-3" type="button" data-toggle="modal" data-target="#modal_cadastro" > Cadastrar</button>
                </div> ';
            }
        ?>
         
    
       <?php
            //MODAL LOGIN
            include "modais/modal_login.php";
            //MODAL CADASTRO
            include "modais/modal_cadastro.php";
            //RODAPE
            include "rodape.php";
       ?>