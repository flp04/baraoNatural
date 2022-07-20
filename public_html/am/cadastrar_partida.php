
<?php
    include("conexao_mysqli.php");
    
    //pegar dados do formulario
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $equipe_a = $_POST['equipe_a'];
    $equipe_b = $_POST['equipe_b'];
    $local = $_POST['local'];
    
    //cadastrar partida
    $query = mysqli_query($conn, "INSERT INTO partidas (data, horario, equipe_a, equipe_b, local) 
    VALUES ('$data', '$horario', '$equipe_a', '$equipe_b', '$local')");
        if($query){;
            echo "Partida cadastrada";
        }else{
            echo "Partida não cadastrado";
        }
    
    
?>