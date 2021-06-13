<form  id="form_alterar_palavra">
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
        <label for="inputPalavra"></label>
    </div>
    <!-- VIDEO SINAL -->
    <div class="form-label-group" style="color:#828282;">
            <input type="text" id="video_sinal" class="form-control" name = "video_sinal" placeholder="Video Sinal em Libras" >
    </div>
</form>