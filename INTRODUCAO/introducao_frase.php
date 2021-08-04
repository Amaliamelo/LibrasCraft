
<?php
include "../conexao.php";
include "../ABC/cabecalho_abc.php";
include "../ABC/menu_abc.php";

//PEGANDO O CODIGO DA SUBFASE---------------------------------------------------------------------
$pagina = $_GET["pagina"];

//SELECIONANDO AS FRASES DO BANCO -----------------------------------------------------------------
$consulta = "SELECT frase, video_frase, cod_subfase FROM frase WHERE cod_subfase = $pagina";
$resultado = mysqli_query($conexao,$consulta) or die("Erro na consulta");

//PARA FUNÇÃO TROCAR PALAVRA -----------------------------------------------------------------
$vetor_palavra = "palavras = new Array("; // ??????????????????????????????????
$vetor_video = "videos = new Array("; // ??????????????????????????????????
$count = 0;
while($linha= mysqli_fetch_assoc($resultado)) // todas as palavras selecionadas na consulta
{
    if($count!=0) 
    {
        $vetor_palavra.=",";      
        $vetor_video.=",";      
	}
	else // pega o primeiro video/palavra	
	{
		$palavra=$linha["frase"];
		$video=$linha["video_frase"];
		$img_palavra=strtolower(str_replace(" ", "_",$linha["frase"])).".png"; // transforma tudo em minusculo // str_replace substitui espaco por _ (só nesse caso)
		$video_sinal= "https://www.youtube.com/embed/".$video;
	}							
    $count++;
    $vetor_palavra.="'".$linha["frase"]."'";
    $vetor_video.="'".$linha["video_frase"]."'";
} 
$vetor_palavra.=");
";
$vetor_video.=");
";

//SELECIONANDO O NOME DA SUBFASE -----------------------------------------------------------------------
$consulta2 = "SELECT nome FROM subfase WHERE id_subfase = $pagina";
$resultado2 = mysqli_query($conexao,$consulta2) or die("Erro na consulta2");
$linha = mysqli_fetch_assoc($resultado2);
echo'<input type="hidden" class="nivel" value="frase"/>';

include "funcao_trocar_frase.php";

?>
<main class="body<?php echo $linha["nome"];?>">
	<div class="container" >
		<div class="row justify-content-center">
			<div class="col card_atv">
				<div class="row align-items-center">
					<div class="col border bg-white">
					    <div class="row">
							<div class="col py-3 px-md-3  bg-light d-flex flex-column justify-content-center align-items-center" style="color:#828282;">
								<h4>INTRODUÇÃO FRASE DA SUBFASE <?php echo $linha["nome"];?> </h4>
							</div>
						</div>
						<div class="row">
						    <div class="col border bg-light d-flex flex-column align-items-center">
							<!-- INICIO TABELA-->
                                <table border="1" class ="table-bordered" id="texto_palavra" style="text-align:center;text-transform:uppercase;"> 
                                        <tr>
                                            <?php 
                                            if(isset($palavra)){
                                                for($i=0;$i<strlen($palavra);$i++){
                                                    echo "<th><div class='frase_letras'>".$palavra[$i]."</div></th>"; 
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
                        <!-- IMAGEM DO OBJETO -->
                        <div class="row ">
                            <!-- VIDEO EM LIBRAS -->
                            <div class="col p-3 d-flex flex-column justify-content-center align-items-center border bg-light" >
                                <div  style="margin-left:10px;"><iframe id="link_video" width="360" height="200" src="<?php echo $video_sinal; ?>" class="rounded float-right iframe_video" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                            </div>
                        </div>
                        <!-- BOTOES -->
                        <div class="col d-flex justify-content-center m-2 align-items-center">
                            <button type="button" id="anterior" class="btn btn-lg btn-google btn-block w-50 text-uppercase m-2" style="border-color:#828282;background-color:#828282;color:white; ">Anterior</button>
                            <button type="button" id="proximo" class="btn btn-lg btn-google btn-block w-50 text-uppercase m-2" style="border-color:#828282;background-color:#828282;color:white; ">Próxima</button>
                            <button class="btn btn-lg btn-google btn-block w-50 text-uppercase m-2" id="btn-modal-finalizar" style="border-color:darkgreen;background-color:green;color:white;   display:none;" data-toggle="modal" data-target="#modal-mensagem">FINALIZAR</button> <!-- BOTAO MODAL FINALIZAR -->
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
                    <h4 class="card-title text-center"style="color:#828282;">Parabéns, você concluiu a introdução sobre as frases do tema!</h4>
                    <h5 class="text-center"style="color:#828282;">Vamos colocar em prática oque aprendemos?</h5>

                    <br />
                    <button class="btn btn-lg btn-google btn-block text-uppercase" 
                    style="border-color:#828282;background-color:#828282;color:white;" 
                    type="button" onclick = "location.href='../ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>_frase.php?pagina=<?php echo $pagina ?> '"> Sim, vamos lá!</button>
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