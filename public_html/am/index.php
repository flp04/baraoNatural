<?php

//conexão com bandco de dados
include('conexao_mysqli.php');


//verificar sessão
session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){
    
    //pegar os dados do index.html
    $whats = $_POST['whats'];
    $senha = $_POST['senha'];

    //verificar existencia do usuario no BD
    $sql = "SELECT * FROM apostadores WHERE whats='$whats';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            //se whats encontrado coletar dados
            $id_apostador = $row['id_apostador'];
            $nome_usuario = $row['nome'];
            $confirmar_senha = $row['senha'];
            
            //verificar se nome não cadastrado
            if($nome_usuario=="cadastrar"){
                //direcionar para cadastro
                header("Location:cadastro_apostador.php?id_apostador=$id_apostador&whats=$whats");
            //verificar senha
            }else{
                if($senha===$confirmar_senha){
                    $_SESSION['id_apostador']=$id_apostador;
                    $_SESSION['apostador']=$nome_usuario;
                    $_SESSION['senha']=$senha;
                    $_SESSION['whats']=$whats;
                    header("Location:cadastro_aposta.php");
                }
            }
        }
    }else{
        //se whats não cadastrado
        echo "Whats não Cadastrado";
    }
}else{
    header("Location:cadastro_aposta.php");
}
?>