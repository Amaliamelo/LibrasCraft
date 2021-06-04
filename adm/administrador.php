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
                    <div class="linha m-3"> </div>
                    <div class="linha2"> </div>
                    <div class="row btn1  m-3 "><button type="button" data-toggle="modal" data-target="#modal_palavra" class="btn btn-lg btn-outline-light m-2">PALAVRAS</button></div>
                    <div class="row btn1  m-3 "><button type="button" data-toggle="modal" data-target="#" class="btn btn-lg btn-outline-light m-2">FRASES</button></div>
                </div>';
            }
            else{
                header('Location: index.php');
            }
        ?>
         
    
       <?php
            //MODAL PALAVRA
            include "modais/modal_palavra.php";
            //RODAPE
            include "../rodape.php";
       ?>





