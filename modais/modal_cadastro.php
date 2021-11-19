<div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Cadastre-se no LibrasCraft</h5>
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
                            <input type="text" id="nome" class="form-control " name = "nome" placeholder="Nome" required autofocus>
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
                            <input type="password" id="senha_cad" class="form-control" name="senha_cad" placeholder="Senha" required autofocus>
                        <br />
                    </div>
                    <!-- DATA NASCIMENTO -->
                    <div class="form-label-group" style="color:#828282;">
                        <label for="inputData">Data de Nascimento</label>
                            <input type="date" id="data" class="form-control" name = "data_nascimento" placeholder="Data de Nascimento" required autofocus>
                        <br />
                    </div>
                    <!-- SEXO -->
                    <div class="form-label-group" style="color:#828282;">
                        <label for="inputData">Sexo:</label>
                        <div class="form-check form-check-inline">                    
                        <input class="form-check-input" type="radio" name="sexo"  value="f" checked>
                        <label class="form-check-label" for="radio">Feminino</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" value="m">
                        <label class="form-check-label" for="radio">Masculino</label>
                    </div>

                    <!-- CONDICAO AUDITIVA -->
                    <div class="form-label-group" style="color:#828282;">
                        <label for="inputData">Condição Auditiva:</label>
                        <div class="form-check form-check-inline">                    
                        <input class="form-check-input" type="radio" name="condicao_auditiva"  value="o" checked>
                        <label class="form-check-label" for="radio">Ouvinte</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="condicao_auditiva"  value="s">
                        <label class="form-check-label" for="radio">Surdo</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="align-center">
                    <button type="reset" class="btn btn-danger m-3" id="limpar">Limpar</button>
                    <button type="button" class="btn btn-success m-3" id="cadastrar">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>





                