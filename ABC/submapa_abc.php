<?php
     include '../conexao.php';
     include 'cabecalho_abc.php';
     include 'menu_abc.php';

?>
<main class="bodyABC" style="height: 100%;padding-bottom:4.6%;">
    <div class="row container justify-content-center align-items-center"> 
        <div class="row justify-content-center alfabeto_numeral">
            <div class="col m-5 ">
                <div class="row"> 
                    <img src="../img/icones/submapa_abc/botao_abc.png" class="btn border-bottom-0 border-dark" style="width:200px; heigt:200px; background-color:#FFFFF0;" id="btn-mensagem-alfabeto" data-toggle="modal" data-target="#modal-alfabeto">
                </div>
                <div class="row"> 
                    <button class="btn border-dark" style="width:200px; background-color:#FFFFF0;" id="btn-mensagem-alfabeto2" data-toggle="modal" data-target="#modal-alfabeto">ALFABETO</button>
                </div>
            </div>
            <div class="col m-5">
                <div class="row"> 
                    <img src="../img/icones/submapa_abc/botao_123.png" class="btn border-bottom-0 border-dark" style="width:200px; heigt:200px; background-color:#FFFFF0;" id="btn-mensagem-numeral" data-toggle="modal" data-target="#modal-numeral">
                </div>
                <div class="row">
                    <button class="btn border-dark" style="width:200px;height:40px; background-color:#FFFFF0;" id="btn-mensagem-numeral2" data-toggle="modal" data-target="#modal-numeral">NUMERAL</button>
                </div>
            </div>
            <div class="col m-5 ">
                <div class="row"> 
                    <img src="../img/icones/submapa_abc/botao_pronome.png" class="btn border-bottom-0 border-dark" style="width:200px; heigt:200px; background-color:#FFFFF0;" id="btn-mensagem-pronome" data-toggle="modal" data-target="#modal-pronome">
                </div>
                <div class="row"> 
                    <button class="btn border-dark" style="width:200px; background-color:#FFFFF0;" id="btn-mensagem-pronome2" data-toggle="modal" data-target="#modal-pronome">PRONOME</button>
                </div>
            </div>
            <div class="col m-5">
                <div class="row"> 
                    <img src="../img/icones/submapa_abc/botao_verbo.png" class="btn border-bottom-0 border-dark" style="width:200px; heigt:200px; background-color:#FFFFF0;" id="btn-mensagem-verbo" data-toggle="modal" data-target="#modal-verbo">
                </div>
                <div class="row">
                    <button class="btn border-dark" style="width:200px;height:40px; background-color:#FFFFF0;" id="btn-mensagem-verbo2" data-toggle="modal" data-target="#modal-verbo">VERBOS</button>
                </div>
            </div>
        </div>
    </div>
<?php
   
    include "../modais/modal_alfabeto.php";
    include "../modais/modal_numeral.php";
    include "../modais/modal_pronome.php";
    include "../modais/modal_verbo.php";
    include "../rodape.php";

?>