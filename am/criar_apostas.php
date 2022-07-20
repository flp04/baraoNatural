<?php
    include("conexao_mysqli.php");

for($i=1; $i<9; $i++){
    
    //pegar dados do formulario
    $id_apostador = 9;
    $id_partida = $i;
    
    //cria aposta
    $query = mysqli_query($conn, "INSERT INTO apostas (id_apostador, id_partida) 
    VALUES ('$id_apostador', '$id_partida')");
        if($query){
            //header("Location:cadastro_aposta.php");
        
            "Apostas cadastradas";
        }else{
            echo "Aposta não cadastrado";
        }
}
    
    
?>