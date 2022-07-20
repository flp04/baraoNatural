<?php

    //iniciar e verificar se há sessão ativa. se não houver direcionar pra html, se houver preencher o código do usuario
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){    
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location:index.html');
        echo "deslogado";
    }else{
        $cod_usuario = $_SESSION['cod_usuario'];
    }
    //verificar se não há carrinho ativo para criar instanciar caso haja
    if(!isset($_SESSION['carrinho'])==true){
        $carrinho = array();
        $_SESSION['carrinho'] = $carrinho;
        include('header.php');
    }else{
        include('header.php');
        $carrinho = $_SESSION['carrinho'];
        
    }
    /* PRECISA REATIVAR ESSA PARTE DO CÓDIGO PARA CASO NÃO HAJA PREENCHIMENTO
    //verifica se há código do cliente ativo
    if(isset($SESSION['cod_cliente'])==true){
        $cod_cliente = $SESSION['cod_cliente'];
    }else{
        //header("Location:index.php");
        echo "não achou";   
    }*/

    $cod_cliente = $_SESSION['cod_cliente'];
    //conecta ao banco de dados
    include("conexao_mysqli.php");    
?>

<div class="container" id="form_cadastro_pedido">
    <form  class="row g-3" action="carrinho.php" method="POST">
        <h3>Novo Pedido</h3>
        <div class="col-md-2">
            <label for="inputCodCliente" class="form-label">Código do Cliente</label>
            <input type="text" name="cod_cliente" value="<?php echo $cod_cliente ?>" class="form-control" id="inputCodCliente" disabled="disabled">
        </div>
        <div class="col-md-2">
            <label for="inputCategoria" class="form-label">Categoria</label>
            <select class="form-select" name="categoria" id="categoria">
                <option value='pizza'>Pizza</option>";
                <option value='esfiha'>Esfiha</option>";
            </select>
        </div>  
        <div class="col-md-4">
            <label for="inputProduto" class="form-label">Produto</label>
            <select class="form-select" name="produto" id="produto">
                <?php
                    $query = "SELECT * FROM produtos;";
                    $result = mysqli_query($conn, $query);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $cod_produto = $row['cod_produto'];
                            $produto_nome = $row['nome'];
                            $produto_valor = $row['valor'];
                            echo "<option value='$produto_nome'>$produto_nome R$$produto_valor, se esfiha R$7,50</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputProdutoDesconto" class="form-label">Desconto</label>
            <input type="number" name="produto_desconto" class="form-control" id="inputProdutoDesconto">
        </div>
        <div class="col-2">
            <label for="inputProdutoQuantidade" class="form-label">Quantidade</label>
            <input type="number" name="produto_quantidade" step="0.01" class="form-control" value="1" id="inputProdutoQuantidade" required>
            
                <input class="form-check-input" type="checkbox" value="" id="flexMeiaMeia">
                <label class="form-check-label" for="flexMeiaMeia">
                    Meia/Meia
                    
                </label>
            
        </div>

        <div class="btn-group" role="group" aria-label="Exemplo básico">
                    
            <button type="submit" name="action" value="adicionar" class="btn btn-primary">Adcionar</button>
            <button type="submit" name="action" value="excluir" class="btn btn-primary">Excluir</button>
            <button type="submit" name="action" value="limpar" class="btn btn-primary">Limpar Carrinho</button>
            <button type="submit" name="action" value="fazer_pedido" class="btn btn-primary">Fazer Pedido</button>
        </div>
        <select class="form-select" name="carrinho" multiple aria-label="multiple select example">
            <?php
                
                $carrinho = $_SESSION['carrinho'];
                
                foreach($carrinho as $car){
                /*
                    $query = "SELECT * FROM produtos WHERE cod_produto=$car;";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $cod_produto = $row['cod_produto'];
                        $produto_nome = $row['nome'];
                        $produto_valor = $row['valor'];
                        //echo "<option value='$cod_produto'>$nome_produto</option>";
                */
                $quantidade = $car['quantidade'];
                $categoria = $car['categoria'];
                $produto = $car['produto'];
                $valor = $car['valor'];
                $subtotal = $car['valor']*$car['quantidade'];

                        echo "<option value='$car'>$quantidade $categoria $produto => $subtotal</option>";
                                }
                            
                
                ?>
</select>
</div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
        integrity="sha384-SR1s47Wf627c4ySaySoV9KouTxUNPHUYmJENzswTNFaQU1RDvt3wT4gWFG"  
        crossorigin="anonymous">    
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script>
                        var c = document.getElementById("flexMeiaMeia");
                        var q = document.getElementById("inputProdutoQuantidade");
                        q.disabled;
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
