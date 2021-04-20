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
    <script>
       $(document).ready(function(){
        $("#logar").click(function(){ // para criptografar a senha
            senha_md5=$.md5($("#senha").val());//pega a senha e codifica para a variavel md5
            $("#senha").val(senha_md5); // muda o valor da senha para md5(32 caracteres)
            console.log(senha_md5);
            $("#form_login").submit(); 
        })
       });

       

    </script>
    <body>
        <form method ="POST" action="validacao.php" id="form_login">
        <div class="container">
            <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:-80px;">
                <div class="card card-signin my-5" style="border-color:#828282;">
                <?php
       
                if(isset($_GET["sessao"])){
                    echo "<div style='background-color:red;color:white;'>Sua autenticação expirou. Refaça o login!</div>";
                }
                
                ?>

                <div class="card-body">
                    <h5 class="card-title text-center"style="color:#828282;">Bem-vindo(a) ao LibrasCraft!</h5>
                    <form class="form-signin">
                    <div class="form-label-group" style="color:#828282;">
                        <input type="email" id="email" class="form-control text-danger" name = "email" placeholder="Email" required autofocus>
                        <label for="inputEmail">Endereço de email</label>
                    </div>

                    <div class="form-label-group" style="color:#828282;">
                        <input type="password" id="senha" class="form-control text-danger" name="senha" placeholder="Senha" required>
                        <label for="inputPassword">Senha</label>
                    </div>

                    
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" id="logar" style="border-color:#828282;background-color:#828282;" type="button">Entrar</button>
                    <hr class="my-4">
                    <div class= "" style="color:#828282; text-align:center;"><label for="cadastras ">Ainda não é cadastrado? Cadastre-se já!</label></div>
                    <button class="btn btn-lg btn-google btn-block text-uppercase" style="border-color:#828282;background-color:#828282;color:white;" type="button" onclick = "location.href='form_cadastro_usuario.php'"><i class="fab fa-google mr-2"></i> Cadastrar-se</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>