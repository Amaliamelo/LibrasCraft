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
                echo '<div class="col-ofsset-12 center">
                <div class="linha m-3"> </div>
                <div class="linha2"> </div>
                    <div class="row btn1 m-3 btn-lg btn-google" style="color:white;"><h5>ADMINISTRADOR</h5></div>
                    <div class="row btn2  m-3 "><button class="btn btn-lg btn-google btn-block btn-outline-light m-2" type="button"  data-toggle="modal" data-target="#modal_login_adm" name="login"  id="log">Login</button></div>
                   
                </div> ';
            }
        ?>
         
    
       <?php
            //MODAL LOGIN
            include "modais/modal_login_adm.php";
            //RODAPE
            include "../rodape.php";
       ?>