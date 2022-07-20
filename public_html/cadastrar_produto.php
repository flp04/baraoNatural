<?php
    //conecta no banco de dados
    include("conexao_mysqli.php");
    //inicia sessão e pega o código do usuario ativo
    session_start();
    $usuario_criou = $_SESSION['cod_usuario'];
    //pega os dados do formulario
    $categoria = $_POST['categoria'];
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    //insere no banco de dados
    $query = mysqli_query($conn, "INSERT INTO produtos (categoria, nome, descricao, valor, usuario_criou) 
        VALUES ('$categoria', '$nome', '$descricao', '$valor', '$usuario_criou')");
    if($query){
        //include("Location:header.php");
        echo "Produto cadastrado";
    }else{
        echo "Produto não cadastrado";
        echo "$nome $descricao $valor $usuario_criou";
    }
?>