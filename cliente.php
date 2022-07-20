<?php

    class Cliente{
        public $nome;
        public $sobrenome;
        public $data_nascimento;
        public $contato;
        public $endereco;
        public $numero;
        public $complemento;
        public $cidade;
        public $bairro;
        public $cep;
        public $taxa_entrega;
        public $observacoes;
        public $data_criacao;        

        public function __construct(){

        }

        public function novoCliente(){
            ?>
            <div class="container" id="form_cadastro_cliente">
                <form  class="row g-3" action="#" method="POST">
                    <h3>Cadastro Cliente</h3>
                    <div class="col-md-6">
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
                    <div id="dataHelp" class="form-text">Perguntar somente dia e mês</div>
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
            </form>
            </div>
            <?php
                
        }

        public function save(){
            include("conexao_mysqli.php");
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $data_nascimento = $_POST["data_nascimento"];
            $contato = $_POST["contato"];
            $endereco = $_POST["endereco"];
            $numero = $_POST["numero"];
            $complemento = $_POST["complemento"];
            $cidade = $_POST["cidade"];
            $bairro = $_POST["bairro"];
            $cep = $_POST["cep"];
            $taxa_entrega = $_POST['taxa_entrega'];
            $observacoes = $_POST["observacoes"];
            //verificar se já há o contato no cadastro
            $result = mysqli_query($conn, "SELECT * FROM clientes WHERE contato='$contato';");
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                //se sim, informar usuario já cadastrado
                echo "cliente já cadastrado";
            }else{
                //se não, cadastrar novo cliente no bd
                $query = mysqli_query($conn, "INSERT INTO clientes (nome, sobrenome, data_nascimento, contato, endereco, numero, complemento, cidade, bairro, cep, taxa_entrega, observacoes) 
                VALUES ('$nome', '$sobrenome', '$data_nascimento', '$contato', '$endereco', '$numero', '$complemento', '$cidade', '$bairro', '$cep', '$taxa_entrega', '$observacoes')");
                if($query){
                    echo "Cliente cadastrado";
                }else{
                    echo "Cliente não cadastrado";
                }
            }
        }
        public function setCliente($contato){
            //carregar conexão com bd
            include('conexao_mysqli.php');
            //verificar se há contato no bd
            $sql = "SELECT * FROM clientes WHERE contato='$contato';";
            $query = mysqli_query($conn, $sql);
            $cliente = mysqli_fetch_assoc($query);
            if(!$cliente){
                //se não houver cliente cadastrado, dar opção de cadastrar
                echo "cliente não cadastrado, quer cadastrar?";
            }else{
                $this->nome = $cliente['nome'];
                $this->sobrenome = $cliente["sobrenome"];
                $this->data_nascimento = $cliente["data_nascimento"];
                $this->contato = $cliente["contato"];
                $this->endereco = $cliente["endereco"];
                $this->numero = $cliente["numero"];
                $this->complemento = $cliente["complemento"];
                $this->cidade = $cliente["cidade"];
                $this->bairro = $cliente["bairro"];
                $this->cep = $cliente["cep"];
                $this->taxa_entrega = $cliente['taxa_entrega'];
                $this->observacoes = $cliente["observacoes"];
            }
        }
        public function excluir($cod_cliente){
            //carregar conexão com bd
            include('conexao_mysqli.php');
            $sql = "DELETE FROM clientes WHERE cod_cliente='$cod_cliente';";
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "cliente excluido";
            }else{
                echo "cliente não excluido";
            }
        }
        public function setListaDeClientes(){
            //carregar conexão com bd
            include('conexao_mysqli.php');
            //verificar se há contato no bd
            $sql = "SELECT * FROM clientes;";
            $query = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($query);
            if($resultCheck > 0){
                $clientes = array();                
                while($row = mysqli_fetch_assoc($query)){
                    array_push($clientes, $row);
                }
            return $clientes;
            }
        }
        public function getListaDeClientes($clientes){
            include('header.php');
            ?>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Código Cliente</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Contato</th>
      <th scope="col">Endereço</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach($clientes as $cliente){    
?>
    <tr>
      <th scope="row"><?php echo $cliente['cod_cliente']; ?></th>
      <td><?php echo $cliente['nome']; ?></td>
      <td><?php echo $cliente['sobrenome']; ?></td>
      <td><?php echo $cliente['data_nascimento']; ?></td>
      <td><?php echo $cliente['contato']; ?></td>
      <td><?php echo $cliente['endereco']; ?></td>
      <td>
          <button>Editar</button>
      </td>
      <td>
          <a class="btn btn-primary" href="cliente.php?cod_cliente=<?php echo $cliente['cod_cliente']; ?>" role="button">Excluir</a>
      </td>
    </tr>
<?php
    }
?>
  </tbody>
</table>
            <?php
        }
    }
    //$cliente = new Cliente();
    $cliente = new Cliente();
    $clientes = $cliente->setListaDeClientes();
    $cliente->getListaDeClientes($clientes);
    if(isset($_GET['cod_cliente'])){
        $cliente->excluir($_GET['cod_cliente']);
    }
    /*
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

$cod_cliente = $_GET['cod_cliente'];
$_SESSION['cod_cliente'] = $cod_cliente;


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
        $taxa_entrega = $row['taxa_entrega'];
        $observacoes = $row["observacoes"];
        $data_criacao = $row['data_criacao'];
    }
}

include("header.php");
*/
?>
