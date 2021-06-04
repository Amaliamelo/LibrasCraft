<?php
    include "../conexao.php";
    include "../ABC/cabecalho_abc.php";
    include "../ABC/menu_abc.php";

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
                <button class="btn btn-lg  btn-secondary text-uppercase  m-3 " type="submit" onclick = "location.href='introducao.php?pagina=1'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3 " type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=1'">Atividades</button>
 
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
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='introducao.php?pagina=2'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=2'">Atividades</button>
 
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
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='introducao.php?pagina=3'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=3'">Atividades</button>
 
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
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='introducao.php?pagina=4'"> Introdução </button>
                <button class="btn btn-lg btn-secondary text-uppercase  m-3" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=4'">Atividades</button>
 
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