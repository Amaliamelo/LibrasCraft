$(document).on('click', '.alterar_subfase', function () {
	i=$(this).val();
	c="id_subfase";
	t="subfase";
    aux=2;
    
	$.post("seleciona.php", {tabela:t, coluna:c, id:i }, function(r){
		a = r[0];
        $("input[name='subfase_alterar']").val(a.nome);
		$("input[name='id_subfase_alterar']").val(a.id_subfase);
        
        cod_subfase = a.id_subfase;
		$.post("SUBFASES/carrega_fase_subfase.php", {"cod_subfase":cod_subfase}, function(fase){

            $("#fase_subfase_alterar").val(fase[0].id_fase);
            

			cod_fase=fase[0].id_fase;
			
		});
		
	});
	$("#confirmar_alterar").click(function(){
        atualizar = {
            fase:$("select[name='fase_subfase_alterar']").val(),
            subfase:$("input[name='subfase_alterar']").val(),
            id:$("input[name='id_subfase_alterar']").val(),
            aux:2
        };
    

    	$.post("alterar.php", {tabela:t, coluna:c, atualizar:atualizar}, function(r){
			if(r=="1"){
				$("#status").html("SUBFASE ALTERADA COM SUCESSO!")
				$("#status").css("color","green");
				$("#status").css("text-align","center");
				setTimeout(function(){ 
					jQuery('#fechar')[0].click();
				}, 40000);
				location.reload();
			}else{
				$("#status").html("ERRO AO ALTERAR SUBFASE")
				$("#status").css("color","RED");
				$("#status").css("text-align","center");
			}
			
        });
    });
	
});
