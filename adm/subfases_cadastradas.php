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
        $.post("carrega_subfase.php", function(matriz){
            $("#tb").html("");
            for (i=0;i<matriz.length;i++)
            {
                linha = "<tr>";
                linha += "<td class = 'cod_fase'>" + matriz[i].nome_fase + "</td>";
                linha += "<td class = 'nome'>" + matriz[i].nome + "</td>";
                        
                linha += "<td>";
                linha += "<button type='button' data-toggle='modal' data-target='#alterar' style='margin-right:10px;' class='alterar_subfase' value='"+matriz[i].id_subfase+"'><img src='img/altera.png'  height='20' width='20'></button>";
                linha += "<button type='button' data-toggle='modal' data-target='#remover' class='remover_subfase' value='"+matriz[i].id_subfase+"'><img src='img/remove.png'  height='20' width='15'></button>";
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
<div class="card card_palav_cad" style=" height:500px; overflow-y: scroll; margin-top:40px;">
  <div class="card-header text-center">
    <h5 style="color:#828282;">Subfases Cadastradas</h5>
  </div>
  <div class="card-body text-center">
        <form name = "filtro" method="POST">
            <div class="form-group row m-2">
                <div class="col">
                    <select class="custom-select" id ="fase_subfase" name ="cod_fase_subfase">
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
			</div>
        </form>
        <table class="table table-striped table-bordered table-hover table-rounded table-responsive">
            <thead  style="color:#828282;">
                <tr>
                    <th>Fase</th> <th>Subfase</th> <th>Ação</th>
                </tr>
            </thead>
            <tbody id = "tb">
            </tbody>
        </table>
        <br />
        <button type="button" data-toggle="modal" data-target="#modal_subfase" class="btn btn-lg btn-secondary btn-block text-uppercase">CADASTRAR SUBFASE</button>
  </div>
</div>

<?php

    $remover="remover_subfase";
    $nome_form="SUBFASES/form_alterar_subfase.php";
    $titulo_remover="Remover Subfases";
    $titulo_alterar="Alterar Subfases";
    $salvar="salvar_subfase";
    //MODAL SUBFASE
    include "modais/modal_subfase.php";
    //MODAL REMOVER
    include "modais/modal_remover.php";
    //MODAL REMOVER
    include "modais/modal_alterar.php";
    //RODAPE
    include "../rodape.php";
?>