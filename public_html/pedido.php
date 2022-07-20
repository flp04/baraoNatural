<?php

session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.html');
    echo "deslogado";
}
$usuario = $_SESSION['usuario'];

//conexão
include("conexao_mysqli.php");

$pedido = $_SESSION['carrinho'];
unset($_SESSION['carrinho']);
$cod_cliente = $_SESSION['cod_cliente'];
$sql = "SELECT * FROM clientes WHERE cod_cliente='$cod_cliente';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        $nome = $row['nome'];
        $sobrenome = $row["sobrenome"];
        //$data_nascimento = $row["data_nascimento"];
        $contato = $row["contato"];
        $endereco = $row["endereco"];
        $numero = $row["numero"];
        $complemento = $row["complemento"];
        $cidade = $row["cidade"];
        $bairro = $row["bairro"];
        $cep = $row["cep"];
        $taxa_entrega = $row['taxa_entrega'];
        //$observacoes = $row["observacoes"];
        //$data_criacao = $row['data_criacao'];
    }
}

include("header.php");
?>
<br><br>
<div class="container" id="form_cliente">
    <form  class="row g-3" action="cliente_editavel.php" method="POST">
        <?php echo "<h3>$nome $sobrenome</h3>";?>
        <div class="col-md-12">
            <?php
                $total = 0;
                $sql = "SELECT cod_pedido FROM pedidos order by cod_pedido DESC limit 1;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){                            
                        $cod_pedido = $_SESSION["cod_pedido"];
                        echo "<label for='inputCodCliente' class='form-label'>Pedido $cod_pedido</label>";
                    }
                } 
                foreach($pedido as $car){
                    $categoria = $car['categoria'];
                    $quantidade = $car['quantidade'];
                    $produto = $car['produto'];
                    $valor = $car['valor'];
                    $subtotal = $car['valor']*$car['quantidade'];
                    $total += $subtotal;
                    echo "<p>=> $quantidade $categoria $produto > $subtotal</p>";
                    $query = mysqli_query($conn, "INSERT INTO pedidos (cod_pedido, produto, cod_cliente, quantidade, subtotal, usuario_criou)
                    VALUES ('$cod_pedido', '$produto', '$cod_cliente', '$quantidade', '$subtotal', '$usuario')");
                        if($query){
                        //echo "yeah";
                    }
                }
            ?>
        </div>
        <div class="col-md-6">
            <p>Contato: <?php echo $contato ?></p>
        </div>
        <!--ENDEREÇO (MELHORAR)-->
        <div class="col-12">
            <p>Endereço: <?php echo "$endereco, $numero" ?></p>
        </div>
        <!--
        <div class="col-2">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="number" class="form-control" id="inputNumero"  value="<?php echo $numero ?>" disabled="disabled">
            <input type="hidden" name="numero" value="<?php echo $numero ?>">
        </div>
            -->
        <div class="col-3">
            <p>Complemento: <?php echo $complemento ?></p>
        </div>
        <div class="col-md-5">
            <p>Bairro: <?php echo $bairro ?></p>
        </div>
        <div class="col-md-4">
            <p>Cidade: <?php echo $cidade ?></p>
        </div>
        <div class="col-md-3">
            <p>CEP: <?php echo $cep ?></p>
        </div>
        <div class="col-md-12">
                <p>Taxa de Entrega: <?php echo $taxa_entrega ?></p>
        </div>
        <div class="col-md-12">
            <p>Total: <?php echo $total+$taxa_entrega ?></p>
        </div>
        
        <!--
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Check me out
            </label>
            </div>
        </div>
        
        
        <div class="col-2">
            <button type="submit" name ="action" value="editar_cliente" class="btn btn-primary">Editar</button>
        </div>
        <div class="col-2">
            <button type="submit" name="action" value="fazer_pedido" class="btn btn-primary">Fazer Pedido</button>
        </div>
    </form>
</div>
        -->
        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
        integrity="sha384-SR1s1pwaRoyd8WybyLKaVCaWYACX7D1EynNzswTNFaQU1RDvt3wT4gWFG"  
        crossorigin="anonymous">    
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script>print()</script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>