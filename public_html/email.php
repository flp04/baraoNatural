<?php
    function enviarEmailValidacaoUsuario($usuario){

        

        ini_set('display_errors', 1);
        error_reporting( E_ALL );
        $from = "admin@baraonatural.com";
        $to = "$usuario->email";
        $subject = "Validação do Cadastro";
        $message = "Deu certo porraaa!";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        echo "email enviado";
    }  

    
?>