<?php
    $host = "localhost";
    $user = "root";
    $senha = "";
    $database = "barao_natural";

    $conn = mysqli_connect($host, $user, $senha, $database);

    mysqli_set_charset($conn, 'utf8');
    if($conn->connect_error){
        die("Falha ao realizar a conexão: ". $conn->connect_error);
    }else{
        //echo "Conectoooou";
    }
?>