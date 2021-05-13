<?php
    include "cabecalho.php";
?>

    <main class="bodyIndex">
        <div class="cont">
            <button type="button"  data-toggle="modal"data-target="#modal_login" name="login" class="btn btn-dark m-3">Entrar</button>
            <button class="btn btn-dark m-3" type="button" data-toggle="modal" data-target="#modal_cadastro" > Cadastrar</button>
        </div>  
    
       <?php
            //MODAL LOGIN
            include "modais/modal_login.php";
            //MODAL CADASTRO
            include "modais/modal_cadastro.php";
            //RODAPE
            include "rodape.php";
       ?>