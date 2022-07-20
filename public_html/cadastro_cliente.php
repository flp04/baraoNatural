<?php
/*
session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.html');
    echo "deslogado";
}
$usuario = $_SESSION['usuario'];
//conexão
include('conexao_mysqli.php');

//busca do nome do usuario no banco

$sql = "SELECT * FROM usuarios WHERE email='$usuario';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        $cod_usuario = $row['cod_usuario'];}
    }
*/
    include('usuario.php');    
    include('header.php');
?>


<div class="container" id="form_cadastro_cliente">
    <form  class="row g-3" action="cliente.php" method="POST">
        <h3>Cadastro Cliente</h3>
        <div class="col-md-6">
            <input type="hidden" name="cod_usuario" value=<?php echo $usuario->cod_usuario; ?>>
            <label for="inputNome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome" required>
        </div>
        <div class="col-md-6">
            <label for="inputSobrenome" class="form-label">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" id="inputSobrenome">
        </div>
        <div class="col-md-6">
            <label for="inputDataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" id="inputDataNascimento" aria-describedby="dataHelp">
        <div id="dataHelp" class="form-text">Perguntar somente dia e mês.</div>
        </div>
        <div class="col-md-6">
            <label for="inputContato" class="form-label">Contato</label>
            <input type="number" name="contato" class="form-control" id="inputContato" placeholder="DDD + Número" required>
        </div>
        <!--ENDEREÇO (MELHORAR)-->
        <div class="col-7">
            <label for="inputEndereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Colocar somente o nome da rua, avenida, praça, alameda..." required>
        </div>
        <div class="col-2">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="number" name="numero" class="form-control" id="inputNumero" required>
        </div>
        <div class="col-3">
            <label for="inputComplemento" class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Casa/Apartamento">
        </div>
        <div class="col-md-5">
            <label for="inputBairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="inputBairro" required>
        </div>
        <div class="col-md-4">
            <label for="inputCidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="inputCidade" required>
        </div>
        <div class="col-md-3">
            <label for="inputCEP" class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" id="inputCEP" placeholder="00000-000" required>
        </div>
        <div class="col-md-12">
            <label for="Taxa de Entrega" class="form-label">Taxa de Entrega</label>
            <input type="number" name="taxa_entrega" class="form-control" id="inputCEP" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="formControlTextarea" class="form-label">Observações</label>
            <textarea class="form-control" name="observacoes" id="exampleFormControlTextarea1" rows="2" placeholder="Caso o cliente queira informar algum ponto de referência ou observação"></textarea>
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
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
</div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
        integrity="sha384-SR1s2tW1dK7uaPingw4N9bXE4s1ZqAwSTkPPENzswTNFaQU1RDvt3wT4gWFG"  
        crossorigin="anonymous">    
    </script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>