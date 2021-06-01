<?php
    //session_start();
    include "cabecalho.php";
    include "conexao.php";
    include "menu.php";
    
?>

    <main class="bodyIndexADM">
        <?php
            if(isset($_SESSION["autorizado_adm"]))
            {
                
                echo '<div class="cont">
                        <button type="button" data-toggle="modal" data-target="#modal_palavra" class="btn btn-dark m-3">PALAVRA</a>
                        <button type="button" data-toggle="modal" data-target="#modal_atv_ouvinte"class="btn btn-dark m-3">ATIVIDADE OUVINTE</button>
                        <button type="button" data-toggle="modal" data-target="#modal_atv_surdo" class="btn btn-dark m-3">ATIVIDADE SURDO</button>
                    </div> ';
            }
            else{
                header('Location: index.php');
            }
        ?>
         
    
       <?php
            //MODAL LOGIN
            include "modais/modal_login_adm.php";
            //MODAL PALAVRA
            include "modais/modal_palavra.php";
            //MODAL ATIVIDADE OUVINTE
            include "modais/modal_atv_ouvinte.php";
            //MODAL ATIVIDADE SURDO
            include "modais/modal_atv_surdo.php";
            //RODAPE
            include "../rodape.php";
       ?>





