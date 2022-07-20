<?php
    include("usuario.php");
    include('header.php');
?>

<!--formulario de cadastro do usuario
    colocar CPF e verificar alguma outra informação necessária
-->
<div class="container" id="form_cadastro_usuario">
    <form  class="row g-3" action="usuario.php?funcao=salvar" method="POST">
        <h3>Cadastro Usuario</h3>
        <div class="col-md-6">
            <label for="inputNome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="inputNome" required>
        </div>
        <div class="col-md-6">
            <label for="inputSobrenome" class="form-label">Sobrenome</label>
            <input type="text" name="sobrenome" class="form-control" id="inputSobrenome" required>
        </div>
        <div class="col-md-6">
            <label for="inputDataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" id="inputDataNascimento" required>
        </div>
        <div class="col-md-6">
            <label for="inputFuncao" class="form-label">Função</label>
            <input type="text" name="funcao" class="form-control" id="inputFuncao" required>
        </div>
        <div class="col-6">
            <label for="inputEmail" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="inputEmail" required>
        </div>
        <div class="col-6">
            <label for="inputContato" class="form-label">Contato</label>
            <input type="number" name="contato" class="form-control" id="inputContato" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
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