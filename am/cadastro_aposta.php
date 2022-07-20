<?php
/*
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){
    
    //deslogado
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.html');
}else{
    $id_apostador = $_SESSION['id_apostador'];
}
*/
session_start();
$whats = $_SESSION['whats'];

//conexão
include('conexao_mysqli.php');

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
    <div class="container" id="form_cadastro_aposta">
        <div class="text-center">
            <img src="img/logo.png" id="logo" height="400" alt="">
        </div>
        <form  class="row g-3" action="cadastrar_aposta.php" method="POST">
            <h3>Cadastro Aposta</h3>
            <?php
                $sql = "SELECT * FROM partidas";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $id_partida = $row['id_partida'];
                        $data = $row['data'];
                        $equipe_a = $row['equipe_a'];
                        $equipe_b = $row['equipe_b'];
                        $local = $row['local'];
                        $teste = "teste";
            ?>
            <div>
                <input type="hidden" name="whats" value="<?php echo $whats; ?>">
            </div>
            <div>
                <input type="hidden" name="id_partida" value="<?php echo $id_partida; ?>">
            </div>
            <div class="col-xs-1">
                <label for="inputData" class="form-label"><?php echo "Data: $data" ?></label>
            </div>
            <div class="col-xs-6">
                <label for="inputLocal" class="form-label"><?php echo "Local: $local" ?></label>
            </div>
            <div class="col-xs-1">
                <label for="inputEquipeA" class="form-label"><?php echo $equipe_a ?></label>
            </div>
            <div class="col-xs-1">
                <input type="number" name="placar_equipe_a_partida<?php echo $id_partida ?>" placeholder="Insira o placar do <?php echo $equipe_a ?>" class="form-control" id="inputPlacarEquipeA">
            </div>
            <div class="col-xs-1">
                <label for="inputData" class="form-label">vs</label>
            </div>
            <div class="col-xs-1">
                <input type="number" name="placar_equipe_b_partida<?php echo $id_partida ?>" placeholder="Insira o placar do <?php echo $equipe_b ?>" class="form-control" id="inputPlacarEquipeB">
            </div>
            <div class="col-xs-1">
                <label for="inputEquipeB" class="form-label"><?php echo $equipe_b ?></label>
            </div>
            
        <?php
            }
                }
        ?>
                 
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Apostar</button>
            </div>
        </form>
    </div>

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