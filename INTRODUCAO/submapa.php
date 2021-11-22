<?php
    include "../conexao.php";
    include "../ABC/cabecalho_abc.php";
    include "../ABC/menu_abc.php";

    //$fase=$_GET["fase"];

    //$sql = "SELECT * FROM subfase WHERE cod_fase=$fase";
    $usuario_seleciona=$_SESSION["autorizado"];


?>
<!-- IMAGEM/BOTAO SALA -->
<main class="bodyCASA">
    <div class="container">
            <div class="row">
                <div class="sala">
                    <img id="btn-mensagem-sala" src="../img/icones/submapa_casa/sala.png" data-toggle="modal" data-target="#modal-mensagem-sala">
                </div>   
            </div>    
    </div>

<!-- CONTEUDO MODAL SALA -->
<div class="modal fade" id="modal-mensagem-sala"> 
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a Sala!</h4>
                <h5 class="text-center"style="color:#828282;">Nesse módulo você irá aprender quais são os sinais dos objetos da sala</h5>

                <br />
                <label> <h4 class="card-title text-center"style="color:#828282;">  PALAVRA </h4> </label><br />
                <button class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="submit" onclick = "location.href='introducao.php?pagina=1'" > Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=1'">Atividades</button>
                <br />
                <hr/>
                <label> <h4 class="card-title text-center"style="color:#828282;"> FRASE </h4> </label><br />
                <?php
                $seleciona_casa = "SELECT * FROM usuario_subfase WHERE cod_usuario=$usuario_seleciona AND cod_subfase='1'";
                $resultado_seleciona_casa = mysqli_query($conexao,$seleciona_casa) or  die(mysqli_error($conexao));

                if(mysqli_num_rows($resultado_seleciona_casa)==1){
                    echo '<a href="introducao_frase.php?pagina=1" class="btn btn-lg  btn-secondary text-uppercase  m-3 " type=""> Introdução </a>';
                    echo '<a class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit" href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=1"">Atividades</a>';
                }
                else{
                    echo '<button class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="submit" href="introducao_frase.php?pagina=1"" disabled> Introdução </button>';
                    echo '<button class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit" href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=1"" disabled>Atividades</button>';
           
                }
                
                
                ?>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>


 <!-- IMAGEM/BOTAO COZINHA -->
<div class="container">
        <div class="row">
            <div class="cozinha">
                <img id="btn-mensagem-cozinha" src="../img/icones/submapa_casa/cozinha.png" data-toggle="modal" data-target="#modal-mensagem-cozinha">
            </div>   
        </div>    
</div>

<!-- CONTEUDO MODAL COZINHA -->
<div class="modal fade" id="modal-mensagem-cozinha"> 
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a Cozinha!</h4>
                <h5 class="text-center"style="color:#828282;">Nesse módulo você irá aprender quais são os sinais dos objetos da cozinha</h5>
                <br />
                <label> <h4 class="card-title text-center"style="color:#828282;">  PALAVRA </h4> </label><br />

                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='introducao.php?pagina=2'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=2'">Atividades</button>
                <br />
                <hr/>
                <label> <h4 class="card-title text-center"style="color:#828282;"> FRASE </h4> </label><br />
                <?php


                $seleciona_cozinha = "SELECT * FROM usuario_subfase WHERE cod_usuario=$usuario_seleciona AND cod_subfase='2'";
                $resultado_seleciona_cozinha = mysqli_query($conexao,$seleciona_cozinha) or  die(mysqli_error($conexao));

                if(mysqli_num_rows($resultado_seleciona_cozinha)==1){
                    echo '<a href="introducao_frase.php?pagina=2" class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="button" > Introdução </a>';
                    echo '
                    <a class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit"  href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=2""">Atividades</a>';
                }
                else{
                    echo '<button class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="submit" onclick = "location.href="introducao_frase.php?pagina=2""  disabled> Introdução </button>';
                    echo '<button class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit"  href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=2""" disabled>Atividades</button>';
           
                }
                ?>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>


 <!-- IMAGEM/BOTAO BANHEIRO -->
