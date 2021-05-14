$(document).ready(function(){

    $("#logar").click(function() {
        var senha= $("input[name='senha_login']").val();      
        senha = $.md5(senha);
		$("input[name='senha_login']").val(senha);

		var dados = {"email":$("input[name='email_login']").val(),
					"senha":$("input[name='senha_login']").val()
				};
        
                
		$.post("autenticacao.php", dados, function(retorno){
            console.log(retorno);
			if( retorno == "0"){
				window.location.href ="index.php";
			}
			else{
				$(".msg").html('<div id="erro" class="alert alert-danger col-6 text-center" role="alert">Credenciais Inválidas</div>');
				$(".autenticar").val("autenticando...");
			}
		});	
		$("#logar").val("Logando...");
	});

   
});