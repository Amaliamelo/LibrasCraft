<?php
    session_start();
    include "cabecalho.php";
    include "conexao.php";
    include "menu.php";
    
    $consulta_fase = "SELECT * FROM fase ORDER BY nome ";
    $resultado_fase = mysqli_query($conexao,$consulta_fase) or die ("Erro Fase");

    $consulta_subfase = "SELECT * FROM subfase ORDER BY nome";
    $resultado_subfase = mysqli_query($conexao,$consulta_subfase) or die ("Erro Subfase");

?>

<main class="bodyIndexADM">
<div class="card card_palav_cad" style="height:400px; overflow-y: scroll;">
  <div class="card-header text-center">
    <h5 style="color:#828282;">Palavras Cadastradas</h5>
  </div>
  <div class="card-body">
    
        <!--<form class="form">
            CAMPO PARA ATUALIZACAO 
            <div class="form-label-group" style="color:#828282;">
            <div class="row">
                NIVEL 
                <div class="col-lg-6">
                    <input  type ="text" class=" form-control" id ="nivel" name ="cod_fase" placeholder="Nivel" ><br />
                </div>
                
                SUBNIVEL 
                <div class="col-lg-6">
                    <input  type = "text" class="form-control" id ="subnivel" name ="cod_subfase" placeholder="Subnivel"  ><br />
                </div>
            </div>
            <div class="row">
                -PALAVRA
                <div class="col-lg-6">
                    <input  type = "text" class="form-control" id ="palavra" name ="cod_palavra" placeholder="Palavra"><br />
                </div>

                LINK VIDEO 
                <div class="col-lg-6">
                    <input  type = "text" class="form-control" id ="video_sinal" name ="video_sinal" placeholder="Link do video"><br />
                </div>
            </div>
             BOTAO ALTERACAO 
            <button class="btn btn-secondary w-100"  type="submit" id="btn_altera">Alteração</button>
        </form><br /><br />-->
        <div id = "status"></div>
        <form name = "filtro">
            <div class="form-group">
                <input type="text" class="form-control w-100" name="nome_filtro" placeholder="Busca pelo nome...">
                <small id="filtro_btn" class="form-text text-muted"></small>
                <button type="button" class="btn btn-secondary w-100" id="filtrar">Filtrar</button>
            </div>
        </form>
        </div>

        <table class="table table-striped table-bordered table-hover table-rounded table-responsive">
            <thead  style="color:#828282;">
                <tr>
                    <th>Nivel</th> <th>Subnivel</th> <th>Palavra</th> <th>Video Sinal</th> <th>Video Datilologia</th> <th>Ação</th>
                </tr>
            </thead>
            <tbody id = "tb">

            </tbody>
        </table>
        <div id="paginacao" style="text-align:center;">
           
        </div>
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