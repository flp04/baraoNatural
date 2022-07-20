<?php
//conexão
$host = "localhost";
$user = "u381868353_admin";
$senha = "@Admin!1";
$database = "u381868353_am";

$conn = mysqli_connect($host, $user, $senha, $database);

mysqli_set_charset($conn, 'utf8');
if($conn->connect_error){
    die("Falha ao realizar a conexão: ". $conn->connect_error);
}else{
    //echo "Conectoooou";
}
?>