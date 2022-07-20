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
    <title>Barão Natural 1.0</title>
  </head>
  <body>
  <header id="header">
        <div class="container" >
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.jpeg" class="img-fluid" width="130px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administração
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php if($usuario->funcao == "administrador" or $usuario->funcao == "Desenvolvedor"){
                                    ?>
                                    <li><a class="dropdown-item" href="cadastro_usuario.php">Cadastrar Usuario</a></li>
                                <?php
                                    }
                                ?>
                              <li><a class="dropdown-item" href="alterar_senha.php">Alterar Senha</a></li>
                              <li><a class="dropdown-item" href="usuario.php">Editar Usuario</a></li>
                                <?php if($usuario->funcao == "administrador"){
                                        ?>
                                    <li><a class="dropdown-item" href="cadastro_produto.php">Cadastrar Produto</a></li>
                                <?php
                                    }
                                ?>
                                <?php if($usuario->funcao == "administrador" or $usuario->funcao == "atendente"){
                                        ?>
                              <li><a class="dropdown-item" href="fechar_caixa.php">Fechar Caixa</a></li>
                              <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Clientes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <li><a class="dropdown-item" href="cadastro_cliente.php">Cadastrar Clientes</a></li>
                            </ul>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deslogar.php">Sair</a>
                    </ul>
                    <form class="d-flex" id="d-flex" action="cliente.php?funcao=buscar" method="POST">
                        <input class="form-control me-2" type="search" name="contato" placeholder="Buscar cliente" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>