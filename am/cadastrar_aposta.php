<?php
    include("conexao_mysqli.php");
    
    //pegar dados do formulario
    
    $whats = $_POST['whats'];
    $sql = "SELECT * FROM apostadores WHERE whats='$whats';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id_apostador = $row['id_apostador'];
        }
    }
    
    $sql = "SELECT * FROM apostas WHERE id_apostador='$id_apostador';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $apostou = $row['apostou'];
        }
    }
    
    if($apostou===0){
        for($i=1;$i<9;$i++){
            $id_partida = $i;
            $placar_equipea = "placar_equipe_a_partida".$i;
            $placar_equipeb = "placar_equipe_b_partida".$i;
            $placar_equipe_a = $_POST[$placar_equipea];
            $placar_equipe_b = $_POST[$placar_equipeb];
            
            
            //$placar_equipe_a = $_POST["placar_equipe_a_partida1"];
            //$placar_equipe_b = $_POST["placar_equipe_b_partida1"];
            
            echo $placar_equipea;
            
            //cadastrar aposta
            $query = mysqli_query($conn, "UPDATE apostas SET placar_equipe_a='$placar_equipe_a', placar_equipe_b='$placar_equipe_b', apostou=1 WHERE id_apostador='$id_apostador' AND id_partida='$id_partida';");
                if($query){
                    
                    //registrar aposta
                    header("Location:aposta.php");
                    
                }
        }
    }else{
        echo "Você já apostou";
    }
    
    
    
    /*
    
    $query = mysqli_query($conn, "INSERT INTO apostas (id_apostador, id_aposta, placar_equipe_a, placar_equipe_b) 
    VALUES ('$id_apostador', '$id_aposta', '$placar_equipe_a', '$placar_equipe_b')");
        if($query){;
            header("Location:cadastro_aposta.php");
        }else{
            echo "Aposta não cadastrado";
        }
    */
    
    
?>