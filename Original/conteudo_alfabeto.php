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
    </style>
    <script>
        posicao=0;
        letras=new Array("A","B","C","Ç","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        function troca_letra(acao) // PROXIMA LETRA
        {
            posicao= posicao + acao;
            if(posicao!=0) 
            {
                $("#anterior").show();
                
            }
            else
            {
                $("#anterior").hide();// ESCONDE BOTAO ANTERIOR
            }
            if(posicao!=26) 
            {
                $("#proximo").show();
                $("#btn-modal-finalizar").hide(); // ESCONDE BOTAO FINALIZAR
            }
            else
            {
                $("#proximo").hide();// ESCONDE BOTAO PROXIMO
                $("#btn-modal-finalizar").show(); // MOSTRA BOTAO FINALIZAR
            }
            letra=letras[posicao];
            $("#texto_letra").html(letra.toUpperCase());
            link_img="img/alfabeto/"+letra.toUpperCase()+".gif";
            $("#img_letra").attr("src",link_img);
        }
        $(document).ready(function(
            ){             
               $("#proximo").click(
                   function(){
                       troca_letra(1);
                   }
               );
              
               $("#anterior").click(
                   function(){
                       troca_letra(-1);
                   }
               );

                // MODAL FINALIZAR ---------------------------------------------------------------------------------
                $("#btn-modal-finalizar").click(function(){
                $("#modal-mensagem-finalizar").modal();
                });
            }); 

    </script>
    </head>
    <body>

    <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-9 mx-auto" style="margin-top:-150px;">
                    <div class="card card-signin my-5" style="border-color:#828282;">
                        <div class="card-body">
                            <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema Alfabeto!</h4><br />
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center" id="texto_letra" style="color:#828282;font-size:370px; margin-left:-400px; margin-top:-130px;">A</h1> <!-- LETRA -->
                            <img id="img_letra" src="img/alfabeto/A.gif" style="width:35%; margin-left:400px; margin-top:-440px;"> <!--IMAGEM DA LETRA -->
                        </div>
                        <div class="card-body" style="margin-left:230px">
                        <button class="btn btn-lg btn-google btn-block w-50 text-uppercase" id="proximo" style="border-color:#828282;background-color:#828282;color:white; margin-left:200px; margin-top:-47px;">Próximo</button>
                        <button class="btn btn-lg btn-google btn-block w-50 text-uppercase" id="anterior" style="border-color:#828282;background-color:#828282;color:white; margin-left:-200px;margin-top:-47px;display:none;">Anterior</button>
                        <button class="btn btn-lg btn-google btn-block w-50 text-uppercase" id="btn-modal-finalizar" style="border-color:darkgreen;background-color:green;color:white; margin-left:200px; margin-top:-49px;display:none;" data-toggle="modal" data-target="#modal-mensagem">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
                    
                    
                    </div>    
                    </div>
                </div>
            </div>
    </div>

     <div class="modal fade" id="modal-mensagem-finalizar"> <!-- CONTEUDO MODAL FINALIZAR -->
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="card-body">

                                            <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução do tema Alfabeto!</h4>
                                            <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                                            <br />
                                            <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=8'"><i class="fab fa-google mr-2"></i> Sim, vamos lá!</button>
                                            <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="submit" onclick = "location.href='mapa.php'"><i class="fab fa-google mr-2"></i> Não, voltar para o mapa!</button></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

    </body>
<html>