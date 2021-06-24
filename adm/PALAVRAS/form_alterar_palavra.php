<form  id="form_alterar_palavra">
    <!-- NIVEL -->
    <select class="custom-select" id ="fase_alterar" name ="cod_fase_alterar">
        <option selected>Fase</option>
        <?php
            include "conexao.php";
        
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
    <!--SUBNIVEL -->
    <select class="custom-select" id ="subfase_alterar" name ="cod_subfase_alterar">
        <option selected>Subfase</option>
    </select>
    <br/><br/>
    <!-- PALAVRA -->
    <div class="form-label-group" style="color:#828282;">
        <input type="text" id="palavra" class="form-control" name = "palavra_alterar" placeholder="Palavra" required autofocus>
        <label for="inputPalavra"></label>
    </div>
    <!-- VIDEO SINAL -->
    <div class="form-label-group" style="color:#828282;">
            <input type="text" id="video_sinal" class="form-control" name = "video_sinal_alterar" placeholder="Video Sinal em Libras" >
    </div>
    <div class="form-label-group" style="color:#828282;">
            <input type="hidden" id="id_palavra_alterar" class="form-control" name = "id_palavra_alterar" >
    </div>
</form>