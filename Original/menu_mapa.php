<style>
.abc
{
    margin-top:35px;
    margin-left:143px;
    opacity:1;
}
.abc:hover
    {
        opacity:0.5;
    }
.casa
{
    margin-top:198px;
    margin-left:-70px;
    opacity:1;
}
.casa:hover
{
    opacity:0.5;
}



</style>
<script>

// PAI DE TODOS -----------------------------------------------------------------------------------
        $(function(
        ){

            // MODAL ABC ---------------------------------------------------------------------------------
            $(document).ready(function(
            ){             
                $("#btn-mensagem-abc").click(function(){
                $("#modal-mensagem").modal();
                });
            });    
        });
		</script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="abc"><!-- IMAGEM/BOTAO ABC -->
                <img id="btn-mensagem-abc" src="img/icones/mapa/abc.png" data-toggle="modal" data-target="#modal-mensagem">
            </div>

        <div class="row">
            <div class="casa"><!-- IMAGEM/BOTAO CASA -->
                <img id="btn-casa" src="img/icones/mapa/casa.png" onclick ="location.href='submapa_casa.php'">
           </div>
        </div>
    </div>

<div class="modal fade" id="modal-mensagem"> <!-- CONTEUDO MODAL ABC -->
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) ao Nível 1!</h4>
                <h5 class="text-center"style="color:#828282;">Escolha por onde começar</h5>

                <br />
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='parametros_libras.php'"><i class="fab fa-google mr-2"></i> 5 Parametros da Libras</button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='submapa_abc.php'"><i class="fab fa-google mr-2"></i> Introdução </button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=7'"><i class="fab fa-google mr-2"></i>Atividades Numeros</button>
                <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=8'"><i class="fab fa-google mr-2"></i>Atividades Letras</button>
 
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>


 



    </body>
</html>