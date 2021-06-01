<?php
    include "cabecalho.php";
    session_start();
?>

    <main class="bodyIndex">
        <?php
            if(isset($_SESSION["autorizado_adm"]))
            {
                header('Location: administrador.php');
            }
            else{
                echo '<div class="cont">
                    <button type="button"  data-toggle="modal"data-target="#modal_login_adm" name="login" class="btn btn-dark m-3" id="log">Login</button>
                    <button type="button"  data-toggle="modal"data-target="#modal_login" name="login" class="btn btn-dark m-3" id="log">Itens cadastrados</button>
                </div> ';
            }
        ?>
         
    
       <?php
            //MODAL LOGIN
            include "modais/modal_login_adm.php";
            //RODAPE
            include "../rodape.php";
       ?>