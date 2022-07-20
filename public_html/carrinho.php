<?php 
include("conexao_mysqli.php");
session_start();
    $acao = $_POST['action'];
        switch($acao){
            case "adicionar":
                $carrinho = $_SESSION['carrinho'];
                $categoria = $_POST['categoria'];
                $produto = $_POST['produto'];
                $desconto = $_POST['produto_desconto'];
                $quantidade = $_POST['produto_quantidade'];
                $query = "SELECT * FROM produtos WHERE nome='$produto';";
                $result = mysqli_query($conn, $query);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $valor = $row['valor']-$desconto;
                    }
                }
                if($categoria=="esfiha"){
                    $valor = 7.5;
                }
                if($categoria=="pizza" && $quantidade==0.5 && !isset($_SESSION['meio_a_meio'])==true){
                    //if((!isset ($_SESSION['meio_a_meio']) == true)){    
                        $_SESSION['meio_a_meio'] = 1/2;
                        $_SESSION['mm_produto'] = $produto;
                        $_SESSION['mm_valor'] = $valor;
                        header("Location:cadastro_pedido.php");
                }elseif($_SESSION['meio_a_meio']==1/2 && $quantidade==0.5){
                        unset($_SESSION['meio_a_meio']);
                        $produto = "<br>1/2 " . $_SESSION['mm_produto'] . "</br>1/2 " . $produto . "<br>";
                        if($_SESSION['mm_valor']>$valor){
                            $valor=$_SESSION['mm_valor'];
                        }
                        array_push($carrinho, ['categoria'=>$categoria, 'produto'=>$produto, 'quantidade'=>$quantidade*2, 'valor'=>$valor]);
                        unset($_SESSION['produto']);
                        $_SESSION['carrinho'] = $carrinho;
                        unset($_SESSION['mm_produto']);
                        unset($_SESSION['mm_valor']);
                        header("Location:cadastro_pedido.php");
                        break;
                }else{
                    echo "ué";
                    array_push($carrinho, ['categoria'=>$categoria, 'produto'=>$produto, 'quantidade'=>$quantidade, 'valor'=>$valor]);
                    unset($_SESSION['produto']);
                    $_SESSION['carrinho'] = $carrinho;
                    header("Location:cadastro_pedido.php");     
                }

                break;
            case "limpar":
                unset($_SESSION['carrinho']);
                $carrinho = array();
                $_SESSION['carrinho'] = $carrinho;
                header("Location:cadastro_pedido.php");
                break;
            case "excluir":
                $carrinho = $_SESSION['carrinho'];
                $produto = $_POST['carrinho'];
                $key = array_search($produto, $carrinho);
                unset($carrinho[$key]);
                /*array_push($carrinho, $produto);
                */
                unset($_SESSION['produto']);
                $_SESSION['carrinho'] = $carrinho;
                
                header("Location:cadastro_pedido.php");
                break;
            case "fazer_pedido":
                $total = 0;
                $cod_cliente = $_SESSION['cod_cliente'];
                $cod_usuario = $_SESSION['cod_usuario'];
                $carrinho = $_SESSION['carrinho'];
                /*calcular valor total do carrinho
                foreach($carinho as $car){
                    $total += $car['valor'];
                }
                */$_SESSION['total'] = $total;
                //pegar número do último pedido
                    $sql = "SELECT cod_pedido FROM pedidos order by cod_pedido DESC limit 1;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){                            
                            $cod_pedido = $row["cod_pedido"];
                            $_SESSION['cod_pedido'] = $cod_pedido+1;
                        }
                    }
                
                header("Location:pedido.php");
                /*
                $sql = "SELECT * FROM pedidos';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                echo $resultCheck;
                foreach($carrinho as $car){
                    $quantidade = $car['quantidade'];
                    $produto = $car['produto'];
                    $valor = $car['valor'];
                    $subtotal = $car['valor']*$car['quantidade'];
                    $total += $subtotal;
                    echo "$quantidade, $produto, $valor, $subtotal";
                    echo "<br>$total $cod_usuario";
                    
                    //conecta no banco de dados
                    include("conexao_mysqli.php");
                    //inicia sessão e pega o código do usuario ativo
                    session_start();
                    $usuario_criou = $_SESSION['cod_usuario'];
                    //pega os dados do formulario
                    $categoria = $_POST['categoria'];
                    $nome = $_POST["nome"];
                    $descricao = $_POST["descricao"];
                    $valor = $_POST["valor"];
                    //insere no banco de dados
                    $query = mysqli_query($conn, "INSERT INTO produtos (categoria, nome, descricao, valor, usuario_criou) 
                        VALUES ('$categoria', '$nome', '$descricao', '$valor', '$usuario_criou')");
                    if($query){
                        //include("Location:header.php");
                        echo "Produto cadastrado";
                    }else{
                        echo "Produto não cadastrado";
                        echo "$nome $descricao $valor $usuario_criou";
    }
                }*/
                //unset($_SESSION['carrinho']);
                break;
        }  
?>