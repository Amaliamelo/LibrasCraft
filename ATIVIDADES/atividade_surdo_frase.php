<?php
include "alternativas_frase_surdo.php";
?>

<main class="body<?php echo $linha["nome"];?>" style="height:100%;">
<!-- A - div principal-->
		<div class="container align-middle " >
			<!-- B (filha da principal - A)-->
			<div class="row justify-content-center ">
				<div class="col mt-5 mb-5">
					<div class="row flex-column justify-content-center align-items-center">
						<!-- C (filha da div B) -->
						<div class="col-lg-8 col-md-6 border bg-white">
							<!-- D (filha da div C) : LINHA -->
							<?php
							if($qtd>0){
                                if( $_SESSION['condicao_auditiva'] == "o"){
									$objeto = "as palavras";
									$veiculo = "do video";
								}
								else{
									$objeto = "os videos";
									$veiculo = "da frase";
								}   
								//monta html com os dados coletados
								?>
							<div class="row">
								<div class="col bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
									<h4>ATIVIDADE DO NÍVEL FRASE DA SUBFASE <?php echo $linha["nome"];?> </h4>
									<h5> Selecione <?php echo $objeto; ?> que corresponde ao sinal <?php echo $veiculo;?></h5>
								</div>
							</div>
							<div class="row">
								<div class="col m-2 d-flex flex-column justify-content-center align-items-center">
								    <div class="video"><?php echo $atividade;?></div>
								</div>
							</div>
						
							<div class="row">
								<div class="col justify-content-center  align-items-center mr-3">											
										<input type="text" name="resposta" class="resposta form-control m-2" />
										<div id="msg_cod_palavra" class="m-3"></div>
										<input type="button" name="verifica_resposta" value="Verificar Resposta" class="form-control btn-info m-3" />
										<input type="button" style="display:none;color:white;"  name="envia_resposta" value="Enviar Resposta" class="form-control btn-success m-2" />
										<input type='hidden' name='resposta_correta' value='<?php echo $cod_correto;?>' />
										<br />
								</div>								
							</div>

                            <div class="col">
                                <div class="row justify-content-center align-items-center">		
                                        <?php for($i=0;$i<=7;$i++){?>
                                        <button type="button" value="<?php echo $codigo[$i];?>"  class="resposta_frase m-3 btn  text-uppercase text-dark" ><?php echo $palavras[$i];?></button>
                                        <?php }?>
                                        <input type='hidden' name='resposta_correta' value='<?php echo $cod_correto;?>' />
                                        <br />
                                </div>								
                            </div>				

							<?php
							} // fim do if que verifica se ainda há itens sem resposta.
							else{
								//acabou as palavras... acabou a atividade da subfase
									header("location: score.php?pagina=".$_GET["pagina"]);
								}
							?>
					</div>
				</div>
			</div>
		</div>
<!-- FIM DA MONTAGEM PARA O USUARIO --------------->
<script>

	$(".resposta_frase").click(function(){
		console.log($(".resposta_frase").html());
		$("input[name='resposta']").html($(".resposta_frase").html());
	})

</script>