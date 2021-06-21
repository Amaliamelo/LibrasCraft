<?php
$consulta_fase = "SELECT * FROM fase ORDER BY nome ";
$resultado_fase = mysqli_query($conexao,$consulta_fase) or die ("Erro Fase");

?>

<div class="modal fade" id="modal_frase" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Frases</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form  id="form_login">
                    <!-- NIVEL -->
                    <select class="custom-select" id ="fase" name ="cod_fase">
                        <option selected>Fase</option>
                        <?php
                            while($linha=mysqli_fetch_assoc($resultado_fase)){
                                $fk_fase = $linha["id_fase"];
                                $fase = $linha["nome"];
                                echo "<option value='$fk_fase'>$fase</option>";
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <!--SUBNIVEL -->
                    <select class="custom-select" id ="subfase" name ="cod_subfase">
                        <option selected>Subfase</option>
                    </select>
                    <br/><br/>
                    <!-- PALAVRA -->
                    <select class="custom-select" id ="palavra" name ="cod_palavra">
                        <option selected>Palavra</option>
                    </select>
                    <br/><br/>
                    <!-- FRASE  -->
                    <div class="form-label-group" style="color:#828282;">
                         <input type="text" id="frase" class="form-control" name = "frase" placeholder="Frase" >
                    </div>
                    <br/>
                    <!-- VIDEO SINAL -->
                    <div class="form-label-group" style="color:#828282;">
                         <input type="text" id="video_sinal_frase" class="form-control" name = "video_sinal_frase" placeholder="Video Sinal em Libras" >
                    </div>
                    <br/>
                    <!-- BOTAO CADASTRAR -->
                        <button class="btn_cadastra btn btn-lg btn-secondary btn-block text-uppercase" id="btn_cadastra_frase">Cadastrar</button>
                        <a class="btn btn-lg btn-secondary btn-block text-uppercase" type="button" href="frases_cadastradas.php" id="frases_cadastradas">Frases Cadastradas</a>
                   
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