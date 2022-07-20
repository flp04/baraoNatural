<?php
    class Produto{
        public $cod_produto;
        public $categoria;
        public $nome;
        public $descricao;
        public $valor;
        public $data_criacao;

        public function save(){
            //conecta no banco de dados
            include("../conexao_mysqli.php");
            //inicia sessão e pega o código do usuario ativo
            $categoria = $_POST['categoria'];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $valor = $_POST["valor"];
            //insere no banco de dados
            $query = mysqli_query($conn, "INSERT INTO produtos (categoria, nome, descricao, valor, usuario_criou) 
                VALUES ('$categoria', '$nome', '$descricao', '$valor', '$usuario_criou')");
            if($query){
                echo "Produto cadastrado";
            }else{
                echo "Produto não cadastrado";
            }
        }
        public function setProduto($cod_produto){
            include('../conexao_mysqli.php');
            $sql = "SELECT * FROM produtos WHERE cod_produto='$cod_produto';";
            $query = mysqli_query($conn, $sql);
            $produto = mysqli_fetch_assoc($query);
            return $produto;            
        }
    }

    $produto = new Produto();
    $produto = $produto->setProduto(2);
    echo $produto['valor'];
?>