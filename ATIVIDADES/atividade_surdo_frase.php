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
									$objeto = "os videos";
									$veiculo = "da frase";
								}
								else{
									$objeto = "as palavras";
									$veiculo = "do video";
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
										<form>										
											<input type="text" name="resposta" class="resposta form-control m-2" />
								</div>								
							</div>

                            <div class="col">
                                <div class="row justify-content-center align-items-center">		
                                        <?php foreach($p_final as $cod => $p){?>
                                        <button type="button" value="<?php echo $cod;?>"  class="resposta_frase m-3 btn  text-uppercase text-dark" ><?php echo $p;?></button>
                                        <?php 
										}
										?>
										<script> j=0; resposta_correta_frase= new Array(); </script>
										<?php
										foreach($codigo_palavras_corretas as $c){?>
											<script> 
												resposta_correta_frase[j]=<?php echo $c;?>;
												j++;
											</script>
										<?php 
										}
										
										// foreach vetor resposta correta --- sequencia 
										// input respo_usuario vazio a cada click na palavra  ?>

                                        <br />
                                </div>								
                            </div>				
							
							<div class="row">
								<div class="col justify-content-center  align-items-center mr-3">	
											<input type="reset" name="limpar" class="form-control btn btn-secondary m-2" />
											<button type="button" name="enviar_resposta_frase" class="form-control btn btn-primary enviar_resposta_frase m-2">Enviar Resposta</button>
										</form>
										<br />
								</div>								
							</div>

							<?php
							} else{
									header("location: ../SCORE/score.php?pagina=".$_GET["pagina"]);
								}
							?>
					</div>
				</div>
			</div>
		</div>
<!-- FIM DA MONTAGEM PARA O USUARIO --------------->
<script>
	$(function(){
	var palavras_usuario = new Array();
	var i=0;
	$(".resposta_frase").click(function(){
		valor_anterior=$("input[name='resposta']").val();
		$("input[name='resposta']").val(valor_anterior+ ' '+$(this).html());
		console.log(valor_anterior);
		$(this).prop('disabled',true);
		palavras_usuario[i]=$(this).val();
		i++;
		console.log(palavras_usuario);

	})
	$("input[name='limpar']").click(function(){
		$(".resposta_frase").prop('disabled',false);

		palavras_usuario.splice(0,i);
		i=0;
		console.log(palavras_usuario);
	});
	$(".enviar_resposta_frase").click(function(){
		r=palavras_usuario;
		c = resposta_correta_frase;
        sf = "<?php echo $_GET["pagina"];?>";
		cod_frase ="<?php echo $linha_frase['id_frase'];?>";
        post = {resposta:r, correto:c,subfase:sf, cod_frase:cod_frase};
		console.log(post);
        $.post("salva_resposta_frase.php",post,function(r){
            if(r=="1"){					
                location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>_frase.php?pagina='+sf;
            }
            else{
                console.log(r);
            }
        });
	});
});

</script>