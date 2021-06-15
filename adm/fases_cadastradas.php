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
	$.post("carrega_fase.php", function(matriz){
		$("#tb").html("");
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'cod_fase'>" + matriz[i].nome + "</td>";
            linha += "<td>";
            linha += "<a type='button' data-toggle='modal' data-target='#alterar' style='margin-right:10px;' value=" + matriz[i].id_palavra + "><img src='img/altera.png'  height='20' width='20'></a>";
            linha += "<a type='button' data-toggle='modal' data-target='#remover' class='bot_remover' value=" + matriz[i].id_palavra + "><img src='img/remove.png'  height='20' width='15'></a>";
            linha += "</td>";
			//linha += "<td><button type = 'button'  class = 'alterar btn btn-secondary' id='alterar' value='"+ matriz[i].id_palavra + "'>Alterar</button> <button type = 'button' class = 'remover btn btn-secondary' value ='" + matriz[i].id_palavra + "'>Remover</button> </td>";
			linha += "</tr>";
			$("#tb").append(linha); 
		}
	});
});
</script>

<main class="bodyIndexADM">
<div class="card card_palav_cad" style="height:500px; overflow-y: scroll; margin-top:100px;">
  <div class="card-header text-center">
    <h5 style="color:#828282;">Fases Cadastradas</h5>
  </div>
  <div class="card-body">
        <form name = "filtro" method="POST">
            <div class="form-group row">
                <select class="custom-select m-2" id ="fase" name ="cod_fase_fase">
                    <option selected value="">Fase</option>
                    <?php
                        while($linha=mysqli_fetch_assoc($resultado_fase)){
                            $fk_fase = $linha["id_fase"];
                            $fase = $linha["nome"];
                            echo "<option value='$fk_fase'>$fase</option>";
                        }
                    ?>
                </select>
			</div>
        </form>
        <table class="table table-striped table-bordered table-hover table-rounded" style="min-width:300px;">
            <thead style="color:#828282;">
                <tr>
                    <th>Fase</th> <th>Ação</th>
                </tr>
            </thead>
            <tbody id = "tb">
            </tbody>
        </table>
        <br />
        <button type="button" data-toggle="modal" data-target="#modal_fase" class="btn btn-lg btn-secondary btn-block text-uppercase">CADASTRAR FASE</button>
  </div>
</div>

<?php
    //MODAL FASE
    include "modais/modal_fase.php";
    //MODAL REMOVER
    include "modais/modal_remover.php";
    //MODAL REMOVER
    include "modais/modal_alterar.php";
    //RODAPE
    include "../rodape.php";
?>