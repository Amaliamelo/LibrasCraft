<?php
    header("Content-type: application/json");
    include "../conexao.php";

    $subfase = $_POST["cod_subfase"];
    $id = $_POST["id_frase"];

    $select_palavra = "SELECT palavra, id_palavra FROM frase_palavra INNER JOIN palavra ON frase_palavra.cod_palavra=palavra.id_palavra 
                        AND palavra.cod_subfase='$subfase'
                        INNER JOIN frase on frase.id_frase=frase_palavra.cod_frase AND frase.id_frase='$id'";
    
    $resultado = mysqli_query($conexao,$select_palavra) or die(mysqli_error($conexao));

    
    while($linha3=mysqli_fetch_assoc($resultado))
    {
        $resultado_palavra[]=$linha3;
    }

    echo json_encode($resultado_palavra);
 
?>