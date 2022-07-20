<?php
    include("header.php");
?>

<div class="container" id="form_fechar_caixa">
    <form  class="row g-3" action="fechamento_caixa.php" method="POST">
        <h3>Fechar Caixa</h3>
        <div class="col-md-6">
            <label for="inputData" class="form-label">Escolha a data</label>
            <input type="date" name="data" class="form-control" id="inputDataNascimento" required>
        </div> <div class="col-12">
            <button type="submit" class="btn btn-primary">Fechar</button>
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