
<?php
    include("menu_login_cadastro.php");
    include("conexao.php");
?> 
<style>
    body
    {
        background:url("img/fundo/login_cadastro.png")  no-repeat;
        width:100%; 
        overflow: hidden;

    }
</style>


<script src="js/md5.js"></script>
    <script>

        var id = null;
        var filtro = null;

        // PAI DE TODOS -----------------------------------------------------------------------------------
        $(function(
        ){

            // CADASTRAR ---------------------------------------------------------------------------------
            $(document).on("click",".btn_cadastra",function(
            ){
            senha_md5=$.md5($("input[name='senha']").val());
                $.ajax
                ({
                    url:"insere.php",
                    type:"post",
                    data:
                    {
                        nome: $("input[name='nome']").val(),
                        email:$("input[name='email']").val(),
                        senha:senha_md5,
                        sexo:$("input[name='sexo']:checked").val(),
                        data_n:$("input[name='data_nascimento']").val(),
                        condicao:$("input[name='condicao_auditiva']:checked").val()
                    },
                    
                    success:function(data)
                    {
                        if(data==1)
                        {
                            $("#status").html("USUÁRIO CADASTRADO COM SUCESSO!")
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
                    }
                });
            });    
        });
		</script>
    </head>
    <body>
<!-- INICIO FORMULARIO -->
    <div class="container">
    <form method ="POST">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:-200px;">
            <div class="card card-signin my-5" style="border-color:#828282;">
            <div class="card-body">
            <!-- NOME -->
                <h5 class="card-title text-center"style="color:#828282;">Cadastre-se no LibrasCraft!</h5>
                <form class="form-signin">
                <div class="form-label-group" style="color:#828282;">

                <label for="inputNome">Nome:</label>
                    <input type="text" id="nome" class="form-control " name = "nome" placeholder="Nome" required autofocus>
                <br />
                </div>
            <!-- EMAIIL -->
                <div class="form-label-group" style="color:#828282;">
                <label for="inputEmail">Endereço de Email</label><div id="status_email"></div>
                    <input type="text" id="email" class="form-control" name = "email" placeholder="Email" required autofocus>
                   <br />
                </div>
            <!-- SENHA -->
                <div class="form-label-group" style="color:#828282;">
                <label for="inputSenha">Senha</label>
                    <input type="password" id="senha" class="form-control " name = "senha" placeholder="Senha" required autofocus>
                   <br />
                </div>
            <!-- DATA NASCIMENTO -->
                <div class="form-label-group" style="color:#828282;">
                <label for="inputData">Data de Nascimento</label>
                    <input type="date" id="data" class="form-control " name = "data_nascimento" placeholder="Data de Nascimento" required autofocus>
                    <br />
                </div>
            <!-- SEXO -->
                <div class="form-label-group" style="color:#828282;">
                    <label for="inputData">Sexo:</label>
                    <div class="form-check form-check-inline">                    
                    <input class="form-check-input" type="radio" name="sexo"  value="f" checked>
                    <label class="form-check-label" for="radio">Feminino</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" value="m">
                    <label class="form-check-label" for="radio">Masculino</label>
                </div>

            <!-- CONDICAO AUDITIVA -->
                <div class="form-label-group" style="color:#828282;">
                    <label for="inputData">Condiçao Auditiva:</label>
                    <div class="form-check form-check-inline">                    
                    <input class="form-check-input" type="radio" name="condicao_auditiva"  value="o" checked>
                    <label class="form-check-label" for="radio">Ouvinte</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="condicao_auditiva"  value="s">
                    <label class="form-check-label" for="radio">Surdo</label>
                </div>
                
                
            <!-- BOTAO CADASTRAR -->
                <button class=" btn_cadastra btn btn-lg btn-primary btn-block text-uppercase "  type="button" id="btn_cadastra" style="border-color:#828282;background-color:#828282;">Cadastrar</button>
            </form>
                <div id = "status"></div>

                </div>
    </body>
</html>