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

            // CADASTRAR ---------------------------------------------------------------------------------
            $(document).on("click",".btn_cadastra",function(
            ){
               // form = new FormData();         
               // form.append('figura',$("input[name='figura']").val()); // para apenas 1 arquivo
                $.ajax
                ({
                    url:"insere_palavra.php",
                    type:"post",
                    data:
                    {
                        subnivel:$("select[name='cod_subfase']").val(),
                        palavra:$("input[name='palavra']").val(),
                        video_sinal:$("input[name='video_sinal']").val()
                       
                    },
                    
                    success:function(data)
                    {
                        if(data==1)
                        {
                            $("#status").html("PALAVRA CADASTRADO COM SUCESSO!")
                            $("#status").css("color","green");
                            $("#status").css("text-align","center");
                        }
                        else
                        {
                            $("#status").html("ERRO AO CADASTRAR")
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
<!-- INICIO FORMULARIO -->
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:-80px;">
            <div class="card card-signin my-5" style="border-color:#828282;">
            <div class="card-body">
            <!-- NIVEL -->
            <select class="custom-select" id ="fase" name ="cod_fase">
                <option selected>Fase</option>
                <?php

                while($linha=mysqli_fetch_assoc($resultado_fase)){
                    $fk_fase = $linha["id_fase"];
                    $fase = $linha["nome"];
                    echo "<option value='$fk_fase'>$fase</option>";
                }
                ?>
                </select>
                <label></label>
            <!--SUBNIVEL -->
            <select class="custom-select" id ="subfase" name ="cod_subfase">
                <option selected>Subfase</option>
               
                </select>
                <label></label>
            <!-- PALAVRA -->
                <div class="form-label-group" style="color:#828282;">
                    <input type="text" id="palavra" class="form-control" name = "palavra" placeholder="Palavra" required autofocus>
                    <label for="inputEmail"></label>
                </div>
            <!-- VIDEO SINAL -->
            <div class="form-label-group" style="color:#828282;">
                   
                    <input type="text" id="video_sinal" class="form-control" name = "video_sinal" placeholder="Video Sinal em Libras" >
                           
                </div>
                <br >
            <!-- BOTAO CADASTRAR -->
                <button class=" btn_cadastra btn btn-lg btn-primary btn-block text-uppercase "  type="submit" id="btn_cadastra" style="border-color:#828282;background-color:#828282;">Cadastrar</button>
                <button class=" btn btn-lg btn-primary btn-block text-uppercase "   type="submit" onclick = "location.href='palavras_cadastradas.php'" style="border-color:#828282;background-color:#828282;">Palavras Cadastradas</button>
            </form>
                <div id = "status"></div>

                </div>
            </fieldset>
    </body>
</html>