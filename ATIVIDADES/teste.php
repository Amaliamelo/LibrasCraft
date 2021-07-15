<?php
    //trazer palavras aleatorias --- surdo
    //trazer videos aleatorios --- ouvinte
    //3 opções de cada classe, uma sendo a correta

    <script>
	var palavras_usuario = new Array();
	var i=0;
	$(".resposta_frase").click(function(){
		valor_anterior=$("input[name='resposta']").val();
		$("input[name='resposta']").val(valor_anterior+ ' '+$(this).html());
		console.log(valor_anterior);
		$(this).prop('disabled',true);
		palavras_usuario[i]=$(this).val();
		i++;
		console.log(palavras_usuario);

	})
	$("input[name='limpar']").click(function(){
		$(".resposta_frase").prop('disabled',false);
		for(j=0;j<i;j++){
			palavras_usuario[j]= jQuery.grep(palavras_usuario, function(value) {
				return value != palavras_usuario[j];
			});
		}
		i=0;
		console.log(palavras_usuario);
	});
	$(".enviar_resposta_frase").click(function(){
		r=palavras_usuario;
		c = $("input[name='resposta_correta_frase']").val();
        sf = "<?php echo $_GET["pagina"];?>";
        post = {resposta:r, correto:c,subfase:sf};
		console.log(post);
        /*$.post("salva_resposta.php",post,function(r){
            if(r=="1"){					
                location.href='atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina='+sf;
            }
            else{
                console.log(r);
            }
        });*/
	});
</script>
?>