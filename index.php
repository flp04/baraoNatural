<?php
    //inclui usuario e inicia sessão
    include('usuario.php');

    //verifica se é confirmação de usuario
    if((isset($_GET['funcao'])) == 'confirmar' and (isset($_GET['email']))and(isset($_GET['senha']))){
        $email = $_GET['email'];
        $senha = $_GET['senha'];
        try{
            $usuario->validarUsuario($email, $senha);
            header("Location:alterar_senha.php");            
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }//se não
    session_start();
    if(!isset($_SESSION['login'])){
        $email = null;
        $senha = null;
        //se não houver login, verificar se há dados de login
        if((isset($_POST['email']))and(isset($_POST['senha']))){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            //se houver tentar validar dados de login
            try{
                $usuario->validarUsuario($email, $senha);
                
            }catch(Exception $e) {
                echo $e->getMessage();
            }    
        }else{
            //se não, direcionar para página de login 
            header("Location:login.php");
        }
    }else{
        //se houver dados de login, incluir cabeçalho
        $usuario = $_SESSION['usuario'];

        include('header.php');
        echo "bem vindo $usuario->nome";
        echo "função: $usuario->funcao";
        echo "status: $usuario->status";
        include('footer.php');
    }


            /*
else{

            $senha = null;
            if((isset($_POST['email']))and(isset($_POST['senha']))){
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            }elseif((isset($_GET['email']))and(isset($_GET['senha']))){
                return $email = $_GET['email'] and $senha = $_GET['senha'];
            }
        }

            try{
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                include("usuario.php");
                $usuario->validarUsuario($email,$senha);
            }catch(Exception $e){

            }
            */
     
?>