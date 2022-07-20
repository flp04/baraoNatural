<?php 
    session_start();
    $carrinho = $_SESSION['carrinho'];
    $produto = $_POST['produto'];
    array_push($carrinho, $produto);
    //echo $produto;
    unset($_SESSION['produto']);
    $_SESSION['carrinho'] = $carrinho;
    header("Location:cadastro_pedido_dd.php");
?>