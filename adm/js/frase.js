$(document).ready(function(){
    var frase_id = new Array();
    var frase_texto = new Array();
    var i=0;
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
    frase_texto[i] = $("#pronome_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
    i++;
});
$("#verbo_frase").change(function(){
    frase[1]=$("select[name='verbo_frase']").val();
    frase_texto[i]= $("#verbo_frase :selected").text();
    $("input[name='frase']").val(frase_texto);
    i++;
});
$("#palavra_frase").change(function(){
    frase[2]=$("select[name='palavra_frase']").val();
    frase_texto[i]= $("#palavra_frase :selected").text();
    $("input[name='frase']").val(frase_texto);


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