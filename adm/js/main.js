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
				$("input[name='email_login']").val("");
				$("input[name='senha_login']").val("");
				setTimeout(function(){ 
					$(".msg").html("")
				}, 3000);
				$(".autenticar").val("autenticando...");
			}
		});	
		$("#logar").val("Logando...");
	});
	
	$("#fase").change(function(){	 
		cod_fase=$("select[name='cod_fase']").val();
		//chega aqui com o id certo
		$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
			if(dados!=null)
			{
				$("#subfase").html("<option selected>Subfase</option>"); //select vazio
				for(i=0;i<dados.length;i++) 
				{
					atual = $("#subfase").html(); // recebe o valor do subfase
					option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
					$("#subfase").html(atual+option);
				}
				
			}else
			{
				$("#status").html("ERRO");
				$("#status").css("color","red");
				$("#status").css("text-align","center");
			}
		
		});
	}
	);
	
//PALAVRAS CADASTRADAS
function tabela_palavras_cadatradas(matriz){
	$("#tb").html("");
	for (i=0;i<matriz.length;i++)
	{
		linha = "<tr>";
		linha += "<td class = 'cod_fase'>" + matriz[i].cod_fase + "</td>";
		linha += "<td class = 'cod_subfase'>" + matriz[i].cod_subfase + "</td>";
		linha += "<td class = 'cod_palavra'>" + matriz[i].palavra + "</td>";
		
		linha += "<td class = 'video_s'>" + matriz[i].video_sinal + "</td>";
		
		linha += "<td><button type = 'button'  class = 'alterar btn btn-secondary' id='alterar' value='"+ matriz[i].id_palavra + "'>Alterar</button> <button type = 'button' class = 'remover btn btn-secondary' value ='" + matriz[i].id_palavra + "'>Remover</button> </td>";
		linha += "</tr>";
		$("#tb").append(linha); 
	}
}


//FILTRO PALAVRA ...................................................................................
$("input[name='nome_filtro']").change(function(){
	var nome_filtro=$("input[name='nome_filtro']").val();
	console.log(nome_filtro);
	$.post("carrega_palavra.php", {nome_filtro:"nome_filtro"}, function(matriz){
		console.log(matriz);
		tabela_palavras_cadatradas(matriz);
	});
});
$("select[name='cod_fase']").change(function(){
	var fase = $("select[name='cod_fase']").val();
	console.log(fase);
	$.post("carrega_palavra.php", {"fase":fase}, function(matriz){
		tabela_palavras_cadatradas(matriz);

	});
});
$("select[name='cod_subfase']").change(function(){
	var subfase = $("select[name='cod_subfase']").val();
	console.log(subfase);
	$.post("carrega_palavra.php", {"subfase":subfase}, function(matriz){
		tabela_palavras_cadatradas(matriz);

	});
});



});