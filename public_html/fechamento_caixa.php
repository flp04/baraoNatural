<?php
    //pegar dados do formulario
    $data = $_POST['data'];
    include("conexao_mysqli.php");
    $pedidos = array();
    $total_dia = 0;
    $sql = "SELECT cod_pedido FROM pedidos WHERE DATE(data_criacao)='$data'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0){
        while($row = mysqli_fetch_assoc($result)){
            //$data = $row['DATE(data_criacao)'];
            $cod_pedido = $row['cod_pedido'];
            $pedidos[] = $cod_pedido;
            //echo $data;
        }
    }
    $pedidos = array_unique($pedidos);
    foreach($pedidos as $pedido){
        $total = 0;
        $sql = "SELECT subtotal FROM pedidos WHERE cod_pedido = '$pedido'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck>0){
            while($row = mysqli_fetch_assoc($result)){
                $subtotal = $row['subtotal'];
                $total += $subtotal;
                //echo $data;
            }
        }
        echo "Pedido $pedido: R$$total<br>";
        $total_dia += $total;
    }
    echo "Total do dia: R$$total_dia";
?>