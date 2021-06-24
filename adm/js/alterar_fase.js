$(document).on('click', '.alterar_fase', function () {
	i=$(this).val();
	c="id_fase";
	t="fase";
    aux=1;
   
	$.post("seleciona.php", {tabela:t, coluna:c, id:i }, function(r){
		a = r[0];
        $("input[name='fase_alterar']").val(a.nome);
        $("input[name='id_fase_alterar']").val(a.id_fase);
        console.log(a.nome);
	});
	$("#confirmar_alterar").click(function(){
        atualizar = {
            fase:$("input[name='fase_alterar']").val(),
            id:$("input[name='id_fase_alterar']").val(),
            aux:1
        };
        console.log(atualizar);
    	$.post("alterar.php", {tabela:t, coluna:c, atualizar:atualizar}, function(r){
			if(r=="1"){
				$("#status").html("FASE ALTERADA COM SUCESSO!")
				$("#status").css("color","green");
				$("#status").css("text-align","center");
				setTimeout(function(){ 
					jQuery('#fechar')[0].click();
				}, 40000);
				location.reload();
			}else{
				$("#status").html("ERRO AO ALTERAR FASE")
				$("#status").css("color","red");
				$("#status").css("text-align","center");
			}
			
        });
    });
	
});
