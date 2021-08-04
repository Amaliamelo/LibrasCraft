    <?php
        include "../conexao.php";

        $consulta = "SELECT id_palavra,palavra, video_sinal FROM palavra WHERE cod_subfase = 10"; 
        
        $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta".$consulta);
        $qtd_verbo = mysqli_num_rows($resultado);
    ?>
    <script> j=0; verbos= new Array(); link_video_verbo= new Array(); </script>
    <?php  while( $linha = mysqli_fetch_assoc($resultado) ){?>
    <script> verbos[j] = "<?php echo $linha['palavra'];?>"; 
             link_video_verbo[j] = "<?php echo $linha['video_sinal'];?>";j++; </script>
    <?php } echo '<input type="hidden" value="'.$qtd_verbo.'" name="qtd_verbos"/>'?>

<script>
      
        posicao=0; 
        qtd_verbo=$("input[name='qtd_verbos']").val();

        function troca_verbo(acao) // PROXIMA verbo
        {
            posicao = posicao + acao;
            if(posicao!=0) 
            {
                $("#anterior_verbo").show();
                
            }
            else
            {
                $("#anterior_verbo").hide();// ESCONDE BOTAO ANTERIOR
            }
            if(posicao!=qtd_verbo) 
            {
                $("#proximo_verbo").show();
                $("#btn-modal-finalizar-verbo").hide(); // ESCONDE BOTAO FINALIZAR
            }
            else
            {
                $("#proximo_verbo").hide();// ESCONDE BOTAO PROXIMO
                $("#btn-modal-finalizar-verbo").show(); // MOSTRA BOTAO FINALIZAR
            }
            verbo=verbos[posicao];
            link_verbo=link_video_verbo[posicao];
            $("#texto_verbo").html(verbo.toUpperCase());
            $("#img_verbo").attr("src","https://www.youtube.com/embed/"+link_verbo+"?");
        }
        $(document).ready(function(){             
               $("#proximo_verbo").click(
                   function(){
                       troca_verbo(1);
                   }
               );
              
               $("#anterior_verbo").click(
                   function(){
                       troca_verbo(-1);
                   }
               );

                // MODAL FINALIZAR ---------------------------------------------------------------------------------
                $("#btn-modal-finalizar-verbo").click(function(){
                    $("#modal-mensagem-finalizar-verbo").modal();
                });
        });
</script>
    <div class="modal fade" id="conteudo_verbo"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema verbo!</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h1 class="card-title text-center" id="texto_verbo" style="color:#828282;font-size:50px;">Ligar</h1> <!-- verbo -->
                            </div>
                            <div class="col-12">
                            <iframe class="iframe_video rounded mx-auto d-block" id="img_verbo" style="width:85%" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" src="https://www.youtube.com/embed/ligar?"></iframe>                            </div>
                        </div>                      
                        <div class="modal-footer">
                            <button class="btn btn-lg btn-secondary text-uppercase" id="anterior_verbo" style="display:none;">Anterior</button>
                            <button class="btn btn-lg btn-secondary text-uppercase" id="proximo_verbo" >Próximo</button>
                            <button class="btn btn-lg btn-success text-uppercase " id="btn-modal-finalizar-verbo" style="display:none;"  data-dismiss="modal" data-toggle="modal" data-target="#modal-mensagem-finalizar-verbo">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
                        </div> 
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="modal fade" id="modal-mensagem-finalizar-verbo"> <!-- CONTEUDO MODAL FINALIZAR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução do tema verbo!</h4>
                    <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                    <br />
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=10'">Sim, vamos lá!</button>
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../mapa.php'"> Não, voltar para o mapa!</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>