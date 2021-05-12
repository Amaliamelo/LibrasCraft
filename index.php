<?php
    include "cabecalho.php";
?>

    <main class="bodyIndex">
        <div class="cont">
            <button type="button"  data-toggle="modal"data-target="#modal_login" name="login" class="btn btn-dark m-3">Entrar</button>
            <button class="btn btn-dark m-3" type="button" data-toggle="modal" data-target="#modal_cadastro" > Cadastrar</button>
        </div>  
    
    <div class="modal fade" id="modal_login" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color:#828282;">Bem-Vindo(a) ao LibrasCraft</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  name="login" method="post" action="autenticacao.php">
                        <div class="form-group">
                            <input type="email" name="email_login"  placeholder = "Email..." class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha_login" placeholder = "Senha ..." class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="center">
                        <button type="button" class="btn btn-danger m-3" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success autenticar m-3" id="login">Autenticar</button>
                    </div>
                </div>
                <div class="modal-footer" style="color:#828282;">
                    <label for="cadastrar ">Ainda não é cadastrado? Cadastre-se já!</label>
                    <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" type="button" data-toggle="modal" data-target="#modal_cadastro" > Cadastrar-se</button>
                </div>
        </div>
    </div>



<?php
    include "modal_cadastro.php";
    include "rodape.php";
?>