<?php
$consulta_fase = "SELECT * FROM fase ORDER BY nome ";
$resultado_fase = mysqli_query($conexao,$consulta_fase) or die ("Erro Fase");

?>

<div class="modal fade" id="modal_subfase" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Subfase</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form  id="form_login">
                    <!-- NIVEL -->
                    <select class="custom-select" id ="fase_subfase" name ="fase_subfase">
                        <option>Fase</option>
                        <?php
                            while($linha=mysqli_fetch_assoc($resultado_fase)){
                                $fk_fase = $linha["id_fase"];
                                $fase = $linha["nome"];
                                echo "<option value='$fk_fase'>$fase</option>";
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <!-- SUBFASE -->
                    <div class="form-label-group" style="color:#828282;">
                        <input type="text" id="subfase" class="form-control" name = "subfase" placeholder="Subfase" required autofocus>
                        <label for="inputEmail"></label>
                    </div>
                    <!-- BOTAO CADASTRAR -->
                        <button type="button" class="btn_cadastra_subfase btn btn-lg btn-secondary btn-block text-uppercase" id="btn_cadastra_subfase">Cadastrar</button>
                        <a class="btn btn-lg btn-secondary btn-block text-uppercase" type="button" href="subfases_cadastradas.php" id="subfases_cadastradas">Subfases Cadastradas</a>
                   
                        <div id = "status"></div>
                </form>
            </div>
        
            <div class="modal-footer m-2">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>