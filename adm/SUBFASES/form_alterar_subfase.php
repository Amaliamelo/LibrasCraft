<form  id="form_login">
    <!-- NIVEL -->
    <select class="custom-select" id ="fase_subfase_alterar" name ="fase_subfase_alterar">
        <option>Fase</option>
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
    <!-- SUBFASE -->
    <div class="form-label-group" style="color:#828282;">
        <input type="text" id="subfase_alterar" class="form-control" name="subfase_alterar" placeholder="Subfase" required autofocus>
    </div>
    <div class="form-label-group" style="color:#828282;">
        <input type="hidden" id="id_subfase_alterar" class="form-control" name="id_subfase_alterar" >
    </div>
</form>