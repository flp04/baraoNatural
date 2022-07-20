<?php
    include('conexao_mysqli.php');
    
    $cod_cliente = $_POST['cod_cliente'];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $data_nascimento = $_POST["data_nascimento"];
    $contato = $_POST["contato"];
    $endereco = $_POST["endereco"];
    $numero = $_POST['numero'];
    $complemento = $_POST["complemento"];
    $bairro = $_POST['bairro'];
    $cidade = $_POST["cidade"];
    $cep = $_POST['cep'];
    $observacoes = $_POST['observacoes'];
    
    
    $query = mysqli_query($conn, "UPDATE clientes SET nome='$nome', sobrenome='$sobrenome', data_nascimento='$data_nascimento', contato='$contato', endereco='$endereco', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', cep='$cep', observacoes='$observacoes' WHERE cod_cliente='$cod_cliente'");
    if($query){
            include("header.php");
            echo "Cadastro atualizado";
        }else{
            echo "não cadastrado";
            echo $usuario;
        }
?>