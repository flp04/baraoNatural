<?php
    include("usuario.php");
    validarUsuario();
    /*
    //iniciar sessão
    session_start();
    //incluir conexão com banco de dados
    include('conexao_mysqli.php');
    //carregar email e senha da pagina de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //busca o email no banco de dados usuarios
    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email';");
    $query_nr = mysqli_num_rows($query);
    if($query_nr>0){
        //se houver o email cadastrado no sistema pegar senha do usuario no banco
        $sql = "SELECT * FROM usuarios WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $senha_ok = $row['senha'];
                //se a senha for 123 significa primeiro acesso então direciona para alterar senha
                if($senha_ok=="123"){
                    $_SESSION['usuario'] = $email;
                    $_SESSION['senha'] = $senha;
                    header("Location:alterar_senha.php");
                //se não, verifica se a senha está correta de acordo com cadastro do banco. Se sim, preenche a sessão com usuario e senha. E direciona para o index.php
                }elseif($senha == $senha_ok){
                        $_SESSION['usuario'] = $email;
                        $_SESSION['senha'] = $senha;
                        header("Location: index.php");
                    //se a senha não estiver correta
                }else{
//                        echo "Senha incorreta";
//                        echo "<br><a href='index.html'>Voltar</a>";
                        unset($_SESSION['usuario']);
                        unset($_SESSION['senha']);
                        echo "<script>swal({
                            title: 'ERRO!',
                            text: 'Senha incorreta',
                            type: 'erro',
                            confirmButtonText: 'VOLTAR'
                        }).then(()=>{
                            console.log('Location:index.html');
                        });
                        </script>";
                        //header;
                }
            }
}
    }else{
        echo "Usuario não cadastrado";
    }
    */
?> 