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
    $cod_cliente = $_SESSION['cod_cliente'];
    
    $sql = "SELECT * FROM clientes WHERE cod_cliente='$cod_cliente';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            $nome = $row['nome'];
            $sobrenome = $row["sobrenome"];
            $data_nascimento = $row["data_nascimento"];
            $contato = $row["contato"];
            $endereco = $row["endereco"];
            $numero = $row["numero"];
            $complemento = $row["complemento"];
            $cidade = $row["cidade"];
            $bairro = $row["bairro"];
            $cep = $row["cep"];
            $observacoes = $row["observacoes"];
            $data_criacao = $row['data_criacao'];
        }
    }
    include("header.php");
?>

    <br><br>
    <div class="container" id="form_cliente">
        <form  class="row g-3" action="editar_cliente.php" method="POST">
            <div class="col-md-6">
                <label for="inputCodCliente" class="form-label">Código do Cliente</label>
                <input type="number" class="form-control" id="inputCodCliente" value="<?php echo $cod_cliente ?>" disabled="disabled">
                <input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputDataCriacao" class="form-label">Data de Criação</label>
                <input type="text" class="form-control" id="inputDataCriacao" value="<?php echo $data_criacao ?>" disabled="disabled">
                <input type="hidden" name="data_criacao" value="<?php echo $data_criacao; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputNome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="inputNome" value="<?php echo $nome ?>">
            </div>
            <div class="col-md-6">
                <label for="inputSobrenome" class="form-label">Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control" id="inputSobrenome" value="<?php echo $sobrenome ?>">
            </div>
            <div class="col-md-6">
                <label for="inputDataNascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" id="inputDataNascimento" value="<?php echo $data_nascimento ?>">
            </div>
            <div class="col-md-6">
                <label for="inputContato" class="form-label">Contato</label>
                <input type="number" name="contato" class="form-control" id="inputContato" value="<?php echo $contato ?>">
            </div>
    
            <!--ENDEREÇO (MELHORAR)-->
            <div class="col-7">
                <label for="inputEndereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="inputEndereco" value="<?php echo $endereco ?>">
            </div>
            <div class="col-2">
                <label for="inputNumero" class="form-label">Número</label>
                <input type="number" name="numero" class="form-control" id="inputNumero"  value="<?php echo $numero ?>">
            </div>
            <div class="col-3">
                <label for="inputComplemento" class="form-label">Complemento</label>
                <input type="text" name="complemento" class="form-control" id="inputComplemento" value="<?php echo $complemento ?>">
            </div>
            <div class="col-md-5">
                <label for="inputBairro" class="form-label">Bairro</label>
                <input type="text" name="bairro" class="form-control" id="inputBairro" value="<?php echo $bairro ?>">
            </div>
            <div class="col-md-4">
                <label for="inputCidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="inputCidade" value="<?php echo $cidade ?>">
            </div>
            <div class="col-md-3">
                <label for="inputCEP" class="form-label">CEP</label>
                <input type="text" name="cep" class="form-control" id="inputCEP" value="<?php echo $cep ?>">
            </div>
            <div class="mb-3">
                <label for="formControlTextarea" class="form-label">Observações</label>
                <input type="text" class="form-control" id="inputObservacoes" name='observacoes' value="<?php echo $observacoes ?>"></textarea>
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
            -->
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
                </form>
            </div>
            <!-- Optional JavaScript; choose one of the two! -->
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script 
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
            integrity="sha384-SR1s1pwaRoyd8WybyLKaVCaWYACX7D1EynNzswTNFaQU1RDvt3wT4gWFG"  
            crossorigin="anonymous">    
        </script>
        <script src="js/bootstrap.min.js"></script>
    
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        -->
      </body>
    </html>