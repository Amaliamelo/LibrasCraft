$(document).ready(function(){
    var frase_id = new Array();
    var frase_texto = new Array();
//SELECT PALAVRA----------------------------------------------------
$("select[name='cod_subfase_frase']").change(function(){
	subfase=$("select[name='cod_subfase_frase']").val();
	fase=$("select[name='cod_fase_frase']").val();
	nome_filtro="";

	$.post("carrega_palavra.php", {"subfase":subfase, fase:fase, nome_filtro:nome_filtro}, function(dados){
		console.log(dados);

		if(dados!=null)
		{
			$("#palavra_frase").html("<option selected value='0'>Palavra</option>"); //select vazio
			for(i=0;i<dados.length;i++) 
			{
				atual = $("#palavra_frase").html(); // recebe o valor do subfase
				option="<option value='" + dados[i].id_palavra + "'>" + dados[i].palavra + "</option>"; 
				$("#palavra_frase").html(atual+option);
			}
			
		}else
		{
			$("#status").html("ERRO");
			$("#status").css("color","red");
			$("#status").css("text-align","center");
		}
	});

});
//SELECT SUBFASE ---------------------------------------------------------------------
$("select[name='cod_fase_frase']").change(function(){
	cod_fase=$("select[name='cod_fase_frase']").val();

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
	});
});


