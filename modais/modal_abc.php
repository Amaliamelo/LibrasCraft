<div class="modal fade" id="modal-abc"> <!-- CONTEUDO MODAL ABC -->
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="card-body">
                <h4 class="card-title text-center"style="color:#828282;">Bem-vindo(a) ao Nível 1!</h4>
                <h5 class="text-center"style="color:#828282;">Escolha por onde começar</h5>

                <br />
                <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" style="background-color:#828282;" type="submit" onclick = "location.href='./ABC/parametros_libras.php'"> 5 Parametros da Libras</button>
                <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" style="background-color:#828282;" type="submit" onclick = "location.href='./ABC/submapa_abc.php'"> Introdução </button>
                <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" style="background-color:#828282;" type="submit" onclick = "location.href='./ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=7'">Atividades Numeros</button>
                <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" style="background-color:#828282;" type="submit" onclick = "location.href='./ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=8'">Atividades Letras</button>
                <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" style="background-color:#828282;" type="submit" onclick = "location.href='./ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=9'">Atividades Pronomes</button>
                <button class="btn btn-lg btn-google btn-block text-uppercase btn-secondary" style="background-color:#828282;" type="submit" onclick = "location.href='./ATIVIDADES/atividade_<?php echo $_SESSION['condicao_auditiva'];?>.php?pagina=10'">Atividades Verbos</button>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           </div>
         </div>
     </div>
 </div>
