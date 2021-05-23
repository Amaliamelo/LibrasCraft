$(document).ready(function(){

    $("#logar").click(function() {
        var senha= $("input[name='senha_login']").val();      
        senha = $.md5(senha);
		$("input[name='senha_login']").val(senha);

		var dados = {"email":$("input[name='email_login']").val(),
					"senha":$("input[name='senha_login']").val()
				};
        
		$.post("autenticacao_adm.php", dados, function(retorno){
			if( retorno == "0"){
				window.location.href ="index.php";
			}
			else{
				$(".msg").html("CREDENCIAIS INVÁLIDAS!")
				$(".msg").css("color","RED");
				$(".msg").css("text-align","center");
				setTimeout(function(){ 
					$(".msg_cad").html("")
				}, 3000);
				$(".autenticar").val("autenticando...");
			}
		});	
		$("#logar").val("Logando...");
	});
	
	$("#fase").change(function(){	 
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
