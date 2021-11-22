<?php
session_start();
    include "cabecalho.php";
   
?>
   
    <main class="bodyIndex">
    
        <?php
           $senha="";
           if(!empty($_GET['senha'])){
               echo'                    
                   <div class="r_senha alert alert-primary" role="alert">
                           Senha alterada!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
               </div>';
           }
            if(isset($_SESSION["autorizado"]))
            {
                header("location: mapa.php");
            }
            else{
                echo'<div class="col-ofsset-12 cont2">
               <div class="linha m-3"> </div>
                <div class="linha2"> </div>
                <div class="row btn1  m-3 ">
                    <a data-toggle="modal" data-target="#modal_sobre_nos" >
                        <img class="interrogacao" src="img/icones/menu/sobre_nos.png" alt="Score" />
                    </a>
                    <button  class="btn btn-lg btn-google btn-block btn-outline-light m-2" type="button" data-toggle="modal"data-target="#modal_login" name="login" id="log">Entrar</button>
                    </div>
                    <div class="row btn2 m-3"><button class="btn btn-lg btn-google btn-block btn-outline-light m-2" type="button" data-toggle="modal" data-target="#modal_cadastro" > Cadastrar</button></div>
                </div> ';
              
            }
       
            //MODAL SOBRE NÓS
            include "modais/modal_sobre_nos.php";
            //MODAL LOGIN
            include "modais/modal_login.php";
            //MODAL CADASTRO
            include "modais/modal_cadastro.php";
            //RODAPE
            include "rodape.php";
       ?>