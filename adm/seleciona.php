<?php 
    include "conexao.php";
    header('Content-Type: application/json');
    
    switch($POST["aux"]){

        case 0:
            $select = "SELECT * FROM palavra";
        
            if(isset($_POST["id"])){
                $id_palavra = $_POST["id"];
                $select = "SELECT * FROM palavra WHERE
                id_palavra='$id_palavra' ORDER BY palavra";
            }
            
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
        
            while($linha = mysqli_fetch_assoc($resultado)){
             $matriz[]=$linha;
            }
        
            echo json_encode($matriz);
        break;
       
    };
    
                    
    
    
?>