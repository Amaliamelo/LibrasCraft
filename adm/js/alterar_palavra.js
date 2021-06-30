$(document).on('click', '.alterar_palavra', function () {
	i=$(this).val();
	c="id_palavra";
	t="palavra";
	aux=0;
	$.post("seleciona.php", {tabela:t, coluna:c, id:i }, function(r){
		a = r[0];
		$("input[name='palavra_alterar']").val(a.palavra);
		$("input[name='video_sinal_alterar']").val(a.video_sinal);
		$("input[name='id_palavra_alterar']").val(a.id_palavra);

		cod_subfase = a.cod_subfase;

		$.post("PALAVRAS/carrega_fase.php", {"cod_subfase":cod_subfase}, function(fase){

			$("#fase_alterar").val(fase[0].id_fase);

			cod_fase=fase[0].id_fase;
			$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
				if(dados!=null)
				{
					for(i=0;i<dados.length;i++) 
					{
						atual = $("#subfase_alterar").html(); // recebe o valor do subfase
						option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
						$("#subfase_alterar").html(atual+option);
					}
					$("#subfase_alterar").val(cod_subfase);
					
				}else
				{
					$("#status").html("ERRO");
					$("#status").css("color","red");
					$("#status").css("text-align","center");
				}
		
			});
			$("#fase_alterar").change(function(){
				cod_fase=$("select[name='cod_fase_alterar']").val();

				$.post("carrega_subfase.php", {"cod_fase":cod_fase}, function(dados){
			
					if(dados!=null)
					{
						$("#subfase_alterar").html("<option selected value='0'>Subfase</option>"); //select vazio
						for(i=0;i<dados.length;i++) 
						{
							atual = $("#subfase_alterar").html(); // recebe o valor do subfase
							option="<option value='" + dados[i].id_subfase + "'>" + dados[i].nome + "</option>"; 
							$("#subfase_alterar").html(atual+option);
						}
						
					}else
					{
						$("#status").html("ERRO");
						$("#status").css("color","red");
						$("#status").css("text-align","center");
					}

				});
			});
		});
		
	});
	$("#confirmar_alterar").click(function(){
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
    });
	
});
