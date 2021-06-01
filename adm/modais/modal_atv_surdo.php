<div class="modal fade" id="modal_atv_surdo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:#828282;"> CADASTRO ATIVIDADE PARA SURDOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="msg"></div>
            <form  id="form_login" method="post" action="">
                <!-- NIVEL -->
                <select class="custom-select col-5" id ="fase" name ="cod_fase">
                    <option selected>Fase</option>
                    <?php

                    while($linha=mysqli_fetch_assoc($resultado_fase)){
                        $fk_fase = $linha["id_fase"];
                        $fase = $linha["nome"];
                        echo "<option value='$fk_fase'>$fase</option>";
                    }
                    ?>
                </select>
              
                <!--SUBNIVEL -->
                <select class="custom-select col-6" id ="subfase" name ="cod_subfase">
                    <option selected>Subfase</option>
                </select> <br /> <br />

                <!-- ATERNATIVA A -->
                <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="aternativa_a" class="form-control col-12" name = "alternativa_a_s" placeholder="Alternativa A:">
                </div>
                <br />

                <!-- ATERNATIVA B -->
                <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="aternativa_b" class="form-control col-12" name = "alternativa_b_s" placeholder="Alternativa B:" >
                </div>
                <br />

                <!-- ATERNATIVA C -->
                <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="aternativa_c" class="form-control col-12" name = "alternativa_c_s" placeholder="Alternativa C:">
                </div>
                <br />

                <!-- ATERNATIVA D -->
                <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="aternativa_d" class="form-control col-12" name = "alternativa_d_s" placeholder="Alternativa D:" >
                </div> 
                <br />

                <!-- RESPOSTA -->
                <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="resposta" class="form-control" name = "resposta" placeholder="RESPOSTA:">
                </div>   
                <br />

                <!-- BOTAO CADASTRAR -->
                <button class=" btn_cadastra btn btn-lg btn-primary btn-block text-uppercase "  type="submit" id="btn_cadastra" style="border-color:#828282;background-color:#828282;">Cadastrar</button>
                <button class=" btn btn-lg btn-primary btn-block text-uppercase " onclick = "location.href='atividades_cadastradas.php'" style="border-color:#828282;background-color:#828282;">Atividades Cadastradas</button>
            </form>
            <div id = "status"></div>
            </div>
        
            <div class="modal-footer m-2">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>