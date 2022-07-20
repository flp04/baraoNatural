<?php
include('conexao_mysqli.php');
$contato = $_POST['contato'];

    $sql = "SELECT * FROM clientes WHERE contato='$contato';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $cod_cliente = $row['cod_cliente'];
            $_SESSION['cod_cliente'] = $cod_cliente;
            header("Location:cliente.php?cod_cliente=$cod_cliente");
            echo $_SESSION['cod_cliente'];
        }
    }

?>