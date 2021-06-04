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
	$.post("carrega_palavra.php", function(matriz){
		$("#tb").html("");
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'cod_fase'>" + matriz[i].cod_fase + "</td>";
			linha += "<td class = 'cod_subfase'>" + matriz[i].cod_subfase + "</td>";
			linha += "<td class = 'cod_palavra'>" + matriz[i].palavra + "</td>";
			
			linha += "<td class = 'video_s'>" + matriz[i].video_sinal + "</td>";
			
			linha += "<td><button type = 'button'  class = 'alterar btn btn-secondary' id='alterar' value='"+ matriz[i].id_palavra + "'>Alterar</button> <button type = 'button' class = 'remover btn btn-secondary' value ='" + matriz[i].id_palavra + "'>Remover</button> </td>";
			linha += "</tr>";
			$("#tb").append(linha); 
		}
	});
});
</script>
<main class="bodyIndexADM">
<div class="card card_palav_cad" style="height:400px; overflow-y: scroll;">
  <div class="card-header text-center">
    <h5 style="color:#828282;">Palavras Cadastradas</h5>
  </div>
  <div class="card-body">
        <form name = "filtro">
            <div class="form-group row m-2">
                <input type="text" class="form-control m-1" name="nome_filtro" placeholder="Busca pelo nome...">
                <div class="col">
                    <select class="custom-select" id ="fase" name ="cod_fase">
                        <option selected>Fase</option>';
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
                        <option selected>Subfase</option>
                    </select>
                </div>
			</div>
        </form>
        <table class="table table-striped table-bordered table-hover table-rounded table-responsive">
            <thead  style="color:#828282;">
                <tr>
                    <th>Fase</th> <th>Subfase</th> <th>Palavra</th> <th>Video Sinal</th> <th>Ação</th>
                </tr>
            </thead>
            <tbody id = "tb">

            </tbody>
        </table>
        <br />
        <button class="btn btn-lg btn-secondary btn-block text-uppercase"  data-target="#modal_palavra">Cadastrar Palavras </button>
  </div>
</div>

<?php
    //MODAL PALAVRA
    include "modais/modal_palavra.php";
    //RODAPE
    include "../rodape.php";
?>