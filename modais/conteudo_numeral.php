    <script>
        posicao_numero=0;
        numeros=new Array("0","1","2","3","4","5","6","7","8","9");
        function troca_numero(acao_numero) // PROXIMO NUMERO
        {
            posicao_numero= posicao_numero + acao_numero ;
            if(posicao_numero!=0) 
            {
                $("#anterior").show();
            
            }
            else
            {
                $("#anterior").hide();// ESCONDE BOTAO ANTERIOR
                $("#btn-modalfinalizar").hide();// ESCONDE BOTAO FINALIZAR
            }
            if(posicao_numero!=9) 
            {
                $("#proximo").show();
                $("#btn-modal-finalizar").hide(); // ESCONDE BOTAO FINALIZAR
            }
            else
            {
                $("#proximo").hide();// ESCONDE BOTAO PROXIMO
                $("#btn-modal-finalizar").show(); // MOSTRA BOTAO FINALIZAR
            }
            numero=numeros[posicao_numero];
            $("#texto_numero").html(numero.toUpperCase());
            link_img="../img/numeral/"+numero+".gif";
            $("#img_numero").attr("src",link_img);
        }
        $(document).ready(function(
            ){             
               $("#proximo").click(
                   function(){
                       troca_numero(1);
                   }
               );
              
               $("#anterior").click(
                   function(){
                       troca_numero(-1);
                   }
               );

                // MODAL FINALIZAR ---------------------------------------------------------------------------------
                $("#btn-modal-finalizar").click(function(){
                $("#modal-mensagem-finalizar").modal();
                }); 
            }); 
    </script>
    <div class="modal fade" id="conteudo_numeral"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema Numeral!</h4><br />
                        </div>
                        <div class="row">
                            <div class="col">
                                <h1 class="card-title text-center" id="texto_numero" style="color:#828282;font-size:230px;">0</h1> <!-- NUMERO -->
                            </div>
                            <div class="col">
                                <img id="img_numero" src="../img/numeral/0.gif" style="width:85%"> <!--IMAGEM DO NUMERO -->
                            </div>
                        </div>   
                        <div class="modal-footer">
                            <button class="btn btn-lg btn-secondary text-uppercase" id="anterior" style="display:none;">Anterior</button>
                            <button class="btn btn-lg btn-secondary text-uppercase" id="proximo" >Próximo</button>
                            <button class="btn btn-lg btn-success text-uppercase " id="btn-modal-finalizar" style="display:none;" data-dismiss="modal" data-toggle="modal" data-target="#modal-mensagem">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="modal-mensagem-finalizar"> <!-- CONTEUDO MODAL FINALIZAR -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução do tema Numeral!</h4>
                <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                <br />
                <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=7'">Sim, vamos lá!</button>
                <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../mapa.php'"> Não, voltar para o mapa!</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>