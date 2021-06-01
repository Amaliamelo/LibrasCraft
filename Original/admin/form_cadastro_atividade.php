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
        background:url("img/login_cadastro1.png")  no-repeat;
        width:100%; 
        overflow: hidden;

    }
</style>



    <script>

        var id = null;
        var filtro = null;

        // PAI DE TODOS -----------------------------------------------------------------------------------
        $(function(
        ){

            // CADASTRAR OUVINTE ---------------------------------------------------------------------------------
            $(document).on("click",".btn_cadastra",function(
            ){
            
                $.ajax
                ({
                    url:"insere_atividade_ouvinte.php",
                    type:"post",
                    data:
                    {
                        subnivel:$("select[name='cod_subfase']").val(),
                        alternativa_a:$("input[name='alternativa_a']").val(),
                        alternativa_b:$("input[name='alternativa_b']").val(),
                        alternativa_c:$("input[name='alternativa_c']").val(),
                        alternativa_d:$("input[name='alternativa_d']").val(),
                        resposta:$("input[name='resposta']").val()
                    },
                    
                    success:function(data)
                    {
                        if(data==1)
                        {
                            $("#status").html("Atividade cadastrada com sucesso!");
                            $("#status").css("color","green");
                            $("#status").css("text-align","center");
                        }
                        else
                        {
                         
                            alert("ERRO!");
                            $("#status").css("color","red");
                            $("#status").css("text-align","center");
                        }
                    },
                    error:function(e)
                    {
                        $("#status").html("ERRO: Sistema indisponivel!");
                        $("#status").css("color","red");
                        $("#status").css("text-align","center");
                    }
                });
            }); 
            $("#fase").change(
                function(){
             
                $.ajax
                ({
                    url:"carrega_subfase.php",
                    type:"post",
                    data:
                    {
                        cod_fase:$("select[name='cod_fase']").val()
                        
                    },
                    success:function(dados)
                    {
                        if(dados!=null)
                        {
                            $("#subfase").html("<option selected>Subfase</option>"); //select vazio
                           for(i=0;i<dados.length;i++) 
                           {
                                atual = $("#subfase").html(); // recebe o valor do subfase
                                option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
                                $("#subfase").html(atual+option);
                                
                           }
                        }
                        else
                        {
                            $("#status").html("ERRO");
                            $("#status").css("color","red");
                            $("#status").css("text-align","center");
                        }
                    },
                    error:function(e)
                    {
                        $("#status").html("ERRO: Sistema indisponivel!");
                        $("#status").css("color","red");
                        $("#status").css("text-align","center");
                    }
                });
            }
            );
        });
		</script>
    </head>
    <body>
<!-- INICIO FORMULARIO  PARA OUVINTE ------------------------------------------------------------------------------------------------------------------>
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:-160px;">
            <div class="card card-signin my-5" style="border-color:#828282;">
            <div class="card-body">
            <h6 style = "color:#828282; text-align:center;"> CADASTRO ATIVIDADE PARA OUVINTES</h6>
            </br >
               <!-- NIVEL -->
               <select class="custom-select col-5" id ="fase" name ="cod_fase">
                <option selected>Fase</option>
                <?php

                while($linha=mysqli_fetch_assoc($resultado_fase)){
                    $fk_fase = $linha["id_fase"];
                    $fase = $linha["nome"];
                    echo "<option value='$fk_fase'>$fase</option>";
                }
                ?>
                </select>
              
            <!--SUBNIVEL -->
            <select class="custom-select col-5" id ="subfase" name ="cod_subfase" >
                <option selected>Subfase</option>
               
            </select>
               

            
            <!-- ATERNATIVA A -->
            <div class="form-group" style="color:#828282;">
            
                <input type="text" id="aternativa_a" class="form-control col-10" name = "alternativa_a" placeholder="Alternativa A:">
               
           
                <input type="text" id="aternativa_b" class="form-control col-10" name = "alternativa_b" placeholder="Alternativa B:">
            </div>
                </br >

           <!-- ATERNATIVA C -->
           <div class="form-label-group" style="color:#828282;">
                        <input type="text" id="aternativa_c" class="form-control col-10" name = "alternativa_c" placeholder="Alternativa C:">
               
                        <input type="text" id="aternativa_d" class="form-control col-10" name = "alternativa_d" placeholder="Alternativa D:" >
                </div> 
                </br >

            <!-- RESPOSTA -->
            <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="resposta" class="form-control" name = "resposta" placeholder="RESPOSTA:">
                </div>   
                </br >

            <!-- BOTAO CADASTRAR -->
                <button class=" btn_cadastra btn btn-lg btn-primary btn-block text-uppercase "  type="submit" id="btn_cadastra" style="border-color:#828282;background-color:#828282;">Cadastrar</button>
                <button class=" btn btn-lg btn-primary btn-block text-uppercase "   type="submit" onclick = "location.href='atividades_cadastradas.php'" style="border-color:#828282;background-color:#828282;">Atividades Cadastradas</button>
            </form>
                <div id = "status"></div>

                </div>
                </div>
    </body>
</html>
