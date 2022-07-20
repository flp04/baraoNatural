<?php
    

    ini_set('display_errors', 1);
    error_reporting( E_ALL );
    $from = "admin@baraonatural.com";
    $to = "filipe.husak87@gmail.com";
    $subject = "Teste";
    $message = "Deu certo porraaa!";
    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    echo "email enviado";
?>