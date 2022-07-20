<?php
    include('conexao_mysqli.php');
    
    $cod_usuario = $_POST['cod_usuario'];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $data_nascimento = $_POST["data_nascimento"];
    $funcao = $_POST["funcao"];
    $email = $_POST["email"];
    $contato = $_POST["contato"];
    $senha = $_POST["senha"];
    $data_criacao = $_POST['data_criacao'];
    
    echo $sobrenome;
    
    $query = mysqli_query($conn, "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', data_nascimento='$data_nascimento', funcao='$funcao', email='$email', contato='$contato'WHERE cod_usuario='$cod_usuario'");
    if($query){
            echo "Usuario salvo";
        }else{
            echo "não cadastrado";
            echo $usuario;
        }
?>