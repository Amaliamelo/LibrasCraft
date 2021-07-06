<form  id="form_frase">
    <!-- FASE -->
    <select class="custom-select" id ="cod_fase_frase_alterar" name ="cod_fase_frase_alterar">
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
    <select class="custom-select" id ="cod_subfase_frase_alterar" name ="cod_subfase_frase_alterar">
        <option selected>Subfase</option>
    </select>
    <br/><br/>
    <!-- PRONOME -->
    <select class="custom-select" id ="pronome_frase_alterar" name ="pronome_frase_alterar">
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
    <select class="custom-select" id ="verbo_frase_alterar" name ="verbo_frase_alterar">
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
    <select class="custom-select" id ="palavra_frase_alterar" name ="palavra_frase_alterar">
        <option>Palavra</option>
    </select>
    <br/><br/>
    <!-- FRASE  -->
    <div class="form-label-group" style="color:#828282;">
            <input type="text" class="form-control" id="frase_alterar" name = "frase_alterar" placeholder="Frase" >
    </div>
    <br/>
    <!-- VIDEO SINAL -->
    <div class="form-label-group" style="color:#828282;">
            <input type="text" id="video_sinal_frase_alterar" class="form-control" name = "video_sinal_frase_alterar" placeholder="Video Sinal em Libras" >
    </div>
    <div class="form-label-group" style="color:#828282;">
        <input type="hidden" id="id_frase_alterar" class="form-control" name = "id_frase_alterar" >
    </div>
</form>