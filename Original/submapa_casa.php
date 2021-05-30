<?php
    include("conexao.php");
    include("menu.php");
?>
q
<style>
	body 
    {   
        background: url("img/fundo/submapa_casa.png") no-repeat;
        width:100%; 
        overflow: hidden;
    }
    .sala
    {
        margin-top:68px;
        margin-left:-27px;
        cursor:pointer;
        opacity:1;
    }
    .cozinha 
    {
        margin-top:-370px;
        margin-left:280px;
        cursor:pointer;
        opacity:1;
    }
    .banheiro 
    {
        margin-top:-380px;
        margin-left:552px;
        cursor:pointer;
        opacity:1;
    }
    .quarto 
    {
        margin-top:-377px;
        margin-left:828px;
        cursor:pointer;
        opacity:1;
    }
    .sala:hover
    {
        opacity:0.5;
    }
    .cozinha:hover
    {
        opacity:0.5;
    }
    .banheiro:hover
    {
        opacity:0.5;
    }
    .quarto:hover
    {
        opacity:0.5;
    }
</style>
<script>

        // PAI DE TODOS -----------------------------------------------------------------------------------
        $(function(
        ){

            
            $(document).ready(function(
            ){             
                // MODAL SALA ---------------------------------------------------------------------------------
                $("#btn-mensagem-sala").click(function(){
                $("#modal-mensagem-sala").modal();
                });

                // MODAL COZINHA ---------------------------------------------------------------------------------
                $("#btn-mensagem-cozinha").click(function(){
                $("#modal-mensagem-cozinha").modal();
                });

                 // MODAL BANHEIRO ---------------------------------------------------------------------------------
                $("#btn-mensagem-banheiro").click(function(){
                $("#modal-mensagem-banheiro").modal();
                });

                // MODAL QUARTO ---------------------------------------------------------------------------------
                $("#btn-mensagem-quarto").click(function(){
                $("#modal-mensagem-quarto").modal();
                });
            });    
        });
		</script>
</head>
<body>


<!-- IMAGEM/BOTAO SALA -->
<div class="container">
        <div class="row">
            <div class="sala">
                <img id="btn-mensagem-sala" src="img/icones/submapa_casa/sala.png" data-toggle="modal" data-target="#modal-mensagem">
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
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='introducao.php?pagina=1'"><i class="fab fa-google mr-2"></i> Introdução </button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=1'"><i class="fab fa-google mr-2"></i>Atividades</button>
 
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
                <img id="btn-mensagem-cozinha" src="img/icones/submapa_casa/cozinha.png" data-toggle="modal" data-target="#modal-mensagem">
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
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='introducao.php?pagina=2'"><i class="fab fa-google mr-2"></i> Introdução </button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=2'"><i class="fab fa-google mr-2"></i>Atividades</button>
 
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
                <img id="btn-mensagem-banheiro" src="img/icones/submapa_casa/banheiro.png" data-toggle="modal" data-target="#modal-mensagem">
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
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='introducao.php?pagina=3'"><i class="fab fa-google mr-2"></i> Introdução </button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=3'"><i class="fab fa-google mr-2"></i>Atividades</button>
 
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
                <img id="btn-mensagem-quarto" src="img/icones/submapa_casa/quarto.png" data-toggle="modal" data-target="#modal-mensagem">
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
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='introducao.php?pagina=4'"><i class="fab fa-google mr-2"></i> Introdução </button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=4'"><i class="fab fa-google mr-2"></i>Atividades</button>
 
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>
</body>
</html>