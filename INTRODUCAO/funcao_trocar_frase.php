<script>
    posicao = 0;
    <?php
        echo $vetor_palavra;
        echo $vetor_video;
    ?>
     function troca_palavra(acao) // PROXIMA LETRA
        {
            posicao= posicao + acao;
            if(posicao!=0) 
            {
                $("#anterior").show();
            }
            else
            {
                $("#anterior").hide();// ESCONDE BOTAO ANTERIOR
            }
            if(posicao<(palavras.length-1)) // tamanho do vetor
            {
                $("#proximo").show();
                $("#btn-modal-finalizar").hide(); // ESCONDE BOTAO FINALIZAR
            }
            else
            {
                $("#proximo").hide();// ESCONDE BOTAO PROXIMO
                $("#btn-modal-finalizar").show(); // MOSTRA BOTAO FINALIZAR
            }
			palavra=palavras[posicao];
			video=videos[posicao];
			

			$("#texto_palavra").html(""); 
			tr="<tr>"; 
				for(i=0;i<palavra.length;i++) {
					tr+="<th><div class='frase_letras'>"+palavra[i]+"</div></th>";
				}
			tr+="</tr>";
			
				
			$("#texto_palavra").html(tr);// muda o valor da tabela 
			palavra= palavra.toLowerCase(); // transforma palavra em minuscula
			palavra= palavra.normalize("NFD").replace(/[\u0300-\u036f]/g, ''); // transforma caracteres especiais de acentuação, tirando os acentos 	
			palavra= palavra.replace(" ","_"); // troca espaco por _
			palavra= palavra.replace(" ","_"); // troca espaco por _
			palavra= palavra.replace(" ","_"); // troca espaco por _
			
			link_img="../img/objetos/"+palavra+".png";
			link_video="https://www.youtube.com/embed/"+video;
			$("#img_palavra").attr("src",link_img);
			$("#link_video").attr("src",link_video);
		}
		$(document).ready(function(){
			$("#proximo").click(function(){
				troca_palavra(1);
			});

			$("#anterior").click(function(){
				troca_palavra(-1);
			});

			 // MODAL FINALIZAR ---------------------------------------------------------------------------------
			$("#btn-modal-finalizar").click(function(){
				$("#modal-mensagem-finalizar").modal();
			});
    	}); 
		
</script>