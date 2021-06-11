<div class="modal fade" id="modal_alterar_usuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Alterar dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg_cad"></div>
                <form class="form" name="cadastro_usuario" action="cadastro_usuario.php">
                    <!--NOME-->
                    <div class="form-label-group" style="color:#828282;">
                        <label for="inputNome">Nome:</label>
                            <input type="text" id="nome_alterar" value="<?php //echo $linha['nome']?>" class="form-control " name = "nome_alterar" placeholder="Nome" required autofocus>
                        <br />
                    </div>
                    <!-- EMAIIL -->
                    <div class="form-label-group" style="color:#828282;">
                        <label for="inputEmail">Endereço de Email</label><div id="status_email"></div>
                            <input type="text" id="email_cad" class="form-control email" name = "email_cad" placeholder="Email" required autofocus>
                        <br />
                    </div>
                    <!-- SENHA -->
                    <div class="form-label-group" style="color:#828282;">
                        <label for="inputSenha">Senha</label>
                            <input type="password" id="senha_alterar" class="form-control m-2" name="senha_cad" placeholder="Senha" required autofocus>
                            <input type="password" name="confirma_senha_alterar" class="form-control m-2"  placeholder = "Confirmar a senha..." class="form-group">
                        <br />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="align-center">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary m-3" id="limpar">Cancelar</button>
                    <button type="button" class="btn btn-success m-3" id="cadastrar">Alterar</button>
                </div>
            </div>
        </div>
    </div>
</div>





                