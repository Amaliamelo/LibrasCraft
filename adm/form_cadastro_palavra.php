<?php
    include "cabecalho.php";
    include "modal_login_adm.php";
    //include "menu.php";
    //session_start();
?>

    <main class="bodyIndexADM">
        <?php
            if(isset($_SESSION["autorizado_adm"]))
            {
                echo '<div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:-80px;">
                    <div class="card card-signin my-5" style="border-color:#828282;">
                    <div class="card-body">
                    <!-- NIVEL -->
                    <select class="custom-select" id ="fase" name ="cod_fase">
                        <option selected>Fase</option>';
                    
        
                        while($linha=mysqli_fetch_assoc($resultado_fase)){
                            $fk_fase = $linha["id_fase"];
                            $fase = $linha["nome"];
                            echo "<option value='$fk_fase'>$fase</option>";
                        }
                    
                    echo' </select>
                        <label></label>
                    <!--SUBNIVEL -->
                    <select class="custom-select" id ="subfase" name ="cod_subfase">
                        <option selected>Subfase</option>
                       
                        </select>
                        <label></label>
                    <!-- PALAVRA -->
                        <div class="form-label-group" style="color:#828282;">
                            <input type="text" id="palavra" class="form-control" name = "palavra" placeholder="Palavra" required autofocus>
                            <label for="inputEmail"></label>
                        </div>
                    <!-- VIDEO SINAL -->
                    <div class="form-label-group" style="color:#828282;">
                           
                            <input type="text" id="video_sinal" class="form-control" name = "video_sinal" placeholder="Video Sinal em Libras" >
                                   
                        </div>
                        <br >
                    <!-- BOTAO CADASTRAR -->
                        <button class=" btn_cadastra btn btn-lg btn-primary btn-block text-uppercase "  type="submit" id="btn_cadastra" style="border-color:#828282;background-color:#828282;">Cadastrar</button>
                        <button class=" btn btn-lg btn-primary btn-block text-uppercase "   type="submit" onclick = "location.href=\'palavras_cadastradas.php\'" style="border-color:#828282;background-color:#828282;">Palavras Cadastradas</button>
                    </form>
                        <div id = "status"></div> ';
            }
            else{
                echo '<div class="cont">
                    <button type="button"  data-toggle="modal"data-target="#modal_login_adm" name="login" class="btn btn-dark m-3" id="log">Login</button>
                    <button type="button"  data-toggle="modal"data-target="#modal_login" name="login" class="btn btn-dark m-3" id="log">Itens cadastrados</button>
                </div> ';
            }
        ?>
         
    
       <?php
            //MODAL LOGIN
            include "modais/modal_login_adm.php";
            //RODAPE
            include "../rodape.php";
       ?>