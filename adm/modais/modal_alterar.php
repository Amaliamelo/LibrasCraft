<div class="modal fade" id="alterar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282; text-align:center;">Alterar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
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
                    <div class="form-label-group" style="color:#828282;">
                        <input type="text" id="palavra" class="form-control" name = "palavra" placeholder="Palavra" required autofocus>
                        <label for="inputEmail"></label>
                    </div>
                    <!-- VIDEO SINAL -->
                    <div class="form-label-group" style="color:#828282;">
                         <input type="text" id="video_sinal" class="form-control" name = "video_sinal" placeholder="Video Sinal em Libras" >
                    </div>
                </form>
            </div>
        
            <div class="modal-footer m-2">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success">Alterar</button>
            </div>
        </div>
    </div>
</div>