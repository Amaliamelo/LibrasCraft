<div class="modal fade" id="modal_login_adm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Bem-Vindo(a) ao LibrasCraft</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form  id="form_login" method="post" action="autenticacao_adm.php">
                    <div class="form-group">
                        <input type="email" name="email_login"  placeholder = "Email..." class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha_login" id="senha_login" placeholder = "Senha ..." class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="row m-2">
                <div class="col text-left">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success autenticar" id="logar">Autenticar</button>
                </div>
            </div>
            <div class="modal-footer m-2">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>