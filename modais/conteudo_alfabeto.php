<script>
        posicao=0;
        letras=new Array("A","B","C","Ç","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        function troca_letra(acao) // PROXIMA LETRA
        {
            posicao = posicao + acao;
            console.log(posicao);
            if(posicao!=0) 
            {
                $("#anterior_letra").show();
                
            }
            else
            {
                $("#anterior_letra").hide();// ESCONDE BOTAO ANTERIOR
            }
            if(posicao!=26) 
            {
                $("#proximo_letra").show();
                $("#btn-modal-finalizar-letra").hide(); // ESCONDE BOTAO FINALIZAR
            }
            else
            {
                $("#proximo_letra").hide();// ESCONDE BOTAO PROXIMO
                $("#btn-modal-finalizar-letra").show(); // MOSTRA BOTAO FINALIZAR
            }
            letra=letras[posicao];
            $("#texto_letra").html(letra.toUpperCase());
            link_img="../img/alfabeto/"+letra.toUpperCase()+".gif";
            $("#img_letra").attr("src",link_img);
        }
        $(document).ready(function(){             
               $("#proximo_letra").click(
                   function(){
                       troca_letra(1);
                   }
               );
              
               $("#anterior_letra").click(
                   function(){
                       troca_letra(-1);
                   }
               );

                // MODAL FINALIZAR ---------------------------------------------------------------------------------
                $("#btn-modal-finalizar-letra").click(function(){
                    $("#modal-mensagem-finalizar-letra").modal();
                });
        });
</script>
    <div class="modal fade" id="conteudo_alfabeto"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema Alfabeto!</h4><br />
                        </div>
                        <div class="row">
                            <div class="col">
                                <h1 class="card-title text-center" id="texto_letra" style="color:#828282;font-size:170px;">A</h1> <!-- LETRA -->
                            </div>
                            <div class="col">
                                <img id="img_letra" src="../img/alfabeto/A.gif" style="width:85%"> <!--IMAGEM DA LETRA -->
                            </div>
                        </div>                      
                        <div class="modal-footer">
                            <button class="btn btn-lg btn-secondary text-uppercase" id="anterior_letra" style="display:none;">Anterior</button>
                            <button class="btn btn-lg btn-secondary text-uppercase" id="proximo_letra" >Próximo</button>
                            <button class="btn btn-lg btn-success text-uppercase " id="btn-modal-finalizar-letra" style="display:none;"  data-dismiss="modal" data-toggle="modal" data-target="#modal-mensagem-finalizar-letra">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
                        </div> 
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="modal fade" id="modal-mensagem-finalizar-letra"> <!-- CONTEUDO MODAL FINALIZAR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução do tema  Alfabeto!</h4>
                    <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                    <br />
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=8'">Sim, vamos lá!</button>
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../mapa.php'"> Não, voltar para o mapa!</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>