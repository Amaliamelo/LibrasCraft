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
	console.log(frase_id);
	console.log(frase_texto);
});
$("#verbo_frase").change(function(){
    frase_id[1]=$("select[name='verbo_frase']").val();
    frase_texto[1]= $("#verbo_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
	console.log(frase_id);
	console.log(frase_texto);
});
$("#palavra_frase").change(function(){
    frase_id[2]=$("select[name='palavra_frase']").val();
    frase_texto[2]= $("#palavra_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
	console.log(frase_id);
	console.log(frase_texto);


});


//CADASTRA FRASE ------------------------------------------------
$(".btn_cadastra_frase").click(function(){
	var subfase=$("#subfase_frase").val();
	var frase=$("input[name='frase']").val();
	var video_frase=$("input[name='video_sinal_frase']").val();
	console.log(subfase);
	console.log(frase);
	console.log(video_frase);


	$.post("insere_frase.php", {subfase:subfase, frase:frase, video_frase:video_frase}, function(dados){
		console.log(dados);
		if(dados==1)
		{	
			$.post("carrega_frase.php",{frase:frase}, function(d){
				console.log(d);
				cod_frase = d[0].id_frase;

				for(i=0;i<frase_id.length;i++){
					cod_palavra=frase_id[i];

					if(cod_palavra!=""){
					console.log(cod_palavra);
					$.post("insere_frase_palavra.php", {cod_frase:cod_frase, cod_palavra:cod_palavra}, function(f){
						console.log(f);
						if(f==1){
							$("#status").html("FRASE CADASTRADA COM SUCESSO!")
							$("#status").css("color","green");
							$("#status").css("text-align","center");
							setTimeout(function(){ 
								jQuery('#close')[0].click();
								$(".msg_cad").html("")
							}, 20000);
						}
						else{
							$("#status").html("ERRO AO CADASTRAR")
							$("#status").css("color","red");
							$("#status").css("text-align","center");
							setTimeout(function(){ 
								jQuery('#fechar')[0].click();
								$(".msg_cad").html("")
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

});