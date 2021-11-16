<?php
session_start();
    include "cabecalho.php";
    
?>

    <main class="bodyIndex">
        <?php
            /*if (isset($_SESSION[ "autorizado" ]))
            {
                echo  '<div class = "cont">
                    <a class="btn btn-dark m-3" href="mapa.php" role="button"> Mapa </a>
                    <a class="btn btn-dark m-3" href="logout.php" role="button"> Sair </a>
                </div> ' ;
            }
            else {
                echo  '<div class = "cont">
                    <button type = "button" data-toggle = "modal" data-target = "# modal_login" name = "login" class = "btn btn-success m-3" id = "log"> Entrar </button>
                    <button class = "btn btn-success m-3" type = "button" data-toggle = "modal" data-target = "# modal_cadastro"> Cadastrar </button>
                </div> ' ;
            }*/
            if(isset($_SESSION["autorizado"]))
            {
                header("location: mapa.php");
            }
            else{
                echo '<div class="col-ofsset-12 cont2">
                <div class="linha m-3"> </div>
                <div class="linha2"> </div>
                
                <div class="row btn1  m-3 ">
                    <a data-toggle="modal" data-target="#modal_sobre_nos" style="color:black;float: left;">
                        <img height= "30vh" width="40vw" src="img/icones/menu/sobre_nos.png" alt="Score" />
                    </a>
                    <button  class="btn btn-lg btn-google btn-block btn-outline-light m-2" type="button" data-toggle="modal"data-target="#modal_login" name="login" id="log">Entrar</button>
                    </div>
                    <div class="row btn2 m-3"><button class="btn btn-lg btn-google btn-block btn-outline-light m-2" type="button" data-toggle="modal" data-target="#modal_cadastro" > Cadastrar</button></div>
                </div> ';
            }
        ?>
         
    
       <?php
            //MODAL SOBRE NÓS
            include "modais/modal_sobre_nos.php";
            //MODAL LOGIN
            include "modais/modal_login.php";
            //MODAL CADASTRO
            include "modais/modal_cadastro.php";
            //RODAPE
            include "rodape.php";
       ?>