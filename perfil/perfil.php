<?php
       
        include "../ABC/cabecalho_abc.php";
        include "../conexao.php";
        include "../ABC/menu_abc.php";
?>
<main class="bodyscores" style="height: 100%; padding-bottom:19.5%;" >
	<div class="container" >
			<div class="row justify-content-center ">
				<div class="row-lg-12 row-md-6 card_atv">
						<div class="col bg-white p-2">
                            <div class="row  m-2">
                                <svg class="bd-placeholder-img rounded-circle" width="140" height="140" role="img">
                                <rect width="100%" height="100%" fill="#797"/>
                                <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                                </svg>
                            </div> 
                            <div class="row m-2">
                                <ul style="list-style: none;" id="perfil" >
                                    <li class="m-2"><i class="fas fa-user"></i> <?php echo $linha["nome"]?></li>
                                    <li class="m-2"><i class="fas fa-envelope"></i> <?php echo $linha["email"]?></li>
                                    <!--<li style="font-style:italic;"><?php //echo $linha["data_nascimento"]?></li>
                                    <li style="font-style:itali;">
                                        <?php
                                            if($linha["condicao_auditiva"] == "o"){
                                                //echo"ouvinte";
                                            }
                                            else{
                                                //echo"surdo";
                                            }
                                        ?>
                                    </li>   
                                    <li style="font-style:itali;"> 
                                        <?php
                                            if($linha["sexo"] == "f"){
                                                //echo"Feminino";
                                            }
                                            else{
                                                //echo"Masculino";
                                            }
                                        ?></li>
                                    <li>-->
                                        <button class="btn btn-outline-secondary alterar_perfil m-2" value="<?php echo $linha["id_usuario"];?>" data-toggle="modal"
                                                data-target="#modal_alterar_usuario">Alterar Dados</button>
                                        <button class="btn btn-outline-danger alterar_usuario m-2"  data-toggle="modal"
                                        data-target="#modal_remover_usuario">Excluir Conta   </button>
                                    </li>
                                </ul>
                            </div>
					    </div>
			    </div>
		    </div>
        </div>
<?php
    include "../modais/modal_alterar_usuario.php";
    include "../modais/modal_remover_usuario.php";
    include "../rodape.php";
?>