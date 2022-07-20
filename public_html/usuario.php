<?php
    class Usuario{
        public $cod_usuario;
        public $nome;
        public $sobrenome;
        public $data_nascimento;
        public $funcao;
        public $email;
        public $contato;
        private $senha;
        public $status;
        public $data_criacao;

        public function __construct(){
            /*
            
            try{
                $this->validarUsuario($email, $senha);
                //echo $_POST['senha'];
            }catch(Exception $e){
                echo $e->getMessage();
            }

            

                try{
                    echo $email;
                }catch(Exception $erro){
                    echo $e;
                }

            //carregar email e senha da pagina de login
            $this->email = $_POST['email'];
            //$senha = $_POST['senha'];
            switch($status){
                case "ativo":
                    //validar usuario e preencher login e usuario na sessão
                    if($this->validarUsuario()){
                    $_SESSION['usuario'] = $this->setUsuario($this->email);
                    $_SESSION['login'] = true;
                    header("Location:index.php");
                    }else{
                        echo "email ou senha não conferem";
                    }
                    break;
                case "validação":
                   header("alterar_senha.php");
                   break;
                case "inativo":
                    echo "usuario inativo";
                    break;
            }
            //header("Location:../cadastro_usuario.php");
            */
    }
        public function salvar(){
            //carregar conexão com bd
            include("conexao_mysqli.php");
            //pegar dados do formulário
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $data_nascimento = $_POST["data_nascimento"];
            $funcao = $_POST["funcao"];
            $email = $_POST["email"];
            $contato = $_POST["contato"];
            //verificar se já há e-mail cadastrado
            $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email';");
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck>0){
                //se sim, informar usuario já cadastrado
                echo "usuario já cadastrado";
            }else{
                //incluir senha.php e gerar senha
                include('senha.php');
                $senha = md5(gerarSenha());
                //se não, cadastrar novo usuario no bd
                $query = mysqli_query($conn, "INSERT INTO `usuarios` (`cod_usuario`, `nome`, `sobrenome`, `data_nascimento`, `funcao`, `email`, `contato`, `senha`, `status`, `data_criacao`) 
                VALUES (NULL, '$nome', '$sobrenome', '$data_nascimento', '$funcao', '$email', '$contato', '$senha', 'confirmar', CURRENT_TIMESTAMP);");
                if($query){
                    /*
                    //e enviar e-mail para validação do cadastro
                    ini_set('display_errors', 1);
                    error_reporting( E_ALL );
                    $from = "admin@baraonatural.com";
                    $subject = "Confirmação do Cadastro";
                    $message = "Deu certo porraaa!";
                    $headers = "From:admin@baraonatural.com";
                    mail($email,$subject,$message,$headers);
                    */
                    echo "usuario cadastrado";
                    ?>
                    <a href="<?php echo "usuario.php?funcao=confirmarUsuario&email=$email&senha=$senha"; ?>">Confirmar cadastro</a>
                    <?php
                }else{
                    echo "não foi";
                }
            }
        }
        public function setUsuario($email){
            include('conexao_mysqli.php');
            $sql = "SELECT * FROM usuarios WHERE email='$email';";
            $query = mysqli_query($conn, $sql);
            $usuario = mysqli_fetch_assoc($query);
            if(!$usuario){
                throw new Exception('Usuario não existe'); 
            }
                $this->cod_usuario = $usuario['cod_usuario'];
                $this->nome = $usuario['nome'];
                $this->sobrenome = $usuario["sobrenome"];
                $this->data_nascimento = $usuario["data_nascimento"];
                $this->funcao = $usuario['funcao'];
                $this->email = $usuario['email'];
                $this->contato = $usuario["contato"];
                $this->senha = $usuario["senha"];
                $this->status = $status['status'];
                $this->data_criacao = $usuario['data_criacao'];
                return $this;
        }
        public function validarUsuario($email, $senha){
            $this->setUsuario($email);
            switch($this->status){
                case "inativo":
                    throw new Exception('usuario inativo');
                    break;
      /*          case "confirmar":
                    if($usuario['senha'] == md5($_GET['senha'])){
                        $this->setUsuario($email);
                        $_SESSION['usuario'] = $this;
                        $_SESSION['login'] = true;
                        echo $email;
                        break;
                        //return header('Location:alterar_senha.php');
                    }
*/
                case "ativo":
                    if($this->senha == $senha){
                        $_SESSION['usuario'] = $this;
                        $_SESSION['login'] = true;
                        return header('Location:index.php');
                    }else{
                        throw new Exception("senha incorreta");
                    }
            }
        }
        public function excluir(){
            //carregar conexão com bd
            $cod_usuario = $_GET['cod_usuario'];
            include('conexao_mysqli.php');
            $sql = "DELETE FROM usuarios WHERE cod_usuario='$cod_usuario';";
            $query = mysqli_query($conn, $sql);
            if($query){
                echo "usuario excluido";
            }else{
                echo "usuario não excluido";
            }
        }
        public function alterarSenha(){
            include("conexao_mysqli.php");
            $email = $_POST['email'];
            $this->setUsuario($email);
            $senha = $_POST['senha'];
            $confirmar_senha = $_POST["confirmar_senha"];
            if($senha===$confirmar_senha){
                $query = mysqli_query($conn, "UPDATE usuarios SET senha='$senha' WHERE cod_usuario=$this->cod_usuario");
                if($query){
                        include("header.php");
                        echo "Senha do $this->cod_usuario alterada";
                }else{                
                        echo "Senha não alterada";
                }
            }else{
                include('header.php');
                echo"Senhas não conferem";
            }
        }
        public function setListaDeUsuarios(){
            //carregar conexão com bd
            include('conexao_mysqli.php');
            //verificar se há contato no bd
            $sql = "SELECT * FROM usuarios;";
            $query = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($query);
            if($resultCheck > 0){
                $usuarios = array();                
                while($row = mysqli_fetch_assoc($query)){
                    array_push($usuarios, $row);
                }
            return $usuarios;
            }
        }
        public function getListaDeUsuarios($usuarios){
            include('header.php');
            ?>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Código Usuario</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Função</th>
      <th scope="col">E-mail</th>
      <th scope="col">Contato</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach($usuarios as $usuario){    
?>
    <tr>
      <th scope="row"><?php echo $usuario['cod_usuario']; ?></th>
      <td><?php echo $usuario['nome']; ?></td>
      <td><?php echo $usuario['sobrenome']; ?></td>
      <td><?php echo $usuario['data_nascimento']; ?></td>
      <td><?php echo $usuario['funcao']; ?></td>
      <td><?php echo $usuario['email']; ?></td>
      <td><?php echo $usuario['contato']; ?></td>
      <td>
      <a class="btn btn-primary" href="usuario.php?funcao=excluir&cod_usuario=<?php echo $usuario['cod_usuario']; ?>" role="button">Alterar Senha</a>
      </td>
      <td>
          <a class="btn btn-primary" href="usuario.php?funcao=excluir&cod_usuario=<?php echo $usuario['cod_usuario']; ?>" role="button">Excluir</a>
      </td>
    </tr>
<?php
        }
    }    
}

/*
    session_start();
    if(isset($GET['funcao']){
        $email = $_GET['email'];
        $senha = $_GET['senha'];
        
        //se sim assume o usuario
        $usuario = $_SESSION['usuario'];
        //verifica se há função e executa, caso houver
        if(isset($_GET['funcao']))
        switch($_GET['funcao']){
            case "salvar":
                $usuario->salvar();
                break;
            case "alterarSenha":
                $usuario->alterarSenha();
                break;
            case "excluir":
                $usuario->excluir();
                break;
        }
    }
*/
?>