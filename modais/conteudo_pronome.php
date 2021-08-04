<?php
    include "../conexao.php";

    $consulta = "SELECT id_palavra,palavra, video_sinal FROM palavra WHERE cod_subfase = 9"; 
    
    $resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta".$consulta);
    $qtd_pronome= mysqli_num_rows($resultado);
?>
<script> j=0; pronomes= new Array(); link_video_pronome= new Array(); </script>
<?php  while( $linha = mysqli_fetch_assoc($resultado) ){?>
<script> pronomes[j] = "<?php echo $linha['palavra'];?>"; 
         link_video_pronome[j] = "<?php echo $linha['video_sinal'];?>";j++; </script>
<?php } echo '<input type="hidden" value="'.$qtd_pronome.'" name="qtd_pronomes"/>'?>

<script>
        posicao=0; 
        qtd_pronome=$("input[name='qtd_pronomes']").val();
        console.log(pronomes);
        function troca_pronome(acao) // PROXIMA pronome
        {
            posicao = posicao + acao;
            console.log(posicao);
            if(posicao!=0) 
            {
                $("#anterior_pronome").show();
                
            }
            else
            {
                $("#anterior_pronome").hide();// ESCONDE BOTAO ANTERIOR
            }
            if(posicao<qtd_pronome) 
            {
                $("#proximo_pronome").show();
                $("#btn-modal-finalizar-pronome").hide(); // ESCONDE BOTAO FINALIZAR
            }
            else
            {
                $("#proximo_pronome").hide();// ESCONDE BOTAO PROXIMO
                $("#btn-modal-finalizar-pronome").show(); // MOSTRA BOTAO FINALIZAR
            }
            pronome=pronomes[posicao];
            link_pronome=link_video_pronome[posicao];
            $("#texto_pronome").html(pronome.toUpperCase());
            $("#img_pronome").attr("src","https://www.youtube.com/embed/"+link_pronome+"?");
        }
        $(document).ready(function(){             
               $("#proximo_pronome").click(
                   function(){
                       troca_pronome(1);
                   }
               );
              
               $("#anterior_pronome").click(
                   function(){
                       troca_pronome(-1);
                   }
               );

                // MODAL FINALIZAR ---------------------------------------------------------------------------------
                $("#btn-modal-finalizar-pronome").click(function(){
                    $("#modal-mensagem-finalizar-pronome").modal();
                });
        });
</script>
    <div class="modal fade" id="conteudo_pronome"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) a introdução do tema Pronome!</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h1 class="card-title text-center" id="texto_pronome" style="color:#828282;font-size:90px;">EU</h1> <!-- pronome -->
                            </div>
                            <div class="col-12">
                            <iframe class="iframe_video rounded mx-auto d-block" id="img_pronome" style="width:85%" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" src="https://www.youtube.com/embed/ligar?"></iframe>                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-lg btn-secondary text-uppercase" id="anterior_pronome" style="display:none;">Anterior</button>
                            <button class="btn btn-lg btn-secondary text-uppercase" id="proximo_pronome" >Próximo</button>
                            <button class="btn btn-lg btn-success text-uppercase " id="btn-modal-finalizar-pronome" style="display:none;"  data-dismiss="modal" data-toggle="modal" data-target="#modal-mensagem-finalizar-pronome">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
                        </div> 
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="modal fade" id="modal-mensagem-finalizar-pronome"> <!-- CONTEUDO MODAL FINALIZAR -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card-body">
                    <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução do tema Pronome!</h4>
                    <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                    <br />
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=9'">Sim, vamos lá!</button>
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" onclick = "location.href='../mapa.php'"> Não, voltar para o mapa!</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>