<div class="container">
        <div class="row">
            <div class="banheiro">
                <img id="btn-mensagem-banheiro" src="../img/icones/submapa_casa/banheiro.png" data-toggle="modal" data-target="#modal-mensagem-banheiro">
            </div>   
        </div>    
</div>

<!-- CONTEUDO MODAL BANHEIRO -->
<div class="modal fade" id="modal-mensagem-banheiro"> 
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) ao Banheiro!</h4>
                <h5 class="text-center"style="color:#828282;">Nesse módulo você irá aprender quais são os sinais dos objetos da banheiro</h5>

                <br />
                <label> <h4 class="card-title text-center"style="color:#828282;">  PALAVRA </h4> </label><br />
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='introducao.php?pagina=3'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=3'">Atividades</button>
                <br />
                <hr/>
                <label> <h4 class="card-title text-center"style="color:#828282;"> FRASE </h4> </label>
                <br />
                <?php


                $seleciona_banheiro = "SELECT * FROM usuario_subfase WHERE cod_usuario=$usuario_seleciona AND cod_subfase='3'";
                $resultado_seleciona_banheiro = mysqli_query($conexao,$seleciona_banheiro) or  die(mysqli_error($conexao));

                if(mysqli_num_rows($resultado_seleciona_banheiro)==1){
                    echo '<a href="introducao_frase.php?pagina=3" class="btn btn-lg btn-secondary text-uppercase  m-3 " type="button" > Introdução </a>';
                    echo '
                    <a class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit" href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=3"">Atividades</a>';
                }
                else{
                    echo '<button class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="submit" href="introducao_frase.php?pagina=3""  disabled> Introdução </button>';
                    echo '
                    <button class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit" href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=3""" disabled>Atividades</button>';
           
                }
                
                ?>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>

 <!-- IMAGEM/BOTAO QUARTO -->
<div class="container">
        <div class="row">
            <div class="quarto">
                <img id="btn-mensagem-quarto" src="../img/icones/submapa_casa/quarto.png" data-toggle="modal" data-target="#modal-mensagem-quarto">
            </div>   
        </div>    
</div>

<!-- CONTEUDO MODAL QUARTO -->
<div class="modal fade" id="modal-mensagem-quarto"> 
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) ao Quarto!</h4>
                <h5 class="text-center"style="color:#828282;">Nesse módulo você irá aprender quais são os sinais dos objetos da quarto</h5>

                <br />
                <label><h4 class="card-title text-center"style="color:#828282;">  PALAVRA </h4> </label><br />
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='introducao.php?pagina=4'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=4'">Atividades</button>
                <br />
                <hr/>
                <label> <h4 class="card-title text-center"style="color:#828282;"> FRASE </h4> </label>
                <br />
                <?php


                $seleciona_quarto = "SELECT * FROM usuario_subfase WHERE cod_usuario=$usuario_seleciona AND cod_subfase='4'";
                $resultado_seleciona_quarto = mysqli_query($conexao,$seleciona_quarto) or  die(mysqli_error($conexao));

                if(mysqli_num_rows($resultado_seleciona_quarto)==1){
                    echo '<a href="introducao_frase.php?pagina=4" class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="button" > Introdução </a>';
                    echo '<a class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit"  href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=4""">Atividades</a>';
                }
                else{
                    echo '<button class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="submit" onclick = "location.href="introducao_frase.php?pagina=4""  disabled> Introdução </button>';
                    echo '<button class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit"  href="../ATIVIDADES/atividade_'.$_SESSION['condicao_auditiva'].'_frase.php?pagina=4""" disabled>Atividades</button   >';
           
                }
                ?>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>
<?php
    include "../rodape.php";
?>