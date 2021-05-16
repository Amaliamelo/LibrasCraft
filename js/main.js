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

	$("#cadastrar").click(function(){  
		var senha_cad = $.md5($("input[name='senha_cad']").val());
		$("input[name='senha_cad']").val(senha_cad);

		var cadastro = {"email_cad":$("input[name='email_cad']").val(),
						"nome":$("input[name='nome']").val(),
						"senha_cad":$("input[name='senha_cad']").val(),
						"data_nascimento":$("input[name='data_nascimento']").val(),
						"sexo":$("input[name='sexo']:checked").val(),
						"condicao_auditiva":$("input[name='condicao_auditiva']:checked").val()
						};

		$.post("cadastro_usuario.php", cadastro, function(resultado){
			console.log(resultado);
			
			if(resultado==1){
				$(".msg_cad").html("USUÁRIO CADASTRADO COM SUCESSO!")
				$(".msg_cad").css("color","green");
				$(".msg_cad").css("text-align","center");
				jQuery('#limpar')[0].click();
				setTimeout(function(){ 
					jQuery('#fechar')[0].click();
					$(".msg_cad").html("")
				}, 2000);
				setTimeout(function(){ 
					jQuery('#log')[0].click();
				}, 3000);
				
			}if(resultado==2){
				$(".msg_cad").html("EMAIL JÁ CADASTRADO!")
				$(".msg_cad").css("color","RED");
				$(".msg_cad").css("text-align","center");
				setTimeout(function(){ 
					$(".msg_cad").html("")
				}, 3000);
			}
			else{
				$(".msg_cad").html("PREENCHA TODOS OS CAMPOS!")
				$(".msg_cad").css("color","red");
				$(".msg_cad").css("text-align","center");
				setTimeout(function(){ 
					$(".msg_cad").html("")
				}, 3000);
			}
		});	
		$("#cadastrar").val("Autenticando...");
	});

   
});