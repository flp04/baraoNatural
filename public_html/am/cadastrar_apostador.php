<?php
    include("conexao_mysqli.php");
    
    //pegar dados do formulario
    $id_apostador = $_POST['id_apostador'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $whats = $_POST['whats'];
    //verificar senha
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];
    if($senha===$confirmar_senha){
        $senha = md5($senha);
        //atualizar cadastro
        $query = mysqli_query($conn, "UPDATE apostadores SET nome='$nome', sobrenome='$sobrenome', data_nascimento='$data_nascimento', time='$time', email='$email', whats='$whats', senha='$senha' WHERE id_apostador='$id_apostador';");
        if($query){
            //realizar apostas
            //echo "Cadastro atualizado";
            header("Location:cadastro_aposta.php");
        }else{
            echo "Cadastro não realizado";
        }    
    }else{
        echo "Senhas não conferem.";
        echo "<br>";
        echo "<a href='index.html'>Voltar ao início</a>";
    }
    
    
?>