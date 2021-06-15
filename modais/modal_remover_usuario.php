<div class="modal fade" id="modal_remover_usuario" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Excluir conta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>Você têm certeza que deseja excluir sua conta?</p>
            </div>
            <div class="modal-footer">
                <div class="align-center">
                    <button type="reset" class="btn btn-danger m-3" id="limpar">Não</button>
                    <button type="button" class="btn btn-success m-3" value="<?php echo $linha["id_usuario"]?>" id="remover_usuario">Sim</button>
                </div>
            </div>
        </div>
    </div>
</div>





                