<?php
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){

        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:index.html');
        echo "deslogado";
    }
    $usuario = $_SESSION['usuario'];
?>