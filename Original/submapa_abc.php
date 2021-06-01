<?php
    include("conexao.php");
    include("menu.php");
?>

	<style>
	body 
    {
        background: url("img/fundo/sub_abc.png") no-repeat;
        width:100%; 
        overflow: hidden;
    }
    .alfabeto
    {
        margin-left:520px;
        margin-top:-75px;
        
    }
    .numeral
    {
        margin-left:520px;
        margin-top:-15px;
        
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

                // MODAL ALFABETO 2(mesma coisa)---------------------------------------------------------------------------------
                $("#btn-mensagem-alfabeto2").click(function(){
                $("#modal-mensagem-alfabeto2").modal();
                });

                // MODAL NUMERAL ---------------------------------------------------------------------------------
                $("#btn-mensagem-numeral").click(function(){
                $("#modal-mensagem-numeral").modal();
                });

                
                // MODAL NUMERAL 2(mesma coisa) ---------------------------------------------------------------------------------
                $("#btn-mensagem-numeral2").click(function(){
                $("#modal-mensagem-numeral2").modal();
                });
            });    
        });
		</script>
</head>
<body>


<!-- BOTAO ALFABETO -->
    <div class="container"> 
        <div class="row">
            <div class="alfabeto"> 
                <img src="img/icones/submapa_abc/botao_abc.png" class="btn border-bottom-0 border-dark" style="width:200px; heigt:200px; background-color:#FFFFF0; margin-left:-200px; margin-top:50px;" id="btn-mensagem-alfabeto" data-toggle="modal" data-target="#modal-mensagem">
                <button class="btn border-dark" style="width:200px; margin-left:-201px; background-color:#FFFFF0;" id="btn-mensagem-alfabeto2" data-toggle="modal" data-target="#modal-mensagem">ALFABETO</button>
            </div>

<!-- CONTEUDO MODAL ALFABETO -->
    <div class="modal fade" id="modal-mensagem-alfabeto"> 
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

 <!-- CONTEUDO MODAL ALFABETO 2-->
 <div class="modal fade" id="modal-mensagem-alfabeto2"> 
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


<!-- BOTAO NUMERAL -->
    <div class="numeral"> 
        <img src="img/icones/submapa_abc/botao_123.png" class="btn border-bottom-0 border-dark" style="width:200px; heigt:200px; background-color:#FFFFF0; margin-left:99px; margin-top:-260px;" id="btn-mensagem-numeral" data-toggle="modal" data-target="#modal-mensagem">
        </div>
         <button class="btn border-dark" style="width:200px;height:40px; margin-left:-200px; margin-top:-40px; background-color:#FFFFF0;" id="btn-mensagem-numeral2" data-toggle="modal" data-target="#modal-mensagem">NUMERAL</button>
   

<!-- CONTEUDO MODAL NUMERAL -->
    <div class="modal fade" id="modal-mensagem-numeral"> 
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

 <!-- CONTEUDO MODAL NUMERAL 2(mesma coisa)-->
 <div class="modal fade" id="modal-mensagem-numeral2"> 
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