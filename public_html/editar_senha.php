<?php
    include('conexao_mysqli.php');
    
    $cod_usuario = $_POST['cod_usuario'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST["confirmar_senha"];
    
    if($senha===$confirmar_senha){
        $query = mysqli_query($conn, "UPDATE usuarios SET senha='$senha' WHERE cod_usuario=$cod_usuario");
        if($query){
                include("header.php");
                echo "Senha do $cod_usuario alterada";
        }else{
                
                echo "Senha não alterada";
        }
    }else{
        include('header.php');
        echo"Senhas não conferem";
    }    
?>