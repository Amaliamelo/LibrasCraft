<?php
    include "cabecalho.php";
    include "conexao.php";
?>
    <?php include "menu.php";
    
    
    
    ?>


    <main class="bodyMapa">
    <div class="container">
            <div class="row abc"><!-- IMAGEM/BOTAO ABC -->
                <img id="btn-mensagem-abc" src="img/icones/mapa/abc.png" data-toggle="modal" data-target="#modal-abc">
            </div>
            <div class=" row casa"><!-- IMAGEM/BOTAO CASA -->
                <img id="btn-casa" src="img/icones/mapa/casa.png" onclick ="location.href='INTRODUCAO/submapa.php?fase=1'">
           </div>
    </div>
    <?php
        //RODAPE
        include "rodape.php";
        include "modais/modal_abc.php";
    ?>