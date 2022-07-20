<?php
/*
session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){

    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.html');
    echo "deslogado";
}
*/
/*
//busca do código do usuario no banco
$sql = "SELECT * FROM apostadores WHERE whats='$whats';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        $id_apostador = $row['id_apostador'];}
    }
*/
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <title>Alo Microfone 1.0 - Bolão UCL21</title>
  </head>
  <body>
<div class="container" id="form_cadastro_apostador">
    
<div class="text-center">
<img src="img/logo.png" id="logo" height="400" alt="">
</div>
    <form  class="row g-3" action="cadastrar_equipe.php" method="POST">
        <h3>Cadastro Equipe</h3>
        <div class="col-md-4">
            <label for="inputNome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome">
        </div>
        <div class="col-md-4">
            <label for="inputApelido" class="form-label">Apelido</label>
            <input type="text" name="apelido" class="form-control" id="inputApelido">
        </div>
        <div class="col-md-4">
            <label for="inputEstadio" class="form-label">Estadio</label>
            <input type="text" name="estadio" class="form-control" id="inputEstadio">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
        integrity="sha384-SR1s2tW1dK7uaPingw4N9bXE4s1ZqAwSTkPENzswTNFaQU1RDvt3wT4gWFG"  
        crossorigin="anonymous">    
    </script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>