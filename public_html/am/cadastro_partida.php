<?php
include("conexao_mysqli.php");
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
    <form  class="row g-3" action="cadastrar_partida.php" method="POST">
        <h3>Cadastro Partida</h3>
        <div class="col-md-2">
            <label for="inputData" class="form-label">Data</label>
            <input type="date" name="data" class="form-control" id="inputData">
        </div>
        <div class="col-md-2">
            <label for="inputHorario" class="form-label">Horario</label>
            <input type="time" name="horario" class="form-control" id="inputHorario">
        </div>
        <div class="col-md-3">
            <label for="inputEquipeA" class="form-label">EquipeA</label>
            <select class="form-select" name="equipe_a" id="equipe_a">Equipes:
                <?php
                    $query = "SELECT * FROM equipes;";
                    $result = mysqli_query($conn, $query);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id_equipe = $row['id_equipe'];
                            $apelido = $row['apelido'];
                            echo "<option value='$id_equipe'>$apelido</option>";
                                }
                            }else{
                        echo "Usuario não cadastrado";
                    }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="inputEquipeB" class="form-label">EquipeB</label>
            <select class="form-select" name="equipe_b" id="equipe_b">Equipes:
                <?php
                    $query = "SELECT * FROM equipes;";
                    $result = mysqli_query($conn, $query);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id_equipe = $row['id_equipe'];
                            $apelido = $row['apelido'];
                            echo "<option value='$id_equipe'>$apelido</option>";
                                }
                            }else{
                        echo "Usuario não cadastrado";
                    }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputLocal" class="form-label">Local</label>
            <select class="form-select" name="local" id="estadio">Local:
                <?php
                    $query = "SELECT * FROM equipes;";
                    $result = mysqli_query($conn, $query);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id_equipe = $row['id_equipe'];
                            $estadio = $row['estadio'];
                            echo "<option value='$id_equipe'>$estadio</option>";
                                }
                            }else{
                        echo "Usuario não cadastrado";
                    }
                ?>
            </select>
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