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
        $.post("carrega_fase.php", function(matriz){
            $("#tb").html("");
            for (i=0;i<matriz.length;i++)
            {
                linha = "<tr>";
                linha += "<td class = 'cod_fase'>" + matriz[i].nome + "</td>";
                linha += "<td>";
                linha += "<button type='button' data-toggle='modal' data-target='#alterar' class='alterar_fase'style='margin-right:10px;' value=" + matriz[i].id_fase + "><img src='img/altera.png'  height='20' width='20'></button>";
                linha += "<button type='button' data-toggle='modal' data-target='#remover' class='remover_fase' value=" + matriz[i].id_fase + "><img src='img/remove.png'  height='20' width='15'></button>";
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
    <h5 style="color:#828282;">Fases Cadastradas</h5>
  </div>
  <div class="card-body">
    <div id="status"></div>
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
    $remover="remover_fase";
    $nome_form="FASES/form_alterar_fase.php";
    $titulo_remover="Remover Fase";
    $titulo_alterar="Alterar Fase";
    $salvar="salvar_fase";
    //MODAL FASE
    include "modais/modal_fase.php";
    //MODAL REMOVER
    include "modais/modal_remover.php";
    //MODAL REMOVER
    include "modais/modal_alterar.php";
    //RODAPE
    include "../rodape.php";
?>