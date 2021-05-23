<?php
    include "cabecalho.php";
    include "conexao.php";
    session_cache_expire(10000000);
    session_start();

    $id_usuario=$_SESSION["autorizado"];

    if(!$id_usuario){
        header("location: index.php");
    }
?>
    <?php include "menu.php";?>


    <main class="bodyMapa">
    <div class="container">
        <div class="row">
            <div class="abc"><!-- IMAGEM/BOTAO ABC -->
                <img id="btn-mensagem-abc" src="img/icones/mapa/abc.png" data-toggle="modal" data-target="#modal-abc">
            </div>

        <div class="row">
            <div class="casa"><!-- IMAGEM/BOTAO CASA -->
                <img id="btn-casa" src="img/icones/mapa/casa.png" onclick ="location.href='submapa_casa.php'">
           </div>
        </div>
    </div>
    <?php
        //RODAPE
        include "rodape.php";
        include "modais/modal_abc.php";
    ?>