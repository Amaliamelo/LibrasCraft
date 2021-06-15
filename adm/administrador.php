<?php
    session_start();
    include "cabecalho.php";
    include "conexao.php";
    include "menu.php";
    
?>

    <main class="bodyIndexADM">
        <?php
            if(isset($_SESSION["autorizado_adm"]))
            {
                
                echo '
                <div class="col-ofsset-12 cont2">
                    <div class="linha3 m-3"> </div>
                    <div class="row btn1  m-3 "><button type="button" data-toggle="modal" data-target="#modal_palavra" class="btn btn-lg btn-google btn-block btn-outline-light m-2">PALAVRAS</button></div>
                    <div class="row btn1  m-3 "><button type="button" data-toggle="modal" data-target="#modal_frase"   class="btn btn-lg btn-google btn-block btn-outline-light m-2">FRASES</button></div>
                    <div class="row btn1  m-3 "><button type="button" data-toggle="modal" data-target="#modal_subfase" class="btn btn-lg btn-google btn-block btn-outline-light m-2">SUBFASES</button></div>
                    <div class="row btn1  m-3 "><button type="button" data-toggle="modal" data-target="#modal_fase"    class="btn btn-lg btn-google btn-block btn-outline-light m-2">FASES</button></div>
                </div>';
            }
            else{
                header('Location: index.php');
            }
        ?>
         
    
       <?php
            //MODAL PALAVRA
            include "modais/modal_palavra.php";
            include "modais/modal_frase.php";
            include "modais/modal_subfase.php";
            include "modais/modal_fase.php";
            //RODAPE
            include "../rodape.php";
       ?>