//INPUT FRASE----------------------------------------------------------------------
$("#pronome_frase").change(function(){
    frase_id[0]=$("select[name='pronome_frase']").val();
    frase_texto[0] = $("#pronome_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
	// console.log(frase_id);
	// console.log(frase_texto);
});
$("#verbo_frase").change(function(){
    frase_id[1]=$("select[name='verbo_frase']").val();
    frase_texto[1]= $("#verbo_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
	// console.log(frase_id);
	// console.log(frase_texto);
});
$("#palavra_frase").change(function(){
    frase_id[2]=$("select[name='palavra_frase']").val();
    frase_texto[2]= $("#palavra_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
	// console.log(frase_id);
	// console.log(frase_texto);


});


//CADASTRA FRASE ------------------------------------------------
$(".btn_cadastra_frase").click(function(){
	var subfase=$("#subfase_frase").val();
	var frase=$("input[name='frase']").val();
	var video_frase=$("input[name='video_sinal_frase']").val();
	// console.log(subfase);
	// console.log(frase);
	// console.log(video_frase);


	$.post("insere_frase.php", {subfase:subfase, frase:frase, video_frase:video_frase}, function(dados){
		// console.log(dados);
		if(dados==1)
		{	
			$.post("carrega_frase.php",{frase:frase}, function(d){
				// console.log(d);
				cod_frase = d[0].id_frase;


				for(i=0;i<frase_id.length;i++){

					if(frase_id[i]==undefined){
						cod_palavra=0;
					}
					else{
						cod_palavra=frase_id[i];
					}

					//console.log(cod_palavra);

					if(cod_palavra!=0){
						//console.log(cod_palavra);
						$.post("insere_frase_palavra.php", {cod_frase:cod_frase, cod_palavra:cod_palavra}, function(f){
							//console.log(f);
							if(f=="1"){
								$("#status_frase").html("FRASE CADASTRADA COM SUCESSO!")
								$("#status_frase").css("color","green");
								$("#status_frase").css("text-align","center");
								setTimeout(function(){ 
									jQuery('#close_frase')[0].click();
								}, 20000);
							}
							else{
								$("#status_frase").html("ERRO AO CADASTRAR")
								$("#status_frase").css("color","red");
								$("#status_frase").css("text-align","center");
								setTimeout(function(){ 
									jQuery('#close_frase')[0].click();
								}, 20000);
							}
						});
					}
					

				}
			});
			
			
			/*d_frase
			for(até 3){
				pega cod_palavra dentro do vetor frase_id
				grava no banco cod_palavra + id_frase 
			}*/
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


// CARREGA O SELECT SUBFASE DO FILTRO ----------------------------
function carrega_subfase_frase(){	 
	cod_fase=$("select[name='cod_fase']").val();

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
		filtro_frase();
		

	});
}


//FRASES CADASTRADAS -------------------------------------------------
function tabela_frases_cadatradas(matriz){
	$("#tb").html("");
	if(matriz==null){
		linha = "<tr>";
		linha += "<td colspan='6' class='text-center'>Não há frases cadastradas</td>";
		linha += "</tr>";
		$("#tb").append(linha); 
	}
	else{
		for (i=0;i<matriz.length;i++)
		{
			linha = "<tr>";
			linha += "<td class = 'cod_fase'>" + matriz[i].nome_fase + "</td>";
			linha += "<td class = 'cod_subfase'>" + matriz[i].nome_subfase + "</td>";
			linha += "<td class = 'cod_frase'>" + matriz[i].frase + "</td>";
			
			linha += "<td class = 'video_f'>" + matriz[i].video_frase + "</td>";
			
			linha += "<td>";

            linha += "<button value='"+matriz[i].id_frase+"' type='button' class='alterar_frase' data-toggle='modal' data-target='#alterar' style='margin-right:10px;'><img src='img/altera.png'  height='20' width='20'></button>";
            linha += "<button value='"+matriz[i].id_frase+"' type='button' class='remover_frase' data-toggle='modal' data-target='#remover'><img src='img/remove.png'  height='20' width='15'></button>";
            linha += "</td>";
			$("#tb").append(linha); 
		}
	}
	
}

//FILTRO FRASE ---------------------------------------------
$("input[name='nome_filtro_frase_filtro']").keyup(function(){
	filtro_frase();
});
$("select[name='cod_fase']").change(function(){
	carrega_subfase_frase();
	console.log("fase - frase_filtro");
});

$("select[name='cod_subfase']").change(function(){
	filtro_frase();
});
function filtro_frase(){
	
	var nome_filtro=$("input[name='nome_filtro_frase_filtro']").val();
	var fase=$("select[name='cod_fase']").val();
	var subfase=$("select[name='cod_subfase']").val();
	console.log(nome_filtro);
	console.log(fase);
	$.post("carrega_frase_filtro.php", {nome_filtro:nome_filtro, fase:fase, subfase:subfase }, function(matriz){
		console.log(matriz);
		tabela_frases_cadatradas(matriz);
	});
}

// AÇÃO - BOTÃO REMOVER FRASE --------------------------
$(document).on('click', '.remover_frase', function (event) {
	i=$(this).val();
	console.log(i);
	$("#confirmar_remover").click(function(){
		c="id_frase";
		t="frase";
		remover_frase(i,c,t);
	});
	
});
function remover_frase(i, c, t){
	$.post("remove.php", {tabela:t, coluna:c, id:i }, function(data){
		console.log(data);
		if(data == "1"){
			$("#status").html("FRASE REMOVIDA!")
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

// ALTERAR FRASE --------------------------------------------------------------------------------
$(document).on('click', '.alterar_frase', function () {
	i=$(this).val();
	c="id_frase";
	t="frase";
	aux=3;
	$.post("seleciona.php", {tabela:t, coluna:c, id:i }, function(r){
		a = r[0];
		$("input[name='frase_alterar']").val(a.frase);
		$("input[name='video_sinal_frase_alterar']").val(a.video_frase);
		$("input[name='id_frase_alterar']").val(a.id_frase);

		cod_subfase = a.cod_subfase;

		$.post("FRASES/carrega_fase_frase.php", {"cod_subfase":cod_subfase}, function(fase){

			$("#cod_fase_frase_alterar").val(fase[0].id_fase);

			cod_fase=fase[0].id_fase;
			$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
				if(dados!=null)
				{
					for(i=0;i<dados.length;i++) 
					{
						atual = $("#cod_subfase_frase_alterar").html(); // recebe o valor do subfase
						option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
						$("#cod_subfase_frase_alterar").html(atual+option);
					}
					$("#cod_subfase_frase_alterar").val(cod_subfase);
					
				}else
				{
					$("#status").html("ERRO");
					$("#status").css("color","red");
					$("#status").css("text-align","center");
				}
		
			});
			$("#cod_fase_frase_alterar").change(function(){
				cod_fase=$("select[name='cod_fase_frase_alterar']").val();

				$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
			
					if(dados!=null)
					{
						$("#cod_subfase_frase_alterar").html("<option selected value='0'>Subfase</option>"); //select vazio
						for(i=0;i<dados.length;i++) 
						{
							atual = $("#cod_subfase_frase_alterar").html(); // recebe o valor do subfase
							option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
							$("#cod_subfase_frase_alterar").html(atual+option);
						}
						
					}else
					{
						$("#status").html("ERRO");
						$("#status").css("color","red");
						$("#status").css("text-align","center");
					}

				});
			});
			/*$.post("FRASES/carrega_palavras_frase.php", {"id_frase":a.id_frase}, function(palavras){
						// select tabela frase_palavra -> pegar as palavras que compõem a frase
			});*/
		});
		
	});
	/*$("#confirmar_alterar").click(function(){
        atualizar = {
            fase:$("select[name='cod_fase_alterar']").val(),
            subfase:$("select[name='cod_subfase_alterar']").val(),
            palavra:$("input[name='palavra_alterar']").val(),
            video_sinal:$("input[name='video_sinal_alterar']").val(),
            id:$("input[name='id_palavra_alterar']").val(),
            aux:0
        };
    

    	$.post("alterar.php", {tabela:t, coluna:c, atualizar:atualizar}, function(r){
            $("#status").html("PALAVRA ALTERADA COM SUCESSO!");
			$("#status").css("color","green");
			$("#status").css("text-align","center");
			setTimeout(function(){ 
				jQuery('.close').click();
				$(".msg_cad").html("")
			}, 40000);
			location.reload();
        });
    });*/
	
});


});