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
	
function carrega_subfase(){	 
		cod_fase=$("select[name='cod_fase']").val();
		console.log(cod_fase);

		//chega aqui com o id certo
		$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
			if(dados!=null)
			{
				$("#subfase").html("<option selected value='0'>Subfase</option>"); //select vazio
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
			filtro_palavra();

		});
}
	
//CADASTRAR PALAVRA -------------------------------------------------------
$(".btn_cadastra").click(function(){
	// form = new FormData();         
	// form.append('figura',$("input[name='figura']").val()); // para apenas 1 arquivo
	subnivel=$("select[name='cod_subfase']").val();
	palavra=$("input[name='palavra']").val();
	video_sinal=$("input[name='video_sinal']").val();
	$.post("insere_palavra.php", {"subnivel":subnivel, "palavra":palavra, "video_sinal":video_sinal }, function(data){
		
		console.log(data);
		if(data==1)
		{
			
			$("#status").html("PALAVRA CADASTRADO COM SUCESSO!")
			$("#status").css("color","green");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".msg_cad").html("")
			}, 20000);
		}
		else
		{
			$("#status").html("ERRO AO CADASTRAR")
			$("#status").css("color","red");
			$("#status").css("text-align","center");
		}
		
	});
});



//PALAVRAS CADASTRADAS -------------------------------------------------
function tabela_palavras_cadatradas(matriz){
	$("#tb").html("");
	if(matriz==null){
		linha = "<tr>";
		linha += "<td colspan='6' class='text-center'>Não há palavras cadastradas</td>";
		linha += "</tr>";
		$("#tb").append(linha); 
	}
	else{
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'cod_fase'>" + matriz[i].nome_fase + "</td>";
			linha += "<td class = 'cod_subfase'>" + matriz[i].nome_subfase + "</td>";
			linha += "<td class = 'cod_palavra'>" + matriz[i].palavra + "</td>";
			
			linha += "<td class = 'video_s'>" + matriz[i].video_sinal + "</td>";
			
			linha += "<td>";

            linha += "<button value='"+matriz[i].id_palavra+"' type='button' class='alterar_palavra' data-toggle='modal' data-target='#alterar' style='margin-right:10px;'><img src='img/altera.png'  height='20' width='20'></button>";
            linha += "<button value='"+matriz[i].id_palavra+"' type='button' class='remover_palavra' data-toggle='modal' data-target='#remover'><img src='img/remove.png'  height='20' width='15'></button>";
            linha += "</td>";
			$("#tb").append(linha); 
		}
	}
	
}
//REMOVER PALAVRA

	$(document).on('click', '.remover_palavra', function (event) {
		i=$(this).val();
		console.log(i);
	
		$("#confirmar_remover").click(function(){
			console.log(i);
			c="id_palavra";
			t="palavra";
			remover(i,c,t);
		});
		
	});


// REMOVER --------------------------------------------------------
function remover(i, c, t){
		console.log(i);
		console.log(c);
		console.log(t);

		$.post("remove.php", {tabela:t, coluna:c, id:i }, function(data){
			console.log(data);

			if(data == "1"){
				$("#status").html("PALAVRA REMOVIDA!")
				$("#status").css("color","green");
				$("#status").css("text-align","center");
				$(".close").click();
				location.reload();
			}else{
				$("#status").html("ERRO AO REMOVER")
				$("#status").css("color","red");
				$("#status").css("text-align","center");
				$(".close").click();
			}
		});
}

//ALTERAR PALAVRA---------------------------------------------------------
$(document).on('click', '.alterar_palavra', function (event) {
	i=$(this).val();
	console.log(i);
	aux=0;
	$.post("seleciona.php", {aux:aux, id:i }, function(r){
		$("select[name='cod_subfase']").val(r.cod_subfase);
		$("input[name='palavra']").val(r.palavra);
		$("input[name='video_sinal']").val(r.video_sinal);
	});

	$("#confirmar_alterar").click(function(){
		console.log(i);
		c="id_palavra";
		t="palavra";
		remover(i,c,t);
	});
	
});


// REMOVER 
function remover(i, c, t){
	console.log(i);
	console.log(c);
	console.log(t);

	$.post("remove.php", {tabela:t, coluna:c, id:i }, function(data){
		console.log(data);

		if(data == "1"){
			$("#status").html("PALAVRA REMOVIDA!")
			$("#status").css("color","green");
			$("#status").css("text-align","center");
			$(".close").click();
			location.reload();
		}else{
			$("#status").html("ERRO AO REMOVER")
			$("#status").css("color","red");
			$("#status").css("text-align","center");
			$(".close").click();
		}
	});
m
}


