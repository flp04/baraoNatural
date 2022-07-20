<?php

    include("conexao_mysqli.php");
    session_start();

    $cod_usuario = $_SESSION['cod_usuario'];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $data_nascimento = $_POST["data_nascimento"];
    $contato = $_POST["contato"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $taxa_entrega = $_POST['taxa_entrega'];
    $observacoes = $_POST["observacoes"];
    $usuario_criou = $cod_usuario;

    $query = mysqli_query($conn, "INSERT INTO clientes (nome, sobrenome, data_nascimento, contato, endereco, numero, complemento, cidade, bairro, cep, taxa_entrega, observacoes, usuario_criou) 
        VALUES ('$nome', '$sobrenome', '$data_nascimento', '$contato', '$endereco', '$numero', '$complemento', '$cidade', '$bairro', '$cep', '$taxa_entrega', '$observacoes', '$usuario_criou')");

    if($query){;
        include("header.php");
        //header("Location: index.php?usuario=$usuario");
        echo "Cliente cadastrado";
    }else{
        echo "Cliente não cadastrado";
    }

?>