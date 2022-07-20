<?php
/*
session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){

    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.html');
    echo "deslogado";
}
$usuario = $_SESSION['usuario'];

//conexão
include('conexao_mysqli.php');

//busca do código do usuario no banco
$sql = "SELECT * FROM usuarios WHERE email='$usuario';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        $cod_usuario = $row['cod_usuario'];}
    }
    */
include('usuario.php');
session_start();
$usuario = $_SESSION['usuario'];
include('header.php');
?>
<div class="container" id="form_alterar_senha">
    <form  class="row g-3" action="usuario.php?funcao=alterarSenha" method="POST">
        <h3>Alterar Senha</h3>
        <div>
            <input type="text" name="email" value="<?php echo $usuario->email; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputSenha" class="form-label">Nova Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha">
        </div>
        <div class="col-md-6">
            <label for="inputConfirmarSenha" class="form-label">Confirmar senha</label>
            <input type="password" name="confirmar_senha" class="form-control" id="inputConfirmarSenha">
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

