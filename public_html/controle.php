<?php
    class Usuario{
        public function __construct(){
            include("conexao_mysqli.php");
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $data_nascimento = $_POST["data_nascimento"];
            $funcao = $_POST["funcao"];
            $email = $_POST["email"];
            $contato = $_POST["contato"];
            $senha = "123456"; //md5($_POST['senha']);
            $query = mysqli_query($conn, "INSERT INTO `usuarios` (`cod_usuario`, `nome`, `sobrenome`, `data_nascimento`, `funcao`, `email`, `contato`, `senha`, `data_criacao`) 
                VALUES (NULL, '$nome', '$sobrenome', '$data_nascimento', '$funcao', '$email', '$contato', '$senha', CURRENT_TIMESTAMP);");
            if($query){
                echo "usuario cadastrado";
            }else{
                "erro";
            }
            echo $senha;
        }
        public function setUsuario($cod_usuario){
            include('conexao_mysqli.php');
            $sql = "SELECT * FROM usuarios WHERE cod_usuario='$cod_usuario';";
            $query = mysqli_query($conn, $sql);
            $usuario = mysqli_fetch_assoc($query);
                    /*$this->cod_usuario = $row['cod_usuario'];
                    $this->nome = $row['nome'];
                    $this->sobrenome = $row["sobrenome"];
                    $this->data_nascimento = $row["data_nascimento"];
                    $this->funcao = $row['funcao'];
                    $this->email = $row['email'];
                    $this->contato = $row["contato"];
                    $this->senha = $row["senha"];
                    $this->data_criacao = $row['data_criacao'];
                }
            }*/
        }
    }

  function validarUsuario(){
        
    include('conexao_mysqli.php');
    //carregar email e senha da pagina de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //busca o email no banco de dados usuarios
    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email';");
    $usuario = mysqli_fetch_assoc($query);
    //verifica se e-mail foi encontrado no bd
    if(!$usuario){
        echo "usuario não existe";
    }
    if($usuario['senha'] == $senha){
        session_start();
        $_SESSION['jogador']
        echo "senha correta";
    }else{
        echo "senha incorreta";
    }
}
?>