//FILTRO PALAVRA ...................................................................................
$("input[name='nome_filtro']").keyup(function(){
	filtro_palavra();
});
$("select[name='cod_fase']").change(function(){
	carrega_subfase();
});
$("select[name='cod_fase_frase']").change(function(){
	cod_fase=$("select[name='cod_fase_frase']").val();
	console.log(cod_fase);

	$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
		if(dados!=null)
		{
			$("#subfase_frase").html("<option selected value='0'>Subfase</option>"); //select vazio
			for(i=0;i<dados.length;i++) 
			{
				atual = $("#subfase_frase").html(); // recebe o valor do subfase
				option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
				$("#subfase_frase").html(atual+option);
			}
			
		}else
		{
			$("#status").html("ERRO");
			$("#status").css("color","red");
			$("#status").css("text-align","center");
		}
		filtro_palavra();

	});
});
$("select[name='cod_subfase']").change(function(){
	filtro_palavra();
});
function filtro_palavra(){
	var nome_filtro=$("input[name='nome_filtro']").val();
	var fase=$("select[name='cod_fase']").val();
	var subfase=$("select[name='cod_subfase']").val();
	


	$.post("carrega_palavra.php", {nome_filtro:nome_filtro, fase:fase, subfase:subfase }, function(matriz){
		tabela_palavras_cadatradas(matriz);
	});
}

//FILTRO SUBFASE --------------------------------------------------------
$("select[name='cod_fase_subfase']").change(function(){
	var cod_fase=$("select[name='cod_fase_subfase']").val();
	console.log(cod_fase);
	$.post("carrega_subfase.php",{cod_fase:cod_fase}, function(matriz){
		$("#tb").html("");
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'cod_fase'>" + matriz[i].cod_fase + "</td>";
			linha += "<td class = 'nome'>" + matriz[i].nome + "</td>";
		            
            linha += "<td>";
            linha += "<a type='button' data-toggle='modal' data-target='#alterar' style='margin-right:10px;'><img src='img/altera.png'  height='20' width='20'></a>";
            linha += "<a type='button' data-toggle='modal' data-target='#remover'><img src='img/remove.png'  height='20' width='15'></a>";
            linha += "</td>";
			//linha += "<td><button type = 'button'  class = 'alterar btn btn-secondary' id='alterar' value='"+ matriz[i].id_palavra + "'>Alterar</button> <button type = 'button' class = 'remover btn btn-secondary' value ='" + matriz[i].id_palavra + "'>Remover</button> </td>";
			linha += "</tr>";
			$("#tb").append(linha); 
		}
	});

});
//CADASTRA SUBFASE ------------------------------------------------
$("#btn_cadastra_subfase").click(function(){
	var fase=$("select[name='fase_subfase']").val();
	var subfase=$("input[name='subfase']").val();
	console.log(fase);
	console.log(subfase);

	$.post("insere_subfase.php", {fase:fase, subfase:subfase}, function(dados){
		console.log(dados);
		if(dados==1)
		{			
			$("#status").html("SUBFASE CADASTRADO COM SUCESSO!")
			$("#status").css("color","green");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".msg_cad").html("")
			}, 20000);
		}
		else
		{
			$("#status").html("ERRO AO CADASTRAR")
			$("#status").css("color","red");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".msg_cad").html("")
			}, 20000);
		}

		
	});
});


//FILTRO FASE --------------------------------------------------------
$("select[name='cod_fase_fase']").change(function(){
	var cod_fase=$("select[name='cod_fase_fase']").val();
	
	$.post("carrega_fase.php",{cod_fase:cod_fase}, function(matriz){
		console.log(matriz);
		$("#tb").html("");
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'nome'>" + matriz[i].nome + "</td>";
		            
            linha += "<td>";
            linha += "<a type='button' data-toggle='modal' data-target='#alterar' style='margin-right:10px;'><img src='img/altera.png'  height='20' width='20'></a>";
            linha += "<a type='button' data-toggle='modal' data-target='#remover'><img src='img/remove.png'  height='20' width='15'></a>";
            linha += "</td>";
			//linha += "<td><button type = 'button'  class = 'alterar btn btn-secondary' id='alterar' value='"+ matriz[i].id_palavra + "'>Alterar</button> <button type = 'button' class = 'remover btn btn-secondary' value ='" + matriz[i].id_palavra + "'>Remover</button> </td>";
			linha += "</tr>";
			$("#tb").append(linha); 
		}
	});

});

//CADASTRA FASE ------------------------------------------------
$("#btn_cadastra_fase").click(function(){
	var fase=$("input[name='fase']").val();

	$.post("insere_fase.php", {fase:fase}, function(dados){
		if(dados==1)
		{			
			$("#status").html("FASE CADASTRADA COM SUCESSO!")
			$("#status").css("color","green");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".status").html("")
			}, 20000);
		}
		else
		{
			$("#status").html("ERRO AO CADASTRAR")
			$("#status").css("color","red");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".status").html("")
			}, 20000);
		}

		
	});
});

//CADASTRA FRASE ------------------------------------------------
$("#btn_cadastra_frase").click(function(){
	var palavra=$("select[name='cod_palavra']").val();
	var frase=$("input[name='frase']").val();
	var video_frase=$("input[name='video_sinal_frase']").val();

	$.post("insere_frase.php", {palavra:palavra, frase:frase, video_frase:video_frase}, function(dados){
		if(dados==1)
		{			
			$("#status").html("FRASE CADASTRADA COM SUCESSO!")
			$("#status").css("color","green");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".msg_cad").html("")
			}, 20000);
		}
		else
		{
			$("#status").html("ERRO AO CADASTRAR")
			$("#status").css("color","red");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('#fechar')[0].click();
				$(".msg_cad").html("")
			}, 20000);
		}

		
	});
});


});