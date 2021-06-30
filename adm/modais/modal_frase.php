<div class="modal fade" id="modal_frase" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;">Frases</h5>
                <button type="button" class="close" id="close_frase" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="msg"></div>
                <form  id="form_frase">
                    <!-- FASE -->
                    <select class="custom-select" id ="fase" name ="cod_fase_frase">
                        <option>Fase</option>
                        <?php
                            $consulta_fase = "SELECT * FROM fase ORDER BY nome ";
                            $resultado_fase = mysqli_query($conexao,$consulta_fase) or die ("Erro Fase");

                            while($linha=mysqli_fetch_assoc($resultado_fase)){
                                $fk_fase = $linha["id_fase"];
                                $fase = $linha["nome"];
                                echo "<option value='$fk_fase'>$fase</option>";
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <!--SUBFASE -->
                    <select class="custom-select" id ="subfase_frase" name ="cod_subfase_frase">
                        <option selected>Subfase</option>
                    </select>
                    <br/><br/>
                    <!-- PRONOME -->
                    <select class="custom-select" id ="pronome_frase" name ="pronome_frase">
                        <option>Pronome</option>
                        <?php
                            $consulta_pronome= "SELECT id_palavra, palavra FROM `palavra` WHERE cod_subfase = '9' ORDER BY palavra";
                            $resultado_pronome = mysqli_query($conexao,$consulta_pronome) or die ("Erro Fase");

                            while($linha=mysqli_fetch_assoc($resultado_pronome)){
                                $fk_pronome = $linha["id_palavra"];
                                $pronome = $linha["palavra"];
                                echo "<option value='$fk_pronome'>$pronome</option>";
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <!-- VERBO -->
                    <select class="custom-select" id ="verbo_frase" name ="verbo_frase">
                        <option>Verbo</option>
                        <?php
                            $consulta_verbo = "SELECT id_palavra, palavra FROM `palavra` WHERE cod_subfase = '10' ORDER BY palavra";
                            $resultado_verbo = mysqli_query($conexao,$consulta_verbo) or die ("Erro Fase");

                            while($linha=mysqli_fetch_assoc($resultado_verbo)){
                                $fk_verbo = $linha["id_palavra"];
                                $verbo = $linha["palavra"];
                                echo "<option value='$fk_verbo'>$verbo</option>";
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <!-- PALAVRA -->
                    <select class="custom-select" id ="palavra_frase" name ="palavra_frase">
                        <option>Palavra</option>
                    </select>
                    <br/><br/>
                    <!-- FRASE  -->
                    <div class="form-label-group" style="color:#828282;">
                         <input type="text" class="form-control" id="frase" name = "frase" placeholder="Frase" >
                    </div>
                    <br/>
                    <!-- VIDEO SINAL -->
                    <div class="form-label-group" style="color:#828282;">
                         <input type="text" id="video_sinal_frase" class="form-control" name = "video_sinal_frase" placeholder="Video Sinal em Libras" >
                    </div>
                    <br/>
                    <!-- BOTAO CADASTRAR -->
                        <button class="btn_cadastra_frase btn btn-lg btn-secondary btn-block text-uppercase"  type="button" id="btn_cadastra_frase">Cadastrar</button>
                        <a class="btn btn-lg btn-secondary btn-block text-uppercase" type="button" href="frases_cadastradas.php" id="frases_cadastradas">Frases Cadastradas</a>
                   
                        <div id = "status_frase"></div>
                </form>
            </div>
        
            <div class="modal-footer m-2">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>