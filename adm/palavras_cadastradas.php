<?php
    session_start();
    include "cabecalho.php";
    include "conexao.php";
    include "menu.php";
    
    $consulta_fase = "SELECT * FROM fase ORDER BY nome ";
    $resultado_fase = mysqli_query($conexao,$consulta_fase) or die ("Erro Fase");
?>
<script>
$(document).ready(function(){
    function atualiza_tabela(){
        $.post("carrega_palavra.php", function(matriz){
		$("#tb").html("");
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'cod_fase'>" + matriz[i].nome_fase + "</td>";
			linha += "<td class = 'cod_subfase'>" + matriz[i].nome_subfase + "</td>";
			linha += "<td class = 'cod_palavra'>" + matriz[i].palavra + "</td>";
			
			linha += "<td class = 'video_s'>" + matriz[i].video_sinal + "</td>";
            
            linha += "<td>";

            linha += "<button  type='button' data-toggle='modal' class='alterar_palavra' data-target='#alterar' value='"+matriz[i].id_palavra+"' style='margin-right:10px;'><img src='img/altera.png'  height='20' width='20'></button>";
            linha += "<button type='button' data-toggle='modal' class='remover_palavra' value='"+matriz[i].id_palavra+"'  data-target='#remover'><img src='img/remove.png'  height='20' width='15'></button>";
            linha += "</td>";
            linha += "</tr>";
            
			$("#tb").append(linha); 
		}
	    });
    };
	atualiza_tabela();

 
});
</script>

<main class="bodyIndexADM">
<div class="card card_palav_cad" style="height:500px; overflow-y: scroll; margin-top:100px;">
  <div class="card-header text-center">
    <h5 style="color:#828282;">Palavras Cadastradas</h5>
  </div>
  <div class="card-body">
        <div id="status"></div>
        <form name = "filtro" method="POST">
            <div class="form-group row m-2">
                <input type="text" class="form-control m-1" name="nome_filtro" placeholder="Busca pelo nome...">
                <div class="col">
                    <select class="custom-select" id ="fase" name ="cod_fase">
                        <option selected value="0">Fase</option>
                        <?php
                            while($linha=mysqli_fetch_assoc($resultado_fase)){
                                $fk_fase = $linha["id_fase"];
                                $fase = $linha["nome"];
                                echo "<option value='$fk_fase'>$fase</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <!--SUBNIVEL -->
                    <select class="custom-select" id ="subfase" name ="cod_subfase">
                        <option selected value="0">Subfase</option>
                    </select>
                </div>
			</div>
        </form>
        <table class="table table-striped table-bordered table-hover table-rounded table-responsive">
            <thead  style="color:#828282;">
                <tr>
                    <th style="min-width:100px;">Fase</th> 
                    <th style="min-width:100px;">Subfase</th> 
                    <th style="min-width:200px;">Palavra</th> 
                    <th style="min-width:100px;">Video Sinal</th> 
                    <th style="min-width:100px;">Ação</th>
                </tr>
            </thead>
            <tbody id = "tb">
            </tbody>
        </table>
        <br />
        <button type="button" data-toggle="modal" data-target="#modal_palavra" class="btn btn-lg btn-secondary btn-block text-uppercase">CADASTRAR PALAVRAS</button>
  </div>
</div>

<?php

    $remover="remover_palavra";
    $nome_form="PALAVRAS/form_alterar_palavra.php";
    $titulo_remover="Remover Palavras";
    $titulo_alterar="Alterar Palavras";
    $salvar="salvar_palavra";
    //MODAL PALAVRA
    include "modais/modal_palavra.php";
    //MODAL REMOVER
    include "modais/modal_remover.php";
    //MODAL REMOVER
    include "modais/modal_alterar.php";
    //RODAPE
    include "../rodape.php";
?>