<?php
    session_start();
    $carrinho = $_SESSION['carrinho'];
    array_push($carrinho, "abacate");
    echo $carrinho[2];
    $_SESSION['carrinho'] = $carrinho;
    echo "<a href='cadastro_pedido.php'>VOLTAR A PEDIR</a>"
?>