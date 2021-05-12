<?php
    include("menu.php");
    include("conexao.php");

    $consulta_fase = "SELECT * FROM fase ORDER BY nome ";
    $resultado_fase = mysqli_query($conexao,$consulta_fase) or die ("Erro Fase");

    $consulta_subfase = "SELECT * FROM subfase ORDER BY nome";
    $resultado_subfase = mysqli_query($conexao,$consulta_subfase) or die ("Erro Subfase");
?> 
<style>
    body
    {
        background:url("img/login_cadastro.png")  no-repeat;
        background-size: 100%;

    }
</style>

<script>

var id = null;
var filtro = null;

// PAI DE TODOS -----------------------------------------------------------------------------------
$(function(){
    
    paginacao(0);
    
    //ALTERAR------------------------------------------------------------------------------------
    $(document).on("click",".alterar",function()
    {
        id = $(this).attr("value");
        $.ajax({
            url:"carrega_palavra_alterar.php",
            type:"post",
            data:{id: id}, 
            success: function(vetor)
            {
                $("input[name='cod_fase']").val(vetor.nivel);
                $("input[name='cod_subfase']").val(vetor.subnivel);
                $("input[name='cod_palavra']").val(vetor.palavra);
               
                $("input[name='video_s']").val(vetor.video_s);
              
                $(".btn_altera").attr("class","alteracao"); // muda o nome do botao para Alterar
                $(".alteracao").val("Alterar Cadastro");
            }
        });
    
    });

    //PAGINACAO-----------------------------------------------------------------------------------
    function paginacao(p)
    {
        $.ajax(
        {
            url:"carrega_palavra.php",
            type:"post",
            data:{pg:p, nome_filtro: filtro},
            success:function(matriz)
            {
               console.log(matriz);
                $("#tb").html("");
                for (i=0;i<matriz.length;i++)
                {
                    linha = "<tr>";
                    linha += "<td class = 'cod_fase'>" + matriz[i].cod_fase + "</td>";
                    linha += "<td class = 'cod_subfase'>" + matriz[i].cod_subfase + "</td>";
                    linha += "<td class = 'cod_palavra'>" + matriz[i].cod_palavra + "</td>";
                   
                    linha += "<td class = 'video_s'>" + matriz[i].video_s + "</td>";
                   
                    linha += "<td><button type = 'button'  class = 'alterar btn btn-secondary' id='alterar' value='"+ matriz[i].id_palavra + "'>Alterar</button> <button type = 'button' class = 'remover btn btn-secondary' value ='" + matriz[i].id_palavra + "'>Remover</button> </td>";
                    linha += "</tr>";
                    $("#tb").append(linha); 
                }
            }
        });
    }
            

    // CLICAR NA PAGINACAO -----------------------------------------------------------------------
    $(document).on("click",".pg",function(){                                                       
        p = $(this).val();
        p = (p-1)*5;
        paginacao(p);   
    });

// ALTERACAO -------------------------------------------------------------------------------------
$(document).on("click",".alteracao",function(){           

        $.ajax(
        {
            url:"alteracao_palavra.php",
            type:"post",
            data:
            {
                id: id,
                nivel: $("input[name='nivel']").val(),
                subnivel: $("input[name='subnivel']").val(),
                palavra: $("input[name='palavra']").val(),
                video_s: $("input[name='video_s']").val(),
               
            },
            success:function(data)
            {
                if(data==1)
                {
                    $("#status").html("Palavra alterada");
                    $("#status").css("color","blue");
                    paginacao(0);
                    $("input[name='nivel']").val("");
                    $("input[name='subnivel']").val("");
                    $("input[name='palavra']").val("");
                    $("input[name='video_s']").val("");
                  

                    $(".alteracao").attr("class","btn_altera"); // muda o nome devolta para ALTERACAO
                    $(".btn_altera").val("Alteração");  
                }
                else
                {
                    $("#status").html(data);
                    $("#status").css("color","");
                }
            }
        });
    });
    // ALTERAR O NIVEL ------------------------------------------------------------------------------ 
    $(document).on("click",".nivel",function(){    
        
        td= $(this);
        nivel= td.html();
        td.html("<input type='text' id='nivel_alterar' name='nivel' value='" + nivel +"' />");
        td.attr("class","nivel_alterar");
        $("#nivel_alterar").focus();
        
    });  

    // ALTERAR O NIVEL AO SAIR DO CAMPO -----------------------------------------------------------------
    $(document).on("blur",".nivel_alterar",function(){    
        td = $(this).closest("td");
        id_linha= $(this).closest("tr").find("button").val();
        $.ajax({
            url:"alterar_coluna_palavra.php",
            type:"post",
            data:{
                    coluna:'nivel',
                    valor:$("#nivel_alterar").val(),
                    id:id_linha
                 },
            success: function()
            {
                td.html($("#nivel_alterar").val());
                td.attr("class","nivel");
            }
        });
       
    });
     // ALTERAR SUBNIVEL ------------------------------------------------------------------------------  

    $(document).on("click",".subnivel",function(){    
        
        td= $(this);
        subnivel= td.html();
        td.html("<input type='text' id='subnivel_alterar' name='subnivel' value='" + subnivel +"' />");
        td.attr("class","subnivel_alterar");
        $("#nivel_alterar").focus();
    });  
    // ALTERAR SUBNIVEL AO SAIR DO CAMPO ------------------------------------------------------------
    $(document).on("blur",".subnivel_alterar",function(){    
                    td=$(this);
                    id_linha3= $(this).closest("tr").find("button").val();
                    $.ajax({
                        url:"alterar_coluna_palavra.php",
                        type:"post",
                        data:{
                                coluna:'subnivel',
                                valor:$("#subnivel_alterar").val(),
                                id:id_linha3
                            },
                        success: function()
                        {
                            td.html($("#subnivel_alterar").val());
                            td.attr("class","subnivel");
                        }
                    });
                
                });  
 // ALTERAR PALAVRA ------------------------------------------------------------------------------  

 $(document).on("click",".palavra",function(){    
        
        td= $(this);
        palavra= td.html();
        td.html("<input type='text' id='palavra_alterar' name='palavra' value='" + palavra +"' />");
        td.attr("class","palavra_alterar");
        $("#palavra_alterar").focus();
    });  
    // ALTERAR PALAVRA AO SAIR DO CAMPO ------------------------------------------------------------
    $(document).on("blur",".palavra_alterar",function(){    
                    td=$(this);
                    id_linha3= $(this).closest("tr").find("button").val();
                    $.ajax({
                        url:"alterar_coluna_palavra.php",
                        type:"post",
                        data:{
                                coluna:'palavra',
                                valor:$("#palavra_alterar").val(),
                                id:id_linha3
                            },
                        success: function()
                        {
                            td.html($("#palavra_alterar").val());
                            td.attr("class","palavra");
                        }
                    });
                
                });  

    // FILTRAR (PESQUISA) ----------------------------------------------------------------------------
    $("#filtrar").click(function(){
        $.ajax({
            url:"paginacao_palavra.php",
            type:"post",
            data:
            {
                nivel: $("input[name='niveL']").val()
            },
            success: function(data)
            {
                $("#paginacao").html(data);
                filtro = $("input[name='nivel']").val();
                paginacao(0);

            }
        });
    });



    
});
</script>
</head>
    <body>


        <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-9 col-lg-9 mx-auto" style="margin-top:-80px;">
            <div class="card card-signin my-5" style="border-color:#828282;">
            <div class="card-body">
            <h5 class="card-title text-center"style="color:#828282;">Palavras Cadastradas!</h5>
                <form class="form">
            <!--CAMPO PARA ATUALIZACAO -->
                <div class="form-label-group" style="color:#828282;">
                <!--NIVEL -->
                <input  type ="text" class=" form-control w-50" id ="nivel" name ="cod_fase" placeholder="Nivel"  style="margin-left:-10px;">
                <!--SUBNIVEL -->
                <input  type = "text" class="form-control w-50" id ="subnivel" name ="cod_subfase" placeholder="Subnivel"  style="margin-left:400px; margin-top:-37px;">
                <br />
                <!--PALAVRA-->
                <input  type = "text" class="form-control w-50" id ="palavra" name ="cod_palavra" placeholder="Palavra"  style="margin-left:-10px">
                <!--LINK VIDEO -->
                <input  type = "text" class="form-control w-50" id ="video_sinal" name ="video_sinal" placeholder="Link do video"  style="margin-left:400px; margin-top:-39px;">
              
                <br />
            <!-- BOTAO ALTERACAO -->
            <button class=" btn_atera btn btn-lg btn-secondary btn-block text-uppercase "  type="submit" id="btn_altera" style="border-color:#828282;background-color:#828282;">Alteração</button>
                         
                <br />
            </form>
                <div id = "status"></div>

            <table border = "1">

            <form name = "filtro">
                <div class="form-group">
				<input type="text" class="form-control w-75" name="nome_filtro" placeholder="Busca pelo nome...">
				<small id="filtro_btn" class="form-text text-muted"></small>
                <button type="button" class="btn btn-secondary w-25" id="filtrar" style="margin-left:600px; margin-top:-70px;">Filtrar</button>
			  </div>
                </form>
                <br />
                <div class = "container">
							<table class="table table-striped table-bordered table-hover table-rounded">
            <thead>
                        <tr>
                            <th>Nivel</th> <th>Subnivel</th> <th>Palavra</th> <th>Video Sinal</th> <th>Video Datilologia</th> <th>Ação</th>
                        </tr>
                    </thead>

                
            
                    <tbody id = "tb">
                
                    </tbody>
                </table>
                <br />
                <div id="paginacao" style="text-align:center;">
                    <?php
                        include("paginacao_palavra.php");
                    ?>
                </div>
                <br />
                <button class=" btn btn-lg btn-primary btn-block text-uppercase "   type="submit" onclick = "location.href='form_cadastro_palavra.php'" style="border-color:#828282;background-color:#828282;">Cadastrar Palavras </button>
  
    </body>
</html>