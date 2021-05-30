<?php
	session_start();
	include "../conexao.php";
	include "../ABC/cabecalho_ABC.php";
	include "../ABC/menu_abc.php";
	include "alternativas.php"

?>
<main class="body<?php echo $linha["nome"];?>">
<!-- A - div principal-->
		<div class="container align-middle" >
			<!-- B (filha da principal - A)-->
			<div class="row justify-content-center ">
				<div class="row card_atv">
					<div class="col flex-column justify-content-center align-items-center">
						<!-- C (filha da div B) -->
						<div class="col-12 border bg-white">
							<!-- D (filha da div C) : LINHA -->
							<?php
							if($qtd>0){
								if( $linha["nome"] == "LETRAS"){
									$objeto = "a letra";
									$veiculo = "da imagem";
								}
								else{
									$objeto = " o número";
									$veiculo = "do video";
								}
								//monta html com os dados coletados
								?>
							<div class="row">
								<div class="col bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
									<h4>ATIVIDADE DO NÍVEL <?php echo $linha["nome"];?> </h4>
									<h5> Selecione <?php echo $objeto; ?> que corresponde ao sinal <?php echo $veiculo;?></h5>
								</div>
							</div>
							<div class="row">
								<div class="col p-3 py-6 px-md-6">
								    <div class="video"><?php echo $atividade;?></div>
								</div>
							</div>
						
                            <div class="row">
                                <div class="col justify-content-center mt-12 align-items-center">		
                                        <?php for($i=0;$i<=3;$i++){?>
                                        <button type="button" value="<?php echo $codigo[$i];?>"  class="resposta btn <?php echo $cor[$i];?> btn-google btn-block text-uppercase text-dark" ><?php echo $palavra[$i];?></button>
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
//MARCANDO A RESPOSTA ------------------
$(function(){
    $(".resposta").click(function(){
        r = $(this).val();
		console.log(r);
        $(".resposta").attr("disabled",true);
        c = $("input[name='resposta_correta']").val();
        sf = "<?php echo $_GET["pagina"];?>";
        post = {resposta:r, correto:c,subfase:sf}
        $.post("salva_resposta.php",post,function(r){
            if(r=="1"){					
                location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina='+sf;
            }
            else{
                console.log(r);
            }
        });			
    });
});

</script>
<?php

    include "../rodape.php";

?>
