<?php

include "../ABC/cabecalho_abc.php";
include '../conexao.php';
?>

<html>
    <head>
        <title>RECUPERAR SENHA</title>
    </head>
    <body class="bodyIndex">
        <div class="recupera_senha  w-25">
            <div class="card" >
                <div class="card-body">
                    <h5 class="modal-title" style="color:#828282; size:50px;">Recuperar senha:</h5>

                    <div id="resetSenha">Insira aqui o seu e-mail:</div>
                    <form name="recupera" action="recupera.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="password" id="password" value="123"></input>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"required placeholder="E-mail" name="emailReset" id="emailReset" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success autenticar" name="botaoy" id="gologin" value="Enviar"/>
                        <br>
                    </form>
                </div>
            </div>
      
        </div>
    </body>
</html> 


