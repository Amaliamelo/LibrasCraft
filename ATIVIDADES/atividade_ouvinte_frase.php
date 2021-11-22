<?php
include "alternativas_frase_ouvinte.php";
?>

<main class="body<?php echo $linha["nome"];?>" style="height:100%;">
<!-- A - div principal-->
		<div class="container align-middle " style="margin-top:60px;">
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
									$objeto = "os videos";
									$veiculo = "os videos";
								}   
								//monta html com os dados coletados
								?>
							<div class="row">
								<div class="col bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
									<h4>ATIVIDADE DO NÍVEL FRASE DA SUBFASE <?php echo $linha["nome"];?> </h4>
									<h5> Selecione <?php echo $objeto; ?> que corresponde à frase </h5>
								</div>
							</div>
							<div class="row">
								<div class="col m-2 d-flex flex-column justify-content-center align-items-center">
                                    <table border="1" class ="table-bordered" id="texto_palavra" style="text-align:center;text-transform:uppercase;"> 
                                            <tr>
                                                <?php 
                                                if(isset($atividade)){
                                                    for($i=0;$i<strlen($atividade);$i++){
                                                        echo "<th><div class='frase_letras'>".$atividade[$i]."</div></th>"; 
                                                    }
                                                }
                                                else{
                                                    echo "<h2>Ainda não há frases cadastradas para esta subfase</h2>";
                                                }
                                            
                                                ?>
                                            </tr> <!-- strlen pega o tamanho da palavra -->
                                    </table>
								</div>
							</div>
						
							<div class="row">
								<div class="col justify-content-center  align-items-center mr-3">	
										<form>	
								</div>								
							</div>

                            <div class="col">
                                <div class="row justify-content-center align-items-center">		
										
                                        <?php foreach($p_final as $cod => $p){
                                            $opcao='<iframe id="link_video" width:100; height:50;class="iframe_video" src="https://www.youtube.com/embed/'.$p.'?" class="rounded mx-auto d-block" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
										?>
                                        <button type="button" value="<?php echo $cod;?>"  class="resposta_frase m-3 btn  text-uppercase text-dark" >
											<h5 class="<?php echo $cod;?> numeracao"></h5>
											<?php echo $opcao;?>
										</button>
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
								//print_r($qtd);
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
	var cont=0;
	$(".resposta_frase").click(function(){
		cont++;
		cl=$(this).val();
		classe="."+cl+"";
		$(classe).html(cont);
		console.log(classe);
		
		$(this).prop('disabled',true);
		palavras_usuario[i]=$(this).val();
		i++;
		console.log(palavras_usuario);

	})
	$("input[name='limpar']").click(function(){
		$(".resposta_frase").prop('disabled',false);
		$(".numeracao").html("");
		cont=0;
		palavras_usuario.splice(0,i);
		i=0;
	});
	$(".enviar_resposta_frase").click(function(){
		r=palavras_usuario;
		c = resposta_correta_frase;
		console.log(r);
		console.log(c);

        sf = "<?php echo $_GET["pagina"];?>";
		cod_frase ="<?php echo $linha_frase['id_frase'];?>";
        post = {resposta:palavras_usuario, correto:resposta_correta_frase,subfase:sf, cod_frase:cod_frase};
		//console.log(post);
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
