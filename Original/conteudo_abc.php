<?php
    include("conexao.php");
    include("menu.php");
?>

	<style>
	body 
    {
        background: url("img/aula_principal.png") no-repeat;
        width:100%; 
        overflow: hidden;
    }
    .alfabeto
    {
        margin-left:500px;
        margin-top:-40px;
        
    }
    .numeral
    {
        margin-left:500px;
        margin-top:10px;
        
    }

	</style>
    <script>

        // PAI DE TODOS -----------------------------------------------------------------------------------
        $(function(
        ){

            
            $(document).ready(function(
            ){             
                // MODAL ALFABETO ---------------------------------------------------------------------------------
                $("#btn-mensagem-alfabeto").click(function(){
                $("#modal-mensagem-alfabeto").modal();
                });

                // MODAL NUMERAL ---------------------------------------------------------------------------------
                $("#btn-mensagem-numeral").click(function(){
                $("#modal-mensagem-numeral").modal();
                });
            });    
        });
		</script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="alfabeto"> <!-- BOTAO ALFABETO -->
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" id="btn-mensagem-alfabeto" data-toggle="modal" data-target="#modal-mensagem">ALFABETO</button>
            </div>

    <div class="modal fade" id="modal-mensagem-alfabeto"> <!-- CONTEUDO MODAL ALFABETO -->
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema Alfabeto!</h4>
                <h5 class="text-center"style="color:#828282;">Nesse módulo você irá aprender quais são os sinais de todas as letras do alfabeto manual</h5>

                <br />
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='conteudo_alfabeto.php'"><i class="fab fa-google mr-2"></i> Começar</button>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>

    <div class="numeral"> <!-- BOTAO NUMERAL -->
            <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" id="btn-mensagem-numeral" data-toggle="modal" data-target="#modal-mensagem">NUMERAL</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-mensagem-numeral"> <!-- CONTEUDO MODAL NUMERAL -->
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema Numeral!</h4>
                <h5 class="text-center"style="color:#828282;">Nesse módulo você irá aprender quais são os sinais dos números de 0 a 9</h5>

                <br />
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='conteudo_numeral.php'"><i class="fab fa-google mr-2"></i> Começar</button>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>


</body>
</html>