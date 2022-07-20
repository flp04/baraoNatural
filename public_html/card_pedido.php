<?php

    //iniciar e verificar se há sessão ativa. se não houver direcionar pra html, se houver preencher o código do usuario
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){    
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location:index.html');
        echo "deslogado";
    }else{
        $cod_usuario = $_SESSION['cod_usuario'];
    }
    //verificar se não há carrinho ativo para criar instanciar caso haja
    if(!isset($_SESSION['carrinho'])==true){
        $carrinho = array();
        $_SESSION['carrinho'] = $carrinho;
        include('header.php');
    }else{
        include('header.php');
        $carrinho = $_SESSION['carrinho'];
        
    }
    /* PRECISA REATIVAR ESSA PARTE DO CÓDIGO PARA CASO NÃO HAJA PREENCHIMENTO
    //verifica se há código do cliente ativo
    if(isset($SESSION['cod_cliente'])==true){
        $cod_cliente = $SESSION['cod_cliente'];
    }else{
        //header("Location:index.php");
        echo "não achou";   
    }*/

    $cod_cliente = $_SESSION['cod_cliente'];
    //conecta ao banco de dados
    include("conexao_mysqli.php");    
?>
<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Título do card</h5>
      <p class="card-text">Este é um card mais longo com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior.</p>
      <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Título do card</h5>
      <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
      <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Título do card</h5>
      <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.</p>
      <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" 
        integrity="sha384-SR1s47Wf627c4ySaySoV9KouTxUNPHUYmJENzswTNFaQU1RDvt3wT4gWFG"  
        crossorigin="anonymous">    
    </script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
