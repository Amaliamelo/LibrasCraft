<?php
include "../conexao.php";
include "../ABC/cabecalho_abc.php";
include "../ABC/menu_abc.php";
include "consulta_no_banco.php";
include "funcao_trocar_palavra.php";
?>
<main class="body<?php echo $linha["nome"];?>">
	<div class="container" >
		<div class="row justify-content-center ">
			<div class="col card_atv">
				<div class="row align-items-center">
					<div class="col border bg-white">
					<div class="row">
							<div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
								<h4>INTRODUÇÃO DO NÍVEL <?php echo $linha["nome"];?> </h4>
							</div>
						</div>
						<div class="row">
						
							<div class="col border bg-light d-flex flex-column align-items-center">
							<!-- INICIO TABELA-->
								<table border="1" class ="table-bordered" id="texto_palavra" style="text-align:center;text-transform:uppercase;"> 
										<tr>
											<?php for($i=0;$i<strlen($palavra);$i++){ echo "<th>".$palavra[$i]."</th>"; } ?>
										</tr> <!-- strlen pega o tamanho da palavra -->
										<tr>
											<?php 
																						
												for($i=0;$i<strlen($palavra);$i++)
												{ 
													if($palavra[$i]==" ")
													{
														echo "<td></div></td>";
													}
													else
													{	
														echo "<td ><img src='../img/alfabeto/".$palavra[$i].".gif' class='img_datilografia'/></td>"; 
													} 												
												}
											?>
										</tr>
								</table>
							</div>
						</div>
							<!-- IMAGEM DO OBJETO -->
							<div class="row">
								<div class="col border bg-light d-flex flex-column justify-content-center align-items-center">
									<img src="../img/objetos/<?php echo $img_palavra;?>" class="rounded float-left" id="img_palavra" style="width:50%;">
								</div>
								<!-- VIDEO EM LIBRAS -->
								<div class="col border bg-light d-flex flex-column justify-content-center align-items-center border bg-light" >
									<div class="video"  style="margin-left:10px;"><iframe id="link_video" width="360" height="200" src="<?php echo $video_sinal; ?>" class="rounded float-right" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
								</div>
									
							</div>
							<!-- BOTOES -->
							<div class="col d-flex justify-content-center m-2 align-items-center">
								<button type="button" id="anterior" class="btn btn-lg btn-google btn-block w-50 text-uppercase" style="border-color:#828282;background-color:#828282;color:white; margin-left:-10px;">Anterior</button>
								<button type="button" id="proximo" class="btn btn-lg btn-google btn-block w-50 text-uppercase" style="border-color:#828282;background-color:#828282;color:white; margin-left:50px;">Próxima</button>
								<button class="btn btn-lg btn-google btn-block w-50 text-uppercase" id="btn-modal-finalizar" style="border-color:darkgreen;background-color:green;color:white; margin-left:250px;  display:none;" data-toggle="modal" data-target="#modal-mensagem">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
							</div>
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
                    <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução do tema!</h4>
                    <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                    <br />
                    <button class="btn btn-lg btn-google btn-block text-uppercase" 
                    style="border-color:#828282;background-color:#828282;color:white;" 
                    type="button" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=<?php echo $pagina ?> '"> Sim, vamos lá!</button>
                    <button class="btn btn-lg btn-google btn-block text-uppercase" 
                    style="border-color:#828282;background-color:#828282;color:white;" 
                    type="submit" onclick = "location.href='../mapa.php'"> Não, voltar para o mapa!</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
<?php
    //include "../rodape.php";
?>