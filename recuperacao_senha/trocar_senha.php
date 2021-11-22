<?php
include "../ABC/cabecalho_abc.php";


        include '../conexao.php';
?>
<body class="bodyIndex">
        <div class="recupera_senha  w-25">
            <div class="card" >
                <div class="card-body">
                    <h5 class="modal-title" style="color:#828282; size:50px;">Recuperar senha:</h5>
<?php
        $email = $_POST["emailReset"]; 
        $password = $_POST["password"]; 

        $resultado = mysqli_query($conexao,"SELECT * FROM usuario WHERE email='$email'");
        $get = mysqli_fetch_assoc($resultado);
        $row = $resultado->num_rows;

    if ($row!="1") {
        echo "<span id=\"msgOne\">Dados incorretos.</span></br>
        <a href='r_senha.php' class='btn btn-secondary m-3'>Retornar</a>";
        return true;
    } else {
        $sendEmail = mysqli_query($conexao,"SELECT * FROM usuario WHERE email='$email'");
        $get =  mysqli_fetch_assoc($sendEmail);

        echo'<div id="resetSenha">Olá '.$get["nome"].', altere sua senha:</div>
        
        <form name="recupera" action="troca_de_senha.php" method="post">
            <input type="hidden" name="email"  value="'.$get["email"].'">
            </br>
            <div class="form-label-group">
                <input type="password" name="senha_alterar"  class="form-control m-2" placeholder = "Digite a senha..." class="form-group">
            </div>
                <button type="button" data-dismiss="modal" class="btn btn-secondary m-2" id="limpar">Cancelar</button>
                <button type="submit" class="btn btn-success m-2">Alterar</button>
        </form>';
    }
?>        
        </div>
    </div>
</div>
</body>
<?php include "../rodape.php";?>
