<?php
    include("conexao_mysqli.php");
    
    //pegar dados do formulario
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $estadio = $_POST['estadio'];
    
    //atualizar cadastro
    $query = mysqli_query($conn, "INSERT INTO equipes (nome, apelido, estadio) VALUES ('$nome', '$apelido', '$estadio')");
        if($query){;
            echo "Equipe cadastrada";
        }else{
            echo "Equipe não cadastrado";
        }
    
    
?>