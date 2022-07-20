<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form  class="row g-3" action="buscar_endereco.php" method="POST">
        <!--ENDEREÇO (MELHORAR)-->
        <div class="col-7">
            <label for="inputEndereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Colocar somente o nome da rua, avenida, praça, alameda...">
        </div>
        <div class="col-2">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="number" name="numero" class="form-control" id="inputNumero">
        </div>
        <div class="col-3">
            <label for="inputComplemento" class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Casa/Apartamento">
        </div>
        <div class="col-md-5">
            <label for="inputBairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="inputBairro">
        </div>
        <div class="col-md-4">
            <label for="inputCidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="inputCidade">
        </div>
        <div class="col-md-3">
            <label for="inputCEP" class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" id="inputCEP" placeholder="00000-000">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Buscar Endereço</button>
        </div>
    </form>

</body>
</html>