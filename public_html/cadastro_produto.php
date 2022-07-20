<?php
/*
//inicia e verifica se há sessão hativa. se não direciona para index.html
session_start();
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.html');
    echo "deslogado";
}
*/
    include('classes/usuario.php');
    //inclui header
    include('header.php');
?>
<!--FORMULARIO DE CADASTRO DO PRODUTO-->
<div class="container" id="form_cadastro_produto">
    <form  class="row g-3" action="classes/produto.php" method="POST">
        <h3>Cadastro Produto</h3>
        <div class="col-md-2">
            <label for="inputCategoria" class="form-label">Categoria</label>
            <select class="form-select" name="categoria" id="categoria">
                <option value='pizza'>Pizza</option>";
                <option value='esfiha'>Esfiha</option>";
            </select>
        </div>  
        <div class="col-md-3">
            <label for="inputNome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome" required>
        </div>
        <div class="col-md-5">
            <label for="textareaDescricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="textareaDescricao" rows="1"></textarea>
        </div>
        <div class="col-md-2">
            <label for="inputValor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" class="form-control" id="inputValor" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
</div>
</form>
<script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
        integrity="sha384-SR1s2tW1dK7uaPingw4N9bXE4s1ZqAwSTkPENzswTNFaQU1RDvt3wT4gWFG"  
        crossorigin="anonymous">    
    </script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>